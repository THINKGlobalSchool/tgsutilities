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
 *  - Action Menu
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

	/** Action Menu JS **/
	$f = elgg_get_simplecache_url('js', 'actionmenu/actionmenu');
	elgg_register_js('elgg.actionmenu', $f);
	elgg_load_js('elgg.actionmenu');

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
	elgg_load_css('fontawesome');

	// Register datepicker css
	$f = elgg_get_site_url(). 'mod/tgsutilities/vendors/daterangepicker/ui.daterangepicker.css';
	elgg_register_css('jquery.daterangepicker', $f);


	/** Action Menu Hook Handler **/
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'tgsutilities_action_menu_handler', 9999);

	
	return TRUE;
}

/**
 * Reorganize the entity menu
 */ 
function tgsutilities_action_menu_handler($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'object')) {
		/* 
		 We're going to make all new sections here:
		 - default will be broken up into 'info' 'core' 'buttons' 'actions' and 'other'
		   we can add items to these sections manually as needed
		*/

		// Core 'info' menu items (as decided by me)
		$core_info_items = array(
			'access',
			'published_status', // Blogs
			'likes_count'
		);

		// Core 'action' items 
		$core_action_items = array(
			'edit',
			'delete',
			'likes',
			'unlike',
			'history',
		);

		// Other items (plugins) for actions
		$plugin_actions_items = array(
			'download_video',
		);

		// Give plugins an easy way to hook into the reclassification below
		$section_map = elgg_trigger_plugin_hook('sectionmap', 'actionmenu', $params, array());

		// Assign new sections
		foreach ($return as $idx => $item) {
			if ($item->getSection() == 'default') {
				if (in_array($item->getName(), $core_info_items)) {
			        $item->setSection('info');
				} else if (in_array($item->getName(), $core_action_items)) {
					if ($item->getName() == 'like' && !elgg_is_logged_in()) {
						unset($return[$idx]); // Likes are showing up not logged in for some reason
					}
			        $item->setSection('core');
			    } else if (in_array($item->getName(), $plugin_actions_items)) {
			    	$item->setSection('actions');
			    } else if (array_key_exists($item->getName(), $section_map)) {
			    	$item->setSection($section_map[$item->getName()]);
				} else {
			        $item->setSection('other');
				}
			}

			// Remove non-core actions from comment entities while we're at it
			if (elgg_instanceof($params['entity'], 'object', 'comment') && !in_array($item->getSection(), array('info', 'core'))) {
				unset($return[$idx]);
			}
		}

		// Add entity anchor
		$options = array(
			'name' => 'entity_anchor',
			'text' => '',
			'title' => 'entity_anchor',
			'href' => '#',
			'item_class' => 'entity_anchor_hidden',
			'section' => 'info',
			'id' => 'entity-anchor-' . $params['entity']->guid,
			'priority' => 0,
		);
		$return[] = ElggMenuItem::factory($options);
	}
	return $return;
}