<?php $__env->startSection('conteudo'); ?>

	<script>
		$('.input_data').mask('00/00/0000');
		$('.input_cep').mask('00000-000');
		$('.input_tel').mask('(00) 00000-0000');
		$('.input_cpf').mask('000.000.000-00');
		$('.input_moeda').mask('000.000.000.000.000,00', {reverse: true});
	</script>
	<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
	<link type="text/css" rel="stylesheet" href="<?= base_url("loja/css/loading.css")?>"/>

	<link type="text/css" rel="stylesheet" href="<?=base_url("loja/css/loadingPagina.css")?>"/>
	<link type="text/css" rel="stylesheet" href="<?=base_url("loja/css/netflixCarousel.css")?>"/>

	<link type="text/css" rel="stylesheet" href="<?=base_url("loja/css/tiposProduto.css")?>"/>
	<style>
		.select-estilo2 {
			width:100%;  /* Tamanho final do select */
			overflow:hidden; /* Esconde o conteúdo que passar do tamanho especificado */
		}

		.select-estilo2 select {
			background: url(<?=base_url("loja/images/select.png")?>) no-repeat rgba(0, 0, 0, 0.25);  /* Imagem de fundo (Seta) */
			background-position: 205px center;  /*Posição da imagem do background*/
			width: 270px; /* Tamanho do select, maior que o tamanho da div "div-select" */
			height:48px; /* altura do select, importante para que tenha a mesma altura em todo os navegadores */
			font-family:Arial, Helvetica, sans-serif; /* Fonte do Select */
			font-size:18px; /* Tamanho da Fonte */
			padding:13px 20px 13px 12px; /* Configurações de padding para posicionar o texto no campo */
			color: #000000; /* Cor da Fonte */
			/* Remove seta padrão do FireFox */
			/* Remove seta padrão do FireFox */
			/* Remove seta padrão do IE*/

		}

		.select-estilo-ordenacao-produtos2 select {
			background:  no-repeat rgb(0, 0, 0);  /* Imagem de fundo (Seta) */
			background-position: 205px center;  /*Posição da imagem do background*/
			width: 400px; /* Tamanho do select, maior que o tamanho da div "div-select" */
			height:48px; /* altura do select, importante para que tenha a mesma altura em todo os navegadores */
			font-family:Arial, Helvetica, sans-serif; /* Fonte do Select */
			font-size:18px; /* Tamanho da Fonte */
			padding:13px 20px 13px 12px; /* Configurações de padding para posicionar o texto no campo */
			color: #7F97CA; /* Cor da Fonte */
			/* Remove seta padrão do FireFox */
			/* Remove seta padrão do FireFox */
			/* Remove seta padrão do IE*/

		}
	</style>



	<link type="text/css" rel="stylesheet" href="<?=base_url("loja/css/carouselZoomProduct.css")?>"/>


	<script>
		function currentDiv(n) {
			showDivs(slideIndex = n);
		}

		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("demo");
			if (n > x.length) {slideIndex = 1}
			if (n < 1) {slideIndex = x.length}
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
			}
			x[slideIndex-1].style.display = "block";
			dots[slideIndex-1].className += " w3-opacity-off";
		}
	</script>









	<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
	<div >
			<div class="container">
				<!--/w3_short-->
					 <div class="services-breadcrumb">
							<div class="agile_inner_breadcrumb">

							   <ul class="w3_short">
									<li><a href="<?= base_url("") ?>">Home</a><i>|</i></li>
									<li>Página do produto</li>
								</ul>
							 </div>
					</div>
		   <!--//w3_short-->
		</div>
	</div>













	  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">


			 <div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">




					<div class="w3-content" style="max-width:1200px">
						<?php $i = 1; foreach ($fotos as $foto): ?>
							<?php if($i == 1): ?>
								<img class="mySlides text-center" src="<?= base_url("loja/images/" . $foto->foto) ?>" style="width:100%;" data-imagezoom="true">
							<?php else: ?>
								<img class="mySlides text-center" src="<?= base_url("loja/images/" . $foto->foto) ?>" style="width:100%;display:none" data-imagezoom="true">
							<?php endif; ?>
						<?php $i++; endforeach; ?>

						<div class="w3-row-padding w3-section">
							<?php $i = 1; foreach ($fotos as $foto): ?>
							<div class="w3-col s4">
								<img class="demo w3-opacity w3-hover-opacity-off" src="<?= base_url("loja/images/" . $foto->foto) ?>" style="width:50%;cursor:pointer; margin-bottom: 10px" onclick="currentDiv(<?=$i?>)">
							</div>

							<?php $i++; endforeach; ?>

						</div>
					</div>
				</div>
			</div>














			<div class="col-md-8 single-right-left simpleCart_shelfItem">
						<h3><?= $produto->nome_produto ?></h3>
						<hr>
						<br><h2><span class="item_price"><?= formataMoedaReal($produto->valor, true) . " <label style='font-size: 20px'> à vista</label>" ?></span> <del>  <!--Valor anterior --></del></h2>
						<!--<h4><span class="item_price">Quantidade em estoque: < ?= $produto->estoque ?></span></h4><br>-->
						<!--<div class="rating1">
							<span class="starRating">
								<input id="rating5" type="radio" name="rating" value="5">
								<label for="rating5">5</label>
								<input id="rating4" type="radio" name="rating" value="4">
								<label for="rating4">4</label>
								<input id="rating3" type="radio" name="rating" value="3" checked="">
								<label for="rating3">3</label>
								<input id="rating2" type="radio" name="rating" value="2">
								<label for="rating2">2</label>
								<input id="rating1" type="radio" name="rating" value="1">
								<label for="rating1">1</label>
							</span>
						</div>-->
				<br>
						 <a class="mostraParcelasProduto"><img style="height: 75px" src="<?=base_url("loja/images/parcelar.png")?>">  Mostrar parcelas <?=($ambiente == 1 ? "(Não dísponível em Ambiente de teste)" : "")?></a>
						<input type="hidden" name="valorProduto" value="<?=$produto->valor?>">
						<input type="hidden" name="semJuros" value="<?=$semJuros->parcelas_sJuros?>">
						<div class="parcelas-oculto hide">


						<hr><div class="tabela-parcelas"></div><hr>

						</div>
				<br>

				<!--
				<div class="snipcart-details">
					<form target="snipcart-details" action="#" method="post">
						<fieldset>
							<input type="hidden" name="add" value="1">
							<input type="hidden" name="id" value="< ?= $produto->id ?>">
							<input type="submit" name="submit" value="Ad. ao carrinho" class="button btn-add-produto-carrinho">
						</fieldset>
					</form>
				</div>-->







						<!--
						<div class="color-quality">
							<div class="color-quality-right">
								<h5>Qualidade :</h5>
								<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
									<option value="null">5 Qty</option>
									<option value="null">6 Qty</option>
									<option value="null">7 Qty</option>
									<option value="null">10 Qty</option>
								</select>
							</div>
						</div>-->
				<?= ($produto->controlar_estoque == 1 && ($produto->possui_tamanho != 1 && $produto->possui_tipos != 1) ? "<h4>Quantidade em estoque: {$produto->estoque}</h4><br>" : '' ) ?>

				<div class="quantity">
					<label>Quantidade</label>:
					<button  class="plus-btn" type="button" name="button"></button>
					<input min="1" name="quantidade_produto" class="input-qtd-carrinho input-tamanho input-carrinho-quantidade"  value="1" id="quant_<?=$produto->id?>" readonly/>
					<button class="minus-btn limitaQtd" type="button" name="button"></button>
					<div class="limitaQtd"></div>
					<!--<br><br><a href="#" class="btn-qtd-produto-carrinho" data-id="< ?= $produto['id'] ?>"><i class="fa fa-undo"> Atualizar quantidade</i></a>-->
				</div>

					<?php if($produto->possui_tamanho == 1): ?>
						<div class="occasional">
							<form method="post" accept-charset="utf-8">
								<label>Selecione o Tamanho</label>
								<select name="tamanho_selecionado" class="form-control tamanho_selecionado" placeholder='"Tamanho"' required>
									<option style="font-size: 25px" value="0">Selecionar...</option>
									<?= ($produto->estoque_p > 0 ? '<option style="font-size: 35px" value="P">P (estoque: '. $produto->estoque_p . ')</option>' : '') ?>
									<?= ($produto->estoque_m > 0 ? '<option style="font-size: 35px" value="M">M (estoque: '. $produto->estoque_m . ')</option>' : '') ?>
									<?= ($produto->estoque_g > 0 ? '<option style="font-size: 35px" value="G">G (estoque: '. $produto->estoque_g . ')</option>' : '') ?>
									<?= ($produto->estoque_gg > 0 ? '<option style="font-size: 35px" value="GG">GG (estoque: '. $produto->estoque_gg . ')</option>' : '') ?>

								</select>
								<div class="clearfix"></div>
							</form>
						</div>
					<?php elseif($produto->possui_tipos == 1): ?>
						<div class="occasional select-estilo2">
							<form method="post" accept-charset="utf-8">
								<h4>Selecione o Tipo</h4>
								<select name="tipo_selecionado" class="form-control tipo_selecionado" placeholder='"Tipo"' required>
									<option style="font-size: 25px" value="0">Selecionar...</option>
									<?php for($i = 0; $i < (int)$produto->qtd_tipos; $i++): ?>
										<?php if(array_key_exists('estoque_tipo_1', (array)$produto) && ($i+1) == 1): ?>
											<?= ($produto->estoque_tipo_1 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo1.'">' . $produto->nome_tipo1 . ' (estoque: '. $produto->estoque_tipo_1 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_2', (array)$produto) && ($i+1) == 2): ?>
											<?= ($produto->estoque_tipo_2 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo2.'">' . $produto->nome_tipo2 . ' (estoque: '. $produto->estoque_tipo_2 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_3', (array)$produto) && ($i+1) == 3): ?>
											<?= ($produto->estoque_tipo_3 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo3.'">' . $produto->nome_tipo3 . ' (estoque: '. $produto->estoque_tipo_3 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_4', (array)$produto) && ($i+1) == 4): ?>
											<?= ($produto->estoque_tipo_4 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo4.'">' . $produto->nome_tipo4 . ' (estoque: '. $produto->estoque_tipo_4 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_5', (array)$produto) && ($i+1) == 5): ?>
											<?= ($produto->estoque_tipo_5 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo5.'">' . $produto->nome_tipo5 . ' (estoque: '. $produto->estoque_tipo_5 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_6', (array)$produto) && ($i+1) == 6): ?>
											<?= ($produto->estoque_tipo_6 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo6.'">' . $produto->nome_tipo6 . ' (estoque: '. $produto->estoque_tipo_6 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_7', (array)$produto) && ($i+1) == 7): ?>
											<?= ($produto->estoque_tipo_7 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo7.'">' . $produto->nome_tipo7 . ' (estoque: '. $produto->estoque_tipo_7 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_8', (array)$produto) && ($i+1) == 8): ?>
											<?= ($produto->estoque_tipo_8 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo8.'">' . $produto->nome_tipo8 . ' (estoque: '. $produto->estoque_tipo_8 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_9', (array)$produto) && ($i+1) == 9): ?>
											<?= ($produto->estoque_tipo_9 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo9.'">' . $produto->nome_tipo9 . ' (estoque: '. $produto->estoque_tipo_9 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_10', (array)$produto) && ($i+1) == 10): ?>
											<?= ($produto->estoque_tipo_10 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo10.'">' . $produto->nome_tipo10 . ' (estoque: '. $produto->estoque_tipo_10 . ')</option>' : '') ?>
										<?php elseif(array_key_exists('estoque_tipo_11', (array)$produto) && ($i+1) == 11): ?>
											<?= ($produto->estoque_tipo_11 > 0 ? '<option style="font-size: 35px" value="'.$produto->nome_tipo11.'">' . $produto->nome_tipo11 . ' (estoque: '. $produto->estoque_tipo_11 . ')</option>' : '') ?>
										<?php endif; ?>
									<?php endfor; ?>
								</select>
								<div class="clearfix"></div>
							</form>
						</div>
					<?php else: ?>
						<input class="tamanho_selecionado" value="" type="hidden" name="tamanho_selecionado" checked="">
					<?php endif; ?>

				<br>

				<a style="background-color: darkgreen" title="Adicionar produto ao carrinho" class="snipcart-details btn btn-lg btn-block btn-add-produto-carrinho" data-id="<?= $produto->id ?>" data-qtd=""><i class="fa fa-cart-arrow-down"></i> Adicionar ao carrinho</a>

				<hr>
				<div class="description">
					<form class="form-inline">
						<div class="form-group">
							<input type="tel" class="form-control input_cep" id="cep-calculo-produto" placeholder="Digite seu Cep">

						</div>

					</form>
					<br>
					<div class="input-group-btn">
						<input type="submit" class="btn-calcular-frete-produto" data-id="<?= $produto->id ?>" value="Calcular frete">
					</div>
				</div>

				<div class="calculo-frete-retorno hide"></div>


				<hr>
				<h5>Marca: <a href="<?= base_url("marca/" . $produto->meta_link_marca) ?>" title="Ver todos os produtos da marca: <?= $produto->nome_marca ?>"><?= $produto->nome_marca ?></a> </h5>
				<hr>
				<h5>Categoria: <a href="<?= base_url("categoria/" . $produto->meta_link_categoria) ?>" title="Ver todos os produtos da categoria: <?= $produto->nome ?>"><?= $produto->nome ?></a> </h5>


				<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
				   <li class="share">Compartilhar : </li><br>
					<li style="color: white" class="share">Compartilhar </li>
					<li><a class="whatsapp" href='https://api.whatsapp.com/send?&text=https%3A%2F%2F<?=str_replace(["https://", "/"], "", base_url("%2Fproduto%2F" . $produto->meta_link) )?>' target="_blank">
							<div class="front"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a></li>

					<li><a class="facebook" href='https://www.facebook.com/sharer/sharer.php?u=<?=base_url("produto/". $produto->meta_link)?>' target="_blank">
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
					<div class="clearfix"> </div>
					<!-- /new_arrivals -->
		<div class="responsive_tabs_agileits">
					<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<li>Descrição</li>
								<!--<li>Avaliações</li>-->
								<li>Informações adicionais</li>
							</ul>
						<div class="resp-tabs-container">
						<!--/tab_one-->
						   <div class="tab1">

								<div class="single_page_agile_its_w3ls">
								  <h6><?= $produto->nome_produto ?></h6>
								   <p class="w3ls_para text-left"><?= $produto->info ?></p>
								</div>
							</div>
							<!--//tab_one-->
							<!--<div class="tab2">

								<div class="single_page_agile_its_w3ls">
									<div class="bootstrap-tab-text-grids">
										<div class="bootstrap-tab-text-grid">
											<div class="bootstrap-tab-text-grid-left">
												<img src="< ?= base_url("loja/images/t1.jpg") ?>" alt=" " class="img-responsive">
											</div>
											<div class="bootstrap-tab-text-grid-right">
												<ul>
													<li><a href="#">Admin</a></li>
													<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
												</ul>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
													suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
													vel eum iure reprehenderit.</p>
											</div>
											<div class="clearfix"> </div>
										 </div>
										 <div class="add-review">
											<h4>add a review</h4>
											<form action="#" method="post">
													<input type="text" name="Name" required="Name">
													<input type="email" name="Email" required="Email">
													<textarea name="Message" required=""></textarea>
												<input type="submit" value="SEND">
											</form>
										</div>
									 </div>

								 </div>
							 </div>-->
							   <div class="tab3">

								<div class="single_page_agile_its_w3ls">
								  <h6><?= $produto->nome_produto ?></h6>
								   <p class="w3ls_para">Código do produto: <?= $produto->cod_produto ?></p>
								   <!--<p class="w3ls_para">Peso: <?= $produto->peso ?>Kg</p>-->
									<h6 style="text-align: center">Embalagem</h6>

									<p class="w3ls_para">Altura: <?= $produto->altura ?>cm</p>
								   <p class="w3ls_para">Largura: <?= $produto->largura ?>cm</p>
								   <p class="w3ls_para">Comprimento: <?= $produto->comprimento ?>cm</p><br>
								   <p class="w3ls_para">Marca: <?= $produto->nome_marca ?></p>
								   <p class="w3ls_para">Categoria: <?= $produto->nome ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
		<!-- //new_arrivals -->
			<!--/slider_owl-->

				<div class="w3_agile_latest_arrivals">
				<h3 class="wthree_text_info"><span>Produtos</span> Relacionados </h3>
					<!--Buscar produtos aleatoriamente-->
					<div class="contain">

						<div class="row">
							<div class="row__inner">
								<?php foreach ($produtosCategoria as $novoProduto): ?>
								<?php if($novoProduto->id != $produto->id): ?>
									<?php
									$CI =& get_instance();
									$CI->load->model('produtoModel');
									$fotos = $CI->produtoModel->getFotos($novoProduto->id);
									?>
									<div class="tile">
										<div class="tile__media">
											<div class="men-thumb-item">
												<a href="<?= base_url("produto/" . $novoProduto->meta_link) ?>"><img src="<?= base_url("loja/images/" . $fotos[0]->foto) ?>" alt="" class="pro-image-front tile__img"></a>
												<a href="<?= base_url("produto/" . $novoProduto->meta_link) ?>"><?=( count($fotos) > 1 ? '<img src="' . base_url("loja/images/") . $fotos[1]->foto . '" alt="" class="pro-image-back tile__img">' : '<img src="' . base_url("loja/images/") . $fotos[0]->foto . '" alt="" class="pro-image-back tile__img">')?></a>
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?= base_url("produto/" . $novoProduto->meta_link ) ?>" class="link-product-add-cart">Olhada rápida</a>
													</div>
												</div>
												<span class="product-new-top">Novo</span>

											</div>

											<div class="item-info-product ">
												<h4><a href="<?= base_url("produto/" . $novoProduto->meta_link) ?>"><?= mb_strimwidth($novoProduto->nome_produto, 0, 20, '...') ?></a></h4>
												<div class="info-product-price">
													<span class="item_price"><?= formataMoedaReal($novoProduto->valor, true) . " à vista<br>" ?></span><p>ou até</p>
													<h4><?="<label style='color: " . $dados_loja->corHex . "'>" . $novoProduto->ultimaParcelaVezes . "</label>x de R$<label style='color: " . $dados_loja->corHex . "'>" .  number_format($novoProduto->ultimaParcelaValor, 2, ",", ".") . "</label><br> sem juros" ?></h4>
													<!--<del>$189.71</del>-->
													<p style="font-size: 11px">Confira mais opç. de parcelamento!</p>

												</div>

												<a href="<?= base_url("produto/") . $novoProduto->meta_link ?>"  title="Confira!" class="snipcart-details btn btn-lg btn-block"><i class="fa fa-eye"></i><h4>Conferir</h4></a>


											</div>

										</div>

									</div>
									<?php endif; ?>
									<?php endforeach; ?>
									<div class="clearfix"> </div>

							</div>
						</div>

					</div>


									<div class="clearfix"> </div>
							<!--//slider_owl-->
						</div>

				</div>
	 </div>
	<!--//single_page-->

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

<?php echo $__env->make('viewsStore/principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/single.blade.php ENDPATH**/ ?>