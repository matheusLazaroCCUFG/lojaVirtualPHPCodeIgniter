<?php


class Checkout extends \App\Core\CoreController {

	public function __construct()
	{
		parent::__construct();
		if($this->ion_auth->is_admin()){
			redirect('dashboard');
		}

		$this->load->model('checkoutModel');
		$this->load->model('clientesModel');
		$this->load->model('carrinhoModel');
		$this->load->helpers('helper_helper');
		$this->load->library('carrinhocompras');
		$this->load->library('cart');
		$this->load->model('configModel');

		if($this->configModel->getConfig()->possuiValorMinimo && $this->cart->total() < (float)$this->configModel->getConfig()->valorMinimo){
			setMSG("valorMinimo", "O valor mínimo para compras na Loja é: R$ " . str_replace(".", ",", $this->configModel->getConfig()->valorMinimo), "erro");
			redirect('carrinho');
		}
	}

	public function index()
	{
			if(!$this->ion_auth->logged_in()){
				if($this->cart->total_items() == 0){
					setMSG('carrinhoVazio', 'O carrinho está vazio!', 'erro');
					redirect('carrinho');
				}

				$data['carrinho'] = $this->cart->contents();
				$data['total'] = $this->cart->total();

				//$data['pagseguro'] = 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';
				$this->load->model('pagarModel');
				$data['pagseguro'] = $this->pagarModel->getAmbiente();

				$configPagseguro = $this->configModel->getConfigPagseguro();
				$data['cartao'] = ($configPagseguro->cartao == 1 ? true : false);
				$data['boleto'] = ($configPagseguro->boleto == 1 ? true : false);
				$data['transferencia'] = ($configPagseguro->transferencia == 1 ? true : false);
				$data['usuario'] = null;
				$data['semJuros'] = $configPagseguro->parcelas_sJuros;

				$this->view("viewsStore/checkout", $data);
			}else{
				if($this->cart->total_items() == 0){
					setMSG('carrinhoVazio', 'O carrinho está vazio!', 'erro');
					redirect('carrinho');
				}
				$data['total'] = $this->cart->total();
				$this->load->model('pagarModel');
				$data['pagseguro'] = $this->pagarModel->getAmbiente();
				$data['titulo'] = 'Cliente';

				//$this->ion_auth->logged_in() = false;
				setMSG('msgCadastro', "Sucesso ao entrar como usuário cliente", "sucesso");
				$data['registrarAdm'] = false;
				//$this->load->view('viewsStore/user', $data);//

				$data['usuario'] = $this->ion_auth->user()->row();
				$id = $data['usuario']->id;
				$dados = $this->clientesModel->getClienteId($id);
				$data['dados'] = $dados;
				$data['carrinho'] = $this->cart->contents();
				$configPagseguro = $this->configModel->getConfigPagseguro();
				$data['cartao'] = $configPagseguro->cartao;
				$data['boleto'] = $configPagseguro->boleto;
				$data['transferencia'] = $configPagseguro->transferencia;
				$data['semJuros'] = $configPagseguro->parcelas_sJuros;

				$this->view('viewsStore/checkoutLogado', $data);//
			}
	}

