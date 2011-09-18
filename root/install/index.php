<?php
/**
 * @package bbDkp-installer
 * @author sajaki9@gmail.com
 * @copyright (c) 2009 bbDkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id$
 * 
 * bbDKP clean install script
 * if previous install found then redirect to updater
 * 
 * 
 */
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
define('IN_INSTALL', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

// We only allow a founder install this MOD
if ($user->data['user_type'] != USER_FOUNDER)
{
    if ($user->data['user_id'] == ANONYMOUS)
    {
        login_box('', 'LOGIN');
    }

    trigger_error('NOT_AUTHORISED', E_USER_WARNING);
}

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
    trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

if (!file_exists($phpbb_root_path . 'install/index.' . $phpEx))
{
    trigger_error('Warning! Install directory has wrong name. it must be \'install\'. Please rename it and launch again.', E_USER_WARNING);
}

//check old version. if not then trigger error
check_oldbbdkp();

// The name of the mod to be displayed during installation.
$mod_name = 'bbDKP';

/*
* The name of the config variable which will hold the currently installed version
* You do not need to set this yourself, UMIL will handle setting and updating the version itself.
*/
$version_config_name = 'bbdkp_version';

/*
* The language file which will be included when installing
*/
$language_file = 'mods/dkp_admin';

/*
* Setting the checkboxes at runtime 
*/
$gameinstall['aion']=false;
$gameinstall['daoc']=false;
$gameinstall['eq']=false;
$gameinstall['eq2']=false;
$gameinstall['FFXI']=false;
$gameinstall['lotro']=false;
$gameinstall['rift']=false;
$gameinstall['vanguard']=false;
$gameinstall['wow']=false;
$gameinstall['warhammer']=false;
$gameinstall['swtor']=false;
$choice=false;
if (isset($config['bbdkp_default_game'])) 
{
	$gameinstall[$config['bbdkp_default_game']] = $choice = true;
}

if (isset($config['bbdkp_games_aion']))
{
	$gameinstall['aion'] = $config['bbdkp_games_aion'];
}
if (isset($config['bbdkp_games_daoc']))
{
	$gameinstall['daoc'] =  $config['bbdkp_games_daoc'];
}
if (isset($config['bbdkp_games_eq']))
{
	$gameinstall['eq'] =  $config['bbdkp_games_eq'];
}
if (isset($config['bbdkp_games_eq2']))
{
	$gameinstall['eq2'] = $config['bbdkp_games_eq2'];
}
if (isset($config['bbdkp_games_FFXI']))
{
	$gameinstall['FFXI'] = $config['bbdkp_games_FFXI'];
}
if (isset($config['bbdkp_games_lotro']))
{
	$gameinstall['lotro'] = $config['bbdkp_games_lotro'];
}
if (isset($config['bbdkp_games_rift']))
{
	$gameinstall['rift'] = $config['bbdkp_games_rift'];
}
if (isset($config['bbdkp_games_vanguard']))
{
	$gameinstall['vanguard'] = $config['bbdkp_games_vanguard'];
}
if (isset($config['bbdkp_games_wow']))
{
	$gameinstall['wow'] = $config['bbdkp_games_wow'];
}
if (isset($config['bbdkp_games_warhammer']))
{
	$gameinstall['warhammer'] = $config['bbdkp_games_warhammer'];
}
if (isset($config['bbdkp_games_swtor']))
{
	$gameinstall['swtor'] = $config['bbdkp_games_swtor'];
}

$options = array(
		'guildtag'	=> array('lang' => 'UMIL_GUILD', 'type' => 'text:40:255', 'explain' => false, 'select_user' => false),
        'realm'	    => array('lang' => 'REALM_NAME', 'type' => 'text:40:255', 'explain' => false, 'select_user' => false),
		'region'   => array('lang' => 'REGION', 'type' => 'select', 'function' => 'regionoptions', 'explain' => true),

		'aion'   => array('lang' => 'AION', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['aion']) ? true:false) ),
		'daoc'   => array('lang' => 'DAOC', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['daoc']) ? true:false)),
		'eq'   => array('lang' => 'EQ', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['eq']) ? true:false)),
		'eq2'   => array('lang' => 'EQ2', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['eq2']) ? true:false)),
		'FFXI'   => array('lang' => 'FFXI', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['FFXI']) ? true:false)),
		'lotro'   => array('lang' => 'LOTRO', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['lotro']) ? true:false)),
		'rift'   => array('lang' => 'RIFT', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['rift']) ? true:false)),
		'vanguard'   => array('lang' => 'VANGUARD', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['vanguard'] ) ? true:false)),
		'warhammer'   => array('lang' => 'WARHAMMER', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['warhammer'] ) ? true:false)),
		'wow'     => array('lang' => 'WOW', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['wow'] ) ? true:false)),
		'swtor'     => array('lang' => 'SWTOR', 'validate' => 'bool', 'type' => 'radio:yes_no', 'default' => (($gameinstall['swtor'] ) ? true:false)),
);

/*
 * including the gamefiles
 */
include($phpbb_root_path .'install/gamesinstall/install_aion.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_daoc.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_eq.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_eq2.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_ffxi.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_lotro.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_vanguard.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_warhammer.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_wow.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_rift.' . $phpEx);
include($phpbb_root_path .'install/gamesinstall/install_swtor.' . $phpEx);

