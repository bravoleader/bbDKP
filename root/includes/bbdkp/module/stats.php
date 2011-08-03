<?php
/**
 * statistics page
 * 
 * @package bbDKP
 * @copyright 2009 bbdkp <http://code.google.com/p/bbdkp/>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version $Id$
 * 
 */

/**
 * @ignore
 */
if ( !defined('IN_PHPBB') OR !defined('IN_BBDKP') )
{
	exit;
}


/* begin dkpsys pulldown */
// pulldown
$query_by_pool = false;
$defaultpool = 99; 

$dkpvalues[0] = $user->lang['ALL']; 
$dkpvalues[1] = '--------'; 
// find only pools with dkp records
$sql_array = array(
	'SELECT'    => 'a.dkpsys_id, a.dkpsys_name, a.dkpsys_default', 
	'FROM'		=> array( 
				DKPSYS_TABLE => 'a', 
				MEMBER_DKP_TABLE => 'd',
				), 
	'WHERE'  => ' a.dkpsys_id = d.member_dkpid', 
	'GROUP_BY'  => 'a.dkpsys_id'
); 
$sql = $db->sql_build_query('SELECT', $sql_array);
$result = $db->sql_query ( $sql );
$index = 3;
while ( $row = $db->sql_fetchrow ( $result ) )
{
	$dkpvalues[$index]['id'] = $row ['dkpsys_id']; 
	$dkpvalues[$index]['text'] = $row ['dkpsys_name']; 
	if (strtoupper ( $row ['dkpsys_default'] ) == 'Y')
	{
		$defaultpool = $row ['dkpsys_id'];
	}
	$index +=1;
}
$db->sql_freeresult ( $result );

$dkp_id = 0; 
if(isset( $_POST ['pool']) or isset( $_POST ['getdksysid']) or isset ( $_GET [URI_DKPSYS] ) )
{
	if (isset( $_POST ['pool']) )
	{
		$pulldownval = request_var('pool',  $user->lang['ALL']);
		if(is_numeric($pulldownval))
		{
			$query_by_pool = true;
			$dkp_id = intval($pulldownval); 	
		}
	}
	elseif (isset ( $_GET [URI_DKPSYS] ))
	{
		$query_by_pool = true;
		$dkp_id = request_var(URI_DKPSYS, 0); 
	}
}
else 
{
	$query_by_pool = true;
	$dkp_id = $defaultpool; 
}

foreach ( $dkpvalues as $key => $value )
{
	if(!is_array($value))
	{
		$template->assign_block_vars ( 'pool_row', array (
			'VALUE' => $value, 
			'SELECTED' => ($value == $dkp_id && $value != '--------') ? ' selected="selected"' : '',
			'DISABLED' => ($value == '--------' ) ? ' disabled="disabled"' : '',  
			'OPTION' => $value, 
		));
	}
	else 
	{
		$template->assign_block_vars ( 'pool_row', array (
			'VALUE' => $value['id'], 
			'SELECTED' => ($dkp_id == $value['id']) ? ' selected="selected"' : '', 
			'OPTION' => $value['text'], 
		));
		
	}
}

$arg='';
if ($query_by_pool)
{
    $arg = '&amp;' . URI_DKPSYS. '=' . $dkp_id;
}

$u_stats = append_sid ( "{$phpbb_root_path}dkp.$phpEx", 'page=stats' . $arg );

/**** end dkpsys pulldown  ****/
$time = time() + $user->timezone + $user->dst;

/***********************
 *  
 *  Member Statistics 
 *  
 **********************/

/**** column sorting *****/
$sort_order = array(
     0 => array('pr desc', 'pr'),
     1 => array('member_current desc', 'member_current'), 
     2 => array('member_raidcount desc', 'member_raidcount asc'),
     3 => array('member_name asc', 'member_name desc'),
     4 => array('ep desc', 'ep'),
     5 => array('ep_per_day desc', 'ep_per_day'),
     6 => array('ep_per_raid desc', 'ep_per_raid'),
     7 => array('gp desc', 'gp'),
     8 => array('gp_per_day desc', 'gp_per_day'),
     9 => array('gp_per_raid desc', 'gp_per_raid'),
     10 => array('member_raidcount desc', 'member_raidcount'), 
     11 => array('itemcount desc', 'itemcount')
);

