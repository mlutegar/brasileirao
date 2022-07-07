<?php
    require_once('repository/JogadorRepository.php');
    require_once('util/base64.php');

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $equipe = filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_SPECIAL_CHARS);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

    $foto = converterBase64($_FILES['foto']);

    if(empty($nome) || empty($equipe) || empty($idade) || empty($foto)) {
        $msg = "Preencher todos os campos primeiro";
    } else {
        if(fnAddJogador($nome, $foto, $equipe, $idade)) {
            $msg = "Sucesso ao adicionar o jogador do " . $equipe;
        } else {
            $msg = "Falha ao adicionar o jogador";
        }
    }

    $page = "formulario-cadastro-jogador.php";
    setcookie('notify', $msg, time() + 10, "brasileirao/{$page}", 'localhost');
    header("location: {$page}");
    exit;