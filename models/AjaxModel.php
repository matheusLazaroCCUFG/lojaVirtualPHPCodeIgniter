<?php

class AjaxModel extends CI_Model
{
	public function getParametrosEnvio(){
		$this->db->where(['id' => 1]);
		$this->db->limit(1);
		return $this->db->get('config_correio')->row();
	}

	public function getProduto($id = null)
	{
		if($id){
			$this->db->select('produtos.id, produtos.peso, produtos.altura, produtos.comprimento, produtos.largura');
			$this->db->from('produtos');
			$this->db->where(['id' => $id, 'ativo' => 1]);
			$this->db->limit(1);
			return $this->db->get()->row();
		}else{
			return false;
		}
	}
}
