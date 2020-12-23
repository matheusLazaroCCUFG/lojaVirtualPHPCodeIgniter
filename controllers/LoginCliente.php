<?php


class LoginCliente extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('helper_helper');
		$this->load->model('clientesModel');


	}

	public function mostraCliente()
	{

		if($this->ion_auth->logged_in()) {
			if (!$this->ion_auth->is_admin()) {


				$data['titulo'] = 'Cliente';
				//$this->ion_auth->logged_in() = false;
				setMSG('msgCadastro', "Sucesso ao entrar como usuário cliente", "sucesso");
				$data['registrarAdm'] = false;
				$data['usuario'] = $this->ion_auth->user()->row();
				$this->view('viewsStore/user', $data);//
			}
		}
	}

	public function mostraClientes()
	{

		if($this->ion_auth->logged_in()) {
			if ($this->ion_auth->is_admin()) {


				$data['titulo'] = 'Clientes';
				//$this->ion_auth->logged_in() = false;
				//setMSG('msgCadastro', "Sucesso ao entrar como usuário cliente", "sucesso");
				//$data['registrarAdm'] = false;
				$data['usuarios'] = $this->ion_auth->users(3)->result();
				$this->view('viewsStore/clientes', $data);//
			}else{
				redirect('entrarAdm');
			}
		}
	}

	//////////////////////FAZER CONFIRMAÇÃO DE EMAIL E RECUPERAÇÃO DE SENHA
	public function register()
	{
			$data['registrarAdm'] = false;
			$this->form_validation->set_rules('Username', 'Nome de usuário', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('Email', 'Email', "required|valid_email|is_unique[users.email]",  ['is_unique' => 'Este Email já foi cadastrado na loja! Faça login.']);//is_unique: verifica se é um email único
			$this->form_validation->set_rules('Password', 'Senha', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirmPassword', 'Confirmação de senha', 'required|matches[Password]');

			if ($this->form_validation->run() == true) {

				//echo "ok";

				$username = $this->input->post('Username');
				$email = $this->input->post('Email');
				$password = $this->input->post('Password');
				$additional_data = [
					'data_cadastro' => dataDiaDb()
				];
				$group = ['3'];//grupo clientes

				if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
					//setMSG('msgCadastro', 'Usuário cadastrado com sucesso', 'sucesso');

					$CI =& get_instance();

					$CI->session->set_flashdata('msgCadastro', '<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso' . '</div>');

					//fazer confirmação de cadastro no email

					//$this->load->view('viewsStore/users');
				} else {
					//setMSG('msgCadastro', 'Erro ao cadastrar', 'erro');
					$CI =& get_instance();

					$CI->session->set_flashdata('msgCadastro', '<div class="alert alert-danger" role="alert">Erro ao cadastrar' . '</div>');
				}
				//var_dump($this);
				$this->login();
				//$data['adm'] = false;
				//$this->view('viewsStore/login', $data);
				//$this->view('viewsStore/login', $data);

			} else {

				$data['titulo'] = 'Cadastro de cliente';
				$this->view('viewsStore/registered', $data);
			}


	}

	public function login()
	{
			$data['adm'] = false;
		$this->form_validation->set_rules('Email', 'Email', "required|valid_email");//is_unique: verifica se é um email único

		$this->form_validation->set_rules('Password', 'Senha', "required");

			if ($this->form_validation->run() == true) {
				$email = $this->input->post('Email');
				$password = $this->input->post('Password');
				$remember = ($this->input->post('conected') != null ? true : false);
				$this->ion_auth->login($email, $password, $remember);
				$data['registrarAdm'] = false;
				//$data['usuarios'] = $this->ion_auth->users()->result();
				$data['usuario'] = $this->ion_auth->user()->row();

				if($this->ion_auth->is_admin()){
					$this->ion_auth->logout();
					$x = 'entrarAdm';
					setMSG('msgCadastro', "Você inseriu um login de administrador, acesse <a href='$x'>Aqui</a>", 'erro');
					$this->view('viewsStore/login', $data);
				}

				if ($this->ion_auth->logged_in()) {
					$data['titulo'] = 'Cliente';
					//$this->ion_auth->logged_in() = false;
					setMSG('msgCadastro', "Sucesso ao entrar como usuário cliente", "sucesso");
					$data['registrarAdm'] = false;
					//$this->load->view('viewsStore/user', $data);//

					//mandar email de confirmação
					//$this->view('viewsStore/pedidosRealizados', $data);//
					redirect("pedidosRealizados");

					//redirect('http://localhost/lojaVirtual/usuarios');
				}else {
					//echo "erro ao entrar";
					setMSG('msgCadastro', "Erro ao entrar. Verifique sua senha", "erro");
					$this->view('viewsStore/login', $data);
					//redirect('http://localhost/lojaVirtual/entrar');
				}

			} else {
				$this->view('viewsStore/login', $data);
			}
			//$this->load->view('viewsStore/login', 'refresh');
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('');
	}

	public function modulo($id = null)
	{

		$dados = null;
		if($id){
			$data['titulo'] = 'Atualizar ';



			$dados = $this->ion_auth->user()->row();

			if(!$dados){
				setMSG('msgCadastro', 'Cliente não encontrado', 'erro');
				redirect('usuarios');
			}
		}else{
			//$data['titulo'] = 'Novo cliente';
			$data['titulo'] = 'Informações de usuário';
		}
		//echo $dados->id;
		$data['dados'] = $dados;
		$data['view'] = 'viewsStore/moduloCliente';
		$this->view('viewsStore/moduloCliente', $data);

	}

	public function core()
	{
		/*(array) [11 elements]
			nome: (string) "fasdfasdfasd"
			cpf: (string) "223.332.32"
			data_nascimento: (string) ""
			cep: (string) ""
			endereco: (string) ""
			numero: (string) ""
			bairro: (string) ""
			complemento: (string) ""
			cidade: (string) ""
			estado: (string) ""
			["telefone"]=> string(0) ""
		}
		*/

		$this->form_validation->set_rules('Username', 'Nome completo', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('data_nascimento', 'DATA DE NASCIMENTO', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('cep', 'CEP', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('endereco', 'ENDERECO', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('numero', 'NUMERO', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('bairro', 'BAIRRO', 'trim|required|min_length[3]');
		//$this->form_validation->set_rules('complemento', 'COMPL', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('cidade', 'CIDADE', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('estado', 'ESTADO', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('telefone', 'TELEFONE', 'trim|required|min_length[3]');


		echo "normal";
		if($this->form_validation->run() == true){

			date_default_timezone_set('America/Sao_paulo');
			$formato = 'DATE_W3C';
			$hora = time();
			$data = date($formato, $hora);

			$dadosClientes['Username'] = $this->input->post('Username');
			$dadosClientes['nome'] = $this->input->post('nome');
			$dadosClientes['cpf'] = $this->input->post('cpf');
			$dadosClientes['data_nascimento'] = formataDataDb($this->input->post('data_nascimento'));
			$dadosClientes['cep'] = $this->input->post('cep');
			$dadosClientes['endereco'] = $this->input->post('endereco');
			$dadosClientes['numero'] = $this->input->post('numero');
			$dadosClientes['bairro'] = $this->input->post('bairro');
			$dadosClientes['complemento'] = $this->input->post('complemento');
			$dadosClientes['cidade'] = $this->input->post('cidade');
			$dadosClientes['estado'] = $this->input->post('estado');
			$dadosClientes['telefone'] = $this->input->post('telefone');
			$dadosClientes['data_cadastro'] = $data;

			if($this->input->post('id')){

				//atualiza cadastro
				$dadosClientes['ultima_atualizacao'] = dataDiaDb();
				$id = $this->input->post('id');
				echo ' x' . $dadosClientes['ultima_atualizacao'] . ' y'. $id;
				$this->clientesModel->doUpdate($dadosClientes, $id);
				var_dump($dadosClientes);
				//redirect('');
				$dadosClientes['titulo'] = 'Dados atualizados';
				$dadosClientes['usuario'] = $this->ion_auth->user()->row();
				redirect("moduloCliente/$id",);
				//$this->load->view('viewsStore/user', $dadosClientes);
			}else{
				//novo cadastro

				$dadosClientes['data_cadastro'] = dataDiaDb();
				$this->clientesModel->doInsert($dadosClientes, $this->input->post('id'));
				redirect('moduloCliente', 'refresh');
			}

			//$this->clientesModel->doInsert($dadosClientes);
			//redirect('moduloCliente', 'refresh');
		}else{
			echo "ok";
			$this->session->set_flashdata('message', 'Your cart is empty!');
			//$this->load->view("viewsStore/modulo");
			//var_dump($this->input->post());

			$this->modulo();
			//$this->load->view('viewsStore/modulo');
		}
		//var_dump($this->input->post());
	}


}
