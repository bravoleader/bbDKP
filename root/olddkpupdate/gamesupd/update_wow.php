<?php
/**
 * bbdkp wow install data
 * @author Sajaki@betenoire
 * @package bbDkp-updater
 * @copyright (c) 2009 bbDkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id$
 * 
 */

/**
 * @ignore
 */
if (! defined ( 'IN_PHPBB' ))
{
	exit ();
}
/************************
 * bbdkp main wow Installer 
 * 
 *
 * @param string $bbdkp_table_prefix
 */
function update_wow($bbdkp_table_prefix)
{
	global $db, $umil;
	
	// dkp system bbeqdkp_dkpsystem 
	// set to classic tbc wlk 
	$db->sql_query ( 'TRUNCATE TABLE ' . $bbdkp_table_prefix . 'dkpsystem' );
	$sql_ary = array ();
	$sql_ary [] = array ('dkpsys_id' => '1', 'dkpsys_name' => 'Classic', 'dkpsys_status' => 'Y', 'dkpsys_addedby' => 'admin', 'dkpsys_default' => 'N' );
	$sql_ary [] = array ('dkpsys_id' => '2', 'dkpsys_name' => 'TBC', 'dkpsys_status' => 'Y', 'dkpsys_addedby' => 'admin', 'dkpsys_default' => 'N' );
	$sql_ary [] = array ('dkpsys_id' => '3', 'dkpsys_name' => 'WLK10', 'dkpsys_status' => 'Y', 'dkpsys_addedby' => 'admin', 'dkpsys_default' => 'Y' );
	$sql_ary [] = array ('dkpsys_id' => '4', 'dkpsys_name' => 'WLK25', 'dkpsys_status' => 'Y', 'dkpsys_addedby' => 'admin', 'dkpsys_default' => 'N' );
	$db->sql_multi_insert ( $bbdkp_table_prefix . 'dkpsystem', $sql_ary );
	
	$db->sql_query ( 'TRUNCATE TABLE ' . $bbdkp_table_prefix . 'classes' );
	$sql_ary = array ();
	
	// class : note these eqdkp class_ids are changed in release 1.1 to follow blizz
	$sql_ary [] = array ('class_id' => 0, 'class_name' => 'Unknown', 'class_armor_type' => 'PLATE', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 1, 'class_name' => 'Warrior', 'class_armor_type' => 'PLATE', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 2, 'class_name' => 'Rogue', 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 3, 'class_name' => 'Hunter', 'class_armor_type' => 'MAIL', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 4, 'class_name' => 'Paladin', 'class_armor_type' => 'PLATE', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 5, 'class_name' => 'Shaman', 'class_armor_type' => 'MAIL', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 6, 'class_name' => 'Druid', 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 7, 'class_name' => 'Warlock', 'class_armor_type' => 'CLOTH', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 8, 'class_name' => 'Mage', 'class_armor_type' => 'CLOTH', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 9, 'class_name' => 'Priest', 'class_armor_type' => 'CLOTH', 'class_min_level' => 1, 'class_max_level' => 85 );
	$sql_ary [] = array ('class_id' => 10, 'class_name' => 'Death Knight', 'class_armor_type' => 'PLATE', 'class_min_level' => 55, 'class_max_level' => 85 );
	
	$db->sql_multi_insert ( $bbdkp_table_prefix . 'classes', $sql_ary );
	unset ( $sql_ary );
	
	// factions
	$db->sql_query ( 'TRUNCATE TABLE ' . $bbdkp_table_prefix . 'factions' );
	$sql_ary = array ();
	$sql_ary [] = array ('faction_id' => 1, 'faction_name' => 'Alliance' );
	$sql_ary [] = array ('faction_id' => 2, 'faction_name' => 'Horde' );
	$db->sql_multi_insert ( $bbdkp_table_prefix . 'factions', $sql_ary );
	unset ( $sql_ary );
	
	// races : note we use blizz id
	$db->sql_query ( 'TRUNCATE TABLE ' . $bbdkp_table_prefix . 'races' );
	$sql_ary = array ();
	$sql_ary [] = array ('race_id' => 0, 'race_name' => 'Unknown', 'race_faction_id' => 0 );
	$sql_ary [] = array ('race_id' => 1, 'race_name' => 'Human', 'race_faction_id' => 1 );
	$sql_ary [] = array ('race_id' => 2, 'race_name' => 'Orc', 'race_faction_id' => 2 );
	$sql_ary [] = array ('race_id' => 3, 'race_name' => 'Dwarf', 'race_faction_id' => 1 );
	$sql_ary [] = array ('race_id' => 4, 'race_name' => 'Night Elf', 'race_faction_id' => 1 );
	$sql_ary [] = array ('race_id' => 5, 'race_name' => 'Undead', 'race_faction_id' => 2 );
	$sql_ary [] = array ('race_id' => 6, 'race_name' => 'Tauren', 'race_faction_id' => 2 );
	$sql_ary [] = array ('race_id' => 7, 'race_name' => 'Gnome', 'race_faction_id' => 1 );
	$sql_ary [] = array ('race_id' => 8, 'race_name' => 'Troll', 'race_faction_id' => 2 );
	$sql_ary [] = array ('race_id' => 10, 'race_name' => 'Blood Elf', 'race_faction_id' => 2 );
	$sql_ary [] = array ('race_id' => 11, 'race_name' => 'Draenei', 'race_faction_id' => 1 );
	$db->sql_multi_insert ( $bbdkp_table_prefix . 'races', $sql_ary );
	
	unset ( $sql_ary );
	// index page recruitment status
	$sql_ary = array ();
	$sql_ary [] = array ('setting' => 'Death Knight (Blood)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Death Knight (Frost)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Death Knight (Unholy)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Druid (Resto)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Druid (Feral)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Druid (Balance)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Hunter', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Priest (Shadow)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Priest (Holy)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Priest (Disc)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Rogue', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Shaman (Enh)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Shaman (Resto)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Shaman (Ele)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Warlock', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Mage', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Paladin (Holy)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Paladin (Ret)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Paladin (Prot)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Warrior (Tank)', 'value' => 'Closed' );
	$sql_ary [] = array ('setting' => 'Warrior (DPS)', 'value' => 'Closed' );
	$db->sql_multi_insert ( $bbdkp_table_prefix . 'indexpage', $sql_ary );
	
	unset ( $sql_ary );
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_config' ))
	{
		$sql = 'TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_config';
		$db->sql_query ( $sql );
		
		$sql_ary [] = array ('config_name' => 'bossInfo', 'config_value' => 'rname' );
		$sql_ary [] = array ('config_name' => 'dynBoss', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'dynZone', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'nameDelim', 'config_value' => '-' );
		$sql_ary [] = array ('config_name' => 'noteDelim', 'config_value' => ',' );
		$sql_ary [] = array ('config_name' => 'showSB', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'source', 'config_value' => 'database' );
		$sql_ary [] = array ('config_name' => 'style', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'tables', 'config_value' => 'bbeqdkp' );
		$sql_ary [] = array ('config_name' => 'zhiType', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'zoneInfo', 'config_value' => 'rname' );
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_config', $sql_ary );
		
		// Boss names     
		$sql_ary = array ();
		$sql_ary [] = array ('config_name' => 'pb_akama', 'config_value' => 'Akama' );
		$sql_ary [] = array ('config_name' => 'pb_alar', 'config_value' => 'Al\'Ar the Phoenix God, Al\'Ar' );
		$sql_ary [] = array ('config_name' => 'pb_anetheron', 'config_value' => 'Anetheron' );
		$sql_ary [] = array ('config_name' => 'pb_anubrekhan', 'config_value' => 'Anub\'Rekhan' );
		$sql_ary [] = array ('config_name' => 'pb_aran', 'config_value' => 'Shade of Aran, Aran' );
		$sql_ary [] = array ('config_name' => 'pb_archimonde', 'config_value' => 'Archimonde' );
		$sql_ary [] = array ('config_name' => 'pb_arlokk', 'config_value' => 'High Priestess Arlokk, Arlokk' );
		$sql_ary [] = array ('config_name' => 'pb_attumen', 'config_value' => 'Attumen the Huntsman, Attumen' );
		$sql_ary [] = array ('config_name' => 'pb_ayamiss', 'config_value' => 'Ayamiss the Hunter, Ayamiss' );
		$sql_ary [] = array ('config_name' => 'pb_azgalor', 'config_value' => 'Azgalor' );
		$sql_ary [] = array ('config_name' => 'pb_azuregos', 'config_value' => 'Azuregos' );
		$sql_ary [] = array ('config_name' => 'pb_blaumeux', 'config_value' => 'Lady Blaumeux, Blaumeux' );
		$sql_ary [] = array ('config_name' => 'pb_bloodboil', 'config_value' => 'Gurtogg Bloodboil, Bloodboil' );
		$sql_ary [] = array ('config_name' => 'pb_buru', 'config_value' => 'Buru the Gorger, Buru' );
		$sql_ary [] = array ('config_name' => 'pb_chess', 'config_value' => 'Chess Event, Chess' );
		$sql_ary [] = array ('config_name' => 'pb_chromaggus', 'config_value' => 'Chromaggus' );
		$sql_ary [] = array ('config_name' => 'pb_council', 'config_value' => 'Illidari Council, Council' );
		$sql_ary [] = array ('config_name' => 'pb_cthun', 'config_value' => 'C\'Thun' );
		$sql_ary [] = array ('config_name' => 'pb_curator', 'config_value' => 'The Curator, Curator' );
		$sql_ary [] = array ('config_name' => 'pb_doomkazzak', 'config_value' => 'Doom Lord Kazzak, Doom Kazzak' );
		$sql_ary [] = array ('config_name' => 'pb_doomwalker', 'config_value' => 'Doomwalker' );
		$sql_ary [] = array ('config_name' => 'pb_ebonroc', 'config_value' => 'Ebonroc' );
		$sql_ary [] = array ('config_name' => 'pb_emeriss', 'config_value' => 'Emeriss' );
		$sql_ary [] = array ('config_name' => 'pb_essence', 'config_value' => 'Essence of Souls, Essence' );
		$sql_ary [] = array ('config_name' => 'pb_faerlina', 'config_value' => 'Grand Widow Faerlina, Faerlina' );
		$sql_ary [] = array ('config_name' => 'pb_fankriss', 'config_value' => 'Fankriss the Unyielding, Fankriss' );
		$sql_ary [] = array ('config_name' => 'pb_firemaw', 'config_value' => 'Firemaw' );
		$sql_ary [] = array ('config_name' => 'pb_flamegor', 'config_value' => 'Flamegor' );
		$sql_ary [] = array ('config_name' => 'pb_gahzranka', 'config_value' => 'Gahz\'ranka' );
		$sql_ary [] = array ('config_name' => 'pb_garr', 'config_value' => 'Garr' );
		$sql_ary [] = array ('config_name' => 'pb_geddon', 'config_value' => 'Baron Geddon, Geddon' );
		$sql_ary [] = array ('config_name' => 'pb_gehennas', 'config_value' => 'Gehennas' );
		$sql_ary [] = array ('config_name' => 'pb_gluth', 'config_value' => 'Gluth' );
		$sql_ary [] = array ('config_name' => 'pb_golemagg', 'config_value' => 'Golemagg the Incinerator, Golemagg' );
		$sql_ary [] = array ('config_name' => 'pb_gorefiend', 'config_value' => 'Teron Gorefiend, Gorefiend' );
		$sql_ary [] = array ('config_name' => 'pb_gothik', 'config_value' => 'Gothik the Harvester, Gothik' );
		$sql_ary [] = array ('config_name' => 'pb_grilek', 'config_value' => 'Gri\'lek' );
		$sql_ary [] = array ('config_name' => 'pb_grobbulus', 'config_value' => 'Grobbulus' );
		$sql_ary [] = array ('config_name' => 'pb_gruul', 'config_value' => 'Gruul the Dragonkiller, Gruul' );
		$sql_ary [] = array ('config_name' => 'pb_hakkar', 'config_value' => 'Hakkar' );
		$sql_ary [] = array ('config_name' => 'pb_hazzarah', 'config_value' => 'Hazza\'rah' );
		$sql_ary [] = array ('config_name' => 'pb_heigan', 'config_value' => 'Heigan the Unclean, Heigan' );
		$sql_ary [] = array ('config_name' => 'pb_huhuran', 'config_value' => 'Princess Huhuran, Huhuran' );
		$sql_ary [] = array ('config_name' => 'pb_hydross', 'config_value' => 'Hydross the Unstable, Hydross' );
		$sql_ary [] = array ('config_name' => 'pb_illhoof', 'config_value' => 'Terestian Illhoof' );
		$sql_ary [] = array ('config_name' => 'pb_illidan', 'config_value' => 'Illidan Stormrage, Illidan' );
		$sql_ary [] = array ('config_name' => 'pb_jeklik', 'config_value' => 'High Priestess Jeklik, Jeklik' );
		$sql_ary [] = array ('config_name' => 'pb_jindo', 'config_value' => 'Jin\'do the Hexxer, Jin\'do' );
		$sql_ary [] = array ('config_name' => 'pb_kaelthas', 'config_value' => 'Kael\'thas Sunstrider, Kaelthas' );
		$sql_ary [] = array ('config_name' => 'pb_karathress', 'config_value' => 'Fathom-Lord Karathress, Karathress' );
		$sql_ary [] = array ('config_name' => 'pb_kazrogal', 'config_value' => 'Kaz\'rogal' );
		$sql_ary [] = array ('config_name' => 'pb_kazzak', 'config_value' => 'Lord Kazzak, Kazzak' );
		$sql_ary [] = array ('config_name' => 'pb_kelthuzad', 'config_value' => 'Kel\'Thuzad' );
		$sql_ary [] = array ('config_name' => 'pb_korthazz', 'config_value' => 'Thane Korth\'azz, Korth\'azz' );
		$sql_ary [] = array ('config_name' => 'pb_kri', 'config_value' => 'Lord Kri' );
		$sql_ary [] = array ('config_name' => 'pb_kurinnaxx', 'config_value' => 'Kurinnaxx' );
		$sql_ary [] = array ('config_name' => 'pb_lashlayer', 'config_value' => 'Broodlord Lashlayer, Lashlayer' );
		$sql_ary [] = array ('config_name' => 'pb_leotheras', 'config_value' => 'Leotheras the Blind, Leotheras' );
		$sql_ary [] = array ('config_name' => 'pb_lethon', 'config_value' => 'Lethon' );
		$sql_ary [] = array ('config_name' => 'pb_loatheb', 'config_value' => 'Loatheb' );
		$sql_ary [] = array ('config_name' => 'pb_lucifron', 'config_value' => 'Lucifron' );
		$sql_ary [] = array ('config_name' => 'pb_lurker', 'config_value' => 'The Lurker Below, Lurker' );
		$sql_ary [] = array ('config_name' => 'pb_maexxna', 'config_value' => 'Maexxna' );
		$sql_ary [] = array ('config_name' => 'pb_magmadar', 'config_value' => 'Magmadar' );
		$sql_ary [] = array ('config_name' => 'pb_magtheridon', 'config_value' => 'Magtheridon' );
		$sql_ary [] = array ('config_name' => 'pb_maiden', 'config_value' => 'Maiden of Virtue, Maiden' );
		$sql_ary [] = array ('config_name' => 'pb_majordomo', 'config_value' => 'Majordomo Executus, Majordomo' );
		$sql_ary [] = array ('config_name' => 'pb_malchezaar', 'config_value' => 'Prince Malchezaar, Malchezaar' );
		$sql_ary [] = array ('config_name' => 'pb_mandokir', 'config_value' => 'Bloodlord Mandokir, Mandokir' );
		$sql_ary [] = array ('config_name' => 'pb_marli', 'config_value' => 'High Priestess Mar\'li, Mar\'li' );
		$sql_ary [] = array ('config_name' => 'pb_maulgar', 'config_value' => 'High King Maulgar, Maulgar' );
		$sql_ary [] = array ('config_name' => 'pb_nalorakk', 'config_value' => 'Nalorakk, Bear Avatar' );
		$sql_ary [] = array ('config_name' => 'pb_akilzon', 'config_value' => 'Akil\'Zon, Eagle Avatar' );
		$sql_ary [] = array ('config_name' => 'pb_halazzi', 'config_value' => 'Halazzi, Lynx Avatar' );
		$sql_ary [] = array ('config_name' => 'pb_janalai', 'config_value' => 'Jan\'Alai, Dragonhawk Avatar' );
		$sql_ary [] = array ('config_name' => 'pb_malacrass', 'config_value' => 'Hex Lord Malacrass, Malacrass' );
		$sql_ary [] = array ('config_name' => 'pb_zuljin', 'config_value' => 'Zul\'Jin, Zul\'Jin' );
		$sql_ary [] = array ('config_name' => 'pb_kalecgos', 'config_value' => 'Kalecgos, Kalecgos' );
		$sql_ary [] = array ('config_name' => 'pb_brutallus', 'config_value' => 'Brutallus, Brutallus' );
		$sql_ary [] = array ('config_name' => 'pb_felmyst', 'config_value' => 'Felmyst, Felmyst' );
		$sql_ary [] = array ('config_name' => 'pb_fetwins', 'config_value' => 'Alythess & Sacrolash, Alythess & Sacrolash' );
		$sql_ary [] = array ('config_name' => 'pb_muru', 'config_value' => 'M\'uru, M\'uru' );
		$sql_ary [] = array ('config_name' => 'pb_kiljaeden', 'config_value' => 'Kil\'jaeden, Kil\'jaeden' );
		$sql_ary [] = array ('config_name' => 'pb_moam', 'config_value' => 'Moam' );
		$sql_ary [] = array ('config_name' => 'pb_mograine', 'config_value' => 'Highlord Mograine, Mograine' );
		$sql_ary [] = array ('config_name' => 'pb_moroes', 'config_value' => 'Moroes' );
		$sql_ary [] = array ('config_name' => 'pb_morogrim', 'config_value' => 'Morogrim Tidewalker, Morogrim' );
		$sql_ary [] = array ('config_name' => 'pb_najentus', 'config_value' => 'High Warlord Naj\'entus, Naj\'entus' );
		$sql_ary [] = array ('config_name' => 'pb_nefarian', 'config_value' => 'Nefarian' );
		$sql_ary [] = array ('config_name' => 'pb_netherspite', 'config_value' => 'Netherspite' );
		$sql_ary [] = array ('config_name' => 'pb_nightbane', 'config_value' => 'Nightbane' );
		$sql_ary [] = array ('config_name' => 'pb_noth', 'config_value' => 'Noth the Plaguebringer, Noth' );
		$sql_ary [] = array ('config_name' => 'pb_onyxia', 'config_value' => 'Onyxia' );
		$sql_ary [] = array ('config_name' => 'pb_opera', 'config_value' => 'Opera Event, Opera' );
		$sql_ary [] = array ('config_name' => 'pb_ossirian', 'config_value' => 'Ossirian the Unscarred, Ossirian' );
		$sql_ary [] = array ('config_name' => 'pb_ouro', 'config_value' => 'Ouro' );
		$sql_ary [] = array ('config_name' => 'pb_patchwerk', 'config_value' => 'Patchwerk' );
		$sql_ary [] = array ('config_name' => 'pb_ragnaros', 'config_value' => 'Ragnaros' );
		$sql_ary [] = array ('config_name' => 'pb_rajaxx', 'config_value' => 'General Rajaxx, Rajaxx' );
		$sql_ary [] = array ('config_name' => 'pb_razorgore', 'config_value' => 'Razorgore the Untamed, Razorgore' );
		$sql_ary [] = array ('config_name' => 'pb_razuvious', 'config_value' => 'Instructor Razuvious, Razuvious' );
		$sql_ary [] = array ('config_name' => 'pb_renataki', 'config_value' => 'Renataki' );
		$sql_ary [] = array ('config_name' => 'pb_sapphiron', 'config_value' => 'Sapphiron' );
		$sql_ary [] = array ('config_name' => 'pb_sartura', 'config_value' => 'Battleguard Sartura, Sartura' );
		$sql_ary [] = array ('config_name' => 'pb_shahraz', 'config_value' => 'Mother Shahraz, Shahraz' );
		$sql_ary [] = array ('config_name' => 'pb_shazzrah', 'config_value' => 'Shazzrah' );
		$sql_ary [] = array ('config_name' => 'pb_skeram', 'config_value' => 'The Prophet Skeram, Skeram' );
		$sql_ary [] = array ('config_name' => 'pb_solarian', 'config_value' => 'High Astromancer Solarian, Solarian' );
		$sql_ary [] = array ('config_name' => 'pb_sulfuron', 'config_value' => 'Sulfuron Harbringer, Sulfuron' );
		$sql_ary [] = array ('config_name' => 'pb_supremus', 'config_value' => 'Supremus' );
		$sql_ary [] = array ('config_name' => 'pb_taerar', 'config_value' => 'Taerar' );
		$sql_ary [] = array ('config_name' => 'pb_thaddius', 'config_value' => 'Thaddius' );
		$sql_ary [] = array ('config_name' => 'pb_thekal', 'config_value' => 'High Priest Thekal, Thekal' );
		$sql_ary [] = array ('config_name' => 'pb_vaelastrasz', 'config_value' => 'Vaelastrasz the Corrupt, Vaelastrasz' );
		$sql_ary [] = array ('config_name' => 'pb_vashj', 'config_value' => 'Lady Vashj, Vashj' );
		$sql_ary [] = array ('config_name' => 'pb_veklor', 'config_value' => 'Emperor Vek\'lor, Vek\'lor' );
		$sql_ary [] = array ('config_name' => 'pb_veknilash', 'config_value' => 'Emperor Vek\'nilash, Vek\'nilash' );
		$sql_ary [] = array ('config_name' => 'pb_vem', 'config_value' => 'Vem' );
		$sql_ary [] = array ('config_name' => 'pb_venoxis', 'config_value' => 'High Priest Venoxis, Venoxis' );
		$sql_ary [] = array ('config_name' => 'pb_viscidus', 'config_value' => 'Viscidus' );
		$sql_ary [] = array ('config_name' => 'pb_vreaver', 'config_value' => 'Void Reaver, Reaver' );
		$sql_ary [] = array ('config_name' => 'pb_winterchill', 'config_value' => 'Rage Winterchill, Winterchill' );
		$sql_ary [] = array ('config_name' => 'pb_wushoolay', 'config_value' => 'Wushoolay' );
		$sql_ary [] = array ('config_name' => 'pb_yauj', 'config_value' => 'Princess Yauj' );
		$sql_ary [] = array ('config_name' => 'pb_ysondre', 'config_value' => 'Ysondre' );
		$sql_ary [] = array ('config_name' => 'pb_zeliek', 'config_value' => 'Sir Zeliek' );
		$sql_ary [] = array ('config_name' => 'pb_anubrekhan_10', 'config_value' => 'Anub\'Rekhan (10), AnubRekhan (10)' );
		$sql_ary [] = array ('config_name' => 'pb_faerlina_10', 'config_value' => 'Grand Widow Faerlina (10), Faerlina (10)' );
		$sql_ary [] = array ('config_name' => 'pb_maexxna_10', 'config_value' => 'Maexxna (10)' );
		$sql_ary [] = array ('config_name' => 'pb_noth_10', 'config_value' => 'Noth the Plaguebringer (10), Noth (10)' );
		$sql_ary [] = array ('config_name' => 'pb_heigan_10', 'config_value' => 'Heigan the Unclean (10), Heigan (10)' );
		$sql_ary [] = array ('config_name' => 'pb_loatheb_10', 'config_value' => 'Loatheb (10)' );
		$sql_ary [] = array ('config_name' => 'pb_patchwerk_10', 'config_value' => 'Patchwerk (10)' );
		$sql_ary [] = array ('config_name' => 'pb_grobbulus_10', 'config_value' => 'Grobbulus (10)' );
		$sql_ary [] = array ('config_name' => 'pb_gluth_10', 'config_value' => 'Gluth (10)' );
		$sql_ary [] = array ('config_name' => 'pb_thaddius_10', 'config_value' => 'Thaddius (10)' );
		$sql_ary [] = array ('config_name' => 'pb_razuvious_10', 'config_value' => 'Instructor Razuvious (10)' );
		$sql_ary [] = array ('config_name' => 'pb_gothik_10', 'config_value' => 'Gothik the Harvester (10)' );
		$sql_ary [] = array ('config_name' => 'pb_horsemen_10', 'config_value' => 'Four Horsemen (10)' );
		$sql_ary [] = array ('config_name' => 'pb_sapphiron_10', 'config_value' => 'Sapphiron (10)' );
		$sql_ary [] = array ('config_name' => 'pb_kelthuzad_10', 'config_value' => 'Kel\'Thuzad (10)' );
		$sql_ary [] = array ('config_name' => 'pb_anubrekhan_25', 'config_value' => 'Anub\'Rekhan (25), AnubRekhan (25)' );
		$sql_ary [] = array ('config_name' => 'pb_faerlina_25', 'config_value' => 'Grand Widow Faerlina (25), Faerlina (25)' );
		$sql_ary [] = array ('config_name' => 'pb_maexxna_25', 'config_value' => 'Maexxna (25)' );
		$sql_ary [] = array ('config_name' => 'pb_noth_25', 'config_value' => 'Noth the Plaguebringer (25), Noth (25)' );
		$sql_ary [] = array ('config_name' => 'pb_heigan_25', 'config_value' => 'Heigan the Unclean (25), Heigan (25)' );
		$sql_ary [] = array ('config_name' => 'pb_loatheb_25', 'config_value' => 'Loatheb (25)' );
		$sql_ary [] = array ('config_name' => 'pb_patchwerk_25', 'config_value' => 'Patchwerk (25)' );
		$sql_ary [] = array ('config_name' => 'pb_grobbulus_25', 'config_value' => 'Grobbulus (25)' );
		$sql_ary [] = array ('config_name' => 'pb_gluth_25', 'config_value' => 'Gluth (25)' );
		$sql_ary [] = array ('config_name' => 'pb_thaddius_25', 'config_value' => 'Thaddius (25)' );
		$sql_ary [] = array ('config_name' => 'pb_razuvious_25', 'config_value' => 'Instructor Razuvious (25)' );
		$sql_ary [] = array ('config_name' => 'pb_gothik_25', 'config_value' => 'Gothik the Harvester (25)' );
		$sql_ary [] = array ('config_name' => 'pb_horsemen_25', 'config_value' => 'Four Horsemen (25)' );
		$sql_ary [] = array ('config_name' => 'pb_sapphiron_25', 'config_value' => 'Sapphiron (25)' );
		$sql_ary [] = array ('config_name' => 'pb_kelthuzad_25', 'config_value' => 'Kel\'Thuzad (25)' );
		$sql_ary [] = array ('config_name' => 'pb_archavon_10', 'config_value' => 'Archavon the Stone Watcher (10), Archavon (10)' );
		$sql_ary [] = array ('config_name' => 'pb_archavon_25', 'config_value' => 'Archavon the Stone Watcher (25), Archavon (25)' );
		$sql_ary [] = array ('config_name' => 'pb_malygos_10', 'config_value' => 'Malygos (10)' );
		$sql_ary [] = array ('config_name' => 'pb_malygos_25', 'config_value' => 'Malygos (25)' );
		$sql_ary [] = array ('config_name' => 'pb_sartharion_0d_10', 'config_value' => 'Sartharion the Onyx Guardian No dragons (10), Sartharion 0d (10)' );
		$sql_ary [] = array ('config_name' => 'pb_sartharion_1d_10', 'config_value' => 'Sartharion the Onyx Guardian One dragon (10), Sartharion 1d (10)' );
		$sql_ary [] = array ('config_name' => 'pb_sartharion_2d_10', 'config_value' => 'Sartharion the Onyx Guardian Two dragons (10), Sartharion 2d (10)' );
		$sql_ary [] = array ('config_name' => 'pb_sartharion_3d_10', 'config_value' => 'Sartharion the Onyx Guardian Three dragons (10), Sartharion 3d (10)' );
		$sql_ary [] = array ('config_name' => 'pb_sartharion_0d_25', 'config_value' => 'Sartharion the Onyx Guardian No dragon (25), Sartharion 0d (25)' );
		$sql_ary [] = array ('config_name' => 'pb_sartharion_1d_25', 'config_value' => 'Sartharion the Onyx Guardian One dragons (25), Sartharion 1d (25)' );
		$sql_ary [] = array ('config_name' => 'pb_sartharion_2d_25', 'config_value' => 'Sartharion the Onyx Guardian Two dragons (25), Sartharion 2d (25)' );
		$sql_ary [] = array ('config_name' => 'pb_sartharion_3d_25', 'config_value' => 'Sartharion the Onyx Guardian Three dragons (25), Sartharion 3d (25)' );
		$sql_ary [] = array ('config_name' => 'pb_algalon_10', 'config_value' => 'Algalon (10)' );
		$sql_ary [] = array ('config_name' => 'pb_algalon_25', 'config_value' => 'Algalon (25)' );
		$sql_ary [] = array ('config_name' => 'pb_assembly_10', 'config_value' => 'Assembly of Iron (10)' );
		$sql_ary [] = array ('config_name' => 'pb_assembly_25', 'config_value' => 'Assembly of Iron (25)' );
		$sql_ary [] = array ('config_name' => 'pb_auriaya_10', 'config_value' => 'Auriaya (10)' );
		$sql_ary [] = array ('config_name' => 'pb_auriaya_25', 'config_value' => 'Auriaya (25)' );
		$sql_ary [] = array ('config_name' => 'pb_deconstructor_10', 'config_value' => 'XT-002 Deconstructor (10)' );
		$sql_ary [] = array ('config_name' => 'pb_deconstructor_25', 'config_value' => 'XT-002 Deconstructor (25)' );
		$sql_ary [] = array ('config_name' => 'pb_emalon_10', 'config_value' => 'Emalon the Storm Watcher (10), Emalon (10)' );
		$sql_ary [] = array ('config_name' => 'pb_emalon_25', 'config_value' => 'Emalon the Storm Watcher (25), Emalon (25)' );
		$sql_ary [] = array ('config_name' => 'pb_freya_10', 'config_value' => 'Freya (10)' );
		$sql_ary [] = array ('config_name' => 'pb_freya_25', 'config_value' => 'Freya (25)' );
		$sql_ary [] = array ('config_name' => 'pb_hodir_10', 'config_value' => 'Hodir (10)' );
		$sql_ary [] = array ('config_name' => 'pb_hodir_25', 'config_value' => 'Hodir (25)' );
		$sql_ary [] = array ('config_name' => 'pb_ignis_10', 'config_value' => 'Ignis the Furnace Master (10), Ignis (10)' );
		$sql_ary [] = array ('config_name' => 'pb_ignis_25', 'config_value' => 'Ignis the Furnace Master (25), Ignis (25)' );
		$sql_ary [] = array ('config_name' => 'pb_kologarn_10', 'config_value' => 'Kologarn (10)' );
		$sql_ary [] = array ('config_name' => 'pb_kologarn_25', 'config_value' => 'Kologarn (25)' );
		$sql_ary [] = array ('config_name' => 'pb_leviathan_10', 'config_value' => 'Flame Leviathan (10), Leviathan (10)' );
		$sql_ary [] = array ('config_name' => 'pb_leviathan_25', 'config_value' => 'Flame Leviathan (25), Leviathan (25)' );
		$sql_ary [] = array ('config_name' => 'pb_mimiron_10', 'config_value' => 'Mimiron (10)' );
		$sql_ary [] = array ('config_name' => 'pb_mimiron_25', 'config_value' => 'Mimiron (25)' );
		$sql_ary [] = array ('config_name' => 'pb_razorscale_10', 'config_value' => 'Razorscale (10)' );
		$sql_ary [] = array ('config_name' => 'pb_razorscale_25', 'config_value' => 'Razorscale (25)' );
		$sql_ary [] = array ('config_name' => 'pb_thorim_10', 'config_value' => 'Thorim (10)' );
		$sql_ary [] = array ('config_name' => 'pb_thorim_25', 'config_value' => 'Thorim (25)' );
		$sql_ary [] = array ('config_name' => 'pb_vezax_10', 'config_value' => 'General Vezax (10), Vezax(10)' );
		$sql_ary [] = array ('config_name' => 'pb_vezax_25', 'config_value' => 'General Vezax (25), Vezax(25)' );
		$sql_ary [] = array ('config_name' => 'pb_yoggsaron_10', 'config_value' => 'Yogg-Saron (10)' );
		$sql_ary [] = array ('config_name' => 'pb_yoggsaron_25', 'config_value' => 'Yogg-Saron (25)' );
		$sql_ary [] = array ('config_name' => 'pz_aq20', 'config_value' => 'Ruins of Ahn\'Qiraj, AQ20' );
		$sql_ary [] = array ('config_name' => 'pz_aq40', 'config_value' => 'Gates of Ahn\'Qiraj, AQ40' );
		$sql_ary [] = array ('config_name' => 'pz_bwl', 'config_value' => 'Blackwing Lair, BWL' );
		$sql_ary [] = array ('config_name' => 'pz_zg', 'config_value' => 'Zul\'Gurub, ZG' );
		$sql_ary [] = array ('config_name' => 'pz_dream', 'config_value' => 'The Emerald Dream, Dream' );
		$sql_ary [] = array ('config_name' => 'pz_naxx', 'config_value' => 'Naxxramas, Naxx' );
		$sql_ary [] = array ('config_name' => 'pz_onylair', 'config_value' => 'Onyxia\'s Lair, Onyxia' );
		$sql_ary [] = array ('config_name' => 'pz_mc', 'config_value' => 'Molten Core, MC' );
		$sql_ary [] = array ('config_name' => 'pz_misc', 'config_value' => 'Miscellaneous bosses, Misc' );
		$sql_ary [] = array ('config_name' => 'pz_kara', 'config_value' => 'Karazhan, Kara' );
		$sql_ary [] = array ('config_name' => 'pz_gruuls', 'config_value' => 'Gruul\'s Lair, GL' );
		$sql_ary [] = array ('config_name' => 'pz_za', 'config_value' => 'Zul\'Aman, ZA' );
		$sql_ary [] = array ('config_name' => 'pz_maglair', 'config_value' => 'Magtheridon\'s Lair, Magtheridon' );
		$sql_ary [] = array ('config_name' => 'pz_eye', 'config_value' => 'The Eye, Eye' );
		$sql_ary [] = array ('config_name' => 'pz_outdoor2', 'config_value' => 'Outland Outdoor Bosses, Outdoor' );
		$sql_ary [] = array ('config_name' => 'pz_hyjal', 'config_value' => 'Battle of Mount Hyjal, Hyjal' );
		$sql_ary [] = array ('config_name' => 'pz_serpent', 'config_value' => 'Serpentshrine Cavern, SC' );
		$sql_ary [] = array ('config_name' => 'pz_temple', 'config_value' => 'The Black Temple, Temple' );
		$sql_ary [] = array ('config_name' => 'pz_sunwell', 'config_value' => 'The Sunwell Plateau, Sunwell' );
		$sql_ary [] = array ('config_name' => 'pz_naxx_10', 'config_value' => 'Naxxramas (10), Naxx (10)' );
		$sql_ary [] = array ('config_name' => 'pz_naxx_25', 'config_value' => 'Naxxramas (25), Naxx (25)' );
		$sql_ary [] = array ('config_name' => 'pz_vault_of_archavon_10', 'config_value' => 'Vault of Archavon (10), VoA (10)' );
		$sql_ary [] = array ('config_name' => 'pz_vault_of_archavon_25', 'config_value' => 'Vault of Archavon (25), VoA (25)' );
		$sql_ary [] = array ('config_name' => 'pz_eye_of_eternity_10', 'config_value' => 'Eye of Eternity (10), EoE (10)' );
		$sql_ary [] = array ('config_name' => 'pz_eye_of_eternity_25', 'config_value' => 'Eye of Eternity (25), EoE (25)' );
		$sql_ary [] = array ('config_name' => 'pz_obsidian_sanctum_10', 'config_value' => 'The Obsidian Sanctum (10), OS (10)' );
		$sql_ary [] = array ('config_name' => 'pz_obsidian_sanctum_25', 'config_value' => 'The Obsidian Sanctum (25), OS (25)' );
		$sql_ary [] = array ('config_name' => 'pz_ulduar_10', 'config_value' => 'Ulduar (10)' );
		$sql_ary [] = array ('config_name' => 'pz_ulduar_25', 'config_value' => 'Ulduar (25)' );
		$sql_ary [] = array ('config_name' => 'sz_aq20', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_aq40', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_bwl', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_zg', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_dream', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_naxx', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_onylair', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_mc', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_misc', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_kara', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_gruuls', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_za', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_maglair', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_eye', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_outdoor2', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_hyjal', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_serpent', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_temple', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_sunwell', 'config_value' => '0' );
		$sql_ary [] = array ('config_name' => 'sz_naxx_10', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_naxx_25', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_vault_of_archavon_10', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_vault_of_archavon_25', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_eye_of_eternity_10', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_eye_of_eternity_25', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_obsidian_sanctum_10', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_obsidian_sanctum_25', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_ulduar_10', 'config_value' => '1' );
		$sql_ary [] = array ('config_name' => 'sz_ulduar_25', 'config_value' => '1' );
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_config', $sql_ary );
	
	}
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_offsets' ))
	{
		// Boss offsets
		unset ( $sql_ary );
		$db->sql_query ( 'TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_offsets' );
		$sql_ary = array ();
		$sql_ary [] = array ('name' => 'akama', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'alar', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'anetheron', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'anubrekhan', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'aq20', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'aq40', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'aran', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'archimonde', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'arlokk', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'attumen', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ayamiss', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'azgalor', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'azuregos', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'blaumeux', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'bloodboil', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'buru', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'bwl', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'chess', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'chromaggus', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'council', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'cthun', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'curator', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'doomkazzak', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'doomwalker', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'dream', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ebonroc', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'emeriss', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'essence', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'eye', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'faerlina', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'fankriss', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'firemaw', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'flamegor', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gahzranka', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'garr', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'geddon', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gehennas', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gluth', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'golemagg', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gorefiend', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gothik', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'grilek', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'grobbulus', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gruul', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gruuls', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'za', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'hakkar', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'hazzarah', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'heigan', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'huhuran', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'hydross', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'hyjal', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'illhoof', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'illidan', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'jeklik', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'jindo', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kaelthas', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kara', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'karathress', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kazrogal', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kazzak', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kelthuzad', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'korthazz', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kri', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kurinnaxx', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'lashlayer', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'leotheras', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'lethon', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'loatheb', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'lucifron', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'lurker', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'maexxna', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'maglair', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'magmadar', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'magtheridon', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'maiden', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'majordomo', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'malchezaar', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'mandokir', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'marli', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'maulgar', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'mc', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'misc', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'moam', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'mograine', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'moroes', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'morogrim', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'najentus', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'naxx', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'nefarian', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'netherspite', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'nightbane', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'noth', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'onylair', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'onyxia', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'opera', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ossirian', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ouro', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'outdoor2', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'patchwerk', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ragnaros', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'rajaxx', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'razorgore', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'razuvious', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'renataki', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sapphiron', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sartura', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'serpent', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'shahraz', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'shazzrah', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'skeram', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'solarian', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sulfuron', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'supremus', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'taerar', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'temple', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'thaddius', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'thekal', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'vaelastrasz', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'vashj', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'veklor', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'veknilash', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'vem', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'venoxis', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'viscidus', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'vreaver', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'winterchill', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'wushoolay', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'yauj', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ysondre', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'zeliek', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'zg', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		
		$sql_ary [] = array ('name' => 'nalorakk', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'akilzon', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'halazzi', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'janalai', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'malacrass', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'zuljin', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sunwell', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kalecgos', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'brutallus', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'felmyst', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'fetwins', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'muru', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kiljaeden', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		
		$sql_ary [] = array ('name' => 'anubrekhan_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'faerlina_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'maexxna_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'noth_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'heigan_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'loatheb_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'patchwerk_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'grobbulus_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gluth_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'thaddius_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'razuvious_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gothik_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'horsemen_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sapphiron_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kelthuzad_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		
		$sql_ary [] = array ('name' => 'anubrekhan_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'faerlina_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'maexxna_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'noth_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'heigan_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'loatheb_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'patchwerk_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'grobbulus_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gluth_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'thaddius_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'razuvious_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'gothik_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'horsemen_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sapphiron_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kelthuzad_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		
		$sql_ary [] = array ('name' => 'archavon_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'archavon_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'malygos_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'malygos_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		
		$sql_ary [] = array ('name' => 'sartharion_0d_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sartharion_1d_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sartharion_2d_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sartharion_3d_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sartharion_0d_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sartharion_1d_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sartharion_2d_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'sartharion_3d_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		
		$sql_ary [] = array ('name' => 'naxx_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'naxx_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'vault_of_archavon_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'vault_of_archavon_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'obsidian_sanctum_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'obsidian_sanctum_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'eye_of_eternity_10', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'eye_of_eternity_25', 'fdate' => '1420063200', 'ldate' => '946677600', 'counter' => '0' );
		
		$sql_ary [] = array ('name' => 'algalon_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'algalon_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'assembly_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'assembly_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'auriaya_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'auriaya_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'deconstructor_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'deconstructor_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'emalon_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'emalon_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'freya_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'freya_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'hodir_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'hodir_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ignis_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ignis_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kologarn_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'kologarn_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'leviathan_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'leviathan_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'mimiron_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'mimiron_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'razorscale_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'razorscale_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'thorim_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'thorim_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ulduar_10', 'fdate' => '1239832800', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'ulduar_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'vezax_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'vezax_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'yoggsaron_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$sql_ary [] = array ('name' => 'yoggsaron_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_offsets', $sql_ary );
	
	}
	

}

/*
 * installation of new zone and boss names for wow patch 3.2, 
 */
function update_wow2($bbdkp_table_prefix)
{
	global $db, $umil;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_config' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_offsets' )))
	{
		// check if TOTC was installed manually, otherwise install
		$sql = 'SELECT count(*) as countx FROM ' . $bbdkp_table_prefix . "bb_config WHERE config_name = 'pz_trial_of_the_grand_crusader_25'";
		$result = $db->sql_query ( $sql );
		$countx = ( int ) $db->sql_fetchfield ( 'countx' );
		if ($countx == 0)
		{
			$sql_ary = array ();
			$sql_ary [] = array ('config_name' => 'pz_trial_of_the_grand_crusader_25', 'config_value' => 'Trial of the Grand Crusader (25), ToGC (25)' );
			$sql_ary [] = array ('config_name' => 'pz_trial_of_the_grand_crusader_10', 'config_value' => 'Trial of the Grand Crusader (10), ToGC (10)' );
			$sql_ary [] = array ('config_name' => 'pz_trial_of_the_crusader_25', 'config_value' => 'Trial of the Crusader (25), ToC (25)' );
			$sql_ary [] = array ('config_name' => 'pz_trial_of_the_crusader_10', 'config_value' => 'Trial of the Crusader (10), ToC (10)' );
			
			$sql_ary [] = array ('config_name' => 'pb_northrend_beasts_25_hc', 'config_value' => 'Northrend Beasts (25)' );
			$sql_ary [] = array ('config_name' => 'pb_northrend_beasts_25', 'config_value' => 'Northrend Beasts (25)' );
			$sql_ary [] = array ('config_name' => 'pb_northrend_beasts_10_hc', 'config_value' => 'Northrend Beasts (10)' );
			$sql_ary [] = array ('config_name' => 'pb_northrend_beasts_10', 'config_value' => 'Northrend Beasts (10)' );
			
			$sql_ary [] = array ('config_name' => 'pb_faction_champions_25_hc', 'config_value' => 'Faction Champions (25)' );
			$sql_ary [] = array ('config_name' => 'pb_faction_champions_25', 'config_value' => 'Faction Champions (25)' );
			$sql_ary [] = array ('config_name' => 'pb_faction_champions_10_hc', 'config_value' => 'Faction Champions (10)' );
			$sql_ary [] = array ('config_name' => 'pb_faction_champions_10', 'config_value' => 'Faction Champions (10)' );
			
			$sql_ary [] = array ('config_name' => 'pb_lord_jaraxxus_25_hc', 'config_value' => 'Lord Jaraxxus (25)' );
			$sql_ary [] = array ('config_name' => 'pb_lord_jaraxxus_25', 'config_value' => 'Lord Jaraxxus (25)' );
			$sql_ary [] = array ('config_name' => 'pb_lord_jaraxxus_10_hc', 'config_value' => 'Lord Jaraxxus (10)' );
			$sql_ary [] = array ('config_name' => 'pb_lord_jaraxxus_10', 'config_value' => 'Lord Jaraxxus (10)' );
			
			$sql_ary [] = array ('config_name' => 'pb_twin_valkyrs_25_hc', 'config_value' => 'Twin Valkyrs (25)' );
			$sql_ary [] = array ('config_name' => 'pb_twin_valkyrs_25', 'config_value' => 'Twin Valkyrs (25)' );
			$sql_ary [] = array ('config_name' => 'pb_twin_valkyrs_10_hc', 'config_value' => 'Twin Valkyrs (10)' );
			$sql_ary [] = array ('config_name' => 'pb_twin_valkyrs_10', 'config_value' => 'Twin Valkyrs (10)' );
			
			$sql_ary [] = array ('config_name' => 'pb_anub_arak_25_hc', 'config_value' => 'Anub Arak (25)' );
			$sql_ary [] = array ('config_name' => 'pb_anub_arak_25', 'config_value' => 'Anub Arak (25)' );
			$sql_ary [] = array ('config_name' => 'pb_anub_arak_10_hc', 'config_value' => 'Anub Arak (10)' );
			$sql_ary [] = array ('config_name' => 'pb_anub_arak_10', 'config_value' => 'Anub Arak (10)' );
			
			$sql_ary [] = array ('config_name' => 'sz_trial_of_the_grand_crusader_25', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'sz_trial_of_the_grand_crusader_10', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'sz_trial_of_the_crusader_25', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'sz_trial_of_the_crusader_10', 'config_value' => '1' );
			
			$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_config', $sql_ary );
			unset ( $sql_ary );
			
			// new boss offsets
			$sql_ary = array ();
			$sql_ary [] = array ('name' => 'trial_of_the_grand_crusader_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'trial_of_the_grand_crusader_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'trial_of_the_crusader_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'trial_of_the_crusader_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'northrend_beasts_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'northrend_beasts_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'northrend_beasts_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'northrend_beasts_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'faction_champions_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'faction_champions_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'faction_champions_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'faction_champions_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lord_jaraxxus_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lord_jaraxxus_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lord_jaraxxus_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lord_jaraxxus_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'twin_valkyrs_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'twin_valkyrs_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'twin_valkyrs_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'twin_valkyrs_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'anub_arak_25_hc', 'fdate' => '1239832800', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'anub_arak_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'anub_arak_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'anub_arak_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			
			$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_offsets', $sql_ary );
			unset ( $sql_ary );
		}
	
	}

}

/*
 * installation of new zone and boss names for wow patch 3.2.2, Onyxia 
 */
function update_wow3($bbdkp_table_prefix)
{
	global $db, $umil;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_config' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_offsets' )))
	{
		// check if Onyxia was installed manually, otherwise install
		$sql = 'SELECT count(*) as countx FROM ' . $bbdkp_table_prefix . "bb_config WHERE config_name = 'pz_onylair_25'";
		$result = $db->sql_query ( $sql );
		$countx = ( int ) $db->sql_fetchfield ( 'countx' );
		if ($countx == 0)
		{
			$sql_ary = array ();
			$sql_ary [] = array ('config_name' => 'pz_onylair_25', 'config_value' => 'Onyxia\'s Lair (25), Onyxia (25)' );
			$sql_ary [] = array ('config_name' => 'pz_onylair_10', 'config_value' => 'Onyxia\'s Lair (10), Onyxia (10)' );
			$sql_ary [] = array ('config_name' => 'sz_onylair_25', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'sz_onylair_10', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'pb_onyxia_25', 'config_value' => 'Onyxia (25)' );
			$sql_ary [] = array ('config_name' => 'pb_onyxia_10', 'config_value' => 'Onyxia (10)' );
			
			$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_config', $sql_ary );
			unset ( $sql_ary );
			
			// new boss offsets
			$sql_ary = array ();
			$sql_ary [] = array ('name' => 'onylair_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'onylair_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'onyxia_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'onyxia_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			
			$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_offsets', $sql_ary );
			unset ( $sql_ary );
		}
	
	}

}

/*
 * installation of zone and boss names for wow patch 3.3
 * 
 * thanks to Bmagic
 * 
 */
function update_wow4($bbdkp_table_prefix)
{
	global $db, $umil;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_config' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_offsets' )))
	{
		// check if installed manually, otherwise install
		$sql = 'SELECT count(*) as countx FROM ' . $bbdkp_table_prefix . "bb_config WHERE config_name = 'pz_icecrown_citadel_10'";
		$result = $db->sql_query ( $sql );
		$countx = ( int ) $db->sql_fetchfield ( 'countx' );
		if ($countx == 0)
		{
			$sql_ary = array ();
			$sql_ary [] = array ('config_name' => 'sz_icecrown_citadel_10', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'sz_icecrown_citadel_25', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'pz_icecrown_citadel_10', 'config_value' => 'Icecrown Citadel (10), ICC (10)' );
			$sql_ary [] = array ('config_name' => 'pz_icecrown_citadel_25', 'config_value' => 'Icecrown Citadel (25), ICC (25)' );
			$sql_ary [] = array ('config_name' => 'pb_lord_marrowgar_10', 'config_value' => 'Lord Marrowgar (10)' );
			$sql_ary [] = array ('config_name' => 'pb_lord_marrowgar_10_hc', 'config_value' => 'Lord Marrowgar (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_lord_marrowgar_25', 'config_value' => 'Lord Marrowgar (25)' );
			$sql_ary [] = array ('config_name' => 'pb_lord_marrowgar_25_hc', 'config_value' => 'Lord Marrowgar (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_lady_deathwhisper_10', 'config_value' => 'Lady Deathwhisper (10)' );
			$sql_ary [] = array ('config_name' => 'pb_lady_deathwhisper_10_hc', 'config_value' => 'Lady Deathwhisper (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_lady_deathwhisper_25', 'config_value' => 'Lady Deathwhisper (25)' );
			$sql_ary [] = array ('config_name' => 'pb_lady_deathwhisper_25_hc', 'config_value' => 'Lady Deathwhisper (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_icecrown_gunship_battle_10', 'config_value' => 'Icecrown Gunship Battle (10)' );
			$sql_ary [] = array ('config_name' => 'pb_icecrown_gunship_battle_10_hc', 'config_value' => 'Icecrown Gunship Battle (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_icecrown_gunship_battle_25', 'config_value' => 'Icecrown Gunship Battle (25)' );
			$sql_ary [] = array ('config_name' => 'pb_icecrown_gunship_battle_25_hc', 'config_value' => 'Icecrown Gunship Battle (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_deathbringer_saurfang_10', 'config_value' => 'Deathbringer Saurfang (10)' );
			$sql_ary [] = array ('config_name' => 'pb_deathbringer_saurfang_10_hc', 'config_value' => 'Deathbringer Saurfang (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_deathbringer_saurfang_25', 'config_value' => 'Deathbringer Saurfang (25)' );
			$sql_ary [] = array ('config_name' => 'pb_deathbringer_saurfang_25_hc', 'config_value' => 'Deathbringer Saurfang (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_festergut_10', 'config_value' => 'Festergut (10)' );
			$sql_ary [] = array ('config_name' => 'pb_festergut_10_hc', 'config_value' => 'Festergut (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_festergut_25', 'config_value' => 'Festergut (25)' );
			$sql_ary [] = array ('config_name' => 'pb_festergut_25_hc', 'config_value' => 'Festergut (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_rotface_10', 'config_value' => 'Rotface (10)' );
			$sql_ary [] = array ('config_name' => 'pb_rotface_10_hc', 'config_value' => 'Rotface (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_rotface_25', 'config_value' => 'Rotface (25)' );
			$sql_ary [] = array ('config_name' => 'pb_rotface_25_hc', 'config_value' => 'Rotface (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_professor_putricide_10', 'config_value' => 'Professor Putricide (10)' );
			$sql_ary [] = array ('config_name' => 'pb_professor_putricide_10_hc', 'config_value' => 'Professor Putricide (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_professor_putricide_25', 'config_value' => 'Professor Putricide (25)' );
			$sql_ary [] = array ('config_name' => 'pb_professor_putricide_25_hc', 'config_value' => 'Professor Putricide (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_blood_princes_10', 'config_value' => 'Blood Princes (10)' );
			$sql_ary [] = array ('config_name' => 'pb_blood_princes_10_hc', 'config_value' => 'Blood Princes (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_blood_princes_25', 'config_value' => 'Blood Princes (25)' );
			$sql_ary [] = array ('config_name' => 'pb_blood_princes_25_hc', 'config_value' => 'Blood Princes (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_blood_queen_lana_thel_10', 'config_value' => 'Blood-Queen Lana thel (10)' );
			$sql_ary [] = array ('config_name' => 'pb_blood_queen_lana_thel_10_hc', 'config_value' => 'Blood-Queen Lana thel (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_blood_queen_lana_thel_25', 'config_value' => 'Blood-Queen Lana thel (25)' );
			$sql_ary [] = array ('config_name' => 'pb_blood_queen_lana_thel_25_hc', 'config_value' => 'Blood-Queen Lana thel (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_valithria_dreamwalker_10', 'config_value' => 'Valithria Dreamwalker (10)' );
			$sql_ary [] = array ('config_name' => 'pb_valithria_dreamwalker_10_hc', 'config_value' => 'Valithria Dreamwalker (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_valithria_dreamwalker_25', 'config_value' => 'Valithria Dreamwalker (25)' );
			$sql_ary [] = array ('config_name' => 'pb_valithria_dreamwalker_25_hc', 'config_value' => 'Valithria Dreamwalker (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_sindragosa_10', 'config_value' => 'Sindragosa (10)' );
			$sql_ary [] = array ('config_name' => 'pb_sindragosa_10_hc', 'config_value' => 'Sindragosa (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_sindragosa_25', 'config_value' => 'Sindragosa (25)' );
			$sql_ary [] = array ('config_name' => 'pb_sindragosa_25_hc', 'config_value' => 'Sindragosa (25HM)' );
			$sql_ary [] = array ('config_name' => 'pb_the_lich_king_10', 'config_value' => 'The Lich King (10)' );
			$sql_ary [] = array ('config_name' => 'pb_the_lich_king_10_hc', 'config_value' => 'The Lich King (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_the_lich_king_25', 'config_value' => 'The Lich King (25)' );
			$sql_ary [] = array ('config_name' => 'pb_the_lich_king_25_hc', 'config_value' => 'The Lich King (25HM)' );
			$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_config', $sql_ary );
			
			unset ( $sql_ary );
			
			// new boss offsets
			$sql_ary = array ();
			$sql_ary [] = array ('name' => 'icecrown_citadel_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'icecrown_citadel_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lord_marrowgar_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lord_marrowgar_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lord_marrowgar_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lord_marrowgar_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lady_deathwhisper_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lady_deathwhisper_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lady_deathwhisper_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'lady_deathwhisper_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'icecrown_gunship_battle_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'icecrown_gunship_battle_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'icecrown_gunship_battle_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'icecrown_gunship_battle_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'deathbringer_saurfang_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'deathbringer_saurfang_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'deathbringer_saurfang_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'deathbringer_saurfang_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'festergut_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'festergut_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'festergut_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'festergut_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'rotface_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'rotface_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'rotface_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'rotface_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'professor_putricide_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'professor_putricide_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'professor_putricide_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'professor_putricide_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'blood_princes_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'blood_princes_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'blood_princes_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'blood_princes_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'blood_queen_lana_thel_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'blood_queen_lana_thel_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'blood_queen_lana_thel_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'blood_queen_lana_thel_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'valithria_dreamwalker_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'valithria_dreamwalker_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'valithria_dreamwalker_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'valithria_dreamwalker_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'sindragosa_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'sindragosa_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'sindragosa_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'sindragosa_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'the_lich_king_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'the_lich_king_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'the_lich_king_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'the_lich_king_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			
			$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_offsets', $sql_ary );
			unset ( $sql_ary );
		}
	
	}

}

/*
 * switch from old eqdkp class id to blizzard armory class id 
 * 
 * old
 * 1 warrior
 * 2 rogue 
 * 3 hunter
 * 4 paladin
 * 5 shaman
 * 6 druid
 * 7 warlock
 * 8 mage
 * 9 priest
 * 10 death knight
 * 
 * new 
 * 1 warrior
 * 2 paladin
 * 3 hunter
 * 4 Rogue
 * 5 Priest
 * 6 Death knight
 * 7 Shaman
 * 8 Mage
 * 9 Warlock
 * 10 
 * 11 Druid
 * 
 * switch sequence : switch 2 with 4, 5 & 6 & 7 move to 7 & 11 & 9, 9 & 10 move to 5 & 6
 * 4 -> 99 
 * 2 > 4
 * 99 -> 2
 * 5 -> 99
 * 9 -> 5
 * 6 -> 11
 * 10 -> 6
 * 7 -> 9
 * 99 -> 7
 * 
 */
function upd110_classid($bbdkp_table_prefix)
{
	global $db;
	
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 99 where class_id = 4" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 4 where class_id = 2" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 2 where class_id = 99" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 99 where class_id = 5" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 5 where class_id = 9" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 11 where class_id = 6" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 6 where class_id = 10" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 9 where class_id = 7" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "classes set class_id = 7 where class_id = 99" );
	
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 99 where member_class_id = 4" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 4 where member_class_id = 2" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 2 where member_class_id = 99" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 99 where member_class_id = 5" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 5 where member_class_id = 9" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 11 where member_class_id = 6" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 6 where member_class_id = 10" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 9 where member_class_id = 7" );
	$db->sql_query ( "update " . $bbdkp_table_prefix . "memberlist set member_class_id = 7 where member_class_id = 99" );

}

