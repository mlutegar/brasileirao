<?php
    require_once('repository/JogadorRepository.php');
    session_start();
    
    $id = filter_input(INPUT_POST, 'idJogador', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $equipe = filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_SPECIAL_CHARS);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

    if(fnUpdateJogador($id, $nome, $equipe, $idade)) {
        $msg = "Sucesso ao gravar";
    } else{
        $msg = "Falha na gravação";
    }

    $_SESSION['id'] = $id;
    $page = "formulario-edita-jogador.php";
    setcookie('notify', $msg, time() + 10, "brasileirao/{$page}", 'localhost');
    header("location: {$page}"); 
    exit;