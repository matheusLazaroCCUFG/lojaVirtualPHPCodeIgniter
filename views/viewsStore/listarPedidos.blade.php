
@extends('viewsStore/principal')
@section('conteudo')

	<!--content-->
<div class="content">
	<!--typography-page -->
	<div class="typo-w3">
		<div class="container">

			<!----------------------------------------------------------------------------->
			<a href="<?= base_url('dashboard'); ?>" title="Novo" class="btn btn-primary">
				<i class="glyphicon glyphicon-dashboard"></i>  <h4>ACESSAR O PAINEL DE CONTROLE</h4>
			</a>

			<section class="content-header">
				<h1>
					<?= $titulo; ?>
				</h1>

				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a> </li>
					<li class="active"><?= $titulo; ?></li><br><br>

				</ol>

			</section>
			<br>
			<div class="text-left">
				<p style="background-color: darkgreen; color: white; font-size: 15px; width: 200px">VERDE: Pedido Enviado</p>
				<p style="background-color: grey; color: white; font-size: 15px; width: 200px">CINZA: Novo Pedido</p>
			</div>
			<br>
			<!--<a href="< ?= base_url('#'); ?>" title="Relatórios" class="btn btn-success"><i class="fa fa-file-text-o"></i>  Relatórios</a>-->
			<?php getMsg('msgCadastro'); getMsg('msgRastreio');?>
			<div class="text-left">
				<!-- Split button -->
				<div class="btn-group">
					<button type="button" class="btn btn-primary">Relatórios</button>
					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url('relatorioDiario') ?>">Vendas diárias</a></li>
						<!--<li><a href="< ?= base_url('relatorioPeriodo') ?>">Venda por período</a></li>
						<li><a href="< ?= base_url('relatorioMaisVendidos') ?>">Produtos mais vendidos</a></li>-->

					</ul>
				</div>
			</div>



				<table class="table table-striped">
					<thead>
					<tr>
						<td>Num.</td>
						<td>N. do cliente</td>
						<td>Total</td>
						<td class="text-center">Status</td>
						<td class="text-right">Opç.</td>
					</tr>
					</thead>

					<tbody>

					<?php  foreach ($pedidos as $pedido): ?>

						<tr  <?= ($pedido->id_status == 4 ? 'class="alert-success"' : 'class="alert-default"') ?>>
							<td class="col-md-2" ><?= $pedido->id; ?><br>
								<a href="<?= base_url('imprimirPedido/' . $pedido->id) ?>" target="_blank" title="Imprimir pedido" class="btn btn-primary" <?=($pedido->id_status == 4 ? 'style="background-color: green"' : 'style="background-color: grey"')?>>
									<i  class="fa fa-file-text-o"> Imprimir</i>
								</a>
								<?php if($pedido->idstatus == 1): ?>
								<div title="o comprador iniciou a transação, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento" class="btn btn-default" <?=($pedido->idstatus == 1 ? 'class="alert-default"' : '')?>>
									<i> Aguardando Pagamento </i>
								</div>
								<?php elseif($pedido->idstatus == 2): ?>
								<div title="o comprador optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação." class="btn btn-default" <?=($pedido->idstatus == 2 ? 'class="alert-default"' : '')?>>
									<i class=""> Em análise</i>
								</div>
								<?php elseif($pedido->idstatus == 3): ?>
								<div title="a transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento." class="btn btn-success" <?=($pedido->idstatus == 3 ? 'class="alert-success"' : '')?>>
									<i class="fa fa-check"> Pago</i>
								</div>
								<?php elseif($pedido->idstatus == 4): ?>
								<div title=" a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta." class="btn btn-default" <?=($pedido->idstatus == 4 ? 'class="alert-default"' : '')?>>
									<i > Disponível</i>
								</div>
								<?php elseif($pedido->idstatus == 5): ?>
								<div title="o comprador, dentro do prazo de liberação da transação, abriu uma disputa." class="btn btn-default" <?=($pedido->idstatus == 5 ? 'class="alert-default"' : '')?>>
									<i > Em disputa</i>
								</div>
								<?php elseif($pedido->idstatus == 6): ?>
								<div title="o valor da transação foi devolvido para o comprador." class="btn btn-default" <?=($pedido->idstatus == 6 ? 'class="alert-default"' : '')?>>
									<i > Devolvida</i>
								</div>
								<?php elseif($pedido->idstatus == 7): ?>
								<div title="a transação foi cancelada sem ter sido finalizada." class="btn btn-danger" <?=($pedido->idstatus == 7 ? 'class="alert-danger"' : '')?>>
									<i > Cancelada</i>
								</div>
								<?php elseif($pedido->idstatus == 8): ?>
								<div title="o valor da transação foi devolvido para o comprador." class="btn btn-default" <?=($pedido->idstatus == 8 ? 'class="alert-default"' : '')?>>
									<i > Debitado</i>
								</div>
								<?php elseif($pedido->idstatus == 9): ?>
								<div title=" o comprador abriu uma solicitação de chargeback junto à operadora do cartão de crédito." class="btn btn-default" <?=($pedido->idstatus == 9 ? 'class="alert-default"' : '')?>>
									<i > Retenção temporária</i>
								</div>
								<?php endif; ?>
								<br>
								<div>
									<p>Produtos: </p>
									<?php
									$CI =& get_instance();
									$CI->load->model('pedidosModel');
									$produto = $CI->pedidosModel->getProdutosPedido2((int)$pedido->id_pedido);
									?>
									<?php foreach ($produto as $prod): ?>
										<p style="background-color: grey; color: white; "><?= '['.$prod->qtd . '] ' . $prod->nome_produto ?>
										<?php if($prod->tamanho): ?>
											<?= ' - '.$prod->tamanho . "<br><br>"?>
										<?php elseif($prod->tipo): ?>
											<?=' - '.$prod->tipo. "<br><br>"?>
										<?php else: ?>
											<?="<br>"?>
										<?php endif; ?>
										</p>
									<hr>

									<?php endforeach; ?>
								</div>
								</td>
							<td><?= $pedido->username . '<br>' . $pedido->telefone; ?></td>
							<td><?= formataMoedaReal($pedido->total_pedido, true); ?></td>
							<td class="text-center">
								<?= $pedido->titulo_status?><br>
									<div class="btn-group">

										<button <?=($pedido->id_status == 4 ? 'style="background-color: green"' : 'style="background-color: grey"')?> type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fa fa-list" >Mudar</i><br><span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<?php $x = null; ?>
											<?php foreach ($status as $s): ?>
											<li><a style="font-size: 20px" href="<?= base_url('mudarStatusPedido/') . $pedido->id . '/' . $s->id ?>"><?= ($s->titulo_status) ?></a></li>
											<?php endforeach; ?>

										</ul>

									</div>
							</td>
							<td class="text-right">


								<!--<button type="button" class="btn btn-primary btn-mudar-status-pedido" title="Mudar Status Pedido" data-toggle="modal" data-id-pedido="< ?= $pedido->id ?>">
									<i class="fa fa-pencil-square-o">  Mudar Status</i>
								</button>-->
								<!--<a href="< ?= base_url('mudarStatusPedido/' . $pedido->id) ?>" title="Mudar Status Pedido" class="btn btn-primary btn-mudar-status-pedido">
									<i class="fa fa-pencil-square-o"></i>
								</a>-->
								<form method="post" action="<?=base_url("codRastreio/" . $pedido->id)?>">
										<div class="input-group">

										<input class="form-control" type="text" name="codRastreio" placeholder="Código de rastreio" value="<?=($pedido->cod_rastreio ? $pedido->cod_rastreio : '')?>">
										<span class="input-group-btn">
										<input <?=($pedido->id_status == 4 ? 'style="background-color: green"' : 'style="background-color: grey"')?> class="btn btn-primary" type="submit" value="Salvar código de rastreio">
										</span>

										</div>
								</form>
								<!--<a href="< ?= base_url('codigoRastreioPedido/' . $pedido->id) ?>" title="Código de rastreio" class="btn btn-primary btn-cod-rastreio-pedido">
									<i class="fa fa-truck"></i>
								</a>-->

							</td>

						</tr>

					<?php endforeach; ?>

					</tbody>
				</table>

			<!----------------------------------------------------------------------------->

		</div>
	</div>
	<!-- //typography-page -->

</div>
<!--content-->
<div class="modal_dinamico"></div>

	@stop