$current_order = switch_order($sort_order);
$sort_index = explode('.', $current_order['uri']['current']);
$previous_source = preg_replace('/( (asc|desc))?/i', '', $sort_order[$sort_index[0]][$sort_index[1]]);
$previous_data = '';

// Find total # drops 
$sql_array = array (
	'SELECT' => ' count(item_id) AS items ', 
	'FROM' => array (
		EVENTS_TABLE => 'e', 
		RAIDS_TABLE => 'r', 
		RAID_ITEMS_TABLE => 'i', 
		), 
	'WHERE' => ' e.event_id = r.event_id 
			  AND i.raid_id = r.raid_id
			  AND item_value != 0'
);

if ($query_by_pool)
{
  $sql_array['WHERE'] .= ' and event_dkpid = '. (int) $dkp_id . ' ';
}

$sql = $db->sql_build_query ( 'SELECT', $sql_array );
$result = $db->sql_query($sql);
$total_drops = (int) $db->sql_fetchfield('items');
$db->sql_freeresult($result);


// get raidcount
$sql = 'SELECT count(*) as raidcount FROM ' . RAIDS_TABLE . ' r, ' . EVENTS_TABLE . ' e where r.event_id = e.event_id ';
if ($query_by_pool)
{
    $sql .= ' AND event_dkpid = '. $dkp_id; 
}
$result = $db->sql_query($sql);
$total_raids = (int) $db->sql_fetchfield('raidcount',0,$result);   
$db->sql_freeresult ( $result );

$show_all = ( (isset($_GET['show'])) && (request_var('show', '') == "all") ) ? true : false;

/* loot distribution per member and class */

$sql = "SELECT d.member_dkpid, l.member_id, l.member_name, c.class_id, c.game_id, c.colorcode,  c.imagename, 
sum(d.member_raidcount) as member_raidcount, 
sum(CASE WHEN x.itemcount IS NULL THEN 0 ELSE x.itemcount END) as itemcount, 
sum(d.member_earned - d.member_raid_decay + d.member_adjustment) AS ep,
(d.member_earned - d.member_raid_decay + d.member_adjustment) / d.member_raidcount AS ep_per_raid,
(d.member_earned - d.member_raid_decay + d.member_adjustment) / (((" . $time . " - d.member_firstraid)+86400) / 86400)  AS ep_per_day,
  d.member_spent - d.member_item_decay + ( " . max(0, $config['bbdkp_basegp']) . ") AS gp, 
( d.member_spent - d.member_item_decay + ( " . max(0, $config['bbdkp_basegp']) . ") )  / d.member_raidcount AS gp_per_raid, 
( d.member_spent - d.member_item_decay + ( " . max(0, $config['bbdkp_basegp']) . ") )  / ((( " . $time ."  - d.member_firstraid)+86400) / 86400) AS gp_per_day,
(d.member_earned - d.member_raid_decay + d.member_adjustment - d.member_spent + d.member_item_decay - ( " . max(0, $config['bbdkp_basegp']) . ") ) AS member_current,
CASE WHEN d.member_spent - d.member_item_decay <= 0 
THEN ROUND((d.member_earned - d.member_raid_decay + d.member_adjustment) / " . max(0, $config['bbdkp_basegp']) . " , 2)
ELSE ROUND((d.member_earned - d.member_raid_decay + d.member_adjustment) / (" . max(0, $config['bbdkp_basegp']) ." + d.member_spent - d.member_item_decay) ,2) 
END AS pr , 
((" . $time . " - member_firstraid) / 86400) AS zero_check  ";

