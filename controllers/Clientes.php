<?php


class Clientes extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->logged_in()){
			redirect('entrar');
		}

		$this->load->model('clientesModel');


	}

	public function index()
	{
		$data['titulo'] = 'Lista de clientes';
		$data['view'] = 'viewsStore/clientes';
		$data['clientes'] = $this->clientesModel->getClientes();
		//$this->load->view('viewsStore/index', $data);
		$this->load->view('viewsStore/clientes', $data);

	}

	public function modulo($id_cliente = null)
	{

		$dados = null;
		if($id){
			$data['titulo'] = 'Atualizar clientes';
		}else{
			$data['titulo'] = 'Novo cliente';
		}

		$data['dados'] = $dados;
		$data['view'] = 'viewsStore/clientes';
		$this->load->view('viewsStore/clientes', $data);

	}

}
