<?php

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.sendgrid.net");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "apikey");
define("CONF_MAIL_PASS", "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");
define("CONF_MAIL_SENDER", ["name" => "Matheus L.", "address" => "matheuscrf009@gmail.com"]);
define("CONF_MAIL_SUPPORT", "matheuscrf009@gmail.com");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");

function setMSG($id, $msg, $tipo)
{
	$CI =& get_instance();


	switch ($tipo){
		case 'erro':
			$CI->session->set_flashdata($id, '<br><div class="alert alert-danger" role="alert">' . $msg . '</div><br>');
			break;
		case 'sucesso':
			$CI->session->set_flashdata($id, '<br><div class="alert alert-success" role="alert">' . $msg . '</div><br>');
			break;
		default:

			break;
	}

	return false;
}

function getMsg($id)
{
	$CI =& get_instance();

	if($CI->session->flashdata($id)){
		echo $CI->session->flashdata($id);
	}
}

function validationErrors()
{
	if(validation_errors()){
		echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
	}
}

function formataDataDb($data)
{
	//entrada: 00/00/0000
	//Saída: 0000-00-00
	if($data){
		$data = explode("/", $data);
		$dia = $data[0];
		$mes = $data[1];
		$ano = $data[2];

		return $ano . '-' . $mes . '-' . $dia;
	}
}

function dataDiaDb()
{
	//date_default_timezone_set('America/Sao_paulo');
	$formato = 'DATE_W3C';
	$hora = time();
	$data = date("Y-m-d H:i:s", $hora);
	return $data;
}

function dataDb()
{
	date_default_timezone_set('America/Sao_paulo');
	$stringdedata = "%Y-%m-%d";
	$data = time();
	$data = mdate($stringdedata, $data);
	return $data;
}

function formataDataView($data = null)
{
	if($data){
		//entrada: 0000-00-00
		//saida: 00/00/0000

		$data = explode('-', $data);
		return $data[2] . '/' . $data[1] . '/' . $data[0];
	}
}

function formataMoedaReal($valor = null, $real = false)
{
	if($valor){
		$valor = ($real == true ? 'R$ ' : '') . number_format($valor, 2, ',', '.');
		return $valor;
	}
}

function formatoDecimal($valor = null)
{
	$valor = str_replace('.', '', $valor);
	$valor = str_replace(',', '.', $valor);

	return $valor;
}


function slug($string=NULL){
	$string = remove_acentos($string);
	return url_title($string,'-',TRUE);
}

function remove_acentos($string=NULL){
	$procurar = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', ',');

	$substituir = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '.');

	return str_replace($procurar,$substituir,$string);
}

function limpaString($string = null)
{
	if($string){
		return preg_replace("/[^0-9\s]/", "", $string);//apenas números
	}
}

function limitaCaracteres($string = null){
	$i = 0;
	$string2 = '';
	while($string[$i] != '\0'){
		if($i == 30){
			$string2[$i] = '.';
			$string2[$i+1] = '.';
			$string2[$i+2] = '.';
			break;
		}

		$string2[$i] = $string[$i];
		$i++;
	}



	return $string2;
}


