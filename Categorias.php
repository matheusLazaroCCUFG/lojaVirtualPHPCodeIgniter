<?php


class Categorias extends \App\Core\CoreController
{

	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->is_admin()){
			redirect('entrarAdm');
		}

		$this->load->library('form_validation');

		$this->load->model('categoriasModel');
		$this->load->helper('helper_helper');


	}

	public function index()
	{
		$data['titulo'] = 'Lista Categorias';
		$data['view'] = 'listarCategorias';
		$data['categorias'] = $this->categoriasModel->getCategorias();
		$this->view('viewsStore/listarCategorias', $data);

	}

	public function modulo($id = null)
	{
		$dados = null;
		if($id){
			$data['titulo'] = 'Atualizar categoria';
			$dados = $this->categoriasModel->getCategoriaId($id);

			if(!$dados){
				setMSG('msgCadastro', 'Categoria não encontrada');
				redirect('listarCategorias', 'refresh');
			}
		}else{
			$data['titulo'] = 'Nova categoria';
		}

		$data['view'] = 'viewsStore/moduloCategorias';
		$data['dados'] = $dados;
		$data['categorias'] = $this->categoriasModel->getCategorias();

		$this->view('viewsStore/moduloCategorias', $data);
	}

	public function core()
	{
		$this->form_validation->set_rules('nome', 'Nome da Categoria', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('ativo', 'Ativo', 'trim|required');

		if($this->form_validation->run() == true){
			$dadosCategorias['nome'] = $this->input->post('nome');
			$dadosCategorias['ativo'] = $this->input->post('ativo');
			$dadosCategorias['id_categoriaspai'] = $this->input->post('id_categoriaspai');

			$dadosCategorias['meta_link'] = slug($this->input->post('nome'));


			if($this->input->post('id')){
				$dadosCategorias['ultima_atualizacao'] = dataDiaDb();
				$id = $this->input->post('id');
				$this->categoriasModel->doUpdate($dadosCategorias, $id);

			}else{
				$this->categoriasModel->doInsert($dadosCategorias);

			}

		}else{
			$this->modulo();
		}

		redirect('categorias');
	}

	public function del($id = null)
	{
		if($id){
			$this->categoriasModel->doDelete($id);
			setMSG('msgCadastro', 'Categoria apagada com sucesso', 'sucesso');
			redirect('categorias');

		}else{
			setMSG('msgCadastro', 'Categoria não encontrada', 'erro');
			redirect('categorias');
		}
	}
}
