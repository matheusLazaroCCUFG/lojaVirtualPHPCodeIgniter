<?php


class Relatorios extends \App\Core\CoreController
{

	public function __construct()
	{
		parent::__construct();

		//if(!$this->ion_auth->is_admin()){
		//	redirect('');
		//}

		$this->load->library('form_validation');

		$this->load->model('relatoriosModel');
		$this->load->helper('helper_helper');


	}



	public function diario()
	{
		$data['titulo'] = 'Imprimir relatório de pedidos diários';
		$data['view'] = 'relatórioDiário';
		$data['loja'] = $this->relatoriosModel->getDadosLoja();
		$data['dados'] = $this->relatoriosModel->getPedido();

		$this->view('viewsStore/relatorioDiario', $data);

	}

	public function periodo(){
		$this->form_validation->set_rules('data_inicial', 'Data inicial' ,'trim|required');
		$this->form_validation->set_rules('data_final', 'Data final', 'trim|required');

		if ($this->form_validation->run() == true) {

			$data_inicial = formataDataDb($this->input->post('data_inicial'));
			$data_final = formataDataDb($this->input->post('data_final'));

			$query = $this->relatoriosModel->getRelatorioPeriodo([
				'data_cadastro >=' => $data_inicial,
				'data_cadastro <=' => $data_inicial
			]);

			$this->view_relatorio($query);
		}else{
			$data['titulo'] = 'Relatório de pedidos por período';
			$data['view'] = 'viewsStore/relatorioPeriodo';

			$this->load->view('viewsStore/relatorioPeriodo', $data);
		}
	}


	public function viewRelatorio($dados = null)
	{
		if($dados){
			$data['titulo'] = 'Relatório de pedidos por período';
			$data['view'] = 'viewsStore/relatoriosView';
			$data['pedido'] = $dados;

			$this->load->view('viewsStore/relatoriosView');
		}

	}

	public function mais_vendidos()
	{
		$data['titulo'] = 'Imprimir relatório de mais vendidos';
		$data['view'] = 'viewsStore/relatorioMaisVendidos';
		$data['loja'] = $this->relatoriosModel->getDadosLoja();
		$data['produtos'] = $this->relatoriosModel->getProdutosMaisVendidos();
		$this->view('viewsStore/relatorioMaisVendidos', $data);

	}
}