$sql .= " FROM (". MEMBER_DKP_TABLE ." d LEFT JOIN (
SELECT i.member_id, count(i.item_id) AS itemcount
FROM 
((". EVENTS_TABLE." e INNER JOIN " . RAIDS_TABLE ." r ON e.event_id=r.event_id)
INNER JOIN ". RAID_ITEMS_TABLE . " i ON  r.raid_id = i.raid_id ) ";
 
if ($query_by_pool)
{
	$sql .= " WHERE e.event_dkpid  = " . $dkp_id; 
}

$sql .= " GROUP BY i.member_id
) x
on d.member_id = x.member_id)
INNER JOIN " . MEMBER_LIST_TABLE . " l ON l.member_id = d.member_id
INNER JOIN ". CLASS_TABLE ." c ON l.member_class_id = c.class_id AND l.game_id = c.game_id
WHERE 1=1 ";

if ($query_by_pool)
{
	$sql .= " AND d.member_dkpid = " . $dkp_id; 
}

if ( ($config['bbdkp_hide_inactive'] == 1) && (!$show_all) )
{
   $sql .= " AND d.member_status='1'";
}

$sql .= " GROUP BY c.game_id,  c.colorcode,  c.imagename, c.class_id, l.member_id ";

$sql .= " ORDER BY " . $current_order['sql'];

if ( !($members_result = $db->sql_query($sql)) )
{
    trigger_error ($user->lang['MNOTFOUND']);
}

$member_count = 0;

$memberraidcount_g = array();
$memberattendancepct_g = array();
$membername_g = array();
$raid_count=  0;
while ( $row = $db->sql_fetchrow($members_result) )
{
	$member_count++;
	
	$raid_count += $row['member_raidcount']; 
    $row['earned_per_day'] = ( ( (!empty($row['earned_per_day']) ) && ( $row['zero_check'] > 0.01) )) ? $row['earned_per_day'] : '0.00';
    $row['earned_per_raid'] = (!empty($row['earned_per_raid'])) ? $row['earned_per_raid'] : '0.00';
    $row['spent_per_day'] = ( ( (!empty($row['spent_per_day']) ) && ($row['zero_check'] > 0.01) )) ? $row['spent_per_day'] : '0.00';
    $row['spent_per_raid'] = (!empty($row['spent_per_raid'])) ? $row['spent_per_raid'] : '0';
    $row['er'] = (!empty($row['er'])) ? $row['er'] : '0.00';
	$membername_g[]= $row['member_name'];
	$member_drop_pct = (float) ( $total_drops > 0 ) ? round( ( (int) $row['itemcount'] / $total_drops) * 100, 1 ) : 0;
	$member_drop_pct_g[]=$member_drop_pct; 
	$_member_pr_g[] = $row['pr'];
	$_member_current_g[] = $row['member_current'];
    $template->assign_block_vars('stats_row', array(
        'NAME' 					=> $row['member_name'],
        'U_VIEW_MEMBER' 		=> append_sid("{$phpbb_root_path}dkp.$phpEx" , 'page=viewmember&amp;' .URI_DKPSYS . '=' . $row['member_dkpid'] . '&amp;' . URI_NAMEID . '='.$row['member_id']),    
    	'COLORCODE'				=> $row['colorcode'],
    	'ID'            		=> $row['member_id'],
	    'COUNT'         		=> ($row[$previous_source] == $previous_data) ? '&nbsp;' : $member_count,
        'ATTENDED_COUNT' 		=> $row['member_raidcount'],
    	'ITEM_COUNT' 			=> $row['itemcount'],
    	'MEMBER_DROP_PCT'		=> sprintf("%s %%", $member_drop_pct),
        
        'EP_TOTAL' 				=> $row['ep'],
        'EP_PER_DAY' 			=> sprintf("%.2f", $row['ep_per_day']),
        'EP_PER_RAID' 			=> sprintf("%.2f", $row['ep_per_raid']),
        'GP_TOTAL' 				=> $row['gp'],
        'GP_PER_DAY' 			=> sprintf("%.2f", $row['gp_per_day']),
        'GP_PER_RAID' 			=> sprintf("%.2f", $row['gp_per_raid']),
        'PR'			 		=> sprintf("%.2f", $row['pr']),
        'CURRENT' 				=> $row['member_current'], 
        'C_CURRENT'				=> ($row['member_current'] > 0 ? 'positive' : 'negative'), 
    )
    );

    $previous_data = $row[$previous_source];
}

