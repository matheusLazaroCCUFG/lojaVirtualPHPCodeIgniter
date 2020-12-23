<?php


class LojaModel extends \CI_Model
{
	public function getDadosLoja()
	{
		$this->db->where('id', 1);
		return $this->db->get('config')->row();
	}

	public function getCategorias()
	{
		$this->db->where(['ativo' => 1, 'id_categoriaspai' => '0']);
		return $this->db->get('categorias')->result();
	}

	public function getSubCategorias($id = null)
	{
		if($id){
			$this->db->where(['ativo' => 1, 'id_categoriaspai' => $id]);
			return $this->db->get('categorias')->result();
		}else{
			return false;
		}
	}

	public function getMarcas()
	{
		$this->db->select("marca.*");
		$this->db->from("marca");

		return $this->db->get()->result();
	}
}
