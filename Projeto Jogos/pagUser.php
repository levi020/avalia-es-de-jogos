<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table , tr , th{border: 4px solid black;}

        table{width: 300px;}

        img{width: 150px;
        height: 100px;}
    </style>
</head>
<body>
    <header>
        <div>
            <?php 
                session_start();
                if(empty($_SESSION["nomeCliente"])){
                    header("location: index.php", true, 301);
                }else{
                    echo "<h1>Seja bem-vindo " . $_SESSION['nomeCliente'];
                }
            ?>
        </div>
    </header>
    <article>
        <div>
            <h2>Jogos Cadastrados</h2>
            <?php
                include("conexao.php");
                try{
                    if ($conexao->connect_error) {
                        echo "server morreu". $conexao->connect_errno;
                    }else{
                        
                        $sql = "SELECT jogoscadastrados.id, jogoscadastrados.nomeDoJogo, jogoscadastrados.admin, jogoscadastrados.descricao, jogoscadastrados.image1, jogoscadastrados.image2,
                        SUM(CASE WHEN like_deslike.likeOrDeslike = 1 THEN 1 ELSE 0 END) AS total_likes,
                        SUM(CASE WHEN like_deslike.likeOrDeslike = -1 THEN 1 ELSE 0 END) AS total_deslikes
                        FROM jogoscadastrados
                        LEFT JOIN like_deslike ON jogoscadastrados.id = like_deslike.id_jogo
                        GROUP BY jogoscadastrados.id";
                        $result = $conexao->query($sql); 
                        
                        $int = 0; 
                        echo "<center>";
                        echo "<table>";    
                        while($row = mysqli_fetch_array($result)){
                            $int++;
                            echo "
                                <tr>
                                    <th>$row[1]</th>
                                    <th>
                                        <p>descrição</p>
                                        <hr>
                                        <p>$row[3]</p>
                                    </th>
                                    <th>
                                        <img src='$row[4]'>
                                    </th>
                                    <th>
                                        <img src='$row[5]'>
                                    </th>
                                    <th>
                                        <form action='like.php' method='post'>
                                            <input type='hidden' name='like' id='like' value='$row[0]'>
                                            <button type='submit'>Like</button>
                                        </form>
                                        <form action='deslike.php' method='post'>
                                            <input type='hidden' name='deslike' id='deslike' value='$row[0]'>
                                            <button type='submit'>Deslike</button>
                                        </form>
                                    </th>
                                    <th>
                                        <p>numero de likes: ".$row['total_likes']."</p>
                                        <hr>
                                        <p>numero de deslikes: ".$row['total_deslikes']."</p>
                                    </th>
                                </tr>";
                        }
                        echo "</table>";
                        echo "</center>";
                    }
                }
                catch (Exception $e){
                    echo $e;
                }
                finally{
                    $conexao->close();
                }
            ?>
        </div>
        <div>
            <a href="sair.php">sair</a>
        </div>
    </article>
</body>
</html>