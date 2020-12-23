
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

	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/table.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/separadorPaginas.css') ?>">

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Meus Pedidos</h3>
					<ul class="breadcrumb-tree">
						<li><a href="<?= base_url("") ?>">Home</a></li>
						<li class="active">Meus Pedidos</li>
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
		<div class="container">	<?php
			if(validation_errors('<div>', '</div>')){
				echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
			}

			//getMsg('msgCadastro');
			//var_dump($dados);
			?>
			<section class="content-header">
				<h1>
					<?= $titulo; ?>
				</h1>

				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a> </li>
					<li class="active"><?= $titulo; ?></li>

				</ol>

			</section>

			<section class="content">
				<div class="box">
					<div class="bs-docs-example">
						<table class="table table-striped">
							<thead>
							<tr>
								<!--<td>id</td>-->
								<td>Nome</td>
								<td>E-mail</td>
								<td>Opções</td>
							</tr>
							</thead>

							<tbody>
							<!--
							< ?php foreach ($usuarios as $row): ?>
								<tr>
									<td>< ?= $row->id; ?></td>
									<td>< ?= $row->username; ?></td>
									<td>< ?= $row->email; ?></td>
									<td>< ?= ($row->active == 1 ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>'); ?></td>
									<td>
										<a href="moduloCliente/< ?= $row->id; ?>" title="Editar" class="btn btn-primary"><i class="fa fa-pencil-square"></i></a>
										<a href="" title="Apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
							< ?php endforeach; ?>-->


							<tr>
								<!--<td>< ?= $usuario->id; ?></td>-->
								<td style="width: 25px"><?= $usuario->username; ?></td>
								<td style="width: 20px"><?= mb_strimwidth($usuario->email, 0, 15, '...'); ?></td>
								<td style="width: 20px">
									<a href="moduloCliente/<?= $usuario->id; ?>" title="Editar" class="btn btn-primary"><i class="fa fa-pencil-square"></i></a>
									<!--<a href="" title="Apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>-->
								</td>
							</tr>


							<!--< ?php endforeach; ?>-->
							</tbody>
						</table>
					</div>
				</div>
			</section>

			<?php $qtdPedidos = count($pedidosProdutos); $i = 0; foreach ($pedidosProdutos as $pedido): ?>
		<!-- row -->
			<div class="row">

			<?php getMsg('msgSucesso'); ?>
			<!-- Order Details -->

				<?php if(($pedido && $pedido[0]->tipo == '1')): ?>
				<div class="text-center col-md-14">
					<a href="<?= ($pedido ? $pedido[0]->url_boleto : '') ?>" title="Imprimir Boleto" target="_blank"><img src="<?=base_url("loja/images/imprimirBoleto.png")?>" style="height: 150px; font-size: 12px">IMPRIMIR BOLETO <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?> </a>
				</div>
				<br><br>

				<?php elseif($pedido && $pedido[0]->tipo == "2"): ?>
				<div class="text-center col-md-14">
					<img src="<?=base_url("loja/images/confiraEmail2.png")?>" style="height: 150px">   O PagSeguro enviará a confirmação do pagamento em seu email <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?>
				</div>
				<br><br>
				<?php elseif($pedido && $pedido[0]->tipo == "3"): ?>
				<div class="text-center col-md-14">
					<strong class="text-center">Ir para AMBIENTE SEGURO do Banco</strong>
					<a href="<?= ($pedido ? $pedido[0]->url_boleto : '') ?>" target="_blank">
						<div class="text-center" style="background-color: #DAA520; border-radius: 20px">
							<img src="<?=base_url("loja/images/ambienteTransferencia.png")?>" style="height: 150px">
							Clique aqui <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?>
						</div>
					</a>
				</div>
				<br><br>
				<?php endif; ?>


				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title"><?=$qtdPedidos . 'º '?> pedido</h3>
					</div>
					<div class="section-title text-center">

						<?= ($pedido[0]->cod_rastreio ? '<h4 class="title">Código de Rastreio</h4><h3 style="color: darkgreen">' . $pedido[0]->cod_rastreio . '</h3>' : '') ?>


					</div>
					<!--<p>Status do PagSeguro: < ?php
						if($pedido){
							switch ($pedido[0]->status){//Status do pagseguro
								case 1:
									echo 'Aguardando pagamento';
									break;
								case 2:
									echo 'Em análise: o PagSeguro está analisando o risco da transação';
									break;
								case 3:
									echo  'Paga';
									break;
								case 4:
									echo  'Disponível: a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.';
									break;
								case 5:
									echo  'Em disputa';
									break;
								case 6:
									echo  'Devolvida';
									break;
								case 7:
									echo  'Cancelada';
									break;
								case 8:
									echo  'Debitado: o valor da transação foi devolvido para o comprador';
									break;
								case 9:
									echo  'Retenção temporária: o comprador abriu uma solicitação de chargeback junto à operadora do cartão de crédito.';
									break;
								default:
									echo  'Cancelado';
									break;
							}
						}
					?></p>
					-->
					<p>Status do pedido no PagSeguro: <?php
						if($pedido){
							switch ($pedido[0]->status){
								case 1:
									echo '<br><div class="alert alert-info"><strong style="color: white">Aguardando pagamento:</strong> transação iniciada, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento.</div><hr>';
									break;
								case 2:
									echo '<br><div class="alert alert-info"><strong style="color: white">Em análise:</strong> você optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação.</div><hr>';
									break;
								case 3:
									echo  '<br><div class="alert alert-success"><strong style="color: white">Paga:</strong> a transação foi paga e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento.</div><hr>';
									break;
								case 5:
									echo  '<br><div class="alert alert-info"><strong style="color: white">Em disputa:</strong> dentro do prazo de liberação da transação, você abriu uma disputa.</div><hr>';
									break;
								case 6:
									echo  '<br><div class="alert alert-info"><strong style="color: white">Devolvida:</strong> o valor da transação foi devolvido para o comprador.</div><hr>';
									break;
								case 7:
									echo  '<br><div class="alert alert-error"><strong style="color: white">Cancelada:</strong> a transação foi cancelada no PagSeguro, sem ter sido finalizada.</div><hr>';
									break;
								case 8:
									echo  '<br><div class="alert alert-info"><strong style="color: white">Debitado:</strong> o valor da transação foi devolvido.</div><hr>';
									break;
								case 9:
									echo  '<br><div class="alert alert-info"><strong style="color: white">Retenção temporária:</strong> o comprador abriu uma solicitação de chargeback junto à operadora do cartão de crédito.</div><hr>';
									break;
								default:
									echo  '';
									break;
							}
						}
						?>
					</p>

					<p>Status do pedido na Loja: <?php
						if($pedido){
							switch ($pedido[0]->id_status){
								case 1:
									echo '<label style="color: blue">Aguardando pagamento</label><hr>';
									break;
								case 2:
									echo '<label style="color: blue">Pagamento confirmado</label><hr>';
									break;
								case 3:
									echo  '<label style="color: blue">Aguardando envio</label><hr>';
									break;
								case 4:
									echo  '<label style="color: blue">Enviado</label><hr>';
									break;
								case 5:
									echo  '<label style="color: darkred">Cancelado</label><hr>';
									break;
								default:
									echo  '<hr>';
									break;
							}
						}
						?>
					</p>

					<p >Forma de envio: <?php
						if($pedido){
							if($pedido[0]->forma_envio == 3)  {
								echo "<label style='color: darkgreen'>Combinar entrega<hr></label>";
							}
							if($pedido[0]->forma_envio == '1')  {
								echo "<label style='color: darkgreen'>PAC<hr></label>";
							} if($pedido[0]->forma_envio == '2')  {
								echo "<label style='color: darkgreen'>SEDEX<hr></label>";
							}
						}else{
							echo '<hr>';
						}
						?>
					</p>

					<p>Referência do pedido: <?= ($pedido ? $pedido[0]->ref . '<hr>' : '<hr>') ?></p>

					<div class="order-summary">
						<div class="order-col">
							<div><strong>Produtos</strong></div>
							<div><strong>SUBTOTAL</strong></div>
						</div>

						<div class="order-products">
							<?php  foreach ($pedido as $produto): ?>
							<div class="order-col">
								<div><?=$produto->qtd?>x <?=$produto->nome_produto . ' - ' . ($produto->tamanho ? 'Tamanho: ' . $produto->tamanho : "") . ($produto->tipoProduto ? 'Tipo: ' . $produto->tipoProduto : "")?></div>
								<div><?=formataMoedaReal($produto->valor_total, true)?></div>
							</div>
							<?php endforeach;  ?>

						</div>
						<hr>
						<div class="order-col">
							<div>FRETE</div>
							<div><strong><?= ($pedido ? formataMoedaReal($pedido[0]->total_frete, true) : '') ?></strong></div>
						</div>
						<hr>


						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<?php if($pedido && $pedido[0]->tipo == 1): ?>
							<div><strong><?= ($pedido ? formataMoedaReal($pedido[0]->total_pedido, true) : '') ?></strong></div>

							<?php elseif($pedido && $pedido[0]->tipo == 2): ?>
							<div><strong><?= ($pedido ? $pedido[0]->t_parcela : '') ?>x de <?= ($pedido[0]->v_parcela ? formataMoedaReal($pedido[0]->v_parcela, true) : '') ?> no cartão</strong></div>
							<?php elseif($pedido && $pedido[0]->tipo == 3): ?>
							<div><strong><?= ($pedido ? formataMoedaReal($pedido[0]->v_parcela, true) : '') ?> no débito online</strong></div>
							<?php endif; ?>
						</div>
					</div>
					<hr>


				</div>
				<div class="col-md-5 order-details">
					<?php $j = 0; $totalProdutos = 0;
					foreach ($pedido as $produto){
						$totalProdutos += $produto->qtd;
						$j++;
					}
					?>
					<h1>Minha sacola de compras (<?= $totalProdutos ?>)</h1>
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

						<?php $j = 1; foreach ($pedido as $produto): ?>

						<div>
							<div></div>
							<br>
							<div class="cart-sec simpleCart_shelfItem">
								<div class="cart-item cyc">
									<a href="<?= base_url("produto/" . $produto->meta_link) ?>"><img src="<?= base_url("loja/images/" . $produto->foto) ?>" class="img-responsive" alt=""/></a>
								</div>
								<div class="cart-item-info">
									<h3><a href="<?= base_url("produto/" . $produto->meta_link) ?>"><h3><strong class="nome-produto"><?= $produto->nome_produto ?></strong></h3></a><span>Código do produto: <?=$produto->cod_produto?></span></h3>
									<ul class="qty">
										<?=($produto->tamanho ? '<li><p>Tamanho : '. $produto->tamanho.'</p></li>' : '') ?>
										<?=($produto->tipoProduto ? '<li><p>Tipo : '. $produto->tipoProduto.'</p></li>' : '') ?>
										<li><p>Quantidade : <?= $produto->qtd?></p></li>
										<li>
											<!--
											<div data-app="product.quantity" id="quantidade">
												<span id="span_erro_carrinho" class="blocoAlerta" style="display:none;">Selecione uma opção para variação do produto</span>
												<label>Quantidade:</label>
												<input type="button" id="plus" value='   -   ' onclick="process(-1)" />
												<input id="quant_< ?=$produto['id']?>" name="quantidade_produto" class="text input-carrinho-quantidade" size="1" type="tel" value="< ?= $produto['qtd'] ?>" maxlength="5" />
												<input type="button" id="minus" value='   +   ' onclick="process(1)">
												<br><a href="#" class="btn-qtd-produto-carrinho" data-id="< ?= $produto['id'] ?>"><i class="fa fa-undo"> Atualizar quantidade</i></a>

											</div>-->

										</li>
									</ul>

								</div>

								<div class="clearfix"></div>

							</div>
							<hr>
							<hr>
						</div>
						<?php $j++; endforeach; ?>
					</div>
				</div>
			</div>

			<?php if($pedido[0]->cod_rastreio): ?>
			<br><br>
			<h1 class="text-center" style="color: darkgreen">Seu pedido nos Correios</h1>
			<table class="rwd-table">
				<tr>
					<th style="font-size: 15px">Data e hora</th>
					<th style="font-size: 15px">Local</th>
					<th style="font-size: 15px">Situação</th>
				</tr>
				<?php
				if($json[$i]):
				foreach ($json[$i] as $atualizacao): ?>
				<tr>
					<td style="font-size: 12px"><?=$atualizacao['date'] . ' - ' .$atualizacao['hour']?></td>
					<td style="font-size: 12px"><?=$atualizacao['location']?></td>
					<td style="font-size: 12px"><?=$atualizacao['message']?></td>
				</tr>
				<?php endforeach;
				endif;
				?>
			</table>
			<?php endif; ?>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<hr class="separator separator--dotter" />
			<br>
			<br>
			<br>
			<br>

		<?php $qtdPedidos--; $i++; endforeach; ?>

		<!-- /Order Details -->

			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

@stop
