<?php

class PagarModel extends \CI_Model
{
	public function getConfigPagseguro()
	{
		$this->db->where('id', 1);
		return $this->db->get('config_pagseguro')->row();
	}

	public function doInsertCliente($dados = null)
	{
		if (is_array($dados)) {
			$this->db->insert('users', $dados);
			$last_id = $this->db->insert_id();
			$this->session->set_userdata('last_id', $last_id);
			//echo $this->db->affected_rows();
			if ($this->db->affected_rows() > 0) {
				//echo "1";
				setMSG('msgCadastro', 'Cliente cadastrado com sucesso', 'sucesso');
			} else {
				//echo "2";
				setMSG('msgCadastro', 'Erro ao cadastrar', 'erro');
			}
		}else{

		}
	}

	public function getAmbiente()
	{
		$this->db->where('id', 1);
		$query = $this->db->get('config_pagseguro')->row();

		if($query->ambiente == 1){
			return 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';
		}else{
			return 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';
		}
	}

	public function getConfig()
	{
		$this->db->where('id', 1);
		return $this->db->get('config_pagseguro')->row();
	}

	public function getClienteId($id = null)
	{
		if($id) {
			//$this->db->where('id', $id);
			//$this->db->get('users')
			//$this->ion_auth->users()->result()
			//$this->load->model('ion_auth_model');
			$this->db->select('users.*');
			$this->db->from('users');
			$this->db->where('id', $id);
			if ($this->ion_auth->in_group(['3'], $id)) {

				return $this->db->get('users')->row();
			}
		}else{
			return false;
		}
	}


	public function doInsertPedido($dados = null)
	{
		if(is_array($dados)){
			$this->db->insert('pedidos', $dados);
			$last_id = $this->db->insert_id();
			$this->session->set_userdata('last_id', $last_id);
		}
	}

	public function doInsertPedidoProdutos($dados = null)
	{
		if(is_array($dados)){
			$this->db->insert('pedidos_produtos', $dados);
		}
	}

	public function doInsertPedidoTransacao($dados = null)
	{
		if(is_array($dados)){
			$this->db->insert('transacao', $dados);
		}
	}

