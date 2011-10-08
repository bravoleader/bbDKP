<?php
/**
 * bbdkp everquest update data
 * @package bbDkp-update
 * @copyright (c) 2009 bbDkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id$
 * 
 */


/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

function update_eq($bbdkp_table_prefix)
{
    global  $db, $table_prefix, $umil, $user;
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'classes');
   
    $sql_ary = array();
    // Everquest classes
    $sql_ary[] = array('class_id' => '0', 'class_name' => 'Unknown', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '1', 'class_name' => 'Warrior', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '2', 'class_name' => 'Rogue', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '3', 'class_name' => 'Monk', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '4', 'class_name' => 'Ranger', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '5', 'class_name' => 'Paladin', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '6', 'class_name' => 'Shadow Knight', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '7', 'class_name' => 'Bard', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '8', 'class_name' => 'Beastlord', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '9', 'class_name' => 'Cleric', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '10', 'class_name' => 'Druid', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '11', 'class_name' => 'Shaman', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '12', 'class_name' => 'Enchanter', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '13', 'class_name' => 'Wizard', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '14', 'class_name' => 'Necromancer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '15', 'class_name' => 'Magician', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 70 );
    $sql_ary[] = array('class_id' => '16', 'class_name' => 'Berserker', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 70 );

    $db->sql_multi_insert( $bbdkp_table_prefix . 'classes', $sql_ary);
   	unset ($sql_ary); 

    unset ($sql_ary);   	
    // class roles
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'roles');
    $sql_ary = array();
    $sql_ary[] = array('role_id' => 1, 'role_name' => 'Tank' );
    $sql_ary[] = array('role_id' => 2, 'role_name' => 'Melee' );
    $sql_ary[] = array('role_id' => 3, 'role_name' => 'Caster' );
    $sql_ary[] = array('role_id' => 4, 'role_name' => 'Healer' );
    $sql_ary[] = array('role_id' => 5, 'role_name' => 'Crowd' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'roles', $sql_ary);
    unset ($sql_ary); 
    
    
   	// Everquest factions
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'factions');
    $sql_ary = array();
    $sql_ary[] = array('faction_id' => 1, 'faction_name' => 'Good' );
    $sql_ary[] = array('faction_id' => 2, 'faction_name' => 'Evil' );
    $sql_ary[] = array('faction_id' => 3, 'faction_name' => 'Neutral' );

    $db->sql_multi_insert( $bbdkp_table_prefix . 'factions', $sql_ary);
    unset ($sql_ary); 
    
    // Everquest races
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'races');
    $sql_ary = array();
    $sql_ary[] = array('race_id' => 0, 'race_name' => 'Unknown' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 1, 'race_name' => 'Gnome' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 2, 'race_name' => 'Human' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 3, 'race_name' => 'Barbarian' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 4, 'race_name' => 'Dwarf' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 5, 'race_name' => 'High Elf' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 6, 'race_name' => 'Half Elf' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 7, 'race_name' => 'Dark Elf' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 8, 'race_name' => 'Wood Elf' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 9, 'race_name' => 'Vah Shir' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 10, 'race_name' => 'Troll' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 11, 'race_name' => 'Ogre' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 12, 'race_name' => 'Froglok' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 13, 'race_name' => 'Iksar' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 14, 'race_name' => 'Erudite' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 15, 'race_name' => 'Halfling' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 16, 'race_name' => 'Drakkin' , 'race_faction_id' => 3 );
   
    $db->sql_multi_insert( $bbdkp_table_prefix . 'races', $sql_ary);

    // bossprogress for Everquest
    // no info exists on this so we have entered dummy values
    unset ($sql_ary); 
	if ($umil->table_exists($bbdkp_table_prefix . 'bb_config'))
	{
	    $sql = 'TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_config';
		$db->sql_query($sql);
		
		$sql_ary[] = array('config_name'	=> 'bossInfo', 'config_value'	=> 'rname' );
		$sql_ary[] = array('config_name'	=> 'dynBoss', 'config_value'	=> '0' );
		$sql_ary[] = array('config_name'	=> 'dynZone', 'config_value'	=> '0' );
		$sql_ary[] = array('config_name'	=> 'nameDelim', 'config_value'	=> '-' );
		$sql_ary[] = array('config_name'	=> 'noteDelim', 'config_value'	=> ',' );
		$sql_ary[] = array('config_name'	=> 'showSB', 'config_value'	=> '1' );
		$sql_ary[] = array('config_name'	=> 'source', 'config_value'	=> 'database' );
		$sql_ary[] = array('config_name'	=> 'style', 'config_value'	=> '0' );
		$sql_ary[] = array('config_name'	=> 'tables', 'config_value'	=> 'bbeqdkp' );
		$sql_ary[] = array('config_name'	=> 'zhiType', 'config_value'	=> '0' );
		$sql_ary[] = array('config_name'	=> 'zoneInfo', 'config_value'	=> 'rname' );
		$sql_ary[] = array('config_name' =>  'pb_dummyboss', 'config_value' => 'Dummy boss'  );
	    $sql_ary[] = array('config_name' =>  'pz_dummyzone', 'config_value' => 'Dummy Zone'  );	 
	    $sql_ary[] = array('config_name' =>  'sz_dummyzone', 'config_value' => '1'  );
	    	
		$db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config' , $sql_ary);
	}

    unset ($sql_ary); 
    // boss list     
    $sql_ary = array();

    // Boss offsets
	$db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_offsets');
	$sql_ary = array();
	$sql_ary[] = array('name' => 'dummyboss' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'dummyzone' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_offsets', $sql_ary);  
    unset ($sql_ary);
    
    // dkp system bbeqdkp_dkpsystem 
    // set to default
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'dkpsystem');
	$sql_ary = array();
	$sql_ary[] = array('dkpsys_id' => '1' , 'dkpsys_name' => 'Default' , 'dkpsys_status' => 'Y', 'dkpsys_addedby' =>  'admin' , 'dkpsys_default' =>  'Y' ) ;
	$db->sql_multi_insert( $bbdkp_table_prefix . 'dkpsystem', $sql_ary);
		
}


