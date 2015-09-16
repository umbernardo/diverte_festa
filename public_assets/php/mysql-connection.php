<?php
/******************************************
 *            DIVERTE FESTA               *
 *                                        *
 * AUTOR: Gabriel Sousa Kraszczuk         *
 * DATA: 30/08/2015                       *
 * DESCRIÇÃO: Classe utilizada para efe-  *
 * tuar as consultas na base de dados do  *
 * sistema.								  *
 ******************************************/

class MYSQL{
	private  $host_bd;
	private  $usuario_bd;
	private  $senha_bd;
	private  $nome_bd;
	private  $codificacao_bd;
	private  $conexao_bd = null;

	public function MYSQL($informacao_BD){
		$this->host_bd = $informacao_BD['host_bd'];
		$this->usuario_bd = $informacao_BD['usuario_bd'];
		$this->senha_bd = $informacao_BD['senha_bd'];
		$this->nome_bd = $informacao_BD['nome_bd'];
		$this->codificacao_bd = $informacao_BD['codificacao_bd'];
		$this->conectar();

	}

	private function conectar(){
		// Monta string de conexão;
		$stringDeConexao = 'mysql:host='.$this->host_bd.';';

		$stringDeConexao = $stringDeConexao.'bdname='.$this->nome_bd.';charset='.$this->codificacao_bd;
		// Tenta conectar
		try{
			//echo "conectado\n";
			$this->conexao_bd = new PDO($stringDeConexao, $this->usuario_bd, $this->senha_bd);
			$this->conexao_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOExeption $e){
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function mysqlSelect($tabela, $campo, $valor){
		$statement = $this->conexao_bd->prepare("use ".$this->nome_bd);
		$statement->execute();
		$statement = $this->conexao_bd->prepare("SELECT * FROM ".$tabela." WHERE ".$campo." = '".$valor."'");
		$statement->execute();
		$resultado = $statement->fetchAll();
		//print count($resultado);
		//print $resultado[0]['SENHA'];
		//var_dump($resultado);
		return $resultado;
	}

	public function mysqlSelectQuery($query){
		$statement = $this->conexao_bd->prepare("use ".$this->nome_bd);
		$statement->execute();
		$statement = $this->conexao_bd->prepare($query);
		$statement->execute();
		$resultado = $statement->fetchAll();
		return $resultado;
	}

	public function mysqlInsert($tabela, $campos, $valores){
		$statement = $this->conexao_bd->prepare("use ".$this->nome_bd);
		$statement->execute();
		$statement = $this->conexao_bd->prepare("INSERT INTO ".$tabela." (".$campos.") VALUES (".$valores.")");
		$statement->execute();
	}

	public function mysqlInsertQuery($query){
		$statement = $this->conexao_bd->prepare("use ".$this->nome_bd);
		$statement->execute();
		$statement = $this->conexao_bd->prepare($query);
		$statement->execute();
	}

	public function mysqlUpdate($tabela, $campo, $valor, $campoCondicao , $valorCondicao){
		$statement = $this->conexao_bd->prepare("use ".$this->nome_bd);
		$statement->execute();
		$statement = $this->conexao_bd->prepare("UPDATE ".$tabela." SET ".$campo." = ".$valor." WHERE ".$campoCondicao. " = ".$valorCondicao);
		$statement->execute();
	}

	public function mysqlUpdateQuery($query){
		$statement = $this->conexao_bd->prepare("use ".$this->nome_bd);
		$statement->execute();
		$statement = $this->conexao_bd->prepare($query);
		$statement->execute();
	}

	public function mysqlDelete($tabela, $campo, $valor){
		$statement = $this->conexao_bd->prepare("use ".$this->nome_bd);
		$statement->execute();
		$statement = $this->conexao_bd->prepare("DELETE FROM ".$tabela." WHERE ".$campo." = ".$valor);
		$statement->execute();
	}

	public function mysqlDeleteQuery($query){
		$statement = $this->conexao_bd->prepare("use ".$this->nome_bd);
		$statement->execute();
		$statement = $this->conexao_bd->prepare($query);
		$statement->execute();
	}

}
?>