	public function combinarEntrega()
	{
		$config = $this->configModel->getConfig();
		if($config->combinarEntrega == 1) {
			if (!$this->ion_auth->logged_in()) {
				if ($this->cart->total_items() == 0) {
					setMSG('carrinhoVazio', 'O carrinho está vazio!', 'erro');
					redirect('carrinho');
				}

				$data['carrinho'] = $this->cart->contents();
				$data['total'] = $this->cart->total();

				//$data['pagseguro'] = 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';
				$this->load->model('pagarModel');
				$data['pagseguro'] = $this->pagarModel->getAmbiente();

				$configPagseguro = $this->configModel->getConfigPagseguro();
				$data['cartao'] = ($configPagseguro->cartao == 1 ? true : false);
				$data['boleto'] = ($configPagseguro->boleto == 1 ? true : false);
				$data['transferencia'] = ($configPagseguro->transferencia == 1 ? true : false);
				$data['usuario'] = null;
				$data['semJuros'] = $configPagseguro->parcelas_sJuros;

				$this->view("viewsStore/checkoutCombinar", $data);
			} else {
				if ($this->cart->total_items() == 0) {
					setMSG('carrinhoVazio', 'O carrinho está vazio!', 'erro');
					redirect('carrinho');
				}
				$data['total'] = $this->cart->total();
				$this->load->model('pagarModel');
				$data['pagseguro'] = $this->pagarModel->getAmbiente();
				$data['titulo'] = 'Cliente';

				//$this->ion_auth->logged_in() = false;
				setMSG('msgCadastro', "Sucesso ao entrar como usuário cliente", "sucesso");
				$data['registrarAdm'] = false;
				//$this->load->view('viewsStore/user', $data);//

				$data['usuario'] = $this->ion_auth->user()->row();
				$id = $data['usuario']->id;
				$dados = $this->clientesModel->getClienteId($id);
				$data['dados'] = $dados;
				$data['carrinho'] = $this->cart->contents();
				$configPagseguro = $this->configModel->getConfigPagseguro();
				$data['cartao'] = $configPagseguro->cartao;
				$data['boleto'] = $configPagseguro->boleto;
				$data['transferencia'] = $configPagseguro->transferencia;
				$data['semJuros'] = $configPagseguro->parcelas_sJuros;

				$this->view('viewsStore/checkoutCombinarLogado', $data);//
			}
		}else{
			redirect("");
		}
	}

	public function login()
	{
		$data['adm'] = false;
		$data['combinar'] = false;
		$this->form_validation->set_rules('Email', 'Email', "required");
		$this->form_validation->set_rules('Password', 'Senha', "required");

		if ($this->form_validation->run() == true) {
			$email = $this->input->post('Email');
			$password = $this->input->post('Password');
			$remember = ($this->input->post('conected') != null ? true : false);
			$this->ion_auth->login($email, $password, $remember);
			$data['registrarAdm'] = false;
			//$data['usuarios'] = $this->ion_auth->users()->result();
			$data['usuario'] = $this->ion_auth->user()->row();

			if($this->ion_auth->is_admin()){
				$this->ion_auth->logout();
				$x = 'entrarAdm';
				setMSG('msgCadastro', "Você inseriu um login de administrador, acesse <a href='$x'>Aqui</a>", 'erro');
				$this->view('viewsStore/loginCheckout', $data);
			}

			if ($this->ion_auth->login($email, $password, $remember)) {
				$data['titulo'] = 'Cliente';
				//$this->ion_auth->logged_in() = false;
				setMSG('msgCadastro', "Sucesso ao entrar como usuário cliente", "sucesso");
				$data['registrarAdm'] = false;
				//$this->load->view('viewsStore/user', $data);//

				//mandar email de confirmação
				//Carregar informações do cliente
				/**
				 * username
				 * cpf
				 * email
				 * bairro
				 * complemento
				 * numero
				 * cidade
				 * estado
				 * telefone
				 * cep
				 */
				$this->load->model('pagarModel');

				$data['pagseguro'] = $this->pagarModel->getAmbiente();
				$data['total'] = $this->cart->total();
				$id = $data['usuario']->id;
				$dados = $this->clientesModel->getClienteId($id);
				$data['dados'] = $dados;
				$data['carrinho'] = $this->cart->contents();
				$configPagseguro = $this->configModel->getConfigPagseguro();
				$data['cartao'] = $configPagseguro->cartao;
				$data['boleto'] = $configPagseguro->boleto;
				$data['transferencia'] = $configPagseguro->transferencia;
				$data['semJuros'] = $configPagseguro->parcelas_sJuros;

				$this->view('viewsStore/checkoutLogado', $data);//


				//redirect('http://localhost/lojaVirtual/usuarios');
			} else {
				//echo "erro ao entrar";
				setMSG('msgCadastro', "Erro ao entrar como usuário administrativo", "erro");
				$this->view('viewsStore/loginCheckout', $data);
				//redirect('http://localhost/lojaVirtual/entrar');
			}

		} else {
			$this->view('viewsStore/loginCheckout', $data);
		}

		//$this->view("viewsStore/loginCheckout");
	}


