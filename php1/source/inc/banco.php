<?php


// abrir a conexão com o banco de dados.
include "bancoAbre.php";


// rodar a query.
$result1 = $conn->query($sql1);

if (!$result1)
{
    $error_msg = mysqli_error($conn);
    echo "Failed to execute query. Error message: " . $error_msg;
}


// verificar se temos uma segunda query para executar?
if (isset($sql2))
{
	// temos, então executar.
	$result2 = $conn->query($sql2);

	if (!$result2)
	{
		$error_msg = mysqli_error($conn);
		echo "Failed to execute query. Error message: " . $error_msg;
	}
	
}


// fechar a conexão com o banco de dados.
include "bancoFecha.php";


?>
