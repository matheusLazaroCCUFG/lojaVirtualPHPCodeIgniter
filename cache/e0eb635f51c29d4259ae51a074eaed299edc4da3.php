<!DOCTYPE html>
<html>
<head>

	<title><?= $titulo_loja ?></title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--//tags -->
	<script src="<?=base_url("loja/js/jquery-2.2.4.js")?>"></script>

	<script type="text/javascript">
		var url_loja = "<?= base_url("") ?>";
		var totalCarrinho2 = "<?= $total ?>";
	</script>
	<script  src="<?= base_url("loja/js/appLoja.js") ?>"></script >
	<script  src="<?= base_url("loja/js/appCheckout.js") ?>"></script >
	<script>
		var numWPP = "<?=str_replace('-', '', str_replace(' ', '', $dados_loja->numWpp))?>";
	</script>

	<link rel="stylesheet" href="<?= base_url("loja/css/botaoWpp.css") ?>" type="text/css" media="screen" />
	<link rel="shortcut icon" href="<?=base_url("loja/images/iconeStore.png")?>">	

	<a style="color: white" target="_blank" href="https://api.whatsapp.com/send?phone=55<?=str_replace('-', '', str_replace(')', '', str_replace('(', '', str_replace(' ', '', $dados_loja->numWpp))))?>&text=&source=&data=&app_absent=" class="whatsapp-button"><i class="fa fa-whatsapp"></i></a>








	<script  src="<?= base_url("loja/js/menuFixo.js") ?>"></script >
	<script src="<?= base_url("loja/js/jquery.mask.js") ?>"></script>
	<link href="<?= base_url("loja/css/bootstrap.css") ?>" rel="stylesheet" type="text/css" media="all" />
	<style>
		.select-estilo-ordenacao-produtos select {
			background:  no-repeat rgb(0, 0, 0);  /* Imagem de fundo (Seta) */
			background-position: 205px center;  /*Posição da imagem do background*/
			width: 400px; /* Tamanho do select, maior que o tamanho da div "div-select" */
			height:48px; /* altura do select, importante para que tenha a mesma altura em todo os navegadores */
			font-family:Arial, Helvetica, sans-serif; /* Fonte do Select */
			font-size:18px; /* Tamanho da Fonte */
			padding:13px 20px 13px 12px; /* Configurações de padding para posicionar o texto no campo */
			color: <?=$dados_loja->corHex?>; /* Cor da Fonte */
			/* Remove seta padrão do FireFox */
			/* Remove seta padrão do FireFox */
			/* Remove seta padrão do IE*/

		}

		.pagination > li > a:hover,
		.pagination > li > span:hover,
		.pagination > li > a:focus,
		.pagination > li > span:focus {
			color: <?=$dados_loja->corHex?>;
			background-color: #eee;
			border-color: #ddd;
		}

		.pagination > .active > a,
		.pagination > .active > span,
		.pagination > .active > a:hover,
		.pagination > .active > span:hover,
		.pagination > .active > a:focus,
		.pagination > .active > span:focus {
			z-index: 2;
			color: #fff;
			cursor: default;
			background-color: <?=$dados_loja->corHex?>;
			border-color: #000000;
		}
	</style>

	<script type="text/javascript" src="<?= base_url("loja/js/bootstrap.js") ?>"></script>
	<link rel="stylesheet" href="<?= base_url("loja/css/flexslider.css") ?>" type="text/css" media="screen" />



	<link href="<?= base_url("loja/css/font-awesome.css") ?>" rel="stylesheet">



	<script type="text/javascript" src="<?= base_url("loja/js/easy-responsive-tabs.js") ?>"></script>


	<link href="<?= base_url("loja/css/easy-responsive-tabs.css") ?>" rel='stylesheet' type='text/css'/>

	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>


	<!--Upload de fotos-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/jquery.uploadfile/css/uploadfile.css') ?>">
	<!--upload fotos-->
	<script src="<?= base_url('loja/jquery.uploadfile/js/jquery.uploadfile.min.js') ?>"></script>


	<link rel="stylesheet" type="text/css" href="<?= base_url("loja/css/jquery-ui.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("loja/css/menufixo.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("loja/css/move-top.css") ?>">
	<!--<link rel="stylesheet" type="text/css" href="< ?= base_url("loja/css/menufixo.css") ?>">-->

	<!--SINGLE.HTML---------------------------------------------------------------->
	<!-- //cart-js -->
	<!-- single -->
	<script src="<?= base_url("loja/js/imagezoom.js") ?>"></script>
	<!-- single -->
	<!-- script for responsive tabs -->

	<!-- FlexSlider -->
	<script src="<?= base_url("loja/js/jquery.flexslider.js") ?>"></script>
	<script>
		$('.input-numerico').mask("0000000000000000000000000000000000000000000000000000000000000000000000000000000000000");
		$('.input-cnpj').mask("00.000.000/0000-00");
		$('.input-moeda').mask("#.##0,00", {reverse: true});
		$('.input-peso').mask("###0,00", {reverse: true});


	</script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
	<!-- //script for responsive tabs -->
	<!-- start-smoth-scrolling -->
	<script src="<?= base_url('loja/js/graficoDashboard.js') ?>"></script>
	<script src="<?= base_url("loja/js/main.js") ?>"></script>

	<script src="<?= base_url("loja/js/fotosBannersHome.js") ?>"></script>

	<script type="text/javascript" src="<?= base_url("loja/js/move-top.js") ?>"></script>
	<script type="text/javascript" src="<?= base_url("loja/js/jquery.easing.min.js") ?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>


	<script type='text/javascript'>//<![CDATA[
		$(window).load(function(){
			$( "#slider-range" ).slider({
				range: true,
				min: 0,
				max: 9000,
				values: [ 1000, 7000 ],
				slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				}
			});
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

		});//]]>

	</script>


	<script src="<?= base_url("loja/js/responsiveslides.min.js") ?>"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>

	<script>
		jQuery("document").ready(function($){

			var nav = $('.nav-container');

			$(window).scroll(function () {
				if ($(this).scrollTop() > 136) {
					nav.addClass("f-nav");
				} else {
					nav.removeClass("f-nav");
				}
			});

		});
	</script>

