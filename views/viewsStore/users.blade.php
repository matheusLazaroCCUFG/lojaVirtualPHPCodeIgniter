
@extends('viewsStore/principal')
@section('conteudo')

<!--content-->
		<div class="content">
			<!--typography-page -->
				<div class="typo-w3">
					<div class="container">


						<?php
							if(validation_errors('<div>', '</div>')){
								echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
							}

							//getMsg('msgCadastro');
							//var_dump($dados);
						?>

						<a href="<?= base_url('dashboard'); ?>" title="Novo" class="btn btn-primary">
							<i class="glyphicon glyphicon-dashboard"></i>  <h4>ACESSAR O PAINEL DE CONTROLE</h4>
						</a><br><br>
						<a href="<?= base_url('sairAdm') ?>" title="Sair" class="btn btn-danger glyphicon glyphicon-log-out"> SAIR</a>
						<br><br>
						<?php if($registrarAdm == true): ?>
								<a href="<?= base_url('cadastrarAdm') ?>" title="novoAdm" class="btn btn-success glyphicon glyphicon-plus-sign"> NOVO USUÁRIO ADM</a>
						<?php endif; ?>
						<section class="content-header">
							<h1>
								<?= $titulo; ?>
							</h1>

							<ol class="breadcrumb">
								<li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a> </li>
								<li class="active"><?= $titulo; ?></li>

							</ol>

						</section>

						<?php
							getMsg('msgCadastro');
						?>
						<section class="content">
							<div class="box">
								<div class="bs-docs-example">
									<table class="table table-striped">
										<thead>
											<tr>
												<td>id</td>
												<td>Nome</td>
												<td>E-mail</td>
												<td>Status</td>
												<td>Opções</td>
											</tr>
										</thead>

										<tbody>




											<?php foreach ($usuarios as $row): ?>
												<tr>
												<td><?= $row->id; ?></td>
												<td><?= $row->username; ?></td>
												<td><?= $row->email; ?></td>
												<td><?= ($row->active == 1 ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>'); ?></td>
												<td>
												<a href="moduloCliente/<?= $row->id; ?>" title="Editar" class="btn btn-primary"><i class="fa fa-pencil-square"></i></a>
												</td>
												</tr>
											<?php endforeach; ?>
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
@stop
