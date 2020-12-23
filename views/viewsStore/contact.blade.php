
@extends('viewsStore/principal')
@section('conteudo')
	<style type="text/css">
		/* Set a size for our map container, the Google Map will take up 100% of this container */
		#map {
			width: 750px;
			height: 500px;
		}
	</style>

	<!--
		You need to include this script tag on any page that has a Google Map.

		The following script tag will work when opening this example locally on your computer.
		But if you use this on a localhost server or a live website you will need to include an API key.
		Sign up for one here (it's free for small usage):
			https://developers.google.com/maps/documentation/javascript/tutorial#api_key

		After you sign up, use the following script tag with YOUR_GOOGLE_API_KEY replaced with your actual key.
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY"></script>
	-->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<script type="text/javascript">
		// When the window has finished loading create our google map below
		google.maps.event.addDomListener(window, 'load', init);

		function init() {
			// Basic options for a simple Google Map
			// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
			var mapOptions = {
				// How zoomed in you want the map to start at (always required)
				zoom: 11,

				// The latitude and longitude to center the map (always required)
				center: new google.maps.LatLng(-16.7243008, -49.3473744), // New York

				// How you would like to style the map.
				// This is where you would paste any style found on Snazzy Maps.
				styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"weight":"2.00"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#9c9c9c"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#eeeeee"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#7b7b7b"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c8d7d4"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#070707"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]}]
			};

			// Get the HTML DOM element that will contain your map
			// We are using a div with id="map" seen below in the <body>
			var mapElement = document.getElementById('map');

			// Create the Google Map using our element and options defined above
			var map = new google.maps.Map(mapElement, mapOptions);

			// Let's also add a marker while we're at it
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(40.6700, -73.9400),
				map: map,
				title: 'Snazzy!'
			});
		}
	</script>

	<?php getMsg("email"); ?>
	<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>C<span>ontato </span></h3>
			<!--/w3_short-->
			<div class="services-breadcrumb">
				<div class="agile_inner_breadcrumb">

					<ul class="w3_short">
						<li><a href="index.html">Home</a><i>|</i></li>
						<li>Contact</li>
					</ul>
				</div>
			</div>
			<!--//w3_short-->
		</div>
	</div>

	<!--
	<div class="banner_bottom_agile_info team">
		<div class="container">
			<h3 class="wthree_text_info"><span>Membros da nossa</span> Equipe</h3>
			<div class="inner_w3l_agile_grids">
				<div class="col-md-3 team-grids">
					<div class="thumbnail team-w3agile">
						<img src="< ?= base_url("loja/images/t1.jpg") ?>" class="img-responsive" alt="">
						<div class="social-icons team-icons right-w3l fotw33">
							<div class="caption">
								<h4>Joanna Vilken</h4>
								<p>Add Short Description</p>
							</div>
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
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
						</div>
					</div>
				</div>
				<div class="col-md-3 team-grids">
					<div class="thumbnail team-w3agile">
						<img src="< ?= base_url("loja/images/t2.jpg") ?>" class="img-responsive" alt="">
						<div class="social-icons team-icons right-w3l fotw33">
							<div class="caption">
								<h4>Anika Mollik</h4>
								<p>Add Short Description</p>
							</div>
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
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
						</div>
					</div>
				</div>
				<div class="col-md-3 team-grids">
					<div class="thumbnail team-w3agile">
						<img src="< ?= base_url("loja/images/t3.jpg") ?>" class="img-responsive" alt="">
						<div class="social-icons team-icons right-w3l fotw33">
							<div class="caption">
								<h4>Megali Deo</h4>
								<p>Add Short Description</p>
							</div>
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
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
						</div>
					</div>
				</div>
				<div class="col-md-3 team-grids">
					<div class="thumbnail team-w3agile">
						<img src="< ?= base_url("loja/images/t4.jpg") ?>" class="img-responsive" alt="">
						<div class="social-icons team-icons right-w3l fotw33">
							<div class="caption">
								<h4>Retas Word</h4>
								<p>Add Short Description</p>
							</div>
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
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
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	-->
<!-- /banner_bottom_agile_info -->

   <!--/contact-->

		<div style="margin-left: 20%; margin-right: 20%" class="banner_bottom_agile_info">
			<div class="container">
			  <div  class="contact-grid-agile-w3s">
				  <!--<div class="col-md-4 contact-grid-agile-w3">
						 -<div class="contact-grid-agile-w31">
							  <i class="fa fa-map-marker" aria-hidden="true"></i>
							  <h4>Address</h4>
							  <p>12K Street, 45 Building Road <span>California, USA.</span></p>
						  </div>
						</div>-->
						<div class="col-md-4 contact-grid-agile-w3">
							<div class="contact-grid-agile-w32">
								<i class="fa fa-phone" aria-hidden="true"></i>
								<h4>Contate-nos</h4>
								<p><?=$dados_loja->telefone?></p>
							</div>
						</div>
						<div class="col-md-4 contact-grid-agile-w3">
							<div class="contact-grid-agile-w33">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<h4>Email</h4>
								<p><a href="mailto:<?=$dados_loja->email?>"><?=$dados_loja->email?></a></p>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
		   </div>
		 </div>




<div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 address-grid">
						<h4><span>Para maiores</span> Informações</h4>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Telefone </p><span><?=$dados_loja->telefone?></span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<div class="contact-right">
									<p>E-mail </p><a href="mailto:info@example.com"><?=$dados_loja->email?></a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<!--<div class="mail-agileits-w3layouts">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Localização</p><span>7784 Diamonds street, California, US.</span>
								</div>
								<div class="clearfix"> </div>
							</div>-->
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
									<br>
								<li style="color: white" class="share">Compartilhar </li><br>
									<li><a class="whatsapp" href='https://api.whatsapp.com/send?phone=55<?=str_replace('-', '', str_replace(')', '', str_replace('(', '', str_replace(' ', '', $dados_loja->numWpp))))?>&text=&source=&data=&app_absent=' target="_blank">
											<div class="front"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
											<div class="back"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a></li>

									<li><a class="facebook" href='<?=$dados_loja->linkFacebook?>' target="_blank">
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
					<div class="col-md-6 contact-form">
						<h4 class="white-w3ls"><span>Enviar Email sobre eventuais erros e dúvidas referentes ao site</span><br><br><p>Para: Matheus Lázaro H. da S.</p></h4>
						<form action="<?=base_url("enviarEmail")?>" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Nome</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" required="">
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="Subject"  required="">
								<label>Sobre</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="Message" required=""></textarea>
								<label>Mensagem</label>
								<span></span>
							</div>	 
							<input type="submit" value="Enviar">
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//contact-->
@stop
