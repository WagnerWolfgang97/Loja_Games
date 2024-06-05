<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XtremeGames</title>
    <?php include('conectaBD.php') ?>
    <style>
        body {
            background-color: black;
            background-image: url('imagens/containerfoto.png');
            margin: auto;
            margin-left: 10%;
            margin-right: 10%;
            margin-bottom: auto;

        }
        main {
            background-color:rgba(236, 168, 250, 0.7);
            width: auto;
            padding: 50px;
            margin: auto;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 10px;
        }
        h1{
            color:rgba(98,13,181,0.99);
        }

        header {
        background-color:rgba(114, 248, 250, 0.7);
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
    </style>

    
</head>

<header >
<h1>Seja Bem Vindo</h1> 
<a href="cliente.php">Cadastro Cliente</a>
<br>
<br>
<a href="produto.php">Cadastro Produto</a>
<br><br>
<a href="transportadora.php">Cadastro Transportadora</a>
<br><br>
<a href="pedido.php">Fazer pedido</a>
<br><br>
<a href="rastreio.php">Rastrear pedido</a>
<br><br>
<a href="catalogo.php">Catálogo de Produtos</a>
<br><br>
<a href="relatorio.php">Relatório Vendas</a>

</header>
    <body>
        <div>
            <main> 
            <h1>Bem-vindo à Imersão Ludus, um paraíso onde os aficionados por jogos encontram sua morada definitiva. Situada no coração da cidade, esta loja é mais do que um simples estabelecimento comercial; é um santuário dedicado à arte dos jogos, onde cada título é cuidadosamente selecionado para oferecer uma experiência única aos seus adeptos.
            </h1>

            </main>
            
                
            

        </div>

        
    
</body>
</html>