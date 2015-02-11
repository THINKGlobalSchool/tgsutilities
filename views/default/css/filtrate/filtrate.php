<?php
/**
 * Filtrate CSS
 *
 * @package TGSUtilities
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 */
?>

.filtrate-menu-container {
	background: none repeat scroll 0 0 #EEEEEE;
    padding: 11px;
    width: auto;
}

.filtrate-menu-container > ul > li label { 
	margin-right: 7px;
}

.filtrate-menu-container > ul > li {
	display: inline-block;
	margin-right: 10px;
	margin-bottom: 4px;
}

.filtrate-menu-container  li input {
	font-size: 90%;
	height: 24px;
	width: 92px;
	border: 1px solid #AAAAAA;
}

.filtrate-menu-container .chosen-container.chosen-container-multi > ul > li input{
	height: auto;
	font-size: 100%;
}

ul.filtrate-menu-extras {
	border-top: 1px dotted #CCC;
	overflow: auto;
}

ul.filtrate-menu-advanced {
	border-top: 1px dotted #CCC;
	padding-top: 4px;
	display: none;
}

ul.filtrate-menu-extras > li {
	float: left;
	margin-bottom: 0 !important;
}

ul.filtrate-menu-extras > li.elgg-menu-item-sort {
	float: right;
}

.filtrate-show-advanced.advanced-off:after,
.filtrate-sort.descending:after {
	content: " ▼";
	font-size: 9px;
	text-decoration: none;
}

.filtrate-show-advanced.advanced-on:after,
.filtrate-sort.ascending:after  {
	content: " ▲";
	text-decoration: none;
}

.filtrate-content-container {
	margin-bottom: 40px;
}

.filtrate-content-container .elgg-ajax-loader {
	margin-top: 20px;
}

span.filtrate-clear-icon {
	position: relative;
}

span.filtrate-clear-icon span {
	position: absolute;
	display: block;
	top: 4px;
	right: 5px;
	width: 9px;
	height: 9px;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/x-sprite.png) no-repeat 0 0;
	cursor: pointer;
	display: none;
}

span.filtrate-clear-icon span:hover {
	background-position: 0px -11px;
}

span.filtrate-clear-icon input {
	padding-right: 16px;
}

.filtrate-menu-container .chosen-disabled a {
	color: #EEEEEE;
}

/** Fix for typeaheadtags **/
.filtrate-menu-container .elgg-input-tags-parent {
	display: inline-block;
	vertical-align: middle;
}

.filtrate-menu-container .elgg-input-tags-parent .as-selections {
	padding: 1px;
}

.filtrate-menu-container .elgg-input-tags {
	height: 22px;
}

.filtrate-menu-container .elgg-input-tags-parent ul.as-selections li.as-selection-item.typeaheadtags-help-button {
	height: 12px;
	margin: 2px 4px 0 2px;
	padding: 3px !important;
	text-align: center;
	width: 12px;
	font-size: 10px;
}

.filtrate-menu-container .elgg-input-tags-parent ul.as-selections li.as-selection-item,
.filtrate-menu-container .elgg-input-tags-parent ul.as-selections li.as-original input {
	font-size: 11px;
	padding-top: 2px;
	padding-bottom: 2px;
	line-height: 14px;
}

.filtrate-menu-container .typeaheadtags-help-container {
	max-width: 550px;
}

.filtrate-infinite-loader {
	bottom: 10px;
    left: 50%;
    position: absolute;
    width: 100px;
    margin-left: -50px;
}

/** Widget styles **/
.elgg-widget-content .filtrate-menu-container {
	background: #FFF;
	padding: 0;
}

.elgg-widget-content .filtrate-menu-container > ul > li label {
	display: inline-block;
	min-width: 36px;
}

.elgg-widget-content .filtrate-menu-container > ul > li .chosen-container {
	margin-right: 5px;
}