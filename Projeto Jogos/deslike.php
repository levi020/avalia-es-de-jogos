<?php
session_start();
include("conexao.php");
try{
    if($conexao->connect_error){
        echo "server morreu" .$conexao->connect_errno;
    }else{
        $idJogo = $_POST["deslike"];
        $sql = "SELECT `id` FROM `clientes` WHERE `nomeCliente`='".$_SESSION["nomeCliente"]."';";
        $result = $conexao->query($sql);
        $string = mysqli_fetch_array($result);
        $sqlAnalisa = "SELECT `likeOrDeslike` FROM `like_deslike` WHERE `id_user`='".$string[0]."' AND `id_jogo`='".$idJogo."';";
        $verif = $conexao->query($sqlAnalisa);
        if ($verif->num_rows == 1) {
            $sql0 = "UPDATE `like_deslike` SET `likeOrDeslike`=-1 WHERE `id_user`='".$string[0]."' AND `id_jogo`='".$idJogo."';";
            $result0 = $conexao->query($sql0);
        }
        else{
            $sql1 = "INSERT INTO `like_deslike`(`id_user`, `id_jogo`, `likeOrDeslike`) VALUES ('".$string[0]."', '".$idJogo."', -1);";
            $result1 = $conexao->query($sql1);
        }  
    }
}
catch (Exception $e){
    echo $e;
}
finally{
    $conexao->close();
    header("location: pagUser.php", true,301);
}