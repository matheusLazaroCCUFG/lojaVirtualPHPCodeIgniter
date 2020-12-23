<?php


class BannersHomeModel extends CI_Model
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
		');
		$this->db->from('produtos');
		$this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
		$this->db->join('marca', 'marca.id = produtos.id_marca', 'left');
		$this->db->join('tamanhos_produto', 'tamanhos_produto.id_produto = produtos.id', 'left');
		$this->db->where(['produtos.ativo' => 1, 'produtos.meta_link' => $meta_link]);
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function getTamanhoLogoLoja()
	{
		$this->db->select("mensagemBanner.*");
		$this->db->from("mensagemBanner");
		$this->db->where("mensagemBanner.id_banner", 0);
		return $this->db->get()->result();
	}

	public function doInsertFoto($dados = null)
	{
		if (is_array($dados)) {
			$this->db->insert('banners_home_fotos', $dados);
		} else {

			return false;
		}
	}

	public function doInsertMensagem($dados , $id_banner)
	{
		if (is_array($dados)) {
			$this->db->where("mensagemBanner.id_banner", $id_banner);
			$this->db->update("mensagemBanner", $dados);
		} else {

			return false;
		}
	}

	public function doInsertTamanho($dados, $id_banner)
	{

			$this->db->where("mensagemBanner.id_banner", 0);
			$this->db->update("mensagemBanner", $dados);


	}

	public function doDeleteFotoBanner($id_banner)
	{

			$this->db->delete('banners_home_fotos', ['id_banner' => (int)$id_banner]);

	}

	public function getFotosIdBanner($id_banner)
	{
		$this->db->where('id_banner', $id_banner);
		return $this->db->get('banners_home_fotos')->result();
	}

	public function getMensagemBanner($id_banner)
	{
		$this->db->where('id_banner', $id_banner);
		return $this->db->get('mensagemBanner')->result();
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

		$this->db->select('produtos.*, produtos_fotos.foto');
		$this->db->from('produtos');
		$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
		$this->db->where(['produtos.ativo' => 1, 'produtos.destaque' => 1, 'produtos.id_categoria' => $id_categoria]);
		$this->db->limit(10);
		$this->db->group_by('produtos.id');
		$this->db->order_by('rand()');//Ordena os produtos de forma aleatória
		return $this->db->get()->result();
	}

}
