<html>
<head>
    <title>Relatório Vendas</title>
    <?php include('./conectaBD.php')?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
    <form action="relatorio.php?botao=gravar" method="post" name="pedido">
        <table width="95%" border="10" align="center">
                <tr>
                    <td colspan=5 align="center">Relatório de Vendas</td>
                </tr>
                <tr>
                    <td width="9%" align="right">Produto:</td>
                    <td width="30%"><input type="text" name="nome"  /></td>
                    <td width="12%" align="right">Número do pedido</td>
                    <td width="26%"><input type="text" name="numero_pedido" size="3" /></td>
                    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
                </tr>
        </table>
    </form>

<?php if (isset($_POST['botao']) && $_POST['botao'] == "Gerar") { ?>


<table width="95%" border= "10" align="center">
  <tr bgcolor="#9999FF">
    <th width="25%">Produto</th>
    <th width="20%">Plataforma</th>
    <th width="10%">preco</th>
    <th width="20%">Quantidade de Vendas</th>
    <th width="10%">Valor total da venda</th> 
  </tr>

<?php
            $nome                          = $_POST['nome'];
            $numero_pedido                 = $_POST['numero_pedido'];

            $query = "SELECT nome, console, preco, numero_pedido, qtde_produto, 
            FORMAT((qtde_produto * preco), 2) AS qtde_venda
                FROM produto 
                INNER JOIN pedido ON produto.cod = pedido.fk_produto_cod
                WHERE produto.cod > 0 ";
            $query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
            $query .= ($numero_pedido ? " AND numero_pedido LIKE '%$numero_pedido%' " : "");
            $query .= " ORDER BY produto.cod ";
            $result = mysqli_query($mysqli, $query);
            $total_vendas = 0;
            if ($result) {
                while ($coluna = mysqli_fetch_array($result)) {
                    $qtde_venda = $coluna['qtde_venda'];
                    $total_vendas += $coluna['qtde_produto'] * $coluna['preco'];

        ?>
<tr>
  <th width="25%"><?php echo $coluna['nome']; ?></th>
  <th width="20%"><?php echo $coluna['console']; ?></th>
  <th width="10%"><?php echo $coluna['preco']; ?></th>
  <th width="20%"><?php echo $coluna['qtde_produto']; ?></th>
  <th width="10%"><?php echo $coluna['qtde_venda']; ?></th>
</tr>

  <?php
    }
} else {
    echo "Erro na consulta: " . mysqli_error($mysqli);
}
?>
<tr>
    <th>Ganho Bruto loja</th>
    <th><?php echo number_format($total_vendas, 2, ',', '.'); ?></th>
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