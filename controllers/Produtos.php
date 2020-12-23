<?php


class Produtos extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->is_admin()){
			redirect('entrarAdm');
		}

		$this->load->library('form_validation');

		$this->load->model('produtosModel');
		$this->load->helper('helper_helper');


	}

	/*
	 * (array) [1 element]
	0:
	stdClass (object) [Object ID #27][19 properties]
	id: (string) "1"
	id_marca: (string) "1"
	id_categoria: (string) "6"
	nome_produto: (string) "Computador Intel Core i5, ..."
	cod_produto: (string) "1"
	valor: (string) "1500.00"
	destaque: (string) "1"
	ativo: (string) "1"
	controlar_estoque: (string) "0"
	estoque: (string) "0"
	data_cadastro: (string) "2020-04-28"
	ultima_atualizacao: (string) "2020-04-28 00:49:25"
	peso: (string) "1"
	altura: (string) "45"
	largura: (string) "30"
	comprimento: (string) "50"
	info: (string) "Informações do produto"
	nome_marca: (string) "Intel"
	nome: (string) "Intel Core I5"------------------------>nome_categoria: TROCAR NA TABELA E NOS ARQUIVOS DO CATEGORIAS
	*/

	public function index()
	{
		$data['titulo'] = 'Lista de produtos';
		$data['view'] = 'viewsStore/listarProdutos';
		$data['produtos'] = $this->produtosModel->getProdutos();
		$this->view('viewsStore/listarProdutos', $data);

	}

	public function modulo($id = null)
	{
		$dados = null;

		$fotos = new stdClass();

		if ($id) {

			$data['titulo'] = 'Atualizar produto';
			$dados = $this->produtosModel->getProdutoId($id);

			if (!$dados) {
				setMSG('msgCadastro', 'produto não encontrado');
				redirect('listarProdutos', 'refresh');
			} else {
				$fotos = $this->produtosModel->getFotosProduto($id);

			}
		} else {
			$data['titulo'] = 'Novo produtos';
		}
		$data['id'] = $id;
		$data['view'] = 'viewsStore/moduloProdutos';
		$data['dados'] = $dados;
		$data['marcas'] = $this->produtosModel->getMarcas();//Apenas ativos
		$data['categorias'] = $this->produtosModel->getCategorias();
		$data['semJuros'] = $this->configModel->getConfigPagseguro();

		$data['fotos'] = $fotos;
		//var_dump($data['fotos'][0]->id_produto);
		//$this->session->userdata('last_id') = $id;
		$this->view('viewsStore/moduloProdutos', $data);
	}

	public function core()
	{
		$this->form_validation->set_rules('nome_produto', 'Nome do produto', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('valor', 'valor', 'trim|required|min_length[2]');
		//$this->form_validation->set_rules('ativo', 'Ativo', 'trim|required');

		if($this->form_validation->run() == true){


			$dadosProdutos['nome_produto'] = (string)(str_replace(',','.', $this->input->post('nome_produto')));
			$dadosProdutos['cod_produto'] = remove_acentos($this->input->post('cod_produto'));
			$dadosProdutos['valor'] = formatoDecimal($this->input->post('valor'));
			$dadosProdutos['peso'] = $this->input->post('peso');
			$dadosProdutos['altura'] = $this->input->post('altura');
			$dadosProdutos['largura'] = $this->input->post('largura');
			$dadosProdutos['comprimento'] = $this->input->post('comprimento');
			$dadosProdutos['info'] = $this->input->post('info');
			$dadosProdutos['controlar_estoque'] = $this->input->post('controlar_estoque');
			$dadosProdutos['estoque'] = $this->input->post('estoque');
			$dadosProdutos['destaque'] = $this->input->post('destaque');
			$dadosProdutos['ativo'] = $this->input->post('ativo');
			$dadosProdutos['possui_tamanho'] = $this->input->post('possui_tamanho');
			$dadosProdutos['possui_tipos'] = $this->input->post('possui_tipos');
			$dadosProdutos['ultimaParcelaVezes'] = $this->input->post('ultimaParcelaVezes');
			$dadosProdutos['ultimaParcelaValor'] = $this->input->post('ultimaParcelaValor');


			$dadosProdutos_estoque['estoque_p'] = $this->input->post('estoque_p');
			$dadosProdutos_estoque['estoque_m'] = $this->input->post('estoque_m');
			$dadosProdutos_estoque['estoque_g'] = $this->input->post('estoque_g');
			$dadosProdutos_estoque['estoque_gg'] = $this->input->post('estoque_gg');
			$dadosProdutosEstoqueTipos = null;

			if($dadosProdutos['possui_tipos'] == 0){
				$dadosProdutosEstoqueTipos['nome_tipo1'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo2'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo3'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo4'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo5'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo6'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo7'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo8'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo9'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo10'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_1'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_2'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_3'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_4'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_5'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_6'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_7'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_8'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_9'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_10'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_11'] = null;
			}

			if($this->input->post('qtd_tipos')){
				$dadosProdutos['qtd_tipos'] = $this->input->post('qtd_tipos');
				$dadosProdutosEstoqueTipos['nome_tipo1'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo2'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo3'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo4'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo5'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo6'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo7'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo8'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo9'] = null;
				$dadosProdutosEstoqueTipos['nome_tipo10'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_1'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_2'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_3'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_4'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_5'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_6'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_7'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_8'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_9'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_10'] = null;
				$dadosProdutosEstoqueTipos['estoque_tipo_11'] = null;
				$qtdTipos = (int)$this->input->post('qtd_tipos');
				for($i = 0; $i < $qtdTipos; $i++){
					$dadosProdutosEstoqueTipos['nome_tipo'. ($i+1)] = $this->input->post('nome_tipo'.($i+1));
					$dadosProdutosEstoqueTipos['estoque_tipo_'.($i+1)] = (int)$this->input->post('qtd_estoque_tipo'.($i+1));
				}
			}



			$dadosProdutos_estoque['ultima_atualizacao'] = dataDiaDb();
			//$dadosProdutos['id'] = $this->input->post('id');
			//$dadosProdutos['id_foto'] = $this->input->post('id_foto');
			//$dadosProdutos['foto'] = $this->input->post('foto');
			//$dadosProdutos['id_produto'] = $this->input->post('id_produto');
			//$id = $this->input->post('id');

			$dadosProdutos['meta_link'] = slug($this->input->post('nome_produto'));



			if($this->input->post('id_marca')){
				$dadosProdutos['id_marca'] = $this->input->post('id_marca');
			}else{
				$dadosProdutos['id_marca'] = null;
			}
			if($this->input->post('id_categoria')){
				$dadosProdutos['id_categoria'] = $this->input->post('id_categoria');
			}else{
				$dadosProdutos['id_categoria'] = null;
			}

			if($this->input->post('id')) {
				$id_produto = $this->input->post('id');

				$dadosProdutos['ultima_atualizacao'] = dataDiaDb();
				$this->produtosModel->doUpdate($dadosProdutos, $id_produto);
				if($dadosProdutos['possui_tamanho'] && $dadosProdutos['possui_tamanho'] != '0') {
					$retorno = $this->produtosModel->doUpdateEstoque($dadosProdutos_estoque, $id_produto);
					if($retorno == null){
						$dadosProdutos_estoque['id_produto'] = (int)$id_produto;
						$this->produtosModel->doInsertEstoque($dadosProdutos_estoque);
					}
				}

				if($dadosProdutos['possui_tipos'] && $dadosProdutos['possui_tipos'] != '0') {

					$retorno = $this->produtosModel->doUpdateEstoqueTipos($dadosProdutosEstoqueTipos, $id_produto);
					if($retorno == null){
						$dadosProdutosEstoqueTipos['id_produto'] = (int)$id_produto;
						$this->produtosModel->doInsertEstoqueTipos($dadosProdutosEstoqueTipos);
					}
				}

				if ($this->input->post('id_produto')) {

					$id_produto = $this->input->post('id_produto');


					//Apagar fotos antigas
					$this->produtosModel->doDeleteFotoProduto($id_produto);

				}
			}else{
				$dadosProdutos['data_cadastro'] = dataDiaDb();

				$this->produtosModel->doInsert($dadosProdutos);
				$id = $this->produtosModel->getProdutoNome($dadosProdutos['nome_produto'])->id;

				if($dadosProdutos['possui_tamanho'] && $dadosProdutos['possui_tamanho'] != '0') {
					$dadosProdutos_estoque['id_produto'] = (int)$id;
					$this->produtosModel->doInsertEstoque($dadosProdutos_estoque);
				}
				if($dadosProdutos['possui_tipos'] && $dadosProdutos['possui_tipos'] != '0') {
					if ($dadosProdutosEstoqueTipos) {
						$dadosProdutosEstoqueTipos['id_produto'] = (int)$id;
						$this->produtosModel->doInsertEstoqueTipos($dadosProdutosEstoqueTipos);
					}
				}
				$id_produto = $this->session->userdata('last_id');
			}

			/*foto_produto[
							'0' => 'foto1',
							'1' => 'foto2'
						}
						*/



			//Pega id do produto adicionado no banco
			//$id_produto = $this->session->userdata('user_id');
			//$id_produto = $this->input->post('id');



			$foto_produto = $this->input->post('foto_produto');

			$t_foto = count($foto_produto);//2
			for($i = 0; $i < $t_foto; $i++){
				$foto['id_produto'] = $id_produto;
				$foto['foto'] = $foto_produto[$i];
				$foto['principal'] = ($i == 0 ? 1 : 0);
				$this->produtosModel->doInsertFoto($foto);
			}


		}else{
			$this->modulo();
		}
		//var_dump($dadosProdutos);
		redirect('produtos');
	}

	public function del($id = null)
	{
		if($id){
			$this->produtosModel->doDelete($id);
			setMSG('msgCadastro', 'Produto apagado com sucesso', 'sucesso');
			redirect('produtos');

		}else{
			setMSG('msgCadastro', 'Produto não encontrado', 'erro');
			redirect('produtos');
		}
	}

	public function upload()
	{

		$pasta = base_directory . 'loja/images';
		$config['upload_path'] = $pasta;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
		$config['max_size'] = 20480;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);


		if($this->upload->do_upload('foto_produto')){
			$retorno['file_name'] = $this->upload->data('file_name');
			$retorno['msg'] = 'Foto enviada com sucesso';
			$retorno['erro'] = 0;
		}else{
			$retorno['msg'] = $this->upload->display_errors();
			$retorno['erro'] = 25;
		}
		//var_dump($this->upload->do_upload('foto_produto'));

		echo json_encode($retorno);
	}



}
