<?php

function mostra_data($data) {
    if (!$data) return '';

    $d = explode('-', $data);
    return $d[2] . '/' . $d[1] . '/' . $d[0];
}

function mensagem($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>
            $texto
          </div>";
}
