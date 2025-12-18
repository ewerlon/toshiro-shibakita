<html>
<head>
    <title>Exemplo PHP</title>
</head>
<body>

<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=iso-8859-1');

echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

$servername = "54.234.153.24";
$username   = "root";
$password   = "Senha123";
$database   = "meubanco";

/* Criar conexão */
$link = new mysqli($servername, $username, $password, $database);

/* Verificar conexão */
if ($link->connect_error) {
    die("Falha na conexão: " . $link->connect_error);
}

/* Gerar dados aleatórios */
$cliente_id = rand(1, 999);
$valor_rand = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$email      = strtolower($valor_rand) . "@teste.com";

/* Query ajustada para a tabela clientes */
$query = "
    INSERT INTO clientes 
        (ClienteID, Nome, Sobrenome, Endereco, Cidade, Email) 
    VALUES 
        ('$cliente_id', '$valor_rand', '$valor_rand', '$valor_rand', '$valor_rand', '$email')
";

/* Executar query */
if ($link->query($query) === TRUE) {
    echo "Novo cliente criado com sucesso!";
} else {
    echo "Erro: " . $link->error;
}

/* Fechar conexão */
$link->close();
?>

</body>
</html>
