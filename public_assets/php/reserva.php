<?php
include_once 'mysql-connection.php';
include_once 'espaco.php';

$informacoes_BD = array(
	"host_bd" => 'localhost',
	"usuario_bd" => 'root',
	"senha_bd" => '',
	"nome_bd" => 'diverte',
	"codificacao_bd" => 'utf8'
	);
	
	$espaco = new Espaco($informacoes_BD);
	$Array = $espaco->retornarArrayEspacoTag(" "," ");
	$espaco->selecionarEspaco("Diverte Festa Cambuí");
	//foreach($Array as $valor){
	//	echo "$valor\n";
	//}
	//print $informacoes_BD['host_bd'];
	
	//$m = new MYSQL($informacoes_BD);
	//$m->_construct($informacoes_BD);
	//$m->mysqlSelect('auteca_login','ID',1);
	//$m->mysqlInsert('auteca_usuarios','UID,NOME','222,"Gabriel Sousa Kraszczuk"');
	//$m->mysqlUpdate('auteca_usuarios','UID',221,'ID',1);
	//$m->mysqlDelete('auteca_usuarios','UID',223);
	
	
	
	//echo $informacoes_BD['host_bd'];
	
	//$conn = new PDO('mysql:host=localhost;dbname=wiedza', 'root', '');
    //try {
    //$conn = new PDO('mysql:host=localhost;dbname=wiedza', 'root', '');
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    //$data = $conn->query('SELECT * FROM auteca_login');
  
    //foreach($data as $row) {
      //  print_r($row);
  //}
//} catch(PDOException $e) {
   // echo 'ERROR: ' . $e->getMessage();
//}


//$m = new MYSQL($informacoes_BD);
//$m->conectar();
//echo $m->mysqlSelect("a","b","c");


?>