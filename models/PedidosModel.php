<?php

class PedidosModel extends \CI_Model
{
	public function getPedidos()
	{
		//return $this->db->get('pedidos')->result();

		$this->db->select('pedidos.*,
		 transacao.id_pedido,
		  transacao.status as idstatus,
		   status_pedido.titulo_status,
		    users.id as idUser, users.username, users.telefone');
		$this->db->from('pedidos');
		$this->db->join('status_pedido', 'status_pedido.id = pedidos.id_status', 'left');
		$this->db->join('users', 'users.id = pedidos.id_cliente', 'left');
		$this->db->join('transacao', 'transacao.id_pedido = pedidos.id', 'left');
		$this->db->order_by('data_cadastro', 'desc');//Mais recente para o mais antigo
		//$this->db->limit(10);
		return $this->db->get()->result();
	}

	public function getStatus()
	{
		$this->db->select('status_pedido.*');
		$this->db->from('status_pedido');

		return $this->db->get()->result();
	}

	public function getStatusTransacao()
	{
		$this->db->select('transacao.*');
		$this->db->from('transacao');

		return $this->db->get()->result();
	}

	public function getProdutosPedido2($id_pedido = null)
	{
		$this->db->select("pedidos.id, pedidos_produtos.id_pedido, pedidos_produtos.id_produto, pedidos_produtos.qtd, pedidos_produtos.tipo, pedidos_produtos.tamanho, produtos.id as idproduto, produtos.nome_produto");
		$this->db->from("pedidos");
		$this->db->join("pedidos_produtos", "pedidos_produtos.id_pedido = pedidos.id", "left");
		$this->db->join("produtos", "produtos.id = pedidos_produtos.id_produto", "left");
		$this->db->where("pedidos.id", $id_pedido);
		$this->db->group_by("pedidos_produtos.id_produto");
		return $this->db->get()->result();

	}


	public function getPedidoId($id = null)
	{
		$this->db->select('pedidos.*,
		 	users.id as idcliente,
			users.username,
			users.telefone,
			users.email,
			users.cep,
			users.endereco,
			users.complemento,
			users.numero,
			users.bairro,
			users.cidade,
			users.estado
		');
		$this->db->from('pedidos');
		$this->db->join('users', 'users.id = pedidos.id_cliente', 'left');
		//$this->db->join('pedidos_produtos', 'pedidos_produtos.id_pedido = pedidos.id', 'left');
		$this->db->where('pedidos.id', $id);
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	/*public function getProdutosPedido($id_pedido){
		$this->db->select('pedidos.id, users.id as idcliente, pedidos_produtos.id_pedido, pedidos_produtos.id_produto, pedidos_produtos.qtd,  pedidos_produtos.valor_unit,  pedidos_produtos.valor_total,  pedidos_produtos.tamanho, produtos.id as idproduto' );
		$this->db->from('pedidos');
		$this->db->join('users', 'users.id = pedidos.id_cliente', 'left');
		$this->db->join('pedidos_produtos', 'pedidos_produtos.id_pedido = pedidos.id', 'left');
		$this->db->join('produtos', 'produtos.id = pedidos_produtos.id_produto', 'left');
		$this->db->where('pedidos_produtos.id_pedido', $id_pedido);
		return $this->db->get()->result();

	}*/
	public function getProdutosPedido($id_pedido = null)
	{
		$this->db->select('users.id,
			pedidos.id as idpedido,
			pedidos.id_cliente as idclientepedidos,
			pedidos.total_produto,
			pedidos.total_frete,
			pedidos.total_pedido,
			pedidos.id_status,
			pedidos.data_cadastro,
			pedidos.forma_envio,
			pedidos.cod_rastreio,
			pedidos.ref,
			
			
			pedidos_produtos.id as idpedidosprodutos,
			pedidos_produtos.id_pedido as idpedidopedidosprodutos,
			pedidos_produtos.id_produto as idpedidopedidosprodutos,
			pedidos_produtos.qtd,
			pedidos_produtos.valor_unit,
			pedidos_produtos.valor_total,
			pedidos_produtos.tamanho,
			
			
			produtos.id as idproduto,
			produtos.nome_produto,
			produtos.cod_produto,
			produtos.valor,
			produtos.meta_link,			
			
			transacao.id as idtransacao,
			transacao.id_pedido as idpedidotransacao,
			transacao.id_cliente as idclientetransacao,
			transacao.cod_transacao,
			transacao.tipo,
			transacao.t_parcela,
			transacao.v_parcela,
			transacao.url_boleto,
			transacao.nome_banco,
			transacao.status,
			
			
			produtos_fotos.id_foto,
			produtos_fotos.id_produto as idprodutofoto,
			produtos_fotos.foto,
			
		');//, pedidos_produtos,*');
		$this->db->from('pedidos');
		$this->db->join('users', ' users.id = pedidos.id_cliente', 'left');
		$this->db->join('pedidos_produtos', 'pedidos_produtos.id_pedido = pedidos.id', 'left');
		$this->db->join('transacao', 'transacao.id_pedido = pedidos.id', 'left');
		$this->db->join('produtos', 'produtos.id = pedidos_produtos.id_produto', 'left');
		$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
		//$this->db->group_by('produtos_fotos.id_foto');
		$this->db->group_by(['produtos_fotos.id_produto', 'pedidos.id']);

		$this->db->order_by('pedidos.id', 'DESC');

		$this->db->where(['pedidos.id' => $id_pedido]);
		$array2 = $this->db->get()->result();
		$array = [];//
		$i = 0;
		foreach ($array2 as $produto){
			$array[$i] = $produto->idpedido;
			$i++;
		}

		$produtosPedido = [];//$produtoPedido[pedido][produto]

		$i = 0;

		foreach (array_count_values($array) as $pedido => $key){
			//echo '<pre>'; var_dump($pedido);
			$j = 0;
			foreach ($array2 as $produto){
				if($produto->idpedido == $pedido){
					$produtosPedido[$i][$j] = $produto;
					$j++;
				}

			}
			$i++;
		}
		//echo '<pre>'; var_dump($produtosPedido); echo '</pre>';
		//exit;
		return $produtosPedido;
		//return $this->db->get()->result();
	}

	/**
	 * @param null $dados
	 * @param null $condicao
	 * Atualizar a tabela config
	 */
	public function doUpdate($dados = null)
	{
		if(is_array($dados)){
			$this->db->update('config', $dados, array('id'=> 1));

			if($this->db->affected_rows() > 0){
				setMSG('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}else{
				setMSG('msgCadastro', 'Erro ao atualizar a configuração', 'erro');

			}
		}
	}

	public function doUpdatePagseguro($dados = null)
	{
		if(is_array($dados)){
			$this->db->update('config_pagseguro', $dados, array('id'=> 1));

			if($this->db->affected_rows() > 0){
				setMSG('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}else{
				setMSG('msgCadastro', 'Erro ao atualizar a configuração', 'erro');

			}
		}
	}

	/**
	 * Pega config pagseguro
	 */
	public function getConfigPagseguro()
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get('config_pagseguro');
		return $query->row();
	}

	public function doUpdateCorreios($dados = null)
	{
		if(is_array($dados)){
			$this->db->update('config_correio', $dados, array('id'=> 1));

			if($this->db->affected_rows() > 0){
				setMSG('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}else{
				setMSG('msgCadastro', 'Erro ao atualizar a configuração', 'erro');

			}
		}
	}

	/**
	 * Pega config pagseguro
	 */
	public function getConfigCorreios()
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get('config_correio');
		return $query->row();
	}

	public function getDadosLoja()
	{
		$this->db->select('config.empresa, config.telefone, config.email');
		$this->db->from('config');
		$this->db->where('id', 1);
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function getItens($id = null)
	{
		if($id) {
			$this->db->where('id_pedido', $id);
			return $this->db->get('pedidos_item')->result();
		}
	}

	public function updateStatusPedido($status = null, $id_pedido = null)
	{
		$dados['id_status'] = $status;//
		if(is_array($dados)){

			$this->db->update('pedidos', $dados, array('id'=> $id_pedido));

		}
	}

	public function diminuiEstoqueProdutosPedido($id_pedido = null)
	{

		//Buscar produtos do pedido e Verificar se o produto possui tamanhos
		$this->db->select('
			pedidos.id,
			pedidos_produtos.id_pedido,
			pedidos_produtos.id_produto,
			pedidos_produtos.tamanho,
			pedidos_produtos.tipo,
			pedidos_produtos.qtd,
			
			produtos.id as idproduto,
			produtos.estoque,
			produtos.possui_tamanho,
			produtos.possui_tipos,
			produtos.vendidos,
			
			tamanhos_produto.id_produto,
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
		$this->db->from('pedidos_produtos');
		$this->db->join('pedidos', 'pedidos.id = pedidos_produtos.id_pedido', 'left');
		$this->db->join('produtos', 'produtos.id = pedidos_produtos.id_produto', 'left');
		$this->db->join('tamanhos_produto', 'tamanhos_produto.id_produto = produtos.id', 'left');
		$this->db->where(['pedidos_produtos.id_pedido' => $id_pedido ]);
		//var_dump($this->db->get()->result());
		//exit;
		foreach ($this->db->get()->result() as $produto){


			if($produto->vendidos == null){
				$vendidos = 0;
			}else{
				$vendidos = $produto->vendidos;
			}

			$array['vendidos'] = $vendidos + 1;
			$this->db->update('produtos', $array, array('id'=> $produto->idproduto));

			if(!$produto->possui_tamanho){
				$dados1['estoque'] = $produto->estoque - $produto->qtd;
				$this->db->update('produtos', $dados1, array('id'=> $produto->idproduto));
			}


			if($produto->possui_tamanho == '1'){
				//$dados['estoque_'] = $status;
				if($produto->tamanho == 'P'){
					$dados2['estoque_p'] = $produto->estoque_p - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if($produto->tamanho == 'M'){
					$dados3['estoque_m'] = $produto->estoque_m - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados3, array('id_produto'=> $produto->id_produto));
				}
				if($produto->tamanho == 'G'){
					$dados4['estoque_g'] = $produto->estoque_g - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados4, array('id_produto'=> $produto->id_produto));
				}
				if($produto->tamanho == 'GG'){
					$dados5['estoque_gg'] = $produto->estoque_gg - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados5, array('id_produto'=> $produto->id_produto));
				}
			}else
			if($produto->possui_tipos== '1'){
				//$dados['estoque_'] = $status;
				if(strcmp($produto->tipo, $produto->nome_tipo1) == 0){
					$dados2['estoque_tipo_1'] = $produto->estoque_tipo_1 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo2) == 0){
					$dados3['estoque_tipo_2'] = $produto->estoque_tipo_2 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo3) == 0){
					$dados3['estoque_tipo_3'] = $produto->estoque_tipo_3 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo4) == 0){
					$dados3['estoque_tipo_4'] = $produto->estoque_tipo_4 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo5) == 0){
					$dados3['estoque_tipo_5'] = $produto->estoque_tipo_5 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo6) == 0){
					$dados3['estoque_tipo_6'] = $produto->estoque_tipo_6 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo7) == 0){
					$dados3['estoque_tipo_7'] = $produto->estoque_tipo_7 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo8) == 0){
					$dados3['estoque_tipo_8'] = $produto->estoque_tipo_8 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo9) == 0){
					$dados3['estoque_tipo_9'] = $produto->estoque_tipo_9 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo10) == 0){
					$dados3['estoque_tipo_10'] = $produto->estoque_tipo_10 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
				if(strcmp($produto->tipo, $produto->nome_tipo11) == 0){
					$dados3['estoque_tipo_11'] = $produto->estoque_tipo_11 - $produto->qtd;
					$this->db->update('tamanhos_produto', $dados2, array('id_produto'=> $produto->id_produto));
				}
			}
		}

		//$dados['id_status'] = $status;
		//return $this->db->get()->result();

		//$this->db->delete('users');
	}

}