	/*public function getPedidosCliente($id = null)
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
		$this->db->from('users');
		$this->db->join('pedidos', 'pedidos.id_cliente = users.id', 'left');
		$this->db->join('pedidos_produtos', 'pedidos_produtos.id_pedido = pedidos.id', 'left');
		$this->db->join('transacao', 'transacao.id_cliente = users.id', 'left');
		$this->db->join('produtos', 'produtos.id = pedidos_produtos.id_produto', 'left');
		$this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
		//$this->db->group_by('produtos_fotos.id_foto');
		$this->db->group_by(['produtos.id', 'pedidos.id']);
		//$this->db->group_by('pedidos.id');

		$this->db->order_by('pedidos.id', 'DESC');
		//$this->db->group_by('pedidos.id');
		//$this->db->group_by('produtos_fotos.id_foto');
		//$this->db->group_by('pedidos.id');
		//$this->db->join('pedidos_produtos', 'pedidos_produtos.id_pedido = pedidos.id', 'left');
		//$this->db->where(['produtos.ativo' => 1, 'produtos.id' => $id_produto, 'produtos_fotos.principal' => 1]);
		$this->db->where(['pedidos.id_cliente' => $id]);
		//$this->db->limit(1);
		/*$idpedido = '';
		$qtdPedidos = 0;
		foreach ($this->db->get()->result() as $produto){//Busca quantidade de pedidos

		}//

		return $this->db->get()->result();
	}*/
	public function idUltimoPedido()
	{
		$this->db->select("pedidos.id");
		$this->db->from("pedidos");
		$this->db->order_by("pedidos.id", "DESC");
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function diminuirEstoque($idProduto = null, $quantidade = null, $tipoTamanho = null)
	{
		$this->db->select("produtos.*, tamanhos_produto.*");
		$this->db->from("produtos");
		$this->db->join("tamanhos_produto", "tamanhos_produto.id_produto = produtos.id", "left");
		$this->db->where("produtos.id", $idProduto);
		$resultado = $this->db->get()->row();

		//Aumentar Vendidos
		if($resultado->vendidos == null){
			$vendidos = 0;
		}else{
			$vendidos = (int)$resultado->vendidos;
		}
		$array['vendidos'] = $vendidos + (int)$quantidade;
		$this->db->update('produtos', $array, array('id'=> $idProduto));
		$quantidade = (int)$quantidade;
		if($resultado->possui_tamanho == 1){
			$this->db->where("tamanhos_produto.id_produto", $idProduto);
			$data = null;
			if(strcmp($tipoTamanho, 'P') == 0){
				$data = [
					'estoque_p' => $resultado->estoque_p - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, 'M') == 0){
				$data = [
				'estoque_m' => $resultado->estoque_m - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, 'G') == 0){
				$data = [
					'estoque_g' => $resultado->estoque_g - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, 'GG') == 0){
				$data = [
					'estoque_gg' => $resultado->estoque_gg - $quantidade
				];
			}
			$this->db->update("tamanhos_produto", $data);
		}else
		if($resultado->possui_tipos == 1){
			$this->db->where("tamanhos_produto.id_produto", $idProduto);
			$data2 = null;

			if(strcmp($tipoTamanho, $resultado->nome_tipo1) == 0){
				$data2 = [
					'estoque_tipo_1' => $resultado->estoque_tipo_1 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo2) == 0){
				$data2 = [
					'estoque_tipo_2' => $resultado->estoque_tipo_2 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo3) == 0){
				$data2 = [
					'estoque_tipo_3' => $resultado->estoque_tipo_3 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo4) == 0){
				$data2 = [
					'estoque_tipo_4' => $resultado->estoque_tipo_4 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo5) == 0){
				$data2 = [
					'estoque_tipo_5' => $resultado->estoque_tipo_5 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo6) == 0){
				$data2 = [
					'estoque_tipo_6' => $resultado->estoque_tipo_6 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo7) == 0){
				$data2 = [
					'estoque_tipo_7' => $resultado->estoque_tipo_7 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo8) == 0){
				$data2 = [
					'estoque_tipo_8' => $resultado->estoque_tipo_8 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo9) == 0){
				$data2 = [
					'estoque_tipo_9' => $resultado->estoque_tipo_9 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo10) == 0){
				$data2 = [
					'estoque_tipo_10' => $resultado->estoque_tipo_10 - $quantidade
				];
			}else
			if(strcmp($tipoTamanho, $resultado->nome_tipo11) == 0){
				$data2 = [
					'estoque_tipo_11' => $resultado->estoque_tipo_11 - $quantidade
				];
			}
			$this->db->update("tamanhos_produto", $data2);
		}else{
			$this->db->where("produtos.id", $idProduto);
			$data3['estoque'] = $resultado->estoque - $quantidade;
			$this->db->update("produtos", $data3);
		}


		$this->db->select("produtos.*, tamanhos_produto.*");
		$this->db->from("produtos");
		$this->db->join("tamanhos_produto", "tamanhos_produto.id_produto = produtos.id", "left");
		$this->db->where("produtos.id", $idProduto);
		$resultado2 = $this->db->get()->row();
		if(($resultado2->estoque <= 0 || !$resultado2->estoque) &&
			($resultado2->estoque_p <= 0 || !$resultado2->estoque_p) &&
			($resultado2->estoque_m <= 0 || !$resultado2->estoque_m) &&
			($resultado2->estoque_g <= 0 || !$resultado2->estoque_g) &&
			($resultado2->estoque_gg <= 0 || !$resultado2->estoque_gg) &&

			($resultado2->estoque_tipo_1 <= 0 || !$resultado2->estoque_tipo_1) &&
			($resultado2->estoque_tipo_2 <= 0 || !$resultado2->estoque_tipo_2) &&
			($resultado2->estoque_tipo_3 <= 0 || !$resultado2->estoque_tipo_3) &&
			($resultado2->estoque_tipo_4 <= 0 || !$resultado2->estoque_tipo_4) &&
			($resultado2->estoque_tipo_5 <= 0 || !$resultado2->estoque_tipo_5) &&
			($resultado2->estoque_tipo_6 <= 0 || !$resultado2->estoque_tipo_6) &&
			($resultado2->estoque_tipo_7 <= 0 || !$resultado2->estoque_tipo_7) &&
			($resultado2->estoque_tipo_8 <= 0 || !$resultado2->estoque_tipo_8) &&
			($resultado2->estoque_tipo_9 <= 0 || !$resultado2->estoque_tipo_9) &&
			($resultado2->estoque_tipo_10 <= 0 || !$resultado2->estoque_tipo_10) &&
			($resultado2->estoque_tipo_11 <= 0 || !$resultado2->estoque_tipo_11)
		){
			$this->db->where("produtos.id", $idProduto);
			$dimEstoque['ativo'] = 0;
			$this->db->update("produtos", $dimEstoque);
		}

	}




	public function retornarEstoque($idProduto = null, $quantidade = null, $tipoTamanho = null)
	{
		$this->db->select("produtos.*, tamanhos_produto.*");
		$this->db->from("produtos");
		$this->db->join("tamanhos_produto", "tamanhos_produto.id_produto = produtos.id", "left");
		$this->db->where("produtos.id", $idProduto);
		$resultado = $this->db->get()->row();

		//Aumentar Vendidos
		if($resultado->vendidos == null){
			$vendidos = 0;
		}else{
			$vendidos = (int)$resultado->vendidos;
		}
		$array['vendidos'] = $vendidos - (int)$quantidade;
		$this->db->update('produtos', $array, array('id'=> $idProduto));
		$quantidade = (int)$quantidade;
		if($resultado->possui_tamanho == 1){
			$this->db->where("tamanhos_produto.id_produto", $idProduto);
			$data = null;
			if(strcmp($tipoTamanho, 'P') == 0){
				$data = [
					'estoque_p' => $resultado->estoque_p + $quantidade
				];
			}else
				if(strcmp($tipoTamanho, 'M') == 0){
					$data = [
						'estoque_m' => $resultado->estoque_m + $quantidade
					];
				}else
					if(strcmp($tipoTamanho, 'G') == 0){
						$data = [
							'estoque_g' => $resultado->estoque_g + $quantidade
						];
					}else
						if(strcmp($tipoTamanho, 'GG') == 0){
							$data = [
								'estoque_gg' => $resultado->estoque_gg + $quantidade
							];
						}
			$this->db->update("tamanhos_produto", $data);
		}else
			if($resultado->possui_tipos == 1){
				$this->db->where("tamanhos_produto.id_produto", $idProduto);
				$data2 = null;

				if(strcmp($tipoTamanho, $resultado->nome_tipo1) == 0){
					$data2 = [
						'estoque_tipo_1' => $resultado->estoque_tipo_1 + $quantidade
					];
				}else
					if(strcmp($tipoTamanho, $resultado->nome_tipo2) == 0){
						$data2 = [
							'estoque_tipo_2' => $resultado->estoque_tipo_2 + $quantidade
						];
					}else
						if(strcmp($tipoTamanho, $resultado->nome_tipo3) == 0){
							$data2 = [
								'estoque_tipo_3' => $resultado->estoque_tipo_3 + $quantidade
							];
						}else
							if(strcmp($tipoTamanho, $resultado->nome_tipo4) == 0){
								$data2 = [
									'estoque_tipo_4' => $resultado->estoque_tipo_4 + $quantidade
								];
							}else
								if(strcmp($tipoTamanho, $resultado->nome_tipo5) == 0){
									$data2 = [
										'estoque_tipo_5' => $resultado->estoque_tipo_5 + $quantidade
									];
								}else
									if(strcmp($tipoTamanho, $resultado->nome_tipo6) == 0){
										$data2 = [
											'estoque_tipo_6' => $resultado->estoque_tipo_6 + $quantidade
										];
									}else
										if(strcmp($tipoTamanho, $resultado->nome_tipo7) == 0){
											$data2 = [
												'estoque_tipo_7' => $resultado->estoque_tipo_7 + $quantidade
											];
										}else
											if(strcmp($tipoTamanho, $resultado->nome_tipo8) == 0){
												$data2 = [
													'estoque_tipo_8' => $resultado->estoque_tipo_8 + $quantidade
												];
											}else
												if(strcmp($tipoTamanho, $resultado->nome_tipo9) == 0){
													$data2 = [
														'estoque_tipo_9' => $resultado->estoque_tipo_9 + $quantidade
													];
												}else
													if(strcmp($tipoTamanho, $resultado->nome_tipo10) == 0){
														$data2 = [
															'estoque_tipo_10' => $resultado->estoque_tipo_10 + $quantidade
														];
													}else
														if(strcmp($tipoTamanho, $resultado->nome_tipo11) == 0){
															$data2 = [
																'estoque_tipo_11' => $resultado->estoque_tipo_11 + $quantidade
															];
														}
				$this->db->update("tamanhos_produto", $data2);
			}else{
				$this->db->where("produtos.id", $idProduto);
				$data3['estoque'] = $resultado->estoque + $quantidade;
				$this->db->update("produtos", $data3);
			}


		$this->db->select("produtos.*, tamanhos_produto.*");
		$this->db->from("produtos");
		$this->db->join("tamanhos_produto", "tamanhos_produto.id_produto = produtos.id", "left");
		$this->db->where("produtos.id", $idProduto);
		$resultado2 = $this->db->get()->row();
		if(($resultado2->estoque > 0 ) &&
			($resultado2->estoque_p > 0 ) &&
			($resultado2->estoque_m > 0 ) &&
			($resultado2->estoque_g > 0 ) &&
			($resultado2->estoque_gg > 0 ) &&

			($resultado2->estoque_tipo_1 > 0 ) &&
			($resultado2->estoque_tipo_2 > 0 ) &&
			($resultado2->estoque_tipo_3 > 0 ) &&
			($resultado2->estoque_tipo_4 > 0 ) &&
			($resultado2->estoque_tipo_5 > 0 ) &&
			($resultado2->estoque_tipo_6 > 0 ) &&
			($resultado2->estoque_tipo_7 > 0 ) &&
			($resultado2->estoque_tipo_8 > 0 ) &&
			($resultado2->estoque_tipo_9 > 0 ) &&
			($resultado2->estoque_tipo_10 > 0 ) &&
			($resultado2->estoque_tipo_11 > 0 )
		){
			$this->db->where("produtos.id", $idProduto);
			$retEstoque['ativo'] = 1;
			$this->db->update("produtos", $retEstoque);
		}

	}

	public function updateCliente($id_cliente, $dados)
	{
		$this->db->where("users.id", $id_cliente);
		$this->db->update("users", $dados);
	}


	public function updateStatusPedido($reference, $status)
	{
		$this->db->where('transacao.referencia', $reference);
		$data['status'] = (int)$status;
		$this->db->update('transacao', $data);
	}

	public function getPedidoTransacao($cod_transacao = null){
		$this->db->select('transacao.*');
		$this->db->from('transacao');
		$this->db->where('transacao.cod_transacao', $cod_transacao);
		$this->db->get()->result();
	}

	public function atualizaStatusTransacao($cod_transacao = null, $status = null){
		$this->db->where('transacao.cod_transacao', $cod_transacao);
		$data['status'] = (int)$status;
		$this->db->update('transacao', $data);
	}

	public function getPedidosCliente($id = null)
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
			pedidos_produtos.tipo as tipoProduto,
			pedidos_produtos.rowid,

			
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
		//$this->db->group_by(['produtos_fotos.id_produto', 'pedidos.id']);
		$this->db->group_by(['pedidos_produtos.rowid', 'pedidos.id']);

		$this->db->order_by('pedidos.id', 'DESC');

		$this->db->where(['pedidos.id_cliente' => $id]);
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

	public function desregistrar($id = null){
		if($id != null){
			$this->db->where('id', $id);
			$this->db->delete('users');
		}
	}

	public function salvaCodRastreio($id_pedido = null, $codigoRastreio = null)
	{

			$dados = [
				'cod_rastreio' => $codigoRastreio
			];

			$this->db->where('id', $id_pedido);
			$this->db->update('pedidos', $dados);



	}


}
