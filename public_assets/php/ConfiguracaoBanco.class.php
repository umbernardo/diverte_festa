<?php
/********************************
 *   CLASSE CONFIGURACAO BANCO  *
 *                              *
 ********************************/
 class ConfiguracaoBanco{
	private $informacoes_BD;

	public function ConfiguracaoBanco(){
		$this->informacoes_BD = array(
					"host_bd" => 'localhost',
					"usuario_bd" => 'root',
					"senha_bd" => '',
					"nome_bd" => 'diverte',
					"codificacao_bd" => 'utf8'
					);
	}

	public function getConfiguracaoBanco(){
		return $this->informacoes_BD;
	}
 }


?>
