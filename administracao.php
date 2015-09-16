<?php
		include_once ('public_assets/php/ConfiguracaoBanco.class.php');
    include_once ('public_assets/php/espaco.php');
    include_once ('public_assets/php/mysql-connection.php');
		$Configuracao_Banco = new ConfiguracaoBanco();
		$informacoes_BD = $Configuracao_Banco->getConfiguracaoBanco();
		$mysql = new MYSQL($informacoes_BD);
    $espaco = new Espaco($informacoes_BD);
    error_reporting(false);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Diverte Festas - Reserva de Espaços</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>

    <link href="public_assets/css/bootstrap.css" rel="stylesheet">
    <link href="public_assets/fonts/stylesheet.css" rel="stylesheet">
    <link href="public_assets/css/bxslider.css" rel="stylesheet">
    <link href="public_assets/js/fancybox/fancybox.css" rel="stylesheet">
    <link href="public_assets/css/datepicker.css" rel="stylesheet">
    <link href="public_assets/css/main.css" rel="stylesheet">

    <link rel="shortcut icon" href="public_assets/images/logo.png">

    <script type="text/javascript" src="public_assets/js/jquery.js"></script>
    <script type="text/javascript" src="public_assets/js/bxslider.js"></script>
    <script type="text/javascript" src="public_assets/js/administrativo.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- .col-lg- .col-md- .col-sm- .col-xs- -->
    <header>
        <div class="container relative">
            <div class="row top-info">
                <div class="col-xs-12">

                    <a href="#" title="telefone" class="btn-tel">
                        19 9999.9999
                    </a>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php" title="Diverte Festas">Diverte Festas</a>
                    <select name="nav-menu" class="navbar-toggle">
                        <option>Menu</option>
                        <option value="index.php">Inicial</option>
                        <option value="reserva.php">Reservas</a></li>
                        <option value="sobre.html">Sobre</a></li>
                        <option value="contato.html">Contato</a></li>
                    </select>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" title="Inicial">Inicial</a></li>
                        <li><a href="reserva.php">Reservas</a></li>
                        <li><a href="sobre.html" title="Sobre">Sobre</a></li>
                        <li><a href="contato.html" title="Contato">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section role="main">

    <!-- Início do conteúdo -->

    <div id="slider-interna" style="background-image:url('public_assets/images/bg-header.jpg');">
    &nbsp;
    </div>

    <article class="container">

    <div class="row margin30 info-content">
        <div class="col-xs-12">
            <h2>Painel Administrativo</h2>
        </div>
    </div>
    <div class="row margin30 info-content">
        <div class="col-sm-4">
            <a href="administracao.php"><img src="public_assets/images/BancoDados.png" ></a>
            <p></p>
            <h3> Listagem de Cadastros </h3>
            <form action="administracao.php" method="post">
              <label class="col-sm-12 col-xs-12 form-group"><input name="espacos" type="submit" value="Espaços"></label>
            </form>
            <p></p>
            <form action="administracao.php" method="post">
              <label class="col-sm-12 col-xs-12 form-group"><input name="usuarios" type="submit" value="Usuarios"></label>
            </form>
            <p></p>
            <form action="administracao.php" method="post">
              <label class="col-sm-12 col-xs-12 form-group"><input name="espacosAlugados" type="submit" value="Espaços Alugados"></label>
            </form>
            <p></p>
            <h3> Comandos Administrativos </h3>
            <p> Escolha qual tipo de comando você deseja executar o comando </p>
            <select onChange="selecionarEspaco()" id="selecionador" class="form-control" name="Escolha a unidade">
                <option selected>selecione um comando</option>
                <option> SELECT </option>
                <option> INSERT </option>
                <option> DELETE </option>
                <option> UPDATE </option>
            </select>
            <div id="campoCentral">

            </div>

        </div>

        <div class="col-sm-8">
          <?php
            if($_POST==null){
              echo "<h3>Seja Bem - Vindo ao Painel de Administração</h3>";
              echo "<p> Para listar as infomrações do banco de dados, escolha uma das opções disponíves no lado esquerdo da página.";
              echo "<p> </p><p> </p> <p> </p>";
              echo'<img src="public_assets/images/setaEsquerda.png">';
            }
            if($_POST['espacos']==null){
              echo "<h3></h3>";
            }
            if($_POST['espacos']=="Espaços"){
              echo "<h3> ESPAÇOS CADASTRADOS </h3>";
              echo "<p> Logo abaixo estão listados todos os espaços já cadastrados</p>";
            }
            if($_POST['usuarios']==null){
              echo "<h3></h3>";
            }
            if($_POST['usuarios']=="Usuarios" && $_POST['espacos']==null){
              echo "<h3> USUÁRIOS CADASTRADOS </h3>";
              echo "<p> Logo abaixo estão listados todos os usuários já cadastrados</p>";
            }
            if($_POST['espacosAlugados']==null){
              echo "<h3></h3>";
            }
            if($_POST['espacosAlugados']=="Espaços Alugados"){
              echo "<h3> ESPAÇOS ALUGADOS </h3>";
              echo "<p> Logo abaixo estão listados todos os espaços e datas que estão alugados</p>";
            }
            else{
              echo "<h3></h3>";
            }
           ?>
            <div class="row">
                <div class="col-md-12">

                  <?php

                  if($_POST==null){
                    echo "<h3></h3>";
                  }
                  else if($_POST['espacos']=="Espaços"){
                    echo '<table border="1" class="calendar" cellpadding="10" cellspacing="10">';
                    echo '<caption id="tituloCalendario" title="(diverte_espaco)">';
                        echo '<tbody id="calendario" >';
                            echo '<tr>
                                <th width="10%" abbr="ID" title="ID" class="TituloTabela">ID</th>
                                <th width="30%" abbr="Nome" title="Nome" class="TituloTabela">NOME</th>
                                <th width="30%" abbr="Email" title="Email" class="TituloTabela">ENDEREÇO</th>
                                <th width="30%" abbr="Telefone" title="Telefone" class="TituloTabela">PREÇO</th>
                            </tr>';
                            echo '<tr>
                                <th width="10%" abbr="ID" title="ID" class="TituloTabela">(id)</th>
                                <th width="30%" abbr="Nome" title="Nome" class="TituloTabela">(nome)</th>
                                <th width="30%" abbr="Email" title="Email" class="TituloTabela">(endereco)</th>
                                <th width="30%" abbr="Telefone" title="Telefone" class="TituloTabela">(preco)</th>
                            </tr>';
                            $resultado = $mysql->mysqlSelectQuery("SELECT * FROM diverte_espaco");
                            foreach($resultado as $valor){
                              echo "\n<tr>\n";
                              echo "<td> $valor[0]</td>\n";
                              echo "<td> $valor[1]</td>\n";
                              echo "<td> $valor[2]</td>\n";
                              echo "<td> $valor[3]</td>\n";
                              echo "\n</tr>\n";
                            }
                            echo'</tbody>
                    </table>';
                    //var_dump($resultado);
                  }
                  else if($_POST['usuarios']=="Usuarios"){
                    echo '<table border="1" class="calendar" cellpadding="10" cellspacing="10">';
                    echo '<caption id="tituloCalendario" title="(diverte_usuario)">';
                        echo '<tbody id="calendario" >';
                            echo '<tr>
                                <th width="10%" abbr="ID" title="ID" class="TituloTabela">ID</th>
                                <th width="30%" abbr="Nome" title="Nome" class="TituloTabela">NOME</th>
                                <th width="30%" abbr="Email" title="Email" class="TituloTabela">EMAIL</th>
                                <th width="30%" abbr="Telefone" title="Telefone" class="TituloTabela">TELEFONE</th>
                            </tr>';
                            echo '<tr>
                                <th width="10%" abbr="ID" title="ID" class="TituloTabela">(id)</th>
                                <th width="30%" abbr="Nome" title="Nome" class="TituloTabela">(nome)</th>
                                <th width="30%" abbr="Email" title="Email" class="TituloTabela">(email)</th>
                                <th width="30%" abbr="Telefone" title="Telefone" class="TituloTabela">(telefone)</th>
                            </tr>';
                            $resultado = $mysql->mysqlSelectQuery("SELECT * FROM diverte_usuario");
                            foreach($resultado as $valor){
                              echo "\n<tr>\n";
                              echo "<td> $valor[0]</td>\n";
                              echo "<td> $valor[1]</td>\n";
                              echo "<td> $valor[2]</td>\n";
                              echo "<td> $valor[3]</td>\n";
                              echo "\n</tr>\n";
                            }
                            echo'</tbody>
                    </table>';
                    //var_dump($resultado);
                  }
                  else if($_POST['espacosAlugados']=="Espaços Alugados"){
                    echo '<table border="1" class="calendar" cellpadding="10" cellspacing="10">';
                    echo '<caption id="tituloCalendario" title="(diverte_alugueis)">';
                        echo '<tbody id="calendario" >';
                            echo '<tr>
                                <th width="10%" abbr="ID" title="ID" class="TituloTabela">ID</th>
                                <th width="22.5%" abbr="Nome" title="Espaco" class="TituloTabela">ESPAÇO</th>
                                <th width="30%" abbr="Email" title="Locatario" class="TituloTabela">LOCATÁRIO</th>
                                <th width="22.5%" abbr="Telefone" title="Data" class="TituloTabela">DATA</th>
                                <th width="15%" abbr="Preco" title="Preço" class="TituloTabela">PREÇO (R$)</th>
                            </tr>';
                            echo '<tr>
                                <th width="10%" abbr="ID" title="ID" class="TituloTabela">(id)</th>
                                <th width="22.5%" abbr="Nome" title="Espaco" class="TituloTabela">(nome)</th>
                                <th width="30%" abbr="Email" title="Locatario" class="TituloTabela">(-)</th>
                                <th width="22.5%" abbr="Telefone" title="Data" class="TituloTabela">(-)</th>
                                <th width="15%" abbr="Preco" title="Preço" class="TituloTabela">(preco)</th>
                            </tr>';
                            $resultado = $mysql->mysqlSelectQuery("SELECT * FROM diverte_alugueis INNER JOIN diverte_usuario ON diverte_usuario.ID=diverte_alugueis.ID_USUARIO INNER JOIN
                            diverte_espaco ON diverte_alugueis.ID_ESPACO=diverte_espaco.ID");
                            //var_dump($resultado);
                            foreach($resultado as $valor){
                              echo "\n<tr>\n";
                              echo "<td> $valor[0]</td>\n";
                              echo "<td> $valor[9]</td>\n";
                              echo "<td> $valor[5]</td>\n";
                              echo "<td> $valor[3]</td>\n";
                              echo "<td> $valor[11]</td>\n";
                              echo "\n</tr>\n";
                            }
                            echo'</tbody>
                    </table>';
                    //var_dump($resultado);
                  }
                  else if($_POST['query']!=null){
                    $query = $_POST['query'];
                    $comando = $_POST['valorSelecionado'];
                    //var_dump($_POST);
                    if($comando == "SELECT"){
                      try{
                        $resultado = $mysql->mysqlSelectQuery("$query");
                        echo "<h3> SAIDA DO COMANDO SQL </h3>";
                        echo "<p> Logo abaixo segue a saida do comando SQL executado!. </p>";
                        var_dump($resultado);
                      }catch(Exception $e){
                      echo "<h3> ERRO NA EXECUÇÃO DO SQL </h3>";
                      echo "<p> $e </p>";
                      }
                    }
                    else if($comando == "INSERT"){
                      try{
                        $resultado = $mysql->mysqlInsertQuery("$query");
                        echo "<h3> SAIDA DO COMANDO SQL </h3>";
                        echo "<p> Logo abaixo segue a saida do comando SQL executado!. </p>";
                        $resultado = "Comando Executado com Sucesso!";
                        var_dump($resultado);
                      }catch(Exception $e){
                      echo "<h3> ERRO NA EXECUÇÃO DO SQL </h3>";
                      echo "<p> $e </p>";
                      }
                    }
                    else if($comando == "UPDATE"){
                      try{
                        $resultado = $mysql->mysqlUpdateQuery("$query");
                        echo "<h3> SAIDA DO COMANDO SQL </h3>";
                        echo "<p> Logo abaixo segue a saida do comando SQL executado!. </p>";
                        $resultado = "Comando Executado com Sucesso!";
                        var_dump($resultado);
                      }catch(Exception $e){
                      echo "<h3> ERRO NA EXECUÇÃO DO SQL </h3>";
                      echo "<p> $e </p>";
                      }
                    }
                    else if($comando == "DELETE"){
                      try{
                        $resultado = $mysql->mysqlDeleteQuery("$query");
                        echo "<h3> SAIDA DO COMANDO SQL </h3>";
                        echo "<p> Logo abaixo segue a saida do comando SQL executado!. </p>";
                        $resultado = "Comando Executado com Sucesso!";
                        var_dump($resultado);
                      }catch(Exception $e){
                      echo "<h3> ERRO NA EXECUÇÃO DO SQL </h3>";
                      echo "<p> $e </p>";
                      }
                    }

                  }
                  else{
                    echo "<h3></h3>";
                  }
                   ?>

                </div>
            </div>
        </div>
    </div>
</article>

<!-- fim do conteúdo -->

    </section>

    <footer>
        <div class="navbar" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <a class="logo-footer" href="<?= $this->url(array('home')) ?>" title="Galeria Boulevard">Diverte Festas</a>
                    </div>

                    <div class="col-md-8 col-sm-12 col-md-offset-1">
                        <h4 style="margin-top:20px;">Novidades</h4>
                        <p>Quero receber novidades e promoções?</p>
                        <form class="row newsletter margin30" id="form" name="newsletter" role="form" method="post" action="#" data-toggle="validator">
                            <label class="col-sm-4 col-xs-12 form-group">
                                <input name="news-name" id="news-name" type="text" class="form-control" placeholder="nome" required="">
                                <div class="help-block with-errors"></div>
                            </label>
                            <label class="col-sm-5 col-xs-12 form-group">
                                <input name="news-email" id="news-email" type="text" class="form-control" placeholder="e-mail" required="">
                                <div class="help-block with-errors"></div>
                            </label>
                            <label class="col-sm-3 col-xs-12 form-group"><input name="Submit" type="submit" value="quero receber" class="disabled" style="pointer-events: all; cursor: pointer;"></label>
                        </form>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-sm-3">
                        <ul>
                            <li><a href="index.php" title="Inicial">Inicial</a></li>
                            <li><a href="reservas.html" title="Reservas">Reservas</a></li>
                            <li><a href="sobre.html" title="Imagens">Sobre</a></li>
                            <li><a href="contato.html" title="Contato">Contato</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-4 col-sm-offset-1">
                        <h4>Atendimento ao cliente</h4>
                        <p>Para falar diretamente conosco utilize nosso canal de atendimento via telefone ou agende uma visita.</p>
                        <address>
                            <strong>Diverte Festas</strong><br>
                            Avenida Nononononono, 123 Campinas - SP <br>Cep: 13091-000 - Telefone: 19 9999-9999<br><br>
                        </address>
                    </div>
                </div>
                <div class="row border-top">
                    <div class="col-xs-11 copyright">
                        all rights © Diverte Festa
                    </div>
                    <div class="col-xs-1 obelisco">
                        <a href="http://www.obeliscosoftware.com.br" target="_blank" title="Obelisco Software">Obelisco Software</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="public_assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public_assets/js/fancybox/fancybox.js"></script>
    <script type="text/javascript" src="public_assets/js/maskedinput.js"></script>
    <script type="text/javascript" src="public_assets/js/datepicker.js"></script>
    <script type="text/javascript" src="public_assets/js/validator.js"></script>
    <script type="text/javascript" src="public_assets/js/main.js"></script>


</body>
</html>
