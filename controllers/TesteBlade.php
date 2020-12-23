<?php


class TesteBlade extends \App\Core\CoreController {


	public function __construct(){
		parent::__construct();

	}

	public function index(){
		//render blade
		$this->view('viewsStore/teste');

	}

}
