<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <?php include('conectaBD.php')?>
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

    <form action="rastreio.php" method="post" name="pedido_produto">
        <table width="95%" border="1" align="center">
            <tr>
                <td colspan=5 align="center">Rastreio de Vendas</td>
            </tr>
                <td>Digite o Seu CPF</td>
                <td><input type="text" name="cpf"></td>
            </tr>
            <tr>
            </tr>
                <td>Digite o número do seu pedido</td>
                <td><input type="text" name="numero_pedido"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Gerar" name="botao"></td>    
            </tr>
        </table>
        <a href="index.php">Home</a>
    </form>
    <?php if (isset($_POST['botao']) && $_POST['botao'] == "Gerar") { ?>


<table width="95%" border= "10" align="center">
  <tr bgcolor="#9999FF">
    <th width="20%">Nome cliente</th>
    <th width="20%">Número do Pedido</th>
    <th width="20%">Quantidade Produto</th>
    <th width="20%">Game</th>
    <th width="20%">Quantidade Compra</th>
    <th width="20%">Data da Compra</th>
    <th width="20%">Plataforma</th>
  </tr>

<?php
            $cpf                          = $_POST['cpf'];
            $numero_pedido                 = $_POST['numero_pedido'];

            $query = "SELECT cliente.nome AS cliente_nome, cliente.cod, preco, cpf, endereco, numero_pedido, qtde_produto, data_pedido, produto.nome AS produto_nome, produto.console,
            FORMAT((qtde_produto * preco), 2) AS qtde_compra
                FROM cliente
                INNER JOIN pedido ON cliente.cod = pedido.fk_cliente_Cod
                INNER JOIN produto ON produto.cod = pedido.fk_produto_cod
                WHERE cliente.cod > 0 ";
            $query .= ($cpf ? " AND cpf LIKE '%$cpf%' " : "");
            $query .= ($numero_pedido ? " AND numero_pedido LIKE '%$numero_pedido%' " : "");
            $query .= " ORDER BY pedido.fk_produto_cod ";
            $result = mysqli_query($mysqli, $query);
            $total_compra = 0;
            if ($result) {
                while ($coluna = mysqli_fetch_array($result)) {
                    $qtde_compra = $coluna['qtde_compra'];
                    $total_compra += $coluna['qtde_produto'] * $coluna['preco'];

        ?>
<tr>
    <th width="20%"><?php echo $coluna['cliente_nome']; ?></th>
  <th width="20%"><?php echo $coluna['numero_pedido']; ?></th>
  <th width="20%"><?php echo $coluna['qtde_produto']; ?></th>
  <th width="20%"><?php echo $coluna['produto_nome']; ?></th>
  <th width="20%"><?php echo $coluna['qtde_compra']; ?></th>
  <th width="20%"><?php echo $coluna['data_pedido']; ?></th>
  <th width="20%"><?php echo $coluna['console']; ?></th>

</tr>

  <?php
    }
} else {
    echo "Erro na consulta: " . mysqli_error($mysqli);
}
?>
<tr>
    <th>Valor total da compra</th>
    <th><?php echo number_format($total_compra, 2, ',', '.'); ?></th>
</tr>

</table>

<?php 
}
?>
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

    


</body>
</html>