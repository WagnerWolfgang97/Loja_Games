<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Transportadora</title>
    <?php include('conectaBD.php') ?>
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
    <form action="transportadora.php" method="post" name="transportadora">
        <table width="200" border="1">
            <tr>
                <td>Digite o código da franqueada:</td>
                <td><input type="int" name="idtransportadora"></td>
            </tr>
            <tr>
                <td>Digite o nome do motorista:</td>
                <td><input type="text" name="motorista"></td>
            </tr>
            <tr>
                <td>Digite o telefone do entregador:</td>
                <td><input type="text" name="telefone"></td>
            </tr>
            <tr>
                <td>Digite a CNH do motorista:</td>
                <td><input type="text" name="cnh"></td>
            </tr>
            <td colspan="2" align="rigth">
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
            require ('conectaBD.php');

            $idtransportadora            = $_POST['idtransportadora'];  
            $motorista                   = $_POST['motorista'];
            $telefone                    = $_POST['telefone'];
            $cnh                         = $_POST['cnh'];  
            
            $sql = "INSERT into transportadora(idtransportadora, motorista, telefone, cnh)
            values ('$idtransportadora', '$motorista', '$telefone', '$cnh')";

            if ($result = $mysqli->query($sql)) {
                $msg ="Cadastro feito com sucesso!";
            }

            else {
                $msg ="Erro! Tente novamente";
            }
            
            echo $msg ; 
}
    ?>

</html>