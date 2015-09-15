<?php 
		include_once ('public_assets/php/espaco.php');
		include_once ('public_assets/php/ConfiguracaoBanco.class.php');
		$config = new ConfiguracaoBanco();
		$informacoes_BD = $config->getConfiguracaoBanco();
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
                    <a class="navbar-brand" href="index.html" title="Diverte Festas">Diverte Festas</a>
                    <select name="nav-menu" class="navbar-toggle">
                        <option>Menu</option>
                        <option value="index.html">Inicial</option>
                        <option value="reservas.html">Reservas</a></li>
                        <option value="sobre.html">Sobre</a></li>
                        <option value="contato.html">Contato</a></li>
                    </select>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" title="Inicial">Inicial</a></li>
                        <li><a href="reservas.html">Reservas</a></li>
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
            <h3>OBRIGADO!</h3>
            <p>Sua Reserva foi feita com sucesso! Por Favor, confirme as informações abaixo.</p>
			<h3> Espaço:</h3><p><?php echo $_GET['unidade'];?></p>
			<h3> Locatário:</h3><p><?php echo $_GET['nome'];?></p>
			<h3> E-mail:</h3><p><?php echo $_GET['email'];?></p>
			<h3> Telefone:</h3><p><?php echo $_GET['telefone'];?></p>
			<h3> Data:</h3><p><?php echo $_GET['data'];?></p>
			<form action="boleto.php" method="POST">
				<input type="hidden" name="Nome" value="<?php echo $_GET['nome'];?>"/>
				<input type="hidden" name="Unidade" value="<?php echo $_GET['unidade'];?>"/> 
				<input type="hidden" name="Telefone" value="<?php echo $_GET['telefone'];?>"/> 
				<input type="hidden" name="E-mail" value="<?php echo $_GET['email'];?>"/> 
				<input type="hidden" name="Data" value="<?php echo $_GET['data'];?>"/> 
				<label class="col-sm-6 col-xs-12 form-group"><input name="Submit" type="submit" value="Gerar Boleto"></label>
			</form>

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
                            <li><a href="index.html" title="Inicial">Inicial</a></li>
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