
@extends('viewsStore/principal')
@section('conteudo')
<!--content-->
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>


<div class="content">
	<!--typography-page -->
	<div class="typo-w3">
		<div class="container">
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

			?>


			<form role="form" method="post" class="form-group" action="<?= base_url("moduloProdutos/core"); ?>" >
				<div class="alert alert-info">Caracteres especiais podem causar erros. Sempre verifique se um produto está sendo adicionado corretamente ao Carrinho de Compras!</div>
				<input class="ultimaParcelaSemJurosVezes" type="hidden" name="ultimaParcelaVezes" value="<?=($dados != null ? $dados->ultimaParcelaVezes: "")?>">
				<input class="ultimaParcelaSemJurosValor" type="hidden" name="ultimaParcelaValor" value="<?=($dados != null ? $dados->ultimaParcelaValor: "")?>">
				<input type="hidden" name="semJuros" value="<?=$semJuros->parcelas_sJuros?>">

				<div class="form-group">
					<label for="nome_produto">Nome do Produto</label>
					<input style="border-color: black" class="form-control"  type="text"  name="nome_produto" value="<?= ($dados != null ? $dados->nome_produto : set_value('')); ?>" >
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="cod_produto">Código do produto</label>
					<input style="border-color: black" class="form-control" type="text"  name="cod_produto" value="<?= ($dados != null ? $dados->cod_produto : set_value('')); ?>"   >
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="valor">Valor</label>
					<input style="border-color: black" class="form-control input-moeda ultimaParcela" type="text"  name="valor" value="<?= ($dados != null ? $dados->valor : set_value('')); ?>" >
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="peso">Peso (Valor inteiro com limite mínimo de 1kg e máximo 30kg.)</label>
					<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="peso" value="<?= ($dados != null ? $dados->peso : set_value('')); ?>">
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="altura">Altura([2,105] cm)</label>
					<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="altura" value="<?= ($dados != null ? $dados->altura : set_value('')); ?>">
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="largura">Largura([11, 105] cm)</label>
					<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="largura" value="<?= ($dados != null ? $dados->largura : set_value('')); ?>" >
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="comprimento">Comprimento([16, 105] cm)</label>
					<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="comprimento" value="<?= ($dados != null ? $dados->comprimento : set_value('')); ?>">
					<div class="clearfix"></div>
				</div>

				<div class="alert alert-info">Sempre verifique se o cálculo do frete está correto, na página do produto cadastrado!<br> Erros podem ocorrer se as dimesões não forem aceitas pelos Correios.</div>


				<div class="form-group">
					<label for="info">Informações</label>

					<textarea style="border-color: black" name="info" class="form-control" value="<?= ($dados != null ? $dados->info : set_value('')); ?>" ><?= ($dados != null ? $dados->info : set_value('')); ?></textarea>

					<div class="clearfix"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label controlar_estoque">Controlar estoque?</label>
					<div class="clearfix">
						<select style="border-color: black" name="controlar_estoque" class="form-control">
							<?php if($dados): ?>
								<option value="0" <?= ($dados->controlar_estoque == 0 ? 'selected=""' : '') ?>>Não</option>
								<option value="1" <?= ($dados->controlar_estoque == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php else: ?>
								<option value="0">Não</option>
								<option value="1" selected="">Sim</option>
							<?php endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">O produto possui tamanhos? (P, M, G e GG)</label>
					<div class="clearfix">
						<select style="border-color: black" name="possui_tamanho" class="form-control js_possui_tamanho">
							<?php if($dados && isset($dados->possui_tamanho)): ?>
							<option value="0" <?= ($dados->possui_tamanho == 0 ? 'selected=""' : '') ?>>Não</option>
							<option value="1" <?= ($dados->possui_tamanho == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php else: ?>
							<option value="0" selected="">Não</option>
							<option value="1" >Sim</option>
							<?php endif; ?>
						</select>
					</div>
				</div>


				<div class="js_tamanhos <?= ($dados && $dados->possui_tamanho == 1) ? '' : 'hide' ?>">
					<div class="form-group">
						<label for="estoque_p">Quantidade no estoque do Tamanho P</label>
						<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="estoque_p" value="<?= ($dados != null ? $dados->estoque_p : set_value('')); ?>" >
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="estoque_m">Quantidade no estoque do Tamanho M</label>
						<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="estoque_m" value="<?= ($dados != null ? $dados->estoque_m : set_value('')); ?>" >
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="estoque_g">Quantidade no estoque do Tamanho G</label>
						<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="estoque_g" value="<?= ($dados != null ? $dados->estoque_g : set_value('')); ?>" >
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="estoque_gg">Quantidade no estoque do Tamanho GG</label>
						<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="estoque_gg" value="<?= ($dados != null ? $dados->estoque_gg : set_value('')); ?>" >
						<div class="clearfix"></div>
					</div>
				</div>
				<br><br>

				<div class="form-group">
					<label class="col-md-4 control-label">O produto possui tipos? (Escreva a quantidade de tipos e o nome da cada tipo)</label>
					<div class="clearfix">
						<select style="border-color: black" name="possui_tipos" class="form-control js_possui_tipos">
							<?php if($dados && isset($dados->possui_tipos)): ?>
							<option value="0" <?= ($dados->possui_tipos == 0 ? 'selected=""' : '') ?>>Não</option>
							<option value="1" <?= ($dados->possui_tipos == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php else: ?>
							<option value="0" selected="">Não</option>
							<option value="1" >Sim</option>
							<?php endif; ?>
						</select>
					</div>
				</div>
				<div class="qtd_tipos <?= ($dados && $dados->possui_tipos == 1) ? '' : 'hide' ?>">
					<label>Quantidade de tipos do produto (Máximo 11)</label>
					<input style="border-color: black" class="form-control quantidade_tipos input-numerico" type="tel" name="qtd_tipos" value="">
					<div class="nome_tipos"></div>
				</div>

				<div class="js_tipos <?= ($dados && $dados->possui_tipos == 1) ? '' : 'hide' ?>">

				</div>
				<br><br>

				<div class="form-group js-estoqueGeral <?= ($dados && $dados->possui_tamanho == 1) ? 'hide' : '' ?>">
					<label for="estoque">Quantidade no estoque</label>
					<input style="border-color: black" class="form-control input-numerico"  type="tel"  name="estoque" value="<?= ($dados != null ? $dados->estoque : set_value('')); ?>" >
					<div class="clearfix"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Marca</label>
					<div class="clearfix">
						<select style="border-color: black" name="id_marca" class="form-control">
							<option value="<?= null; ?>" selected="">Sem marca</option>

							<?php foreach($marcas as $marca): ?>
								<?php if($dados): ?>
									<?php if($marca->id == $dados->id_marca): ?>
										<option selected="<?=$marca->id;?>" value="<?= $marca->id ?>"><?= $marca->nome_marca ?></option>
									<?php else: ?>
										<option value="<?= $marca->id ?>"><?= $marca->nome_marca ?></option>
									<?php endif; ?>
							<?php else: ?>
									<option value="<?= $marca->id ?>"><?= $marca->nome_marca ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Categoria</label>
					<div class="clearfix">
						<select style="border-color: black" name="id_categoria" class="form-control">
							<option value="<?= null; ?>" selected="">Sem categoria</option>
							<?php foreach($categorias as $categoria): ?>
								<?php if($dados): ?>
									<?php if($categoria->id == $dados->id_categoria): ?>
										<option selected="<?=$categoria->id;?>" value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
									<?php else: ?>
										<option value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
									<?php endif; ?>
								<?php else: ?>
									<option value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-2 control-label">Destaque?</label>
					<div class="clearfix">
						<select style="border-color: black" name="destaque" class="form-control">
							<?php if($dados): ?>
								<option value="0" <?= ($dados->destaque == 0 ? 'selected=""' : '') ?>>Não</option>
								<option value="1" <?= ($dados->destaque == 1 ? 'selected=""' : '') ?>>Sim</option>
							<?php else: ?>
								<option value="0">Não</option>
								<option value="1" selected="">Sim</option>
							<?php endif; ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Produto ativo?</label>
					<div class="clearfix">
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
				<!--
				<div class="key">
					<label for="exampleInputEmail1">Ativo?</label>
					<input style="border-color: black" class="form-control"  class="custom-control-input" type="checkbox"  name="ativo" value="<?= ($dados != null ? $dados->ativo : set_value('ativo')); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ativo';}" >
					<div class="clearfix"></div>
				</div>-->

				<!--upload de fotos-->
				<div class="form-group">
					<label class="col-sm-2 control-label">Fotos do produto (Siga um padrão de dimensão das Fotos)</label>
					<div class="clearfix">
						<div id="file_upload_fotos_produtos">Upload</div>
					</div>
				</div>


					<div class="form-group">
								<div class="col-sm-10 retorno_fotos_produtos">

									<?php foreach ($fotos as $foto): ?>

										<div class="col-sm-3 img_foto_produtos_view">
											<img  height="100px" src="<?= base_url('loja/images/' . $foto->foto)?>">
											<input style="border-color: black" class="form-control" type="hidden" value="<?= $foto->foto ?>" name="foto_produto[]">
											<a class="btn btn-danger btn-apagar-foto-produto"><i class="fa fa-trash-o"></i> Apagar</a>
										</div>
									<?php endforeach; ?>

								</div>




					</div>





				<?php if($dados): ?>

					<input style="border-color: black" class="form-control" type="hidden" name="id" value="<?= $dados->id; ?>">
					<?php if($fotos): ?>
					<input style="border-color: black" class="form-control" type="hidden" name="id_produto" value="<?= $fotos[0]->id_produto; ?>">
					<?php endif; ?>

				<?php endif; ?>

				<input style="border-color: black; background-color: darkgreen; color: white" class="form-control ultimaParcela" type="submit" value="Salvar">

			</form>




			<!----------------------------------------------------------------------------->

		</div>
	</div>
	<!-- //typography-page -->

</div>
<!--content-->
@stop
