<?php
include("conexao.php");
session_start();
try{
    if ($conexao->connect_error) {
        echo "server morreu". $conexao->connect_errno;
    }else{
        $email = $conexao->real_escape_string($_POST['cliente']);
        $senha = $conexao->real_escape_string($_POST['senha']);
        $emailCripto = hash("sha256",$email);
        $senhaCripto = hash("sha256", $senha);

        $sql = "SELECT `email`, `senha`, `nomeCliente` FROM `clientes` WHERE `senha`= '".$senhaCripto."' AND `email`='".$emailCripto."';";
        $query = $conexao->query($sql);
        if ($query->num_rows == 1){
            $row = mysqli_fetch_array($query);
            $_SESSION["nomeCliente"] = $row[2];
            header("location: pagUser.php", true,301);
        }else{
            header("location: loginUser.php", true,301);
        }
    }
}
catch (Exception $e){
    echo $e;
}
finally{
    $conexao->close();
}