if ( ($config['bbdkp_hide_inactive'] == 1) && (!$show_all) )
{
    $footcount_text = sprintf($user->lang['STATS_ACTIVE_FOOTCOUNT'], $db->sql_affectedrows($members_result),
    '<a href="' . append_sid("{$phpbb_root_path}dkp.$phpEx" , 'page=stats&amp;o='.$current_order['uri']['current']. '&amp;show=all' ) . '" class="rowfoot">');
}
else
{
    $footcount_text = sprintf($user->lang['STATS_FOOTCOUNT'], $db->sql_affectedrows($members_result));
}

$db->sql_freeresult($members_result);

/* send information to template */
$template->assign_vars(array(
    'O_PR' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][0] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) , 
    'O_CURRENT' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][1] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) , 
    'O_NAME'       => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][2] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')), 
    'O_RAIDCOUNT' =>  append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][3] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) ,
    'O_EARNED' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][4] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) ,
    'O_EARNED_PER_DAY' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][5] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) , 
    'O_EARNED_PER_RAID' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][6] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) , 
    'O_SPENT' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][7] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) , 
    'O_SPENT_PER_DAY' =>append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][8] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) , 
    'O_SPENT_PER_RAID' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][9] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) , 
    'O_RAIDCOUNT' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][10] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) ,
    'O_ITEMCOUNT' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats&amp;o=' . $current_order['uri'][11] . '&amp;' . URI_DKPSYS . '=' . ($query_by_pool ? $dkp_id : 'All')) ,
    'STATS_FOOTCOUNT' 	=> $footcount_text,
	'TOTAL_RAIDS' 	=> $raid_count,
	'TOTAL_DROPS' 	=> $total_drops,
	'S_SHOWEPGP' 	=> ($config['bbdkp_epgp'] == '1') ? true : false,
    )
);


/***********************
 *  
 *  Class Statistics 
 *  
 **********************/

$classes = array();

// Find total # members with a dkp record
$sql = 'SELECT count(member_id) AS members FROM ' . MEMBER_DKP_TABLE . ' where 1 = 1 ' ;
if ($query_by_pool)
{
    $sql .= ' AND member_dkpid = '. $dkp_id . ' ';
}

if ( ($config['bbdkp_hide_inactive'] == 1) && (!$show_all) )
{
   $sql .= " AND member_status='1'";
}

$result = $db->sql_query($sql);
$total_members = (int) $db->sql_fetchfield('members');


// get #classcount, #drops per class

$sql = "select 
c1.name as class_name, c.class_id, c.game_id, c.colorcode,  c.imagename, 
count(c.class_id) as class_count, sum(case when x.itemcount is null then 0 else x.itemcount end) as itemcount
from ((" . MEMBER_DKP_TABLE . " d left join 
(
SELECT i.member_id, count(i.item_id) as itemcount
FROM 
((" . EVENTS_TABLE ." e inner join ". RAIDS_TABLE ." r on e.event_id=r.event_id)
inner join " . RAID_ITEMS_TABLE . " i on  r.raid_id = i.raid_id )
WHERE e.event_dkpid = 3 
GROUP BY i.member_id
) x
on d.member_id = x.member_id)
INNER JOIN " . MEMBER_LIST_TABLE . " l on l.member_id = d.member_id
INNER JOIN " . CLASS_TABLE ." c on l.member_class_id = c.class_id and l.game_id = c.game_id)
INNER JOIN " . BB_LANGUAGE . " c1 ON c.game_id = c1.game_id AND c1.attribute_id = c.class_id AND c1.language= '" . $config['bbdkp_lang'] . "' AND c1.attribute = 'class' 
";

