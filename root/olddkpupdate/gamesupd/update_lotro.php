<?php
/**
 * bbdkp LOTRO update data
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

function update_lotro($bbdkp_table_prefix)
{
    global  $db, $table_prefix, $umil, $user;
    
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'classes');
    $sql_ary = array();

    // class : 
    $sql_ary[] = array('class_id' => 0, 'class_name' => 'Unknown', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 1, 'class_name' => 'Burglar', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 2, 'class_name' => 'Captain', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 3, 'class_name' => 'Champion', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 4, 'class_name' => 'Guardian', 'class_armor_type' => 'PLATE' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 5, 'class_name' => 'Hunter', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 6, 'class_name' => 'Lore-master', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 7, 'class_name' => 'Minstrel', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 8, 'class_name' => 'Rune-keeper', 'class_armor_type' => 'CLOTH' , 'class_min_level' => 1 , 'class_max_level'  => 65 );
    $sql_ary[] = array('class_id' => 9, 'class_name' => 'Warden', 'class_armor_type' => 'MAIL' , 'class_min_level' => 1 , 'class_max_level'  => 65 );   
    $db->sql_multi_insert( $bbdkp_table_prefix . 'classes', $sql_ary);
 	unset ($sql_ary); 
 
   	// factions
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'factions');
    $sql_ary = array();
    $sql_ary[] = array('faction_id' => 1, 'faction_name' => 'Normal' );
    $sql_ary[] = array('faction_id' => 2, 'faction_name' => 'MonsterPlay' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'factions', $sql_ary);
    unset ($sql_ary); 

      // races
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'races');
    $sql_ary = array();
    $sql_ary[] = array('race_id' => 1, 'race_name' => 'Man' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 2, 'race_name' => 'Hobbit' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 3, 'race_name' => 'Elf' , 'race_faction_id' => 1 );
    $sql_ary[] = array('race_id' => 4, 'race_name' => 'Dwarf' , 'race_faction_id' => 1 );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'races', $sql_ary);
    unset ($sql_ary); 
    
    // bossprogress for LOTRO
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

		//lotro_misc
		$sql_ary[] = array('config_name' =>  'pb_ferndur', 'config_value' => 'Ferndur'  );
		$sql_ary[] = array('config_name' =>  'pb_bogbereth', 'config_value' => 'Bogbereth'  );
		
		//Annuminas
		$sql_ary[] = array('config_name' =>  'pb_glinghant', 'config_value' => 'Glinghant'  );
		$sql_ary[] = array('config_name' =>  'pb_nengon', 'config_value' => 'Nengon'  );
		$sql_ary[] = array('config_name' =>  'pb_ost_elendil', 'config_value' => 'Annuminas - Ost Elendil'  );
		$sql_ary[] = array('config_name' =>  'pb_guloth', 'config_value' => 'Guloth'  );
		$sql_ary[] = array('config_name' =>  'pb_balhest', 'config_value' => 'Balhest'  );
		$sql_ary[] = array('config_name' =>  'pb_haudh_valandil', 'config_value' => 'Annuminas - Haudh Valandil'  );
		$sql_ary[] = array('config_name' =>  'pb_shingrinder', 'config_value' => 'Shingrinder'  );
		$sql_ary[] = array('config_name' =>  'pb_dolvaethor', 'config_value' => 'Dolvaethor'  );
		$sql_ary[] = array('config_name' =>  'pb_valandil', 'config_value' => 'Valandil of Arnor'  );

		//fornost
		$sql_ary[] = array('config_name' =>  'pb_brogadan', 'config_value' => 'Bragadan'  );
		$sql_ary[] = array('config_name' =>  'pb_megoriath', 'config_value' => 'Megoriath'  );
		$sql_ary[] = array('config_name' =>  'pb_rhavameldir', 'config_value' => 'Rhavameldir'  );
		$sql_ary[] = array('config_name' =>  'pb_warchief_burzghash', 'config_value' => 'Burzgash'  );
		$sql_ary[] = array('config_name' =>  'pb_zhurmat', 'config_value' => 'Zhurmat'  );
		$sql_ary[] = array('config_name' =>  'pb_riamul', 'config_value' => 'Riamul'  );
		$sql_ary[] = array('config_name' =>  'pb_zanthrug', 'config_value' => 'Zanthrug'  );
		$sql_ary[] = array('config_name' =>  'pb_krithmog', 'config_value' => 'Krithmog'  );
		$sql_ary[] = array('config_name' =>  'pb_einiora', 'config_value' => 'Einiora'  );
		$sql_ary[] = array('config_name' =>  'pb_remmenaeg', 'config_value' => 'Remmenaeg'  );
		
		
		// helegrod
		$sql_ary[] = array('config_name' =>  'pb_coldbear', 'config_value' => 'Coldbear'  );
		$sql_ary[] = array('config_name' =>  'pb_storvagun', 'config_value' => 'Storvagun'  );
		$sql_ary[] = array('config_name' =>  'pb_ansach', 'config_value' => 'Ansach'  );
		$sql_ary[] = array('config_name' =>  'pb_breosal', 'config_value' => 'Breosal'  );
		$sql_ary[] = array('config_name' =>  'pb_grisgart', 'config_value' => 'Grisgart'  );
		$sql_ary[] = array('config_name' =>  'pb_adhargul', 'config_value' => 'Adhargul'  );
		$sql_ary[] = array('config_name' =>  'pb_zaudru', 'config_value' => 'Zaudru'  );
		$sql_ary[] = array('config_name' =>  'pb_drugoth', 'config_value' => 'Drugoth The Death-Monger'  );
		$sql_ary[] = array('config_name' =>  'pb_thorog', 'config_value' => 'Thorog'  );
				
		// rift
		$sql_ary[] = array('config_name' =>  'pb_zurm', 'config_value' => 'Zurm'  );
		$sql_ary[] = array('config_name' =>  'pb_barz', 'config_value' => 'Barz'  );
		$sql_ary[] = array('config_name' =>  'pb_fruz', 'config_value' => 'Fruz'  );
		$sql_ary[] = array('config_name' =>  'pb_zogtark', 'config_value' => 'Zogtark'  );
		$sql_ary[] = array('config_name' =>  'pb_narnulubat', 'config_value' => 'Narnulubat'  );
		$sql_ary[] = array('config_name' =>  'pb_shadow_eater', 'config_value' => 'Shadow Eater'  );
		$sql_ary[] = array('config_name' =>  'pb_thrang', 'config_value' => 'Thrang'  );
		$sql_ary[] = array('config_name' =>  'pb_thaurlach', 'config_value' => 'Thaurlach'  );
		
		// urugarth
		$sql_ary[] = array('config_name' =>  'pb_sorkrank', 'config_value' => 'Sorkrank'  );
		$sql_ary[] = array('config_name' =>  'pb_burzfil', 'config_value' => 'Burzfil'  );
		$sql_ary[] = array('config_name' =>  'pb_dushkal', 'config_value' => 'Dushkal'  );
		$sql_ary[] = array('config_name' =>  'pb_akrur', 'config_value' => 'Akrur'  );
		$sql_ary[] = array('config_name' =>  'pb_kughurz', 'config_value' => 'Kughurz'  );
		$sql_ary[] = array('config_name' =>  'pb_lamkarn', 'config_value' => 'Lamkarn'  );
		$sql_ary[] = array('config_name' =>  'pb_athpukh', 'config_value' => 'Athpukh'  );
		$sql_ary[] = array('config_name' =>  'pb_lhugrien', 'config_value' => 'Lhugrien'  );
		$sql_ary[] = array('config_name' =>  'pb_morthrang', 'config_value' => 'Morthrang'  );
		$sql_ary[] = array('config_name' =>  'pb_gruglok', 'config_value' => 'Gruglok'  );
		$sql_ary[] = array('config_name' =>  'pb_lagmas', 'config_value' => 'Thaurlach'  );
		
		//barad_gularan
		$sql_ary[] = array('config_name' =>  'pb_forvengwath', 'config_value' => 'Forvengwath'  );
		$sql_ary[] = array('config_name' =>  'pb_wisdan', 'config_value' => 'Castellan Wisdan'  );
		$sql_ary[] = array('config_name' =>  'pb_udunion', 'config_value' => 'Udunion'  );
		
		//carn_dum
		$sql_ary[] = array('config_name' =>  'pb_urro', 'config_value' => 'Urro'  );
		$sql_ary[] = array('config_name' =>  'pb_barashal', 'config_value' => 'Barashal'  );
		$sql_ary[] = array('config_name' =>  'pb_helchgam', 'config_value' => 'Helchgam'  );
		$sql_ary[] = array('config_name' =>  'pb_salvakh', 'config_value' => 'Salvakh'  );
		$sql_ary[] = array('config_name' =>  'pb_azgoth', 'config_value' => 'Azgoth'  );
		$sql_ary[] = array('config_name' =>  'pb_tarlug', 'config_value' => 'Tarlug'  );
		$sql_ary[] = array('config_name' =>  'pb_mormoz', 'config_value' => 'Mormoz'  );
		$sql_ary[] = array('config_name' =>  'pb_rodakhan', 'config_value' => 'Rodakhan'  );
		$sql_ary[] = array('config_name' =>  'pb_mura', 'config_value' => 'Mura'  );
		$sql_ary[] = array('config_name' =>  'pb_gurthul', 'config_value' => 'Gurthul'  );
		$sql_ary[] = array('config_name' =>  'pb_mordirith', 'config_value' => 'Mordirith'  );
		
		//great_barrow
		$sql_ary[] = array('config_name' =>  'pb_gaerthel_gaerdring', 'config_value' => 'Gaerthel & Gaerdring'  );
		$sql_ary[] = array('config_name' =>  'pb_thadur', 'config_value' => 'Thadur the Ravager'  );
		$sql_ary[] = array('config_name' =>  'pb_sambrog', 'config_value' => 'Sambrog'  );
		
		//garth_agarwen
		$sql_ary[] = array('config_name' =>  'pb_temair', 'config_value' => 'Temair the Devoted'  );
		$sql_ary[] = array('config_name' =>  'pb_grimbark', 'config_value' => 'Grimbark'  );
		$sql_ary[] = array('config_name' =>  'pb_edan_esyld', 'config_value' => 'Edan & Esyld'  );
		$sql_ary[] = array('config_name' =>  'pb_ivar', 'config_value' => 'Ivar the Bloodhand'  );
		$sql_ary[] = array('config_name' =>  'pb_vatar', 'config_value' => 'Vatar'  );
		$sql_ary[] = array('config_name' =>  'pb_naruhel', 'config_value' => 'Naruhel - The Red Maid'  );
		
		// ettenmoors_creeps
		$sql_ary[] = array('config_name' =>  'pb_tharbil', 'config_value' => 'Tyrant Tharbil'  );
		$sql_ary[] = array('config_name' =>  'pb_burzgoth', 'config_value' => 'Tyrant Burzgoth'  );
		$sql_ary[] = array('config_name' =>  'pb_gundzor', 'config_value' => 'Tyrant Gundzor'  );
		$sql_ary[] = array('config_name' =>  'pb_durgrat', 'config_value' => 'Tyrant Durgrat'  );
		$sql_ary[] = array('config_name' =>  'pb_trintru', 'config_value' => 'Tyrant Trintru'  );
		$sql_ary[] = array('config_name' =>  'pb_barashish', 'config_value' => 'Tyrant Barashish'  );
		
		// ettenmoors_freeps
		$sql_ary[] = array('config_name' =>  'pb_bordagor', 'config_value' => 'Captain-General Bordagor'  );
		$sql_ary[] = array('config_name' =>  'pb_lainedhel', 'config_value' => 'Captain-General Lainedhel'  );
		$sql_ary[] = array('config_name' =>  'pb_verdantine', 'config_value' => 'Captain-General Verdantine'  );
		$sql_ary[] = array('config_name' =>  'pb_makan', 'config_value' => 'Captain-General Makan'  );
		$sql_ary[] = array('config_name' =>  'pb_meldun', 'config_value' => 'Captain-General Meldun'  );
		$sql_ary[] = array('config_name' =>  'pb_harvestgain', 'config_value' => 'Captain-General Harvestgain'  );
		
		$sql_ary[] = array('config_name' =>  'pz_lotro_misc', 'config_value' => 'Miscellaneous bosses'  );
		$sql_ary[] = array('config_name' =>  'pz_annuminas', 'config_value' => 'Annuminas - Glinghant'  );
		$sql_ary[] = array('config_name' =>  'pz_helegrod', 'config_value' => 'Helegrod'  );
		$sql_ary[] = array('config_name' =>  'pz_fornost', 'config_value' => 'Fornost'  );
		$sql_ary[] = array('config_name' =>  'pz_rift', 'config_value' => 'The Rift of Nrz Ghshu'  );
		$sql_ary[] = array('config_name' =>  'pz_urugarth', 'config_value' => 'Urugarth'  );
		$sql_ary[] = array('config_name' =>  'pz_barad_gularan', 'config_value' => 'Barad Gularan'  );
		$sql_ary[] = array('config_name' =>  'pz_carn_dum', 'config_value' => 'Carn Dum'  );
		$sql_ary[] = array('config_name' =>  'pz_great_barrow', 'config_value' => 'The Great Barrow'  );
		$sql_ary[] = array('config_name' =>  'pz_garth_agarwen', 'config_value' => 'Garth Agarwen'  );
		$sql_ary[] = array('config_name' =>  'pz_ettenmoors_creeps', 'config_value' => 'Ettenmoors creeps'  );
		$sql_ary[] = array('config_name' =>  'pz_ettenmoors_freeps', 'config_value' => 'Ettenmoors freeps'  );
		
		$sql_ary[] = array('config_name' =>  'sz_lotro_misc', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_annuminas', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_helegrod', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_fornost', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_rift', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_urugarth', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_barad_gularan', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_carn_dum', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_great_barrow', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_garth_agarwen', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_ettenmoors_creeps', 'config_value' => '1'  );
		$sql_ary[] = array('config_name' =>  'sz_ettenmoors_freeps', 'config_value' => '1'  );
	    	
		$db->sql_multi_insert( $bbdkp_table_prefix . 'bb_config' , $sql_ary);
	}

    unset ($sql_ary); 
    // boss list     
    $sql_ary = array();

    // Boss offsets
	$db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'bb_offsets');
	$sql_ary = array();
	
	// lotro_misc
	$sql_ary[] = array('name' => 'bogbereth' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ferndur' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	//Annuminas
	$sql_ary[] = array('name' => 'annuminas' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'glinghant' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'nengon' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ost_elendil' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'guloth' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'balhest' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'haudh_valandil' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'shingrinder' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'dolvaethor' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'valandil' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );

	// Fornost
	$sql_ary[] = array('name' => 'brogadan' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'megoriath' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'rhavameldir' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'warchief_burzghash' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'zhurmat' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'riamul' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'zanthrug' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'krithmog' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'einiora' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'remmenaeg' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );

	// Helegrod
	$sql_ary[] = array('name' => 'coldbear' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'storvagun' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ansach' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'breosal' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'grisgart' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'adhargul' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'zaudru' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );	
	$sql_ary[] = array('name' => 'drugoth' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'thorog' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	//	The Rift of Nrz Ghshu 
	$sql_ary[] = array('name' => 'zurm' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'barz' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'fruz' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'zogtark' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'narnulubat' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'shadow_eater' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'thrang' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'thaurlach' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	//urugarth
	$sql_ary[] = array('name' => 'sorkrank' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'burzfil' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'dushkal' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'akrur' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'kughurz' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'lamkarn' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'athpukh' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'lhugrien' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'morthrang' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gruglok' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'lagmas' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	// Barad Gularan 
	$sql_ary[] = array('name' => 'forvengwath' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'wisdan' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'udunion' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	// carn dum
	$sql_ary[] = array('name' => 'urro' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'barashal' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'helchgam' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'salvakh' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'azgoth' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'tarlug' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'mormoz' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'rodakhan' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'mura' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gurthul' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'mordirith' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );

	// great barrow
	$sql_ary[] = array('name' => 'gaerthel_gaerdring' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'thadur' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'sambrog' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );

	//Garth Agarwen
	$sql_ary[] = array('name' => 'temair' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'grimbark' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'edan_esyld' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ivar' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'vatar' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'naruhel' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );

	//Ettenmoors creeps
	$sql_ary[] = array('name' => 'tharbil' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'burzgoth' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'gundzor' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'durgrat' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'trintru' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'barashish' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	//Ettenmoors freeps
	$sql_ary[] = array('name' => 'bordagor' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'lainedhel' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'verdantine' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'makan' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'meldun' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'harvestgain' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	
	// zones
	$sql_ary[] = array('name' => 'lotro_misc' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'glinghant' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'helegrod' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'fornost' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'rift' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'urugarth' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'barad_gularan' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'carn_dum' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'great_barrow' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'garth_agarwen' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ettenmoors_creeps' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
	$sql_ary[] = array('name' => 'ettenmoors_freeps' ,  'fdate' => '1420063200' , 'ldate' => '946677600', 'counter' =>  '0' );
    $db->sql_multi_insert( $bbdkp_table_prefix . 'bb_offsets', $sql_ary);  
    unset ($sql_ary);
    
    // dkp system  set to default
    $db->sql_query('TRUNCATE TABLE ' . $bbdkp_table_prefix . 'dkpsystem');
	$sql_ary = array();
	$sql_ary[] = array('dkpsys_id' => 1 , 'dkpsys_name' => 'Default' , 'dkpsys_status' => 'Y', 'dkpsys_addedby' =>  'admin' , 'dkpsys_default' =>  'Y' ) ;
	$db->sql_multi_insert( $bbdkp_table_prefix . 'dkpsystem', $sql_ary);
    
}


/*
 * new boss progress data for vanguard
 * generated with the spreadsheet
 * 
 */
