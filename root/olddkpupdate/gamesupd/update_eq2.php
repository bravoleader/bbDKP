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

function update_eq2($bbdkp_table_prefix)
{
    global  $db, $table_prefix, $umil, $user;

    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'classes');
   
    $sql_ary = array();
    // Everquest classes

	$sql_ary[] = array('class_id' => 0, 'class_name' => 'Unknown', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 1, 'class_name' => 'Assassin', 'class_armor_type' => 'MAIL' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 2, 'class_name' => 'Berserker', 'class_armor_type' => 'PLATE' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 3, 'class_name' => 'Bruiser', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 4, 'class_name' => 'Brigand', 'class_armor_type' => 'MAIL' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 5, 'class_name' => 'Coercer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 6, 'class_name' => 'Conjuror', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 7, 'class_name' => 'Defiler', 'class_armor_type' => 'MAIL' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 8, 'class_name' => 'Dirge', 'class_armor_type' => 'MAIL' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 9, 'class_name' => 'Fury', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 10, 'class_name' => 'Guardian', 'class_armor_type' => 'PLATE' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 11, 'class_name' => 'Illusionist', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 12, 'class_name' => 'Inquisitor', 'class_armor_type' => 'PLATE' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 13,  'class_name' => 'Monk', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 14, 'class_name' => 'Mystic', 'class_armor_type' => 'MAIL' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 15, 'class_name' => 'Necromancer', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 16, 'class_name' => 'Paladin', 'class_armor_type' => 'PLATE' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 17, 'class_name' => 'Ranger', 'class_armor_type' => 'MAIL' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 18, 'class_name' => 'Shadowknight', 'class_armor_type' => 'PLATE' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 19, 'class_name' => 'Swashbuckler', 'class_armor_type' => 'MAIL' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 20, 'class_name' => 'Templar', 'class_armor_type' => 'PLATE' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 21, 'class_name' => 'Troubador', 'class_armor_type' => 'MAIL' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 22, 'class_name' => 'Warlock', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 23, 'class_name' => 'Warden', 'class_armor_type' => 'LEATHER' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$sql_ary[] = array('class_id' => 24, 'class_name' => 'Wizard', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 20 , 'class_max_level'  => 99 ); 
	$db->sql_multi_insert( $bbdkp_table_prefix . 'classes', $sql_ary);
   	unset ($sql_ary); 
  	
    $db->sql_multi_insert($bbdkp_table_prefix . 'indexpage', $sql_ary);
    
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
    
    // Everquest 2 races
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'races');
    $sql_ary = array();
    $sql_ary[] = array('race_id' => 0, 'race_name' => 'Unknown' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 1, 'race_name' => 'Gnome' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 2, 'race_name' => 'Human' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 3, 'race_name' => 'Barbarian' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 4, 'race_name' => 'Dwarf' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 5, 'race_name' => 'High Elf' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 6, 'race_name' => 'Dark Elf' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 7, 'race_name' => 'Wood Elf' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 8, 'race_name' => 'Half Elf' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 9, 'race_name' => 'Kerra' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 10, 'race_name' => 'Troll' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 11, 'race_name' => 'Ogre' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 12, 'race_name' => 'Frog' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 13, 'race_name' => 'Iksar' , 'race_faction_id' => 2 );
    $sql_ary[] = array('race_id' => 14, 'race_name' => 'Erudite' , 'race_faction_id' => 3 );
    $sql_ary[] = array('race_id' => 15, 'race_name' => 'Halfling' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 16, 'race_name' => 'Ratonga' , 'race_faction_id' => 3 );
    
    $db->sql_multi_insert( $bbdkp_table_prefix . 'races', $sql_ary);
    
    unset ($sql_ary);

    // bossprogress for Everquest2

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
	
    // boss list     
    $sql_ary = array();
    $sql_ary[] = array('config_name' => 'pb_dummy', 'config_value' => 'Dummy boss'  );

    // Trakanon's Lair (Rise of Kunark) 
    $sql_ary[] = array('config_name' => 'pb_trakanon', 'config_value' => 'Trakanon' );

    // Veeshan's Peak (Rise of Kunark) 
    $sql_ary[] = array('config_name' => 'pb_kluzen', 'config_value' => 'Kluzen the Protector' );
    $sql_ary[] = array('config_name' => 'pb_ekron', 'config_value' => 'Elder Ekron' );
    $sql_ary[] = array('config_name' => 'pb_silverwing', 'config_value' => 'Silverwing' );
    $sql_ary[] = array('config_name' => 'pb_travenro', 'config_value' => 'Travenro the Skygazer' );
    $sql_ary[] = array('config_name' => 'pb_phara_dar', 'config_value' => 'Phara Dar' );
    $sql_ary[] = array('config_name' => 'pb_taskmaster_nichok', 'config_value' => 'Taskmaster Nichok' );
    $sql_ary[] = array('config_name' => 'pb_qunard_ashenclaw', 'config_value' => 'Qunard Ashenclaw' );
    $sql_ary[] = array('config_name' => 'pb_hoshkar', 'config_value' => 'Hoshkar' );
    $sql_ary[] = array('config_name' => 'pb_druushk', 'config_value' => 'Druushk' );
    $sql_ary[] = array('config_name' => 'pb_milyex_vioren', 'config_value' => 'Milyex Vioren' );
    $sql_ary[] = array('config_name' => 'pb_xygoz', 'config_value' => 'Xygoz' );
    $sql_ary[] = array('config_name' => 'pb_nexona', 'config_value' => 'Nexona' );
    
	//The Chamber of Destiny (Rise of Kunark) 
    $sql_ary[] = array('config_name' => 'pb_leviathan', 'config_value' => 'Leviathan' );
    
	// Venril Sathir's Lair (Rise of Kunark) 
    $sql_ary[] = array('config_name' => 'pb_venril', 'config_value' => 'Venril Sathir' );
    
    // The Temple of Kor-Sha (Rise of Kunark) 
    $sql_ary[] = array('config_name' => 'pb_aktar_the_dark', 'config_value' => 'Aktar the Dark' );
    $sql_ary[] = array('config_name' => 'pb_atrebe', 'config_value' => 'Atrebe\'s Statue' );
    $sql_ary[] = array('config_name' => 'pb_ilyan', 'config_value' => 'Ilyan' );
    $sql_ary[] = array('config_name' => 'pb_kodyx', 'config_value' => 'Kodux' );
    $sql_ary[] = array('config_name' => 'pb_selrach', 'config_value' => 'Selrach Di\'Zok' );
    $sql_ary[] = array('config_name' => 'pb_uthtak_the_cruel', 'config_value' => 'Uthtak the Cruel' );
	$sql_ary[] = array('config_name' => 'pb_uzdrak_the_invincible', 'config_value' => 'Uzdrak the Invincible' );
    $sql_ary[] = array('config_name' => 'pb_zarda', 'config_value' => 'Zarda' );
    
    //	 The Protector's Realm (Rise of Kunark) 
    $sql_ary[] = array('config_name' => 'pb_adkar_vyx', 'config_value' => 'Adkar Vyx' );
    $sql_ary[] = array('config_name' => 'pb_iztapa_vyx', 'config_value' => 'Iztapa Vyx' );
    $sql_ary[] = array('config_name' => 'pb_wymbulu_vyx', 'config_value' => 'Wymbulu Vyx' );
    $sql_ary[] = array('config_name' => 'pb_zykluk_vyx', 'config_value' => 'Zykluk Vyx' );
    $sql_ary[] = array('config_name' => 'pb_blorgok_the_brutal', 'config_value' => 'Blorgok the Brutal' );
    $sql_ary[] = array('config_name' => 'pb_doomcoil', 'config_value' => 'Doomcoil' );
    $sql_ary[] = array('config_name' => 'pb_imzok', 'config_value' => 'Imzok\'s Revenge' );
    $sql_ary[] = array('config_name' => 'pb_jracol_binari', 'config_value' => 'Jracol Binari' );
    $sql_ary[] = array('config_name' => 'pb_ludmila_kystov', 'config_value' => 'Ludmila Kystov' );
    
    //  The Execution Throne Room (Rise of Kunark) 
    $sql_ary[] = array('config_name' => 'pb_pawbuster', 'config_value' => 'Pawbuster' ); 

    //The Tomb of Thuuga (Rise of Kunark) 
    $sql_ary[] = array('config_name' => 'pb_tairiza', 'config_value' => 'Tairiza the Widow Mistress' );    
    
   	 /* Throne of New Tunaria (Echoes of Faydwer)  */
    $sql_ary[] = array('config_name' => 'pb_harbinger_of_absolution', 'config_value' => 'The Harbinger of Absolution' );
    $sql_ary[] = array('config_name' => 'pb_vampire_lord_mayong_mistmoore', 'config_value' => 'Vampire Lord Mayong Mistmoore' );  
    
    $sql_ary[] = array('config_name' => 'pb_mayong_mistmoore', 'config_value' => 'Mayong Mistmoore' );
    $sql_ary[] = array('config_name' => 'pb_cheroon', 'config_value' => 'D\'Lizta Cheroon' );   
    $sql_ary[] = array('config_name' => 'pb_kzalk', 'config_value' => 'V\'Tekla K\'Zalk' ); 
    $sql_ary[] = array('config_name' => 'pb_viswin', 'config_value' => 'D\'Lizta Viswin' ); 
    $sql_ary[] = array('config_name' => 'pb_enynti', 'config_value' => 'Enynti' ); 
            
    $sql_ary[] = array('config_name' => 'pb_malkonis', 'config_value' => 'Malkonis D\'Morte' );
    $sql_ary[] = array('config_name' => 'pb_treyloth', 'config_value' => 'Treyloth D\'Kulvith' );
    $sql_ary[] = array('config_name' => 'pb_othysis', 'config_value' => 'Othysis Muravian' );
    $sql_ary[] = array('config_name' => 'pb_zylphax', 'config_value' => 'Zylphax_the_Shredder' );
    
    $sql_ary[] = array('config_name' => 'pb_wuoshi', 'config_value' => 'Wuoshi' );
    $sql_ary[] = array('config_name' => 'pb_galiel_spirithoof', 'config_value' => 'Galiel Spirithoof' );
    $sql_ary[] = array('config_name' => 'pb_treah_greenroot', 'config_value' => 'Treah Greenroot' );
    $sql_ary[] = array('config_name' => 'pb_sariah_the_bloomseeker', 'config_value' => 'Sariah the Bloomseeker' );
    $sql_ary[] = array('config_name' => 'pb_mistress_of_the_veil', 'config_value' => 'Mistress of the Veil' );
    $sql_ary[] = array('config_name' => 'pb_sarik_the_fang', 'config_value' => 'Sarik the Fang' );
    $sql_ary[] = array('config_name' => 'pb_segmented_rumbler', 'config_value' => 'The Segmented Rumbler' );
    $sql_ary[] = array('config_name' => 'pb_elaani_the_collector', 'config_value' => 'Elaani the collector' );
    $sql_ary[] = array('config_name' => 'pb_gardener_thirgen', 'config_value' => 'Gardener Thirgen' );
    $sql_ary[] = array('config_name' => 'pb_the_farstride_unicorn', 'config_value' => 'The Farstride Unicorn' );
    $sql_ary[] = array('config_name' => 'pb_tender_of_the_seedlings', 'config_value' => 'Tender of the Seedlings' );
    
	$sql_ary[] = array('config_name' => 'pb_round_1', 'config_value' => 'Round 1' );
	$sql_ary[] = array('config_name' => 'pb_round_2', 'config_value' => 'Round 2' );
	$sql_ary[] = array('config_name' => 'pb_round_3', 'config_value' => 'Round 3' );
    
	$sql_ary[] = array('config_name' => 'pb_tatr', 'config_value' => 'The Ancient Twisted Root' );
	$sql_ary[] = array('config_name' => 'pb_tatf', 'config_value' => 'The Ancient Twisted Fungus' );
	$sql_ary[] = array('config_name' => 'pb_crusher', 'config_value' => 'The Crusher, Crusher' );
	$sql_ary[] = array('config_name' => 'pb_xuxlaiom', 'config_value' => 'Xuxlaio Master of the Fluttering Wing, Xuxlaio' );
	
	$sql_ary[] = array('config_name' => 'pb_bonesplitter', 'config_value' => 'Bonesplitter' );
	
	$sql_ary[] = array('config_name' => 'pb_gurgul', 'config_value' => 'Gurgul the Warden, Gurgul' );
	$sql_ary[] = array('config_name' => 'pb_kogurgul', 'config_value' => 'Keeper of Gurgul' );
	$sql_ary[] = array('config_name' => 'pb_kog', 'config_value' => 'Keeper of the Gate' );
	$sql_ary[] = array('config_name' => 'pb_final_warden', 'config_value' => 'The Final Warden' );
	$sql_ary[] = array('config_name' => 'pb_gol', 'config_value' => 'The Guardian of Leadership' );
	
	$sql_ary[] = array('config_name' => 'pb_essence_of_fear', 'config_value' => 'Essence of Fear' );
	$sql_ary[] = array('config_name' => 'pb_gnillaw', 'config_value' => 'Gnillaw the Demented' );
	$sql_ary[] = array('config_name' => 'pb_gnorbl', 'config_value' => 'Gnorbl the Playful' );
	$sql_ary[] = array('config_name' => 'pb_vilucidae', 'config_value' => 'Vilucidae the Priest of Thule, Vilucidae' );
	
	$sql_ary[] = array('config_name' => 'pb_alzid', 'config_value' => 'The Slaving Alzid, Alzid' );
	$sql_ary[] = array('config_name' => 'pb_doomright', 'config_value' => 'Doomright Vakrizt, Vakrizt' );
	$sql_ary[] = array('config_name' => 'pb_pardas', 'config_value' => 'Pardas Predd, Predd' );
	$sql_ary[] = array('config_name' => 'pb_kinvah', 'config_value' => 'Doom Prophet Kinvah, Kinvah' );
	$sql_ary[] = array('config_name' => 'pb_ruystad', 'config_value' => 'Doom Ravager Ruystad, Ruystad' );
	$sql_ary[] = array('config_name' => 'pb_cheyak', 'config_value' => 'Doom Reaver Cheyak, Cheyak' );
	$sql_ary[] = array('config_name' => 'pb_uncaged_alzid', 'config_value' => 'The Uncaged Alzid, Alzid' );
	$sql_ary[] = array('config_name' => 'pb_uustalastus', 'config_value' => 'Uustalastus Xiterrax, Xiterrax' );
	$sql_ary[] = array('config_name' => 'pb_doomsworn', 'config_value' => 'Doomsworn Zatrakh, Zatrakh' );
	$sql_ary[] = array('config_name' => 'pb_corsolander', 'config_value' => 'The Corsolander, Corsolander' );
	$sql_ary[] = array('config_name' => 'pb_amdaatk', 'config_value' => 'Euktrzkai Amdaatk, Amdaatk' );
	$sql_ary[] = array('config_name' => 'pb_vyemm', 'config_value' => 'Lord Vyemm, Vilucidae' );
	$sql_ary[] = array('config_name' => 'pb_alzid_prime', 'config_value' => 'Alzid Prime, Vilucidae' );
	
	$sql_ary[] = array('config_name' => 'pb_shadowy_presence', 'config_value' => 'A Shadowy Presence' );
	$sql_ary[] = array('config_name' => 'pb_charged_presence', 'config_value' => 'A Charged Presence' );
	$sql_ary[] = array('config_name' => 'pb_elemental_warder', 'config_value' => 'The Elemental Warder' );
	$sql_ary[] = array('config_name' => 'pb_pain', 'config_value' => 'Pain' );
	$sql_ary[] = array('config_name' => 'pb_suffering', 'config_value' => 'Suffering' );
	$sql_ary[] = array('config_name' => 'pb_bloodbeast', 'config_value' => 'BloodBeast' );
	$sql_ary[] = array('config_name' => 'pb_venekor', 'config_value' => 'Venekor' );
	
	$sql_ary[] = array('config_name' => 'pb_yitzik', 'config_value' => 'Yitzik the Hurler, Yitzik' );
	$sql_ary[] = array('config_name' => 'pb_fitzpitzle', 'config_value' => 'Fitzpitzle' );
	$sql_ary[] = array('config_name' => 'pb_amorphous', 'config_value' => 'Amorphous Drake, Amorphous' );
	$sql_ary[] = array('config_name' => 'pb_tarinax', 'config_value' => 'Tarinax the Destroyer, Tarinax' );
	$sql_ary[] = array('config_name' => 'pb_cruor', 'config_value' => 'Cruor Alluvium, Cruor' );
	
	
	$sql_ary[] = array('config_name' => 'pb_slashing_talon', 'config_value' => 'Prophet of The Slashing Talon, Prophet' );
	$sql_ary[] = array('config_name' => 'pb_flapping_wing', 'config_value' => 'Ancient of the Flapping Wings, Ancient' );
	$sql_ary[] = array('config_name' => 'pb_ireth', 'config_value' => 'Ireth the Cold, Ireth' );
	$sql_ary[] = array('config_name' => 'pb_sharti', 'config_value' => 'Sharti of the Flame, Sharti' );
	$sql_ary[] = array('config_name' => 'pb_gorenaire', 'config_value' => 'Gorenaire' );
	$sql_ary[] = array('config_name' => 'pb_talendor', 'config_value' => 'Talendor' );
	
	
    $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config', $sql_ary);
	unset ($sql_ary);	
	
     /* RoK */
    /* Tomb of Thuuga */
	
	// Zone names     
	$sql_ary[] = array('config_name' => 'pz_dummyzone', 'config_value' => 'Dummy Zone'  );
	
	// 8.4
	$sql_ary[] = array('config_name' => 'pz_trakanon_lair', 'config_value' => 'Trakanon\'s Lair');
	$sql_ary[] = array('config_name' => 'pz_veeshan', 'config_value' => 'Veeshan\'s Peak'  );
	
	// 8.3
	$sql_ary[] = array('config_name' => 'pz_destiny', 'config_value' => 'Chamber of Destiny'  );
	
	// 8.2
	$sql_ary[] = array('config_name' => 'pz_venril_sathir_lair', 'config_value' => 'Venril Sathir\'s Lair'  );
	$sql_ary[] = array('config_name' => 'pz_korsha', 'config_value' => 'Temple of Kor-Sha'  );
	
	// 8.1	
	$sql_ary[] = array('config_name' => 'pz_protector', 'config_value' => 'Protector\'s realm');
	$sql_ary[] = array('config_name' => 'pz_execution', 'config_value' => 'Execution Throne Room'  );
	$sql_ary[] = array('config_name' => 'pz_thuuga', 'config_value' => 'Tomb of Thuuga'  );
	//$sql_ary[] = array('config_name' => 'pz_shard', 'config_value' => 'Shard of Hate'  );
	
	// EoF	
	$sql_ary[] = array('config_name' => 'pz_tunaria', 'config_value' => 'Throne of New Tunaria' );
	$sql_ary[] = array('config_name' => 'pz_mistmoore', 'config_value' => 'Mistmoore\'s Inner Sanctum' );
	$sql_ary[] = array('config_name' => 'pz_freethinkers_hideout', 'config_value' => 'Freethinkers Hideout' );
	$sql_ary[] = array('config_name' => 'pz_emerald_halls', 'config_value' => 'Emerald Halls' );
	$sql_ary[] = array('config_name' => 'pz_clockwork_menace', 'config_value' => 'The Clockwork Menace Factory' );

	//Fallen Dynasty
	$sql_ary[] = array('config_name' => 'pz_xlar', 'config_value' => 'XuxLaios Roost' );
	$sql_ary[] = array('config_name' => 'pz_crustaceans', 'config_value' => 'Cavern of the Crustaceans' );
	
	//Kingdom of Sky
	$sql_ary[] = array('config_name' => 'pz_tol', 'config_value' => 'Trials of Awakened: Trial of Leadership' );
	$sql_ary[] = array('config_name' => 'pz_lyceum', 'config_value' => 'Lyceum of Abhorrence' );
	$sql_ary[] = array('config_name' => 'pz_lab_of_vyemm', 'config_value' => 'The Laboratory of Lord Vyemm' );
	$sql_ary[] = array('config_name' => 'pz_halls_of_the_seeing', 'config_value' => 'Halls of the Seeing' );	
	$sql_ary[] = array('config_name' => 'pz_deathtoll', 'config_value' => 'Deathtoll' );
	$sql_ary[] = array('config_name' => 'pz_awakening', 'config_value' => 'Ascent of the Awakening, Awakening' );
	
	$db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config', $sql_ary);
	unset ($sql_ary);

	// Zone show     
	$sql_ary[] = array('config_name' => 'sz_dummyzone', 'config_value' => '0'  );
	
	// RoK
	$sql_ary[] = array('config_name' => 'sz_trakanon_lair', 'config_value' => '1'  );
	$sql_ary[] = array('config_name' => 'sz_veeshan', 'config_value' => '1'  );
	
	$sql_ary[] = array('config_name' => 'sz_destiny', 'config_value' => '1'  );
	
	$sql_ary[] = array('config_name' => 'sz_venril_sathir_lair', 'config_value' => '1'  );
	$sql_ary[] = array('config_name' => 'sz_korsha', 'config_value' => '1'  );
	
	$sql_ary[] = array('config_name' => 'sz_protector', 'config_value' => '1');
	$sql_ary[] = array('config_name' => 'sz_execution', 'config_value' => '1'  );
	$sql_ary[] = array('config_name' => 'sz_thuuga', 'config_value' => '1'  );
	//$sql_ary[] = array('config_name' => 'sz_shard', 'config_value' => '1'  );
	
	// EoF	
	$sql_ary[] = array('config_name' => 'sz_tunaria', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_mistmoore', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_freethinkers_hideout', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_emerald_halls', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_clockwork_menace', 'config_value' => '1' );
    
	//Fallen Dynasty
	$sql_ary[] = array('config_name' => 'sz_crustaceans', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_xlar', 'config_value' => '1' );
	
	//Kingdom of Sky	
	$sql_ary[] = array('config_name' => 'sz_tol', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_lyceum', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_lab_of_vyemm', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_halls_of_the_seeing', 'config_value' => '1' );
	$sql_ary[] = array('config_name' => 'sz_deathtoll', 'config_value' => '1' );
	
	$sql_ary[] = array('config_name' => 'sz_awakening', 'config_value' => '1' );
	
	$db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config', $sql_ary);
	
	unset ($sql_ary);	

    // Zone and Boss offsets
	$db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_offsets');
	$sql_ary = array();

	/* Dummy */ 
	$sql_ary[] = array('name' => 'dummy' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'dummyzone' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/********** TIER 8 ************/

	/* RISE OF KUNARK */ 
	
	/* 8,4 trakanon's Lair */
	$sql_ary[] = array('name' => 'trakanon_lair' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'trakanon' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* 8,4 Veeshan's Peak */ 
	$sql_ary[] = array('name' => 'veeshan' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'kluzen' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ekron' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );	
	$sql_ary[] = array('name' => 'silverwing' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );	
	$sql_ary[] = array('name' => 'travenro' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'phara_dar' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'taskmaster_nichok' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'qunard_ashenclaw' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'hoshkar' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'druushk' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'milyex_vioren' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'xygoz' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'nexona' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* 8,3 Chamber of Destiny */ 
	$sql_ary[] = array('name' => 'destiny' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'leviathan' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* 8,2 Venril Sathir's Lair */ 
	$sql_ary[] = array('name' => 'venril_sathir_lair' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'venril' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* 8,2 Temple of Korsha */ 
	$sql_ary[] = array('name' => 'korsha' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'aktar_the_dark' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'atrebe' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ilyan' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'kodyx' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'selrach' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'uthtak_the_cruel' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'uzdrak_the_invincible' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'zarda' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );

	/* 8,1 Protector's Realm */ 
	$sql_ary[] = array('name' => 'protector' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'adkar_vyx' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'zykluk_vyx' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'iztapa_vyx' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'wymbulu_vyx' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'blorgok_the_brutal' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'doomcoil' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'imzok' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'jracol_binari' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ludmila_kystov' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );	

	/* 8,1 Executioner's Throne */ 
	$sql_ary[] = array('name' => 'execution' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'pawbuster' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* 8,1 Tomb of Thuuga */ 
	$sql_ary[] = array('name' => 'thuuga' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'tairiza' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* 8 Shard of Hate */ 
	//$sql_ary[] = array('name' => 'shard' , 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	

	/********** TIER 7 ************/

	/* Echoes of Faydwer */
	/* Throne of New Tunaria */
	$sql_ary[] = array('name' => 'tunaria','fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'harbinger_of_absolution','fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'vampire_lord_mayong_mistmoore','fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );		
    
	 /* mistmoore */
	$sql_ary[] = array('name' => 'mistmoore','fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'mayong_mistmoore','fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'cheroon', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'kzalk', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'viswin', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );  
    $sql_ary[] = array('name' => 'enynti', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );    
	
     /* freethinkers_hideout */
    $sql_ary[] = array('name' => 'freethinkers_hideout', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'malkonis', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'treyloth', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'othysis', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'zylphax', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
     /* emerald_halls */
	$sql_ary[] = array('name' => 'emerald_halls', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'wuoshi', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'galiel_spirithoof', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'treah_greenroot', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'sariah_the_bloomseeker', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'mistress_of_the_veil', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'sarik_the_fang', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'segmented_rumbler', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'elaani_the_collector', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'gardener_thirgen','fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'the_farstride_unicorn', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'tender_of_the_seedlings', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );

    /* clockwork_menace */
    $sql_ary[] = array('name' => 'clockwork_menace', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $sql_ary[] = array('name' => 'round_1', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'round_2', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'round_3', 'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* FD */
	/* xuxlaio */
	$sql_ary[] = array('name' => 'xlar' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'tatr' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'tatf' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'crusher' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'xuxlaiom' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* crustaceans */
	$sql_ary[] = array('name' => 'crustaceans' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'bonesplitter' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* tol */
	$sql_ary[] = array('name' => 'tol' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gurgul' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'kogurgul' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'kog' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'final_warden' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gol' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
    /* lyceum */
	$sql_ary[] = array('name' => 'lyceum' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'essence_of_fear' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gnillaw' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gnorbl' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'vilucidae' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* lab_of_vyemm   */
	$sql_ary[] = array('name' => 'lab_of_vyemm' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'alzid' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'doomright' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'pardas' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'kinvah' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ruystad' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'cheyak' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'uncaged_alzid' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'uustalastus' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'doomsworn' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'corsolander' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'amdaatk' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'vyemm' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'alzid_prime' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	
	/* halls_of_the_seeing */
	$sql_ary[] = array('name' => 'halls_of_the_seeing' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'shadowy_presence' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'charged_presence' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'elemental_warder' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'pain' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'suffering' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'bloodbeast' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'venekor' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* deathtoll */
	$sql_ary[] = array('name' => 'deathtoll' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'yitzik' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'fitzpitzle' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'amorphous' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'tarinax' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'cruor' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	/* awakening */
	$sql_ary[] = array('name' => 'awakening' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	$sql_ary[] = array('name' => 'slashing_talon' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'flapping_wing' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ireth' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'sharti' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gorenaire' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'talendor' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
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
function update_eq2_bb2($bbdkp_table_prefix)
{
	global $db, $table_prefix, $umil, $user;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_zonetable' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_bosstable' )))
	{
		$sql_ary = array ();
		
		$sql_ary[] = array( 'id' => 1 ,  'imagename' =>  'trakanon_lair' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 2 ,  'imagename' =>  'veeshan' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 3 ,  'imagename' =>  'destiny' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 4 ,  'imagename' =>  'venril_sathir_lair' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 5 ,  'imagename' =>  'korsha' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 6 ,  'imagename' =>  'protector' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 7 ,  'imagename' =>  'execution' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 8 ,  'imagename' =>  'thuuga' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 9 ,  'imagename' =>  'tunaria' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 10 ,  'imagename' =>  'mistmoore' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 11 ,  'imagename' =>  'freethinkers_hideout' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 12 ,  'imagename' =>  'emerald_halls' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 13 ,  'imagename' =>  'clockwork_menace' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 14 ,  'imagename' =>  'xlar' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 15 ,  'imagename' =>  'crustaceans' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 16 ,  'imagename' =>  'tol' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 17 ,  'imagename' =>  'lyceum' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 18 ,  'imagename' =>  'lab_of_vyemm' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 19 ,  'imagename' =>  'halls_of_the_seeing' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 20 ,  'imagename' =>  'deathtoll' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 21 ,  'imagename' =>  'awakening' , 'game' =>  'eq2' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
				
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_zonetable', $sql_ary );
		unset ( $sql_ary );
		
		$sql_ary[] = array('id' => 1 , 'imagename' =>  'trakanon' , 'game' =>  'eq2' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  'Trakanon' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 2 , 'imagename' =>  'kluzen' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Kluzen_the_Protector' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 3 , 'imagename' =>  'ekron' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Elder_Ekron' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 4 , 'imagename' =>  'silverwing' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Silverwing' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 5 , 'imagename' =>  'travenro' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Travenro_the_Skygazer' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 6 , 'imagename' =>  'phara_dar' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Phara_Dar' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 7 , 'imagename' =>  'taskmaster_nichok' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Taskmaster_Nichok' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 8 , 'imagename' =>  'qunard_ashenclaw' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Qunard_Ashenclaw' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 9 , 'imagename' =>  'hoshkar' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Hoshkar' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 10 , 'imagename' =>  'druushk' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'druushk' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 11 , 'imagename' =>  'milyex_vioren' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Milyex_Vioren' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 12 , 'imagename' =>  'xygoz' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Xygoz' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 13 , 'imagename' =>  'nexona' , 'game' =>  'eq2' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  'Nexona' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 14 , 'imagename' =>  'leviathan' , 'game' =>  'eq2' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  'The_Leviathan' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 15 , 'imagename' =>  'venril' , 'game' =>  'eq2' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  'Venril_Sathir' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 16 , 'imagename' =>  'aktar_the_dark' , 'game' =>  'eq2' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  'Aktar_the_Dark' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 17 , 'imagename' =>  'atrebe' , 'game' =>  'eq2' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  'Atrebe’s_Statue' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 18 , 'imagename' =>  'ilyan' , 'game' =>  'eq2' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  'Ilyan' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 19 , 'imagename' =>  'kodyx' , 'game' =>  'eq2' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  'Kodyx' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 20 , 'imagename' =>  'selrach' , 'game' =>  'eq2' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  'Selrach_Di’Zok' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 21 , 'imagename' =>  'uthtak_the_cruel' , 'game' =>  'eq2' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  'Uthtak_the_Cruel' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 22 , 'imagename' =>  'uzdrak_the_invincible' , 'game' =>  'eq2' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  'Uzdrak_the_Invincible' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 23 , 'imagename' =>  'zarda' , 'game' =>  'eq2' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  'Zarda' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 24 , 'imagename' =>  'adkar_vyx' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Adkar_Vyx' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 25 , 'imagename' =>  'iztapa_vyx' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Iztapa_Vyx' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 26 , 'imagename' =>  'wymbulu_vyx' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Wymbulu_Vyx' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 27 , 'imagename' =>  'zykluk_vyx' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Zykluk_Vyx' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 28 , 'imagename' =>  'blorgok_the_brutal' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Blorgok_the_Brutal' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 29 , 'imagename' =>  'doomcoil' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Doomcoil' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 30 , 'imagename' =>  'imzok' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Imzok’s_Revenge' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 31 , 'imagename' =>  'jracol_binari' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Jracol_Binari' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 32 , 'imagename' =>  'ludmila_kystov' , 'game' =>  'eq2' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  'Ludmila_Kystov' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 33 , 'imagename' =>  'pawbuster' , 'game' =>  'eq2' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  'Pawbuster' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 34 , 'imagename' =>  'tairiza' , 'game' =>  'eq2' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  'Tairiza_the_Widow_Mistress' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 35 , 'imagename' =>  'harbinger_of_absolution' , 'game' =>  'eq2' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  'The_Harbinger_of_Absolution' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 36 , 'imagename' =>  'vampire_lord_mayong_mistmoore' , 'game' =>  'eq2' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  'Vampire_Lord_Mayong_Mistmoore' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 37 , 'imagename' =>  'mayong_mistmoore' , 'game' =>  'eq2' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  'Mayong_Mistmoore_(Instanced)' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 38 , 'imagename' =>  'cheroon' , 'game' =>  'eq2' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  'D’Lizta Cheroon' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 39 , 'imagename' =>  'kzalk' , 'game' =>  'eq2' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  'V’Tekla K’Zalk' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 40 , 'imagename' =>  'viswin' , 'game' =>  'eq2' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  'D’Lizta Viswin' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 41 , 'imagename' =>  'enynti' , 'game' =>  'eq2' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  'Enynti' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 42 , 'imagename' =>  'malkonis' , 'game' =>  'eq2' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  'Malkonis_D’Morte' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 43 , 'imagename' =>  'treyloth' , 'game' =>  'eq2' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  'Treyloth_D’Kulvith' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 44 , 'imagename' =>  'othysis' , 'game' =>  'eq2' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  'Othysis_Muravian' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 45 , 'imagename' =>  'zylphax' , 'game' =>  'eq2' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  'Zylphax_the_Shredder' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 46 , 'imagename' =>  'wuoshi' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Wuoshi' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 47 , 'imagename' =>  'galiel_spirithoof' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Galiel_Spirithoof' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 48 , 'imagename' =>  'treah_greenroot' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Treah_Greenroot' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 49 , 'imagename' =>  'sariah_the_bloomseeker' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Sariah_the_Bloomseeker' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 50 , 'imagename' =>  'mistress_of_the_veil' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Mistress_of_the_Veil' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 51 , 'imagename' =>  'sarik_the_fang' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Sarik_the_Fang' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 52 , 'imagename' =>  'segmented_rumbler' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'the_segmented_rumbler' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 53 , 'imagename' =>  'elaani_the_collector' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Elaani_the_collector' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 54 , 'imagename' =>  'gardener_thirgen' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Gardener_Thirgen' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 55 , 'imagename' =>  'the_farstride_unicorn' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'The_Farstride_Unicorn' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 56 , 'imagename' =>  'the_farstride_unicorn' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'The_Farstride_Unicorn' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 57 , 'imagename' =>  'tender_of_the_seedlings' , 'game' =>  'eq2' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  'Tender_of_the_Seedlings' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 58 , 'imagename' =>  'round_1' , 'game' =>  'eq2' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  'The_Clockwork_Menace_Factory' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 59 , 'imagename' =>  'round_2' , 'game' =>  'eq2' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  'The_Clockwork_Menace_Factory' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 60 , 'imagename' =>  'round_3' , 'game' =>  'eq2' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  'The_Clockwork_Menace_Factory' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 61 , 'imagename' =>  'tatr' , 'game' =>  'eq2' , 'zoneid' =>  14 , 'type' =>  'npc'  , 'webid' =>  'Xux%27Laio%27s_Roost' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 62 , 'imagename' =>  'tatf' , 'game' =>  'eq2' , 'zoneid' =>  14 , 'type' =>  'npc'  , 'webid' =>  'Xux%27Laio%27s_Roost' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 63 , 'imagename' =>  'crusher' , 'game' =>  'eq2' , 'zoneid' =>  14 , 'type' =>  'npc'  , 'webid' =>  'Xux%27Laio%27s_Roost' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 64 , 'imagename' =>  'xuxlaiom' , 'game' =>  'eq2' , 'zoneid' =>  14 , 'type' =>  'npc'  , 'webid' =>  'Xux%27Laio%27s_Roost' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 65 , 'imagename' =>  'bonesplitter' , 'game' =>  'eq2' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  'Cavern_of_the_Crustaceans' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 66 , 'imagename' =>  'gurgul' , 'game' =>  'eq2' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  'Trials_of_Awakened:_Trial_of_Leadership#Gur.27gul_the_Warden' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 67 , 'imagename' =>  'kogurgul' , 'game' =>  'eq2' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  'Trials_of_Awakened:_Trial_of_Leadership#Keeper_of_Gur.27gul' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 68 , 'imagename' =>  'kog' , 'game' =>  'eq2' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  'Trials_of_Awakened:_Trial_of_Leadership#Keeper_of_the_Gate' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 69 , 'imagename' =>  'final_warden' , 'game' =>  'eq2' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  'Trials_of_Awakened:_Trial_of_Leadership#The_Final_Warden' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 70 , 'imagename' =>  'gol' , 'game' =>  'eq2' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  'Trials_of_Awakened:_Trial_of_Leadership#The_Guardian_of_Leadership' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 71 , 'imagename' =>  'essence_of_fear' , 'game' =>  'eq2' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  'Lyceum_of_Abhorrence#Essence_of_Fear' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 72 , 'imagename' =>  'gnillaw' , 'game' =>  'eq2' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  'Lyceum_of_Abhorrence#Gnillaw_the_Demented' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 73 , 'imagename' =>  'gnorbl' , 'game' =>  'eq2' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  'Lyceum_of_Abhorrence#Gnorbl_the_Playful' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 74 , 'imagename' =>  'vilucidae' , 'game' =>  'eq2' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  'Lyceum_of_Abhorrence#Vilucidae_the_Priest_of_Thule' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 75 , 'imagename' =>  'alzid' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#The_Slavering_Alzid' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 76 , 'imagename' =>  'doomright' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Doomright_Vakrizt' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 77 , 'imagename' =>  'pardas' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Pardas_Predd' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 78 , 'imagename' =>  'kinvah' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Doom_Prophet_Kinvah' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 79 , 'imagename' =>  'ruystad' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Doom_Prophet_Ruystad' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 80 , 'imagename' =>  'cheyak' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Doom_Prophet_Cheyak' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 81 , 'imagename' =>  'uncaged_alzid' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#The_Uncaged_Alzid' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 82 , 'imagename' =>  'uustalastus' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Uustalastus_Xiterrax' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 83 , 'imagename' =>  'doomsworn' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Doomsworn_Zatrakh' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 84 , 'imagename' =>  'corsolander' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#The_Corsolander' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 85 , 'imagename' =>  'amdaatk' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Euktrzkai_Amdaatk' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 86 , 'imagename' =>  'vyemm' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Lord_Vyemm' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 87 , 'imagename' =>  'alzid_prime' , 'game' =>  'eq2' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  'The_Laboratory_of_Lord_Vyemm#Alzid_Prime' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 88 , 'imagename' =>  'shadowy_presence' , 'game' =>  'eq2' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  'Halls_of_the_Seeing#A_Shadowy_Presence' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 89 , 'imagename' =>  'charged_presence' , 'game' =>  'eq2' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  'Halls_of_the_Seeing#A_Charged_Presence' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 90 , 'imagename' =>  'elemental_warder' , 'game' =>  'eq2' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  'Halls_of_the_Seeing#The_Elemental_Warder' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 91 , 'imagename' =>  'pain' , 'game' =>  'eq2' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  'Halls_of_the_Seeing#Pain' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 92 , 'imagename' =>  'suffering' , 'game' =>  'eq2' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  'Halls_of_the_Seeing#Suffering' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 93 , 'imagename' =>  'bloodbeast' , 'game' =>  'eq2' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  'Halls_of_the_Seeing#BloodBeast' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 94 , 'imagename' =>  'venekor' , 'game' =>  'eq2' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  'Halls_of_the_Seeing#Venekor' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 95 , 'imagename' =>  'yitzik' , 'game' =>  'eq2' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  'Deathtoll#Yitzik_the_Hurler' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 96 , 'imagename' =>  'fitzpitzle' , 'game' =>  'eq2' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  'Deathtoll#Fitzpitzle' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 97 , 'imagename' =>  'amorphous' , 'game' =>  'eq2' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  'Deathtoll#Amorphous_Drake' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 98 , 'imagename' =>  'tarinax' , 'game' =>  'eq2' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  'Deathtoll#Tarinax_the_Destroyer' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 99 , 'imagename' =>  'cruor' , 'game' =>  'eq2' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  'Deathtoll#Cruor_Alluvium' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 100 , 'imagename' =>  'slashing_talon' , 'game' =>  'eq2' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  'Ascent_of_the_Awakeningx2#Prophet_of_The_Slashing_Talon_.5B67_Epic_x2.5D' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 101 , 'imagename' =>  'flapping_wing' , 'game' =>  'eq2' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  'Ascent_of_the_Awakeningx2#Ancient_of_the_Flapping_Wing_.5B67_Epic_x2.5D' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 102 , 'imagename' =>  'ireth' , 'game' =>  'eq2' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  'Ascent_of_the_Awakeningx2#Ireth_The_Cold_.5B70_epicx2.5D' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 103 , 'imagename' =>  'sharti' , 'game' =>  'eq2' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  'Ascent_of_the_Awakeningx2#Sharti_of_The_Flame_.5B70_Epic_x2.5D' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 104 , 'imagename' =>  'gorenaire' , 'game' =>  'eq2' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  'Ascent_of_the_Awakeningx2' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 105 , 'imagename' =>  'talendor' , 'game' =>  'eq2' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  'Ascent_of_the_Awakeningx2' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
				
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_bosstable', $sql_ary );
		unset ( $sql_ary );
			
		$sql_ary[] = array( 'id' => 1 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Trakanon’s Lair' ,  'name_short' =>  'Trakanon’s Lair' );
		$sql_ary[] = array( 'id' => 2 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Veeshan’s Peak' ,  'name_short' =>  'Veeshan’s Peak' );
		$sql_ary[] = array( 'id' => 3 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Chamber of Destiny' ,  'name_short' =>  'Chamber of Destiny' );
		$sql_ary[] = array( 'id' => 4 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Venril Sathir’s Lair' ,  'name_short' =>  'Venril Sathir’s Lair' );
		$sql_ary[] = array( 'id' => 5 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Temple of Kor-Sha' ,  'name_short' =>  'Temple of Kor-Sha' );
		$sql_ary[] = array( 'id' => 6 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Protector’s realm' ,  'name_short' =>  'Protector’s realm' );
		$sql_ary[] = array( 'id' => 7 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Execution Throne Room' ,  'name_short' =>  'Execution Throne Room' );
		$sql_ary[] = array( 'id' => 8 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Tomb of Thuuga' ,  'name_short' =>  'Tomb of Thuuga' );
		$sql_ary[] = array( 'id' => 9 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Throne of New Tunaria' ,  'name_short' =>  'Throne of New Tunaria' );
		$sql_ary[] = array( 'id' => 10 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Mistmoore’s Inner Sanctum' ,  'name_short' =>  'Mistmoore’s Inner Sanctum' );
		$sql_ary[] = array( 'id' => 11 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Freethinkers Hideout' ,  'name_short' =>  'Freethinkers Hideout' );
		$sql_ary[] = array( 'id' => 12 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Emerald Halls' ,  'name_short' =>  'Emerald Halls' );
		$sql_ary[] = array( 'id' => 13 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Clockwork Menace Factory' ,  'name_short' =>  'The Clockwork Menace Factory' );
		$sql_ary[] = array( 'id' => 14 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'XuxLaios Roost' ,  'name_short' =>  'XuxLaios Roost' );
		$sql_ary[] = array( 'id' => 15 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Cavern of the Crustaceans' ,  'name_short' =>  'Cavern of the Crustaceans' );
		$sql_ary[] = array( 'id' => 16 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Trials of Awakened: Trial of Leadership' ,  'name_short' =>  'Trials of Awakened: Trial of Leadership' );
		$sql_ary[] = array( 'id' => 17 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Lyceum of Abhorrence' ,  'name_short' =>  'Lyceum of Abhorrence' );
		$sql_ary[] = array( 'id' => 18 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Laboratory of Lord Vyemm' ,  'name_short' =>  'The Laboratory of Lord Vyemm' );
		$sql_ary[] = array( 'id' => 19 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Halls of the Seeing' ,  'name_short' =>  'Halls of the Seeing' );
		$sql_ary[] = array( 'id' => 20 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Deathtoll' ,  'name_short' =>  'Deathtoll' );
		$sql_ary[] = array( 'id' => 21 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Ascent of the Awakening' ,  'name_short' =>  'Ascent of the Awakening' );
		$sql_ary[] = array( 'id' => 22 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Trakanon' ,  'name_short' =>  'Trakanon' );
		$sql_ary[] = array( 'id' => 23 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kluzen the Protector' ,  'name_short' =>  'Kluzen' );
		$sql_ary[] = array( 'id' => 24 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Elder Ekron' ,  'name_short' =>  'Ekron' );
		$sql_ary[] = array( 'id' => 25 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Silverwing' ,  'name_short' =>  'Silverwing' );
		$sql_ary[] = array( 'id' => 26 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Travenro the Skygazer' ,  'name_short' =>  'Travenro' );
		$sql_ary[] = array( 'id' => 27 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Phara Dar' ,  'name_short' =>  'Phara Dar' );
		$sql_ary[] = array( 'id' => 28 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Taskmaster Nichok' ,  'name_short' =>  'Nichok' );
		$sql_ary[] = array( 'id' => 29 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Qunard Ashenclaw' ,  'name_short' =>  'qunard' );
		$sql_ary[] = array( 'id' => 30 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hoshkar' ,  'name_short' =>  'Hoshkar' );
		$sql_ary[] = array( 'id' => 31 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Druushk' ,  'name_short' =>  'Druushk' );
		$sql_ary[] = array( 'id' => 32 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Milyex Vioren' ,  'name_short' =>  'Milyex' );
		$sql_ary[] = array( 'id' => 33 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Xygoz' ,  'name_short' =>  'Xygoz' );
		$sql_ary[] = array( 'id' => 34 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nexona' ,  'name_short' =>  'Nexona' );
		$sql_ary[] = array( 'id' => 35 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Leviathan' ,  'name_short' =>  'Leviathan' );
		$sql_ary[] = array( 'id' => 36 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Venril Sathir' ,  'name_short' =>  'Venril' );
		$sql_ary[] = array( 'id' => 37 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Aktar the Dark' ,  'name_short' =>  'Aktar' );
		$sql_ary[] = array( 'id' => 38 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Atrebe’s Statue' ,  'name_short' =>  'Atrebe' );
		$sql_ary[] = array( 'id' => 39 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ilyan' ,  'name_short' =>  'Ilyan' );
		$sql_ary[] = array( 'id' => 40 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kodux' ,  'name_short' =>  'Kodux' );
		$sql_ary[] = array( 'id' => 41 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Selrach Di’Zok' ,  'name_short' =>  'Selrach' );
		$sql_ary[] = array( 'id' => 42 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Uthtak the Cruel' ,  'name_short' =>  'Uthtak' );
		$sql_ary[] = array( 'id' => 43 , 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Uzdrak the Invincible' ,  'name_short' =>  'Uzdrak' );
		$sql_ary[] = array( 'id' => 44 , 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zarda' ,  'name_short' =>  'Zarda' );
		$sql_ary[] = array( 'id' => 45 , 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Adkar Vyx' ,  'name_short' =>  'Adkar' );
		$sql_ary[] = array( 'id' => 46 , 'attribute_id' => 25, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Iztapa Vyx' ,  'name_short' =>  'Iztapa' );
		$sql_ary[] = array( 'id' => 47 , 'attribute_id' => 26, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Wymbulu Vyx' ,  'name_short' =>  'Wymbulu' );
		$sql_ary[] = array( 'id' => 48 , 'attribute_id' => 27, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zykluk Vyx' ,  'name_short' =>  'Zykluk' );
		$sql_ary[] = array( 'id' => 49 , 'attribute_id' => 28, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blorgok the Brutal' ,  'name_short' =>  'Blorgok' );
		$sql_ary[] = array( 'id' => 50 , 'attribute_id' => 29, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Doomcoil' ,  'name_short' =>  'Doomcoil' );
		$sql_ary[] = array( 'id' => 51 , 'attribute_id' => 30, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Imzok’s Revenge' ,  'name_short' =>  'Imzok’s Revenge' );
		$sql_ary[] = array( 'id' => 52 , 'attribute_id' => 31, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Jracol Binari' ,  'name_short' =>  'Binari' );
		$sql_ary[] = array( 'id' => 53 , 'attribute_id' => 32, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ludmila Kystov' ,  'name_short' =>  'Kystov' );
		$sql_ary[] = array( 'id' => 54 , 'attribute_id' => 33, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Pawbuster' ,  'name_short' =>  'Pawbuster' );
		$sql_ary[] = array( 'id' => 55 , 'attribute_id' => 34, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tairiza the Widow Mistress' ,  'name_short' =>  'Tairiza' );
		$sql_ary[] = array( 'id' => 56 , 'attribute_id' => 35, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Harbinger of Absolution' ,  'name_short' =>  'The Harbinger of Absolution' );
		$sql_ary[] = array( 'id' => 57 , 'attribute_id' => 36, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vampire Lord Mayong Mistmoore' ,  'name_short' =>  'Vampire Lord Mayong Mistmoore' );
		$sql_ary[] = array( 'id' => 58 , 'attribute_id' => 37, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mayong Mistmoore' ,  'name_short' =>  'Mayong Mistmoore' );
		$sql_ary[] = array( 'id' => 59 , 'attribute_id' => 38, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vikomt D’Raethe' ,  'name_short' =>  'D’Raethe' );
		$sql_ary[] = array( 'id' => 60 , 'attribute_id' => 39, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'V’Tekla K’Zalk' ,  'name_short' =>  'K’Zalk' );
		$sql_ary[] = array( 'id' => 61 , 'attribute_id' => 40, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'D’Lizta Viswin' ,  'name_short' =>  'Viswin' );
		$sql_ary[] = array( 'id' => 62 , 'attribute_id' => 41, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Enynti' ,  'name_short' =>  'Enynti' );
		$sql_ary[] = array( 'id' => 63 , 'attribute_id' => 42, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Malkonis D’Morte' ,  'name_short' =>  'Malkonis' );
		$sql_ary[] = array( 'id' => 64 , 'attribute_id' => 43, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Treyloth D’Kulvith' ,  'name_short' =>  'Treyloth D’Kulvith' );
		$sql_ary[] = array( 'id' => 65 , 'attribute_id' => 44, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Othysis Muravian' ,  'name_short' =>  'Othysis Muravian' );
		$sql_ary[] = array( 'id' => 66 , 'attribute_id' => 45, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zylphax the Shredder' ,  'name_short' =>  'Zylphax the Shredder' );
		$sql_ary[] = array( 'id' => 67 , 'attribute_id' => 46, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Wuoshi' ,  'name_short' =>  'Wuoshi' );
		$sql_ary[] = array( 'id' => 68 , 'attribute_id' => 47, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Galiel Spirithoof' ,  'name_short' =>  'Galiel Spirithoof' );
		$sql_ary[] = array( 'id' => 69 , 'attribute_id' => 48, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Treah Greenroot' ,  'name_short' =>  'Treah Greenroot' );
		$sql_ary[] = array( 'id' => 70 , 'attribute_id' => 49, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sariah the Bloomseeker' ,  'name_short' =>  'Sariah the Bloomseeker' );
		$sql_ary[] = array( 'id' => 71 , 'attribute_id' => 50, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mistress of the Veil' ,  'name_short' =>  'Mistress of the Veil' );
		$sql_ary[] = array( 'id' => 72 , 'attribute_id' => 51, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sarik the Fang' ,  'name_short' =>  'Sarik the Fang' );
		$sql_ary[] = array( 'id' => 73 , 'attribute_id' => 52, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Segmented Rumbler' ,  'name_short' =>  'The Segmented Rumbler' );
		$sql_ary[] = array( 'id' => 74 , 'attribute_id' => 53, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Elaani the collector' ,  'name_short' =>  'Elaani the collector' );
		$sql_ary[] = array( 'id' => 75 , 'attribute_id' => 54, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gardener Thirgen' ,  'name_short' =>  'Gardener Thirgen' );
		$sql_ary[] = array( 'id' => 76 , 'attribute_id' => 55, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Farstride Unicorn' ,  'name_short' =>  'The Farstride Unicorn' );
		$sql_ary[] = array( 'id' => 77 , 'attribute_id' => 56, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Farstride Unicorn' ,  'name_short' =>  'The Farstride Unicorn' );
		$sql_ary[] = array( 'id' => 78 , 'attribute_id' => 57, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tender of the Seedlings' ,  'name_short' =>  'Tender of the Seedlings' );
		$sql_ary[] = array( 'id' => 79 , 'attribute_id' => 58, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Round 1' ,  'name_short' =>  'Round 1' );
		$sql_ary[] = array( 'id' => 80 , 'attribute_id' => 59, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Round 2' ,  'name_short' =>  'Round 2' );
		$sql_ary[] = array( 'id' => 81 , 'attribute_id' => 60, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Round 3' ,  'name_short' =>  'Round 3' );
		$sql_ary[] = array( 'id' => 82 , 'attribute_id' => 61, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Ancient Twisted Root' ,  'name_short' =>  'The Ancient Twisted Root' );
		$sql_ary[] = array( 'id' => 83 , 'attribute_id' => 62, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Ancient Twisted Fungus' ,  'name_short' =>  'The Ancient Twisted Fungus' );
		$sql_ary[] = array( 'id' => 84 , 'attribute_id' => 63, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Crusher' ,  'name_short' =>  'The Crusher' );
		$sql_ary[] = array( 'id' => 85 , 'attribute_id' => 64, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Xux’laio Master of the Fluttering Wing' ,  'name_short' =>  'Xux’laio Master of the Fluttering Wing' );
		$sql_ary[] = array( 'id' => 86 , 'attribute_id' => 65, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bonesplitter' ,  'name_short' =>  'Bonesplitter' );
		$sql_ary[] = array( 'id' => 87 , 'attribute_id' => 66, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gur’gul the Warden' ,  'name_short' =>  'Gur’gul the Warden' );
		$sql_ary[] = array( 'id' => 88 , 'attribute_id' => 67, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Keeper of Gur’gul' ,  'name_short' =>  'Keeper of Gur’gul' );
		$sql_ary[] = array( 'id' => 89 , 'attribute_id' => 68, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Keeper of the Gate' ,  'name_short' =>  'Keeper of the Gate' );
		$sql_ary[] = array( 'id' => 90 , 'attribute_id' => 69, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Final Warden' ,  'name_short' =>  'The Final Warden' );
		$sql_ary[] = array( 'id' => 91 , 'attribute_id' => 70, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Guardian of Leadership' ,  'name_short' =>  'The Guardian of Leadership' );
		$sql_ary[] = array( 'id' => 92 , 'attribute_id' => 71, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Essence of Fear' ,  'name_short' =>  'Essence of Fear' );
		$sql_ary[] = array( 'id' => 93 , 'attribute_id' => 72, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gnillaw the Demented' ,  'name_short' =>  'Gnillaw the Demented' );
		$sql_ary[] = array( 'id' => 94 , 'attribute_id' => 73, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gnorbl the Playful' ,  'name_short' =>  'Gnorbl the Playful' );
		$sql_ary[] = array( 'id' => 95 , 'attribute_id' => 74, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vilucidae the Priest of Thule' ,  'name_short' =>  'Vilucidae the Priest of Thule' );
		$sql_ary[] = array( 'id' => 96 , 'attribute_id' => 75, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Slaving Alzid' ,  'name_short' =>  'The Slaving Alzid' );
		$sql_ary[] = array( 'id' => 97 , 'attribute_id' => 76, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Doomright Vakrizt' ,  'name_short' =>  'Doomright Vakrizt' );
		$sql_ary[] = array( 'id' => 98 , 'attribute_id' => 77, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Pardas Predd' ,  'name_short' =>  'Pardas Predd' );
		$sql_ary[] = array( 'id' => 99 , 'attribute_id' => 78, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Doom Prophet Kinvah' ,  'name_short' =>  'Doom Prophet Kinvah' );
		$sql_ary[] = array( 'id' => 100 , 'attribute_id' => 79, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Doom Ravager Ru’ystad' ,  'name_short' =>  'Doom Ravager Ru’ystad' );
		$sql_ary[] = array( 'id' => 101 , 'attribute_id' => 80, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Doom Reaver Cheyak' ,  'name_short' =>  'Doom Reaver Cheyak' );
		$sql_ary[] = array( 'id' => 102 , 'attribute_id' => 81, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Uncaged Alzid' ,  'name_short' =>  'The Uncaged Alzid' );
		$sql_ary[] = array( 'id' => 103 , 'attribute_id' => 82, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Uustalastus Xiterrax' ,  'name_short' =>  'Uustalastus Xiterrax' );
		$sql_ary[] = array( 'id' => 104 , 'attribute_id' => 83, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Doomsworn Zatrakh' ,  'name_short' =>  'Doomsworn Zatrakh' );
		$sql_ary[] = array( 'id' => 105 , 'attribute_id' => 84, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Corsolander' ,  'name_short' =>  'The Corsolander' );
		$sql_ary[] = array( 'id' => 106 , 'attribute_id' => 85, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Euktrzkai Amdaatk' ,  'name_short' =>  'Euktrzkai Amdaatk' );
		$sql_ary[] = array( 'id' => 107 , 'attribute_id' => 86, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Vyemm' ,  'name_short' =>  'Lord Vyemm' );
		$sql_ary[] = array( 'id' => 108 , 'attribute_id' => 87, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Alzid Prime' ,  'name_short' =>  'Alzid Prime' );
		$sql_ary[] = array( 'id' => 109 , 'attribute_id' => 88, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'A Shadowy Presence' ,  'name_short' =>  'A Shadowy Presence' );
		$sql_ary[] = array( 'id' => 110 , 'attribute_id' => 89, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'A Charged Presence' ,  'name_short' =>  'A Charged Presence' );
		$sql_ary[] = array( 'id' => 111 , 'attribute_id' => 90, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Elemental Warder' ,  'name_short' =>  'The Elemental Warder' );
		$sql_ary[] = array( 'id' => 112 , 'attribute_id' => 91, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Pain' ,  'name_short' =>  'Pain' );
		$sql_ary[] = array( 'id' => 113 , 'attribute_id' => 92, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Suffering' ,  'name_short' =>  'Suffering' );
		$sql_ary[] = array( 'id' => 114 , 'attribute_id' => 93, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'BloodBeast' ,  'name_short' =>  'BloodBeast' );
		$sql_ary[] = array( 'id' => 115 , 'attribute_id' => 94, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Venekor' ,  'name_short' =>  'Venekor' );
		$sql_ary[] = array( 'id' => 116 , 'attribute_id' => 95, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Yitzik the Hurler' ,  'name_short' =>  'Yitzik the Hurler' );
		$sql_ary[] = array( 'id' => 117 , 'attribute_id' => 96, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Fitzpitzle' ,  'name_short' =>  'Fitzpitzle' );
		$sql_ary[] = array( 'id' => 118 , 'attribute_id' => 97, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Amorphous Drake' ,  'name_short' =>  'Amorphous Drake' );
		$sql_ary[] = array( 'id' => 119 , 'attribute_id' => 98, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tarinax the Destroyer' ,  'name_short' =>  'Tarinax the Destroyer' );
		$sql_ary[] = array( 'id' => 120 , 'attribute_id' => 99, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Cruor Alluvium' ,  'name_short' =>  'Cruor Alluvium' );
		$sql_ary[] = array( 'id' => 121 , 'attribute_id' => 100, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Prophet of The Slashing Talon' ,  'name_short' =>  'Prophet of The Slashing Talon' );
		$sql_ary[] = array( 'id' => 122 , 'attribute_id' => 101, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ancient of the Flapping Wingz' ,  'name_short' =>  'Barz' );
		$sql_ary[] = array( 'id' => 123 , 'attribute_id' => 102, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ireth the Cold' ,  'name_short' =>  'Ireth the Cold' );
		$sql_ary[] = array( 'id' => 124 , 'attribute_id' => 103, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sharti of the Flame' ,  'name_short' =>  'Sharti of the Flame' );
		$sql_ary[] = array( 'id' => 125 , 'attribute_id' => 104, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gorenaire' ,  'name_short' =>  'Gorenaire' );
		$sql_ary[] = array( 'id' => 126 , 'attribute_id' => 105, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Talendor' ,  'name_short' =>  'Talendor' );
	
		$sql_ary[] = array( 'id' => 127 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Trakanon’s Lair' ,  'name_short' =>  'Trakanon’s Lair' );
		$sql_ary[] = array( 'id' => 128 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Veeshan’s Peak' ,  'name_short' =>  'Veeshan’s Peak' );
		$sql_ary[] = array( 'id' => 129 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Chamber of Destiny' ,  'name_short' =>  'Chamber of Destiny' );
		$sql_ary[] = array( 'id' => 130 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Venril Sathir’s Lair' ,  'name_short' =>  'Venril Sathir’s Lair' );
		$sql_ary[] = array( 'id' => 131 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Temple of Kor-Sha' ,  'name_short' =>  'Temple of Kor-Sha' );
		$sql_ary[] = array( 'id' => 132 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Protector’s realm' ,  'name_short' =>  'Protector’s realm' );
		$sql_ary[] = array( 'id' => 133 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Execution Throne Room' ,  'name_short' =>  'Execution Throne Room' );
		$sql_ary[] = array( 'id' => 134 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Tomb of Thuuga' ,  'name_short' =>  'Tomb of Thuuga' );
		$sql_ary[] = array( 'id' => 135 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Throne of New Tunaria' ,  'name_short' =>  'Throne of New Tunaria' );
		$sql_ary[] = array( 'id' => 136 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Mistmoore’s Inner Sanctum' ,  'name_short' =>  'Mistmoore’s Inner Sanctum' );
		$sql_ary[] = array( 'id' => 137 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Freethinkers Hideout' ,  'name_short' =>  'Freethinkers Hideout' );
		$sql_ary[] = array( 'id' => 138 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Emerald Halls' ,  'name_short' =>  'Emerald Halls' );
		$sql_ary[] = array( 'id' => 139 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Clockwork Menace Factory' ,  'name_short' =>  'The Clockwork Menace Factory' );
		$sql_ary[] = array( 'id' => 140 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'XuxLaios Roost' ,  'name_short' =>  'XuxLaios Roost' );
		$sql_ary[] = array( 'id' => 141 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Cavern of the Crustaceans' ,  'name_short' =>  'Cavern of the Crustaceans' );
		$sql_ary[] = array( 'id' => 142 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Trials of Awakened: Trial of Leadership' ,  'name_short' =>  'Trials of Awakened: Trial of Leadership' );
		$sql_ary[] = array( 'id' => 143 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Lyceum of Abhorrence' ,  'name_short' =>  'Lyceum of Abhorrence' );
		$sql_ary[] = array( 'id' => 144 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Laboratory of Lord Vyemm' ,  'name_short' =>  'The Laboratory of Lord Vyemm' );
		$sql_ary[] = array( 'id' => 145 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Halls of the Seeing' ,  'name_short' =>  'Halls of the Seeing' );
		$sql_ary[] = array( 'id' => 146 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Deathtoll' ,  'name_short' =>  'Deathtoll' );
		$sql_ary[] = array( 'id' => 147 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Ascent of the Awakening' ,  'name_short' =>  'Ascent of the Awakening' );
		$sql_ary[] = array( 'id' => 148 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Trakanon' ,  'name_short' =>  'Trakanon' );
		$sql_ary[] = array( 'id' => 149 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kluzen the Protector' ,  'name_short' =>  'Kluzen' );
		$sql_ary[] = array( 'id' => 150 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Elder Ekron' ,  'name_short' =>  'Ekron' );
		$sql_ary[] = array( 'id' => 151 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Silverwing' ,  'name_short' =>  'Silverwing' );
		$sql_ary[] = array( 'id' => 152 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Travenro the Skygazer' ,  'name_short' =>  'Travenro' );
		$sql_ary[] = array( 'id' => 153 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Phara Dar' ,  'name_short' =>  'Phara Dar' );
		$sql_ary[] = array( 'id' => 154 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Taskmaster Nichok' ,  'name_short' =>  'Nichok' );
		$sql_ary[] = array( 'id' => 155 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Qunard Ashenclaw' ,  'name_short' =>  'qunard' );
		$sql_ary[] = array( 'id' => 156 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Hoshkar' ,  'name_short' =>  'Hoshkar' );
		$sql_ary[] = array( 'id' => 157 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Druushk' ,  'name_short' =>  'Druushk' );
		$sql_ary[] = array( 'id' => 158 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Milyex Vioren' ,  'name_short' =>  'Milyex' );
		$sql_ary[] = array( 'id' => 159 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Xygoz' ,  'name_short' =>  'Xygoz' );
		$sql_ary[] = array( 'id' => 160 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nexona' ,  'name_short' =>  'Nexona' );
		$sql_ary[] = array( 'id' => 161 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Leviathan' ,  'name_short' =>  'Leviathan' );
		$sql_ary[] = array( 'id' => 162 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Venril Sathir' ,  'name_short' =>  'Venril' );
		$sql_ary[] = array( 'id' => 163 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Aktar the Dark' ,  'name_short' =>  'Aktar' );
		$sql_ary[] = array( 'id' => 164 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Atrebe’s Statue' ,  'name_short' =>  'Atrebe' );
		$sql_ary[] = array( 'id' => 165 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ilyan' ,  'name_short' =>  'Ilyan' );
		$sql_ary[] = array( 'id' => 166 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kodux' ,  'name_short' =>  'Kodux' );
		$sql_ary[] = array( 'id' => 167 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Selrach Di’Zok' ,  'name_short' =>  'Selrach' );
		$sql_ary[] = array( 'id' => 168 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Uthtak the Cruel' ,  'name_short' =>  'Uthtak' );
		$sql_ary[] = array( 'id' => 169 , 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Uzdrak the Invincible' ,  'name_short' =>  'Uzdrak' );
		$sql_ary[] = array( 'id' => 170 , 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zarda' ,  'name_short' =>  'Zarda' );
		$sql_ary[] = array( 'id' => 171 , 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Adkar Vyx' ,  'name_short' =>  'Adkar' );
		$sql_ary[] = array( 'id' => 172 , 'attribute_id' => 25, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Iztapa Vyx' ,  'name_short' =>  'Iztapa' );
		$sql_ary[] = array( 'id' => 173 , 'attribute_id' => 26, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Wymbulu Vyx' ,  'name_short' =>  'Wymbulu' );
		$sql_ary[] = array( 'id' => 174 , 'attribute_id' => 27, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zykluk Vyx' ,  'name_short' =>  'Zykluk' );
		$sql_ary[] = array( 'id' => 175 , 'attribute_id' => 28, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Blorgok the Brutal' ,  'name_short' =>  'Blorgok' );
		$sql_ary[] = array( 'id' => 176 , 'attribute_id' => 29, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Doomcoil' ,  'name_short' =>  'Doomcoil' );
		$sql_ary[] = array( 'id' => 177 , 'attribute_id' => 30, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Imzok’s Revenge' ,  'name_short' =>  'Imzok’s Revenge' );
		$sql_ary[] = array( 'id' => 178 , 'attribute_id' => 31, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Jracol Binari' ,  'name_short' =>  'Binari' );
		$sql_ary[] = array( 'id' => 179 , 'attribute_id' => 32, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ludmila Kystov' ,  'name_short' =>  'Kystov' );
		$sql_ary[] = array( 'id' => 180 , 'attribute_id' => 33, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Pawbuster' ,  'name_short' =>  'Pawbuster' );
		$sql_ary[] = array( 'id' => 181 , 'attribute_id' => 34, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tairiza the Widow Mistress' ,  'name_short' =>  'Tairiza' );
		$sql_ary[] = array( 'id' => 182 , 'attribute_id' => 35, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Harbinger of Absolution' ,  'name_short' =>  'The Harbinger of Absolution' );
		$sql_ary[] = array( 'id' => 183 , 'attribute_id' => 36, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vampire Lord Mayong Mistmoore' ,  'name_short' =>  'Vampire Lord Mayong Mistmoore' );
		$sql_ary[] = array( 'id' => 184 , 'attribute_id' => 37, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mayong Mistmoore' ,  'name_short' =>  'Mayong Mistmoore' );
		$sql_ary[] = array( 'id' => 185 , 'attribute_id' => 38, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vikomt D’Raethe' ,  'name_short' =>  'D’Raethe' );
		$sql_ary[] = array( 'id' => 186 , 'attribute_id' => 39, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'V’Tekla K’Zalk' ,  'name_short' =>  'K’Zalk' );
		$sql_ary[] = array( 'id' => 187 , 'attribute_id' => 40, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'D’Lizta Viswin' ,  'name_short' =>  'Viswin' );
		$sql_ary[] = array( 'id' => 188 , 'attribute_id' => 41, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Enynti' ,  'name_short' =>  'Enynti' );
		$sql_ary[] = array( 'id' => 189 , 'attribute_id' => 42, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Malkonis D’Morte' ,  'name_short' =>  'Malkonis' );
		$sql_ary[] = array( 'id' => 190 , 'attribute_id' => 43, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Treyloth D’Kulvith' ,  'name_short' =>  'Treyloth D’Kulvith' );
		$sql_ary[] = array( 'id' => 191 , 'attribute_id' => 44, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Othysis Muravian' ,  'name_short' =>  'Othysis Muravian' );
		$sql_ary[] = array( 'id' => 192 , 'attribute_id' => 45, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zylphax the Shredder' ,  'name_short' =>  'Zylphax the Shredder' );
		$sql_ary[] = array( 'id' => 193 , 'attribute_id' => 46, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Wuoshi' ,  'name_short' =>  'Wuoshi' );
		$sql_ary[] = array( 'id' => 194 , 'attribute_id' => 47, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Galiel Spirithoof' ,  'name_short' =>  'Galiel Spirithoof' );
		$sql_ary[] = array( 'id' => 195 , 'attribute_id' => 48, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Treah Greenroot' ,  'name_short' =>  'Treah Greenroot' );
		$sql_ary[] = array( 'id' => 196 , 'attribute_id' => 49, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sariah the Bloomseeker' ,  'name_short' =>  'Sariah the Bloomseeker' );
		$sql_ary[] = array( 'id' => 197 , 'attribute_id' => 50, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mistress of the Veil' ,  'name_short' =>  'Mistress of the Veil' );
		$sql_ary[] = array( 'id' => 198 , 'attribute_id' => 51, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sarik the Fang' ,  'name_short' =>  'Sarik the Fang' );
		$sql_ary[] = array( 'id' => 199 , 'attribute_id' => 52, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Segmented Rumbler' ,  'name_short' =>  'The Segmented Rumbler' );
		$sql_ary[] = array( 'id' => 200 , 'attribute_id' => 53, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Elaani the collector' ,  'name_short' =>  'Elaani the collector' );
		$sql_ary[] = array( 'id' => 201 , 'attribute_id' => 54, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gardener Thirgen' ,  'name_short' =>  'Gardener Thirgen' );
		$sql_ary[] = array( 'id' => 202 , 'attribute_id' => 55, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Farstride Unicorn' ,  'name_short' =>  'The Farstride Unicorn' );
		$sql_ary[] = array( 'id' => 203 , 'attribute_id' => 56, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Farstride Unicorn' ,  'name_short' =>  'The Farstride Unicorn' );
		$sql_ary[] = array( 'id' => 204 , 'attribute_id' => 57, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tender of the Seedlings' ,  'name_short' =>  'Tender of the Seedlings' );
		$sql_ary[] = array( 'id' => 205 , 'attribute_id' => 58, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Round 1' ,  'name_short' =>  'Round 1' );
		$sql_ary[] = array( 'id' => 206 , 'attribute_id' => 59, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Round 2' ,  'name_short' =>  'Round 2' );
		$sql_ary[] = array( 'id' => 207 , 'attribute_id' => 60, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Round 3' ,  'name_short' =>  'Round 3' );
		$sql_ary[] = array( 'id' => 208 , 'attribute_id' => 61, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Ancient Twisted Root' ,  'name_short' =>  'The Ancient Twisted Root' );
		$sql_ary[] = array( 'id' => 209 , 'attribute_id' => 62, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Ancient Twisted Fungus' ,  'name_short' =>  'The Ancient Twisted Fungus' );
		$sql_ary[] = array( 'id' => 210 , 'attribute_id' => 63, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Crusher' ,  'name_short' =>  'The Crusher' );
		$sql_ary[] = array( 'id' => 211 , 'attribute_id' => 64, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Xux’laio Master of the Fluttering Wing' ,  'name_short' =>  'Xux’laio Master of the Fluttering Wing' );
		$sql_ary[] = array( 'id' => 212 , 'attribute_id' => 65, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Bonesplitter' ,  'name_short' =>  'Bonesplitter' );
		$sql_ary[] = array( 'id' => 213 , 'attribute_id' => 66, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gur’gul the Warden' ,  'name_short' =>  'Gur’gul the Warden' );
		$sql_ary[] = array( 'id' => 214 , 'attribute_id' => 67, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Keeper of Gur’gul' ,  'name_short' =>  'Keeper of Gur’gul' );
		$sql_ary[] = array( 'id' => 215 , 'attribute_id' => 68, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Keeper of the Gate' ,  'name_short' =>  'Keeper of the Gate' );
		$sql_ary[] = array( 'id' => 216 , 'attribute_id' => 69, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Final Warden' ,  'name_short' =>  'The Final Warden' );
		$sql_ary[] = array( 'id' => 217 , 'attribute_id' => 70, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Guardian of Leadership' ,  'name_short' =>  'The Guardian of Leadership' );
		$sql_ary[] = array( 'id' => 218 , 'attribute_id' => 71, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Essence of Fear' ,  'name_short' =>  'Essence of Fear' );
		$sql_ary[] = array( 'id' => 219 , 'attribute_id' => 72, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gnillaw the Demented' ,  'name_short' =>  'Gnillaw the Demented' );
		$sql_ary[] = array( 'id' => 220 , 'attribute_id' => 73, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gnorbl the Playful' ,  'name_short' =>  'Gnorbl the Playful' );
		$sql_ary[] = array( 'id' => 221 , 'attribute_id' => 74, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vilucidae the Priest of Thule' ,  'name_short' =>  'Vilucidae the Priest of Thule' );
		$sql_ary[] = array( 'id' => 222 , 'attribute_id' => 75, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Slaving Alzid' ,  'name_short' =>  'The Slaving Alzid' );
		$sql_ary[] = array( 'id' => 223 , 'attribute_id' => 76, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Doomright Vakrizt' ,  'name_short' =>  'Doomright Vakrizt' );
		$sql_ary[] = array( 'id' => 224 , 'attribute_id' => 77, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Pardas Predd' ,  'name_short' =>  'Pardas Predd' );
		$sql_ary[] = array( 'id' => 225 , 'attribute_id' => 78, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Doom Prophet Kinvah' ,  'name_short' =>  'Doom Prophet Kinvah' );
		$sql_ary[] = array( 'id' => 226 , 'attribute_id' => 79, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Doom Ravager Ru’ystad' ,  'name_short' =>  'Doom Ravager Ru’ystad' );
		$sql_ary[] = array( 'id' => 227 , 'attribute_id' => 80, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Doom Reaver Cheyak' ,  'name_short' =>  'Doom Reaver Cheyak' );
		$sql_ary[] = array( 'id' => 228 , 'attribute_id' => 81, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Uncaged Alzid' ,  'name_short' =>  'The Uncaged Alzid' );
		$sql_ary[] = array( 'id' => 229 , 'attribute_id' => 82, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Uustalastus Xiterrax' ,  'name_short' =>  'Uustalastus Xiterrax' );
		$sql_ary[] = array( 'id' => 230 , 'attribute_id' => 83, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Doomsworn Zatrakh' ,  'name_short' =>  'Doomsworn Zatrakh' );
		$sql_ary[] = array( 'id' => 231 , 'attribute_id' => 84, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Corsolander' ,  'name_short' =>  'The Corsolander' );
		$sql_ary[] = array( 'id' => 232 , 'attribute_id' => 85, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Euktrzkai Amdaatk' ,  'name_short' =>  'Euktrzkai Amdaatk' );
		$sql_ary[] = array( 'id' => 233 , 'attribute_id' => 86, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lord Vyemm' ,  'name_short' =>  'Lord Vyemm' );
		$sql_ary[] = array( 'id' => 234 , 'attribute_id' => 87, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Alzid Prime' ,  'name_short' =>  'Alzid Prime' );
		$sql_ary[] = array( 'id' => 235 , 'attribute_id' => 88, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'A Shadowy Presence' ,  'name_short' =>  'A Shadowy Presence' );
		$sql_ary[] = array( 'id' => 236 , 'attribute_id' => 89, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'A Charged Presence' ,  'name_short' =>  'A Charged Presence' );
		$sql_ary[] = array( 'id' => 237 , 'attribute_id' => 90, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Elemental Warder' ,  'name_short' =>  'The Elemental Warder' );
		$sql_ary[] = array( 'id' => 238 , 'attribute_id' => 91, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Pain' ,  'name_short' =>  'Pain' );
		$sql_ary[] = array( 'id' => 239 , 'attribute_id' => 92, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Suffering' ,  'name_short' =>  'Suffering' );
		$sql_ary[] = array( 'id' => 240 , 'attribute_id' => 93, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'BloodBeast' ,  'name_short' =>  'BloodBeast' );
		$sql_ary[] = array( 'id' => 241 , 'attribute_id' => 94, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Venekor' ,  'name_short' =>  'Venekor' );
		$sql_ary[] = array( 'id' => 242 , 'attribute_id' => 95, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Yitzik the Hurler' ,  'name_short' =>  'Yitzik the Hurler' );
		$sql_ary[] = array( 'id' => 243 , 'attribute_id' => 96, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Fitzpitzle' ,  'name_short' =>  'Fitzpitzle' );
		$sql_ary[] = array( 'id' => 244 , 'attribute_id' => 97, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Amorphous Drake' ,  'name_short' =>  'Amorphous Drake' );
		$sql_ary[] = array( 'id' => 245 , 'attribute_id' => 98, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tarinax the Destroyer' ,  'name_short' =>  'Tarinax the Destroyer' );
		$sql_ary[] = array( 'id' => 246 , 'attribute_id' => 99, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Cruor Alluvium' ,  'name_short' =>  'Cruor Alluvium' );
		$sql_ary[] = array( 'id' => 247 , 'attribute_id' => 100, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Prophet of The Slashing Talon' ,  'name_short' =>  'Prophet of The Slashing Talon' );
		$sql_ary[] = array( 'id' => 248 , 'attribute_id' => 101, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ancient of the Flapping Wingz' ,  'name_short' =>  'Barz' );
		$sql_ary[] = array( 'id' => 249 , 'attribute_id' => 102, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ireth the Cold' ,  'name_short' =>  'Ireth the Cold' );
		$sql_ary[] = array( 'id' => 250 , 'attribute_id' => 103, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sharti of the Flame' ,  'name_short' =>  'Sharti of the Flame' );
		$sql_ary[] = array( 'id' => 251 , 'attribute_id' => 104, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gorenaire' ,  'name_short' =>  'Gorenaire' );
		$sql_ary[] = array( 'id' => 252 , 'attribute_id' => 105, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Talendor' ,  'name_short' =>  'Talendor' );
	
		$sql_ary[] = array( 'id' => 253 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 254 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Assassin' ,  'name_short' =>  'Assassin' );
		$sql_ary[] = array( 'id' => 255 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Berserker' ,  'name_short' =>  'Berserker' );
		$sql_ary[] = array( 'id' => 256 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Bruiser' ,  'name_short' =>  'Bruiser' );
		$sql_ary[] = array( 'id' => 257 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Brigand' ,  'name_short' =>  'Brigand' );
		$sql_ary[] = array( 'id' => 258 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Coercer' ,  'name_short' =>  'Coercer' );
		$sql_ary[] = array( 'id' => 259 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Conjuror' ,  'name_short' =>  'Conjuror' );
		$sql_ary[] = array( 'id' => 260 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Defiler' ,  'name_short' =>  'Defiler' );
		$sql_ary[] = array( 'id' => 261 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Dirge' ,  'name_short' =>  'Dirge' );
		$sql_ary[] = array( 'id' => 262 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Fury' ,  'name_short' =>  'Fury' );
		$sql_ary[] = array( 'id' => 263 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Guardian' ,  'name_short' =>  'Guardian' );
		$sql_ary[] = array( 'id' => 264 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Illusionist' ,  'name_short' =>  'Illusionist' );
		$sql_ary[] = array( 'id' => 265 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Inquisitor' ,  'name_short' =>  'Inquisitor' );
		$sql_ary[] = array( 'id' => 266 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Monk' ,  'name_short' =>  'Monk' );
		$sql_ary[] = array( 'id' => 267 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Mystic' ,  'name_short' =>  'Mystic' );
		$sql_ary[] = array( 'id' => 268 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Necromancer' ,  'name_short' =>  'Necromancer' );
		$sql_ary[] = array( 'id' => 269 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 270 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Ranger' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 271 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shadowknight' ,  'name_short' =>  'Shadowknight' );
		$sql_ary[] = array( 'id' => 272 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Swashbuckler' ,  'name_short' =>  'Swashbuckler' );
		$sql_ary[] = array( 'id' => 273 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Templar' ,  'name_short' =>  'Templar' );
		$sql_ary[] = array( 'id' => 274 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Troubador' ,  'name_short' =>  'Troubador' );
		$sql_ary[] = array( 'id' => 275 , 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warlock' ,  'name_short' =>  'Warlock' );
		$sql_ary[] = array( 'id' => 276 , 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warden' ,  'name_short' =>  'Warden' );
		$sql_ary[] = array( 'id' => 277 , 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Wizard' ,  'name_short' =>  'Wizard' );
		
		$sql_ary[] = array( 'id' => 278 , 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 279 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Assassin' ,  'name_short' =>  'Assassin' );
		$sql_ary[] = array( 'id' => 280 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Berserk' ,  'name_short' =>  'Berserker' );
		$sql_ary[] = array( 'id' => 281 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Baroudeur' ,  'name_short' =>  'Bruiser' );
		$sql_ary[] = array( 'id' => 282 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Brigand' ,  'name_short' =>  'Brigand' );
		$sql_ary[] = array( 'id' => 283 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Subjugueur' ,  'name_short' =>  'Coercer' );
		$sql_ary[] = array( 'id' => 284 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Invocateur' ,  'name_short' =>  'Conjuror' );
		$sql_ary[] = array( 'id' => 285 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Destructeur' ,  'name_short' =>  'Defiler' );
		$sql_ary[] = array( 'id' => 286 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chante-sort' ,  'name_short' =>  'Dirge' );
		$sql_ary[] = array( 'id' => 287 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Furie' ,  'name_short' =>  'Fury' );
		$sql_ary[] = array( 'id' => 288 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Gardien' ,  'name_short' =>  'Guardian' );
		$sql_ary[] = array( 'id' => 289 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Illusioniste' ,  'name_short' =>  'Illusionist' );
		$sql_ary[] = array( 'id' => 290 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Inquisiteur' ,  'name_short' =>  'Inquisitor' );
		$sql_ary[] = array( 'id' => 291 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Moine' ,  'name_short' =>  'Monk' );
		$sql_ary[] = array( 'id' => 292 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Mystique' ,  'name_short' =>  'Mystic' );
		$sql_ary[] = array( 'id' => 293 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Necromancer' ,  'name_short' =>  'Necromancer' );
		$sql_ary[] = array( 'id' => 294 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 295 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chasseur' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 296 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chevalier de l’ombre' ,  'name_short' =>  'Shadowknight' );
		$sql_ary[] = array( 'id' => 297 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Fier à bras' ,  'name_short' =>  'Swashbuckler' );
		$sql_ary[] = array( 'id' => 298 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Templier' ,  'name_short' =>  'Templar' );
		$sql_ary[] = array( 'id' => 299 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Troubadour' ,  'name_short' =>  'Troubador' );
		$sql_ary[] = array( 'id' => 300 , 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Envôuteur' ,  'name_short' =>  'Warlock' );
		$sql_ary[] = array( 'id' => 301 , 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Surveillant' ,  'name_short' =>  'Warden' );
		$sql_ary[] = array( 'id' => 302 , 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Sorcier' ,  'name_short' =>  'Wizard' );
	
		// classes de			
		$sql_ary[] = array( 'id' => 366 , 'attribute_id' => 0, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 367 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Assassin' ,  'name_short' =>  'Assassin' );
		$sql_ary[] = array( 'id' => 368 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Berserker' ,  'name_short' =>  'Berserker' );
		$sql_ary[] = array( 'id' => 369 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Raufbold' ,  'name_short' =>  'Bruiser' );
		$sql_ary[] = array( 'id' => 370 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Brigant' ,  'name_short' =>  'Brigant' );
		$sql_ary[] = array( 'id' => 371 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Erzwinger' ,  'name_short' =>  'Coercer' );
		$sql_ary[] = array( 'id' => 372 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Elementalist' ,  'name_short' =>  'Conjuror' );
		$sql_ary[] = array( 'id' => 373 , 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Schänder' ,  'name_short' =>  'Defiler' );
		$sql_ary[] = array( 'id' => 374 , 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Klagesänger' ,  'name_short' =>  'Dirge' );
		$sql_ary[] = array( 'id' => 375 , 'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Zornesdruiden' ,  'name_short' =>  'Fury' );
		$sql_ary[] = array( 'id' => 376 , 'attribute_id' => 10, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Wächter' ,  'name_short' =>  'Guardian' );
		$sql_ary[] = array( 'id' => 377 , 'attribute_id' => 11, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Thaumaturgist' ,  'name_short' =>  'Illusionist' );
		$sql_ary[] = array( 'id' => 378 , 'attribute_id' => 12, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Inquisitor' ,  'name_short' =>  'Inquisitor' );
		$sql_ary[] = array( 'id' => 379 , 'attribute_id' => 13, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Mönch' ,  'name_short' =>  'Monk' );
		$sql_ary[] = array( 'id' => 380 , 'attribute_id' => 14, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Mystiker' ,  'name_short' =>  'Mystic' );
		$sql_ary[] = array( 'id' => 381 , 'attribute_id' => 15, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Nekromant' ,  'name_short' =>  'Necromancer' );
		$sql_ary[] = array( 'id' => 382 , 'attribute_id' => 16, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 383 , 'attribute_id' => 17, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Waldlaufer' ,  'name_short' =>  'Ranger' );
		$sql_ary[] = array( 'id' => 384 , 'attribute_id' => 18, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Schattenritter' ,  'name_short' =>  'Shadowknight' );
		$sql_ary[] = array( 'id' => 385 , 'attribute_id' => 19, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Abenteurer' ,  'name_short' =>  'Swashbuckler' );
		$sql_ary[] = array( 'id' => 386 , 'attribute_id' => 20, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Templer' ,  'name_short' =>  'Templar' );
		$sql_ary[] = array( 'id' => 387 , 'attribute_id' => 21, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Troubadoure' ,  'name_short' =>  'Troubador' );
		$sql_ary[] = array( 'id' => 388 , 'attribute_id' => 22, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Hexenmeister' ,  'name_short' =>  'Warlock' );
		$sql_ary[] = array( 'id' => 389 , 'attribute_id' => 23, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Warter' ,  'name_short' =>  'Warden' );
		$sql_ary[] = array( 'id' => 390 , 'attribute_id' => 24, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Zauberer' ,  'name_short' =>  'Wizard' );
			
		//races
		$sql_ary[] = array( 'id' => 303 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 304 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
		$sql_ary[] = array( 'id' => 305 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Human' ,  'name_short' =>  'Human' );
		$sql_ary[] = array( 'id' => 306 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Barbarian' ,  'name_short' =>  'Barbarian' );
		$sql_ary[] = array( 'id' => 307 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 308 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'High Elf' ,  'name_short' =>  'High Elf' );
		$sql_ary[] = array( 'id' => 309 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dark Elf' ,  'name_short' =>  'Dark Elf' );
		$sql_ary[] = array( 'id' => 310 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Wood Elf' ,  'name_short' =>  'Wood Elf' );
		$sql_ary[] = array( 'id' => 311 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Half Elf' ,  'name_short' =>  'Half Elf' );
		$sql_ary[] = array( 'id' => 312 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Kerra' ,  'name_short' =>  'Kerra' );
		$sql_ary[] = array( 'id' => 313 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 314 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Ogre' ,  'name_short' =>  'Ogre' );
		$sql_ary[] = array( 'id' => 315 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Frog' ,  'name_short' =>  'Frog' );
		$sql_ary[] = array( 'id' => 316 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Iksar' ,  'name_short' =>  'Iksar' );
		$sql_ary[] = array( 'id' => 317 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Erudite' ,  'name_short' =>  'Erudite' );
		$sql_ary[] = array( 'id' => 318 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Halfling' ,  'name_short' =>  'Halfling' );
		$sql_ary[] = array( 'id' => 319 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Ratonga' ,  'name_short' =>  'Ratonga' );
		$sql_ary[] = array( 'id' => 320 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Fae' ,  'name_short' =>  'Fae' );
		$sql_ary[] = array( 'id' => 321 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Froglok' ,  'name_short' =>  'Froglok' );
		$sql_ary[] = array( 'id' => 322 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Arasai' ,  'name_short' =>  'Arasai' );
		$sql_ary[] = array( 'id' => 323 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Sarnak' ,  'name_short' =>  'Sarnak' );
		
		//races fr
		$sql_ary[] = array( 'id' => 324 , 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 325 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
		$sql_ary[] = array( 'id' => 326 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Humain' ,  'name_short' =>  'Human' );
		$sql_ary[] = array( 'id' => 327 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Barbare' ,  'name_short' =>  'Barbarian' );
		$sql_ary[] = array( 'id' => 328 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Nain' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 329 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Haut Elfe' ,  'name_short' =>  'High Elf' );
		$sql_ary[] = array( 'id' => 330 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elfe Noir' ,  'name_short' =>  'Dark Elf' );
		$sql_ary[] = array( 'id' => 331 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elfe des Bois' ,  'name_short' =>  'Wood Elf' );
		$sql_ary[] = array( 'id' => 332 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Semi-Elfe' ,  'name_short' =>  'Half Elf' );
		$sql_ary[] = array( 'id' => 333 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Kerran' ,  'name_short' =>  'Kerra' );
		$sql_ary[] = array( 'id' => 334 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 335 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Ogre' ,  'name_short' =>  'Ogre' );
		$sql_ary[] = array( 'id' => 336 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Frog' ,  'name_short' =>  'Frog' );
		$sql_ary[] = array( 'id' => 337 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Iksar' ,  'name_short' =>  'Iksar' );
		$sql_ary[] = array( 'id' => 338 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Erudit' ,  'name_short' =>  'Erudite' );
		$sql_ary[] = array( 'id' => 339 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Halfelin' ,  'name_short' =>  'Halfling' );
		$sql_ary[] = array( 'id' => 340 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Ratonga' ,  'name_short' =>  'Ratonga' );
		$sql_ary[] = array( 'id' => 341 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Fae' ,  'name_short' =>  'Fae' );
		$sql_ary[] = array( 'id' => 342 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Grelok' ,  'name_short' =>  'Froglok' );
		$sql_ary[] = array( 'id' => 343 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Arasai' ,  'name_short' =>  'Arasai' );
		$sql_ary[] = array( 'id' => 344 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Sarnak' ,  'name_short' =>  'Sarnak' );
		
		// races de		
		$sql_ary[] = array( 'id' => 345 , 'attribute_id' => 0, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Unbekannt' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 346 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
		$sql_ary[] = array( 'id' => 347 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Mensch' ,  'name_short' =>  'Human' );
		$sql_ary[] = array( 'id' => 348 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Barbare' ,  'name_short' =>  'Barbarian' );
		$sql_ary[] = array( 'id' => 349 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Zwerg' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 350 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Hochelf' ,  'name_short' =>  'High Elf' );
		$sql_ary[] = array( 'id' => 351 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Dunkelelf' ,  'name_short' =>  'Dark Elf' );
		$sql_ary[] = array( 'id' => 352 , 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Waldelf' ,  'name_short' =>  'Wood Elf' );
		$sql_ary[] = array( 'id' => 353 , 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Halbelf' ,  'name_short' =>  'Half Elf' );
		$sql_ary[] = array( 'id' => 354 , 'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Kerraner' ,  'name_short' =>  'Kerra' );
		$sql_ary[] = array( 'id' => 355 , 'attribute_id' => 10, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Trolle' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 356 , 'attribute_id' => 11, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Oger' ,  'name_short' =>  'Ogre' );
		$sql_ary[] = array( 'id' => 357 , 'attribute_id' => 12, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Froschlok' ,  'name_short' =>  'Frog' );
		$sql_ary[] = array( 'id' => 358 , 'attribute_id' => 13, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Iksar' ,  'name_short' =>  'Iksar' );
		$sql_ary[] = array( 'id' => 359 , 'attribute_id' => 14, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Erudit' ,  'name_short' =>  'Erudite' );
		$sql_ary[] = array( 'id' => 360 , 'attribute_id' => 15, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Halbling' ,  'name_short' =>  'Halfling' );
		$sql_ary[] = array( 'id' => 361 , 'attribute_id' => 16, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Ratonga' ,  'name_short' =>  'Ratonga' );
		$sql_ary[] = array( 'id' => 362 , 'attribute_id' => 17, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Feen' ,  'name_short' =>  'Fae' );
		$sql_ary[] = array( 'id' => 363 , 'attribute_id' => 18, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Grelok' ,  'name_short' =>  'Froglok' );
		$sql_ary[] = array( 'id' => 364 , 'attribute_id' => 19, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Arasai' ,  'name_short' =>  'Arasai' );
		$sql_ary[] = array( 'id' => 365 , 'attribute_id' => 20, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Sarnak' ,  'name_short' =>  'Sarnak' );
					
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_language', $sql_ary );
		unset ( $sql_ary );
		
	}
}


/*
 * release 1.2 -- updates for eq2
 * 
 */
function update_eq2_bb3()
{
	global $db, $table_prefix, $umil, $user;
	
	// new race (Freeblood)
	$sql_ary = array ();
    $sql_ary [] = array ('race_id' => 21, 'race_faction_id' => 3 , 'image_female_small' => '',  'image_male_small' => '' ); //Freeblood
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_races', $sql_ary );

	unset ( $sql_ary );
	$sql_ary[] = array( 'id' => 400 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Freeblood' ,  'name_short' =>  'Freeblood' );
	$sql_ary[] = array( 'id' => 401 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Freeblood' ,  'name_short' =>  'Freeblood' );
	$sql_ary[] = array( 'id' => 402 , 'attribute_id' => 21, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Freeblood' ,  'name_short' =>  'Freeblood' );
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_language', $sql_ary );

	$sql = 'UPDATE  ' . $table_prefix . "bbdkp_classes  SET class_min_level = '1' " ;
	$db->sql_query($sql);
}

?>