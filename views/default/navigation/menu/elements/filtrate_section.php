<?php
/**
 * Filtrate menu section
 * 
 * @package TGSUtilities
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 *
 * @uses $vars['items']      Array of menu items
 * @uses $vars['section']    The section name
 * @uses $vars['item_class'] Additional CSS class for each menu item
 * @uses $vars['class']      Additional CSS class for the section
 */

$item_class = elgg_extract('item_class', $vars, '');
$class = elgg_extract('class', $vars, '');

echo "<ul class='{$class}'>";
foreach ($vars['items'] as $menu_item) {
	echo elgg_view('navigation/menu/elements/filtrate_item', array(
		'item' => $menu_item,
		'item_class' => $item_class,
	));
}
echo '</ul>';
