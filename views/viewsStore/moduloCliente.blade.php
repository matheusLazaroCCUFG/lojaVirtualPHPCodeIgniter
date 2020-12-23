
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
			?>

			<div class="modal-body modal-body-sub_agile">
				<div class="col-md-8 ">
			<form role="form" method="post" class="form-group" action="<?= base_url('moduloCliente/core') ?>" >
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">Nome completo</span>

					<input  type="text"  name="Username" value="<?= ($dados != null ? $dados->username : '') ?>"  >
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">CPF</span>
					<input class="input_cpf" type="text"  name="cpf" value="<?= ($dados != null ? $dados->cpf : '') ?>" >
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">Data de Nascimento</span>

					<input  class="input_data" type="text"  name="data_nascimento" value="<?= ($dados != null ? formataDataView($dados->data_nascimento) : set_value('data_nascimento')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'data_nascimento';}" >
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">CEP</span>

					<input  class="input_cep" type="text"  name="cep" value="<?= ($dados != null ? $dados->cep : set_value('cep')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'cep';}" >
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">Endereço</span>

					<input type="text"  name="endereco" value="<?= ($dados != null ? $dados->endereco : set_value('endereco')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'endereco';}" >
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">Número</span>

					<input  type="text"  name="numero" value="<?= ($dados != null ? $dados->numero : set_value('numero')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'numero';}" >
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">Bairro</span>

					<input  type="text"  name="bairro" value="<?= ($dados != null ? $dados->bairro : set_value('bairro')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'bairro';}" >
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">Complemento</span>

					<input  type="text"  name="complemento" value="<?= ($dados != null ? $dados->complemento : set_value('complemento')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'complemento';}" >
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">Cidade</span>
					<input  type="text"  name="cidade" value="<?= ($dados != null ? $dados->cidade : set_value('cidade')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'cidade';}" >
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<!--<span class="input-group-addon" id="sizing-addon2">Estado</span>
					<input  type="text"  name="estado" value="< ?= ($dados != null ? $dados->estado : set_value('estado')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'estado';}" >
					-->

						<?php if($dados): ?>

							<label for="estado">Estado</label>
							<select class="input" name="estado" id="estado">
								<option value="<?=$dados->estado?>">
								<?php if(strcmp($dados->estado, "AC") == 0){ echo " Acre";} ?>
								<?php if(strcmp($dados->estado, "AL") == 0){ echo " Alagoas";} ?>
								<?php if(strcmp($dados->estado, "AP") == 0){ echo " Amapá";} ?>
								<?php if(strcmp($dados->estado, "AM") == 0){ echo " Amazonas";} ?>
								<?php if(strcmp($dados->estado, "BA") == 0){ echo " Bahia";} ?>
								<?php if(strcmp($dados->estado, "CE") == 0){ echo " Ceará";} ?>
								<?php if(strcmp($dados->estado, "DF") == 0){ echo " Distrito Federal";} ?>
								<?php if(strcmp($dados->estado, "ES") == 0){ echo " Espírito Santo";} ?>
								<?php if(strcmp($dados->estado, "GO") == 0){ echo " Goiás";} ?>
								<?php if(strcmp($dados->estado, "MA") == 0){ echo " Maranhão";} ?>
								<?php if(strcmp($dados->estado, "MT") == 0){ echo " Mato Grosso";} ?>
								<?php if(strcmp($dados->estado, "MS") == 0){ echo " Mato Grosso do Sul";} ?>
								<?php if(strcmp($dados->estado, "MG") == 0){ echo " Minas Gerais";} ?>
								<?php if(strcmp($dados->estado, "PA") == 0){ echo " Pará";} ?>
								<?php if(strcmp($dados->estado, "PB") == 0){ echo " Paraíba";} ?>
								<?php if(strcmp($dados->estado, "PR") == 0){ echo " Paraná";} ?>
								<?php if(strcmp($dados->estado, "PE") == 0){ echo " Pernambuco";} ?>
								<?php if(strcmp($dados->estado, "PI") == 0){ echo " Piauí";} ?>
								<?php if(strcmp($dados->estado, "RJ") == 0){ echo " Rio de Janeiro";} ?>
								<?php if(strcmp($dados->estado, "RN") == 0){ echo " Rio Grande do Norte";} ?>
								<?php if(strcmp($dados->estado, "RS") == 0){ echo " Rio Grande do Sul";} ?>
								<?php if(strcmp($dados->estado, "RO") == 0){ echo " Rondônia";} ?>
								<?php if(strcmp($dados->estado, "RR") == 0){ echo " Roraima";} ?>
								<?php if(strcmp($dados->estado, "SC") == 0){ echo " Santa Catarina";} ?>
								<?php if(strcmp($dados->estado, "SP") == 0){ echo " São Paulo";} ?>
								<?php if(strcmp($dados->estado, "SE") == 0){ echo " Sergipe";} ?>
								<?php if(strcmp($dados->estado, "TO") == 0){ echo " Tocantins";} ?>
								</option>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
							<div class="clearfix"></div>
						<?php else: ?>
							<label for="estado">Estado</label>
							<select  class="input" name="estado" id="estado">
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
							<div class="clearfix"></div>
						<?php endif; ?>

				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">E-mail</span>
					<input  type="text"  name="email" value="<?= ($dados != null ? $dados->email : set_value('email')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" readonly>
					<div class="clearfix"></div>
				</div>
				<div class="input-group w3_w3layouts">
					<span class="input-group-addon" id="sizing-addon2">Telefone</span>
					<input class="input_tel" type="text"  name="telefone" value="<?= ($dados != null ? $dados->telefone : set_value('telefone')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'telefone';}" >
					<div class="clearfix"></div>
				</div>

				<?php if($dados): ?>

					<input type="hidden" name="id" value="<?= $dados->id; ?>">

				<?php endif; ?>

				<input  type="submit" value="Submit">

			</form>
				</div>
			</div>



			<!----------------------------------------------------------------------------->

		</div>
	</div>
	<!-- //typography-page -->

</div>
<!--content-->
@stop
