<?php

 /* recruitment block
  @package bbDkp
  @copyright 2009 bbdkp <http://code.google.com/p/bbdkp/>
  @license http://opensource.org/licenses/gpl-license.php GNU Public License
  @version $Id$
  @author Sajaki, Blazeflack, Malfate

 */


if (!defined('IN_PHPBB'))
{
   exit;
}

/**  begin recruitment block ***/

$color =array(
         array(0, "N/A", "#000000", "rec.png" ),
         array(1, "Closed", "#AAAAAA", "rec_closed.png" ),
         array(2, "Low", "#FFBB44", "rec_low.png" ),
         array(3, "Medium", "#FF3300", "rec_med.png" ),
         array(4, "High", "#AA00AA", "rec_high.png" ),
);

if ($config['bbdkp_recruitment'] == 1)
{
	$template->assign_block_vars('status', array(
		'MESSAGE' 	=> $user->lang['RECRUIT_MESSAGE'],					
	));
	
	$rec_forum_id  = $config['bbdkp_recruit_forumid'];
	
	// get recruitment statuses from class table
    $sql_array = array(
	    'SELECT'    => 	' c.class_id, l.name as class_name, c.colorcode, 
	    				  c.imagename, c.dps, c.tank, c.heal ', 
	    'FROM'      => array(
	        CLASS_TABLE 	=> 'c',
	        BB_LANGUAGE		=> 'l', 
	    	),
	    'WHERE'		=> " (c.dps !=0 or c.heal != 0 or c.tank != 0) and c.game_id = l.game_id and c.class_id > 0 and l.attribute_id = c.class_id  AND l.language= '" . $config['bbdkp_lang'] . "' AND l.attribute = 'class' ",
	    
		'ORDER_BY'	=> ' l.name ',
	    );
	    
	$sql = $db->sql_build_query('SELECT', $sql_array);    
    
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) 
    {
        $class[$row['class_id']] =$row['class_name']; 
        $template->assign_block_vars('rec', array(
    	    'CLASSID' 		=> $row['class_id'],
            'CLASS'   		=> $row['class_name'],  
        	'IMAGENAME' 	=> $row['imagename'],
			'CLASSCOLOR' 	=> $row['colorcode'],        
        	'TANKCOLOR'  	=> $color[$row['tank']][2],
			'TANKFORUM'  	=> append_sid("{$phpbb_root_path}viewforum.$phpEx", 'f=' . $rec_forum_id), 
			'TANKTEXT'  	=> $color[$row['tank']][1], 
            'TANK'      	=> $color[$row['tank']][3],
			'DPSCOLOR' 		=> $color[$row['dps']][2],
        	'DPSFORUM' 		=> append_sid("{$phpbb_root_path}viewforum.$phpEx", 'f=' . $rec_forum_id),   
		    'DPSTEXT'  		=> $color[$row['dps']][1], 
            'DPS'      		=> $color[$row['dps']][3],
			'HEALCOLOR' 	=> $color[$row['heal']][2],
        	'HEALFORUM' 	=> append_sid("{$phpbb_root_path}viewforum.$phpEx", 'f=' . $rec_forum_id),   
		    'HEALTEXT' 		=> $color[$row['heal']][1], 
            'HEAL'      	=> $color[$row['heal']][3],
        ));
	}
	
	
	$db->sql_freeresult($result);
}
else 
{
	$template->assign_block_vars('status', array(
       	'S_DISPLAY_RECRUIT' => true, 
		'MESSAGE' 	=> $user->lang['RECRUIT_CLOSED'],					
	));
}

$template->assign_vars(array(
	'S_DISPLAY_RECRUIT' => true, 
));


/**  end recruitment block ***/



?>