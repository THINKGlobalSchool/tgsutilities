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
/* Group Owner Block Improvements */
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