if ($query_by_pool)
{
     $sql .= ' WHERE d.member_dkpid = '. $dkp_id . ' ';
}

if ( ($config['bbdkp_hide_inactive'] == 1) && (!$show_all) )
{
   $sql .= " AND d.member_status='1'";
}


$sql .= " GROUP BY c.game_id,  c.colorcode,  c.imagename, c.class_id , c1.name ";

$result = $db->sql_query($sql);

$class_drop_pct_cum = 0;
$classname_g = array();
$class_drop_pct_g = array();
$classpct_g = array();
$classcount=0;
while ($row = $db->sql_fetchrow($result) )
{
	$classcount++;	
	$classname_g[] = $row['class_name'];
	// get class count and pct
	$class_count = $row['class_count'];
	$classpct = (float) ($total_members > 0) ? round(($row['class_count'] / $total_members) * 100,1)  : 0;
	$classpct_g[] = $classpct;
	
	// get drops per class and pct
	$loot_drops = (int) $row['itemcount'];
    $class_drop_pct = (float) ( $total_drops > 0 ) ? round( ( (int) $row['itemcount'] / $total_drops) * 100, 1 ) : 0;
    $class_drop_pct_g[] = $class_drop_pct;
	$class_drop_pct_cum +=  $class_drop_pct;
			
	$lootoverrun =  ($class_drop_pct - $classpct); 

	if ($query_by_pool)
    {
        $lmlink =  append_sid("{$phpbb_root_path}dkp.$phpEx" , 'page=standings&amp;filter='. $row['game_id'].'_class_' . $row['class_id'] . '&amp;' . URI_DKPSYS .'=' . $dkp_id); 
    }
    else 
    {
        $lmlink =  append_sid("{$phpbb_root_path}dkp.$phpEx" , 'page=standings&amp;filter='. $row['game_id'] .'_class_' . $row['class_id']);
    }
    
       $template->assign_block_vars('class_row', array(
    	'U_LIST_MEMBERS' 	=> $lmlink ,
		'COLORCODE'  		=> ($row['colorcode'] == '') ? '#123456' : $row['colorcode'],
    	'CLASS_IMAGE' 		=> (strlen($row['imagename']) > 1) ? $phpbb_root_path . "images/class_images/" . $row['imagename'] . ".png" : '',  
		'S_CLASS_IMAGE_EXISTS' => (strlen($row['imagename']) > 1) ? true : false, 		
        'CLASS_NAME'		=> $row['class_name'],
		
        'CLASS_COUNT' 		=> (int) $class_count,
        'CLASS_PCT' 		=> sprintf("%s %%", $classpct ),
    
        'LOOT_COUNT' 		=> $loot_drops,
    	'CLASS_DROP_PCT'	=> sprintf("%s %%", $class_drop_pct  ),
    
    	'C_LOOT_FACTOR'		=> ($lootoverrun < 	0) ? 'negative' : 'positive', 
       	'LOOTOVERRUN'		=> sprintf("%s %%", $lootoverrun), 
		)
    );
}


/***********************
 *  
 *  Attendance Statistics 
 *  
 **********************/

/* get overall raidcount for 4 intervals */

$rcall = get_overallraidcount($query_by_pool, 0, $time, $dkp_id);
$rc90 = get_overallraidcount($query_by_pool, (int) $config['bbdkp_list_p3'], $time, $dkp_id);
$rc60 = get_overallraidcount($query_by_pool, (int) $config['bbdkp_list_p2'], $time, $dkp_id);
$rc30 = get_overallraidcount($query_by_pool, (int) $config['bbdkp_list_p1'], $time, $dkp_id);

