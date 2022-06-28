<?php
    require_once('repository/JogadorRepository.php');
    session_start();

    if(fnDeleteJogador($_SESSION['id'])){
        $msg = "Sucesso ao deletar";
    } else{
        $msg = "Falha ao deletar";
    }

    unset($_SESSION['id']);

    $page = "listagem-de-jogadores.php";
    setcookie('notify', $msg, time() + 10, "/brasileirao/{$page}", 'localhost');
    header("location: {$page}");
    exit;