<?php
/**
 * TGS Utilities Action Menu - Custom Entity Menu
 * - Wraps the 'default' view that is used by entities
 *
 * @package TGSUtilities
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 *
 * @uses $vars['menu']             Array of menu items
 * @uses $vars['item_class']       Additional CSS class for each menu item
 * @uses $vars['disable_advanced'] Disable the advanced menu: true/false
 * @uses $vars['disable_extras']   Disable the extras menu: true/false
 */

//  Make sure this is an entity (not a user/group)
if (!elgg_instanceof($vars['entity'], 'object')) {
	$type = $vars['entity']->getType();

	// Display the correct view by type
	if (elgg_view_exists("navigation/menu/$type")) {
		echo elgg_view("navigation/menu/$type", $vars);
	} else {
		echo elgg_view("navigation/menu/default", $vars);
	}
	return;
}

$entity_menu = $vars['menu'];

$uid = uniqid();

// Count actions and other menu items
$count = (int)(count($entity_menu['core']) + count($entity_menu['buttons']) + count($entity_menu['actions']) + count($entity_menu['other']));

// Add the actions button to the info menu if we have actions/other
if ($count > 0) {
	$options = array(
		'name' => 'entity-actions',
		'text' => "<i class='fa fa-chevron-down'></i>",
		'href' => '#entity-actions-' . $vars['entity']->guid . '-' . $uid,
		'link_class' => 'entity-action-toggler',
		'rel' => 'popup',
		'priority' => 9000,
	);

	$entity_menu['info'][9000] = ElggMenuItem::factory($options);
}

// we want css classes to use dashes
$vars['name'] = preg_replace('/[^a-z0-9\-]/i', '-', $vars['name']);
$item_class = elgg_extract('item_class', $vars, '');

if (isset($vars['class'])) {
	$class .= " {$vars['class']}";
}

// Strip out 'elgg-menu-hz'
$class = str_replace('elgg-menu-hz', '', $class);

// Info Menu
if ($entity_menu['info']) {
	$info = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['info'],
		'class' => "elgg-menu elgg-menu-entity $class elgg-menu-{$vars['name']}-info elgg-menu-hz",
		'section' => 'info',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

// Buttons menu
if ($entity_menu['buttons']) {
	$buttons = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['buttons'],
		'class' => "$class elgg-menu-{$vars['name']}-buttons clearfix",
		'section' => 'buttons',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

// Actions menu
if ($entity_menu['actions']) {
	$actions = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['actions'],
		'class' => "$class elgg-menu-{$vars['name']}-actions clearfix",
		'section' => 'actions',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

// Other menu (Catch all)
if ($entity_menu['other']) {
	$other = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['other'],
		'class' => "$class elgg-menu-{$vars['name']}-other clearfix",
		'section' => 'other',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

// Hidden menu, for hidden items
if ($entity_menu['hidden']) {
	$hidden = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['hidden'],
		'class' => "$class elgg-menu-{$vars['name']}-hidden clearfix",
		'section' => 'hidden',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

// Core menu
if ($entity_menu['core']) {
	$core = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['core'],
		'class' => "elgg-menu elgg-menu-entity $class elgg-menu-{$vars['name']}-core clearfix elgg-menu-hz $core_only_child",
		'section' => 'core',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

$content = <<<HTML
	<div class='actionmenu'>	
		$info
		<div id='entity-actions-{$vars['entity']->guid}-{$uid}' class='actionmenu-actions'>
			$core
			$buttons
			$actions
			$other
			$hidden
		</div>
		$icon
	</div>	
HTML;

echo $content;