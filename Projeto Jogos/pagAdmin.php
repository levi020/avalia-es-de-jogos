<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{font-family: arial;
        margin: 0;
        background-image: url(fundo.jpg);
        background-repeat: no-repeat;}

        .form{width: 200px;
        height: 300px;
        text-align: center;
        border: 3px solid blue;
        }

        input{padding: 4px;
        border-radius: 12px 6px;
        }

        header{width: auto;
        height: 130px;
        border-bottom: 1px solid blue;
        text-align: center;
        color: white;}

        .form2{border: 3px solid blue;
        height: 300px;
        text-align: center;
        width: 200px;
        }
        label{color: white;}
        h2{color: white;}
    </style>
</head>
<body>
    <header>
        <div>
            <h1>
                <?php
                    session_start();
                    if(empty($_SESSION["name"])){
                        header('location:index.php', true, 301);
                    }else{
                        echo "bem vindo " . $_SESSION['name'];
                    }
                ?>
            </h1>
        </div>
    </header>
    <article>
        <br><br><br>
        <center>
            <div class="form">
                <h2>Cadastrar jogos</h2>
                <form action="Processa.php" method="post" enctype="multipart/form-data">
                    <label for="nomeJogo">nome do jogo:</label>
                    <input type="text" name="nomeJogo" id="nomeJogo" required>
                    <label for="desc">insira a descrição do jogo:</label>
                    <input type="text" name="desc" id="desc"required>
                    <label for="filePicture">insira uma imagem para o jogo:</label>
                    <input type="file" name="filePicture" id="filePicture" accept="image/*" required>
                    <label for="filePicture1">insira uma segunda imagem:</label>
                    <input type="file" name="filePicture1" id="filePicture1" accept="image/*" required>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </center>
        <br><br><br>
        <center>
            <div class=form2>
                <h2>Cadastrar clientes</h2>
                <form action="addCliente.php" method="post">
                    <label for="emailCliente">insira o email do cliente:</label>
                    <input type="text" name="emailCliente" id="emailCliente" required>
                    <label for="ciente">insira o nome do cliente</label>
                    <input type="text" name="cliente" id="cliente" required>
                    <label for="senha">insira a senha para o cliente</label>
                    <input type="text" name="senha" id="senha" required>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </center>
        
        <div>
            <a href="sair.php"><p>sair</p></a>
        </div>
    </article>
    
    </body>
</html>