	public function loginCombinar()
	{
		$data['adm'] = false;
		$data['combinar'] = true;
		$this->form_validation->set_rules('Email', 'Email', "required");
		$this->form_validation->set_rules('Password', 'Senha', "required");

		if ($this->form_validation->run() == true) {
			$email = $this->input->post('Email');
			$password = $this->input->post('Password');
			$remember = ($this->input->post('conected') != null ? true : false);
			$this->ion_auth->login($email, $password, $remember);
			$data['registrarAdm'] = false;
			//$data['usuarios'] = $this->ion_auth->users()->result();
			$data['usuario'] = $this->ion_auth->user()->row();

			if($this->ion_auth->is_admin()){
				$this->ion_auth->logout();
				$x = 'entrarAdm';
				setMSG('msgCadastro', "Você inseriu um login de administrador, acesse <a href='$x'>Aqui</a>", 'erro');
				$this->view('viewsStore/loginCheckout', $data);
			}

			if ($this->ion_auth->login($email, $password, $remember)) {
				$data['titulo'] = 'Cliente';
				//$this->ion_auth->logged_in() = false;
				setMSG('msgCadastro', "Sucesso ao entrar como usuário cliente", "sucesso");
				$data['registrarAdm'] = false;
				//$this->load->view('viewsStore/user', $data);//

				//mandar email de confirmação
				//Carregar informações do cliente
				/**
				 * username
				 * cpf
				 * email
				 * bairro
				 * complemento
				 * numero
				 * cidade
				 * estado
				 * telefone
				 * cep
				 */
				$this->load->model('pagarModel');

				$data['pagseguro'] = $this->pagarModel->getAmbiente();
				$data['total'] = $this->cart->total();
				$id = $data['usuario']->id;
				$dados = $this->clientesModel->getClienteId($id);
				$data['dados'] = $dados;
				$data['carrinho'] = $this->cart->contents();
				$configPagseguro = $this->configModel->getConfigPagseguro();
				$data['cartao'] = $configPagseguro->cartao;
				$data['boleto'] = $configPagseguro->boleto;
				$data['transferencia'] = $configPagseguro->transferencia;
				$data['semJuros'] = $configPagseguro->parcelas_sJuros;
				$this->view('viewsStore/checkoutCombinarLogado', $data);//


				//redirect('http://localhost/lojaVirtual/usuarios');
			} else {
				//echo "erro ao entrar";
				setMSG('msgCadastro', "Erro ao entrar como usuário administrativo", "erro");
				$this->view('viewsStore/loginCheckout', $data);
				//redirect('http://localhost/lojaVirtual/entrar');
			}

		} else {
			$this->view('viewsStore/loginCheckout', $data);
		}

		//$this->view("viewsStore/loginCheckout");
	}

	public function listarDimensao()
	{
		/*$CI =& get_instance();//Não está no controller
		$CI->load->model('carrinhoModel');
*/
		$retorno = [];
		$indice = 0;

		$conteudo = $this->cart->contents();

		foreach ($conteudo as $item) {
			$query = $this->carrinhoModel->getDimensao($item['id']);
			$retorno[$indice]['id'] = $query->id;
			$retorno[$indice]['altura'] = $query->altura;
			$retorno[$indice]['largura'] = $query->largura;
			$retorno[$indice]['comprimento'] = $query->comprimento;
			$retorno[$indice]['dimensao'] = $query->altura + $query->largura + $query->comprimento;

			$indice++;
		}

		return $retorno;

	}

