<?php


class Config extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->is_admin()){
			redirect('entrarAdm');
		}

		$this->load->library('form_validation');

		$this->load->model('configModel');
		$this->load->helper('helper_helper');
		$this->load->model('lojaModel');



	}

	public function index()
	{
		if($this->input->post('corPrincipal')){

			$cor = $this->input->post('corPrincipal');
			$this->configModel->mudaCor($cor);
		}
		$this->form_validation->set_rules('titulo', 'titulo', 'required');
		if($this->form_validation->run() == true){


			$dados['titulo'] = $this->input->post('titulo');
			$dados['empresa'] = $this->input->post('empresa');
			$dados['cep'] = formatoDecimal($this->input->post('cep'));
			$dados['endereco'] = $this->input->post('endereco');
			$dados['bairro'] = $this->input->post('bairro');
			$dados['complemento'] = $this->input->post('complemento');
			$dados['cidade'] = $this->input->post('cidade');
			$dados['estado'] = $this->input->post('estado');
			$dados['telefone'] = $this->input->post('telefone');
			$dados['email'] = $this->input->post('email');
			$dados['p_destaque'] = $this->input->post('p_destaque');
			$dados['cpf'] = $this->input->post('cpf');
			$dados['nome_proprietario'] = $this->input->post('nome_proprietario');
			$dados['numWpp'] = $this->input->post('numWpp');
			$dados['linkInstagram'] = $this->input->post('linkInstagram');
			$dados['linkFacebook'] = $this->input->post('linkFacebook');
			$dados['data_atualizacao'] = dataDiaDb();
			$dados['possui_marcas'] = $this->input->post('possui_marcas');
			$dados['cnpj'] = $this->input->post('cnpj');
			$dados['combinarEntrega'] = $this->input->post('combinarEntrega');
			$dados['condicaoCombinarEntrega'] = $this->input->post('condicaoCombinarEntrega');
			$dados['extraTermosCondicoes'] = $this->input->post('extraTermosCondicoes');
			$dados['possuiValorMinimo'] = $this->input->post('possuiValorMinimo');
			$dados['valorMinimo'] = formatoDecimal( $this->input->post('valorMinimo'));
			$dados['pesoMaximoPedido'] = formatoDecimal( $this->input->post('pesoMaximoPedido'));

			$this->configModel->doUpdate($dados);
			redirect('config', 'refresh');
		}else{
			$data['titulo'] = 'Configuração da loja';
			$data['view'] = 'viewsStore/config';
			$data['query'] = $this->configModel->getConfig();

			$this->view('viewsStore/config', $data);
		}


	}



	public function pagseguro()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('token', 'Token', 'trim|required');

		if($this->form_validation->run() == true){

			$dados['data_atualizacao'] = dataDiaDb();
			$dados['email'] = $this->input->post('email');
			$dados['token'] = $this->input->post('token');
			$dados['boleto'] = $this->input->post('boleto');
			$dados['cartao'] = $this->input->post('cartao');
			$dados['transferencia'] = $this->input->post('transferencia');
			$dados['ambiente'] = $this->input->post('ambiente');
			$dados['parcelas_sJuros'] = $this->input->post('parcelas_sJuros');


			$this->configModel->doUpdatePagseguro($dados);
			redirect('configPagseguro', 'refresh');
		}else{
			$data['titulo'] = 'Configuração do PagSeguro';
			$data['view'] = 'viewsStore/configPagseguro';
			$data['query'] = $this->configModel->getConfigPagseguro();

			$this->view('viewsStore/configPagseguro', $data);
		}

	}

	public function correios()
	{
		$this->form_validation->set_rules('cep_origem', 'CEP de origem', 'trim|required');
		$this->form_validation->set_rules('valor_declarado', 'Valor Declarado', 'trim|required');

		if($this->form_validation->run() == true){

			$dados['data_atualizacao'] = dataDiaDb();
			$dados['cep_origem'] = $this->input->post('cep_origem');
			$dados['somar_frete'] = $this->input->post('somar_frete');
			$dados['valor_declarado'] = $this->input->post('valor_declarado');



			$this->configModel->doUpdateCorreios($dados);
			redirect('configCorreios', 'refresh');
		}else{
			$data['titulo'] = 'Configuração dos Correios';
			$data['view'] = 'viewsStore/configCorreios';
			$data['query'] = $this->configModel->getConfigCorreios();

			$this->view('viewsStore/configCorreios', $data);
		}

	}
}
