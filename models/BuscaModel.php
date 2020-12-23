<?php


class BuscaModel extends CI_Model
{
	public function getBusca($palavra_chave = null, $limit = null, $offset = null, $ordenacao = null)//limit: limite por consulta; offset: qual página
	{
		/**
		 * Codeigniter
		 * $this->db->like('title', 'match', 'before');// '%match'  apenas no final
		 * $this->db->like('title', 'match', 'after');// 'match%' apenas no inicio
		 * $this->db->like('title', 'match', 'both');// '%match%' inicio e fim
		 */

		if($palavra_chave) {
			$this->db->select('produtos.*, produtos_fotos.foto');



			$this->db->select('produtos.*');
			$this->db->from('produtos');
			$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
			$this->db->where(['produtos.ativo' => 1 ]);
			$this->db->group_by('produtos.id');
			$this->db->like('produtos.nome_produto', $palavra_chave, 'both');

			if($limit){
				$this->db->limit($limit, $offset);
			}

			if(strcmp($ordenacao,"menorPreco") == 0){
				$this->db->order_by('produtos.valor', 'ASC');
			}else
			if($ordenacao == "maiorPreco") {
				$this->db->order_by('produtos.valor', 'DESC');
			}else
			if($ordenacao == "maisVendidos") {
				$this->db->order_by('produtos.vendidos', 'DESC');
			}else {
				$this->db->order_by('produtos.ultima_atualizacao');
			}

			return $this->db->get()->result();
		}
	}




	public function getTotal($palavra_chave = null)
	{
		/**
		 * Codeigniter
		 * $this->db->like('title', 'match', 'before');// '%match'  apenas no final
		 * $this->db->like('title', 'match', 'after');// 'match%' apenas no inicio
		 * $this->db->like('title', 'match', 'both');// '%match%' inicio e fim
		 */

		if($palavra_chave) {
			$this->db->select('produtos.*, produtos_fotos.foto');



			$this->db->select('produtos.*');
			$this->db->from('produtos');
			$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
			$this->db->where(['produtos.ativo' => 1 ]);
			$this->db->group_by('produtos.id');
			$this->db->like('produtos.nome_produto', $palavra_chave, 'both');

			//return $this->db->get()->result();
			return $this->db->get()->num_rows();
		}
	}
}
