<?php
/*
class ClientesModel extends \CI_Model
{
	public function getClientes()
	{
		return $this->db->get('clientes')->result();
	}

	public function doInsert($dados = null)
	{

		if(is_array($dados)){
			$this->db->insert('clientes', $dados);
			echo $this->db->affected_rows();
			if($this->db->affected_rows() > 0){
				echo "1";
				setMSG('msgCadastro', 'Cliente cadastrado com sucesso', 'sucesso');
			}else{
				echo "2";
				setMSG('msgCadastro', 'Erro ao cadastrar', 'erro');
			}
		}else{
			echo "3";
			return false;
		}
	}

	//Pega um cliente pela sua id
	public function getClienteId($id = null)
	{
		if($id){
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('clientes');
			return $query->row();
		}
	}
}
*/

class ClientesModel extends \CI_Model
{
	public function getClientes()
	{
		return $this->db->get('users')->result();
	}

	public function getClientesGrupo()
	{
		/*$this->db->select('
			produtos.*,
			categorias.nome,
			marca.nome_marca,
			marca.meta_link as meta_link_marca,
			categorias.meta_link as meta_link_categoria
		');
		$this->db->from('produtos');
		$this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
		$this->db->join('marca', 'marca.id = produtos.id_marca', 'left');
		$this->db->where(['produtos.ativo' => 1, 'produtos.meta_link' => $meta_link]);
		$this->db->limit(1);
		return $this->db->get()->row();*/

		$this->db->select('users.id, users_groups.group_id');
		$this->db->from('users');
		$this->db->join('users_groups', 'users_groups.user_id = users.id', 'left');

		return $this->db->get()->result();
	}

	public function doInsert($dados = null)
	{

		if (is_array($dados)) {

			$this->db->insert('users', $dados);
			//echo $this->db->affected_rows();
			if ($this->db->affected_rows() > 0) {
				//echo "1";
				setMSG('msgCadastro', 'Cliente cadastrado com sucesso', 'sucesso');
			} else {
				//echo "2";
				setMSG('msgCadastro', 'Erro ao cadastrar', 'erro');
			}
		} else {
			//echo "3";
			return false;
		}
	}

	//Pega um cliente pela sua id
	public function getClienteId($id = null)
	{
		if ($id) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('users');
			return $query->row();
		}
	}

	public function doUpdate($dados = null, $id = null)
	{
		if(is_array($dados) && $id){
			$this->db->update('users', $dados, array('id' => $id));

			if($this->db->affected_rows() > 0){
				setMSG('msgCadastro', 'Cliente atualizado com sucesso', 'sucesso');
			}else{
				var_dump($this->db->affected_rows());
				setMSG('msgCadastro', 'Erro ao atualizar cliente', 'erro');

			}
		}
	}
}
