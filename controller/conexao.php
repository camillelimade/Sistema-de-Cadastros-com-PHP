<?php
    $server = " 127.0.0.1:3307";
    // localhost
    // 127.0.0.1:3307
    $user = "root";
    $pass = "";
    $bd = "empresa";

    $conn = mysqli_connect($server, $user, $pass, $bd);
    if($conn->connect_error){
        die("Deu ruim ". $conn->connect_error);
    }
    function mensagem($texto ,$tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
                $texto 
            </div>";
    }
    function mostra_data($data){
        $d = explode("-", $data);
        $escreve = $d[2] . "/" .$d[1] ."/" .$d[0];
        return $escreve;
    }
    function mover_foto($vetor_foto){
        if((!$vetor_foto['error']) and ($vetor_foto['size'] <= 500000)){
            $nome_arquivo = date('Ymdhms'). ".jpg";
            move_uploaded_file($vetor_foto['tmp_name'], "../img/". $nome_arquivo);
            return $nome_arquivo;
        }else {
           return 0;
        }

    }
?>