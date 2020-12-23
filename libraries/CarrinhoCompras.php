<?php


class CarrinhoCompras
{
	public function __construct()
	{
		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = [];
			$_SESSION['carrinho_tamanhoProduto'] = [];
			$_SESSION['carrinho_tipoProduto'] = [];
			$_SESSION['indice'] = 2;
		}
		//var_dump($_SESSION['carrinho']);

	}

	public function add($id, $qtd, $tamanho= null, $tipo = null)
	{
		if(isset($_SESSION['carrinho'][$id])){
			if(strcmp($tamanho, $_SESSION['carrinho_tamanhoProduto'][$id]) != 0){
				$_SESSION['carrinho'][$id]= $qtd;
				$_SESSION['carrinho_tamanhoProduto'][$id] = $tamanho;
				$_SESSION['carrinho_tipoProduto'][$id] = $tipo;
				$_SESSION['indice']++;
			}else
			if(strcmp($tipo, $_SESSION['carrinho_tipoProduto'][$id]) != 0){
				$_SESSION['carrinho'][$id] = $qtd;
				$_SESSION['carrinho_tamanhoProduto'][$id] = $tamanho;
				$_SESSION['carrinho_tipoProduto'][$id] = $tipo;

			}
			else {
				$_SESSION['carrinho'][$id] += $qtd;
			}
		}else{
			$_SESSION['carrinho'][$id] = $qtd;
			$_SESSION['carrinho_tamanhoProduto'][$id] = $tamanho;
			$_SESSION['carrinho_tipoProduto'][$id] = $tipo;
			//var_dump( $_SESSION['carrinho']);
		}
	}

	public function alteraQuantidade($id, $qtd)
	{
		if(isset($_SESSION['carrinho'][$id])){
			if($qtd > 0){
				$_SESSION['carrinho'][$id] = $qtd;
			}else{
				$this->apagaProduto($id); //excluir item
			}
		}
	}

	public function apagaProduto($id)
	{

		unset($_SESSION['carrinho'][$id]);
	}

	public function limpa()
	{
		//unset($_SESSION['carrinho']);
		$_SESSION['carrinho'] = [];
	}

	public function listarProdutos()
	{
		$CI =& get_instance();//Não está no controller
		$CI->load->model('carrinhoModel');

		$retorno = [];
		$indice = 0;


		foreach ($_SESSION['carrinho'] as $id => $qtd) {
			//$_SESSION['carrinho_tamanhoProduto'] = [$id => $qtd];
			$query = $CI->carrinhoModel->getProduto($id);
			$retorno[$indice]['id'] = $query->id;
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
			$retorno[$indice]['codigo'] = $query->cod_produto ;
			$indice++;
		}

			return $retorno;


	}

	public function totalCarrinho()
	{
		$produto = $this->listarProdutos();
		$total = 0;

		foreach ($produto as $indice => $linha){
			$total += $linha['subtotal'];
		}
		return $total;
	}

	public function totalPeso()
	{
		$produto = $this->listarProdutos();
		$total = 0;

		foreach ($produto as $indice => $linha){
			$total += $linha['peso'] * $linha['qtd'];
		}
		return $total;
	}

	public function totalItem()
	{
		$produto = $this->listarProdutos();
		$qtd = 0;
		foreach ($produto as $indice => $linha){
			$qtd += $linha['qtd'];
		}
		return $qtd;
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

	public function listarDimensao()
	{
		$CI =& get_instance();//Não está no controller
		$CI->load->model('carrinhoModel');

		$retorno = [];
		$indice = 0;

		foreach ($_SESSION['carrinho'] as $id => $qtd) {
			$query = $CI->carrinhoModel->getDimensao($id);
			$retorno[$indice]['id'] = $query->id;
			$retorno[$indice]['altura'] = $query->altura;
			$retorno[$indice]['largura'] = $query->largura;
			$retorno[$indice]['comprimento'] = $query->comprimento;
			$retorno[$indice]['dimensao'] = $query->altura + $query->largura + $query->comprimento;

			$indice++;
		}

		return $retorno;

	}
}
