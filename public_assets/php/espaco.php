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
	private $mysql;
	
	public function Espaco($informacoes_BD){
		$this->mysql = new MYSQL($informacoes_BD);
		$resultado = $this->mysql->mysqlSelectQuery("SELECT * FROM diverte_espaco");
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
	
	public function retornarDatasAlugadas(){
		$array = array();
		$array2 = array();
		$array3 = array();
		$resultado = $this->mysql->mysqlSelectQuery("SELECT DATA FROM diverte_alugueis");
		$resultado2 = $this->mysql->mysqlSelectQuery("SELECT NOME FROM diverte_espaco INNER JOIN diverte_alugueis ON diverte_espaco.ID=diverte_alugueis.ID_ESPACO");
		foreach($resultado as list ($valor)){
			array_push($array,$valor);
		}
		foreach($resultado2 as list ($valor2)){
			array_push($array2,$valor2);
		}
		$tamanho = sizeof($array);
		for($i=0 ; $i<$tamanho; $i++){
			array_push($array3,$array[$i].";".$array2[$i]);
		}
		$valores = implode($array3,"|");
		return $valores;
		
	}
	
	public function retornarEnderecoEspaco($espaco){
		$resultado = $this->mysql->mysqlSelectQuery("SELECT ENDERECO FROM diverte_espaco WHERE NOME ='".$espaco."'");
		return $resultado[0];
	}
	
	public function retornarPrecoEspaco($espaco){
		$resultado = $this->mysql->mysqlSelectQuery("SELECT PRECO FROM diverte_espaco WHERE NOME = '".$espaco."'");
		return $resultado[0];
	}
	
	public function retornarNomeEspacoSelecionado(){
		return $this->espacoSelecionado[0];
	}
	
	public function retornarValorEspacoSelecionado(){
		return $this->espacoSelecionado[0];
	}

}

?>