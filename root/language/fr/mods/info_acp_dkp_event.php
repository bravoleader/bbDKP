<?php
/**
 * bbdkp acp language file for Events (FR)
 * 
 * @package bbDkp
 * @copyright 2009 bbdkp <http://code.google.com/p/bbdkp/>
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

// Create the lang array if it does not already exist
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// Merge the following language entries into the lang array
$lang = array_merge($lang, array(
    'ACP_DKP_EVENT'			=> 'Evènements',
	'ACP_DKP_EVENT_ADD'		=> 'Ajouter Evènement',  
	'ACP_DKP_EVENT_LIST'	=> 'Liste Evènements',
));

?>