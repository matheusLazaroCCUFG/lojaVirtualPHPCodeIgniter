
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

				<h3>RELATÓRIOS DE PEDIDOS - <?= formataDataView(dataDb()) ?></h3>
				<hr>
				<div class="row">
					<div class="col-md-12 text-center">

						<?php if($dados): ?>
							<table class="table table-striped table-bordered">
								<tr>
									<td>N. Pedido</td>
									<td>Cliente</td>
									<td>Tipo frete</td>
									<td>Total Produto</td>
									<td>Valor do frete</td>
									<td>Total</td>
								</tr>
								<?php
									$t_frete = 0;
									$t_pedido = 0;
								?>
								<?php foreach ($dados as $p): ?>
									<tr>
										<td><?= $p->id ?></td>
										<td><?= $p->nome?></td>
										<td><?= ($p->forma_envio == 1 ? 'SEDEX' : 'PAC') ?></td>
										<td><?= formataMoedaReal($p->total_produto)?></td>
										<td><?= formataMoedaReal($p->total_frete)?></td>
										<td><?= formataMoedaReal($p->total_pedido)?></td>
									</tr>
									<?php
										$t_frete += $p->total_frete;
										$t_pedido += $p->total_pedido;
									?>
								<?php endforeach; ?>

								<tr>
								<tr>
									<td colspan="4" class="text-right">TOTAIS....:</td>
									<td><?= formataMoedaReal($t_frete) ?></td>
									<td><?= formataMoedaReal($t_pedido) ?></td>

								</tr>
								</tr>
							</table>
						<?php else: ?>
							<p class="text-center"> NÃO EXISTEM PEDIDOS PARA A DATA DE HOJE</p>
						<?php endif; ?>
					</div>
				</div>

			</div>

		</div>


	</div>
	<!--login-->
</div>
<!--content-->

@stop
