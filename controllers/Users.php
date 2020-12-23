<?php

/**
 * Class Users
 * Cadastro e login de Usuário administrador
 */
class Users extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();
		/*
		if(!$this->ion_auth->logged_in()){
			redirect('entrar');
		}*/


		$this->load->library('form_validation');

		//$this->load->model('userModel');
		$this->load->helper('helper_helper');

		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		//$this->lang->load('auth');


	}

	public function index()
	{

		if($this->ion_auth->is_admin()) {
			if ($this->ion_auth->is_admin()) {
				$data['titulo'] = 'Usuário administrador';
				$data['usuarios'] = $this->ion_auth->users(1)->result();
				$data['registrarAdm'] = true;
				$this->view('viewsStore/users', $data);
			}
		}else{

				redirect('entrarAdm');

		}
	}

	public function login()
	{

		$data['adm'] = true;
		$this->form_validation->set_rules('Email', 'Email', "required");
		$this->form_validation->set_rules('Password', 'Senha', "required");

		if($this->form_validation->run() == true){
			$email = $this->input->post('Email');
			$password = $this->input->post('Password');
			$remember = ($this->input->post('conected') != null ? true : false);
			$this->ion_auth->login($email, $password, $remember);
			$data['registrarAdm'] = false;
			$data['usuarios'] = $this->ion_auth->users()->result();
			//$data['usuario'] = $this->ion_auth->user()->row();

			if($this->ion_auth->login($email, $password, $remember)){
				$data['titulo'] = 'Usuário administrador';
				//$this->ion_auth->logged_in() = false;
				setMSG('msgCadastro', "Sucesso ao entrar como usuário administrativo", "sucesso");
				$data['registrarAdm'] = true;
				//$this->load->view('viewsStore/user', $data);//
				//$this->load->view('viewsStore/dashboard', $data);//

				redirect('dashboard');


				//redirect('http://localhost/lojaVirtual/usuarios');
			}else{
				//echo "erro ao entrar";
				setMSG('msgCadastro', "Erro ao entrar como usuário administrativo", "erro");
				$this->view('viewsStore/login', $data);
				//redirect('http://localhost/lojaVirtual/entrar');
			}

		}else {
			$this->view('viewsStore/login', $data);
		}

		//var_dump($this->ion_auth->login($email, $password, $remember));

	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('');
	}
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email

		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->view('auth/forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity','ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if(empty($identity)) {

				if($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
//              $this->session->set_flashdata('message', $this->ion_auth->messages());
//              redirect("auth/login"); //we should display a confirmation page here instead of the login page
				$config = [
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.sendgrid.net',
					'smtp_port' => 465,
					'smtp_user' => 'apikey',
					'smtp_pass' => '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',
					'mailtype' => 'html'
				];
				$data = array(
					'identity'=>$forgotten['identity'],
					'forgotten_password_code' => $forgotten['forgotten_password_code'],
				);
				$this->load->library('email');
				$this->email->initialize($config);
				$this->load->helpers('url');
				$this->email->set_newline("\r\n");

				//$this->email->from('matheuscrf09@hotmail.com');
				//$this->email->to("matheuscrf009@gmail.com");

				$this->email->from('matheuscrf09@hotmail.com');
				$this->email->to($email);
				$this->email->subject("forgot password");
				$body = $this->load->view('auth/email/forgot_password.tpl.php',$data,TRUE);
				$this->email->message($body);

				if ($this->email->send()) {

					$this->session->set_flashdata('success','E-mail enviado com sucesso');
					return redirect('auth/login');
				}
				else {
					echo "Email not send .....";
					setMSG('EmailNaoEncontrado', 'Este email não está cadastrado no site!', 'erro');
					show_error($this->email->print_debugger());
				}
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password");
			}
		}
	}

	/**
	 * Disponível somente se estiver logado como adm
	 */
	public function register()
	{
		$data['titulo'] = 'Cadastro de Adminitrador';
		if($this->ion_auth->is_admin()) {

			$data['registrarAdm'] = false;


			$this->form_validation->set_rules('Username', 'Usuário administrador', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('Email', 'E-mail', 'trim|required|valid_email');
			$this->form_validation->set_rules('Password', 'Senha', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirmPassword', 'Confirmação de senha', 'required|matches[Password]');

			if ($this->form_validation->run() == true) {
				$data['registrarAdm'] = true;
				//echo "ok";

				$username = $this->input->post('Username');
				$email = $this->input->post('Email');
				$password = $this->input->post('Password');
				$additional_data = null;
				$group = array('1');//grupo administrador   array ('1', '3', '6'), $ user_id
				//$this->ion_auth->register($username, $password, $email, $additional_data, $group);
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
				//$this->load->view('viewsStore/users');

			} else {

				$this->view('viewsStore/registered', $data);
			}
			$this->view('viewsStore/registered', $data);
		}else{
			setMSG('msgCadastro', 'Para fazer cadastro administrativo, é necessário estado logado como administrador', 'erro');
			$this->view('viewsStore/login');
		}


	}

	public function modulo($id = null)
	{

		$dados = null;
		if($id){
			$data['titulo'] = 'Atualizar ';

			

			$dados = $this->clientesModel->getClienteId($id);

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
		$data['view'] = 'viewsStore/moduloAdm';
		$this->view('viewsStore/moduloAdm', $data);

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

		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('data_nascimento', 'DATA DE NASCIMENTO', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('cep', 'CEP', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('endereco', 'ENDERECO', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('numero', 'NUMERO', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('bairro', 'BAIRRO', 'trim|required|min_length[3]');
		//$this->form_validation->set_rules('complemento', 'COMPL', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('cidade', 'CIDADE', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('estado', 'ESTADO', 'trim|required|min_length[3]');
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
			//echo "ok";
			$this->session->set_flashdata('message', 'Your cart is empty!');
			//$this->load->view("viewsStore/modulo");
			//var_dump($this->input->post());

			$this->modulo();
			//$this->load->view('viewsStore/modulo');
		}
		//var_dump($this->input->post());
	}


	public function del($id = null)
	{
		if($id){

		}else{
			redirect('');
		}
	}





}