$sql = "SELECT
	c.game_id, c.colorcode,  c.imagename, 
	e.event_dkpid,
	e.member_name,
	e.member_id,
	e.member_firstraid,
	e.member_lastraid,
	sum(CASE e.days WHEN 'lifetime' THEN e.gloraidcount END) AS gloraidcountlife,
	sum(CASE e.days WHEN 'lifetime' THEN e.iraidcount END ) AS iraidcountlife,
	sum(CASE e.days WHEN 'lifetime' THEN e.attendance END ) AS attendancelife,
	sum(CASE e.days WHEN '90' THEN e.gloraidcount END ) AS gloraidcount90,
	sum(CASE e.days WHEN '90' THEN e.iraidcount END ) AS iraidcount90,
	sum(CASE e.days WHEN '90' THEN e.attendance END) AS attendance90,
	sum(CASE e.days WHEN '60' THEN e.gloraidcount END ) AS gloraidcount60,
	sum(CASE e.days WHEN '60' THEN e.iraidcount END) AS iraidcount60,
	sum(CASE e.days WHEN '60' THEN e.attendance END ) AS attendance60,
	sum(CASE e.days WHEN '30' THEN e.gloraidcount END ) AS gloraidcount30,
	sum(CASE e.days WHEN '30' THEN e.iraidcount END ) AS iraidcount30,
	sum(CASE e.days WHEN '30' THEN e.attendance END ) AS attendance30
