<?php


class Marcas extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->is_admin()){
			redirect('entrarAdm');
		}

		$this->load->library('form_validation');

		$this->load->model('marcasModel');
		$this->load->helper('helper_helper');


	}

	public function index()
	{
		$data['titulo'] = 'Lista de Marcas';
		$data['view'] = 'listarMarcas';
		$data['marcas'] = $this->marcasModel->getMarcas();
		$this->view('viewsStore/listarMarcas', $data);

	}

	public function modulo($id = null)
	{
		$dados = null;
		if($id){
			$data['titulo'] = 'Atualizar marca';
			$dados = $this->marcasModel->getMarcaId($id);

			if(!$dados){
				setMSG('msgCadastro', 'Marca não encontrada');
				redirect('listarMarcas', 'refresh');
			}
		}else{
			$data['titulo'] = 'Nova marca';
		}

		$data['view'] = 'viewsStore/moduloMarcas';
		$data['dados'] = $dados;
		$this->view('viewsStore/moduloMarcas', $data);
	}

	public function core()
	{
		$this->form_validation->set_rules('nome_marca', 'Nome da Marca', 'trim|required|min_length[2]');
		//$this->form_validation->set_rules('ativo', 'Ativo', 'trim|required');

		if($this->form_validation->run() == true){
			$dadosMarcas['nome_marca'] = $this->input->post('nome_marca');
			$dadosMarcas['ativo'] = $this->input->post('ativo');
			$dadosMarcas['meta_link'] = slug($this->input->post('nome_marca'));

			if($this->input->post('id')){
				$dadosMarcas['ultima_atualizacao'] = dataDiaDb();
				$id = $this->input->post('id');
				$this->marcasModel->doUpdate($dadosMarcas, $id);

			}else{
				$this->marcasModel->doInsert($dadosMarcas);

			}

		}else{
			$this->modulo();
		}

		redirect('marcas');
	}

	public function del($id = null)
	{
		if($id){
			$this->marcasModel->doDelete($id);
			setMSG('msgCadastro', 'Marca apagada com sucesso', 'sucesso');
			redirect('marcas');

		}else{
			setMSG('msgCadastro', 'Marca não encontrada', 'erro');
			redirect('marcas');
		}
	}
}
