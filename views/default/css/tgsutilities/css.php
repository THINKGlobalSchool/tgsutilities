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

/*
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:after,
.elgg-menu-topbar > li > ul.elgg-child-menu:after,
.elgg-menu-topbar > li #todo-topbar-hover:after,
.elgg-menu-topbar > li #groups-topbar-hover:after,
.elgg-menu-topbar > li .dropdown-wrapper:after,
#login-dropdown-box:after,
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:before,
.elgg-menu-topbar > li > ul.elgg-child-menu:before,
.elgg-menu-topbar > li #todo-topbar-hover:before,
.elgg-menu-topbar > li #groups-topbar-hover:before,
.elgg-menu-topbar > li .dropdown-wrapper:before,
#login-dropdown-box:before {
	bottom: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}

.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:after,
.elgg-menu-topbar > li > ul.elgg-child-menu:after,
.elgg-menu-topbar > li #todo-topbar-hover:after,
.elgg-menu-topbar > li #groups-topbar-hover:after,
.elgg-menu-topbar > li .dropdown-wrapper:after,
#login-dropdown-box:after {
	border-color: rgba(255, 255, 255, 0);
	border-bottom-color: #FFF;
	border-width: 15px;
	left: 50%;
	margin-left: 51px;
}
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:before,
.elgg-menu-topbar > li > ul.elgg-child-menu:before,
.elgg-menu-topbar > li #todo-topbar-hover:before,
.elgg-menu-topbar > li #groups-topbar-hover:before,
.elgg-menu-topbar > li .dropdown-wrapper:before,
#login-dropdown-box:before {
	border-color: rgba(153, 153, 153, 0);
	border-bottom-color: #999;
	border-width: 18px;
}

.elgg-menu-topbar > li.elgg-menu-item-profile > ul.elgg-child-menu:before {
	left: 50%;
	margin-left: 45px;
}
.elgg-menu-topbar > li.elgg-menu-item-profile > ul.elgg-child-menu:after {
	left: 50%;
	margin-left: 48px;
}


.elgg-menu-topbar > li #groups-topbar-hover:before {
	left: 0;
	margin-left: 47px;
}
.elgg-menu-topbar > li #groups-topbar-hover:after {
	left: 0;
	margin-left: 50px;
}


.elgg-menu-topbar > li #todo-topbar-hover:before {
	left: 0;
	margin-left: 40px;
}
.elgg-menu-topbar > li #todo-topbar-hover:after {
	left: 0;
	margin-left: 43px;
}


.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:before,
.elgg-menu-topbar > li > div.dropdown-wrapper:before {
	left: 0;
	margin-left: 20px;
}
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:after,
.elgg-menu-topbar > li > div.dropdown-wrapper:after {
	left: 0;
	margin-left: 23px;
}


#login-dropdown-box:before {
	left: 50%;
	margin-left: 48px;
}
#login-dropdown-box:after {
	left: 50%;
	margin-left: 51px;
}
#login-dropdown-box {
	overflow: visible;
	z-index: 9001;
}

*/