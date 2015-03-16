define(function(require) {
	var elgg = require('elgg');
	var $ = require('jquery');

	// Add the onchange plugin
	CKEDITOR.plugins.addExternal('onchange', elgg.get_site_url() + 'mod/tgsutilities/views/default/js/elgg/ckeditor/onchange.js', '');

	return {
		toolbar: [['Bold', 'Italic', 'Underline', 'RemoveFormat'], ['Strike', 'NumberedList', 'BulletedList', 'Undo', 'Redo', 'Link', 'Unlink', 'Image', 'Blockquote', 'Paste', 'PasteFromWord', 'Maximize']],
		removeButtons: 'Subscript,Superscript', // To have Underline back
		allowedContent: true,
		baseHref: elgg.config.wwwroot,
		removePlugins: 'contextmenu,tabletools,resize',
		extraPlugins: 'blockimagepaste,onchange',
		defaultLanguage: 'en',
		language: elgg.config.language,
		skin: 'moono',
		uiColor: '#EEEEEE',
		contentsCss: elgg.get_simplecache_url('css', 'elgg/wysiwyg.css'),
		disableNativeSpellChecker: false,
		disableNativeTableHandles: false,
		removeDialogTabs: 'image:advanced;image:Link;link:advanced;link:target',
		autoGrow_maxHeight: $(window).height() - 100
	};
});