<!---------------------CARRINHO DE COMPRAS-------------------------------------------------------->
	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/loadingPagina.css') ?>">
	<script src="<?= base_url("loja/js/loadingPagina.js") ?>"></script>


	<style>
		/*--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--*/
		@font-face {
			font-family: 'FontAwesome';
			src: url('../fonts/fontawesome-webfont.eot?v=4.7.0');
			src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('../fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
			font-weight: normal;
			font-style: normal;
		}

		.cor{
			color: <?=$dados_loja->corHex?>;
		}




		html, body{
			margin:0;
			font-size: 100%;
			background: #fff;
			font-family: 'Open Sans', sans-serif;
		}
		body a {
			text-decoration:none;
			transition:0.5s all;
			-webkit-transition:0.5s all;
			-moz-transition:0.5s all;
			-o-transition:0.5s all;
			-ms-transition:0.5s all;
		}
		a:hover{
			text-decoration:none;
		}
		input[type="button"],input[type="submit"]{
			transition:0.5s all;
			-webkit-transition:0.5s all;
			-moz-transition:0.5s all;
			-o-transition:0.5s all;
			-ms-transition:0.5s all;
		}

		h1,h2,h3,h4,h5,h6{
			margin:0;
			font-family: 'Open Sans', sans-serif;
		}
		p{
			margin:0;
			letter-spacing:1px;
			font-size: 0.9em;
		}
		ul{
			margin:0;
			padding:0;
		}
		label{
			margin:0;
		}
		/*-- header --*/
		.header {
			background: #000000;
		}
		.header ul li {
			display: inline-block;
			width: 24.5%;
			text-align: center;
			color: #fff;
			font-size: 13px;
			padding: 7px 0;
			letter-spacing: 1px;
			border-right: 1px solid #464444;
		}
		.header ul li a {
			color: #fff;
			text-decoration: none;
		}
		.header ul li i {
			margin-right: 12px;
			top: 2px;
			color: <?=$dados_loja->corHex?>;
		}
		.header-right {
			text-align: right;
		}
		.header-left{
			text-align: left;
		}
		.header-bot_inner_wthreeinfo_header_mid {
			margin: 0 auto;
			width: 90%;
		}
		/*-- //header --*/
		.social-nav {
			padding: 0;
			list-style: none;
			display: inline-block;
			margin: 1em 0 0;
			float: right;
		}
		.social-nav li {
			display: inline-block;
			margin: 0 6px;
		}
		.social-nav a {
			display: inline-block;
			float: none;
			width: 30px;
			height: 30px;
			text-decoration: none;
			cursor: pointer;
			text-align: center;
			line-height: 30px;
			background: #000;
			position: relative;
			-webkit-transition: 0.5s;
			-moz-transition: 0.5s;
			-o-transition: 0.5s;
			transition: 0.5s;
		}
		.model-3d-0 a {
			background:#5C5B5B;
			-webkit-transform-style: preserve-3d;
			-moz-transform-style: preserve-3d;
			-ms-transform-style: preserve-3d;
			-o-transform-style: preserve-3d;
			transform-style: preserve-3d;
		}
		.model-3d-0 .front, .model-3d-0 .back {
			width: 30px;
			height: 30px;
			position: absolute;
			top: 0;
			left: 0;
			-webkit-transform: translateZ(18px);
			-moz-transform: translateZ(18px);
			-ms-transform: translateZ(18px);
			-o-transform: translateZ(18px);
			transform: translateZ(18px);
			-webkit-backface-visibility: visible;
			-moz-backface-visibility: visible;
			-ms-backface-visibility: visible;
			-o-backface-visibility: visible;
			backface-visibility: visible;
			color:#212121;
			font-size:12px;
		}
		.model-3d-0 .back {
			-webkit-transform: rotateX(90deg) translateZ(18px);
			-moz-transform: rotateX(90deg) translateZ(18px);
			-ms-transform: rotateX(90deg) translateZ(18px);
			-o-transform: rotateX(90deg) translateZ(18px);
			transform: rotateX(90deg) translateZ(18px);
			-webkit-backface-visibility: hidden;
			-moz-backface-visibility: hidden;
			-ms-backface-visibility: hidden;
			-o-backface-visibility: hidden;
			backface-visibility: hidden;
		}
		a.twitter .front {
			background: #00acee;
		}
		a.facebook .front {
			background: #3b5998;
		}
		a.whatsapp .front {
			background: #25d366;
		}
		a.instagram .front {
			background-image: linear-gradient(to bottom left, #9200b4, #ed0067, #ffff00);
		}
		a.pinterest .front {
			background: #bd081c;
		}
		.twitter .back,.facebook .back, .whatsapp .back,.instagram .back,.pinterest .back{
			background:#fff;
		}
		.model-3d-0 a:hover {
			-webkit-transform: rotateX(-90deg);
			-moz-transform: rotateX(-90deg);
			-ms-transform: rotateX(-90deg);
			-o-transform: rotateX(-90deg);
			transform: rotateX(-90deg);
		}
		.model-3d-0 a:hover .back {
			-webkit-backface-visibility: visible;
			-moz-backface-visibility: visible;
			-ms-backface-visibility: visible;
			-o-backface-visibility: visible;
			backface-visibility: visible;
		}
		.w3_agile_social .front i{
			color: #fff;
			font-size: 12px;
		}
		.w3_agile_social .back i{
			color: #000;
			font-size: 12px;
		}
		.w3ls_team_grid img {
			background: #e4e3e3;
			padding: 7px;
		}
		/*--social icons--*/
		/* Brand Colours */
		.facebook{
			background: #3b5998;
		}
		.whatsapp{
			background: #25d366;
		}
		.twitter{
			background: #00acee;
		}
		.google-plus{
			background:#dd4b39;
		}
		.rss{
			background:#f26522;
		}
		.social-icon-w3-agile {
			width: 25%;
			float: left;
			text-align: center;
			padding:1.5em 0;
		}
		.social-icon-w3-agile i {
			color: #fff;
			font-size:28px;
		}
		.social-agileinfo a:hover {
			opacity: 0.8;
		}
		li.share {
			vertical-align: super;
			font-size: 1em;
			font-weight: 600;
			letter-spacing: 2px;
		}
		/*--social-icons--*/
		.logo_agile {
			text-align: center;
		}
		.logo_agile span {
			background: <?=$dados_loja->corHex?>;
			padding: 0 17px;
			font-weight: bold;
			color: #000000;
		}
		.logo_agile h1 a {
			font-weight: 300;
			color: #000;
			letter-spacing: 1px;
			font-size: 1.5em;
			position:relative;
		}
		.logo_agile h1 a:hover {
			text-decoration:none;
		}
		i.fa.fa-shopping-bag.top_logo_agile_bag {
			position: absolute;
			font-size: 17px;
			top: 66px;
			right: 14px;
			color: <?=$dados_loja->corHex?>;
		}

		/*-- header-bot --*/
		.header-left img {
			width: 73%;
		}
		.header-bot {
			padding: 25px 0;
			background-color: #100f0f;
		}
		.header-middle form input[type="search"] {
			outline: none;
			border: none;
			width: 87%;
			padding: 12px 10px;
			color: #848484;
			font-size: 16px;
			border: 1px solid #ddd;
			letter-spacing:1px;
		}
		.header-middle form input[type="submit"]{
			background: url(../images/search.png) no-repeat 4px 0px <?=$dados_loja->corHex?>;
			width: 11%;
			height: 50px;
			border: none;
			padding: 0;
			border: none;
			outline: none;
		}
		.search {
			float: left;
			width: 57%;
		}
		.section_room{
			float: left;
			width: 33%;
		}
		.sear-sub{
			float: right;
			width: 10%;
		}
		.header-middle {
			padding:0;
		}
		.header-right ul {
			margin-top: 20px;
		}
		.section_room select option {
			line-height: 1.8em;
		}
		/* Icons */
		.footer-bottom a {

		}

		/* pop-up text */
		.footer-bottom a span {
			color: #fff;
			position: absolute;
			bottom: 0;
			width: 19%;
			left: 59px;
			text-align: center;
			right: -25px;
			padding: 2px 0px;
			font-size: 1em;
			border-radius: 2px;
			background: <?=$dados_loja->corHex?>;
			visibility: hidden;
			opacity: 0;
			-o-transition: all .5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
			-webkit-transition: all .5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
			-moz-transition: all .5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
			transition: all .5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
		}

		/* pop-up text arrow */

		.footer-bottom a span:before {
			content: '';
			width: 0;
			height: 0;
			border-left: 5px solid transparent;
			border-right: 5px solid transparent;
			border-top: 5px solid <?=$dados_loja->corHex?>;
			position: absolute;
			bottom: -4px;
			left: 21px;
		}
		.footer-bottom a:hover span {
			bottom: 41px;
			visibility: visible;
			opacity: 1;
		}

		/*-- //header-bot --*/
		/*-- banner-top --*/

		.sticky{
			position: sticky;
			top: 0px;
			padding: 5px;
			z-index: 1;
		}




		.ban-top{
			background: #000000;
			padding: 0px 0;

		}




		.dropdown-menu.columns-3 {
			min-width: 700px;
			padding: 30px 30px;
		}
		.multi-gd-img img{
			width:100%;
		}
		/*-- nav-bar --*/
		.navbar-default {
			background: none;
			border: none;
			min-height: inherit;
			margin: 0;
			float: left;
		}
		.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
			background: none;
		}
		.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
			color: #555;
			background: none;
		}
		.navbar-nav > li {
			margin: 0 15px 0 0;
		}
		.navbar-nav > li > a {
			padding: 26px 16px;
		}
		.navbar-collapse {
			padding-right: 0;
			padding-left: 0;
		}
		.navbar-nav > li > a {
			line-height: inherit;
		}

		/*-- //nav-bar --*/
		/* Common styles for all menus */

		.menu__list {
			position: relative;
			display: -webkit-flex;
			display: flex;
			-webkit-flex-wrap: wrap;
			flex-wrap: wrap;
			margin: 0;
			padding: 0;
			list-style: none;
		}

		.menu__item {
			display: block;
			margin: 0em 0;
		}

		.menu__link {
			font-size: 1.05em;
			font-weight: bold;
			display: block;
			padding: 1em;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			-webkit-touch-callout: none;
			-khtml-user-select: none;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
		}

		.menu__link:hover,
		.menu__link:focus {
			outline: none;
		}

		/* Individual styles */
		.menu--shylock .menu__link {
			position: relative;
			margin: 0;
			color: #b5b5b5;
			-webkit-transition: color 0.4s;
			transition: color 0.4s;
		}

		.menu--shylock .menu__item--current .menu__link,
		.menu--shylock .menu__item--current .menu__link:hover,
		.menu--shylock .menu__item--current .menu__link:focus {
			color: #d94f5c;
		}

		.menu--shylock .menu__item--current .menu__link::after,
		.menu--shylock .menu__item--current .menu__link::before {
			-webkit-transform: scale3d(1, 1, 1);
			transform: scale3d(1, 1, 1);
		}

		.menu--shylock .menu__item--current .menu__link::before {
			-webkit-transition-delay: 0s;
			transition-delay: 0s;
		}

		.menu--shylock .menu__link:hover,
		.menu--shylock .menu__link:focus {
			color: #b5b5b5;
		}

		.menu--shylock .menu__link:hover::before,
		.menu--shylock .menu__link:focus::before {
			-webkit-transform: scale3d(1, 1, 1);
			transform: scale3d(1, 1, 1);
			-webkit-transition-delay: 0s;
			transition-delay: 0s;
		}

		.menu--shylock .menu__link::before,
		.menu--shylock .menu__link::after {
			content: '';
			position: absolute;
			bottom: 0px;
			left: 0;
			width: 100%;
			height: 5px;
			-webkit-transform: scale3d(0, 1, 1);
			transform: scale3d(0, 1, 1);
			-webkit-transform-origin: center left;
			transform-origin: center left;
			-webkit-transition: transform 0.4s cubic-bezier(0.22, 0.61, 0.36, 1);
			transition: transform 0.4s cubic-bezier(0.22, 0.61, 0.36, 1);
		}

		.menu--shylock .menu__link::before {
			background: <?=$dados_loja->corHex?>;
			-webkit-transition-delay: 0.4s;
			transition-delay: 0.4s;
		}

		.menu--shylock .menu__link::after {
			background: <?=$dados_loja->corHex?>;
		}
		a.menu__link {
			color: #fff !important;
			font-size: 15px;
			font-weight: normal;
			letter-spacing: 2px;
		}
		.agile_short_dropdown {
			border-radius: 0;
			background: #ffffff;
			text-align: center;
			padding:0;
			border: none;
		}
		.agile_short_dropdown li a{
			text-transform:uppercase;
			color:#212121;
			font-size:13px;
			font-weight:600;
			padding: .8em 0;
			border-bottom: 1px solid #ececef;
		}
		.agile_short_dropdown > li > a:hover{
			color: #fff;
			text-decoration: none;
			background-color: <?=$dados_loja->corHex?>;
		}
		/*-- //left nav --*/
		.top_nav_right {
			float: right;
			width: 21%;
		}
		.box_1 {
			background: <?=$dados_loja->corHex?>;
			padding: 15px 22px;
			text-align: center;
		}
		.box_1 h3 {
			color: #fff;
			font-size: 1em;
			margin: 0;
			text-decoration:none;
			margin: 0 0 7px 0;
		}
		.total i {
			top: 2px;
			left: -5px;
		}

		.box_1 p {
			margin: 0;
			color: #999;
			font-size: 14px;
		}
		a.simpleCart_empty {
			color: #fff;
			font-size: 13px;
			text-decoration: none;
			text-align: center;
			display: block;
		}
		.header-right ul li a:hover {
			transform: rotateY(360deg);
		}
		/*-- //banner-top --*/
		.carousel-caption {
			position: inherit;
			min-height:500px!important;
			padding-top:10em;
		}
		/*-- banner --*/
		/*.carousel .item{
	background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner1.jpg) no-repeat;
	background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner1.jpg) no-repeat;
	background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner1.jpg) no-repeat;
	background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner1.jpg) no-repeat;
	background-size:cover;
}
.carousel .item.item2{
	background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner2.jpg) no-repeat;
	background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner2.jpg) no-repeat;
	background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner2.jpg) no-repeat;
	background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner2.jpg) no-repeat;
	background-size:cover;
}
.carousel .item.item3{
	background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner3.jpg) no-repeat;
	background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner3.jpg) no-repeat;
	background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner3.jpg) no-repeat;
	background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner3.jpg) no-repeat;
	background-size:cover;
}
.carousel .item.item4{
	background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner4.jpg) no-repeat;
	background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner4.jpg) no-repeat;
	background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner4.jpg) no-repeat;
	background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner4.jpg) no-repeat;
	background-size:cover;
}
.carousel .item.item5{
	background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner5.jpg) no-repeat;
	background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner5.jpg) no-repeat;
	background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner5.jpg) no-repeat;
	background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(../images/banner5.jpg) no-repeat;
	background-size:cover;
}

.carousel-caption h2, .carousel-caption h3 {
    font-size: 3em;
    font-weight: 300;
    letter-spacing: 14px;
    text-transform: uppercase;
}
.carousel-caption h2 span, .carousel-caption h3 span{
    font-weight: 800;
    color: #7f97ca;
}
.carousel-caption p {
    letter-spacing: 12px;
    font-size: 1.2em;
    font-weight: 600;
    color: #ffb900;
    margin-top: 1em;
}
.carousel-caption a {
    color: #fff;
    letter-spacing: 3px;
    padding: 8px 20px;
    margin-top: 2em;
}
.codes{
	padding:5em 0;
	background:#fff;
}
.codes.agileitsbg2 {
    background: #E74C3C;
	background-image:-webkit-linear-gradient(#ff9d2f, #ff6126);
	background-image:-moz-linear-gradient(#ff9d2f, #ff6126);
	background-image:-ms-linear-gradient(#ff9d2f, #ff6126);
	background-image: linear-gradient(#ff9d2f, #ff6126);
    padding-bottom: 10em;
}
.codes.agileitsbg3 {
    background: #3498DB;
    padding-bottom: 10em;
}
.codes.agileitsbg4 {
    background: #2ECC71 ;
    padding-bottom: 10em;
}
.carousel.slide.grid_3.grid_4 {
    border-top: 10px solid #3ACFD5;
    border-bottom: 10px solid #3a4ed5;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    background-position: 0 0, 100% 0;
    background-repeat: no-repeat;
    -webkit-background-size: 10px 100%;
    -moz-background-size: 10px 100%;
    background-size: 10px 100%;
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgeG1sbnM9Imh0dÃ¢â‚¬Â¦0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2xlc3NoYXQtZ2VuZXJhdGVkKSIgLz48L3N2Zz4=),url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgeG1sbnM9Imh0dÃ¢â‚¬Â¦0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2xlc3NoYXQtZ2VuZXJhdGVkKSIgLz48L3N2Zz4=);
    background-image: -webkit-linear-gradient(top, #3acfd5 0%, #3a4ed5 100%), -webkit-linear-gradient(top, #3acfd5 0%, #3a4ed5 100%);
    background-image: -moz-linear-gradient(top, #3acfd5 0%, #3a4ed5 100%), -moz-linear-gradient(top, #3acfd5 0%, #3a4ed5 100%);
    background-image: -o-linear-gradient(top, #3acfd5 0%, #3a4ed5 100%), -o-linear-gradient(top, #3acfd5 0%, #3a4ed5 100%);
    background-image: linear-gradient(to bottom, #3acfd5 0%, #3a4ed5 100%), linear-gradient(to bottom, #3acfd5 0%, #3a4ed5 100%);
}
.carousel-indicators {
    bottom: 8%;
}*/
		/*-- banner --*/
		/*-- //banner-bottom --*/
		/* Common style */
		.grid figure {
			position: relative;
			overflow: hidden;
			background:#000000;
			text-align: center;
		}

		.grid figure img {
			position: relative;
			display: block;
			opacity: 0.8;
		}

		.grid figure figcaption {
			padding: 2em;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
		}

		.grid figure figcaption::before,
		.grid figure figcaption::after {
			pointer-events: none;
		}

		.grid figure figcaption{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		.grid figure h3 {
			word-spacing: -0.15em;
			font-weight: 300;
		}

		.grid figure h3 span {
			font-weight: 800;
			color: #e71f30;
		}

		.grid figure p {
			letter-spacing: 12px;
			color: #fff;
			line-height: 2em;
			font-size: 1.1em;
		}

		figure.effect-roxy img {
			max-width: none;
			width: -webkit-calc(100% + 60px);
			width: calc(100% + 60px);
			width: -moz-calc(100% + 60px);
			width: -o-calc(100% + 60px);
			width: -ms-calc(100% + 60px);
			-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
			transition: opacity 0.35s, transform 0.35s;
			-webkit-transform: translate3d(-50px,0,0);
			transform: translate3d(-50px,0,0);
			-moz-transform: translate3d(-50px,0,0);
			-o-transform: translate3d(-50px,0,0);
			-ms-transform: translate3d(-50px,0,0);
		}

		figure.effect-roxy figcaption::before {
			position: absolute;
			top: 30px;
			right: 30px;
			bottom: 30px;
			left: 30px;
			border: 4px solid #fff;
			content: '';
			opacity: 0;
			-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
			transition: opacity 0.35s, transform 0.35s;
			-webkit-transform: translate3d(-20px,0,0);
			transform: translate3d(-20px,0,0);
			-ms-transform: translate3d(-20px,0,0);
			-moz-transform: translate3d(-20px,0,0);
			-o-transform: translate3d(-20px,0,0);
		}

		figure.effect-roxy figcaption {
			padding: 3em;
			text-align: right;
			border: 13px solid rgba(255, 255, 255, 0.15);
		}

		figure.effect-roxy h3 {
			padding: 1.5em 0 .5em;
			font-size: 1.7em;
			color: #fff;
			text-transform: uppercase;
			letter-spacing: 5px;
		}
		figure.effect-roxy p {
			opacity: 0;
			-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
			transition: opacity 0.35s, transform 0.35s;
			-webkit-transform: translate3d(-10px,0,0);
			transform: translate3d(-10px,0,0);
		}

		figure.effect-roxy:hover img,.agileinfo_banner_bottom_grid_three_left:hover img{
			opacity: 0.7;
			-webkit-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
		}

		figure.effect-roxy:hover figcaption::before,
		figure.effect-roxy:hover p,.agileinfo_banner_bottom_grid_three_left:hover figcaption::before,
		.agileinfo_banner_bottom_grid_three_left:hover p{
			opacity: 1;
			-webkit-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
		}

		.wthree_banner_bottom_grid_three_left1 {
			width: 49.5%;
			float: left;
		}
		.banner_bottom_agile_info {
			padding: 5em 0;
		}
		.banner_bottom_agile_info.team {
			background: #f5f5f5;
		}
		/*-- //banner-bottom --*/
		/*-- footer --*/
		.footer{
			padding: 4em 0;
			background: #100f0f;
		}
		.footer_agile_inner_info_w3l {
			width: 90%;
			margin: 0 auto;
		}
		ul.social-nav.model-3d-0.footer-social.w3_agile_social.two {
			float: none;
		}
		.footer-left p{
			color: #737070;
			line-height: 2em;
			font-size: 14px;
			margin-top: 22px;
		}
		.newsright input[type="email"] {
			outline: none;
			width: 100%;
			padding: 10px 14px;
			color: #848484;
			font-size: 14px;
			border: 1px solid #3a3939;
			width: 74%;
			letter-spacing: 3px;
			background: #1f1f1f;
		}
		.newsright input[type="submit"]{
			border: none;
			padding: 10px 20px 11px;
			font-size: 15px;
			outline: none;
			text-transform: uppercase;
			margin: 0 0 0 -4px;
			font-weight: 700;
			letter-spacing: 1px;
			background: <?=$dados_loja->corHex?>;
			color:#fff;
		}
		.newsright input[type="submit"]:hover{
			background: #fff;
			color: #000;
		}
		.newsleft h3 {
			font-size: 24px;
			margin-top: 15px;
			color: #fff;
			letter-spacing: 3px;
			font-weight: 700;
		}
		.sign-gd h4,.sign-gd-two h4 {
			color: #fff;
			font-size: 1.2em;
			margin-bottom: 25px;
			text-transform: uppercase;
			font-weight: 700;
			letter-spacing: 2px;
		}
		.sign-gd h4 span,.sign-gd-two h4 span{
			font-weight:300;
		}
		.sign-gd ul li,.sign-gd-two ul li {
			color: #848484;
			line-height: 2em;
			font-size: 14px;
			list-style-type:none;
		}
		.sign-gd ul li a,.sign-gd-two ul li a{
			color: #737070;
			letter-spacing: 1px;
		}
		.sign-gd ul li a:hover,.sign-gd-two ul li a:hover{
			color: <?=$dados_loja->corHex?>;
		}
		.w3ls-post-grid:nth-child(2){
			margin:1em 0;
		}
		.w3-address-grid{
			background: #080808;
			padding: 1em;
		}
		.w3-address-left{
			float:left;
			width:10%;
		}
		.w3-address-left i.fa.fa-phone,.w3-address-left i.fa.fa-envelope,.w3-address-left i.fa.fa-map-marker{
			color: #FFFFFF;
			font-size: 1em;
		}
		.plus-btn::before {
			content: "+";
			text-align: center;
			color: #ffffff;
			font-size: 25px;

		}
		.plus-btn {
			width: 40px;
			background-color: #000000;
		}

		.input-qtd-carrinho{
			width: 35px;
			height: 25px;
		}

		.minus-btn::before {
			content: "-";
			text-align: center;
			color: #ffffff;
			font-size: 25px;
		}
		.minus-btn {
			width: 40px;

			background-color: #000000;
		}
		.nome-produto{
			color: <?=$dados_loja->corHex?>;
		}
		.valor-produto{
			color: #000000;
		}
		.input-tamanho{
			font-size: 25px;
			text-align: center;
			height: 40px;
			width: 55px;
		}
		.carrinho1 {
			color: #FFFFFF;
			font-size: 1em;
			margin: 0;
			font-weight: 600;
			letter-spacing: 1px;
		}
		.carrinho2 {
			color: #000000;
			font-size: 1em;
			margin: 0;
			font-weight: 600;
			letter-spacing: 1px;
		}
		.carrinho h4{
			color: #120A8F;
		}
		.w3-address-right{
			float: right;
			width: 87%;
		}
		.w3-address-right h6{
			color: #FFFFFF;
			font-size: 0.9em;
			margin: 0;
			font-weight: 600;
			letter-spacing: 1px;
		}
		.w3-address-right p{
			margin: 1em 0 0 0;
			font-size: .9em;
			color: #565656;
		}
		.w3-address-right p a{
			color: <?=$dados_loja->corHex?>;
			text-decoration: none;
		}
		.w3-address-right p a:hover{
			color:#b5b5b5;
		}
		.w3-address-right p span{
			display:block;
			margin:.5em 0;
		}
		.w3-address-grid:nth-child(2){
			margin: 0.2em 0;
		}
		.flickr-post ul li{
			display:inline-block;
			margin:5px 5px;
		}
		.flickr-post ul li {
			display: inline-block;
			margin: 1% 1%;
			width: 28%;
		}
		p.copy-right {
			color: #848484;
			text-align: center;
			margin-top: 62px;
			font-size: 14px;
		}
		p.copy-right a{
			color: #ffffff;
			text-decoration:none;
		}
		p.copy-right a:hover{
			color: <?=$dados_loja->corHex?>;
		}
		.footer-left h2 a {
			font-size: 0.9em;
			color: #fff;
			font-weight: 300;
			letter-spacing: 2px;
		}
		.footer-left h2 a span {
			padding: 0 10px;
			background: <?=$dados_loja->corHex?>;
			font-weight: 600;
		}
		/*-- //footer --*/
		.multi-gd-img.multi-gd-text h4 {
			position: absolute;
			top: 50%;
			left: 30%;
			font-size: 2em;
			color: #fff;
			font-weight: 300;
			letter-spacing: 10px;
		}
		.multi-gd-img.multi-gd-text h4  span{
			font-weight:700;
			color:<?=$dados_loja->corHex?>;
		}
		.multi-gd-img.multi-gd-text {
			padding: 0;
		}
		.styled-input.agile-styled-input-top {
			margin-top: 0;
		}
		.address-grid {
			padding: 1em 0em 0 0em;
		}
		.contact-form {
			background: #181919;
			padding: 5em 3em;
		}
		.contact input[type="text"], .contact input[type="email"], .contact textarea {
			font-size: 15px;
			letter-spacing: 1px;
			color: #fff;
			padding: 0.5em 1em;
			border: 0;
			width: 100%;
			border-bottom: 1px solid #dcdcdc;
			background: none;
			-webkit-appearance: none;
			outline: none;
		}
		.contact textarea {
			min-height: 8em;
			resize: none;
		}
		/*-- input-effect --*/
		.styled-input input:focus ~ label, .styled-input input:valid ~ label,.styled-input textarea:focus ~ label ,.styled-input textarea:valid ~ label{
			font-size: .9em;
			color: <?=$dados_loja->corHex?>;
			top: -1.3em;
			-webkit-transition: all 0.125s;
			-moz-transition: all 0.125s;
			-o-transition: all 0.125s;
			-ms-transition: all 0.125s;
			transition: all 0.125s;
		}
		.styled-input {
			width:100%;
			margin: 2em 0 1em;
			position: relative;
		}
		.styled-input label {
			color: #555;
			padding: 0.5em 0em;
			position: absolute;
			top: 0;
			left: 0;
			-webkit-transition: all 0.3s;
			-moz-transition: all 0.3s;
			transition: all 0.3s;
			pointer-events: none;
			font-weight: 400;
			font-size: 14px;
			letter-spacing:1px;
			display: block;
			line-height: 1em;
		}
		.styled-input input ~ span, .styled-input textarea ~ span {
			display: block;
			width: 0;
			height: 2px;
			background: rgb(39, 39, 39);
			position: absolute;
			bottom: 0;
			left: 0;
			-webkit-transition: all 0.125s;
			-moz-transition: all 0.125s;
			transition: all 0.125s;
		}
		.styled-input textarea ~ span {
			bottom: 5px;
		}
		.styled-input input:focus.styled-input textarea:focus {
			outline: 0;
		}
		.styled-input input:focus ~ span,.styled-input textarea:focus ~ span {
			width: 100%;
			-webkit-transition: all 0.075s;
			-moz-transition: all 0.075s;
			transition: all 0.075s;
		}
		.white-w3ls{
			color:#fff!important;
		}
		.modal-body-sub {
			padding:2em !important;
		}
		.modal-title {
			font-size: 1.1em;
			color: #212121;
			text-transform: uppercase;
			font-weight: 700;
			padding-left: 1em;
			letter-spacing: 2px;
		}
		.modal-body.modal-body-sub_agile input[type="text"],.modal-body.modal-body-sub_agile input[type="email"],.modal-body.modal-body-sub_agile input[type="password"] {
			font-size: 14px;
			letter-spacing: 1px;
			color: #777;
			padding: 0.5em 1em 0.5em 0;
			border: 0;
			width: 100%;
			border-bottom: 1px solid #dcdcdc;
			background: none;
			-webkit-appearance: none;
			outline: none;
		}
		h3.agileinfo_sign {
			font-size: 1.2em;
			font-weight: 700;
			text-transform: uppercase;
			letter-spacing: 1px;
			margin-bottom: 2em;
		}
		.modal_body_right.modal_body_right1 {
			padding: 0;
		}
		h3.agileinfo_sign span {
			font-weight:300;
		}

		.modal-body.modal-body-sub_agile ::-webkit-input-placeholder{
			color:#212121 !important;
		}
		.modal-body.modal-body-sub_agile input[type="submit"]{
			border: none;
			padding: 10px 40px 10px;
			font-size: 14px;
			outline: none;
			text-transform: uppercase;
			margin: 0 0 0 -4px;
			font-weight: 700;
			letter-spacing: 1px;
			background:#111;
			color: #fff;
		}
		.modal-body.modal-body-sub_agile input[type="submit"]:hover{
			background: <?=$dados_loja->corHex?>;
		}
		.modal_body_right.modal_body_right1 img {
			width: 100%;
		}
		ul.social-nav.model-3d-0.footer-social.w3_agile_social.top_agile_third {
			float: left;
		}
		.modal-body.modal-body-sub_agile p a {
			font-size: 0.875em;
			color: #212121;
			letter-spacing: 1px;
		}
		.modal-body.modal-body-sub_agile p {
			font-size: 0.85em;
			font-weight: 600;
			line-height: 2em;
			color: #000;
		}
		ul.social-nav.model-3d-0.footer-social.w3_agile_social.top_agile_third {
			margin: 2em 0 0.5em 0;
		}
		.modal_body_left.modal_body_left1 {
			padding-left:0;
		}
		.modal-body.modal-body-sub_agile {
			padding: 0 1em 2em 2em;
			margin-top: 1em;
		}
		.modal-content.top_w3lform_agile {
			padding: 2em 0;
			border-radius: 0;
		}
		button.close.top_wthree_agile {
			margin: -34px 0 0 0;
			color: #000;
		}
		.bb-middle-agileits-w3layouts.forth.grid {
			margin-top: 0.95em;
		}

		/*-- schedule-bottom --*/
		.schedule-bottom {
			background: <?=$dados_loja->corHex?>;
		}
		.agileits_schedule_bottom_right,.agileinfo_schedule_bottom_left {
			padding: 0;
		}
		.agileinfo_schedule_bottom_left img{
			width:100%;
		}
		.w3ls_schedule_bottom_right_grid{
			padding: 3em 2em;
			background: #fff;
			margin: 6.5em 0 0;
			width: 90%;
			box-shadow: 5px 0px 10px #19a98c;

		}
		.w3ls_schedule_bottom_right_grid h3{
			text-transform: uppercase;
			font-size: 1.4em;
			color: #212121;
			letter-spacing: 2px;
			font-weight: 700;
		}
		.w3ls_schedule_bottom_right_grid h3 span{
			color: #120A8F;
		}
		.w3ls_schedule_bottom_right_grid p{
			margin:1em 0 2em;
			color: #545454;
			line-height:2em;
		}
		.w3l_schedule_bottom_right_grid1{
			text-align:center;
		}
		.w3l_schedule_bottom_right_grid1 i{
			font-size: 1.5em;
			color: <?=$dados_loja->corHex?>;
			display: block;

		}
		.w3l_schedule_bottom_right_grid1 h4{
			margin: 1em 0;
			color: #212121;
			text-transform: uppercase;
			font-size: 1em;
			letter-spacing: 2px;
		}
		.w3l_schedule_bottom_right_grid1 h5{
			font-size:2em;
			color:#212121;
			font-weight:600;
		}
		h3.wthree_text_info {
			font-size: 2.5em;
			font-weight: 700;
			text-align: center;
			letter-spacing: 2px;
			color: #000;
			margin-bottom: 1em;
			text-transform: uppercase;
		}
		h3.wthree_text_info span{
			font-weight:300;
		}
		/*-- //schedule-bottom --*/
		/*-- new_arrivals --*/
		.new_arrivals{
			padding:90px 0;
		}
		.new_arrivals h3{
			color:#000;
			font-size:36px;
			text-align:center;
			text-transform:uppercase;
			margin-bottom:30px;
		}
		.new_arrivals h3 span{
			color:<?=$dados_loja->corHex?>;
		}
		.new_arrivals p{
			color:#848484;
			font-size:16px;
			text-align:center;
		}
		.new-gd-left{
			position:relative;
		}
		.new-gd-left img{
			width:100%;
		}
		.new_grids{
			margin-top:55px;
		}
		.wed-brand h5 {
			margin: 20px 0;
			color: #000;
			font-size: 23px;
			text-align: center;
		}
		.wed-brand h4{
			font-size:23px;
			text-align:center;
			color:#000;
			text-transform:uppercase;

		}

		.wed-brand {
			position: absolute;
			top: 28%;
			left: 12%;
		}
		/* Outline Out */
		.hvr-outline-out {
			display: inline-block;
			vertical-align: middle;
			-webkit-transform: translateZ(0);
			transform: translateZ(0);
			box-shadow: 0 0 1px rgba(0, 0, 0, 0);
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
			-moz-osx-font-smoothing: grayscale;
			position: relative;
			background: <?=$dados_loja->corHex?>;
		}
		.hvr-outline-out:before {
			content: '';
			position: absolute;
			border: #000000 solid 2px;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			-webkit-transition-duration: 0.3s;
			transition-duration: 0.3s;
			-webkit-transition-property: top, right, bottom, left;
			transition-property: top, right, bottom, left;
		}
		.hvr-outline-out:hover:before,.hvr-outline-out:focus:before,.hvr-outline-out:active:before {

			top: -8px;
			right: -8px;
			bottom: -8px;
			left: -8px;
		}
		.wed-brand p i {
			text-decoration: line-through;
		}
		.wed-brand p {
			font-size: 21px;
			color: #000;
			text-align: center;
		}
		.wed-brand p a{
			color: #fff;
			padding: 9px 0px;
			display: block;
			text-transform: uppercase;
			margin: 25px auto 0;
			font-size: 16px;
			width: 50%;
			text-decoration:none;
		}
		.wed-brandtwo h4{
			font-size: 20px;
			text-align: center;
			color: #fff;
			text-transform: uppercase;
			margin-bottom: 25px;
		}
		.wed-brandtwo {
			position: absolute;
			top: 36%;
			left: 20%;
		}
		.wed-brandtwo p {
			font-size: 45px;
			color: #fff;
			text-align: center;
			text-transform: uppercase;
		}
		.new-gd-middle img {
			width: 100%;
		}
		.new-levis {
			border: 1px solid #D2D2D2;
			background: #fff;
			padding: 45px 28px;
		}
		.mid-text {
			float: left;
			width: 48%;
			margin: 0 5%;
		}
		.mid-text h4 {
			font-size: 22px;
			text-transform: uppercase;
			line-height: 1.5em;
			margin-bottom:15px;
		}
		.mid-text h4 span{
			display:block;
		}
		.mid-img {
			float: left;
			width: 35%;
			margin: 13% 3% 0;
		}
		.mid-text a {
			font-size: 16px;
			color: #fff;
			padding: 8px 18px;
		}
		.new-levis:nth-child(2) {
			margin-top: 35px;
		}
		.product-men img {
			width: 100%;
		}
		/*-- //new_arrivals --*/
		/*-- Shopping-Cart-PopUp --*/
		/*-- cart --*/
		.product_list_header {
			float: right;
		}
		.snipcart-details {
			color: #fff;
			background: #000000;
			text-align: center;
			margin:0.5em auto 1em;
			width:77%;
		}
		.btn-danger.my-cart-btn:focus {
			outline: none;
		}
		.snipcart-details input.button {
			font-size: 13px;
			color: #fff;
			background: <?=$dados_loja->corHex?>;
			text-decoration: none;
			position: relative;
			border: none;
			border-radius: 0;
			width: 100%;
			text-transform: uppercase;
			padding: .5em 0;
			outline: none;
			letter-spacing: 1px;
			font-weight: 600;
		}


		.agile_top_brand_left_grid:hover .snipcart-details input.button,.snipcart-details input.button:hover{
			background: <?=$dados_loja->corHex?>;
		}
		.product_list_header input.button {
			color: #fff;
			font-size: 14px;
			outline: none;
			text-transform: capitalize;
			padding: .5em 2.5em .5em 1em;
			border: 1px solid #fe9126;
			margin: .35em 0 0;
			background: url(../images/cart.png) no-repeat 116px 9px;
		}
		#PPMiniCart form {
			width: 590px !important;
			padding: 10px 20px 40px !important;
			max-height:450px !important;
		}
		#PPMiniCart ul {
			width: 548px !important;
		}
		#PPMiniCart .minicart-item a {
			color: #212121 !important;
			font-size: 1em;
			display: block;
			margin-bottom: .5em;
			text-transform: capitalize;
		}
		#PPMiniCart .minicart-item {
			min-height:60px !important;
		}
		#PPMiniCart .minicart-attributes li {
			color: #999;
		}
		#PPMiniCart .minicart-remove {
			background: #3399cc !important;
			border: 1px solid #3399cc !important;
			opacity: 1 !important;
			outline:none;
		}
		#PPMiniCart .minicart-submit {
			display: none;
		}
		#PPMiniCart .minicart-submit:hover{
			background:#fe9126 !important;
			border-color: #5b951a !important;
		}
		#PPMiniCart .minicart-subtotal {
			padding-left: 25px !important;
			bottom: -17px !important;
		}
		#PPMiniCart {
			left: 44% !important;
		}
		.minicart-showing #PPMiniCart form{
			overflow-x: hidden;
			overflow-y: auto;
		}
		#PPMiniCart .minicart-footer {
			position: relative;
			width: 80%;
		}
		.product-men {
			margin: top;
			margin-top: 2em;
		}
		button.w3view-cart {
			outline: none;
			border: none;
			background: #ffffff;
			width: 48px;
			height: 43px;
			font-size: 24px;
			color: #000;
		}
		/*-- //cart --*/
		/*-- effect --*/
		.men-pro-item {
			position: relative;
			box-shadow: 0px 0px 15px 0px #D6D6D6;
			padding-bottom: 20px;
		}
		.men-thumb-item {
			position: relative;
		}
		.item-info-product {
			text-align: center;
			margin: 20px 0 0;
		}
		.men-thumb-item::before {
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			content: "";
			opacity: 0;
			z-index: 9;
			visibility: hidden;
			transition: all 0.5s ease-out 0s;
		}
		.men-thumb-item .pro-image-front {
			opacity: 1;
			visibility: visible;
		}
		.men-thumb-item img {
			transition: all 0.5s ease-out 0s;
		}
		.pro-image-back {
			transform: rotateY(180deg);
			opacity: 0;
			visibility: hidden;
			position: absolute;
			top: 0;
			left: 0;
		}
		.men-thumb-item img {
			transition: all 0.5s ease-out 0s;
		}
		.men-cart-pro {
			bottom: 0;
			left: 0;
			margin: auto;
			opacity: 0;
			overflow: hidden;
			position: absolute;
			right: 0;
			text-align: center;
			top: 0;
			transition: all 0.5s ease-out 0s;
			visibility: hidden;
			z-index: 10;
		}
		.product-new-top {
			background:#120A8F none repeat scroll 0 0;
			color: #fff;
			display: inline-block;
			right: 0;
			padding: 0 10px 1px;
			position: absolute;
			top: 0;
			z-index:99;
		}
		.inner-men-cart-pro {
			height: 100%;
			position: relative;
			width: 100%;
			transition: all 0.5s ease-out 0s;
		}
		.inner-men-cart-pro ul {
			left: 0;
			margin: -60px 0 0;
			padding: 0;
			position: absolute;
			top: 45%;
			width: 100%;
			transition: all 0.5s ease-out 0s;
		}
		.inner-men-cart-pro .link-product-add-cart {
			width: 100%;
			bottom: -40px;
			left: 0;
			position: absolute;
			transition: all 0.5s ease-out 0s;
		}
		.link-product-add-cart {
			background:#000 none repeat scroll 0 0;
			color: #fff;
			display: inline-block;
			height: 40px;
			line-height: 40px;
			text-transform: uppercase;
			transition: all 0.5s ease-out 0s;
		}
		.inner-men-cart-pro > ul > li {
			display: inline-block;
		}
		.inner-men-cart-pro ul li a {
			color: #fff;
			transition: all 0.5s ease-out 0s;
			display: block;
			width: 40px;
			height: 40px;
			text-align: center;
		}
		.men-thumb-item:hover {
			cursor: pointer;
		}
		.men-thumb-item:hover::before {
			opacity: 1;
			visibility: visible;
		}
		.men-thumb-item:hover .pro-image-front {
			transform: rotateY(180deg);
			opacity: 0;
			visibility: hidden;
		}
		.men-thumb-item:hover .pro-image-back {
			transform: rotateY(0deg);
			opacity: 1;
			visibility: visible;
			background: #f7f7f7;
		}
		.men-thumb-item img {
			transition: all 0.5s ease-out 0s;
			padding: 52px 50px 20px;
		}
		.men-thumb-item:hover .men-cart-pro {
			opacity: 1;
			visibility: visible;
		}
		.men-thumb-item:hover .inner-men-cart-pro ul {
			margin: 20px 0 0;
		}
		.inner-men-cart-pro ul li a:hover {
			background: #ffc229 none repeat scroll 0 0;
		}
		.inner-men-cart-pro .link-product-add-cart {
			width: 100%;
			top: 0;
			left: 0;
			position: absolute;
			transition: all 0.5s ease-out 0s;
		}
		.men-thumb-item:hover .inner-men-cart-pro .link-product-add-cart {
			top: 83.5%;
		}
		.link-product-add-cart:hover {
			background: <?=$dados_loja->corHex?> none repeat scroll 0 0;
			color: #fff;
		}
		/*-- //effect --*/
		.item-info-product h4 a {
			font-size: 0.9em;
			color: #120A8F;
			text-decoration: none;
			font-weight: 600;
		}
		.info-product-price {
			margin: 10px 0;
		}
		.info-product-price span {
			color: #000;
			font-size: 1em;
			font-weight: 600;
			letter-spacing: 1px;
		}
		.info-product-price del {
			color: #908e8e;
			margin-left: 10px;
			letter-spacing: 1px;
		}
		.yes-marg{
			margin-top:30px;
		}
		a.single-item{
			color:#fff;
			font-size: 16px;
			padding: 3px 14px;
			text-decoration:none;
		}
		.occasion-cart {
			width: 30%;
		}
		/*-- /sale --*/
		.sale-w3ls {
			background: url(../images/banner3.jpg)no-repeat 0px 0px;
			background-attachment: fixed;
			background-size: cover;
			-webkit-background-size: cover;
			-o-background-size: cover;
			-moz-background-size: cover;
			-ms-background-size: cover;
			min-height:380px;
		}
		.sale-w3ls h6 {
			font-size: 3em;
			text-align: center;
			letter-spacing: 5px;
			color: #fff;
			font-weight: 700;
			padding-top: 2em;
			margin-bottom: 0.5em;
		}
		.sale-w3ls {
			text-align: center;
		}
		.sale-w3ls a {
			color: #fff;
			letter-spacing: 3px;
			padding: 8px 20px;
			margin-top: 2em;
		}
		.sale-w3ls h6 span {
			color: #080808;
		}
		/*-- //sale --*/
		/*-- login --*/
		.modal-header {
			border-bottom: none;
		}
		.login-right h3 ,.login-bottom h3{
			color: <?=$dados_loja->corHex?>;
			font-size: 22px;
			margin-bottom: 23px;
		}
		.sign-in a {
			font-size: 12px;
			color: #A9A9A9;
			text-decoration: none;
		}
		.sign-in a:hover{
			color: <?=$dados_loja->corHex?>;
		}
		.single-bottom input[type="checkbox"] {
			display: none;
		}
		.single-bottom input[type="checkbox"]+label {
			position: relative;
			padding-left: 31px;
			border: none;
			outline: none;
			font-size: 14px;
			color: #A9A8A8;
			font-weight:normal;
		}
		.single-bottom input[type="checkbox"]+label span:first-child {
			width: 14px;
			height: 14px;
			display: inline-block;
			border:2px solid <?=$dados_loja->corHex?>;
			position: absolute;
			left: 0;
			top: 4px;
		}
		.single-bottom input[type="checkbox"]:checked+label span:first-child:before {
			content: "";
			background:url(../images/mark1.png)no-repeat;
			position: absolute;
			left: -1px;
			top: -1px;
			font-size: 10px;
			width:16px;
			height:16px;
		}
		.single-bottom {
			margin:14px 0 22px;
		}
		.login-grids p{
			font-size:14px;
			text-align:center;
			margin-top:30px;
			color:#000;
		}
		.login-grids p a {
			color: #000;
			text-decoration: none;
		}
		.login-grids p a:hover{
			color: <?=$dados_loja->corHex?>;
		}
		/*-- //login --*/
		/*-- navigation --*/
		ul.multi-column-dropdown li {
			list-style-type: none;
			line-height: 2.5em;
		}
		ul.multi-column-dropdown li a {
			text-decoration:none;
			font-size: 0.9em;
			color: #545454;
			letter-spacing: 1px;
		}
		ul.multi-column-dropdown li a:hover{
			color:<?=$dados_loja->corHex?>;
		}
		.col-sm-3.multi-gd-img {
			padding: 0;
		}
		.col-sm-6.multi-gd-img1 {
			padding-right:20px;
			padding-left:10px;
		}
		.multi-gd-img img,.multi-gd-img1 img {
			box-shadow: 0px 0px 7px 0px #AFAFAF;
		}
		/*-- //navigation --*/
		.multi-gd-text a {
			display: block;
			position: relative;
		}
		.multi-gd-text a:hover::before {
			width: 100%;
			height: 100%;
		}
		.multi-gd-text a::before {
			background: rgba(0,0,0,0.1);
			position: absolute;
			right: 0;
			top: 0;
			width: 0;
			height: 0;
			transition: all 0.5s ease-out 0s;
			z-index: 99;
			content: "";
		}
		.multi-gd-text img {
			height: auto;
			width: 100%;
		}
		.multi-gd-text a:hover::after {
			width: 100%;
			height: 100%;
		}
		.multi-gd-text a::after {
			background: rgba(0,0,0,0.1);
			position: absolute;
			bottom: 0;
			left: 0;
			width: 0;
			height: 0;
			transition: all 0.5s ease-out 0s;
			z-index: 99;
			content: "";
		}
		/*-- coupons --*/
		.coupons,.banner-bootom-w3-agileits,.new_arrivals_agile_w3ls_info{
			padding:4em 0;
		}
		.w3layouts_mail_grid {
			padding: 0 1em;
		}
		.w3layouts_mail_grid_left1{
			float: left;
			width: 70px;
			height: 70px;
			text-align: center;
		}
		.w3layouts_mail_grid_left1 i{
			font-size: 1.3em;
			color: #fff;
			line-height: 3.2em;
		}
		.w3layouts_mail_grid_left2{
			float:right;
			width:70%;
			text-align: left;
		}
		.w3layouts_mail_grid_left2 h3{
			font-size: 0.9em;
			color: <?=$dados_loja->corHex?>;
			margin: 0em 0 0.5em;
			text-transform: uppercase;
			letter-spacing: 1px;
			font-weight: 600;
		}
		.w3layouts_mail_grid_left2 a{
			text-decoration:none;
			color: #545454;
			font-size:14px;
		}
		.w3layouts_mail_grid_left2 a:hover{
			color:#212121;
		}
		.w3layouts_mail_grid_left2 p{
			color: #545454;
			font-size: 0.9em;
			line-height: 1.8em;
		}
		.agile_newsletter_footer {
			border-top: 1px solid #101010;
			border-bottom: 1px solid #101010;
			padding: 1em 0;
			margin-top: 3em;
		}
		/* Radial Out */
		.hvr-radial-out {
			display: inline-block;
			vertical-align: middle;
			-webkit-transform: perspective(1px) translateZ(0);
			transform: perspective(1px) translateZ(0);
			box-shadow: 0 0 1px transparent;
			position: relative;
			overflow: hidden;
			background: #111;
			-webkit-transition-property: color;
			transition-property: color;
			-webkit-transition-duration: 0.3s;
			transition-duration: 0.3s;
		}
		.hvr-radial-out:before {
			content: "";
			position: absolute;
			z-index: -1;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background:<?=$dados_loja->corHex?>;
			-webkit-transform: scale(0);
			transform: scale(0);
			-webkit-transition-property: transform;
			transition-property: transform;
			-webkit-transition-duration: 0.3s;
			transition-duration: 0.3s;
			-webkit-transition-timing-function: ease-out;
			transition-timing-function: ease-out;
		}
		.hvr-radial-out:hover, .hvr-radial-out:focus, .hvr-radial-out:active {
			color: white;
		}
		.hvr-radial-out:hover:before, .hvr-radial-out:focus:before, .hvr-radial-out:active:before,.w3layouts_mail_grid_left:hover .hvr-radial-out:before{
			-webkit-transform: scale(2);
			transform: scale(2);
		}
		/*-- //coupons --*/
		/*-- /about --*/
		.page-head_agile_info_w3l {
			background: url(../images/inner1.jpg) no-repeat center;
			background-size: cover;
			-webkit-background-size: cover;
			-o-background-size: cover;
			-ms-background-size: cover;
			-moz-background-size: cover;
			min-height: 200px;
			padding-top:50px;
		}
		.page-head_agile_info_w3l h3 {
			color: #020000;
			text-align: center;
			text-transform: uppercase;
			font-size:3em;
			font-weight:700;
			letter-spacing:2px;
		}
		.page-head_agile_info_w3l h3  span{
			font-weight:300;
		}
		ul.w3_short li {
			display: inline-block;
			text-transform: uppercase;
			color: #070000;
			font-size:0.9em;
			font-weight:600;
			letter-spacing:1px;
		}
		ul.w3_short li a {
			color: <?=$dados_loja->corHex?>;
			text-decoration: none;
		}
		.services-breadcrumb {
			padding: 0;
			background: none;
			text-align: center;
		}
		.services-breadcrumb ul li i {
			padding: 0 1.5em;
		}
		ul.w3_short {
			text-align: left;
			padding-top: 2.5em;
		}

		.agile_ab_w3ls_info {
			margin-bottom: 3em;
		}
		.agile_ab_w3ls_info h5{
			text-transform: uppercase;
			font-size:2em;
			color: #212121;
			letter-spacing: 2px;
			font-weight: 700;
			margin-bottom:1.5em;
		}
		.agile_ab_w3ls_info h5 span{
			font-weight:300;
		}
		.agile_ab_w3ls_info p{
			margin: 1em 0 2em;
			color: #545454;
			line-height: 2em;
		}
		/*--//about--*/
		/*-- /contact --*/
		h3.tittle {
			color: <?=$dados_loja->corHex?>;
			font-size:2em;
			text-align: center;
			text-transform: uppercase;
			margin: 0px 0 50px;

		}
		.contact-w3-agile1 iframe {
			width: 100%;
			height:350px;
			outline: none;
			border: none;
		}
		.map {
			-webkit-filter: grayscale(100%);
			-moz-filter: grayscale(100%);
			-ms-filter: grayscale(100%);
			-o-filter: grayscale(100%);
			filter: grayscale(100%);
		}
		.contact-grid-agile-w3 i {
			color: #fff;
			font-size: 33px;
		}
		.contact-grid-agile-w3 {
			background: #171616;
			text-align: center;
			width: 32%;
			padding: 2em 1em;
		}
		.contact-grid-agile-w3:nth-child(2) {
			margin:0 1%;
		}
		.contact-grid-agile-w3 h4 {
			color: <?=$dados_loja->corHex?>;
			font-size: 1.3em;
			margin: 20px 0;
			letter-spacing: 1px;
			font-weight: 700;
			text-transform: uppercase;
		}
		.contact-grid-agile-w3 p {
			color: #fff;
			font-size: 14px;
			line-height: 2em;
		}
		.contact-grid-agile-w3 p a{
			color: #fff;
			text-decoration:none;
		}
		.contact-grid-agile-w3 p span {
			display:block;
		}
		.mail-agileits-w3layouts i {
			color: #0e0e0e;
			font-size: 23px;
			float: left;
			width: 70px;
			height: 70px;
			border: 2px solid #ddd;
			text-align: center;
			line-height: 67px;
		}
		.mail-agileits-w3layouts {
			margin-top: 3em;
		}
		.contact-right a:hover {
			color: <?=$dados_loja->corHex?>;
		}
		.contact-right span, .contact-right a {
			font-size: 15px;
			text-decoration: none;
			color: #555;
			outline: none;
		}
		.contact-right {
			padding-left: 2em;
			float: left;
		}
		.contact-form input[type="text"], .contact-form input[type="email"], .contact-form textarea {
			font-size: 15px;
			letter-spacing: 1px;
			color: #fff;
			padding: 0.5em 1em;
			border: 0;
			width: 100%;
			border-bottom: 1px solid #dcdcdc;
			background: none;
			-webkit-appearance: none;
			outline: none;
		}
		.contact-form input[type="submit"] {
			border: none;
			padding: 0.8em 2.5em;
			font-size: 15px;
			outline: none;
			text-transform: uppercase;
			font-weight: 700;
			letter-spacing: 1px;
			background: <?=$dados_loja->corHex?>;
			color: #fff;
		}
		.contact-right p {
			text-transform: uppercase;
			font-weight: 700;
			color: <?=$dados_loja->corHex?>;
			font-size: 1em;
			letter-spacing: 2px;
			margin-bottom: 0.5em;
		}
		.contact-right span {
			color: #545454;
			font-size: 0.9em;
			line-height: 1.8em;
			letter-spacing: 1px;
		}
		.address-grid h4,h4.white-w3ls {
			font-weight: 700;
			font-size: 2em;
			text-transform: uppercase;
			color: #181919;
			letter-spacing:1px;
		}
		.address-grid h4 span,h4.white-w3ls span{
			font-weight:300;
		}
		h4.white-w3ls {
			color:#fff;
			margin-bottom:1em;
		}
		ul.social-nav.model-3d-0.footer-social.w3_agile_social.two.contact {
			margin-top: 3em;
		}
		/*-- icons --*/
		.grid_3.grid_4.w3_agileits_icons_page {
			margin: 0;
		}
		ul.bs-glyphicons-list li:hover {
			background: #000;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-o-transition: 0.5s all;
			-ms-transition: 0.5s all;
			-moz-transition: 0.5s all;
		}
		ul.bs-glyphicons-list li:hover span {
			color: #fff;
		}
		.codes a {
			color: #555;
		}
		.row.fontawesome-icon-list {
			margin: 0;
		}
		.icon-box {
			padding: 8px 15px;
			background:rgba(149, 149, 149, 0.18);
			margin: 1em 0 1em 0;
			border: 5px solid #ffffff;
			text-align: left;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			font-size: 13px;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-o-transition: 0.5s all;
			-ms-transition: 0.5s all;
			-moz-transition: 0.5s all;
			cursor: pointer;
		}
		.icon-box:hover {
			background: #000;
			transition:0.5s all;
			-webkit-transition:0.5s all;
			-o-transition:0.5s all;
			-ms-transition:0.5s all;
			-moz-transition:0.5s all;
		}
		.icon-box:hover i.fa {
			color:#fff !important;
		}
		.icon-box:hover a.agile-icon {
			color:#fff !important;
		}
		.codes .bs-glyphicons li {
			float: left;
			width: 12.5%;
			height: 115px;
			padding: 10px;
			line-height: 1.4;
			text-align: center;
			font-size: 12px;
			list-style-type: none;
		}
		.codes .bs-glyphicons .glyphicon {
			margin-top: 5px;
			margin-bottom: 10px;
			font-size: 24px;
		}
		.codes .glyphicon {
			position: relative;
			top: 1px;
			display: inline-block;
			font-family: 'Glyphicons Halflings';
			font-style: normal;
			font-weight: 400;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			color: #777;
		}
		.codes .bs-glyphicons .glyphicon-class {
			display: block;
			text-align: center;
			word-wrap: break-word;
		}
		h3.icon-subheading {
			font-size: 25px;
			color: <?=$dados_loja->corHex?> !important;
			margin: 30px 0 15px;
			font-weight: 700
		}
		h3.agileits-icons-title {
			text-align: center;
			font-size: 35px;
			color: #000;
			font-weight: 300;
		}
		.icons a {
			color: #555;
		}
		.icon-box i {
			margin-right: 10px !important;
			font-size: 20px !important;
			color: #282a2b !important;
		}
		.bs-glyphicons li {
			float: left;
			width: 18%;
			height: 115px;
			padding: 10px;
			line-height: 1.4;
			text-align: center;
			font-size: 12px;
			list-style-type: none;
			background:rgba(149, 149, 149, 0.18);
			margin: 1%;
			cursor: pointer;
		}
		.bs-glyphicons .glyphicon {
			margin-top: 5px;
			margin-bottom: 10px;
			font-size: 24px;
			color: #282a2b;
		}
		.icon-box.glyphicon {
			position: relative;
			top: 1px;
			display: inline-block;
			font-family: 'Glyphicons Halflings';
			font-style: normal;
			font-weight: 400;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			color: #777;
		}
		.bs-glyphicons .glyphicon-class {
			display: block;
			text-align: center;
			word-wrap: break-word;
		}
		@media (max-width:1080px){
			.icon-box {
				width:33.33%;
			}
		}
		@media (max-width:991px){
			h3.agileits-icons-title {
				font-size: 28px;
			}
			h3.icon-subheading {
				font-size: 22px;
			}
			.icon-box {
				width: 50%;
				float: left;
			}
		}
		@media (max-width:768px){
			h3.agileits-icons-title {
				font-size: 28px;
			}
			h3.icon-subheading {
				font-size: 25px;
			}
			.row {
				margin-right: 0;
				margin-left: 0;
			}
			.icon-box {
				margin: 0;
			}
		}
		@media (max-width: 640px){
			.icon-box {
				float: left;
				width: 50%;
			}
			h3.icon-subheading {
				font-size: 22px;
			}
			.grid_3.grid_4.w3_agileits_icons_page {
				margin-top: 0;
			}
		}
		@media (max-width:568px){
			.icon-box {
				float: left;
				width: 100%;
			}
		}
		@media (max-width: 480px){
			.bs-glyphicons li {
				width: 31%;
			}
			h3.agileits-icons-title {
				font-size: 25px;
			}
			h3.icon-subheading {
				font-size: 19px;
			}
		}
		@media (max-width: 414px){
			h3.agileits-icons-title {
				font-size: 23px;
			}
			h3.icon-subheading {
				font-size: 18px;
			}
			.bs-glyphicons li {
				width: 31.33%;
			}
		}
		@media (max-width: 384px){
			.icon-box {
				float: none;
				width: 100%;
			}
		}
		@media (max-width: 375px){
			.w3_agileits_icons_page {
				margin:0 !important;
			}
		}
		/*-- //icons --*/
		/*--Typography--*/
		.well {
			font-weight: 300;
			font-size: 14px;
		}
		.list-group-item {
			font-weight: 300;
			font-size: 14px;
		}
		li.list-group-item1 {
			font-size: 14px;
			font-weight: 300;
		}
		.typo p {
			margin: 0;
			font-size: 14px;
			font-weight: 300;
		}
		.show-grid [class^=col-] {
			background: #fff;
			text-align: center;
			margin-bottom: 10px;
			line-height: 2em;
			border: 10px solid #f0f0f0;
		}
		.show-grid [class*="col-"]:hover {
			background: #e0e0e0;
		}
		.grid_3{
			margin-bottom:2em;
		}
		.xs h3, h3.m_1{
			color:#000;
			font-size:1.7em;
			font-weight:300;
			margin-bottom: 1em;
		}
		.grid_3 p{
			color: #545454;
			font-size: 0.85em;
			margin-bottom: 1em;
			font-weight: 300;
		}
		.grid_4{
			background:none;
			margin-top:50px;
		}
		.label {
			font-weight: 300 !important;
			border-radius:4px;
		}
		.grid_5{
			background:none;
			padding:2em 0;
		}
		.grid_5 h3, .grid_5 h2, .grid_5 h1, .grid_5 h4, .grid_5 h5, h3.hdg, h3.bars {
			margin-bottom:1em;
			color:<?=$dados_loja->corHex?>;
			font-weight:700;
		}
		.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
			border-top: none !important;
		}
		.tab-content > .active {
			display: block;
			visibility: visible;
		}
		.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
			z-index: 0;
		}
		.badge-primary {
			background-color: #03a9f4;
		}
		.badge-success {
			background-color: #8bc34a;
		}
		.badge-warning {
			background-color: #ffc107;
		}
		.badge-danger {
			background-color: #e51c23;
		}
		.grid_3 p{
			line-height: 2em;
			color: #545454;
			font-size: 0.9em;
			margin-bottom: 1em;
			font-weight: 300;
		}
		.bs-docs-example {
			margin: 1em 0;
		}
		section#tables  p {
			margin-top: 1em;
		}
		.tab-container .tab-content {
			border-radius: 0 2px 2px 2px;
			border: 1px solid #e0e0e0;
			padding: 16px;
			background-color: #ffffff;
		}
		.table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			padding: 15px!important;
		}
		.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
			font-size: 0.9em;
			color: #555;
			border-top: none !important;
		}
		.tab-content > .active {
			display: block;
			visibility: visible;
		}
		.label {
			font-weight: 300 !important;
		}
		.label {
			padding: 4px 6px;
			border: none;
			text-shadow: none;
		}
		.alert {
			font-size: 0.85em;
		}
		h1.t-button,h2.t-button,h3.t-button,h4.t-button,h5.t-button {
			line-height:2em;
			margin-top:0.5em;
			margin-bottom: 0.5em;
		}
		li.list-group-item1 {
			line-height: 2.5em;
		}
		.input-group {
			margin-bottom: 20px;
		}
		.in-gp-tl{
			padding:0;
		}
		.in-gp-tb{
			padding-right:0;
		}
		.list-group {
			margin-bottom: 48px;
		}
		ol {
			margin-bottom: 44px;
		}
		h2.typoh2{
			margin: 0 0 10px;
		}
		@media (max-width:800px){
			.grid_3.grid_5.w3ls,.grid_3.grid_5.w3l,.grid_3.grid_5.agileits,.grid_3.grid_5.agileinfo,.grid_3.grid_5.wthree {
				margin: 0;
			}
		}
		@media (max-width:768px){
			.grid_5 {
				padding: 0 0 1em;
			}
			.grid_3 {
				margin-bottom: 0em;
			}
			.grid_3.grid_5.w3l {
				margin-top: 1.5em;
			}
		}
		@media (max-width:640px){
			h1, .h1, h2, .h2, h3, .h3 {
				margin-top: 0px;
				margin-bottom: 0px;
			}
			.grid_5 h3, .grid_5 h2, .grid_5 h1, .grid_5 h4, .grid_5 h5, h3.hdg, h3.bars {
				margin-bottom: .5em;
			}
			.progress {
				height: 10px;
				margin-bottom: 10px;
			}
			ol.breadcrumb li,.grid_3 p,ul.list-group li,li.list-group-item1 {
				font-size: 14px;
			}
			.breadcrumb {
				margin-bottom: 25px;
			}
			.well {
				font-size: 14px;
				margin-bottom: 10px;
			}
			h2.typoh2 {
				font-size: 1.5em;
			}
			.label {
				font-size: 60%;
			}
			.in-gp-tl {
				padding: 0 1em;
			}
			.in-gp-tb {
				padding-right: 1em;
			}
			.list-group {
				margin-bottom: 20px;
			}
		}
		@media (max-width:480px){
			.grid_5 h3, .grid_5 h2, .grid_5 h1, .grid_5 h4, .grid_5 h5, h3.hdg, h3.bars {
				font-size: 1.2em;
			}
			.table h1 {
				font-size: 26px;
			}
			.table h2 {
				font-size: 23px;
			}
			.table h3 {
				font-size: 20px;
			}
			.label {
				font-size: 53%;
			}
			.alert,p {
				font-size: 14px;
			}
			.pagination {
				margin: 20px 0 0px;
			}
			.grid_3.grid_4.w3layouts {
				margin-top: 0;
			}
		}
		@media (max-width: 320px){
			.grid_4 {
				margin-top: 18px;
			}
			h3.title {
				font-size: 1.6em;
			}
			.alert, p,ol.breadcrumb li, .grid_3 p,.well, ul.list-group li, li.list-group-item1,a.list-group-item {
				font-size: 13px;
			}
			.alert {
				padding: 10px;
				margin-bottom: 10px;
			}
			ul.pagination li a {
				font-size: 14px;
				padding: 5px 11px;
			}
			.list-group {
				margin-bottom: 10px;
			}
			.well {
				padding: 10px;
			}
			.nav > li > a {
				font-size: 14px;
			}
			table.table.table-striped,.table-bordered,.bs-docs-example {
				display: none;
			}
		}
		/*-- //typography --*/
		/*-- Slider Part starts Here --*/
		/*--slider--*/
		#slider2,
		#slider3 {
			box-shadow: none;
			-moz-box-shadow: none;
			-webkit-box-shadow: none;
			margin: 0 auto;
		}
		.rslides_tabs li:first-child {
			margin-left: 0;
		}
		.rslides_tabs .rslides_here a {
			background: rgba(255,255,255,.1);
			color: #fff;
			font-weight: bold;
		}
		.events {
			list-style: none;
		}
		.callbacks_container {
			position: relative;
			float: left;
			width: 100%;
		}
		.callbacks {
			position: relative;
			list-style: none;
			overflow: hidden;
			width: 100%;
			padding: 0;
			margin: 0;
		}
		.callbacks li {
			position: absolute;
			width: 100%;
		}
		.callbacks img {
			position: relative;
			z-index: 1;
			height: auto;
			border: 0;
		}
		.callbacks .caption {
			display: block;
			position: absolute;
			z-index: 2;
			font-size: 20px;
			text-shadow: none;
			color: #fff;
			left: 0;
			right: 0;
			padding: 10px 20px;
			margin: 0;
			max-width: none;
			top: 10%;
			text-align: center;
		}

		.callbacks_nav {
			position: absolute;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			bottom: -59%;
			left: 40px;
			opacity: 0.7;
			z-index: 3;
			text-indent: -9999px;
			overflow: hidden;
			text-decoration: none;
			height:52px;
			width: 36px;
			background: url(../images/left.png) no-repeat 0px 0px;
		}
		.callbacks_nav.next {
			left: auto;
			background:rgba(0, 0, 0, 0.64) url(../images/right.png) no-repeat 2px 8px;
			left:141px;
		}
		.callbacks_nav.prev {
			left: auto;
			background: rgba(0, 0, 0, 0.64) url(../images/left.png) no-repeat 2px 8px;
			left:100px;
		}
		#slider3-pager a {
			display: inline-block;
		}
		#slider3-pager span{
			float: left;
		}
		#slider3-pager span{
			width:100px;
			height:15px;
			background:#fff;
			display:inline-block;
			border-radius:30em;
			opacity:0.6;
		}
		#slider3-pager .rslides_here a {
			background: #FFF;
			border-radius:30em;
			opacity:1;
		}
		#slider3-pager a {
			padding: 0;
		}
		#slider3-pager li{
			display:inline-block;
		}
		.rslides {
			position: relative;
			list-style: none;
			overflow: hidden;
			width: 100%;
			padding: 0;
		}
		.rslides li {
			-webkit-backface-visibility: hidden;
			position: absolute;
			display:none;
			width: 100%;
			left: 0;
			top: 0;
		}
		.rslides li{
			position: relative;
			display:block;
			float: left;
		}
		.rslides img {
			height: auto;
			border: 0;
		}
		.callbacks_tabs {
			list-style: none;
			position: absolute;
			top: 82%;
			left: 5.5%;
			padding: 0;
			margin: 0;
			display: block;
			z-index: 99;
		}
		.slider-top span{
			font-weight:600;
		}
		.callbacks_tabs li {
			display:inline-block;
			margin: 0px 7px;
		}
		/*----*/
		.callbacks_tabs a{
			visibility: hidden;
		}
		.callbacks_tabs a:after {
			content: "\f111";
			font-size: 0;
			font-family: FontAwesome;
			visibility: visible;
			display: block;
			height:10px;
			width:10px;
			display: inline-block;
			background: #ffffff;
			border-radius: 50%;
			-webkit-border-radius: 50%;
			-o-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
		}
		.callbacks_here a:after{
			background:<?=$dados_loja->corHex?>;
		}
		/*-- Slider part Ends Here --*/
		/*-- men-wear --*/
		.men-wear{
			padding:90px 0;
		}
		/*-- Slider range --*/
		ul.dropdown-menu6 ,ul.dropdown-menu5{
			margin:0;
			position:relative;
		}
		ul.dropdown-menu6 li {
			list-style:none;
		}
		ul.dropdown-menu6 li p{
			width:100%;
		}
		span.amount{
			color:#ffffff;
			font-size:16px;
		}
		input#amount,input#amount1 {
			font-size: 18px;
			outline: none;
			background: none;
			word-spacing: 1em;
			color: #000 !important;
			position: absolute;
			left: 0%;
			top: 30px;
			text-align: center;
			width: 100%;
			border: 1px solid #D2D2D2 !important;
			padding: 4px 0;
		}
		ul.dropdown-menu6 li a {
			text-decoration: none;
		}
		.range,.range-two{
			padding: 15px 0 22px 0;
			border-bottom: 1px solid #e5e3db;
		}
		/*-- //Slider range --*/
		.filter-price h3 {
			color: #0c0c0c;
			text-align: center;
			text-transform: uppercase;
			font-size: 1.5em;
			font-weight: 700;
			letter-spacing: 1px;
		}
		.filter-price h3 span{
			font-weight:300;
		}
		/*-- treeview --*/
		.css-treeview label {
			padding: 5px;
			margin: 2px;
			font-size: 0.9em;
			color: #545454;
			letter-spacing: 1px;
		}

		.css-treeview a {
			padding: 7px 0 0 31px;
			margin: 2px;
			font-size: 14px;
			letter-spacing: 1px;
		}
		.css-treeview ul,
		.css-treeview li
		{
			list-style: none;
		}

		.css-treeview input
		{
			position: absolute;
			opacity: 0;
		}

		.css-treeview
		{
			-moz-user-select: none;
			-webkit-user-select: none;
			user-select: none;
		}

		.css-treeview a {
			color: #999;
			text-decoration: none;
		}

		.css-treeview a:hover
		{
			text-decoration: underline;
		}

		.css-treeview input + label + ul
		{
			margin: 0 0 0 22px;
		}

		.css-treeview input + label + ul
		{
			display: none;
		}

		.css-treeview label,
		.css-treeview label::before
		{
			cursor: pointer;
		}

		.css-treeview input:disabled + label
		{
			cursor: default;
			opacity: .6;
		}

		.css-treeview input:checked:not(:disabled) + label + ul
		{
			display: block;
		}

		.css-treeview label,
		.css-treeview label::before
		{

		}
		.css-treeview label,
		.css-treeview a,
		.css-treeview label::before
		{
			display: inline-block;
			vertical-align: middle;
		}

		.css-treeview label
		{
			background-position: 18px 0;
		}

		.css-treeview label::before
		{
			content: "";
			width: 16px;
			margin: 0 22px 0 0;
			vertical-align: middle;
			background-position: 0 -32px;
		}

		.css-treeview input:checked + label::before
		{
			background-position: 0 -16px;
		}

		/* webkit adjacent element selector bugfix */
		@media  screen and (-webkit-min-device-pixel-ratio:0)
		{
			.css-treeview
			{
				-webkit-animation: webkit-adjacent-element-selector-bugfix infinite 1s;
			}

			@-webkit-keyframes webkit-adjacent-element-selector-bugfix
			{
				from
				{
					padding: 0;
				}
				to
				{
					padding: 0;
				}
			}
		}

		.products-left i {
			color: <?=$dados_loja->corHex?>;
		}
		/*-- //treeview --*/
		.css-treeview {
			border: 1px solid #d2d2d2;
		}
		.css-treeview h4,.community-poll h4 {
			color: <?=$dados_loja->corHex?>;
			text-align: center;
			background: #f7f7f7;
			padding: 17px 0;
			font-size: 1.2em;
			font-weight: 700;
			border-bottom: 1px solid #d2d2d2;
			letter-spacing: 1px;
			text-transform: uppercase;
		}
		.tree-list-pad{
			padding:30px 30px;
		}
		.community-poll {
			border: 1px solid #d2d2d2;
			margin-top: 30px;
		}
		.radio {
			position: relative;
			display:inline-block;
			margin-left:15px;
		}
		.radio:first-child {
			margin-left: 0;
			margin: 0;
		}
		.radio {
			padding-left: 22px;
			line-height: 28px;
			color: #404040;
			cursor: pointer;
			font-size: 0.95em;
		}
		.radio  input[type="radio"]{
			position: absolute;
			left: -9999px;
		}
		.radio-btns label {
			font-size: 14px;
			color: #000;
			padding: 0px 0 0 10px;
			font-weight:600;
		}
		.radio i {
			position: absolute;
			top:5px;
			left: 0;
			display: block;
			width: 18px;
			height: 18px;
			outline: none;
			border:3px solid <?=$dados_loja->corHex?>;
			background: #fff;
			cursor:pointer;
		}
		.radio i {
			border-radius: 50%;
		}
		.radio input + i:after {
			position: absolute;
			opacity: 0;
			transition: opacity 0.1s;
			-o-transition: opacity 0.1s;
			-ms-transition: opacity 0.1s;
			-moz-transition: opacity 0.1s;
			-webkit-transition: opacity 0.1s;
		}
		.radio input + i:after {
			content: '';
			top: 6px;
			left: 7px;
			width: 5px;
			height: 5px;
			border-radius: 50%;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-o-border-radius: 50%;
		}
		.radio input:checked + i:after{
			opacity: 1;
		}

		label.checkbox {
			width: 28%;
			floaT: left;
		}
		/*** normal state ***/
		.radio i {
			transition: border-color 0.3s;
			-o-transition: border-color 0.3s;
			-ms-transition: border-color 0.3s;
			-moz-transition: border-color 0.3s;
			-webkit-transition: border-color 0.3s;
		}
		/*** checked state ***/
		.radio input + i:after {
			content: '';
			background: url("../images/tick-mark1.png") no-repeat center;
			top: 1px;
			left: 1px;
			width: 9px;
			height: 9px;
			text-align: center;
		}
		.radio input:checked + i {
			border:3px solid <?=$dados_loja->corHex?>;
			background: #fff;
		}
		.swit {
			padding: 30px 30px;
		}
		.check_box {
			margin-bottom: 5px;
		}
		.swit label {
			padding: 0 0 0 10px;
			margin: 0;
			font-size: 0.9em;
			color: #545454;
		}
		.swit input[type="submit"] {
			background: #232323;
			color: #fff;
			font-size: 15px;
			border: none;
			outline: none;
			-webkit-appearance: none;
			padding: 10px 35px;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-o-transition: 0.5s all;
			margin: 19px 0 0;
			letter-spacing: 2px;
			font-weight: 600;
		}
		.swit input[type="submit"]:hover{
			background:<?=$dados_loja->corHex?>;
		}
		ul.social-nav.model-3d-0.footer-social.w3_agile_social.single_page_w3ls {
			float: none;
			margin-top: 2em;
		}
		/*-- //treeview --*/
		.men-wear-left{
			padding-left:0;
		}
		.men-wear-bottom {
			margin: 50px 0;
		}
		.men-wear-right h4 {
			color: #000;
			font-size: 1.2em;
			margin: 0px 0 24px;
			text-transform: uppercase;
			font-weight: 700;
			letter-spacing: 2px;
		}
		.men-wear-right h4 span{
			font-weight: 300;
		}
		.men-wear-right p {
			font-size:0.9em;
			color: #545454;
			line-height: 2em;
			letter-spacing:1px;
		}
		.products-right {
			padding-right: 0;
		}
		.no-pad-men {
			padding: 0 25px 0 0 !important;
		}
		.products-right h5 {
			color: #0c0c0c;
			text-transform: uppercase;
			font-size: 1.5em;
			font-weight: 700;
			letter-spacing: 1px;
		}
		.products-right h5  span{
			font-weight:300;
		}
		.sort-grid {
			padding: 11px 0;
			border-top: 1px solid #d2d2d2;
			border-bottom: 1px solid #d2d2d2;
			margin: 35px 0;
		}
		.sorting {
			float: left;
			width: 46%;
		}
		.sorting h6 {
			float: left;
			font-size: 16px;
			margin:7px 40px 0 0;
		}
		.sorting select {
			float: left;
			padding: 6px 13px;
			font-size: 14px;
			color: #999;
		}
		.single-pro {
			margin-top: 30px;
		}
		.pagination {
			margin: 34px 15px 0 0;
		}
		/*-- //men-wear --*/
		/*-- single-page --*/
		.single-right-left h3 {
			text-transform: capitalize;
			font-size: 23px;
			color: <?=$dados_loja->corHex?>;
			margin: 0;
			letter-spacing: 1px;
			font-weight: 600;
		}
		.single-right-left p{
			color: #000;
			font-size: 20px;
			margin: .5em 0 1em;
		}
		.single-right-left del {
			color: #999;
			margin-left: 10px;
			font-weight: 300;
		}
		.description{
			margin:1.5em 0;
		}
		.description h5 {
			color: #545454;
			font-size: 0.9em;
			margin-bottom:12px;
		}
		.description p{
			color: #545454;
			line-height:1.8em;
			margin:0.5em 0 0;
			font-size:0.9em;
		}
		.occasional{
			margin:2em 0;
		}
		.color-quality-right h5,.occasional h5 {
			color: #000;
			font-size: 16px;
			margin: 0 0 12px;
			letter-spacing: 1px;
		}
		.color-quality-right select {
			padding: 5px 21px;
		}
		.colr {
			width: 10%;
			float: left;
		}
		.description input[type="text"]{
			padding:8px 8px;
			color:#ccc;
			font-size:13px;
			width:45%;
			outline:none;
			letter-spacing:1px;
		}
		.description input[type="submit"]{
			color: #fff;
			font-size: 16px;
			background: #000000;
			border: none;
			outline: none;
			padding: 7px 17px 9px;
			letter-spacing: 2px;
			text-transform: uppercase;
		}
		.description input[type="submit"]:hover{
			background:#120A8F;
		}
		.occasion-cart a{
			padding: 8px 20px;
			text-decoration: none;
			color: #fff;
			font-size: 15px;
			letter-spacing: 1px;
		}
		.bootstrap-tab {
			margin: 5em 0 0;
		}
		.bootstrap-tab-text p{
			font-size:14px;
			color:#999;
			line-height:1.8em;
		}
		.bootstrap-tab-text h5,.add-review h4{
			text-transform: uppercase;
			font-size: 1em;
			color: #212121;
			margin: 2em 0 1em 0;
			font-weight: 600;
			letter-spacing: 1px;
		}
		.bootstrap-tab-text p span{
			display:block;
			margin:2em 0 0;
		}
		.bootstrap-tab-text-grid-left{
			float:left;
			width:14%;
		}
		.bootstrap-tab-text-grid-right{
			float:right;
			width:83%;
		}
		.bootstrap-tab-text-grid-right ul li{
			display:inline-block;
		}
		.bootstrap-tab-text-grid-right ul li:nth-child(2){
			float:right;
		}
		.bootstrap-tab-text-grid-right ul li a{
			font-size: 1em;
			color: <?=$dados_loja->corHex?>;
			text-transform: uppercase;
			text-decoration: none;
			font-weight: 600;
		}
		.bootstrap-tab-text-grid-right ul li a:hover{
			color: #212121;
		}
		.bootstrap-tab-text-grid-right ul li a i{
			left:-1em;
		}
		.bootstrap-tab-text-grids{
			margin:3em 0 0 0em;
		}
		.bootstrap-tab-text-grid-right p{
			margin:2em 0 0;
			color: #545454;
			font-size: 0.9em;
			line-height:2sem;
		}
		.bootstrap-tab-text-grid:nth-child(2){
			margin:3em 0 0;
		}
		.add-review form{
			margin:2em 0 0;
		}
		.add-review input[type="text"],.add-review input[type="email"],.add-review textarea{
			outline: none;
			padding: 10px;
			border: 1px solid #D2D2D2;
			width: 49%;
			font-size: 15px;
			color: #888;
		}
		.add-review input[type="email"]{
			margin-left: 1.55%;
		}
		.add-review textarea{
			width: 100% !important;
			min-height: 120px;
			margin: 1em 0;
			resize: none;
		}
		.add-review input[type="text"]:nth-child(3){
			width:100%;
			margin:1em 0;
		}
		.add-review input[type="submit"]{
			outline: none;
			padding: 14px 0;
			background: <?=$dados_loja->corHex?>;
			border: none;
			width: 20%;
			font-size: 1em;
			color: #fff;
			font-weight: 700;
			letter-spacing: 2px;
		}
		.add-review input[type="submit"]:hover{
			background: #000;
		}
		.nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
			background-color: <?=$dados_loja->corHex?>;
			color:#fff;
		}
		.product-men.single {
			margin: 0;
		}
		.w3_agile_latest_arrivals {
			margin: 4em auto 0;
		}
		.responsive_tabs_agileits {
			margin-top: 3em;
		}
		.single_page_agile_its_w3ls {
			padding: 2em;
			border: 1px solid #ddd;
		}
		.single_page_agile_its_w3ls h6 {
			font-size: 1.2em;
			text-transform: uppercase;
			font-weight: 700;
			letter-spacing: 1px;
			color: #292929;
			margin-bottom:0.5em;
		}
		.single_page_agile_its_w3ls p {
			line-height: 2em;
		}
		p.w3ls_para {
			margin-top: 1em;
		}
		/*-- Ratings --*/
		.rating1 {
			direction:ltr;
		}
		.starRating:not(old) {
			display: inline-block;
			height: 18px;
			width:100px;
			overflow: hidden;
		}

		.starRating:not(old) > input{
			margin-right :-26%;
			opacity      : 0;
		}

		.starRating:not(old) > label {
			float: right;
			background: url(../images/1.png);
			background-size: contain;
			margin-right: 2px;
		}

		.starRating:not(old) > label:before{
			content         : '';
			display         : block;
			width           : 18px;
			height          : 18px;
			background      : url(../images/2.png);
			background-size : contain;
			opacity         : 0;
			transition      : opacity 0.2s linear;
		}

		.starRating:not(old) > label:hover:before,
		.starRating:not(old) > label:hover ~ label:before,
		.starRating:not(:hover) > :checked ~ label:before{
			opacity : 1;
		}
		/*-- //Ratings --*/
		/*-- //single-page --*/
		/*-- to-top --*/
		#toTop {
			display: none;
			text-decoration: none;
			position: fixed;
			bottom: 55px;
			right: 2%;
			overflow: hidden;
			z-index: 999;
			width: 32px;
			height: 32px;
			border: none;
			text-indent: 100%;
			background: url(../images/up_arrow.png) no-repeat 0px 0px;
		}
		#toTopHover {
			width: 32px;
			height: 32px;
			display: block;
			overflow: hidden;
			float: right;
			opacity: 0;
			-moz-opacity: 0;
			filter: alpha(opacity=0);
		}
		/*-- //to-top --*/
		/*-- responsive media queries --*/
		@media (max-width: 1440px){

			.multi-gd-img.multi-gd-text h4 {
				position: absolute;
				top: 47%;
				left: 30%;
				font-size: 2em;
			}
			.w3ls_schedule_bottom_right_grid {
				padding: 3em 2em;
				margin: 5em 0 0;
				width: 90%;
			}
			.logo_agile h1 a {
				letter-spacing: 1px;
				font-size: 1.4em;
			}
			i.fa.fa-shopping-bag.top_logo_agile_bag {
				position: absolute;
				font-size: 17px;
				top: 61px;
				right: 13px;
			}
		}
		@media (max-width: 1366px){
			.multi-gd-img.multi-gd-text h4 {
				position: absolute;
				top: 45%;
				left: 30%;
				font-size: 2em;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 4px 0px <?=$dados_loja->corHex?>;
				width: 15%;
			}
			.header-middle form input[type="search"] {
				width: 83%;
			}
		}
		@media (max-width: 1280px){
			.w3ls_schedule_bottom_right_grid {
				padding: 3em 2em;
				margin: 3em 0 0;
				width: 90%;
			}
			.page-head_agile_info_w3l h3 {
				font-size: 2.5em;
			}
			.agile_ab_w3ls_info h5 {
				font-size: 1.5em;
			}
			h3.wthree_text_info {
				font-size: 2.2em;
			}
			.w3layouts_mail_grid_left2 h3 {
				font-size: 0.8em;
			}
			.w3l_schedule_bottom_right_grid1 h4 {
				margin: 1em 0;
				font-size: 0.9em;
				letter-spacing: 2px;
			}
			.w3ls_schedule_bottom_right_grid {
				padding: 3em 2em;
				margin: 2.4em 0 0;
				width: 90%;
			}
			.multi-gd-img.multi-gd-text h4 {
				position: absolute;
				top: 49%;
				left: 30%;
				font-size: 1.6em;
			}
			.footer {
				padding: 3em 0;
			}
			.sale-w3ls h6 {
				font-size: 2.5em;
				letter-spacing:4px;
				padding-top: 3em;
				margin-bottom: 0.5em;
			}
			.wthree_banner_bottom_grid_three_left1.grid .grid figure p {
				letter-spacing: 10px;
				line-height: 2em;
				font-size: 0.9em;
			}
		}
		@media (max-width: 1080px){
			.header-bot_inner_wthreeinfo_header_mid {
				margin: 0 auto;
				width: 95%;
			}
			.box_1 h3 {
				font-size: 15px;
			}
			.new-gd-left {
				padding: 0;
			}
			.new-levis {
				padding: 45px 14px;
			}
			.mid-text a {
				padding: 5px 14px;
			}
			.wed-brand {
				left: 10%;
			}
			.wed-brand h4 {
				font-size: 20px;
			}
			.wed-brand h5 {
				font-size: 18px;
			}
			.new-levis {
				padding: 36px 14px;
			}
			.pignose-layerslider .slide-visual .script-wrap,.script-group img {
				width: 200px;
				height: 200px;
			}
			.pignose-layerslider .slide-visual {
				width: 1000px;
				height: 400px;
			}
			.men-thumb-item img {
				padding: 29px 20px 11px;
			}
			.product-men {
				padding: 0 10px;
			}
			.coupons-gd h3 {
				font-size: 19px;
			}
			.coupons-gd h4 {
				font-size: 14px;
				margin: 29px 0 14px;
			}
			.logo_agile h1 a {
				letter-spacing: 1px;
				font-size: 1.2em;
			}
			.men-wear-right p {
				font-size: 14px;
			}
			.css-treeview label {
				font-size: 14px;
			}
			.swit label {
				font-size: 14px;
			}
			.swit {
				padding: 20px 18px;
			}
			.community-poll h4,.css-treeview h4 {
				padding: 13px 0;
				font-size: 21px;
			}
			.sort-grid {
				padding: 25px 0;
			}
			.men-wear-right h4 {
				font-size: 1em;
			}
			.tree-list-pad {
				padding: 15px 24px;
			}
			.item-info-product h4 a {
				font-size: 0.8em;
			}
			.no-pad-men {
				padding: 0 18px 0 0 !important;
			}
			.electro-text h4 {
				font-size: 20px !important;
			}
			.electro-right {
				padding-right: 8px;
			}
			.page-head_agile_info_w3l h3 {
				font-size: 2.4em;
			}
			.map iframe {
				min-height: 325px;
			}
			.contact-form2 textarea {
				min-height: 170px;
			}
			.contact-form2 input[type="submit"] {
				width: 12%;
			}
			.description {
				margin: 1em 0;
			}
			.occasional {
				margin: 1em 0;
			}
			.single-right-left del {
				font-size: 17px;
			}
			.bootstrap-tab {
				margin: 4em 0 0;
			}
			.add-review input[type="text"], .add-review input[type="email"], .add-review textarea {
				width: 49.25%;
			}
			.wed-brandtwo p {
				font-size: 37px;
			}
			.close1, .close2, .close3, .close4 {
				right: 29px;
			}
			i.fa.fa-shopping-bag.top_logo_agile_bag {
				position: absolute;
				font-size: 17px;
				top: 52px;
				right: 10px;
			}
			.header-middle form input[type="search"] {
				width: 81%;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 4px 0px <?=$dados_loja->corHex?>;
				width: 17%;
			}
			.w3layouts_mail_grid_left {
				width: 50%;
				float: left;
			}
			.w3layouts_mail_grid_left:nth-child(1),.w3layouts_mail_grid_left:nth-child(2) {
				margin-bottom:1em;
			}
			.multi-gd-img.multi-gd-text h4 {
				position: absolute;
				top: 49%;
				left: 25%;
				font-size: 1.4em;
			}
			.navbar-nav > li {
				margin: 0 27px 0 0;
			}
			.top_nav_right {
				float: right;
				width: 21%;
				margin-top: 0.5em;
			}
			.carousel-caption h2, .carousel-caption h3 {
				font-size: 2.5em;
				letter-spacing: 12px;
			}
			.wthree_banner_bottom_grid_three_left1.grid figure.effect-roxy h3 {
				padding: 1em 0 .5em;
				font-size: 1.7em;
				color: #fff;
				text-transform: uppercase;
				letter-spacing: 5px;
			}
			.sign-gd h4, .sign-gd-two h4 {
				font-size: 1em;
			}
			.newsleft h3 {
				font-size: 20px;
			}
			p.copy-right {
				margin-top: 40px;
				font-size: 14px;
			}
			.address-grid h4, h4.white-w3ls {
				font-size: 1.6em;
			}
			.dropdown-menu.columns-3 {
				min-width: 560px;
				padding: 30px 30px;
			}
		}
		@media (max-width: 1050px){
			.add-review input[type="text"], .add-review input[type="email"], .add-review textarea {
				width: 48.85%;
			}
		}
		@media (max-width: 1024px){
			.header ul li,.section_room select,.header-middle input[type="search"] {
				font-size: 14px;
			}
			.header-right ul {
				margin-top: 15px;
			}
			.new_arrivals {
				padding: 70px 0;
			}
			.new_arrivals h3,.ele-bottom-grid h3 {
				font-size: 32px;
			}
			.content-img-right {
				padding: 55px 36px 0px;
				min-height: 219px;
			}
			.navbar-nav > li > a {
				padding: 27px 13px;
			}
			.section_room select {
				background-size: 6% !important;
			}
			.products-right h5,.filter-price h3 {
				font-size: 22px;
			}
			.css-treeview a {
				font-size: 14px;
			}
			.bootstrap-tab-text-grid-right p,.new_arrivals p {
				font-size: 14px;
			}
			.banner_bottom_agile_info{
				padding:4em 0;
			}
			.carousel-caption {
				min-height: 450px!important;
				padding-top:9em;
			}
			.social-nav li {
				margin: 0 2px;
			}
			.social-icons.team-icons.right-w3l.fotw33 .caption p {
				font-size: 12px;
				letter-spacing: 1px;
			}
			.carousel-caption p {
				letter-spacing: 11px;
				font-size: 1.1em;
				margin-top: 1em;
			}
			.page-head_agile_info_w3l h3{
				font-size: 2.3em;
			}
		}
		@media (max-width: 991px){
			.social-nav {
				padding: 0;
				list-style: none;
				display: inline-block;
				margin: 1.5em 0 0;
				float: none;
			}
			.header-left,.header-right {
				float: left;
				width: 31%;
			}
			.header-middle {
				margin-top:0px;
				width:100%;
			}
			.section_room {
				float: left;
				width: 48%;
			}
			.search {
				float: left;
				width: 35%;
			}
			.sear-sub {
				float: right;
				width: 17%;
			}
			.box_1 h3 {
				font-size: 13px;
			}
			.box_1 {
				padding: 7px 4px;
			}
			.new-gd-left,.new-gd-middle {
				float: left;
				width: 33.333%;
			}
			.mid-img {
				float: none;
				width: 52%;
				margin: 0% auto 9px;
			}
			.mid-img:nth-child(2){
				margin: 19px auto 0px;
			}
			.mid-text {
				float: none;
				width: 100%;
				margin: 0 0%;
				text-align: center;
			}
			.mid-text h4 span {
				display: inline-block;
			}
			.new-levis {
				padding: 15px 14px;
			}
			.mid-text h4 {
				font-size: 18px;
				margin-bottom: 10px;
			}
			.mid-text a {
				padding: 3px 9px;
			}
			.new-levis:nth-child(2) {
				margin-top: 17px;
			}
			.dropdown-menu.columns-3 {
				min-width: 500px;
				padding: 30px 30px;
			}
			ul.multi-column-dropdown li {
				line-height: 2.2em;
			}
			.wed-brand h4 {
				font-size: 15px;
			}
			.wed-brand h5 {
				font-size: 16px;
			}
			.wed-brand p a {
				padding: 6px 0px;
				font-size: 13px;
				width: 57%;
			}
			.wed-brandtwo {
				position: absolute;
				top: 36%;
				left: 10%;
			}
			.product-men {
				float: left;
				width: 33.333%;
				margin: 25px 0 0;
			}
			.resp-tabs-list {
				margin: 0 0 1em 0;
			}
			.coupons-gd {
				float: left;
				width: 33.333%;
				padding: 0 10px;
			}
			.coupons-gd:nth-child(1) {
				width: 100%;
				float: none;
				padding:0;
			}
			.coupons-gd h3 {
				margin: 0 0 30px;
			}
			.product-men.single {
				margin: 0;
				margin-bottom: 1em;
			}
			.footer-left {
				padding: 0;
			}
			.footer-left p {
				margin: 22px 0 0px;
			}
			.newsleft {
				padding: 0;
			}
			.newsright {
				padding: 0;
			}
			.sign-gd, .sign-gd-two {
				float: left;
				width: 33.333%;
				padding: 0 10px;
			}
			p.copy-right {
				margin-top: 39px;
			}
			.products-left {
				float: none;
				width: 100%;
				padding: 0;
			}
			.tree-list-pad {
				padding: 15px 20px;
			}
			.css-treeview{
				float: left;
				width: 49%;
			}
			.community-poll {
				float: right;
				width: 49%;
				margin-top: 0;
			}
			.products-right {
				padding-right: 0;
				padding: 0;
				float: none;
				width: 100%;
			}
			.check_box {
				margin-bottom: 13px;
			}
			.swit {
				padding: 34px 25px;
			}
			.products-right {
				margin-top: 38px;
			}
			.single-pro {
				margin-top: 0;
			}
			.no-pad-men {
				padding: 0 10px !important;
			}
			.electro-right{
				float: left;
				width: 32.3%;
				padding: 0;
			}
			.electro-left{
				float: left;
				width: 67.5%;
				padding-left: 0;
			}
			.ele-bottom-grid p {
				font-size: 14px;
				margin-bottom: 32px;
			}
			.contact-grid-agile-w3 {
				float: left;
				width: 33.333%;
				padding: 0 7px;
			}
			.contact-grid-agile-w3 h4 {
				font-size:1.2em;
				margin: 13px 0;
			}
			.contact-grid-agile-w32, .contact-grid-agile-w31, .contact-grid-agile-w33 {
				min-height: 216px;
				padding-top: 37px;
			}
			.close1, .close2, .close3, .close4 {
				right: 26px;
			}
			.timetable_sub th {
				font-size: 14px;
			}
			.timetable_sub td {
				font-size: 13px;
				padding: 1px;
			}
			.value-minus, .value-plus {
				height: 27px;
				line-height: 24px;
				width: 23px;
				margin-right: 0px;
			}
			.value {
				width: 25px;
				height: 27px;
				padding: 8px 0px;
				line-height: 9px;
				margin-right: 0px;
			}
			.checkout-left-basket {
				float: right;
				width: 36%;
			}
			.single-right-left:nth-child(1){
				float: left;
				width: 60%;
				padding:0 0 0px;
				margin-bottom: 50px;
			}
			.single-right-left{
				float: left;
				width: 100%;
				padding:0 0px;
			}
			.single-right-left h3 {
				font-size: 20px;
			}
			.description h5 {
				margin-bottom: 22px;
			}
			.description {
				margin: 1em 0 2em;
			}
			.occasional {
				margin: 1.5em 0;
			}
			.bootstrap-tab {
				margin: 3em 0 0;
			}
			.bootstrap-tab-text-grid-left img {
				width: 100%;
			}
			.colr {
				width: 24%;
				float: left;
			}
			.navbar-nav > li {
				margin: 0 3px 0 0;
			}
			.navbar-nav > li > a {
				padding: 21px 9px;
			}
			.wthree_banner_bottom_grid_three_left1.grid figure.effect-roxy h3 {
				padding: 0.5em 0 .5em;
				font-size: 1.1em;
			}
			.grid figure p {
				letter-spacing: 6px;
				font-size: 0.9em;
			}
			.w3ls_schedule_bottom_right_grid {
				padding: 3em 2em;
				width: 90%;
				margin: 2em auto;
			}
			.w3l_schedule_bottom_right_grid1 {
				text-align: center;
				padding: 0;
				margin-bottom: 1em;
			}
			.multi-gd-img.multi-gd-text h4 {
				position: absolute;
				top: 49%;
				left: 37%;
				font-size: 1.4em;
			}
			.sign-gd, .sign-gd-two {
				float: left;
				width: 50%;
				padding: 0;
				margin-top: 2em;
			}
			.footer-right {
				padding: 0;
			}

			.logo_agile {
				text-align: center;
				padding: 0;
				float: left;
			}
			.social-nav {
				padding: 0;
				list-style: none;
				display: inline-block;
				margin: 1.5em 0 0;
				float: right;
			}
			.ab_pic_w3ls {
				margin-bottom: 2em;
			}
			.team-grids {
				width: 50%;
				margin-bottom: 2em;
			}
			.header ul li, .section_room select, .header-middle input[type="search"] {
				font-size: 13px;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 19px 0px <?=$dados_loja->corHex?>;
				width: 9%;
			}
			.header-middle form input[type="search"] {
				width: 88%;
			}
			.header-bot {
				padding: 15px 0 30px 0;
			}
			.carousel-caption {
				min-height: 400px!important;
				padding-top: 7em;
			}
			.modal_body_right.modal_body_right1 img {
				margin-top: 1em;
			}
			.contact-grid-agile-w3 {
				float: left;
				width: 100%;
				padding: 0 7px;
			}
			.contact-grid-agile-w3:nth-child(2) {
				margin: 1% 0%;
			}
			.bb-grids.bb-left-agileits-w3layouts {
				margin-bottom: 1em;
			}
			.contact-form {
				padding: 4em 3em;
				margin-top: 2em;
			}
			.modal_body_left.modal_body_left1 {
				padding-left: 0;
				float: left;
				width: 70%;
			}
			.modal_body_right.modal_body_right1 {
				padding: 0;
				float: right;
				width: 30%;
			}
		}
		@media (max-width:900px){
			.newsleft {
				padding: 0;
				width: 100%;
				text-align: center;
				margin-bottom: 1em;
			}
			.newsright {
				padding: 0;
				width: 100%;
				text-align: center;
			}
			.dropdown-menu.columns-3 {
				min-width: 440px;
				padding: 20px 20px;
			}
		}
		@media (max-width: 800px){
			.pignose-layerslider .slide-visual .script-wrap {
				right: 300px;
			}
			.carousel-caption h2, .carousel-caption h3 {
				font-size: 2.3em;
				letter-spacing: 9px;
			}
			.carousel-caption p {
				letter-spacing: 10px;
				font-size: 1em;
				margin-top: 1em;
			}
			.info-content p {
				font-size: 21px;
			}
			.separator {
				margin: 10px auto;
			}
			.info-content h4 {
				font-size: 22px;
			}
			.info-content a {
				padding: 4px 7px;
				font-size: 14px;
			}
			.hvr-outline-out:before {
				border: <?=$dados_loja->corHex?> solid 2px;
			}
			.hvr-outline-out:hover:before, .hvr-outline-out:focus:before, .hvr-outline-out:active:before {
				top: -6px;
				right: -6px;
				bottom: -6px;
				left: -6px;
			}
			.resp-tab-item {
				margin: 0 13px;
				padding: 0 11px 14px 11px;
			}
			.sign-gd h4, .sign-gd-two h4 {
				font-size: 19px;
			}
			.men-wear-bottom {
				margin: 50px 0 17px;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 8px 0px <?=$dados_loja->corHex?>;
				width: 9%;
			}
		}
		@media (max-width: 768px){
			.pignose-layerslider .slide-visual {
				height: 400px;
			}
			ul.slide-group img {
				width: 100% !important;
				height: 400px !important;
			}
			.pignose-layerslider .slide-visual .script-wrap {
				top:50px;
			}
			.single-right-left:nth-child(1) {
				float: left;
				width: 67%;
			}
			.occasion-cart a {
				padding: 5px 11px;
				font-size: 14px;
			}
			.bootstrap-tab ul li a {
				font-size: 14px;
			}
			.nav-tabs > li > a {
				padding: 7px 13px;
			}
			.bootstrap-tab-text h5, .add-review h4 {
				margin: 2em 0 1em;
			}
			.bootstrap-tab-text p span {
				margin: 1em 0 0;
			}
			.add-review input[type="text"], .add-review input[type="email"], .add-review textarea {
				padding: 8px 10px;
				width: 49.35%;
				font-size: 14px;
			}
			.add-review textarea {
				min-height: 118px;
			}
			.add-review input[type="submit"] {
				width: 18%;
			}
			.checkout h3 {
				margin: 0 0 2em;
			}
			.navbar-nav > li > a {
				padding: 21px 9px;
			}
			.dropdown-menu.columns-3 {
				min-width: 411px;
				padding: 20px 20px;
			}
		}
		@media (max-width: 767px){
			.navbar-toggle {
				position: relative;
				float: left;
				padding: 12px 10px;
				margin-top: 9px;
				margin-right: 0px;
				margin-bottom: 8px;
				background-color: transparent;
				background-image: none;
				border: 1px solid transparent;
				border-radius: 0;
				margin-left:0px;
			}
			.header-left img {
				width: 100%;
			}
			.top_nav_right {
				float: right;
				width: 21%;
				margin-top: 0em;
			}
			.header-bot {
				padding: 17px 0;
			}
			.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
				background-color: <?=$dados_loja->corHex?>;
			}
			.navbar-default .navbar-toggle .icon-bar {
				background-color: #FFF;
			}
			.navbar-nav > li {
				margin: 0 0px 0 0;
				width: 100%;
				text-align: center;
			}
			.nav > li > a {
				display: inline-block;
			}
			.header-bot_inner_wthreeinfo_header_mid {
				margin: 0 auto;
				width: 96%;
			}
			ul.dropdown-menu.multi-column.columns-3 {
				border-top: 1px solid rgba(255, 255, 255, 0.09);
				border-bottom: 1px solid #fff;
				margin-top: 10px;
			}
			.navbar-default {
				width: 77%;
			}
			.navbar-default .navbar-collapse, .navbar-default .navbar-form {
				border: none;
			}
			.new-levis {
				padding: 12px 14px;
			}
			.footer {
				padding: 2em 0;
			}
			.newsleft {
				margin-bottom: 14px;
			}
			.page-head_agile_info_w3l {
				min-height: 166px;
				padding-top: 55px;
			}
			.page-head_agile_info_w3l h3 {
				font-size: 2em;
			}
			.radio {
				line-height: 25px;
			}
			.men-wear-left {
				float: left;
				width: 26%;
			}
			.men-wear-right {
				float: left;
				width: 74%;
			}
			.electro-text h4 {
				font-size: 17px !important;
			}
			.new_arrivals h3, .ele-bottom-grid h3 {
				font-size: 27px;
			}
			td.invert-image {
				width: 30%;
			}
			.add-review input[type="text"], .add-review input[type="email"], .add-review textarea {
				width: 100%;
			}
			.wed-brandtwo h4 {
				font-size: 19px;
			}
			.footer-bottom a span {
				width: 23%;
				left: 20px;
			}
			ul.nav.navbar-nav.menu__list {
				padding-bottom: 20px;
			}
			.close1, .close2, .close3, .close4 {
				right: 36px;
			}
			.add-review input[type="email"] {
				margin-left: 0;
				margin: 1em 0 0 0;
			}
			ul.multi-column-dropdown li a {
				color: #fff;
			}
			.multi-gd-img.multi-gd-text {
				margin: 1em 0;
			}
			ul.dropdown-menu.agile_short_dropdown li {
				border: none !important;
				background: #fff;
				color: #fff;
			}
			.navbar-default .navbar-nav .open .dropdown-menu > li > a {
				color: #000;
				border-bottom: 1px solid #999;
			}
		}
		@media (max-width: 667px){
			.section_room select {
				padding: 8px 10px;
			}
			.header-middle input[type="search"] {
				padding: 8px 10px;
			}
			.top_nav_right {
				float: right;
				width: 23%;
			}
			.pignose-layerslider .slide-visual .script-wrap {
				left:350px;
			}
			.pignose-layerslider .slide-visual .script-wrap, .script-group img {
				width: 150px;
				height: 150px;
			}
			.pignose-layerslider .slide-visual {
				height: 350px;
			}
			ul.slide-group img {
				width: 100% !important;
				height: 350px !important;
			}
			.pignose-layerslider .slide-visual .script-wrap {
				top: 75px;
			}
			.dropdown-menu {
				border-radius: 0;
			}
			.dropdown-menu.columns-3 {
				min-width: 474px;
			}
			.row {
				margin-right: 0;
				margin-left: 0;
			}
			.dropdown-menu.columns-3 {
				padding: 19px 16px;
			}
			ul.multi-column-dropdown li {
				line-height: 2em;
			}
			.new-gd-left {
				float: none;
				width: 51%;
				margin: 0 auto;
			}
			.wed-brand h4 {
				font-size: 20px;
			}
			.wed-brand h5 {
				font-size: 20px;
			}
			.wed-brand p {
				font-size: 18px !important;
			}
			.hvr-outline-out:hover:before, .hvr-outline-out:focus:before, .hvr-outline-out:active:before {
				top: -8px;
				right: -8px;
				bottom: -8px;
				left: -8px;
			}
			.hvr-outline-out:before {

				border: #000000 solid 2px;
			}
			.new-gd-middle {
				width: 100%;
			}
			.new-levis {
				float: left;
				width: 49%;
			}
			.new-levis:nth-child(2) {
				margin-top: 0;
				float: right;
			}
			.mid-img:nth-child(2) {
				margin: 28px auto 0px;
			}
			.new-gd-middle {
				width: 100%;
				margin: 30px 0;
			}
			.wed-brandtwo {
				top: 61%;
				left: 19%;
			}
			.content-lgrid {
				width: 100%;
			}
			.logo_agile h1 a {
				letter-spacing: 1px;
				font-size: 1em;
			}
			.product-easy {
				padding: 70px 0;
			}
			.men-thumb-item:hover .inner-men-cart-pro .link-product-add-cart {
				top: 80.5%;
			}
			.coupons-gd span {
				padding: 18px 18px;
				font-size: 20px;
			}
			.coupons-gd h4 {
				font-size: 13px;
			}
			.coupons {
				min-height: 377px;
			}
			.item-info-product h4 a {
				font-size: 15px;
			}
			td.invert-image {
				width: 27%;
			}
			.checkout-left-basket ul {
				padding: 0px 15px;
			}
			.checkout-left-basket h4 {
				padding: .5em;
				font-size: 1em;
				margin: 0 0 1em;
			}
			.header ul li {
				display: inline-block;
				width: 49%;
			}
			.men-wear-right p {
				line-height: 2em;
			}
			.men-wear-right p {
				font-size: 13px;
			}
			.men-wear-right h4 {
				font-size: 20px;
				margin: 0px 0 21px;
			}
			.contact-grid-agile-w3 i {
				font-size: 25px;
			}
			.contact-grid-agile-w3 p {
				font-size: 13px;
			}
			.contact-grid-agile-w32, .contact-grid-agile-w31, .contact-grid-agile-w33 {
				min-height: 179px;
				padding-top: 24px;
			}
			i.fa.fa-shopping-bag.top_logo_agile_bag {
				position: absolute;
				font-size: 17px;
				top: 43px;
				right: 7px;
			}
			.footer-bottom a span {
				font-size: .8em;
			}
			.footer-bottom a span {
				left: 4px;
			}
			.header-middle form input[type="search"] {
				width: 86%;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 8px 0px <?=$dados_loja->corHex?>;
				width: 10%;
			}
			.wthree_banner_bottom_grid_three_left1 {
				width: 100%;
				float: left;
			}
			.wthree_banner_bottom_grid_three_left1:nth-child(2) {
				margin-top:1em;
			}
			.wthree_banner_bottom_grid_three_left1.grid figure.effect-roxy h3 {
				padding: 3.5em 0 .5em;
				font-size: 1.1em;
			}
			.multi-gd-img.multi-gd-text h4 {
				position: absolute;
				top: 49%;
				left: 28%;
				font-size: 1.4em;
			}
			.product-men {
				float: left;
				width: 50%;
				margin: 25px 0 0;
			}
			ul.w3_short {
				text-align: left;
				padding-top: 2em;
			}
			.sale-w3ls h6 {
				font-size:1.8em;
				letter-spacing: 4px;
				padding-top: 3em;
				margin-bottom: 0.5em;
			}
			.sale-w3ls {
				min-height: 320px;
			}
			.sale-w3ls {
				min-height: 320px;
			}
			.w3layouts_mail_grid_left2 h3 {
				font-size: 0.9em;
			}
			.w3layouts_mail_grid_left:nth-child(1), .w3layouts_mail_grid_left:nth-child(2) {
				margin-bottom:1em;
			}
			.w3layouts_mail_grid_left {
				width: 100%;
				float: left;
				margin-bottom: 1em;
			}
			.banner_bottom_agile_info {
				padding: 3em 0;
			}
			.coupons,.banner-bootom-w3-agileits,.new_arrivals_agile_w3ls_info {
				padding: 3em 0;
			}
			h3.wthree_text_info {
				font-size: 2em;
				margin-bottom: 0.8em;
			}
			#PPMiniCart form {
				width: 484px !important;
				padding: 10px 20px 40px !important;
				max-height: 450px !important;
			}
		}
		@media (max-width: 640px){
			.pignose-layerslider .slide-visual .script-wrap .slide-controller a {
				margin: 0 10px;
			}
			.pignose-layerslider .slide-visual .script-wrap .slide-pagination {
				bottom: -28px;
			}
			.pignose-layerslider .slide-visual .script-wrap .slide-controller {
				bottom: 61px;
			}
			.pignose-layerslider .slide-visual .script-wrap {
				left:380px;
			}
			.coupons-gd {
				padding: 0 8px;
			}
			a.menu__link {
				font-size: 13px;
			}
			ul.multi-column-dropdown li a {
				font-size: 13px;
			}
			.info-product-price span {
				font-size: 0.9em;
			}
			.info-product-price del {
				margin-left: 10px;
				font-size: 0.9em;
			}
			td.invert-image {
				width: 26%;
			}
			.description h5 {
				font-size: 13px;
			}
			.bootstrap-tab-text-grid-right {
				float: right;
				width: 78%;
			}
			.bootstrap-tab-text-grid-left {
				float: left;
				width: 19%;
			}
			.add-review input[type="submit"] {
				width: 14%;
			}

			.footer-bottom a span {
				left: 25px;
			}
			.footer-bottom a span:before {
				bottom: -3px;
				left: 18px;
			}
			.box_1 h3 {
				font-size: 12px;
			}
			.close1, .close2, .close3, .close4 {
				right: 33px;
			}
			.carousel-caption h2, .carousel-caption h3 {
				font-size: 2em;
				letter-spacing: 6px;
			}

		}
		@media (max-width: 600px){
			.top_nav_right {
				width: 30%;
			}
			.navbar-default {
				width: 69%;
			}
			.page-head_agile_info_w3l h3 {
				font-size: 1.6em;
			}
			.page-head_agile_info_w3l {
				min-height: 143px;
			}
			.css-treeview label {
				font-size: 13px;
			}
			.swit label {
				font-size: 13px;
			}
			.swit {
				padding: 26px 25px;
			}
			.products-right h5, .filter-price h3 {
				font-size: 19px;
			}
			.sorting h6 {
				margin: 7px 18px 0 0;
			}
			.sort-grid {
				padding: 12px 0;
			}
			.men-wear-left {
				float: left;
				width: 32%;
			}
			.men-wear-right {
				float: left;
				width: 68%;
				padding: 0;
			}
			.men-wear-right h4 {
				margin: 0px 0 10px;
			}
			.no-pad-men {
				padding: 0 5px !important;
			}
			.item-info-product h4 a {
				font-size: 19px;
			}
			.pignose-layerslider .slide-visual .script-wrap {
				left:340px;
			}
			.new_arrivals {
				padding: 50px 0;
			}
			.coupons-gd {
				float: none;
				width: 64%;
				padding: 0;
				margin: 0 auto;
			}
			.coupons-gd:nth-child(3) {
				margin: 30px auto;
			}
			.coupons-gd h4 {
				font-size: 16px;
			}
			.dropdown-menu.columns-3 {
				min-width: 367px;
			}
			.item-info-product h4 a {
				font-size: 14px;
			}
			.product-men {
				margin: 18px 0 0;
			}
			.value {
				width: 37px;
				height: 35px;
				padding: 8px 0px;
				line-height: 16px;
				margin: 0px 0;
			}
			.value-minus, .value-plus {
				height: 37px;
				line-height: 33px;
				width: 37px;
				margin: 3px 0 4px;
			}
			td.invert-image a img {
				width: 65%;
				margin: 0 auto;
			}
			.single-right-left:nth-child(1) {
				margin-bottom: 35px;
			}
			.single-right-left:nth-child(1) {
				float: left;
				width: 78%;
			}
			h1.t-button, h2.t-button, h3.t-button, h4.t-button, h5.t-button {
				font-size: 18px;
			}
			.contact-grid-agile-w3 {
				padding: 0 3px;
			}
			.quantity-select {
				padding: 0 9px;
			}
			.footer-bottom a span {
				width: 17%;
			}
			.footer-bottom a span {
				bottom: 43px;
				left: 81px;
			}
			.value-minus, .value-plus {
				margin: 0px 0 0px;
			}
			.value {
				width: 37px;
				height: 37px;
			}
			.close1, .close2, .close3, .close4 {
				right: 21px;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 8px 0px <?=$dados_loja->corHex?>;
				width: 11%;
			}
			.sign-gd, .sign-gd-two {
				float: left;
				width: 100%;
				padding: 0;
				margin-top: 2em;
			}
			.callbacks_tabs {
				top: 69%;
				left: 3.5%;
			}
			.occasion-cart {
				width: 37%;
			}
			.add-review input[type="submit"] {
				width: 32%;
			}
		}
		@media (max-width: 568px){
			.quantity-select {
				padding: 0 0px;
			}
			.w3ls_schedule_bottom_right_grid h3 {
				font-size: 1.2em;
				letter-spacing: 1px;
			}
			.w3l_schedule_bottom_right_grid1 h5 {
				font-size: 1.6em;
			}
			.bootstrap-tab-text-grid-right {
				float: none;
				width: 100%;
			}
		}
		@media (max-width: 480px){
			.timetable_sub th, .timetable_sub td {
			}
			td.invert-image a img {
				width: 50%;
			}
			tr.rem1,tr.rem2,tr.rem3,tr.rem4 {
				padding-top: 2em;
				border-top:none;
			}
			.close1, .close2, .close3 {
				right: 190px;
				top: -4px;
			}
			.quantity-select .entry.value-plus:after {
				margin-top: -5px;
			}
			.quantity-select .entry.value-minus:before, .quantity-select .entry.value-plus:before {
				margin-left: -3px;
			}
			td.invert-image a img {
				width: 100%;
			}

			.value-minus, .value-plus {
				margin: 0;
			}
			.quantity-select .entry.value-minus:before, .quantity-select .entry.value-plus:before {
				left: 41%;
			}
			.value {
				width: 37px;
				height: 37px;
			}
			.close1, .close2, .close3,.close4 {
				right: 64px;
				top: -26px;
			}
			.checkout-left-basket {
				float: right;
				width: 51%;
			}
			.pignose-layerslider .slide-visual .script-wrap {
				left:250px;
			}
			.wed-brand {
				left: 6%;
			}
			.mid-img:nth-child(2) {
				margin: 22px auto 0px;
			}
			.wed-brandtwo {
				top: 61%;
				left: 13%;
			}
			.flickr-post ul li {
				margin: 0% 0% 3%;
				width: 21%;
			}
			.sign-gd-two {
				width: 100%;
				margin: 20px 0;
			}
			.dropdown-menu.columns-3 {
				min-width: 316px;
			}
			.multi-gd-img1 {
				width: 100%;
			}
			.top_nav_right {
				width: 31%;
			}
			.wed-brandtwo {
				top: 46%;
			}
			.flickr-post ul li {
				margin: 0% 0% 3%;
				width: 19%;
			}
			.css-treeview {
				float: none;
				width: 99%;
				margin: 0 auto 30px;
			}
			.community-poll {
				float: none;
				width:99%;
				margin: 0 auto;
			}
			.community-poll h4, .css-treeview h4 {
				padding: 13px 0;
				font-size: 16px;
			}
			.sorting {
				float: left;
				width: 100%;
				margin-top: 0.5em;
			}
			.sorting select {
				padding: 4px 2px;
			}
			.men-wear-left {
				float: none;
				width: 46%;
				margin: 0 auto;
			}
			.men-wear-right {
				float: none;
				width: 100%;
				padding: 0;
				text-align: center;
				margin-top: 30px;
			}
			.no-pad-men {
				padding: 0 0px !important;
			}
			.text-right {
				text-align: center;
			}
			.pagination {
				margin: 34px 0px 0 0;
			}
			.single-right-left:nth-child(1) {
				float: left;
				width: 100%;
			}
			.imagezoom-cursor ,.imagezoom-view{
				display: none;
			}
			.men-wear-right h4 {
				font-size: 16px;
			}
			.radio {
				padding-left: 22px;
				font-size: 0.8em;
			}
			.colr {
				width: 33%;
				float: left;
			}
			.add-review input[type="submit"] {
				padding: 6px 0;
			}
			.footer-bottom a span {
				width: 23%;
			}
			.coupons-gd {
				width: 79%;
			}
			.navbar-default {
				width: 65%;
			}
			.dropdown-menu.columns-3 {
				min-width: 300px;
			}
			.timetable_sub th {
				font-size: 12px;
			}
			.timetable_sub td {
				font-size: 12px;
			}
			.close1, .close2, .close3, .close4 {
				right: 21px;
				top: -12px;
			}
			.value-minus, .value-plus {
				height: 25px;
				width: 25px;
			}
			.quantity-select .entry.value-plus:after {
				left: 56%;
				top: 47%;
			}
			.value {
				line-height: 8px;
				width: 25px;
				height: 25px;
			}
			.close1, .close2, .close3, .close4 {
				right: 17px;
			}
			td.invert-image a img {
				width: 82%;
			}
			.close1, .close2, .close3, .close4 {
				right: 9px;
			}
			.social-nav {
				margin: 1.5em 0 0;
				float: none;
				text-align: center;
				width: 100%;
			}
			.logo_agile {
				margin-top: 1em;
				padding: 0;
				text-align: center;
				float: none;
			}
			.header-middle form input[type="search"] {
				width: 83%;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 8px 0px <?=$dados_loja->corHex?>;
				width: 14%;
			}
			.carousel-caption p {
				letter-spacing: 7px;
				font-size: 0.9em;
				margin-top: 0.7em;
			}
			.carousel-caption {
				min-height: 350px!important;
				padding-top: 6em;
			}
			.carousel-caption h2, .carousel-caption h3 {
				font-size: 1.8em;
				letter-spacing: 5px;
			}
			.wthree_banner_bottom_grid_three_left1.grid figure.effect-roxy h3 {
				padding: 1em 0 .5em;
				font-size: 1em;
			}
			.bb-middle-agileits-w3layouts.forth.grid figure.effect-roxy h3{
				padding: 0.5em 0 .5em;
				font-size: 1.2em;
				color: #fff;
				text-transform: uppercase;
				letter-spacing: 5px;
			}
			.multi-gd-img.multi-gd-text h4 {
				position: absolute;
				top: 49%;
				left: 23%;
				font-size: 1.2em;
			}
			.sale-w3ls h6 {
				font-size: 1.6em;
				letter-spacing: 3px;
				padding-top: 4em;
				margin-bottom: 0.5em;
			}
			.sale-w3ls {
				min-height: 292px;
			}
			p.copy-right {
				margin-top: 24px;
				line-height: 1.9em;
			}
			.footer_agile_inner_info_w3l {
				width: 95%;
				margin: 0 auto;
			}
			.agile_newsletter_footer {
				padding: 1em 0;
				margin-top: 1em;
			}
			.coupons, .banner-bootom-w3-agileits, .new_arrivals_agile_w3ls_info {
				padding: 2em 0;
			}
			h3.wthree_text_info {
				font-size: 1.8em;
				margin-bottom: 0.6em;
			}
			.sale-w3ls a {
				padding: 8px 20px;
				margin-top: 1em;
			}
			.sale-w3ls {
				min-height: 234px;
			}
			.sale-w3ls h6 {
				font-size: 1.6em;
				letter-spacing: 2px;
				padding-top: 2em;
				margin-bottom: 0.5em;
			}
			.banner_bottom_agile_info {
				padding: 2em 0;
			}
			ul.w3_short li {
				font-size: 0.8em;
			}
			.bootstrap-tab-text-grid-left {
				float: none;
				width: 50%;
				margin-bottom: 1em;
			}
			.add-review input[type="submit"] {
				width: 38%;
			}
			#PPMiniCart form {
				width: 432px !important;
				padding: 10px 20px 40px !important;
			}
			.occasion-cart {
				width: 50%;
			}
			.single_page_agile_its_w3ls h6 {
				font-size: 0.9em;
			}
			.page-head_agile_info_w3l {
				min-height: 143px;
				padding-top: 33px;
			}
		}
		@media (max-width:440px){
			.product-men {
				float: left;
				width: 100%;
			}
			.carousel-caption {
				min-height: 289px!important;
				padding-top: 4em;
			}
			.carousel-caption a {
				padding: 8px 20px;
				margin-top: 1em;
			}
			.carousel-caption h2, .carousel-caption h3 {
				font-size: 1.6em;
				letter-spacing:4px;
			}
			.w3ls_schedule_bottom_right_grid {
				padding: 2em 1em;
				width: 90%;
				margin: 2em auto;
			}
			h3.wthree_text_info {
				font-size: 1.5em;
				margin-bottom: 0.7em;
			}
			.newsright input[type="email"] {
				width:70%;
				padding: 10px 10px;
				font-size: 14px;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 5px 0px <?=$dados_loja->corHex?>;
				width: 15%;
				height: 48px;
			}
			.bb-middle-agileits-w3layouts.forth.grid figure.effect-roxy h3 {
				padding: 0em 0 .5em;
			}
			.wthree_banner_bottom_grid_three_left1.grid figure.effect-roxy h3 {
				padding: 0.5em 0 .5em;
				font-size: 1em;
			}
			.grid figure p {
				letter-spacing: 5px;
				font-size: 0.8em;
			}
			.w3ls_schedule_bottom_right_grid h3 {
				font-size: 1em;
				letter-spacing: 1px;
			}
			.newsleft h3 {
				font-size: 17px;
				letter-spacing: 2px;
			}
			.bb-middle-agileits-w3layouts.grid figure.effect-roxy h3{
				padding: 0.5em 0 .5em;
				font-size: 1.2em;
			}
			.agile_ab_w3ls_info h5 {
				font-size: 1.2em;
				letter-spacing: 1px;
			}
			.agile_ab_w3ls_info {
				margin-bottom: 2em;
			}
			#PPMiniCart form {
				width: 420px !important;
				padding: 10px 10px 20px !important;
			}
			#PPMiniCart {
				left: 48% !important;
			}
			.modal_body_left.modal_body_left1 {
				padding-left: 0;
				float: left;
				width: 100%;
			}
			.modal_body_right.modal_body_right1 {
				padding: 0;
				float: right;
				width: 100%;
			}
			.modal_body_right.modal_body_right1 img {
				width: 33%;
			}
		}
		@media (max-width:414px){
			.newsright input[type="email"] {
				width:70%;
				padding: 10px 10px;
				font-size: 14px;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 5px 0px <?=$dados_loja->corHex?>;
				width: 15%;
				height: 48px;
			}
			.header ul li i {
				margin-right: 2px;
				top: 2px;
			}
			.page-head_agile_info_w3l h3 {
				font-size: 1.5em;
			}
			.mail-agileits-w3layouts {
				margin-top: 2em;
			}
			.contact-right {
				padding-left: 1em;
				float: left;
				width: 60%;
			}
			.contact-form {
				padding: 3em 2em;
				margin-top: 2em;
			}
			.address-grid h4, h4.white-w3ls {
				font-size: 1.4em;
			}
			.single-right-left h3 {
				font-size: 18px;
			}
			#PPMiniCart form {
				width: 385px !important;
				padding: 10px 10px 20px !important;
			}
			#PPMiniCart {
				left: 52% !important;
			}
		}
		@media (max-width: 384px){
			figure.effect-roxy figcaption {
				padding: 2em 3em;
			}
			.multi-gd-img.multi-gd-text h4 {
				top: 49%;
				left: 24%;
				font-size: 1.1em;
				letter-spacing: 6px;
			}
			.sale-w3ls h6 {
				font-size: 1.4em;
				letter-spacing: 2px;
				padding-top: 2em;
				margin-bottom: 0.5em;
				line-height: 1.6em;
			}
			.carousel-caption h2, .carousel-caption h3 {
				font-size: 1.4em;
				letter-spacing: 2px;
			}
			.carousel-caption p {
				letter-spacing: 4px;
				font-size: 0.8em;
				margin-top: 0.7em;
			}
			.carousel-caption {
				min-height: 270px!important;
				padding-top: 4em;
			}
			.carousel-indicators {
				bottom: 2%;
			}
			.wthree_banner_bottom_grid_three_left1.grid figure.effect-roxy h3 {
				padding: 1.2em 0 .5em;
				font-size: 1em;
			}
			.contact-grid-agile-w3 h4 {
				font-size:1em;
				margin: 10px 0;
			}
			figure.effect-roxy figcaption::before {
				position: absolute;
				top: 10px;
				right: 10px;
				bottom: 10px;
				left: 10px;
			}
			.logo_agile span {
				padding: 0 13px;
			}
			.agile_ab_w3ls_info p {
				margin: 1em 0 0em;
			}
			.team-grids {
				width: 50%;
				float: left;
				margin-bottom: 1em;
			}
			.bb-grids.bb-left-agileits-w3layouts {
				margin-bottom: 1em;
				padding: 0;
			}
			.bb-grids.bb-middle-agileits-w3layouts {
				padding: 0;
			}
			.wthree_banner_bottom_grid_three_left1 {
				width: 100%;
				float: left;
				padding: 0;
			}
			#PPMiniCart form {
				width: 353px !important;
				padding: 10px 10px 20px !important;
			}
			#PPMiniCart {
				left: 56% !important;
			}
		}
		@media (max-width: 375px){
			.wed-brandtwo {
				top: 42%;
				left: 16%;
			}
			.footer-bottom a span {
				left: 74px;
			}
			.flex-viewport {
				width: 100%;
			}
			.flex-control-nav {
				float:none;
				width: 100%;
			}
			.flex-control-thumbs li:nth-child(4), .flex-control-thumbs li:nth-child(1) {
				margin: 0;
			}
			.pagination-lg > li > a, .pagination-lg > li > span {
				padding: 10px 10px;
			}
			.table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
				padding: 11px!important;
			}
			.value {
				line-height: 22px;
				width: 33px;
				height: 33px;
				margin: 5px 13px;
			}
			.value-minus, .value-plus {
				height: 33px;
				width: 33px;
			}
			.timetable_sub td {
				width: 21%;
			}
			.value-minus, .value-plus {
				margin: 3px 0;
			}
			.close1, .close2, .close3, .close4 {
				right: 18px;
			}
			.header-left {
				width: 46%;
			}
			.timetable_sub th {
				font-size: 13px;
			}
			.newsright input[type="email"] {
				width: 65%;
				padding: 10px 10px;
				font-size: 14px;
			}
			.logo_agile h1 a {
				letter-spacing: 1px;
				font-size: 0.9em;
			}
			i.fa.fa-shopping-bag.top_logo_agile_bag {
				position: absolute;
				font-size: 17px;
				top: 40px;
				right: 5px;
			}
			.header-middle form input[type="search"] {
				width: 79%;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 7px 0px <?=$dados_loja->corHex?>;
				width: 18%;
				height: 48px;
			}
			li.share {
				font-size: 0.9em;
			}
			figure.effect-roxy figcaption {
				padding: 2em 2em;
			}
			.w3layouts_mail_grid {
				padding: 0 0em;
			}
			.w3layouts_mail_grid_left1 {
				float: left;
				width: 60px;
				height: 60px;
			}
			.w3layouts_mail_grid_left1 i {
				font-size: 1.3em;
				line-height: 3em;
			}
			.sign-gd, .sign-gd-two {
				float: left;
				width: 100%;
				padding: 0;
				margin-top: 1em;
			}
			.page-head_agile_info_w3l h3 {
				font-size: 1.3em;
			}
			.mail-agileits-w3layouts i {
				font-size: 18px;
				float: left;
				width: 60px;
				height: 60px;
				line-height: 54px;
			}
			.contact-right p {
				font-size: 0.9em;
				letter-spacing: 1px;
				margin-bottom: 0.3em;
			}
			#PPMiniCart form {
				width: 343px !important;
				padding: 10px 10px 20px !important;
			}
			#PPMiniCart {
				left: 58% !important;
			}
		}
		@media (max-width: 320px){
			.header ul li {
				display: inline-block;
				width: 100%;
			}
			.header-middle form input[type="search"] {
				width:80%;
				padding: 10px 10px;
				font-size: 14px;
			}
			.header-middle form input[type="submit"] {
				background: url(../images/search.png) no-repeat 0px 0px <?=$dados_loja->corHex?>;
				width: 17%;
				height: 44px;
			}
			.carousel-caption h2, .carousel-caption h3 {
				font-size: 1.3em;
				letter-spacing: 2px;
			}
			.w3ls_schedule_bottom_right_grid h3 {
				font-size: 1em;
				letter-spacing: 1px;
				line-height: 1.8em;
			}
			h3.wthree_text_info {
				font-size: 1.4em;
				margin-bottom: 0.7em;
				letter-spacing: 1px;
			}
			.men-wear-right h4 {
				font-size: 16px;
				line-height: 1.6em;
			}
			.w3layouts_mail_grid_left {
				padding: 0 9px;
			}
			.w3layouts_mail_grid_left2 h3 {
				font-size: 0.8em;
			}
			.newsright input[type="email"] {
				width: 62%;
				padding: 10px 10px;
				font-size: 14px;
				letter-spacing: 1px;
			}
			.agile_ab_w3ls_info h5 {
				font-size: 1.2em;
				letter-spacing: 1px;
				line-height: 1.5em;
			}
			.carousel-caption a {
				padding: 8px 14px;
				margin-top: 1em;
				letter-spacing: 2px;
				font-size: 0.8em;
			}
			.carousel-caption {
				min-height: 250px!important;
				padding-top: 4em;
			}
			.multi-gd-img.multi-gd-text h4 {
				top: 47%;
				left: 24%;
				font-size: 1em;
				letter-spacing: 4px;
			}
			#PPMiniCart form {
				width: 290px !important;
				padding: 10px 10px 20px !important;
			}
			#PPMiniCart {
				left: 68% !important;
			}




		}

		.embossedTxt h1{
			font-family: 'Luckiest Guy', cursive;
			font-size:50px;
			font-weight: 400;
			color: <?=$dados_loja->corHex?>;
			opacity: 1;
			text-shadow: -1px -1px 1px #fff, 1px 1px 1px #000 ;

		}
		/*-- //responsive media queries --*/

	</style>

	<style>
		.resp-tab-active {
			border-bottom: 4px solid <?=$dados_loja->corHex?>;
			margin-bottom: -1px !important;
			position:relative;
			background:<?=$dados_loja->corHex?>;
		}

		.resp-tab-active:before {
			content: '';
			position: absolute;
			width: 0;
			height: 0;
			border-top: 10px solid <?=$dados_loja->corHex?>;
			border-left: 10px solid rgba(69, 42, 21, 0);
			border-right: 10px solid rgba(199, 57, 57, 0);
			left: 45%;
			top: 103%;
			transition: 0.5s all;
			-webkit-transition: 0.5s all;
			-o-transition: 0.5s all;
			-moz-transition: 0.5s all;
			-ms-transition: 0.5s all;
		}

		.resp-tab-active {
			background-color:<?=$dados_loja->corHex?>;
		}

		h2.resp-tab-active {
			background: <?=$dados_loja->corHex?> !important;
		}
	</style>



	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/menuLateralPrincipal.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/scrollBar.css') ?>">








		<div class="gNav-mask" aria-hidden="true" tabindex="-1" onclick="gNavClose();"></div>

		<div id="gNav-beforeE" tabindex="-1" onfocus="chgFocus('.gNav-closeBtn');"></div>
		<div class="gNav" id="menuList-C">

			<nav>
				<ul aria-label="Global navigation menu" class="ls--n">
					<li>
						<button style="color: black" onclick="gNavClose();"><i class="fa fa-arrow-right fa-2x"></i></button>
						<p href="/" class="gNav-link1 m0 text-center" style="color: white">Lista de marcas</p>
						<ul aria-label="Home submenu" class="ls--n">

							<?php foreach ($marcas as $marca): ?>
								<li class="lh--1"><a style="color: white" href="<?= base_url("marca/") . $marca->meta_link?>" class="gNav-link2" style="font-size: 20px"><?= $marca->nome_marca?></a></li><br>
							<?php endforeach; ?>
						</ul>
					</li>

				</ul>
			</nav>
		</div>
		<div id="gNav-afterE" tabindex="-1" onfocus="chgFocus('.searchCharaInput');"></div>



	<div id="carregando" class="center">

		<div class="example">
			<div class="sk-chase">
				<div class="sk-chase-dot"></div>
				<div class="sk-chase-dot"></div>
				<div class="sk-chase-dot"></div>
				<div class="sk-chase-dot"></div>
				<div class="sk-chase-dot"></div>
				<div class="sk-chase-dot"></div>
			</div>
		</div>

		<!--<img src="http://goo.gl/prjII7" width="150" height="70" />-->
	</div>



