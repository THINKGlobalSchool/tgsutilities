<?php
/**
 * TGS Utilities Action Menu JS lib
 *
 * @package TGSUtilities
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 *
 */
?>
//<script>
elgg.provide('elgg.actionmenu');

// Init function
elgg.actionmenu.init = function() {
	// Extra click handler for the toggle button
	$(document).delegate('a.entity-action-toggler', 'click', elgg.actionmenu.toggleClick);
}

// Click handler for toggler
elgg.actionmenu.toggleClick = function(event) {
	var id = $(this).attr('href');
	// Hide all other popups, except this one
	$('.actionmenu-actions').each(function() {
		if (!$(this).is($(id))) {
			$(this).fadeOut();
		}
	});
}

/**
 * Repositions the entity menu popup
 *
 * @param {String} hook    'getOptions'
 * @param {String} type    'ui.popup'
 * @param {Object} params  An array of info about the target and source.
 * @param {Object} options Options to pass to
 *
 * @return {Object}
 */
elgg.actionmenu.entityMenuHandler = function(hook, type, params, options) {

	// Interesting way to check if string starts with (see below)
	if (params.target.attr('id') && params.target.attr('id').lastIndexOf("entity-actions-", 0) === 0) {
		options.my = 'center top+15';
		options.at = 'center bottom';
		return options;
	}
	return null;
};

// Convenience function to hide all menus
elgg.actionmenu.hideMenus = function() {
	$('.actionmenu-actions').fadeOut();
}

elgg.register_hook_handler('getOptions', 'ui.popup', elgg.actionmenu.entityMenuHandler);
elgg.register_hook_handler('init', 'system', elgg.actionmenu.init);
elgg.register_hook_handler('peopleTagStarted', 'tidypics', elgg.actionmenu.hideMenus);
elgg.register_hook_handler('photoLightboxLikeClick', 'tidypics', elgg.actionmenu.hideMenus);
elgg.register_hook_handler('photoLightboxBeforeShow', 'tidypics', elgg.actionmenu.hideMenus);
elgg.register_hook_handler('photoLightboxBeforeClose', 'tidypics', elgg.actionmenu.hideMenus);
elgg.register_hook_handler('popState', 'tidypics', elgg.actionmenu.hideMenus);
elgg.register_hook_handler('moveToAlbumOpened', 'tidypics', elgg.actionmenu.hideMenus);