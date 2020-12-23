<?php


class Carrinho2 extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('lojaModel');
		$this->load->model('carrinhoModel');
		$this->load->helper('helper_helper');
		$this->load->library('carrinhoCompras');
		$this->load->library('cart');
	}

	public function index()
	{

		//$carrinho = $this->carrinhocompras->listarProdutos();
		//$data['total'] = $this->carrinhocompras->totalCarrinho();
		$data['total'] = $this->cart->total();
		//$data['tamanho'] = $this->carrinhocompras->totalItem();
		$data['tamanho'] = $this->cart->total_items();
		//$data['carrinho'] = $this->carrinhocompras->listarProdutos();
		$data['carrinho'] = $this->cart->contents();
		$data['totalPeso'] = $this->totalPeso();
		$this->view('viewsStore/carrinho', $data);
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

	public function add()
	{
		/*$retorno[$indice]['id'] = $query->id;
		$retorno[$indice]['nome'] = $query->nome_produto;
		$retorno[$indice]['valor'] = $query->valor;
		$retorno[$indice]['qtd'] = $qtd;
		$retorno[$indice]['tamanho'] = $_SESSION['carrinho_tamanhoProduto'][$id];
		$retorno[$indice]['tipo'] = $_SESSION['carrinho_tipoProduto'][$id];
		$retorno[$indice]['subtotal'] = number_format($qtd * $query->valor, 2, '.', '');
		$retorno[$indice]['peso'] = $query->peso;
		$retorno[$indice]['altura'] = $query->altura;
		$retorno[$indice]['largura'] = $query->largura;
		$retorno[$indice]['comprimento'] = $query->comprimento;
		$retorno[$indice]['foto'] = $query->foto;
		$retorno[$indice]['meta_link'] = $query->meta_link;
		$retorno[$indice]['codigo'] = $query->cod_produto ;*/

		//echo $this->input->post('id');
		if($this->input->post('id')){
			$id = $this->input->post('id');
			$produto = $this->cart->get_item($id);
			if($produto){
				$qtd = $produto['qtd'] + $this->input->post('qtd');
			}else {
				$qtd = $this->input->post('qtd');
			}
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
			$produto = $this->carrinhoModel->getProduto($id);
			$data = array(
				'id'      => $id,
				'qty'     => $qtd,
				'price'   => $produto->valor,
				'name'    => $produto->nome_produto,
				'options' => array('tamanho' => $tamanho, 'tipo' => $tipo),
				'nome' => $produto->nome_produto,
				'valor' => $produto->valor,
				'qtd' => $qtd,
				'tamanho' => $tamanho,
				'tipo' => $tipo,
				'subtotal' => number_format($qtd * $produto->valor, 2, '.', ''),
				'peso' => $produto->peso,
				'altura' => $produto->altura,
				'largura' => $produto->largura,
				'comprimento' => $produto->comprimento,
				'foto' => $produto->foto,
				'meta_link' => $produto->meta_link,
				'codigo' => $produto->cod_produto ,
			);

			$this->cart->insert($data);



			//$this->carrinhocompras->add($id, $qtd, $tamanho, $tipo);

			//$tamanho = $this->carrinhocompras->totalItem();
			$tamanho = $this->cart->total_items();
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
			//$this->carrinhocompras->limpa();
			$this->cart->destroy();
			$json = [
				'erro' => 1,
				'msg' => 'Carrinho limpo2!',
			];
			echo json_encode($json);
		}

	}

	public function alterar()
	{
		if($this->input->post('rowid') && $this->input->post('qtd')){
			$rowid = $this->input->post('rowid');
			$qtd = $this->input->post('qtd');
			//$this->carrinhocompras->alteraQuantidade($id, $qtd);
			$data = array(
				'rowid' => $rowid,
				'qty' => $qtd
			);
			$this->cart->update($data);

			$json = [
				'quantidade' => $this->cart->total_items(),
				'erro' => 0,
				'msg' => 'Quantidade atualizada!',
			];

			echo json_encode($json);
		}
	}

	public function apagar_item()
	{
		//echo $this->input->post('id');
		if($this->input->post('rowid')) {
			$rowid = $this->input->post('rowid');
			//$this->carrinhocompras->apagaProduto($id);
			$this->cart->remove($rowid);

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
			'itens' => $this->cart->total_items()
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
			//$total_produtos = $this->carrinhocompras->totalCarrinho();
			$total_produtos = $this->cart->total();
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
