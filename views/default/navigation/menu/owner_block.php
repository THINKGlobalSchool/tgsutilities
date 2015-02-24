<?php
/**
 * TGS Utililies Custom Owner Block
 *
 * @package TGSUtilities
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 *
 */

$entity = elgg_extract('entity', $vars);

if (elgg_instanceof($entity, 'group')) {

	$menu = elgg_view("navigation/menu/default", $vars);

	if ($entity->new_layout) {
		$class = 'ownerblock-browse-content-closed';	
	} else {
		$class = 'ownerblock-browse-content-open';
		$open = 'style="display: block;"';
	}

	foreach ($vars['menu']['default'] as $item) {
		if ($item->getSelected()) {
			$open = 'style="display:block"';
			$class = 'ownerblock-browse-content-open';
			break;
		}
	}

	// Create browse content link
	$browse_content = elgg_view('output/url', array(
		'text' => elgg_echo('tgsutilities:label:browsecontent'),
		'href' => '#',
		'class' => $class
	));

	$content = <<<HTML
		<div id='tgsutilities-collapsable-ownerblock' class='clearfix'>
			$browse_content
			<div id='tgsutilities-collapsable-ownerblock-full' $open>
				$menu
			</div>
		</div>
HTML;

	echo $content;

} else {
	$type = $entity->getType();

	// Display the correct view by type
	if (elgg_view_exists("navigation/menu/$type")) {
		echo elgg_view("navigation/menu/$type", $vars);
	} else {
		echo elgg_view("navigation/menu/default", $vars);
	}
}