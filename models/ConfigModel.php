<?php

class ConfigModel extends \CI_Model
{
	public function getConfig()
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get('config');
		return $query->row();
	}

	public function mudaCor($cor)
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$data['corHex'] = $cor;
		$this->db->update('config', $data, array('id'=> 1));
	}

	/**
	 * @param null $dados
	 * @param null $condicao
	 * Atualizar a tabela config
	 */
	public function doUpdate($dados = null)
	{
		if(is_array($dados)){
			$this->db->update('config', $dados, array('id'=> 1));

			if($this->db->affected_rows() > 0){
				setMSG('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}else{
				setMSG('msgCadastro', 'Erro ao atualizar a configuração', 'erro');

			}
		}
	}

	public function doUpdatePagseguro($dados = null)
	{
		if(is_array($dados)){
			$this->db->update('config_pagseguro', $dados, array('id'=> 1));

			if($this->db->affected_rows() > 0){
				setMSG('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}else{
				setMSG('msgCadastro', 'Erro ao atualizar a configuração', 'erro');

			}
		}
	}

	/**
	 * Pega config pagseguro
	 */
	public function getConfigPagseguro()
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get('config_pagseguro');
		return $query->row();
	}

	public function doUpdateCorreios($dados = null)
	{
		if(is_array($dados)){
			$this->db->update('config_correio', $dados, array('id'=> 1));

			if($this->db->affected_rows() > 0){
				setMSG('msgCadastro', 'Configuração atualizada com sucesso', 'sucesso');
			}else{
				setMSG('msgCadastro', 'Erro ao atualizar a configuração', 'erro');

			}
		}
	}

	/**
	 * Pega config pagseguro
	 */
	public function getConfigCorreios()
	{
		$this->db->where('id', 1);
		$this->db->limit(1);
		$query = $this->db->get('config_correio');
		return $query->row();
	}
}
