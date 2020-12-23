<?php $__env->startSection('conteudo'); ?>


	<style>
		/*-- banner --*/
		.carousel .item{
			background-size:cover;
		}
		<?php $i = 0; $j = 1; foreach ($banners1 as $banner): ?>
			.carousel .item.item<?=$j?>{
				background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?=base_url("loja/images/bannersHome/" . $banners1[$i]->foto)?>) no-repeat;
				background-size:cover;
			}
		<?php $i++; $j++; endforeach; ?>

		/*-- banner --*/


		.sale-w3ls {
			background: url(<?=base_url("loja/images/bannersHome/" . $banner2[0]->foto)?>)no-repeat 0px 0px;
			background-attachment: fixed;
			background-size: cover;
			-webkit-background-size: cover;
			-o-background-size: cover;
			-moz-background-size: cover;
			-ms-background-size: cover;
			min-height:380px;
		}


	</style>

<div>

	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php if($banners1): ?>

				<?php $i = 1; foreach ($banners1 as $banner): ?>
					<li data-target="#myCarousel" data-slide-to="<?=$i?>" class=""></li>
				<?php endforeach; ?>
			<?php endif; ?>

		</ol>

		<div class="carousel-inner" role="listbox">
			<?php if($banners1): ?>
				<?php $i = 1; foreach ($banners1 as $banner): ?>
					<div class="item <?=$i == 1 ? 'active item' . $i : 'item' . $i?>">
						<div class="container">
							<div class="carousel-caption">
								<!--<h3>Novos <span>Produtos</span></h3>
								<p>Novidades em promoção</p>
								<a class="hvr-outline-out button2" href="< ?= base_url("homens") ?>">Compre agora!</a>-->
							</div>
						</div>
					</div>
				<?php $i++; endforeach; ?>
			<?php endif; ?>
		</div>





		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>




	<div class="new_arrivals_agile_w3ls_info">
		<div class="container">
			<h3 class="wthree_text_info"><span>Produtos</span> Destaque </h3>
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<!--CATEGORIAS-->
					<?php $i = 0; foreach ($categorias as $categoria): ?>
					<li class="<?=($i == 0 ? "resp-tab-active": "")?>"><?= $categoria->nome ?></li>
					<?php $i++; endforeach; ?>
				</ul>


				<div class="resp-tabs-container">

					<!--foreach das categorias principais--------------------------------->
					<!--/tab_one----------------------------------------------->

					<?php $i = 0; foreach ($categorias as $categoria): ?>

						<div class="tab1 <?=($i == 0 ? "resp-tab-content resp-tab-content-active" : "")?>">

							<?php if($categoria->id_categoriaspai == 0): ?>
								<?php
									$CI =& get_instance();
									$CI->load->model('homeModel');
									//Obter as subcategorias
									$subCats = $CI->homeModel->getSubCat((int)$categoria->id);
									$produtosDestaque = $CI->homeModel->getProdutosCategoriaHome((int)$dados_loja->p_destaque, $subCats);
									$subCats = null;
								?>
								<?php foreach($produtosDestaque as $produto): ?>
								<!--foreach dos produtos da categoria------------------------------->
									<div class="col-md-3 product-men">
										<div class="men-pro-item simpleCart_shelfItem">
											<?php
											$CI =& get_instance();
											$CI->load->model('produtoModel');
											$fotos = $CI->produtoModel->getFotos($produto->id);
											?>

											<div class="men-thumb-item">
												<a href="<?= base_url("produto/" . $produto->meta_link) ?>"><img src="<?= base_url("loja/images/" . $fotos[0]->foto) ?>" alt="" class="pro-image-front"></a>
												<a href="<?= base_url("produto/" . $produto->meta_link) ?>"><?=( count($fotos) > 1 ? '<img src="' . base_url("loja/images/") . $fotos[1]->foto . '" alt="" class="pro-image-back">' : '<img src="' . base_url("loja/images/") . $fotos[0]->foto . '" alt="" class="pro-image-back">')?></a>
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?= base_url("produto/" . $produto->meta_link) ?>" class="link-product-add-cart">Olhada rápida</a>
													</div>
												</div>
												<?php
												$dataAtual = new DateTime(date('Y-m-d'));
												$dataCadastro = new DateTime($produto->data_cadastro);
												?>
												<?= ($dataAtual->diff($dataCadastro)->days <= 30 ? "<span class='product-new-top'>Novo</span>" : "") ?>

											</div>

											<div class="item-info-product ">
												<h4><a href="<?= base_url("produto/" . $produto->meta_link) ?>"><?= mb_strimwidth($produto->nome_produto, 0, 25, '...') ?></a></h4>
												<div class="info-product-price">
													<span class="item_price"><?= formataMoedaReal($produto->valor, true) . " à vista<br>" ?></span><p>ou até</p>
													<h4><?="<label style='color: " . $dados_loja->corHex . "'>" . $produto->ultimaParcelaVezes . "</label>x de R$<label style='color: " . $dados_loja->corHex . "'>" .  number_format($produto->ultimaParcelaValor, 2, ",", ".") . "</label><br> sem juros" ?></h4>
													<p style="font-size: 11px">Confira mais opç. de parcelamento!</p>
													<del></del><!--Preço anterior-->
												</div>
												<!--
												<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
													<form action="#" method="post">
														<fieldset>
															<input type="hidden" name="cmd" value="_cart" />
															<input type="hidden" name="add" value="1" />
															<input type="hidden" name="business" value=" " />
															<input type="hidden" name="item_name" value="Formal Blue Shirt" />
															<input type="hidden" name="amount" value="30.99" />
															<input type="hidden" name="discount_amount" value="1.00" />
															<input type="hidden" name="currency_code" value="USD" />
															<input type="hidden" name="return" value=" " />
															<input type="hidden" name="cancel_return" value=" " />
															<input type="submit" name="submit" value="Ad. ao carrinho" class="button" />
														</fieldset>
													</form>
												</div>--->
												<a href="<?= base_url("produto/") . $produto->meta_link ?>"  title="Confira!" class="snipcart-details btn btn-lg btn-block"><i class="fa fa-eye"></i><h4>Conferir</h4></a>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
							<?php $i++;
							//var_dump(count($produtosDestaque) );
							if($i == count(($produtosDestaque)) ){
								break;
							}
							?>
						<!--endforeach dos produtos da categoria--------------->
						</div>
					<?php endforeach;?>
				<!------------------------------------------------------------->
					<!--endforeach das categorias---------------------------------->
					<div class="clearfix"></div>
				</div>



			</div>
		</div>
	</div>




	<!-- //banner -->
	<div class="banner_bottom_agile_info">
		<div class="container">
			<div class="banner_bottom_agile_info_inner_w3ls">
			<div class="sale-w3ls">
				<div class="container">
					<br><br><br>
					<section class="embossedTxt" >
						<?php if(isset($mensagemBanner2[0])): ?>

						<h1><?=$mensagemBanner2[0]->mensagem?></h1>
						<?php endif; ?>
					</section>

					<a class="hvr-outline-out button2" href="<?= base_url("todos") ?>">Compre agora! </a>

				</div>
			</div>
			</div>
		</div>
	</div>




	<div class="clearfix"></div>
	<div class="banner_bottom_agile_info">
		<div class="container">




			<div class="banner_bottom_agile_info_inner_w3ls">
				<?php if(isset($aleatorio[0])): ?>
					<a href="<?= base_url("produto/" . $aleatorio[0]->meta_link)?>">
						<div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
								<figure class="effect-roxy">
									<img style="width: 110%; height: 110%" src="<?= base_url("loja/images/" . $aleatorio[0]->foto) ?>" alt=" " class="img-responsive" />
									<figcaption>
										<br><br><br>
										<section class="embossedTxt" >
											<h1><?=$mensagemBanner3[0]->mensagem?></h1>

										</section>
										<p>Confira!</p>
									</figcaption>
								</figure>
						</div>
					</a>
				<?php endif; ?>
				<?php if(isset($aleatorio[1])): ?>

					<a href="<?= base_url("produto/" . $aleatorio[1]->meta_link)?>">
					<div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img style="width: 110%; height: 100%" src="<?= base_url("loja/images/" . $aleatorio[1]->foto) ?>" alt=" " class="img-responsive" />
							<figcaption>
								<section class="embossedTxt">
									<h1><?=$mensagemBanner4[0]->mensagem?></h1>
								</section>
								<p>Não perca!</p>
							</figcaption>
						</figure>
					</div>
				</a>
				<?php endif; ?>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- schedule-bottom -->
	<div class="schedule-bottom">
		<?php if(isset($banner5[0])): ?>

		<div class="col-md-6 agileinfo_schedule_bottom_left text-center">
			<img style="max-height: 415px;" src="<?= base_url("loja/images/bannersHome/" . $banner5[0]->foto) ?>" alt=" " class="img-responsive" />
		</div>
		<div class="col-md-6 agileits_schedule_bottom_right">
			<div class="w3ls_schedule_bottom_right_grid">
				<section class="embossedTxt" >
					<h1><?=$mensagemBanner5[0]->mensagem?></h1>
				</section>
				<br>

				<!--<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<h4>Clientes</h4>
					<h5 class="counter">< ?=$qtdClientes?></h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-puzzle-piece" aria-hidden="true"></i>
					<h4>Produtos</h4>
					<h5 class="counter">< ?=$qtdProdutos?></h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-list" aria-hidden="true"></i>
					<h4>Categorias</h4>
					<h5 class="counter">< ?=$qtdCategorias?></h5>
				</div>-->
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
		<?php endif; ?>
	</div>
	<!-- //schedule-bottom -->
	<!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<h3 class="wthree_text_info">Mais <span>vendidos</span></h3>

			<div class="agile_last_double_sectionw3ls">
				<div class="col-md-6 multi-gd-img multi-gd-text ">
				<?php if(isset($maisVendidos[0])): ?>
					<a href="<?= base_url("produto/" . $maisVendidos[0]->meta_link) ?>"><img src="<?= base_url("loja/images/" . $maisVendidos[0]->foto) ?>" alt=" "><h4 >Oferta<br> <span style="color: <?=$config->corHex?>"><?=formataMoedaReal($maisVendidos[0]->valor, true)?></span></h4>
						<h3><?="<label style='color: " . $dados_loja->corHex . "'>" . $maisVendidos[0]->ultimaParcelaVezes . "</label>x de R$<label style='color: " . $dados_loja->corHex . "'>" .  number_format($maisVendidos[0]->ultimaParcelaValor, 2, ",", ".") . "</label> sem juros" ?></h3>
						<p style="font-size: 11px">Confira mais opç. de parcelamento!</p>
					</a>
				<?php endif; ?>
				</div>
				<div class="col-md-6 multi-gd-img multi-gd-text ">
					<?php if(isset($maisVendidos[1])): ?>

					<a href="<?= base_url("produto/" . $maisVendidos[1]->meta_link) ?>"><img src="<?= base_url("loja/images/" . $maisVendidos[1]->foto) ?>" alt=" "><h4>Oferta<br> <span style="color: <?=$config->corHex?>"><?=formataMoedaReal($maisVendidos[1]->valor, true)?></span></h4><br>
						<h3><?="<label style='color: " . $dados_loja->corHex . "'>" . $maisVendidos[1]->ultimaParcelaVezes . "</label>x de R$<label style='color: " . $dados_loja->corHex . "'>" .  number_format($maisVendidos[1]->ultimaParcelaValor, 2, ",", ".") . "</label> sem juros" ?></h3>
						<p style="font-size: 11px">Confira mais opç. de parcelamento!</p>
					</a>
						<?php endif; ?>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--/grids-->
	<div class="agile_last_double_sectionw3ls">
		<div class="col-md-6 multi-gd-img multi-gd-text ">
			<?php if(isset($maisVendidos[2])): ?>

			<a href="<?= base_url("produto/" . $maisVendidos[2]->meta_link) ?>"><img src="<?= base_url("loja/images/" . $maisVendidos[2]->foto) ?>" alt=" "><h4>Oferta<br> <span style="color: <?=$config->corHex?>"><?=formataMoedaReal($maisVendidos[2]->valor, true)?></span></h4>
				<h3><?="<label style='color: " . $dados_loja->corHex . "'>" . $maisVendidos[2]->ultimaParcelaVezes . "</label>x de R$<label style='color: " . $dados_loja->corHex . "'>" .  number_format($maisVendidos[2]->ultimaParcelaValor, 2, ",", ".") . "</label> sem juros" ?></h3>
				<p style="font-size: 11px">Confira mais opç. de parcelamento!</p>
			</a>


				<?php endif; ?>

		</div>
		<div class="col-md-6 multi-gd-img multi-gd-text ">
			<?php if(isset($maisVendidos[3])): ?>

			<a href="<?= base_url("produto/" . $maisVendidos[3]->meta_link) ?>"><img src="<?= base_url("loja/images/" . $maisVendidos[3]->foto) ?>" alt=" "><h4>Oferta<br> <span style="color: <?=$config->corHex?>"><?=formataMoedaReal($maisVendidos[3]->valor, true)?></span></h4>
				<h3><?="<label style='color: " . $dados_loja->corHex . "'>" . $maisVendidos[3]->ultimaParcelaVezes . "</label>x de R$<label style='color: " . $dados_loja->corHex . "'>" .  number_format($maisVendidos[3]->ultimaParcelaValor, 2, ",", ".") . "</label> sem juros" ?></h3>
				<p style="font-size: 11px">Confira mais opç. de parcelamento!</p>
			</a>
				<?php endif; ?>

		</div>
		<div class="clearfix"></div>
	</div>
</div>
	<!--/grids-->
	<!-- /new_arrivals -->

	<!-- //new_arrivals -->
	<!-- /we-offer -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('viewsStore/principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/home.blade.php ENDPATH**/ ?>