FROM
	(
			SELECT
				d.member_lastraid,
				d.member_firstraid,
				ev.event_dkpid,
				l.member_name,
				rd.member_id,
				'lifetime' AS days,
				count(rd.member_id) AS iraidcount,
				". (string) $rcall . " AS gloraidcount,
				round(count(rd.member_id) / " . (string) $rcall . " * 100,2) AS attendance
			FROM
				" . MEMBER_LIST_TABLE . " l,
				" . MEMBER_DKP_TABLE ." d,
				" . RAID_DETAIL_TABLE . " rd,
				" . EVENTS_TABLE . " ev,
				" . RAIDS_TABLE . " r
			WHERE rd.member_id = d.member_id
			AND ev.event_dkpid = d.member_dkpid";
			if ($query_by_pool)
			{
				$sql .= " AND d.member_dkpid = " . $dkp_id; 
			}
			if ( ($config['bbdkp_hide_inactive'] == 1) && (!$show_all) )
			{
			   $sql .= " AND d.member_status='1'";
			}
			$sql .= "			
			AND ev.event_id = r.event_id
			AND r.raid_id = rd.raid_id
			AND l.member_id = rd.member_id
			AND l.member_joindate < r.raid_start
			GROUP BY
				l.member_name,
				rd.member_id
		UNION ALL
			SELECT
				d.member_lastraid,
				d.member_firstraid,
				ev.event_dkpid,
				l.member_name,
				rd.member_id,
				'". (int) $config['bbdkp_list_p3'] ."' AS days,
				count(rd.member_id) AS iraidcount,
				". (string) $rc90 . " AS gloraidcount,
				round(count(rd.member_id)/ ". (string) $rc90 . " * 100,2) AS attendance
				FROM
					" . MEMBER_LIST_TABLE . " l,
					" . MEMBER_DKP_TABLE ." d,
					" . RAID_DETAIL_TABLE . " rd,
					" . EVENTS_TABLE . " ev,
					" . RAIDS_TABLE . " r 
				WHERE
					rd.member_id = d.member_id
				AND ev.event_dkpid = d.member_dkpid ";
				if ($query_by_pool)
				{
					$sql .= " AND d.member_dkpid = " . $dkp_id; 
				}				
				$sql .= " AND ev.event_id = r.event_id
				AND r.raid_id = rd.raid_id
				AND(  " . $time . " - r.raid_start )/(3600 * 24) < ". (int) $config['bbdkp_list_p3'];
				if ( ($config['bbdkp_hide_inactive'] == 1) && (!$show_all) )
				{
				   $sql .= " AND d.member_status='1'";
				}
				$sql .= "
				AND l.member_id = rd.member_id
				AND l.member_joindate < r.raid_start
				GROUP BY l.member_name, rd.member_id
		UNION ALL
			SELECT
				d.member_lastraid,
				d.member_firstraid,
				ev.event_dkpid,
				l.member_name,
				rd.member_id,
				'". (int) $config['bbdkp_list_p2'] ."' AS days,
				count(rd.member_id) AS iraidcount,
				". (string) $rc60 . " AS gloraidcount,
				round( count(rd.member_id)/ ". (string) $rc60 . " * 100, 2 ) AS attendance
			FROM
				" . MEMBER_LIST_TABLE . " l,
				" . MEMBER_DKP_TABLE ." d,
				" . RAID_DETAIL_TABLE . " rd,
				" . EVENTS_TABLE . " ev,
				" . RAIDS_TABLE . " r				
			WHERE
				rd.member_id = d.member_id
			AND ev.event_dkpid = d.member_dkpid"; 
			if ($query_by_pool)
			{
				$sql .= " AND d.member_dkpid = " . $dkp_id; 
			}				
			$sql .= " AND ev.event_id = r.event_id
			AND r.raid_id = rd.raid_id
			AND(  " . $time . " - r.raid_start)/(3600 * 24) < ". (int) $config['bbdkp_list_p2'];
			if ( ($config['bbdkp_hide_inactive'] == 1) && (!$show_all) )
			{
			   $sql .= " AND d.member_status='1'";
			}
			$sql .= " AND l.member_id = rd.member_id
			AND l.member_joindate < r.raid_start
			GROUP BY
				l.member_name,
				rd.member_id
		UNION ALL
			SELECT
				d.member_lastraid,
				d.member_firstraid,
				ev.event_dkpid,
				l.member_name,
				rd.member_id,
				'". (int) $config['bbdkp_list_p1'] ."' AS days,
				count(rd.member_id) AS iraidcount,
				'". (string) $rc30 . "' AS gloraidcount,
				round(count(rd.member_id)/ ". (string) $rc30 . " * 100,2) AS attendance
			FROM
				" . MEMBER_LIST_TABLE . " l,
				" . MEMBER_DKP_TABLE ." d,
				" . RAID_DETAIL_TABLE . " rd,
				" . EVENTS_TABLE . " ev,
				" . RAIDS_TABLE . " r 				
			WHERE
				rd.member_id = d.member_id
			AND ev.event_dkpid = d.member_dkpid"; 
			if ($query_by_pool)
			{
				$sql .= " AND d.member_dkpid = " . $dkp_id; 
			}				
			$sql .= " AND ev.event_id = r.event_id
			AND r.raid_id = rd.raid_id
			AND( " . $time . " - r.raid_start)/(3600 * 24) < ". (int) $config['bbdkp_list_p1']; 
			if ( ($config['bbdkp_hide_inactive'] == 1) && (!$show_all) )
			{
			   $sql .= " AND d.member_status='1'";
			}
			$sql .= " AND l.member_id = rd.member_id
			AND l.member_joindate < r.raid_start
		GROUP BY
			l.member_name,
			rd.member_id
	) e inner join " . MEMBER_LIST_TABLE . " l on  e.member_id = l.member_id 
		inner join " . CLASS_TABLE . " c on c.class_id = l.member_class_id and c.game_id = l.game_id
GROUP BY
	c.game_id, c.colorcode,  c.imagename, 
	e.event_dkpid,
	e.member_name,
	e.member_id,
	e.member_firstraid,
	e.member_lastraid
ORDER BY
	sum(CASE e.days WHEN '30' THEN e.attendance END ) desc, 
	sum(CASE e.days WHEN '60' THEN e.attendance END ) desc,
	sum(CASE e.days WHEN '90' THEN e.attendance END ) desc,
	e.member_id
";

$result = $db->sql_query($sql);

