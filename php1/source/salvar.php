<?php include 'inc/senhas.php'; ?>

<?php

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $ativo = $_POST["ativo"];

    // verificar se o campo ativo veio vazio ?
    if ($ativo == "")
    {
        // veio vazio, então o checkbox estava desmarcado
        // então pessoa esta inativa.
        $ativo = "0";
    }
    else
    {
        // veio com qq conteudo, então o checkbox estava marcado
        // então pessoa esta ativa.
        $ativo = "1";
    }

    $dataNascimento = $_POST["dataNascimento"];

    // substituir barra por sinal de menos.
    $dataNascimento = str_replace("/","-",$dataNascimento);

    // converter data formado dia/mes/ano em formato ano/mes/dia
    $date = DateTime::createFromFormat('d-m-Y', $dataNascimento);
    $dataNascimento = $date->format('Y-m-d');

    $salario = $_POST["salario"];
    // remover separador de milhar
    $salario = str_replace(".", "", $salario);
    // trocar virgula do centavo por ponto
    $salario = str_replace(",", ".", $salario);


    // exibir informações na tela 
    // apenas para debugar.
    echo "<br> Id = " . $id;
    echo "<br> Nome = " . $nome;
    echo "<br> Ativo = " . $ativo;
    echo "<br> DataNascimento = " . $dataNascimento;
    echo "<br> Salario = " . $salario;

    // verificar se não temos valor no campo ID ?
    if ($id == "" || $id == "0")
    {
        // não temos valor de id então é novo registro
        // inserir  a pessoa usando as informações recebidas como parametro.
        $sql1 = "INSERT INTO Pessoas (nome, ativo, dataNascimento, salario) VALUES (";
        $sql1 = $sql1 . "'" . $nome . "', ";
        $sql1 = $sql1 . $ativo . ", ";
        $sql1 = $sql1 . "'" . $dataNascimento . "', ";
        $sql1 = $sql1 . $salario;
        $sql1 = $sql1 . ")" ;
    }
    else
    {
        // temos valor de id então é alteração de registro
        // alterar  a pessoa usando as informações recebidas como parametro.
        $sql1 = "UPDATE Pessoas SET ";
        $sql1 = $sql1 . "Nome = '" . $nome . "', ";
        $sql1 = $sql1 . "Ativo = " . $ativo . ", ";
        $sql1 = $sql1 . "DataNascimento = '" . $dataNascimento . "', ";
        $sql1 = $sql1 . "Salario = " . $salario;
        $sql1 = $sql1 . " WHERE Id = " . $id;
    }


    // apenas para debugar:
    echo "<br /><br />";
    echo "sql1 = " . $sql1;

    // abrir conexão com o banco de dados
	$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbDataBaseName);

    // executar o comando que insere ou altera a a linha na tabela
    $result1 = mysqli_query($conn, $sql1);

    // verificar se não tiver resultado retornado ?
	if (!$result1)
	{
        // como não teve resultado retornado dentro do objeto
        // então exibir mensagem de erro na tela.
		$error_msg = mysqli_error($conn);
        echo "<br /><br />";
		echo "Failed to execute query. Error message: " . $error_msg;
		exit();
	}

    // fechar conexão com o banco de dados
    mysqli_close($conn);

    // levar de volta para a pagina principal de listagem
    header('Location: index.php');

?>