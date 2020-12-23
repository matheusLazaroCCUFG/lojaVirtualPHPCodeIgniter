<?php

class RetornoPagSeguro extends \App\Core\CoreController
{

	public function retorno($code = NULL){

		// se não for passado um código, usará o $_POST que o PS envia
		if($code === NULL){
			$code = $_POST['notificationCode'];
		}

		$this->load->model('configModel');
		$pagseguro = $this->configModel->getConfigPagseguro();
		$data['token'] = $pagseguro->token;
		$data['email'] = $pagseguro->email;

		$url = "https://ws.pagseguro.uol.com.br/v2/transactions/notifications/";
		$url .= $code . "?email=" . $data['email'] . "&token=" . $data['token'];

		// faz conexão
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		$xml = curl_exec($ch);
		curl_close($ch);

		$xml = simplexml_load_string($xml);
		$reference = $xml->reference;
		$code = $xml->code;
		$status = $xml->reference;


	}

}
