<?php

class Home extends \App\Core\CoreController
{
	public function __construct()
	{


		parent::__construct();


		$this->load->library('form_validation');
		$this->load->model('categoriasModel');
		$this->load->model('homeModel');
		$this->load->model('lojaModel');
		$this->load->model('clientesModel');
		$this->load->model('produtosModel');
		$this->load->model('configModel');
		$this->load->helper('helper_helper');


	}



	public function index()
	{
		$data['aleatorio'] = $this->homeModel->produtosAleatorios();

		$data['config'] = $this->lojaModel->getDadosLoja();
		//$data['categorias'] = $this->categoriasModel->getCategorias();
		//$this->load->view('viewsStore/index', $data);
		$data['registrarAdm'] = false;
		$query = $this->homeModel->getDadosLoja();
		//$data['destaque'] = $this->homeModel->getProdutosDestaque($query->p_destaque);
		//var_dump($data['destaque']);
		//$data['destaqueFoto'] = $this->homeModel->getProdutosDestaqueFoto($query->p_destaque);
		//$categorias = $this->homeModel->getCategorias();
		$i = 0;



		//categorias principais destaque
		$data['categorias'] = $this->lojaModel->getCategorias();

	//	$data['Clientes'] = $this->clientesModel->getClientesGrupo();
	//	$counter = 0;
	//	foreach ($data['Clientes'] as $cliente){
		//	if($cliente->group_id == 3){
		//		$counter++;
		//	}
	//	}
	//	$data['qtdClientes'] = $counter;

	//	$data['Produtos'] = $this->produtosModel->getProdutosQtd();
	//	$counter = 0;
	//	foreach ($data['Produtos'] as $produto){
	//		$counter++;
	//	}
		//$data['qtdProdutos'] = $counter;

	//	$data['Categorias'] = $this->categoriasModel->getCategoriasQtd();
	//	$counter = 0;
	//	foreach ($data['Categorias'] as $categoria){
	//		$counter++;
	//	}
	//	$data['qtdCategorias'] = $counter;

		$data['banners1'] = $this->homeModel->getBanners(1);
		$data['banner2'] = $this->homeModel->getBanners(2);
		$data['banner3'] = $this->homeModel->getBanners(3);
		$data['banner4'] = $this->homeModel->getBanners(4);
		$data['banner5'] = $this->homeModel->getBanners(5);
	//	$data['banner6'] = $this->homeModel->getBanners(6);
		//$data['banner7'] = $this->homeModel->getBanners(7);
		//$data['banner8'] = $this->homeModel->getBanners(8);
	//	$data['banner9'] = $this->homeModel->getBanners(9);
		//$data['banner10'] = $this->homeModel->getBanners(10);

		$this->load->model("bannersHomeModel");
		$data['mensagemBanner2'] = $this->bannersHomeModel->getMensagemBanner(2);
		$data['mensagemBanner3'] = $this->bannersHomeModel->getMensagemBanner(3);
		$data['mensagemBanner4'] = $this->bannersHomeModel->getMensagemBanner(4);
		$data['mensagemBanner5'] = $this->bannersHomeModel->getMensagemBanner(5);

		$data['maisVendidos'] = $this->homeModel->maisVendidos();




		$this->view('viewsStore/home', $data);//DADOS SERÃO PASSADOS PARA A home E PARA principal
	}

	public function about()
	{
		$this->view('viewsStore/about');
	}

	public function contact()
	{
		$this->view('viewsStore/contact');
	}


	public function email()
	{
		$this->form_validation->set_rules('Name', 'Nome completo', "required");
		$this->form_validation->set_rules('Email', 'Nome completo', "required");
		$this->form_validation->set_rules('Subject', 'Nome completo', "required");
		$this->form_validation->set_rules('Message', 'Nome completo', "required");
		if($this->form_validation->run()) {//Grava e envia ao Pagseguro
			$this->load->model("configModel");
			$loja = $this->configModel->getConfig();

			$to = "matheuscrf009@gmail.com";
			$subject = "Contato - Site Loja Virtual " . $loja->empresa . " ";
			$subject .= "sobre: " . $this->input->post("Subject");
			$nome = $this->input->post("Name");
			$email = $this->input->post("Email");
			$mensagem = $this->input->post("Message");

			$config = [
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'LojaVirtualLazaroDeveloper@gmail.com',
				'smtp_pass' => 'SG.5bsoyKnQQlS9cuZfIucJ3w.',
				'mailtype' => 'html'
			];

				$this->load->library('email');
				$this->email->initialize($config);
				$this->load->helpers('url');
				$this->email->set_newline("\r\n");

				$this->email->from($email);
				$this->email->to("matheuscrf09@hotmail.com");
				$this->email->subject($subject);
				$body = "Nome: " . $nome . "<br>".
						"Email: " . $email . "<br>" .
						"Mensagem: " . $mensagem . "<br>" .
						"Data/hora " . date("d/m/Y H:i");
				$this->email->message($body);

				if ($this->email->send()) {
					setMSG("email", "Email enviado com sucesso!", "sucesso");
					$this->session->set_flashdata('success','E-mail enviado com sucesso');
					redirect("contato");
				}
				else {
					setMSG("email", "Erro ao enviar Email", "erro");
					show_error($this->email->print_debugger());
				}
		}else{
			//validation_errors()
			redirect("contato");
		}
	}






	public function mens()
	{
		$this->view('viewsStore/categoria');
	}

	public function womens()
	{
		$this->view('viewsStore/womens');
	}

	public function single()
	{
		$this->view('viewsStore/single');
	}

	public function icons()
	{
		$this->view('viewsStore/icons');
	}

	public function typography()
	{
		$this->view('viewsStore/typography');
	}



	/*
	public function mens()
	{
		$this->load->view('viewsStore/mens');
	}
	public function womens()
	{
		$this->load->view('viewsStore/womens');
	}

	public function about()
	{
		$this->load->view('viewsStore/about');
	}

	public function typography()
	{
		$this->load->view('viewsStore/typography');
	}

	public function contact()
	{
		$this->load->view('viewsStore/contact');
	}

	public function icons()
	{
		$this->load->view('viewsStore/icons');
	}

	public function single()
	{
		$this->load->view('viewsStore/single');
	}



	*/



	public function mail()
	{
		$this->load->view('viewsStore/mail');
	}

	public function products()
	{
		$this->load->view('viewsStore/products');
	}

	public function products1()
	{
		$this->load->view('viewsStore/products1');
	}

	public function registered()
	{
		$this->load->view('viewsStore/registered');
	}


}
/*document.querySelector("#bs-example-navbar-collapse-1 > ul > li:nth-child(3)")

 * <li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Men's wear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html"><img src="images/top2.jpg" alt=" "></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="mens.html">Clothing</a></li>
											<li><a href="mens.html">Wallets</a></li>
											<li><a href="mens.html">Footwear</a></li>
											<li><a href="mens.html">Watches</a></li>
											<li><a href="mens.html">Accessories</a></li>
											<li><a href="mens.html">Bags</a></li>
											<li><a href="mens.html">Caps &amp; Hats</a></li>
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="mens.html">Jewellery</a></li>
											<li><a href="mens.html">Sunglasses</a></li>
											<li><a href="mens.html">Perfumes</a></li>
											<li><a href="mens.html">Beauty</a></li>
											<li><a href="mens.html">Shirts</a></li>
											<li><a href="mens.html">Sunglasses</a></li>
											<li><a href="mens.html">Swimwear</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
 */
