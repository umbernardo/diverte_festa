<?php
		include_once ('public_assets/php/espaco.php');
		include_once ('public_assets/php/ConfiguracaoBanco.class.php');
		$Configuracao_Banco = new ConfiguracaoBanco();
		$informacoes_BD = $Configuracao_Banco->getConfiguracaoBanco();
		$espaco = new Espaco($informacoes_BD);
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
	<link href="public_assets/css/index.css" rel="stylesheet">

    <link rel="shortcut icon" href="public_assets/images/logo.png">

    <script type="text/javascript" src="public_assets/js/jquery.js"></script>
    <script type="text/javascript" src="public_assets/js/bxslider.js"></script>

	<!-- Pre Carregar Variáveis -->
	<script type="text/javascript">
		var stringArrayValores;
		var stringArrayEspacos;
		stringArrayValores = "<?php echo $espaco->retornarValoresString(); ?>";
		stringArrayEspacos = "<?php echo $espaco->retornarEspacosString(); ?>";
		var valores_Array = stringArrayValores.split("|");
		var espacos_Array = stringArrayEspacos.split("|");
		data = new Date();
		var MES_ATUAL = data.getMonth();
		var ANO_ATUAL = data.getFullYear();
		var DIA_ATUAL = data.getDate();
		diaDoMes = new Date(ANO_ATUAL, MES_ATUAL, 1);
		var valorVetorialDiaDaSemana = diaDoMes.getDay();
		var DiasReservados;
		var datasReservadasString = "<?php echo $espaco->retornarDatasAlugadas(); ?>";
		var datasReservadasArray = datasReservadasString.split("|");
	</script>
	<script type="text/javascript" src="public_assets/js/index.js"></script>


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
            <h2>Faça sua festa</h2>
        </div>
    </div>
    <div class="row margin30 info-content">
        <div class="col-sm-4">
            <img src="public_assets/images/img-aside.jpg">
        </div>

        <div class="col-sm-8">
            <h3>Reservas</h3>
            <p>Escolha um espaço para verificar disponibilidade.</p>
            <p>Apenas após a confirmação (via e-mail de nosso administrador) o espaço ficará reservado em nosso sistema.</p>
            <p>As chaves serão liberadas as 10h do dia do evento e deverão ser devolvidas as 9h do dia seguinte a reserva</p>

            <div class="row">
                <div class="col-md-6">

                    <!-- todo bloco abaixo será substituido pelo: http://www.vissit.com/projects/eventCalendar/ -->
                    <h3 id="TituloEspaco"> </h3>
                    <table border="1" class="calendar" cellpadding="2" cellspacing="0">
                        <caption id="tituloCalendario" title="Novembro"><button id="voltarCalendario"> < </button>Novembro 2015 <button id="avancarCalendario"> > </button></caption>
                        <tbody id="calendario" >
                            <tr>
                                <th width="15%" abbr="Domingo" title="Domingo">dom</th>
                                <th width="14%" abbr="Segunda" title="Segunda">seg</th>
                                <th width="14%" abbr="Terça" title="Terça">ter</th>
                                <th width="14%" abbr="Quarta" title="Quarta">qua</th>
                                <th width="14%" abbr="Quinta" title="Quinta">qui</th>
                                <th width="14%" abbr="Sexta" title="Sexta">sex</th>
                                <th width="15%" abbr="Sábado" title="Sábado">sáb</th>
                            </tr>
                            <tr>
                                <td id="dom1">-</td>
                                <td id="seg1">-</td>
                                <td id="ter1">-</td>
                                <td id="qua1">-</td>
                                <td id="qui1">-</td>
                                <td id="sex1">-</td>
                                <td id="sab1">-</td>
                            </tr>
                            <tr>
                                <td id="dom2">-</td>
                                <td id="seg2">-</td>
                                <td id="ter2">-</td>
                                <td id="qua2">-</td>
                                <td id="qui2">-</td>
                                <td id="sex2">-</td>
                                <td id="sab2">-</td>
                            </tr>
                            <tr>
                                <td id="dom3">-</td>
                                <td id="seg3">-</td>
                                <td id="ter3">-</td>
                                <td id="qua3">-</td>
                                <td id="qui3">-</td>
                                <td id="sex3">-</td>
                                <td id="sab3">-</td>
                            </tr>
                            <tr>
                                <td id="dom4">-</td>
                                <td id="seg4">-</td>
                                <td id="ter4">-</td>
                                <td id="qua4">-</td>
                                <td id="qui4">-</td>
                                <td id="sex4">-</td>
                                <td id="sab4">-</td>
                            </tr>
                            <tr>
                                <td id="dom5">-</td>
                                <td id="seg5">-</td>
                                <td id="ter5">-</td>
                                <td id="qua5">-</td>
                                <td id="qui5">-</td>
                                <td id="sex5">-</td>
                                <td id="sab5">-</td>
                            </tr>
							<tr>
                                <td id="dom6">-</td>
                                <td id="seg6">-</td>
                                <td id="ter6">-</td>
                                <td id="qua6">-</td>
                                <td id="qui6">-</td>
                                <td id="sex6">-</td>
                                <td id="sab6">-</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Fim do código que deverá ser substituido -->

                    <p>Os dias marcados já se encontram reservados.</p>
                </div>
                <div class="col-md-6">
                    <h3>Espaços</h3>
                    <form class="row" name="cadastro" role="form" method="post" action="public_assets/php/realizarReserva.php" data-toggle="validator">
                        <label class="col-xs-12 form-group">
                            <select onChange="selecionarEspaco()" id="selecionador" class="form-control" name="Escolha a unidade">
                                <option selected>selecione o espaço</option>
								<?php
									$espaco = new Espaco($informacoes_BD);
									$resultado = $espaco->retornarArrayEspacoTag("<option>","</option>");
									foreach($resultado as $valor){
										echo "\t\t\t\t$valor\n";
									}

								?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </label>

						<h5 id="preco"> </h5>

                        <label class="col-xs-12 form-group">
                            <input name="Datas Disponíveis" id="dataT" type="text" class="form-control datepicker" placeholder="Data selecionada" readonly="readonly" required>
                            <div class="help-block with-errors"></div>
                        </label>
                        <label class="col-xs-12 form-group">
                            <input name="Nome" type="text" class="form-control" placeholder="Nome completo" required>
                            <div class="help-block with-errors"></div>
                        </label>
                        <label class="col-xs-12 form-group">
                            <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                            <div class="help-block with-errors"></div>
                        </label>
                        <label class="col-xs-12 form-group">
                            <input name="telefone" type="phone" class="form-control" placeholder="Telefone" required>
                            <div class="help-block with-errors"></div>
                        </label>
												<input type="hidden" value="none" name="CampoPreco" id="campoPreco"/>

                        <label class="col-sm-6 xs-hidden form-group">&nbsp;</label>
                        <label class="col-sm-6 col-xs-12 form-group"><input name="Submit" type="submit" value="enviar"></label>

                    </form>
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
