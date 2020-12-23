<?php

class DashboardModel extends  CI_Model
{
	public function getTotal($tabela = null)
	{
		if($tabela){
			$query = $this->db->get($tabela);
			return $query->num_rows();
		}
	}

	public function getVisitasIntervalo15($dataIntervalo)
	{
		$array = [];
		$i = 0;
		$count = 0;
		foreach ($dataIntervalo as $data) {
			$this->db->select('visitas.*');
			$this->db->from("visitas");
			$this->db->where("visitas.data", $data);
			$count = $this->db->get()->num_rows();
			$array[$i] = (string)$count;
			$i++;
		}
		//var_dump($array);
		return $array;
		//exit;
	}

	public function getPedidos()
	{
		$this->db->select('pedidos.id, pedidos.nome, pedidos.total_pedido, pedidos.data_cadastro, status_pedido.titulo_status, users.id, users.username');
		$this->db->from('pedidos');
		$this->db->join('status_pedido', 'status_pedido.id = pedidos.id_status');
		$this->db->join('users', 'users.id = pedidos.id_cliente');
		$this->db->order_by('data_cadastro', 'desc');//Mais recente para o mais antigo
		//$this->db->limit(10);
		return $this->db->get()->result();
	}

	public function getClientes()
	{
		$this->db->select('users.id, users.nome, users.data_cadastro');
		$this->db->from('users');
		//return $this->ion_auth->get_users_groups()->result();
		$this->db->order_by('data_cadastro', 'desc');
		$this->db->limit(25);
		return $this->db->get()->result();
	}


}