/*
* Optionally we may specify our own logo image to show in the upper corner instead of the default logo.
* $phpbb_root_path will get prepended to the path specified
* Image height should be 50px to prevent cut-off or stretching.
*/
$logo_img = 'install/logo.png'; 
/*
  $user, $config, $db, $table_prefix, $umil, $bbdkp_table_prefix; 
* The array of versions and actions within each.
* You do not need to order it a specific way (it will be sorted automatically), however, you must enter every version, even if no actions are done for it.
*
* You must use correct version numbering.  Unless you know exactly what you can use, only use X.X.X (replacing X with an integer).
* The version numbering must otherwise be compatible with the version_compare function - http://php.net/manual/en/function.version-compare.php
*/
$versions = array(
    '1.2.2'    => array(
    	// install base bbdkp tables (this uses the layout from develop/create_schema_files.php and from phpbb_db_tools)
        'table_add' => array(

			array($table_prefix . 'bbdkp_news', array(
                    'COLUMNS'				=> array(
                        'news_id'			=> array('UINT', NULL, 'auto_increment'),
                        'news_headline'		=> array('VCHAR_UNI', ''),
                        'news_message'		=> array('TEXT_UNI', ''),
                        'news_date'			=> array('TIMESTAMP', 0),
                        'user_id'			=> array('UINT', 0),
                        'bbcode_bitfield'	=> array('VCHAR:20', ''),
                        'bbcode_uid'		=> array('VCHAR:8', ''),
                        'bbcode_options'	=> array('VCHAR:8', ''),	  		  		  
                    ),
                    'PRIMARY_KEY'    => 'news_id',
                ),
            ),
            
            array($table_prefix . 'bbdkp_language', array(
	              'COLUMNS'            => array(
	          		  'id'     	       => array('UINT', NULL, 'auto_increment'), 
	                  'attribute_id'   => array('UINT', 0), 
	                  'language'       => array('CHAR:2', ''),
	          		  'attribute'	   => array('VCHAR:30', ''), 
	                  'name'       	   => array('VCHAR_UNI:255', ''), 
	                  'name_short' 	   => array('VCHAR_UNI:255', ''),
	          	),
	                'PRIMARY_KEY'     => array('id'),
	          		'KEYS'            => array('attribute_id' => array('UNIQUE', array('attribute_id', 'language', 'attribute')),
				)
	            )),   

	      array($table_prefix . 'bbdkp_factions', array(
                    'COLUMNS'        => array(
                        'f_index'    		=> array('USINT', NULL, 'auto_increment'),
                        'faction_id'   		=> array('USINT', 0),
                        'faction_name'     	=> array('VCHAR_UNI', ''),
                        'faction_hide'		=> array('BOOL', 0),
                    ),
                    'PRIMARY_KEY'    => 'f_index',                   
                    
                ),
            ),

          array($table_prefix . 'bbdkp_classes', array(
                    'COLUMNS'        => array(
                        'c_index'    		=> array('USINT', NULL, 'auto_increment'),
                        'class_id'   		=> array('USINT', 0),
                        'class_min_level'	=> array('USINT', 0),
                        'class_max_level'	=> array('USINT', 0),
                        'class_armor_type'	=> array('VCHAR_UNI', ''),
                        'class_hide'		=> array('BOOL', 0),
            			'dps'				=> array('USINT', 0),
            			'tank'				=> array('USINT', 0),
            			'heal'				=> array('USINT', 0),
						'imagename'			=> array('VCHAR:255', ''),
                		'colorcode'			=> array('VCHAR:10', ''),
            
                    ),
                    'PRIMARY_KEY'    => 'c_index',
                    'KEYS'         => array('class_id'    => array('UNIQUE', 'class_id')),
                ),
            ),
            
		  array($table_prefix . 'bbdkp_races', array(
                    'COLUMNS'				=> array(
                        'race_id'			=> array('USINT', 0),
                        'race_faction_id'	=> array('USINT', 0),
                        'race_hide'			=> array('BOOL', 0),
						'image_female_small'	=> array('VCHAR:255', ''),
						'image_male_small'	=> array('VCHAR:255', ''),
                    ),
                    'PRIMARY_KEY'    => 'race_id',
                ),
            ),            
           
            // Guild table 
            // realm, region is for wow
            // last two columns are for aion
            array($table_prefix . 'bbdkp_memberguild', array(
                    'COLUMNS'       => array(
                       'id'				=> array('USINT', 0), 
                       'name'			=> array('VCHAR_UNI:255', ''), 
		  			   'realm'			=> array('VCHAR_UNI:255', ''),
					   'region'  		=> array('VCHAR:2', ''),
					   'roster'  		=> array('BOOL', 0), 
					   'aion_legion_id' => array('USINT', 0), 
            		   'aion_server_id' => array('USINT', 0),
            			 
                      ),
                    'PRIMARY_KEY'  	=> array('id'),
					'KEYS'         => array('gname'    => array('UNIQUE', 'name')),                    
              ),
            ),  

           array($table_prefix . 'bbdkp_member_ranks', array(
                    'COLUMNS'        => array(
            			//rank_id is not auto-increment 
                        'guild_id'		=> array('USINT', 0),
                        'rank_id'		=> array('USINT', 0),
                        'rank_name'		=> array('VCHAR_UNI:50', ''),
                        'rank_hide'		=> array('BOOL', 0),
                        'rank_prefix'	=> array('VCHAR:75', ''),
                        'rank_suffix'	=> array('VCHAR:75', ''),                      
                    ),
                    'PRIMARY_KEY'    => array('rank_id', 'guild_id'),
                ),
            ),

            array($table_prefix . 'bbdkp_memberlist', array(
                    'COLUMNS'        	   => array(
                        'member_id'        => array('UINT', NULL, 'auto_increment'),
                        'member_name'      => array('VCHAR_UNI:255', ''),
                        'member_status'    => array('BOOL', 0) ,
						'member_level'     => array('USINT', 0),
						'member_race_id'   => array('USINT', 0),
						'member_class_id'  => array('USINT', 0),
						'member_rank_id'   => array('USINT', 0),
						'member_comment'   => array('VCHAR_UNI:255', ''),
						'member_joindate'  => array('TIMESTAMP', 0),
            			'member_outdate'   => array('TIMESTAMP', 0),
            			'member_guild_id'  => array('USINT', 0),
            			'member_gender_id' => array('USINT', 0),
            			'member_achiev'    => array('UINT', 0),
            			'member_armory_url' => array('VCHAR:255', ''),
            			'phpbb_user_id' 	=> array('UINT', 0),
            
                    ),
                    'PRIMARY_KEY'  => 'member_id',
                    'KEYS'         => array('member_name'    => array('UNIQUE', 'member_name')),
                ),
            ),

            array($table_prefix . 'bbdkp_dkpsystem', array(
                    'COLUMNS'        => array(
                        'dkpsys_id'    		=> array('USINT', NULL, 'auto_increment'),
                        'dkpsys_name'   	=> array('VCHAR_UNI:255', ''),
                        'dkpsys_status'     => array('VCHAR:2', 'Y'),
                        'dkpsys_addedby'	=> array('VCHAR_UNI:255', ''),
                        'dkpsys_updatedby'	=> array('VCHAR_UNI:255', ''),
                        'dkpsys_default'	=> array('VCHAR:2', 'N'),
                    ),
                    'PRIMARY_KEY'    => 'dkpsys_id',
                    'KEYS'         => array('dkpsys_name'    => array('UNIQUE', 'dkpsys_name')),
                ),
            ),

            array($table_prefix . 'bbdkp_events', array(
                    'COLUMNS'        => array(
                        'event_id'    		=> array('UINT', NULL, 'auto_increment'),
                        'event_dkpid'   	=> array('USINT', 0),
                        'event_name'     	=> array('VCHAR_UNI:255', ''),
            			'event_color'     	=> array('VCHAR:8', ''),
            			'event_imagename'       => array('VCHAR:255', ''),
                        'event_value'		=> array('DECIMAL:11', 0),
                        'event_added_by'	=> array('VCHAR_UNI:255', ''),
                        'event_updated_by'	=> array('VCHAR_UNI:255', ''),
                    ),
                    'PRIMARY_KEY'    => 'event_id',
                    'KEYS'            => array('event_dkpid'    => array('INDEX', 'event_dkpid')),
                    
                ),
            ),
            
		  array($table_prefix . 'bbdkp_memberdkp', array(
                    'COLUMNS'        	 => array(
                        'member_id'			=> array('UINT', 0),
                        'member_dkpid'		=> array('USINT', 0),
		  				'member_raid_value'	=> array('DECIMAL:11', 0),
		  				'member_time_bonus'	=> array('DECIMAL:11', 0),
		  				'member_zerosum_bonus'	=> array('DECIMAL:11', 0),
                        'member_earned'		=> array('DECIMAL:11', 0),		
		  				'member_raid_decay'	=> array('DECIMAL:11', 0),
						'member_spent'		=> array('DECIMAL:11', 0),
		  				'member_item_decay'	=> array('DECIMAL:11', 0),
						'member_adjustment' => array('DECIMAL:11', 0),
						'member_status' 	=> array('BOOL', 0) ,
						'member_firstraid'  => array('TIMESTAMP', 0),
						'member_lastraid'	=> array('TIMESTAMP', 0),
						'member_raidcount'	=> array('UINT', 0),
            
                    ),
                    'PRIMARY_KEY'  => array('member_dkpid', 'member_id'),
                ),
           ),

        array($table_prefix . 'bbdkp_adjustments', array(
              'COLUMNS'        => array(
                  'adjustment_id'        => array('UINT', NULL, 'auto_increment'),
				  'member_id'        	 => array('UINT', 0),
                  'adjustment_dkpid'     => array('USINT', 0),
                  'adjustment_value'     => array('DECIMAL:11', 0),
        		  'adjustment_date'      => array('TIMESTAMP', 0),
				  'adjustment_reason'    => array('VCHAR_UNI', ''),
				  'adjustment_added_by'  => array('VCHAR_UNI:255', ''),
				  'adjustment_updated_by'=> array('VCHAR_UNI:255', ''),
				  'adjustment_group_key' => array('VCHAR', ''),
                ),
                'PRIMARY_KEY'    => 'adjustment_id',
                'KEYS'         => array('member_id'    => array('INDEX', array('member_id', 'adjustment_dkpid'))),
          )),

         array($table_prefix . 'bbdkp_raids', array(
				'COLUMNS'        	=> array(
					'raid_id'			=> array('UINT', NULL, 'auto_increment'),
					'event_id'			=> array('UINT', 0),
					'raid_note'   		=> array('VCHAR_UNI:255', ''),
					'raid_start'  		=> array('TIMESTAMP', 0) ,
         			'raid_end'  		=> array('TIMESTAMP', 0) ,
					'raid_added_by' 	=> array('VCHAR_UNI:255', ''),
					'raid_updated_by' 	=> array('VCHAR_UNI:255', ''),
					),
				'PRIMARY_KEY'  => array('raid_id'),
				'KEYS'         => array('event_id'    => array('INDEX', 'event_id')),
            )),
              
		  array($table_prefix . 'bbdkp_raid_detail', array(
				'COLUMNS'		=> array(
					'raid_id'		=> array('UINT', 0),
					'member_id'		=> array('UINT', 0),
					'raid_value' 	=> array('DECIMAL:11', 0),
					'time_bonus' 	=> array('DECIMAL:11', 0),
					'zerosum_bonus' => array('DECIMAL:11', 0),
		  			'raid_decay' 	=> array('DECIMAL:11', 0),
				),
				'PRIMARY_KEY'  => array('raid_id', 'member_id')
			)),

                
          array($table_prefix . 'bbdkp_raid_items', array(
                    'COLUMNS'     => array(
                    'item_id'         => array('UINT', NULL, 'auto_increment'),
					'raid_id'         => array('UINT', 0),
                    'item_name'       => array('VCHAR_UNI:255', ''),
          			'member_id'		  => array('UINT', 0),
					'item_date'       => array('TIMESTAMP', 0),
					'item_added_by'   => array('VCHAR_UNI:255', ''),
					'item_updated_by' => array('VCHAR_UNI:255', ''),
           			'item_group_key'  => array('VCHAR', ''),
           			'item_gameid' 	  => array('UINT', 0),
					'item_value'      => array('DECIMAL:11', 0.00),
          			'item_decay'      => array('DECIMAL:11', 0.00), // decay of itemvalue
          			'item_zs'      	  => array('BOOL', 0), // if this flag is set the itemvalue will be distributed over raid
                    ),
                    'PRIMARY_KEY'     => 'item_id',
                    'KEYS'         => array('raid_id'    => array('INDEX', 'raid_id')),					
                 ),
            ),

          array($table_prefix . 'bbdkp_logs', array(
                    'COLUMNS'           => array(
                       'log_id'        => array('UINT', NULL, 'auto_increment'),
                       'log_date'      => array('TIMESTAMP', 0),
                       'log_type'      => array('VCHAR_UNI:255', ''),
					   'log_action'    => array('TEXT_UNI', ''),
					   'log_ipaddress' => array('VCHAR:15', ''),
					   'log_sid'       => array('VCHAR:32', ''),
					   'log_result'    => array('VCHAR', ''),
					   'log_userid'    => array('UINT', 0),
            
                    ),
                    'PRIMARY_KEY'  => 'log_id',
                    'KEYS'         => array(
		               'log_userid'	=> array('INDEX', 'log_userid'),
		               'log_type'		=> array('INDEX', 'log_type'),
		               'log_ipaddress'	=> array('INDEX', 'log_ipaddress'),
                    )
                )),
            
		  array($table_prefix . 'bbdkp_plugins', array(
                  'COLUMNS'        	=> array(
                      'name'			=> array('VCHAR_UNI:255', ''),
                      'value'			=> array('BOOL', 0),
                      'version'  		=> array('VCHAR:50', ''),
                      'orginal_copyright' => array('VCHAR_UNI:150', ''),
                      'bbdkp_copyright'  	=> array('VCHAR_UNI:150', ''),
                  )
               ),
           ),

       ),
       
       'table_row_insert'	=> array(

       // we insert a dummy guild (None) for guildless people and also the default guild
         array($table_prefix .'bbdkp_memberguild',
           array(
           		  // guildless -> do show on roster
                  array('id'  => 0,
                      'name' => '(None)',
                      'realm' => utf8_normalize_nfc(request_var('realm', '', true)),
                      'region' => request_var('region', ''), 
                      'roster' => 1
                  		),
                  
           		  // default guild -> do show on roster                  
                  array('id'  => 1,
                      'name' => ( request_var('guildtag', ' ')== ' ' ? utf8_normalize_nfc(request_var('guildtag', ' ', true)) : 'default'), 
                      'realm' => ( request_var('realm', ' ', true) == ' ' ? utf8_normalize_nfc(request_var('realm', ' ', true)) : 'default'),  
                      'region' => (isset($_POST['region']) ? request_var('region', ' ') : 'EU'), 
                  	  'roster' => 1 ),
                  )
           ),
			
		 array($table_prefix . 'bbdkp_member_ranks', 
			 array(
			 
			 	// standard member rank
	       		array(
	       			'guild_id'	=> 1,	
					'rank_id'	=> 0,
					'rank_name'	=> 'Member',
					'rank_hide'	=> 0,
					'rank_prefix'	=> '',
					'rank_suffix'	=> '',
				 ),
				 
				 
				// operating rank, undeletable rank
	       		array(
	       			'guild_id'	=> 1,	
					'rank_id'	=> 90,
					'rank_name'	=> 'Operating',
					'rank_hide'	=> 1,
					'rank_prefix'	=> '',
					'rank_suffix'	=> '',
				 ),
				 
				// Out rank : for unguilded, undeletable rank
	       		array(
	       			'guild_id'	=> 0,	
					'rank_id'	=> 99,
					'rank_name'	=> 'Out',
					'rank_hide'	=> 1,
					'rank_prefix'	=> '',
					'rank_suffix'	=> '',
				 ),
				)
			), 
			
		 // create the guildbank character
		 array($table_prefix . 'bbdkp_memberlist', 
			 array(
	       		array(
	       			'member_name' 		=> 'Guildbank', 
					'member_status'		=> 1,
					'member_level'		=> 1,
					'member_race_id'	=> 0,
					'member_class_id'	=> 0,
					'member_rank_id'	=> 90,
	       			'member_comment'	=> 'The guildbank toon',
	       			'member_joindate'	=> time(),
	       			'member_outdate'	=> '1893456000',
	       			'member_guild_id'	=> 1,
	       			'member_gender_id'	=> 1,
	       			'phpbb_user_id'		=> $user->data['user_id'],
				 ),
			))
						
		
			
		),

    	// create two basic permissions
	   'permission_add' => array(
            array('a_dkp', true),
            array('u_dkp', true) 
      	),
      
        // Assign default permissions to Full admin
        'permission_set' => array(
            array('ROLE_ADMIN_FULL', 		'a_dkp'),
            array('ROLE_ADMIN_FULL', 		'u_dkp'),
            array('ROLE_USER_STANDARD', 	'u_dkp'),
        ),
        
        // add new parameters
        'config_add' => array(
        
        	//bbdkp settings
        	
        	// guildname				
			array('bbdkp_guildtag', utf8_normalize_nfc(request_var('guildtag', '', true)), true),
	        // default realm & region
	        array('bbdkp_default_realm', ( request_var('realm', ' ', true) == ' ' ? utf8_normalize_nfc(request_var('realm', ' ', true)) : 'default') , true),  
	        array('bbdkp_default_region', request_var('region', ''), true),  
			array('bbdkp_eqdkp_start', mktime(0, 0, 0, date("m")  , date("d"), date("Y")) , true),
			array('bbdkp_date_format', 'd.m.y', true),
			array('bbdkp_dkp_name', 'DKP', true),
			array('bbdkp_default_game', request_var('game', ''), true),
	        //default dkp language
	        array('bbdkp_lang', 'en', true),
	        
	        // news limit
			array('bbdkp_user_nlimit', '5', true),
	        // roster layout: main parameter for steering roster layout 
			array('bbdkp_roster_layout', '1', true),
	        // showachiev : show the achievement points
	        array('bbdkp_show_achiev', '0', true),
			// guildfaction : limit the possible races to be available to users to those available in the guild's chosen faction
			array('bbdkp_guild_faction', '1', true),
	        //guildmemberlist paging
	        array('bbdkp_user_llimit', '20', true),
	        
	        //standings
			array('bbdkp_hide_inactive', '1', true),
			array('bbdkp_inactive_period', '150', true),
			array('bbdkp_list_p1', '30', true),
			array('bbdkp_list_p2', '60', true),
         	array('bbdkp_list_p3', '90', true),    
			
			//events
			array('bbdkp_user_elimit', '30', true),
			
			//adjustments
			array('bbdkp_user_alimit', '30', true),
			array('bbdkp_active_point_adj', '10.00', true),
			array('bbdkp_inactive_point_adj', '-10.00', true),
			array('bbdkp_starting_dkp', '15.00', true), 
			
			//items
			array('bbdkp_user_ilimit', '20', true),

			//raids
			array('bbdkp_user_rlimit', '20', true),
			
			//epgp
			array('bbdkp_epgp', 0, true),	
			array('bbdkp_basegp', 0, true),
			
			//decay			
			array('bbdkp_decay', 0, true),
			array('bbdkp_raiddecaypct', 5, true),	
			array('bbdkp_itemdecaypct', 5, true),			
			array('bbdkp_decayfrequency', 1, true),
			array('bbdkp_decayfreqtype', 1, true),

			//time
			array('bbdkp_timebased', 0, true),
			array('bbdkp_dkptimeunit', 5, true),
			array('bbdkp_timeunit', 30, true),
			array('bbdkp_standardduration', 1, true),
			
			//zerosum
			array('bbdkp_zerosum', 0, true),
			array('bbdkp_bankerid', 0, true),
			array('bbdkp_zerosumdistother', 0, true),

            // portal settings
	        // number of news
	        array('bbdkp_n_news', 5, true),   
	        // news forum id
	        array('bbdkp_news_forumid', 2 , true),   
	        // number of items
	        array('bbdkp_n_items',5 , true),   
	        // recruitment forum id
	        array('bbdkp_recruit_forumid', 3, true),
			// 1 if open,  if closed             
	        array('bbdkp_recruitment', 0, true ), 
			// show loot block          
	        array('bbdkp_portal_loot', 1, true ), 
			// show recruitment block          
	        array('bbdkp_portal_recruitment', 1, true ), 
			// show link block          
	        array('bbdkp_portal_links', 1, true ), 
		    // show post edits in portal          
	        array('bbdkp_portal_showedits', 1, true ),
	        // showing or hiding portal
	        array('bbdkp_portal_menu', 1, true),
	         
	        ),
          
        // add the bbdkp modules to ACP using the info files, 
		'module_add' => array(
      		 /*
             * First, lets add maincategory named ACP_DKP to the root.
             * note to validation team : phpbb MOD policy wants this in 
             * ACP_CAT_DOT_MODS but due to the size of our tree we place it on top (0)
             * 
             */ 
            array('acp', 0, 'ACP_CAT_DKP'),
            
             /*
             * add main menu
             */
            array('acp', 'ACP_CAT_DKP', 'ACP_DKP_MAINPAGE'),
            array('acp', 'ACP_DKP_MAINPAGE', array(
           		 'module_basename' => 'dkp',
            	 'modes'           => array('mainpage', 'dkp_config', 'dkp_logs', 'dkp_indexpageconfig') ,
        		),

            ),

            /*
             * add member management menu
             * note added the roster here
             */
            array('acp', 'ACP_CAT_DKP', 'ACP_DKP_MEMBER'),
            
            // add memberlist-add-ranks-roster
            array('acp', 'ACP_DKP_MEMBER', array(
           		 'module_basename' => 'dkp_mm',
            	 'modes'           => array('mm_listguilds', 'mm_addguild', 'mm_ranks', 'mm_listmembers', 'mm_addmember'),
        		),
            ),          
            
           array('acp', 'ACP_DKP_MEMBER', array(
           		 'module_basename' => 'dkp_game',
            	 'modes'           => array('listgames', 'addfaction', 'addrace', 'addclass'),
        		)), 
            
            /*
             * add raid management menu
             */
            array('acp', 'ACP_CAT_DKP', 'ACP_DKP_RAIDS'),
            
            // add raid pools 
            array('acp', 'ACP_DKP_RAIDS', array(
           		 'module_basename' => 'dkp_sys',
            	 'modes'           => array('adddkpsys', 'listdkpsys' ),
        		),
            ),
            
            // add events modules
            array('acp', 'ACP_DKP_RAIDS', array(
           		 'module_basename' => 'dkp_event',
            	 'modes'           => array('addevent', 'listevents'),
        		),
            ),            
            
            // add manual raid modules
            array('acp', 'ACP_DKP_RAIDS', array(
           		 'module_basename' => 'dkp_raid',
            	 'modes'           => array('addraid', 'editraid', 'listraids'),
        		),
            ),            
            
            // add item modules
            array('acp', 'ACP_DKP_RAIDS', array(
           		 'module_basename' => 'dkp_item',
            	 'modes'           => array('listitems', 'edititem', 'search', 'viewitem'),
        		),
            ),
            
            /*
             * add member dkp menu
             * note the transfer moved to member dkp
             */  
            array('acp', 'ACP_CAT_DKP', 'ACP_DKP_MDKP'),
                        
            // add dkp - edit dkp - transfer dkp
            array('acp', 'ACP_DKP_MDKP', array(
           		 'module_basename' => 'dkp_mdkp',
            	 'modes'           => array('mm_listmemberdkp', 'mm_editmemberdkp', 'mm_transfer'),
        		),
            ),        

            // add dkp adjustments
            array('acp', 'ACP_DKP_MDKP', array(
           		 'module_basename' => 'dkp_adj',
            	 'modes'           => array('addiadj', 'listiadj'),
        		),
            ),        
            
			// Add the UCP module in which you link bbDKP memberids to your phpbb account
			array('ucp', 0, 'UCP_DKP'),
         	
			// Add one UCP module to the new category
			array('ucp', 'UCP_DKP', array(
					'module_basename'   => 'dkp',
					'module_langname'   => 'UCP_DKP_CHARACTERS',
					'module_mode'       => 'characters',
					'module_auth'       => '',
				),
			),
				

          ),
            
        'custom' => array( 
            'acplink', 
       ), 
    ),
    
    '1.2.3' => array(
	  // add new game install configs
	  // 1 is installed, 0 is not
        'config_add' => array(
			array('bbdkp_games_aion', 0, true),
			array('bbdkp_games_daoc', 0, true),
			array('bbdkp_games_eq', 0, true),
			array('bbdkp_games_eq2', 0, true),
			array('bbdkp_games_FFXI', 0, true),
			array('bbdkp_games_lotro', 0, true),
			array('bbdkp_games_rift', 0, true),
			array('bbdkp_games_vanguard', 0, true),
			array('bbdkp_games_wow', 0, true),
			array('bbdkp_games_warhammer', 0, true),
			array('bbdkp_games_swtor', 0, true),
	      ),
	    
		//add new columns, then add keys and new pk in custom function
		'table_column_add' => array(
			array($table_prefix . 'bbdkp_classes', 'game_id' , array('VCHAR', '')),
			array($table_prefix . 'bbdkp_classes', 'class_faction_id' , array('UINT', 0)),
			array($table_prefix . 'bbdkp_races', 'game_id' , array('VCHAR', '')),
			array($table_prefix . 'bbdkp_factions', 'game_id' , array('VCHAR', '')),
			array($table_prefix . 'bbdkp_language', 'game_id' , array('VCHAR', '')),
			array($table_prefix . 'bbdkp_memberlist', 'game_id' , array('VCHAR', '')),
			array($table_prefix . 'bbdkp_memberlist', 'member_portrait_url' , array('VCHAR', '')),
		),

    	// create new ucp permission
	   'permission_add' => array(
            array('u_dkpucp', true) 
      	),
      
        // Assign new ucp permission
        'permission_set' => array(
            array('ROLE_ADMIN_FULL', 		'u_dkpucp'),
            array('ROLE_USER_STANDARD', 	'u_dkpucp'),
        ),
		
		'custom' => array(
			// add columns to new indexes 
            'tableupdates123',
			// purge and reinstall chosen gametables according to latest specs
			'gameinstall'
      	)
      	
      	
      	
		),
		
		'1.2.4' => array(
			// no changes except in php/html/js 
		)
		,
		
		
      
);

// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);


/******************************
 * 
 *  gametable installer
 *  at each bbdkp verionupdate this function is updated for latest specs. 
 * 
 * 
 */
function gameinstall($action, $version)
{
	global $db, $table_prefix, $umil, $user, $phpbb_root_path, $phpEx; 
	switch ($action)
	{
		
		case 'install' :
		case 'update' :
			switch ($version)
			{
				case '1.2.3':
		        // dkp system
		        // if there is no dkp system then insert a default one
		        $dkpsys_id = 0;
			    $result = $db->sql_query('select count(*) as num_dkp from ' . $table_prefix . 'bbdkp_dkpsystem');
				$total_dkps = (int) $db->sql_fetchfield('num_dkp');
				$db->sql_freeresult($result);
				if($total_dkps == 0)
				{
				    $sql_ary = array();
					$data = array('dkpsys_id' => '1' , 'dkpsys_name' => 'Default DKP Pool' , 'dkpsys_status' => 'Y', 'dkpsys_addedby' =>  'admin' , 'dkpsys_default' =>  'Y' ) ;
					$sql= 'insert into ' . $table_prefix . 'bbdkp_dkpsystem' .  $db->sql_build_array('INSERT', $data);
					$db->sql_query($sql);
					$dkpsys_id = $db->sql_nextid();
					unset ($data);
					
				}
				else
				{
					$result = $db->sql_query('select max(dkpsys_id) as dkpsys_id from ' . $table_prefix . 'bbdkp_dkpsystem');
					$dkpsys_id = (int) $db->sql_fetchfield('dkpsys_id');
					$db->sql_freeresult($result);
				}
				
		        // event
		        // if there is no event then insert a default one 
			    $result = $db->sql_query('select count(*) as num_events from ' . $table_prefix . 'bbdkp_events');
				$total_events = (int) $db->sql_fetchfield('num_events');
				$db->sql_freeresult($result);
				if($total_events == 0)
				{
				    $sql_ary = array();
					$data = array('event_dkpid' => $dkpsys_id , 'event_name' => 'Default event', 'event_color' => '#000000', 'event_value' => 10 ) ;
					$sql= 'insert into ' . $table_prefix . 'bbdkp_events' .  $db->sql_build_array('INSERT', $data);
					$db->sql_query($sql);					
				}
				
			    // now insert core gamedata
			   
			    // if flag is set then
			    //   if the game is already installed in 1.2.2 then don't overwrite userdata otherwise do
			    //   else install game
			    //   set $config 

				$installed_games = array();
				
				if(request_var('aion', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'aion') 
						{	
							install_aion($action, $version); 
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'aion' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'aion' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'aion' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'aion' where game_id is null";
						}
					}
					else
					{
						install_aion($action, $version); 
					}
					$umil->config_update('bbdkp_games_aion', 1, true);
					$installed_games[] = 'aion';
				}

				if(request_var('daoc', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'daoc') 
						{	
							install_daoc($action, $version); 
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'daoc' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'daoc' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'daoc' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'daoc' where game_id is null";
						}
						
					}
					else
					{
						install_daoc($action, $version); 
					}
					$umil->config_update('bbdkp_games_daoc', 1, true);
					$installed_games[] = 'daoc';
					
				}
				
				
				if(request_var('eq', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'eq') 
						{	
							install_eq($action, $version); 
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'eq' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'eq' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'eq' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'eq' where game_id is null";
						}
					}
					else
					{
						install_eq($action, $version); 
					}
					$umil->config_update('bbdkp_games_eq', 1, true);
					$installed_games[] = 'eq';
				}
				
				if(request_var('eq2', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'eq2') 
						{	
							install_eq2($action, $version); 
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'eq2' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'eq2' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'eq2' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'eq2' where game_id is null";
						}						
					}
					else
					{
						install_eq2($action, $version); 
					}
					$umil->config_update('bbdkp_games_eq2', 1, true);
					$installed_games[] = 'eq2';
				}

				if(request_var('FFXI', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'FFXI') 
						{	
							install_ffxi($action, $version); 
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'FFXI' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'FFXI' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'FFXI' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'FFXI' where game_id is null";
						}									
					}
					else
					{
						install_ffxi($action, $version); 
					}
					$umil->config_update('bbdkp_games_FFXI', 1, true);
					$installed_games[] = 'FFXI';
				}
				
				if(request_var('lotro', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'lotro') 
						{	
							install_lotro($action, $version); 
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'lotro' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'lotro' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'lotro' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'lotro' where game_id is null";
						}								
					}
					else
					{
						install_lotro($action, $version); 
					}
					$umil->config_update('bbdkp_games_lotro', 1, true);
					$installed_games[] = 'lotro';					
				}

				if(request_var('rift', 0) == 1)
				{
					// new game
					install_rift($action, $version); 
					$umil->config_update('bbdkp_games_rift', 1, true);
					$installed_games[] = 'rift';
				}
				
				if(request_var('vanguard', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'vanguard') 
						{	
							install_vanguard($action, $version); ;
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'vanguard' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'vanguard' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'vanguard' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'vanguard' where game_id is null";
						}							
					}
					else
					{
						install_vanguard($action, $version); 
					}
					$umil->config_update('bbdkp_games_vanguard', 1, true);
					$installed_games[] = 'vanguard';
				}
				
				if(request_var('warhammer', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'warhammer') 
						{	
							install_warhammer($action, $version); 
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'warhammer' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'warhammer' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'warhammer' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'warhammer' where game_id is null";
						}								
					}
					else
					{
						install_warhammer($action, $version); 
					}
					$umil->config_update('bbdkp_games_warhammer', 1, true);
					$installed_games[] = 'vanguard';
				}
				
				
				if(request_var('wow', 0) == 1)
				{
					if (isset($config['bbdkp_default_game'])) 
					{	
						if ($config['bbdkp_default_game'] != 'wow') 
						{	
							install_wow($action, $version);
						}
						else 
						{
							// update existing static tables
							$sql = "UPDATE " . $table_prefix . 'bbdkp_classes' . " set game_id = 'wow' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_races' . " set game_id = 'wow' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_factions' . " set game_id = 'wow' where game_id is null";
							$sql = "UPDATE " . $table_prefix . 'bbdkp_language' . " set game_id = 'wow' where game_id is null";
						}								
					}
					else
					{
						install_wow($action, $version); 
					}
					$umil->config_update('bbdkp_games_wow', 1, true);
					$installed_games[] = 'wow';
				}
				
				if(request_var('swtor', 0) == 1)
				{
					// New game
					install_swtor($action, $version); 
					$umil->config_update('bbdkp_games_swtor', 1, true);
					$installed_games[] = 'swtor';
				}
				
				// handle the members
				if (isset($config['bbdkp_default_game'])) 
				{
					// update the existing member table to the old default_game
					$sql = "UPDATE " . $table_prefix . 'bbdkp_memberlist' . " set game_id = '" . $config['bbdkp_default_game'] . "'";
					$db->sql_query($sql);
				}
				else
				{
	                foreach($installed_games as $gameid)
	                {
	                	// update the guildbank (only installed member thus far) with the first installed gameid
						$sql = "UPDATE " . $table_prefix . 'bbdkp_memberlist' . " set game_id = '" . $gameid . "' where member_rank_id = '90' ";
						$db->sql_query($sql);
						// now break we dont need to run this more than once.
						break;
	                }
				}

			     // remove the old config, is obsolete now.
			    $umil->config_remove('bbdkp_default_game');
			    
			    // report what we did to umil
				return array('command' => sprintf($user->lang['UMIL_GAME123'], implode(", ", $installed_games)) , 'result' => 'SUCCESS');
				
			}
			break;
			case 'uninstall' :
				return array('command' => 'UMIL_GAMEUNINST123', 'result' => 'SUCCESS');
	}
					
}