$attendance=0;
while ( $row = $db->sql_fetchrow($result) )
{
	$attendance++;	
	$membername_g[] = $row['member_name'];
	$attlife__g[] = $row['attendancelife'];
	$att90__g[] = $row['attendance90'];
	$att60__g[] = $row['attendance60'];
	$att30__g[] = $row['attendance30'];
	
    $template->assign_block_vars('attendance_row', array(
        'NAME' 					=> $row['member_name'],
        'U_VIEW_MEMBER' 		=> append_sid("{$phpbb_root_path}dkp.$phpEx" , 'page=viewmember&amp;' .URI_DKPSYS . '=' . $row['event_dkpid'] . '&amp;' . URI_NAMEID . '='.$row['member_id']),    
    	'COLORCODE'				=> $row['colorcode'],
    	'ID'            		=> $row['member_id'],
        'FIRSTRAID' 			=> $row['member_firstraid'],
	    'LASTRAID' 				=> $row['member_lastraid'],
    	'GRCTLIFE' 				=> $row['gloraidcountlife'],
	    'IRCTLIFE' 				=> $row['iraidcountlife'],
	    'ATTLIFE' 				=> sprintf("%.2f%%", $row['attendancelife']),
    	'GRCT90' 				=> $row['gloraidcount90'],
	    'IRCT90' 				=> $row['iraidcount90'],
	    'ATT90' 				=> sprintf("%.2f%%", $row['attendance90']),
    	'GRCT60' 				=> $row['gloraidcount60'],
	    'IRCT60' 				=> $row['iraidcount60'],
	    'ATT60' 				=> sprintf("%.2f%%", $row['attendance60']),
    	'GRCT30' 				=> $row['gloraidcount30'],
	    'IRCT30' 				=> $row['iraidcount30'],
	    'ATT30' 				=> sprintf("%.2f%%", $row['attendance30']),   
    )
    );

}
			
if($attendance > 0)
{
	$template->assign_vars(array(
		'RAIDS_X1_DAYS'	  => sprintf($user->lang['RAIDS_X_DAYS'],  $config['bbdkp_list_p3']),
		'RAIDS_X2_DAYS'	  => sprintf($user->lang['RAIDS_X_DAYS'],  $config['bbdkp_list_p2']),
		'RAIDS_X3_DAYS'	  => sprintf($user->lang['RAIDS_X_DAYS'],  $config['bbdkp_list_p1']),
	));
	
}

/* send information to template */
$template->assign_vars(array(
	'S_DISPLAY_STATS'		=> true,
	'F_STATS' => $u_stats,
	'U_STATS' => append_sid("{$phpbb_root_path}dkp.$phpEx", 'page=stats'),
    'SHOW' => ( isset($_GET['show']) ) ? request_var('show', '') : '',
	'TOTAL_MEMBERS' 	=> $total_members, 
	'TOTAL_DROPS' 		=> $total_drops, 
	'CLASSPCTCUMUL'		=> round($class_drop_pct_cum), 
    )
);

$navlinks_array = array(
	array(
	 'DKPPAGE' => $user->lang['MENU_STATS'],
	 'U_DKPPAGE' => $u_stats,
	)); 
	
foreach( $navlinks_array as $name )
{
	 $template->assign_block_vars('dkpnavlinks', array(
	 'DKPPAGE' => $name['DKPPAGE'],
	 'U_DKPPAGE' => $name['U_DKPPAGE'],
	 ));
}

$title = $user->lang['MENU_STATS'];

// Output page
page_header($title);

/**
 * gets overall raid count in interval of N days before today
 *
 * @param int $interval
 * @param int $time
 * 
 */
function get_overallraidcount($query_by_pool, $interval, $time, $dkp_id)
{
	global $db;
	$sql = " SELECT count(raid_id) AS rc 
			 FROM " . RAIDS_TABLE . " r , ". EVENTS_TABLE . " e 
			 WHERE e.event_id = r.event_id ";
	if ($query_by_pool)
	{
	    $sql .= " AND e.event_dkpid = ". (int) $dkp_id;
	}
	
	if ($interval > 0)
	{
		 $sql .= " AND ( " . (int) $time . " - r.raid_start) / (3600 * 24) < ". (int) $interval;
	}

	$result = $db->sql_query($sql);
	$rc = (int) $db->sql_fetchfield('rc');

	$db->sql_freeresult($result);
	
	return $rc;

}
?>