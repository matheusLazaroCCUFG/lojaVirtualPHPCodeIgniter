
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

				<h3>RELATÓRIOS DE PRODUTOS MAIS VENVIDOS - <?= formataDataView(dataDb()) ?></h3>
				<hr>
				<div class="row">
					<div class="col-md-12 text-center">

						<?php if($produtos): ?>
							<table class="table table-striped table-bordered">
								<tr>
									<td>Cod. Produto</td>
									<td>Nome do produto</td>
									<td>Quantidade vendida</td>
								</tr>

								<?php foreach ($produtos as $p): ?>
									<tr>
										<td><?= $p->cod_produto ?></td>
										<td><?= $p->nome_produto?></td>
										<td><?= $p->quant_vendidos?></td>
									</tr>

								<?php endforeach; ?>

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
