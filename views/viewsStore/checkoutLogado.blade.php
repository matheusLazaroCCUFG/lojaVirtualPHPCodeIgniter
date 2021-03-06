
@extends('viewsStore/principal')
@section('conteudo')
	<script>
		$('.input_data').mask('00/00/0000');
		$('.input_cep').mask('00000-000');

		var SPMaskBehavior = function (val) {
					return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
				},
				spOptions = {
					onKeyPress: function(val, e, field, options) {
						field.mask(SPMaskBehavior.apply({}, arguments), options);
					}
				};
		$('.input_tel').mask(SPMaskBehavior, spOptions);

		$('.input_cpf').mask('000.000.000-00');
		$('.input_moeda').mask('000.000.000.000.000,00', {reverse: true});
		$('.input_mes_ano').mask('00/0000');

	</script>
	<link type="text/css" rel="stylesheet" href="<?=base_url("loja/checkout/css/slick.css")?>"/>
	<link type="text/css" rel="stylesheet" href="<?=base_url("loja/checkout/css/slick-theme.css")?>"/>

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?=base_url("loja/checkout/css/nouislider.min.css")?>"/>

	<!-- Font Awesome Icon -->
	<!--<link rel="stylesheet" href="css/font-awesome.min.css">-->

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?=base_url("loja/checkout/css/styleCheckout.css")?>"/>
	<link type="text/css" rel="stylesheet" href="<?= base_url("loja/css/loading.css") ?>"/>

	<script>var totalCarrinho = <?=$total?>;</script>

	<script src="<?=base_url("loja/js/jquery.modal.min.js")?>"></script>
	<link rel="stylesheet" href="<?= base_url("loja/css/jquery.modal.css") ?>" />
	<link rel="stylesheet" href="<?= base_url("loja/css/loadingPagamento.css") ?>" />


	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Checkout</h3>
					<ul class="breadcrumb-tree">
						<li><a href="<?= base_url("") ?>">Home</a></li>
						<li class="active">Checkout</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section checkout-loja">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-7">
					<!-- Billing Details -->
					<div class="billing-details">
						<h3 class="text-center" style="color: darkgreen">Voc?? est?? logado!</h3>
						<br>
						<hr>

						<div class="section-title">
							<h3 class="title">Endere??o de entrega</h3>
						</div>
						<form method="post" accept-charset="utf-8" class="form_checkout_pagar">
							<input type="hidden" name="hash" value="" placeholder="Hash de pagamento" id="hash">
							<input type="hidden" value="1" name="formaEnvio">

							<label for="username">Nome completo</label>
							<div class="form-group">
								<input value="<?= ($usuario->username ? $usuario->username : "") ?>" class="input" type="text" name="username" placeholder="Nome Completo" >
							</div>

							<label for="cpf">CPF</label>
							<div class="form-group">
								<input value="<?= ($usuario->cpf ? $usuario->cpf : "") ?>" class="input input_cpf" type="text" name="cpf" placeholder="CPF" >
							</div>
							<label for="email">Seu EMAIL (campo inalter??vel)</label>
							<div class="form-group">
								<input value="<?= ($usuario->email ? $usuario->email : "") ?>" class="input" type="email" name="email" placeholder="Email" readonly>
							</div>
							<input class="input" type="hidden" name="checkoutLogado" placeholder="checkoutLogado" value="1">
							<div class="form-group">
								<input value="<?= ($usuario->password ? $usuario->password : "") ?>" class="input" type="hidden" name="password" placeholder="Digite sua senha">
							</div>




							<label for="cep">CEP<label class="tipo_envio" style="color: #407ea8"> (Calcule e selecione o frete)</label></label>
							<div class="input-group">
								<input class="form-control input_cep btn-calculo-frete-checkout" type="text" name="cep" placeholder="CEP">
								<span class="input-group-btn tipo_envio">
								<!--<button class="btn btn-primary btn-calculo-frete-checkout" type="button">Calcular frete</button>-->
							</span>
							</div>
							<br>
								<input type="hidden" name="temCorreios" value="1">
							<div class="tipo_envio">
								<div class="calculo-frete-retorno-checkout hide"></div>
							</div>


							<div class="box-campo-endereco hide">
								<label for="bairro">Bairro</label>
								<div class="form-group">
									<input value="<?= ($usuario->bairro ? $usuario->bairro : "") ?>" class="input" type="text" name="bairro" placeholder="Bairro" >
								</div>

								<label for="endereco">Endere??o</label>
								<div class="form-group">
									<input value="<?= ($usuario->endereco ? $usuario->endereco : "") ?>" class="input" type="text" name="endereco" placeholder="Endere??o"  >
								</div>

								<label for="complemento">Complemento</label>
								<div class="form-group">
									<input value="<?= ($usuario->complemento ? $usuario->complemento : "") ?>" class="input" type="text" name="complemento" placeholder="Complemento">
								</div>

								<label for="numero">N??mero</label>
								<div class="form-group">
									<input value="<?= ($usuario->numero ? $usuario->numero : "") ?>" class="input input-numerico" type="text" name="numero" placeholder="N??mero" >
								</div>

								<label for="cidade">Cidade</label>
								<div class="form-group">
									<input value="<?= ($usuario->cidade ? $usuario->cidade : "") ?>" class="input" type="text" name="cidade" placeholder="Cidade" >
								</div>

								<div class="form-group">
									<?php if($usuario->estado): ?>

									<label for="estado">Estado</label>
									<select class="input" name="estado" id="estado">
										<option value="<?=$usuario->estado?>">
											<?php if(strcmp($usuario->estado, "AC") == 0){ echo " Acre";} ?>
											<?php if(strcmp($usuario->estado, "AL") == 0){ echo " Alagoas";} ?>
											<?php if(strcmp($usuario->estado, "AP") == 0){ echo " Amap??";} ?>
											<?php if(strcmp($usuario->estado, "AM") == 0){ echo " Amazonas";} ?>
											<?php if(strcmp($usuario->estado, "BA") == 0){ echo " Bahia";} ?>
											<?php if(strcmp($usuario->estado, "CE") == 0){ echo " Cear??";} ?>
											<?php if(strcmp($usuario->estado, "DF") == 0){ echo " Distrito Federal";} ?>
											<?php if(strcmp($usuario->estado, "ES") == 0){ echo " Esp??rito Santo";} ?>
											<?php if(strcmp($usuario->estado, "GO") == 0){ echo " Goi??s";} ?>
											<?php if(strcmp($usuario->estado, "MA") == 0){ echo " Maranh??o";} ?>
											<?php if(strcmp($usuario->estado, "MT") == 0){ echo " Mato Grosso";} ?>
											<?php if(strcmp($usuario->estado, "MS") == 0){ echo " Mato Grosso do Sul";} ?>
											<?php if(strcmp($usuario->estado, "MG") == 0){ echo " Minas Gerais";} ?>
											<?php if(strcmp($usuario->estado, "PA") == 0){ echo " Par??";} ?>
											<?php if(strcmp($usuario->estado, "PB") == 0){ echo " Para??ba";} ?>
											<?php if(strcmp($usuario->estado, "PR") == 0){ echo " Paran??";} ?>
											<?php if(strcmp($usuario->estado, "PE") == 0){ echo " Pernambuco";} ?>
											<?php if(strcmp($usuario->estado, "PI") == 0){ echo " Piau??";} ?>
											<?php if(strcmp($usuario->estado, "RJ") == 0){ echo " Rio de Janeiro";} ?>
											<?php if(strcmp($usuario->estado, "RN") == 0){ echo " Rio Grande do Norte";} ?>
											<?php if(strcmp($usuario->estado, "RS") == 0){ echo " Rio Grande do Sul";} ?>
											<?php if(strcmp($usuario->estado, "RO") == 0){ echo " Rond??nia";} ?>
											<?php if(strcmp($usuario->estado, "RR") == 0){ echo " Roraima";} ?>
											<?php if(strcmp($usuario->estado, "SC") == 0){ echo " Santa Catarina";} ?>
											<?php if(strcmp($usuario->estado, "SP") == 0){ echo " S??o Paulo";} ?>
											<?php if(strcmp($usuario->estado, "SE") == 0){ echo " Sergipe";} ?>
											<?php if(strcmp($usuario->estado, "TO") == 0){ echo " Tocantins";} ?>
										</option>
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AP">Amap??</option>
										<option value="AM">Amazonas</option>
										<option value="BA">Bahia</option>
										<option value="CE">Cear??</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Esp??rito Santo</option>
										<option value="GO">Goi??s</option>
										<option value="MA">Maranh??o</option>
										<option value="MT">Mato Grosso</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Par??</option>
										<option value="PB">Para??ba</option>
										<option value="PR">Paran??</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piau??</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RO">Rond??nia</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SP">S??o Paulo</option>
										<option value="SE">Sergipe</option>
										<option value="TO">Tocantins</option>
									</select>
									<div class="clearfix"></div>
									<?php else: ?>
									<label for="estado">Estado</label>
									<select  class="input" name="estado" id="estado">
										<option value="AC">Acre</option>
										<option value="AL">Alagoas</option>
										<option value="AP">Amap??</option>
										<option value="AM">Amazonas</option>
										<option value="BA">Bahia</option>
										<option value="CE">Cear??</option>
										<option value="DF">Distrito Federal</option>
										<option value="ES">Esp??rito Santo</option>
										<option value="GO">Goi??s</option>
										<option value="MA">Maranh??o</option>
										<option value="MT">Mato Grosso</option>
										<option value="MS">Mato Grosso do Sul</option>
										<option value="MG">Minas Gerais</option>
										<option value="PA">Par??</option>
										<option value="PB">Para??ba</option>
										<option value="PR">Paran??</option>
										<option value="PE">Pernambuco</option>
										<option value="PI">Piau??</option>
										<option value="RJ">Rio de Janeiro</option>
										<option value="RN">Rio Grande do Norte</option>
										<option value="RS">Rio Grande do Sul</option>
										<option value="RO">Rond??nia</option>
										<option value="RR">Roraima</option>
										<option value="SC">Santa Catarina</option>
										<option value="SP">S??o Paulo</option>
										<option value="SE">Sergipe</option>
										<option value="TO">Tocantins</option>
									</select>
									<div class="clearfix"></div>
								<?php endif; ?>
									<!--<input class="input" type="text" name="estado" placeholder="Estado">-->
								</div>
								<!-- /input-group --><!-- /input-group -->
								<label for="telefone">Telefone</label>
								<div class="form -group">
									<input value="<?= ($usuario->telefone ? $usuario->telefone : "") ?>" class="input input_tel" type="tel" name="telefone" placeholder="Telefone" required>
								</div>
								<br>

							</div>
						</form>
					</div>
					<!-- /Billing Details -->
					<!--
					 Shiping Details
					<div class="shiping-details">
						<div class="section-title">
							<h3 class="title">Endere??o diferente</h3>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="shiping-address">
							<label for="shiping-address">
								<span></span>
								Enviar em um endere??o diferente?
							</label>
							<div class="caption">
								<div class="form-group">
									<input class="input" type="text" name="first-name" placeholder="First Name">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="last-name" placeholder="Last Name">
								</div>
								<div class="form-group">
									<input class="input" type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="address" placeholder="Address">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="city" placeholder="City">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="country" placeholder="Country">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
								</div>
								<div class="form-group">
									<input class="input" type="tel" name="tel" placeholder="Telephone">
								</div>
							</div>
						</div>
					</div>
					 /Shiping Details
					-->
					<!-- Order notes -->

					<!-- /Order notes -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Seu pedido</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>Produtos</strong></div>
							<div><strong>SUBTOTAL</strong></div>
						</div>

						<div class="order-products">
							<?php $i = 1; foreach ($carrinho as $produto): ?>
							<div class="order-col">
								<div><?=$produto['qtd']?>x <?=$produto['nome']?>	<?= ($produto['tamanho'] && $produto['tamanho'] != '0' ? '<strong> - Tamanho: ' . $produto['tamanho'] . '</strong>' : '') ?> <?= ($produto['tipo'] && $produto['tipo'] != '0' ? '<strong> - Tipo: ' . $produto['tipo'] . '</strong>' : '') ?></div>
								<div><?=formataMoedaReal($produto['subtotal'], true)?></div>
							</div>
							<?php endforeach;  ?>

						</div>
						<hr>
						<div class="order-col">
							<div>FRETE</div>
							<div class="valor-frete-checkout"><strong>  </strong></div>
						</div>
						<hr>


						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<div><strong class="order-total total-checkout"></strong></div>
						</div>
					</div>
					<hr>
					<strong style="text-decoration: underline; text-align: center; font-size: 20px">FORMA DE PAGAMENTO</strong>

					<div class="payment-method"><!-------->
						<?php if($cartao): ?>
						<div class="input-radio">
							<input value="1" type="radio" name="payment" id="payment-1" class="select-forma-pagamento">
							<label for="payment-1">
								<span></span>
								Cart??o de cr??dito <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?><i class="fa fa-credit-card"> </i>
							</label>

						</div>
						<div class="clearfix"></div>
						<br><br>
						<?php endif; ?>

						<?php if($boleto): ?>
						<div class="input-radio">
							<input value="2" type="radio" name="payment" id="payment-2" class="select-forma-pagamento">
							<label for="payment-2">
								<span></span>
								Boleto banc??rio <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?><i class="fa fa-file"> </i>
							</label>

						</div>
						<div class="clearfix"></div>
						<br><br>
						<?php endif; ?>

						<?php if($transferencia): ?>
						<div class="input-radio">
							<input value="3" type="radio" name="payment" id="payment-3" class="select-forma-pagamento">
							<label for="payment-3">
								<span></span>
								Transfer??ncia banc??ria <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?><i class="fa fa-bank"> </i>
							</label>

						</div>
						<?php endif; ?>

					</div>


					<div class="pagamento-cartao hide">

						<form class="form_checkout_pagar" name="formCartao">
							<input type="hidden" name="semJuros" value="<?=$semJuros?>" placeholder="Parcelas sem juros" id="semJuros">
							<hr>
							<strong style="text-decoration: underline; text-align: center">Aceitasmos os cart??es: </strong>
							<div class="text-center">
								<?php for($i = 1; $i <= 17; $i++): ?>
								<img src="<?=base_url("loja/images/cartao").$i.".png"?>">
								<?php endfor; ?>
							</div>
							<hr><hr>
							<br><br>

							<div class="bandeira-cartao text-center" ></div>
							<div class="verifica-bandeira text-center" ></div>

							<div class="form-group">
								<label for="cc-numero">N??mero do cart??o</label>
								<input name="numCartao" type="tel" class="form-control resgataBandeira input-numerico" id="cc_numero" placeholder="N??mero do cart??o" required>
							</div>
							<!--<input type="hidden" name="bandeiraCartao" class="bandeiraCartao">-->
							<div class="form-group">
								<label for="cc-titular">Nome do titular</label>
								<input name="titular" type="text" class="form-control" id="cc_titular" placeholder="Nome do titular" required>
							</div>
							<div class="form-group">
								<label for="cc-CPFtitular">CPF do titular</label>
								<input name="CPFtitular" type="tel" class="form-control input_cpf" id="cc_CPFtitular" placeholder="CPF do titular" required>
							</div>
							<div class="form-group">
								<label for="cc-CPFtitular">Data de nascimento do titular</label>
								<input name="nascTitular" type="tel" class="form-control input_data" id="cc_nascTitular" placeholder="Data de nascimento do titular" required>
							</div>
							<div class="form-group">
								<label for="cc-validade">Validade do cart??o</label>
								<input name="mes_ano" type="tel" class="form-control input_mes_ano" id="cc_validade" placeholder="Validade do cart??o" required>
							</div>
							<div class="form-group">
								<label for="cc-codigo">C??digo de seguran??a</label>
								<input name="codSeguranca" type="tel" class="form-control resgataToken" id="cc_codigo" placeholder="C??digo de seguran??a" required>
							</div>

							<br>

							<div class="alert alert-info">Caso as parcelas n??o apare??am, redigite o CEP, op????o de frete e n??mero do cart??o, respectivamente!</div>

							<div class="form-group select-estilo">
								<label for="qtdParcelas" style="font-size: 15px; text-align: left; width: 100%">Parcelas (Selecione o Frete e digite as informa????es do Cart??o)</label>
								<select name="qtdParcelas" class="qtdParcelas hide" placeholder="Quantidade de parcelas">
									<option class="input" value=""> Selecionar...</option>
								</select>
							</div>
							<br><br>

							<input type="hidden" name="valorParcela" class="valorParcela" required placeholder="Valor da parcela">

							<!--<div class="dadosCartao"></div>-->
							<div id="ex1" class="modal">
								<p style="color: darkblue">
								<h3>Termos e Condi????es da Loja</h3>
								<strong>Pol??tica de Privacidade</strong><br>
								A loja se preocupa e se compromete com os seus clientes, por isso tem uma pol??tica severa com as informa????es que s??o coletadas e usadas para que ao navegar, o cliente n??o tenha preocupa????es e consiga finalizar sua compra com seguran??a.<br>

								Quando voc?? visita o site, voc?? aceita e est?? ciente das informa????es contidas na pol??tica de privacidade.<br>

								<strong>Pagamentos</strong><br>
								Todas as compras feitas com cart??es de cr??ditos ,boleto banc??rio ou d??bito online, s??o com seguran??a SSL (Security Socket Layer). Aquele cadeado que aparece no seu navegador indicando que a loja ?? segura. Os dados pessoais que est??o no cart??o, endere??o de entrega e detalhes do pedido, n??o s??o divulgados em nenhum outro local e com a tecnologia de SSL presente, impede que essas informa????es sejam acessadas por outras pessoas ou transmitidas para outro lugar. Ressaltamos tamb??m que os dados de cart??o n??o s??o armazenados na plataforma, e os mesmos s??o eliminados assim que a operadora de pagamentos aprova o pedido.<br>

								Caso a Loja receba alguma notifica????o/determina????o legal ou judicial, teremos que cumprir com a determina????o, compartilhando apenas os dados solicitados pela justi??a.<br>



								<strong>Certificados</strong><br>
								Os selos no rodap?? do site, indicam que a loja possui a tecnologia SSL instalada em seus servidores, e garante que as informa????es s??o transacionadas com seguran??a.<br>




								<strong>Informa????es Gerais</strong><br>
								A Loja eventualmente pode fazer o uso de *cookies para melhorar a experi??ncia do usu??rio ao navegar. Recomendamos que voc?? deixe o uso de cookies ligado no seu navegador, pois dessa forma ?? poss??vel utilizar todas as personaliza????es e recursos disponibilizados pela loja. Mas se voc?? n??o quiser, ?? poss??vel desabilitar no seu navegador. (Aten????o: Cada fabricante de software possui um modo diferente de fazer essa altera????o).<br>



								<strong>Informa????o Importante</strong><br>
								N??s nunca iremos solicitar quaisquer informa????es que sejam fora do ambiente da loja. Estamos cientes que h?? muitas fraudes na internet, e se voc?? n??o ficou confort??vel com um e-mail que recebeu e acha que n??o ?? nosso, nos informe.<br>

								N??s tamb??m n??o nos responsabilizamos por programas maliciosos instalados no seu computador, e que possam a vir modificar e alterar o comportamento da sua navega????o.<br>


								<strong>Entregas com pagamento por Cart??o de Cr??dito</strong><br>

								Se voc?? efetuou o pagamento do seu pedido por cart??o de cr??dito, come??amos a preparar o envio a partir do momento em que tivermos a libera????o e confirma????o de pagamento pela administradora.<br>



								<strong>Entregas com pagamento por Boleto Banc??rio</strong><br>

								 A aprova????o de pagamento via boleto leva at?? 2 dias ??teis. Ap??s o vencimento do boleto, o pedido ?? cancelado automaticamente.<br>

								<br>



								

								<br>



								<strong>Sobre o Frete</strong><br>

								O valor ?? calculado conforme o CEP do destinat??rio + peso + volume (tamanho da embalagem) do produto e as formas de entregas citadas acima. O frete ?? informado quando voc?? selecionar um produto e adicionar ao carrinho, digitando o CEP desejado. O frete ?? cobrado e inclu??do na finaliza????o do pedido, portanto voc?? n??o ir?? pagar por nada no recebimento do pedido.<br>

								<strong>Entenda nossos Prazos de Entrega</strong><br>

								O prazo de entrega come??a a contar a partir do momento em que o pagamento ?? confirmado, e n??o quando o pedido ?? realizado.<br>

								 <br>

								<br>

								Ap??s a libera????o do seu pedido, ele ?? coletado pelos Correios, e ent??o come??a a contar o prazo de entrega dos Correios.<br>

								Ap??s a realiza????o do Pedido e envio aos Correios, ser?? registrado o c??digo de rastreio na p??gina Pedidos Realizados.<br>
								<br>
								<?=$dados_loja->extraTermosCondicoes?>
								</p>
								<a href="#" rel="modal:close">Fechar</a>
							</div>

							<!-- Link to open the modal -->







								<div class="">
									<input style="height: 25px; width: 25px" class="form-check-input" type="checkbox" name="termosCartao" placeholder="Termos e Condi????es">

									<label for="terms">
										<span></span>
										Li e aceitos os <p><a href="#ex1" rel="modal:open">TERMOS E CONDI????ES</a></p>
									</label>
								</div>
							<input title="text" type="hidden" class="form-control" name="token_pagamento_cartao" id="token_pagamento_cartao" placeholder="Token de pagamento" value="">

						</form>
						<button class="primary-btn order-submit btn-pagar-cartao ">PAGAR COM CART??O DE CR??DITO</button>

						<!--<input type="text" name="tokenCartao" class="tokenCartao">Token do Cart??o-->
						<!--<input type="text" name="hashComprador" class="hashComprador">Identificador com dados do comprador(hash)-->

						<div class="clearfix"></div>
					</div>

					<br><br>

					<div class="pagamento-boleto hide">
						<img src="<?= base_url("loja/images/boleto.png") ?>" style="height: 50px;" class="center-block">

						<div class="alert alert-info"><strong style="color:black;">Boleto banc??rio emitido ao final da compra.</strong></div>
						<div class="">

						</div>

						<div id="ex1" class="modal">
							<p style="color: darkblue">
							<h3>Termos e Condi????es da Loja</h3>
							<strong>Pol??tica de Privacidade</strong><br>
							A loja se preocupa e se compromete com os seus clientes, por isso tem uma pol??tica severa com as informa????es que s??o coletadas e usadas para que ao navegar, o cliente n??o tenha preocupa????es e consiga finalizar sua compra com seguran??a.<br>

							Quando voc?? visita o site, voc?? aceita e est?? ciente das informa????es contidas na pol??tica de privacidade.<br>

							<strong>Pagamentos</strong><br>
							Todas as compras feitas com cart??es de cr??ditos ,boleto banc??rio ou d??bito online, s??o com seguran??a SSL (Security Socket Layer). Aquele cadeado que aparece no seu navegador indicando que a loja ?? segura. Os dados pessoais que est??o no cart??o, endere??o de entrega e detalhes do pedido, n??o s??o divulgados em nenhum outro local e com a tecnologia de SSL presente, impede que essas informa????es sejam acessadas por outras pessoas ou transmitidas para outro lugar. Ressaltamos tamb??m que os dados de cart??o n??o s??o armazenados na plataforma, e os mesmos s??o eliminados assim que a operadora de pagamentos aprova o pedido.<br>

							Caso a Loja receba alguma notifica????o/determina????o legal ou judicial, teremos que cumprir com a determina????o, compartilhando apenas os dados solicitados pela justi??a.<br>



							<strong>Certificados</strong><br>
							Os selos no rodap?? do site, indicam que a loja possui a tecnologia SSL instalada em seus servidores, e garante que as informa????es s??o transacionadas com seguran??a.<br>




							<strong>Informa????es Gerais</strong><br>
							A Loja eventualmente pode fazer o uso de *cookies para melhorar a experi??ncia do usu??rio ao navegar. Recomendamos que voc?? deixe o uso de cookies ligado no seu navegador, pois dessa forma ?? poss??vel utilizar todas as personaliza????es e recursos disponibilizados pela loja. Mas se voc?? n??o quiser, ?? poss??vel desabilitar no seu navegador. (Aten????o: Cada fabricante de software possui um modo diferente de fazer essa altera????o).<br>



							<strong>Informa????o Importante</strong><br>
							N??s nunca iremos solicitar quaisquer informa????es que sejam fora do ambiente da loja. Estamos cientes que h?? muitas fraudes na internet, e se voc?? n??o ficou confort??vel com um e-mail que recebeu e acha que n??o ?? nosso, nos informe.<br>

							N??s tamb??m n??o nos responsabilizamos por programas maliciosos instalados no seu computador, e que possam a vir modificar e alterar o comportamento da sua navega????o.<br>


							<strong>Entregas com pagamento por Cart??o de Cr??dito</strong><br>

							Se voc?? efetuou o pagamento do seu pedido por cart??o de cr??dito, come??amos a preparar o envio a partir do momento em que tivermos a libera????o e confirma????o de pagamento pela administradora.<br>



							<strong>Entregas com pagamento por Boleto Banc??rio</strong><br>

							 A aprova????o de pagamento via boleto leva at?? 2 dias ??teis. Ap??s o vencimento do boleto, o pedido ?? cancelado automaticamente.<br>

							<br>



							

							<br>



							<strong>Sobre o Frete</strong><br>

							O valor ?? calculado conforme o CEP do destinat??rio + peso + volume (tamanho da embalagem) do produto e as formas de entregas citadas acima. O frete ?? informado quando voc?? selecionar um produto e adicionar ao carrinho, digitando o CEP desejado. O frete ?? cobrado e inclu??do na finaliza????o do pedido, portanto voc?? n??o ir?? pagar por nada no recebimento do pedido.<br>

							<strong>Entenda nossos Prazos de Entrega</strong><br>

							O prazo de entrega come??a a contar a partir do momento em que o pagamento ?? confirmado, e n??o quando o pedido ?? realizado.<br>

							 <br>

							<br>

							Ap??s a libera????o do seu pedido, ele ?? coletado pelos Correios, e ent??o come??a a contar o prazo de entrega dos Correios.<br>

							Ap??s a realiza????o do Pedido e envio aos Correios, ser?? registrado o c??digo de rastreio na p??gina Pedidos Realizados.<br>
							<br>
							<?=$dados_loja->extraTermosCondicoes?>
							</p>
							<a href="#" rel="modal:close">Fechar</a>
						</div>

						<!-- Link to open the modal -->






						<form class="form_checkout_pagar" >

							<div class="">
								<input style="height: 25px; width: 25px" class="form-check-input" type="checkbox" name="termosBoleto" placeholder="Termos e Condi????es">

								<label for="terms">
									<span></span>
									Li e aceitos os <p><a href="#ex1" rel="modal:open">TERMOS E CONDI????ES</a></p>
								</label>
							</div>
						</form>
						<button class="primary-btn order-submit btn-pagar-boleto">PAGAR COM BOLETO</button>
						<!--SE A TRANDA????O OCORREU COM SUCESSO, encaminhar para pedidosRealizados-->
						<div class="compra-finalizada-boleto hide">
							<a class="primary-btn order-submit" href="<?= base_url("pedidosRealizados") ?>">Imprimir Boleto</a>
						</div>
						<div class="clearfix"></div>
						<br><br>
						<div class="erro_validacao"></div>
					</div>


					<div class="pagamento-transferencia hide">
						<hr>
						<!--<div class="meio-pag-debito">Bancos dispon??veis: <br></div>-->
						<label>Bancos dispon??veis para D??bito online:</label><br>

						<?php for($i = 1; $i <= 4; $i++): ?>
						<img src="<?=base_url("loja/images/debito").$i.".png"?>">
						<?php endfor; ?>
						<hr>

						<div class="form-group select-estilo">
							<label for="nome_banco">Selecione um banco</label>
							<form method="post" accept-charset="utf-8" class="form_checkout_pagar">
								<select name="nome_banco" class="form-control" placeholder='"Banco para transfer??ncia"' required disabled>
									<option style="font-size: 25px" value="">Selecionar...</option>
									<option style="font-size: 35px" value="bradesco">Banco Bradesco</option>
									<option style="font-size: 35px" value="itau">Banco Ita??</option>
									<option style="font-size: 35px" value="bancodobrasil">Banco do Brasil</option>
									<option style="font-size: 35px" value="banrisul">Banco Banrisul</option>
								</select>
							</form>
						</div>

						<div class="alert alert-info"><strong style="color:black;">Acesso ao ambiente seguro do seu banco ao final da compra.</strong></div>

						<div id="ex1" class="modal">
							<p style="color: darkblue">
							<h3>Termos e Condi????es da Loja</h3>
							<strong>Pol??tica de Privacidade</strong><br>
							A loja se preocupa e se compromete com os seus clientes, por isso tem uma pol??tica severa com as informa????es que s??o coletadas e usadas para que ao navegar, o cliente n??o tenha preocupa????es e consiga finalizar sua compra com seguran??a.<br>

							Quando voc?? visita o site, voc?? aceita e est?? ciente das informa????es contidas na pol??tica de privacidade.<br>

							<strong>Pagamentos</strong><br>
							Todas as compras feitas com cart??es de cr??ditos ,boleto banc??rio ou d??bito online, s??o com seguran??a SSL (Security Socket Layer). Aquele cadeado que aparece no seu navegador indicando que a loja ?? segura. Os dados pessoais que est??o no cart??o, endere??o de entrega e detalhes do pedido, n??o s??o divulgados em nenhum outro local e com a tecnologia de SSL presente, impede que essas informa????es sejam acessadas por outras pessoas ou transmitidas para outro lugar. Ressaltamos tamb??m que os dados de cart??o n??o s??o armazenados na plataforma, e os mesmos s??o eliminados assim que a operadora de pagamentos aprova o pedido.<br>

							Caso a Loja receba alguma notifica????o/determina????o legal ou judicial, teremos que cumprir com a determina????o, compartilhando apenas os dados solicitados pela justi??a.<br>



							<strong>Certificados</strong><br>
							Os selos no rodap?? do site, indicam que a loja possui a tecnologia SSL instalada em seus servidores, e garante que as informa????es s??o transacionadas com seguran??a.<br>




							<strong>Informa????es Gerais</strong><br>
							A Loja eventualmente pode fazer o uso de *cookies para melhorar a experi??ncia do usu??rio ao navegar. Recomendamos que voc?? deixe o uso de cookies ligado no seu navegador, pois dessa forma ?? poss??vel utilizar todas as personaliza????es e recursos disponibilizados pela loja. Mas se voc?? n??o quiser, ?? poss??vel desabilitar no seu navegador. (Aten????o: Cada fabricante de software possui um modo diferente de fazer essa altera????o).<br>



							<strong>Informa????o Importante</strong><br>
							N??s nunca iremos solicitar quaisquer informa????es que sejam fora do ambiente da loja. Estamos cientes que h?? muitas fraudes na internet, e se voc?? n??o ficou confort??vel com um e-mail que recebeu e acha que n??o ?? nosso, nos informe.<br>

							N??s tamb??m n??o nos responsabilizamos por programas maliciosos instalados no seu computador, e que possam a vir modificar e alterar o comportamento da sua navega????o.<br>


							<strong>Entregas com pagamento por Cart??o de Cr??dito</strong><br>

							Se voc?? efetuou o pagamento do seu pedido por cart??o de cr??dito, come??amos a preparar o envio a partir do momento em que tivermos a libera????o e confirma????o de pagamento pela administradora.<br>



							<strong>Entregas com pagamento por Boleto Banc??rio</strong><br>

							 A aprova????o de pagamento via boleto leva at?? 2 dias ??teis. Ap??s o vencimento do boleto, o pedido ?? cancelado automaticamente.<br>

							<br>



							

							<br>



							<strong>Sobre o Frete</strong><br>

							O valor ?? calculado conforme o CEP do destinat??rio + peso + volume (tamanho da embalagem) do produto e as formas de entregas citadas acima. O frete ?? informado quando voc?? selecionar um produto e adicionar ao carrinho, digitando o CEP desejado. O frete ?? cobrado e inclu??do na finaliza????o do pedido, portanto voc?? n??o ir?? pagar por nada no recebimento do pedido.<br>

							<strong>Entenda nossos Prazos de Entrega</strong><br>

							O prazo de entrega come??a a contar a partir do momento em que o pagamento ?? confirmado, e n??o quando o pedido ?? realizado.<br>

							 <br>

							<br>

							Ap??s a libera????o do seu pedido, ele ?? coletado pelos Correios, e ent??o come??a a contar o prazo de entrega dos Correios.<br>

							Ap??s a realiza????o do Pedido e envio aos Correios, ser?? registrado o c??digo de rastreio na p??gina Pedidos Realizados.<br>
							<br>
							<?=$dados_loja->extraTermosCondicoes?>
							</p>
							<a href="#" rel="modal:close">Fechar</a>
						</div>

						<!-- Link to open the modal -->






						<form class="form_checkout_pagar" >

							<div class="">
								<input style="height: 25px; width: 25px" class="form-check-input" type="checkbox" name="termosDebito" placeholder="Termos e Condi????es">

								<label for="terms">
									<span></span>
									Li e aceitos os <p><a href="#ex1" rel="modal:open">TERMOS E CONDI????ES</a></p>
								</label>
							</div>
						</form>
						<button class="primary-btn order-submit btn-pagar-transferencia">PAGAR COM TRANSFER??NCIA BANC??RIA</button>
					</div>

					<div class="msg_envio_pagamento"></div>

				</div>


				<!-- /Order Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

@stop
