<?php


class BannersHome extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->is_admin()){
			redirect('entrarAdm');
		}

		$this->load->library('form_validation');

		$this->load->helper('helper_helper');

		$this->load->model("bannersHomeModel");

	}

	public function modulo()
	{
		$data['titulo'] = 'Banners da Home';
		//$data['fotos'] = $this->bannersHomeModel->getFotos($produto->id);

		//Banner 1//////////////////////////////////////////////////////////////////////////////////////////////////////
		$dados = null;

		//$fotos = new stdClass();
		$fotosBanner0 = $this->bannersHomeModel->getFotosIdBanner(0);
		$fotosBanner1 = $this->bannersHomeModel->getFotosIdBanner(1);
		$fotosBanner2 = $this->bannersHomeModel->getFotosIdBanner(2);
		$fotosBanner3 = $this->bannersHomeModel->getFotosIdBanner(3);
		$fotosBanner4 = $this->bannersHomeModel->getFotosIdBanner(4);
		$fotosBanner5 = $this->bannersHomeModel->getFotosIdBanner(5);
		$fotosBanner6 = $this->bannersHomeModel->getFotosIdBanner(6);
		$fotosBanner7 = $this->bannersHomeModel->getFotosIdBanner(7);
		$fotosBanner8 = $this->bannersHomeModel->getFotosIdBanner(8);
		$fotosBanner9 = $this->bannersHomeModel->getFotosIdBanner(9);
		$fotosBanner10 = $this->bannersHomeModel->getFotosIdBanner(10);


		$data['fotosBanner0'] = $fotosBanner0;
		$data['fotosBanner1'] = $fotosBanner1;
		$data['fotosBanner2'] = $fotosBanner2;
		$data['fotosBanner3'] = $fotosBanner3;
		$data['fotosBanner4'] = $fotosBanner4;
		$data['fotosBanner5'] = $fotosBanner5;
		$data['fotosBanner6'] = $fotosBanner6;
		$data['fotosBanner7'] = $fotosBanner7;
		$data['fotosBanner8'] = $fotosBanner8;
		$data['fotosBanner9'] = $fotosBanner9;
		$data['fotosBanner10'] = $fotosBanner10;


		$data['tamanhoLogoLoja'] = ($this->bannersHomeModel->getTamanhoLogoLoja()[0]->tamanhoFoto ? $this->bannersHomeModel->getTamanhoLogoLoja()[0]->tamanhoFoto : 0);

		$data['mensagemBanner2'] = $this->bannersHomeModel->getMensagemBanner(2);
		$data['mensagemBanner3'] = $this->bannersHomeModel->getMensagemBanner(3);
		$data['mensagemBanner4'] = $this->bannersHomeModel->getMensagemBanner(4);
		$data['mensagemBanner5'] = $this->bannersHomeModel->getMensagemBanner(5);

		//var_dump($data['fotos'][0]->id_produto);
		//$this->session->userdata('last_id') = $id;
		$this->view('viewsStore/bannersHome', $data);
	}



	public function core($id_banner = null)
	{
		if($id_banner == '0') {

				$tamanho = $this->input->post('tamanhoLogoLoja');
				$array['tamanhoFoto'] = $tamanho;
				$this->bannersHomeModel->doInsertTamanho($array, $id_banner);


				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);




			$foto_banner0 = $this->input->post('foto_banner0');


			$t_foto = count($foto_banner0);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner0[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '1') {


			if ($this->input->post('id_banner1')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner1 = $this->input->post('foto_banner1');


			$t_foto = count($foto_banner1);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner1[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '2') {
			$mensagem = $this->input->post('mensagemBanner2');
			$array['mensagem'] = $mensagem;
			$this->bannersHomeModel->doInsertMensagem($array, $id_banner);

			if ($this->input->post('id_banner2')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner2 = $this->input->post('foto_banner2');


			$t_foto = count($foto_banner2);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner2[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '3') {
			$mensagem = $this->input->post('mensagemBanner3');
			$array['mensagem'] = $mensagem;
			$this->bannersHomeModel->doInsertMensagem($array, $id_banner);

			if ($this->input->post('id_banner3')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner3 = $this->input->post('foto_banner3');


			$t_foto = count($foto_banner3);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner3[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '4') {
			$mensagem = $this->input->post('mensagemBanner4');
			$array['mensagem'] = $mensagem;
			$this->bannersHomeModel->doInsertMensagem($array, $id_banner);

			if ($this->input->post('id_banner4')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner4 = $this->input->post('foto_banner4');


			$t_foto = count($foto_banner4);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner4[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '5') {
			$mensagem = $this->input->post('mensagemBanner5');
			$array['mensagem'] = $mensagem;
			$this->bannersHomeModel->doInsertMensagem($array, $id_banner);

			if ($this->input->post('id_banner5')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner5 = $this->input->post('foto_banner5');


			$t_foto = count($foto_banner5);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner5[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '6') {


			if ($this->input->post('id_banner6')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner6 = $this->input->post('foto_banner6');


			$t_foto = count($foto_banner6);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner6[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '7') {


			if ($this->input->post('id_banner7')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner7 = $this->input->post('foto_banner7');


			$t_foto = count($foto_banner7);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner7[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '8') {


			if ($this->input->post('id_banner8')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner8 = $this->input->post('foto_banner8');


			$t_foto = count($foto_banner8);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner8[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '9') {


			if ($this->input->post('id_banner9')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner9 = $this->input->post('foto_banner9');


			$t_foto = count($foto_banner9);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner9[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}else
		if($id_banner == '10') {


			if ($this->input->post('id_banner10')) {

				//Apagar fotos antigas
				$this->bannersHomeModel->doDeleteFotoBanner($id_banner);

			}


			$foto_banner10 = $this->input->post('foto_banner10');


			$t_foto = count($foto_banner10);//2
			for ($i = 0; $i < $t_foto; $i++) {
				$foto['id_banner'] = $id_banner;
				$foto['foto'] = $foto_banner10[$i];
				$this->bannersHomeModel->doInsertFoto($foto);
			}
		}






		redirect('bannersHome');
	}



	public function upload()
	{

		$pasta = base_directory . 'loja/images/bannersHome';
		$config['upload_path'] = $pasta;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
		$config['max_size'] = 20480;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);


		if($this->upload->do_upload('foto_banner')){
			$retorno['file_name'] = $this->upload->data('file_name');
			$retorno['msg'] = 'Foto enviada com sucesso';
			$retorno['erro'] = 0;
		}else{
			$retorno['msg'] = $this->upload->display_errors();
			$retorno['erro'] = 25;
		}
		//var_dump($this->upload->do_upload('foto_produto'));

		echo json_encode($retorno);
	}
}
