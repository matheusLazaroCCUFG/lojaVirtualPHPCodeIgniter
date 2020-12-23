<?php

class Loja extends CI_Controller {

	public function index()
	{
		$this->load->view('viewsStore/index');
	}

	public function teste()
	{
		echo "teste";
	}


}
