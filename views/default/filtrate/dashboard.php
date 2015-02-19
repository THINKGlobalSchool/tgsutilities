<?php
/**
 * Filtrate dashboard
 * 
 * @package TGSUtilities
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 * 
 * @uses $vars['menu_name']
 * @uses $vars['infinite_scroll']  Enable infinite scrolling
 * @uses $vars['list_url']         List endpoint URL
 * @uses $vars['default_params']   Initial/default params
 * @uses $vars['disable_advanced'] Disable the advanced menu: true/false
 * @uses $vars['disable_extras']   Disable the extras menu: true/false
 * @uses $vars['disable_history']  Disable HTML5 history (push/popstate)
 * @uses $vars['content_header']   Optional header content (between menu and output)
 * @uses $vars['page_context']     Page context
 * @uses $vars['id']               Optional unique id for this menu (will be generated otherwise)
 */

$infinite_scroll = elgg_extract('infinite_scroll', $vars);
$list_url = elgg_extract('list_url', $vars);
$default_params = json_encode(elgg_extract('default_params' , $vars));
$disable_history = elgg_extract('disable_history', $vars);
$context = elgg_extract('page_context', $vars, elgg_get_context());
$id = elgg_extract('id', $vars, uniqid());
$ignore_query_string = elgg_extract('ignore_query_string', $vars, 0);

if (!$infinite_scroll) {
	$infinite_scroll = 0;
}

if (!$disable_history) {
	$disable_history = 0;
}

$js = <<<JAVASCRIPT
	<script type='text/javascript'>
		require(['filtrate/Filtrate'], function (Filtrate) {
			// Go go gadget filtrate
			$('#$id').Filtrate({
				defaultParams: $.param($.parseJSON('$default_params')),
				ajaxListUrl: '$list_url',
				enableInfinite: $infinite_scroll,
				disableHistory: $disable_history,
				context: '$context',
				ignoreQueryString: $ignore_query_string,
				chosenInit: elgg.tgsutilities.global.defaultChosenInit
			});
		});
	</script>
JAVASCRIPT;

echo $js;

$vars['sort_by'] = 'priority';

$menu = elgg_view_menu($vars['menu_name'], $vars);

if ($vars['content_header']) {
	$content_header = $vars['content_header'];
}

$content_container = "<div class='filtrate-content-container'></div>";

$filtrate = <<<HTML
	<div id='$id'>
		$menu
		$content_header
		$content_container
	</div>
HTML;

echo $filtrate;