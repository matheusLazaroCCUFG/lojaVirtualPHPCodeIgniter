<?php

namespace App\Core;

use Philo\Blade\Blade;

class CoreController extends \CI_Controller{

	/**
	 *@Blade
	 */
	protected $blade;

	/**
	 *$data Array
	 */
	protected $data;

public function __construct(){
	parent::__construct();
	//initialize instance blade.
	$this->blade = new Blade(VIEWPATH, APPPATH.'/cache/');

	$this->load->model('lojaModel');
	$this->load->model('configModel');
	$this->load->model('bannersHomeModel');
	$this->load->model('homeModel');
	$this->load->model('visitasModel');
	$this->load->library('carrinhoCompras');
	$this->load->library('cart');

}

	/**
	 * render view with Blade instance
	 */
	protected function view($view, $data = [], $return = false){
		$this->visitasModel->verificaUsuario();
		$data['logoLoja'] = $this->homeModel->getBanners(0);
		$data['tamanhoLogoLoja'] = ($this->bannersHomeModel->getTamanhoLogoLoja()[0]->tamanhoFoto ? $this->bannersHomeModel->getTamanhoLogoLoja()[0]->tamanhoFoto : 0);

		$this->data['title'] = "";
		$this->data['clienteLogado'] = ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin());
		$this->data['adminLogado'] = ($this->ion_auth->logged_in() && $this->ion_auth->is_admin());
		$this->data['logado'] = ($this->ion_auth->logged_in());
		$this->data['total'] = $this->cart->total();
		//Busca as informações da loja(config)
		$loja = $this->lojaModel->getDadosLoja();
		$this->data['titulo_loja'] = $loja->titulo;
		$this->data['dados_loja'] = $loja;

		//Busca as categorias
		$this->data['categorias_core'] = $this->lojaModel->getCategorias();
		$this->data['marcas'] = $this->lojaModel->getMarcas();
		$this->data['ambiente'] = $this->configModel->getConfigPagseguro()->ambiente;
		$this->data['vezesSemJuros'] = $this->configModel->getConfigPagseguro()->parcelas_sJuros;

		$this->data['tamanhoCarrinho'] = $this->cart->total_items();
		$this->load->model('lojaModel');
		foreach ($this->data['categorias_core'] as $categoria) {
			$this->data['subcategorias'][$categoria->id] = $this->lojaModel->getSubCategorias($categoria->id);

		}



		$this->data = array_merge($this->data, $data);
		$blview = $this->blade->view()->make($view, $this->data)->render();
		if(! $return )
			return print( $blview );
		return $blview;

	}

}
