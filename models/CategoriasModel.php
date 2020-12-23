<?php

class CategoriasModel extends \CI_Model
{
	public function getCategorias()
	{
		return $this->db->get('categorias')->result();
	}

	public function getCategoriasQtd()
	{
		$this->db->select('categorias.id');
		$this->db->from('categorias');
		return $this->db->get()->result();
	}

	public function doInsert($dados = null)
	{
		if (is_array($dados)) {
			$this->db->insert('categorias', $dados);
			//echo $this->db->affected_rows();
			if ($this->db->affected_rows() > 0) {

				setMSG('msgCadastro', 'Categoria cadastrada com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao cadastrar categoria', 'erro');
			}
		} else {

			return false;
		}
	}

	public function getCategoriaId($id = null)
	{
		if($id){
			$this->db->where('id', $id);
			$query = $this->db->get('categorias');
			return $query->row();
		}
	}

	public function doUpdate($dados = null, $id = null)
	{
		if(is_array($dados)){
			$this->db->update('categorias', $dados, array('id' => $id));

			if ($this->db->affected_rows() > 0) {

				setMSG('msgCadastro', 'Categoria atualizada com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao atualizar categoria', 'erro');
			}
		}
	}

	public function doDelete($id = null)
	{
		if($id){
			$this->db->delete('categorias', array('id' => $id));

			if ($this->db->affected_rows() > 0) {

				setMSG('msgCadastro', 'Categoria apagada com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao apagar categoria', 'erro');
			}
		}
	}
}
