<?php

class Marca extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('marcaModel');
		$this->load->helper('helper_helper');
		$this->load->helper('helper_helper');
		$this->load->model('lojaModel');
		$this->load->model('marcasModel');
		$this->load->model('categoriaModel');
		$this->load->model('pager');


	}

	public function index($meta_link = null)
	{
		//echo $meta_link;

		if(!$meta_link){
			redirect('/');
		}


		$marca = $this->marcaModel->getMarca($meta_link);

		//echo "ok";
		if(!$marca){
			redirect('');
		}

		$data['nomeMarca'] = $marca;
		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();


		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produtos'] = $this->marcaModel->getProdutosMarca($marca->id , 24, $offset);
		$total = $this->marcaModel->getTotal($marca->id);
		//$this->pagination->initialize($config);
		$this->pager->config("marca/" . $meta_link, $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = '';

		$this->view('viewsStore/marca', $data);
	}

	public function menorPreco($meta_link = null)
	{
		//echo $meta_link;

		if(!$meta_link){
			redirect('/');
		}


		$marca = $this->marcaModel->getMarca($meta_link);

		//echo "ok";
		if(!$marca){
			redirect('');
		}

		$query = $this->lojaModel->getDadosLoja();
		$data['nomeMarca'] = $marca;
		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();




		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produtos'] = $this->marcaModel->getProdutosMarca($marca->id, 24, $offset, "menorPreco");

		$total = $this->marcaModel->getTotal($marca->id);
		//$this->pagination->initialize($config);
		$this->pager->config("marcaMenorPreco/" . $meta_link, $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'menorPreco';

		$this->view('viewsStore/marca', $data);
	}

	public function maiorPreco($meta_link = null)
	{
		//echo $meta_link;

		if(!$meta_link){
			redirect('/');
		}


		$marca = $this->marcaModel->getMarca($meta_link);

		//echo "ok";
		if(!$marca){
			redirect('');
		}

		$query = $this->lojaModel->getDadosLoja();
		$data['nomeMarca'] = $marca;
		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();




		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produtos'] = $this->marcaModel->getProdutosMarca($marca->id, 24, $offset, "maiorPreco");

		$total = $this->marcaModel->getTotal($marca->id);
		//$this->pagination->initialize($config);
		$this->pager->config("marcaMaiorPreco/" . $meta_link, $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'maiorPreco';

		$this->view('viewsStore/marca', $data);
	}

	public function maisVendidos($meta_link = null)
	{
		//echo $meta_link;

		if(!$meta_link){
			redirect('/');
		}


		$marca = $this->marcaModel->getMarca($meta_link);

		//echo "ok";
		if(!$marca){
			redirect('');
		}

		$query = $this->lojaModel->getDadosLoja();
		$data['nomeMarca'] = $marca;
		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();




		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produtos'] = $this->marcaModel->getProdutosMarca($marca->id, 24, $offset, "maisVendidos");

		$total = $this->marcaModel->getTotal($marca->id);
		//$this->pagination->initialize($config);
		$this->pager->config("marcaMaisVendidos/" . $meta_link, $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'maisVendidos';

		$this->view('viewsStore/marca', $data);
	}
}
