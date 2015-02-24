<?php
/**
 * TGS Utilities Global JS lib (loaded on init)
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
elgg.provide('elgg.tgsutilities');
elgg.provide('elgg.tgsutilities.global');

// Init
elgg.tgsutilities.global.init = function() {
	// Collapsable owner block menu delegate
	$(document).on('click', 'a.ownerblock-browse-content-closed, a.ownerblock-browse-content-open', elgg.tgsutilities.global.ownerblockShowMoreClick);
}

// Click handler for show more
elgg.tgsutilities.global.ownerblockShowMoreClick = function(event) {
	// Toggle more button off
	$(this).toggleClass('ownerblock-browse-content-closed').toggleClass('ownerblock-browse-content-open');
	$('#tgsutilities-collapsable-ownerblock-full').slideToggle();
	event.preventDefault();
}

/**
 *  Close the publish iframe
 */
elgg.tgsutilities.global.closePublishIframe = function(event) {
	window.parent.$('#publish-overlay').remove();
	window.parent.$('#publish-iframe').remove();
}

// Default init function for chosen dropdowns - plugins can completely override
elgg.tgsutilities.global.defaultChosenInit = function(element) {
	var multi = element.attr('multiple');

	// Default options
	var options = {
		'placeholder_text_multiple': 'Select items..'
	};

	// Trigger a hook for options
	var options = elgg.trigger_hook('getOptions', 'chosen.js', {'id' : element.attr('id')}, options);

	// Init and bind change
	element.chosen(options).change(elgg.trigger_hook('change', 'chosen.js', {'id' : element.attr('id'), 'element' : element}, function(){return;}));

	// Hacky fix for chosen containers truncating text
	var sibling = element.siblings('.chosen-container-single');
	sibling.css({
		'min-width': sibling.width(),
		'width' : ''
	});
}

/**
 * Chosen setup handler for activity dashboard inputs
 */
elgg.tgsutilities.global.setupActivityInputs = function (hook, type, params, options) {
	
	// Set up the activity type filter
	if (params.id == "activity-type-filter") {
		//options.placeholder_text_multiple = 'test';
	}

	// // Disable search for these inputs
	// var disable_search_ids = new Array(
	// );

	// // Disable search for above inputs
	// if ($.inArray(params.id, disable_search_ids) != -1) {
	// 	options.disable_search = true;
	// }

	// Allow deselect for these ids
	var allow_deselect_ids = new Array(
		'activity-group-filter',
		'activity-role-filter'
	);

	// Set deselect for dashboard inputs
	if ($.inArray(params.id, allow_deselect_ids) != -1) {
		options.width = "135px";
		options.allow_single_deselect = true;
	}

	return options;
}

/**
 * Extra tasks after filtrate content is loaded
 */
elgg.tgsutilities.global.filtrateLoaded = function(hook, type, params, options) {
	if (elgg.ui != undefined && elgg.ui.lightbox_init != undefined) {
		elgg.ui.lightbox_init();
	}
}

elgg.register_hook_handler('init', 'system', elgg.tgsutilities.global.init);
elgg.register_hook_handler('getOptions', 'chosen.js', elgg.tgsutilities.global.setupActivityInputs);
elgg.register_hook_handler('content_loaded', 'filtrate', elgg.tgsutilities.global.filtrateLoaded);
elgg.register_hook_handler('infinite_loaded', 'filtrate', elgg.tgsutilities.global.filtrateLoaded);