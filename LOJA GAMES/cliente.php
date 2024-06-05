<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro cliente</title>
    <?php include('./conectaBD.php') ?>
    <style>
        header {
        background-color:rgba(114, 248, 250, 0.5);
        width: auto;
        padding: 50px;
        margin-top: auto;
        font-family:Arial, Helvetica, sans-serif;
        text-align:start ;
        border-style:groove;
        border: thick groove rgba(98,13,181,0.99);
        border-width: 30px;
        margin-bottom: 10px;
        background-image: url(./imagens/controle.png) ;
        background-repeat: no-repeat;
        background-position:right 50%;
        }
        body {
            background-image: url(imagens/containerfoto.png);
            margin: auto;
            margin-left: 10%;
            margin-right: 10%;
            margin-bottom: auto;
            font-family:Arial, Helvetica, sans-serif;

        }
        table {
            font-style: italic;
            background-color:rgba(189, 189, 255, 0.9);
            border-style:groove;
            border: thick groove rgba(98,13,181,0.99);
            border-width: 30px;
            margin-bottom: 10px;
            font-family:Arial, Helvetica, sans-serif;
        }

        table-1 {
        font-family:Arial, Helvetica, sans-serif;
        background-color:rgba(211, 248, 250, 0.9);
        width: 50px;
        padding: 20px;
        font-family:fantasy;
        text-align: center;
        border-style:groove;
        border: thick groove rgba(98,13,181,0.99);
        border-width: 30px;
        margin-bottom: 10px;
        background-repeat: no-repeat;
        background-position:right 50%;
        }
    </style>
</head>
<body> 
    <header>
    <form action="cliente.php" method="post" name="cliente">
            <table width="200" border="1">
                <tr>
                    <td>Digite seu nome:</td>
                    <td><input type="text" name="nome"></td>
                </tr>
                <tr>
                    <td>Digite seu Endereço:</td>
                    <td><input type="text" name="endereco"></td>
                </tr>
                <tr>
                    <td>Digite seu CPF:</td>
                    <td><input type="text" name="cpf"></td>
                </tr>
                <tr>
                    <td>Digite seu telefone:</td>
                    <td><input type="text" name="telefone"></td>
                </tr>
                <td align="rigth">
                    <input type="submit" value="Gravar" name="botao">
                    <input type="reset" value="Limpar" name="botao">
                </td>
            </table>
        </form>
        <br><br><br><br><br><br><br><br>
<table-1>
    <tr>
        <th width="20%">
            <a href="index.php">HOME</a>
        </th>
    </tr>
</table-1>
</body>
</html>

    </header>   
</body>

<<?php      if ($_SERVER["REQUEST_METHOD"] == "POST"){
            require ('./conectaBD.php');

            $nome        =$_POST['nome'];  
            $endereco    =$_POST['endereco'];
            $cpf         =$_POST['cpf'];
            $telefone    =$_POST['telefone'];  
            
            $sql = "INSERT into cliente(nome, endereco, cpf, telefone)
            values ('$nome', '$endereco', '$cpf', '$telefone')";
            if ($result = $mysqli->query($sql)){
                $msg ="Cadastro feito com sucesso!";
            }

            else {
                $msg ="Erro! Tente novamente";
            }
        
            echo $msg ; 
}
    ?>

    
</html>