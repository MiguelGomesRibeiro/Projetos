<?php include 'inc/senhas.php'; ?>

<?php

	// apagar a pessoa usando o id recebido no parametro da pagina
	$sql1 = "DELETE FROM Pessoas WHERE Id = " . $_GET["id"];

    // abrir conexão com o banco de dados
	$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbDataBaseName);

    // executar o comando que apaga a linha na tabela
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