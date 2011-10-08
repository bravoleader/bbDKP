<?php
/**
 * bbdkp wow update data
 * @package bbDkp-updater
 * @copyright (c) 2009 bbDkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * 
 */


/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

function update_warhammer($bbdkp_table_prefix)
{
    global  $db, $table_prefix, $umil, $user;
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'classes');
    $sql_ary = array();

    // class : 
    $sql_ary[] = array('class_id' => 0, 'class_name' => 'Unknown', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 1, 'class_name' => 'Witch Elf', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 2, 'class_name' => 'Sorcerer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 3, 'class_name' => 'Disciple of Khaine', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 4, 'class_name' => 'Chosen', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 5, 'class_name' => 'Marauder', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 6, 'class_name' => 'Zealot', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 7, 'class_name' => 'Magus', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 8, 'class_name' => 'Squig Herder', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 9, 'class_name' => 'Black Orc', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 10, 'class_name' => 'Shaman', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 11, 'class_name' => 'Rune Priest', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 12, 'class_name' => 'Iron Breaker', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 13, 'class_name' => 'Engineer', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 14, 'class_name' => 'Witch Hunter', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 15, 'class_name' => 'Bright Wizard', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 16, 'class_name' => 'Warrior Priest', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 17, 'class_name' => 'Archmage', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 40 );    
    $sql_ary[] = array('class_id' => 18, 'class_name' => 'Swordmaster', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 40 );    
    $sql_ary[] = array('class_id' => 19, 'class_name' => 'Shadow Warrior', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 40 );
    $sql_ary[] = array('class_id' => 20, 'class_name' => 'White Lion', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 40 );    
    
    $db->sql_multi_insert( $bbdkp_table_prefix . 'classes', $sql_ary);
   	unset ($sql_ary); 
    
   	// factions
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'factions');
    $sql_ary = array();
    $sql_ary[] = array('faction_id' => 1, 'faction_name' => 'Order' );
    $sql_ary[] = array('faction_id' => 2, 'faction_name' => 'Destruction' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'factions', $sql_ary);
    unset ($sql_ary); 
    
    // races : note we use blizz id
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'races');
    $sql_ary = array();
    $sql_ary[] = array('race_id' => 0, 'race_name' => 'Unknown' , 'race_faction_id' => 0 );
    $sql_ary[] = array('race_id' => 1, 'race_name' => 'Dwarf' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 2, 'race_name' => 'The Empire' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 3, 'race_name' => 'High Elves' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 4, 'race_name' => 'Dark Elves' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 5, 'race_name' => 'Chaos' , 'race_factio<n_id' => 2 );
    $sql_ary[] = array('race_id' => 6, 'race_name' => 'Greenskins' , 'race_faction_id' => 2 );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'races', $sql_ary);

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
	$sql_ary[] = array('config_name' =>  'pb_dummy', 'config_value' => 'Dummy boss'  );
	$sql_ary[] = array('config_name' =>  'pz_dummyzone', 'config_value' => 'Dummy Zone'  );
	$sql_ary[] = array('config_name' =>  'sz_dummyzone', 'config_value' => '1'  );

	$db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config', $sql_ary);
	unset ($sql_ary);	

    // Boss offsets
	$db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_offsets');
	$sql_ary = array();
	$sql_ary[] = array('name' => 'dummy' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'dummyzone' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_offsets', $sql_ary);  
    
    // dkp system bbeqdkp_dkpsystem 
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'dkpsystem');
	$sql_ary = array();
	$sql_ary[] = array('dkpsys_id' => '1' , 'dkpsys_name' => 'Default' , 'dkpsys_status' => 'Y', 'dkpsys_addedby' =>  'admin' , 'dkpsys_default' =>  'Y' ) ;
	$db->sql_multi_insert( $bbdkp_table_prefix . 'dkpsystem', $sql_ary);
		
}  


