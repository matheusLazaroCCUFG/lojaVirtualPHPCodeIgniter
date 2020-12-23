<?php $__env->startSection('conteudo'); ?>
<!--content-->
<div class="content">



	<!--typography-page -->
	<div class="typo-w3">
		<div class="container">

			<a href="<?= base_url('dashboard'); ?>" title="Novo" class="btn btn-primary">
				<i class="glyphicon glyphicon-dashboard"></i>  <h4>ACESSAR O PAINEL DE CONTROLE</h4>
			</a><br><br>
			<a href="<?= base_url('sairCliente') ?>" title="Sair" class="btn btn-danger glyphicon glyphicon-log-out"> SAIR</a>
			<br><br>
			<?php
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
								<td>id</td>
								<td>Nome</td>
								<td>E-mail</td>
								<td>Endereço</td>
								<td>Status</td>
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

						<?php foreach ($usuarios as $usuario):?>


							<tr>
								<td><?= $usuario->id; ?></td>
								<td><?= $usuario->username; ?></td>
								<td><?= $usuario->email; ?></td>
								<td><?= $usuario->endereco . ' - ' . $usuario->complemento . ' - numero: ' . $usuario->numero . ' - ' . $usuario->bairro . ' - ' . $usuario->cidade . ' - ' . $usuario->estado . ' - ' . $usuario->telefone . ' - ' . $usuario->data_cadastro; ?></td>
								<td><?= ($usuario->active == 1 ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>'); ?></td>
								<td>
									<!--<a href="moduloCliente/< ?= $usuario->id; ?>" title="Editar" class="btn btn-primary"><i class="fa fa-pencil-square"></i></a>-->
									<!--<a href="" title="Apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>-->
								</td>
							</tr>
						<?php endforeach; ?>

							<!--< ?php endforeach; ?>-->
							</tbody>
						</table>
					</div>
				</div>
			</section>


		</div>
	</div>
	<!-- //typography-page -->

</div>
<!--content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('viewsStore/principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/clientes.blade.php ENDPATH**/ ?>