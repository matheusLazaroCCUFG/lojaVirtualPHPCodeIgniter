<?php


class Produto extends \App\Core\CoreController
{
	public function __construct()
	{

		parent::__construct();

		$this->load->model('produtoModel');
		$this->load->model('lojaModel');
		$this->load->helper('helper_helper');
		$this->load->model('lojaModel');
		$this->load->model('homeModel');
		$this->load->model('configModel');

	}

	public function index($meta_link = null)
	{
		//echo $meta_link;
		if(!$meta_link){
			redirect('/');
		}

		$query = $this->lojaModel->getDadosLoja();

		$produto = $this->produtoModel->getProdutoMetaLink($meta_link);
		if(!$produto){
			redirect('');
		}
		$data['produto'] = $produto;
		$this->load->model('configModel');
		$data['semJuros'] = $this->configModel->getConfigPagseguro();
		$data['fotos'] = $this->produtoModel->getFotos($produto->id);
		$query = $this->homeModel->getDadosLoja();
		//$data['novosProdutos'] = $this->produtoModel->getNovosProdutos($query->p_destaque);
		$data['produtosCategoria'] = $this->produtoModel->getProdutosCategoria($produto->id_categoria);
		$this->view('viewsStore/single', $data);
	}



}
