<?php
    session_start();
    include("conexao.php");
    $nomeAdmin = $_SESSION["name"];
    try{
        if ($conexao->connect_error) {
            echo "server morreu". $conexao->connect_errno;
        }else{
            function gerarNomeImagem($nomeJogo, $extensao) {
                // Obter data atual no formato Y-m-d (ano-mês-dia)
                $dataAtual = date("Y-m-d");
                // Gerar um número aleatório de 4 dígitos
                $numeroAleatorio = rand(1000, 9999);
                // Montar o nome do arquivo
                $nomeArquivo = $nomeJogo . "-" . $dataAtual . "-" . $numeroAleatorio . "." . $extensao;
                return $nomeArquivo;
            }
            $nomeJogo = $conexao->real_escape_string($_POST["nomeJogo"]);
            $desc = $conexao->real_escape_string($_POST["desc"]);
            $destino = "uploads/";
            if (!is_dir($destino)) {
                mkdir($destino, 0777, true);
                echo "erro";
            }
            //imagem 1
            if (isset($_FILES['filePicture'])) {
                $extensao1 = pathinfo($_FILES["filePicture"]['name'], PATHINFO_EXTENSION);
                $nomeImagem1 = gerarNomeImagem($nomeJogo, $extensao1);
                $caminhoImagem1 = $destino . $nomeImagem1;
                if (move_uploaded_file($_FILES['filePicture']['tmp_name'], $caminhoImagem1)) {
                    echo "Imagem 1 enviada com sucesso!<br>";
                }
            }else{
                echo "erro ao enviar imagem";
            }
            //imagem 2
            if (isset($_FILES['filePicture1'])) {
                $extensao2 = pathinfo($_FILES["filePicture1"]['name'], PATHINFO_EXTENSION);
                $nomeImagem2 = gerarNomeImagem($nomeJogo, $extensao2);
                $caminhoImagem2 = $destino . $nomeImagem2;
                if (move_uploaded_file($_FILES['filePicture1']['tmp_name'], $caminhoImagem2)) {
                    echo "Imagem 2 enviada com sucesso!<br>";
                }
            }else{
                echo "erro ao enviar imagem";
            }
            $sql = "INSERT INTO `jogosCadastrados`(`nomeDoJogo`, `admin`, `descricao`, `image1`, `image2`) VALUES ('".$nomeJogo."', '".$nomeAdmin."', '".$desc."', '".$caminhoImagem1."','".$caminhoImagem2."')";
            $result = $conexao->query($sql);
            $conexao->close();

        }  
    }
    catch (Exception $ex){
        header("location: pagAdmin.php", true, 301);
    }
    finally{
        header("location: pagAdmin.php", true, 301);
    }
?> 