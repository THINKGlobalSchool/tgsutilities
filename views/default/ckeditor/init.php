<?php
/**
 * Initialize the CKEditor script
 * 
 * Doing this inline enables the editor to initialize textareas loaded through ajax
 */

?>
<script>
// This global variable must be set before the editor script loading.
CKEDITOR_BASEPATH = elgg.config.wwwroot + 'mod/ckeditor/vendors/ckeditor/';

require(['elgg/ckeditor', 'jquery', 'jquery.ckeditor'], function(elggCKEditor, $) {
	var $editors = $('.elgg-input-longtext:not([data-cke-init])');

	if ($editors.length) {
		$editors
			.attr('data-cke-init', true)
			.ckeditor(elggCKEditor.init, elggCKEditor.config);

			// Trigger a hook so we can get the CKEDITOR instance in other plugins
			elgg.trigger_hook('init', 'ckeditor', $editors);
	}
});
</script>