/*
 * new boss progress data for eq
 * generated with the spreadsheet
 * 
 */
function update_eq_bb2($bbdkp_table_prefix)
{
	global $db, $table_prefix, $umil, $user;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_zonetable' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_bosstable' )))
	{
		$sql_ary = array ();
		$sql_ary[] = array( 'id' => 1 , 'imagename' =>  'dummyzone' , 'game' =>  'eq' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1);
		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_zonetable', $sql_ary );
		unset ( $sql_ary );

		$sql_ary[] = array('id' => 1 ,  'imagename' =>  'dummyboss' , 'game' =>  'eq' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_bosstable', $sql_ary );
		unset ( $sql_ary );

		$sql_ary[] = array( 'id' => 1 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Dummy Zone' ,  'name_short' =>  'Dummy Zone' );
		$sql_ary[] = array( 'id' => 2 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Dummy Boss' ,  'name_short' =>  'Dummy Boss' );
		
		$sql_ary[] = array( 'id' => 3 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Zone par défaut' ,  'name_short' =>  'Zone par défaut' );
		$sql_ary[] = array( 'id' => 4 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Boss par défaut' ,  'name_short' =>  'Boss par défaut' );
		
		$sql_ary[] = array( 'id' => 5 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 6 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
		$sql_ary[] = array( 'id' => 7 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Rogue' ,  'name_short' =>  'Rogue' );
		$sql_ary[] = array( 'id' => 8 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Monk' ,  'name_short' =>  'Monk' );
		$sql_ary[] = array( 'id' => 9 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Ranger' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 10 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 11 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shadow Knight' ,  'name_short' =>  'Shadow Knight' );
		$sql_ary[] = array( 'id' => 12 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Bard' ,  'name_short' =>  'Bard' );
		$sql_ary[] = array( 'id' => 13 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Beastlord' ,  'name_short' =>  'Beastlord' );
		$sql_ary[] = array( 'id' => 14 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Cleric' ,  'name_short' =>  'Cleric' );
		$sql_ary[] = array( 'id' => 15 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Druid' ,  'name_short' =>  'Druid' );
		$sql_ary[] = array( 'id' => 16 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shaman' ,  'name_short' =>  'Shaman' );
		$sql_ary[] = array( 'id' => 17 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Enchanter' ,  'name_short' =>  'Enchanter' );
		$sql_ary[] = array( 'id' => 18 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Wizard' ,  'name_short' =>  'Wizard' );
		$sql_ary[] = array( 'id' => 19 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Necromancer' ,  'name_short' =>  'Necromancer' );
		$sql_ary[] = array( 'id' => 20 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Magician' ,  'name_short' =>  'Magician' );
		$sql_ary[] = array( 'id' => 21 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Berserker' ,  'name_short' =>  'Berserker' );
		
		$sql_ary[] = array( 'id' => 22 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 23 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
		$sql_ary[] = array( 'id' => 24 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Human' ,  'name_short' =>  'Human' );
		$sql_ary[] = array( 'id' => 25 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Barbarian' ,  'name_short' =>  'Barbarian' );
		$sql_ary[] = array( 'id' => 26 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 27 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'High Elf' ,  'name_short' =>  'High Elf' );
		$sql_ary[] = array( 'id' => 28 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Half Elf' ,  'name_short' =>  'Half Elf' );
		$sql_ary[] = array( 'id' => 29 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dark Elf' ,  'name_short' =>  'Dark Elf' );
		$sql_ary[] = array( 'id' => 30 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Wood Elf' ,  'name_short' =>  'Wood Elf' );
		$sql_ary[] = array( 'id' => 31 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Vah Shir' ,  'name_short' =>  'Vah Shir' );
		$sql_ary[] = array( 'id' => 32 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 33 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Ogre' ,  'name_short' =>  'Ogre' );
		$sql_ary[] = array( 'id' => 34 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Froglok' ,  'name_short' =>  'Froglok' );
		$sql_ary[] = array( 'id' => 35 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Iksar' ,  'name_short' =>  'Iksar' );
		$sql_ary[] = array( 'id' => 36 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Erudite' ,  'name_short' =>  'Erudite' );
		$sql_ary[] = array( 'id' => 37 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Halfling' ,  'name_short' =>  'Halfling' );
		$sql_ary[] = array( 'id' => 38 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Drakkin' ,  'name_short' =>  'Drakkin' );
				
		// remark : no french / german content since eq is english only
		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_language', $sql_ary );
		unset ( $sql_ary );
		
		
	}
}


    
?>