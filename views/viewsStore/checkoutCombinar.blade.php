
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
						<div class="section-title">
							<h3 class="title">Já possui conta?</h3>
							<br>

							<a href="<?= base_url("checkout/loginCombinar") ?>">
								<div class="text-center">
									<strong >Clique aqui para logar
										<img style="height: 50px" src="<?= base_url("loja/images/login.png") ?>">
									</strong>
								</div>
							</a>
						</div>

						<div class="section-title">
							<h3 class="title">Endereço de entrega</h3>
						</div>
						<form method="post" accept-charset="utf-8" class="form_checkout_pagar">
							<input type="hidden" name="hash" value="" placeholder="Hash de pagamento" id="hash">
							<label for="username">Nome completo</label>
							<div class="form-group">
								<input  class="input" type="text" name="username" placeholder="Nome Completo" >
							</div>

							<label for="cpf">CPF</label>
							<div class="form-group">
								<input  class="input input_cpf" type="text" name="cpf" placeholder="CPF" >
							</div>
							<label for="email">Seu EMAIL</label>
							<div class="form-group">
								<input  class="input" type="email" name="email" placeholder="Email" >
							</div>

							<label for="password">SENHA</label>
							<div class="form-group">
								<input class="input" type="password" name="password" placeholder="Digite sua senha" >
							</div>

							<p style='color: darkgreen; font-size: 15px'> <?=($dados_loja->condicaoCombinarEntrega ? $dados_loja->condicaoCombinarEntrega : "")?><br><br></p>
							<label for="cep">CEP<label class="tipo_envio" style="color: #407ea8"> (Calcule e selecione o frete)</label></label>
							<div class="input-group">
								<input  class="form-control input_cep btn-calculo-frete-checkout" type="text" name="cep" placeholder="CEP">
								<span class="input-group-btn tipo_envio">
								<!--<button class="btn btn-primary btn-calculo-frete-checkout" type="button">Calcular frete</button>-->
							</span>
							</div>
							<br>



							<div class="box-campo-endereco hide">
								<label for="bairro">Bairro</label>
								<div class="form-group">
									<input  class="input" type="text" name="bairro" placeholder="Bairro" >
								</div>

								<label for="endereco">Endereço</label>
								<div class="form-group">
									<input  class="input" type="text" name="endereco" placeholder="Endereço"  >
								</div>

								<label for="complemento">Complemento</label>
								<div class="form-group">
									<input  class="input" type="text" name="complemento" placeholder="Complemento">
								</div>

								<label for="numero">Número</label>
								<div class="form-group">
									<input  class="input input-numerico" type="text" name="numero" placeholder="Número" >
								</div>

								<label for="cidade">Cidade</label>
								<div class="form-group">
									<input  class="input" type="text" name="cidade" placeholder="Cidade" >
								</div>

								<div class="form-group">
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
								<!--<input class="input" type="text" name="estado" placeholder="Estado">-->
								</div>
								<!-- /input-group --><!-- /input-group -->
								<label for="telefone">Telefone</label>
								<div class="form -group">
									<input  class="input input_tel" type="tel" name="telefone" placeholder="Telefone" >
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
							<h3 class="title">Endereço diferente</h3>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="shiping-address">
							<label for="shiping-address">
								<span></span>
								Enviar em um endereço diferente?
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
								Cartão de crédito <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?><i class="fa fa-credit-card"> </i>
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
								Boleto bancário <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?><i class="fa fa-file"> </i>
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
								Transferência bancária <?=($ambiente == 1 ? "(Ambiente de teste)" : "")?><i class="fa fa-bank"> </i>
							</label>

						</div>
						<?php endif; ?>

					</div>


					<div class="pagamento-cartao hide">

						<form class="form_checkout_pagar" name="formCartao">
							<input type="hidden" name="semJuros" value="<?=$semJuros?>" placeholder="Parcelas sem juros" id="semJuros">
							<hr>
							<strong style="text-decoration: underline; text-align: center">Aceitasmos os cartões: </strong>
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
								<label for="cc-numero">Número do cartão</label>
								<input name="numCartao" type="tel" class="form-control resgataBandeira input-numerico" id="cc_numero" placeholder="Número do cartão" required>
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
								<label for="cc-validade">Validade do cartão</label>
								<input name="mes_ano" type="tel" class="form-control input_mes_ano" id="cc_validade" placeholder="Validade do cartão" required>
							</div>
							<div class="form-group">
								<label for="cc-codigo">Código de segurança</label>
								<input name="codSeguranca" type="tel" class="form-control resgataToken" id="cc_codigo" placeholder="Código de segurança" required>
							</div>

							<br>

							<div class="alert alert-info">Caso as parcelas não apareçam, redigite o CEP e número do cartão, respectivamente!</div>

							<div class="form-group select-estilo">
								<label for="qtdParcelas" style="font-size: 15px; text-align: left; width: 100%">Parcelas (Digite as informações do Cartão)</label>
								<select name="qtdParcelas" class="qtdParcelas hide" placeholder="Quantidade de parcelas">
									<option class="input" value=""> Selecionar...</option>
								</select>
							</div>
							<br><br>

							<input type="hidden" name="valorParcela" class="valorParcela" required placeholder="Valor da parcela">

							<!--<div class="dadosCartao"></div>-->
							<div id="ex1" class="modal">
								<p style="color: darkblue">
								<h3>Termos e Condições da Loja</h3>
								<strong>Política de Privacidade</strong><br>
								A loja se preocupa e se compromete com os seus clientes, por isso tem uma política severa com as informações que são coletadas e usadas para que ao navegar, o cliente não tenha preocupações e consiga finalizar sua compra com segurança.<br>

								Quando você visita o site, você aceita e está ciente das informações contidas na política de privacidade.<br>

								<strong>Pagamentos</strong><br>
								Todas as compras feitas com cartões de créditos ,boleto bancário ou débito online, são com segurança SSL (Security Socket Layer). Aquele cadeado que aparece no seu navegador indicando que a loja é segura. Os dados pessoais que estão no cartão, endereço de entrega e detalhes do pedido, não são divulgados em nenhum outro local e com a tecnologia de SSL presente, impede que essas informações sejam acessadas por outras pessoas ou transmitidas para outro lugar. Ressaltamos também que os dados de cartão não são armazenados na plataforma, e os mesmos são eliminados assim que a operadora de pagamentos aprova o pedido.<br>

								Caso a Loja receba alguma notificação/determinação legal ou judicial, teremos que cumprir com a determinação, compartilhando apenas os dados solicitados pela justiça.<br>



								<strong>Certificados</strong><br>
								Os selos no rodapé do site, indicam que a loja possui a tecnologia SSL instalada em seus servidores, e garante que as informações são transacionadas com segurança.<br>




								<strong>Informações Gerais</strong><br>
								A Loja eventualmente pode fazer o uso de *cookies para melhorar a experiência do usuário ao navegar. Recomendamos que você deixe o uso de cookies ligado no seu navegador, pois dessa forma é possível utilizar todas as personalizações e recursos disponibilizados pela loja. Mas se você não quiser, é possível desabilitar no seu navegador. (Atenção: Cada fabricante de software possui um modo diferente de fazer essa alteração).<br>



								<strong>Informação Importante</strong><br>
								Nós nunca iremos solicitar quaisquer informações que sejam fora do ambiente da loja. Estamos cientes que há muitas fraudes na internet, e se você não ficou confortável com um e-mail que recebeu e acha que não é nosso, nos informe.<br>

								Nós também não nos responsabilizamos por programas maliciosos instalados no seu computador, e que possam a vir modificar e alterar o comportamento da sua navegação.<br>


								<strong>Entregas com pagamento por Cartão de Crédito</strong><br>

								Se você efetuou o pagamento do seu pedido por cartão de crédito, começamos a preparar o envio a partir do momento em que tivermos a liberação e confirmação de pagamento pela administradora.<br>



								<strong>Entregas com pagamento por Boleto Bancário</strong><br>

								 A aprovação de pagamento via boleto leva até 2 dias úteis. Após o vencimento do boleto, o pedido é cancelado automaticamente.<br>

								<br>



								

								<br>



								<strong>Sobre o Frete</strong><br>

								O valor é calculado conforme o CEP do destinatário + peso + volume (tamanho da embalagem) do produto e as formas de entregas citadas acima. O frete é informado quando você selecionar um produto e adicionar ao carrinho, digitando o CEP desejado. O frete é cobrado e incluído na finalização do pedido, portanto você não irá pagar por nada no recebimento do pedido.<br>

								<strong>Entenda nossos Prazos de Entrega</strong><br>

								O prazo de entrega começa a contar a partir do momento em que o pagamento é confirmado, e não quando o pedido é realizado.<br>

								 <br>

								<br>

								Após a liberação do seu pedido, ele é coletado pelos Correios, e então começa a contar o prazo de entrega dos Correios.<br>

								Após a realização do Pedido e envio aos Correios, será registrado o código de rastreio na página Pedidos Realizados.<br>
								<br>
								<?=$dados_loja->extraTermosCondicoes?>
								</p>
								<a href="#" rel="modal:close">Fechar</a>
							</div>

							<!-- Link to open the modal -->







							<div class="">
								<input style="height: 25px; width: 25px" class="form-check-input" type="checkbox" name="termosCartao" placeholder="Termos e Condições">

								<label for="terms">
									<span></span>
									Li e aceitos os <p><a href="#ex1" rel="modal:open">TERMOS E CONDIÇÕES</a></p>
								</label>
							</div>
							<input title="text" type="hidden" class="form-control" name="token_pagamento_cartao" id="token_pagamento_cartao" placeholder="Token de pagamento" value="">
							<input type="hidden" name="data-vFrete" value="0.00">
							<input type="hidden" name="frete_checkout" value="0.00">
						</form>
						<button class="primary-btn order-submit btn-pagar-cartao ">PAGAR COM CARTÃO DE CRÉDITO</button>

						<!--<input type="text" name="tokenCartao" class="tokenCartao">Token do Cartão-->
						<!--<input type="text" name="hashComprador" class="hashComprador">Identificador com dados do comprador(hash)-->

						<div class="clearfix"></div>
					</div>

					<br><br>

					<div class="pagamento-boleto hide">
						<img src="<?= base_url("loja/images/boleto.png") ?>" style="height: 50px;" class="center-block">

						<div class="alert alert-info"><strong style="color:black;">Boleto bancário emitido ao final da compra.</strong></div>
						<div class="">

						</div>

						<div id="ex1" class="modal">
							<p style="color: darkblue">
							<h3>Termos e Condições da Loja</h3>
							<strong>Política de Privacidade</strong><br>
							A loja se preocupa e se compromete com os seus clientes, por isso tem uma política severa com as informações que são coletadas e usadas para que ao navegar, o cliente não tenha preocupações e consiga finalizar sua compra com segurança.<br>

							Quando você visita o site, você aceita e está ciente das informações contidas na política de privacidade.<br>

							<strong>Pagamentos</strong><br>
							Todas as compras feitas com cartões de créditos ,boleto bancário ou débito online, são com segurança SSL (Security Socket Layer). Aquele cadeado que aparece no seu navegador indicando que a loja é segura. Os dados pessoais que estão no cartão, endereço de entrega e detalhes do pedido, não são divulgados em nenhum outro local e com a tecnologia de SSL presente, impede que essas informações sejam acessadas por outras pessoas ou transmitidas para outro lugar. Ressaltamos também que os dados de cartão não são armazenados na plataforma, e os mesmos são eliminados assim que a operadora de pagamentos aprova o pedido.<br>

							Caso a Loja receba alguma notificação/determinação legal ou judicial, teremos que cumprir com a determinação, compartilhando apenas os dados solicitados pela justiça.<br>



							<strong>Certificados</strong><br>
							Os selos no rodapé do site, indicam que a loja possui a tecnologia SSL instalada em seus servidores, e garante que as informações são transacionadas com segurança.<br>




							<strong>Informações Gerais</strong><br>
							A Loja eventualmente pode fazer o uso de *cookies para melhorar a experiência do usuário ao navegar. Recomendamos que você deixe o uso de cookies ligado no seu navegador, pois dessa forma é possível utilizar todas as personalizações e recursos disponibilizados pela loja. Mas se você não quiser, é possível desabilitar no seu navegador. (Atenção: Cada fabricante de software possui um modo diferente de fazer essa alteração).<br>



							<strong>Informação Importante</strong><br>
							Nós nunca iremos solicitar quaisquer informações que sejam fora do ambiente da loja. Estamos cientes que há muitas fraudes na internet, e se você não ficou confortável com um e-mail que recebeu e acha que não é nosso, nos informe.<br>

							Nós também não nos responsabilizamos por programas maliciosos instalados no seu computador, e que possam a vir modificar e alterar o comportamento da sua navegação.<br>


							<strong>Entregas com pagamento por Cartão de Crédito</strong><br>

							Se você efetuou o pagamento do seu pedido por cartão de crédito, começamos a preparar o envio a partir do momento em que tivermos a liberação e confirmação de pagamento pela administradora.<br>



							<strong>Entregas com pagamento por Boleto Bancário</strong><br>

							 A aprovação de pagamento via boleto leva até 2 dias úteis. Após o vencimento do boleto, o pedido é cancelado automaticamente.<br>

							<br>



							

							<br>



							<strong>Sobre o Frete</strong><br>

							O valor é calculado conforme o CEP do destinatário + peso + volume (tamanho da embalagem) do produto e as formas de entregas citadas acima. O frete é informado quando você selecionar um produto e adicionar ao carrinho, digitando o CEP desejado. O frete é cobrado e incluído na finalização do pedido, portanto você não irá pagar por nada no recebimento do pedido.<br>

							<strong>Entenda nossos Prazos de Entrega</strong><br>

							O prazo de entrega começa a contar a partir do momento em que o pagamento é confirmado, e não quando o pedido é realizado.<br>

							 <br>

							<br>

							Após a liberação do seu pedido, ele é coletado pelos Correios, e então começa a contar o prazo de entrega dos Correios.<br>

							Após a realização do Pedido e envio aos Correios, será registrado o código de rastreio na página Pedidos Realizados.<br>
							<br>
							<?=$dados_loja->extraTermosCondicoes?>
							</p>
							<a href="#" rel="modal:close">Fechar</a>
						</div>

						<!-- Link to open the modal -->






						<form class="form_checkout_pagar" >

						<div class="">
							<input style="height: 25px; width: 25px" class="form-check-input" type="checkbox" name="termosBoleto" placeholder="Termos e Condições">

							<label for="terms">
								<span></span>
								Li e aceitos os <p><a href="#ex1" rel="modal:open">TERMOS E CONDIÇÕES</a></p>
							</label>
						</div>
						</form>
						<button class="primary-btn order-submit btn-pagar-boleto">PAGAR COM BOLETO</button>
						<!--SE A TRANDAÇÃO OCORREU COM SUCESSO, encaminhar para pedidosRealizados-->
						<div class="compra-finalizada-boleto hide">
							<a class="primary-btn order-submit" href="<?= base_url("pedidosRealizados") ?>">Imprimir Boleto</a>
						</div>
						<div class="clearfix"></div>
						<br><br>
						<div class="erro_validacao"></div>
					</div>


					<div class="pagamento-transferencia hide">
						<hr>
						<!--<div class="meio-pag-debito">Bancos disponíveis: <br></div>-->
						<label>Bancos disponíveis para Débito online:</label><br>

						<?php for($i = 1; $i <= 4; $i++): ?>
						<img src="<?=base_url("loja/images/debito").$i.".png"?>">
						<?php endfor; ?>
						<hr>

						<div class="form-group select-estilo">
							<label for="nome_banco">Selecione um banco</label>
							<form method="post" accept-charset="utf-8" class="form_checkout_pagar">
								<select name="nome_banco" class="form-control" placeholder='"Banco para transferência"' required disabled>
									<option style="font-size: 25px" value="">Selecionar...</option>
									<option style="font-size: 35px" value="bradesco">Banco Bradesco</option>
									<option style="font-size: 35px" value="itau">Banco Itaú</option>
									<option style="font-size: 35px" value="bancodobrasil">Banco do Brasil</option>
									<option style="font-size: 35px" value="banrisul">Banco Banrisul</option>
								</select>
							</form>
						</div>

						<div class="alert alert-info"><strong style="color:black;">Acesso ao ambiente seguro do seu banco ao final da compra.</strong></div>

						<div id="ex1" class="modal">
							<p style="color: darkblue">
							<h3>Termos e Condições da Loja</h3>
							<strong>Política de Privacidade</strong><br>
							A loja se preocupa e se compromete com os seus clientes, por isso tem uma política severa com as informações que são coletadas e usadas para que ao navegar, o cliente não tenha preocupações e consiga finalizar sua compra com segurança.<br>

							Quando você visita o site, você aceita e está ciente das informações contidas na política de privacidade.<br>

							<strong>Pagamentos</strong><br>
							Todas as compras feitas com cartões de créditos ,boleto bancário ou débito online, são com segurança SSL (Security Socket Layer). Aquele cadeado que aparece no seu navegador indicando que a loja é segura. Os dados pessoais que estão no cartão, endereço de entrega e detalhes do pedido, não são divulgados em nenhum outro local e com a tecnologia de SSL presente, impede que essas informações sejam acessadas por outras pessoas ou transmitidas para outro lugar. Ressaltamos também que os dados de cartão não são armazenados na plataforma, e os mesmos são eliminados assim que a operadora de pagamentos aprova o pedido.<br>

							Caso a Loja receba alguma notificação/determinação legal ou judicial, teremos que cumprir com a determinação, compartilhando apenas os dados solicitados pela justiça.<br>



							<strong>Certificados</strong><br>
							Os selos no rodapé do site, indicam que a loja possui a tecnologia SSL instalada em seus servidores, e garante que as informações são transacionadas com segurança.<br>




							<strong>Informações Gerais</strong><br>
							A Loja eventualmente pode fazer o uso de *cookies para melhorar a experiência do usuário ao navegar. Recomendamos que você deixe o uso de cookies ligado no seu navegador, pois dessa forma é possível utilizar todas as personalizações e recursos disponibilizados pela loja. Mas se você não quiser, é possível desabilitar no seu navegador. (Atenção: Cada fabricante de software possui um modo diferente de fazer essa alteração).<br>



							<strong>Informação Importante</strong><br>
							Nós nunca iremos solicitar quaisquer informações que sejam fora do ambiente da loja. Estamos cientes que há muitas fraudes na internet, e se você não ficou confortável com um e-mail que recebeu e acha que não é nosso, nos informe.<br>

							Nós também não nos responsabilizamos por programas maliciosos instalados no seu computador, e que possam a vir modificar e alterar o comportamento da sua navegação.<br>


							<strong>Entregas com pagamento por Cartão de Crédito</strong><br>

							Se você efetuou o pagamento do seu pedido por cartão de crédito, começamos a preparar o envio a partir do momento em que tivermos a liberação e confirmação de pagamento pela administradora.<br>



							<strong>Entregas com pagamento por Boleto Bancário</strong><br>

							 A aprovação de pagamento via boleto leva até 2 dias úteis. Após o vencimento do boleto, o pedido é cancelado automaticamente.<br>

							<br>



							

							<br>



							<strong>Sobre o Frete</strong><br>

							O valor é calculado conforme o CEP do destinatário + peso + volume (tamanho da embalagem) do produto e as formas de entregas citadas acima. O frete é informado quando você selecionar um produto e adicionar ao carrinho, digitando o CEP desejado. O frete é cobrado e incluído na finalização do pedido, portanto você não irá pagar por nada no recebimento do pedido.<br>

							<strong>Entenda nossos Prazos de Entrega</strong><br>

							O prazo de entrega começa a contar a partir do momento em que o pagamento é confirmado, e não quando o pedido é realizado.<br>

							 <br>

							<br>

							Após a liberação do seu pedido, ele é coletado pelos Correios, e então começa a contar o prazo de entrega dos Correios.<br>

							Após a realização do Pedido e envio aos Correios, será registrado o código de rastreio na página Pedidos Realizados.<br>
							<br>
							<?=$dados_loja->extraTermosCondicoes?>
							</p>
							<a href="#" rel="modal:close">Fechar</a>
						</div>

						<!-- Link to open the modal -->






						<form class="form_checkout_pagar" >

						<div class="">
							<input style="height: 25px; width: 25px" class="form-check-input" type="checkbox" name="termosDebito" placeholder="Termos e Condições">

							<label for="terms">
								<span></span>
								Li e aceitos os <p><a href="#ex1" rel="modal:open">TERMOS E CONDIÇÕES</a></p>
							</label>
						</div>
						</form>
						<button class="primary-btn order-submit btn-pagar-transferencia">PAGAR COM TRANSFERÊNCIA BANCÁRIA</button>
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