function update_lotro_bb2($bbdkp_table_prefix)
{
	global $db, $table_prefix, $umil, $user;
	
	if ($umil->table_exists ( $bbdkp_table_prefix . 'bb_zonetable' ) and ($umil->table_exists ( $bbdkp_table_prefix . 'bb_bosstable' )))
	{
		$sql_ary = array ();
		
		$sql_ary[] = array( 'id' => 1 ,  'imagename' =>  'lotro_misc' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 2 ,  'imagename' =>  'annuminas' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 3 ,  'imagename' =>  'fornost' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 4 ,  'imagename' =>  'helegrod' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 5 ,  'imagename' =>  'rift' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 6 ,  'imagename' =>  'urugarth' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 7 ,  'imagename' =>  'barad_gularan' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 8 ,  'imagename' =>  'carn_dum' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 9 ,  'imagename' =>  'great_barrow' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 10 ,  'imagename' =>  'garth_agarwen' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 11 ,  'imagename' =>  'ettenmoors_creeps' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
		$sql_ary[] = array( 'id' => 12 ,  'imagename' =>  'ettenmoors_freeps' , 'game' =>  'lotro' ,  'tier' =>  '' ,  'completed' =>  '0' ,  'completedate' =>  '0' ,  'webid' =>  '' ,  'showzone' =>  1, 'showzoneportal' =>  1);
				
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_zonetable', $sql_ary );
		unset ( $sql_ary );
				
		$sql_ary[] = array('id' => 1 ,  'imagename' =>  'bogbereth' , 'game' =>  'lotro' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 2 ,  'imagename' =>  'ferndur' , 'game' =>  'lotro' , 'zoneid' =>  2 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 3 ,  'imagename' =>  'glinghant' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 4 ,  'imagename' =>  'nengon' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 5 ,  'imagename' =>  'ost_elendil' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 6 ,  'imagename' =>  'guloth' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 7 ,  'imagename' =>  'balhest' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 8 ,  'imagename' =>  'haudh_valandil' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 9 ,  'imagename' =>  'shingrinder' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 10 ,  'imagename' =>  'dolvaethor' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 11 ,  'imagename' =>  'valandil' , 'game' =>  'lotro' , 'zoneid' =>  3 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 12 ,  'imagename' =>  'brogadan' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 13 ,  'imagename' =>  'megoriath' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 14 ,  'imagename' =>  'rhavameldir' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 15 ,  'imagename' =>  'warchief_burzghash' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 16 ,  'imagename' =>  'zhurmat' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 17 ,  'imagename' =>  'riamul' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 18 ,  'imagename' =>  'zanthrug' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 19 ,  'imagename' =>  'krithmog' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 20 ,  'imagename' =>  'einiora' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 21 ,  'imagename' =>  'remmenaeg' , 'game' =>  'lotro' , 'zoneid' =>  4 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 22 ,  'imagename' =>  'coldbear' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 23 ,  'imagename' =>  'storvagun' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 24 ,  'imagename' =>  'ansach' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 25 ,  'imagename' =>  'breosal' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 26 ,  'imagename' =>  'grisgart' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 27 ,  'imagename' =>  'adhargul' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 28 ,  'imagename' =>  'zaudru' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 29 ,  'imagename' =>  'drugoth' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 30 ,  'imagename' =>  'thorog' , 'game' =>  'lotro' , 'zoneid' =>  5 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 31 ,  'imagename' =>  'zurm' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 32 ,  'imagename' =>  'barz' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 33 ,  'imagename' =>  'fruz' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 34 ,  'imagename' =>  'zogtark' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 35 ,  'imagename' =>  'narnulubat' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 36 ,  'imagename' =>  'shadow_eater' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 37 ,  'imagename' =>  'thrang' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 38 ,  'imagename' =>  'thaurlach' , 'game' =>  'lotro' , 'zoneid' =>  6 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 39 ,  'imagename' =>  'sorkrank' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 40 ,  'imagename' =>  'burzfil' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 41 ,  'imagename' =>  'dushkal' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 42 ,  'imagename' =>  'akrur' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 43 ,  'imagename' =>  'kughurz' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 44 ,  'imagename' =>  'lamkarn' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 45 ,  'imagename' =>  'athpukh' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 46 ,  'imagename' =>  'lhugrien' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 47 ,  'imagename' =>  'morthrang' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 48 ,  'imagename' =>  'gruglok' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 49 ,  'imagename' =>  'lagmas' , 'game' =>  'lotro' , 'zoneid' =>  7 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 50 ,  'imagename' =>  'forvengwath' , 'game' =>  'lotro' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 51 ,  'imagename' =>  'wisdan' , 'game' =>  'lotro' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 52 ,  'imagename' =>  'udunion' , 'game' =>  'lotro' , 'zoneid' =>  8 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 53 ,  'imagename' =>  'urro' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 54 ,  'imagename' =>  'barashal' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 55 ,  'imagename' =>  'helchgam' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 56 ,  'imagename' =>  'salvakh' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 57 ,  'imagename' =>  'azgoth' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 58 ,  'imagename' =>  'tarlug' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 59 ,  'imagename' =>  'mormoz' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 60 ,  'imagename' =>  'rodakhan' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 61 ,  'imagename' =>  'mura' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 62 ,  'imagename' =>  'gurthul' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 63 ,  'imagename' =>  'mordirith' , 'game' =>  'lotro' , 'zoneid' =>  9 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 64 ,  'imagename' =>  'gaerthel_gaerdring' , 'game' =>  'lotro' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 65 ,  'imagename' =>  'thadur' , 'game' =>  'lotro' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 66 ,  'imagename' =>  'sambrog' , 'game' =>  'lotro' , 'zoneid' =>  10 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 67 ,  'imagename' =>  'temair' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 68 ,  'imagename' =>  'grimbark' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 69 ,  'imagename' =>  'edan_esyld' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 70 ,  'imagename' =>  'ivar' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 71 ,  'imagename' =>  'vatar' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 72 ,  'imagename' =>  'naruhel' , 'game' =>  'lotro' , 'zoneid' =>  11 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 73 ,  'imagename' =>  'tharbil' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 74 ,  'imagename' =>  'burzgoth' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 75 ,  'imagename' =>  'gundzor' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 76 ,  'imagename' =>  'durgrat' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 77 ,  'imagename' =>  'trintru' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 78 ,  'imagename' =>  'barashish' , 'game' =>  'lotro' , 'zoneid' =>  12 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 79 ,  'imagename' =>  'bordagor' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 80 ,  'imagename' =>  'lainedhel' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 81 ,  'imagename' =>  'verdantine' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 82 ,  'imagename' =>  'makan' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 83 ,  'imagename' =>  'meldun' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
		$sql_ary[] = array('id' => 84 ,  'imagename' =>  'harvestgain' , 'game' =>  'lotro' , 'zoneid' =>  13 , 'type' =>  'npc'  , 'webid' =>  '' , 'killed' =>  '0' , 'killdate' =>  '0' , 'counter' =>  '0' , 'showboss' =>  1     );
				
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_bosstable', $sql_ary );
		unset ( $sql_ary );

		$sql_ary[] = array( 'id' => 1 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Miscellaneous bosses' ,  'name_short' =>  'Miscellaneous bosses' );
		$sql_ary[] = array( 'id' => 2 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Annuminas - Glinghant' ,  'name_short' =>  'Annuminas - Glinghant' );
		$sql_ary[] = array( 'id' => 3 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Fornost' ,  'name_short' =>  'Fornost' );
		$sql_ary[] = array( 'id' => 4 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Helegrod' ,  'name_short' =>  'Helegrod' );
		$sql_ary[] = array( 'id' => 5 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Rift of Nrz Ghshu' ,  'name_short' =>  'The Rift of Nrz Ghshu' );
		$sql_ary[] = array( 'id' => 6 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Urugarth' ,  'name_short' =>  'Urugarth' );
		$sql_ary[] = array( 'id' => 7 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Barad Gularan' ,  'name_short' =>  'Barad Gularan' );
		$sql_ary[] = array( 'id' => 8 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Carn Dum' ,  'name_short' =>  'Carn Dum' );
		$sql_ary[] = array( 'id' => 9 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'The Great Barrow' ,  'name_short' =>  'The Great Barrow' );
		$sql_ary[] = array( 'id' => 10 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Garth Agarwen' ,  'name_short' =>  'Garth Agarwen' );
		$sql_ary[] = array( 'id' => 11 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Ettenmoors creeps' ,  'name_short' =>  'Ettenmoors creeps' );
		$sql_ary[] = array( 'id' => 12 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'zone' , 'name' =>  'Ettenmoors freeps' ,  'name_short' =>  'Ettenmoors freeps' );
		$sql_ary[] = array( 'id' => 13 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Bogbereth' ,  'name_short' =>  'Bogbereth' );
		$sql_ary[] = array( 'id' => 14 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ferndur' ,  'name_short' =>  'Ferndur' );
		$sql_ary[] = array( 'id' => 15 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Glinghant' ,  'name_short' =>  'Annu - Garden' );
		$sql_ary[] = array( 'id' => 16 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Nengon' ,  'name_short' =>  'Nengon' );
		$sql_ary[] = array( 'id' => 17 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Ost Elendil' ,  'name_short' =>  'Annu - Palace' );
		$sql_ary[] = array( 'id' => 18 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Guloth' ,  'name_short' =>  'Guloth' );
		$sql_ary[] = array( 'id' => 19 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Balhest' ,  'name_short' =>  'Balhest' );
		$sql_ary[] = array( 'id' => 20 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Haudh Valandil' ,  'name_short' =>  'Annu - Tomb' );
		$sql_ary[] = array( 'id' => 21 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Shingrinder' ,  'name_short' =>  'Shingrinder' );
		$sql_ary[] = array( 'id' => 22 , 'attribute_id' => 10, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Dolvaethor' ,  'name_short' =>  'Dolvaethor' );
		$sql_ary[] = array( 'id' => 23 , 'attribute_id' => 11, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Valandil of Arnor' ,  'name_short' =>  'Valandil' );
		$sql_ary[] = array( 'id' => 24 , 'attribute_id' => 12, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Brogadan' ,  'name_short' =>  'Bragadan' );
		$sql_ary[] = array( 'id' => 25 , 'attribute_id' => 13, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Megoriath' ,  'name_short' =>  'Megoriath' );
		$sql_ary[] = array( 'id' => 26 , 'attribute_id' => 14, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rhavameldir' ,  'name_short' =>  'Rhavameldir' );
		$sql_ary[] = array( 'id' => 27 , 'attribute_id' => 15, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Warchief Burzgash' ,  'name_short' =>  'Burzgash' );
		$sql_ary[] = array( 'id' => 28 , 'attribute_id' => 16, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zhurmat' ,  'name_short' =>  'Zhurmat' );
		$sql_ary[] = array( 'id' => 29 , 'attribute_id' => 17, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Riamul' ,  'name_short' =>  'Riamul' );
		$sql_ary[] = array( 'id' => 30 , 'attribute_id' => 18, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zanthrug' ,  'name_short' =>  'Zanthrug' );
		$sql_ary[] = array( 'id' => 31 , 'attribute_id' => 19, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Krithmog' ,  'name_short' =>  'Krithmog' );
		$sql_ary[] = array( 'id' => 32 , 'attribute_id' => 20, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Einiora' ,  'name_short' =>  'Einiora' );
		$sql_ary[] = array( 'id' => 33 , 'attribute_id' => 21, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Remmenaeg' ,  'name_short' =>  'Remmenaeg' );
		$sql_ary[] = array( 'id' => 34 , 'attribute_id' => 22, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Coldbear' ,  'name_short' =>  'Coldbear' );
		$sql_ary[] = array( 'id' => 35 , 'attribute_id' => 23, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Storvagun' ,  'name_short' =>  'Storvagun' );
		$sql_ary[] = array( 'id' => 36 , 'attribute_id' => 24, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ansach' ,  'name_short' =>  'Ansach' );
		$sql_ary[] = array( 'id' => 37 , 'attribute_id' => 25, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Breosal' ,  'name_short' =>  'Breosal' );
		$sql_ary[] = array( 'id' => 38 , 'attribute_id' => 26, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grisgart' ,  'name_short' =>  'Grisgart' );
		$sql_ary[] = array( 'id' => 39 , 'attribute_id' => 27, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Adhargul' ,  'name_short' =>  'Adhargul' );
		$sql_ary[] = array( 'id' => 40 , 'attribute_id' => 28, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zaudru' ,  'name_short' =>  'Zaudru' );
		$sql_ary[] = array( 'id' => 41 , 'attribute_id' => 29, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Drugoth The Death-Monger' ,  'name_short' =>  'Drugoth' );
		$sql_ary[] = array( 'id' => 42 , 'attribute_id' => 30, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thorog' ,  'name_short' =>  'Thorog' );
		$sql_ary[] = array( 'id' => 43 , 'attribute_id' => 31, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zurm' ,  'name_short' =>  'Zurm' );
		$sql_ary[] = array( 'id' => 44 , 'attribute_id' => 32, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Barz' ,  'name_short' =>  'Barz' );
		$sql_ary[] = array( 'id' => 45 , 'attribute_id' => 33, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Fruz' ,  'name_short' =>  'Fruz' );
		$sql_ary[] = array( 'id' => 46 , 'attribute_id' => 34, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Zogtark' ,  'name_short' =>  'Zogtark' );
		$sql_ary[] = array( 'id' => 47 , 'attribute_id' => 35, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Narnulubat' ,  'name_short' =>  'Narn˚lubat' );
		$sql_ary[] = array( 'id' => 48 , 'attribute_id' => 36, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Shadow Eater' ,  'name_short' =>  'Eater' );
		$sql_ary[] = array( 'id' => 49 , 'attribute_id' => 37, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thrang' ,  'name_short' =>  'Thrang' );
		$sql_ary[] = array( 'id' => 50 , 'attribute_id' => 38, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thaurlach' ,  'name_short' =>  'Thaurlach' );
		$sql_ary[] = array( 'id' => 51 , 'attribute_id' => 39, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sorkrank' ,  'name_short' =>  'Sorkrank' );
		$sql_ary[] = array( 'id' => 52 , 'attribute_id' => 40, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Burzfil' ,  'name_short' =>  'Burzfil' );
		$sql_ary[] = array( 'id' => 53 , 'attribute_id' => 41, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Dushkal' ,  'name_short' =>  'Dushkal' );
		$sql_ary[] = array( 'id' => 54 , 'attribute_id' => 42, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Akrur' ,  'name_short' =>  'Akrur' );
		$sql_ary[] = array( 'id' => 55 , 'attribute_id' => 43, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Kughurz' ,  'name_short' =>  'Kughurz' );
		$sql_ary[] = array( 'id' => 56 , 'attribute_id' => 44, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lamkarn' ,  'name_short' =>  'Lamkarn' );
		$sql_ary[] = array( 'id' => 57 , 'attribute_id' => 45, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Athpukh' ,  'name_short' =>  'Athpukh' );
		$sql_ary[] = array( 'id' => 58 , 'attribute_id' => 46, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lhugrien' ,  'name_short' =>  'Lhugrien' );
		$sql_ary[] = array( 'id' => 59 , 'attribute_id' => 47, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Morthrang' ,  'name_short' =>  'Morthrang' );
		$sql_ary[] = array( 'id' => 60 , 'attribute_id' => 48, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gruglok' ,  'name_short' =>  'Gruglok' );
		$sql_ary[] = array( 'id' => 61 , 'attribute_id' => 49, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Lagmas' ,  'name_short' =>  'Lagmas' );
		$sql_ary[] = array( 'id' => 62 , 'attribute_id' => 50, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Forvengwath' ,  'name_short' =>  'Forvengwath' );
		$sql_ary[] = array( 'id' => 63 , 'attribute_id' => 51, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Castellan Wisdan' ,  'name_short' =>  'Wisdan' );
		$sql_ary[] = array( 'id' => 64 , 'attribute_id' => 52, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Udunion' ,  'name_short' =>  'Udunion' );
		$sql_ary[] = array( 'id' => 65 , 'attribute_id' => 53, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Urro' ,  'name_short' =>  'Urro' );
		$sql_ary[] = array( 'id' => 66 , 'attribute_id' => 54, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Barashal' ,  'name_short' =>  'Barashal' );
		$sql_ary[] = array( 'id' => 67 , 'attribute_id' => 55, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Helchgam' ,  'name_short' =>  'Helchgam' );
		$sql_ary[] = array( 'id' => 68 , 'attribute_id' => 56, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Salvakh' ,  'name_short' =>  'Salvakh' );
		$sql_ary[] = array( 'id' => 69 , 'attribute_id' => 57, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Azgoth' ,  'name_short' =>  'Azgoth' );
		$sql_ary[] = array( 'id' => 70 , 'attribute_id' => 58, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tarlug' ,  'name_short' =>  'Tarlug' );
		$sql_ary[] = array( 'id' => 71 , 'attribute_id' => 59, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mormoz' ,  'name_short' =>  'Mormoz' );
		$sql_ary[] = array( 'id' => 72 , 'attribute_id' => 60, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Rodakhan' ,  'name_short' =>  'Rodakhan' );
		$sql_ary[] = array( 'id' => 73 , 'attribute_id' => 61, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mura' ,  'name_short' =>  'Mura' );
		$sql_ary[] = array( 'id' => 74 , 'attribute_id' => 62, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gurthul' ,  'name_short' =>  'Gurthul' );
		$sql_ary[] = array( 'id' => 75 , 'attribute_id' => 63, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Mordirith' ,  'name_short' =>  'Mordirith' );
		$sql_ary[] = array( 'id' => 76 , 'attribute_id' => 64, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Gaerthel & Gaerdring' ,  'name_short' =>  'G & G' );
		$sql_ary[] = array( 'id' => 77 , 'attribute_id' => 65, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Thadur the Ravager' ,  'name_short' =>  'Thad˙r' );
		$sql_ary[] = array( 'id' => 78 , 'attribute_id' => 66, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Sambrog' ,  'name_short' =>  'Sambrog' );
		$sql_ary[] = array( 'id' => 79 , 'attribute_id' => 67, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Temair the Devoted' ,  'name_short' =>  'Temair' );
		$sql_ary[] = array( 'id' => 80 , 'attribute_id' => 68, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Grimbark' ,  'name_short' =>  'Grimbark' );
		$sql_ary[] = array( 'id' => 81 , 'attribute_id' => 69, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Edan & Esyld' ,  'name_short' =>  'E & E' );
		$sql_ary[] = array( 'id' => 82 , 'attribute_id' => 70, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Ivar the Bloodhand' ,  'name_short' =>  'Ivar' );
		$sql_ary[] = array( 'id' => 83 , 'attribute_id' => 71, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Vatar' ,  'name_short' =>  'Vatar' );
		$sql_ary[] = array( 'id' => 84 , 'attribute_id' => 72, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Naruhel - The Red Maid' ,  'name_short' =>  'Naruhel' );
		$sql_ary[] = array( 'id' => 85 , 'attribute_id' => 73, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Tharbil' ,  'name_short' =>  'Tharbil' );
		$sql_ary[] = array( 'id' => 86 , 'attribute_id' => 74, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Burzgoth' ,  'name_short' =>  'Burzgoth' );
		$sql_ary[] = array( 'id' => 87 , 'attribute_id' => 75, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Gundzor' ,  'name_short' =>  'Gundzor' );
		$sql_ary[] = array( 'id' => 88 , 'attribute_id' => 76, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Durgrat' ,  'name_short' =>  'Durgrat' );
		$sql_ary[] = array( 'id' => 89 , 'attribute_id' => 77, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Trintru' ,  'name_short' =>  'Trintru' );
		$sql_ary[] = array( 'id' => 90 , 'attribute_id' => 78, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Barashish' ,  'name_short' =>  'Barashish' );
		$sql_ary[] = array( 'id' => 91 , 'attribute_id' => 79, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Bordagor' ,  'name_short' =>  'Bordagor' );
		$sql_ary[] = array( 'id' => 92 , 'attribute_id' => 80, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Lainedhel' ,  'name_short' =>  'Lainedhel' );
		$sql_ary[] = array( 'id' => 93 , 'attribute_id' => 81, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Verdantine' ,  'name_short' =>  'Verdantine' );
		$sql_ary[] = array( 'id' => 94 , 'attribute_id' => 82, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Makan' ,  'name_short' =>  'Makan' );
		$sql_ary[] = array( 'id' => 95 , 'attribute_id' => 83, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Meldun' ,  'name_short' =>  'Meldun' );
		$sql_ary[] = array( 'id' => 96 , 'attribute_id' => 84, 'language' =>  'en' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Harvestgain' ,  'name_short' =>  'Harvestgain' );
		
		$sql_ary[] = array( 'id' => 97 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Miscellaneous bosses' ,  'name_short' =>  'Miscellaneous bosses' );
		$sql_ary[] = array( 'id' => 98 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Annuminas - Glinghant' ,  'name_short' =>  'Annuminas - Glinghant' );
		$sql_ary[] = array( 'id' => 99 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Fornost' ,  'name_short' =>  'Fornost' );
		$sql_ary[] = array( 'id' => 100 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Helegrod' ,  'name_short' =>  'Helegrod' );
		$sql_ary[] = array( 'id' => 101 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Rift of Nrz Ghshu' ,  'name_short' =>  'The Rift of Nrz Ghshu' );
		$sql_ary[] = array( 'id' => 102 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Urugarth' ,  'name_short' =>  'Urugarth' );
		$sql_ary[] = array( 'id' => 103 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Barad Gularan' ,  'name_short' =>  'Barad Gularan' );
		$sql_ary[] = array( 'id' => 104 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Carn Dum' ,  'name_short' =>  'Carn Dum' );
		$sql_ary[] = array( 'id' => 105 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'The Great Barrow' ,  'name_short' =>  'The Great Barrow' );
		$sql_ary[] = array( 'id' => 106 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Garth Agarwen' ,  'name_short' =>  'Garth Agarwen' );
		$sql_ary[] = array( 'id' => 107 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Ettenmoors creeps' ,  'name_short' =>  'Ettenmoors creeps' );
		$sql_ary[] = array( 'id' => 108 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'zone' , 'name' =>  'Ettenmoors freeps' ,  'name_short' =>  'Ettenmoors freeps' );
		$sql_ary[] = array( 'id' => 109 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Bogbereth' ,  'name_short' =>  'Bogbereth' );
		$sql_ary[] = array( 'id' => 110 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ferndur' ,  'name_short' =>  'Ferndur' );
		$sql_ary[] = array( 'id' => 111 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Glinghant' ,  'name_short' =>  'Annu - Garden' );
		$sql_ary[] = array( 'id' => 112 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Nengon' ,  'name_short' =>  'Nengon' );
		$sql_ary[] = array( 'id' => 113 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Ost Elendil' ,  'name_short' =>  'Annu - Palace' );
		$sql_ary[] = array( 'id' => 114 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Guloth' ,  'name_short' =>  'Guloth' );
		$sql_ary[] = array( 'id' => 115 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Balhest' ,  'name_short' =>  'Balhest' );
		$sql_ary[] = array( 'id' => 116 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Annuminas - Haudh Valandil' ,  'name_short' =>  'Annu - Tomb' );
		$sql_ary[] = array( 'id' => 117 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Shingrinder' ,  'name_short' =>  'Shingrinder' );
		$sql_ary[] = array( 'id' => 118 , 'attribute_id' => 10, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dolvaethor' ,  'name_short' =>  'Dolvaethor' );
		$sql_ary[] = array( 'id' => 119 , 'attribute_id' => 11, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Valandil of Arnor' ,  'name_short' =>  'Valandil' );
		$sql_ary[] = array( 'id' => 120 , 'attribute_id' => 12, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Brogadan' ,  'name_short' =>  'Bragadan' );
		$sql_ary[] = array( 'id' => 121 , 'attribute_id' => 13, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Megoriath' ,  'name_short' =>  'Megoriath' );
		$sql_ary[] = array( 'id' => 122 , 'attribute_id' => 14, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Rhavameldir' ,  'name_short' =>  'Rhavameldir' );
		$sql_ary[] = array( 'id' => 123 , 'attribute_id' => 15, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Warchief Burzgash' ,  'name_short' =>  'Burzgash' );
		$sql_ary[] = array( 'id' => 124 , 'attribute_id' => 16, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zhurmat' ,  'name_short' =>  'Zhurmat' );
		$sql_ary[] = array( 'id' => 125 , 'attribute_id' => 17, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Riamul' ,  'name_short' =>  'Riamul' );
		$sql_ary[] = array( 'id' => 126 , 'attribute_id' => 18, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zanthrug' ,  'name_short' =>  'Zanthrug' );
		$sql_ary[] = array( 'id' => 127 , 'attribute_id' => 19, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Krithmog' ,  'name_short' =>  'Krithmog' );
		$sql_ary[] = array( 'id' => 128 , 'attribute_id' => 20, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Einiora' ,  'name_short' =>  'Einiora' );
		$sql_ary[] = array( 'id' => 129 , 'attribute_id' => 21, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Remmenaeg' ,  'name_short' =>  'Remmenaeg' );
		$sql_ary[] = array( 'id' => 130 , 'attribute_id' => 22, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Coldbear' ,  'name_short' =>  'Coldbear' );
		$sql_ary[] = array( 'id' => 131 , 'attribute_id' => 23, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Storvagun' ,  'name_short' =>  'Storvagun' );
		$sql_ary[] = array( 'id' => 132 , 'attribute_id' => 24, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ansach' ,  'name_short' =>  'Ansach' );
		$sql_ary[] = array( 'id' => 133 , 'attribute_id' => 25, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Breosal' ,  'name_short' =>  'Breosal' );
		$sql_ary[] = array( 'id' => 134 , 'attribute_id' => 26, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grisgart' ,  'name_short' =>  'Grisgart' );
		$sql_ary[] = array( 'id' => 135 , 'attribute_id' => 27, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Adhargul' ,  'name_short' =>  'Adhargul' );
		$sql_ary[] = array( 'id' => 136 , 'attribute_id' => 28, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zaudru' ,  'name_short' =>  'Zaudru' );
		$sql_ary[] = array( 'id' => 137 , 'attribute_id' => 29, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Drugoth The Death-Monger' ,  'name_short' =>  'Drugoth' );
		$sql_ary[] = array( 'id' => 138 , 'attribute_id' => 30, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thorog' ,  'name_short' =>  'Thorog' );
		$sql_ary[] = array( 'id' => 139 , 'attribute_id' => 31, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zurm' ,  'name_short' =>  'Zurm' );
		$sql_ary[] = array( 'id' => 140 , 'attribute_id' => 32, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Barz' ,  'name_short' =>  'Barz' );
		$sql_ary[] = array( 'id' => 141 , 'attribute_id' => 33, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Fruz' ,  'name_short' =>  'Fruz' );
		$sql_ary[] = array( 'id' => 142 , 'attribute_id' => 34, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Zogtark' ,  'name_short' =>  'Zogtark' );
		$sql_ary[] = array( 'id' => 143 , 'attribute_id' => 35, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Narnulubat' ,  'name_short' =>  'Narn˚lubat' );
		$sql_ary[] = array( 'id' => 144 , 'attribute_id' => 36, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Shadow Eater' ,  'name_short' =>  'Eater' );
		$sql_ary[] = array( 'id' => 145 , 'attribute_id' => 37, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thrang' ,  'name_short' =>  'Thrang' );
		$sql_ary[] = array( 'id' => 146 , 'attribute_id' => 38, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thaurlach' ,  'name_short' =>  'Thaurlach' );
		$sql_ary[] = array( 'id' => 147 , 'attribute_id' => 39, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sorkrank' ,  'name_short' =>  'Sorkrank' );
		$sql_ary[] = array( 'id' => 148 , 'attribute_id' => 40, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Burzfil' ,  'name_short' =>  'Burzfil' );
		$sql_ary[] = array( 'id' => 149 , 'attribute_id' => 41, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Dushkal' ,  'name_short' =>  'Dushkal' );
		$sql_ary[] = array( 'id' => 150 , 'attribute_id' => 42, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Akrur' ,  'name_short' =>  'Akrur' );
		$sql_ary[] = array( 'id' => 151 , 'attribute_id' => 43, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Kughurz' ,  'name_short' =>  'Kughurz' );
		$sql_ary[] = array( 'id' => 152 , 'attribute_id' => 44, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lamkarn' ,  'name_short' =>  'Lamkarn' );
		$sql_ary[] = array( 'id' => 153 , 'attribute_id' => 45, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Athpukh' ,  'name_short' =>  'Athpukh' );
		$sql_ary[] = array( 'id' => 154 , 'attribute_id' => 46, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lhugrien' ,  'name_short' =>  'Lhugrien' );
		$sql_ary[] = array( 'id' => 155 , 'attribute_id' => 47, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Morthrang' ,  'name_short' =>  'Morthrang' );
		$sql_ary[] = array( 'id' => 156 , 'attribute_id' => 48, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gruglok' ,  'name_short' =>  'Gruglok' );
		$sql_ary[] = array( 'id' => 157 , 'attribute_id' => 49, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Lagmas' ,  'name_short' =>  'Lagmas' );
		$sql_ary[] = array( 'id' => 158 , 'attribute_id' => 50, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Forvengwath' ,  'name_short' =>  'Forvengwath' );
		$sql_ary[] = array( 'id' => 159 , 'attribute_id' => 51, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Castellan Wisdan' ,  'name_short' =>  'Wisdan' );
		$sql_ary[] = array( 'id' => 160 , 'attribute_id' => 52, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Udunion' ,  'name_short' =>  'Udunion' );
		$sql_ary[] = array( 'id' => 161 , 'attribute_id' => 53, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Urro' ,  'name_short' =>  'Urro' );
		$sql_ary[] = array( 'id' => 162 , 'attribute_id' => 54, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Barashal' ,  'name_short' =>  'Barashal' );
		$sql_ary[] = array( 'id' => 163 , 'attribute_id' => 55, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Helchgam' ,  'name_short' =>  'Helchgam' );
		$sql_ary[] = array( 'id' => 164 , 'attribute_id' => 56, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Salvakh' ,  'name_short' =>  'Salvakh' );
		$sql_ary[] = array( 'id' => 165 , 'attribute_id' => 57, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Azgoth' ,  'name_short' =>  'Azgoth' );
		$sql_ary[] = array( 'id' => 166 , 'attribute_id' => 58, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tarlug' ,  'name_short' =>  'Tarlug' );
		$sql_ary[] = array( 'id' => 167 , 'attribute_id' => 59, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mormoz' ,  'name_short' =>  'Mormoz' );
		$sql_ary[] = array( 'id' => 168 , 'attribute_id' => 60, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Rodakhan' ,  'name_short' =>  'Rodakhan' );
		$sql_ary[] = array( 'id' => 169 , 'attribute_id' => 61, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mura' ,  'name_short' =>  'Mura' );
		$sql_ary[] = array( 'id' => 170 , 'attribute_id' => 62, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gurthul' ,  'name_short' =>  'Gurthul' );
		$sql_ary[] = array( 'id' => 171 , 'attribute_id' => 63, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Mordirith' ,  'name_short' =>  'Mordirith' );
		$sql_ary[] = array( 'id' => 172 , 'attribute_id' => 64, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Gaerthel & Gaerdring' ,  'name_short' =>  'G & G' );
		$sql_ary[] = array( 'id' => 173 , 'attribute_id' => 65, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Thadur the Ravager' ,  'name_short' =>  'Thad˙r' );
		$sql_ary[] = array( 'id' => 174 , 'attribute_id' => 66, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Sambrog' ,  'name_short' =>  'Sambrog' );
		$sql_ary[] = array( 'id' => 175 , 'attribute_id' => 67, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Temair the Devoted' ,  'name_short' =>  'Temair' );
		$sql_ary[] = array( 'id' => 176 , 'attribute_id' => 68, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Grimbark' ,  'name_short' =>  'Grimbark' );
		$sql_ary[] = array( 'id' => 177 , 'attribute_id' => 69, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Edan & Esyld' ,  'name_short' =>  'E & E' );
		$sql_ary[] = array( 'id' => 178 , 'attribute_id' => 70, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Ivar the Bloodhand' ,  'name_short' =>  'Ivar' );
		$sql_ary[] = array( 'id' => 179 , 'attribute_id' => 71, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Vatar' ,  'name_short' =>  'Vatar' );
		$sql_ary[] = array( 'id' => 180 , 'attribute_id' => 72, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Naruhel - The Red Maid' ,  'name_short' =>  'Naruhel' );
		$sql_ary[] = array( 'id' => 181 , 'attribute_id' => 73, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Tharbil' ,  'name_short' =>  'Tharbil' );
		$sql_ary[] = array( 'id' => 182 , 'attribute_id' => 74, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Burzgoth' ,  'name_short' =>  'Burzgoth' );
		$sql_ary[] = array( 'id' => 183 , 'attribute_id' => 75, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Gundzor' ,  'name_short' =>  'Gundzor' );
		$sql_ary[] = array( 'id' => 184 , 'attribute_id' => 76, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Durgrat' ,  'name_short' =>  'Durgrat' );
		$sql_ary[] = array( 'id' => 185 , 'attribute_id' => 77, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Trintru' ,  'name_short' =>  'Trintru' );
		$sql_ary[] = array( 'id' => 186 , 'attribute_id' => 78, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Tyrant Barashish' ,  'name_short' =>  'Barashish' );
		$sql_ary[] = array( 'id' => 187 , 'attribute_id' => 79, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Bordagor' ,  'name_short' =>  'Bordagor' );
		$sql_ary[] = array( 'id' => 188 , 'attribute_id' => 80, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Lainedhel' ,  'name_short' =>  'Lainedhel' );
		$sql_ary[] = array( 'id' => 189 , 'attribute_id' => 81, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Verdantine' ,  'name_short' =>  'Verdantine' );
		$sql_ary[] = array( 'id' => 190 , 'attribute_id' => 82, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Makan' ,  'name_short' =>  'Makan' );
		$sql_ary[] = array( 'id' => 191 , 'attribute_id' => 83, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Meldun' ,  'name_short' =>  'Meldun' );
		$sql_ary[] = array( 'id' => 192 , 'attribute_id' => 84, 'language' =>  'fr' , 'attribute' =>  'boss' , 'name' =>  'Captain-General Harvestgain' ,  'name_short' =>  'Harvestgain' );
	
		$sql_ary[] = array( 'id' => 193 , 'attribute_id' => 0, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Unknown' ,  'name_short' =>  'Unknown' );
		$sql_ary[] = array( 'id' => 194 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Burglar' ,  'name_short' =>  'Burglar' );
		$sql_ary[] = array( 'id' => 195 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Captain' ,  'name_short' =>  'Captain' );
		$sql_ary[] = array( 'id' => 196 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Champion' ,  'name_short' =>  'Champion' );
		$sql_ary[] = array( 'id' => 197 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Guardian' ,  'name_short' =>  'Guardian' );
		$sql_ary[] = array( 'id' => 198 , 'attribute_id' => 5, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Hunter' ,  'name_short' =>  'Hunter' );
		$sql_ary[] = array( 'id' => 199 , 'attribute_id' => 6, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Lore-master' ,  'name_short' =>  'Lore-master' );
		$sql_ary[] = array( 'id' => 200 , 'attribute_id' => 7, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Minstrel' ,  'name_short' =>  'Minstrel' );
		$sql_ary[] = array( 'id' => 201 , 'attribute_id' => 8, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Rune-keeper' ,  'name_short' =>  'Rune-keeper' );
		$sql_ary[] = array( 'id' => 202 , 'attribute_id' => 9, 'language' =>  'en' , 'attribute' =>  'class' , 'name' =>  'Warden' ,  'name_short' =>  'Warden' );
		
		$sql_ary[] = array( 'id' => 203 , 'attribute_id' => 0, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Inconnu' ,  'name_short' =>  'Inconnu' );
		$sql_ary[] = array( 'id' => 204 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Cambrioleur' ,  'name_short' =>  'Cambrioleur' );
		$sql_ary[] = array( 'id' => 205 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Capitaine' ,  'name_short' =>  'Capitaine' );
		$sql_ary[] = array( 'id' => 206 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Champion' ,  'name_short' =>  'Champion' );
		$sql_ary[] = array( 'id' => 207 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Guardien' ,  'name_short' =>  'Guardien' );
		$sql_ary[] = array( 'id' => 208 , 'attribute_id' => 5, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Chasseur' ,  'name_short' =>  'Chasseur' );
		$sql_ary[] = array( 'id' => 209 , 'attribute_id' => 6, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Me du Savoir' ,  'name_short' =>  'Me du Savoir' );
		$sql_ary[] = array( 'id' => 210 , 'attribute_id' => 7, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Ménestrel' ,  'name_short' =>  'Ménestrel' );
		$sql_ary[] = array( 'id' => 211 , 'attribute_id' => 8, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Gardien des Rune' ,  'name_short' =>  'Gardien des Rune' );
		$sql_ary[] = array( 'id' => 212 , 'attribute_id' => 9, 'language' =>  'fr' , 'attribute' =>  'class' , 'name' =>  'Sentinelle' ,  'name_short' =>  'Sentinelle' );
	
		$sql_ary[] = array( 'id' => 225 , 'attribute_id' => 0, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Unbekannt' ,  'name_short' =>  'Unbekannt' );
		$sql_ary[] = array( 'id' => 226 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Schurke' ,  'name_short' =>  'Schurke' );
		$sql_ary[] = array( 'id' => 227 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Hauptmann' ,  'name_short' =>  'Capitaine' );
		$sql_ary[] = array( 'id' => 228 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Waffenmeister' ,  'name_short' =>  'Champion' );
		$sql_ary[] = array( 'id' => 229 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Wächter' ,  'name_short' =>  'Guardien' );
		$sql_ary[] = array( 'id' => 230 , 'attribute_id' => 5, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Jager' ,  'name_short' =>  'Chasseur' );
		$sql_ary[] = array( 'id' => 231 , 'attribute_id' => 6, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Kundiger' ,  'name_short' =>  'Kundiger' );
		$sql_ary[] = array( 'id' => 232 , 'attribute_id' => 7, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Barde' ,  'name_short' =>  'Barde' );
		$sql_ary[] = array( 'id' => 233 , 'attribute_id' => 8, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Runenbewahrer' ,  'name_short' =>  'Runenbewahrer' );
		$sql_ary[] = array( 'id' => 234 , 'attribute_id' => 9, 'language' =>  'de' , 'attribute' =>  'class' , 'name' =>  'Hüter' ,  'name_short' =>  'Hüter' );
	
		$sql_ary[] = array( 'id' => 213 , 'attribute_id' => 1, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Man' ,  'name_short' =>  'Man' );
		$sql_ary[] = array( 'id' => 214 , 'attribute_id' => 2, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Hobbit' ,  'name_short' =>  'Hobbit' );
		$sql_ary[] = array( 'id' => 215 , 'attribute_id' => 3, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Elf' ,  'name_short' =>  'Elf' );
		$sql_ary[] = array( 'id' => 216 , 'attribute_id' => 4, 'language' =>  'en' , 'attribute' =>  'race' , 'name' =>  'Dwarf' ,  'name_short' =>  'Dwarf' );
		
		$sql_ary[] = array( 'id' => 217 , 'attribute_id' => 1, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Humain' ,  'name_short' =>  'Humain' );
		$sql_ary[] = array( 'id' => 218 , 'attribute_id' => 2, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Hobbit' ,  'name_short' =>  'Hobbit' );
		$sql_ary[] = array( 'id' => 219 , 'attribute_id' => 3, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Elfe' ,  'name_short' =>  'Elfe' );
		$sql_ary[] = array( 'id' => 220 , 'attribute_id' => 4, 'language' =>  'fr' , 'attribute' =>  'race' , 'name' =>  'Nain' ,  'name_short' =>  'Nain' );
				
		$sql_ary[] = array( 'id' => 221 , 'attribute_id' => 1, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Mensch' ,  'name_short' =>  'Mensch' );
		$sql_ary[] = array( 'id' => 222 , 'attribute_id' => 2, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Hobbit' ,  'name_short' =>  'Hobbit' );
		$sql_ary[] = array( 'id' => 223 , 'attribute_id' => 3, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Elb' ,  'name_short' =>  'Elb' );
		$sql_ary[] = array( 'id' => 224 , 'attribute_id' => 4, 'language' =>  'de' , 'attribute' =>  'race' , 'name' =>  'Zwerg' ,  'name_short' =>  'Zwerg' );
		
		$db->sql_multi_insert ( $bbdkp_table_prefix . 'bb_language', $sql_ary );
		unset ( $sql_ary );
				
		
	}
}





    
?>