function update_warhammer_rc2($bbdkp_table_prefix)
{
    global  $db, $table_prefix, $umil, $user;
    
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
        
        $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config' , $sql_ary);
        
        unset ($sql_ary); 
        // altdorf     
        $sql_ary = array();
        $sql_ary[] = array('config_name' =>  'pb_kokrit', 'config_value' => 'Kokrit Man-Eater'  );
        $sql_ary[] = array('config_name' =>  'pb_bulbous', 'config_value' => 'Bulbous One'  );
        $sql_ary[] = array('config_name' =>  'pb_fangchitter', 'config_value' => 'Prot and Vermer Fangchitter'  );
        $sql_ary[] = array('config_name' =>  'pb_vitchek', 'config_value' => 'Master Moulder Vitchek'  );
        $sql_ary[] = array('config_name' =>  'pb_goradian', 'config_value' => 'Goradian the Creator'  );
        
        // sacellum
        $sql_ary[] = array('config_name' =>  'pb_ghalmar', 'config_value' => 'Ghalmar Ragehorn'  );
        $sql_ary[] = array('config_name' =>  'pb_guzhak', 'config_value' => 'Guzhak the Betrayer'  );
        $sql_ary[] = array('config_name' =>  'pb_vul', 'config_value' => 'Vul The Bloodchosen'  );
        $sql_ary[] = array('config_name' =>  'pb_hoarfrost', 'config_value' => 'Hoarfrost'  );
        $sql_ary[] = array('config_name' =>  'pb_sebcraw', 'config_value' => 'Sebcraw the Discarded'  );
        $sql_ary[] = array('config_name' =>  'pb_thunder', 'config_value' => 'Slorth and Lorth Thunderbelly'  );
        $sql_ary[] = array('config_name' =>  'pb_breeder', 'config_value' => 'Snaptail the Breeder'  );
        $sql_ary[] = array('config_name' =>  'pb_goremane', 'config_value' => 'Goremane'  );	
        $sql_ary[] = array('config_name' =>  'pb_viraxil', 'config_value' => 'Viraxil the Broken'  );
        
        // mount gunbad
        $sql_ary[] = array('config_name' =>  'pb_griblik', 'config_value' => 'Griblik da Stinka'  );
        $sql_ary[] = array('config_name' =>  'pb_bilebane', 'config_value' => 'Bilebane the Rager'  );
        $sql_ary[] = array('config_name' =>  'pb_garrolath', 'config_value' => 'Garrolath the Poxbearer'  );
        $sql_ary[] = array('config_name' =>  'pb_foulm', 'config_value' => 'Foul Mouf da \'ungry'  );
        $sql_ary[] = array('config_name' =>  'pb_kurga', 'config_value' => 'Kurga da Squig-Maka'  );
        $sql_ary[] = array('config_name' =>  'pb_glomp', 'config_value' => 'Glomp the Squig Masta'  );                        
        $sql_ary[] = array('config_name' =>  'pb_solithex', 'config_value' => 'Solithex'  );
                            
        // stairs
        $sql_ary[] = array('config_name' =>  'pb_borzar', 'config_value' => 'Borzar Rageborn'  );
        $sql_ary[] = array('config_name' =>  'pb_gahlvoth', 'config_value' => 'Gahlvoth Darkrage'  );
        $sql_ary[] = array('config_name' =>  'pb_azuk', 	'config_value' => 'Azuk\'Thul'  );
        $sql_ary[] = array('config_name' =>  'pb_thar', 	'config_value' => 'Thar\'lgnan'  );
        $sql_ary[] = array('config_name' =>  'pb_urlf', 	'config_value' => 'Urlf Daemonblessed'  );                        
        $sql_ary[] = array('config_name' =>  'pb_garithex', 'config_value' => 'Garithex the Mountain'  );
        $sql_ary[] = array('config_name' =>  'pb_chorek', 'config_value' => 'Chorek the Unstoppable'  );
        $sql_ary[] = array('config_name' =>  'pb_slarith', 'config_value' => 'Lord Slaurith'  );            
        $sql_ary[] = array('config_name' =>  'pb_wrackspite', 'config_value' => 'Wrackspite'  );
        $sql_ary[] = array('config_name' =>  'pb_clawfang', 'config_value' => 'Clawfang and Doomspike'  );
        $sql_ary[] = array('config_name' =>  'pb_zekaraz', 'config_value' => 'Zekaraz the Bloodcaller'  );
        $sql_ary[] = array('config_name' =>  'pb_kaarn', 'config_value' => 'Kaarn the Vanquisher'  );                
        $sql_ary[] = array('config_name' =>  'pb_skullord', 'config_value' => 'Skull Lord Var\'Ithrok'  );             
        $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config', $sql_ary);
        unset ($sql_ary);	
        
        // Zone names     
        $sql_ary[] = array('config_name' =>  'pz_altdorf', 'config_value' => 'Altdorf Sewers'  );
        $sql_ary[] = array('config_name' =>  'pz_sacellum', 'config_value' => 'The Sacellum Dungeon'  );
        $sql_ary[] = array('config_name' =>  'pz_gunbad', 'config_value' => 'Mount Gunbad'  );
        $sql_ary[] = array('config_name' =>  'pz_stair', 'config_value' => 'The Bastion Stair'  );
        $sql_ary[] = array('config_name' =>  'pz_warpblade', 'config_value' => 'Warpblade Tunnels'  );
        $sql_ary[] = array('config_name' =>  'pz_sigmar', 'config_value' => 'Sigmar Crypts'  );
        $sql_ary[] = array('config_name' =>  'pz_broodwrought', 'config_value' => 'The Bloodwrought Enclave'  );
        $sql_ary[] = array('config_name' =>  'pz_bilerot', 'config_value' => 'The Bilerot Burrow'  );
        $sql_ary[] = array('config_name' =>  'pz_lostvale', 'config_value' => 'The Lost Vale'  );		
        $sql_ary[] = array('config_name' =>  'pz_vulture', 'config_value' => 'Tomb of the Vulture Lord'  );	
        $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config', $sql_ary);
        unset ($sql_ary);
        
        // Zone show     
        $sql_ary[] = array('config_name' =>  'sz_altdorf', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_sacellum', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_gunbad', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_stair', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_warpblade', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_sigmar', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_broodwrought', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_bilerot', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_lostvale', 'config_value' => '1'  );
        $sql_ary[] = array('config_name' =>  'sz_vulture', 'config_value' => '1'  );	
        $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config', $sql_ary);
        unset ($sql_ary);	
    	
	}
    


    // Boss offsets
	$db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_offsets');
	$sql_ary = array();
	$sql_ary[] = array('name' => 'altdorf' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'sacellum' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gunbad' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'stair' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'warpblade' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'sigmar' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'broodwrought' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'bilerot' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'lostvale' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'vulture' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );				
	
	$sql_ary[] = array('name' => 'kokrit' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'bulbous' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'fangchitter' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'vitchek' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'goradian' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	$sql_ary[] = array('name' => 'ghalmar' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'guzhak' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'vul' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'hoarfrost' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'sebcraw' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'thunder' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'breeder' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'goremane' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'viraxil' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	$sql_ary[] = array('name' => 'griblik' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'bilebane' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'garrolath' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'foulm' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'kurga' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'glomp' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'solithex' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	$sql_ary[] = array('name' => 'borzar' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gahlvoth' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'azuk' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'thar' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'urlf' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'garithex' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'chorek' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'garrolath' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'slarith' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'wrackspite' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'clawfang' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'zekaraz' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'kaarn' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'skullord' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_offsets', $sql_ary);  
    
		
}  


/*
 * new boss progress data for warhammer
 * generated with the spreadsheet
 * 
 */
function update_warhammer_bb2($bbdkp_table_prefix)
{
	global $db, $table_prefix, $umil, $user;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_zonetable' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_bosstable' )))
	{
		$sql_ary = array ();
		$sql_ary[] = array( 'id' => 1 , 'imagename' =>  'altdorf' , 'game' =>  'warhammer' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '0' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 2 , 'imagename' =>  'sacellum' , 'game' =>  'warhammer' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '0' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 3 , 'imagename' =>  'gunbad' , 'game' =>  'warhammer' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '0' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 4 , 'imagename' =>  'stair' , 'game' =>  'warhammer' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '0' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_zonetable', $sql_ary );
		unset ( $sql_ary );

		$sql_ary[] = array('id' => 1 ,  'imagename' =>  'kokrit' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '19409' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 2 ,  'imagename' =>  'bulbous' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '3650' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 3 ,  'imagename' =>  'fangchitter' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '3651' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 4 ,  'imagename' =>  'vitchek' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '18762' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 5 ,  'imagename' =>  'goradian' , 'game' =>  'warhammer' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '33401' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 6 ,  'imagename' =>  'ghalmar' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '25721' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 7 ,  'imagename' =>  'guzhak' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '22044' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 8 ,  'imagename' =>  'vul' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '33173' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 9 ,  'imagename' =>  'hoarfrost' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '10256' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 10 ,  'imagename' =>  'sebcraw' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '26812' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 11 ,  'imagename' =>  'thunder' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '93573' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 12 ,  'imagename' =>  'breeder' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '33172' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 13 ,  'imagename' =>  'goremane' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '33182' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 14 ,  'imagename' =>  'viraxil' , 'game' =>  'warhammer' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '33181' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 15 ,  'imagename' =>  'griblik' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '36549' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 16 ,  'imagename' =>  'bilebane' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '36547' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 17 ,  'imagename' =>  'garrolath' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '38234' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 18 ,  'imagename' =>  'foulm' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '38623' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 19 ,  'imagename' =>  'kurga' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '38624' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 20 ,  'imagename' =>  'glomp' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '38829' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 21 ,  'imagename' =>  'solithex' , 'game' =>  'warhammer' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '37964' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 22 ,  'imagename' =>  'borzar' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '9227' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 23 ,  'imagename' =>  'gahlvoth' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '45224' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 24 ,  'imagename' =>  'azuk' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '47390' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 25 ,  'imagename' =>  'thar' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '45084' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 26 ,  'imagename' =>  'urlf' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '7622' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 27 ,  'imagename' =>  'garithex' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '7597' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 28 ,  'imagename' =>  'chorek' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '49164' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 29 ,  'imagename' =>  'slarith' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '48112' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 30 ,  'imagename' =>  'wrackspite' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '16078' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 31 ,  'imagename' =>  'clawfang' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '46327' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 32 ,  'imagename' =>  'zekaraz' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '46325' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 33 ,  'imagename' =>  'kaarn' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '46330' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 34 ,  'imagename' =>  'skullord' , 'game' =>  'warhammer' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '64106' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		
				
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_bosstable', $sql_ary );
		unset ( $sql_ary );
	
		$sql_ary[] = array( 'id' => 1 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Altdorf Sewers' ,  'name_short' =>  'Altdorf Sewers' );
		$sql_ary[] = array( 'id' => 2 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Sacellum Dungeon' ,  'name_short' =>  'The Sacellum Dungeon' );
		$sql_ary[] = array( 'id' => 3 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Mount Gunbad' ,  'name_short' =>  'Mount Gunbad' );
		$sql_ary[] = array( 'id' => 4 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Bastion Stair' ,  'name_short' =>  'The Bastion Stair' );
		$sql_ary[] = array( 'id' => 5 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kokrit Man-Eater' ,  'name_short' =>  'Kokrit' );
		$sql_ary[] = array( 'id' => 6 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bulbous One' ,  'name_short' =>  'Bulbous' );
		$sql_ary[] = array( 'id' => 7 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Prot and Vermer Fangchitter' ,  'name_short' =>  'Fangchitter' );
		$sql_ary[] = array( 'id' => 8 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Master Moulder Vitchek' ,  'name_short' =>  'Vitchek' );
		$sql_ary[] = array( 'id' => 9 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Goradian the Creator' ,  'name_short' =>  'Goradian' );
		$sql_ary[] = array( 'id' => 10 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ghalmar Ragehorn' ,  'name_short' =>  'Ghalmar' );
		$sql_ary[] = array( 'id' => 11 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Guzhak the Betrayer' ,  'name_short' =>  'Guzhak' );
		$sql_ary[] = array( 'id' => 12 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vul The Bloodchosen' ,  'name_short' =>  'Vul' );
		$sql_ary[] = array( 'id' => 13 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hoarfrost' ,  'name_short' =>  'Hoarfrost' );
		$sql_ary[] = array( 'id' => 14 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sebcraw the Discarded' ,  'name_short' =>  'Sebcraw' );
		$sql_ary[] = array( 'id' => 15 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Slorth and Lorth Thunderbelly' ,  'name_short' =>  'Thunderbelly' );
		$sql_ary[] = array( 'id' => 16 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Snaptail the Breeder' ,  'name_short' =>  'Snaptail' );
		$sql_ary[] = array( 'id' => 17 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Goremane' ,  'name_short' =>  'Goremane' );
		$sql_ary[] = array( 'id' => 18 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Viraxil the Broken' ,  'name_short' =>  'Viraxil' );
		$sql_ary[] = array( 'id' => 19 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Griblik da Stinka' ,  'name_short' =>  'Griblik' );
		$sql_ary[] = array( 'id' => 20 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bilebane the Rager' ,  'name_short' =>  'Bilebane' );
		$sql_ary[] = array( 'id' => 21 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Garrolath the Poxbearer' ,  'name_short' =>  'Garrolath' );
		$sql_ary[] = array( 'id' => 22 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Foul Mouf da ’ungry' ,  'name_short' =>  'Foul' );
		$sql_ary[] = array( 'id' => 23 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kurga da Squig-Maker' ,  'name_short' =>  'Kurga' );
		$sql_ary[] = array( 'id' => 24 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Glomp the Squig Masta' ,  'name_short' =>  'Glomp' );
		$sql_ary[] = array( 'id' => 25 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Solithex' ,  'name_short' =>  'Solithex' );
		$sql_ary[] = array( 'id' => 26 , 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Borzar Rageborn' ,  'name_short' =>  'Rageborn' );
		$sql_ary[] = array( 'id' => 27 , 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gahlvoth Darkrage' ,  'name_short' =>  'Gahlvoth' );
		$sql_ary[] = array( 'id' => 28 , 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Azuk’Thul' ,  'name_short' =>  'Azuk’Thul' );
		$sql_ary[] = array( 'id' => 29 , 'attribute_id' => 25, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thar’lgnan' ,  'name_short' =>  'Thar’lgnan' );
		$sql_ary[] = array( 'id' => 30 , 'attribute_id' => 26, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Urlf Daemonblessed' ,  'name_short' =>  'Urlf' );
		$sql_ary[] = array( 'id' => 31 , 'attribute_id' => 27, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Garithex the Mountain' ,  'name_short' =>  'Garithex' );
		$sql_ary[] = array( 'id' => 32 , 'attribute_id' => 28, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chorek the Unstoppable' ,  'name_short' =>  'Chorek' );
		$sql_ary[] = array( 'id' => 33 , 'attribute_id' => 29, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Slaurith' ,  'name_short' =>  'Slaurith' );
		$sql_ary[] = array( 'id' => 34 , 'attribute_id' => 30, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Wrackspite' ,  'name_short' =>  'Wrackspite' );
		$sql_ary[] = array( 'id' => 35 , 'attribute_id' => 31, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Clawfang and Doomspike' ,  'name_short' =>  'Clawfang' );
		$sql_ary[] = array( 'id' => 36 , 'attribute_id' => 32, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zekaraz the Bloodcaller' ,  'name_short' =>  'Zekaraz' );
		$sql_ary[] = array( 'id' => 37 , 'attribute_id' => 33, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kaarn the Vanquisher' ,  'name_short' =>  'Kaarn' );
		$sql_ary[] = array( 'id' => 38 , 'attribute_id' => 34, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Skull Lord Var’Ithrok' ,  'name_short' =>  'Var’Ithrok' );
		
		$sql_ary[] = array( 'id' => 39 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Altdorf Sewers' ,  'name_short' =>  'Altdorf Sewers' );
		$sql_ary[] = array( 'id' => 40 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Sacellum Dungeon' ,  'name_short' =>  'The Sacellum Dungeon' );
		$sql_ary[] = array( 'id' => 41 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Mount Gunbad' ,  'name_short' =>  'Mount Gunbad' );
		$sql_ary[] = array( 'id' => 42 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Bastion Stair' ,  'name_short' =>  'The Bastion Stair' );
		$sql_ary[] = array( 'id' => 43 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kokrit Man-Eater' ,  'name_short' =>  'Kokrit' );
		$sql_ary[] = array( 'id' => 44 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Bulbous One' ,  'name_short' =>  'Bulbous' );
		$sql_ary[] = array( 'id' => 45 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Prot and Vermer Fangchitter' ,  'name_short' =>  'Fangchitter' );
		$sql_ary[] = array( 'id' => 46 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Master Moulder Vitchek' ,  'name_short' =>  'Vitchek' );
		$sql_ary[] = array( 'id' => 47 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Goradian the Creator' ,  'name_short' =>  'Goradian' );
		$sql_ary[] = array( 'id' => 48 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ghalmar Ragehorn' ,  'name_short' =>  'Ghalmar' );
		$sql_ary[] = array( 'id' => 49 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Guzhak the Betrayer' ,  'name_short' =>  'Guzhak' );
		$sql_ary[] = array( 'id' => 50 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vul The Bloodchosen' ,  'name_short' =>  'Vul' );
		$sql_ary[] = array( 'id' => 51 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Hoarfrost' ,  'name_short' =>  'Hoarfrost' );
		$sql_ary[] = array( 'id' => 52 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sebcraw the Discarded' ,  'name_short' =>  'Sebcraw' );
		$sql_ary[] = array( 'id' => 53 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Slorth and Lorth Thunderbelly' ,  'name_short' =>  'Thunderbelly' );
		$sql_ary[] = array( 'id' => 54 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Snaptail the Breeder' ,  'name_short' =>  'Snaptail' );
		$sql_ary[] = array( 'id' => 55 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Goremane' ,  'name_short' =>  'Goremane' );
		$sql_ary[] = array( 'id' => 56 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Viraxil the Broken' ,  'name_short' =>  'Viraxil' );
		$sql_ary[] = array( 'id' => 57 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Griblik da Stinka' ,  'name_short' =>  'Griblik' );
		$sql_ary[] = array( 'id' => 58 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Bilebane the Rager' ,  'name_short' =>  'Bilebane' );
		$sql_ary[] = array( 'id' => 59 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Garrolath the Poxbearer' ,  'name_short' =>  'Garrolath' );
		$sql_ary[] = array( 'id' => 60 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Foul Mouf da ’ungry' ,  'name_short' =>  'Foul' );
		$sql_ary[] = array( 'id' => 61 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kurga da Squig-Maker' ,  'name_short' =>  'Kurga' );
		$sql_ary[] = array( 'id' => 62 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Glomp the Squig Masta' ,  'name_short' =>  'Glomp' );
		$sql_ary[] = array( 'id' => 63 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Solithex' ,  'name_short' =>  'Solithex' );
		$sql_ary[] = array( 'id' => 64 , 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Borzar Rageborn' ,  'name_short' =>  'Rageborn' );
		$sql_ary[] = array( 'id' => 65 , 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gahlvoth Darkrage' ,  'name_short' =>  'Gahlvoth' );
		$sql_ary[] = array( 'id' => 66 , 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Azuk’Thul' ,  'name_short' =>  'Azuk’Thul' );
		$sql_ary[] = array( 'id' => 67 , 'attribute_id' => 25, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thar’lgnan' ,  'name_short' =>  'Thar’lgnan' );
		$sql_ary[] = array( 'id' => 68 , 'attribute_id' => 26, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Urlf Daemonblessed' ,  'name_short' =>  'Urlf' );
		$sql_ary[] = array( 'id' => 69 , 'attribute_id' => 27, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Garithex the Mountain' ,  'name_short' =>  'Garithex' );
		$sql_ary[] = array( 'id' => 70 , 'attribute_id' => 28, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Chorek the Unstoppable' ,  'name_short' =>  'Chorek' );
		$sql_ary[] = array( 'id' => 71 , 'attribute_id' => 29, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lord Slaurith' ,  'name_short' =>  'Slaurith' );
		$sql_ary[] = array( 'id' => 72 , 'attribute_id' => 30, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Wrackspite' ,  'name_short' =>  'Wrackspite' );
		$sql_ary[] = array( 'id' => 73 , 'attribute_id' => 31, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Clawfang and Doomspike' ,  'name_short' =>  'Clawfang' );
		$sql_ary[] = array( 'id' => 74 , 'attribute_id' => 32, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zekaraz the Bloodcaller' ,  'name_short' =>  'Zekaraz' );
		$sql_ary[] = array( 'id' => 75 , 'attribute_id' => 33, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kaarn the Vanquisher' ,  'name_short' =>  'Kaarn' );
		$sql_ary[] = array( 'id' => 76 , 'attribute_id' => 34, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Skull Lord Var’Ithrok' ,  'name_short' =>  'Var’Ithrok' );
	
		$sql_ary[] = array( 'id' => 77 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 78 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Witch Elf' ,  'name_short' =>  'Witch Elf' );
		$sql_ary[] = array( 'id' => 79 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Sorcerer' ,  'name_short' =>  'Sorcerer' );
		$sql_ary[] = array( 'id' => 80 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Disciple of Khaine' ,  'name_short' =>  'Disciple of Khaine' );
		$sql_ary[] = array( 'id' => 81 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Chosen' ,  'name_short' =>  'Chosen' );
		$sql_ary[] = array( 'id' => 82 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Marauder' ,  'name_short' =>  'Marauder' );
		$sql_ary[] = array( 'id' => 83 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Zealot' ,  'name_short' =>  'Zealot' );
		$sql_ary[] = array( 'id' => 84 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Magus' ,  'name_short' =>  'Magus' );
		$sql_ary[] = array( 'id' => 85 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Squig Herder' ,  'name_short' =>  'Squig Herder' );
		$sql_ary[] = array( 'id' => 86 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Black Orc' ,  'name_short' =>  'Black Orc' );
		$sql_ary[] = array( 'id' => 87 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shaman' ,  'name_short' =>  'Shaman' );
		$sql_ary[] = array( 'id' => 88 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Rune Priest' ,  'name_short' =>  'Rune Priest' );
		$sql_ary[] = array( 'id' => 89 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Iron Breaker' ,  'name_short' =>  'Iron Breaker' );
		$sql_ary[] = array( 'id' => 90 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Engineer' ,  'name_short' =>  'Engineer' );
		$sql_ary[] = array( 'id' => 91 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Witch Hunter' ,  'name_short' =>  'Witch Hunter' );
		$sql_ary[] = array( 'id' => 92 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Bright Wizard' ,  'name_short' =>  'Bright Wizard' );
		$sql_ary[] = array( 'id' => 93 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warrior Priest' ,  'name_short' =>  'Warrior Priest' );
		$sql_ary[] = array( 'id' => 94 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Archmage' ,  'name_short' =>  'Archmage' );
		$sql_ary[] = array( 'id' => 95 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Swordmaster' ,  'name_short' =>  'Swordmaster' );
		$sql_ary[] = array( 'id' => 96 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shadow Warrior' ,  'name_short' =>  'Shadow Warrior' );
		$sql_ary[] = array( 'id' => 97 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'White Lion' ,  'name_short' =>  'White Lion' );
		
		$sql_ary[] = array( 'id' => 105 , 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 106 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Witch Elf' ,  'name_short' =>  'Witch Elf' );
		$sql_ary[] = array( 'id' => 107 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Sorcerer' ,  'name_short' =>  'Sorcerer' );
		$sql_ary[] = array( 'id' => 108 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Disciple of Khaine' ,  'name_short' =>  'Disciple of Khaine' );
		$sql_ary[] = array( 'id' => 109 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chosen' ,  'name_short' =>  'Chosen' );
		$sql_ary[] = array( 'id' => 110 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Marauder' ,  'name_short' =>  'Marauder' );
		$sql_ary[] = array( 'id' => 111 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Zealot' ,  'name_short' =>  'Zealot' );
		$sql_ary[] = array( 'id' => 112 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Magus' ,  'name_short' =>  'Magus' );
		$sql_ary[] = array( 'id' => 113 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Squig Herder' ,  'name_short' =>  'Squig Herder' );
		$sql_ary[] = array( 'id' => 114 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Black Orc' ,  'name_short' =>  'Black Orc' );
		$sql_ary[] = array( 'id' => 115 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Shaman' ,  'name_short' =>  'Shaman' );
		$sql_ary[] = array( 'id' => 116 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Rune Priest' ,  'name_short' =>  'Rune Priest' );
		$sql_ary[] = array( 'id' => 117 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Iron Breaker' ,  'name_short' =>  'Iron Breaker' );
		$sql_ary[] = array( 'id' => 118 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Engineer' ,  'name_short' =>  'Engineer' );
		$sql_ary[] = array( 'id' => 119 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Witch Hunter' ,  'name_short' =>  'Witch Hunter' );
		$sql_ary[] = array( 'id' => 120 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Bright Wizard' ,  'name_short' =>  'Bright Wizard' );
		$sql_ary[] = array( 'id' => 121 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Warrior Priest' ,  'name_short' =>  'Warrior Priest' );
		$sql_ary[] = array( 'id' => 122 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Archmage' ,  'name_short' =>  'Archmage' );
		$sql_ary[] = array( 'id' => 123 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Swordmaster' ,  'name_short' =>  'Swordmaster' );
		$sql_ary[] = array( 'id' => 124 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Shadow Warrior' ,  'name_short' =>  'Shadow Warrior' );
		$sql_ary[] = array( 'id' => 125 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'White Lion' ,  'name_short' =>  'White Lion' );
	
		$sql_ary[] = array( 'id' => 98 , 'attribute_id'  => 0, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 99 , 'attribute_id'  => 1, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 100 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'The Empire' ,  'name_short' =>  'The Empire' );
		$sql_ary[] = array( 'id' => 101 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'High Elves' ,  'name_short' =>  'High Elves' );
		$sql_ary[] = array( 'id' => 102 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dark Elves' ,  'name_short' =>  'Dark Elves' );
		$sql_ary[] = array( 'id' => 103 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Chaos' ,  'name_short' =>  'Chaos' );
		$sql_ary[] = array( 'id' => 104 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Greenskins' ,  'name_short' =>  'Greenskins' );
						
		$sql_ary[] = array( 'id' => 126 , 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 127 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 128 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'The Empire' ,  'name_short' =>  'The Empire' );
		$sql_ary[] = array( 'id' => 129 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'High Elves' ,  'name_short' =>  'High Elves' );
		$sql_ary[] = array( 'id' => 130 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Dark Elves' ,  'name_short' =>  'Dark Elves' );
		$sql_ary[] = array( 'id' => 131 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Chaos' ,  'name_short' =>  'Chaos' );
		$sql_ary[] = array( 'id' => 132 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Greenskins' ,  'name_short' =>  'Greenskins' );

		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_language', $sql_ary );
		unset ( $sql_ary );
						
		
	}
}




?>