/*
 * installation of zone and boss names for wow patch 3.3.5 
 * The Ruby Sanctum
 * 
  * 
 */
function update_wow5($bbdkp_table_prefix)
{
	global $db, $table_prefix, $umil, $user;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_config' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_offsets' )))
	{
		// check if installed manually, otherwise install
		$sql = 'SELECT count(*) as countx FROM ' . $bbdkp_table_prefix . "bb_config WHERE config_name = 'pz_rs_10'";
		$result = $db->sql_query ( $sql );
		$countx = ( int ) $db->sql_fetchfield ( 'countx' );
		if ($countx == 0)
		{
			$sql_ary = array ();
			$sql_ary [] = array ('config_name' => 'sz_rs_10', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'sz_rs_25', 'config_value' => '1' );
			$sql_ary [] = array ('config_name' => 'pz_rs_10', 'config_value' => 'The Ruby Sanctum (10), RS (10)' );
			$sql_ary [] = array ('config_name' => 'pz_rs_25', 'config_value' => 'The Ruby Sanctum (25), RS (25)' );
			$sql_ary [] = array ('config_name' => 'pb_halion_10', 'config_value' => 'Halion (10)' );
			$sql_ary [] = array ('config_name' => 'pb_halion_10_hc', 'config_value' => 'Halion (10HM)' );
			$sql_ary [] = array ('config_name' => 'pb_halion_25', 'config_value' => 'Halion (25)' );
			$sql_ary [] = array ('config_name' => 'pb_halion_25_hc', 'config_value' => 'Halion (25HM)' );
			$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_config', $sql_ary );
			
			unset ( $sql_ary );
			
			// new boss offsets
			$sql_ary = array ();
			$sql_ary [] = array ('name' => 'rs_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'rs_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'halion_10', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'halion_10_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'halion_25', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$sql_ary [] = array ('name' => 'halion_25_hc', 'fdate' => '1419980400', 'ldate' => '946594800', 'counter' => '0' );
			$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_offsets', $sql_ary );
			unset ( $sql_ary );
		}
	
	}

}

/*
 * release 1.1.2
 * new boss progress data for WoW
 * generated with the spreadsheet
 * 
 */
