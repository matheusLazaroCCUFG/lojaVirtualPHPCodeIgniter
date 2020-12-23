<?php

use Darryldecode\Cart\Cart;

class CarrinhoCompras2
{

	public function add($id, $qtd, $tamanho= null, $tipo = null)
	{
		$CI =& get_instance();
		$Product = $CI->carrinhoModel->getProduto($id);
		// add the product to cart
		Cart::session(2)->add(array(
			'id' => 456,
			'name' => $Product->nome_produto,
			'price' => $Product->valor,
			'quantity' => $qtd,
			'attributes' => array(
				'tamanho' => $tamanho,
				'tipo' => $tipo
			),
			'associatedModel' => $Product
		));
	}

	public function update($id, $qtd, $preco)
	{
		// update the item on cart
		Cart::session(2)->update(456,[
			'quantity' => $qtd,
			'price' => $preco
		]);
	}

	public function delete()
	{
		// delete an item on cart
		Cart::session(2)->remove(456);
	}

	public function totalCarrinho()
	{
		/*$produto = $this->listarProdutos();
		$total = 0;

		foreach ($produto as $indice => $linha){
			$total += $linha['subtotal'];
		}
		return $total;
		*/
	}

	public function totalItem()
	{
		/*$produto = $this->view();
		$qtd = 0;
		foreach ($produto as $indice => $linha){
			$qtd += $linha['qtd'];
		}
		return $qtd;*/
	}

	public function view()
	{
		// view the cart items
		$items = Cart::getContent();
		foreach($items as $row) {

			echo $row->id; // row ID
			echo $row->name;
			echo $row->qty;
			echo $row->price;

			echo $item->associatedModel->id; // whatever properties your model have
			echo $item->associatedModel->name; // whatever properties your model have
			echo $item->associatedModel->description; // whatever properties your model have
		}
	}


}
