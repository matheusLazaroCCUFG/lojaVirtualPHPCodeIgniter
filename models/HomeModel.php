<?php

class HomeModel extends CI_Model
{
	public function getDadosLoja()
	{
		$this->db->where('id', 1);
		return $this->db->get('config')->row();
	}

		/*
	public function getProdutosDestaque($total_produtos = null)
	{
		if($total_produtos){
			$this->db->where(['ativo' => 1, 'destaque' => 1]);
			$this->db->limit($total_produtos);
			$this->db->order_by('id', 'RAMDOM');//Ordena os produtos de forma aleatória
			return $this->db->get('produtos')->result();
		}
	}*/

	public function maisVendidos()
	{
		$this->db->select("produtos.*, produtos_fotos.*");
		$this->db->from("produtos");
		$this->db->join("produtos_fotos", "produtos_fotos.id_produto = produtos.id", "left");
		$this->db->where('produtos.ativo', 1);
		$this->db->group_by('produtos.id');
		$this->db->order_by("produtos.vendidos", "DESC");
		$this->db->limit(4);
		return $this->db->get()->result();



	}

	public function produtosAleatorios()
	{
		$this->db->select("produtos.*, produtos_fotos.*");
		$this->db->from("produtos");
		$this->db->join("produtos_fotos", "produtos_fotos.id_produto = produtos.id", "left");
		$this->db->where("produtos.ativo", 1);
		$this->db->order_by("produtos.valor", "RANDOM");
		$this->db->limit(2);

		return $this->db->get()->result();

	}

	public function getProdutosDestaque($total_produtos = null)
	{
		if ($total_produtos) {
			$this->db->select('produtos.*, produtos_fotos.foto');
			$this->db->from('produtos');
			$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
			$this->db->where(['produtos.ativo' => 1, 'produtos.destaque' => 1]);
			$this->db->limit($total_produtos);
			$this->db->group_by('produtos.id');
			$this->db->order_by('produtos.id', 'RANDOM');//Ordena os produtos de forma aleatória
			return $this->db->get()->result();
		}else{
			return false;
		}
	}

	public function getBanners($id_banner)
	{
		$this->db->select("banners_home_fotos.*");
		$this->db->from("banners_home_fotos");
		$this->db->where("banners_home_fotos.id_banner", $id_banner);
		return $this->db->get()->result();
	}

	public function getFotosProduto($id_produto)
	{
		$this->db->select("produtos.id, produtos_fotos.id_produto, produtos_fotos.foto");
		$this->db->from("produtos");
		$this->db->join("produtos_fotos", "produtos_fotos.id_produto = produtos.id", "left");
		$this->db->where("produtos.id", $id_produto);

		return $this->db->get()->result();

	}


	public function getCategorias()
	{
		$this->db->where(['ativo' => 1]);//, 'id_categoriaspai' => '0']);
		return $this->db->get('categorias')->result();
	}

	public function  getProdutosCategoria($id_subcategoria = null)
	{//$id_categoria = subcategoria
		$this->db->where(['ativo' => 1, 'destaque' => 1, 'id_categoria' => $id_subcategoria]);
		$this->db->limit(8);
		$this->db->order_by('id', 'RANDOM');//Ordena os produtos de forma aleatória
		return $this->db->get('produtos')->result();
	}


	public function  getProdutosCategoriaHome($qtdDestaque = null, $subcats = null)
	{
		$this->db->select("
			produtos.*,
			produtos_fotos.*
		");
		$this->db->from("produtos");
		$this->db->join("produtos_fotos", "produtos_fotos.id_produto = produtos.id", "left");
		/*$str = "";
		$num = [];*/
		$i = 0;
		$num[$i] = 0;
		foreach ($subcats as $subcat){
			$num[$i] = (int)$subcat->id;
			$i++;
			//$str .= "produtos.id_categoria = '" . (string)$subcat->id . "' OR ";
		}
	//	$str .= "-";
		//$str = (string)(str_replace(" OR -", "", $str));
		//$consulta = "produtos.ativo = '1' AND produtos.destaque = '1' AND " . $str ."";
		//echo $consulta;
		//$this->db->where($consulta);
		$this->db->where_in("produtos.id_categoria", $num);
		$this->db->order_by('produtos.id', 'RANDOM');//Ordena os produtos de forma aleatória
		$this->db->limit($qtdDestaque);
		return $this->db->get()->result();
	}



	public function  getSubCat($idCategoria)
	{//$id_categoria = subcategoria
		$this->db->select("
			categorias.id
		");
		$this->db->from("categorias");
		$this->db->where(['categorias.id_categoriaspai' => $idCategoria]);
		return $this->db->get()->result();
	}
}
