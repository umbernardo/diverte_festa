<?php
include_once ('public_assets/openboleto-master/autoloader.php');
include_once ('public_assets/php/espaco.php');
include_once ('public_assets/php/ConfiguracaoBanco.class.php');
echo "<html> <head> <meta charset='UTF-8'/> </head> </html>";

use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;

$conf = new ConfiguracaoBanco();
$informacoes_BD = $conf->getConfiguracaoBanco();

$unidade = $_POST['Unidade'];
$nome = $_POST['Nome'];
$email = $_POST['E-mail'];
$telefone = $_POST['Telefone'];
$data = $_POST['Data'];
$espaco = new Espaco($informacoes_BD);
$endereco = $espaco->retornarEnderecoEspaco($unidade);
$preco = $espaco->retornarPrecoEspaco($unidade);

$sacado = new Agente($nome, $email, '', $telefone, 'Campinas', 'SP');
$cedente = new Agente('Diverte Festa LTDA - Unidade '.$unidade, '10.999.888/0001-24', $endereco[0], ' ', 'Campinas', 'SP');

$boleto = new BancoDoBrasil(array(
    // Parâmetros obrigatórios
    'dataVencimento' => new DateTime($data),
    'valor' => $preco[0],
    'sequencial' => 1234567, // Para gerar o nosso número
    'sacado' => $sacado,
    'cedente' => $cedente,
    'agencia' => 1724, // Até 4 dígitos
    'carteira' => 18,
    'conta' => 10403005, // Até 8 dígitos
    'convenio' => 1234, // 4, 6 ou 7 dígitos
));

echo $boleto->getOutput();

?>