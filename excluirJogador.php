<?php
    require_once('repository/JogadorRepository.php');
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(fnDeleteJogador($id)){
        $msg = "Sucesso ao deletar";
    } else{
        $msg = "Falha ao deletar";
    }

    $page = "listagem-de-jogadores.php";
    setcookie('notify', $msg, time() + 10, "/brasileirao/{$page}", 'localhost');
    header("location: {$page}");
    exit;