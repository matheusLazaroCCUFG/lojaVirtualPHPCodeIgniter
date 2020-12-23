<?php

class Categoria extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('categoriaModel');
		$this->load->helper('helper_helper');
		$this->load->helper('helper_helper');
		$this->load->model('lojaModel');
		$this->load->model('marcasModel');
		$this->load->model('pager');


	}

	public function index($meta_link = null)
	{
		//echo $meta_link;

		if(!$meta_link){
			redirect('/');
		}


		$categoria = $this->categoriaModel->getCategoria($meta_link);

		//echo "ok";
		if(!$categoria){
			redirect('');
		}

		$query = $this->lojaModel->getDadosLoja();
		$data['nomeCategoria'] = $categoria;
		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();




		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produtos'] = $this->categoriaModel->getProdutosCategorias($categoria->id, 24, $offset);

		$total = $this->categoriaModel->getTotal($categoria->id);
		//$this->pagination->initialize($config);
		$this->pager->config("categoria/" . $meta_link, $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = '';
		$this->view('viewsStore/categoria', $data);
	}

	public function menorPreco($meta_link = null)
	{
		//echo $meta_link;

		if(!$meta_link){
			redirect('/');
		}


		$categoria = $this->categoriaModel->getCategoria($meta_link);

		//echo "ok";
		if(!$categoria){
			redirect('');
		}

		$query = $this->lojaModel->getDadosLoja();
		$data['nomeCategoria'] = $categoria;
		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();




		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produtos'] = $this->categoriaModel->getProdutosCategorias($categoria->id, 24, $offset, "menorPreco");

		$total = $this->categoriaModel->getTotal($categoria->id);
		//$this->pagination->initialize($config);
		$this->pager->config("categoriaMenorPreco/" . $meta_link, $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'menorPreco';

		$this->view('viewsStore/categoria', $data);
	}

	public function maiorPreco($meta_link = null)
	{
		//echo $meta_link;

		if(!$meta_link){
			redirect('/');
		}


		$categoria = $this->categoriaModel->getCategoria($meta_link);

		//echo "ok";
		if(!$categoria){
			redirect('');
		}

		$query = $this->lojaModel->getDadosLoja();
		$data['nomeCategoria'] = $categoria;
		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();




		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produtos'] = $this->categoriaModel->getProdutosCategorias($categoria->id, 24, $offset, "maiorPreco");

		$total = $this->categoriaModel->getTotal($categoria->id);
		//$this->pagination->initialize($config);
		$this->pager->config("categoriaMaiorPreco/" . $meta_link, $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'maiorPreco';

		$this->view('viewsStore/categoria', $data);
	}

	public function maisVendidos($meta_link = null)
	{
		//echo $meta_link;

		if(!$meta_link){
			redirect('/');
		}


		$categoria = $this->categoriaModel->getCategoria($meta_link);

		//echo "ok";
		if(!$categoria){
			redirect('');
		}

		$query = $this->lojaModel->getDadosLoja();
		$data['nomeCategoria'] = $categoria;
		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();




		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produtos'] = $this->categoriaModel->getProdutosCategorias($categoria->id, 24, $offset, "maisVendidos");

		$total = $this->categoriaModel->getTotal($categoria->id);
		//$this->pagination->initialize($config);
		$this->pager->config("categoriaMaisVendidos/" . $meta_link, $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'maisVendidos';

		$this->view('viewsStore/categoria', $data);
	}
}
