<?php

class Pagar extends \App\Core\CoreController
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('pagarModel');
		$this->load->model('clientesModel');
		$this->load->library('carrinhoCompras');
		$this->load->library('cart');
		$this->load->helper('helper_helper');
		$this->load->model('configModel');
	}

	public function index()
	{
		//$query = $this->pagarModel->getConfigPagseguro();

	}

	public function pg_session_id()
	{
		$query = $this->pagarModel->getConfigPagseguro();

		//Url para gerar o sessionId (Sessão de pagamento no pagseguro)
		if ($query->ambiente == 1) {//Ambiente de teste SANDBOX

			$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
			$token = $query->token;

		} else {//Ambiente real de produção

			$url = "https://ws.pagseguro.uol.com.br/v2/sessions";
		}

		$param['email'] = $query->email;
		$param['token'] = $query->token;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, count($param));
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1");

		if ($query->ambiente == 1) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		} else {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

		}

		$result = curl_exec($ch);

		curl_close($ch);

		$xml = simplexml_load_string($result);
		$json = json_encode($xml);
		$std = json_decode($json);
		//var_dump($std->id);

		if (isset($std->id)) {
			$json = [
				"erro" => 0,
				"msg" => "Sucesso",
				"id_sessao" => $std->id
			];
		} else {
			$json = [
				"erro" => 5000,
				"msg" => "Erro ao gerar sessão de pagamento, tente novamente!"
			];
		}


		header('Content-Type: application/json');
		echo json_encode($json);
	}


	public function pg_cartao()
	{

		/**OPÇÃO COM USUÁRIO E SENHA**/
		/**Criar opção sem cadastro: checkout cadastrar? -> mostrar opção de inserir senha**/
		$retorno = false;
		//var_dump($this->input->post());
		$this->form_validation->set_rules('hash', 'Erro do PagSeguro - Tente novamente!', "required");
		$this->form_validation->set_rules('username', 'Nome completo', "required");
		$this->form_validation->set_rules('cpf', 'CPF', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('bairro', 'Bairro', "required", ['required' => 'Bairro é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('endereco', 'Endereço', "required", ['required' => 'Endereço é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('numero', 'Número de endereço', "required", ['required' => 'Número do endereço é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('cidade', 'Cidade', "required", ['required' => 'Cidade é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('estado', 'Estado', "required", ['required' => 'Estado é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('telefone', 'Telefone', "required", ['required' => 'Telefone é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('termosCartao', 'Termos e Condições', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);

		$this->form_validation->set_rules('numCartao', 'Número do cartão', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('titular', 'Nome Completo do Titular do Cartão', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('CPFtitular', 'CPF do titular do cartão', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('nascTitular', 'Data de Nascimento do Titular do cartão', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('numCartao', 'Número do cartão', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('mes_ano', 'Validadde do cartão', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('codSeguranca', 'Código de segurança do cartão', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('qtdParcelas', 'Quantidade de parcelas', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('valorParcela', 'Valor da Parcela', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		if ($this->input->post("temCorreios") == '1') {
			$this->form_validation->set_rules('frete_checkout', 'Opção de frete', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		}
		if (validaCPF($this->input->post('cpf')) == false) {
			$retorno = [
				'erro' => '-2',
				'msg' => 'Digite um CPF válido!'
			];
			echo json_encode($retorno);
			exit;
		}

		if (validaCPF($this->input->post('CPFtitular')) == false) {
			$retorno = [
				'erro' => '-2',
				'msg' => 'Digite um CPF do titular válido!'
			];
			echo json_encode($retorno);
			exit;
		}

		if ($this->input->post('checkoutLogado')) {
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");//is_unique: verifica se é um email único
			$this->form_validation->set_rules('password', 'Senha', "required|min_length[8]");
		} else {
			$this->form_validation->set_rules('email', 'Email', "required|valid_email|is_unique[users.email]", ['is_unique' => 'Este Email já foi cadastrado na loja! Faça login.']);//is_unique: verifica se é um email único
			$this->form_validation->set_rules('password', 'Senha', "required|min_length[8]");
		}
		$this->form_validation->set_rules('cep', 'CEP', "required|min_length[8]");
		$this->form_validation->set_rules('valorParcela', 'Valor da parcela', "required|greater_than[0]", ['greater_than' => 'Selecione uma opção de parcelamento!']);

		if ($this->form_validation->run()) {//Grava e envia ao Pagseguro
			if (!is_numeric((int)$this->input->post('numero'))) {
				$numero = 0;
			} else {
				$numero = (int)$this->input->post('numero');
			}

			$cliente = [
				'cpf' => $this->input->post('cpf'),
				'cep' => $this->input->post('cep'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $numero,
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'estado' => $this->input->post('estado'),
				'complemento' => $this->input->post('complemento'),
				'telefone' => $this->input->post('telefone')
			];

			//Verifica se foi passado o id do cliente.(tem cadastro)
			if ($this->input->post('id_cliente')) {
				//Cliente já cadastrado. Pegamos dados no DB
				$id_cliente = $this->input->post('id_cliente');
				//$query -> $this->pagarModel->getClienteId($this->input->post('id_cliente'));
				//$query = $this->pagarModel->getClienteId($id_cliente);

				//$query = $this->pagarModel->getClienteId($id_cliente);//????????????
				$query = $this->ion_auth->user()->row();
			} else {
				//Novo cadastro de cliente
				//$id_cliente = $this->session->userdata('user_id');//$this->session->userdata('last_id');

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional_data = [
					//'id_cliente' => $id_cliente,
					'cpf' => $this->input->post('cpf'),
					'cep' => $this->input->post('cep'),
					'endereco' => $this->input->post('endereco'),
					'numero' => $numero,
					'bairro' => $this->input->post('bairro'),
					'cidade' => $this->input->post('cidade'),
					'estado' => $this->input->post('estado'),
					'complemento' => $this->input->post('complemento'),
					'telefone' => $this->input->post('telefone'),
					//'data_cadastro' => dataDiaDb()
				];
				$group = ['3'];
				if (!$this->input->post('checkoutLogado')) {
					$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				}
				//$query->
				$this->ion_auth->login($email, $password);
				$query = $this->ion_auth->user()->row();
				$this->pagarModel->updateCliente($query->id, $additional_data);

				$id_cliente = $query->id;
			}


			//$query = $this->pagarModel->getClienteId($id_cliente);

			if (!$query) {
				$retorno = [
					'erro' => 40,
					'msg' => 'Erro, cliente não localizado!'
				];
				echo json_encode($retorno);
				exit;
			}

			//$id_cliente = $query->id;
			$nomeComprador = ($this->input->post('username') ? $this->input->post('username') : $query->username);
			$cpfComprador = ($this->input->post('cpf') ? $this->input->post('cpf') : $query->cpf);
			$emailComprador = $query->email;
			$telefoneComprador = explode(' ', ($this->input->post('telefone') ? $this->input->post('telefone') : $query->telefone));// Padrão: (99) 99999-9999; Pagseguro: separar (99) e o numero

			//Dados de entrega
			$cepComprador = ($this->input->post('cep') ? $this->input->post('cep') : $query->cep);
			$enderecoComprador = ($this->input->post('endereco') ? $this->input->post('endereco') : $query->endereco);
			$bairroComprador = ($this->input->post('bairro') ? $this->input->post('bairro') : $query->bairro);
			$cidadeComprador = ($this->input->post('cidade') ? $this->input->post('cidade') : $query->cidade);
			$estadoComprador = ($this->input->post('estado') ? $this->input->post('estado') : $query->estado);
			$numeroComprador = ($numero ? $numero : $query->numero);


			//Dados de pagamento e acesso

			$config = $this->pagarModel->getConfig();
			$pagarCartao['email'] = $config->email;
			$pagarCartao['token'] = $config->token;
			$pagarCartao['paymentMode'] = 'default';
			$pagarCartao['paymentMethod'] = 'creditCard';
			$pagarCartao['receiverEmail'] = $config->email;
			$pagarCartao['currency'] = 'BRL';

			$configCorreios = $this->configModel->getConfigCorreios();
			//$pagarCartao['extraAmount'] = (double)$configCorreios->somar_frete;


			$configLoja = $this->configModel->getConfig();
			$pagarCartao['senderName'] = remove_acentos($nomeComprador);
			$pagarCartao['senderCPF'] = limpaString($cpfComprador);
			//$telefoneLoja = explode(' ', $query->telefone);
			$pagarCartao['senderAreaCode'] = limpaString($telefoneComprador[0]);
			$pagarCartao['senderPhone'] = limpaString($telefoneComprador[1]);
			$pagarCartao['senderEmail'] = ($config->ambiente == '1' ? 'c77194552117609548046@sandbox.pagseguro.com.br' : $emailComprador);

			//Dados do comprador
			$pagarCartao['shippingAddressStreet'] = remove_acentos($enderecoComprador . '. ' . $this->input->post('complemento'));
			$pagarCartao['shippingAddressNumber'] = ($numeroComprador ? limpaString($numeroComprador) : '000');
			$pagarCartao['shippingAddressDistrict'] = remove_acentos($bairroComprador);
			$pagarCartao['shippingAddressPostalCode'] = limpaString($cepComprador);
			$pagarCartao['shippingAddressCity'] = remove_acentos($cidadeComprador);
			$pagarCartao['shippingAddressState'] = $estadoComprador;
			$pagarCartao['shippingAddressCountry'] = 'BRA';


			/*$freteComprador = ($this->input->post('frete_checkout') ? explode('|', $this->input->post('frete_checkout')) : '');//passado via js
			if($freteComprador == ''){
				$freteComprador[0] = 0.00;
				$freteComprador[1] = 0;

			}
			if($this->input->post('formaEnvio') == '1'){
				$pagarDebito['shippingType'] = (($freteComprador[1] == '04510') ? 1 : 2);;
				$pagarDebito['shippingCost'] = (double)$freteComprador[0];
			}*/


			if ($this->input->post('frete_checkout') != '0.00') {
				//$freteComprador = explode('|', $this->input->post('frete_checkout'));//passado via js
				$freteComprador = ($this->input->post('frete_checkout') ? explode('|', $this->input->post('frete_checkout')) : '');//passado via js
				if ($freteComprador == '') {
					$freteComprador[0] = 0.00;
					$freteComprador[1] = 0;

				}

				if ($freteComprador[1] == '04510') {
					$shippingType = 1;
				} else
					if ($freteComprador[1] == '04014') {
						$shippingType = 2;
					}

				$pagarCartao['shippingType'] = $shippingType;//'1';
				$pagarCartao['shippingCost'] = (double)$freteComprador[0];

			} else {
				$freteComprador[1] = 0;
				$freteComprador[0] = 0;
			}
			$pagarCartao['senderHash'] = $this->input->post('hash');

			$pagarCartao['creditCardToken'] = $this->input->post('token_pagamento_cartao');

			//DADOS DO CARTÃO SÃO DO COMPRADOR
			$pagarCartao['creditCardHolderName'] = remove_acentos($this->input->post('titular'));//remove_acentos($nomeComprador);
			$pagarCartao['creditCardHolderCPF'] = limpaString($this->input->post('CPFtitular'));//limpaString($cpfComprador);
			$pagarCartao['creditCardHolderAreaCode'] = limpaString($telefoneComprador[0]);
			$pagarCartao['creditCardHolderPhone'] = limpaString($telefoneComprador[1]);
			$pagarCartao['billingAddressStreet'] = remove_acentos($enderecoComprador . '. ' . $this->input->post('complemento'));
			$pagarCartao['billingAddressNumber'] = ($numeroComprador ? $numeroComprador : '000');
			$pagarCartao['billingAddressDistrict'] = remove_acentos($bairroComprador);
			$pagarCartao['billingAddressPostalCode'] = limpaString($cepComprador);
			$pagarCartao['billingAddressCity'] = remove_acentos($cidadeComprador);
			$pagarCartao['billingAddressState'] = $estadoComprador;
			$pagarCartao['billingAddressCountry'] = 'BRA';
			$pagarCartao['creditCardHolderBirthDate'] = $this->input->post('nascTitular');

			//Itens do carrinho
			$carrinho = $this->cart->contents();
			$contador = 1;
			//var_dump($carrinho);
			foreach ($carrinho as $item) {
				$pagarCartao['itemId' . $contador] = $item['id'];
				$pagarCartao['itemDescription' . $contador] = ($item['tamanho'] ? $item['tamanho'] : '') . ($item['tipo'] ? $item['tipo'] : '') . '|| ' . remove_acentos($item['nome']);
				$pagarCartao['itemAmount' . $contador] = $item['valor'];//number_format($linha['valor'], 2, '.', '');
				$pagarCartao['itemQuantity' . $contador] = $item['qtd'];
				$contador++;


			}


			$pagarCartao['notificationURL'] = base_url("") . "pagar/retornoPagseguro";

			$ultimoPedido = $this->pagarModel->idUltimoPedido();
			$ref_pedido = date('d-m-Y|h:s:i|') . (string)$ultimoPedido->id;//random_string('numeric', 8);
			$pagarCartao['reference'] = 'Ref. [# ' . $ref_pedido . ' ]';
			//Parcelas
			//$valor_pagar = $this->carrinhocompras->totalCarrinho() + $freteComprador[0];


			$pagarCartao['installmentQuantity'] = $this->input->post('qtdParcelas');

			$pagarCartao['installmentValue'] = (number_format($this->input->post('valorParcela'), 2, ".", ","));

			$configPagseguro = $this->configModel->getConfigPagseguro();
			$pagarCartao['noInterestInstallmentQuantity'] = $configPagseguro->parcelas_sJuros;

			if ($config->ambiente == 1) {
				$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions';
			} else {
				$url = 'https://ws.pagseguro.uol.com.br/v2/transactions';
			}


			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);

			curl_setopt($ch, CURLOPT_POST, count($pagarCartao));
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($pagarCartao));

			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1");

			if ($config->ambiente == 1) {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			} else {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

			}

			$result = curl_exec($ch);

			if ($result == 'Internal Server Error') {
				if (!$this->input->post('checkoutLogado')) {
					$this->pagarModel->desregistrar($id_cliente);
				}
				$this->ion_auth->logout();
				$retorno = [
					'erro' => '53150',
					'msg' => 'Erro do PagSeguro. Tente novamente mais tarde ou selecione outra forma de pagamento!'
				];
				echo json_encode($retorno);
				exit;
			}
			curl_close($ch);

			$xml = simplexml_load_string($result);

			$json = json_encode($xml);
			$std = json_decode($json);

			/*if(isset($std->error[0]->code)){

				$retorno = [
					'erro' => $std->error->code,
					'msg' => $std->error->message
				];
			}*/

			//Erro da API

			if (isset($std->error)) {
				if (!$this->input->post('checkoutLogado')) {
					//$this->pagarModel->desregistrar($id_cliente);
				}
				//$this->ion_auth->logout();
				//echo '<pre>'; var_dump($std->error);
				//exit;
				if (is_array($std->error)) {
					foreach ($std->error as $item) {
						erroPagseguro($item->code);
					}
				} else {
					erroPagseguro($std->error->code);
				}
				//erroPagseguro($std->error->code);

				/*2 erros
				object(stdClass)#61 (2) {
				  ["0"]=>
				  object(stdClass)#58 (2) {
					["code"]=>
					string(5) "53026"
					["message"]=>
					string(36) "shipping address number is required."
				  }
				  ["1"]=>
				  object(stdClass)#59 (2) {
					["code"]=>
					string(5) "53057"
					["message"]=>
					string(35) "billing address number is required."
				  }
				}
				 *
				 */
			}


			if (isset($std->code)) {//transação criada
				if ($freteComprador[1] == '04510') {
					$formaEnvio = 1;
				} else
					if ($freteComprador[1] == '04014') {
						$formaEnvio = 2;
					} else {
						$formaEnvio = 3;
					}
				/**Grava pedido**/
				$pedido = [



					'id_cliente' => $id_cliente,
					'total_produto' => $this->cart->total(),
					'forma_envio' => $formaEnvio,
					'total_frete' => $freteComprador[0],
					'total_pedido' => ($freteComprador[0] + $this->cart->total()),
					'id_status' => 1,
					'data_cadastro' => dataDiaDb(),
					'ref' => $ref_pedido
				];
				$this->pagarModel->doInsertPedido($pedido);
				$id_pedido = $this->session->userdata('last_id');

				//produtos do pedido

				foreach ($carrinho as $indice => $linha) {
					$produto = [
						'id_pedido' => $id_pedido,
						'rowid' => $linha['rowid'],
						'id_produto' => $linha['id'],
						'qtd' => $linha['qtd'],
						'tamanho' => $linha['tamanho'],
						'tipo' => $linha['tipo'],
						'valor_unit' => number_format($linha['valor'], 2, '.', ''),
						'valor_total' => number_format($linha['subtotal'], 2, '.', '')
					];

					$this->pagarModel->doInsertPedidoProdutos($produto);
				}

				/**Gravar a transação**/
				$transacao = [
					'id_pedido' => $id_pedido,
					'id_cliente' => $id_cliente,
					'cod_transacao' => $std->code,
					'referencia' => $std->reference,
					'data' => dataDiaDb(),
					'tipo' => 2, //1: BOLETO, 2: CARTÃO, 3: TRANSFERÊNCIA
					'status' => $std->status,//Status do pedido
					't_parcela' => $this->input->post("qtdParcelas"),
					'v_parcela' => $this->input->post("valorParcela"),
					//'url_boleto' => $std->paymentLink,
					//'nome_banco' => $this->input->post('nome_banco')
				];
				$this->pagarModel->doInsertPedidoTransacao($transacao);

				$retorno = [
					"erro" => 0,
					"msg" => "Pedido realizado com sucesso!",
					'status' => "Aguardando Pagamento",
					//'url_banco' => $std->paymentLink,
					'numero_pedido' => $ref_pedido,
					'cod' => $std->code
				];
				/*
				//teste:
				$_SESSION['status'] = "Aguardando Pagamento";
				$_SESSION['numero_pedido'] = $ref_pedido;
				$_SESSION['cod'] = $std->code;
				//$_SESSION['url_banco'] = $std->paymentLink;
				$_SESSION['total_frete'] = $freteComprador[0];
				$_SESSION['total_pedido'] = $freteComprador[0] + $this->carrinhocompras->totalCarrinho();
				$_SESSION['tamanho_carrinho'] = $this->carrinhocompras->totalItem();
				*/

				foreach ($carrinho as $item) {
					if($item['tamanho']){
						$tipoTamanho = $item['tamanho'];
					}else
						if($item['tipo']){
							$tipoTamanho = $item['tipo'];
						}else{
							$tipoTamanho = null;
						}
					$this->pagarModel->diminuirEstoque((int)$item['id'], (int)$item['qty'], $tipoTamanho);
				}
				setMSG('msgSucesso', 'Pedido realizado com sucesso!', 'sucesso');

				$this->cart->destroy();
			}
			echo json_encode($retorno);
			exit;


		} else {
			$retorno = [
				'erro' => 10,
				'msg' => validation_errors()
			];
			echo json_encode($retorno);
			exit;
		}


	}

	public function pg_boleto()
	{
		/**OPÇÃO COM USUÁRIO E SENHA**/
		/**Criar opção sem cadastro: checkout cadastrar? -> mostrar opção de inserir senha**/
		$retorno = false;
		//var_dump($this->input->post());
		$this->form_validation->set_rules('hash', 'Erro do PagSeguro - Tente novamente!', "required");
		$this->form_validation->set_rules('bairro', 'Bairro', "required", ['required' => 'Bairro é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('endereco', 'Endereço', "required", ['required' => 'Endereço é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('numero', 'Número de endereço', "required", ['required' => 'Número do endereço é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('cidade', 'Cidade', "required", ['required' => 'Cidade é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('estado', 'Estado', "required", ['required' => 'Estado é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('telefone', 'Telefone', "required", ['required' => 'Telefone é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);

		$this->form_validation->set_rules('username', 'Nome completo', "required");
		$this->form_validation->set_rules('cpf', 'CPF', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('termosBoleto', 'Termos e Condições', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		if ($this->input->post("temCorreios") == '1') {
			$this->form_validation->set_rules('frete_checkout', 'Opção de frete', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		}
		if (validaCPF($this->input->post('cpf')) == false) {
			$retorno = [
				'erro' => '-2',
				'msg' => 'Digite um CPF válido!'
			];
			echo json_encode($retorno);
			exit;
		}
		if ($this->input->post('checkoutLogado')) {
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");//is_unique: verifica se é um email único
			$this->form_validation->set_rules('password', 'Senha', "required|min_length[8]");
		} else {
			$this->form_validation->set_rules('email', 'Email', "required|valid_email|is_unique[users.email]", ['is_unique' => 'Este Email já foi cadastrado na loja! Faça login.']);//is_unique: verifica se é um email único
			$this->form_validation->set_rules('password', 'Senha', "required|min_length[8]");
		}
		$this->form_validation->set_rules('cep', 'CEP', "required|min_length[8]");
		if ($this->form_validation->run()) {//Grava e envia ao Pagseguro

			$cliente = [
				'cpf' => $this->input->post('cpf'),
				'cep' => $this->input->post('cep'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'estado' => $this->input->post('estado'),
				'complemento' => $this->input->post('complemento'),
				'telefone' => $this->input->post('telefone')
			];

			//Verifica se foi passado o id do cliente.(tem cadastro)
			if ($this->input->post('id_cliente')) {
				//Cliente já cadastrado. Pegamos dados no DB
				$id_cliente = $this->input->post('id_cliente');
				//$query -> $this->pagarModel->getClienteId($this->input->post('id_cliente'));
				//$query = $this->pagarModel->getClienteId($id_cliente);

				//$query = $this->pagarModel->getClienteId($id_cliente);//????????????
				$query = $this->ion_auth->user()->row();
			} else {
				//Novo cadastro de cliente
				//$id_cliente = $this->session->userdata('user_id');//$this->session->userdata('last_id');

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional_data = [
					//'id_cliente' => $id_cliente,
					'cpf' => $this->input->post('cpf'),
					'cep' => $this->input->post('cep'),
					'endereco' => $this->input->post('endereco'),
					'numero' => $this->input->post('numero'),
					'bairro' => $this->input->post('bairro'),
					'cidade' => $this->input->post('cidade'),
					'estado' => $this->input->post('estado'),
					'complemento' => $this->input->post('complemento'),
					'telefone' => $this->input->post('telefone'),
					//'data_cadastro' => dataDiaDb()
				];
				$group = ['3'];
				if (!$this->input->post('checkoutLogado')) {
					$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				}
				//$query->
				$this->ion_auth->login($email, $password);
				$query = $this->ion_auth->user()->row();
				$this->pagarModel->updateCliente($query->id, $additional_data);

				$id_cliente = $query->id;
			}


			//$query = $this->pagarModel->getClienteId($id_cliente);

			if (!$query) {
				$retorno = [
					'erro' => 40,
					'msg' => 'Erro, cliente não localizado!'
				];
				echo json_encode($retorno);
				exit;
			}

			//$id_cliente = $query->id;
			$nomeComprador = ($this->input->post('username') ? $this->input->post('username') : $query->username);
			$cpfComprador = ($this->input->post('cpf') ? $this->input->post('cpf') : $query->cpf);
			$emailComprador = $query->email;
			$telefoneComprador = explode(' ', ($this->input->post('telefone') ? $this->input->post('telefone') : $query->telefone));// Padrão: (99) 99999-9999; Pagseguro: separar (99) e o numero

			//Dados de entrega
			$cepComprador = ($this->input->post('cep') ? $this->input->post('cep') : $query->cep);
			$enderecoComprador = ($this->input->post('endereco') ? $this->input->post('endereco') : $query->endereco);
			$bairroComprador = ($this->input->post('bairro') ? $this->input->post('bairro') : $query->bairro);
			$cidadeComprador = ($this->input->post('cidade') ? $this->input->post('cidade') : $query->cidade);
			$estadoComprador = ($this->input->post('estado') ? $this->input->post('estado') : $query->estado);
			$numeroComprador = ($this->input->post('numero') ? $this->input->post('numero') : $query->numero);


			//Dados de pagamento e acesso

			$config = $this->pagarModel->getConfig();
			$pagarBoleto['email'] = $config->email;
			$pagarBoleto['token'] = $config->token;
			$pagarBoleto['paymentMode'] = 'default';
			$pagarBoleto['paymentMethod'] = 'boleto';
			$pagarBoleto['receiverEmail'] = $config->email;
			$pagarBoleto['currency'] = 'BRL';
			//$pagarBoleto['extraAmount'] = $config->somar_frete;

			$ultimoPedido = $this->pagarModel->idUltimoPedido();
			$ref_pedido = date('d-m-Y|h:s:i|') . (string)$ultimoPedido->id;//random_string('numeric', 8);
			$pagarBoleto['reference'] = 'Ref. [# ' . $ref_pedido . ' ]';

			//Dados do comprador

			$pagarBoleto['senderName'] = remove_acentos($nomeComprador);
			$pagarBoleto['senderCPF'] = limpaString($cpfComprador);
			$pagarBoleto['senderAreaCode'] = limpaString($telefoneComprador[0]);
			$pagarBoleto['senderPhone'] = limpaString($telefoneComprador[1]);
			$pagarBoleto['senderEmail'] = ($config->ambiente == '1' ? 'c77194552117609548046@sandbox.pagseguro.com.br' : $emailComprador);

			$pagarBoleto['shippingAddressStreet'] = remove_acentos($enderecoComprador . '. ' . $this->input->post('complemento'));
			$pagarBoleto['shippingAddressNumber'] = ($numeroComprador ? limpaString($numeroComprador) : '000');
			$pagarBoleto['shippingAddressDistrict'] = remove_acentos($bairroComprador);
			$pagarBoleto['shippingAddressPostalCode'] = limpaString($cepComprador);
			$pagarBoleto['shippingAddressCity'] = remove_acentos($cidadeComprador);
			$pagarBoleto['shippingAddressState'] = $estadoComprador;
			$pagarBoleto['shippingAddressCountry'] = 'BRA';


			$freteComprador = ($this->input->post('frete_checkout') ? explode('|', $this->input->post('frete_checkout')) : '');//passado via js
			if ($freteComprador == '') {
				$freteComprador[0] = 0.00;
				$freteComprador[1] = 0;

			}
			if ($this->input->post('formaEnvio') == '1') {
				$pagarBoleto['shippingType'] = (($freteComprador[1] == '04510') ? 1 : 2);;
				$pagarBoleto['shippingCost'] = (double)$freteComprador[0];
			}
			$pagarBoleto['senderHash'] = $this->input->post('hash');

			//Itens do carrinho
			//$this->load->library('carrinhoCompras');
			//$carrinho = $this->carrinhocompras->listarProdutos();
			$carrinho = $this->cart->contents();

			$contador = 1;
			foreach ($carrinho as $item) {
				$pagarBoleto['itemId' . $contador] = $item['id'];
				$pagarBoleto['itemDescription' . $contador] = ($item['tamanho'] ? $item['tamanho'] : '') . ($item['tipo'] ? $item['tipo'] : '') . '|| ' . remove_acentos($item['nome']);
				$pagarBoleto['itemAmount' . $contador] = number_format($item['valor'], 2, '.', '');
				$pagarBoleto['itemQuantity' . $contador] = $item['qty'];
				$contador++;


			}

			$pagarBoleto['notificationURL'] = base_url("") . "pagar/retornoPagseguro";

			if ($config->ambiente == 1) {
				$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions';
			} else {
				$url = 'https://ws.pagseguro.uol.com.br/v2/transactions';
			}

			//echo '<pre>'; var_dump($pagarBoleto);echo '</pre>';
			//exit;

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);

			curl_setopt($ch, CURLOPT_POST, count($pagarBoleto));
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($pagarBoleto));

			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1");

			if ($config->ambiente == 1) {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			} else {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

			}
			$result = curl_exec($ch);

			if ($result == 'Internal Server Error') {
				if (!$this->input->post('checkoutLogado')) {
					$this->pagarModel->desregistrar($id_cliente);
				}
				$this->ion_auth->logout();
				$retorno = [
					'erro' => '53150',
					'msg' => 'Erro do PagSeguro. Tente novamente mais tarde ou selecione outra forma de pagamento!'
				];
				echo json_encode($retorno);
				exit;
			}
			curl_close($ch);

			$xml = simplexml_load_string($result);
			$json = json_encode($xml);
			$std = json_decode($json);

			/*if(isset($std->error[0]->code)){

							$retorno = [
								'erro' => $std->error->code,
								'msg' => $std->error->message
							];
						}*/

			//Erro da API
			if (isset($std->error->code)) {
				if (!$this->input->post('checkoutLogado')) {
					$this->ion_auth->logout();
					$this->pagarModel->desregistrar($id_cliente);
				}
				//$this->ion_auth->logout();

				erroPagseguro($std->error->code);

			}


			if (isset($std->code)) {//transação criada
				if ($freteComprador[1] == '04510') {
					$formaEnvio = 1;
				} else
					if ($freteComprador[1] == '04510') {
						$formaEnvio = 2;
					} else {
						$formaEnvio = 3;
					}
				/**Grava pedido**/
				$pedido = [


					'id_cliente' => $id_cliente,
					'forma_envio' => $formaEnvio,
					'total_produto' => $this->cart->total(),
					'total_frete' => $freteComprador[0],
					'total_pedido' => ($freteComprador[0] + $this->cart->total()),
					'id_status' => 1,
					'data_cadastro' => dataDiaDb(),
					'ref' => $ref_pedido
				];
				$this->pagarModel->doInsertPedido($pedido);
				$id_pedido = $this->session->userdata('last_id');

				//produtos do pedido

				foreach ($carrinho as $item) {
					$produto = [
						'id_pedido' => $id_pedido,
						'rowid' => $item['rowid'],
						'id_produto' => $item['id'],
						'qtd' => $item['qty'],
						'tamanho' => $item['tamanho'],
						'tipo' => $item['tipo'],

						'valor_unit' => number_format($item['valor'], 2, '.', ''),
						'valor_total' => number_format($item['subtotal'], 2, '.', '')
					];

					$this->pagarModel->doInsertPedidoProdutos($produto);
				}

				/**Gravar a transação**/
				$transacao = [
					'id_pedido' => $id_pedido,
					'id_cliente' => $id_cliente,
					'cod_transacao' => $std->code,
					'referencia' => $std->reference,

					'data' => dataDiaDb(),
					'tipo' => 1, //1: BOLETO, 2: CARTÃO, 3: TRANSFERÊNCIA
					'status' => $std->status,//Status do pedido
					't_parcela' => 1,
					'v_parcela' => $std->grossAmount,
					'url_boleto' => $std->paymentLink
				];
				$this->pagarModel->doInsertPedidoTransacao($transacao);

				$retorno = [
					"erro" => 0,
					"msg" => "Pedido realizado com sucesso!",
					'status' => "Aguardando Pagamento",
					'url_boleto' => $std->paymentLink,
					'numero_pedido' => $ref_pedido,
					'cod' => $std->code
				];

				/*//teste:
				$_SESSION['status'] = "Aguardando Pagamento";
				$_SESSION['url_boleto'] = $std->paymentLink;
				$_SESSION['numero_pedido'] = $ref_pedido;
				$_SESSION['cod'] = $std->code;
				$_SESSION['total_frete'] = $freteComprador[0];
				$_SESSION['total_pedido'] = $freteComprador[0] + $this->carrinhocompras->totalCarrinho();
				$_SESSION['tamanho_carrinho'] = $this->carrinhocompras->totalItem();
*/
				foreach ($carrinho as $item) {
					if($item['tamanho']){
						$tipoTamanho = $item['tamanho'];
					}else
						if($item['tipo']){
							$tipoTamanho = $item['tipo'];
						}else{
							$tipoTamanho = null;
						}
					$this->pagarModel->diminuirEstoque((int)$item['id'], (int)$item['qty'], $tipoTamanho);
				}
				setMSG('msgSucesso', 'Pedido realizado com sucesso!', 'sucesso');


				$this->cart->destroy();
			}


			//echo json_encode($json);


		} else {
			$retorno = [
				'erro' => 10,
				'msg' => validation_errors()
			];

		}

		echo json_encode($retorno);
		exit;
	}

	public function pedidosRealizadosBoleto()
	{
		$data['carrinho'] = $this->carrinhocompras->listarProdutos();
		$data['total'] = $this->carrinhocompras->totalCarrinho();

		//$data['pagseguro'] = 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';

		$this->view("viewsStore/pedidosRealizadosBoleto", $data);
	}


	public function pg_transferencia()
	{
		/**OPÇÃO COM USUÁRIO E SENHA**/
		/**Criar opção sem cadastro: checkout cadastrar? -> mostrar opção de inserir senha**/
		$retorno = false;
		//var_dump($this->input->post());
		$this->form_validation->set_rules('hash', 'Erro do PagSeguro - Tente novamente!', "required");
		$this->form_validation->set_rules('bairro', 'Bairro', "required", ['required' => 'Bairro é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('endereco', 'Endereço', "required", ['required' => 'Endereço é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('numero', 'Número de endereço', "required", ['required' => 'Número do endereço é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('cidade', 'Cidade', "required", ['required' => 'Cidade é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('estado', 'Estado', "required", ['required' => 'Estado é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('telefone', 'Telefone', "required", ['required' => 'Telefone é um campo obrigatório! Digite o CEP!']);//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);


		$this->form_validation->set_rules('username', 'Nome completo', "required");
		$this->form_validation->set_rules('cpf', 'CPF', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		$this->form_validation->set_rules('termosDebito', 'Termos e Condições', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		if ($this->input->post("temCorreios") == '1') {
			$this->form_validation->set_rules('frete_checkout', 'Opção de frete', "required");//|is_unique[users.cpf]", ['is_unique' => 'Este CPF já foi cadastrado na loja! Faça login.']);
		}
		if (validaCPF($this->input->post('cpf')) == false) {
			$retorno = [
				'erro' => '-2',
				'msg' => 'Digite um CPF válido!'
			];
			echo json_encode($retorno);
			exit;
		}
		if ($this->input->post('checkoutLogado')) {
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");//is_unique: verifica se é um email único
			$this->form_validation->set_rules('password', 'Senha', "required|min_length[8]");
		} else {
			$this->form_validation->set_rules('email', 'Email', "required|valid_email|is_unique[users.email]", ['is_unique' => 'Este Email já foi cadastrado na loja! Faça login.']);//is_unique: verifica se é um email único
			$this->form_validation->set_rules('password', 'Senha', "required|min_length[8]");
		}
		$this->form_validation->set_rules('cep', 'CEP', "required|min_length[8]");
		if ($this->form_validation->run()) {//Grava e envia ao Pagseguro

			$cliente = [
				'cpf' => $this->input->post('cpf'),
				'cep' => $this->input->post('cep'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'estado' => $this->input->post('estado'),
				'complemento' => $this->input->post('complemento'),
				'telefone' => $this->input->post('telefone')
			];

			//Verifica se foi passado o id do cliente.(tem cadastro)
			if ($this->input->post('id_cliente')) {
				//Cliente já cadastrado. Pegamos dados no DB
				$id_cliente = $this->input->post('id_cliente');
				//$query -> $this->pagarModel->getClienteId($this->input->post('id_cliente'));
				//$query = $this->pagarModel->getClienteId($id_cliente);
				//$query = $this->pagarModel->getClienteId($id_cliente);//????????????


				$query = $this->ion_auth->user()->row();
				$id_cliente = $query->id;
			} else {
				//Novo cadastro de cliente
				//$id_cliente = $this->session->userdata('user_id');//$this->session->userdata('last_id');

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional_data = [
					//'id_cliente' => $id_cliente,
					'cpf' => $this->input->post('cpf'),
					'cep' => $this->input->post('cep'),
					'endereco' => $this->input->post('endereco'),
					'numero' => $this->input->post('numero'),
					'bairro' => $this->input->post('bairro'),
					'cidade' => $this->input->post('cidade'),
					'estado' => $this->input->post('estado'),
					'complemento' => $this->input->post('complemento'),
					'telefone' => $this->input->post('telefone'),
					//'data_cadastro' => dataDiaDb()
				];
				$group = ['3'];
				if (!$this->input->post('checkoutLogado')) {
					$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				}
				//$query->
				$this->ion_auth->login($email, $password);
				$query = $this->ion_auth->user()->row();
				$this->pagarModel->updateCliente($query->id, $additional_data);

				$id_cliente = $query->id;
			}


			//$query = $this->pagarModel->getClienteId($id_cliente);

			if (!$query) {
				$retorno = [
					'erro' => 40,
					'msg' => 'Erro, cliente não localizado!'
				];
				echo json_encode($retorno);
				exit;
			}

			//$id_cliente = $query->id;
			$nomeComprador = ($this->input->post('username') ? $this->input->post('username') : $query->username);
			$cpfComprador = ($this->input->post('cpf') ? $this->input->post('cpf') : $query->cpf);
			$emailComprador = $query->email;
			$telefoneComprador = explode(' ', ($this->input->post('telefone') ? $this->input->post('telefone') : $query->telefone));// Padrão: (99) 99999-9999; Pagseguro: separar (99) e o numero

			//Dados de entrega
			$cepComprador = ($this->input->post('cep') ? $this->input->post('cep') : $query->cep);
			$enderecoComprador = ($this->input->post('endereco') ? $this->input->post('endereco') : $query->endereco);
			$bairroComprador = ($this->input->post('bairro') ? $this->input->post('bairro') : $query->bairro);
			$cidadeComprador = ($this->input->post('cidade') ? $this->input->post('cidade') : $query->cidade);
			$estadoComprador = ($this->input->post('estado') ? $this->input->post('estado') : $query->estado);
			$numeroComprador = ($this->input->post('numero') ? $this->input->post('numero') : $query->numero);


			//Dados de pagamento e acesso

			$config = $this->pagarModel->getConfig();
			$pagarDebito['email'] = $config->email;
			$pagarDebito['token'] = $config->token;
			$pagarDebito['paymentMode'] = 'default';
			$pagarDebito['paymentMethod'] = 'eft';
			$pagarDebito['bankName'] = $this->input->post('nome_banco');
			$pagarDebito['receiverEmail'] = $config->email;
			$pagarDebito['currency'] = 'BRL';
			//$pagarDebito['extraAmount'] = $config->somar_frete;

			$ultimoPedido = $this->pagarModel->idUltimoPedido();
			$ref_pedido = date('d-m-Y|h:s:i|') . (string)$ultimoPedido->id;//random_string('numeric', 8);
			$pagarDebito['reference'] = 'Ref. [# ' . $ref_pedido . ' ]';

			//Dados do comprador

			$pagarDebito['senderName'] = remove_acentos($nomeComprador);
			$pagarDebito['senderCPF'] = limpaString($cpfComprador);
			$pagarDebito['senderAreaCode'] = limpaString($telefoneComprador[0]);
			$pagarDebito['senderPhone'] = limpaString($telefoneComprador[1]);
			$pagarDebito['senderEmail'] = ($config->ambiente == '1' ? 'c77194552117609548046@sandbox.pagseguro.com.br' : $emailComprador);

			$pagarDebito['shippingAddressStreet'] = remove_acentos($enderecoComprador . '. ' . $this->input->post('complemento'));
			$pagarDebito['shippingAddressNumber'] = ($numeroComprador ? limpaString($numeroComprador) : '000');
			$pagarDebito['shippingAddressDistrict'] = remove_acentos($bairroComprador);
			$pagarDebito['shippingAddressPostalCode'] = limpaString($cepComprador);
			$pagarDebito['shippingAddressCity'] = remove_acentos($cidadeComprador);
			$pagarDebito['shippingAddressState'] = $estadoComprador;
			$pagarDebito['shippingAddressCountry'] = 'BRA';


			$freteComprador = ($this->input->post('frete_checkout') ? explode('|', $this->input->post('frete_checkout')) : '');//passado via js
			if ($freteComprador == '') {
				$freteComprador[0] = 0.00;
				$freteComprador[1] = 0;

			}
			if ($this->input->post('formaEnvio') == '1') {
				$pagarDebito['shippingType'] = (($freteComprador[1] == '04510') ? 1 : 2);;
				$pagarDebito['shippingCost'] = (double)$freteComprador[0];
			}

			$pagarDebito['senderHash'] = $this->input->post('hash');

			//Itens do carrinho
			//$this->load->library('carrinhoCompras');
			$carrinho = $this->cart->contents();
			$contador = 1;
			foreach ($carrinho as $item) {
				$pagarDebito['itemId' . $contador] = $item['id'];
				$pagarDebito['itemDescription' . $contador] = ($item['tamanho'] ? $item['tamanho'] : '') . ($item['tipo'] ? $item['tipo'] : '') . '|| ' . remove_acentos($item['nome']);
				$pagarDebito['itemAmount' . $contador] = number_format($item['valor'], 2, '.', '');
				$pagarDebito['itemQuantity' . $contador] = $item['qty'];
				$contador++;
			}

			$pagarDebito['notificationURL'] = base_url("") . "pagar/retornoPagseguro";


			if ($config->ambiente == 1) {
				$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions';
			} else {
				$url = 'https://ws.pagseguro.uol.com.br/v2/transactions';
			}


			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);

			curl_setopt($ch, CURLOPT_POST, count($pagarDebito));
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($pagarDebito));

			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1");

			if ($config->ambiente == 1) {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			} else {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

			}

			$result = curl_exec($ch);

			if ($result == 'Internal Server Error') {
				if (!$this->input->post('checkoutLogado')) {
					$this->pagarModel->desregistrar($id_cliente);
				}
				$this->ion_auth->logout();
				$retorno = [
					'erro' => '53150',
					'msg' => 'Erro do PagSeguro. Tente novamente mais tarde ou selecione outra forma de pagamento!'
				];
				echo json_encode($retorno);
				exit;
			}

			curl_close($ch);

			$xml = simplexml_load_string($result);
			$json = json_encode($xml);
			$std = json_decode($json);


			/*if(isset($std->error[0]->code)){

				$retorno = [
					'erro' => $std->error->code,
					'msg' => $std->error->message
				];
			}*/

			//Erro da API
			if (isset($std->error->code)) {
				if (!$this->input->post('checkoutLogado')) {
					$this->ion_auth->logout();
					$this->pagarModel->desregistrar($id_cliente);
				}
				//$this->ion_auth->logout();
				erroPagseguro($std->error->code);

			}


			if (isset($std->code)) {//transação criada

				if ($freteComprador[1] == '04510') {
					$formaEnvio = 1;
				} else
					if ($freteComprador[1] == '04014') {
						$formaEnvio = 2;
					} else {
						$formaEnvio = 3;
					}
				/**Grava pedido**/
				$pedido = [


					'id_cliente' => $id_cliente,
					'forma_envio' => $formaEnvio,
					'total_produto' => $this->cart->total(),
					'total_frete' => $freteComprador[0],
					'total_pedido' => ($freteComprador[0] + $this->cart->total()),
					'id_status' => 1,
					'data_cadastro' => dataDiaDb(),
					'ref' => $ref_pedido
				];
				$this->pagarModel->doInsertPedido($pedido);
				$id_pedido = $this->session->userdata('last_id');

				//produtos do pedido

				foreach ($carrinho as $item) {
					$produto = [
						'id_pedido' => $id_pedido,
						'rowid' => $item['rowid'],
						'id_produto' => $item['id'],
						'qtd' => $item['qty'],
						'tamanho' => $item['tamanho'],
						'tipo' => $item['tipo'],

						'valor_unit' => number_format($item['valor'], 2, '.', ''),
						'valor_total' => number_format($item['subtotal'], 2, '.', '')
					];

					$this->pagarModel->doInsertPedidoProdutos($produto);
				}
				/**Gravar a transação**/
				$transacao = [
					'id_pedido' => $id_pedido,
					'id_cliente' => $id_cliente,
					'cod_transacao' => $std->code,
					'referencia' => $std->reference,

					'data' => dataDiaDb(),
					'tipo' => 3, //1: BOLETO, 2: CARTÃO, 3: TRANSFERÊNCIA
					'status' => $std->status,//Status do pedido
					't_parcela' => 1,
					'v_parcela' => $std->grossAmount,
					'url_boleto' => $std->paymentLink,
					'nome_banco' => $this->input->post('nome_banco')
				];
				$this->pagarModel->doInsertPedidoTransacao($transacao);

				$retorno = [
					"erro" => 0,
					"msg" => "Pedido realizado com sucesso!",
					'status' => "Aguardando Pagamento",
					'url_banco' => $std->paymentLink,
					'numero_pedido' => $ref_pedido,
					'cod' => $std->code
				];
				/*
				//teste:
				$_SESSION['status'] = "Aguardando Pagamento";
				$_SESSION['numero_pedido'] = $ref_pedido;
				$_SESSION['cod'] = $std->code;
				$_SESSION['url_banco'] = $std->paymentLink;
				$_SESSION['total_frete'] = $freteComprador[0];
				$_SESSION['total_pedido'] = $freteComprador[0] + $this->carrinhocompras->totalCarrinho();
				$_SESSION['tamanho_carrinho'] = $this->carrinhocompras->totalItem();

*/
				foreach ($carrinho as $item) {
					if($item['tamanho']){
						$tipoTamanho = $item['tamanho'];
					}else
						if($item['tipo']){
							$tipoTamanho = $item['tipo'];
						}else{
							$tipoTamanho = null;
						}
					$this->pagarModel->diminuirEstoque((int)$item['id'], (int)$item['qty'], $tipoTamanho);
				}


				setMSG('msgSucesso', 'Pedido realizado com sucesso!', 'sucesso');
				$this->cart->destroy();

			}


			//echo json_encode($json);


		} else {
			$retorno = [
				'erro' => 10,
				'msg' => validation_errors()
			];

		}

		echo json_encode($retorno);
		exit;
	}

	public function pedidosRealizadosTransferencia()
	{
		$data['carrinho'] = $this->carrinhocompras->listarProdutos();
		$data['total'] = $this->carrinhocompras->totalCarrinho();

		//$data['pagseguro'] = 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';

		$this->view("viewsStore/pedidosRealizadosTransferencia", $data);
	}

	public function retornoPagseguro()
	{

		if(isset($_POST['notificationCode'])) {
			$code = $_POST['notificationCode'];
			//$code = '6689D0-F47CB87CB816-A334C99F8502-DF16DA';

			$this->load->model('configModel');
			$pagseguro = $this->configModel->getConfigPagseguro();
			$data['token'] = $pagseguro->token;
			$data['email'] = $pagseguro->email;

			$url = "https://ws.pagseguro.uol.com.br/v2/transactions/notifications/";
			$url .= $code . "?email=" . $data['email'] . "&token=" . $data['token'];

			// faz conexão
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL, $url);
			$xml = curl_exec($ch);
			curl_close($ch);

			$xml = simplexml_load_string($xml);
			$reference = $xml->reference;
			$status = $xml->status;

			$this->pagarModel->updateStatusPedido($reference, $status);

			if((int)$status == 6 || (int)$status == 7 || (int)$status == 8) {
				foreach ($xml->items->item as $produto) {
					$tipoTamanho = strstr($produto->description, '|| ', true);
					$this->pagarModel->retornarEstoque($produto->id, (int)$produto->quantity, $tipoTamanho);
				}
			}
			return true;
		}else{
			return false;
		}

	}



	public function pedidosRealizados()
	{
		/*$code = '6689D0-F47CB87CB816-A334C99F8502-DF16DA';

		$this->load->model('configModel');
		$pagseguro = $this->configModel->getConfigPagseguro();
		$data['token'] = $pagseguro->token;
		$data['email'] = $pagseguro->email;

		$url = "https://ws.pagseguro.uol.com.br/v2/transactions/notifications/";
		$url .= $code . "?email=" . $data['email'] . "&token=" . $data['token'];

		// faz conexão
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		$xml = curl_exec($ch);
		curl_close($ch);

		$xml = simplexml_load_string($xml);
		var_dump($xml);

		foreach ($xml->items->item as $produto){
			var_dump(strstr($produto->description, '|| ', true));
		}
		*/
		$data['json'] = null;

		if(!$this->ion_auth->logged_in()){
			redirect('');
		}


		$usuario = $this->ion_auth->user()->row();
		$data['pedidosProdutos'] = $this->pagarModel->getPedidosCliente($usuario->id);

		$data['titulo'] = 'Área do Cliente';
		$data['usuario'] = $this->ion_auth->user()->row();
	//	echo '<pre>'; var_dump($data['pedidosProdutos']);
		//exit;
		$i = 0;
		foreach ($this->pagarModel->getPedidosCliente($usuario->id) as $pedido){
			$data['json'][$i] = null;
			if($pedido[0]->cod_rastreio){
				$obj = $pedido[0]->cod_rastreio;
				$request['obj'] = $obj;
				if($obj){

					$post = array('Objetos' => $obj);
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://www2.correios.com.br/sistemas/rastreamento/resultado_semcontent.cfm");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post));
					$output = curl_exec($ch);
					curl_close($ch);


					$out = explode("table class=\"listEvent sro\">",$output);

					if(isset($out[1])){

						$output = explode("<table class=\"listEvent sro\">",$output);
						$output = explode("</table>",$output[1]);
						$output = str_replace("</td>","",$output[0]);
						$output = str_replace("</tr>","",$output);
						$output = str_replace("<strong>","",$output);
						$output = str_replace("</strong>","",$output);
						$output = str_replace("<tbody>","",$output);
						$output = str_replace("</tbody>","",$output);
						$output = str_replace("<label style=\"text-transform:capitalize;\">","",$output);
						$output = str_replace("</label>","",$output);
						$output = str_replace("&nbsp;","",$output);
						$output = str_replace("<td class=\"sroDtEvent\" valign=\"top\">","",$output);
						$output = explode("<tr>",$output);


						$novo_array = array();

						foreach($output as $texto){

							$info   = explode("<td class=\"sroLbEvent\">",$texto);
							$dados  = explode("<br />",$info[0]);

							$dia   = trim($dados[0]);
							$hora  = trim(@$dados[1]);
							$local = trim(@$dados[2]);

							$dados = explode("<br />",@$info[1]);
							$acao  = trim($dados[0]);

							$exAction   = explode($acao."<br />",@$info[1]);
							$acrionMsg  = strip_tags(trim(preg_replace('/\s\s+/', ' ',$exAction[0])));

							if(""!=$dia){

								$exploDate = explode('/',$dia);
								$dia1 = $exploDate[2].'-'.$exploDate[1].'-'.$exploDate[0];
								$dia2 = date('Y-m-d');

								$diferenca = strtotime($dia2) - strtotime($dia1);
								$dias = floor($diferenca / (60 * 60 * 24));

								$change = utf8_encode("há {$dias} dias");


								$novo_array[] = array("date"=>$dia,"hour"=>$hora,"location"=>$local,"action"=>utf8_encode($acao),"message"=>utf8_encode($acrionMsg),"change"=>utf8_decode($change));
							}
						}

						$jsonObcject = (object)$novo_array;
						//header('Content-type: application/json');
						//$json = json_encode($jsonObcject);
						$data['json'][$i] = $jsonObcject;
						//$this->view('viewsStore/rastreio', $data);

						//echo $json;


					}

				}
			}
			$i++;
		}

		$this->view("viewsStore/pedidosRealizados", $data);

	}

	/**
	 * array(2) {
		[0]=>
			array(2) {
			[0]=>
				object(stdClass)#51 (35) {
				["id"]=>
				string(3) "408"
				["idpedido"]=>
				string(2) "81"
				["idclientepedidos"]=>
				string(3) "408"
				["total_produto"]=>
				string(6) "207.00"
				["total_frete"]=>
				string(5) "89.55"
				["total_pedido"]=>
				string(6) "296.55"
				["id_status"]=>
				string(1) "1"
				["data_cadastro"]=>
				string(10) "2020-05-22"
				["forma_envio"]=>
				NULL
				["cod_rastreio"]=>
				NULL
				["ref"]=>
				string(19) "22-05-2020|08:47:47"
				["idpedidosprodutos"]=>
				string(2) "95"
				["idpedidopedidosprodutos"]=>
				string(2) "38"
				["qtd"]=>
				string(1) "1"
				["valor_unit"]=>
				string(5) "69.00"
				["valor_total"]=>
				string(5) "69.00"
				["tamanho"]=>
				string(0) ""
				["idproduto"]=>
				string(2) "38"
				["nome_produto"]=>
				string(56) "Camiseta Infantil Nike Trophy Masculina - Preto e Branco"
				["cod_produto"]=>
				string(15) "HZM-2907-026-10"
				["valor"]=>
				string(5) "69.00"
				["meta_link"]=>
				string(54) "camiseta-infantil-nike-trophy-masculina-preto-e-branco"
				["idtransacao"]=>
				string(2) "71"
				["idpedidotransacao"]=>
				string(2) "80"
				["idclientetransacao"]=>
				string(3) "408"
				["cod_transacao"]=>
				string(36) "307690FB-9DDE-4F52-AAD7-99A1E7D85D0E"
				["tipo"]=>
				string(1) "1"
				["t_parcela"]=>
				string(1) "1"
				["v_parcela"]=>
				string(6) "196.83"
				["url_boleto"]=>
				string(148) "https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=8864918d467773e7f869488dabbfa85f0b24c069278f4fc861df58a9794721d5dfc577b5479b416f"
				["nome_banco"]=>
				NULL
				["status"]=>
				string(1) "1"
				["id_foto"]=>
				string(3) "282"
				["idprodutofoto"]=>
				string(2) "38"
				["foto"]=>
				string(36) "b1560d0ee99a649135130d1ca3f7a23d.jpg"
			}
			[1]=>
				object(stdClass)#52 (35) {
				["id"]=>
				string(3) "408"
				["idpedido"]=>
				string(2) "81"
				["idclientepedidos"]=>
				string(3) "408"
				["total_produto"]=>
				string(6) "207.00"
				["total_frete"]=>
				string(5) "89.55"
				["total_pedido"]=>
				string(6) "296.55"
				["id_status"]=>
				string(1) "1"
				["data_cadastro"]=>
				string(10) "2020-05-22"
				["forma_envio"]=>
				NULL
				["cod_rastreio"]=>
				NULL
				["ref"]=>
				string(19) "22-05-2020|08:47:47"
				["idpedidosprodutos"]=>
				string(2) "94"
				["idpedidopedidosprodutos"]=>
				string(2) "36"
				["qtd"]=>
				string(1) "2"
				["valor_unit"]=>
				string(5) "69.00"
				["valor_total"]=>
				string(6) "138.00"
				["tamanho"]=>
				string(0) ""
				["idproduto"]=>
				string(2) "36"
				["nome_produto"]=>
				string(54) "Camiseta Nike Legend 2.0 Ss Masculina - Branco e Preto"
				["cod_produto"]=>
				string(15) "D12-2415-440-02"
				["valor"]=>
				string(5) "69.00"
				["meta_link"]=>
				string(51) "camiseta-nike-legend-20-ss-masculina-branco-e-preto"
				["idtransacao"]=>
				string(2) "71"
				["idpedidotransacao"]=>
				string(2) "80"
				["idclientetransacao"]=>
				string(3) "408"
				["cod_transacao"]=>
				string(36) "307690FB-9DDE-4F52-AAD7-99A1E7D85D0E"
				["tipo"]=>
				string(1) "1"
				["t_parcela"]=>
				string(1) "1"
				["v_parcela"]=>
				string(6) "196.83"
				["url_boleto"]=>
				string(148) "https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=8864918d467773e7f869488dabbfa85f0b24c069278f4fc861df58a9794721d5dfc577b5479b416f"
				["nome_banco"]=>
				NULL
				["status"]=>
				string(1) "1"
				["id_foto"]=>
				string(3) "278"
				["idprodutofoto"]=>
				string(2) "36"
				["foto"]=>
				string(36) "ebe54572093cebd3756eff378253d654.jpg"
				}
			}
		[1]=>
			array(1) {
			[0]=>
				object(stdClass)#53 (35) {
				["id"]=>
				string(3) "408"
				["idpedido"]=>
				string(2) "80"
				["idclientepedidos"]=>
				string(3) "408"
				["total_produto"]=>
				string(6) "159.98"
				["total_frete"]=>
				string(5) "36.85"
				["total_pedido"]=>
				string(6) "196.83"
				["id_status"]=>
				string(1) "1"
				["data_cadastro"]=>
				string(10) "2020-05-22"
				["forma_envio"]=>
				NULL
				["cod_rastreio"]=>
				NULL
				["ref"]=>
				string(19) "22-05-2020|08:05:45"
				["idpedidosprodutos"]=>
				string(2) "93"
				["idpedidopedidosprodutos"]=>
				string(2) "31"
				["qtd"]=>
				string(1) "2"
				["valor_unit"]=>
				string(5) "79.99"
				["valor_total"]=>
				string(6) "159.98"
				["tamanho"]=>
				string(0) ""
				["idproduto"]=>
				string(2) "31"
				["nome_produto"]=>
				string(45) "Short Nike Monster Mesh 4.0 Masculino - Cinza"
				["cod_produto"]=>
				string(15) "HZM-0679-010-02"
				["valor"]=>
				string(5) "79.99"
				["meta_link"]=>
				string(42) "short-nike-monster-mesh-40-masculino-cinza"
				["idtransacao"]=>
				string(2) "71"
				["idpedidotransacao"]=>
				string(2) "80"
				["idclientetransacao"]=>
				string(3) "408"
				["cod_transacao"]=>
				string(36) "307690FB-9DDE-4F52-AAD7-99A1E7D85D0E"
				["tipo"]=>
				string(1) "1"
				["t_parcela"]=>
				string(1) "1"
				["v_parcela"]=>
				string(6) "196.83"
				["url_boleto"]=>
				string(148) "https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=8864918d467773e7f869488dabbfa85f0b24c069278f4fc861df58a9794721d5dfc577b5479b416f"
				["nome_banco"]=>
				NULL
				["status"]=>
				string(1) "1"
				["id_foto"]=>
				string(3) "267"
				["idprodutofoto"]=>
				string(2) "31"
				["foto"]=>
				string(36) "2caef1c2a8bbb4c3b4cae204889a18f3.jpg"
				}
		}
	}
	 */

	public function rastreioCorreios($obj = null)
	{

		//if(isset($_GET) || isset($_POST)){


			//$request = isset($_GET) ? $_GET : $_POST;
			//$obj 	   = isset($request['obj']) ? $request['obj'] : false;
			$request['obj'] = $obj;
			if($obj){

				$post = array('Objetos' => $obj);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://www2.correios.com.br/sistemas/rastreamento/resultado_semcontent.cfm");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post));
				$output = curl_exec($ch);
				curl_close($ch);


				$out = explode("table class=\"listEvent sro\">",$output);

				if(isset($out[1])){

					$output = explode("<table class=\"listEvent sro\">",$output);
					$output = explode("</table>",$output[1]);
					$output = str_replace("</td>","",$output[0]);
					$output = str_replace("</tr>","",$output);
					$output = str_replace("<strong>","",$output);
					$output = str_replace("</strong>","",$output);
					$output = str_replace("<tbody>","",$output);
					$output = str_replace("</tbody>","",$output);
					$output = str_replace("<label style=\"text-transform:capitalize;\">","",$output);
					$output = str_replace("</label>","",$output);
					$output = str_replace("&nbsp;","",$output);
					$output = str_replace("<td class=\"sroDtEvent\" valign=\"top\">","",$output);
					$output = explode("<tr>",$output);


					$novo_array = array();

					foreach($output as $texto){

						$info   = explode("<td class=\"sroLbEvent\">",$texto);
						$dados  = explode("<br />",$info[0]);

						$dia   = trim($dados[0]);
						$hora  = trim(@$dados[1]);
						$local = trim(@$dados[2]);

						$dados = explode("<br />",@$info[1]);
						$acao  = trim($dados[0]);

						$exAction   = explode($acao."<br />",@$info[1]);
						$acrionMsg  = strip_tags(trim(preg_replace('/\s\s+/', ' ',$exAction[0])));

						if(""!=$dia){

							$exploDate = explode('/',$dia);
							$dia1 = $exploDate[2].'-'.$exploDate[1].'-'.$exploDate[0];
							$dia2 = date('Y-m-d');

							$diferenca = strtotime($dia2) - strtotime($dia1);
							$dias = floor($diferenca / (60 * 60 * 24));

							$change = utf8_encode("há {$dias} dias");


							$novo_array[] = array("date"=>$dia,"hour"=>$hora,"location"=>$local,"action"=>utf8_encode($acao),"message"=>utf8_encode($acrionMsg),"change"=>utf8_decode($change));
						}
					}

					$jsonObcject = (object)$novo_array;
					//header('Content-type: application/json');
					//$json = json_encode($jsonObcject);
					$data['json'] = $jsonObcject;
					$this->view('viewsStore/rastreio', $data);

					//echo $json;


				}else{

					$jsonObcject = new stdClass();
					$jsonObcject->erro = true;
					$jsonObcject->msg = "Objeto não encontrado";
					//header('Content-type: application/json');
					//$json = json_encode($jsonObcject);
					//echo $json;
					$data['json'] = $jsonObcject;
					$this->view('viewsStore/rastreio', $data);

				}

			}else{
				$jsonObcject = new stdClass();
				$jsonObcject->erro = true;
				$jsonObcject->msg = "Parametro vazio";
				//header('Content-type: application/json');
				//$json = json_encode($jsonObcject);
				//echo $json;
				$data['json'] = $jsonObcject;
				$this->view('viewsStore/rastreio', $data);
			}
		//}
		//$data['titulo'] = 'açlsdfkj';
		//$data['obj'] = $obj;
		//$this->view('viewsStore/rastreio', $data);
	}

}
