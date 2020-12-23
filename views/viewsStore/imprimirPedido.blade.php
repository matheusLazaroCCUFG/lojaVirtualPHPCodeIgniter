
@extends('viewsStore/principal')
@section('conteudo')

<!--content-->
<div class="content">
	<!--login-->
	<div class="login">

			<div class="form-w3agile">


				<?php
				/*$CI =& get_instance();
				if($CI->session->flashdata('msgCadastro')){
					echo $CI->session->flashdata('msgCadastro');
				}*/
				//$this->load->helper('helper_helper');

				if(validation_errors()){
					echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
				}
				getMsg('msgCadastro');
				//var_dump($pedido);
				?>

				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1><?= $loja->empresa ?></h1>
							<h5><?= $loja->empresa . ' - ' . $loja->telefone ?></h5>
						</div>
					</div>
					<hr/>

					<h3>DADOS DO COMPRADOR</h3>
					<div class="row">
						<div class="col-md-12 text-center">
							<table class="table table-striped table-bordered">
								<tr>
									<td class="text-left">Nome: </td>
									<td class="text-left"><?= $pedido->username ?></td>
								</tr>
								<tr>
									<td class="text-left">Telefone: </td>
									<td class="text-left"><?= $pedido->telefone ?></td>
								</tr>
								<tr>
									<td class="text-left">E-mail: </td>
									<td class="text-left"><?= $pedido->email ?></td>
								</tr>
								<tr>
									<td class="text-left">Forma de envio: </td>
									<td class="text-left"><?php if($pedido->forma_envio == 1){echo 'Correios PAC';}elseif($pedido->forma_envio == 2){echo 'Correios Sedex';}else{ echo 'Combinar Entrega';} ?></td>
								</tr>
							</table>
						</div>
					</div>
					<hr/>
					<h3>DADOS DE ENVIO</h3>
					<div class="row">
						<div class="col-md-12 text-center">
							<table class="table table-striped table-bordered">
								<tr>
									<td class="text-left">CEP</td>
									<td class="text-left">Endereço</td>
									<td class="text-left">Complemento</td>
									<td class="text-left">Número</td>
									<td class="text-left">Bairro</td>
									<td class="text-left">Cidade</td>
									<td class="text-left">Estado</td>
								</tr>
								<tr>
									<td class="text-left"><?= $pedido->cep ?></td>
									<td class="text-left"><?= $pedido->endereco ?></td>
									<td class="text-left"><?= $pedido->complemento ?></td>
									<td class="text-left"><?= $pedido->numero ?></td>
									<td class="text-left"><?= $pedido->bairro ?></td>
									<td class="text-left"><?= $pedido->cidade ?></td>
									<td class="text-left"><?= $pedido->estado ?></td>
								</tr>
							</table>
						</div>
					</div>
					<hr/>
					<h3>ITENS DO PEDIDO</h3>
					<div class="row">
						<div class="col-md-12 text-center">
							<table class="table table-striped table-bordered">
								<tr>
									<td class="text-left">Descrição</td>
									<td class="text-left">Quantidade</td>
									<td class="text-left">Valor Unitário</td>
									<td class="text-left">Valor Total</td>
								</tr>
								
								<?php $j = 0;   foreach ($produtos as $produto => $key ): ?>
									<?php foreach ($key as $item) : ?>
										<tr>
											<td class="text-left"><?= $item->nome_produto . ($item->tamanho != '' ? ' | Tamanho: ' .$item->tamanho : '') ?>
												<a href="<?= base_url("loja/images/" . $item->foto)?>" target="_blank"><div class="thumb-image"> <img style="width: 200px" src="<?= base_url("loja/images/" . $item->foto) ?>" data-imagezoom="true" class="img-responsive"> </div></a>
												<br><a style="font-size: 20px" href="<?= base_url("loja/images/" . $item->foto)?>" target="_blank"> Abrir Imagem </a>
											</td>
											<td class="text-left"><?= $item->qtd ?></td>
											<td class="text-left"><?= formataMoedaReal($item->valor, true) ?></td>
											<td class="text-left"><?= formataMoedaReal($item->total_pedido, true) ?></td>
										</tr>
									<?php endforeach; ?>
								<?php $j++; endforeach; ?>
							</table>
						</div>
					</div>
					<hr/>
					<h3>Totais</h3>
					<table class="table table-striped table-bordered">
						<tr>
							<td class="text-right">VALOR TOTAL DOS PRODUTOS....:</td>
							<td class="text-right"><?= formataMoedaReal($pedido->total_produto, true) ?></td>
						</tr>
						<tr>
							<td class="text-right">VALOR TOTAL DO FRETE....:</td>
							<td class="text-right"><?= formataMoedaReal($pedido->total_frete, true) ?></td>
						</tr>
						<tr>
							<td class="text-right">VALOR TOTAL DO PEDIDO....:</td>
							<td class="text-right"><?= formataMoedaReal($pedido->total_pedido, true) ?></td>
						</tr>
					</table>
					<hr/>

				</div>

			</div>


	</div>
	<!--login-->
</div>
<!--content-->

@stop
