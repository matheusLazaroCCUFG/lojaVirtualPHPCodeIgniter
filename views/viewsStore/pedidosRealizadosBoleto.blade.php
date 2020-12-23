
@extends('viewsStore/principal')
@section('conteudo')
	<script>
		$('.input_data').mask('00/00/0000');
		$('.input_cep').mask('00000-000');

		var SPMaskBehavior = function (val) {
			return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		},
		spOptions = {
			onKeyPress: function(val, e, field, options) {
				field.mask(SPMaskBehavior.apply({}, arguments), options);
			}
		};
		$('.input_tel').mask(SPMaskBehavior, spOptions);

		$('.input_cpf').mask('000.000.000-00');
		$('.input_moeda').mask('000.000.000.000.000,00', {reverse: true});
		$('.input_mes_ano').mask('00/0000');

	</script>
	<link type="text/css" rel="stylesheet" href="<?= base_url("loja/checkout/css/slick.css")?>"/>
	<link type="text/css" rel="stylesheet" href="<?= base_url("loja/checkout/css/slick-theme.css")?>"/>

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?= base_url("loja/checkout/css/nouislider.min.css")?>"/>

	<!-- Font Awesome Icon -->
	<!--<link rel="stylesheet" href="css/font-awesome.min.css">-->

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= base_url("loja/checkout/css/styleCheckout.css")?>"/>

	<script>var totalCarrinho = <?=$total?>;</script>
	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Checkout</h3>
					<ul class="breadcrumb-tree">
						<li><a href="<?= base_url("") ?>">Home</a></li>
						<li class="active">Checkout</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section checkout-loja">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<?php getMsg('msgSucesso'); ?>
				<!-- Order Details -->
				<div class="text-center col-md-14">
					<a href="<?= ($_SESSION['url_boleto'] ? $_SESSION['url_boleto'] : '') ?>" title="Imprimir Boleto" target="_blank"><img src="<?=base_url("loja/images/imprimirBoleto.png")?>" style="height: 150px">IMPRIMIR BOLETO </a>
				</div>

				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Seu pedido</h3>
					</div>
					<p>Status do pedido: <?= ($_SESSION['status'] ? $_SESSION['status'] : '') ?></p>
					<p>Número do pedido: <?= ($_SESSION['numero_pedido'] ? $_SESSION['numero_pedido'] : '') ?></p>
					<p>Código da transação: <?= ($_SESSION['cod'] ? $_SESSION['cod'] : '') ?></p>


					<div class="order-summary">
						<div class="order-col">
							<div><strong>Produtos</strong></div>
							<div><strong>SUBTOTAL</strong></div>
						</div>

						<div class="order-products">
							<?php $i = 1; foreach ($carrinho as $produto): ?>
								<div class="order-col">
									<div><?=$produto['qtd']?>x <?=$produto['nome']?></div>
									<div><?=formataMoedaReal($produto['subtotal'], true)?></div>
								</div>
							<?php endforeach;  ?>

						</div>
						<hr>
						<div class="order-col">
							<div>FRETE</div>
							<div><strong><?= ($_SESSION['total_frete'] ? formataMoedaReal($_SESSION['total_frete'], true) : '') ?></strong></div>
						</div>
						<hr>


						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<div><strong><?= ($_SESSION['total_pedido'] ? formataMoedaReal($_SESSION['total_pedido'], true) : '') ?></strong></div>
						</div>
					</div>
					<hr>


				</div>
				<div class="col-md-5 order-details">
					<h1>Minha sacola de compras (<?= $_SESSION['tamanho_carrinho'] ? $_SESSION['tamanho_carrinho'] : ''?>)</h1>
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
							<br>
							<div class="cart-sec simpleCart_shelfItem">
								<div class="cart-item cyc">
									<a href="<?= base_url("produto/" . $produto['meta_link']) ?>"><img src="<?= base_url("loja/images/" . $produto['foto']) ?>" class="img-responsive" alt=""/></a>
								</div>
								<div class="cart-item-info">
									<h3><a href="<?= base_url("produto/" . $produto['meta_link']) ?>"><h3><strong class="nome-produto"><?= $produto['nome'] ?></strong></h3></a><span>Código do produto: <?=$produto['codigo']?></span></h3>
									<ul class="qty">
										<li><p>Tamanho : 5</p></li>
										<li><p>Quantidade : <?= $produto['qtd']?></p></li>
										<li>
										<!--
										<div data-app="product.quantity" id="quantidade">
											<span id="span_erro_carrinho" class="blocoAlerta" style="display:none;">Selecione uma opção para variação do produto</span>
											<label>Quantidade:</label>
											<input type="button" id="plus" value='   -   ' onclick="process(-1)" />
											<input id="quant_< ?=$produto['id']?>" name="quantidade_produto" class="text input-carrinho-quantidade" size="1" type="tel" value="<?= $produto['qtd'] ?>" maxlength="5" />
											<input type="button" id="minus" value='   +   ' onclick="process(1)">
											<br><a href="#" class="btn-qtd-produto-carrinho" data-id="< ?= $produto['id'] ?>"><i class="fa fa-undo"> Atualizar quantidade</i></a>

										</div>-->

										</li>
									</ul>

									<div class="delivery">
										<p>Valor individual: <h3>  <?=formataMoedaReal($produto['valor'], true)?></h3></p>
										<br><br><p>Taxas de serviço : Rs.100.00</p>
										<span>Delivered in 2-3 bussiness days</span>
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


				<!-- /Order Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	</div>
	<!-- /SECTION -->

@stop
