<?php
/** 
*
* @package ucp
* @copyright (c) 2010 bbDKP 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
* @author Sajaki
* This is the user interface for the character dkp integration
*/
			
/**
* @package ucp
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

class ucp_dkp
{
	var $u_action;
					
	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $config, $phpbb_root_path, $phpEx;
		$s_hidden_fields = '';
		$submit = (isset($_POST['submit'])) ? true : false;
		
		// Attach the language file
		$user->add_lang('mods/dkp_common');
		
		if ($submit)
		{
			if (!$auth->acl_get('u_dkpucp'))
			{
				trigger_error('NOUCPACCESS');
			}
		
			// user pressed submit
			// Verify the form key is unchanged
			if (!check_form_key('digests'))
			{
				trigger_error('FORM_INVALID');
			}
			
			switch ($mode)
			{
				case 'characters':
					$sql_ary = array(
						'phpbb_user_id'	=> $user->data['user_id'], 
					);
					$sql = 'UPDATE ' . MEMBER_LIST_TABLE . '
						SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
						WHERE member_id = ' . (int) request_var('dkpmember', 0);
					$db->sql_query($sql);
					
				break;
			}
			
			// Generate confirmation page. It will redirect back to the calling page
			meta_refresh(3, $this->u_action);
			$message = $user->lang['CHARACTERS_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], '<a href="' . $this->u_action . '">', '</a>');
			trigger_error($message);
		}
		
		else
		{

			// Set up the page
			$this->tpl_name 	= 'dkp/ucp_dkp';
			
			// GET processing logic
			add_form_key('digests');
			switch ($mode)
			{
				// this mode is shown to users in order to select the character with which they will raid
				case 'characters':
					$show_buttons = false;
					$show = true;
					$s_guildmembers = ' '; 
					//if user has no access to claiming chars, don't show the add button.
					if(!$auth->acl_get('u_dkpucp'))
					{
						$show_buttons = false;
					}
					else 
					{
						//if there are no chars at all, show a message and do not show add button
						$sql = 'SELECT count(*) AS mcount FROM ' . MEMBER_LIST_TABLE .' WHERE member_rank_id != 90  ';
						$result = $db->sql_query($sql, 0);
						$mcount = (int) $db->sql_fetchfield('mcount');
						if ( $mcount = 0)
						{
							$show = false;
						}
						else 
						{
							// build popup for adding new chars to user account, get only those that are not assigned yet.
							// do not show if all accounts are assigned
							// if someone picks a guildmember that does not belong to them then the guild admin can override it in acp
							$sql = 'SELECT member_id, member_name FROM ' . MEMBER_LIST_TABLE .' WHERE 
								phpbb_user_id = 0 and member_rank_id != 90 order by member_name asc';
							$result = $db->sql_query($sql, 0);
							
							while ( $row = $db->sql_fetchrow($result) )
		                    {
								$s_guildmembers .= '<option value="' . $row['member_id'] .'">' . $row['member_name'] . '</option>';
		                    	$show_buttons = true;
		                    }
						}
						$db->sql_freeresult ($result);
					}
										
					// These template variables are used on all the pages
					$template->assign_vars(array(
						'S_DKPMEMBER_OPTIONS'	=> $s_guildmembers,
						'S_SHOW'				=> $show,
						'S_SHOW_BUTTONS'		=> $show_buttons,
						'U_ACTION'  			=> $this->u_action,
						'DKPCHAR_TITLE'			=> $user->lang['UCP_DKP_CHARACTERS'],
						)
					);
					
					
					// make a listing of my own characters with dkp for each pool
					$sql_array = array(
					    'SELECT'    => 	'm.member_id, m.member_name, m.member_level, u.username, g.name as guildname,
					    				 m.member_gender_id, a.image_female_small, a.image_male_small, 
					    				 l.name as member_class , c.imagename, c.colorcode  ', 
					    'FROM'      => array(
					        MEMBER_LIST_TABLE 	=> 'm',
					        CLASS_TABLE  		=> 'c',
					        RACE_TABLE  		=> 'a',
					        BB_LANGUAGE			=> 'l', 
					        GUILD_TABLE  		=> 'g',
					        USERS_TABLE 		=> 'u', 
					    	),
					 
					    'WHERE'     =>  "  l.game_id = c.game_id and l.attribute_id = c.class_id AND l.language= '" . $config['bbdkp_lang'] . "' AND l.attribute = 'class'
										  AND (m.member_guild_id = g.id) 
										  AND (m.member_class_id = c.class_id and m.game_id = c.game_id)
										  AND m.member_race_id =  a.race_id  and m.game_id = a.game_id
										  AND u.user_id = m.phpbb_user_id and u.user_id = " . $user->data['user_id']  ,
						'ORDER_BY'	=> " m.member_name ",
					    );

				    $sql = $db->sql_build_query('SELECT', $sql_array);
					if (!($members_result = $db->sql_query($sql)) )
					{
						trigger_error($user->lang['ERROR_MEMBERNOTFOUND'], E_USER_WARNING);
					}
					$lines = 0;
					$member_count = 0;
					while ( $row = $db->sql_fetchrow($members_result) )
					{
						++$member_count;
						$raceimage = (string) (($row['member_gender_id']==0) ? $row['image_male_small'] : $row['image_female_small']);
						$template->assign_block_vars('members_row', array(
							'COUNT'         => $member_count,
							'NAME'          => $row['member_name'],
							'LEVEL'         => $row['member_level'],
							'CLASS'         => $row['member_class'],
							'GUILD'         => $row['guildname'],
							'COLORCODE'  	=> ($row['colorcode'] == '') ? '#123456' : $row['colorcode'],
					        'CLASS_IMAGE' 	=> (strlen($row['imagename']) > 1) ? $phpbb_root_path . "images/class_images/" . $row['imagename'] . ".png" : '',  
							'S_CLASS_IMAGE_EXISTS' => (strlen($row['imagename']) > 1) ? true : false,
					       	'RACE_IMAGE' 	=> (strlen($raceimage) > 1) ? $phpbb_root_path . "images/race_images/" . $raceimage . ".png" : '',  
							'S_RACE_IMAGE_EXISTS' => (strlen($raceimage) > 1) ? true : false, 			 				
						
							)
						); 
						
						$sql_array2 = array(
						    'SELECT'    => ' d.dkpsys_id, d.dkpsys_name, 
							m.member_earned - m.member_raid_decay + m.member_adjustment AS ep,
						    m.member_spent - m.member_item_decay + ( ' . max(0, $config['bbdkp_basegp']) . ') AS gp, 
        					(m.member_earned - m.member_raid_decay + m.member_adjustment - m.member_spent + m.member_item_decay - ( ' . max(0, $config['bbdkp_basegp']) . ') ) AS member_current,

        					sum(case when m.member_spent - m.member_item_decay <= 0 
							then m.member_earned - m.member_raid_decay + m.member_adjustment  
							else round( (m.member_earned - m.member_raid_decay + m.member_adjustment) / (' . max(0, $config['bbdkp_basegp']) .' + m.member_spent - m.member_item_decay) ,2) end) as pr  
							', 
						    'FROM'      => array(
							        MEMBER_DKP_TABLE 	=> 'm', 
							        DKPSYS_TABLE 		=> 'd',
						    	),
						    'WHERE'     => " m.member_dkpid = d.dkpsys_id and m.member_id = " . $row['member_id'],
							'GROUP_BY'  => " d.dkpsys_name " , 
							'ORDER_BY'	=> " d.dkpsys_name ",
						    );
	
					    $sql2 = $db->sql_build_query('SELECT', $sql_array2);
					    $dkp_result = $db->sql_query($sql2); 
						while ($row2 = $db->sql_fetchrow($dkp_result))
						{
							$template->assign_block_vars('members_row.dkp_row', array(
								'DKPSYS'        => $row2['dkpsys_name'],
								'U_VIEW_MEMBER' => append_sid("{$phpbb_root_path}dkp.$phpEx", "page=viewmember&amp;". URI_NAMEID . '=' . $row['member_id'] . '&amp;' . URI_DKPSYS . '= ' . $row2['dkpsys_id'] ), 
								'EARNED'       => $row2['ep'],
								'SPENT'        => $row2['gp'],
								'PR'           => $row2['pr'],
								'CURRENT'      => $row2['member_current'],
								)
							); 
						}
    					$db->sql_freeresult ($dkp_result);	
							
					}
					$template->assign_vars(array(
						'S_SHOWEPGP' 	=> ($config['bbdkp_epgp'] == '1') ? true : false,
						
					));
					
					$db->sql_freeresult ($members_result);

					$this->page_title 	= $user->lang['UCP_DKP_CHARACTERS'];
					
				break;		
			}	
		}
	}
}
?>