</head>
<body>

<a href="#" id="scroll" style="display: none;"><span></span></a>
<div class='thetop'></div>

<div id="conteudo-loading">

	<!-- header -->
	<div class="header" id="home">
		<div class="container">
			<ul>
				<?php if(!$logado): ?>
					<li> <a href="<?= base_url('entrarCliente') ?>"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i> Entrar </a></li>
					<li> <a href="<?= base_url('cadastrarCliente') ?>" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> Cadastrar </a></li>
				<?php endif; ?>
					<li><i class="fa fa-phone " aria-hidden="true"></i> Telefone : <?= $dados_loja->telefone ?></li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a style="font-size: 11px"><?=$dados_loja->email?></a></li>
				<?php if($clienteLogado): ?>
					<li> <a href="<?= base_url('pedidosRealizados') ?>"><i class="fa fa-truck fa-2x" aria-hidden="true"></i> Meus pedidos </a></li>

				<li> <a href="<?= base_url('sairCliente') ?>"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i> Sair </a></li>
				<?php elseif($adminLogado): ?>
					<li> <a href="<?= base_url('dashboard') ?>"><img style="height: 35px" src="<?=base_url("loja/images/dashboard.png")?>" >    Painel Administrativo </a></li>
					<li> <a href="<?= base_url('sairAdm') ?>"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i> Sair </a></li>

				<?php endif; ?>
			</ul>

		</div>
	</div>
	<!-- //header -->
	<!-- header-bot -->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<div class="col-md-4 header-middle">
				<form action="<?= base_url("busca/p") ?>" method="post">
					<input type="search" name="query_busca" placeholder="Buscar" required="">
					<button style="height: 48px; width: 48px; border-color: <?=$dados_loja->corHex?>; background-color: <?=$dados_loja->corHex?>" type="submit" value="" class="fa fa-search"></button>
					<div class="clearfix"></div>
				</form>
			</div>
			<!-- header-bot -->
			<br>
			<div class="col-md-4 logo_agile">
					<!--<h1><a href="< ?= base_url("") ?>"><span>N</span>ome Loja <i class="fa fa-shopping-bag top_logo_agile_code" aria-hidden="true"></i></a></h1>-->
					<a href="<?=base_url("")?>"><img href="<?=base_url("")?>" style="width: <?=$tamanhoLogoLoja?>px;" src="<?=base_url("loja/images/bannersHome/" . $logoLoja[0]->foto)?>">
						<br>

					</a>
				<br><br>
			</div>
			<!-- header-bot -->
			<div class="col-md-4 agileits-social top_content">
				<ul class="social-nav model-3d-0 footer-social w3_agile_social">
					<li style="color: white; font-size: 12px" class="share">Compartilhar: </li>
					<li><a class="whatsapp" href='https://api.whatsapp.com/send?&text=https%3A%2F%2F<?=str_replace(["https://", "/"], "", base_url("") )?>%2F' target="_blank">
							<div class="front"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a></li>

					<li><a class="facebook" href='https://www.facebook.com/sharer/sharer.php?u=<?= base_url("")?>' target="_blank">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
					<!--<li><a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>-->
					<li><a class="instagram" href='<?=$dados_loja->linkInstagram?>' target="_blank">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
					<!--<li><a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>-->
				</ul>



			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //header-bot -->
	<!-- banner -->

	<div class="ban-top menuDinamico">
		<div class="container ">
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">

							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active menu__item menu__item--current"><a class="menu__link" href="<?= base_url("") ?>">Página principal <span class="sr-only">(current)</span></a></li>
								<!--LISTAGEM DE CATEGORIAS NO MENU----------------->
								<?php foreach ($categorias_core as $categoria): ?>
									<?php $sub_cat = $subcategorias[$categoria->id];?>

								<?php if($categoria->id_categoriaspai == 0): ?>
									<?php if(!$sub_cat): ?>
										<li class="dropdown menu__item">
											<a href="<?= base_url("categoria/") . slug($categoria->nome) ?>" class="menu__link"  role="button" aria-haspopup="true" aria-expanded="false"><h4 class="cor"><?= $categoria->nome ?></h4> <span class="caret"></span></a>
										</li>
									<?php break; endif; ?>
									<li class="dropdown menu__item">
										<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><h4 class="cor"><?= $categoria->nome ?></h4> <span class="caret"></span></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="agile_inner_drop_nav_info">
												<!--
												<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
													<a href="< ?= base_url("homens") ?>"><img src="< ?= base_url("loja/images/top2.jpg") ?>" alt=" "/></a>
												</div>-->
												<!--Divisão em 2 colunas--------------->
												<div class="col-sm-3 multi-gd-img">
													<ul class="multi-column-dropdown">


													<?php $counter = 0; if($sub_cat): ?>
														<?php foreach ($sub_cat as $i): $counter++;?>
															<?php if($counter == 8){ break; } ?>
															<li>

																<a href="<?= base_url("categoria/") . $i->meta_link ?>" title="<?= $i->nome ?>"><h4 style=" font-family: tymes-new-roman"><?= $i->nome ?></h4><br></a>


															</li>
														<?php endforeach; ?>
													<?php endif; ?>
													</ul>
												</div>
												<div class="col-sm-3 multi-gd-img">
													<ul class="multi-column-dropdown">
														<?php if($sub_cat && $counter == 8): ?>
														<?php for($i = 7; $i < count($sub_cat); $i++):?>

														<li><a href="<?= base_url("categoria/") . $i->meta_link ?>" title="<?= $i->nome ?>"><h5><?= $sub_cat[$i]->nome ?></h5><br></a></li>
														<?php endfor; ?>
														<?php endif; ?>
													</ul>
												</div>
												<!--------------------------------->
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>
								<? endif; ?>
								<?php endforeach; ?>
								<?php if($dados_loja->possui_marcas == 1): ?>
									<li class="dropdown menu__item">
										<a class="menu__link"  onclick="gNavOpen();" role="button" aria-haspopup="true" aria-expanded="false"><h4 class="cor"> Marcas</h4> </a>
									</li>
								<?php endif; ?>



								<!--Mulheres--------------------------------------->
								<!--
								<li class="dropdown menu__item">
									<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Women's wear <span class="caret"></span></a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											Divisão em 2 colunas
											<div class="col-sm-3 multi-gd-img">
												<ul class="multi-column-dropdown">
													< ?php $counter = 0; if($sub_cat): ?>
													< ?php foreach ($sub_cat as $i): $counter++;?>
													< ?php if($counter == 8){ break; } ?>
													<li><a href="< ?= base_url("homens") ?>">< ?= $i->nome ?></a></li>
													< ?php endforeach; ?>
													< ?php endif; ?>
												</ul>
											</div>
											<div class="col-sm-3 multi-gd-img">
												<ul class="multi-column-dropdown">
													< ?php if($sub_cat && $counter == 8): ?>
													< ?php for($i = 7; $i < count($sub_cat); $i++):?>

													<li><a href="< ?= base_url("homens") ?>">< ?= $sub_cat[$i]->nome ?></a></li>
													< ?php endfor; ?>
													< ?php endif; ?>
												</ul>
											</div>

											<div class="col-sm-6 multi-gd-img multi-gd-text ">
												<a href="< ?= base_url("mulheres") ?>"><img src="< ?= base_url("loja/images/top1.jpg") ?>" alt=" "/></a>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								-->

								<li class=" menu__item"><a class="menu__link" href="<?= base_url("contato") ?>">Contato</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			<div class="top_nav_right">
				<div class="wthreecartaits wthreecartaits2 cart cart box_1">
					<a class="hvr-outline-out button2" href="<?= base_url("carrinho") ?>">
						<button class="w3view-cart" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</a>

					<div class="col-lg-auto carrinho body-carrinho-vazio">

							<strong class="carrinho1"><i style="color: black" class="glyphicon glyphicon-menu-left"></i>0<i style="color: black" class="glyphicon glyphicon-menu-right"></i></strong>

					</div>

					<div class="carrinho col-lg-auto body-carrinho-top hide">
						<i style="color: black" class="glyphicon glyphicon-menu-left"></i><strong class="carrinho1 carrinho-top-total-item"></strong><i style="color: black" class="glyphicon glyphicon-menu-right"></i>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>


	<!-- //banner-top -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Entrar <span>Now</span></h3>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" required="">
								<label>Email</label>
								<span></span>
							</div>
							<input type="submit" value="Entrar">
						</form>
						<ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
							<li><a href="#" class="facebook">
									<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
							<li><a href="#" class="twitter">
									<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
							<li><a href="#" class="instagram">
									<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
							<li><a href="#" class="pinterest">
									<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
						</ul>
						<div class="clearfix"></div>
						<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

					</div>


					<div class="col-md-4 modal_body_right modal_body_right1">
						<img src="<?= base_url("loja/images/iconeStore.png") ?>" alt=" "/>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Cadastro de <span>Cliente</span></h3>
						<?php

						getMsg('msgCadastro');

						?>

						<form action="<?= base_url('cadastrarCliente') ?>" method="post">
							<div class="key">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input  type="text"  name="Username" value="<?= set_value('Username'); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
								<div class="clearfix"></div>
							</div>
							<div class="key">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input  type="text" name="Email" value="<?= set_value('Email'); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" >
								<div class="clearfix"></div>
							</div>
							<div class="key">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input  type="password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
								<div class="clearfix"></div>
							</div>
							<div class="key">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input  type="password" name="confirmPassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" >
								<div class="clearfix"></div>
							</div>
							<input type="submit" value="Submit">
						</form>
						<ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
							<li><a href="#" class="facebook">
									<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
							<li><a href="#" class="twitter">
									<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
							<li><a href="#" class="instagram">
									<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
							<li><a href="#" class="pinterest">
									<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
						</ul>
						<div class="clearfix"></div>
						<p><a href="#">By clicking register, I agree to your terms</a></p>

					</div>
					<div class="col-md-4 modal_body_right modal_body_right1">
						<img src="<?= base_url("loja/images/iconeStore.png") ?>" alt=" "/>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->




	<?php echo $__env->yieldContent('conteudo'); ?>

	<div>
		<br><br><br><br><br>
	</div>


	<!--/grids-->
	<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>Frete Correios ou Combinar Entrega</h3>
						<p></p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>SUPORTE EM HORARIO COMERCIAL</h3>
						<p>Atendimento por WhatsApp ou E-mail</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>Garantia de qualidade e segurança!</h3>
						<p></p>
					</div>
				</div>

				<div class="clearfix"> </div>
			</div>

		</div>

		<hr>
		<div class="text-center">
			<strong  style="text-decoration: underline; font-size: 25px;">Formas de pagamento</strong>
		</div>
		<hr>
		<img class="center-block" src="<?= base_url("loja/images/pagseguro2.png") ?>" style="height: 50px">
		<div class="text-center">
			<?php for($i = 1; $i <= 17; $i++): ?>
				<img src="<?=base_url("loja/images/cartao").$i.".png"?>">
			<?php endfor; ?>
		</div>
		<br>
		<img src="<?= base_url("loja/images/boleto.png") ?>" style="height: 50px;" class="center-block">
		<!--<img src="< ?= base_url("loja/images/deposito.png") ?>" style="height: 50px;" class="center-block">-->
		<br>
		<div class="text-center">
			<strong  style="text-decoration: underline; font-size: 10px;">Débito online</strong>
		</div>
		<div class="text-center">
			<?php for($i = 1; $i <= 4; $i++): ?>
			<img src="<?=base_url("loja/images/debito").$i.".png"?>">
			<?php endfor; ?>
		</div>
	</div>
	<!--grids-->
	<!-- footer -->
	<div class="footer">
		<div class="footer_agile_inner_info_w3l">
			<div class="col-md-3 footer-left">
				<a href="<?=base_url("")?>"><img href="<?=base_url("")?>" style="width: <?=(string)((int)$tamanhoLogoLoja * 0.75)?>px;" src="<?=base_url("loja/images/bannersHome/" . $logoLoja[0]->foto)?>">
				</a>
				<br><br>



				<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
					<li><a class="whatsapp" href='https://api.whatsapp.com/send?&text=https%3A%2F%2F<?=str_replace(["https://", "/"], "", base_url("") )?>%2F' target="_blank">
							<div class="front"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a></li>

					<li><a class="facebook" href='https://www.facebook.com/sharer/sharer.php?u=<?= base_url("")?>' target="_blank">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
					<!--<li><a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>-->
					<li><a class="instagram" href='<?=$dados_loja->linkInstagram?>' target="_blank">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
					<!--<li><a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>-->
				</ul>
			</div>
			<div class="col-md-9 footer-right">
				<div class="sign-grds">

					<div class="col-md-5 sign-gd-two">
						<h4>Nossas <span>Informações</span></h4>
						<div class="w3-address">
							<div class="w3-address-grid">
								<div class="w3-address-left">

									<div class="col-md-4 agileits-social top_content">
										<ul class="social-nav model-3d-0 footer-social w3_agile_social">
											<li><a class="whatsapp" onclick="window.location.href = 'https://api.whatsapp.com/send?phone=55<?=str_replace('-', '', str_replace(')', '', str_replace('(', '', str_replace(' ', '', $dados_loja->numWpp))))?>&text=&source=&data=&app_absent='">
													<div class="front"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
													<div class="back"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a></li>
										</ul>
									</div>
								</div>
								<div class="w3-address-right">
									<h6>Número de telefone</h6>
									<p><?= $dados_loja->telefone ?></p>
								</div>
								<div class="clearfix"> </div>
							</div>


							<div class="w3-address-grid">
								<div class="w3-address-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="w3-address-right">
									<h6>Endereço de Email</h6>
									<p>Email :<a href="mailto:<?= $dados_loja->email ?>"> <?= $dados_loja->email ?></a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php if($dados_loja->endereco):?>
							<div class="w3-address-grid">
								<div class="w3-address-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>

									<div class="w3-address-right">
										<h6>Localização</h6>
										<p><?= ($dados_loja->endereco ? $dados_loja->endereco . ', ' . $dados_loja->bairro . ', ' . $dados_loja->cidade . ' - ' . $dados_loja->estado : "") ?></p>
									</div>

								<div class="clearfix"> </div>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<!--<div class="col-md-3 sign-gd flickr-post">
						<h4>Nossos <span>Integrantes</span></h4>
						<ul>
							FOTOS DOS INTEGRANTES
							<li><a href="< ?= base_url("produto") ?>"><img src="< ?= base_url("loja/images/t1.jpg") ?>" alt=" " class="img-responsive" /></a></li>
							<li><a href="< ?= base_url("produto") ?>"><img src="< ?= base_url("loja/images/t2.jpg") ?>" alt=" " class="img-responsive" /></a></li>
							<li><a href="< ?= base_url("produto") ?>"><img src="< ?= base_url("loja/images/t3.jpg") ?>" alt=" " class="img-responsive" /></a></li>
							<li><a href="< ?= base_url("produto") ?>"><img src="< ?= base_url("loja/images/t4.jpg") ?>" alt=" " class="img-responsive" /></a></li>
						</ul>
					</div>-->



					<div class="col-md-4 sign-gd">
						<h4>Catálogo<span> da loja</span> </h4>
						<ul>
							<li><a href="<?= base_url("") ?>">Home</a></li>
							<!--<li><a href="< ?= base_url("homens") ?>">Men's Wear</a></li>
							<li><a href="< ?= base_url("mulheres") ?>">Women's wear</a></li>-->
							
							<!--<li><a href="< ?= base_url("tipos") ?>">Short Codes</a></li>-->
							<li><a href="<?= base_url("contato") ?>">Contato</a></li>
						</ul>
					</div>

					</div>
			</div>
			<div class="clearfix"></div>
			<!--<div class="agile_newsletter_footer">
				<div class="col-sm-6 newsleft">
					<h3>SIGN UP FOR NEWSLETTER !</h3>
				</div>
				<div class="col-sm-6 newsright">
					<form action="#" method="post">
						<input type="email" placeholder="Enter your email..." name="email">
						<input type="submit" value="Submit">
					</form>
				</div>

				<div class="clearfix"></div>
			</div>-->
			<br>
			<div class="header" id="home">
				<div class="container">
					<ul>
						<li><i class="fa fa-unlock-alt" aria-hidden="true"></i><a href="<?= base_url("entrarAdm")  ?>">Entrar como Administrador</a></li>
						<li><i class="fa fa-phone" aria-hidden="true"></i>Telefone : <?= $dados_loja->telefone ?></li>
						<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?=$dados_loja->email?>">Email : <?= $dados_loja->email ?></a></li>
					</ul>
					<ul>
						<div class="col-md-4 text-center">
									<a><img style="padding-top: 25px ;width: 125px" src='<?= base_url("loja/images/certificadoSSL.png")?>' border=0 align=center alt='Um site validado pela Certisign indica que nossa empresa concluiu satisfatoriamente todos os procedimentos para determinar que o domínio validado é de propriedade ou se encontra registrado por uma empresa ou organização autorizada a negociar por ela ou exercer qualquer atividade lícita em seu nome.'></a><br />
						</div>
					</ul>
					<ul>
						<div class="col-md-4 text-center">
							<a target="_blank" href="https://www.cloudflare.com/pt-br/">
								<img style="padding-top: 30px ;padding-right: 0px;padding-left: 0px;  width: 125px" src="<?=base_url("loja/images/cloudflare.png")?>">
							</a>
						</div>

					</ul>
					<ul>
						<div class="col-md-4 text-center">
							<a href="https://m.pagseguro.uol.com.br/selo/pci/index.html" target="_blank">
								<img style="padding-top: 40px ;padding-right: 0px;padding-left: 0px;  width: 125px" src="<?=base_url("loja/images/seloPagSeguro.png")?>">
							</a>
						</div>

					</ul>
				</div>
			</div>

			<p class="copy-right">&copy <?= date('Y') . ' ' . $dados_loja->empresa . ($dados_loja->cnpj ? " - CNPJ: " . $dados_loja->cnpj : "") ?>. <br>Todos os direitos reservados<br> Desenvolvido por: </bd> <strong><a href="mailto: matheuscrf09@hotmail.com">Matheus Lázaro (matheuscrf09@hotmail.com)</a></strong></p>

		</div>

	</div>
	<!-- //footer -->

	<!-- login -->
	<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-info">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body modal-spa">
					<div class="login-grids">
					<!--<div class="login">
							<div class="login-bottom">
								<h3>Sign up for free</h3>

								<?php
									getMsg('msgCadastro');
								?>

								<form action="<?= ($registrarAdm == true ? base_url('users') : '') ?>" method="post">
									<div class="key">
										<i class="fa fa-user" aria-hidden="true"></i>
										<input  type="text"  name="Username" value="<?= set_value('Username'); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<input  type="text" name="Email" value="<?= set_value('Email'); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" >
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-lock" aria-hidden="true"></i>
										<input  type="password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
										<div class="clearfix"></div>
									</div>
									<div class="key">
										<i class="fa fa-lock" aria-hidden="true"></i>
										<input  type="password" name="confirmPassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" >
										<div class="clearfix"></div>
									</div>
									<input type="submit" value="Submit">
								</form>
							</div>
							<div class="login-right">
								<h3>Sign in with your account</h3>
								<form>
									<div class="sign-in">
										<h4>Email :</h4>
										<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
									</div>
									<div class="sign-in">
										<h4>Password :</h4>
										<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
										<a href="#">Forgot password?</a>
									</div>
									<div class="single-bottom">
										<input type="checkbox"  id="brand" value="">
										<label for="brand"><span></span>Remember Me.</label>
									</div>
									<div class="sign-in">
										<input type="submit" value="SIGNIN" >
									</div>
								</form>
							</div>

							<div class="clearfix"></div>
						</div>-->

						<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
					</div>
				</div>
			</div>
		</div>

	</div>



	<!-- //login -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>









	<script type="text/javascript" src="<?= base_url("loja/js/jquery-ui.js") ?>"></script>


	<!-- js -->
	<!-- //js -->
	<!--<script href="< ?= base_url("loja/js/modernizr.custom.js") ?>"></script>-->
	<script  src="<?= base_url("loja/js/modernizr.min.js") ?>"></script>
	<!-- Custom-JavaScript-File-Links -->
	<!-- cart-js -->
	<!--<script href="< ?= base_url("loja/js/minicart.min.js") ?>"></script>
	<script>
		// Mini Cart
		paypal.minicart.render({
			action: '#'
		});

		if (~window.location.search.indexOf('reset=true')) {
			paypal.minicart.reset();
		}
	</script>-->

	<!-- //cart-js -->
	<!-- script for responsive tabs -->

	<!-- //script for responsive tabs -->
	<!-- stats -->
	<script src="<?= base_url("loja/js/jquery.waypoints.min.js") ?>"></script>
	<script src="<?= base_url("loja/js/jquery.countup.js") ?>"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- start-smoth-scrolling -->

			<!-- here stars scrolling icon -->

	<!-- //here ends scrolling icon -->


	<!-- for bootstrap working -->

	<!--<script  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"  crossorigin="anonymous"></script>-->
	<script  src="<?= base_url("loja/js/minicart.js") ?>" > </script >
	<script >
		paypal . minicart . render () ;
	</script >



	<!---------------------CARRINHO------------------------------>

	<?php if(isset($pagseguro)): ?>
		<script type="text/javascript" src="<?= $pagseguro ?>"></script>
	<?php endif; ?>


	<script src="<?= base_url('loja/js/menuLateralPrincipal.js') ?>"></script>


	<!--<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
	<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>-->
</div>
</body>
</html>
<?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/principal.blade.php ENDPATH**/ ?>