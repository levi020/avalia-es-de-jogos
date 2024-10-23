<?php
include("conexao.php");
session_start();
try{
    if($conexao->connect_error){
        echo "server morreu". $conexao->connect_errno;
    }else{
        $nome = $conexao->real_escape_string($_POST["cliente"]);
        $email = $conexao->real_escape_string($_POST["emailCliente"]);
        $emailCripto = hash("sha256",$email);
        $senha = $conexao->real_escape_string($_POST["senha"]);
        $senhaCripto = hash("sha256",$senha);
        $sqlAnalise = "SELECT `email`, `senha`, `nomeCliente` FROM `clientes` WHERE `email`='".$emailCripto."' AND `senha`='".$senhaCripto."' AND `nomeCliente`='".$nome."';";
        $result = $conexao->query($sqlAnalise);
        if($result->num_rows == 0){
            $sql = "INSERT INTO `clientes`(`email`, `senha`, `nomeCliente`) VALUES ('".$emailCripto."', '".$senhaCripto."','".$nome."')";
            $query = $conexao->query($sql);
            header("location: pagAdmin.php", true, 301);
        }else{
            echo "<script>alert('usuario já cadastrado')</script>";
            echo "<a href=pagAdmim.php>voltar</a>";
        }
    }
}
catch (Exception $e){
    echo $e;
}
finally{
    $conexao->close();
}