/*
 * 
 */
function tableupdates123($action, $version)
{
	global $user, $umil, $config, $db, $table_prefix; 
	switch ($action)
	{
				
		case 'install' :
			switch ($version)
				{
					case '1.2.3':
					// remove unique index on class table
					$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_classes' . " DROP INDEX class_id";
					$db->sql_query($sql);

					// make new unique composite
					$sql= "CREATE UNIQUE INDEX classes ON " . $table_prefix . 'bbdkp_classes' . " (game_id, class_id) ";
					$db->sql_query($sql);
				
					// race table
					$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_races' . " DROP PRIMARY KEY";
					$db->sql_query($sql);

					// make new pk 
					$sql= "ALTER TABLE " . $table_prefix . 'bbdkp_races' . "  ADD PRIMARY KEY (game_id, race_id)";
					$db->sql_query($sql);
				
					// faction table
					$sql= "CREATE UNIQUE INDEX factions ON " . $table_prefix . 'bbdkp_factions' . " (game_id, faction_id)";
					$db->sql_query($sql);		
		
					// language table
					$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_language' . " DROP INDEX attribute_id ";
					$db->sql_query($sql);		

					// make new unique key
					$sql= "CREATE UNIQUE INDEX languages ON " . $table_prefix . 'bbdkp_language' . " (game_id, attribute_id, language, attribute) ";
					$db->sql_query($sql);
			}
			break;
		case 'update':
				switch ($version)
				{
					case '1.2.3':
				    $umil->table_remove($table_prefix . 'bbdkp_news');
			    
					// remove old unique index on class table
					$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_classes' . " DROP INDEX class_id";
					$db->sql_query($sql);

					// make new unique composite
					$sql= "CREATE UNIQUE INDEX classes ON " . $table_prefix . 'bbdkp_classes' . " (game_id, class_id) ";
					$db->sql_query($sql);
				
					// race table
					$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_races' . " DROP PRIMARY KEY";
					$db->sql_query($sql);

					// make new pk 
					$sql= "ALTER TABLE " . $table_prefix . 'bbdkp_races' . "  ADD PRIMARY KEY (game_id, race_id)";
					$db->sql_query($sql);
				
					// faction table
					$sql= "CREATE UNIQUE INDEX factions ON " . $table_prefix . 'bbdkp_factions' . " (game_id, faction_id)";
					$db->sql_query($sql);		
		
					// language table
					$sql = "ALTER TABLE " . $table_prefix . 'bbdkp_language' . " DROP INDEX attribute_id ";
					$db->sql_query($sql);		

					// make new unique key
					$sql= "CREATE UNIQUE INDEX languages ON " . $table_prefix . 'bbdkp_language' . " (game_id, attribute_id, language, attribute) ";
					$db->sql_query($sql);
					
					/* remove old news module from 1.2.2 */
					if($umil->module_exists('acp', 'ACP_DKP_NEWS','ACP_DKP_NEWS_ADD'))
					{
						$umil->module_remove('acp','ACP_DKP_NEWS','ACP_DKP_NEWS_ADD');
					}
					
					if($umil->module_exists('acp', 'ACP_DKP_NEWS','ACP_DKP_NEWS_LIST'))
					{
						$umil->module_remove('acp','ACP_DKP_NEWS','ACP_DKP_NEWS_LIST');
					}
					
					if($umil->module_exists('acp', 'ACP_CAT_DKP','ACP_DKP_NEWS'))
					{
						$umil->module_remove('acp','ACP_CAT_DKP','ACP_DKP_NEWS');
					}
					
					
					
			}
			break;
		case 'uninstall' :
			switch ($version)
			{
				case '1.2.3':
					// truncate table data before removing new columns on uninstall or else we get an index error.
					$db->sql_query('TRUNCATE TABLE ' . $table_prefix . "bbdkp_classes ");
					$db->sql_query('TRUNCATE TABLE ' . $table_prefix . "bbdkp_races  ");
					$db->sql_query('TRUNCATE TABLE ' . $table_prefix . "bbdkp_factions ");
					$db->sql_query('TRUNCATE TABLE ' . $table_prefix . "bbdkp_language ");
					break;
			}
			break;
	}
	return array('command' => 'UMIL_UPD123', 'result' => 'SUCCESS');
	
}

