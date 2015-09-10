define(function(require) {
	var elgg = require('elgg');
	var $ = require('jquery');
	var CKEDITOR = require('ckeditor');

	// Add extra plugins
	CKEDITOR.plugins.addExternal('onchange', elgg.get_site_url() + 'mod/tgsutilities/views/default/js/elgg/ckeditor/onchange.js', '');
	CKEDITOR.plugins.addExternal('justify', elgg.get_site_url() + 'mod/tgsutilities/views/default/js/elgg/ckeditor/justify/plugin.js', '');
	CKEDITOR.plugins.addExternal('font', elgg.get_site_url() + 'mod/tgsutilities/views/default/js/elgg/ckeditor/font/plugin.js', '');
	CKEDITOR.plugins.addExternal('panelbutton', elgg.get_site_url() + 'mod/tgsutilities/views/default/js/elgg/ckeditor/panelbutton/plugin.js', '');
	CKEDITOR.plugins.addExternal('colorbutton', elgg.get_site_url() + 'mod/tgsutilities/views/default/js/elgg/ckeditor/colorbutton/plugin.js', '');
	CKEDITOR.plugins.addExternal('indentblock', elgg.get_site_url() + 'mod/tgsutilities/views/default/js/elgg/ckeditor/indentblock/plugin.js', '');

	return {
		toolbar: [['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'Indent', 'Outdent'],[ 'NumberedList', 'BulletedList', 'Undo', 'Redo', 'Link', 'Unlink', 'Image', 'Blockquote', 'Paste', 'PasteFromWord', 'Maximize'], ['Format', 'FontSize', 'TextColor', 'BGColor']],
		removeButtons: 'Subscript,Superscript', // To have Underline back
		//allowedContent: true,
		baseHref: elgg.config.wwwroot,
		removePlugins: 'tabletools,resize',
		extraPlugins: 'blockimagepaste,onchange,justify,font,panelbutton,colorbutton,indentblock',
		defaultLanguage: 'en',
		language: elgg.config.language,
		skin: 'moono',
		uiColor: '#EEEEEE',
		contentsCss: elgg.get_simplecache_url('css', 'elgg/wysiwyg.css'),
		disableNativeSpellChecker: false,
		disableNativeTableHandles: false,
		removeDialogTabs: 'image:advanced;image:Link;link:advanced;link:target',
		autoGrow_maxHeight: $(window).height() - 100,
		startupFocus: true
	};
});
