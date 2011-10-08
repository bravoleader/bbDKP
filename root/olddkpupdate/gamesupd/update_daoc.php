<?php
/**
 * bbdkp wow update data
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

function update_daoc($bbdkp_table_prefix)
{
    global  $db, $table_prefix, $umil, $user;
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'classes');
   
    $sql_ary = array();
    // class general
    $sql_ary[] = array('class_id' => '0', 'class_name' => 'Unknown', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 50 );

    // class Albion   
    $sql_ary[] = array('class_id' => 2, 'class_name' => 'Armsman', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 3, 'class_name' => 'Cabalist', 'class_armor_type' => 'Cloth' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 4, 'class_name' => 'Cleric', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 5, 'class_name' => 'Friar', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 6, 'class_name' => 'Heretic', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 7, 'class_name' => 'Infiltrator', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 8, 'class_name' => 'Mercenary', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 9, 'class_name' => 'Minstrel', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 10, 'class_name' => 'Necromancer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 11, 'class_name' => 'Paladin', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 12, 'class_name' => 'Reaver', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 13, 'class_name' => 'Scout', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 14, 'class_name' => 'Sorcerer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 15, 'class_name' => 'Theurgist', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 16, 'class_name' => 'Wizard', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    
   // class Hibernia
    $sql_ary[] = array('class_id' => 17, 'class_name' => 'Animist', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 18, 'class_name' => 'Bainshee', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 19, 'class_name' => 'Bard', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 20, 'class_name' => 'Blademaster', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 21, 'class_name' => 'Champion', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 22, 'class_name' => 'Druid', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 23, 'class_name' => 'Eldritch', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 24, 'class_name' => 'Enchanter', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 25, 'class_name' => 'Hero', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 26, 'class_name' => 'Mentalist', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 27, 'class_name' => 'Nightshade', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 28, 'class_name' => 'Ranger', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 29, 'class_name' => 'Valewalker', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 30, 'class_name' => 'Vampiir', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 31, 'class_name' => 'Warden', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
   
    // class Midgard
    $sql_ary[] = array('class_id' => 32,  'class_name' => 'Berserker', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 33,  'class_name' => 'Bonedancer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 34, 'class_name' => 'Healer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 35, 'class_name' => 'Hunter', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 36, 'class_name' => 'Runemaster', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );    
    $sql_ary[] = array('class_id' => 37, 'class_name' => 'Savage', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 38, 'class_name' => 'Shadowblade', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 39, 'class_name' => 'Shaman', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 40, 'class_name' => 'Skald', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 41, 'class_name' => 'Spiritmaster', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 42, 'class_name' => 'Thane', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );                                                                                        
    $sql_ary[] = array('class_id' => 43, 'class_name' => 'Valkyrie', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 44, 'class_name' => 'Warlock', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    $sql_ary[] = array('class_id' => 45, 'class_name' => 'Warrior', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 50 );
    
    $db->sql_multi_insert( $bbdkp_table_prefix . 'classes', $sql_ary);
  	unset ($sql_ary); 
   
  	// factions
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'factions');
    $sql_ary = array();
    $sql_ary[] = array('faction_id' => 1, 'faction_name' => 'Albion' );
    $sql_ary[] = array('faction_id' => 2, 'faction_name' => 'Hibernian' );
    $sql_ary[] = array('faction_id' => 3, 'faction_name' => 'Midgard' );
    $sql_ary[] = array('faction_id' => 4, 'faction_name' => 'DaoC' );
    
    $db->sql_multi_insert( $bbdkp_table_prefix . 'factions', $sql_ary);
    unset ($sql_ary); 
    
   	// roles
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'roles');
    $sql_ary = array();
    $sql_ary[] = array('role_id' => 1, 'role_name' => 'Light tank' );
    $sql_ary[] = array('role_id' => 2, 'role_name' => 'Heavy tank' );
    $sql_ary[] = array('role_id' => 3, 'role_name' => 'Caster' );
    $sql_ary[] = array('role_id' => 4, 'role_name' => 'Healer' );
    $sql_ary[] = array('role_id' => 5, 'role_name' => 'Hybrid' );        
    $db->sql_multi_insert( $bbdkp_table_prefix . 'roles', $sql_ary);
    unset ($sql_ary); 
    
    // races
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'races');
    $sql_ary = array();
    $sql_ary[] = array('race_id' => 1, 'race_name' => 'Briton' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 2, 'race_name' => 'Saracen' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 3, 'race_name' => 'Avalonian' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 4, 'race_name' => 'Highlander' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 5, 'race_name' => 'Inconnu' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 6, 'race_name' => 'Half Ogre' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 7, 'race_name' => 'Minotaur' , 'race_faction_id' => 4 );
    $sql_ary[] = array('race_id' => 8, 'race_name' => 'Celt' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 9, 'race_name' => 'Lurikeen' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 10, 'race_name' => 'Firbolg' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 11, 'race_name' => 'Elf' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 12, 'race_name' => 'Sylvan' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 13, 'race_name' => 'Shar' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 14, 'race_name' => 'Kobold' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 15, 'race_name' => 'Dwarf' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 16, 'race_name' => 'Norseman' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 17, 'race_name' => 'Troll' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 18, 'race_name' => 'Valkyn' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 19, 'race_name' => 'Frostalf' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 20, 'race_name' => 'Deifrang' , 'race_faction_id' => 3 );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'races', $sql_ary);
    

    // bossprogress for DaoC
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

    // Boss offsets
	$db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_offsets');
	$sql_ary = array();
	$sql_ary[] = array('name' => 'dummyboss' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'dummyzone' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_offsets', $sql_ary);  
    
    // dkp system bbeqdkp_dkpsystem 
    // set to default
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'dkpsystem');
	$sql_ary = array();
	$sql_ary[] = array('dkpsys_id' => '1' , 'dkpsys_name' => 'Default' , 'dkpsys_status' => 'Y', 'dkpsys_addedby' =>  'admin' , 'dkpsys_default' =>  'Y' ) ;
	$db->sql_multi_insert( $bbdkp_table_prefix . 'dkpsystem', $sql_ary);

}

/*
 * new boss progress data for daoc
 * generated with the spreadsheet
 * 
 */
