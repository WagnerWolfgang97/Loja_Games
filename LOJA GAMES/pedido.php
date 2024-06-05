<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu pedido</title>
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
            <form action="pedido.php" method="post" name="pedido">
                <table width="95%" border="1">
                    <tr>
                        <td>Faça Seu pedido abaixo</td>
                    </tr>
                    <tr>
                        <td>Código do cliente:</td>
                        <td><input type="numeric" name="fk_cliente_Cod"></td>
                    </tr>
                    <tr>
                        <td>Digite o código do produto em catálogo:</td>
                        <td><input type="numeric" name="fk_produto_cod"></td>
                        <td>Quantidade</td>
                        <td><input type="numeric" name="qtde_produto"></td>
                    <tr>
                        <td>Selecione o código da transportadora:</td>
                        <td><input type="numeric" name="fk_transportadora_idtransportadora"></td>
                    </tr>
                    <tr>
                        <td>Digite a data de Hoje</td>
                        <td><input type="date" name="data_pedido"></td>
                    </tr>
                    <td colspan="2" align="rigth">
                        <input type="submit" value="Gravar" name="botao">
                        <input type="reset" value="Limpar" name="botao">
                    </td>
                </table>
        
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

            </form>

    </header>   
   
<           <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
            require ('conectaBD.php');
            
            $fk_cliente_Cod                                     = $_POST['fk_cliente_Cod'];
            $qtde_produto                                       = $_POST['qtde_produto'];
            $fk_produto_cod                                     = $_POST['fk_produto_cod'];
            $fk_transportadora_idtransportadora                 = $_POST['fk_transportadora_idtransportadora'];
            $data_pedido                                        = $_POST['data_pedido'];


            $sqlCount = "SELECT quantidade_estoque FROM ATPUNI.produto WHERE cod = '$fk_produto_cod'";
            $resultCount =$mysqli->query($sqlCount);
            $rowCount = $resultCount->fetch_assoc();

            if ($rowCount && $rowCount['quantidade_estoque'] >= $qtde_produto){
                                   
                    $sql = "INSERT into pedido(fk_cliente_Cod, fk_produto_cod, qtde_produto, fk_transportadora_idtransportadora, data_pedido)
    
                    VALUES('$fk_cliente_Cod', '$fk_produto_cod', '$qtde_produto', '$fk_transportadora_idtransportadora', '$data_pedido')";

                    if ($mysqli->query($sql)) {
                        //UPDATE ESTOQUE MYSQL
                        $new_quantity = $rowCount['quantidade_estoque'] - $qtde_produto;
                        $update_sql = "UPDATE produto SET quantidade_estoque = '$new_quantity' WHERE cod = '$fk_produto_cod'";
                        $mysqli->query($update_sql);

                        $msg="Cadastro feito com sucesso";
                    }

                }else{
                   $msg="Produto sem estoque";

                }


                echo $msg ;        

    }
    

?>
</body>
</html>