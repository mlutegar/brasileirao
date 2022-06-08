<?php
    require_once('repository/JogadorRepository.php');
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";
    if(fnDeleteJogador($id)) {
        $msg = "Sucesso ao deletar";
    } else {
        $msg = "Falha ao deletar";
    }

    #
    header("location: listagem-de-jogadores.php?notify={$msg}");
    exit;