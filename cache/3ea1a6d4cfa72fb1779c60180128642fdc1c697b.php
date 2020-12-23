<?php $__env->startSection('conteudo'); ?>

	<style>
		/*--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--*/
		body{
			background:#fff;
			font-family: 'Roboto', sans-serif;
		}
		a{
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-o-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-ms-transition: 0.5s all;
		}
		ul{
			padding: 0;
			margin: 0;
		}
		h1,h2,h3,h4,h5,h6,label,p{
			margin:0;
		}
		/*----*/
		.itemContainer{
			width:100%;
			float:left;
		}

		.itemContainer div{
			float:left;
			margin: 5px 20px 5px 20px ;
		}

		.itemContainer a{
			text-decoration:none;
		}

		.cartHeaders{
			width:100%;
			float:left;
		}

		.cartHeaders div{
			float:left;
			margin: 5px 20px 5px 20px ;
		}
		.item_add {
			color: #fff;
			border:none;
		}
		a.item_add {
			text-decoration: none;
		}
		.grid_1 img{
			margin-bottom:1em;
		}
		.box_1 h3{
			color: #fff;
			font-size: 1.1em;

		}
		.box_1 h3 img{
			margin-left: 5px;
		}

		.box_1 p a{
			color:#fff;
			font-size: 0.875em;
		}
		.total {
			display: inline-block;
		}
		.cart.box_1{
			float: right;
			margin-top: 2px;
		}
		/*----*/
		.header {
			border-bottom: 1px solid #000;
		}
		.header-top{
			background: #000;
			padding: 15px 0;
		}
		.search{
			position:relative;
			float: left;
			width: 25%;
			background-color: #fff;
			margin-top: 11px;
		}
		.search input[type="text"] {
			outline: none;
			padding: 3px 15px;
			background: none;
			width: 91%;
			border: none;
			font-size: 1.2em;
			color: #000;
			font-weight: 700;
		}
		.search input[type="submit"] {
			border: none;
			cursor: pointer;
			position: absolute;
			outline: none;
			top: 0px;
			right: 0px;
			background: #c7c7c7;
			font-size: 1.2em;
			color: #000;
			padding: 3px;
			font-weight: 700;
		}
		.search input[type="submit"]:hover {
			background: <?=$dados_loja->corHex?>;
			color: #fff;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-o-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-ms-transition: 0.5s all;
		}
		.header-left{
			float: right;
			margin-top: 4px;
		}
		.header-left ul{
			float: left;
		}
		.header-left ul li{
			display: inline-block;
		}
		.header-left ul li a{
			text-decoration: none;
			color:#fff;
			font-size: 1.1em;
			margin: 0 2em 0 0;
		}
		.header-left ul li a:hover{
			color:  <?=$dados_loja->corHex?>;
		}
		.logo{
			float: left;
		}
		.head-top {
			padding: 1em 0;
		}
		/* start menu */
		.h_menu4 {
			margin: 7px 0 0px;
			float: right;
		}
		.h_nav h4{
			border-bottom:1px solid rgb(236, 236, 236);
			font-size: 1.3em;
			color:#000;
			line-height: 1.8em;
			margin-bottom: 4%;
		}
		.h_nav h4.top{
			margin-top:1%;
		}
		.h_nav ul li{
			display: block;
		}
		.h_nav ul li a{
			display: block;
			font-size: 0.85em;
			color: #000;
			text-transform: capitalize;
			line-height: 3em;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}
		.h_nav ul li a:hover{
			color:<?=$dados_loja->corHex?>;
			text-decoration:underline;
		}
		/*--banner--*/

		.banner{
			background: url(../images/1.jpg) no-repeat ;
			background-size: cover;
			width:100%;
			min-height: 560px;
			position: relative;
		}
		/*--- slider-css --*/

		.rslides {
			position: relative;
			list-style: none;
			overflow: hidden;
			width: 100%;
			padding: 0;
			margin: 0;
		}
		.rslides li {
			-webkit-backface-visibility: hidden;
			position: absolute;
			display: none;
			width: 100%;
			left: 0;
			top: 0;
		}
		.rslides li:first-child {
			position: relative;
			display: block;
			float: left;
		}
		.rslides img {
			display: block;
			height: auto;
			float: left;
			width: 100%;
			border: 0;
		}

		.callbacks_tabs a:after {
			content: "\f111";
			font-size: 0;
			font-family: FontAwesome;
			visibility: visible;
			display: block;
			height: 10px;
			width: 10px;
			display: inline-block;
			border: 1px solid #fff;
			background:none;
			border-radius:50px;
		}
		.callbacks_here a:after{
			background:#fff;
		}
		.callbacks_tabs a{
			visibility:hidden;
		}
		.callbacks_tabs li{
			display:inline-block;
		}
		ul.callbacks_tabs.callbacks1_tabs {
			position: absolute;
			bottom: 14%;
			z-index: 999;
			left: 46%;
		}
		.callbacks_nav {
			position: absolute;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			top: 38%;
			left: 0;
			opacity: 0.7;
			z-index: 3;
			text-indent: -9999px;
			overflow: hidden;
			text-decoration: none;
			height: 35px;
			width: 35px;
			background: url("../images/img-sprite.png") no-repeat -13px -98px ;
		}
		.callbacks_nav.next {
			left: auto;
			background-position:-91px -98px;
			right: 0;
		}
		.banner-text{
			padding:10em 0 1em;
			color:#fff;
			width: 50%;
		}
		.banner-text h3 {
			font-size: 3.2em;
			font-weight: 800;
			font-family: 'Lato', sans-serif;
			text-transform: uppercase;
			letter-spacing: 6px;
			line-height: 1.2em;
		}
		.banner-text p{
			font-size:1.2em;
			margin: 0.3em 0 1em;
		}
		.banner-text a{
			text-decoration: none;
			color:#fff;
			font-size:1.2em;
			background: <?=$dados_loja->corHex?>;
			padding: 0.4em 1em;
			border-radius:5px;
		}
		.banner-text a:hover{
			color: <?=$dados_loja->corHex?>;
			background: #fff;
		}
		/*--content-top--*/
		.content-top h1{
			color:#000;
			font-size: 2.2em;
			font-family: 'Lato', sans-serif;
			font-weight: 600;
			margin-bottom: 0.5em;
		}
		.content-top {
			text-align:center;
			padding:4em 0;
		}
		.grid-top img{
			width:100%;
		}
		.grid-top p{
			font-size: 1.1em;
			margin: 0.3em 0 0;
			font-weight: 500;
			text-transform: uppercase;
		}
		.grid-top p a{
			color: #000;
			text-decoration: none;
		}
		.grid-top p a:hover{
			color: <?=$dados_loja->corHex?>;
		}
		.grid-in {
			padding: 2em 0 0;
		}
		/*--//content-top--*/
		/*---content-middle--*/
		.grid-mid{
			position:relative;
		}
		.twit {
			position: absolute;
			top: 48%;
			width:100%;
			text-align:center;
		}
		.twit h4{
			color: #fff;
			font-size: 2em;
			font-weight: 600;
			margin: 0 auto;

			text-transform: uppercase;
			font-family: 'Lato', sans-serif;
		}
		.grid-mid img{
			width:100%;
		}
		.grid-middle {
			padding: 2em 0 0;
		}
		/*--content-bottom--*/
		.content-bottom ul li{
			display:inline-block;
			border:1px solid #eee;
			float:left;
			border-left: none;
			width: 16.666%;
		}
		.content-bottom {
			padding: 3em 0;
		}
		/*--//content--*/
		.col-md2 {
			padding: 30px 0 0;
		}
		.men1{
			padding: 0 15px 0 0;
		}
		.men2{
			padding: 0 0px 0 15px;
		}
		.carrinho strong{
			color: #ffffff;
		}
		.content-top-bottom h2{
			color: #000;
			font-size: 2.2em;
			font-family: 'Lato', sans-serif;
			font-weight: 600;
			margin-bottom: 1.5em;
			text-align: center;
			text-transform: uppercase;
		}
		.b-link-stripe{
			position:relative;
			display:inline-block;
			vertical-align:top;
			font-weight: 300;
			overflow:hidden;
			width: 100%;
		}
		.b-link-stripe .b-wrapper{
			position:absolute;
			width:100%;
			height:100%;
			top:0;
			left:0;
			text-align:center;
			color:#ffffff;
			overflow:hidden;
		}

		.b-animate-go{
			text-decoration:none;
		}
		.b-animate{
			transition: all 0.5s;
			-moz-transition: all 0.5s;
			-ms-transition: all 0.5s;
			-o-transition: all 0.5s;
			-webkit-transition: all 0.5s;
			visibility: hidden;
			font-size:1.1em;
			font-weight:700;
		}
		.b-animate img{
			margin-top: 4%;
			display: -webkit-inline-box;
		}
		.b-animate span{
			display:block;
			font-size: 2em;
			padding-top: 5em;
			display: block;
			font-weight: 500;
		}

		/* lt-ie9 */
		.b-animate-go:hover .b-animate{
			visibility:visible;
		}
		.b-from-left{
			position: relative;
			left: -100%;
			background: rgba(239, 95, 33, 0.64);
			background-size: 100% 100%;
			top: 0px;
			margin: 0;
			min-height: 356px;
		}
		.grid-top:hover .b-from-left{
			left:0;
		}
		.grid-top{
			position: relative;
		}
		/*----*/
		.col-md1 {
			position: relative;
		}

		.b-from-top{
			position: relative;
			top: -100%;
			background: rgba(239, 95, 33, 0.64);
			background-size: 100% 100%;

			margin: 0;
			min-height: 429px;
		}
		.col-md1:hover .b-from-top{
			top:0;
		}
		.men:hover .b-from-top{
			top:0;
		}
		.men1:hover .b-from-top{
			top:0;
		}
		.men2:hover .b-from-top{
			top:0;
		}
		.top-in1{
			min-height: 204px;
		}
		.top-in1 span{
			padding: 3em 0 0;
		}
		.top-in2 span{
			padding: 2.8em 0 0;
		}
		.top-in2{
			min-height: 196px;
		}
		.top-in span{
			padding: 6em 0 0;
		}
		/*----*/
		.content-grid{
			position: absolute;
			top:0;
			display: none;
			text-align: center;
			width: 100%;
		}
		.content-grid h5{
			color:#fff;
			font-size: 2em;
		}
		.men{
			position: relative;
		}
		.men:hover .content-grid{
			display: block;
		}

		/*--//content--*/
		/*--footer--*/
		.footer{
			background:#141414;
		}
		.amet-sed h4{
			font-size: 1.5em;
			color: #fff;
			font-family: 'Lato', sans-serif;
			margin: 0 0 1em;
			text-transform: uppercase;
			font-weight: 700;
		}
		.footer-top-at {
			padding: 4em 0;
		}
		ul.nav-bottom li{
			list-style:none;
		}
		ul.nav-bottom li  a{
			text-decoration:none;
			color:#989696;
			font-size:1.1em;
			display: inline-block;
			margin: 0.2em 0;
		}
		ul.nav-bottom li  a:hover{
			color:<?=$dados_loja->corHex?>;
		}
		.amet-sed p{
			color:#989696;
			font-size: 1.2em;
			margin: 0 0 0.3em;
		}

		.footer-class  p{
			color:#fff;
			font-size:1.2em;

		}
		.footer-class  p a{
			color:<?=$dados_loja->corHex?>;
			text-decoration:none;
		}
		.footer-class  p a:hover{
			color:#fff;
		}
		.footer-class {
			padding: 1.5em 0;
			text-align:center;
			background:#000;
		}
		.amet-sed form{
			padding:1em 0 0;
		}
		.amet-sed input[type="text"], .amet-sed input[type="submit"] {
			width: 69%;
			padding: 0.5em;
			outline: none;
			color: #000;
			font-size: 1em;
			background: #fff;
			border: none;
		}
		.amet-sed input[type="submit"] {
			width: 20%;
			color: #FFF;
			font-size: 1em;
			background:<?=$dados_loja->corHex?>;
			border: none;
			outline:none;
			padding: 0.5em;
		}
		.amet-sed input[type="submit"]:hover {
			background: #fff;
			color:<?=$dados_loja->corHex?>;
		}
		ul.social{
			padding:1em 0 0;
		}
		ul.social li{
			display: inline-block;
		}
		ul.social li i{
			background: url(../images/img-sprite.png)no-repeat -9px -14px ;
			width: 24px;
			height: 24px;
			display: inline-block;
			vertical-align: middle;
			margin: 0 5px 0 0;
		}
		ul.social li  i.twitter{
			background-position:  -43px -14px;
		}
		ul.social li  i.rss{
			background-position: -77px -14px;
		}
		ul.social li  i.gmail{
			background-position:-110px -14px;
		}
		ul.social li i:hover{
			transform: rotate(360deg);
			-webkit-transform: rotate(360deg);
			-moz-transform: rotate(360deg);
			-o-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			transition: 0.5s all ease;
			-webkit-transition: 0.5s all ease;
			-moz-transition: 0.5s all ease;
			-o-transition: 0.5s all ease;
			-ms-transition: 0.5s all ease;
		}
		/*--//footer--*/
		/*--contact--*/
		.contact {
			padding: 3em 0 ;
		}
		.contact h1{
			font-size: 3em;
			font-family: 'Lato', sans-serif;
			color:#000;
			text-align: center;
			font-weight: 600;
		}
		.map iframe{
			width: 100%;
			height:150px;
			border:none;
			padding: 0 15px;
		}
		.contact-grid input[type="text"],.contact-grid textarea{
			width: 100%;
			padding: 1em;
			margin: 0.5em 0;
			background:none;
			outline:none;
			border: 1px solid #A09F9F;
			font-size:1em;
			color:#A09F9F;
			-webkit-appearance: none;
		}
		.contact-grid textarea{
			resize:none;
		}
		.send input[type="submit"]{
			width: 14%;
			font-size: 1.1em;
			background:<?=$dados_loja->corHex?>;
			padding: 0.4em 0.8em;
			text-align: center;
			color: #fff;
			border: none;
			outline:none;
			-webkit-appearance: none;
		}
		.send input[type="submit"]:hover{
			background:#2d2d2d;
		}
		.contact-form {
			padding: 3em 0;
		}
		.address-more {
			padding: 0 0 2em;
		}
		.contact-in p{
			font-size:1em;
			color: #626262;
			width: 72%;
			line-height: 1.7em;
		}
		.address-more h4{
			color:#000;
			font-size:1.4em;
			font-family: 'Lato', sans-serif;
			margin: 0 0 0.3em;
			font-weight: 600;
		}
		.address-more p a{
			text-decoration:none;
			color: #626262;
		}
		.address-more p a:hover{
			color: <?=$dados_loja->corHex?>;
		}
		/*--//contact--*/
		/*--blog--*/
		.grid_3{
			position:relative;
		}
		.blog-poast-admin {
			position: absolute;
			bottom:8.6em;
			left: 1.2em;
		}
		.blog-poast-info {
			padding: 0.8em 0em;
		}
		.blog-poast-info ul li {
			display:inline-block;
			padding: 0 0.3em;
		}
		.blog-poast-info ul li span{
			color: #000;
			font-size:1em;
		}
		.blog-poast-info ul li a {
			color: #000;
			font-size:1em;
		}
		.blog-poast-info ul li a:hover{
			text-decoration:none;
		}
		.blog-poast-info ul li a:hover {
			text-decoration:none;
			color:<?=$dados_loja->corHex?>;
		}
		.blog-poast-info ul li  i {
			width: 20px;
			height: 20px;
			background:  url(../images/img-sprite.png) no-repeat -150px -104px ;
			display: inline-block;
			vertical-align: sub;
			margin: 0 3px 0 0;
		}
		.blog-poast-info ul li  i.date {
			background-position: -186px -104px;
		}
		.blog-poast-info ul li  i.comment {
			background-position:-226px -101px;
		}
		.blog {
			padding: 4em 0;
		}
		.grid_3 p {
			color: #626262;
			font-size: 1em;
			line-height:1.5em;
		}
		.grid_3 h3{
			text-transform:uppercase;
			font-size:1.2em;
			margin-bottom:1em;
		}
		.grid_3 h3 a{
			color:#000;
			text-decoration: none;
		}
		.grid_3 h3 a:hover {
			color: <?=$dados_loja->corHex?>;
		}
		.button {
			margin-top: 20px;
		}
		.button a {
			color:#fff;
			font-size: 1em;
			text-transform: uppercase;
			background: <?=$dados_loja->corHex?>;
			padding: 0.4em 1em;
			text-decoration: none;
			text-decoration:none;
		}
		.button a:hover{

			color:#fff;
			background: #000
		}
		.grid_3{
			margin-bottom:3em;
		}
		p.m_10 {
			font-size: 0.85em;
			color: #555;
			line-height: 1.8em;
			padding: 2% 0;
		}
		p.m_11 {
			font-size: 0.85em;
			color: #555;
			line-height: 1.8em;
		}
		.blog h1 {
			font-size: 3em;
			font-family: 'Lato', sans-serif;
			color: #000;
			text-align: center;
			font-weight: 600;
			margin: 0 0 1em;
		}
		/*--//blog--*/
		/*--product--*/
		.tags ul li {
			display: inline-block;
			float:left;
			width: 22.8%;
			margin: 0.5em 2% 0 0;
			text-align: center;
		}
		.tags li a {
			font-size: 1em;
			display:block;
			padding: 0.3em 0.4em;
			text-decoration: none;
			color: #000;
			border: 1px solid #000;
		}
		.tags li a:hover {
			color: #fff;
			background:<?=$dados_loja->corHex?>;
			border: 1px solid <?=$dados_loja->corHex?>;
		}

		.tags ul li:nth-child(4),.tags ul li:nth-child(8),.tags ul li:nth-child(12){
			margin:0.5em 0 0;
		}
		/*----*/
		h3.cate {
			color: #000;
			border-bottom: 1px solid #000;
			width: 69%;
			font-size: 2em;
			font-family: 'Lato', sans-serif;
		}
		.of-left{
			border-bottom: 1px solid #000;
		}
		.product-go {
			margin-top: 2em;
		}
		.product {
			padding: 4em 0;
		}
		.bottom-product {
			margin-bottom: 2em;
		}
		nav.in{
			text-align: center;
		}
		.pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus {
			color: #fff;
			background-color:<?=$dados_loja->corHex?>;
			border-color: <?=$dados_loja->corHex?>;
		}
		.pagination > li > a, .pagination > li > span {

			color: #000;
		}
		/*----*/
		ul.kid-menu{
			display: block !important;
		}
		.menu {
			width: auto;
			height: auto;
			padding: 0;
			list-style: none;
			margin: 1.5em 0;
		}
		.menu > li > a {
			width: 100%;
			margin: 0.3em 0;
			display:inline-block;
			position: relative;
			color: #000;
			font-size: 1.1em;
			text-decoration:none;

		}
		.menu > li > a:hover{
			color:<?=$dados_loja->corHex?>;
		}
		.menu ul li a {
			width: 100%;
			display: inline-block;
			position: relative;
			font-size:1.1em;
			margin:0.3em 0;
			color: #000;
			text-decoration:none;

			text-indent: 1.2em;
		}
		.menu ul li a:hover{
			color:<?=$dados_loja->corHex?>;
		}
		ul.kid-menu li,.menu ul li{
			list-style: none;
		}
		.sellers {
			padding: 2em 0;
		}
		.tags {
			padding: 1.5em 0 0;
		}
		h3.best {
			color: #000;
			border-bottom: 1px solid #000;
			width: 81%;
			font-size: 2em;
			font-family: 'Lato', sans-serif;
		}
		.pagination > .active > a, .pagination > .active > a:hover {
			background: <?=$dados_loja->corHex?>;
			border-color: <?=$dados_loja->corHex?>;
		}
		/*----*/
		.product-middle{
			background: url(../images/product1.jpg) center;
			width: 100%;
			min-height: 45px;
			display: block;
			background-size: cover;
		}
		.fit-top{

			width: 100%;
			padding: 1em 1em;
		}
		h6.shop-top{
			font-size:1.1em;
			font-weight:300;
			float:left;
			color: #fff;
			margin-top: 0.3em;
		}
		a.shop-now{
			font-size:0.9em;
			float: right;
			text-decoration: none;
			border: 1px solid #ffffff;
			padding: 0.2em 0.4em;
			color:#fff;
		}
		a.shop-now:hover{
			border: 1px solid <?=$dados_loja->corHex?>;
			background:<?=$dados_loja->corHex?>;
		}
		h3.tag {
			color: #000;
			border-bottom: 1px solid #000;
			width: 32%;
			font-size: 2em;
			font-family: 'Lato', sans-serif;
		}
		.of-left-in{
			border-bottom: 1px solid #000;
		}

		/*----*/
		.fashion-grid{
			float:left;
			width: 24%;
		}
		.fashion-grid1{
			float: right;
			width: 68%;
		}
		h6.best2 {
			font-size: 1em;
			font-family: 'Lato', serif;
			line-height: 1.3em;
		}
		h6.best2 a{
			color:#000;
			text-decoration: none;
		}
		h6.best2 a:hover{
			color:<?=$dados_loja->corHex?>;
		}
		span.price-in1 {
			font-size: 1.7em;
			padding: 0.3em 0 0;
			display: block;
			color:<?=$dados_loja->corHex?>;
		}
		span.price-in1 small {
			text-decoration: line-through;
		}
		.six1{
			position: absolute;
			top:0;
			font-weight: 100;
			padding: 4em 1em 0;
			width: 100%;
			height: 100%;
			text-align: center;
		}
		.six1 h4{
			font-size:2.5em;
			color:<?=$dados_loja->corHex?>;
			font-weight: 100;
		}
		.six1 p{
			font-size:2em;
			color:<?=$dados_loja->corHex?>;
			margin: 0.5em 0 0;
		}
		.six1 span{
			font-size:6em;
			color:<?=$dados_loja->corHex?>;
			font-weight: 100;
			font-family: 'Lato', sans-serif;
		}
		.per1 {
			position: relative;
			margin: 2em 0;
		}
		/*---*/

		a.item_add p.number{
			font-size: 1.1em;
			color: #FFF;
			text-align: center;
			background: <?=$dados_loja->corHex?>;
			padding: 0.5em 1em;
		}
		a.item_add p.number:hover{
			background: #000;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-o-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-ms-transition: 0.5s all;
		}
		a.item_add p.number i{
			background: url(../images/img-sprite.png)no-repeat -291px -104px ;
			width: 18px;
			height: 18px;
			display: inline-block;
			vertical-align: middle;
			margin: 0 5px 0 0;
		}
		p.tun{
			font-size:1em;
			color: #949494;
			text-align: center;
			line-height: 1.3em;
			padding: 1em 0;
		}

		.product-at{
			position: relative;
		}
		.product-at:hover .pro-grid{
			display:block;
		}
		.product1 {
			padding: 0;
		}
		.pro-grid{
			text-align:center;
			position:absolute;
			top:0;
			width:100%;
			height:100%;
			display:none;
			padding: 8em 0 0;
		}
		.pro-grid span{
			text-decoration:none;
			color:#fff;
			font-size:1.1em;
			font-weight:600;
			background:<?=$dados_loja->corHex?>;
			padding: 0.5em 1.5em;
			text-transform: uppercase;
		}
		.pro-grid span:hover{
			background:#fff;
			color:<?=$dados_loja->corHex?>;
		}
		/*--//product--*/
		/*--single--*/
		ul.star-footer li{
			display:inline-block;

		}
		ul.star-footer li i{
			height: 16px;
			width: 16px;
			background: url("../images/img-sprite.png") no-repeat -261px -106px  ;
			display: inline-block;
		}
		.single-para h4 {
			color: #000;
			font-size: 3em;
			font-family: 'Lato', serif;
		}
		.single-para p {
			font-size: 1em;
			color: #2c3e50;
			font-family: 'Lato', serif;
			line-height: 1.8em;
			margin: 1em 0;
		}
		.single-para h5 {
			color: <?=$dados_loja->corHex?>;
			font-size: 2em;
			border-bottom: 1px solid #C4C3C3;
			padding: 0.3em 0;
		}

		.available ul li{
			list-style:none;
			padding:0 0.5em 0 0;
			color:#4c4c4c;
			font-size:1.1em;
			float:left;
			width:100%;
			font-family: 'Roboto Slab', serif;
			margin: 0.5em 0;
		}
		.available ul li select {
			outline: none;
			padding: 12px;
			border: none;
			background: #eeeeee;
			width: 77%;
			margin-left: 13%;
			cursor:pointer;
		}
		.available ul li.size-in select {
			margin-left: 16%;
		}
		.available {
			padding:  1em 0;
		}
		ul.tag-men {
			padding:0.3em 0;
			border-top: 1px solid #C4C3C3;
			border-bottom: 1px solid #C4C3C3;
		}
		ul.tag-men li{
			list-style:none;
			color:#000;
			font-family: 'Lato', serif;
			margin: 0.3em 0;
			font-size:0.9em;
		}
		ul.tag-men li span.women1{
			margin-left: 9em;
		}
		a.add-cart {
			text-decoration: none;
			color: #fff;
			background: <?=$dados_loja->corHex?>;
			padding: 0.4em 0.8em;
			font-size:0.9em;
			text-transform: uppercase;
			margin-top: 2em;
			display: inline-block;
		}
		a.add-cart:hover {
			background:#000;

		}
		h3.real{
			color: #000;
			border-bottom: 1px solid #000;
			margin: 0 0.5em 1em;
			font-size: 2em;
			font-family: 'Lato', serif;
		}
		/*----*/
		.star-on {
			padding: 1em 0;
		}
		.star-on ul {
			float:left;
		}
		.star-on ul li{
			vertical-align: sub;
		}

		.review{
			float:left;
			padding: 0 1em;
		}
		.star-on a{
			text-decoration:none;
			font-size:1em;
			color:#000;
		}
		.star-on a:hover{
			color:<?=$dados_loja->corHex?>;
		}
		/*----*/
		.cd-tabs-navigation {
			width: 100%;
		}
		.cd-tabs-navigation li {
			display: inline-block;
			list-style:none;
		}
		.cd-tabs-navigation a {
			position: relative;
			display: block;
			text-align: center;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			font-size:1.1em;
			color:#000;
			background:#eee ;
			padding:10px 16px;
			font-family: 'Lato', serif;
			text-decoration: none;
		}

		.cd-tabs-navigation a.selected  {
			background:<?=$dados_loja->corHex?>;
			color:#fff;
		}

		.cd-tabs-content li {
			display: none;
		}
		.cd-tabs-content li.selected {
			display: block;
			-webkit-animation: cd-fade-in 0.5s;
			-moz-animation: cd-fade-in 0.5s;
			animation: cd-fade-in 0.5s;

		}
		.cd-tabs.is-ended {
			margin: 3em 0 1em;
			padding: 0 1em;
		}
		.facts{

			padding: 1em 0;
		}
		.facts p{
			color:#999;
			font-size:1em;
			line-height:1.7em;
			padding:0 0 1em;
			font-family: 'Lato', serif;
		}
		.facts ul li{
			list-style:none;
			color:#767676;
			font-size:1em;
			padding:0.3em 0;
		}
		.color {
			background:#eee;
			margin: 1em 0;
			padding: 1em;
		}
		.color p,.color span{
			color:#000;
			font-size:1em;
			font-family: 'Lato', serif;
			float: left;

		}
		.color p{
			width:40%;
		}
		.top-comment-left{
			float: left;
			width: 13%;
		}
		.top-comment-right{
			float: left;
			width:84%;
			margin-left:1em;
			background:#f8f8f8;
			padding:2em ;
		}
		.top-comment-right h6{
			color:#000;
			font-size:0.8em;
			font-family: 'Lato', serif;
		}
		.top-comment-right p{
			color:#000;
			font-size:1em;
			margin: 1em 0em 0 1em;
		}
		a.add-re{
			text-decoration: none;
			color: #fff;
			background: <?=$dados_loja->corHex?>;
			padding: 0.4em 0.8em;
			font-size: 0.9em;
			text-transform: uppercase;
			margin-top: 2em;
			display: inline-block;
		}
		a.add-re:hover{

			background: #000;
		}
		.top-comment-right h6 a{
			color:#000;
			font-size:1.5em;
			text-decoration:none;
		}
		.comments-top-top {
			margin: 2em 0;

		}
		/*--//single--*/
		.register {
			padding: 4em 0 ;
		}
		/*--register--*/
		.register h1{
			font-size: 3em;
			font-family: 'Lato', sans-serif;
			color: #000;
			text-align: center;
			font-weight: 600;
			margin-bottom: 1em;
		}
		.register-top-grid h3, .register-bottom-grid h3 {
			font-size: 1.5em;
			font-family: 'Lato', sans-serif;
			color: #000;
			margin-bottom: 0.5em;
			text-transform: uppercase;
			font-weight: 600;
		}
		.register-top-grid span, .register-bottom-grid span {
			font-size: 1em;
			display: block;
			color: #A09F9F;
		}
		.register-top-grid input[type="text"], .register-bottom-grid input[type="password"] {
			width: 100%;
			padding: 1em;
			margin: 1em 0;
			background: none;
			outline:none;
			border: 1px solid #A09F9F;
			-webkit-appearance: none;
		}
		.checkbox {
			margin-bottom: 4px;
			padding-left: 27px;
			line-height: 27px;
			cursor: pointer;
			float: left;
			position: relative;
		}
		.news-letter {
			color: <?=$dados_loja->corHex?>;
			font-size: 1em;
			margin-bottom: 1em;
			display:inline-block;
			text-transform: uppercase;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-o-transition: 0.5s all;
			font-weight:400;
		}
		.checkbox i {
			position: absolute;
			bottom: 5px;
			left: 0;
			display: block;
			width:20px;
			height:20px;
			outline: none;
			border: 2px solid <?=$dados_loja->corHex?>;
		}
		.checkbox input + i:after {
			content: '';
			background: url("../images/tick1.png") no-repeat 1px 2px;
			top: -1px;
			left: -1px;
			width: 15px;
			height: 15px;
			font: normal 12px/16px FontAwesome;
			text-align: center;
		}
		.checkbox input + i:after {
			position: absolute;
			opacity: 0;
			transition: opacity 0.1s;
			-o-transition: opacity 0.1s;
			-ms-transition: opacity 0.1s;
			-moz-transition: opacity 0.1s;
			-webkit-transition: opacity 0.1s;
		}
		.checkbox input {
			position: absolute;
			left: -9999px;
		}
		.checkbox input:checked + i:after {
			opacity: 1;
		}
		.news-letter:hover {
			color:#000;
		}
		.register-bottom-grid input[type="submit"] {
			background: <?=$dados_loja->corHex?>;
			padding: 0.4em 1em;
			color: #fff;
			font-size:1.2em;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-o-transition: 0.5s all;
			display: inline-block;
			border:none;
			outline:none;
		}
		.register-bottom-grid input[type="submit"]:hover{
			background:#000;

		}
		/*--//register--*/
		/*--account--*/
		.account h1{
			font-size: 3em;
			font-family: 'Lato', sans-serif;
			color: #000;
			text-align: center;
			font-weight: 600;
			margin-bottom: 1em;
		}
		.account-top span{
			font-size:1em;
			display: block;
			padding: 0 0 0.5em;
			color:#A09F9F;
		}
		.account-top div{
			padding:0.5em 0;
		}
		.account-top input[type="text"],
		.account-top textarea,.account-top input[type="password"]{
			padding:1em;
			width:100%;
			background:none;
			border: 1px solid #A09F9F;
			outline:none;

			font-size:1em;
		}

		.account-top textarea{
			resize:none;
			height:60px;
		}
		.account-top input[type="submit"]{
			outline:none;
			padding:7px 20px;
			color:#FFF;
			cursor:pointer;
			background:<?=$dados_loja->corHex?>;
			border:none;
			width:20%;
			margin:1em auto 0;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-o-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-ms-transition: 0.5s all;
			font-size: 1.2em;
		}
		.account-top input[type="submit"]:hover{
			background:#000;
		}

		.account{
			padding: 4em 0;
		}
		.five {
			background: #fff;
			border-radius: 100px;
			border: 2px solid <?=$dados_loja->corHex?>;
			width: 100px;
			height: 100px;
			position: absolute;
			top: 1%;
			right: 8%;
			padding: 2em 0 0;
			text-align: center;
		}
		.five span {
			font-size: 1em;
			color: <?=$dados_loja->corHex?>;
		}
		.five h2 {
			font-size: 1.5em;
			font-weight: 700;
			color: #000;
		}
		a.create {
			text-decoration: none;
			color: #fff;
			padding: 7px 20px;
			background: <?=$dados_loja->corHex?>;
			text-align: center;
			display: block;
		}
		.left-account img{
			width:100%;
		}
		/*--single--*/
		.single-bottom h3 {
			font-size: 3em;
			font-family: 'Lato', sans-serif;
			color: #000;
			text-align: center;
			font-weight: 600;
			margin-bottom: 0.7em;
		}
		.single-bottom {
			padding: 0em 0 4em;
		}
		.single-bottom input[type="text"], .single-bottom textarea {
			width: 100%;
			padding: 1em;
			background: none;
			outline: none;
			border: 1px solid #A09F9F;
			font-size: 1em;
			color:#A09F9F;
			-webkit-appearance: none;
			margin: 0 0 1em;
		}
		.single-bottom  input[type="submit"]{
			width: 10%;
			font-size: 1.3em;
			background: <?=$dados_loja->corHex?>;
			padding: 0.4em 0.8em;
			text-align: center;
			color: #fff;
			border: none;
			outline:none;
			-webkit-appearance: none;

		}
		.single-bottom  input[type="submit"]:hover{
			background:#000;
		}
		.single-bottom textarea {
			resize:none;
			min-height:180px;
			margin: 0em 0em 1em;
			width: 100%;
		}
		/*--//single--*/
		/*--checkout--*/
		/*--
		.cart h3{
			font-size:1.5em;
		}
		--*/
		.cart-sec{
			margin-bottom:3em;
		}
		.cart-item{
			width:20%;
			float:left;
			margin-right:5%;

		}
		.cart-item img{
			width:100%;
		}
		.cart-item-info{
			width:75%;
			float:left;

		}
		.check{
			padding:4em 0;
		}
		.cart-item-info h3{
			font-size:1em;
			font-weight:600;
		}
		.cart-item-info h3 a{
			color:#000;
		}
		.cart-item-info h3 span{
			display:block;
			font-weight:400;
			font-size: 0.85em;
			margin: 0.7em 0;
		}
		.size_3 {
			width:100%;
		}
		.delivery {
			margin-top: 3em;
		}
		.delivery p {
			color: #A6A6A6;
			font-size: 1em;
			font-weight: 400;
			float: left;
		}
		.delivery span {
			color: #A6A6A6;
			font-size: 1em;
			font-weight: 400;
			float: right;
		}
		.cart-item-info h4 span{
			font-size:0.65em;
			font-weight:400;
		}

		.close1,.close2{
			background: url('../images/close_1.png') no-repeat 0px 0px;
			cursor: pointer;
			width: 28px;
			height: 28px;
			position: absolute;
			right: 0px;
			top: 0px;
			-webkit-transition: color 0.2s ease-in-out;
			-moz-transition: color 0.2s ease-in-out;
			-o-transition: color 0.2s ease-in-out;
			transition: color 0.2s ease-in-out;
		}
		.cart-header {
			position: relative;
		}
		.cart-header2 {
			position: relative;
		}
		a.order {
			background: #008000;
			padding: 10px 20px;
			font-family: 'Lato', sans-serif;
			font-size: 1em;
			color: #fff;
			text-decoration: none;
			display: block;
			font-weight: 600;
			text-align: center;
			margin:3em 0;
		}
		a.order:hover{
			background: #004000;
		}
		.total-item,.cart-items{
			margin-top:0em;
			padding-bottom:2em;
		}

		.total-item h3 {
			color: #333;
			font-size: 1.1em;
			margin-bottom: 1em;
		}
		.total-item h4{
			font-size:0.8em;
			font-weight:600;
			color:#9C9C9C;
			display:inline-block;
			margin-right:6em;
		}
		a.cpns{
			background:<?=$dados_loja->corHex?>;
			color:#fff;
			font-family: 'Lato', sans-serif;
			padding: 10px;
			font-size: 0.8em;
			font-weight:600;
		}
		a.cpns:hover{
			background: #000;
		}
		.total-item p{
			font-size:0.9em;
			font-weight:400;
			margin-top:1em;
		}
		.total-item p a{
			color:#727272;
		}
		.total-item p a:hover{
			color:#000;
			text-decoration:underline;
		}
		a.continue{
			background:<?=$dados_loja->corHex?>;
			padding:10px 20px;
			font-family: 'Lato', sans-serif;
			font-size:1em;
			color:#fff;
			text-decoration:none;
			display: block;
			font-weight: 600;
			text-align: center;
			margin-bottom:2em;
		}
		a.continue:hover{
			background:#000;
		}
		ul.total_price{
			padding: 0;
			margin: 1em 0 0 0;
			list-style: none;
		}
		ul.total_price li.last_price{
			width: 50%;
			float: left;

		}
		ul.total_price li.last_price span{
			font-size: 1.1em;
			color: #000;
		}
		.price-details{
			border-bottom: 1px solid #DDD9D9;
			padding-bottom: 10px;
			background-color: #ffffff;
			border-radius: 5px;
		}
		.price-details h3{
			color:#000;
			font-size:1.2em;
			margin-bottom:1em;
			text-align: center;
		}
		.price-details span{
			width: 50%;
			float: left;

			font-size: 1em;
			color: #000;
			line-height: 1.8em;
		}


		.check h1 {
			font-size: 1.5em;
			margin-bottom:2em;
			font-family: 'Lato', sans-serif;
		}
		a.item_add1 {
			border-top-left-radius: 0;
			border-top-right-radius: 0;
			border-top-right-radius: 0;

			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
			border-top-left-radius: 0;
			border-bottom-left-radius: 0;
			padding: 10px 15px;
			background: url(0) #f54d56;
		}
		a.item_add1:hover{
			background:rgb(3, 193, 167);
			text-decoration:none;
			color:#fff;
		}
		.btn_5{
			padding:25px 40px;
			font-size:1.1em;
		}
		ul.qty{
			padding:0;
			margin:0;
			list-style:none;
		}
		ul.qty li{
			display: inline-block;
			margin-right: 10%;
		}
		ul.qty li p{
			font-size:0.8125em;
			color:#555;
		}
		/*--responsive--*/
		@media(max-width:1366px){

		}
		@media(max-width:1280px){

		}
		@media(max-width:1024px){
			.banner-text {
				width: 70%;
				margin: 0 0 0 3em;
			}
			.banner {
				min-height: 492px;
			}
			.b-animate span {
				padding-top: 4em;
			}
			.b-from-left {
				min-height: 288px;
			}
			.top-in span {
				padding: 5em 0 0;
			}
			.b-from-top {
				min-height: 350px;
			}
			.top-in1 span {
				padding: 2.3em 0 0;
			}
			.top-in1 {
				min-height: 166px;
			}
			.top-in2 span {
				padding: 2em 0 0;
			}
			.top-in2 {
				min-height: 157px;
			}
			/*--banner--*/
			h6.shop-top {
				font-size: 1em;
			}
			.tags li a {
				font-size: 0.8em;
			}
			h3.best,h3.tag,h3.cate {
				font-size: 1.7em;
			}
			h6.best2 {
				font-size: 1em;
				font-family: 'Lato', serif;
				line-height: 1.3em;
			}
			.six1 {
				padding: 2em 1em 0;
			}
			/*--single--*/
			.single-top {
				width: 48%;
			}
			.single-top-in {
				width: 52%;
			}
			.available ul li select {
				margin-left: 9%;
			}
			.available ul li.size-in select {
				margin-left: 13%;
			}
		}
		@media(max-width:768px){
			.h_menu4 {
				width: 50%;
			}
			.banner-text {
				width: 90%;
				margin: 0 0 0 3em;
			}
			.banner-text h3 {
				font-size: 2.5em;
			}
			.grid-top {
				float: left;
				width: 33.3%;
			}
			.grid-mid {
				float: left;
				width: 50%;
			}
			.twit {
				top: 45%;
			}
			.amet-sed {
				margin-bottom: 2em;
			}
			.footer-top-at {
				padding: 3em 0px 2em;
			}
			.men img,.col-md1 img,.men1 img,.men2 img{
				width:100%
			}
			.men1,.men2 {
				float: left;
				width: 50%;
			}
			.b-from-left {
				min-height: 213px;
			}
			.b-from-top {
				min-height: 553px;
			}
			.b-animate span {
				padding-top: 3em;
			}
			.top-in span {
				padding: 8em 0 0;
			}
			.top-in1 {
				min-height: 261px;
			}
			.top-in1 span {
				padding: 3.3em 0 0;
			}
			.top-in2 {
				min-height: 254px;
			}
			.top-in2 span {
				padding: 3.5em 0 0;
			}
			/*--contact--*/
			.contact-in {
				margin: 1em 0 0;
			}

			/*--blog--*/
			.grid_3 {
				float: left;
				width: 50%;
			}
			.grid-1{
				float:none;
				width:100%;
			}
			/*--product--*/
			.bottom-cd{
				float:left;
				width:33.3%;
			}
			.product-price {
				width: 50%;
			}
			.six1 {
				width: 87%;
				padding: 4.5em 1em 0;
			}

			/*--single--*/
			.single-top-in {
				width: 100%;
				margin-left: 0%;
				float: left;
			}
			.single-top {
				width: 100%;
			}
			.single-para h4 {
				font-size: 2em;
			}
			.available ul li select {
				margin-left: 14.5%;
			}
			.available ul li.size-in select {
				margin-left: 16.5%;
			}
			.left-account {
				margin-top: 2em;
			}
			a.cpns {
				padding: 7px;
				font-size: 0.7em;
			}
			.men {
				margin-bottom: 2em;
			}
		}
		@media(max-width:640px){
			.banner-text {
				padding: 7em 0 1em;
			}
			.grid-top p {
				font-size: 0.9em;
			}
			.pro-grid {
				padding: 5.5em 0 0;
			}
			.blog {
				padding: 2em 0;
			}
			.contact {
				padding: 2em 0;
			}
			.account {
				padding: 2em 0;
			}
			.register {
				padding: 2em 0;
			}
			.b-animate span {
				padding-top: 2.5em;
			}
			.banner {
				min-height: 400px;
			}
			ul.callbacks_tabs.callbacks1_tabs {
				left: 42%;
			}
			.b-from-left {
				min-height: 170px;
			}
			.top-in span {
				padding: 6.5em 0 0;
			}
			.b-from-top {
				min-height: 448px;
			}
			.top-in1 {
				min-height: 214px;
			}
			.top-in1 span {
				padding: 3em 0 0;
			}
			.top-in2 span {
				padding: 3em 0 0;
			}
			.top-in2 {
				min-height: 204px;
			}
		}
		@media(max-width:480px){
			.search {
				display: none;
			}
			.header-left {
				float: none;
				margin-top: 0px;
				text-align: center;
			}
			.banner-text h3 {
				font-size: 1.5em;
			}
			.banner-text p {
				font-size: 1em;
			}
			.banner {
				min-height: 294px;
			}
			.banner-text {
				padding: 3em 0 1em;
			}
			.grid-top {
				width: 100%;
				margin-bottom: 1em;
			}
			.grid-top p {
				font-size: 1.2em;
			}
			.content-top {
				padding: 2em 0;
			}
			.grid-in {
				padding: 0em 0 0;
			}
			.content-bottom ul li {
				border: none;
				width: 33%;
			}
			.product-price {
				width: 63%;
			}
			.banner-text {
				margin: 0 0 0 2em;
			}
			.pro-grid span {
				font-size: 0.9em;
			}
			.pro-grid {
				padding: 3.5em 0 0;
			}
			a.item_add p.number {
				font-size: 0.9em;
			}
			.b-from-left {
				min-height: 440px;
			}
			.b-animate span {
				padding-top: 6em;
			}
			.top-in span {
				padding: 4.5em 0 0;
			}
			.b-from-top {
				min-height: 321px;
			}
			.top-in1 span {
				padding: 2em 0 0;
			}
			.top-in1 {
				min-height: 154px;
			}
			.top-in2 span {
				padding: 1.5em 0 0;
			}
			.top-in2 {
				min-height: 144px;
			}
			/*--single--*/
			.cd-tabs-navigation a {
				font-size: 0.9em;
			}
			.top-comment-right {
				width: 81%;
			}
			.grid_3 {
				float: left;
				width: 100%;
			}
			.blog h1 {
				font-size: 2em;
				margin: 0 0 0.5em;
			}
			.single-bottom h3 {
				font-size: 2em;
			}
			.single-bottom input[type="submit"] {
				width: 18%;
			}
			.contact h1 {
				font-size: 2em;
			}
			.contact-form {
				padding: 1em 0;
			}
			.account h1 ,.register h1 {
				font-size: 2em;
				margin-bottom: 0.3em;
			}
			.register-top-grid h3, .register-bottom-grid h3 {
				font-size: 1.2em;
			}
		}
		@media(max-width:320px){
			.logo {
				width: 45%;
			}
			.logo img{
				width: 100%;
			}
		}
		@media(max-width:320px){
			.header-left ul li a {
				margin: 0 1em 0 0;
				font-size: 1em;
			}
			.box_1 h3 {
				font-size: 1em;
			}
			.header-top {
				padding: 10px 0;
			}
			.logo {
				width: 41%;
			}
			.h_menu4 {
				margin: 1px 0 0px;
			}
			.logo img{
				width:100%;
			}
			.head-top {
				padding: 0.6em 0;
			}
			.banner-text h3 {
				font-size: 0.9em;
				line-height:1.5em;
				letter-spacing: 3px;
				margin-bottom: 0.2em;
			}
			.banner-text p {
				font-size: 0.8em;
			}
			.banner-text a {
				font-size: 0.9em;
				padding: 0.3em 0.5em;
			}
			.banner {
				min-height: 158px;
			}
			.content-top h1 {
				font-size: 1.3em;
				margin-bottom: 0.8em;
			}
			.grid-mid {
				padding: 5px;
			}
			.twit h4 {
				font-size: 1em;
			}
			.amet-sed {
				margin-bottom: 1em;
				padding: 0;
			}
			.amet-sed h4 {
				font-size: 1.2em;
				margin: 0 0 0.3em;
			}
			ul.nav-bottom li a {
				font-size: 0.9em;
			}
			.amet-sed input[type="submit"] {
				width: 24%;
			}
			.content-bottom {
				padding: 1em 0;
			}
			.grid-middle {
				padding: 0.1em 0 0;
			}
			.content-top {
				padding: 1em 0 0;
			}
			.grid-top p {
				font-size: 1.1em;
			}
			.banner-text {
				padding: 1.5em 0 1em;
				margin: 0 0 0 1em;
			}
			ul.callbacks_tabs.callbacks1_tabs {
				left: 36%;
			}
			.banner {
				min-height: 203px;
			}
			ul.callbacks_tabs.callbacks1_tabs {
				bottom: 8%;
			}

			.box_1 p a {
				font-size: 0.9em;
			}
			.header-left ul {
				margin-top: 13px;
			}
			.content-top-bottom h2 {
				font-size: 1.5em;
				margin-bottom: 1em;
			}
			.men {
				margin-bottom: 1em;
			}
			.col-md2 {
				padding: 15px 0 0;
			}
			.product {
				padding: 2em 0;
			}
			.product-price {
				width: 100%;
				padding: 0;
			}
			.bottom-cd {
				padding: 0 3px;
			}
			p.tun {
				font-size: 0.8em;
			}
			a.item_add p.number {
				font-size: 0.8em;
				padding: 0.5em 0.5em;
			}
			.pro-grid span {
				font-size: 0.8em;
				padding: 0.4em 0.8em;
			}
			.pro-grid {
				padding: 2.5em 0 0;
			}
			.bottom-product {
				margin-bottom: 1em;
			}
			.pagination {
				margin: 10px 0 0;
			}
			.footer-top-at {
				padding: 2em 0px 2em;
			}
			.grid_3 {
				padding: 0;
			}
			.blog-poast-info ul li a,.blog-poast-info ul li span{
				font-size: 0.8em;
			}
			.grid_3 {
				margin-bottom: 1em;
			}
			.single-bottom h3 {
				font-size: 1.5em;
			}
			.single-bottom input[type="text"], .single-bottom textarea {
				padding: 0.6em;
			}
			.single-bottom textarea {
				min-height: 100px;
			}
			.single-bottom input[type="submit"] {
				width: 25%;
			}
			.single-bottom {
				padding: 0em 0 0em;
			}
			.contact-grid ,.contact-in{
				padding: 0;
			}
			.contact-grid input[type="text"], .contact-grid textarea {
				padding: 0.8em;
			}
			.send input[type="submit"] {
				width: 24%;
			}
			.account-top input[type="text"], .account-top textarea, .account-top input[type="password"]
			,.register-top-grid input[type="text"], .register-bottom-grid input[type="password"] {
				padding: 0.5em;
			}
			.account-top input[type="submit"] {
				width: 33%;
			}
			.register-top-grid h3, .register-bottom-grid h3 {
				font-size: 1.1em;
			}
			.product-price1,.single-top,.single-top-in {
				padding: 0;
			}
			.single-para h4 {
				font-size: 1.5em;
			}
			.available ul li select {
				margin-left: 6.5%;
			}
			.available ul li.size-in select {
				margin-left: 10.5%;
			}
			.cd-tabs.is-ended {
				margin: 1em 0 1em;
				padding: 0 0em;
			}
			.footer-class p {
				font-size: 1em;
			}
			.button a {
				font-size: 0.9em;
			}
			.cart-items,.cart-total {
				padding: 0;
			}
			.account-top input[type="submit"],.register-bottom-grid input[type="submit"] {
				font-size: 1em;
			}
			.account-top,.left-account,.register-top-grid,.register-bottom-grid {
				padding: 0;
			}
			.b-animate span {
				padding-top: 4.2em;
				font-size: 1.6em;
			}
			.b-from-left {
				min-height: 247px;
			}
			.top-in span {
				padding: 2.5em 0 0;
			}
			.b-from-top {
				min-height: 194px;
			}

			.top-in1 span {
				padding: 1.8em 0 0;
			}
			.top-in1 {
				min-height: 92px;
			}
			.top-in2 span {
				padding: 1.15em 0 0;
			}
			.top-in2 {
				min-height: 81px;
			}
		}

	</style>


	<script>
		$('.input_data').mask('00/00/0000');
		$('.input_cep').mask('00000-000');
		$('.input_tel').mask('(00) 00000-0000');
		$('.input_cpf').mask('000.000.000-00');
		$('.input_moeda').mask('000.000.000.000.000,00', {reverse: true});
		$('.input_numerico').mask('000000000000', {reverse: true});
	</script>
	<script src="<?= base_url("loja/carrinho/js/jquery.min.js")?>"></script>

	<script src="<?= base_url("loja/carrinho/js/simpleCart.min.js")?>"> </script>
	<script type="text/javascript" >
		var url_loja = "<?= base_url("") ?>"
	</script>
	<link type="text/css" rel="stylesheet" href="<?= base_url("loja/css/loading.css")?>"/>


	<div class="container ">
	<div class="check">
		<?php getMsg('carrinhoVazio'); ?>
		<?php getMsg('valorMinimo'); ?>

		<h1>Minha sacola de compras</h1>
		<div class="col-md-9 cart-items">
			<!--
			<script>
				$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
					});
				});
			</script>

			<script>
				$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
					});
				});
			</script>-->
			<?php $i = 1; foreach ($carrinho as $produto): ?>

				<div>
					<div></div>
					<div class="text-right">
						<a href="<?= base_url("carrinho") ?>" title="Apagar item" class="btn-apagar-produto-carrinho" data-rowid="<?= $produto['rowid']?>"><i class="fa fa-2x fa-minus-circle"></i></a>
					</div>
					<br>
					<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<a href="<?= base_url("produto/" . $produto['meta_link']) ?>"><img src="<?= base_url("loja/images/" . $produto['foto']) ?>" class="img-responsive" alt=""/></a>
						</div>
						<div class="cart-item-info">
							<h3><a href="<?= base_url("produto/" . $produto['meta_link']) ?>"><h3><strong class="nome-produto"><?= $produto['nome'] ?></strong>
									</h3></a><span>Código do produto: <?=$produto['codigo']?></span></h3>
							<ul class="qty">
								<li><p><?= ($produto['tamanho'] &&  $produto['tamanho'] != '0' ? 'Tamanho : ' . $produto['tamanho'] : '') ?> </p></li><br>
								<li><p><?= ($produto['tipo'] &&  $produto['tipo'] != '0' ? 'Tipo : ' . '<strong style="font-size: 15px">' .$produto['tipo'] .'</strong>' : '') ?> </p></li>

								<li>
									<!--
									<div data-app="product.quantity" id="quantidade">
										<span id="span_erro_carrinho" class="blocoAlerta" style="display:none;">Selecione uma opção para variação do produto</span>
										<label>Quantidade:</label>
										<input type="button" id="plus" value='   -   ' onclick="process(-1)" />
										<input id="quant_< ?=$produto['id']?>" name="quantidade_produto" class="text input-carrinho-quantidade" size="1" type="tel" value="< ?= $produto['qty'] ?>" maxlength="5" />
										<input type="button" id="minus" value='   +   ' onclick="process(1)">
										<br><a href="#" class="btn-qtd-produto-carrinho" data-id="< ?= $produto['id'] ?>"><i class="fa fa-undo"> Atualizar quantidade</i></a>

									</div>-->


									<div class="quantity">
										<button class="plus-btn btn-qtd-produto-carrinho" type="button" name="button" data-rowid="<?= $produto['rowid'] ?>"></button>
										<input name="quantidade_produto" class="input-qtd-carrinho input-tamanho input-carrinho-quantidade" type="tel" value="<?= $produto['qty'] ?>" id="quant_<?=$produto['rowid']?>" readonly/>
										<button class="minus-btn btn-qtd-produto-carrinho" type="button" name="button" data-rowid="<?= $produto['rowid'] ?>"></button>
										<!--<br><br><a href="#" class="btn-qtd-produto-carrinho" data-id="< ?= $produto['id'] ?>"><i class="fa fa-undo"> Atualizar quantidade</i></a>-->
									</div>
								</li>
							</ul>

							<div class="delivery">
								<p>Valor individual: <h3>  <?=formataMoedaReal($produto['valor'], true)?></h3></p>
								<div class="clearfix"></div>
							</div>
						</div>

						<div class="clearfix"></div>

					</div>
				<hr>
				<hr>
				</div>
			<?php $i++; endforeach; ?>


		</div>
		<div class="col-md-3 cart-total">
			<input type="hidden" value="<?=$dados_loja->possuiValorMinimo?>" name="possuiValorMinimo">
			<input type="hidden" value="<?=$dados_loja->valorMinimo?>" name="valorMinimo">
			<input type="hidden" value="<?=$total?>" name="totalCarrinho">
			<input type="hidden" value="<?=$totalPeso?>" name="totalPeso">
			<input type="hidden" value="<?=$dados_loja->pesoMaximoPedido?>" name="pesoMaximoPedido">
			<a class="order verificaValorMinimo" href="<?= base_url("checkout") ?>"><i class="fa fa-check"> Entrega Correios</i></a>
			<?php if($dados_loja->combinarEntrega == 1):?>
				<a class="order verificaValorMinimo" href="<?= base_url("checkoutCombinar") ?>"><i class="fa fa-check"> Combinar entrega</i></a>
			<?php endif; ?>

			<a class="continue" href="<?= base_url("todos") ?>"><i class="fa fa-reply-all"> Continuar comprando</i></a>
			<div class="col-md-6">
				<a class="btn btn-limpar-carrinho btn-default" href="<?= base_url("carrinho") ?>"><i class=""> Limpar carrinho</i></a>

			</div><br>
			<hr>

			<div class="clearfix"></div>
				<div class="col-md-auto">
					<strong>Simule o valor do frete (Calculado nas dimensões do maior produto)</strong>
				</div>
			<div class="clearfix"></div>

			<div class="col-md-6">
					<form class="form-inline">
						<div class="form-group">
							<input name="cep" type="tel" class="form-control input_cep" id="cep-calculo-carrinho" placeholder="Digite seu CEP">
						</div><br><br>
						<button type="button" class="btn btn-primary btn btn-calcular-frete-carrinho">
							<i class="fa fa-search"></i> Opções de frete
						</button>
					</form>
				</div>
				<div class="clearfix"></div><br>
				<div class="calculo-frete-retorno-carrinho hide"></div>
			<hr>
			<div class="clearfix"></div>
			<div class="price-details text-center">
				<h3 style="text-decoration: underline;">Detalhes do preço</h3><br>
				<span>Valor total dos produtos</span>
				<span class="total1"><?= formataMoedaReal($total, true) ?></span>
				<br><br><br>
				<div class="clearfix"></div>


				<!--<span>Desconto</span>
				<span class="total1">---</span>
				<br><br>
				<div class="clearfix"></div>-->

				<span>Taxas de entrega</span>
				<span class="total1 valor-frete-carrinho hide"></span>
				<div class="clearfix"></div>
			</div>
			<ul class="total_price">
				<li class="last_price"> <h4>TOTAL</h4></li>
				<li class="last_price"><span class="total-carrinho"></span></li>
				<div class="clearfix"> </div>
			</ul>


			<div class="clearfix"></div>
			<!--<div class="total-item">
				<h3>OPTIONS</h3>
				<h4>COUPONS</h4>
				<a class="cpns" href="#">Apply Coupons</a>
				<p><a href="#">Log In</a> to use accounts - linked coupons</p>
			</div>-->
		</div>

		<div class="clearfix"> </div>
	</div>
</div>




<script>
	const minusButtons = document.querySelectorAll('.minus-btn');
	const plusButtons = document.querySelectorAll('.plus-btn');
	const inputFields = document.querySelectorAll('.quantity input');

	for (let i = 0; i < minusButtons.length; i++) {
		minusButtons[i].addEventListener('click', function minusProduct() {
			if (inputFields[i].value) {
				inputFields[i].value--;
			}
		});
	}
	for (let i = 0; i < minusButtons.length; i++) {
		plusButtons[i].addEventListener('click', function plusProduct() {
			inputFields[i].value++;
		});
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('viewsStore/principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/carrinho.blade.php ENDPATH**/ ?>