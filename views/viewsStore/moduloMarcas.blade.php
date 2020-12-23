
@extends('viewsStore/principal')
@section('conteudo')
<!--content-->
<div class="content">
	<!--typography-page -->
	<div class="typo-w3">
		<div class="container">
			<h2 class="tittle">Short Codes</h2>
			<!----------------------------------------------------------------------------->



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
			/*$CI =& get_instance();
			if($CI->session->flashdata('msgCadastro')){
				echo $CI->session->flashdata('msgCadastro');
			}*/
			//$this->load->helper('helper_helper');
			getMsg('msgCadastro');
			if(validation_errors()){
				echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
			}
			//var_dump($dados);
			?>


			<form role="form" method="post" class="form-group" action="<?= base_url('moduloMarcas/core') ?>" >

				
				<div class="form-group">
					<label for="nome_marca">Nome da Marca</label>

					<input style="border-color: black" class="form-control" type="text"  name="nome_marca" value="<?= ($dados != null ? $dados->nome_marca : set_value('')); ?>" >
					<div class="clearfix"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Marca ativa?</label>
					<div class="col-sm-4">
						<select style="border-color: black" name="ativo" class="form-control">
							<?php if($dados): ?>
								<option value="0" <?= ($dados->ativo == 0 ? 'selected=""' : '') ?>>Não</option>
								<option value="1" <?= ($dados->ativo == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php else: ?>
								<option value="0">Não</option>
								<option value="1" selected="">Sim</option>
							<?php endif; ?>
						</select>
					</div>
				</div>


				<?php if($dados): ?>

					<input type="hidden" name="id" value="<?= $dados->id; ?>">

				<?php endif; ?>

				<input style="border-color: black; background-color: darkgreen; color: white" class="form-control" type="submit" value="Salvar">

			</form>




			<!----------------------------------------------------------------------------->

		</div>
	</div>
	<!-- //typography-page -->

</div>
<!--content-->
@stop
