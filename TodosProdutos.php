<?php

class TodosProdutos extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->helper('helper_helper');
		$this->load->helper('helper_helper');
		$this->load->model('lojaModel');
		$this->load->model('marcasModel');
		$this->load->model('todosProdutosModel');
		$this->load->model('pager');


	}

	public function index()
	{
		$offset = ($this->uri->segment(2) ? (int)$this->uri->segment(2) : 0);

		$data['produtos'] = $this->todosProdutosModel->getProdutos(24, $offset);
		$total = $this->todosProdutosModel->getTotal();
		//$this->pagination->initialize($config);
		$this->pager->config("todos", $total, 24, 2);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = '';
		$this->view('viewsStore/todosProdutos', $data);
	}

	public function menorPreco()
	{



		$query = $this->lojaModel->getDadosLoja();



		$offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['produtos'] = $this->todosProdutosModel->getProdutos(24, $offset, "menorPreco");

		$total = $this->todosProdutosModel->getTotal();
		//$this->pagination->initialize($config);
		$this->pager->config("todosMenorPreco", $total, 24, 2);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'menorPreco';

		$this->view('viewsStore/todosProdutos', $data);
	}

	public function maiorPreco()
	{



		$query = $this->lojaModel->getDadosLoja();


		$offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['produtos'] = $this->todosProdutosModel->getProdutos(24, $offset, "maiorPreco");

		$total = $this->todosProdutosModel->getTotal();
		//$this->pagination->initialize($config);
		$this->pager->config("todosMaiorPreco", $total, 24, 2);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'maiorPreco';

		$this->view('viewsStore/todosProdutos', $data);
	}

	public function maisVendidos()
	{



		$query = $this->lojaModel->getDadosLoja();



		$offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['produtos'] = $this->todosProdutosModel->getProdutos(24, $offset, "maisVendidos");

		$total = $this->todosProdutosModel->getTotal();
		//$this->pagination->initialize($config);
		$this->pager->config("todosMaisVendidos", $total, 24, 2);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'maisVendidos';

		$this->view('viewsStore/todosProdutos', $data);
	}
}