function update_daoc_bb2($bbdkp_table_prefix)
{
	global $db, $table_prefix, $umil, $user;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_zonetable' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_bosstable' )))
	{
		$sql_ary = array ();
		$sql_ary[] = array( 'id' => 1 , 'imagename' =>  'dummyzone' , 'game' =>  'daoc' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1);
		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_zonetable', $sql_ary );
		unset ( $sql_ary );

		$sql_ary[] = array('id' => 1 ,  'imagename' =>  'dummyboss' , 'game' =>  'daoc' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_bosstable', $sql_ary );
		unset ( $sql_ary );
		
		$sql_ary[] = array( 'id' => 1 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Dummy Zone' ,  'name_short' =>  'Dummy Zone' );
		$sql_ary[] = array( 'id' => 2 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Dummy Boss' ,  'name_short' =>  'Dummy Boss' );
		
		$sql_ary[] = array( 'id' => 3 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Zone par défaut' ,  'name_short' =>  'Zone par défaut' );
		$sql_ary[] = array( 'id' => 4 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Boss par défaut' ,  'name_short' =>  'Boss par défaut' );
		
		$sql_ary[] = array( 'id' => 5 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 6 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Armsman' ,  'name_short' =>  'Armsman' );
		$sql_ary[] = array( 'id' => 7 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Cabalist' ,  'name_short' =>  'Cabalist' );
		$sql_ary[] = array( 'id' => 8 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Cleric' ,  'name_short' =>  'Cleric' );
		$sql_ary[] = array( 'id' => 9 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Friar' ,  'name_short' =>  'Friar' );
		$sql_ary[] = array( 'id' => 10 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Heretic' ,  'name_short' =>  'Heretic' );
		$sql_ary[] = array( 'id' => 11 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Infiltrator' ,  'name_short' =>  'Infiltrator' );
		$sql_ary[] = array( 'id' => 12 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Mercenary' ,  'name_short' =>  'Mercenary' );
		$sql_ary[] = array( 'id' => 13 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Minstrel' ,  'name_short' =>  'Minstrel' );
		$sql_ary[] = array( 'id' => 14 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Necromancer' ,  'name_short' =>  'Necromancer' );
		$sql_ary[] = array( 'id' => 15 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 16 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Reaver' ,  'name_short' =>  'Reaver' );
		$sql_ary[] = array( 'id' => 17 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Scout' ,  'name_short' =>  'Scout' );
		$sql_ary[] = array( 'id' => 18 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Sorcerer' ,  'name_short' =>  'Sorcerer' );
		$sql_ary[] = array( 'id' => 19 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Theurgist' ,  'name_short' =>  'Theurgist' );
		$sql_ary[] = array( 'id' => 20 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Wizard' ,  'name_short' =>  'Wizard' );
		$sql_ary[] = array( 'id' => 21 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Animist' ,  'name_short' =>  'Animist' );
		$sql_ary[] = array( 'id' => 22 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Bainshee' ,  'name_short' =>  'Bainshee' );
		$sql_ary[] = array( 'id' => 23 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Bard' ,  'name_short' =>  'Bard' );
		$sql_ary[] = array( 'id' => 24 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Blademaster' ,  'name_short' =>  'Blademaster' );
		$sql_ary[] = array( 'id' => 25 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Champion' ,  'name_short' =>  'Champion' );
		$sql_ary[] = array( 'id' => 26 , 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Druid' ,  'name_short' =>  'Druid' );
		$sql_ary[] = array( 'id' => 27 , 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Eldritch' ,  'name_short' =>  'Eldritch' );
		$sql_ary[] = array( 'id' => 28 , 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Enchanter' ,  'name_short' =>  'Enchanter' );
		$sql_ary[] = array( 'id' => 29 , 'attribute_id' => 25, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Hero' ,  'name_short' =>  'Hero' );
		$sql_ary[] = array( 'id' => 30 , 'attribute_id' => 26, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Mentalist' ,  'name_short' =>  'Mentalist' );
		$sql_ary[] = array( 'id' => 31 , 'attribute_id' => 27, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Nightshade' ,  'name_short' =>  'Nightshade' );
		$sql_ary[] = array( 'id' => 32 , 'attribute_id' => 28, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Ranger' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 33 , 'attribute_id' => 29, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Valewalker' ,  'name_short' =>  'Valewalker' );
		$sql_ary[] = array( 'id' => 34 , 'attribute_id' => 30, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Vampiir' ,  'name_short' =>  'Vampiir' );
		$sql_ary[] = array( 'id' => 35 , 'attribute_id' => 31, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warden' ,  'name_short' =>  'Warden' );
		$sql_ary[] = array( 'id' => 36 , 'attribute_id' => 32, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Berserker' ,  'name_short' =>  'Berserker' );
		$sql_ary[] = array( 'id' => 37 , 'attribute_id' => 33, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Bonedancer' ,  'name_short' =>  'Bonedancer' );
		$sql_ary[] = array( 'id' => 38 , 'attribute_id' => 34, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Healer' ,  'name_short' =>  'Healer' );
		$sql_ary[] = array( 'id' => 39 , 'attribute_id' => 35, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Hunter' ,  'name_short' =>  'Hunter' );
		$sql_ary[] = array( 'id' => 40 , 'attribute_id' => 36, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Runemaster' ,  'name_short' =>  'Runemaster' );
		$sql_ary[] = array( 'id' => 41 , 'attribute_id' => 37, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Savage' ,  'name_short' =>  'Savage' );
		$sql_ary[] = array( 'id' => 42 , 'attribute_id' => 38, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shadowblade' ,  'name_short' =>  'Shadowblade' );
		$sql_ary[] = array( 'id' => 43 , 'attribute_id' => 39, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shaman' ,  'name_short' =>  'Shaman' );
		$sql_ary[] = array( 'id' => 44 , 'attribute_id' => 40, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Skald' ,  'name_short' =>  'Skald' );
		$sql_ary[] = array( 'id' => 45 , 'attribute_id' => 41, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Spiritmaster' ,  'name_short' =>  'Spiritmaster' );
		$sql_ary[] = array( 'id' => 46 , 'attribute_id' => 42, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Thane' ,  'name_short' =>  'Thane' );
		$sql_ary[] = array( 'id' => 47 , 'attribute_id' => 43, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Valkyrie' ,  'name_short' =>  'Valkyrie' );
		$sql_ary[] = array( 'id' => 48 , 'attribute_id' => 44, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warlock' ,  'name_short' =>  'Warlock' );
		$sql_ary[] = array( 'id' => 49 , 'attribute_id' => 45, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
		
		$sql_ary[] = array( 'id' => 50 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 51 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Armsman' ,  'name_short' =>  'Armsman' );
		$sql_ary[] = array( 'id' => 52 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Cabalist' ,  'name_short' =>  'Cabalist' );
		$sql_ary[] = array( 'id' => 53 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Cleric' ,  'name_short' =>  'Cleric' );
		$sql_ary[] = array( 'id' => 54 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Friar' ,  'name_short' =>  'Friar' );
		$sql_ary[] = array( 'id' => 55 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Heretic' ,  'name_short' =>  'Heretic' );
		$sql_ary[] = array( 'id' => 56 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Infiltrator' ,  'name_short' =>  'Infiltrator' );
		$sql_ary[] = array( 'id' => 57 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Mercenary' ,  'name_short' =>  'Mercenary' );
		$sql_ary[] = array( 'id' => 58 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Minstrel' ,  'name_short' =>  'Minstrel' );
		$sql_ary[] = array( 'id' => 59 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Necromancer' ,  'name_short' =>  'Necromancer' );
		$sql_ary[] = array( 'id' => 60 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 61 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Reaver' ,  'name_short' =>  'Reaver' );
		$sql_ary[] = array( 'id' => 62 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Scout' ,  'name_short' =>  'Scout' );
		$sql_ary[] = array( 'id' => 63 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Sorcerer' ,  'name_short' =>  'Sorcerer' );
		$sql_ary[] = array( 'id' => 64 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Theurgist' ,  'name_short' =>  'Theurgist' );
		$sql_ary[] = array( 'id' => 65 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Wizard' ,  'name_short' =>  'Wizard' );
		$sql_ary[] = array( 'id' => 66 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Animist' ,  'name_short' =>  'Animist' );
		$sql_ary[] = array( 'id' => 67 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Bainshee' ,  'name_short' =>  'Bainshee' );
		$sql_ary[] = array( 'id' => 68 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Bard' ,  'name_short' =>  'Bard' );
		$sql_ary[] = array( 'id' => 69 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Blademaster' ,  'name_short' =>  'Blademaster' );
		$sql_ary[] = array( 'id' => 70 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Champion' ,  'name_short' =>  'Champion' );
		$sql_ary[] = array( 'id' => 71 , 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Druid' ,  'name_short' =>  'Druid' );
		$sql_ary[] = array( 'id' => 72 , 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Eldritch' ,  'name_short' =>  'Eldritch' );
		$sql_ary[] = array( 'id' => 73 , 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Enchanter' ,  'name_short' =>  'Enchanter' );
		$sql_ary[] = array( 'id' => 74 , 'attribute_id' => 25, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Hero' ,  'name_short' =>  'Hero' );
		$sql_ary[] = array( 'id' => 75 , 'attribute_id' => 26, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Mentalist' ,  'name_short' =>  'Mentalist' );
		$sql_ary[] = array( 'id' => 76 , 'attribute_id' => 27, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Nightshade' ,  'name_short' =>  'Nightshade' );
		$sql_ary[] = array( 'id' => 77 , 'attribute_id' => 28, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Ranger' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 78 , 'attribute_id' => 29, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Valewalker' ,  'name_short' =>  'Valewalker' );
		$sql_ary[] = array( 'id' => 79 , 'attribute_id' => 30, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Vampiir' ,  'name_short' =>  'Vampiir' );
		$sql_ary[] = array( 'id' => 80 , 'attribute_id' => 31, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Warden' ,  'name_short' =>  'Warden' );
		$sql_ary[] = array( 'id' => 81 , 'attribute_id' => 32, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Berserker' ,  'name_short' =>  'Berserker' );
		$sql_ary[] = array( 'id' => 82 , 'attribute_id' => 33, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Bonedancer' ,  'name_short' =>  'Bonedancer' );
		$sql_ary[] = array( 'id' => 83 , 'attribute_id' => 34, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Healer' ,  'name_short' =>  'Healer' );
		$sql_ary[] = array( 'id' => 84 , 'attribute_id' => 35, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Hunter' ,  'name_short' =>  'Hunter' );
		$sql_ary[] = array( 'id' => 85 , 'attribute_id' => 36, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Runemaster' ,  'name_short' =>  'Runemaster' );
		$sql_ary[] = array( 'id' => 86 , 'attribute_id' => 37, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Savage' ,  'name_short' =>  'Savage' );
		$sql_ary[] = array( 'id' => 87 , 'attribute_id' => 38, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Shadowblade' ,  'name_short' =>  'Shadowblade' );
		$sql_ary[] = array( 'id' => 88 , 'attribute_id' => 39, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Shaman' ,  'name_short' =>  'Shaman' );
		$sql_ary[] = array( 'id' => 89 , 'attribute_id' => 40, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Skald' ,  'name_short' =>  'Skald' );
		$sql_ary[] = array( 'id' => 90 , 'attribute_id' => 41, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Spiritmaster' ,  'name_short' =>  'Spiritmaster' );
		$sql_ary[] = array( 'id' => 91 , 'attribute_id' => 42, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Thane' ,  'name_short' =>  'Thane' );
		$sql_ary[] = array( 'id' => 92 , 'attribute_id' => 43, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Valkyrie' ,  'name_short' =>  'Valkyrie' );
		$sql_ary[] = array( 'id' => 93 , 'attribute_id' => 44, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Warlock' ,  'name_short' =>  'Warlock' );
		$sql_ary[] = array( 'id' => 94 , 'attribute_id' => 45, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
				
		$sql_ary[] = array( 'id' => 95 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Briton' ,  'name_short' =>  'Briton' );
		$sql_ary[] = array( 'id' => 96 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Saracen' ,  'name_short' =>  'Saracen' );
		$sql_ary[] = array( 'id' => 97 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Avalonian' ,  'name_short' =>  'Avalonian' );
		$sql_ary[] = array( 'id' => 98 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Highlander' ,  'name_short' =>  'Highlander' );
		$sql_ary[] = array( 'id' => 99 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Inconnu' ,  'name_short' =>  'Inconnu' );
		$sql_ary[] = array( 'id' => 100 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Half Ogre' ,  'name_short' =>  'Half Ogre' );
		$sql_ary[] = array( 'id' => 101 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Minotaur' ,  'name_short' =>  'Minotaur' );
		$sql_ary[] = array( 'id' => 102 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Celt' ,  'name_short' =>  'Celt' );
		$sql_ary[] = array( 'id' => 103 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Lurikeen' ,  'name_short' =>  'Lurikeen' );
		$sql_ary[] = array( 'id' => 104 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Firbolg' ,  'name_short' =>  'Firbolg' );
		$sql_ary[] = array( 'id' => 105 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Elf' ,  'name_short' =>  'Elf' );
		$sql_ary[] = array( 'id' => 106 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Sylvan' ,  'name_short' =>  'Sylvan' );
		$sql_ary[] = array( 'id' => 107 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Shar' ,  'name_short' =>  'Shar' );
		$sql_ary[] = array( 'id' => 108 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Kobold' ,  'name_short' =>  'Kobold' );
		$sql_ary[] = array( 'id' => 109 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 110 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Norseman' ,  'name_short' =>  'Norseman' );
		$sql_ary[] = array( 'id' => 111 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 112 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Valkyn' ,  'name_short' =>  'Valkyn' );
		$sql_ary[] = array( 'id' => 113 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Frostalf' ,  'name_short' =>  'Frostalf' );
		$sql_ary[] = array( 'id' => 114 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Deifrang' ,  'name_short' =>  'Deifrang' );
		
		$sql_ary[] = array( 'id' => 115 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Briton' ,  'name_short' =>  'Briton' );
		$sql_ary[] = array( 'id' => 116 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Saracen' ,  'name_short' =>  'Saracen' );
		$sql_ary[] = array( 'id' => 117 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Avalonian' ,  'name_short' =>  'Avalonian' );
		$sql_ary[] = array( 'id' => 118 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Highlander' ,  'name_short' =>  'Highlander' );
		$sql_ary[] = array( 'id' => 119 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Inconnu' ,  'name_short' =>  'Inconnu' );
		$sql_ary[] = array( 'id' => 120 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Half Ogre' ,  'name_short' =>  'Half Ogre' );
		$sql_ary[] = array( 'id' => 121 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Minotaur' ,  'name_short' =>  'Minotaur' );
		$sql_ary[] = array( 'id' => 122 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Celt' ,  'name_short' =>  'Celt' );
		$sql_ary[] = array( 'id' => 123 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Lurikeen' ,  'name_short' =>  'Lurikeen' );
		$sql_ary[] = array( 'id' => 124 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Firbolg' ,  'name_short' =>  'Firbolg' );
		$sql_ary[] = array( 'id' => 125 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elf' ,  'name_short' =>  'Elf' );
		$sql_ary[] = array( 'id' => 126 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Sylvan' ,  'name_short' =>  'Sylvan' );
		$sql_ary[] = array( 'id' => 127 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Shar' ,  'name_short' =>  'Shar' );
		$sql_ary[] = array( 'id' => 128 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Kobold' ,  'name_short' =>  'Kobold' );
		$sql_ary[] = array( 'id' => 129 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 130 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Norseman' ,  'name_short' =>  'Norseman' );
		$sql_ary[] = array( 'id' => 131 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 132 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Valkyn' ,  'name_short' =>  'Valkyn' );
		$sql_ary[] = array( 'id' => 133 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Frostalf' ,  'name_short' =>  'Frostalf' );
		$sql_ary[] = array( 'id' => 134 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Deifrang' ,  'name_short' =>  'Deifrang' );

		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_language', $sql_ary );
		unset ( $sql_ary );
		
		
	}
}




?>