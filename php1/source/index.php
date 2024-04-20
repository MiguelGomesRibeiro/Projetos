<!DOCTYPE html>
<html lang="pt">
<head>

	<?php include 'inc/senhas.php'; ?>
	<?php include 'inc/head.php'; ?>

	<title>Listagem - Aulas PHP</title>

</head>

<body>

<div>Inserir um <a href="formulario.php?id=0">NOVO</a> registro</div>
<br /><br />

<div id="titulo" class="cabeca">

	<div class="borda1" style="width: 100px;">Id</div>
	<div class="borda1" style="width: 400px;">Nome</div>
	<div class="borda1" style="width: 100px;">Ativo</div>
	<div class="borda1" style="width: 150px;">Nascimento</div>
	<div class="borda1" style="width: 150px;">Salário</div>
	<div class="borda1" style="width: 150px;">Ações</div>

</div>


<?php

	// listar todas as pessoas
	$sql1 = "SELECT Id, Nome, Ativo, DataNascimento, Salario FROM Pessoas ORDER BY Nome ASC";

    // abrir conexão com o banco de dados
	$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbDataBaseName);

    // executar o comando que consulta todas a linha na tabela
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

	/*

	// apenas para ajudar a debugar:
	var_dump($conn);
	
	var_dump($sql1);

	var_dump($result1);
	*/

	// iniciar o contador de total de registros exibidos na tela.
	$contador_total = 0;

    while($row = $result1->fetch_assoc()) 
	{
		// incrementar o contador de tota de registros exibidos na tela.
		$contador_total = $contador_total + 1;

		?>

		<div id="pessoa<?php echo $row["Id"]; ?>">

			<div class="borda1" style="width: 100px;"><?php echo $row["Id"]; ?></div>

			<div class="borda1" style="width: 400px;"><?php echo $row["Nome"]; ?></div>

			<div class="borda1" style="width: 100px;">
				<?php 
					if ($row["Ativo"]) 
						echo 'SIM';
					else 
						echo 'NÃO';
				?>
			</div>
			<div class="borda1" style="width: 150px;">
				<?php 
					// formatar a data que veio do banco, em formato dia/mes/ano
					echo date('d/m/Y',strtotime($row["DataNascimento"])); 
				?>
			</div>
			
			<div class="borda1" style="width: 150px;">
				R$ 
				<?php 
					// formatar o salario para conter separador de milhar e 2 casas decimais
					echo number_format($row["Salario"],2,",",".");
				?>
			</div>

			<div class="borda1" style="width: 150px;">
				<a href="formulario.php?id=<?= $row["Id"]; ?>">Editar</a> |
				<a href="apagar.php?id=<?= $row["Id"]; ?>">Apagar</a>
			</div>


		</div>

		<?php
			
	} // fechamento do while

    // fechar conexão com o banco de dados
    mysqli_close($conn);

?>

	<br /><br />
	<br /><br />
	<br /><br />

	<div>Foram encontrados <?php echo $contador_total; ?> registros.</div>

    <?php include 'inc/scriptRodape.php'; ?>

</body>

</html>
