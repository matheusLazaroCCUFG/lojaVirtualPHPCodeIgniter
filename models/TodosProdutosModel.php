<?php


class TodosProdutosModel extends CI_Model
{
	public function getProdutos($limit = null, $offset = null, $ordenacao = null)
	{


			$this->db->select('produtos.*, produtos_fotos.foto');
			$this->db->from('produtos');
			$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
			$this->db->where('produtos.ativo', 1);
			//$this->db->limit(4);
			$this->db->group_by('produtos.id');

			//$this->db->order_by('rand()');//Ordena os produtos de forma aleatória
		//	var_dump($this->db->get()->result());

				$this->db->limit($limit, $offset);


			if(strcmp($ordenacao, 'menorPreco') == 0){
				$this->db->order_by('produtos.valor', 'ASC');
			}else
			if(strcmp($ordenacao, 'maiorPreco') == 0){
				$this->db->order_by('produtos.valor', 'DESC');
			}else
			if(strcmp($ordenacao, 'maisVendidos') == 0){
				$this->db->order_by('produtos.vendidos', 'DESC');
			}else{
				$this->db->order_by('produtos.ultima_atualizacao');
			}
			return $this->db->get()->result();

	}

	public function getCategoria($meta_link)
	{
		$this->db->where(['meta_link' => $meta_link, 'ativo' => 1]);
		$this->db->limit(1);
		return $this->db->get('categorias')->row();
	}

	public function getCategorias()
	{
		$this->db->where(['ativo' => 1]);
		return $this->db->get('categorias')->result();
	}

	public function getTotal()
	{

			$this->db->select('produtos.*, produtos_fotos.foto');
			$this->db->from('produtos');
			$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
			$this->db->where('produtos.ativo', 1);

		$this->db->group_by('produtos.id');
			//$this->db->limit($limit, $offset);

		//$this->db->order_by('rand()');//Ordena os produtos de forma aleatória
			//	var_dump($this->db->get()->result());

			return $this->db->get()->num_rows();

	}
}