function erroPagseguro($cod = null){

	if($cod){
		/*file:///media/matheuslazaro/DA68712B68710791/1-CURSOS/2-Criando%20uma%20loja%20virtual%20em%20PHP%20com%20Codeigniter%20c%20PagSeguro/21.%20Integra%C3%A7%C3%A3o%20com%20API%20PagSeguro/pagseguro-checkout-transparente.pdf*/
		//pg 42
		$erro = [
			'53004' => 'Quantidade de itens inválida!',//...
			'5003' => 'Falha de comunicação com a instituição financeira ',
			'10000' => 'Marca de cartão de crédito inválida',
			'10001' =>'Número do cartão de crédito com comprimento inválido',
			'10002'=> 'Formato de data inválido',
			'10003'=> 'Campo de segurança inválido',
			'10004'=> 'cvv é obrigatório',
			'10006'=> 'Campo de segurança com comprimento inválido',
			'53005'=> 'Tipo de moeda é necessária',
			'53006'=> 'Valor inválido da moeda',
			'53007'=> 'Comprimento inválido de referência',
			'53008'=> 'Comprimento inválido da notificaçãoURL',
			'53009'=> 'Valor inválido da notificaçãoURL',
			'53010'=>'O e-mail é necessário',
			'53011'	=>	'Comprimento inválido do email',
			'53012'=> 'Valor inválido do email',
			'53013'=>'O nome é obrigatório',
			'53014'=>		'Comprimento inválido do nome' ,
			'53015'=> 'Valor inválido do nome',
			'53017'=> 'Valor inválido do cpf',
			'53018'=>'É necessário o código de área',
			'53019' =>'Valor inválido do código de área',
			'53020'=>'É necessário o telefone',
			'53021' =>'Valor inválido do telefone',
			'53022'=>'É necessário o código postal do endereço  ',
			'53023'=> 'Valor inválido do código postal do endereço de entrega',
			'53024'=>'É necessário o endereço de entrega',
			'53025' =>'Comprimento inválido da rua do endereço de entrega',
			'53026'=>'É necessário o número do endereço  ',
			'53027' =>'Comprimento inválido do número do endereço de entrega',
			'53028'=>'Comprimento inválido do complemento do endereço de entrega ',
			'53029' =>'O distrito do endereço  >é obrigatório',
			'53030' =>'Comprimento inválido do distrito do endereço de entrega',
			'53031' =>'A cidade do endereço  é necessária',
			'53032'=>'Comprimento inválido da cidade do endereço  ',
			'53033'=>'O estado do endereço de entrega  é necessário',
			'53034' =>'Valor inválido do estado do endereço de entrega',
			'53035'=>'O país do endereço   é obrigatório',
			'53036'=> 'Comprimento inválido do país do endereço de entrega',
			'53037'=>' Redigite os dados do Cartão de Crédito',
			'53038'=>'É necessária a quantidade da parcela ',
			'53039'=> 'Valor da quantidade de parcelas inválido',
			'53040'=>'O valor da parcela  é necessário.',
			'53041'=> 'Valor da parcela valor inválido - Reinicie a página',
			'53042'=> 'O nome do titular do cartão de crédito é obrigatório',
			'53043' => 'Comprimento inválido do nome do titular do cartão de crédito',
			'53044'=>'Valor inválido do nome do titular do cartão de crédito',
			'53045'=>'É necessário o cpf do titular do cartão de crédito' ,
			'53046'=> 'Valor inválido de cpf do titular do cartão de crédito',
			'53047'=>'É necessária a data de nascimento do titular do cartão de crédito',
			'53048' =>'Valor inválido da data de nascimento do titular do cartão de crédito',
			'53049'=>'É necessário o código de área do titular do cartão de crédito' ,
			'53050'=> 'Valor inválido do código de área do titular do cartão de crédito',
			'53051'=>'É necessário o telefone do titular do cartão de crédito' ,
			'53052' =>'Valor inválido do telefone do titular do cartão de crédito',
			'53053'=>'É necessário o código postal do endereço de cobrança' ,
			'53054'=> 'Valor inválido do código postal do endereço de cobrança',
			'53055'=>'A rua do endereço de cobrança é necessária' ,
			'53056'=> 	'Comprimento inválido do Endereço de cobrança' ,
			'53057'=>'O número do endereço de cobrança é obrigatório',
			'53058'=>'Comprimento inválido do número do endereço de cobrança' ,
			'53059'=>'Comprimento inválido do complemento do endereço de cobrança' ,
			'53060'=> 'O distrito do endereço de cobrança é necessário' ,
			'53061'=>'Comprimento inválido do distrito do endereço de cobrança' ,
			'53062' =>'A cidade do endereço de cobrança é necessária' ,
			'53063'=>	'Comprimento inválido da cidade do endereço de cobrança' ,
			'53064' =>'O estado do endereço de cobrança é necessário' ,
			'53065'=> 'Valor inválido do estado do endereço de cobrança',
			'53066'=> 'O país do endereço de cobrança é obrigatório' ,
			'53067'=>		'Comprimento inválido do país do endereço de cobrança' ,
			'53068'=>'Comprimento inválido do email do receptor ',
			'53069' =>'Valor inválido do email do receptor',
			'53070' =>'O ID do item é necessário',
			'53071'=>	'Comprimento inválido do ID do item ',
			'53072'=> 'Descrição do item é necessária',
			'53073'=> 'Comprimento inválido da descrição do item',
			'53074'=> 'A quantidade do item é necessária',
			'53075' =>'Quantidade de itens fora do intervalo',
			'53076'=> 'Valor inválido da quantidade do item',
			'53077'=>'É necessário o valor do item ',
			'53078' =>'Padrão inválido de valor do item Deve caber no padrão',
			'53079'=> 'Quantidade de itens fora do intervalo',
			'53081'=>'O remetente  está relacionado ao receptor',
			'53084'=> 'Destinatário inválido, verifique o status da conta do destinatário e se é uma conta do vendedor.',
			'53085'=> 'Método de pagamento indisponível',
			'53086' =>'Valor total do carrinho fora do intervalo',
			'53087'=> 'Dados inválidos do cartão de crédito',
			'53091'=> 'Hash do remetente inválido',
			'53092'=>	'A marca do cartão de crédito  não é aceita',
			'53095'=> 'Padrão inválido de tipo de envio',
			'53096'=> 'Padrão inválido de custo de envio - Calcule o frete e selecione uma opção, ou digite o cep novamente!',
			'53097'=> 'Custo de envio fora do intervalo',
			'53098'=>'O valor total do carrinho  é negativo',
			'53099'=> 'Padrão inválido de quantia extra Deve caber no padrão',
			'53101'=> 'Valor inválido do modo de pagamento, valores válidos são padrão e gateway',
			'53102' =>'Valor inválido da forma de pagamento, os valores válidos são creditCard, boleto e eft',
			'53104'=>	'O custo de envio  foi fornecido, o endereço de entrega deve estar completo',
			'53105'=> 'Informações do remetente foram fornecidas, e-mail também deve ser fornecido',
			'53106' =>	'O titular do cartão de crédito está incompleto',
			'53109' =>'Foram fornecidas informações de endereço de entrega, e-mail do remetente também',
			'53110'=> 'eft bank é necessário',
			'53111'=> 'eft bank não é aceito',
			'53115'=> 'Data de nascimento .valor inválido',
			'53117' =>'Valor inválido do cnpj',
			'53122'=> 'Domínio inválido do email Você deve usar um email @ sandbox.pagseguro.com.br',
			'53140'=> 'Quantidade da parcela fora do intervalo O valor deve ser maior que zero',
			'53141'=> 'O remetente está bloqueado',
			'53142' =>'Token de cartão de crédito inválido.',
			'53150' =>'Erro do PagSeguro. Tente novamente mais tarde ou selecione outra forma de pagamento!'
		];

		if(isset($erro[$cod])){
			$r = [
				'erro' => $cod,
				'msg' => $erro[$cod]
			];
		}else{
			$r = [
				'erro' => $cod,
				'msg' => 'Erro não catalogado!'
			];
		}


	}else{
		$r = [
			'erro' => -1,
			'msg' => 'Erro não catalogado!'
		];
	}

	echo json_encode($r);
	exit;
}


function validaCPF($cpf)
{

	// Extrai somente os números
	$cpf = preg_replace('/[^0-9]/is', '', $cpf);

	// Verifica se foi informado todos os digitos corretamente
	if (strlen($cpf) != 11) {
		return false;
	}

	// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
	if (preg_match('/(\d)\1{10}/', $cpf)) {
		return false;
	}

	// Faz o calculo para validar o CPF
	for ($t = 9; $t < 11; $t++) {
		for ($d = 0, $c = 0; $c < $t; $c++) {
			$d += $cpf[$c] * (($t + 1) - $c);
		}
		$d = ((10 * $d) % 11) % 10;
		if ($cpf[$c] != $d) {
			return false;
		}
	}
	return true;

}

