<?php
/**
 * bbdkp FFXI update data
 * @package bbDkp-update
 * @copyright (c) 2009 bbDkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id$
 * 
 * 
 */


/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

function update_ffxi($bbdkp_table_prefix)
{
    global  $db, $table_prefix, $umil, $user;
    
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'classes');
    $sql_ary = array();
    // class : 
    $sql_ary[] = array('class_id' => 0, 'class_name' => 'Unknown', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 1, 'class_name' => 'Warrior', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 2, 'class_name' => 'Monk', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 3, 'class_name' => 'Thief', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 4, 'class_name' => 'White Mage', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 5, 'class_name' => 'Black Mage', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 6, 'class_name' => 'Blue Mage', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 7, 'class_name' => 'Red Mage', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 8, 'class_name' => 'Paladin', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 9, 'class_name' => 'Dark Knight', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 10, 'class_name' => 'Dragoon', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 11, 'class_name' => 'Ninja', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 12, 'class_name' => 'Samurai', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 13, 'class_name' => 'Summoner', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 14, 'class_name' => 'Ranger', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 15, 'class_name' => 'Dancer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 16, 'class_name' => 'Scholar', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 17, 'class_name' => 'Corsair', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 18, 'class_name' => 'Bard', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 19, 'class_name' => 'Beastmaster', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $sql_ary[] = array('class_id' => 20, 'class_name' => 'Puppetmaster', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 1 , 'class_max_level'  => 75 );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'classes', $sql_ary);
   	unset ($sql_ary); 
   	
   	// factions
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'factions');
    $sql_ary = array();
    $sql_ary[] = array('faction_id' => 1, 'faction_name' => 'Bastok' );
    $sql_ary[] = array('faction_id' => 2, 'faction_name' => 'San d\'Oria' );
    $sql_ary[] = array('faction_id' => 3, 'faction_name' => 'Windurst' );
    $sql_ary[] = array('faction_id' => 4, 'faction_name' => 'Jueno' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'factions', $sql_ary);
    unset ($sql_ary); 
    
    // races
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'races');
    $sql_ary = array();
    $sql_ary[] = array('race_id' => 1, 'race_name' => 'Unknown' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 2, 'race_name' => 'Galka' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 3, 'race_name' => 'Hume' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 4, 'race_name' => 'Elvaan' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 5, 'race_name' => 'Tarutaru' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 6, 'race_name' => 'Mithra' , 'race_faction_id' => 3 );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'races', $sql_ary);
    unset ($sql_ary); 

	$db->sql_multi_insert($bbdkp_table_prefix . 'indexpage', $sql_ary);
    
	
    // bossprogress for FFXI
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
    
    // dkp system  set to default
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'dkpsystem');
	$sql_ary = array();
	$sql_ary[] = array('dkpsys_id' => '1' , 'dkpsys_name' => 'Default' , 'dkpsys_status' => 'Y', 'dkpsys_addedby' =>  'admin' , 'dkpsys_default' =>  'Y' ) ;
	$db->sql_multi_insert( $bbdkp_table_prefix . 'dkpsystem', $sql_ary);
	
}

/*
 * new boss progress data for ffxi
 * generated with the spreadsheet
 * 
 */
