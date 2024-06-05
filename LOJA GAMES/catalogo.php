<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Catálogo de Produtos</title>
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
    <form action="catalogo.php?botao=gravar" method="post" nome="produto">
    <table>
    <tr>
    <td colspan=5 align="center">Catálogo de Produtos</td>
  </tr>
  <tr>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome"  /></td>
    <td width="17%" align="right">Console:</td>
    <td width="18%"><input type="text" name="console" size="3" /></td>
    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
    </table>
    </form>
    <?php if (@$_POST['botao'] == "Gerar") { ?>

<table width="95%" border="5" align="center">
  <tr bgcolor="#9999FF">
    <th width="5%">C&oacute;d</th>
    <th width="20%">Titulo do Game</th>
    <th width="20%">Console</th>
    <th width="12%">preco</th>
    <th width="15%">Quantidade em estoque</th>
  </tr>

<?php

	$nome                       = $_POST['nome'];
	$console                    = $_POST['console'];
	
	$query = "SELECT *
			  FROM produto 
			  WHERE produto.cod > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
    $query .= ($console ? " AND console = '$console' " : "");
	$query .= " ORDER BY cod ";
    $result = mysqli_query($mysqli, $query);

	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
    
    <tr>
      <th width="5%"><?php echo  $coluna['cod']; ?></th>
      <th width="30%"><?php echo $coluna['nome']; ?></th>
      <th width="15%"><?php echo $coluna['console']; ?></th>
      <th width="12%"><?php echo $coluna['preco']; ?></th>
      <th width="12%"><?php echo $coluna['quantidade_estoque']; ?></th>
  	</tr>

    <?php
	
	}
?>
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