	public function getMaiorProduto()
	{
		$produto = $this->listarDimensao();
		//var_dump($produto);
		$maior = null;
		$item = [];
		foreach ($produto as $indice => $linha){
			if($maior == null){
				$maior = $linha['dimensao'];
				$item = $linha;

			}else{
				if($linha['dimensao'] > $maior){
					$maior = $linha['dimensao'];
					$item = $linha;
				}
			}
		}
		return $item;
	}

	public function totalPeso()
	{
		$produto = $this->cart->contents();
		$total = 0;

		foreach ($produto as $item){
			$total += (int)$item['peso'] * (int)$item['qty'];
		}

		return $total;
	}

	public function calcula_frete()
	{

		$this->form_validation->set_rules('cep', 'CEP', 'trim');
		//$this->form_validation->set_rules('id', 'Produto', 'trim');

		if($this->form_validation->run() == true){
			$cep = $this->input->post('cep');

			//$cep = '74370-613';
			//$id = $this->input->post('id');


			if(!preg_match('/[0-9]{5}-[0-9]{3}/', $cep)){
				$retorno['erro'] = 15;
				$retorno['msg'] = 'CEP inválido, digite outro CEP!';
				echo json_encode($retorno);
				exit;
			}

			//q$produto = $this->ajaxModel->getProduto($id);
			$this->load->model('carrinhoModel');
			$config = $this->carrinhoModel->getParametrosEnvio();
			//var_dump($config);
			$maiorProduto = $this->getMaiorProduto();
			$totalPeso = $this->totalPeso();

			$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
			$url .= "nCdEmpresa=08082650";
			$url .= "&sDsSenha=564321";
			$url .= "&sCepOrigem=" . $config->cep_origem;
			$url .= "&sCepDestino=" . $cep;
			$url .= "&nVlPeso=" . $totalPeso;
			$url .= "&nCdFormato=1";
			$url .= "&nVlComprimento=" . $maiorProduto['comprimento'];
			$url .= "&nVlAltura=" . $maiorProduto['altura'];
			$url .= "&nVlLargura=" . $maiorProduto['largura'];
			$url .= "&sCdMaoPropria=n";
			$url .= "&nVlValorDeclarado=" . $config->valor_declarado;
			$url .= "&sCdAvisoRecebimento=n";
			$url .= "&nCdServico=04510,04014";
			$url .= "&nVlDiametro=0";
			$url .= "&StrRetorno=xml";
			$url .= "&nIndicaCalculo=3";

			$xml = simplexml_load_file($url);
			$xml = json_encode($xml);
			$consulta = json_decode($xml);




			//var_dump((double)$consulta->cServico[0]->Valor);
			//var_dump($config->somar_frete);
			///var_dump($v->valor);
			$frete = '';
			$total_produtos = $this->cart->total();
			foreach ($consulta->cServico as $v){
				//$valor = (double)(str_replace(',', '.',$v->Valor)) + $config->somar_frete;
				$valor = (double)(str_replace(',', '.',$v->Valor)) + $config->somar_frete;
				$total_carrinho = $valor + $total_produtos;
				$frete .= '<div><br><input style="height: 25px; width: 25px" class="form-check-input" type="radio" name="frete_checkout" id="' . $v->Codigo . '" value="' . $valor. '|'. $v->Codigo .'" data-vFrete="'. formataMoedaReal($valor, true) .'" data-totalCheckout="'. formataMoedaReal($total_carrinho, true) .'">   |   Correios ' .
					($v->Codigo == '04014' ? 'Sedex' : 'Pac') .
					' | R$ ' .
					(number_format($valor, 2, ',', '.')) .
					' - Prazo de entrega: ' .
					$v->PrazoEntrega .
					' dias úteis'.
					'<hr></div>';
			}

			$retorno['valor_frete'] = '<strong style="color: darkgreen">' . $frete . "</strong><br><br>";
			$retorno['erro'] = 0;

			echo json_encode($retorno);
		}else{
			$retorno['erro'] = 17;
			$retorno['msg'] = validation_errors();
			echo  json_encode($retorno);
		}
	}
}
