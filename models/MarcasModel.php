<?php

class MarcasModel extends \CI_Model
{
	public function getMarcas()
	{
		return $this->db->get('marca')->result();
	}

	public function doInsert($dados = null)
	{
		if (is_array($dados)) {
			$this->db->insert('marca', $dados);
			//echo $this->db->affected_rows();
			if ($this->db->affected_rows() > 0) {

				setMSG('msgCadastro', 'Marca cadastrada com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao cadastrar marca', 'erro');
			}
		} else {

			return false;
		}
	}

	public function getMarcaId($id = null)
	{
		if($id){
			$this->db->where('id', $id);
			$query = $this->db->get('marca');
			return $query->row();
		}
	}

	public function doUpdate($dados = null, $id = null)
	{
		if(is_array($dados)){
			$this->db->update('marca', $dados, array('id' => $id));

			if ($this->db->affected_rows() > 0) {

				setMSG('msgCadastro', 'Marca atualizada com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao atualizar marca', 'erro');
			}
		}
	}

	public function doDelete($id = null)
	{
		if($id){
			$this->db->delete('marca', array('id' => $id));

			if ($this->db->affected_rows() > 0) {

				setMSG('msgCadastro', 'Marca apagada com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao apagar marca', 'erro');
			}
		}
	}
}
