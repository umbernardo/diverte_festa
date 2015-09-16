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
					"usuario_bd" => 'obelisco_festas',
					"senha_bd" => 'erR23@dfRg12',
					"nome_bd" => 'obelisco_festas',
					"codificacao_bd" => 'utf8'
					);
	}

	public function getConfiguracaoBanco(){
		return $this->informacoes_BD;
	}
 }


?>
