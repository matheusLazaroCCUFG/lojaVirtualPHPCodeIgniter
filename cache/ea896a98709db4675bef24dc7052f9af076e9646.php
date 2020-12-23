<?php $__env->startSection('conteudo'); ?>

	<script>

		function changeFunc($i) {
			if ($i == 'maiorPreco'){
				window.open( url_loja + "categoriaMaiorPreco/<?=$nomeCategoria->meta_link?>" ,'_self');
			}else
			if ($i == 'menorPreco'){
				window.open( url_loja + "categoriaMenorPreco/<?=$nomeCategoria->meta_link?>",'_self');
			}else
			if ($i == 'maisVendidos'){
				window.open( url_loja + "categoriaMaisVendidos/<?=$nomeCategoria->meta_link?>",'_self');
			}else{
				window.open( url_loja + "categoria/<?=$nomeCategoria->meta_link?>",'_self');
			}
		}
	</script>
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3><span>Coleção</span></h3><h3><?= $nomeCategoria->nome ?></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?= base_url("") ?>">Home</a><i>|</i></li>
								<li><?= $nomeCategoria->nome ?></li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->


			<!--
			<div class="men-wear-top">
				
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<img class="img-responsive" src="< ?= base_url("loja/images/banner2.jpg") ?>" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="< ?= base_url("loja/images/banner5.jpg") ?>" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="< ?= base_url("loja/images/banner2.jpg") ?>" alt=" "/>
						</li>

					</ul>
				</div>
				<div class="clearfix"></div>
			</div>-->


		<div class="col-md-14 products-right">
			<!--<h5>Product <span>Compare(0)</span></h5>-->
			<div class="sort-grid">
				<!--<div class="sorting">
					<h6>Ordenar por</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option>
						<option value="null">Name(A - Z)</option>
						<option value="null">Name(Z - A)</option>
						<option value="null">Price(High - Low)</option>
						<option value="null">Price(Low - High)</option>
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>
					</select>
					<div class="clearfix"></div>
				</div>-->
				<div class="form-group select-estilo-ordenacao-produtos">
					<label for="tipo_ordenacao">Ordenação da categoria</label>
					<form method="post" accept-charset="utf-8" class="">
						<select style="width: 300px;" name="tipo_ordenacao" class="form-control" onchange="changeFunc(value);">
							<option style="font-size: 25px" value="" >Sem ordenação</option>
							<!--<option style="font-size: 25px" value="maisVendidos">Mais vendidos</option>-->
							<option style="font-size: 25px" value="maiorPreco"  <?= ($ordenacaoSelecionada && $ordenacaoSelecionada == 'maiorPreco' ? 'selected=""' : '') ?>>Maior preço</option>
							<option style="font-size: 25px" value="menorPreco" <?= ($ordenacaoSelecionada && $ordenacaoSelecionada == 'menorPreco' ? 'selected=""' : '') ?>>Menor preço</option>
							<option style="font-size: 25px" value="maisVendidos" <?= ($ordenacaoSelecionada && $ordenacaoSelecionada == 'maisVendidos' ? 'selected=""' : '') ?>>Mais Vendidos</option>
						</select>
					</form>
				</div>


				<div class="clearfix"></div>
			</div>

			<?php foreach ($produtos as $produto): ?>
				<div class="col-md-4 product-men">

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

								<!--<del>$390.71</del>-->
							</div>
							<!--
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
								<form action="#" method="post">
									<fieldset>
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="add" value="1">
										<input type="hidden" name="business" value=" ">
										<input type="hidden" name="item_name" value="Party Men's Blazer">
										<input type="hidden" name="amount" value="30.99">
										<input type="hidden" name="discount_amount" value="1.00">
										<input type="hidden" name="currency_code" value="USD">
										<input type="hidden" name="return" value=" ">
										<input type="hidden" name="cancel_return" value=" ">
										<input type="submit" name="submit" value="Ad. ao carrinho" class="button">
									</fieldset>
								</form>
							</div>-->

							<a href="<?= base_url("produto/") . $produto->meta_link ?>"  title="Confira!" class="snipcart-details btn btn-lg btn-block"><i class="fa fa-eye"></i><h4>Conferir</h4></a>


						</div>
					</div>

				</div>
		<?php endforeach;?>

			<!--Fim listagem de 3 produtos-->
			<div class="clearfix"></div>			<div class="text-center"><?= $pagination ?></div>

		</div>


		<div class="clearfix"></div>
		
		<div class="single-pro">

			<div class="clearfix"></div>
		</div>
	</div>
</div>	
<!-- //mens -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('viewsStore/principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/categoria.blade.php ENDPATH**/ ?>