function update_ffxi_bb2($bbdkp_table_prefix)
{
	global $db, $table_prefix, $umil, $user;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_zonetable' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_bosstable' )))
	{
		$sql_ary = array ();
		$sql_ary[] = array( 'id' => 1 , 'imagename' =>  'dummyzone' , 'game' =>  'ffxi' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1);
		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_zonetable', $sql_ary );
		unset ( $sql_ary );

		$sql_ary[] = array('id' => 1 ,  'imagename' =>  'dummyboss' , 'game' =>  'ffxi' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_bosstable', $sql_ary );
		unset ( $sql_ary );
		
		$sql_ary[] = array( 'id' => 1 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Dummy Zone' ,  'name_short' =>  'Dummy Zone' );
		$sql_ary[] = array( 'id' => 2 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Dummy Boss' ,  'name_short' =>  'Dummy Boss' );
		
		$sql_ary[] = array( 'id' => 3 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Zone par défaut' ,  'name_short' =>  'Zone par défaut' );
		$sql_ary[] = array( 'id' => 4 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Boss par défaut' ,  'name_short' =>  'Boss par défaut' );
		
		$sql_ary[] = array( 'id' => 5 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 6 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
		$sql_ary[] = array( 'id' => 7 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Monk' ,  'name_short' =>  'Monk' );
		$sql_ary[] = array( 'id' => 8 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Thief' ,  'name_short' =>  'Thief' );
		$sql_ary[] = array( 'id' => 9 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'White Mage' ,  'name_short' =>  'White Mage' );
		$sql_ary[] = array( 'id' => 10 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Black Mage' ,  'name_short' =>  'Black Mage' );
		$sql_ary[] = array( 'id' => 11 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Blue Mage' ,  'name_short' =>  'Blue Mage' );
		$sql_ary[] = array( 'id' => 12 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Red Mage' ,  'name_short' =>  'Red Mage' );
		$sql_ary[] = array( 'id' => 13 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 14 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Dark Knight' ,  'name_short' =>  'Dark Knight' );
		$sql_ary[] = array( 'id' => 15 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Dragoon' ,  'name_short' =>  'Dragoon' );
		$sql_ary[] = array( 'id' => 16 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Ninja' ,  'name_short' =>  'Ninja' );
		$sql_ary[] = array( 'id' => 17 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Samurai' ,  'name_short' =>  'Samurai' );
		$sql_ary[] = array( 'id' => 18 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Summoner' ,  'name_short' =>  'Summoner' );
		$sql_ary[] = array( 'id' => 19 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Ranger' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 20 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Dancer' ,  'name_short' =>  'Dancer' );
		$sql_ary[] = array( 'id' => 21 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Scholar' ,  'name_short' =>  'Scholar' );
		$sql_ary[] = array( 'id' => 22 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Corsair' ,  'name_short' =>  'Corsair' );
		$sql_ary[] = array( 'id' => 23 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Bard' ,  'name_short' =>  'Bard' );
		$sql_ary[] = array( 'id' => 24 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Beastmaster' ,  'name_short' =>  'Beastmaster' );
		$sql_ary[] = array( 'id' => 25 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Puppetmaster' ,  'name_short' =>  'Puppetmaster' );
	
		$sql_ary[] = array( 'id' => 26 , 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 27 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
		$sql_ary[] = array( 'id' => 28 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Monk' ,  'name_short' =>  'Monk' );
		$sql_ary[] = array( 'id' => 29 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Thief' ,  'name_short' =>  'Thief' );
		$sql_ary[] = array( 'id' => 30 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'White Mage' ,  'name_short' =>  'White Mage' );
		$sql_ary[] = array( 'id' => 31 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Black Mage' ,  'name_short' =>  'Black Mage' );
		$sql_ary[] = array( 'id' => 32 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Blue Mage' ,  'name_short' =>  'Blue Mage' );
		$sql_ary[] = array( 'id' => 33 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Red Mage' ,  'name_short' =>  'Red Mage' );
		$sql_ary[] = array( 'id' => 34 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 35 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Dark Knight' ,  'name_short' =>  'Dark Knight' );
		$sql_ary[] = array( 'id' => 36 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Dragoon' ,  'name_short' =>  'Dragoon' );
		$sql_ary[] = array( 'id' => 37 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Ninja' ,  'name_short' =>  'Ninja' );
		$sql_ary[] = array( 'id' => 38 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Samurai' ,  'name_short' =>  'Samurai' );
		$sql_ary[] = array( 'id' => 39 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Summoner' ,  'name_short' =>  'Summoner' );
		$sql_ary[] = array( 'id' => 40 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Ranger' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 41 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Dancer' ,  'name_short' =>  'Dancer' );
		$sql_ary[] = array( 'id' => 42 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Scholar' ,  'name_short' =>  'Scholar' );
		$sql_ary[] = array( 'id' => 43 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Corsair' ,  'name_short' =>  'Corsair' );
		$sql_ary[] = array( 'id' => 44 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Bard' ,  'name_short' =>  'Bard' );
		$sql_ary[] = array( 'id' => 45 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Beastmaster' ,  'name_short' =>  'Beastmaster' );
		$sql_ary[] = array( 'id' => 46 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Puppetmaster' ,  'name_short' =>  'Puppetmaster' );
	
		$sql_ary[] = array( 'id' => 65 , 'attribute_id' => 0, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 66 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
		$sql_ary[] = array( 'id' => 67 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Monk' ,  'name_short' =>  'Monk' );
		$sql_ary[] = array( 'id' => 68 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Thief' ,  'name_short' =>  'Thief' );
		$sql_ary[] = array( 'id' => 69 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'White Mage' ,  'name_short' =>  'White Mage' );
		$sql_ary[] = array( 'id' => 70 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Black Mage' ,  'name_short' =>  'Black Mage' );
		$sql_ary[] = array( 'id' => 71 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Blue Mage' ,  'name_short' =>  'Blue Mage' );
		$sql_ary[] = array( 'id' => 72 , 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Red Mage' ,  'name_short' =>  'Red Mage' );
		$sql_ary[] = array( 'id' => 73 , 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 74 , 'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Dark Knight' ,  'name_short' =>  'Dark Knight' );
		$sql_ary[] = array( 'id' => 75 , 'attribute_id' => 10, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Dragoon' ,  'name_short' =>  'Dragoon' );
		$sql_ary[] = array( 'id' => 76 , 'attribute_id' => 11, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Ninja' ,  'name_short' =>  'Ninja' );
		$sql_ary[] = array( 'id' => 77 , 'attribute_id' => 12, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Samurai' ,  'name_short' =>  'Samurai' );
		$sql_ary[] = array( 'id' => 78 , 'attribute_id' => 13, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Summoner' ,  'name_short' =>  'Summoner' );
		$sql_ary[] = array( 'id' => 79 , 'attribute_id' => 14, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Ranger' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 80 , 'attribute_id' => 15, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Dancer' ,  'name_short' =>  'Dancer' );
		$sql_ary[] = array( 'id' => 81 , 'attribute_id' => 16, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Scholar' ,  'name_short' =>  'Scholar' );
		$sql_ary[] = array( 'id' => 82 , 'attribute_id' => 17, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Corsair' ,  'name_short' =>  'Corsair' );
		$sql_ary[] = array( 'id' => 83 , 'attribute_id' => 18, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Bard' ,  'name_short' =>  'Bard' );
		$sql_ary[] = array( 'id' => 84 , 'attribute_id' => 19, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Beastmaster' ,  'name_short' =>  'Beastmaster' );
		$sql_ary[] = array( 'id' => 85 , 'attribute_id' => 20, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Puppetmaster' ,  'name_short' =>  'Puppetmaster' );
			
		$sql_ary[] = array( 'id' => 47 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 48 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Galka' ,  'name_short' =>  'Galka' );
		$sql_ary[] = array( 'id' => 49 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Hume' ,  'name_short' =>  'Hume' );
		$sql_ary[] = array( 'id' => 50 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Elvaan' ,  'name_short' =>  'Elvaan' );
		$sql_ary[] = array( 'id' => 51 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Tarutaru' ,  'name_short' =>  'Tarutaru' );
		$sql_ary[] = array( 'id' => 52 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Mithra' ,  'name_short' =>  'Mithra' );
		
		$sql_ary[] = array( 'id' => 53 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 54 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Galka' ,  'name_short' =>  'Galka' );
		$sql_ary[] = array( 'id' => 55 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Hume' ,  'name_short' =>  'Hume' );
		$sql_ary[] = array( 'id' => 56 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elvaan' ,  'name_short' =>  'Elvaan' );
		$sql_ary[] = array( 'id' => 57 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Tarutaru' ,  'name_short' =>  'Tarutaru' );
		$sql_ary[] = array( 'id' => 58 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Mithra' ,  'name_short' =>  'Mithra' );
		
		$sql_ary[] = array( 'id' => 59 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 60 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Galka' ,  'name_short' =>  'Galka' );
		$sql_ary[] = array( 'id' => 61 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Hume' ,  'name_short' =>  'Hume' );
		$sql_ary[] = array( 'id' => 62 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Elvaan' ,  'name_short' =>  'Elvaan' );
		$sql_ary[] = array( 'id' => 63 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Tarutaru' ,  'name_short' =>  'Tarutaru' );
		$sql_ary[] = array( 'id' => 64 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Mithra' ,  'name_short' =>  'Mithra' );
				
		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_language', $sql_ary );
		unset ( $sql_ary );
	}
}



?>