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

        header{width: auto;
        height: 130px;
        text-align: center;
        border-bottom: 1px solid blue;
        color: white;}

        label{color: white;}
    </style>
</head>
<body>
    <header>
        <div>
            <h1>Login usuario</h1>
        </div>
    </header>
    <article>
        <br><br><br>
        <center>
            <div class="form">
                <form action="processaCliente.php" method="post">
                    <label for="cliente">insira seu email:</label>
                    <input type="email" name="cliente" id="cliente">
                    <label for="senha">insira sua senha:</label>
                    <input type="password" name="senha" id="senha">
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </center>  
    </article>
</body>
</html>