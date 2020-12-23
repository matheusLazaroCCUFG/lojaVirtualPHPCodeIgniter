<?php


//namespace application\controllers\admin;


class Principal extends \CI_Controller
{
	public function index()
	{
		$this->load->view('admin/template/index');
	}

	public function checkout()
	{
		$this->load->view('viewsStore/checkout');
	}
}