/***************************************
 *
 * adds config value with dkp module Id
 */
function acplink($action, $version)
{
    global $db, $table_prefix, $umil, $phpbb_root_path, $phpEx;
	switch ($action)
	{
		// lookup first node module id 
		case 'install' :
		case 'update' :
		  $sql = 'SELECT module_id FROM ' . $table_prefix . "modules WHERE module_langname = 'ACP_CAT_DKP'";
          $result = $db->sql_query($sql);
          $modid = (int) $db->sql_fetchfield('module_id'); 
          if ($umil->config_exists('bbdkp_module_id'))
          {
              $umil->config_update('bbdkp_module_id', $modid, false);
          }
          else 
          {
              $umil->config_add('bbdkp_module_id', $modid, false);
          }
          $db->sql_freeresult($result);
          return array('command' => 'UMIL_INSERT_DKPLINK', 'result' => 'SUCCESS');
	      break;
		case 'uninstall' :
    	    if ($umil->config_exists('bbdkp_module_id'))
            {
                  $umil->config_remove('bbdkp_module_id');
            }
			return array('command' => 'UMIL_REMOVE_DKPLINK', 'result' => 'SUCCESS');
		  break; 		  
	}
}

/**************************************
 *  
 * function for rendering region list
 * 
 */
function regionoptions($selected_value, $key)
{
	global $user;

    $regions = array(
    	'EU'     			=> "European region", 
    	'US'     			=> "US region",     	 
    );
    
    $default = 'US'; 
	$pass_char_options = '';
	foreach ($regions as $key => $region)
	{
		$selected = ($selected_value == $default) ? ' selected="selected"' : '';
		$pass_char_options .= '<option value="' . $key . '"' . $selected . '>' . $region . '</option>';
	}

	return $pass_char_options;
}


/**************************************
 *  
 * global function for clearing cache
 * 
 */
function bbdkp_caches($action, $version)
{
    global $umil;
    
    $umil->cache_purge();
    $umil->cache_purge('imageset');
    $umil->cache_purge('template');
    $umil->cache_purge('theme');
    $umil->cache_purge('auth');
    
    return 'UMIL_CACHECLEARED';
}

/***
 * checks if there is an older install
 */
function check_oldbbdkp()
{
	global $db, $table_prefix, $umil, $config, $phpbb_root_path, $phpEx;
	
	include($phpbb_root_path . 'umil/umil.' . $phpEx);
	$umil=new umil;
	
	// check config		
	if($umil->config_exists('bbdkp_version'))
    {
		if(version_compare($config['bbdkp_version'], '1.2.2') == -1 )
		{
			//stop here, the version is less than 1.2.2
			//redirect(append_sid($phpbb_root_path . '/olddkpupdate/index.'. $phpEx));
			trigger_error( $user->lang['ERROR_MINIMUM122'], E_USER_WARNING);  
			
		}
		
    }   	

	
}


?>