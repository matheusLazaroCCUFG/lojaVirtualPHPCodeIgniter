<?php


class Dashboard extends \App\Core\CoreController
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('dashboardModel');
		$this->load->model('configModel');
		$this->load->helper('helper_helper');
		$this->load->model('ion_auth_model');
		$this->load->model('visitasModel');
		if(!$this->ion_auth->is_admin()){
			setMSG('msgCadastro', 'Você não está logado como Administrador', 'erro');
			redirect('entrarAdm');
		}

	}

	public function index()
	{

			$data['view'] = 'viewsStore/dashboard';
			$data['t_produtos'] = $this->dashboardModel->getTotal('produtos');
			$data['t_pedidos'] = $this->dashboardModel->getTotal('pedidos');
			$data['t_clientes'] = count($this->ion_auth->users(3)->result());
			$data['t_categorias'] = $this->dashboardModel->getTotal('categorias');
			$data['t_marcas'] = $this->dashboardModel->getTotal('marca');
			$data['pedidos'] = $this->dashboardModel->getPedidos();
			//$data['clientes'] = $this->dashboardModel->getClientes();
			$data['clientes'] = $this->ion_auth->users(3)->result();
			$data['titulo'] = 'Dashboard';




			//Resolver entre janeiro e dezembro (ano virado)
			$hoje = date("Y-m-d");
			$diaHoje = date("d");
			$mesHoje = date('m');
			$anoHoje = date('Y');
			//$anoAnterior = $anoHoje - 1;
			$mesAnterior = (int)$mesHoje - 1;
			$anoAnterior = false;
			if($mesAnterior == 0){
				$mesAnterior = 12;
				$anoAnterior = $anoHoje - 1;
			}
			if(!$anoAnterior) {
				$diaFinalMesAnteiror = cal_days_in_month(CAL_GREGORIAN, $mesAnterior, (int)$anoHoje);
			}else{
				$diaFinalMesAnteiror = cal_days_in_month(CAL_GREGORIAN, $mesAnterior, (int)$anoAnterior);

			}
			$hojeSegundos = strtotime($hoje);
			$intervalo15 = date("d", $hojeSegundos - 1296000);
			$i = 0;
			//$diaFinal = cal_days_in_month(CAL_GREGORIAN, )
		$temMesAnterior = false;
		if((int)$diaHoje <= 15) {
				$j = 0;
				for ($i = (int)$diaHoje; $i >= 1; $i--){
					$dataIntervalo[$j] = $i;
					$j++;
				}
				if($j <= 15){
					$temMesAnterior = true;
					$aPartir = $diaFinalMesAnteiror;
					for($k = $diaFinalMesAnteiror; $k >= (int)$intervalo15; $k--){
						$dataIntervalo[$j] = $k;
						$j++;
					}
				}
			}else{
				$j = 0;
				for ($i = (int)$diaHoje; $i >= (int)$intervalo15; $i--){
					$dataIntervalo[$j] = $i;
					$j++;
				}
			}

			$datas = [];
			if(!$temMesAnterior) {
				for($i = 0; $i <= 15; $i++){
						$datas[$i] = $anoHoje . '-' . $mesHoje . '-' . ($dataIntervalo[$i] <= 9 ? "0" . $dataIntervalo[$i] : $dataIntervalo[$i]);

				}
			}else{
				$j = 0;
				$flag = 0;
				for($i = 0; $i <= 15; $i++){
					if($dataIntervalo[$i] != $diaFinalMesAnteiror){
						$datas[$i] = $anoHoje . '-' . $mesHoje . '-' . ($dataIntervalo[$i] <= 9 ? "0" . $dataIntervalo[$i] : $dataIntervalo[$i]);
					}else{
						$flag = -1;
						break;
					}
					$j = $i + 1;
				}
				if($flag == -1) {
					for ($i = $j; $i <= 15; $i++) {
						if(!$anoAnterior) {
							$datas[$i] = $anoHoje . '-' . ($mesAnterior <= 9 ? '0' . $mesAnterior : $mesAnterior) . '-' . ($dataIntervalo[$i] <= 9 ? "0" . $dataIntervalo[$i] : $dataIntervalo[$i]);
						}else{
							$datas[$i] = $anoAnterior . '-' . ($mesAnterior <= 9 ? '0' . $mesAnterior : $mesAnterior) . '-' . ($dataIntervalo[$i] <= 9 ? "0" . $dataIntervalo[$i] : $dataIntervalo[$i]);

						}
					}
				}
			}

			$data['config'] = $this->configModel->getConfig();
			$array = $this->dashboardModel->getVisitasIntervalo15($datas);
			$data['array'] = $array;
			$data['datas'] = $datas;
			$this->view('viewsStore/dashboard', $data);

	}

}
