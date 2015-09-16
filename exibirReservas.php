<?php
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  if(($usuario == 'admin') && ($senha == 'admin')){
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] ."/diverte_festa/administracao.php";


		header('Location: ' . $home_url);
  }
  else {
    echo "<html>";
  	echo "<head>";
  	echo "<meta charset='utf-8'/>";
  	echo "</head>";
  	echo "<script language=javascript> alert('Usuário e/ou Senha estão incorretos! - Redirecionado para a página de Login');
  		window.location.href = 'reserva.php';  </script>";
    echo "</html>";
  }

 ?>
