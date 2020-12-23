<?php

class Busca extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		//$this->load->library('pager');
		$this->load->model('categoriaModel');
		$this->load->helper('helper_helper');
		$this->load->helper('helper_helper');
		$this->load->model('lojaModel');
		$this->load->model('marcasModel');
		$this->load->model('buscaModel');
		$this->load->model('pager');

	}

	public function index($offset = null)
	{
		//$this->form_validation->set_rules('query_busca', 'Buscar', 'trim');

		//if($this->form_validation->run() == true) {
			if($this->input->post('query_busca')){
				$data['busca'] = $this->input->post('query_busca');
				$_SESSION['busca'] = $data['busca'];
			}else{
				$data['busca'] = $_SESSION['busca'];
			}

			$query = $this->lojaModel->getDadosLoja();

			$data['categorias'] = $this->categoriaModel->getCategorias();
			$data['marcas'] = $this->marcasModel->getMarcas();


			$total = $this->buscaModel->getTotal($data['busca']);
			//var_dump($total);
			/*$config = [
				'base_url' => base_url('busca/p'),
				'per_page' => 2,
				'num_links' => 3,//link das prox paginas
				'uri_segment' => 3,
				'total_rows' => $total,
				'full_tag_open' => '<ul class="pagination pagination-lg">',
				'full_tag_close' => '</ul>',
				'first_link' => false,//sem link levando para a primeira pagina
				'last_link' => false,
				'first_tag_open' => '<li>',
				'first_tag_close' => '</li>',
				'prev_link' => '<i class="fa fa-arrow-left"></i>',
				'prev_tag_open' => "<li class='prev'>",
				'prev_tag_close' => "</li>",
				'next_link' => '<i class="fa fa-arrow-right"></i>',
				'next_tag_open' => "<li class='prev'>",
				'next_tag_close' => "</li>",
				'last_tag_open' => "<li>",
				'last_tag_close' => "</li>",
				'cur_tag_open' => "<li class='active'><a href='#'>",
				'cur_tag_close' => "</a></li>",
				'num_tag_open' => "<li>",
				'num_tag_close' => "</li>"
			];*/

			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['produtos'] = $this->buscaModel->getBusca($data['busca'], 24, $offset);

			//$this->pagination->initialize($config);
			$this->pager->config("busca/p", $total, 24, 3);

			$data['pagination'] = $this->pagination->create_links();
			$data['ordenacaoSelecionada'] = '';

		$this->view('viewsStore/busca', $data);

	//	}else{
		//	redirect('');
		//}

	}

	public function buscaMenorPreco($offset = null)
	{
		//$this->form_validation->set_rules('query_busca', 'Buscar', 'trim');

		//if($this->form_validation->run() == true) {
		if($this->input->post('query_busca')){
			$data['busca'] = $this->input->post('query_busca');
			$_SESSION['busca'] = $data['busca'];
		}else{
			$data['busca'] = $_SESSION['busca'];
		}

		$query = $this->lojaModel->getDadosLoja();

		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();


		$total = $this->buscaModel->getTotal($data['busca']);


		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['produtos'] = $this->buscaModel->getBusca($data['busca'], 24, $offset, 'menorPreco');

		//$this->pagination->initialize($config);
		$this->pager->config("buscaMenorPreco/p", $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'menorPreco';

		$this->view('viewsStore/busca', $data);

		//	}else{
		//	redirect('');
		//}

	}


	public function buscaMaiorPreco($offset = null)
	{
		//$this->form_validation->set_rules('query_busca', 'Buscar', 'trim');

		//if($this->form_validation->run() == true) {
		if($this->input->post('query_busca')){
			$data['busca'] = $this->input->post('query_busca');
			$_SESSION['busca'] = $data['busca'];
		}else{
			$data['busca'] = $_SESSION['busca'];
		}

		$query = $this->lojaModel->getDadosLoja();

		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();


		$total = $this->buscaModel->getTotal($data['busca']);


		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['produtos'] = $this->buscaModel->getBusca($data['busca'], 24, $offset, 'maiorPreco');

		//$this->pagination->initialize($config);
		$this->pager->config("buscaMaiorPreco/p", $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'maiorPreco';

		$this->view('viewsStore/busca', $data);

		//	}else{
		//	redirect('');
		//}

	}

	public function buscaMaisVendidos($offset = null)
	{
		//$this->form_validation->set_rules('query_busca', 'Buscar', 'trim');

		//if($this->form_validation->run() == true) {
		if($this->input->post('query_busca')){
			$data['busca'] = $this->input->post('query_busca');
			$_SESSION['busca'] = $data['busca'];
		}else{
			$data['busca'] = $_SESSION['busca'];
		}

		$query = $this->lojaModel->getDadosLoja();

		$data['categorias'] = $this->categoriaModel->getCategorias();
		$data['marcas'] = $this->marcasModel->getMarcas();


		$total = $this->buscaModel->getTotal($data['busca']);


		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['produtos'] = $this->buscaModel->getBusca($data['busca'], 24, $offset, 'maisVendidos');

		//$this->pagination->initialize($config);
		$this->pager->config("buscaMaisVendidos/p", $total, 24, 3);

		$data['pagination'] = $this->pagination->create_links();
		$data['ordenacaoSelecionada'] = 'maisVendidos';

		$this->view('viewsStore/busca', $data);

		//	}else{
		//	redirect('');
		//}

	}
}
