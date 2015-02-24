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
 * PROVIDED LIBRARIES:
 *  - Filtrate (in house filtering/sorting UI)
 *  - Chosen - Better select inputs
 *  - Tiptip - tooltips
 *  - qTip - alternate tooltips
 *  - fullcalendar - full calendar
 *  - datatables - smart, sortable tables
 *  - daterangepicker - a jquery daterange picker
 *
 * PROVIDED FEATURES:
 *  - Custom Owner Block
 *  - Topbar dropdowns
 */

elgg_register_event_handler('init', 'system', 'tgsutilities_init');

/**
 * Init event handler
 */
function tgsutilities_init() {
	/** TGS Utilities CSS **/
	elgg_extend_view('css/elgg', 'css/tgsutilities/css');

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

	// Register DataTables JS
	$f = elgg_get_simplecache_url('js', 'datatables/datatables');
	elgg_register_js('datatables', $f);

	// Register JS for fullcalendar
	$f = elgg_get_simplecache_url('js', 'fullcalendar/fullcalendar');
	elgg_register_js('tgs.fullcalendar', $f);

	// Register CSS for fullcalendar
	$f = elgg_get_simplecache_url('css', 'fullcalendar/fullcalendar');
	elgg_register_css('tgs.fullcalendar', $f);
	
	// Register JS for qtip
	$f = elgg_get_simplecache_url('js', 'qtip/qtip');
	elgg_register_js('jquery.qtip', $f);

	// Register tiptip JS/CSS
	$f = elgg_get_simplecache_url('js', 'tiptip/tiptip');
	elgg_register_js('jquery.tiptip', $f, 'head', 501);

	$f = elgg_get_simplecache_url('css', 'tiptip/tiptip');
	elgg_register_css('jquery.tiptip', $f);

	// Register fontawesome css library
	$f = elgg_get_simplecache_url('css', 'fontawesome/fontawesome');
	elgg_register_css('fontawesome', $f);

	// Register datepicker css
	$f = elgg_get_site_url(). 'mod/tgsutilities/vendors/daterangepicker/ui.daterangepicker.css';
	elgg_register_css('jquery.daterangepicker', $f);
	
	return TRUE;
}