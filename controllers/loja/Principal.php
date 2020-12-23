<?php

class Principal extends \CI_Controller
{
	public function index()
	{
		redirect("loja/principal/index", "refresh");
	}
}
