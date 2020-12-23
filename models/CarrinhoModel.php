<?php

class CarrinhoModel extends CI_Model
{
	public function getProduto($id_produto)
	{
		if($id_produto){
			$this->db->select('produtos.*, produtos_fotos.foto');
			$this->db->from('produtos');
			$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
			$this->db->where(['produtos.ativo' => 1, 'produtos.id' => $id_produto, 'produtos_fotos.principal' => 1]);
			$this->db->limit(1);
			return $this->db->get()->row();
		}
	}

	public function getDimensao($id_produto)
	{
		if($id_produto){
			$this->db->select('produtos.*');
			$this->db->from('produtos');
			$this->db->where(['produtos.ativo' => 1, 'produtos.id' => $id_produto]);
			$this->db->limit(1);
			return $this->db->get()->row();
		}
	}

	public function getParametrosEnvio(){
		$this->db->where(['id' => 1]);
		$this->db->limit(1);
		return $this->db->get('config_correio')->row();
	}
}
