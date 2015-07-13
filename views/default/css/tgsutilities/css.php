<?php
/**
 * TGS Utilities General CSS File
 *
 * @package TGSUtilities
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 *
 */
?>

/* ******************************************
   OWNER BLOCK
****************************************** */
#tgsutilities-collapsable-ownerblock {}

#tgsutilities-collapsable-ownerblock-full {
	display: none;
}

#tgsutilities-collapsable-ownerblock-full .elgg-menu-owner-block li a {}

.ownerblock-browse-content-closed, .ownerblock-browse-content-open {}

.ownerblock-browse-content-open {}

.ownerblock-browse-content-closed:hover, .ownerblock-browse-content-open:hover {}

.ownerblock-browse-content-closed:after {
	font-size: smaller;
	content: " \25BC";
}

.ownerblock-browse-content-open:after {
	font-size: smaller;
	content: " \25B2";
}

#tgsutilities-collapsable-ownerblock ul li.elgg-menu-item-more-ownerblock,
#tgsutilities-collapsable-ownerblock ul li.elgg-menu-item-less-ownerblock {
	position: inherit;
}


/* ******************************************
   Action Menu
****************************************** */

.entity_anchor_hidden {
	display: none !important;
}

.actionmenu {
	float: right;
	height: 25px;
}

.actionmenu .actionmenu-actions {
	display: none;
}

.actionmenu-actions .elgg-menu-entity {
	margin-left: 0px;
}

.elgg-icon-settings-menu {
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/elgg_sprites.png) no-repeat left;
	width: 16px;
	height: 16px;
	background-position: 0 -738px;
	float: right;
	margin-left: 5px;
}

.elgg-menu-entity-buttons {
	float: none;
	height: auto;
	margin-top: 11px;
}

.elgg-menu-entity-core {
	height: auto;
	float: none;
	text-align: left;
	width: 100%;
	padding: 9px 10px 0px;
}

.elgg-menu-entity-core:only-child {
	padding-bottom: 9px;
}

.elgg-menu-entity-core li {
	margin-left: 0;
	margin-right: 15px;
}

.elgg-menu-entity-hidden {
	display: none;
}

.elgg-menu-entity-actions {
	border-top: 1px solid #DCDCDC;
	height: auto;
	float: none;
	margin-top: 8px;
	margin-bottom: 8px;
	text-align: left;
	padding: 4px 10px 4px;
}

.elgg-menu-entity-actions li {
	background: transparent url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png) no-repeat left;
	background-position: 0 -1224px;
	height: 16px;
	margin-top: 8px;
}

.elgg-menu-entity-actions li:hover {
	background-position: 0 -1206px;
}

.elgg-menu-entity-actions li a {
	margin-left: 22px;
	bottom: 2px;
	position: relative;
	font-size: 0.9em;
}

.elgg-menu-entity-actions li a:hover {
	text-decoration: none;
}


/* Action Menu Triangle */
.actionmenu-actions:after,
.actionmenu-actions:before {
	bottom: 100%;
	left: 50%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}
.actionmenu-actions:after {
	border-color: rgba(238, 238, 238, 0);
	border-bottom-color: #FFF;
	border-width: 8px;
	margin-left: -8px;
}
.actionmenu-actions:before {
	border-color: rgba(220, 220, 220, 0);
	border-bottom-color: #999999;
	border-width: 9px;
	margin-left: -9px;
}
/* End triangle */

.actionmenu-actions {
	background-color: #FFFFFF;
	border: 1px solid #999999;
	box-shadow: 0 0 1px #CCC;
	-webkit-box-shadow: 0 0 1px #CCC;
	-moz-box-shadow: 0 0 1px #CCC;
	min-height: 24px;
	position: absolute;
	z-index: 9004;
}

.entity-action-toggler {
	font-size: 1em;
	padding: 3px !important;
}

.entity-action-toggler i {
	color: #666;
}

.elgg-module-featured > .elgg-head .entity-action-toggler span,
.forum-topic .forum-reply .elgg-module-featured > .elgg-head .entity-action-toggler span {
	color: #333333;
}

.entity-action-toggler:hover span, 
.entity-action-toggler:focus span {
	color: #FFFFFF !important;
}

/* Fix hidden items */
.elgg-menu-hz > li.hidden {
	display: none;
}

/* ******************************************
   TOPBAR DROPDOWN (Added to default topbar)
****************************************** */
.elgg-menu-topbar-default ul {
	position: absolute;
	display: none;
	background-color: #FFF;
	border: 1px solid #DEDEDE;
	text-align: left;
	top: 33px;
	width: auto;
	border-radius: 0 0 3px 3px;
	box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.25);
}

.elgg-menu-topbar-default ul .elgg-image-block {
	padding: 0;
}

.elgg-menu-topbar-default li ul > li > a {
	text-decoration: none;
	padding: 10px 20px;
	background-color: #FFF;
	color: #444;
}
.elgg-menu-topbar-default li ul > li > a:hover {
	background-color: #F0F0F0;
	color: #444;
}
.elgg-menu-topbar-default > li:hover > ul {
	display: block;
}
.elgg-menu-item-account > a:after {
	content: "\bb";
	margin-left: 6px;
}

.elgg-topbar-dropdown-split + ul.elgg-child-menu {
	list-style-type: none;
    columns: 2;
    -webkit-columns: 2;
    -moz-columns: 2;

    -webkit-column-gap: 1px; 
    -moz-column-gap: 1px; 
    column-gap: 1px;

    -webkit-column-rule: 1px inset #888;
    -moz-column-rule: 1px inset #888;
    column-rule: 1px inset #888;
}

.elgg-topbar-dropdown-split + ul.elgg-child-menu li {
	display: inline-flex;
	display: -webkit-inline-flex;
}