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
        text-align: center;
        border-bottom: 1px solid blue;
        color: white;}

        label{color: white;}
    </style>
</head>
<body>
    <header>
        <div>
            <h1>Login administrador</h1>
        </div>
    </header>
    <article>
        <br><br><br>
        <center>
            <div class="form">
                <form action="loginAdmin.php" method="post">
                    <label for="name">Insira seu nome:</label>
                    <input type="text" name="name" id="name">
                    <label for="pass">Insira sua senha:</label>
                    <input type="passsword" name="pass" id="pass">
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </center>      
    </article>
    <?php
    session_start();
    include("conexao.php");
    try{
        if(isset($_POST["name"])){
            

            if ($conexao->connect_error) {
            echo "server morreu". $conexao->connect_error;
            }
            else{
                $name = $conexao->real_escape_string($_POST["name"]);
                $pass = $conexao->real_escape_string($_POST["pass"]);
                $senhaCripto = hash("sha256", $pass);
                $sql = "SELECT `name` FROM `admin` WHERE `name`='".$name."' AND `senha`='".$senhaCripto."' AND `cargo`='a';";
                $result = $conexao->query( $sql);
                if ($result->num_rows == 1) {
                    $row = mysqli_fetch_array( $result );
                    $_SESSION["name"] = $row[0];
                    header("location: pagAdmin.php", true,301);
                }else{
                    header("location: loginAdmin.php", true,301);
                }
            }           
        }
    }
    catch(Exception $e){
        echo "". $e->getMessage();
    }
    finally{
        $conexao->close();
    }
    ?>
</body>
</html>