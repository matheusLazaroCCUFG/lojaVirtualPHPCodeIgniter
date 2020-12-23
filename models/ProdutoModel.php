<?php


class ProdutoModel extends CI_Model
{
	public function getProdutoMetaLink($meta_link = null)
	{
		$this->db->select('
			produtos.*,
			categorias.nome,
			marca.nome_marca,
			marca.meta_link as meta_link_marca,
			categorias.meta_link as meta_link_categoria,
			tamanhos_produto.estoque_p,
			tamanhos_produto.estoque_m,
			tamanhos_produto.estoque_g,
			tamanhos_produto.estoque_gg,	
			tamanhos_produto.estoque_tipo_1,	
			tamanhos_produto.estoque_tipo_2,	
			tamanhos_produto.estoque_tipo_3,	
			tamanhos_produto.estoque_tipo_4,	
			tamanhos_produto.estoque_tipo_5,	
			tamanhos_produto.estoque_tipo_6,	
			tamanhos_produto.estoque_tipo_7,	
			tamanhos_produto.estoque_tipo_8,	
			tamanhos_produto.estoque_tipo_9,	
			tamanhos_produto.estoque_tipo_10,	
			tamanhos_produto.estoque_tipo_11,	
			tamanhos_produto.nome_tipo1,	
			tamanhos_produto.nome_tipo2,	
			tamanhos_produto.nome_tipo3,	
			tamanhos_produto.nome_tipo4,	
			tamanhos_produto.nome_tipo5,	
			tamanhos_produto.nome_tipo6,	
			tamanhos_produto.nome_tipo7,	
			tamanhos_produto.nome_tipo8,	
			tamanhos_produto.nome_tipo9,	
			tamanhos_produto.nome_tipo10,	
			tamanhos_produto.nome_tipo11,	
		');
		$this->db->from('produtos');
		$this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
		$this->db->join('marca', 'marca.id = produtos.id_marca', 'left');
		$this->db->join('tamanhos_produto', 'tamanhos_produto.id_produto = produtos.id', 'left');
		$this->db->where(['produtos.ativo' => 1, 'produtos.meta_link' => $meta_link]);
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function getFotos($id_produto)
	{
		$this->db->where('id_produto', $id_produto);
		return $this->db->get('produtos_fotos')->result();
	}


	public function getNovosProdutos()
	{

			$this->db->select('produtos.*, produtos_fotos.foto');
			$this->db->from('produtos');
			$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
			$this->db->where(['produtos.ativo' => 1, 'produtos.destaque' => 1]);
			$this->db->limit(4);
			$this->db->group_by('produtos.id');
			$this->db->order_by('rand()');//Ordena os produtos de forma aleatória
			return $this->db->get()->result();
	}

	public function getProdutosCategoria($id_categoria)
	{

		$this->db->select('produtos.id, produtos.valor, produtos.nome_produto, produtos.meta_link, produtos.ultimaParcelaVezes, produtos.ultimaParcelaValor, produtos_fotos.foto');
		$this->db->from('produtos');
		$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
		$this->db->where(['produtos.ativo' => 1, 'produtos.destaque' => 1, 'produtos.id_categoria' => $id_categoria]);
		$this->db->limit(10);
		$this->db->group_by('produtos.id');
		$this->db->order_by('rand()');//Ordena os produtos de forma aleatória
		return $this->db->get()->result();
	}

}
