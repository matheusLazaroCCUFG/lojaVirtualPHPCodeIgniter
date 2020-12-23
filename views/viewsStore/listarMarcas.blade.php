
@extends('viewsStore/principal')
@section('conteudo')
<!--content-->
<div class="content">
	<!--typography-page -->
	<div class="typo-w3">
		<div class="container">
			<h2 class="tittle">Short Codes</h2>
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
					<li class="active"><?= $titulo; ?></li>

				</ol>

			</section>

			<a href="<?= base_url('moduloMarcas'); ?>" title="Novo" class="btn btn-success">
				<i class="fa fa-plus-circle"></i>Novo
			</a>

			<?php getMsg('msgCadastro'); ?>


			<table class="table table-striped">
				<thead>
				<tr>
					<td>Marcas</td>
					<td class="text-center">Status</td>
					<td class="text-right">Opções</td>
				</tr>
				</thead>

				<tbody>

				<?php foreach ($marcas as $marca): ?>

					<tr>
						<td><?= $marca->nome_marca; ?></td>
						<td class="text-center"><?= ($marca->ativo == 1 ? 'Ativo' : 'Inativo') ?></td>
						<td class="text-right">
							<a href="<?= base_url('moduloMarcas/' . $marca->id) ?>" title="Atualizar categoria" class="btn btn-primary">
								<i class="fa fa-pencil-square"></i>
							</a>
							<a href="<?= base_url('delMarca/' . $marca->id) ?>" title="Apagar categoria" class="btn btn-danger btn-apagar-registro">
								<i class="fa fa-trash-o"></i>
							</a>
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
@stop
