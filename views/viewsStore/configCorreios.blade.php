
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
			getMsg('msgCadastro');

			//getMsg('msgCadastro');


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

						<form class="form-horizontal" method="post" action="<?= base_url('configCorreios'); ?>">
							<div class="form-group">
								<div class="key">
									<label>CEP de origem</label>
									<div class="col-sm-10">

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->cep_origem : set_value('')); ?>"  name="cep_origem" class="form-control" id="cep_origem" placeholder="CEP de origem">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<label>Somar valor ao frete</label>

									<div class="col-sm-10">

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->somar_frete : set_value('')); ?>"  name="somar_frete" class="form-control input_moeda" id="somar_frete" placeholder="Somar valor ao frete">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="form-group">
								<div class="key">
									<label>Valor declarado</label>

									<div class="col-sm-10">

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->valor_declarado : set_value('')); ?>"  name="valor_declarado" class="form-control input_moeda" placeholder="Valor declarado">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Salvar</button>
								</div>
							</div>
						</form>



					</div>
				</div>
			</section>






		</div>
	</div>
	<!-- //typography-page -->

</div>
<!--content-->
@stop
