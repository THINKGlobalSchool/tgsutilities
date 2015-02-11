<?php
/**
 * Filtrate menu
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

// Get vars
$disable_advanced = elgg_extract('disable_advanced', $vars);
$disable_extras = elgg_extract('disable_extras', $vars);
$item_class = elgg_extract('item_class', $vars, '');

$content = "<div class='filtrate-menu-container'>";

// Main section
$content .= elgg_view('navigation/menu/elements/filtrate_section', array(
	'items' => $vars['menu']['main'],
	'class' => "filtrate-menu-main",
	'section' => 'main',
	'name' => 'dashboard',
	'item_class' => $item_class
));

// Advanced section (only display if there are registered items)
if (count($vars['menu']['advanced']) && !$disable_advanced) {
	$content .= elgg_view('navigation/menu/elements/filtrate_section', array(
		'items' => $vars['menu']['advanced'],
		'class' => "filtrate-menu-advanced",
		'section' => 'advanced',
		'name' => 'dashboard',
		'item_class' => $item_class
	));

	// Show advanced link
	$options = array(
		'name' => 'advanced',
		'href' => '#',
		'text' => elgg_echo('filtrate:label:showadvanced'),
		'link_class' => 'menu-sort filtrate-show-advanced advanced-off',
		'encode_text' => false,
		'section' => 'extras',
		'priority' => 0,
	);

	$vars['menu']['extras'][] = ElggMenuItem::factory($options);
}

// Extras section
if (count($vars['menu']['extras']) && !$disable_extras) {
	$content .= elgg_view('navigation/menu/elements/filtrate_section', array(
		'items' => $vars['menu']['extras'],
		'class' => "filtrate-menu-extras",
		'section' => 'extras',
		'name' => 'dashboard',
		'item_class' => $item_class
	));	
}

echo $content . "</div>";