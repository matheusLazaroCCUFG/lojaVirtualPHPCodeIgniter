
@extends('viewsStore/principal')
@section('conteudo')
<!--content-->
		<div class="content">
			<!--typography-page -->
				<div class="typo-w3">
					<div class="container">
						<div class="row">
							<a href="<?= base_url('sairCliente') ?>" title="Sair" class="btn btn-danger glyphicon glyphicon-log-out"> SAIR</a>


						</div>
						<br><br>
						<div style=" blotext-align: center;  border-radius: 20px; width: 600px" class="text-center">
							<a  href="<?= base_url("pedidosRealizados")?>">
								<h3 style="color: #c2c2c2">Acompanhe seus Pedidos<br>(Clique aqui)</h3>
								<img style="height: 200px;" src="<?= base_url("loja/images/acompanharPedidoCliente2.png")?>">
							</a>
						</div>
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
												<!--<td>id</td>-->
												<td>Nome</td>
												<td>E-mail</td>
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


											<tr>
												<!--<td>< ?= $usuario->id; ?></td>-->
												<td><?= $usuario->username; ?></td>
												<td><?= $usuario->email; ?></td>
												<td><?= ($usuario->active == 1 ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>'); ?></td>
												<td>
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


					</div>
				</div>
			<!-- //typography-page -->

		</div>
		<!--content-->
@stop
