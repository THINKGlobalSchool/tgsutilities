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
	CKEDITOR.plugins.addExternal('dragresize', elgg.get_site_url() + 'mod/tgsutilities/views/default/js/elgg/ckeditor/dragresize/plugin.js', '');

	return {
		//toolbar: [['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'Indent', 'Outdent'],[ 'NumberedList', 'BulletedList', 'Undo', 'Redo', 'Link', 'Unlink', 'Image', 'Blockquote', 'Paste', 'Maximize'], ['Format', 'FontSize', 'TextColor', 'BGColor']],
		
		// Going to use a subtractive pattern here for toolbar items. This allows us to modify it later! (via 'init', 'ckeditor' plugin hook)
		removeButtons: 'Subscript,Superscript,About,Cut,Anchor,Scayt,Copy,PasteFromWord,PasteText,Table,HorizontalRule,SpecialChar,Styles,Font,JustifyBlock,Image', 
		
		// Define toolbar groups
		toolbarGroups: [
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph',   groups: [ 'align', 'indent', 'blocks', 'bidi' ] },
		    { name: 'clipboard',   groups: [ 'list', 'undo', 'clipboard'] },
		    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		    { name: 'forms' }, 
		    { name: 'links' },
		    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
		    { name: 'tools' },
		    '/',
		    { name: 'styles' },
		    { name: 'colors' },
		    { name: 'others' },
		    { name: 'about' },
		    { name: 'insert' },
		    { name: 'custom' },
		    { name: 'custom1' },
		    { name: 'custom2' },
		    { name: 'custom3' }, 
		    { name: 'custom4' }
		],

		//allowedContent: true,
		baseHref: elgg.config.wwwroot,
		removePlugins: 'tabletools,resize',
		extraPlugins: 'blockimagepaste,onchange,justify,font,panelbutton,colorbutton,indentblock,dragresize',
		extraAllowedContent: 'table td th tr',
		defaultLanguage: 'en',
		language: elgg.config.language,
		skin: 'moono',
		uiColor: '#EEEEEE',
		contentsCss: elgg.get_simplecache_url('css', 'elgg/wysiwyg.css'),
		disableNativeSpellChecker: false,
		disableNativeTableHandles: false,
		removeDialogTabs: 'image:advanced;image:Link;link:advanced;link:target',
		autoGrow_maxHeight: $(window).height() - 100,
		startupFocus: true,
		keystrokes: [
			[ CKEDITOR.CTRL + 75 /*K*/, 'link' ],
			[ CKEDITOR.CTRL + 76 /*L*/, 'link' ]
		]
	};
});
