<?php

class ProdutosModel extends CI_Model
{
	public function getProdutos()
	{
		$this->db->select('produtos.*, marca.nome_marca, categorias.nome');
		$this->db->from('produtos');
		$this->db->join('marca', 'marca.id = produtos.id_marca', 'left');//busca a relação de produto com marca
		//left: carrega produto mesmo sem marca
		$this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
		$this->db->order_by("produtos.id", "DESC");
		$query = $this->db->get();//Consulta concreta
		return $query->result();

	}
	public function getProdutosQtd()
	{
		$this->db->select('produtos.id');
		$this->db->from('produtos');
		return $this->db->get()->result();

	}

	public function getMarcas()
	{
		$this->db->where('ativo', 1);
		return $this->db->get('marca')->result();
	}

	public function getCategorias()
	{
		$this->db->where('ativo', 1);
		return $this->db->get('categorias')->result();
	}

	public function doInsert($dados = null)
	{
		if (is_array($dados)) {
			$this->db->insert('produtos', $dados);
			//echo $this->db->affected_rows();
			if ($this->db->affected_rows() > 0) {
				$last_id = $this->db->insert_id();
				$this->session->set_userdata('last_id', $last_id);
				setMSG('msgCadastro', 'Produtos cadastrado com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao cadastrar produto', 'erro');
			}
		} else {

			return false;
		}
	}
	public function doInsertEstoque($dados = null)
	{
		if (is_array($dados)) {
			$this->db->insert('tamanhos_produto', $dados);
			//echo $this->db->affected_rows();

		} else {

			return false;
		}
	}

	public function doInsertEstoqueTipos($dados = null)
	{
		$this->db->insert('tamanhos_produto', $dados);
		//echo $this->db->affected_rows();
	}

	public function doInsertFoto($dados = null)
	{
		if (is_array($dados)) {
			$this->db->insert('produtos_fotos', $dados);
		} else {

			return false;
		}
	}

	public function getProdutoId($id = null)
	{
		if($id){

			$this->db->select('tamanhos_produto.*, produtos.*');
			$this->db->from('produtos');
			$this->db->join('tamanhos_produto', 'tamanhos_produto.id_produto = produtos.id', 'left');

			$this->db->where('produtos.id', $id);
			//$this->db->limit(1);
			return $this->db->get()->row();

		}
	}
	public function getProdutoNome($nome = null)
	{


			$this->db->select('produtos.*');
			$this->db->from('produtos');
			$this->db->where('produtos.nome_produto', $nome);
			//$this->db->limit(1);
			return $this->db->get()->row();


	}

	//Pega fotos do produto
	public function getFotosProduto($id = null)
	{
		if($id){
			$this->db->where('id_produto', $id);
			$this->db->order_by('id_foto', 'ASC');
			return $this->db->get('produtos_fotos')->result();
		}else{
			return false;
		}
	}

	public function doDeleteFotoProduto($id = null)
	{
		if($id){
			$this->db->delete('produtos_fotos', ['id_produto' => $id]);
		}
	}


	public function doUpdate($dados = null, $id = null)
	{

		if(is_array($dados)){
			$this->db->update('produtos', $dados, array('id' => $id));

			if ($this->db->affected_rows() > 0) {

				setMSG('msgCadastro', 'Produto atualizado com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao atualizar produto', 'erro');
			}
		}
	}
	public function doUpdateEstoque($dados = null, $id = null)
	{

		if(is_array($dados)){
			$this->db->update('tamanhos_produto', $dados, array('id_produto' => $id));

		}
	}

	public function doUpdateEstoqueTipos($dados = null, $id = null)
	{

			if (is_array($dados)) {
				$this->db->update('tamanhos_produto', $dados, array('id_produto' => (int)$id));

			}

	}

	public function doDelete($id = null)
	{
		if($id){
			$this->db->delete('produtos', array('id' => $id));

			if ($this->db->affected_rows() > 0) {

				setMSG('msgCadastro', 'Produto apagado com sucesso', 'sucesso');
			} else {

				setMSG('msgCadastro', 'Erro ao apagar produto', 'erro');
			}
		}
	}
}
