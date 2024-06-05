<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
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
        <form action="produto.php" method="post" name="produto">
            <table width="200" border="1">
                <tr>
                    <td>Digite o nome do jogo:</td>
                    <td><input type="text" name="nome"></td>
                </tr>
                <tr>
                    <td>Digite para qual console o jogo é o:</td>
                    <td><input type="text" name="console"></td>
                </tr>
                <tr>
                    <td>Digite o preço do jogo:</td>
                    <td><input type="numeric" name="preco"></td>
                </tr>
                <tr>
                    <td>Digite a quantidade em estoque:</td>
                    <td><input type="numeric" name="quantidade_estoque"></td>
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

            $nome                             =$_POST['nome'];  
            $console                          =$_POST['console'];
            $preco                            =$_POST['preco'];
            $quantidade_estoque               =$_POST['quantidade_estoque'];  
            
            $sql = "INSERT into produto(nome, console, preco, quantidade_estoque)
            values ('$nome', '$console', '$preco', '$quantidade_estoque')";

            if ($result = $mysqli->query($sql)) {
                $msg ="Cadastro feito com sucesso!";
            }

            else {
                $msg = "Tente novamente";
            }
            echo $msg ; 
}
        ?>


</html>