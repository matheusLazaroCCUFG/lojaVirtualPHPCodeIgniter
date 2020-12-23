<?php $__env->startSection('conteudo'); ?>

	<link rel="stylesheet" href="<?= base_url("loja/css/colorpicker.css") ?>" type="text/css" media="screen" />

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



						<div class="parent-selector">
							<div id="displayColor" style="background-color: <?=$query->corHex?>"></div>
							<div class="div-slider">
								<input style="border-color: black"  type="range" min="0" max="255" value="0" class="slider" id="myRange1" alt="red">
								<input style="border-color: black"  type="number" id="p-red" min="0" max="255" class="text-color" name="" alt="red" value="0">
								<p class="p-slider" >R: </p>
							</div>
							<div class="div-slider">
								<input style="border-color: black"  type="range" min="0" max="255" value="0" class="slider" id="myRange2" alt="green">
								<input style="border-color: black"  type="number" id="p-green" min="0" max="255" class="text-color" name="" alt="green" value="0">
								<p class="p-slider">V:</p>
							</div>
							<div class="div-slider">
								<input style="border-color: black"  type="range" min="0" max="255" value="0" class="slider" id="myRange3" alt="blue">
								<input style="border-color: black"  type="number" id="p-blue" min="0" max="255" class="text-color" name="" alt="blue" value="0">
								<p class="p-slider">B:</p>
							</div>
							<form class="form-horizontal" method="post" action="<?= base_url('config'); ?>">
								<input style="border-color: black"  type="text" id="hexa-color" name="corPrincipal" value="<?=$query->corHex?>">
								<button id="button-validColor" style="width: 200px" type="submit" class="btn btn-success button salvaCor">Salvar</button>
							</form>
						</div>






						<form class="form-horizontal" method="post" action="<?= base_url('config'); ?>">


							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>Título</label>
										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->titulo : set_value('')); ?>"  name="titulo" class="form-control" id="titulo" placeholder="Título">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div  class="form-group">
								<div class="form-group">
									<div class="key">

										<div class="col-sm-10">
											<label>Nome da empresa</label>

											<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->empresa : set_value('')); ?>"  name="empresa" class="form-control" id="empresa" placeholder="Nomde da empresa">
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>Nome completo do proprietário</label>

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->nome_proprietario : set_value('')); ?>"  name="nome_proprietario" class="form-control" id="nome_proprietario" placeholder="nome_proprietario">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>CPF do proprietário</label>

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->cpf : set_value('')); ?>"  name="cpf" class="form-control" id="cpf" placeholder="CPF">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>CNPJ</label>

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->cnpj : set_value('')); ?>"  name="cnpj" class="form-control input-cnpj" placeholder="CNPJ">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>CEP</label>

									<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->cep : set_value('')); ?>"  name="cep" class="form-control" id="cep" placeholder="CEP">
								</div>
								<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>Endereço</label>

									<input style="border-color: black"  type="endereco"  value="<?= ($query != null ? $query->endereco : set_value('')); ?>"  name="endereco" class="form-control" id="endereco" placeholder="Endereço">
								</div>
								<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>Bairro</label>

									<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->bairro : set_value('')); ?>"  name="bairro" class="form-control" id="titulo" placeholder="Bairro">
								</div>
								<div class="clearfix"></div>
								</div>
							</div><div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>Complemento</label>

									<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->complemento : set_value('')); ?>"  name="complemento" class="form-control" id="complemento" placeholder="Complemento">
								</div>
								<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>Cidade</label>

									<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->cidade : set_value('')); ?>"  name="cidade" class="form-control" id="cidade" placeholder="Cidade">
								</div>
								<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>Estado</label>

									<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->estado : set_value('')); ?>"  name="estado" class="form-control" id="estado" placeholder="Estado">
								</div>
								<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>Telefone</label>

									<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->telefone : set_value('')); ?>"  name="telefone" class="form-control" id="telefone" placeholder="Telefone">
								</div>
								<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>E-mail</label>

									<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->email : set_value('')); ?>"  name="email" class="form-control" id="email" placeholder="E-mail">
								</div>
								<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
								<div class="col-sm-10">
									<label>Total de produtos em destaque</label>

									<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->p_destaque : set_value('')); ?>"  name="p_destaque" class="form-control" id="p_destaque" placeholder="Total de produtos em destaque">
								</div>
								<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Seus produtos possuem marcas?</label>
								<div class="clearfix">
									<select style="border-color: black" name="possui_marcas" class="form-control">
										<?php if($query): ?>
										<option value="0" <?= ($query->possui_marcas == 0 ? 'selected=""' : '') ?>>Não</option>
										<option value="1" <?= ($query->possui_marcas == 1 ? 'selected=""' : '') ?>>Sim</option>
										<?php else: ?>
										<option value="0">Não</option>
										<option value="1" selected="">Sim</option>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Sua Loja possibilitará Combinar Entega como forma de Envio?</label>
								<div class="clearfix">
									<select style="border-color: black" name="combinarEntrega" class="form-control">
										<?php if($query): ?>
										<option value="0" <?= ($query->combinarEntrega == 0 ? 'selected=""' : '') ?>>Não</option>
										<option value="1" <?= ($query->combinarEntrega == 1 ? 'selected=""' : '') ?>>Sim</option>
										<?php else: ?>
										<option value="0">Não</option>
										<option value="1" selected="">Sim</option>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="form-group condicaoCombinarEntrega <?=($query->combinarEntrega == 0 ? "hide" : "")?>">
								<div class="key">
									<div class="col-sm-10">
										<label>Condição e valor dos possíveis fretes a serem combinados</label>

										<textarea style="border-color: black"  type="text" name="condicaoCombinarEntrega" class="form-control" ><?= ($query != null ? $query->condicaoCombinarEntrega : set_value('')); ?></textarea>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>Termos e Condições extras (Utilize tags HTML para formatar o texto)</label>

										<textarea style="border-color: black"  type="text" name="extraTermosCondicoes" class="form-control" ><?= ($query != null ? $query->extraTermosCondicoes : set_value('')); ?></textarea>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>Número do WhatsApp</label>

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->numWpp : set_value('')); ?>"  name="numWpp" class="form-control  input_tel" placeholder="Número de WhatsApp do Vendedor">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>Link do Instagram (Escreva todo o link: https://www. ...)</label>

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->linkInstagram : set_value('')); ?>"  name="linkInstagram" class="form-control"  placeholder="Link do Instagram">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>Link do Facebook (Escreva todo o link: https://www. ...)</label>

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->linkFacebook : set_value('')); ?>"  name="linkFacebook" class="form-control" placeholder="Link do Facebook">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>





							<div class="form-group">
								<label class="col-md-4 control-label">Existe um valor mínimo para compras na Loja?</label>
								<div class="clearfix">
									<select style="border-color: black" name="possuiValorMinimo" class="form-control possuiValorMinimo">
										<?php if($query): ?>
										<option value="0" <?= ($query->possuiValorMinimo == 0 ? 'selected=""' : '') ?>>Não</option>
										<option value="1" <?= ($query->possuiValorMinimo == 1 ? 'selected=""' : '') ?>>Sim</option>
										<?php else: ?>
										<option value="0">Não</option>
										<option value="1" selected="">Sim</option>
										<?php endif; ?>
									</select>
								</div>
							</div>


							<div class="form-group valorMinimo <?= ((int)$query->valorMinimo == 0 ? "hide" : "")?>">
								<div class="key">
									<div class="col-sm-10">
										<label>Valor Mínimo para Compras no site</label>

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->valorMinimo : set_value('')); ?>"  name="valorMinimo" class="form-control input-moeda" placeholder="Valor Mínimo">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="form-group">
								<div class="key">
									<div class="col-sm-10">
										<label>Peso máximo por Pedido (Os Correios aceitam até 30Kg)</label>

										<input style="border-color: black"  type="text" value="<?= ($query != null ? $query->pesoMaximoPedido : set_value('')); ?>"  name="pesoMaximoPedido" class="form-control input-peso" placeholder="Peso Maximo por Pedido">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="form-group">
								<div class="">
									<button style="width: 200px" type="submit" class="btn btn-success">Salvar</button>
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
	<script src="<?= base_url("loja/js/colorpicker.js") ?>"></script >

	<!--content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('viewsStore/principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/config.blade.php ENDPATH**/ ?>