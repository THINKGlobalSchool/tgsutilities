<?php
/**
 * TGS Utilities Start
 *
 * @package TGSUtilities
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 *
 * PROVIDES:
 *  - Filtrate (in house filtering/sorting UI)
 *  - Chosen - Better select inputs
 */

elgg_register_event_handler('init', 'system', 'tgsutilities_init');

/**
 * Init event handler
 */
function tgsutilities_init() {

	/** Filtrate **/
	elgg_extend_view('css/elgg', 'css/filtrate/filtrate');
	elgg_register_external_view('js/filtrate/Filtrate.js', TRUE);

	/** Chosen JS **/
	elgg_extend_view('css/elgg', 'css/chosen/chosen');
	$f = elgg_get_simplecache_url('js', 'chosen/chosen');
	elgg_register_js('chosen.js', $f);
	elgg_load_js('chosen.js');

	/** TGSUtilities JS Libs **/
	$f = elgg_get_simplecache_url('js', 'tgsutilities/global');
	elgg_register_js('elgg.tgsutilities.global', $f);
	elgg_load_js('elgg.tgsutilities.global');
	
	return TRUE;
}