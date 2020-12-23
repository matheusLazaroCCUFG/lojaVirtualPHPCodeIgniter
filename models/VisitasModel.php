<?php


class VisitasModel extends CI_Model
{
	private $id, $ip, $data, $hora, $limite;

	public function __construct()
	{
		parent::__construct();



		$this->id = 0;
		$this->ip = $_SERVER['REMOTE_ADDR'];
		$this->data = date("Y-m-d");
		$this->hora = date("H:i");
		$this->limite = 3600;//1h em milisegundos

	}

	public function verificaUsuario()
	{
		$this->db->select("visitas.*");
		$this->db->from("visitas");
		$this->db->where(["visitas.ip" => $this->ip, "visitas.data" => $this->data]);
		$this->db->order_by("visitas.id", "DESC");

		if($this->db->get()->num_rows() == 0){//Usuario não visitou até o momento
			$this->inserirVisitas();
		}else{
			$array = $this->db->get('visitas')->result();
			$Fselect = end($array);
			$HoraDB = strtotime($Fselect->hora);
			$HoraAtual = strtotime($this->hora);
			$HoraSubtracao = $HoraAtual - $HoraDB;
			if($HoraSubtracao > $this->limite){
				$this->inserirVisitas();
			}
		}

		//$select = $this->db->get()->result();
	}

	public function inserirVisitas()
	{

			$dados = [
				"ip" => $this->ip,
				"data" => $this->data,
				"hora" => $this->hora
			];

			$this->db->insert('visitas', $dados);

	}
}
