<?php


class Ajax extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('ajaxModel');
		$this->load->model('configModel');
	}

	public function calcular_frete()
	{

		$this->form_validation->set_rules('cep', 'CEP', 'trim');
		$this->form_validation->set_rules('id', 'Produto', 'trim');

		if($this->form_validation->run() == true){
			$cep = $this->input->post('cep');
			$id = $this->input->post('id');


			if(!preg_match('/[0-9]{5}-[0-9]{3}/', $cep)){
				$retorno['erro'] = 15;
				$retorno['msg'] = 'CEP inválido, digite outro CEP!';
				echo json_encode($retorno);
				exit;
			}

			$produto = $this->ajaxModel->getProduto($id);
			$config = $this->ajaxModel->getParametrosEnvio();
			//var_dump($config);

			if(!$produto){
				$retorno['erro'] = 16;
				$retorno['msg'] = 'Produto não encontrado!';
				echo json_encode($retorno);
				exit;
			}
			$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
			$url .= "nCdEmpresa=08082650";
			$url .= "&sDsSenha=564321";
			$url .= "&sCepOrigem=" . $config->cep_origem;
			$url .= "&sCepDestino=" . $cep;
			$url .= "&nVlPeso=" . $produto->peso;
			$url .= "&nCdFormato=1";
			$url .= "&nVlComprimento=" . $produto->comprimento;
			$url .= "&nVlAltura=" . $produto->altura;
			$url .= "&nVlLargura=" . $produto->largura;
			$url .= "&sCdMaoPropria=n";
			$url .= "&nVlValorDeclarado" . $config->valor_declarado;
			$url .= "&sCdAvisoRecebimento=n";
			$url .= "&nCdServico=04510,04014";
			$url .= "&nVlDiametro=0";
			$url .= "&StrRetorno=xml";
			$url .= "&nIndicaCalculo=3";

			$xml = simplexml_load_file($url);
			$xml = json_encode($xml);
			$consulta = json_decode($xml);

			//var_dump((double)$consulta->cServico[0]->Valor);
			//var_dump($config->somar_frete);
			///var_dump($v->valor);
			$frete = '';

			foreach ($consulta->cServico as $v){
				//$valor = (double)(str_replace(',', '.',$v->Valor)) + $config->somar_frete;
				$valor = (double)(str_replace(',', '.',$v->Valor)) + $config->somar_frete;
				//echo $consulta->cServico->Valor;
				$frete .= '<div>Correios ' .
					($v->Codigo == '04014' ? 'Sedex' : 'Pac') .
					' | R$ ' .
					(number_format($valor, 2, ',', '.')) .
					' - Prazo de entrega: ' .
					$v->PrazoEntrega .
					' dias úteis'.
					'<hr></div>';
			}

			$retorno['valor_frete'] = '<strong style="color: darkgreen">' . $frete . "</strong><br><br>";
			$retorno['erro'] = 0;

			echo json_encode($retorno);
		}else{
			$retorno['erro'] = 17;
			$retorno['msg'] = validation_errors();
			echo  json_encode($retorno);
		}

	}
}
