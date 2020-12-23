<?php


class Pedidos extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		//if(!$this->ion_auth->is_admin()){
		//	redirect('');
		//}

		if(!$this->ion_auth->is_admin()){
			redirect('entrarAdm');
		}

		$this->load->library('form_validation');

		$this->load->model('pedidosModel');
		$this->load->helper('helper_helper');


	}

	public function index()
	{
		if($this->ion_auth->is_admin()) {
			$data['titulo'] = 'Lista de pedidos';
			$data['view'] = 'viewsStore/listarPedidos';
			$data['pedidos'] = $this->pedidosModel->getPedidos();
			$data['status'] = $this->pedidosModel->getStatus();
			$this->view('viewsStore/listarPedidos', $data);
		}

	}


	public function getPedido($id = null)
	{
		if(!$id){
			$retorno['erro'] = 58;
			$retorno['msg'] = 'Erro, você deve informar uma ID válida';
			echo json_encode($retorno);
			exit;
		}

		$query = $this->pedidosModel->getPedidoId($id);

		if(!$query){
			$retorno['erro'] = 59;
			$retorno['msg'] = 'Erro, não foi encontrado nenhum pedido com a ID informada';
			echo json_encode($retorno);
			exit;

		}

		switch ($query->status){
			case 1:
				$status = 'Aguardando pagamento';
				break;
			case 2:
				$status = 'Pagamento confirmado';
				break;
			case 3:
				$status = 'Enviado';
				break;
			default:
				$status = 'Cancelado';
				break;
		}

		$retorno['id_pedido'] = $query->id;
		$retorno['status'] = $status;
		$retorno['erro'] = 0;
		echo json_encode($retorno);
		exit;

	}

	public function getcodigo($id = null)
	{
		if(!$id){
			$retorno['erro'] = 58;
			$retorno['msg'] = 'Erro, você deve informar uma ID válida';
			echo json_encode($retorno);
			exit;
		}

		$query = $this->pedidosModel->getPedidoId($id);

		if(!$query){
			$retorno['erro'] = 59;
			$retorno['msg'] = 'Erro, não foi encontrado nenhum pedido com a ID informada';
			echo json_encode($retorno);
			exit;

		}

		$retorno['id_pedido'] = $query->id;
		$retorno['codigo'] = ($query->cod_rastreio != null ? $query->cod_rastreio : 'Não esiste codigo para este pedido');
		$retorno['erro'] = 0;
		echo json_encode($retorno);
	}

	public function mudarcodigo()
	{
		if($this->input->post('input_codigo')){
			$id_pedido = $this->input->post('input_id');
			$codigo['cod_rastreio'] = $this->input->post('input_codigo');
			$codigo['ultima_atualizacao'] = dataDiaDb();
			$this->pedidosModel->doUpdate($codigo, $id_pedido);

			$retorno['erro'] = 0;
			$retorno['msg'] = 'Pedido atualizado com sucesso';
			echo json_encode($retorno);
			exit;

		}else{
			$retorno['erro'] = 60;
			$retorno['msg'] = 'O campo código é obrigatório';
			echo json_encode($retorno);
			exit;
		}
	}

	public function imprimir($id = null)
	{
		if(!$id){
			echo 'Erro, você deve informar uma ID válida';
			exit;
		}

		$query = $this->pedidosModel->getPedidoId($id);

		if(!$query){
			echo 'Erro, não foi encontrado nenhum pedido com a ID informada';

			exit;

		}
		$produtos = $this->pedidosModel->getProdutosPedido($id);

		//var_dump($produtos);
		//exit;
		if($this->ion_auth->is_admin()) {
			$data['titulo'] = 'Imprimir pedido [ #' . $query->id . ']';
			$data['pedido'] = $query;
			$data['loja'] = $this->pedidosModel->getDadosLoja();
			$data['itens'] = $this->pedidosModel->getItens($query->id);
			$data['produtos'] = $produtos;

			$this->view('viewsStore/imprimirPedido', $data);
		}
	}

	public function diario()
	{
		$data['titulo'] = 'Imprimir relatório de pedidos diários';
		$data['view'] = 'relatórioDiário';
		$data['pedido'] = $query;
		$data['loja'] = $this->pedidosModel->getDadosLoja();
		$data['dados'] = $this->relatoriosModel->getPedido();

		$this->view('imprimirPedido', $data);

	}

	//Muda Status do pedido e diminui o estoque
	public function mudarStatusPedido($id_pedido = null, $status = null)
	{

		//$status = $this->input->post('status');
		$this->pedidosModel->updateStatusPedido($status, $id_pedido);

		setMSG('msgCadastro', 'Status atualizado', 'sucesso');
		//$this->view('viewsStore/listarPedidos', $data);

		//

		redirect('pedidos');
	}

	public function salvaCodRastreio($id_pedido = null)
	{
		$this->load->model('pagarModel');
		$this->form_validation->set_rules('codRastreio', 'Código de rastreio', "required");

		if($this->form_validation->run()) {
			$codigoRastreio = $this->input->post('codRastreio');
			$this->pagarModel->salvaCodRastreio($id_pedido, $codigoRastreio);
			setMSG('msgRastreio', 'Código de rastreio inserido!', 'sucesso');
			redirect("pedidos");
		}else{
			setMSG('msgRastreio', 'Insira um código de rastreio!', 'erro');
			redirect("pedidos");
		}

	}
}
