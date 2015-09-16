<?php
include_once ('mysql-connection.php');
include_once ('ConfiguracaoBanco.class.php');

$Configuracao_Banco = new ConfiguracaoBanco();
$informacoes_BD = $Configuracao_Banco->getConfiguracaoBanco();
$mysql = new MYSQL($informacoes_BD);

$unidadeEscolhida = $_POST['Escolha_a_unidade'];
$dataEscolhida = $_POST['Datas_Disponíveis'];
$nome = $_POST['Nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$preco = $_POST['CampoPreco'];

$Array_Data = explode("/",$dataEscolhida);

switch ($Array_Data[1]){
	case "Janeiro":
		$dataFinal = $Array_Data[2]."-". "01-" .$Array_Data[0];
		break;
	case "Fevereiro":
		$dataFinal = $Array_Data[2]."-". "02-" .$Array_Data[0];
		break;
	case "Março":
		$dataFinal = $Array_Data[2]."-". "03-" .$Array_Data[0];
		break;
	case "Abril":
		$dataFinal = $Array_Data[2]."-". "04-" .$Array_Data[0];
		break;
	case "Maio":
		$dataFinal = $Array_Data[2]."-". "05-" .$Array_Data[0];
		break;
	case "Junho":
		$dataFinal = $Array_Data[2]."-". "06-" .$Array_Data[0];
		break;
	case "Julho":
		$dataFinal = $Array_Data[2]."-". "07-" .$Array_Data[0];
		break;
	case "Agosto":
		$dataFinal = $Array_Data[2]."-". "08-" .$Array_Data[0];
		break;
	case "Setembro":
		$dataFinal = $Array_Data[2]."-". "09-" .$Array_Data[0];
		break;
	case "Outubro":
		$dataFinal = $Array_Data[2]."-". "10-" .$Array_Data[0];
		break;
	case "Novembro":
		$dataFinal = $Array_Data[2]."-". "11-" .$Array_Data[0];
		break;
	case "Dezembro":
		$dataFinal = $Array_Data[2]."-". "12-" .$Array_Data[0];
		break;

}


$ID_Espaco = $mysql->mysqlSelect("diverte_espaco","nome",$unidadeEscolhida);
$resultado = $mysql->mysqlSelectQuery("SELECT * FROM diverte_alugueis WHERE ID_ESPACO ='".$ID_Espaco[0]['ID']."' AND DATA ='".$dataFinal."'");
if($resultado == null){
	$usuarioExiste = $mysql->mysqlSelect("diverte_usuario",'Nome',$nome);
	if($usuarioExiste != null){
		$mysql->mysqlInsert("diverte_alugueis","ID_USUARIO,ID_ESPACO,DATA","'".$usuarioExiste[0]['ID']."','".$ID_Espaco[0]['ID']."','".$dataFinal."'");
		$home_url = 'http://' . $_SERVER['HTTP_HOST'] ."/diverte_festas/obrigado.php?unidade=$unidadeEscolhida&nome=$nome&email=$email&telefone=$telefone&data=$dataFinal&preco=$preco";


		header('Location: ' . $home_url);
	}
	else if($usuarioExiste == null){
		$mysql->mysqlInsert("diverte_usuario","NOME,EMAIL,TELEFONE","'".$nome."','".$email."','".$telefone."'");
		$ID_usuario_criado = $mysql->mysqlSelect("diverte_usuario", "NOME", $nome);
		$mysql->mysqlInsert("diverte_alugueis","ID_USUARIO,ID_ESPACO,DATA","'".$ID_usuario_criado[0]['ID']."','".$ID_Espaco[0]['ID']."','".$dataFinal."'");
		$home_url = 'http://' . $_SERVER['HTTP_HOST'] ."/diverte_festas/obrigado.php?unidade=$unidadeEscolhida&nome=$nome&email=$email&telefone=$telefone&data=$dataFinal&preco=$preco";


		header('Location: ' . $home_url);
	}
}
else{
	echo "<html>";
	echo "<head>";
	echo "<meta charset='utf-8'/>";
	echo "</head>";
	echo "<script language=javascript> alert('Não foi possível salvar as informações!, Esta data já está reservada! Favor escolher outra data! Voltando a Página Principal');
		window.location.href = '../../index.php';  </script>";
}



?>
