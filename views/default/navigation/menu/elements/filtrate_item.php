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
 * @uses $vars['item']       ElggMenuItem
 * @uses $vars['item_class'] Additional CSS class for the menu item
 */

$item = $vars['item'];

$item_class = $item->getItemClass();
if ($item->getSelected()) {
	$item_class = "$item_class elgg-state-selected";
}
if (isset($vars['item_class']) && $vars['item_class']) {
	$item_class .= ' ' . $vars['item_class'];
}

echo "<li class=\"$item_class\">";

if ($item->label) {
	echo "<label>" . $item->label . "</label>";
}

echo elgg_view_menu_item($item);
echo '</li>';
