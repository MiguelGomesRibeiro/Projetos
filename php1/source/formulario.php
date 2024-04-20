<!DOCTYPE html>
<html lang="pt">
<head>

    <?php include 'inc/senhas.php'; ?>
	<?php include 'inc/head.php'; ?>

	<title>Formulário - Aulas PHP</title>

</head>

<body id="formulario">

    <h1>Formulário de Pessoa</h1>

    <?php

        // valores default para os campos da tela.
        // usado quando é novo registro.
        $id = "";
        $nome = "";
        $ativo = "checked";
        $dataNascimento = "";
        $salario = "0,00";

        // verificar se temos o ID da pessoa informado na url da pagina ?
        // se id informado é diferente de 0 (zero)
        if (isset($_GET["id"]) && $_GET["id"] <> "0")
        {
            // temos id, então consultar no banco para editar o registro.

            // listar a pessoa desejada para edição
            $sql1 = "SELECT Id, Nome, Ativo, DataNascimento, Salario FROM Pessoas WHERE Id = " . $_GET["id"];

            // abrir conexão com o banco de dados
            $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbDataBaseName);

            // executar o comando que consulta as linhas na tabela
            $result1 = mysqli_query($conn, $sql1);

            // verificar se não tiver resultado retornado ?
            if (!$result1)
            {
                // como não teve resultado retornado dentro do objeto
                // então exibir mensagem de erro na tela.
                $error_msg = mysqli_error($conn);
                echo "Failed to execute query. Error message: " . $error_msg;
                exit();
            }

            /*

            // apenas para ajudar a debugar:
            var_dump($conn);
            
            var_dump($sql1);

            var_dump($result1);
            */

            // copiar o resultado da consulta para a variavel linha.
            $row = $result1->fetch_assoc();

            // guardar campo id sem nenhum tipo de tratamento
            $id = $row["Id"];

            // guardar campo nome sem nenhum tipo de tratamento
            $nome = $row["Nome"];
            
            // ativo="" quer dizer checkbox desmarcado na tela.
            $ativo = "";

            // verificar se o campo ativo da base esta como 'true' ?
            if ($row["Ativo"])
            {
                // ativo na base esta como 'true'
                // então colocar a palavra "checked", que será usada para marcar o checkbox na tela.
                $ativo = "checked";
            }

            // formatar a data que veio do banco, em formato dia/mes/ano
            $dataNascimento = date('d/m/Y',strtotime($row["DataNascimento"])); 

            // formatar o salario para conter separador de milhar e 2 casas decimais
            $salario = number_format($row["Salario"],2,",",".");

            // fechar conexão com o banco de dados
            mysqli_close($conn);

        }

    ?>

    <form method="POST" id="form1" action="salvar.php">


        <div id="divId" class="cabeca">

            <div class="borda1" style="width: 200px;">Id</div>

            <div class="borda1" style="width: 600px;">

                <?= $id; ?> &nbsp;

                <input type="hidden" id="id" name="id" value="<?= $id; ?>" />
        
            </div>

        </div>

        <div id="divNome" class="cabeca">

            <div class="borda1" style="width: 200px;">Nome</div>

            <div class="borda1" style="width: 600px;">

                <input type="text" id="nome" name="nome" placeholder="Informe o nome da pessoa" value="<?= $nome; ?>" />
        
            </div>

        </div>

        <div id="divNome" class="cabeca">

            <div class="borda1" style="width: 200px;"><label for="ativo">Ativo</label></div>

            <div class="borda1" style="width: 600px;">

                <input type="checkbox" id="ativo" name="ativo" value="1" <?= $ativo; ?> />
        
            </div>

        </div>

        <div id="divNome" class="cabeca">

            <div class="borda1" style="width: 200px;">Data Nascimento</div>

            <div class="borda1" style="width: 600px;">

                <input type="text" id="dataNascimento" name="dataNascimento" maxlength="10"
                placeholder="Informe a data de nascimento com dia/mês/ano" value="<?= $dataNascimento; ?>" />

            </div>

        </div>

        <div id="divNome" class="cabeca">

            <div class="borda1" style="width: 200px;">Salário</div>

            <div class="borda1" style="width: 600px;">

                <input type="text" id="salario" name="salario" placeholder="Informe o salário" value="<?= $salario; ?>" />

            </div>

        </div>


        <br /><br />
        <br /><br />
        <br /><br />

        <input type="submit" id="btnSalvar" name="btnSalvar" value="Salvar o registro" />

    </form>

    <?php include 'inc/scriptRodape.php'; ?>

</body>

</html>
