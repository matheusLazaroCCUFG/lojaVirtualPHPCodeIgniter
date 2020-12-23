<?php


class Carrinho extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('lojaModel');
		$this->load->helper('helper_helper');
		$this->load->library('carrinhoCompras');
		$this->load->library('cart');
	}

	public function index()
	{
		//$carrinho = $this->carrinhocompras->listarProdutos();
		$data['total'] = $this->carrinhocompras->totalCarrinho();
		$data['tamanho'] = $this->carrinhocompras->totalItem();
		$data['carrinho'] = $this->carrinhocompras->listarProdutos();
		$this->view('viewsStore/carrinho', $data);
	}

	public function add()
	{
		//echo $this->input->post('id');
		if($this->input->post('id')){
			$id = $this->input->post('id');
			$qtd = $this->input->post('qtd');
			$tamanho = $this->input->post('tamanho');
			$tipo = $this->input->post('tipo');
			//echo $id;
			//$qtd = 1;
			if($qtd == null){
				$qtd = 1;
			}
			//if($tamanho == '0'){

		//	}


			$this->carrinhocompras->add($id, $qtd, $tamanho, $tipo);

			$tamanho = $this->carrinhocompras->totalItem();
			$json = [
				'erro' => 1,
				'msg' => 'Produto adidionado ao carrinho!',
				'itens' => $tamanho
			];
			/*var_dump(json_encode($json));*/

			echo json_encode($json);
		}


		//$this->carrinhocompras->add(33, 5);
		//$this->carrinhocompras->add(30, 5);
		//$this->carrinhocompras->add(31, 5);
	}

	public function limpa()
	{
		//unset($_SESSION['carrinho']);

		if($this->input->post('limpar') == true){//vem do js
			$this->carrinhocompras->limpa();
			$json = [
				'erro' => 1,
				'msg' => 'Carrinho limpo!',
			];
		}

	}

	public function alterar()
	{
		if($this->input->post('id') && $this->input->post('qtd')){
			$id = $this->input->post('id');
			$qtd = $this->input->post('qtd');
			$this->carrinhocompras->alteraQuantidade($id, $qtd);

			$json = [
				'erro' => 0,
				'msg' => 'Quantidade atualizada!',
			];

			echo json_encode($json);
		}
	}

	public function apagar_item()
	{
		//echo $this->input->post('id');
		if($this->input->post('id')) {
			$id = $this->input->post('id');
			$this->carrinhocompras->apagaProduto($id);

			$json = [
				'erro' => 0,
				'msg' => 'Produto apagado!',
			];

			echo json_encode($json);
		}
	}

	public function carrinho_topo()
	{
		$json = [
			'erro' => 0,
			'itens' => $this->carrinhocompras->totalItem()
		];

		echo json_encode($json);
	}

	public function teste()
	{
		$maior = $this->carrinhocompras->getMaiorProduto();
		var_dump($maior);
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
			$maiorProduto = $this->carrinhocompras->getMaiorProduto();
			$totalPeso = $this->carrinhocompras->totalPeso();

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
			$total_produtos = $this->carrinhocompras->totalCarrinho();
			foreach ($consulta->cServico as $v){
				//$valor = (double)(str_replace(',', '.',$v->Valor)) + $config->somar_frete;
				$valor = (double)(str_replace(',', '.',$v->Valor)) + $config->somar_frete;
				$total_carrinho = $valor + $total_produtos;
				$frete .= '<div><br><input style="height: 25px; width: 25px" class="form-check-input" type="radio" name="frete_carrinho" id="' . $v->Codigo . '" value="' . $valor. '" data-vFrete="'. formataMoedaReal($valor, true) .'" data-totalCarrinho="'. formataMoedaReal($total_carrinho, true) .'">   |   Correios ' .
					($v->Codigo == '04014' ? 'Sedex' : 'Pac') .
					' | R$ ' .
					(number_format($valor, 2, ',', '.')) .
					' - Prazo de entrega: ' .
					$v->PrazoEntrega .
					' dias'.
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
