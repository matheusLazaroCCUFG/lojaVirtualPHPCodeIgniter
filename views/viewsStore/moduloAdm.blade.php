
@extends('viewsStore/principal')
@section('conteudo')
<!--content-->
<div class="content">
	<!--typography-page -->
	<div class="typo-w3">
		<div class="container">
			<!----------------------------------------------------------------------------->


			<!--Criar Botão para acessar o carrinho de compras-->

			<section class="content-header">
				<h2 class="tittle">
					<?= $titulo; ?>
				</h2>

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


			<form role="form" method="post" class="form-group" action="<?= base_url('moduloCliente/core') ?>" >
				<div class="key">
					<i aria-hidden="true">Username</i>
					<input  type="text"  name="Username" value="<?= ($dados != null ? $dados->nome : set_value('Username')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Nome</i>
					<input  type="text"  name="nome" value="<?= ($dados != null ? $dados->nome : set_value('nome')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'nome';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">CPF</i>
					<input class="input_cpf" type="text"  name="cpf" value="<?= ($dados != null ? $dados->cpf : set_value('cpf')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'cpf';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Data de Nascimento</i>
					<input  class="input_data" type="text"  name="data_nascimento" value="<?= ($dados != null ? formataDataView($dados->data_nascimento) : set_value('data_nascimento')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'data_nascimento';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">CEP</i>
					<input  class="input_cep" type="text"  name="cep" value="<?= ($dados != null ? $dados->cep : set_value('cep')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'cep';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Endereço</i>
					<input type="text"  name="endereco" value="<?= ($dados != null ? $dados->endereco : set_value('endereco')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'endereco';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Número</i>
					<input  type="text"  name="numero" value="<?= ($dados != null ? $dados->numero : set_value('numero')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'numero';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Bairro</i>
					<input  type="text"  name="bairro" value="<?= ($dados != null ? $dados->bairro : set_value('bairro')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'bairro';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Complemento</i>
					<input  type="text"  name="complemento" value="<?= ($dados != null ? $dados->complemento : set_value('complemento')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'complemento';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Cidade</i>
					<input  type="text"  name="cidade" value="<?= ($dados != null ? $dados->cidade : set_value('cidade')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'cidade';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Estado</i>
					<input  type="text"  name="estado" value="<?= ($dados != null ? $dados->estado : set_value('estado')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'estado';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">E-mail</i>
					<input  type="text"  name="email" value="<?= ($dados != null ? $dados->email : set_value('email')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" >
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i aria-hidden="true">Telefone</i>
					<input  type="text"  name="telefone" value="<?= ($dados != null ? $dados->telefone : set_value('telefone')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'telefone';}" >
					<div class="clearfix"></div>
				</div>

				<?php if($dados): ?>

					<input type="hidden" name="id" value="<?= $dados->id; ?>">

				<?php endif; ?>

				<input  type="submit" value="Submit">

			</form>




			<!----------------------------------------------------------------------------->

		</div>
	</div>
	<!-- //typography-page -->

</div>
<!--content-->
@stop