function update_wow_bb2($bbdkp_table_prefix)
{
	global $db, $umil;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_zonetable' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_bosstable' )))
	{
		$sql_ary = array ();

		$sql_ary[] = array( 'id' => 1 , 'imagename' =>  'misc' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 2 , 'imagename' =>  'onylair' , 'game' =>  'wow' ,  'tier' =>  'T2' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 3 , 'imagename' =>  'dream' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 4 , 'imagename' =>  'zg' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '1977' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 5 , 'imagename' =>  'bwl' , 'game' =>  'wow' ,  'tier' =>  'T3' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '2677' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 6 , 'imagename' =>  'mc' , 'game' =>  'wow' ,  'tier' =>  'T1' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '2717' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 7 , 'imagename' =>  'aq20' , 'game' =>  'wow' ,  'tier' =>  'T2.5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3429' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 8 , 'imagename' =>  'aq40' , 'game' =>  'wow' ,  'tier' =>  'T2.5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3428' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 9 , 'imagename' =>  'naxx' , 'game' =>  'wow' ,  'tier' =>  'T3' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 10 , 'imagename' =>  'kara' , 'game' =>  'wow' ,  'tier' =>  'T4' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3457' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 11 , 'imagename' =>  'za' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3805' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 12 , 'imagename' =>  'gruuls' , 'game' =>  'wow' ,  'tier' =>  'T4' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3923' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 13 , 'imagename' =>  'maglair' , 'game' =>  'wow' ,  'tier' =>  'T4' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3836' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 14 , 'imagename' =>  'outdoor2' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 15 , 'imagename' =>  'serpent' , 'game' =>  'wow' ,  'tier' =>  'T5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3607' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 16 , 'imagename' =>  'eye' , 'game' =>  'wow' ,  'tier' =>  'T5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3845' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 17 , 'imagename' =>  'hyjal' , 'game' =>  'wow' ,  'tier' =>  'T6' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3606' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 18 , 'imagename' =>  'temple' , 'game' =>  'wow' ,  'tier' =>  'T6' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3959' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 19 , 'imagename' =>  'sunwell' , 'game' =>  'wow' ,  'tier' =>  'T6.5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4075' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 20 , 'imagename' =>  'naxx_10' , 'game' =>  'wow' ,  'tier' =>  'T7' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3456' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 21 , 'imagename' =>  'naxx_25' , 'game' =>  'wow' ,  'tier' =>  'T7.5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '3456' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 22 , 'imagename' =>  'vault_of_archavon_10' , 'game' =>  'wow' ,  'tier' =>  'T8' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4603' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 23 , 'imagename' =>  'vault_of_archavon_25' , 'game' =>  'wow' ,  'tier' =>  'T8' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4603' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 24 , 'imagename' =>  'obsidian_sanctum_10' , 'game' =>  'wow' ,  'tier' =>  'T7' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4493' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 25 , 'imagename' =>  'obsidian_sanctum_25' , 'game' =>  'wow' ,  'tier' =>  'T7.5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4493' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 26 , 'imagename' =>  'eye_of_eternity_10' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4500' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 27 , 'imagename' =>  'eye_of_eternity_25' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4500' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 28 , 'imagename' =>  'ulduar_10' , 'game' =>  'wow' ,  'tier' =>  'T8' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4273' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 29 , 'imagename' =>  'ulduar_25' , 'game' =>  'wow' ,  'tier' =>  'T8.5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4273' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 30 , 'imagename' =>  'trial_of_the_crusader_10' , 'game' =>  'wow' ,  'tier' =>  'T9.1' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4722' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 31 , 'imagename' =>  'trial_of_the_crusader_25' , 'game' =>  'wow' ,  'tier' =>  'T9.2' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4722' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 32 , 'imagename' =>  'trial_of_the_grand_crusader_10' , 'game' =>  'wow' ,  'tier' =>  'T9.2' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4722' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 33 , 'imagename' =>  'trial_of_the_grand_crusader_25' , 'game' =>  'wow' ,  'tier' =>  'T9.3' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4722' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 34 , 'imagename' =>  'onylair_10' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '2159' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 35 , 'imagename' =>  'onylair_25' , 'game' =>  'wow' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '2159' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 37 , 'imagename' =>  'icecrown_citadel_25' , 'game' =>  'wow' ,  'tier' =>  'T10.5' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4812' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 36 , 'imagename' =>  'icecrown_citadel_10' , 'game' =>  'wow' ,  'tier' =>  'T10' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4812' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 38 , 'imagename' =>  'rs_10' , 'game' =>  'wow' ,  'tier' =>  'T10' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4987' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 39 , 'imagename' =>  'rs_25' , 'game' =>  'wow' ,  'tier' =>  'T10' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '4987' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	
	
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_zonetable', $sql_ary );
		unset ( $sql_ary );
		
		$sql_ary[] = array('id' => 1 ,  'imagename' =>  'azuregos' , 'game' =>  'wow' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '6109' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 2 ,  'imagename' =>  'kazzak' , 'game' =>  'wow' , 'zoneid' =>  1 , 'type' =>  'npc'  , 'webid' =>  '12397' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 3 ,  'imagename' =>  'onyxia' , 'game' =>  'wow' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '10184' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 4 ,  'imagename' =>  'ysondre' , 'game' =>  'wow' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '14887' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 5 ,  'imagename' =>  'taerar' , 'game' =>  'wow' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '14890' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 6 ,  'imagename' =>  'emeriss' , 'game' =>  'wow' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '14889' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 7 ,  'imagename' =>  'lethon' , 'game' =>  'wow' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '14888' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 8 ,  'imagename' =>  'mandokir' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '11382' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 9 ,  'imagename' =>  'jindo' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '11380' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 10 ,  'imagename' =>  'gahzranka' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '15114' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 11 ,  'imagename' =>  'grilek' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '15082' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 12 ,  'imagename' =>  'hazzarah' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '15083' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 13 ,  'imagename' =>  'renataki' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '15084' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 14 ,  'imagename' =>  'wushoolay' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '15085' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 15 ,  'imagename' =>  'thekal' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '14509' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 16 ,  'imagename' =>  'arlokk' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '14515' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 17 ,  'imagename' =>  'jeklik' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '14517' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 18 ,  'imagename' =>  'marli' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '14510' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 19 ,  'imagename' =>  'venoxis' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '14507' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 20 ,  'imagename' =>  'hakkar' , 'game' =>  'wow' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '14834' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 21 ,  'imagename' =>  'razorgore' , 'game' =>  'wow' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '12435' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 22 ,  'imagename' =>  'vaelastrasz' , 'game' =>  'wow' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '13020' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 23 ,  'imagename' =>  'lashlayer' , 'game' =>  'wow' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '12017' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 24 ,  'imagename' =>  'firemaw' , 'game' =>  'wow' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '11981' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 25 ,  'imagename' =>  'ebonroc' , 'game' =>  'wow' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '14601' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 26 ,  'imagename' =>  'flamegor' , 'game' =>  'wow' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '11983' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 27 ,  'imagename' =>  'chromaggus' , 'game' =>  'wow' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '14020' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 28 ,  'imagename' =>  'nefarian' , 'game' =>  'wow' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '11583' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 29 ,  'imagename' =>  'lucifron' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '12118' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 30 ,  'imagename' =>  'magmadar' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '11982' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 31 ,  'imagename' =>  'gehennas' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '12259' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 32 ,  'imagename' =>  'garr' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '12057' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 33 ,  'imagename' =>  'geddon' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '12056' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 34 ,  'imagename' =>  'shazzrah' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '12264' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 35 ,  'imagename' =>  'sulfuron' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '12098' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 36 ,  'imagename' =>  'golemagg' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '11988' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 37 ,  'imagename' =>  'majordomo' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '12018' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 38 ,  'imagename' =>  'ragnaros' , 'game' =>  'wow' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '11502' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 39 ,  'imagename' =>  'kurinnaxx' , 'game' =>  'wow' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '15348' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 40 ,  'imagename' =>  'rajaxx' , 'game' =>  'wow' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '15341' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 41 ,  'imagename' =>  'ayamiss' , 'game' =>  'wow' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '15369' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 42 ,  'imagename' =>  'buru' , 'game' =>  'wow' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '15370' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 43 ,  'imagename' =>  'moam' , 'game' =>  'wow' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '15340' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 44 ,  'imagename' =>  'ossirian' , 'game' =>  'wow' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '15339' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 45 ,  'imagename' =>  'skeram' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15263' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 46 ,  'imagename' =>  'kri' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15511' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 47 ,  'imagename' =>  'yauj' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15543' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 48 ,  'imagename' =>  'vem' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15544' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 49 ,  'imagename' =>  'sartura' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15516' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 50 ,  'imagename' =>  'fankriss' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15510' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 51 ,  'imagename' =>  'huhuran' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15509' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 52 ,  'imagename' =>  'viscidus' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15299' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 53 ,  'imagename' =>  'veknilash' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15275' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 54 ,  'imagename' =>  'veklor' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15276' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 55 ,  'imagename' =>  'ouro' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15517' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 56 ,  'imagename' =>  'cthun' , 'game' =>  'wow' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '15727' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 57 ,  'imagename' =>  'anubrekhan' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15956' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 58 ,  'imagename' =>  'faerlina' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15953' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 59 ,  'imagename' =>  'maexxna' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15952' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 60 ,  'imagename' =>  'noth' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15954' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 61 ,  'imagename' =>  'heigan' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15936' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 62 ,  'imagename' =>  'loatheb' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '16011' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 63 ,  'imagename' =>  'patchwerk' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '16028' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 64 ,  'imagename' =>  'grobbulus' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15931' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 65 ,  'imagename' =>  'gluth' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15932' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 66 ,  'imagename' =>  'thaddius' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15928' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 67 ,  'imagename' =>  'razuvious' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '16061' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 68 ,  'imagename' =>  'gothik' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '16060' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 69 ,  'imagename' =>  'korthazz' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '16064' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 70 ,  'imagename' =>  'blaumeux' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '16065' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 71 ,  'imagename' =>  'mograine' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '16062' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 72 ,  'imagename' =>  'zeliek' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '16063' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 73 ,  'imagename' =>  'sapphiron' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15989' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 74 ,  'imagename' =>  'kelthuzad' , 'game' =>  'wow' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '15990' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 75 ,  'imagename' =>  'attumen' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '16152' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 76 ,  'imagename' =>  'moroes' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '15687' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 77 ,  'imagename' =>  'maiden' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '16457' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 78 ,  'imagename' =>  'opera' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '16812' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 79 ,  'imagename' =>  'curator' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '15691' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 80 ,  'imagename' =>  'illhoof' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '15688' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 81 ,  'imagename' =>  'aran' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '16524' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 82 ,  'imagename' =>  'chess' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '17651' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 83 ,  'imagename' =>  'netherspite' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '15689' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 84 ,  'imagename' =>  'malchezaar' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '15690' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 85 ,  'imagename' =>  'nightbane' , 'game' =>  'wow' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '17225' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 86 ,  'imagename' =>  'nalorakk' , 'game' =>  'wow' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '23576' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 87 ,  'imagename' =>  'akilzon' , 'game' =>  'wow' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '23574' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 88 ,  'imagename' =>  'halazzi' , 'game' =>  'wow' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '23577' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 89 ,  'imagename' =>  'janalai' , 'game' =>  'wow' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '23578' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 90 ,  'imagename' =>  'malacrass' , 'game' =>  'wow' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '24364' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 91 ,  'imagename' =>  'zuljin' , 'game' =>  'wow' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '23863' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 92 ,  'imagename' =>  'maulgar' , 'game' =>  'wow' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '18831' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 93 ,  'imagename' =>  'gruul' , 'game' =>  'wow' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '19044' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 94 ,  'imagename' =>  'magtheridon' , 'game' =>  'wow' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '21174' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 95 ,  'imagename' =>  'doomkazzak' , 'game' =>  'wow' , 'zoneid' =>  14 , 'type' =>  'npc'  , 'webid' =>  '18728' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 96 ,  'imagename' =>  'doomwalker' , 'game' =>  'wow' , 'zoneid' =>  14 , 'type' =>  'npc'  , 'webid' =>  '17711' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 97 ,  'imagename' =>  'hydross' , 'game' =>  'wow' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '21932' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 98 ,  'imagename' =>  'karathress' , 'game' =>  'wow' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '21214' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 99 ,  'imagename' =>  'morogrim' , 'game' =>  'wow' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '21213' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 100 ,  'imagename' =>  'leotheras' , 'game' =>  'wow' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '21215' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 101 ,  'imagename' =>  'lurker' , 'game' =>  'wow' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '21217' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 102 ,  'imagename' =>  'vashj' , 'game' =>  'wow' , 'zoneid' =>  15 , 'type' =>  'npc'  , 'webid' =>  '21212' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 103 ,  'imagename' =>  'alar' , 'game' =>  'wow' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  '19514' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 104 ,  'imagename' =>  'vreaver' , 'game' =>  'wow' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  '19516' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 105 ,  'imagename' =>  'solarian' , 'game' =>  'wow' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  '18805' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 106 ,  'imagename' =>  'kaelthas' , 'game' =>  'wow' , 'zoneid' =>  16 , 'type' =>  'npc'  , 'webid' =>  '19622' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 107 ,  'imagename' =>  'winterchill' , 'game' =>  'wow' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  '17767' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 108 ,  'imagename' =>  'anetheron' , 'game' =>  'wow' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  '17808' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 109 ,  'imagename' =>  'kazrogal' , 'game' =>  'wow' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  '17888' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 110 ,  'imagename' =>  'azgalor' , 'game' =>  'wow' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  '17842' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 111 ,  'imagename' =>  'archimonde' , 'game' =>  'wow' , 'zoneid' =>  17 , 'type' =>  'npc'  , 'webid' =>  '17968' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 112 ,  'imagename' =>  'najentus' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '22887' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 113 ,  'imagename' =>  'supremus' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '22898' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 114 ,  'imagename' =>  'akama' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '22841' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 115 ,  'imagename' =>  'gorefiend' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '22871' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 116 ,  'imagename' =>  'essence' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '23418' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 117 ,  'imagename' =>  'bloodboil' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '22948' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 118 ,  'imagename' =>  'shahraz' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '22947' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 119 ,  'imagename' =>  'council' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '23426' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 120 ,  'imagename' =>  'illidan' , 'game' =>  'wow' , 'zoneid' =>  18 , 'type' =>  'npc'  , 'webid' =>  '22917' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 121 ,  'imagename' =>  'kalecgos' , 'game' =>  'wow' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  '24850' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 122 ,  'imagename' =>  'brutallus' , 'game' =>  'wow' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  '24882' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 123 ,  'imagename' =>  'felmyst' , 'game' =>  'wow' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  '25038' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 124 ,  'imagename' =>  'fetwins' , 'game' =>  'wow' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  '25166' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 125 ,  'imagename' =>  'muru' , 'game' =>  'wow' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  '25741' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 126 ,  'imagename' =>  'kiljaeden' , 'game' =>  'wow' , 'zoneid' =>  19 , 'type' =>  'npc'  , 'webid' =>  '25315' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 127 ,  'imagename' =>  'anubrekhan_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15956' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 128 ,  'imagename' =>  'faerlina_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15953' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 129 ,  'imagename' =>  'maexxna_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15952' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 130 ,  'imagename' =>  'noth_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15954' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 131 ,  'imagename' =>  'heigan_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15936' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 132 ,  'imagename' =>  'loatheb_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '16011' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 133 ,  'imagename' =>  'patchwerk_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '16028' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 134 ,  'imagename' =>  'grobbulus_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15931' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 135 ,  'imagename' =>  'gluth_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15932' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 136 ,  'imagename' =>  'thaddius_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15928' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 137 ,  'imagename' =>  'razuvious_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '16061' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 138 ,  'imagename' =>  'gothik_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '16060' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 139 ,  'imagename' =>  'horsemen_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '16064' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 140 ,  'imagename' =>  'sapphiron_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15989' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 141 ,  'imagename' =>  'kelthuzad_10' , 'game' =>  'wow' , 'zoneid' =>  20 , 'type' =>  'npc'  , 'webid' =>  '15990' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 142 ,  'imagename' =>  'anubrekhan_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15956' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 143 ,  'imagename' =>  'faerlina_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15953' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 144 ,  'imagename' =>  'maexxna_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15952' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 145 ,  'imagename' =>  'noth_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15954' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 146 ,  'imagename' =>  'heigan_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15936' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 147 ,  'imagename' =>  'loatheb_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '16011' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 148 ,  'imagename' =>  'patchwerk_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '16028' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 149 ,  'imagename' =>  'grobbulus_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15931' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 150 ,  'imagename' =>  'gluth_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15932' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 151 ,  'imagename' =>  'thaddius_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15928' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 152 ,  'imagename' =>  'razuvious_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '16061' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 153 ,  'imagename' =>  'gothik_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '16060' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 154 ,  'imagename' =>  'horsemen_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '16064' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 155 ,  'imagename' =>  'sapphiron_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15989' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 156 ,  'imagename' =>  'kelthuzad_25' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '15990' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 157 ,  'imagename' =>  'malygos_10' , 'game' =>  'wow' , 'zoneid' =>  21 , 'type' =>  'npc'  , 'webid' =>  '28859' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 158 ,  'imagename' =>  'archavon_10' , 'game' =>  'wow' , 'zoneid' =>  22 , 'type' =>  'npc'  , 'webid' =>  '31125' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 159 ,  'imagename' =>  'emalon_10' , 'game' =>  'wow' , 'zoneid' =>  22 , 'type' =>  'npc'  , 'webid' =>  '33993' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 160 ,  'imagename' =>  'archavon_25' , 'game' =>  'wow' , 'zoneid' =>  23 , 'type' =>  'npc'  , 'webid' =>  '31125' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 161 ,  'imagename' =>  'emalon_25' , 'game' =>  'wow' , 'zoneid' =>  23 , 'type' =>  'npc'  , 'webid' =>  '33993' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 162 ,  'imagename' =>  'sartharion_0d_10' , 'game' =>  'wow' , 'zoneid' =>  24 , 'type' =>  'npc'  , 'webid' =>  '28860' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 163 ,  'imagename' =>  'sartharion_1d_10' , 'game' =>  'wow' , 'zoneid' =>  24 , 'type' =>  'npc'  , 'webid' =>  '28860' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 164 ,  'imagename' =>  'sartharion_2d_10' , 'game' =>  'wow' , 'zoneid' =>  24 , 'type' =>  'npc'  , 'webid' =>  '28860' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 165 ,  'imagename' =>  'sartharion_3d_10' , 'game' =>  'wow' , 'zoneid' =>  24 , 'type' =>  'npc'  , 'webid' =>  '28860' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 166 ,  'imagename' =>  'sartharion_0d_25' , 'game' =>  'wow' , 'zoneid' =>  25 , 'type' =>  'npc'  , 'webid' =>  '28860' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 167 ,  'imagename' =>  'sartharion_1d_25' , 'game' =>  'wow' , 'zoneid' =>  25 , 'type' =>  'npc'  , 'webid' =>  '28860' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 168 ,  'imagename' =>  'sartharion_2d_25' , 'game' =>  'wow' , 'zoneid' =>  25 , 'type' =>  'npc'  , 'webid' =>  '28860' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 169 ,  'imagename' =>  'sartharion_3d_25' , 'game' =>  'wow' , 'zoneid' =>  25 , 'type' =>  'npc'  , 'webid' =>  '28860' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 170 ,  'imagename' =>  'malygos_25' , 'game' =>  'wow' , 'zoneid' =>  27 , 'type' =>  'npc'  , 'webid' =>  '28859' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 171 ,  'imagename' =>  'leviathan_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33113' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 172 ,  'imagename' =>  'razorscale_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33186' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 173 ,  'imagename' =>  'deconstructor_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33293' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 174 ,  'imagename' =>  'ignis_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33118' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 175 ,  'imagename' =>  'assembly_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '32867' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 176 ,  'imagename' =>  'kologarn_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '32930' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 177 ,  'imagename' =>  'auriaya_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33515' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 178 ,  'imagename' =>  'mimiron_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '32867' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 179 ,  'imagename' =>  'hodir_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33213' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 180 ,  'imagename' =>  'thorim_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33413' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 181 ,  'imagename' =>  'freya_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33410' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 182 ,  'imagename' =>  'vezax_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33271' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 183 ,  'imagename' =>  'yoggsaron_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '33288' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 184 ,  'imagename' =>  'algalon_10' , 'game' =>  'wow' , 'zoneid' =>  28 , 'type' =>  'npc'  , 'webid' =>  '32867' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 185 ,  'imagename' =>  'leviathan_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33113' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 186 ,  'imagename' =>  'razorscale_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33186' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 187 ,  'imagename' =>  'deconstructor_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33293' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 188 ,  'imagename' =>  'ignis_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33118' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 189 ,  'imagename' =>  'assembly_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '32867' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 190 ,  'imagename' =>  'kologarn_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '32930' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 191 ,  'imagename' =>  'auriaya_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33515' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 192 ,  'imagename' =>  'mimiron_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '32867' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 193 ,  'imagename' =>  'hodir_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33213' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 194 ,  'imagename' =>  'thorim_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33413' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 195 ,  'imagename' =>  'freya_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33410' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 196 ,  'imagename' =>  'vezax_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33271' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 197 ,  'imagename' =>  'yoggsaron_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '33288' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 198 ,  'imagename' =>  'algalon_25' , 'game' =>  'wow' , 'zoneid' =>  29 , 'type' =>  'npc'  , 'webid' =>  '32867' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 199 ,  'imagename' =>  'northrend_beasts_10' , 'game' =>  'wow' , 'zoneid' =>  30 , 'type' =>  'npc'  , 'webid' =>  '35470' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 200 ,  'imagename' =>  'faction_champions_10' , 'game' =>  'wow' , 'zoneid' =>  30 , 'type' =>  'object'  , 'webid' =>  '195631' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 201 ,  'imagename' =>  'lord_jaraxxus_10' , 'game' =>  'wow' , 'zoneid' =>  30 , 'type' =>  'npc'  , 'webid' =>  '34780' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 202 ,  'imagename' =>  'twin_valkyrs_10' , 'game' =>  'wow' , 'zoneid' =>  30 , 'type' =>  'npc'  , 'webid' =>  '34497' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 203 ,  'imagename' =>  'anub_arak_10' , 'game' =>  'wow' , 'zoneid' =>  30 , 'type' =>  'npc'  , 'webid' =>  '34564' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 204 ,  'imagename' =>  'northrend_beasts_25' , 'game' =>  'wow' , 'zoneid' =>  31 , 'type' =>  'npc'  , 'webid' =>  '35470' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 205 ,  'imagename' =>  'faction_champions_25' , 'game' =>  'wow' , 'zoneid' =>  31 , 'type' =>  'object'  , 'webid' =>  '195631' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 206 ,  'imagename' =>  'lord_jaraxxus_25' , 'game' =>  'wow' , 'zoneid' =>  31 , 'type' =>  'npc'  , 'webid' =>  '34780' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 207 ,  'imagename' =>  'twin_valkyrs_25' , 'game' =>  'wow' , 'zoneid' =>  31 , 'type' =>  'npc'  , 'webid' =>  '34497' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 208 ,  'imagename' =>  'anub_arak_25' , 'game' =>  'wow' , 'zoneid' =>  31 , 'type' =>  'npc'  , 'webid' =>  '34564' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 209 ,  'imagename' =>  'northrend_beasts_10_hc' , 'game' =>  'wow' , 'zoneid' =>  32 , 'type' =>  'npc'  , 'webid' =>  '35470' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 210 ,  'imagename' =>  'faction_champions_10_hc' , 'game' =>  'wow' , 'zoneid' =>  32 , 'type' =>  'object'  , 'webid' =>  '195631' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 211 ,  'imagename' =>  'lord_jaraxxus_10_hc' , 'game' =>  'wow' , 'zoneid' =>  32 , 'type' =>  'npc'  , 'webid' =>  '34780' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 212 ,  'imagename' =>  'twin_valkyrs_10_hc' , 'game' =>  'wow' , 'zoneid' =>  32 , 'type' =>  'npc'  , 'webid' =>  '34497' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 213 ,  'imagename' =>  'anub_arak_10_hc' , 'game' =>  'wow' , 'zoneid' =>  32 , 'type' =>  'npc'  , 'webid' =>  '34564' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 214 ,  'imagename' =>  'northrend_beasts_25_hc' , 'game' =>  'wow' , 'zoneid' =>  33 , 'type' =>  'npc'  , 'webid' =>  '35470' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 215 ,  'imagename' =>  'faction_champions_25_hc' , 'game' =>  'wow' , 'zoneid' =>  33 , 'type' =>  'object'  , 'webid' =>  '195631' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 216 ,  'imagename' =>  'lord_jaraxxus_25_hc' , 'game' =>  'wow' , 'zoneid' =>  33 , 'type' =>  'npc'  , 'webid' =>  '34780' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 217 ,  'imagename' =>  'twin_valkyrs_25_hc' , 'game' =>  'wow' , 'zoneid' =>  33 , 'type' =>  'npc'  , 'webid' =>  '34497' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 218 ,  'imagename' =>  'anub_arak_25_hc' , 'game' =>  'wow' , 'zoneid' =>  33 , 'type' =>  'npc'  , 'webid' =>  '34564' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 219 ,  'imagename' =>  'onyxia_10' , 'game' =>  'wow' , 'zoneid' =>  34 , 'type' =>  'npc'  , 'webid' =>  '10184' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 220 ,  'imagename' =>  'onyxia_10' , 'game' =>  'wow' , 'zoneid' =>  34 , 'type' =>  'npc'  , 'webid' =>  '10184' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 221 ,  'imagename' =>  'onyxia_25' , 'game' =>  'wow' , 'zoneid' =>  35 , 'type' =>  'npc'  , 'webid' =>  '10184' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 222 ,  'imagename' =>  'onyxia_25' , 'game' =>  'wow' , 'zoneid' =>  35 , 'type' =>  'npc'  , 'webid' =>  '10184' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 223 ,  'imagename' =>  'lord_marrowgar_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36612' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 224 ,  'imagename' =>  'lord_marrowgar_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36612' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 225 ,  'imagename' =>  'lady_deathwhisper_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36855' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 226 ,  'imagename' =>  'lady_deathwhisper_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36855' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 227 ,  'imagename' =>  'icecrown_gunship_battle_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '201873' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 228 ,  'imagename' =>  'icecrown_gunship_battle_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '201873' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 229 ,  'imagename' =>  'deathbringer_saurfang_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '37813' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 230 ,  'imagename' =>  'deathbringer_saurfang_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '37813' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 231 ,  'imagename' =>  'festergut_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36626' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 232 ,  'imagename' =>  'festergut_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36626' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 233 ,  'imagename' =>  'rotface_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36627' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 234 ,  'imagename' =>  'rotface_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36627' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 235 ,  'imagename' =>  'professor_putricide_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36678' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 236 ,  'imagename' =>  'professor_putricide_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36678' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 237 ,  'imagename' =>  'blood_princes_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '37970' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 238 ,  'imagename' =>  'blood_princes_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '37970' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 239 ,  'imagename' =>  'blood_queen_lana_thel_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '38004' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 240 ,  'imagename' =>  'blood_queen_lana_thel_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '38004' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 241 ,  'imagename' =>  'valithria_dreamwalker_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36789' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 242 ,  'imagename' =>  'valithria_dreamwalker_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '36789' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 243 ,  'imagename' =>  'sindragosa_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '37755' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 244 ,  'imagename' =>  'sindragosa_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '37755' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 245 ,  'imagename' =>  'the_lich_king_10' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '29983' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 246 ,  'imagename' =>  'the_lich_king_10_hc' , 'game' =>  'wow' , 'zoneid' =>  36 , 'type' =>  'npc'  , 'webid' =>  '29983' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 247 ,  'imagename' =>  'lord_marrowgar_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36612' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 248 ,  'imagename' =>  'lord_marrowgar_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36612' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 249 ,  'imagename' =>  'lady_deathwhisper_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36855' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 250 ,  'imagename' =>  'lady_deathwhisper_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36855' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 251 ,  'imagename' =>  'icecrown_gunship_battle_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '201873' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 252 ,  'imagename' =>  'icecrown_gunship_battle_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '201873' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 253 ,  'imagename' =>  'deathbringer_saurfang_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '37813' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 254 ,  'imagename' =>  'deathbringer_saurfang_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '37813' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 255 ,  'imagename' =>  'festergut_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36626' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 256 ,  'imagename' =>  'festergut_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36626' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 257 ,  'imagename' =>  'rotface_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36627' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 258 ,  'imagename' =>  'rotface_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36627' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 259 ,  'imagename' =>  'professor_putricide_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36678' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 260 ,  'imagename' =>  'professor_putricide_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36678' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 261 ,  'imagename' =>  'blood_princes_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '37970' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 262 ,  'imagename' =>  'blood_princes_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '37970' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 263 ,  'imagename' =>  'blood_queen_lana_thel_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '38004' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 264 ,  'imagename' =>  'blood_queen_lana_thel_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '38004' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 265 ,  'imagename' =>  'valithria_dreamwalker_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36789' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 266 ,  'imagename' =>  'valithria_dreamwalker_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '36789' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 267 ,  'imagename' =>  'sindragosa_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '37755' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 268 ,  'imagename' =>  'sindragosa_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '37755' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 269 ,  'imagename' =>  'the_lich_king_25' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '29983' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 270 ,  'imagename' =>  'the_lich_king_25_hc' , 'game' =>  'wow' , 'zoneid' =>  37 , 'type' =>  'npc'  , 'webid' =>  '29983' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 271 ,  'imagename' =>  'halion_10' , 'game' =>  'wow' , 'zoneid' =>  38 , 'type' =>  'npc'  , 'webid' =>  '39863' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 272 ,  'imagename' =>  'halion_10_hc' , 'game' =>  'wow' , 'zoneid' =>  38 , 'type' =>  'npc'  , 'webid' =>  '39863' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 273 ,  'imagename' =>  'Halion_25' , 'game' =>  'wow' , 'zoneid' =>  39 , 'type' =>  'npc'  , 'webid' =>  '39863' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 274 ,  'imagename' =>  'Halion_25_hc' , 'game' =>  'wow' , 'zoneid' =>  39 , 'type' =>  'npc'  , 'webid' =>  '39863' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
				
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_bosstable', $sql_ary );
		unset ( $sql_ary );

		$sql_ary[] = array( 'id' => 1 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Miscellaneous bosses' ,  'name_short' =>  'Misc' );
		$sql_ary[] = array( 'id' => 2 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Onyxia\'s Lair' ,  'name_short' =>  'Onyxia' );
		$sql_ary[] = array( 'id' => 3 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Emerald Dream' ,  'name_short' =>  'Dream' );
		$sql_ary[] = array( 'id' => 4 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Zul\'Gurub' ,  'name_short' =>  'ZG' );
		$sql_ary[] = array( 'id' => 5 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Blackwing Lair' ,  'name_short' =>  'BWL' );
		$sql_ary[] = array( 'id' => 6 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Molten Core' ,  'name_short' =>  'MC' );
		$sql_ary[] = array( 'id' => 7 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Ruins of Ahn\'Qiraj' ,  'name_short' =>  'AQ20' );
		$sql_ary[] = array( 'id' => 8 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Gates of Ahn\'Qiraj' ,  'name_short' =>  'AQ40' );
		$sql_ary[] = array( 'id' => 9 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas' ,  'name_short' =>  'Naxx' );
		$sql_ary[] = array( 'id' => 10 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Karazhan' ,  'name_short' =>  'Kara' );
		$sql_ary[] = array( 'id' => 11 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Zul\'Aman' ,  'name_short' =>  'ZA' );
		$sql_ary[] = array( 'id' => 12 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Gruul\'s Lair' ,  'name_short' =>  'GL' );
		$sql_ary[] = array( 'id' => 13 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Magtheridon\'s Lair' ,  'name_short' =>  'Magtheridon' );
		$sql_ary[] = array( 'id' => 14 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Outland Outdoor Bosses' ,  'name_short' =>  'Outdoor' );
		$sql_ary[] = array( 'id' => 15 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Serpentshrine Cavern' ,  'name_short' =>  'SC' );
		$sql_ary[] = array( 'id' => 16 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Eye' ,  'name_short' =>  'Eye' );
		$sql_ary[] = array( 'id' => 17 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Battle of Mount Hyjal' ,  'name_short' =>  'Hyjal' );
		$sql_ary[] = array( 'id' => 18 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Black Temple' ,  'name_short' =>  'Temple' );
		$sql_ary[] = array( 'id' => 19 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Sunwell Plateau' ,  'name_short' =>  'Sunwell' );
		$sql_ary[] = array( 'id' => 20 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas (10)' ,  'name_short' =>  'Naxx (10)' );
		$sql_ary[] = array( 'id' => 21 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas (25)' ,  'name_short' =>  'Naxx (25)' );
		$sql_ary[] = array( 'id' => 22 , 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Vault of Archavon (10)' ,  'name_short' =>  'VoA (10)' );
		$sql_ary[] = array( 'id' => 23 , 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Vault of Archavon (25)' ,  'name_short' =>  'VoA (25)' );
		$sql_ary[] = array( 'id' => 24 , 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Obsidian Sanctum (10)' ,  'name_short' =>  'OS (10)' );
		$sql_ary[] = array( 'id' => 25 , 'attribute_id' => 25, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Obsidian Sanctum (25)' ,  'name_short' =>  'OS (25)' );
		$sql_ary[] = array( 'id' => 26 , 'attribute_id' => 26, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Eye of Eternity (10)' ,  'name_short' =>  'EoE (10)' );
		$sql_ary[] = array( 'id' => 27 , 'attribute_id' => 27, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Eye of Eternity (25)' ,  'name_short' =>  'EoE (25)' );
		$sql_ary[] = array( 'id' => 28 , 'attribute_id' => 28, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Ulduar (10)' ,  'name_short' =>  'EoE (25)' );
		$sql_ary[] = array( 'id' => 29 , 'attribute_id' => 29, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Ulduar (25)' ,  'name_short' =>  '' );
		$sql_ary[] = array( 'id' => 30 , 'attribute_id' => 30, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Trial of the Crusader (10)' ,  'name_short' =>  'ToC (10)' );
		$sql_ary[] = array( 'id' => 31 , 'attribute_id' => 31, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Trial of the Crusader (25)' ,  'name_short' =>  'ToC (25)' );
		$sql_ary[] = array( 'id' => 32 , 'attribute_id' => 32, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Trial of the Grand Crusader (10)' ,  'name_short' =>  'ToGC (10)' );
		$sql_ary[] = array( 'id' => 33 , 'attribute_id' => 33, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Trial of the Grand Crusader (25)' ,  'name_short' =>  'ToGC (25)' );
		$sql_ary[] = array( 'id' => 34 , 'attribute_id' => 34, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Onyxia\'s Lair (10)' ,  'name_short' =>  'Onyxia (10)' );
		$sql_ary[] = array( 'id' => 35 , 'attribute_id' => 35, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Onyxia\'s Lair (25)' ,  'name_short' =>  'Onyxia (25)' );
		$sql_ary[] = array( 'id' => 37 , 'attribute_id' => 37, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Icecrown Citadel (25)' ,  'name_short' =>  'ICC (25)' );
		$sql_ary[] = array( 'id' => 36 , 'attribute_id' => 36, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Icecrown Citadel (10)' ,  'name_short' =>  'ICC (10)' );
		$sql_ary[] = array( 'id' => 38 , 'attribute_id' => 38, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Ruby Sanctum (10)' ,  'name_short' =>  'RS (10)' );
		$sql_ary[] = array( 'id' => 39 , 'attribute_id' => 39, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Ruby Sanctum (25)' ,  'name_short' =>  'RS (25)' );
		$sql_ary[] = array( 'id' => 40 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Azuregos' ,  'name_short' =>  'Azuregos' );
		$sql_ary[] = array( 'id' => 41 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Kazzak' ,  'name_short' =>  'Kazzak' );
		$sql_ary[] = array( 'id' => 42 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Onyxia' ,  'name_short' =>  'Onyxia' );
		$sql_ary[] = array( 'id' => 43 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ysondre' ,  'name_short' =>  'Ysondre' );
		$sql_ary[] = array( 'id' => 44 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Taerar' ,  'name_short' =>  'Taerar' );
		$sql_ary[] = array( 'id' => 45 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Emeriss' ,  'name_short' =>  'Emeriss' );
		$sql_ary[] = array( 'id' => 46 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lethon' ,  'name_short' =>  'Lethon' );
		$sql_ary[] = array( 'id' => 47 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bloodlord Mandokir' ,  'name_short' =>  'Mandokir' );
		$sql_ary[] = array( 'id' => 48 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Jin’do the Hexxer' ,  'name_short' =>  'Jin’do' );
		$sql_ary[] = array( 'id' => 49 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gahz’ranka' ,  'name_short' =>  'Gahz’ranka' );
		$sql_ary[] = array( 'id' => 50 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gri’lek' ,  'name_short' =>  'Gri’lek' );
		$sql_ary[] = array( 'id' => 51 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hazza’rah' ,  'name_short' =>  'Hazza’rah' );
		$sql_ary[] = array( 'id' => 52 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Renataki' ,  'name_short' =>  'Renataki' );
		$sql_ary[] = array( 'id' => 53 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Wushoolay' ,  'name_short' =>  'Wushoolay' );
		$sql_ary[] = array( 'id' => 54 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'High Priest Thekal' ,  'name_short' =>  'Thekal' );
		$sql_ary[] = array( 'id' => 55 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'High Priestess Arlokk' ,  'name_short' =>  'Arlokk' );
		$sql_ary[] = array( 'id' => 56 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'High Priestess Jeklik' ,  'name_short' =>  'Jeklik' );
		$sql_ary[] = array( 'id' => 57 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'High Priestess Mar’li' ,  'name_short' =>  'Mar’li' );
		$sql_ary[] = array( 'id' => 58 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'High Priest Venoxis' ,  'name_short' =>  'Venoxis' );
		$sql_ary[] = array( 'id' => 59 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hakkar' ,  'name_short' =>  'Hakkar' );
		$sql_ary[] = array( 'id' => 60 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Razorgore the Untamed' ,  'name_short' =>  'Razorgore' );
		$sql_ary[] = array( 'id' => 61 , 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vaelastrasz the Corrupt' ,  'name_short' =>  'Vaelastrasz' );
		$sql_ary[] = array( 'id' => 62 , 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Broodlord Lashlayer' ,  'name_short' =>  'Lashlayer' );
		$sql_ary[] = array( 'id' => 63 , 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Firemaw' ,  'name_short' =>  'Firemaw' );
		$sql_ary[] = array( 'id' => 64 , 'attribute_id' => 25, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ebonroc' ,  'name_short' =>  'Ebonroc' );
		$sql_ary[] = array( 'id' => 65 , 'attribute_id' => 26, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Flamegor' ,  'name_short' =>  'Flamegor' );
		$sql_ary[] = array( 'id' => 66 , 'attribute_id' => 27, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chromaggus' ,  'name_short' =>  'Chromaggus' );
		$sql_ary[] = array( 'id' => 67 , 'attribute_id' => 28, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nefarian' ,  'name_short' =>  'Nefarian' );
		$sql_ary[] = array( 'id' => 68 , 'attribute_id' => 29, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lucifron' ,  'name_short' =>  'Lucifron' );
		$sql_ary[] = array( 'id' => 69 , 'attribute_id' => 30, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Magmadar' ,  'name_short' =>  'Magmadar' );
		$sql_ary[] = array( 'id' => 70 , 'attribute_id' => 31, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gehennas' ,  'name_short' =>  'Gehennas' );
		$sql_ary[] = array( 'id' => 71 , 'attribute_id' => 32, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Garr' ,  'name_short' =>  'Garr' );
		$sql_ary[] = array( 'id' => 72 , 'attribute_id' => 33, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Baron Geddon' ,  'name_short' =>  'Geddon' );
		$sql_ary[] = array( 'id' => 73 , 'attribute_id' => 34, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Shazzrah' ,  'name_short' =>  'Shazzrah' );
		$sql_ary[] = array( 'id' => 74 , 'attribute_id' => 35, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sulfuron Harbringer' ,  'name_short' =>  'Sulfuron' );
		$sql_ary[] = array( 'id' => 75 , 'attribute_id' => 36, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Golemagg the Incinerator' ,  'name_short' =>  'Golemagg' );
		$sql_ary[] = array( 'id' => 76 , 'attribute_id' => 37, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Majordomo Executus' ,  'name_short' =>  'Majordomo' );
		$sql_ary[] = array( 'id' => 77 , 'attribute_id' => 38, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ragnaros' ,  'name_short' =>  'Ragnaros' );
		$sql_ary[] = array( 'id' => 78 , 'attribute_id' => 39, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kurinnaxx' ,  'name_short' =>  'Kurinnaxx' );
		$sql_ary[] = array( 'id' => 79 , 'attribute_id' => 40, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'General Rajaxx' ,  'name_short' =>  'Rajaxx' );
		$sql_ary[] = array( 'id' => 80 , 'attribute_id' => 41, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ayamiss the Hunter' ,  'name_short' =>  'Ayamiss' );
		$sql_ary[] = array( 'id' => 81 , 'attribute_id' => 42, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Buru the Gorger' ,  'name_short' =>  'Buru' );
		$sql_ary[] = array( 'id' => 82 , 'attribute_id' => 43, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Moam' ,  'name_short' =>  'Moam' );
		$sql_ary[] = array( 'id' => 83 , 'attribute_id' => 44, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ossirian the Unscarred' ,  'name_short' =>  'Ossirian' );
		$sql_ary[] = array( 'id' => 84 , 'attribute_id' => 45, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Prophet Skeram' ,  'name_short' =>  'Skeram' );
		$sql_ary[] = array( 'id' => 85 , 'attribute_id' => 46, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Kri' ,  'name_short' =>  'Lord Kri' );
		$sql_ary[] = array( 'id' => 86 , 'attribute_id' => 47, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Princess Yauj' ,  'name_short' =>  'Princess Yauj' );
		$sql_ary[] = array( 'id' => 87 , 'attribute_id' => 48, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vem' ,  'name_short' =>  'Vem' );
		$sql_ary[] = array( 'id' => 88 , 'attribute_id' => 49, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Battleguard Sartura' ,  'name_short' =>  'Sartura' );
		$sql_ary[] = array( 'id' => 89 , 'attribute_id' => 50, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Fankriss the Unyielding' ,  'name_short' =>  'Fankriss' );
		$sql_ary[] = array( 'id' => 90 , 'attribute_id' => 51, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Princess Huhuran' ,  'name_short' =>  'Huhuran' );
		$sql_ary[] = array( 'id' => 91 , 'attribute_id' => 52, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Viscidus' ,  'name_short' =>  'Viscidus' );
		$sql_ary[] = array( 'id' => 92 , 'attribute_id' => 53, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Emperor Vek’nilash' ,  'name_short' =>  'Vek’nilash' );
		$sql_ary[] = array( 'id' => 93 , 'attribute_id' => 54, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Emperor Vek’lor' ,  'name_short' =>  'Vek’lor' );
		$sql_ary[] = array( 'id' => 94 , 'attribute_id' => 55, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ouro' ,  'name_short' =>  'Ouro' );
		$sql_ary[] = array( 'id' => 95 , 'attribute_id' => 56, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'C’Thun' ,  'name_short' =>  'C’Thun' );
		$sql_ary[] = array( 'id' => 96 , 'attribute_id' => 57, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan' ,  'name_short' =>  'Anub’Rekhan' );
		$sql_ary[] = array( 'id' => 97 , 'attribute_id' => 58, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grand Widow Faerlina' ,  'name_short' =>  'Faerlina' );
		$sql_ary[] = array( 'id' => 98 , 'attribute_id' => 59, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Maexxna' ,  'name_short' =>  'Maexxna' );
		$sql_ary[] = array( 'id' => 99 , 'attribute_id' => 60, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Noth the Plaguebringer' ,  'name_short' =>  'Noth' );
		$sql_ary[] = array( 'id' => 100 , 'attribute_id' => 61, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Heigan the Unclean' ,  'name_short' =>  'Heigan' );
		$sql_ary[] = array( 'id' => 101 , 'attribute_id' => 62, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Loatheb' ,  'name_short' =>  'Loatheb' );
		$sql_ary[] = array( 'id' => 102 , 'attribute_id' => 63, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Patchwerk' ,  'name_short' =>  'Patchwerk' );
		$sql_ary[] = array( 'id' => 103 , 'attribute_id' => 64, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus' ,  'name_short' =>  'Grobbulus' );
		$sql_ary[] = array( 'id' => 104 , 'attribute_id' => 65, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gluth' ,  'name_short' =>  'Gluth' );
		$sql_ary[] = array( 'id' => 105 , 'attribute_id' => 66, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thaddius' ,  'name_short' =>  'Thaddius' );
		$sql_ary[] = array( 'id' => 106 , 'attribute_id' => 67, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Instructor Razuvious' ,  'name_short' =>  'Razuvious' );
		$sql_ary[] = array( 'id' => 107 , 'attribute_id' => 68, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gothik the Harvester' ,  'name_short' =>  'Gothik' );
		$sql_ary[] = array( 'id' => 108 , 'attribute_id' => 69, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thane Korth’azz' ,  'name_short' =>  'Korth’azz' );
		$sql_ary[] = array( 'id' => 109 , 'attribute_id' => 70, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lady Blaumeux' ,  'name_short' =>  'Blaumeux' );
		$sql_ary[] = array( 'id' => 110 , 'attribute_id' => 71, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Highlord Mograine' ,  'name_short' =>  'Mograine' );
		$sql_ary[] = array( 'id' => 111 , 'attribute_id' => 72, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sir Zeliek' ,  'name_short' =>  'Sir Zeliek' );
		$sql_ary[] = array( 'id' => 112 , 'attribute_id' => 73, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sapphiron' ,  'name_short' =>  'Sapphiron' );
		$sql_ary[] = array( 'id' => 113 , 'attribute_id' => 74, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad' ,  'name_short' =>  'Kel’Thuzad' );
		$sql_ary[] = array( 'id' => 114 , 'attribute_id' => 75, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Attumen the Huntsman' ,  'name_short' =>  'Attumen' );
		$sql_ary[] = array( 'id' => 115 , 'attribute_id' => 76, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Moroes' ,  'name_short' =>  'Moroes' );
		$sql_ary[] = array( 'id' => 116 , 'attribute_id' => 77, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Maiden of Virtue' ,  'name_short' =>  'Maiden' );
		$sql_ary[] = array( 'id' => 117 , 'attribute_id' => 78, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Opera Event' ,  'name_short' =>  'Opera' );
		$sql_ary[] = array( 'id' => 118 , 'attribute_id' => 79, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Curator' ,  'name_short' =>  'Curator' );
		$sql_ary[] = array( 'id' => 119 , 'attribute_id' => 80, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Terestian Illhoof' ,  'name_short' =>  'Terestian Illhoof' );
		$sql_ary[] = array( 'id' => 120 , 'attribute_id' => 81, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Shade of Aran' ,  'name_short' =>  'Aran' );
		$sql_ary[] = array( 'id' => 121 , 'attribute_id' => 82, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chess Event' ,  'name_short' =>  'Chess' );
		$sql_ary[] = array( 'id' => 122 , 'attribute_id' => 83, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Netherspite' ,  'name_short' =>  'Netherspite' );
		$sql_ary[] = array( 'id' => 123 , 'attribute_id' => 84, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Prince Malchezaar' ,  'name_short' =>  'Malchezaar' );
		$sql_ary[] = array( 'id' => 124 , 'attribute_id' => 85, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nightbane' ,  'name_short' =>  'Nightbane' );
		$sql_ary[] = array( 'id' => 125 , 'attribute_id' => 86, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nalorakk, Bear Avatar' ,  'name_short' =>  'Nalorakk' );
		$sql_ary[] = array( 'id' => 126 , 'attribute_id' => 87, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Akil’Zon, Eagle Avatar' ,  'name_short' =>  'Akil’Zon' );
		$sql_ary[] = array( 'id' => 127 , 'attribute_id' => 88, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halazzi, Lynx Avatar' ,  'name_short' =>  'Halazzi' );
		$sql_ary[] = array( 'id' => 128 , 'attribute_id' => 89, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Jan’Alai, Dragonhawk Avatar' ,  'name_short' =>  'Jan’Alai' );
		$sql_ary[] = array( 'id' => 129 , 'attribute_id' => 90, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hex Lord Malacrass' ,  'name_short' =>  'Malacrass' );
		$sql_ary[] = array( 'id' => 130 , 'attribute_id' => 91, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zul’Jin' ,  'name_short' =>  'Zul’Jin' );
		$sql_ary[] = array( 'id' => 131 , 'attribute_id' => 92, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'High King Maulgar' ,  'name_short' =>  'Maulgar' );
		$sql_ary[] = array( 'id' => 132 , 'attribute_id' => 93, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gruul the Dragonkiller' ,  'name_short' =>  'Gruul' );
		$sql_ary[] = array( 'id' => 133 , 'attribute_id' => 94, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Magtheridon' ,  'name_short' =>  'Magtheridon' );
		$sql_ary[] = array( 'id' => 134 , 'attribute_id' => 95, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Doom Lord Kazzak' ,  'name_short' =>  'Doom Kazzak' );
		$sql_ary[] = array( 'id' => 135 , 'attribute_id' => 96, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Doomwalker' ,  'name_short' =>  'Doomwalker' );
		$sql_ary[] = array( 'id' => 136 , 'attribute_id' => 97, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hydross the Unstable' ,  'name_short' =>  'Hydross' );
		$sql_ary[] = array( 'id' => 137 , 'attribute_id' => 98, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Fathom-Lord Karathress' ,  'name_short' =>  'Karathress' );
		$sql_ary[] = array( 'id' => 138 , 'attribute_id' => 99, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Morogrim Tidewalker' ,  'name_short' =>  'Morogrim' );
		$sql_ary[] = array( 'id' => 139 , 'attribute_id' => 100, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Leotheras the Blind' ,  'name_short' =>  'Leotheras' );
		$sql_ary[] = array( 'id' => 140 , 'attribute_id' => 101, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Lurker Below' ,  'name_short' =>  'Lurker' );
		$sql_ary[] = array( 'id' => 141 , 'attribute_id' => 102, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lady Vashj' ,  'name_short' =>  'Vashj' );
		$sql_ary[] = array( 'id' => 142 , 'attribute_id' => 103, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Al’Ar the Phoenix God' ,  'name_short' =>  'Al’Ar' );
		$sql_ary[] = array( 'id' => 143 , 'attribute_id' => 104, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Void Reaver' ,  'name_short' =>  'Reaver' );
		$sql_ary[] = array( 'id' => 144 , 'attribute_id' => 105, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'High Astromancer Solarian' ,  'name_short' =>  'Solarian' );
		$sql_ary[] = array( 'id' => 145 , 'attribute_id' => 106, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kael’thas Sunstrider' ,  'name_short' =>  'Kaelthas' );
		$sql_ary[] = array( 'id' => 146 , 'attribute_id' => 107, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rage Winterchill' ,  'name_short' =>  'Winterchill' );
		$sql_ary[] = array( 'id' => 147 , 'attribute_id' => 108, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Anetheron' ,  'name_short' =>  'Anetheron' );
		$sql_ary[] = array( 'id' => 148 , 'attribute_id' => 109, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kaz’rogal' ,  'name_short' =>  'Kaz’rogal' );
		$sql_ary[] = array( 'id' => 149 , 'attribute_id' => 110, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Azgalor' ,  'name_short' =>  'Azgalor' );
		$sql_ary[] = array( 'id' => 150 , 'attribute_id' => 111, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Archimonde' ,  'name_short' =>  'Archimonde' );
		$sql_ary[] = array( 'id' => 151 , 'attribute_id' => 112, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'High Warlord Naj’entus' ,  'name_short' =>  'Naj’entus' );
		$sql_ary[] = array( 'id' => 152 , 'attribute_id' => 113, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Supremus' ,  'name_short' =>  'Supremus' );
		$sql_ary[] = array( 'id' => 153 , 'attribute_id' => 114, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Akama' ,  'name_short' =>  'Akama' );
		$sql_ary[] = array( 'id' => 154 , 'attribute_id' => 115, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Teron Gorefiend' ,  'name_short' =>  'Gorefiend' );
		$sql_ary[] = array( 'id' => 155 , 'attribute_id' => 116, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Essence of Souls' ,  'name_short' =>  'Essence' );
		$sql_ary[] = array( 'id' => 156 , 'attribute_id' => 117, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gurtogg Bloodboil' ,  'name_short' =>  'Bloodboil' );
		$sql_ary[] = array( 'id' => 157 , 'attribute_id' => 118, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mother Shahraz' ,  'name_short' =>  'Shahraz' );
		$sql_ary[] = array( 'id' => 158 , 'attribute_id' => 119, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Illidari Council' ,  'name_short' =>  'Council' );
		$sql_ary[] = array( 'id' => 159 , 'attribute_id' => 120, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Illidan Stormrage' ,  'name_short' =>  'Illidan' );
		$sql_ary[] = array( 'id' => 160 , 'attribute_id' => 121, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kalecgos' ,  'name_short' =>  'Kalecgos' );
		$sql_ary[] = array( 'id' => 161 , 'attribute_id' => 122, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Brutallus' ,  'name_short' =>  'Brutallus' );
		$sql_ary[] = array( 'id' => 162 , 'attribute_id' => 123, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Felmyst' ,  'name_short' =>  'Felmyst' );
		$sql_ary[] = array( 'id' => 163 , 'attribute_id' => 124, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Alythess & Sacrolash' ,  'name_short' =>  'Twins' );
		$sql_ary[] = array( 'id' => 164 , 'attribute_id' => 125, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'M’uru' ,  'name_short' =>  'M’uru' );
		$sql_ary[] = array( 'id' => 165 , 'attribute_id' => 126, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kil’jaeden' ,  'name_short' =>  'Kil’jaeden' );
		$sql_ary[] = array( 'id' => 166 , 'attribute_id' => 127, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan (10)' ,  'name_short' =>  'Anub’Rekhan (10)' );
		$sql_ary[] = array( 'id' => 167 , 'attribute_id' => 128, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grand Widow Faerlina (10)' ,  'name_short' =>  'Faerlina (10)' );
		$sql_ary[] = array( 'id' => 168 , 'attribute_id' => 129, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Maexxna (10)' ,  'name_short' =>  'Maexxna (10)' );
		$sql_ary[] = array( 'id' => 169 , 'attribute_id' => 130, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Patchwerk (10)' ,  'name_short' =>  'Patchwerk (10)' );
		$sql_ary[] = array( 'id' => 173 , 'attribute_id' => 134, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus (10)' ,  'name_short' =>  'Grobbulus (10)' );
		$sql_ary[] = array( 'id' => 174 , 'attribute_id' => 135, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gluth (10)' ,  'name_short' =>  'Gluth (10)' );
		$sql_ary[] = array( 'id' => 175 , 'attribute_id' => 136, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thaddius (10)' ,  'name_short' =>  'Thaddius (10)' );
		$sql_ary[] = array( 'id' => 176 , 'attribute_id' => 137, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Instructor Razuvious (10)' ,  'name_short' =>  'Razuvious (10)' );
		$sql_ary[] = array( 'id' => 177 , 'attribute_id' => 138, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gothik the Harvester (10)' ,  'name_short' =>  'Gothik (10)' );
		$sql_ary[] = array( 'id' => 178 , 'attribute_id' => 139, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Four Horsemen (10)' ,  'name_short' =>  'Korth’azz (10)' );
		$sql_ary[] = array( 'id' => 179 , 'attribute_id' => 140, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sapphiron (10)' ,  'name_short' =>  'Sapphiron (10)' );
		$sql_ary[] = array( 'id' => 180 , 'attribute_id' => 141, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad (10)' ,  'name_short' =>  'Kel’Thuzad (10)' );
		$sql_ary[] = array( 'id' => 181 , 'attribute_id' => 142, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan (25)' ,  'name_short' =>  'Anub’Rekhan (25)' );
		$sql_ary[] = array( 'id' => 182 , 'attribute_id' => 143, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grand Widow Faerlina (25)' ,  'name_short' =>  'Faerlina (25)' );
		$sql_ary[] = array( 'id' => 183 , 'attribute_id' => 144, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Maexxna (25)' ,  'name_short' =>  'Maexxna (25)' );
		$sql_ary[] = array( 'id' => 184 , 'attribute_id' => 145, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Noth the Plaguebringer (25)' ,  'name_short' =>  'Noth (25)' );
		$sql_ary[] = array( 'id' => 185 , 'attribute_id' => 146, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Heigan the Unclean (25)' ,  'name_short' =>  'Heigan (25)' );
		$sql_ary[] = array( 'id' => 186 , 'attribute_id' => 147, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Loatheb (25)' ,  'name_short' =>  'Loatheb (25)' );
		$sql_ary[] = array( 'id' => 187 , 'attribute_id' => 148, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Patchwerk (25)' ,  'name_short' =>  'Patchwerk (25)' );
		$sql_ary[] = array( 'id' => 188 , 'attribute_id' => 149, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus (25)' ,  'name_short' =>  'Grobbulus (25)' );
		$sql_ary[] = array( 'id' => 189 , 'attribute_id' => 150, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gluth (25)' ,  'name_short' =>  'Gluth (25)' );
		$sql_ary[] = array( 'id' => 190 , 'attribute_id' => 151, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thaddius (25)' ,  'name_short' =>  'Thaddius (25)' );
		$sql_ary[] = array( 'id' => 191 , 'attribute_id' => 152, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Instructor Razuvious (25)' ,  'name_short' =>  'Razuvious (25)' );
		$sql_ary[] = array( 'id' => 192 , 'attribute_id' => 153, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gothik the Harvester (25)' ,  'name_short' =>  'Gothik (25)' );
		$sql_ary[] = array( 'id' => 193 , 'attribute_id' => 154, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Four Horsemen (25)' ,  'name_short' =>  'Korth’azz (25)' );
		$sql_ary[] = array( 'id' => 194 , 'attribute_id' => 155, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sapphiron (25)' ,  'name_short' =>  'Sapphiron (25)' );
		$sql_ary[] = array( 'id' => 195 , 'attribute_id' => 156, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad (25)' ,  'name_short' =>  'Kel’Thuzad (25)' );
		$sql_ary[] = array( 'id' => 196 , 'attribute_id' => 157, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Malygos (10)' ,  'name_short' =>  'Malygos (10)' );
		$sql_ary[] = array( 'id' => 197 , 'attribute_id' => 158, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Archavon the Stone Watcher (10)' ,  'name_short' =>  'Archavon (10)' );
		$sql_ary[] = array( 'id' => 198 , 'attribute_id' => 159, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Emalon the Storm Watcher (10)' ,  'name_short' =>  'Emalon (10)' );
		$sql_ary[] = array( 'id' => 199 , 'attribute_id' => 160, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Archavon the Stone Watcher (25)' ,  'name_short' =>  'Archavon (25)' );
		$sql_ary[] = array( 'id' => 200 , 'attribute_id' => 161, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Emalon the Storm Watcher (25)' ,  'name_short' =>  'Emalon (25)' );
		$sql_ary[] = array( 'id' => 201 , 'attribute_id' => 162, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sartharion the Onyx Guardian No dragons (10)' ,  'name_short' =>  'Sartarion 0d (10)' );
		$sql_ary[] = array( 'id' => 202 , 'attribute_id' => 163, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sartharion the Onyx Guardian One dragon (10)' ,  'name_short' =>  'Sartarion 1d (10)' );
		$sql_ary[] = array( 'id' => 203 , 'attribute_id' => 164, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sartharion the Onyx Guardian Two dragons (10)' ,  'name_short' =>  'Sartarion 2d (10)' );
		$sql_ary[] = array( 'id' => 204 , 'attribute_id' => 165, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sartharion the Onyx Guardian Three dragons (10)' ,  'name_short' =>  'Sartarion 3d (10)' );
		$sql_ary[] = array( 'id' => 205 , 'attribute_id' => 166, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sartharion the Onyx Guardian No dragons (25)' ,  'name_short' =>  'Sartarion 0d (25)' );
		$sql_ary[] = array( 'id' => 206 , 'attribute_id' => 167, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sartharion the Onyx Guardian One dragon (25)' ,  'name_short' =>  'Sartarion 1d (25)' );
		$sql_ary[] = array( 'id' => 207 , 'attribute_id' => 168, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sartharion the Onyx Guardian Two dragons (25)' ,  'name_short' =>  'Sartarion 2d (25)' );
		$sql_ary[] = array( 'id' => 208 , 'attribute_id' => 169, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sartharion the Onyx Guardian Three dragons (25)' ,  'name_short' =>  'Sartarion 3d (25)' );
		$sql_ary[] = array( 'id' => 209 , 'attribute_id' => 170, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Malygos (25)' ,  'name_short' =>  'Malygos (25)' );
		$sql_ary[] = array( 'id' => 210 , 'attribute_id' => 171, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Flame Leviathan (10)' ,  'name_short' =>  'Leviathan (10)' );
		$sql_ary[] = array( 'id' => 211 , 'attribute_id' => 172, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Razorscale (10)' ,  'name_short' =>  'Razorscale (10)' );
		$sql_ary[] = array( 'id' => 212 , 'attribute_id' => 173, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'XT-002 Deconstructor (10)' ,  'name_short' =>  'Deconstructor (10)' );
		$sql_ary[] = array( 'id' => 213 , 'attribute_id' => 174, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ignis the Furnace Master (10)' ,  'name_short' =>  'Ignis (10)' );
		$sql_ary[] = array( 'id' => 214 , 'attribute_id' => 175, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Assembly of Iron (10)' ,  'name_short' =>  'Assembly (10)' );
		$sql_ary[] = array( 'id' => 215 , 'attribute_id' => 176, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kologarn (10)' ,  'name_short' =>  'Kologarn (10)' );
		$sql_ary[] = array( 'id' => 216 , 'attribute_id' => 177, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Auriaya (10)' ,  'name_short' =>  'Auriaya (10)' );
		$sql_ary[] = array( 'id' => 217 , 'attribute_id' => 178, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mimiron (10)' ,  'name_short' =>  'Mimiron (10)' );
		$sql_ary[] = array( 'id' => 218 , 'attribute_id' => 179, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hodir (10)' ,  'name_short' =>  'Hodir (10)' );
		$sql_ary[] = array( 'id' => 219 , 'attribute_id' => 180, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thorim (10)' ,  'name_short' =>  'Thorim (10)' );
		$sql_ary[] = array( 'id' => 220 , 'attribute_id' => 181, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Freya (10)' ,  'name_short' =>  'Freya (10)' );
		$sql_ary[] = array( 'id' => 221 , 'attribute_id' => 182, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'General Vezax (10)' ,  'name_short' =>  'Vezax (10)' );
		$sql_ary[] = array( 'id' => 222 , 'attribute_id' => 183, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Yogg-Saron (10)' ,  'name_short' =>  'Yogg-Saron (10)' );
		$sql_ary[] = array( 'id' => 223 , 'attribute_id' => 184, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Algalon (10)' ,  'name_short' =>  'Algalon (10)' );
		$sql_ary[] = array( 'id' => 224 , 'attribute_id' => 185, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Flame Leviathan (25)' ,  'name_short' =>  'Leviathan (25)' );
		$sql_ary[] = array( 'id' => 225 , 'attribute_id' => 186, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Razorscale (25)' ,  'name_short' =>  'Razorscale (25)' );
		$sql_ary[] = array( 'id' => 226 , 'attribute_id' => 187, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'XT-002 Deconstructor (25)' ,  'name_short' =>  'Deconstructor (25)' );
		$sql_ary[] = array( 'id' => 227 , 'attribute_id' => 188, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ignis the Furnace Master (25)' ,  'name_short' =>  'Ignis (25)' );
		$sql_ary[] = array( 'id' => 228 , 'attribute_id' => 189, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Assembly of Iron (25)' ,  'name_short' =>  'Assembly (25)' );
		$sql_ary[] = array( 'id' => 229 , 'attribute_id' => 190, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kologarn (25)' ,  'name_short' =>  'Kologarn (25)' );
		$sql_ary[] = array( 'id' => 230 , 'attribute_id' => 191, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Auriaya (25)' ,  'name_short' =>  'Auriaya (25)' );
		$sql_ary[] = array( 'id' => 231 , 'attribute_id' => 192, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mimiron (25)' ,  'name_short' =>  'Mimiron (25)' );
		$sql_ary[] = array( 'id' => 232 , 'attribute_id' => 193, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Hodir (25)' ,  'name_short' =>  'Hodir (25)' );
		$sql_ary[] = array( 'id' => 233 , 'attribute_id' => 194, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thorim (25)' ,  'name_short' =>  'Thorim (25)' );
		$sql_ary[] = array( 'id' => 234 , 'attribute_id' => 195, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Freya (25)' ,  'name_short' =>  'Freya (25)' );
		$sql_ary[] = array( 'id' => 235 , 'attribute_id' => 196, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'General Vezax (25)' ,  'name_short' =>  'Vezax (25)' );
		$sql_ary[] = array( 'id' => 236 , 'attribute_id' => 197, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Yogg-Saron (25)' ,  'name_short' =>  'Yogg-Saron (25)' );
		$sql_ary[] = array( 'id' => 237 , 'attribute_id' => 198, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Algalon (25)' ,  'name_short' =>  'Algalon (25)' );
		$sql_ary[] = array( 'id' => 238 , 'attribute_id' => 199, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Northrend Beasts (10)' ,  'name_short' =>  'Beasts (10)' );
		$sql_ary[] = array( 'id' => 239 , 'attribute_id' => 200, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Faction Champions (10)' ,  'name_short' =>  'Champions (10)' );
		$sql_ary[] = array( 'id' => 240 , 'attribute_id' => 201, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Jaraxxus (10)' ,  'name_short' =>  'Jaraxxus (10)' );
		$sql_ary[] = array( 'id' => 241 , 'attribute_id' => 202, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Twin Valkyrs (10)' ,  'name_short' =>  'Valkyrs (10)' );
		$sql_ary[] = array( 'id' => 242 , 'attribute_id' => 203, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (10)' ,  'name_short' =>  'Anub (10)' );
		$sql_ary[] = array( 'id' => 243 , 'attribute_id' => 204, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Northrend Beasts (25)' ,  'name_short' =>  'Beasts (25)' );
		$sql_ary[] = array( 'id' => 244 , 'attribute_id' => 205, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Faction Champions (25)' ,  'name_short' =>  'Champions (25)' );
		$sql_ary[] = array( 'id' => 245 , 'attribute_id' => 206, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Jaraxxus (25)' ,  'name_short' =>  'Jaraxxus (25)' );
		$sql_ary[] = array( 'id' => 246 , 'attribute_id' => 207, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Twin Valkyrs (25)' ,  'name_short' =>  'Valkyrs (25)' );
		$sql_ary[] = array( 'id' => 247 , 'attribute_id' => 208, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (25)' ,  'name_short' =>  'Anub (25)' );
		$sql_ary[] = array( 'id' => 248 , 'attribute_id' => 209, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Northrend Beasts (10)' ,  'name_short' =>  'Beasts (10)' );
		$sql_ary[] = array( 'id' => 249 , 'attribute_id' => 210, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Faction Champions (10)' ,  'name_short' =>  'Champions (10)' );
		$sql_ary[] = array( 'id' => 250 , 'attribute_id' => 211, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Jaraxxus (10)' ,  'name_short' =>  'Jaraxxus (10)' );
		$sql_ary[] = array( 'id' => 251 , 'attribute_id' => 212, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Twin Valkyrs (10)' ,  'name_short' =>  'Valkyrs (10)' );
		$sql_ary[] = array( 'id' => 252 , 'attribute_id' => 213, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (10)' ,  'name_short' =>  'Anub (10)' );
		$sql_ary[] = array( 'id' => 253 , 'attribute_id' => 214, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Northrend Beasts (25)' ,  'name_short' =>  'Beasts (25)' );
		$sql_ary[] = array( 'id' => 254 , 'attribute_id' => 215, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Faction Champions (25)' ,  'name_short' =>  'Champions (25)' );
		$sql_ary[] = array( 'id' => 255 , 'attribute_id' => 216, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Jaraxxus (25)' ,  'name_short' =>  'Jaraxxus (25)' );
		$sql_ary[] = array( 'id' => 256 , 'attribute_id' => 217, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Twin Valkyrs (25)' ,  'name_short' =>  'Valkyrs (25)' );
		$sql_ary[] = array( 'id' => 257 , 'attribute_id' => 218, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (25)' ,  'name_short' =>  'Anub (25)' );
		$sql_ary[] = array( 'id' => 258 , 'attribute_id' => 219, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (10)' ,  'name_short' =>  'Onyxia (10)' );
		$sql_ary[] = array( 'id' => 259 , 'attribute_id' => 220, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (10)' ,  'name_short' =>  'Onyxia (10)' );
		$sql_ary[] = array( 'id' => 260 , 'attribute_id' => 221, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (25)' ,  'name_short' =>  'Onyxia (25)' );
		$sql_ary[] = array( 'id' => 261 , 'attribute_id' => 222, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (25)' ,  'name_short' =>  'Onyxia (25)' );
		$sql_ary[] = array( 'id' => 262 , 'attribute_id' => 223, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Marrowgar (10)' ,  'name_short' =>  'Marrowgar (10)' );
		$sql_ary[] = array( 'id' => 263 , 'attribute_id' => 224, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Marrowgar (10HM)' ,  'name_short' =>  'Marrowgar (10HM)' );
		$sql_ary[] = array( 'id' => 264 , 'attribute_id' => 225, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lady Deathwhisper (10)' ,  'name_short' =>  'Deathwisper (10)' );
		$sql_ary[] = array( 'id' => 265 , 'attribute_id' => 226, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lady Deathwhisper (10HM)' ,  'name_short' =>  'Deathwisper (10HM)' );
		$sql_ary[] = array( 'id' => 266 , 'attribute_id' => 227, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Icecrown Gunship Battle (10)' ,  'name_short' =>  'Gunship (10)' );
		$sql_ary[] = array( 'id' => 267 , 'attribute_id' => 228, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Icecrown Gunship Battle (10HM)' ,  'name_short' =>  'Gunship (10HM)' );
		$sql_ary[] = array( 'id' => 268 , 'attribute_id' => 229, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Deathbringer Saurfang (10)' ,  'name_short' =>  'Saurfang (10)' );
		$sql_ary[] = array( 'id' => 269 , 'attribute_id' => 230, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Deathbringer Saurfang (10HM)' ,  'name_short' =>  'Saurfang (10HM)' );
		$sql_ary[] = array( 'id' => 270 , 'attribute_id' => 231, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Festergut (10)' ,  'name_short' =>  'Festergut (10)' );
		$sql_ary[] = array( 'id' => 271 , 'attribute_id' => 232, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Festergut (10HM)' ,  'name_short' =>  'Festergut (10HM)' );
		$sql_ary[] = array( 'id' => 272 , 'attribute_id' => 233, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rotface (10)' ,  'name_short' =>  'Rotface (10)' );
		$sql_ary[] = array( 'id' => 273 , 'attribute_id' => 234, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rotface (10HM)' ,  'name_short' =>  'Rotface (10HM)' );
		$sql_ary[] = array( 'id' => 274 , 'attribute_id' => 235, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Professor Putricide (10)' ,  'name_short' =>  'Putricide (10)' );
		$sql_ary[] = array( 'id' => 275 , 'attribute_id' => 236, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Professor Putricide (10HM)' ,  'name_short' =>  'Putricide (10HM)' );
		$sql_ary[] = array( 'id' => 276 , 'attribute_id' => 237, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blood Princes (10)' ,  'name_short' =>  'Princes (10)' );
		$sql_ary[] = array( 'id' => 277 , 'attribute_id' => 238, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blood Princes (10HM)' ,  'name_short' =>  'Princes (10HM)' );
		$sql_ary[] = array( 'id' => 278 , 'attribute_id' => 239, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blood-Queen Lana thel (10)' ,  'name_short' =>  'Lana thel (10)' );
		$sql_ary[] = array( 'id' => 279 , 'attribute_id' => 240, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blood-Queen Lana thel (10HM)' ,  'name_short' =>  'Lana thel (10HM)' );
		$sql_ary[] = array( 'id' => 280 , 'attribute_id' => 241, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valithria Dreamwalker (10)' ,  'name_short' =>  'Valithria (10)' );
		$sql_ary[] = array( 'id' => 281 , 'attribute_id' => 242, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valithria Dreamwalker (10HM)' ,  'name_short' =>  'Valithria (10HM)' );
		$sql_ary[] = array( 'id' => 282 , 'attribute_id' => 243, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (10)' ,  'name_short' =>  'Sindragosa (10)' );
		$sql_ary[] = array( 'id' => 283 , 'attribute_id' => 244, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (10HM)' ,  'name_short' =>  'Sindragosa (10HM)' );
		$sql_ary[] = array( 'id' => 284 , 'attribute_id' => 245, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Lich King (10)' ,  'name_short' =>  'Lich King (10)' );
		$sql_ary[] = array( 'id' => 285 , 'attribute_id' => 246, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Lich King (10HM)' ,  'name_short' =>  'Lich King (10HM)' );
		$sql_ary[] = array( 'id' => 286 , 'attribute_id' => 247, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Marrowgar (25)' ,  'name_short' =>  'Marrowgar (25)' );
		$sql_ary[] = array( 'id' => 287 , 'attribute_id' => 248, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lord Marrowgar (25HM)' ,  'name_short' =>  'Marrowgar (25HM)' );
		$sql_ary[] = array( 'id' => 288 , 'attribute_id' => 249, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lady Deathwhisper (25)' ,  'name_short' =>  'Deathwisper (25)' );
		$sql_ary[] = array( 'id' => 289 , 'attribute_id' => 250, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lady Deathwhisper (25HM)' ,  'name_short' =>  'Deathwisper (25HM)' );
		$sql_ary[] = array( 'id' => 290 , 'attribute_id' => 251, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Icecrown Gunship Battle (25)' ,  'name_short' =>  'Gunship (25)' );
		$sql_ary[] = array( 'id' => 291 , 'attribute_id' => 252, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Icecrown Gunship Battle (25HM)' ,  'name_short' =>  'Gunship (25HM)' );
		$sql_ary[] = array( 'id' => 292 , 'attribute_id' => 253, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Deathbringer Saurfang (25)' ,  'name_short' =>  'Saurfang (25)' );
		$sql_ary[] = array( 'id' => 293 , 'attribute_id' => 254, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Deathbringer Saurfang (25HM)' ,  'name_short' =>  'Saurfang (25HM)' );
		$sql_ary[] = array( 'id' => 294 , 'attribute_id' => 255, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Festergut (25)' ,  'name_short' =>  'Festergut (25)' );
		$sql_ary[] = array( 'id' => 295 , 'attribute_id' => 256, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Festergut (25HM)' ,  'name_short' =>  'Festergut (25HM)' );
		$sql_ary[] = array( 'id' => 296 , 'attribute_id' => 257, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rotface (25)' ,  'name_short' =>  'Rotface (25)' );
		$sql_ary[] = array( 'id' => 297 , 'attribute_id' => 258, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rotface (25HM)' ,  'name_short' =>  'Rotface (25HM)' );
		$sql_ary[] = array( 'id' => 298 , 'attribute_id' => 259, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Professor Putricide (25)' ,  'name_short' =>  'Putricide (25)' );
		$sql_ary[] = array( 'id' => 299 , 'attribute_id' => 260, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Professor Putricide (25HM)' ,  'name_short' =>  'Putricide (25HM)' );
		$sql_ary[] = array( 'id' => 300 , 'attribute_id' => 261, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blood Princes (25)' ,  'name_short' =>  'Princes (25)' );
		$sql_ary[] = array( 'id' => 301 , 'attribute_id' => 262, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blood Princes (25HM)' ,  'name_short' =>  'Princes (25HM)' );
		$sql_ary[] = array( 'id' => 302 , 'attribute_id' => 263, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blood-Queen Lana thel (25)' ,  'name_short' =>  'Lana thel (25)' );
		$sql_ary[] = array( 'id' => 303 , 'attribute_id' => 264, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Blood-Queen Lana thel (25HM)' ,  'name_short' =>  'Lana thel (25HM)' );
		$sql_ary[] = array( 'id' => 304 , 'attribute_id' => 265, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valithria Dreamwalker (25)' ,  'name_short' =>  'Valithria (25)' );
		$sql_ary[] = array( 'id' => 305 , 'attribute_id' => 266, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valithria Dreamwalker (25HM)' ,  'name_short' =>  'Valithria (25HM)' );
		$sql_ary[] = array( 'id' => 306 , 'attribute_id' => 267, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (25)' ,  'name_short' =>  'Sindragosa (25)' );
		$sql_ary[] = array( 'id' => 307 , 'attribute_id' => 268, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (25HM)' ,  'name_short' =>  'Sindragosa (25HM)' );
		$sql_ary[] = array( 'id' => 308 , 'attribute_id' => 269, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Lich King (25)' ,  'name_short' =>  'Lich King (25)' );
		$sql_ary[] = array( 'id' => 309 , 'attribute_id' => 270, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'The Lich King (25HM)' ,  'name_short' =>  'Lich King (25HM)' );
		$sql_ary[] = array( 'id' => 310 , 'attribute_id' => 271, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halion (10)' ,  'name_short' =>  'Halion (10)' );
		$sql_ary[] = array( 'id' => 311 , 'attribute_id' => 272, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halion (10HM)' ,  'name_short' =>  'Halion (10HM)' );
		$sql_ary[] = array( 'id' => 312 , 'attribute_id' => 273, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halion (25)' ,  'name_short' =>  'Halion (25)' );
		$sql_ary[] = array( 'id' => 313 , 'attribute_id' => 274, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halion (25HM)' ,  'name_short' =>  'Halion (25HM)' );
				
		$sql_ary[] = array( 'id' => 314 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Monstres divers' ,  'name_short' =>  'Misc' );
		$sql_ary[] = array( 'id' => 315 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Repaire d’Onyxia' ,  'name_short' =>  'Onyxia' );
		$sql_ary[] = array( 'id' => 316 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Dragons du Cauchemar' ,  'name_short' =>  'Cauchemar' );
		$sql_ary[] = array( 'id' => 317 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Zul’Gurub' ,  'name_short' =>  'ZG' );
		$sql_ary[] = array( 'id' => 318 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Repaire de l’Aile Noire' ,  'name_short' =>  'BWL' );
		$sql_ary[] = array( 'id' => 319 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Coeur du Magma' ,  'name_short' =>  'MC' );
		$sql_ary[] = array( 'id' => 320 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Ruines d’ Ahn’Qiraj' ,  'name_short' =>  'AQ20' );
		$sql_ary[] = array( 'id' => 321 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Temple d’ Ahn’Qiraj' ,  'name_short' =>  'AQ40' );
		$sql_ary[] = array( 'id' => 322 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas' ,  'name_short' =>  'Naxx' );
		$sql_ary[] = array( 'id' => 323 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Karazhan' ,  'name_short' =>  'Kara' );
		$sql_ary[] = array( 'id' => 324 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Zul’Aman' ,  'name_short' =>  'ZA' );
		$sql_ary[] = array( 'id' => 325 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Repaire de Gruul' ,  'name_short' =>  'GL' );
		$sql_ary[] = array( 'id' => 326 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Repaire de Magtheridon' ,  'name_short' =>  'Magtheridon' );
		$sql_ary[] = array( 'id' => 327 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Raid Outreterre Exterieur' ,  'name_short' =>  'Exterieur' );
		$sql_ary[] = array( 'id' => 328 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Caverne du sanctuaire du Serpent' ,  'name_short' =>  'SC' );
		$sql_ary[] = array( 'id' => 329 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'l’oeil' ,  'name_short' =>  'Oeil' );
		$sql_ary[] = array( 'id' => 330 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Sommet d’Hyjal' ,  'name_short' =>  'Hyjal' );
		$sql_ary[] = array( 'id' => 331 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Le Temple Noir' ,  'name_short' =>  'Temple' );
		$sql_ary[] = array( 'id' => 332 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Plateau du Puits de Soleil' ,  'name_short' =>  'Soleil' );
		$sql_ary[] = array( 'id' => 333 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas (10)' ,  'name_short' =>  'Naxx (10)' );
		$sql_ary[] = array( 'id' => 334 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas (25)' ,  'name_short' =>  'Naxx (25)' );
		$sql_ary[] = array( 'id' => 335 , 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Caveau d’Archavon (10)' ,  'name_short' =>  'VoA (10)' );
		$sql_ary[] = array( 'id' => 336 , 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Caveau d’Archavon (25)' ,  'name_short' =>  'VoA (25)' );
		$sql_ary[] = array( 'id' => 337 , 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Sanctum Obsidien (10)' ,  'name_short' =>  'OS (10)' );
		$sql_ary[] = array( 'id' => 338 , 'attribute_id' => 25, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Le Sanctum Obsidien (25)' ,  'name_short' =>  'OS (25)' );
		$sql_ary[] = array( 'id' => 339 , 'attribute_id' => 26, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'L’Oeil de l’Eternité (10)' ,  'name_short' =>  'EoE (10)' );
		$sql_ary[] = array( 'id' => 340 , 'attribute_id' => 27, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'L’Oeil de l’Eternité (25)' ,  'name_short' =>  'EoE (25)' );
		$sql_ary[] = array( 'id' => 341 , 'attribute_id' => 28, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Ulduar (10)' ,  'name_short' =>  'EoE (25)' );
		$sql_ary[] = array( 'id' => 342 , 'attribute_id' => 29, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Ulduar (25)' ,  'name_short' =>  '' );
		$sql_ary[] = array( 'id' => 343 , 'attribute_id' => 30, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'L’épreuve du croisé (10)' ,  'name_short' =>  'ToC (10)' );
		$sql_ary[] = array( 'id' => 344 , 'attribute_id' => 31, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'L’épreuve du croisé (25)' ,  'name_short' =>  'ToC (25)' );
		$sql_ary[] = array( 'id' => 345 , 'attribute_id' => 32, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'L’épreuve du croisé Héroique (10)' ,  'name_short' =>  'ToGC (10)' );
		$sql_ary[] = array( 'id' => 346 , 'attribute_id' => 33, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'L’épreuve du croisé Héroique (25)' ,  'name_short' =>  'ToGC (25)' );
		$sql_ary[] = array( 'id' => 347 , 'attribute_id' => 34, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Repaire d’Onyxia (10)' ,  'name_short' =>  'Onyxia (10)' );
		$sql_ary[] = array( 'id' => 348 , 'attribute_id' => 35, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Repaire d’Onyxia (25)' ,  'name_short' =>  'Onyxia (25)' );
		$sql_ary[] = array( 'id' => 349 , 'attribute_id' => 37, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Citadelle de la Couronne de glace (25)' ,  'name_short' =>  'ICC (25)' );
		$sql_ary[] = array( 'id' => 350 , 'attribute_id' => 36, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Citadelle de la Couronne de glace (10)' ,  'name_short' =>  'ICC (10)' );
		$sql_ary[] = array( 'id' => 351 , 'attribute_id' => 38, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Le Sanctum Rubis (10)' ,  'name_short' =>  'RS (10)' );
		$sql_ary[] = array( 'id' => 352 , 'attribute_id' => 39, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Le Sanctum Rubis (25)' ,  'name_short' =>  'RS (25)' );
		$sql_ary[] = array( 'id' => 353 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Azuregos' ,  'name_short' =>  'Azuregos' );
		$sql_ary[] = array( 'id' => 354 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur funeste Kazzak' ,  'name_short' =>  'Kazzak' );
		$sql_ary[] = array( 'id' => 355 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Onyxia' ,  'name_short' =>  'Onyxia' );
		$sql_ary[] = array( 'id' => 356 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ysondre' ,  'name_short' =>  'Ysondre' );
		$sql_ary[] = array( 'id' => 357 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Taerar' ,  'name_short' =>  'Taerar' );
		$sql_ary[] = array( 'id' => 358 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Emeriss' ,  'name_short' =>  'Emeriss' );
		$sql_ary[] = array( 'id' => 359 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lethon' ,  'name_short' =>  'Lethon' );
		$sql_ary[] = array( 'id' => 360 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur sanglant Mandokir' ,  'name_short' =>  'Mandokir' );
		$sql_ary[] = array( 'id' => 361 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Jin’do le Maléficieur' ,  'name_short' =>  'Jin’do' );
		$sql_ary[] = array( 'id' => 362 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gahz’ranka' ,  'name_short' =>  'Gahz’ranka' );
		$sql_ary[] = array( 'id' => 363 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gri’lek' ,  'name_short' =>  'Gri’lek' );
		$sql_ary[] = array( 'id' => 364 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Hazza’rah' ,  'name_short' =>  'Hazza’rah' );
		$sql_ary[] = array( 'id' => 365 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Renataki' ,  'name_short' =>  'Renataki' );
		$sql_ary[] = array( 'id' => 366 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Wushoolay' ,  'name_short' =>  'Wushoolay' );
		$sql_ary[] = array( 'id' => 367 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grand Prêtre Thekal' ,  'name_short' =>  'Thekal' );
		$sql_ary[] = array( 'id' => 368 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grande Prêtresse Arlokk' ,  'name_short' =>  'Arlokk' );
		$sql_ary[] = array( 'id' => 369 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grande Prêtresse Jeklik' ,  'name_short' =>  'Jeklik' );
		$sql_ary[] = array( 'id' => 370 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grande Prêtresse Mar’li' ,  'name_short' =>  'Mar’li' );
		$sql_ary[] = array( 'id' => 371 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grand Prêtre Venoxis' ,  'name_short' =>  'Venoxis' );
		$sql_ary[] = array( 'id' => 372 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Hakkar' ,  'name_short' =>  'Hakkar' );
		$sql_ary[] = array( 'id' => 373 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tranchetripe l’Indompté' ,  'name_short' =>  'Razorgore' );
		$sql_ary[] = array( 'id' => 374 , 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vaelastrasz le Corrompu' ,  'name_short' =>  'Vaelastrasz' );
		$sql_ary[] = array( 'id' => 375 , 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur des couvées Lanistaire' ,  'name_short' =>  'Lashlayer' );
		$sql_ary[] = array( 'id' => 376 , 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gueule-de-feu' ,  'name_short' =>  'Firemaw' );
		$sql_ary[] = array( 'id' => 377 , 'attribute_id' => 25, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Rochébène' ,  'name_short' =>  'Ebonroc' );
		$sql_ary[] = array( 'id' => 378 , 'attribute_id' => 26, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Flamegor' ,  'name_short' =>  'Flamegor' );
		$sql_ary[] = array( 'id' => 379 , 'attribute_id' => 27, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Chromaggus' ,  'name_short' =>  'Chromaggus' );
		$sql_ary[] = array( 'id' => 380 , 'attribute_id' => 28, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nefarian' ,  'name_short' =>  'Nefarian' );
		$sql_ary[] = array( 'id' => 381 , 'attribute_id' => 29, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lucifron' ,  'name_short' =>  'Lucifron' );
		$sql_ary[] = array( 'id' => 382 , 'attribute_id' => 30, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Magmadar' ,  'name_short' =>  'Magmadar' );
		$sql_ary[] = array( 'id' => 383 , 'attribute_id' => 31, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gehennas' ,  'name_short' =>  'Gehennas' );
		$sql_ary[] = array( 'id' => 384 , 'attribute_id' => 32, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Garr' ,  'name_short' =>  'Garr' );
		$sql_ary[] = array( 'id' => 385 , 'attribute_id' => 33, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Baron Geddon' ,  'name_short' =>  'Geddon' );
		$sql_ary[] = array( 'id' => 386 , 'attribute_id' => 34, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Shazzrah' ,  'name_short' =>  'Shazzrah' );
		$sql_ary[] = array( 'id' => 387 , 'attribute_id' => 35, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Messager de Sulfuron' ,  'name_short' =>  'Sulfuron' );
		$sql_ary[] = array( 'id' => 388 , 'attribute_id' => 36, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Golemagg l’Incinérateur' ,  'name_short' =>  'Golemagg' );
		$sql_ary[] = array( 'id' => 389 , 'attribute_id' => 37, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Chambellan Executus' ,  'name_short' =>  'Majordomo' );
		$sql_ary[] = array( 'id' => 390 , 'attribute_id' => 38, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ragnaros' ,  'name_short' =>  'Ragnaros' );
		$sql_ary[] = array( 'id' => 391 , 'attribute_id' => 39, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kurinnaxx' ,  'name_short' =>  'Kurinnaxx' );
		$sql_ary[] = array( 'id' => 392 , 'attribute_id' => 40, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Général Rajaxx' ,  'name_short' =>  'Rajaxx' );
		$sql_ary[] = array( 'id' => 393 , 'attribute_id' => 41, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ayamiss le Chasseur' ,  'name_short' =>  'Ayamiss' );
		$sql_ary[] = array( 'id' => 394 , 'attribute_id' => 42, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Buru Grandgosier' ,  'name_short' =>  'Buru' );
		$sql_ary[] = array( 'id' => 395 , 'attribute_id' => 43, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Moam' ,  'name_short' =>  'Moam' );
		$sql_ary[] = array( 'id' => 396 , 'attribute_id' => 44, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ossirian l’Intouché' ,  'name_short' =>  'Ossirian' );
		$sql_ary[] = array( 'id' => 397 , 'attribute_id' => 45, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le prophète Skeram' ,  'name_short' =>  'Skeram' );
		$sql_ary[] = array( 'id' => 398 , 'attribute_id' => 46, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Kri' ,  'name_short' =>  'Lord Kri' );
		$sql_ary[] = array( 'id' => 399 , 'attribute_id' => 47, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Princesse Yauj' ,  'name_short' =>  'Princess Yauj' );
		$sql_ary[] = array( 'id' => 400 , 'attribute_id' => 48, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vem' ,  'name_short' =>  'Vem' );
		$sql_ary[] = array( 'id' => 401 , 'attribute_id' => 49, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Garde de guerre Sartura' ,  'name_short' =>  'Sartura' );
		$sql_ary[] = array( 'id' => 402 , 'attribute_id' => 50, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Fankriss l’Inflexible' ,  'name_short' =>  'Fankriss' );
		$sql_ary[] = array( 'id' => 403 , 'attribute_id' => 51, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Princesse Huhuran' ,  'name_short' =>  'Huhuran' );
		$sql_ary[] = array( 'id' => 404 , 'attribute_id' => 52, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Viscidus' ,  'name_short' =>  'Viscidus' );
		$sql_ary[] = array( 'id' => 405 , 'attribute_id' => 53, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Empereur Vek’nilash' ,  'name_short' =>  'Vek’nilash' );
		$sql_ary[] = array( 'id' => 406 , 'attribute_id' => 54, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Empereur Vek’lor' ,  'name_short' =>  'Vek’lor' );
		$sql_ary[] = array( 'id' => 407 , 'attribute_id' => 55, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ouro' ,  'name_short' =>  'Ouro' );
		$sql_ary[] = array( 'id' => 408 , 'attribute_id' => 56, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'C’Thun' ,  'name_short' =>  'C’Thun' );
		$sql_ary[] = array( 'id' => 409 , 'attribute_id' => 57, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan' ,  'name_short' =>  'Anub’Rekhan' );
		$sql_ary[] = array( 'id' => 410 , 'attribute_id' => 58, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grande veuve Faerlina' ,  'name_short' =>  'Faerlina' );
		$sql_ary[] = array( 'id' => 411 , 'attribute_id' => 59, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Maexxna' ,  'name_short' =>  'Maexxna' );
		$sql_ary[] = array( 'id' => 412 , 'attribute_id' => 60, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Noth le Porte-peste' ,  'name_short' =>  'Noth' );
		$sql_ary[] = array( 'id' => 413 , 'attribute_id' => 61, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Heigan l’Impur' ,  'name_short' =>  'Heigan' );
		$sql_ary[] = array( 'id' => 414 , 'attribute_id' => 62, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Horreb' ,  'name_short' =>  'Loatheb' );
		$sql_ary[] = array( 'id' => 415 , 'attribute_id' => 63, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le Recousu' ,  'name_short' =>  'Patchwerk' );
		$sql_ary[] = array( 'id' => 416 , 'attribute_id' => 64, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus' ,  'name_short' =>  'Grobbulus' );
		$sql_ary[] = array( 'id' => 417 , 'attribute_id' => 65, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gluth' ,  'name_short' =>  'Gluth' );
		$sql_ary[] = array( 'id' => 418 , 'attribute_id' => 66, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thaddius' ,  'name_short' =>  'Thaddius' );
		$sql_ary[] = array( 'id' => 419 , 'attribute_id' => 67, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Instructeur Razuvious' ,  'name_short' =>  'Razuvious' );
		$sql_ary[] = array( 'id' => 420 , 'attribute_id' => 68, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gothik le Moissonneur' ,  'name_short' =>  'Gothik' );
		$sql_ary[] = array( 'id' => 421 , 'attribute_id' => 69, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thane Korth’azz' ,  'name_short' =>  'Korth’azz' );
		$sql_ary[] = array( 'id' => 422 , 'attribute_id' => 70, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dame Blaumeux' ,  'name_short' =>  'Blaumeux' );
		$sql_ary[] = array( 'id' => 423 , 'attribute_id' => 71, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Baron Vaillefendre' ,  'name_short' =>  'Mograine' );
		$sql_ary[] = array( 'id' => 424 , 'attribute_id' => 72, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sir Zeliek' ,  'name_short' =>  'Sir Zeliek' );
		$sql_ary[] = array( 'id' => 425 , 'attribute_id' => 73, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sapphiron' ,  'name_short' =>  'Sapphiron' );
		$sql_ary[] = array( 'id' => 426 , 'attribute_id' => 74, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad' ,  'name_short' =>  'Kel’Thuzad' );
		$sql_ary[] = array( 'id' => 427 , 'attribute_id' => 75, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Attumen le Veneur' ,  'name_short' =>  'Attumen' );
		$sql_ary[] = array( 'id' => 428 , 'attribute_id' => 76, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Moroes' ,  'name_short' =>  'Moroes' );
		$sql_ary[] = array( 'id' => 429 , 'attribute_id' => 77, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Damoiselle de vertu' ,  'name_short' =>  'Maiden' );
		$sql_ary[] = array( 'id' => 430 , 'attribute_id' => 78, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'L’Opéra' ,  'name_short' =>  'Opera' );
		$sql_ary[] = array( 'id' => 431 , 'attribute_id' => 79, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'The Conservateur' ,  'name_short' =>  'Curator' );
		$sql_ary[] = array( 'id' => 432 , 'attribute_id' => 80, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Terestian Malsabot' ,  'name_short' =>  'Terestian Illhoof' );
		$sql_ary[] = array( 'id' => 433 , 'attribute_id' => 81, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ombre d’Aran' ,  'name_short' =>  'Aran' );
		$sql_ary[] = array( 'id' => 434 , 'attribute_id' => 82, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'L’échiquier' ,  'name_short' =>  'Chess' );
		$sql_ary[] = array( 'id' => 435 , 'attribute_id' => 83, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Plaie-de-nuit' ,  'name_short' =>  'Netherspite' );
		$sql_ary[] = array( 'id' => 436 , 'attribute_id' => 84, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Prince Malchezaar' ,  'name_short' =>  'Malchezaar' );
		$sql_ary[] = array( 'id' => 437 , 'attribute_id' => 85, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dédain-du-Néant' ,  'name_short' =>  'Nightbane' );
		$sql_ary[] = array( 'id' => 438 , 'attribute_id' => 86, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nalorakk, Avatar d’Ours' ,  'name_short' =>  'Nalorakk' );
		$sql_ary[] = array( 'id' => 439 , 'attribute_id' => 87, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Akil’Zon, Avatar d’Aigle' ,  'name_short' =>  'Akil’Zon' );
		$sql_ary[] = array( 'id' => 440 , 'attribute_id' => 88, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halazzi, Avatar de Lynx' ,  'name_short' =>  'Halazzi' );
		$sql_ary[] = array( 'id' => 441 , 'attribute_id' => 89, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Jan’Alai, Avatar de Faucon-dragon' ,  'name_short' =>  'Jan’Alai' );
		$sql_ary[] = array( 'id' => 442 , 'attribute_id' => 90, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur des maléfices Malacrass' ,  'name_short' =>  'Malacrass' );
		$sql_ary[] = array( 'id' => 443 , 'attribute_id' => 91, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zul’Jin' ,  'name_short' =>  'Zul’Jin' );
		$sql_ary[] = array( 'id' => 444 , 'attribute_id' => 92, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Haut Roi Maulgar' ,  'name_short' =>  'Maulgar' );
		$sql_ary[] = array( 'id' => 445 , 'attribute_id' => 93, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gruul le Tue-dragon' ,  'name_short' =>  'Gruul' );
		$sql_ary[] = array( 'id' => 446 , 'attribute_id' => 94, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Magtheridon' ,  'name_short' =>  'Magtheridon' );
		$sql_ary[] = array( 'id' => 447 , 'attribute_id' => 95, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur funeste Kazzak' ,  'name_short' =>  'Doom Kazzak' );
		$sql_ary[] = array( 'id' => 448 , 'attribute_id' => 96, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Marche-funeste' ,  'name_short' =>  'Doomwalker' );
		$sql_ary[] = array( 'id' => 449 , 'attribute_id' => 97, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Hydross l’Instable' ,  'name_short' =>  'Hydross' );
		$sql_ary[] = array( 'id' => 450 , 'attribute_id' => 98, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur des fonds Karathress' ,  'name_short' =>  'Karathress' );
		$sql_ary[] = array( 'id' => 451 , 'attribute_id' => 99, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Morogrim Marcheur-des-flots' ,  'name_short' =>  'Morogrim' );
		$sql_ary[] = array( 'id' => 452 , 'attribute_id' => 100, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Leotheras l’Aveugle' ,  'name_short' =>  'Leotheras' );
		$sql_ary[] = array( 'id' => 453 , 'attribute_id' => 101, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le Rôdeur d’En bas' ,  'name_short' =>  'Lurker' );
		$sql_ary[] = array( 'id' => 454 , 'attribute_id' => 102, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dame Vashj' ,  'name_short' =>  'Vashj' );
		$sql_ary[] = array( 'id' => 455 , 'attribute_id' => 103, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Al’Ar Dieu phénix' ,  'name_short' =>  'Al’Ar' );
		$sql_ary[] = array( 'id' => 456 , 'attribute_id' => 104, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Saccageur du Vide' ,  'name_short' =>  'Reaver' );
		$sql_ary[] = array( 'id' => 457 , 'attribute_id' => 105, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grande astromancienne Solarian' ,  'name_short' =>  'Solarian' );
		$sql_ary[] = array( 'id' => 458 , 'attribute_id' => 106, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kael’thas Haut-soleil' ,  'name_short' =>  'Kaelthas' );
		$sql_ary[] = array( 'id' => 459 , 'attribute_id' => 107, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Rage Froidhiver' ,  'name_short' =>  'Winterchill' );
		$sql_ary[] = array( 'id' => 460 , 'attribute_id' => 108, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Anetheron' ,  'name_short' =>  'Anetheron' );
		$sql_ary[] = array( 'id' => 461 , 'attribute_id' => 109, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kaz’rogal' ,  'name_short' =>  'Kaz’rogal' );
		$sql_ary[] = array( 'id' => 462 , 'attribute_id' => 110, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Azgalor' ,  'name_short' =>  'Azgalor' );
		$sql_ary[] = array( 'id' => 463 , 'attribute_id' => 111, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Archimonde' ,  'name_short' =>  'Archimonde' );
		$sql_ary[] = array( 'id' => 464 , 'attribute_id' => 112, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grand seigneur de guerre Naj’entus' ,  'name_short' =>  'Naj’entus' );
		$sql_ary[] = array( 'id' => 465 , 'attribute_id' => 113, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Supremus' ,  'name_short' =>  'Supremus' );
		$sql_ary[] = array( 'id' => 466 , 'attribute_id' => 114, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ombre d’Akama' ,  'name_short' =>  'Akama' );
		$sql_ary[] = array( 'id' => 467 , 'attribute_id' => 115, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Teron Fielsang' ,  'name_short' =>  'Gorefiend' );
		$sql_ary[] = array( 'id' => 468 , 'attribute_id' => 116, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Essence de la souffrance' ,  'name_short' =>  'Essence' );
		$sql_ary[] = array( 'id' => 469 , 'attribute_id' => 117, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gurtogg Fièvresang' ,  'name_short' =>  'Bloodboil' );
		$sql_ary[] = array( 'id' => 470 , 'attribute_id' => 118, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mère Shahraz' ,  'name_short' =>  'Shahraz' );
		$sql_ary[] = array( 'id' => 471 , 'attribute_id' => 119, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Conseil Illidari' ,  'name_short' =>  'Council' );
		$sql_ary[] = array( 'id' => 472 , 'attribute_id' => 120, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Illidan Hurlorage' ,  'name_short' =>  'Illidan' );
		$sql_ary[] = array( 'id' => 473 , 'attribute_id' => 121, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kalecgos' ,  'name_short' =>  'Kalecgos' );
		$sql_ary[] = array( 'id' => 474 , 'attribute_id' => 122, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Brutallus' ,  'name_short' =>  'Brutallus' );
		$sql_ary[] = array( 'id' => 475 , 'attribute_id' => 123, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gangrebrume' ,  'name_short' =>  'Felmyst' );
		$sql_ary[] = array( 'id' => 476 , 'attribute_id' => 124, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grande démoniste Alythess' ,  'name_short' =>  'Twins' );
		$sql_ary[] = array( 'id' => 477 , 'attribute_id' => 125, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'M’uru' ,  'name_short' =>  'M’uru' );
		$sql_ary[] = array( 'id' => 478 , 'attribute_id' => 126, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kil’jaeden' ,  'name_short' =>  'Kil’jaeden' );
		$sql_ary[] = array( 'id' => 479 , 'attribute_id' => 127, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan (10)' ,  'name_short' =>  'Anub’Rekhan (10)' );
		$sql_ary[] = array( 'id' => 480 , 'attribute_id' => 128, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grande veuve Faerlina (10)' ,  'name_short' =>  'Faerlina (10)' );
		$sql_ary[] = array( 'id' => 481 , 'attribute_id' => 129, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Maexxna (10)' ,  'name_short' =>  'Maexxna (10)' );
		$sql_ary[] = array( 'id' => 482 , 'attribute_id' => 130, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Noth le Porte-peste (10)' ,  'name_short' =>  'Noth (10)' );
		$sql_ary[] = array( 'id' => 483 , 'attribute_id' => 131, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Heigan l’Impur (10)' ,  'name_short' =>  'Heigan (10)' );
		$sql_ary[] = array( 'id' => 484 , 'attribute_id' => 132, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Horreb (10)' ,  'name_short' =>  'Loatheb (10)' );
		$sql_ary[] = array( 'id' => 485 , 'attribute_id' => 133, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le Recousu (10)' ,  'name_short' =>  'Patchwerk (10)' );
		$sql_ary[] = array( 'id' => 486 , 'attribute_id' => 134, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus (10)' ,  'name_short' =>  'Grobbulus (10)' );
		$sql_ary[] = array( 'id' => 487 , 'attribute_id' => 135, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gluth (10)' ,  'name_short' =>  'Gluth (10)' );
		$sql_ary[] = array( 'id' => 488 , 'attribute_id' => 136, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thaddius (10)' ,  'name_short' =>  'Thaddius (10)' );
		$sql_ary[] = array( 'id' => 489 , 'attribute_id' => 137, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Instructeur Razuvious (10)' ,  'name_short' =>  'Razuvious (10)' );
		$sql_ary[] = array( 'id' => 490 , 'attribute_id' => 138, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gothik le Moissoneur (10)' ,  'name_short' =>  'Gothik (10)' );
		$sql_ary[] = array( 'id' => 491 , 'attribute_id' => 139, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les Quatre Cavaliers (10)' ,  'name_short' =>  'Korth’azz (10)' );
		$sql_ary[] = array( 'id' => 492 , 'attribute_id' => 140, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sapphiron (10)' ,  'name_short' =>  'Sapphiron (10)' );
		$sql_ary[] = array( 'id' => 493 , 'attribute_id' => 141, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad (10)' ,  'name_short' =>  'Kel’Thuzad (10)' );
		$sql_ary[] = array( 'id' => 494 , 'attribute_id' => 142, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan (25)' ,  'name_short' =>  'Anub’Rekhan (25)' );
		$sql_ary[] = array( 'id' => 495 , 'attribute_id' => 143, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grande veuve Faerlina (25)' ,  'name_short' =>  'Faerlina (25)' );
		$sql_ary[] = array( 'id' => 496 , 'attribute_id' => 144, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Maexxna (25)' ,  'name_short' =>  'Maexxna (25)' );
		$sql_ary[] = array( 'id' => 497 , 'attribute_id' => 145, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Noth le Porte-peste (25)' ,  'name_short' =>  'Noth (25)' );
		$sql_ary[] = array( 'id' => 498 , 'attribute_id' => 146, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Heigan l’Impur (25)' ,  'name_short' =>  'Heigan (25)' );
		$sql_ary[] = array( 'id' => 499 , 'attribute_id' => 147, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Horreb (25)' ,  'name_short' =>  'Loatheb (25)' );
		$sql_ary[] = array( 'id' => 500 , 'attribute_id' => 148, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le Recousu (25)' ,  'name_short' =>  'Patchwerk (25)' );
		$sql_ary[] = array( 'id' => 501 , 'attribute_id' => 149, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus (25)' ,  'name_short' =>  'Grobbulus (25)' );
		$sql_ary[] = array( 'id' => 502 , 'attribute_id' => 150, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gluth (25)' ,  'name_short' =>  'Gluth (25)' );
		$sql_ary[] = array( 'id' => 503 , 'attribute_id' => 151, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thaddius (25)' ,  'name_short' =>  'Thaddius (25)' );
		$sql_ary[] = array( 'id' => 504 , 'attribute_id' => 152, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Instructeur Razuvious (25)' ,  'name_short' =>  'Razuvious (25)' );
		$sql_ary[] = array( 'id' => 505 , 'attribute_id' => 153, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gothik le Moissoneur (25)' ,  'name_short' =>  'Gothik (25)' );
		$sql_ary[] = array( 'id' => 506 , 'attribute_id' => 154, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les Quatre Cavaliers (25)' ,  'name_short' =>  'Korth’azz (25)' );
		$sql_ary[] = array( 'id' => 507 , 'attribute_id' => 155, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sapphiron (25)' ,  'name_short' =>  'Sapphiron (25)' );
		$sql_ary[] = array( 'id' => 508 , 'attribute_id' => 156, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad (25)' ,  'name_short' =>  'Kel’Thuzad (25)' );
		$sql_ary[] = array( 'id' => 509 , 'attribute_id' => 157, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Malygos (10)' ,  'name_short' =>  'Malygos (10)' );
		$sql_ary[] = array( 'id' => 510 , 'attribute_id' => 158, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Archavon le Gardien des pierres (10)' ,  'name_short' =>  'Archavon (10)' );
		$sql_ary[] = array( 'id' => 511 , 'attribute_id' => 159, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Emalon le Guetteur d’orage (10)' ,  'name_short' =>  'Emalon (10)' );
		$sql_ary[] = array( 'id' => 512 , 'attribute_id' => 160, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Archavon le Gardien des pierres (25)' ,  'name_short' =>  'Archavon (25)' );
		$sql_ary[] = array( 'id' => 513 , 'attribute_id' => 161, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Emalon le Guetteur d’orage (25)' ,  'name_short' =>  'Emalon (25)' );
		$sql_ary[] = array( 'id' => 514 , 'attribute_id' => 162, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sartharion Le gardien d’Onyx 0 dragons (10)' ,  'name_short' =>  'Sartarion 0d (10)' );
		$sql_ary[] = array( 'id' => 515 , 'attribute_id' => 163, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sartharion Le gardien d’Onyx 1 dragons (10)' ,  'name_short' =>  'Sartarion 1d (10)' );
		$sql_ary[] = array( 'id' => 516 , 'attribute_id' => 164, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sartharion Le gardien d’Onyx 2 dragons (10)' ,  'name_short' =>  'Sartarion 2d (10)' );
		$sql_ary[] = array( 'id' => 517 , 'attribute_id' => 165, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sartharion Le gardien d’Onyx 3 dragons (10)' ,  'name_short' =>  'Sartarion 3d (10)' );
		$sql_ary[] = array( 'id' => 518 , 'attribute_id' => 166, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sartharion Le gardien d’Onyx 0 dragons (25)' ,  'name_short' =>  'Sartarion 0d (25)' );
		$sql_ary[] = array( 'id' => 519 , 'attribute_id' => 167, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sartharion Le gardien d’Onyx 1 dragons (25)' ,  'name_short' =>  'Sartarion 1d (25)' );
		$sql_ary[] = array( 'id' => 520 , 'attribute_id' => 168, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sartharion Le gardien d’Onyx 2 dragons (25)' ,  'name_short' =>  'Sartarion 2d (25)' );
		$sql_ary[] = array( 'id' => 521 , 'attribute_id' => 169, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sartharion Le gardien d’Onyx 3 dragons (25)' ,  'name_short' =>  'Sartarion 3d (25)' );
		$sql_ary[] = array( 'id' => 522 , 'attribute_id' => 170, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Malygos (25)' ,  'name_short' =>  'Malygos (25)' );
		$sql_ary[] = array( 'id' => 523 , 'attribute_id' => 171, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Léviathan des flammes (10)' ,  'name_short' =>  'Leviathan (10)' );
		$sql_ary[] = array( 'id' => 524 , 'attribute_id' => 172, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tranchécaille (10)' ,  'name_short' =>  'Razorscale (10)' );
		$sql_ary[] = array( 'id' => 525 , 'attribute_id' => 173, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Déconstructeur XT-002 (10)' ,  'name_short' =>  'Deconstructor (10)' );
		$sql_ary[] = array( 'id' => 526 , 'attribute_id' => 174, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ignis le maître de la Fournaise (10)' ,  'name_short' =>  'Ignis (10)' );
		$sql_ary[] = array( 'id' => 527 , 'attribute_id' => 175, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Brise-acier (10)' ,  'name_short' =>  'Assembly (10)' );
		$sql_ary[] = array( 'id' => 528 , 'attribute_id' => 176, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kologarn (10)' ,  'name_short' =>  'Kologarn (10)' );
		$sql_ary[] = array( 'id' => 529 , 'attribute_id' => 177, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Auriaya (10)' ,  'name_short' =>  'Auriaya (10)' );
		$sql_ary[] = array( 'id' => 530 , 'attribute_id' => 178, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mimiron (10)' ,  'name_short' =>  'Mimiron (10)' );
		$sql_ary[] = array( 'id' => 531 , 'attribute_id' => 179, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Hodir (10)' ,  'name_short' =>  'Hodir (10)' );
		$sql_ary[] = array( 'id' => 532 , 'attribute_id' => 180, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thorim (10)' ,  'name_short' =>  'Thorim (10)' );
		$sql_ary[] = array( 'id' => 533 , 'attribute_id' => 181, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Freya (10)' ,  'name_short' =>  'Freya (10)' );
		$sql_ary[] = array( 'id' => 534 , 'attribute_id' => 182, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Général Vezax (10)' ,  'name_short' =>  'Vezax (10)' );
		$sql_ary[] = array( 'id' => 535 , 'attribute_id' => 183, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Yogg-Saron (10)' ,  'name_short' =>  'Yogg-Saron (10)' );
		$sql_ary[] = array( 'id' => 536 , 'attribute_id' => 184, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Algalon (10)' ,  'name_short' =>  'Algalon (10)' );
		$sql_ary[] = array( 'id' => 537 , 'attribute_id' => 185, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Léviathan des flammes (25)' ,  'name_short' =>  'Leviathan (25)' );
		$sql_ary[] = array( 'id' => 538 , 'attribute_id' => 186, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tranchécaille (25)' ,  'name_short' =>  'Razorscale (25)' );
		$sql_ary[] = array( 'id' => 539 , 'attribute_id' => 187, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Déconstructeur XT-002 (25)' ,  'name_short' =>  'Deconstructor (25)' );
		$sql_ary[] = array( 'id' => 540 , 'attribute_id' => 188, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ignis le maître de la Fournaise (25)' ,  'name_short' =>  'Ignis (25)' );
		$sql_ary[] = array( 'id' => 541 , 'attribute_id' => 189, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Brise-acier (25)' ,  'name_short' =>  'Assembly (25)' );
		$sql_ary[] = array( 'id' => 542 , 'attribute_id' => 190, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kologarn (25)' ,  'name_short' =>  'Kologarn (25)' );
		$sql_ary[] = array( 'id' => 543 , 'attribute_id' => 191, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Auriaya (25)' ,  'name_short' =>  'Auriaya (25)' );
		$sql_ary[] = array( 'id' => 544 , 'attribute_id' => 192, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mimiron (25)' ,  'name_short' =>  'Mimiron (25)' );
		$sql_ary[] = array( 'id' => 545 , 'attribute_id' => 193, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Hodir (25)' ,  'name_short' =>  'Hodir (25)' );
		$sql_ary[] = array( 'id' => 546 , 'attribute_id' => 194, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thorim (25)' ,  'name_short' =>  'Thorim (25)' );
		$sql_ary[] = array( 'id' => 547 , 'attribute_id' => 195, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Freya (25)' ,  'name_short' =>  'Freya (25)' );
		$sql_ary[] = array( 'id' => 548 , 'attribute_id' => 196, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vezax (25)' ,  'name_short' =>  'Vezax (25)' );
		$sql_ary[] = array( 'id' => 549 , 'attribute_id' => 197, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Yogg-Saron (25)' ,  'name_short' =>  'Yogg-Saron (25)' );
		$sql_ary[] = array( 'id' => 550 , 'attribute_id' => 198, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Algalon (10)' ,  'name_short' =>  'Algalon (25)' );
		$sql_ary[] = array( 'id' => 551 , 'attribute_id' => 199, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les bêtes de Norfendre (10)' ,  'name_short' =>  'Beasts (10)' );
		$sql_ary[] = array( 'id' => 552 , 'attribute_id' => 200, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les champions du Colisée (10)' ,  'name_short' =>  'Champions (10)' );
		$sql_ary[] = array( 'id' => 553 , 'attribute_id' => 201, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Jaraxxus (10)' ,  'name_short' =>  'Jaraxxus (10)' );
		$sql_ary[] = array( 'id' => 554 , 'attribute_id' => 202, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les Jumelles Val’kyr (10)' ,  'name_short' =>  'Valkyrs (10)' );
		$sql_ary[] = array( 'id' => 555 , 'attribute_id' => 203, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (10)' ,  'name_short' =>  'Anub (10)' );
		$sql_ary[] = array( 'id' => 556 , 'attribute_id' => 204, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les bêtes de Norfendre (25)' ,  'name_short' =>  'Beasts (25)' );
		$sql_ary[] = array( 'id' => 557 , 'attribute_id' => 205, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les champions du Colisée (25)' ,  'name_short' =>  'Champions (25)' );
		$sql_ary[] = array( 'id' => 558 , 'attribute_id' => 206, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Jaraxxus (25)' ,  'name_short' =>  'Jaraxxus (25)' );
		$sql_ary[] = array( 'id' => 559 , 'attribute_id' => 207, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les Jumelles Val’kyr (25)' ,  'name_short' =>  'Valkyrs (25)' );
		$sql_ary[] = array( 'id' => 560 , 'attribute_id' => 208, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (25)' ,  'name_short' =>  'Anub (25)' );
		$sql_ary[] = array( 'id' => 561 , 'attribute_id' => 209, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les bêtes de Norfendre (10)' ,  'name_short' =>  'Beasts (10)' );
		$sql_ary[] = array( 'id' => 562 , 'attribute_id' => 210, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les champions du Colisée (10)' ,  'name_short' =>  'Champions (10)' );
		$sql_ary[] = array( 'id' => 563 , 'attribute_id' => 211, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Jaraxxus (10)' ,  'name_short' =>  'Jaraxxus (10)' );
		$sql_ary[] = array( 'id' => 564 , 'attribute_id' => 212, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les Jumelles Val’kyr (10)' ,  'name_short' =>  'Valkyrs (10)' );
		$sql_ary[] = array( 'id' => 565 , 'attribute_id' => 213, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (10)' ,  'name_short' =>  'Anub (10)' );
		$sql_ary[] = array( 'id' => 566 , 'attribute_id' => 214, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les bêtes de Norfendre (25)' ,  'name_short' =>  'Beasts (25)' );
		$sql_ary[] = array( 'id' => 567 , 'attribute_id' => 215, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les champions du Colisée (25)' ,  'name_short' =>  'Champions (25)' );
		$sql_ary[] = array( 'id' => 568 , 'attribute_id' => 216, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Jaraxxus (25)' ,  'name_short' =>  'Jaraxxus (25)' );
		$sql_ary[] = array( 'id' => 569 , 'attribute_id' => 217, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Les Jumelles Val’kyr (25)' ,  'name_short' =>  'Valkyrs (25)' );
		$sql_ary[] = array( 'id' => 570 , 'attribute_id' => 218, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (25)' ,  'name_short' =>  'Anub (25)' );
		$sql_ary[] = array( 'id' => 571 , 'attribute_id' => 219, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (10)' ,  'name_short' =>  'Onyxia (10)' );
		$sql_ary[] = array( 'id' => 572 , 'attribute_id' => 220, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (10)' ,  'name_short' =>  'Onyxia (10)' );
		$sql_ary[] = array( 'id' => 573 , 'attribute_id' => 221, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (25)' ,  'name_short' =>  'Onyxia (25)' );
		$sql_ary[] = array( 'id' => 574 , 'attribute_id' => 222, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (25)' ,  'name_short' =>  'Onyxia (25)' );
		$sql_ary[] = array( 'id' => 575 , 'attribute_id' => 223, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Gargamoelle (10)' ,  'name_short' =>  'Marrowgar (10)' );
		$sql_ary[] = array( 'id' => 576 , 'attribute_id' => 224, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Gargamoelle (10HM)' ,  'name_short' =>  'Marrowgar (10HM)' );
		$sql_ary[] = array( 'id' => 577 , 'attribute_id' => 225, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dame Murmemort (10)' ,  'name_short' =>  'Deathwisper (10)' );
		$sql_ary[] = array( 'id' => 578 , 'attribute_id' => 226, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dame Murmemort (10HM)' ,  'name_short' =>  'Deathwisper (10HM)' );
		$sql_ary[] = array( 'id' => 579 , 'attribute_id' => 227, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Armurerie de la canonnière (10)' ,  'name_short' =>  'Gunship (10)' );
		$sql_ary[] = array( 'id' => 580 , 'attribute_id' => 228, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Armurerie de la canonnière (10HM)' ,  'name_short' =>  'Gunship (10HM)' );
		$sql_ary[] = array( 'id' => 581 , 'attribute_id' => 229, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Porte-mort Saurcroc (10)' ,  'name_short' =>  'Saurfang (10)' );
		$sql_ary[] = array( 'id' => 582 , 'attribute_id' => 230, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Porte-mort Saurcroc (10HM)' ,  'name_short' =>  'Saurfang (10HM)' );
		$sql_ary[] = array( 'id' => 583 , 'attribute_id' => 231, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Pulentraille (10)' ,  'name_short' =>  'Festergut (10)' );
		$sql_ary[] = array( 'id' => 584 , 'attribute_id' => 232, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Pulentraille (10HM)' ,  'name_short' =>  'Festergut (10HM)' );
		$sql_ary[] = array( 'id' => 585 , 'attribute_id' => 233, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Trognepus (10)' ,  'name_short' =>  'Rotface (10)' );
		$sql_ary[] = array( 'id' => 586 , 'attribute_id' => 234, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Trognepus (10HM)' ,  'name_short' =>  'Rotface (10HM)' );
		$sql_ary[] = array( 'id' => 587 , 'attribute_id' => 235, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Professeur Putricide (10)' ,  'name_short' =>  'Putricide (10)' );
		$sql_ary[] = array( 'id' => 588 , 'attribute_id' => 236, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Professeur Putricide (10HM)' ,  'name_short' =>  'Putricide (10HM)' );
		$sql_ary[] = array( 'id' => 589 , 'attribute_id' => 237, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Prince Valanar (10)' ,  'name_short' =>  'Princes (10)' );
		$sql_ary[] = array( 'id' => 590 , 'attribute_id' => 238, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Prince Valanar (10HM)' ,  'name_short' =>  'Princes (10HM)' );
		$sql_ary[] = array( 'id' => 591 , 'attribute_id' => 239, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Reine de sang Lana’thel (10)' ,  'name_short' =>  'Lana thel (10)' );
		$sql_ary[] = array( 'id' => 592 , 'attribute_id' => 240, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Reine de sang Lana’thel (10HM)' ,  'name_short' =>  'Lana thel (10HM)' );
		$sql_ary[] = array( 'id' => 593 , 'attribute_id' => 241, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valithria Marcherêve (10)' ,  'name_short' =>  'Valithria (10)' );
		$sql_ary[] = array( 'id' => 594 , 'attribute_id' => 242, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valithria Marcherêve (10HM)' ,  'name_short' =>  'Valithria (10HM)' );
		$sql_ary[] = array( 'id' => 595 , 'attribute_id' => 243, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (10)' ,  'name_short' =>  'Sindragosa (10)' );
		$sql_ary[] = array( 'id' => 596 , 'attribute_id' => 244, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (10HM)' ,  'name_short' =>  'Sindragosa (10HM)' );
		$sql_ary[] = array( 'id' => 597 , 'attribute_id' => 245, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le Roi-liche (10)' ,  'name_short' =>  'Lich King (10)' );
		$sql_ary[] = array( 'id' => 598 , 'attribute_id' => 246, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le Roi-liche (10HM)' ,  'name_short' =>  'Lich King (10HM)' );
		$sql_ary[] = array( 'id' => 599 , 'attribute_id' => 247, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Gargamoelle (25)' ,  'name_short' =>  'Marrowgar (25)' );
		$sql_ary[] = array( 'id' => 600 , 'attribute_id' => 248, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Seigneur Gargamoelle (25HM)' ,  'name_short' =>  'Marrowgar (25HM)' );
		$sql_ary[] = array( 'id' => 601 , 'attribute_id' => 249, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dame Murmemort (25)' ,  'name_short' =>  'Deathwisper (25)' );
		$sql_ary[] = array( 'id' => 602 , 'attribute_id' => 250, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dame Murmemort (25HM)' ,  'name_short' =>  'Deathwisper (25HM)' );
		$sql_ary[] = array( 'id' => 603 , 'attribute_id' => 251, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Armurerie de la canonnière (25)' ,  'name_short' =>  'Gunship (25)' );
		$sql_ary[] = array( 'id' => 604 , 'attribute_id' => 252, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Armurerie de la canonnière (25HM)' ,  'name_short' =>  'Gunship (25HM)' );
		$sql_ary[] = array( 'id' => 605 , 'attribute_id' => 253, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Porte-mort Saurcroc (25)' ,  'name_short' =>  'Saurfang (25)' );
		$sql_ary[] = array( 'id' => 606 , 'attribute_id' => 254, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Porte-mort Saurcroc (25HM)' ,  'name_short' =>  'Saurfang (25HM)' );
		$sql_ary[] = array( 'id' => 607 , 'attribute_id' => 255, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Pulentraille (25)' ,  'name_short' =>  'Festergut (25)' );
		$sql_ary[] = array( 'id' => 608 , 'attribute_id' => 256, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Pulentraille (25HM)' ,  'name_short' =>  'Festergut (25HM)' );
		$sql_ary[] = array( 'id' => 609 , 'attribute_id' => 257, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Trognepus (25)' ,  'name_short' =>  'Rotface (25)' );
		$sql_ary[] = array( 'id' => 610 , 'attribute_id' => 258, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Trognepus (25HM)' ,  'name_short' =>  'Rotface (25HM)' );
		$sql_ary[] = array( 'id' => 611 , 'attribute_id' => 259, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Professeur Putricide (25)' ,  'name_short' =>  'Putricide (25)' );
		$sql_ary[] = array( 'id' => 612 , 'attribute_id' => 260, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Professeur Putricide (25HM)' ,  'name_short' =>  'Putricide (25HM)' );
		$sql_ary[] = array( 'id' => 613 , 'attribute_id' => 261, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Prince Valanar (25)' ,  'name_short' =>  'Princes (25)' );
		$sql_ary[] = array( 'id' => 614 , 'attribute_id' => 262, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Prince Valanar (25HM)' ,  'name_short' =>  'Princes (25HM)' );
		$sql_ary[] = array( 'id' => 615 , 'attribute_id' => 263, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Reine de sang Lana’thel (25)' ,  'name_short' =>  'Lana thel (25)' );
		$sql_ary[] = array( 'id' => 616 , 'attribute_id' => 264, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Reine de sang Lana’thel (25HM)' ,  'name_short' =>  'Lana thel (25HM)' );
		$sql_ary[] = array( 'id' => 617 , 'attribute_id' => 265, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valithria Marcherêve (25)' ,  'name_short' =>  'Valithria (25)' );
		$sql_ary[] = array( 'id' => 618 , 'attribute_id' => 266, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valithria Marcherêve (25HM)' ,  'name_short' =>  'Valithria (25HM)' );
		$sql_ary[] = array( 'id' => 619 , 'attribute_id' => 267, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (25)' ,  'name_short' =>  'Sindragosa (25)' );
		$sql_ary[] = array( 'id' => 620 , 'attribute_id' => 268, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (25HM)' ,  'name_short' =>  'Sindragosa (25HM)' );
		$sql_ary[] = array( 'id' => 621 , 'attribute_id' => 269, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le Roi-liche (25)' ,  'name_short' =>  'Lich King (25)' );
		$sql_ary[] = array( 'id' => 622 , 'attribute_id' => 270, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Le Roi-liche (25HM)' ,  'name_short' =>  'Lich King (25HM)' );
		$sql_ary[] = array( 'id' => 623 , 'attribute_id' => 271, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halion (10)' ,  'name_short' =>  'Halion (10)' );
		$sql_ary[] = array( 'id' => 624 , 'attribute_id' => 272, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halion (10HM)' ,  'name_short' =>  'Halion (10HM)' );
		$sql_ary[] = array( 'id' => 625 , 'attribute_id' => 273, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halion (25)' ,  'name_short' =>  'Halion (25)' );
		$sql_ary[] = array( 'id' => 626 , 'attribute_id' => 274, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halion (25HM)' ,  'name_short' =>  'Halion (25HM)' );
	
		// classes in en
		$sql_ary[] = array( 'id' => 627 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 628 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
		$sql_ary[] = array( 'id' => 629 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Rogue' ,  'name_short' =>  'Rogue' );
		$sql_ary[] = array( 'id' => 630 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Hunter' ,  'name_short' =>  'Hunter' );
		$sql_ary[] = array( 'id' => 631 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 632 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shaman' ,  'name_short' =>  'Shaman' );
		$sql_ary[] = array( 'id' => 633 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Druid' ,  'name_short' =>  'Druid' );
		$sql_ary[] = array( 'id' => 634 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warlock' ,  'name_short' =>  'Warlock' );
		$sql_ary[] = array( 'id' => 635 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Mage' ,  'name_short' =>  'Mage' );
		$sql_ary[] = array( 'id' => 636 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Priest' ,  'name_short' =>  'Priest' );
		$sql_ary[] = array( 'id' => 637 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Death Knight' ,  'name_short' =>  'Death Knight' );
	
		//classes in fr
		$sql_ary[] = array( 'id' => 638 , 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 639 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
		$sql_ary[] = array( 'id' => 640 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Voleur' ,  'name_short' =>  'Voleur' );
		$sql_ary[] = array( 'id' => 641 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chasseur' ,  'name_short' =>  'Chasseur' );
		$sql_ary[] = array( 'id' => 642 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 643 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chaman' ,  'name_short' =>  'Chaman' );
		$sql_ary[] = array( 'id' => 644 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Druide' ,  'name_short' =>  'Druide' );
		$sql_ary[] = array( 'id' => 645 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Démoniste' ,  'name_short' =>  'Démoniste' );
		$sql_ary[] = array( 'id' => 646 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Mage' ,  'name_short' =>  'Mage' );
		$sql_ary[] = array( 'id' => 647 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Prêtre' ,  'name_short' =>  'Prêtre' );
		$sql_ary[] = array( 'id' => 648 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chevalier de la Mort' ,  'name_short' =>  'Chevalier de la Mort' );
		
		//classes in de	
		$sql_ary[] = array( 'id' => 671 , 'attribute_id' => 0, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Unbekannt' ,  'name_short' =>  'Unbekannt' );
		$sql_ary[] = array( 'id' => 672 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Krieger' ,  'name_short' =>  'Krieger' );
		$sql_ary[] = array( 'id' => 673 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Schurke' ,  'name_short' =>  'Schurke' );
		$sql_ary[] = array( 'id' => 674 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Jäger' ,  'name_short' =>  'Jäger' );
		$sql_ary[] = array( 'id' => 675 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
		$sql_ary[] = array( 'id' => 676 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Schamane' ,  'name_short' =>  'Schamane' );
		$sql_ary[] = array( 'id' => 677 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Druide' ,  'name_short' =>  'Druide' );
		$sql_ary[] = array( 'id' => 678 , 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Hexenmeister' ,  'name_short' =>  'Hexenmeister' );
		$sql_ary[] = array( 'id' => 679 , 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Magier' ,  'name_short' =>  'Magier' );
		$sql_ary[] = array( 'id' => 680 , 'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Priester' ,  'name_short' =>  'Priester' );
		$sql_ary[] = array( 'id' => 681 , 'attribute_id' => 10, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Todesritter' ,  'name_short' =>  'Todesritter' );
					
		//races in en
		$sql_ary[] = array( 'id' => 649 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 650 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Human' ,  'name_short' =>  'Human' );
		$sql_ary[] = array( 'id' => 651 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Orc' ,  'name_short' =>  'Orc' );
		$sql_ary[] = array( 'id' => 652 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
		$sql_ary[] = array( 'id' => 653 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Night Elf' ,  'name_short' =>  'Night Elf' );
		$sql_ary[] = array( 'id' => 654 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Undead' ,  'name_short' =>  'Undead' );
		$sql_ary[] = array( 'id' => 655 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Tauren' ,  'name_short' =>  'Tauren' );
		$sql_ary[] = array( 'id' => 656 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
		$sql_ary[] = array( 'id' => 657 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 658 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Blood Elf' ,  'name_short' =>  'Blood Elf' );
		$sql_ary[] = array( 'id' => 659 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Draenei' ,  'name_short' =>  'Draenei' );
		
		// races in fr
		$sql_ary[] = array( 'id' => 660 , 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 661 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Humain' ,  'name_short' =>  'Humain' );
		$sql_ary[] = array( 'id' => 662 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Orc' ,  'name_short' =>  'Orc' );
		$sql_ary[] = array( 'id' => 663 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Nain' ,  'name_short' =>  'Nain' );
		$sql_ary[] = array( 'id' => 664 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elfe de la Nuit' ,  'name_short' =>  'Elfe de la Nuit' );
		$sql_ary[] = array( 'id' => 665 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Mort-Vivant' ,  'name_short' =>  'Mort-Vivant' );
		$sql_ary[] = array( 'id' => 666 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Tauren' ,  'name_short' =>  'Tauren' );
		$sql_ary[] = array( 'id' => 667 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
		$sql_ary[] = array( 'id' => 668 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 669 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elfe de Sang' ,  'name_short' =>  'Elfe de Sang' );
		$sql_ary[] = array( 'id' => 670 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Draeneï' ,  'name_short' =>  'Draeneï' );
				
		//races in de
		$sql_ary[] = array( 'id' => 682 , 'attribute_id' => 0, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 683 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Mensch' ,  'name_short' =>  'Mensch' );
		$sql_ary[] = array( 'id' => 684 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Orc' ,  'name_short' =>  'Orc' );
		$sql_ary[] = array( 'id' => 685 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Zwerg' ,  'name_short' =>  'Zwerg' );
		$sql_ary[] = array( 'id' => 686 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Nachtelf' ,  'name_short' =>  'Nachtelf' );
		$sql_ary[] = array( 'id' => 687 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Untoter' ,  'name_short' =>  'Untoter' );
		$sql_ary[] = array( 'id' => 688 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Tauren' ,  'name_short' =>  'Tauren' );
		$sql_ary[] = array( 'id' => 689 , 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
		$sql_ary[] = array( 'id' => 690 , 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
		$sql_ary[] = array( 'id' => 691 , 'attribute_id' => 10, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Blutelf' ,  'name_short' =>  'Blutelf' );
		$sql_ary[] = array( 'id' => 692 , 'attribute_id' => 11, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Draenei' ,  'name_short' =>  'Draenei' );
				
		// bosses en zones de	
		$sql_ary[] = array( 'id' => 693 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Verschiedene Bosse' ,  'name_short' =>  'Misc' );
		$sql_ary[] = array( 'id' => 694 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Onyxia’s Hort' ,  'name_short' =>  'Onyxia' );
		$sql_ary[] = array( 'id' => 695 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Smaragdgrünen Traum' ,  'name_short' =>  'Traum' );
		$sql_ary[] = array( 'id' => 696 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Zul’Gurub' ,  'name_short' =>  'ZG' );
		$sql_ary[] = array( 'id' => 697 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Der Pechschwingen Hort' ,  'name_short' =>  'BWL' );
		$sql_ary[] = array( 'id' => 698 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Geschmolzener Kern' ,  'name_short' =>  'MC' );
		$sql_ary[] = array( 'id' => 699 , 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Ruinen von Ahn’Qiraj' ,  'name_short' =>  'AQ20' );
		$sql_ary[] = array( 'id' => 700 , 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Tempel von Ahn’Qiraj' ,  'name_short' =>  'AQ40' );
		$sql_ary[] = array( 'id' => 701 , 'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas' ,  'name_short' =>  'Naxx' );
		$sql_ary[] = array( 'id' => 702 , 'attribute_id' => 10, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Karazhan' ,  'name_short' =>  'Kara' );
		$sql_ary[] = array( 'id' => 703 , 'attribute_id' => 11, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Zul’Aman' ,  'name_short' =>  'ZA' );
		$sql_ary[] = array( 'id' => 704 , 'attribute_id' => 12, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Gruuls Unterschlupf' ,  'name_short' =>  'GL' );
		$sql_ary[] = array( 'id' => 705 , 'attribute_id' => 13, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Magtheridons Hort' ,  'name_short' =>  'MG' );
		$sql_ary[] = array( 'id' => 706 , 'attribute_id' => 14, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Höllenfeuerhalbinsel Bosse' ,  'name_short' =>  'Höllenfeuerhalbinsel' );
		$sql_ary[] = array( 'id' => 707 , 'attribute_id' => 15, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Höhle des Schlangenschreins' ,  'name_short' =>  'SSC' );
		$sql_ary[] = array( 'id' => 708 , 'attribute_id' => 16, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Das Auge' ,  'name_short' =>  'TK' );
		$sql_ary[] = array( 'id' => 709 , 'attribute_id' => 17, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Hyjalgipfel' ,  'name_short' =>  'MH' );
		$sql_ary[] = array( 'id' => 710 , 'attribute_id' => 18, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Der Schwarze Tempel' ,  'name_short' =>  'BT' );
		$sql_ary[] = array( 'id' => 711 , 'attribute_id' => 19, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Sonnenbrunnenplateau' ,  'name_short' =>  'SW' );
		$sql_ary[] = array( 'id' => 712 , 'attribute_id' => 20, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas (10)' ,  'name_short' =>  'Naxx (10)' );
		$sql_ary[] = array( 'id' => 713 , 'attribute_id' => 21, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Naxxramas (25)' ,  'name_short' =>  'Naxx (25)' );
		$sql_ary[] = array( 'id' => 714 , 'attribute_id' => 22, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Archavons Kammer (10)' ,  'name_short' =>  'AK (10)' );
		$sql_ary[] = array( 'id' => 715 , 'attribute_id' => 23, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Archavons Kammer (25)' ,  'name_short' =>  'AK (25)' );
		$sql_ary[] = array( 'id' => 716 , 'attribute_id' => 24, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Das Obsidiansanktum (10)' ,  'name_short' =>  'OS (10)' );
		$sql_ary[] = array( 'id' => 717 , 'attribute_id' => 25, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Das Obsidiansanktum (25)' ,  'name_short' =>  'OS (25)' );
		$sql_ary[] = array( 'id' => 718 , 'attribute_id' => 26, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Das Auge der Ewigkeit (10)' ,  'name_short' =>  'EoE (10)' );
		$sql_ary[] = array( 'id' => 719 , 'attribute_id' => 27, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Das Auge der Ewigkeit (25)' ,  'name_short' =>  'EoE (25)' );
		$sql_ary[] = array( 'id' => 720 , 'attribute_id' => 28, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Ulduar (10)' ,  'name_short' =>  'UD (10)' );
		$sql_ary[] = array( 'id' => 721 , 'attribute_id' => 29, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Ulduar (25)' ,  'name_short' =>  'UD (25)' );
		$sql_ary[] = array( 'id' => 722 , 'attribute_id' => 30, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Prüfung des Kreuzfahrers (10)' ,  'name_short' =>  'PK (10)' );
		$sql_ary[] = array( 'id' => 723 , 'attribute_id' => 31, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Prüfung des Kreuzfahrers (25)' ,  'name_short' =>  'PK (25)' );
		$sql_ary[] = array( 'id' => 724 , 'attribute_id' => 32, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Prüfung des obersten Kreuzfahrers (10)' ,  'name_short' =>  'PoK (10)' );
		$sql_ary[] = array( 'id' => 725 , 'attribute_id' => 33, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Prüfung des obersten Kreuzfahrers (25)' ,  'name_short' =>  'PoK (25)' );
		$sql_ary[] = array( 'id' => 726 , 'attribute_id' => 34, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Onyxias Hort (10)' ,  'name_short' =>  'Ony (10)' );
		$sql_ary[] = array( 'id' => 727 , 'attribute_id' => 35, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Onyxias Hort (25)' ,  'name_short' =>  'Ony (25)' );
		$sql_ary[] = array( 'id' => 728 , 'attribute_id' => 37, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Eiskronenzitadelle (25)' ,  'name_short' =>  'ICC (25)' );
		$sql_ary[] = array( 'id' => 729 , 'attribute_id' => 36, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Eiskronenzitadelle (10)' ,  'name_short' =>  'ICC (10)' );
		$sql_ary[] = array( 'id' => 730 , 'attribute_id' => 38, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Das Rubinsanktum  (10)' ,  'name_short' =>  'RS (10)' );
		$sql_ary[] = array( 'id' => 731 , 'attribute_id' => 39, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Das Rubinsanktum  (25)' ,  'name_short' =>  'RS (25)' );
		$sql_ary[] = array( 'id' => 732 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Azuregos' ,  'name_short' =>  'Azuregos' );
		$sql_ary[] = array( 'id' => 733 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Verdammnislord Kazzak' ,  'name_short' =>  'Kazzak' );
		$sql_ary[] = array( 'id' => 734 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Onyxia' ,  'name_short' =>  'Onyxia' );
		$sql_ary[] = array( 'id' => 735 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Ysondre' ,  'name_short' =>  'Ysondre' );
		$sql_ary[] = array( 'id' => 736 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Taerar' ,  'name_short' =>  'Taerar' );
		$sql_ary[] = array( 'id' => 737 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Emeriss' ,  'name_short' =>  'Emeriss' );
		$sql_ary[] = array( 'id' => 738 , 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lethon' ,  'name_short' =>  'Lethon' );
		$sql_ary[] = array( 'id' => 739 , 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Blutfürst Mandokir' ,  'name_short' =>  'Mandokir' );
		$sql_ary[] = array( 'id' => 740 , 'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Jin’do der Verhexer' ,  'name_short' =>  'Jin’do' );
		$sql_ary[] = array( 'id' => 741 , 'attribute_id' => 10, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gahz’ranka' ,  'name_short' =>  'Gahz’ranka' );
		$sql_ary[] = array( 'id' => 742 , 'attribute_id' => 11, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gri’lek' ,  'name_short' =>  'Gri’lek' );
		$sql_ary[] = array( 'id' => 743 , 'attribute_id' => 12, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hazza’rah' ,  'name_short' =>  'Hazza’rah' );
		$sql_ary[] = array( 'id' => 744 , 'attribute_id' => 13, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Renataki' ,  'name_short' =>  'Renataki' );
		$sql_ary[] = array( 'id' => 745 , 'attribute_id' => 14, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Wushoolay' ,  'name_short' =>  'Wushoolay' );
		$sql_ary[] = array( 'id' => 746 , 'attribute_id' => 15, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hohepriester Thekal' ,  'name_short' =>  'Thekal' );
		$sql_ary[] = array( 'id' => 747 , 'attribute_id' => 16, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hohepriesterin Arlokk' ,  'name_short' =>  'Arlokk' );
		$sql_ary[] = array( 'id' => 748 , 'attribute_id' => 17, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hohepriesterin Jeklik' ,  'name_short' =>  'Jeklik' );
		$sql_ary[] = array( 'id' => 749 , 'attribute_id' => 18, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hohepriesterin Mar’li' ,  'name_short' =>  'Mar’li' );
		$sql_ary[] = array( 'id' => 750 , 'attribute_id' => 19, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hohepriester Venoxis' ,  'name_short' =>  'Venoxis' );
		$sql_ary[] = array( 'id' => 751 , 'attribute_id' => 20, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hakkar' ,  'name_short' =>  'Hakkar' );
		$sql_ary[] = array( 'id' => 752 , 'attribute_id' => 21, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Feuerkralle der Ungezähmte' ,  'name_short' =>  'Razorgore' );
		$sql_ary[] = array( 'id' => 753 , 'attribute_id' => 22, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Vaelastrasz der Verdorbene' ,  'name_short' =>  'Vaelastrasz' );
		$sql_ary[] = array( 'id' => 754 , 'attribute_id' => 23, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Brutwächter Dreschbringer' ,  'name_short' =>  'Lashlayer' );
		$sql_ary[] = array( 'id' => 755 , 'attribute_id' => 24, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Flammenmaul' ,  'name_short' =>  'Firemaw' );
		$sql_ary[] = array( 'id' => 756 , 'attribute_id' => 25, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Schattenschwinge' ,  'name_short' =>  'Ebonroc' );
		$sql_ary[] = array( 'id' => 757 , 'attribute_id' => 26, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Feuerschwinge' ,  'name_short' =>  'Flamegor' );
		$sql_ary[] = array( 'id' => 758 , 'attribute_id' => 27, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Chromaggus' ,  'name_short' =>  'Chromaggus' );
		$sql_ary[] = array( 'id' => 759 , 'attribute_id' => 28, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Nefarian' ,  'name_short' =>  'Nefarian' );
		$sql_ary[] = array( 'id' => 760 , 'attribute_id' => 29, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lucifron' ,  'name_short' =>  'Lucifron' );
		$sql_ary[] = array( 'id' => 761 , 'attribute_id' => 30, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Magmadar' ,  'name_short' =>  'Magmadar' );
		$sql_ary[] = array( 'id' => 762 , 'attribute_id' => 31, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gehennas' ,  'name_short' =>  'Gehennas' );
		$sql_ary[] = array( 'id' => 763 , 'attribute_id' => 32, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Garr' ,  'name_short' =>  'Garr' );
		$sql_ary[] = array( 'id' => 764 , 'attribute_id' => 33, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Baron Geddon' ,  'name_short' =>  'Geddon' );
		$sql_ary[] = array( 'id' => 765 , 'attribute_id' => 34, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Shazzrah' ,  'name_short' =>  'Shazzrah' );
		$sql_ary[] = array( 'id' => 766 , 'attribute_id' => 35, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sulfuronherold' ,  'name_short' =>  'Sulfuron' );
		$sql_ary[] = array( 'id' => 767 , 'attribute_id' => 36, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Golemagg der Verbrenner' ,  'name_short' =>  'Golemagg' );
		$sql_ary[] = array( 'id' => 768 , 'attribute_id' => 37, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Majordomus Exekutus' ,  'name_short' =>  'Majordomo' );
		$sql_ary[] = array( 'id' => 769 , 'attribute_id' => 38, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Ragnaros' ,  'name_short' =>  'Ragnaros' );
		$sql_ary[] = array( 'id' => 770 , 'attribute_id' => 39, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kurinnaxx' ,  'name_short' =>  'Kurinnaxx' );
		$sql_ary[] = array( 'id' => 771 , 'attribute_id' => 40, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'General Rajaxx' ,  'name_short' =>  'Rajaxx' );
		$sql_ary[] = array( 'id' => 772 , 'attribute_id' => 41, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Ayamiss der Jäger' ,  'name_short' =>  'Ayamiss' );
		$sql_ary[] = array( 'id' => 773 , 'attribute_id' => 42, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Buru der Verschlinger' ,  'name_short' =>  'Buru' );
		$sql_ary[] = array( 'id' => 774 , 'attribute_id' => 43, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Moam' ,  'name_short' =>  'Moam' );
		$sql_ary[] = array( 'id' => 775 , 'attribute_id' => 44, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Ossirian der Narbenlose' ,  'name_short' =>  'Ossirian' );
		$sql_ary[] = array( 'id' => 776 , 'attribute_id' => 45, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Der Prophet Skeram' ,  'name_short' =>  'Skeram' );
		$sql_ary[] = array( 'id' => 777 , 'attribute_id' => 46, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Kri' ,  'name_short' =>  'Lord Kri' );
		$sql_ary[] = array( 'id' => 778 , 'attribute_id' => 47, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Prinzessin Yauj' ,  'name_short' =>  'Princess Yauj' );
		$sql_ary[] = array( 'id' => 779 , 'attribute_id' => 48, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Vem' ,  'name_short' =>  'Vem' );
		$sql_ary[] = array( 'id' => 780 , 'attribute_id' => 49, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Schlachtwache Sartura' ,  'name_short' =>  'Sartura' );
		$sql_ary[] = array( 'id' => 781 , 'attribute_id' => 50, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fankriss der Unnachgiebige' ,  'name_short' =>  'Fankriss' );
		$sql_ary[] = array( 'id' => 782 , 'attribute_id' => 51, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Prinzessin Huhuran' ,  'name_short' =>  'Huhuran' );
		$sql_ary[] = array( 'id' => 783 , 'attribute_id' => 52, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Viscidus' ,  'name_short' =>  'Viscidus' );
		$sql_ary[] = array( 'id' => 784 , 'attribute_id' => 53, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Imperator Vek’nilash' ,  'name_short' =>  'Vek’nilash' );
		$sql_ary[] = array( 'id' => 785 , 'attribute_id' => 54, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Imperator Vek’lor' ,  'name_short' =>  'Vek’lor' );
		$sql_ary[] = array( 'id' => 786 , 'attribute_id' => 55, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Ouro' ,  'name_short' =>  'Ouro' );
		$sql_ary[] = array( 'id' => 787 , 'attribute_id' => 56, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'C’Thun' ,  'name_short' =>  'C’Thun' );
		$sql_ary[] = array( 'id' => 788 , 'attribute_id' => 57, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan' ,  'name_short' =>  'Anub’Rekhan' );
		$sql_ary[] = array( 'id' => 789 , 'attribute_id' => 58, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Großwitwe Faerlina' ,  'name_short' =>  'Faerlina' );
		$sql_ary[] = array( 'id' => 790 , 'attribute_id' => 59, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Maexxna' ,  'name_short' =>  'Maexxna' );
		$sql_ary[] = array( 'id' => 791 , 'attribute_id' => 60, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Noth der Seuchenfürst' ,  'name_short' =>  'Noth' );
		$sql_ary[] = array( 'id' => 792 , 'attribute_id' => 61, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Heigan der Unreine' ,  'name_short' =>  'Heigan' );
		$sql_ary[] = array( 'id' => 793 , 'attribute_id' => 62, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Loatheb' ,  'name_short' =>  'Loatheb' );
		$sql_ary[] = array( 'id' => 794 , 'attribute_id' => 63, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Flickwerk' ,  'name_short' =>  'Patchwerk' );
		$sql_ary[] = array( 'id' => 795 , 'attribute_id' => 64, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus' ,  'name_short' =>  'Grobbulus' );
		$sql_ary[] = array( 'id' => 796 , 'attribute_id' => 65, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gluth' ,  'name_short' =>  'Gluth' );
		$sql_ary[] = array( 'id' => 797 , 'attribute_id' => 66, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Thaddius' ,  'name_short' =>  'Thaddius' );
		$sql_ary[] = array( 'id' => 798 , 'attribute_id' => 67, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Instrukteur Razuvious' ,  'name_short' =>  'Razuvious' );
		$sql_ary[] = array( 'id' => 799 , 'attribute_id' => 68, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gothik der Ernter' ,  'name_short' =>  'Gothik' );
		$sql_ary[] = array( 'id' => 800 , 'attribute_id' => 69, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Thane Korth’azz' ,  'name_short' =>  'Korth’azz' );
		$sql_ary[] = array( 'id' => 801 , 'attribute_id' => 70, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lady Blaumeux' ,  'name_short' =>  'Blaumeux' );
		$sql_ary[] = array( 'id' => 802 , 'attribute_id' => 71, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hochlord Mograine' ,  'name_short' =>  'Mograine' );
		$sql_ary[] = array( 'id' => 803 , 'attribute_id' => 72, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sir Zeliek' ,  'name_short' =>  'Sir Zeliek' );
		$sql_ary[] = array( 'id' => 804 , 'attribute_id' => 73, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Saphiron' ,  'name_short' =>  'Sapphiron' );
		$sql_ary[] = array( 'id' => 805 , 'attribute_id' => 74, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad' ,  'name_short' =>  'Kel’Thuzad' );
		$sql_ary[] = array( 'id' => 806 , 'attribute_id' => 75, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Attumen der Jäger' ,  'name_short' =>  'Attumen' );
		$sql_ary[] = array( 'id' => 807 , 'attribute_id' => 76, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Moroes' ,  'name_short' =>  'Moroes' );
		$sql_ary[] = array( 'id' => 808 , 'attribute_id' => 77, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Tugendhafte Maid' ,  'name_short' =>  'Maiden' );
		$sql_ary[] = array( 'id' => 809 , 'attribute_id' => 78, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Opera Event' ,  'name_short' =>  'Opera' );
		$sql_ary[] = array( 'id' => 810 , 'attribute_id' => 79, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Der Kurator' ,  'name_short' =>  'Curator' );
		$sql_ary[] = array( 'id' => 811 , 'attribute_id' => 80, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Terestian Siechhuf' ,  'name_short' =>  'Terestian Illhoof' );
		$sql_ary[] = array( 'id' => 812 , 'attribute_id' => 81, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Arans Schemen' ,  'name_short' =>  'Aran' );
		$sql_ary[] = array( 'id' => 813 , 'attribute_id' => 82, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Schach Event' ,  'name_short' =>  'Chess' );
		$sql_ary[] = array( 'id' => 814 , 'attribute_id' => 83, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Nethergroll' ,  'name_short' =>  'Netherspite' );
		$sql_ary[] = array( 'id' => 815 , 'attribute_id' => 84, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Prinz Malchezaar' ,  'name_short' =>  'Malchezaar' );
		$sql_ary[] = array( 'id' => 816 , 'attribute_id' => 85, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Schrecken der Nacht' ,  'name_short' =>  'Nightbane' );
		$sql_ary[] = array( 'id' => 817 , 'attribute_id' => 86, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Nalorakk, Bär Avatar' ,  'name_short' =>  'Nalorakk' );
		$sql_ary[] = array( 'id' => 818 , 'attribute_id' => 87, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Akil’Zon, Adler Avatar' ,  'name_short' =>  'Akil’Zon' );
		$sql_ary[] = array( 'id' => 819 , 'attribute_id' => 88, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halazzi, Luchs Avatar' ,  'name_short' =>  'Halazzi' );
		$sql_ary[] = array( 'id' => 820 , 'attribute_id' => 89, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Jan’Alai, Drachenfalken Avatar' ,  'name_short' =>  'Jan’Alai' );
		$sql_ary[] = array( 'id' => 821 , 'attribute_id' => 90, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hexlord Malacrass' ,  'name_short' =>  'Malacrass' );
		$sql_ary[] = array( 'id' => 822 , 'attribute_id' => 91, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Zul’Jin' ,  'name_short' =>  'Zul’Jin' );
		$sql_ary[] = array( 'id' => 823 , 'attribute_id' => 92, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hochkönig Maulgar' ,  'name_short' =>  'Maulgar' );
		$sql_ary[] = array( 'id' => 824 , 'attribute_id' => 93, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gruul der Drachenschlächter' ,  'name_short' =>  'Gruul' );
		$sql_ary[] = array( 'id' => 825 , 'attribute_id' => 94, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Magtheridon' ,  'name_short' =>  'Magtheridon' );
		$sql_ary[] = array( 'id' => 826 , 'attribute_id' => 95, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Verdammnislord Kazzak' ,  'name_short' =>  'Doom Kazzak' );
		$sql_ary[] = array( 'id' => 827 , 'attribute_id' => 96, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Verdammniswandler' ,  'name_short' =>  'Doomwalker' );
		$sql_ary[] = array( 'id' => 828 , 'attribute_id' => 97, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hydross der Unstete' ,  'name_short' =>  'Hydross' );
		$sql_ary[] = array( 'id' => 829 , 'attribute_id' => 98, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Tiefenlord Karathress' ,  'name_short' =>  'Karathress' );
		$sql_ary[] = array( 'id' => 830 , 'attribute_id' => 99, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Morogrim Gezeitenwandler' ,  'name_short' =>  'Morogrim' );
		$sql_ary[] = array( 'id' => 831 , 'attribute_id' => 100, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Leotheras l’Aveugle' ,  'name_short' =>  'Leotheras' );
		$sql_ary[] = array( 'id' => 832 , 'attribute_id' => 101, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Das Grauen aus der Tiefe' ,  'name_short' =>  'Lurker' );
		$sql_ary[] = array( 'id' => 833 , 'attribute_id' => 102, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lady Vashj' ,  'name_short' =>  'Vashj' );
		$sql_ary[] = array( 'id' => 834 , 'attribute_id' => 103, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Al’Ar der Phönixgott' ,  'name_short' =>  'Al’Ar' );
		$sql_ary[] = array( 'id' => 835 , 'attribute_id' => 104, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Leerhäscher' ,  'name_short' =>  'Reaver' );
		$sql_ary[] = array( 'id' => 836 , 'attribute_id' => 105, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hochastromantin Solarian' ,  'name_short' =>  'Solarian' );
		$sql_ary[] = array( 'id' => 837 , 'attribute_id' => 106, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kael’thas Sonnenwanderer' ,  'name_short' =>  'Kaelthas' );
		$sql_ary[] = array( 'id' => 838 , 'attribute_id' => 107, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Furor Winterfrost' ,  'name_short' =>  'Winterchill' );
		$sql_ary[] = array( 'id' => 839 , 'attribute_id' => 108, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Anetheron' ,  'name_short' =>  'Anetheron' );
		$sql_ary[] = array( 'id' => 840 , 'attribute_id' => 109, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kaz’rogal' ,  'name_short' =>  'Kaz’rogal' );
		$sql_ary[] = array( 'id' => 841 , 'attribute_id' => 110, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Azgalor' ,  'name_short' =>  'Azgalor' );
		$sql_ary[] = array( 'id' => 842 , 'attribute_id' => 111, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Archimonde' ,  'name_short' =>  'Archimonde' );
		$sql_ary[] = array( 'id' => 843 , 'attribute_id' => 112, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Oberster Kriegsfürst Naj’entus' ,  'name_short' =>  'Naj’entus' );
		$sql_ary[] = array( 'id' => 844 , 'attribute_id' => 113, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Supremus' ,  'name_short' =>  'Supremus' );
		$sql_ary[] = array( 'id' => 845 , 'attribute_id' => 114, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Akamas Schemen' ,  'name_short' =>  'Akama' );
		$sql_ary[] = array( 'id' => 846 , 'attribute_id' => 115, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Teron Blutschatten' ,  'name_short' =>  'Gorefiend' );
		$sql_ary[] = array( 'id' => 847 , 'attribute_id' => 116, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Essenz des Leidens' ,  'name_short' =>  'Essence' );
		$sql_ary[] = array( 'id' => 848 , 'attribute_id' => 117, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gurtogg Siedeblut' ,  'name_short' =>  'Bloodboil' );
		$sql_ary[] = array( 'id' => 849 , 'attribute_id' => 118, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Mutter Shahraz' ,  'name_short' =>  'Shahraz' );
		$sql_ary[] = array( 'id' => 850 , 'attribute_id' => 119, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Der Rat der Illidari' ,  'name_short' =>  'Council' );
		$sql_ary[] = array( 'id' => 851 , 'attribute_id' => 120, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Illidan Sturmgrimm' ,  'name_short' =>  'Illidan' );
		$sql_ary[] = array( 'id' => 852 , 'attribute_id' => 121, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kalecgos' ,  'name_short' =>  'Kalecgos' );
		$sql_ary[] = array( 'id' => 853 , 'attribute_id' => 122, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Brutallus' ,  'name_short' =>  'Brutallus' );
		$sql_ary[] = array( 'id' => 854 , 'attribute_id' => 123, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Teufelsruch' ,  'name_short' =>  'Felmyst' );
		$sql_ary[] = array( 'id' => 855 , 'attribute_id' => 124, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Alythess & Sacrolash' ,  'name_short' =>  'Twins' );
		$sql_ary[] = array( 'id' => 856 , 'attribute_id' => 125, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'M’uru' ,  'name_short' =>  'M’uru' );
		$sql_ary[] = array( 'id' => 857 , 'attribute_id' => 126, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kil’jaeden' ,  'name_short' =>  'Kil’jaeden' );
		$sql_ary[] = array( 'id' => 858 , 'attribute_id' => 127, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan (10)' ,  'name_short' =>  'Anub’Rekhan (10)' );
		$sql_ary[] = array( 'id' => 859 , 'attribute_id' => 128, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Großwitwe Faerlina (10)' ,  'name_short' =>  'Faerlina (10)' );
		$sql_ary[] = array( 'id' => 860 , 'attribute_id' => 129, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Maexxna (10)' ,  'name_short' =>  'Maexxna (10)' );
		$sql_ary[] = array( 'id' => 861 , 'attribute_id' => 130, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Noth der Seuchenfürst (10)' ,  'name_short' =>  'Noth (10)' );
		$sql_ary[] = array( 'id' => 862 , 'attribute_id' => 131, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Heigan der Unreine (10)' ,  'name_short' =>  'Heigan (10)' );
		$sql_ary[] = array( 'id' => 863 , 'attribute_id' => 132, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Loatheb (10)' ,  'name_short' =>  'Loatheb (10)' );
		$sql_ary[] = array( 'id' => 864 , 'attribute_id' => 133, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Flickwerk (10)' ,  'name_short' =>  'Patchwerk (10)' );
		$sql_ary[] = array( 'id' => 865 , 'attribute_id' => 134, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus (10)' ,  'name_short' =>  'Grobbulus (10)' );
		$sql_ary[] = array( 'id' => 866 , 'attribute_id' => 135, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gluth (10)' ,  'name_short' =>  'Gluth (10)' );
		$sql_ary[] = array( 'id' => 867 , 'attribute_id' => 136, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Thaddius (10)' ,  'name_short' =>  'Thaddius (10)' );
		$sql_ary[] = array( 'id' => 868 , 'attribute_id' => 137, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Instrukteur Razuvious (10)' ,  'name_short' =>  'Razuvious (10)' );
		$sql_ary[] = array( 'id' => 869 , 'attribute_id' => 138, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gothik der Ernter (10)' ,  'name_short' =>  'Gothik (10)' );
		$sql_ary[] = array( 'id' => 870 , 'attribute_id' => 139, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Vier Pferdemenschen (10)' ,  'name_short' =>  'Korth’azz (10)' );
		$sql_ary[] = array( 'id' => 871 , 'attribute_id' => 140, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Saphiron (10)' ,  'name_short' =>  'Sapphiron (10)' );
		$sql_ary[] = array( 'id' => 872 , 'attribute_id' => 141, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad (10)' ,  'name_short' =>  'Kel’Thuzad (10)' );
		$sql_ary[] = array( 'id' => 873 , 'attribute_id' => 142, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Anub’Rekhan (25)' ,  'name_short' =>  'Anub’Rekhan (25)' );
		$sql_ary[] = array( 'id' => 874 , 'attribute_id' => 143, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Großwitwe Faerlina (25)' ,  'name_short' =>  'Faerlina (25)' );
		$sql_ary[] = array( 'id' => 875 , 'attribute_id' => 144, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Maexxna (25)' ,  'name_short' =>  'Maexxna (25)' );
		$sql_ary[] = array( 'id' => 876 , 'attribute_id' => 145, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Noth der Seuchenfürst (25)' ,  'name_short' =>  'Noth (25)' );
		$sql_ary[] = array( 'id' => 877 , 'attribute_id' => 146, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Heigan der Unreine (25)' ,  'name_short' =>  'Heigan (25)' );
		$sql_ary[] = array( 'id' => 878 , 'attribute_id' => 147, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Loatheb (25)' ,  'name_short' =>  'Loatheb (25)' );
		$sql_ary[] = array( 'id' => 879 , 'attribute_id' => 148, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Flickwerk (25)' ,  'name_short' =>  'Patchwerk (25)' );
		$sql_ary[] = array( 'id' => 880 , 'attribute_id' => 149, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Grobbulus (25)' ,  'name_short' =>  'Grobbulus (25)' );
		$sql_ary[] = array( 'id' => 881 , 'attribute_id' => 150, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gluth (25)' ,  'name_short' =>  'Gluth (25)' );
		$sql_ary[] = array( 'id' => 882 , 'attribute_id' => 151, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Thaddius (25)' ,  'name_short' =>  'Thaddius (25)' );
		$sql_ary[] = array( 'id' => 883 , 'attribute_id' => 152, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Instrukteur Razuvious (25)' ,  'name_short' =>  'Razuvious (25)' );
		$sql_ary[] = array( 'id' => 884 , 'attribute_id' => 153, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Gothik der Ernter  (25)' ,  'name_short' =>  'Gothik (25)' );
		$sql_ary[] = array( 'id' => 885 , 'attribute_id' => 154, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Vier Pferdemenschen (25)' ,  'name_short' =>  'Korth’azz (25)' );
		$sql_ary[] = array( 'id' => 886 , 'attribute_id' => 155, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Saphiron (25)' ,  'name_short' =>  'Sapphiron (25)' );
		$sql_ary[] = array( 'id' => 887 , 'attribute_id' => 156, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kel’Thuzad (25)' ,  'name_short' =>  'Kel’Thuzad (25)' );
		$sql_ary[] = array( 'id' => 888 , 'attribute_id' => 157, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Malygos (10)' ,  'name_short' =>  'Malygos (10)' );
		$sql_ary[] = array( 'id' => 889 , 'attribute_id' => 158, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Archavon der Steinwächter (10)' ,  'name_short' =>  'Archavon (10)' );
		$sql_ary[] = array( 'id' => 890 , 'attribute_id' => 159, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Emalon der Sturmwächter (10)' ,  'name_short' =>  'Emalon (10)' );
		$sql_ary[] = array( 'id' => 891 , 'attribute_id' => 160, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Archavon der Steinwächter (25)' ,  'name_short' =>  'Archavon (25)' );
		$sql_ary[] = array( 'id' => 892 , 'attribute_id' => 161, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Emalon der Sturmwächter (25)' ,  'name_short' =>  'Emalon (25)' );
		$sql_ary[] = array( 'id' => 893 , 'attribute_id' => 162, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sartharion der Onyxwächter keine Drachen (10)' ,  'name_short' =>  'Sartarion 0d (10)' );
		$sql_ary[] = array( 'id' => 894 , 'attribute_id' => 163, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sartharion der Onyxwächter ein Drache (10)' ,  'name_short' =>  'Sartarion 1d (10)' );
		$sql_ary[] = array( 'id' => 895 , 'attribute_id' => 164, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sartharion der Onyxwächter zwei Drachen (10)' ,  'name_short' =>  'Sartarion 2d (10)' );
		$sql_ary[] = array( 'id' => 896 , 'attribute_id' => 165, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sartharion der Onyxwächter drei Drachen (10)' ,  'name_short' =>  'Sartarion 3d (10)' );
		$sql_ary[] = array( 'id' => 897 , 'attribute_id' => 166, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sartharion der Onyxwächter keine Drachen (25)' ,  'name_short' =>  'Sartarion 0d (25)' );
		$sql_ary[] = array( 'id' => 898 , 'attribute_id' => 167, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sartharion der Onyxwächter ein Drache (25)' ,  'name_short' =>  'Sartarion 1d (25)' );
		$sql_ary[] = array( 'id' => 899 , 'attribute_id' => 168, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sartharion der Onyxwächter zwei Drachen (25)' ,  'name_short' =>  'Sartarion 2d (25)' );
		$sql_ary[] = array( 'id' => 900 , 'attribute_id' => 169, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sartharion der Onyxwächter drei Drachen (25)' ,  'name_short' =>  'Sartarion 3d (25)' );
		$sql_ary[] = array( 'id' => 901 , 'attribute_id' => 170, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Malygos (25)' ,  'name_short' =>  'Malygos (25)' );
		$sql_ary[] = array( 'id' => 902 , 'attribute_id' => 171, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Flammenleviathan (10)' ,  'name_short' =>  'Leviathan (10)' );
		$sql_ary[] = array( 'id' => 903 , 'attribute_id' => 172, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Klingenschuppe (10)' ,  'name_short' =>  'Razorscale (10)' );
		$sql_ary[] = array( 'id' => 904 , 'attribute_id' => 173, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'XT-002 Dekonstruktor (10)' ,  'name_short' =>  'Deconstructor (10)' );
		$sql_ary[] = array( 'id' => 905 , 'attribute_id' => 174, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Ignis, Meister des Eisenwerks (10)' ,  'name_short' =>  'Ignis (10)' );
		$sql_ary[] = array( 'id' => 906 , 'attribute_id' => 175, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Stahlbrecher (10)' ,  'name_short' =>  'Assembly (10)' );
		$sql_ary[] = array( 'id' => 907 , 'attribute_id' => 176, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kologarn (10)' ,  'name_short' =>  'Kologarn (10)' );
		$sql_ary[] = array( 'id' => 908 , 'attribute_id' => 177, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Auriaya (10)' ,  'name_short' =>  'Auriaya (10)' );
		$sql_ary[] = array( 'id' => 909 , 'attribute_id' => 178, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Mimiron (10)' ,  'name_short' =>  'Mimiron (10)' );
		$sql_ary[] = array( 'id' => 910 , 'attribute_id' => 179, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hodir (10)' ,  'name_short' =>  'Hodir (10)' );
		$sql_ary[] = array( 'id' => 911 , 'attribute_id' => 180, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Thorim (10)' ,  'name_short' =>  'Thorim (10)' );
		$sql_ary[] = array( 'id' => 912 , 'attribute_id' => 181, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Freya (10)' ,  'name_short' =>  'Freya (10)' );
		$sql_ary[] = array( 'id' => 913 , 'attribute_id' => 182, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'General Vezax (10)' ,  'name_short' =>  'Vezax (10)' );
		$sql_ary[] = array( 'id' => 914 , 'attribute_id' => 183, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Yogg-Saron (10)' ,  'name_short' =>  'Yogg-Saron (10)' );
		$sql_ary[] = array( 'id' => 915 , 'attribute_id' => 184, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Algalon der Beobachter (10)' ,  'name_short' =>  'Algalon (10)' );
		$sql_ary[] = array( 'id' => 916 , 'attribute_id' => 185, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Flammenleviathan (25)' ,  'name_short' =>  'Leviathan (25)' );
		$sql_ary[] = array( 'id' => 917 , 'attribute_id' => 186, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Klingenschuppe (25)' ,  'name_short' =>  'Razorscale (25)' );
		$sql_ary[] = array( 'id' => 918 , 'attribute_id' => 187, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'XT-002 Dekonstruktor (25)' ,  'name_short' =>  'Deconstructor (25)' );
		$sql_ary[] = array( 'id' => 919 , 'attribute_id' => 188, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Ignis, Meister des Eisenwerks (25)' ,  'name_short' =>  'Ignis (25)' );
		$sql_ary[] = array( 'id' => 920 , 'attribute_id' => 189, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Stahlbrecher (25)' ,  'name_short' =>  'Assembly (25)' );
		$sql_ary[] = array( 'id' => 921 , 'attribute_id' => 190, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Kologarn (25)' ,  'name_short' =>  'Kologarn (25)' );
		$sql_ary[] = array( 'id' => 922 , 'attribute_id' => 191, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Auriaya (25)' ,  'name_short' =>  'Auriaya (25)' );
		$sql_ary[] = array( 'id' => 923 , 'attribute_id' => 192, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Mimiron (25)' ,  'name_short' =>  'Mimiron (25)' );
		$sql_ary[] = array( 'id' => 924 , 'attribute_id' => 193, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Hodir (25)' ,  'name_short' =>  'Hodir (25)' );
		$sql_ary[] = array( 'id' => 925 , 'attribute_id' => 194, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Thorim (25)' ,  'name_short' =>  'Thorim (25)' );
		$sql_ary[] = array( 'id' => 926 , 'attribute_id' => 195, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Freya (25)' ,  'name_short' =>  'Freya (25)' );
		$sql_ary[] = array( 'id' => 927 , 'attribute_id' => 196, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Vezax (25)' ,  'name_short' =>  'Vezax (25)' );
		$sql_ary[] = array( 'id' => 928 , 'attribute_id' => 197, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Yogg-Saron (25)' ,  'name_short' =>  'Yogg-Saron (25)' );
		$sql_ary[] = array( 'id' => 929 , 'attribute_id' => 198, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Algalon (10)' ,  'name_short' =>  'Algalon (25)' );
		$sql_ary[] = array( 'id' => 930 , 'attribute_id' => 199, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Die Bestien von Nordend (10)' ,  'name_short' =>  'Beasts (10)' );
		$sql_ary[] = array( 'id' => 931 , 'attribute_id' => 200, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fraktionschampions (10)' ,  'name_short' =>  'Champions (10)' );
		$sql_ary[] = array( 'id' => 932 , 'attribute_id' => 201, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Jaraxxus (10)' ,  'name_short' =>  'Jaraxxus (10)' );
		$sql_ary[] = array( 'id' => 933 , 'attribute_id' => 202, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Zwillings Val’kyr (10)' ,  'name_short' =>  'Valkyrs (10)' );
		$sql_ary[] = array( 'id' => 934 , 'attribute_id' => 203, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (10)' ,  'name_short' =>  'Anub (10)' );
		$sql_ary[] = array( 'id' => 935 , 'attribute_id' => 204, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Die Bestien von Nordend (25)' ,  'name_short' =>  'Beasts (25)' );
		$sql_ary[] = array( 'id' => 936 , 'attribute_id' => 205, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fraktionschampions (25)' ,  'name_short' =>  'Champions (25)' );
		$sql_ary[] = array( 'id' => 937 , 'attribute_id' => 206, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Jaraxxus (25)' ,  'name_short' =>  'Jaraxxus (25)' );
		$sql_ary[] = array( 'id' => 938 , 'attribute_id' => 207, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Zwillings Val’kyr (25)' ,  'name_short' =>  'Valkyrs (25)' );
		$sql_ary[] = array( 'id' => 939 , 'attribute_id' => 208, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (25)' ,  'name_short' =>  'Anub (25)' );
		$sql_ary[] = array( 'id' => 940 , 'attribute_id' => 209, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Die Bestien von Nordend (10)' ,  'name_short' =>  'Beasts (10)' );
		$sql_ary[] = array( 'id' => 941 , 'attribute_id' => 210, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fraktionschampions (10)' ,  'name_short' =>  'Champions (10)' );
		$sql_ary[] = array( 'id' => 942 , 'attribute_id' => 211, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Jaraxxus (10)' ,  'name_short' =>  'Jaraxxus (10)' );
		$sql_ary[] = array( 'id' => 943 , 'attribute_id' => 212, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Zwillings Val’kyr (10)' ,  'name_short' =>  'Valkyrs (10)' );
		$sql_ary[] = array( 'id' => 944 , 'attribute_id' => 213, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (10)' ,  'name_short' =>  'Anub (10)' );
		$sql_ary[] = array( 'id' => 945 , 'attribute_id' => 214, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Die Bestien von Nordend (25)' ,  'name_short' =>  'Beasts (25)' );
		$sql_ary[] = array( 'id' => 946 , 'attribute_id' => 215, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fraktionschampions (25)' ,  'name_short' =>  'Champions (25)' );
		$sql_ary[] = array( 'id' => 947 , 'attribute_id' => 216, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Jaraxxus (25)' ,  'name_short' =>  'Jaraxxus (25)' );
		$sql_ary[] = array( 'id' => 948 , 'attribute_id' => 217, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Zwillings Val’kyr (25)' ,  'name_short' =>  'Valkyrs (25)' );
		$sql_ary[] = array( 'id' => 949 , 'attribute_id' => 218, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Anub Arak (25)' ,  'name_short' =>  'Anub (25)' );
		$sql_ary[] = array( 'id' => 950 , 'attribute_id' => 219, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (10)' ,  'name_short' =>  'Onyxia (10)' );
		$sql_ary[] = array( 'id' => 951 , 'attribute_id' => 220, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (10)' ,  'name_short' =>  'Onyxia (10)' );
		$sql_ary[] = array( 'id' => 952 , 'attribute_id' => 221, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (25)' ,  'name_short' =>  'Onyxia (25)' );
		$sql_ary[] = array( 'id' => 953 , 'attribute_id' => 222, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Onyxia (25)' ,  'name_short' =>  'Onyxia (25)' );
		$sql_ary[] = array( 'id' => 954 , 'attribute_id' => 223, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Mark’gar (10)' ,  'name_short' =>  'Marrowgar (10)' );
		$sql_ary[] = array( 'id' => 955 , 'attribute_id' => 224, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Mark’gar (10HM)' ,  'name_short' =>  'Marrowgar (10HM)' );
		$sql_ary[] = array( 'id' => 956 , 'attribute_id' => 225, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lady Todeswisper (10)' ,  'name_short' =>  'Deathwisper (10)' );
		$sql_ary[] = array( 'id' => 957 , 'attribute_id' => 226, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lady Todeswisper (10HM)' ,  'name_short' =>  'Deathwisper (10HM)' );
		$sql_ary[] = array( 'id' => 958 , 'attribute_id' => 227, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Luftschiffkampf (10)' ,  'name_short' =>  'Gunship (10)' );
		$sql_ary[] = array( 'id' => 959 , 'attribute_id' => 228, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Luftschiffkampf (10HM)' ,  'name_short' =>  'Gunship (10HM)' );
		$sql_ary[] = array( 'id' => 960 , 'attribute_id' => 229, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Todesbringer Saurfang (10)' ,  'name_short' =>  'Saurfang (10)' );
		$sql_ary[] = array( 'id' => 961 , 'attribute_id' => 230, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Todesbringer Saurfang (10HM)' ,  'name_short' =>  'Saurfang (10HM)' );
		$sql_ary[] = array( 'id' => 962 , 'attribute_id' => 231, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fauldarm (10)' ,  'name_short' =>  'Festergut (10)' );
		$sql_ary[] = array( 'id' => 963 , 'attribute_id' => 232, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fauldarm (10HM)' ,  'name_short' =>  'Festergut (10HM)' );
		$sql_ary[] = array( 'id' => 964 , 'attribute_id' => 233, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Modermiene (10)' ,  'name_short' =>  'Rotface (10)' );
		$sql_ary[] = array( 'id' => 965 , 'attribute_id' => 234, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Modermiene (10HM)' ,  'name_short' =>  'Rotface (10HM)' );
		$sql_ary[] = array( 'id' => 966 , 'attribute_id' => 235, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Professeur Seuchenmord (10)' ,  'name_short' =>  'Putricide (10)' );
		$sql_ary[] = array( 'id' => 967 , 'attribute_id' => 236, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Professeur Seuchenmord (10HM)' ,  'name_short' =>  'Putricide (10HM)' );
		$sql_ary[] = array( 'id' => 968 , 'attribute_id' => 237, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Prinz Valanar (10)' ,  'name_short' =>  'Princes (10)' );
		$sql_ary[] = array( 'id' => 969 , 'attribute_id' => 238, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Prinz Valanar (10HM)' ,  'name_short' =>  'Princes (10HM)' );
		$sql_ary[] = array( 'id' => 970 , 'attribute_id' => 239, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Blutkönigin Lana’thel (10)' ,  'name_short' =>  'Lana thel (10)' );
		$sql_ary[] = array( 'id' => 971 , 'attribute_id' => 240, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Blutkönigin Lana’thel (10HM)' ,  'name_short' =>  'Lana thel (10HM)' );
		$sql_ary[] = array( 'id' => 972 , 'attribute_id' => 241, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Valithria Traumwandler (10)' ,  'name_short' =>  'Valithria (10)' );
		$sql_ary[] = array( 'id' => 973 , 'attribute_id' => 242, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Valithria Traumwandler (10HM)' ,  'name_short' =>  'Valithria (10HM)' );
		$sql_ary[] = array( 'id' => 974 , 'attribute_id' => 243, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (10)' ,  'name_short' =>  'Sindragosa (10)' );
		$sql_ary[] = array( 'id' => 975 , 'attribute_id' => 244, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (10HM)' ,  'name_short' =>  'Sindragosa (10HM)' );
		$sql_ary[] = array( 'id' => 976 , 'attribute_id' => 245, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Der Lichkönig (10)' ,  'name_short' =>  'Lich King (10)' );
		$sql_ary[] = array( 'id' => 977 , 'attribute_id' => 246, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Der Lichkönig (10HM)' ,  'name_short' =>  'Lich King (10HM)' );
		$sql_ary[] = array( 'id' => 978 , 'attribute_id' => 247, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Mark’gar (25)' ,  'name_short' =>  'Marrowgar (25)' );
		$sql_ary[] = array( 'id' => 979 , 'attribute_id' => 248, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lord Mark’gar (25HM)' ,  'name_short' =>  'Marrowgar (25HM)' );
		$sql_ary[] = array( 'id' => 980 , 'attribute_id' => 249, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lady Todeswisper (25)' ,  'name_short' =>  'Deathwisper (25)' );
		$sql_ary[] = array( 'id' => 981 , 'attribute_id' => 250, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Lady Todeswisper (25HM)' ,  'name_short' =>  'Deathwisper (25HM)' );
		$sql_ary[] = array( 'id' => 982 , 'attribute_id' => 251, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Luftschiffkampf (25)' ,  'name_short' =>  'Gunship (25)' );
		$sql_ary[] = array( 'id' => 983 , 'attribute_id' => 252, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Luftschiffkampf (25HM)' ,  'name_short' =>  'Gunship (25HM)' );
		$sql_ary[] = array( 'id' => 984 , 'attribute_id' => 253, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Todesbringer Saurfang (25)' ,  'name_short' =>  'Saurfang (25)' );
		$sql_ary[] = array( 'id' => 985 , 'attribute_id' => 254, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Todesbringer Saurfang (25HM)' ,  'name_short' =>  'Saurfang (25HM)' );
		$sql_ary[] = array( 'id' => 986 , 'attribute_id' => 255, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fauldarm (25)' ,  'name_short' =>  'Festergut (25)' );
		$sql_ary[] = array( 'id' => 987 , 'attribute_id' => 256, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Fauldarm (25HM)' ,  'name_short' =>  'Festergut (25HM)' );
		$sql_ary[] = array( 'id' => 988 , 'attribute_id' => 257, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Modermiene (25)' ,  'name_short' =>  'Rotface (25)' );
		$sql_ary[] = array( 'id' => 989 , 'attribute_id' => 258, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Modermiene (25HM)' ,  'name_short' =>  'Rotface (25HM)' );
		$sql_ary[] = array( 'id' => 990 , 'attribute_id' => 259, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Professeur Seuchenmord (25)' ,  'name_short' =>  'Putricide (25)' );
		$sql_ary[] = array( 'id' => 991 , 'attribute_id' => 260, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Professeur Seuchenmord (25HM)' ,  'name_short' =>  'Putricide (25HM)' );
		$sql_ary[] = array( 'id' => 992 , 'attribute_id' => 261, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Prinz Valanar (25)' ,  'name_short' =>  'Princes (25)' );
		$sql_ary[] = array( 'id' => 993 , 'attribute_id' => 262, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Prinz Valanar (25HM)' ,  'name_short' =>  'Princes (25HM)' );
		$sql_ary[] = array( 'id' => 994 , 'attribute_id' => 263, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Blutkönigin Lana’thel (25)' ,  'name_short' =>  'Lana thel (25)' );
		$sql_ary[] = array( 'id' => 995 , 'attribute_id' => 264, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Blutkönigin Lana’thel (25HM)' ,  'name_short' =>  'Lana thel (25HM)' );
		$sql_ary[] = array( 'id' => 996 , 'attribute_id' => 265, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Valithria Traumwandler (25)' ,  'name_short' =>  'Valithria (25)' );
		$sql_ary[] = array( 'id' => 997 , 'attribute_id' => 266, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Valithria Traumwandler (25HM)' ,  'name_short' =>  'Valithria (25HM)' );
		$sql_ary[] = array( 'id' => 998 , 'attribute_id' => 267, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (25)' ,  'name_short' =>  'Sindragosa (25)' );
		$sql_ary[] = array( 'id' => 999 , 'attribute_id' => 268, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sindragosa (25HM)' ,  'name_short' =>  'Sindragosa (25HM)' );
		$sql_ary[] = array( 'id' => 1000 , 'attribute_id' => 269, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Der Lichkönig (25)' ,  'name_short' =>  'Lich King (25)' );
		$sql_ary[] = array( 'id' => 1001 , 'attribute_id' => 270, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Der Lichkönig (25HM)' ,  'name_short' =>  'Lich King (25HM)' );
		$sql_ary[] = array( 'id' => 1002 , 'attribute_id' => 271, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halion (10)' ,  'name_short' =>  'Halion (10)' );
		$sql_ary[] = array( 'id' => 1003 , 'attribute_id' => 272, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halion (10HM)' ,  'name_short' =>  'Halion (10HM)' );
		$sql_ary[] = array( 'id' => 1004 , 'attribute_id' => 273, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halion (25)' ,  'name_short' =>  'Halion (25)' );
		$sql_ary[] = array( 'id' => 1005 , 'attribute_id' => 274, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halion (25HM)' ,  'name_short' =>  'Halion (25HM)' );

		
		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_language', $sql_ary );
		unset ( $sql_ary );
		
		
	}
}

/*
 * release 1.2
 * new boss progress data for WoW
 * generated with the spreadsheet
 * 
 */
function update_wow_bb3()
{
	global $db, $table_prefix, $umil, $user;
	
	$sql_ary = array ();	
	//reinsert classes with correct color
	$db->sql_query ( 'TRUNCATE TABLE ' . $table_prefix . 'bbdkp_classes' );
	$sql_ary = array ();
	$sql_ary [] = array ('class_id' => 0, 'class_armor_type' => 'PLATE', 'class_min_level' => 1, 'class_max_level' => 85 , 'colorcode' =>  '#999', 'imagename' => 'wow_Unknown_small');   
	$sql_ary [] = array ('class_id' => 1, 'class_armor_type' => 'PLATE', 'class_min_level' => 1, 'class_max_level' => 85 , 'colorcode' =>  '#C79C6E', 'imagename' => 'wow_Warrior_small');   
	$sql_ary [] = array ('class_id' => 4, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 85, 'colorcode' =>  '#FFF569',  'imagename' => 'wow_Rogue_small');    
	$sql_ary [] = array ('class_id' => 3, 'class_armor_type' => 'MAIL', 'class_min_level' => 1, 'class_max_level' => 85 , 'colorcode' =>  '#ABD473',  'imagename' => 'wow_Hunter_small');    
	$sql_ary [] = array ('class_id' => 2, 'class_armor_type' => 'PLATE', 'class_min_level' => 1, 'class_max_level' => 85 ,  'colorcode' =>  '#F58CBA',  'imagename' => 'wow_Paladin_small'); 
	$sql_ary [] = array ('class_id' => 7, 'class_armor_type' => 'MAIL', 'class_min_level' => 1, 'class_max_level' => 85 , 'colorcode' =>  '#0070DE',  'imagename' => 'wow_Shaman_small'); 
	$sql_ary [] = array ('class_id' => 11, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 85 , 'colorcode' =>  '#FF7D0A',  'imagename' => 'wow_Druid_small');  
	$sql_ary [] = array ('class_id' => 9, 'class_armor_type' => 'CLOTH', 'class_min_level' => 1, 'class_max_level' => 85 , 'colorcode' =>  '#9482C9',  'imagename' => 'wow_Warlock_small'); 
	$sql_ary [] = array ('class_id' => 8, 'class_armor_type' => 'CLOTH', 'class_min_level' => 1, 'class_max_level' => 85 , 'colorcode' =>  '#69CCF0',  'imagename' => 'wow_Mage_small');   
	$sql_ary [] = array ('class_id' => 5, 'class_armor_type' => 'CLOTH', 'class_min_level' => 1, 'class_max_level' => 85 ,  'colorcode' =>  '#FFFFFF', 'imagename' => 'wow_Priest_small');  
	$sql_ary [] = array ('class_id' => 6, 'class_armor_type' => 'PLATE', 'class_min_level' => 55, 'class_max_level' => 85 , 'colorcode' =>  '#C41F3B',  'imagename' => 'wow_Death_Knight_small'); 
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_classes', $sql_ary );
		
	
							
	// 2 new races
	$db->sql_query ('TRUNCATE TABLE ' . $table_prefix . 'bbdkp_races');
	unset ( $sql_ary );
	$sql_ary = array ();
	$sql_ary [] = array ('race_id' => 0, 'race_faction_id' => 0, 'image_female_small' => ' ',  'image_male_small' => ' '  ); //Unknown
	$sql_ary [] = array ('race_id' => 1, 'race_faction_id' => 1, 'image_female_small' => 'wow_human_female_small',  'image_male_small' => 'wow_human_male_small'  ); //Human
	$sql_ary [] = array ('race_id' => 2, 'race_faction_id' => 2 , 'image_female_small' => 'wow_orc_female_small',  'image_male_small' => 'wow_orc_male_small' ); //Orc
	$sql_ary [] = array ('race_id' => 3, 'race_faction_id' => 1 , 'image_female_small' => 'wow_dwarf_female_small',  'image_male_small' => 'wow_dwarf_male_small' ); //Dwarf
	$sql_ary [] = array ('race_id' => 4, 'race_faction_id' => 1 , 'image_female_small' => 'wow_nightelf_female_small',  'image_male_small' => 'wow_nightelf_male_small' ) ; //Night Elf
	$sql_ary [] = array ('race_id' => 5, 'race_faction_id' => 2 , 'image_female_small' => 'wow_scourge_female_small',  'image_male_small' => 'wow_scourge_male_small' ); //Undead
	$sql_ary [] = array ('race_id' => 6, 'race_faction_id' => 2 , 'image_female_small' => 'wow_tauren_female_small',  'image_male_small' => 'wow_tauren_male_small' ); //Tauren
	$sql_ary [] = array ('race_id' => 7, 'race_faction_id' => 1 , 'image_female_small' => 'wow_gnome_female_small',  'image_male_small' => 'wow_gnome_male_small' ); //Gnome
	$sql_ary [] = array ('race_id' => 8, 'race_faction_id' => 2 , 'image_female_small' => 'wow_troll_female_small',  'image_male_small' => 'wow_troll_male_small' ); //Troll
	$sql_ary [] = array ('race_id' => 9, 'race_faction_id' => 2 , 'image_female_small' => 'wow_goblin_female_small',  'image_male_small' => 'wow_goblin_male_small' ); //Goblin
	$sql_ary [] = array ('race_id' => 10, 'race_faction_id' => 2 , 'image_female_small' => 'wow_bloodelf_female_small',  'image_male_small' => 'wow_bloodelf_male_small' ); //Blood Elf
	$sql_ary [] = array ('race_id' => 11, 'race_faction_id' => 1 , 'image_female_small' => 'wow_draenei_female_small',  'image_male_small' => 'wow_draenei_male_small' ); //Draenei
	$sql_ary [] = array ('race_id' => 22, 'race_faction_id' => 1 , 'image_female_small' => 'wow_worgen_female_small',  'image_male_small' => 'wow_worgen_male_small' ); //Worgen
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_races', $sql_ary );
	
		
	// set old zones to no-show
	$sql = 'UPDATE  ' . $table_prefix . "bbdkp_zonetable  SET showzoneportal = '0', showzone =  '0' " ;
	$db->sql_query($sql);
	
	//add cataclysm zones
	$sql = 'delete from ' . $table_prefix . "bbdkp_zonetable where id >= 40 and game = 'wow' "  ;
	$db->sql_query($sql);
	unset ( $sql_ary );
	$sql_ary = array ();
	$sql_ary[] = array( 'id' => 40 , 'imagename' =>  'bd_10' , 'game' =>  'wow' ,  'tier' =>  'T11' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '5094' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 41 , 'imagename' =>  'bd_25' , 'game' =>  'wow' ,  'tier' =>  'T11' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '5094' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 42 , 'imagename' =>  'bot_10' , 'game' =>  'wow' ,  'tier' =>  'T11' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '5334' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 43 , 'imagename' =>  'bot_25' , 'game' =>  'wow' ,  'tier' =>  'T11' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '5334' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 44 , 'imagename' =>  'tfw_10' , 'game' =>  'wow' ,  'tier' =>  'T11' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '5638' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$sql_ary[] = array( 'id' => 45 , 'imagename' =>  'tfw_25' , 'game' =>  'wow' ,  'tier' =>  'T11' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '5638' ,  'showzone' =>  1, 'showzoneportal' =>  1);
	$db->sql_multi_insert ($table_prefix . 'bbdkp_zonetable', $sql_ary );

	// set old bosses to no-show
	$sql = 'UPDATE  ' . $table_prefix . "bbdkp_bosstable  SET showboss = '0' " ;
	$db->sql_query($sql);
		
	//cataclysm bosses. id is foreign key for language attribute_id
		
	$sql = 'delete from ' . $table_prefix . "bbdkp_bosstable where id >= 275 and game = 'wow' " ;
	$db->sql_query($sql);
	
	unset ( $sql_ary );
	$sql_ary = array ();
	$sql_ary[] = array('id' => 275 ,  'imagename' =>  'magmaw_10' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '41570' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 276 ,  'imagename' =>  'magmaw_10_hc' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '41570' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 277 ,  'imagename' =>  'magmaw_25' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '41570' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 278 ,  'imagename' =>  'magmaw_25_hc' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '41570' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 279 ,  'imagename' =>  'omnotron_defense_system_10' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '42179' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 280 ,  'imagename' =>  'omnotron_defense_system_10_hc' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '42179' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 281 ,  'imagename' =>  'omnotron_defense_system_25' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '42179' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 282 ,  'imagename' =>  'omnotron_defense_system_25_hc' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '42179' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 283 ,  'imagename' =>  'maloriak_10' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '41378' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 284 ,  'imagename' =>  'maloriak_10_hc' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '41378' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 285 ,  'imagename' =>  'maloriak_25' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '41378' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 286 ,  'imagename' =>  'maloriak_25_hc' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '41378' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 287 ,  'imagename' =>  'atramedes_10' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '41442' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 288 ,  'imagename' =>  'atramedes_10_hc' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '41442' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 289 ,  'imagename' =>  'atramedes_25' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '41442' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 290 ,  'imagename' =>  'atramedes_25_hc' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '41442' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 291 ,  'imagename' =>  'chimaeron_10' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '43296' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 292 ,  'imagename' =>  'chimaeron_10_hc' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '43296' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 293 ,  'imagename' =>  'chimaeron_25' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '43296' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 294 ,  'imagename' =>  'chimaeron_25_hc' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '43296' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 295 ,  'imagename' =>  'nefarian_10' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '41376' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 296 ,  'imagename' =>  'nefarian_10_hc' , 'game' =>  'wow' , 'zoneid' =>  40 , 'type' =>  'npc'  , 'webid' =>  '41376' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 297 ,  'imagename' =>  'nefarian_25' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '41376' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 298 ,  'imagename' =>  'nefarian_25_hc' , 'game' =>  'wow' , 'zoneid' =>  41 , 'type' =>  'npc'  , 'webid' =>  '41376' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 299 ,  'imagename' =>  'halfus_wyrmbreaker_10' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '44600' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 300 ,  'imagename' =>  'halfus_wyrmbreaker_10_hc' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '44600' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 301 ,  'imagename' =>  'halfus_wyrmbreaker_25' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '44600' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 302 ,  'imagename' =>  'halfus_wyrmbreaker_25_hc' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '44600' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 303 ,  'imagename' =>  'valiona_theralion_10' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '45992' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 304 ,  'imagename' =>  'valiona_theralion_10_hc' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '45992' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 305 ,  'imagename' =>  'valiona_theralion_25' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '45992' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 306 ,  'imagename' =>  'valiona_theralion_25_hc' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '45992' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 307 ,  'imagename' =>  'twilight_ascendant_council_10' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '43735' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 308 ,  'imagename' =>  'twilight_ascendant_council_10_hc' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '43735' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 309 ,  'imagename' =>  'twilight_ascendant_council_25' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '43735' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 310 ,  'imagename' =>  'twilight_ascendant_council_25_hc' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '43735' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image missing still
	$sql_ary[] = array('id' => 311 ,  'imagename' =>  'chogall_10' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '43324' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); 
	$sql_ary[] = array('id' => 312 ,  'imagename' =>  'chogall_10_hc' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '43324' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 313 ,  'imagename' =>  'chogall_25' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '43324' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 314 ,  'imagename' =>  'chogall_25_hc' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '43324' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 315 ,  'imagename' =>  'sinestra_10_hc' , 'game' =>  'wow' , 'zoneid' =>  42 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image & web ID missing still
	$sql_ary[] = array('id' => 316 ,  'imagename' =>  'sinestra_25_hc' , 'game' =>  'wow' , 'zoneid' =>  43 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     ); //image & web ID missing still
	$sql_ary[] = array('id' => 317 ,  'imagename' =>  'conclave_of_wind_10' , 'game' =>  'wow' , 'zoneid' =>  44 , 'type' =>  'npc'  , 'webid' =>  '45871' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 318 ,  'imagename' =>  'conclave_of_wind_10_hc' , 'game' =>  'wow' , 'zoneid' =>  44 , 'type' =>  'npc'  , 'webid' =>  '45871' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 319 ,  'imagename' =>  'conclave_of_wind_25' , 'game' =>  'wow' , 'zoneid' =>  45 , 'type' =>  'npc'  , 'webid' =>  '45871' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 320 ,  'imagename' =>  'conclave_of_wind_25_hc' , 'game' =>  'wow' , 'zoneid' =>  45 , 'type' =>  'npc'  , 'webid' =>  '45871' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 321 ,  'imagename' =>  'alakir_10' , 'game' =>  'wow' , 'zoneid' =>  44 , 'type' =>  'npc'  , 'webid' =>  '46753' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 322 ,  'imagename' =>  'alakir_10_hc' , 'game' =>  'wow' , 'zoneid' =>  44 , 'type' =>  'npc'  , 'webid' =>  '46753' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 323 ,  'imagename' =>  'alakir_25' , 'game' =>  'wow' , 'zoneid' =>  45 , 'type' =>  'npc'  , 'webid' =>  '46753' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$sql_ary[] = array('id' => 324 ,  'imagename' =>  'alakir_25_hc' , 'game' =>  'wow' , 'zoneid' =>  45 , 'type' =>  'npc'  , 'webid' =>  '46753' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
	$db->sql_multi_insert ( $table_prefix . 'bbdkp_bosstable', $sql_ary );

	//language file - classes					
	$db->sql_query ( 'DELETE FROM ' . $table_prefix . "bbdkp_language where attribute = 'class'" );
	unset ( $sql_ary );
	
	// just in case someone fiddled with the id autincrement, we reset it.
	$db->sql_query ( 'ALTER TABLE  ' . $table_prefix . "bbdkp_language AUTO_INCREMENT = 1 " );

	// reinsert class language table to correct attribute_id
	// classes in en
	unset ( $sql_ary );
	$sql_ary = array ();
	
	$sql_ary[] = array( 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Rogue' ,  'name_short' =>  'Rogue' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Hunter' ,  'name_short' =>  'Hunter' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Shaman' ,  'name_short' =>  'Shaman' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Druid' ,  'name_short' =>  'Druid' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warlock' ,  'name_short' =>  'Warlock' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Mage' ,  'name_short' =>  'Mage' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Priest' ,  'name_short' =>  'Priest' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Death Knight' ,  'name_short' =>  'Death Knight' );
						
	//classes in fr
	$sql_ary[] = array(  'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
	$sql_ary[] = array(  'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Warrior' ,  'name_short' =>  'Warrior' );
	$sql_ary[] = array(  'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Voleur' ,  'name_short' =>  'Voleur' );
	$sql_ary[] = array(  'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chasseur' ,  'name_short' =>  'Chasseur' );
	$sql_ary[] = array(  'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
	$sql_ary[] = array(  'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chaman' ,  'name_short' =>  'Chaman' );
	$sql_ary[] = array(  'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Druide' ,  'name_short' =>  'Druide' );
	$sql_ary[] = array(  'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Démoniste' ,  'name_short' =>  'Démoniste' );
	$sql_ary[] = array(  'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Mage' ,  'name_short' =>  'Mage' );
	$sql_ary[] = array(  'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Prêtre' ,  'name_short' =>  'Prêtre' );
	$sql_ary[] = array(  'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chevalier de la Mort' ,  'name_short' =>  'Chevalier de la Mort' );
							
	//classes in de	
	$sql_ary[] = array(  'attribute_id' => 0, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Unbekannt' ,  'name_short' =>  'Unbekannt' );
	$sql_ary[] = array(  'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Krieger' ,  'name_short' =>  'Krieger' );
	$sql_ary[] = array(  'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Schurke' ,  'name_short' =>  'Schurke' );
	$sql_ary[] = array(  'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Jäger' ,  'name_short' =>  'Jäger' );
	$sql_ary[] = array(  'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Paladin' ,  'name_short' =>  'Paladin' );
	$sql_ary[] = array(  'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Schamane' ,  'name_short' =>  'Schamane' );
	$sql_ary[] = array(  'attribute_id' => 11, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Druide' ,  'name_short' =>  'Druide' );
	$sql_ary[] = array(  'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Hexenmeister' ,  'name_short' =>  'Hexenmeister' );
	$sql_ary[] = array(  'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Magier' ,  'name_short' =>  'Magier' );
	$sql_ary[] = array(  'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Priester' ,  'name_short' =>  'Priester' );
	$sql_ary[] = array(  'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Todesritter' ,  'name_short' =>  'Todesritter' );

	
	$db->sql_multi_insert ($table_prefix . 'bbdkp_language', $sql_ary);
	unset ( $sql_ary );	

	//races
	$db->sql_query ( 'DELETE FROM ' . $table_prefix . "bbdkp_language where attribute = 'race'" );
	unset ( $sql_ary );
	
	//races in en
	$sql_ary[] = array( 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Human' ,  'name_short' =>  'Human' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Orc' ,  'name_short' =>  'Orc' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Night Elf' ,  'name_short' =>  'Night Elf' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Undead' ,  'name_short' =>  'Undead' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Tauren' ,  'name_short' =>  'Tauren' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Blood Elf' ,  'name_short' =>  'Blood Elf' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Draenei' ,  'name_short' =>  'Draenei' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Goblin' ,  'name_short' =>  'Goblin' );
	$sql_ary[] = array( 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Worgen' ,  'name_short' =>  'Worgen' );
		
	// races in fr
	$sql_ary[] = array( 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Humain' ,  'name_short' =>  'Humain' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Orc' ,  'name_short' =>  'Orc' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Nain' ,  'name_short' =>  'Nain' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elfe de la Nuit' ,  'name_short' =>  'Elfe de la Nuit' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Mort-Vivant' ,  'name_short' =>  'Mort-Vivant' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Tauren' ,  'name_short' =>  'Tauren' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elfe de Sang' ,  'name_short' =>  'Elfe de Sang' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Draeneï' ,  'name_short' =>  'Draeneï' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Goblin' ,  'name_short' =>  'Goblin' );
	$sql_ary[] = array( 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Worgen' ,  'name_short' =>  'Worgen' );
			
	//races in de
	$sql_ary[] = array( 'attribute_id' => 0, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
	$sql_ary[] = array( 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Mensch' ,  'name_short' =>  'Mensch' );
	$sql_ary[] = array( 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Orc' ,  'name_short' =>  'Orc' );
	$sql_ary[] = array( 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Zwerg' ,  'name_short' =>  'Zwerg' );
	$sql_ary[] = array( 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Nachtelf' ,  'name_short' =>  'Nachtelf' );
	$sql_ary[] = array( 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Untoter' ,  'name_short' =>  'Untoter' );
	$sql_ary[] = array( 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Tauren' ,  'name_short' =>  'Tauren' );
	$sql_ary[] = array( 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Gnome' ,  'name_short' =>  'Gnome' );
	$sql_ary[] = array( 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Troll' ,  'name_short' =>  'Troll' );
	$sql_ary[] = array( 'attribute_id' => 10, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Blutelf' ,  'name_short' =>  'Blutelf' );
	$sql_ary[] = array( 'attribute_id' => 11, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Draenei' ,  'name_short' =>  'Draenei' );
	$sql_ary[] = array( 'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Goblin' ,  'name_short' =>  'Goblin' );
	$sql_ary[] = array( 'attribute_id' => 22, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Worgen' ,  'name_short' =>  'Worgen' );
	
	$db->sql_multi_insert ($table_prefix . 'bbdkp_language', $sql_ary);
	unset ( $sql_ary );	

	
	//zones
	$db->sql_query ( 'DELETE FROM ' . $table_prefix . "bbdkp_language where attribute = 'zone' and attribute_id >= 40 " );
	unset ( $sql_ary );

	
	// new bosses - zones
	$sql_ary[] = array( 'attribute_id' => 40, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Blackwing Descent (10)' ,  'name_short' =>  'BD (10)' );
	$sql_ary[] = array( 'attribute_id' => 41, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Blackwing Descent (25)' ,  'name_short' =>  'BD (25)' );
	$sql_ary[] = array( 'attribute_id' => 42, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Bastion of Twilight (10)' ,  'name_short' =>  'BoT (10)' );
	$sql_ary[] = array( 'attribute_id' => 43, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Bastion of Twilight (25)' ,  'name_short' =>  'BoT (25)' );
	$sql_ary[] = array( 'attribute_id' => 44, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Throne of the Four Winds (10)' ,  'name_short' =>  'TotFW (10)' );
	$sql_ary[] = array( 'attribute_id' => 45, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Throne of the Four Winds (25)' ,  'name_short' =>  'TotFW (25)' );
	
	$db->sql_multi_insert ($table_prefix . 'bbdkp_language', $sql_ary);
	unset ( $sql_ary );	
	
	//bosses
	$db->sql_query ( 'DELETE FROM ' . $table_prefix . "bbdkp_language where attribute = 'boss' and attribute_id >= 275 " );
	unset ( $sql_ary );
	
	$sql_ary[] = array( 'attribute_id' => 275, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (10)' ,  'name_short' =>  'Magmaw (10)' );
	$sql_ary[] = array( 'attribute_id' => 276, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (10HM)' ,  'name_short' =>  'Magmaw (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 277, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (25)' ,  'name_short' =>  'Magmaw (25)' );
	$sql_ary[] = array( 'attribute_id' => 278, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (25HM)' ,  'name_short' =>  'Magmaw (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 279, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (10)' ,  'name_short' =>  'Omnotron Defense System (10)' );
	$sql_ary[] = array( 'attribute_id' => 280, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (10HM)' ,  'name_short' =>  'Omnotron Defense System (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 281, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (25)' ,  'name_short' =>  'Omnotron Defense System (25)' );
	$sql_ary[] = array( 'attribute_id' => 282, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (25HM)' ,  'name_short' =>  'Omnotron Defense System (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 283, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (10)' ,  'name_short' =>  'Maloriak (10)' );
	$sql_ary[] = array( 'attribute_id' => 284, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (10HM)' ,  'name_short' =>  'Maloriak (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 285, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (25)' ,  'name_short' =>  'Maloriak (25)' );
	$sql_ary[] = array( 'attribute_id' => 286, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (25HM)' ,  'name_short' =>  'Maloriak (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 287, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (10)' ,  'name_short' =>  'Atramedes (10)' );
	$sql_ary[] = array( 'attribute_id' => 288, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (10HM)' ,  'name_short' =>  'Atramedes (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 289, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (25)' ,  'name_short' =>  'Atramedes (25)' );
	$sql_ary[] = array( 'attribute_id' => 290, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (25HM)' ,  'name_short' =>  'Atramedes (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 291, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (10)' ,  'name_short' =>  'Chimaeron (10)' );
	$sql_ary[] = array( 'attribute_id' => 292, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (10HM)' ,  'name_short' =>  'Chimaeron (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 293, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (25)' ,  'name_short' =>  'Chimaeron (25)' );
	$sql_ary[] = array( 'attribute_id' => 294, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (25HM)' ,  'name_short' =>  'Chimaeron (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 295, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (10)' ,  'name_short' =>  'Nefarian (10)' );
	$sql_ary[] = array( 'attribute_id' => 296, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (10HM)' ,  'name_short' =>  'Nefarian (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 297, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (25)' ,  'name_short' =>  'Nefarian (25)' );
	$sql_ary[] = array( 'attribute_id' => 298, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (25HM)' ,  'name_short' =>  'Nefarian (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 299, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (10)' ,  'name_short' =>  'Halfus Wyrmbreaker (10)' );
	$sql_ary[] = array( 'attribute_id' => 300, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (10HM)' ,  'name_short' =>  'Halfus Wyrmbreaker (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 301, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (25)' ,  'name_short' =>  'Halfus Wyrmbreaker (25)' );
	$sql_ary[] = array( 'attribute_id' => 302, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (25HM)' ,  'name_short' =>  'Halfus Wyrmbreaker (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 303, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (10)' ,  'name_short' =>  'Valiona & Theralion (10)' );
	$sql_ary[] = array( 'attribute_id' => 304, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (10HM)' ,  'name_short' =>  'Valiona & Theralion (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 305, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (25)' ,  'name_short' =>  'Valiona & Theralion (25)' );
	$sql_ary[] = array( 'attribute_id' => 306, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (25HM)' ,  'name_short' =>  'Valiona & Theralion (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 307, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (10)' ,  'name_short' =>  'Twilight Ascendant Council (10)' );
	$sql_ary[] = array( 'attribute_id' => 308, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (10HM)' ,  'name_short' =>  'Twilight Ascendant Council (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 309, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (25)' ,  'name_short' =>  'Twilight Ascendant Council (25)' );
	$sql_ary[] = array( 'attribute_id' => 310, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (25HM)' ,  'name_short' =>  'Twilight Ascendant Council (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 311, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (10)' ,  'name_short' =>  'Cho\'gall (10)' );
	$sql_ary[] = array( 'attribute_id' => 312, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (10HM)' ,  'name_short' =>  'Cho\'gall (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 313, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (25)' ,  'name_short' =>  'Cho\'gall (25)' );
	$sql_ary[] = array( 'attribute_id' => 314, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (25HM)' ,  'name_short' =>  'Cho\'gall (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 315, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sinestra (10HM)' ,  'name_short' =>  'Sinestra (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 316, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sinestra (25HM)' ,  'name_short' =>  'Sinestra (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 317, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (10)' ,  'name_short' =>  'Conclave of Wind (10)' );
	$sql_ary[] = array( 'attribute_id' => 318, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (10HM)' ,  'name_short' =>  'Conclave of Wind (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 319, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (25)' ,  'name_short' =>  'Conclave of Wind (25)' );
	$sql_ary[] = array( 'attribute_id' => 320, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (25HM)' ,  'name_short' =>  'Conclave of Wind (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 321, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (10)' ,  'name_short' =>  'Al\'akir (10)' );
	$sql_ary[] = array( 'attribute_id' => 322, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (10HM)' ,  'name_short' =>  'Al\'akir (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 323, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (25)' ,  'name_short' =>  'Al\'akir (25)' );
	$sql_ary[] = array( 'attribute_id' => 324, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (25HM)' ,  'name_short' =>  'Al\'akir (25HM)' );
	//bosses and zones in fr
	$sql_ary[] = array( 'attribute_id' => 40, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Blackwing Descent (10)' ,  'name_short' =>  'BD (10)' );
	$sql_ary[] = array( 'attribute_id' => 41, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Blackwing Descent (25)' ,  'name_short' =>  'BD (25)' );
	$sql_ary[] = array( 'attribute_id' => 42, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Bastion of Twilight (10)' ,  'name_short' =>  'BoT (10)' );
	$sql_ary[] = array( 'attribute_id' => 43, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Bastion of Twilight (25)' ,  'name_short' =>  'BoT (25)' );
	$sql_ary[] = array( 'attribute_id' => 44, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Throne of the Four Winds (10)' ,  'name_short' =>  'TotFW (10)' );
	$sql_ary[] = array( 'attribute_id' => 45, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Throne of the Four Winds (25)' ,  'name_short' =>  'TotFW (25)' );
	$sql_ary[] = array( 'attribute_id' => 275, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (10)' ,  'name_short' =>  'Magmaw (10)' );
	$sql_ary[] = array( 'attribute_id' => 276, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (10HM)' ,  'name_short' =>  'Magmaw (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 277, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (25)' ,  'name_short' =>  'Magmaw (25)' );
	$sql_ary[] = array( 'attribute_id' => 278, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (25HM)' ,  'name_short' =>  'Magmaw (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 279, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (10)' ,  'name_short' =>  'Omnotron Defense System (10)' );
	$sql_ary[] = array( 'attribute_id' => 280, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (10HM)' ,  'name_short' =>  'Omnotron Defense System (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 281, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (25)' ,  'name_short' =>  'Omnotron Defense System (25)' );
	$sql_ary[] = array( 'attribute_id' => 282, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (25HM)' ,  'name_short' =>  'Omnotron Defense System (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 283, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (10)' ,  'name_short' =>  'Maloriak (10)' );
	$sql_ary[] = array( 'attribute_id' => 284, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (10HM)' ,  'name_short' =>  'Maloriak (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 285, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (25)' ,  'name_short' =>  'Maloriak (25)' );
	$sql_ary[] = array( 'attribute_id' => 286, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (25HM)' ,  'name_short' =>  'Maloriak (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 287, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (10)' ,  'name_short' =>  'Atramedes (10)' );
	$sql_ary[] = array( 'attribute_id' => 288, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (10HM)' ,  'name_short' =>  'Atramedes (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 289, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (25)' ,  'name_short' =>  'Atramedes (25)' );
	$sql_ary[] = array( 'attribute_id' => 290, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (25HM)' ,  'name_short' =>  'Atramedes (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 291, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (10)' ,  'name_short' =>  'Chimaeron (10)' );
	$sql_ary[] = array( 'attribute_id' => 292, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (10HM)' ,  'name_short' =>  'Chimaeron (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 293, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (25)' ,  'name_short' =>  'Chimaeron (25)' );
	$sql_ary[] = array( 'attribute_id' => 294, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (25HM)' ,  'name_short' =>  'Chimaeron (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 295, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (10)' ,  'name_short' =>  'Nefarian (10)' );
	$sql_ary[] = array( 'attribute_id' => 296, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (10HM)' ,  'name_short' =>  'Nefarian (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 297, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (25)' ,  'name_short' =>  'Nefarian (25)' );
	$sql_ary[] = array( 'attribute_id' => 298, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (25HM)' ,  'name_short' =>  'Nefarian (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 299, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (10)' ,  'name_short' =>  'Halfus Wyrmbreaker (10)' );
	$sql_ary[] = array( 'attribute_id' => 300, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (10HM)' ,  'name_short' =>  'Halfus Wyrmbreaker (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 301, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (25)' ,  'name_short' =>  'Halfus Wyrmbreaker (25)' );
	$sql_ary[] = array( 'attribute_id' => 302, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (25HM)' ,  'name_short' =>  'Halfus Wyrmbreaker (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 303, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (10)' ,  'name_short' =>  'Valiona & Theralion (10)' );
	$sql_ary[] = array( 'attribute_id' => 304, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (10HM)' ,  'name_short' =>  'Valiona & Theralion (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 305, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (25)' ,  'name_short' =>  'Valiona & Theralion (25)' );
	$sql_ary[] = array( 'attribute_id' => 306, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (25HM)' ,  'name_short' =>  'Valiona & Theralion (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 307, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (10)' ,  'name_short' =>  'Twilight Ascendant Council (10)' );
	$sql_ary[] = array( 'attribute_id' => 308, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (10HM)' ,  'name_short' =>  'Twilight Ascendant Council (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 309, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (25)' ,  'name_short' =>  'Twilight Ascendant Council (25)' );
	$sql_ary[] = array( 'attribute_id' => 310, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (25HM)' ,  'name_short' =>  'Twilight Ascendant Council (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 311, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (10)' ,  'name_short' =>  'Cho\'gall (10)' );
	$sql_ary[] = array( 'attribute_id' => 312, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (10HM)' ,  'name_short' =>  'Cho\'gall (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 313, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (25)' ,  'name_short' =>  'Cho\'gall (25)' );
	$sql_ary[] = array( 'attribute_id' => 314, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (25HM)' ,  'name_short' =>  'Cho\'gall (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 315, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sinestra (10HM)' ,  'name_short' =>  'Sinestra (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 316, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sinestra (25HM)' ,  'name_short' =>  'Sinestra (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 317, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (10)' ,  'name_short' =>  'Conclave of Wind (10)' );
	$sql_ary[] = array( 'attribute_id' => 318, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (10HM)' ,  'name_short' =>  'Conclave of Wind (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 319, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (25)' ,  'name_short' =>  'Conclave of Wind (25)' );
	$sql_ary[] = array( 'attribute_id' => 320, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (25HM)' ,  'name_short' =>  'Conclave of Wind (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 321, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (10)' ,  'name_short' =>  'Al\'akir (10)' );
	$sql_ary[] = array( 'attribute_id' => 322, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (10HM)' ,  'name_short' =>  'Al\'akir (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 323, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (25)' ,  'name_short' =>  'Al\'akir (25)' );
	$sql_ary[] = array( 'attribute_id' => 324, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (25HM)' ,  'name_short' =>  'Al\'akir (25HM)' );
	//bosses and zones in de
	$sql_ary[] = array( 'attribute_id' => 40, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Blackwing Descent (10)' ,  'name_short' =>  'BD (10)' );
	$sql_ary[] = array( 'attribute_id' => 41, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Blackwing Descent (25)' ,  'name_short' =>  'BD (25)' );
	$sql_ary[] = array( 'attribute_id' => 42, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'The Bastion of Twilight (10)' ,  'name_short' =>  'BoT (10)' );
	$sql_ary[] = array( 'attribute_id' => 43, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'The Bastion of Twilight (25)' ,  'name_short' =>  'BoT (25)' );
	$sql_ary[] = array( 'attribute_id' => 44, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Throne of the Four Winds (10)' ,  'name_short' =>  'TotFW (10)' );
	$sql_ary[] = array( 'attribute_id' => 45, 'language' =>  'de' , 'attribute' =>  'zone' , 'name' =>  'Throne of the Four Winds (25)' ,  'name_short' =>  'TotFW (25)' );
	$sql_ary[] = array( 'attribute_id' => 275, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (10)' ,  'name_short' =>  'Magmaw (10)' );
	$sql_ary[] = array( 'attribute_id' => 276, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (10HM)' ,  'name_short' =>  'Magmaw (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 277, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (25)' ,  'name_short' =>  'Magmaw (25)' );
	$sql_ary[] = array( 'attribute_id' => 278, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Magmaw (25HM)' ,  'name_short' =>  'Magmaw (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 279, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (10)' ,  'name_short' =>  'Omnotron Defense System (10)' );
	$sql_ary[] = array( 'attribute_id' => 280, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (10HM)' ,  'name_short' =>  'Omnotron Defense System (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 281, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (25)' ,  'name_short' =>  'Omnotron Defense System (25)' );
	$sql_ary[] = array( 'attribute_id' => 282, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Omnotron Defense System (25HM)' ,  'name_short' =>  'Omnotron Defense System (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 283, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (10)' ,  'name_short' =>  'Maloriak (10)' );
	$sql_ary[] = array( 'attribute_id' => 284, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (10HM)' ,  'name_short' =>  'Maloriak (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 285, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (25)' ,  'name_short' =>  'Maloriak (25)' );
	$sql_ary[] = array( 'attribute_id' => 286, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Maloriak (25HM)' ,  'name_short' =>  'Maloriak (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 287, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (10)' ,  'name_short' =>  'Atramedes (10)' );
	$sql_ary[] = array( 'attribute_id' => 288, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (10HM)' ,  'name_short' =>  'Atramedes (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 289, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (25)' ,  'name_short' =>  'Atramedes (25)' );
	$sql_ary[] = array( 'attribute_id' => 290, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Atramedes (25HM)' ,  'name_short' =>  'Atramedes (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 291, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (10)' ,  'name_short' =>  'Chimaeron (10)' );
	$sql_ary[] = array( 'attribute_id' => 292, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (10HM)' ,  'name_short' =>  'Chimaeron (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 293, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (25)' ,  'name_short' =>  'Chimaeron (25)' );
	$sql_ary[] = array( 'attribute_id' => 294, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Chimaeron (25HM)' ,  'name_short' =>  'Chimaeron (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 295, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (10)' ,  'name_short' =>  'Nefarian (10)' );
	$sql_ary[] = array( 'attribute_id' => 296, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (10HM)' ,  'name_short' =>  'Nefarian (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 297, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (25)' ,  'name_short' =>  'Nefarian (25)' );
	$sql_ary[] = array( 'attribute_id' => 298, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Nefarian (25HM)' ,  'name_short' =>  'Nefarian (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 299, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (10)' ,  'name_short' =>  'Halfus Wyrmbreaker (10)' );
	$sql_ary[] = array( 'attribute_id' => 300, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (10HM)' ,  'name_short' =>  'Halfus Wyrmbreaker (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 301, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (25)' ,  'name_short' =>  'Halfus Wyrmbreaker (25)' );
	$sql_ary[] = array( 'attribute_id' => 302, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Halfus Wyrmbreaker (25HM)' ,  'name_short' =>  'Halfus Wyrmbreaker (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 303, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (10)' ,  'name_short' =>  'Valiona & Theralion (10)' );
	$sql_ary[] = array( 'attribute_id' => 304, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (10HM)' ,  'name_short' =>  'Valiona & Theralion (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 305, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (25)' ,  'name_short' =>  'Valiona & Theralion (25)' );
	$sql_ary[] = array( 'attribute_id' => 306, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Valiona & Theralion (25HM)' ,  'name_short' =>  'Valiona & Theralion (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 307, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (10)' ,  'name_short' =>  'Twilight Ascendant Council (10)' );
	$sql_ary[] = array( 'attribute_id' => 308, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (10HM)' ,  'name_short' =>  'Twilight Ascendant Council (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 309, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (25)' ,  'name_short' =>  'Twilight Ascendant Council (25)' );
	$sql_ary[] = array( 'attribute_id' => 310, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Twilight Ascendant Council (25HM)' ,  'name_short' =>  'Twilight Ascendant Council (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 311, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (10)' ,  'name_short' =>  'Cho\'gall (10)' );
	$sql_ary[] = array( 'attribute_id' => 312, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (10HM)' ,  'name_short' =>  'Cho\'gall (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 313, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (25)' ,  'name_short' =>  'Cho\'gall (25)' );
	$sql_ary[] = array( 'attribute_id' => 314, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Cho\'gall (25HM)' ,  'name_short' =>  'Cho\'gall (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 315, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sinestra (10HM)' ,  'name_short' =>  'Sinestra (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 316, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Sinestra (25HM)' ,  'name_short' =>  'Sinestra (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 317, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (10)' ,  'name_short' =>  'Conclave of Wind (10)' );
	$sql_ary[] = array( 'attribute_id' => 318, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (10HM)' ,  'name_short' =>  'Conclave of Wind (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 319, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (25)' ,  'name_short' =>  'Conclave of Wind (25)' );
	$sql_ary[] = array( 'attribute_id' => 320, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Conclave of Wind (25HM)' ,  'name_short' =>  'Conclave of Wind (25HM)' );
	$sql_ary[] = array( 'attribute_id' => 321, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (10)' ,  'name_short' =>  'Al\'akir (10)' );
	$sql_ary[] = array( 'attribute_id' => 322, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (10HM)' ,  'name_short' =>  'Al\'akir (10HM)' );
	$sql_ary[] = array( 'attribute_id' => 323, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (25)' ,  'name_short' =>  'Al\'akir (25)' );
	$sql_ary[] = array( 'attribute_id' => 324, 'language' =>  'de' , 'attribute' =>  'boss' , 'name' =>  'Al\'akir (25HM)' ,  'name_short' =>  'Al\'akir (25HM)' );
	
	$db->sql_multi_insert ($table_prefix . 'bbdkp_language', $sql_ary);
	unset ( $sql_ary );
	
}

?>