<?php
/************************************
 *         CLASSE ESPACO            *
 *                                  *
 * Classe responsável por retornar  *
 * todos os espaços disponíveis     *
 ************************************
*/

include_once 'mysql-connection.php';

class Espaco{

	private $espacos = array();
	private $espacoSelecionado = array();
	
	public function Espaco($informacoes_BD){
		$mysql = new MYSQL($informacoes_BD);
		$resultado = $mysql->mysqlSelectQuery("SELECT * FROM diverte_espaco");
		$this->montarArrayEspaco($resultado);
		//var_dump ($this->espacos);
	}
	
	private function montarArrayEspaco($resultado){
		foreach ($resultado as list($valor)){
			array_push($this->espacos,array($resultado[$valor-1][1],$resultado[$valor-1][3]));
		}
	}
	
	public function retornarArrayEspacoTag($tagAberta, $tagFechada){
		$espacosComOption = array();
		foreach($this->espacos as list ($valor)){
			array_push($espacosComOption, $tagAberta.$valor.$tagFechada);
			//echo $valor;
		}
		//var_dump($espacosComOption);
		return $espacosComOption;
	}
	
	public function selecionarEspaco($espaco){
		foreach($this->espacos as $valor){
			if($valor[0] == $espaco){
				array_push($this->espacoSelecionado, $valor[0]);
				array_push($this->espacoSelecionado, $valor[1]);
			}
		}
	}
	
	public function retornarValoresString(){
		$valores = array();
		foreach($this->espacos as $valor){
			array_push($valores, $valor[1]);
		}
		$valoresString = implode($valores,"|");
		//var_dump($valores);
		return $valoresString;
	}
	
	public function retornarEspacosString(){
		$valores = array();
		foreach($this->espacos as $valor){
			array_push($valores, $valor[0]);
		}
		$valoresString = implode($valores,"|");
		//var_dump($valores);
		return $valoresString;
	}
	
	public function retornarNomeEspacoSelecionado(){
		return $this->espacoSelecionado[0];
	}
	
	public function retornarValorEspacoSelecionado(){
		return $this->espacoSelecionado[0];
	}

}

?>