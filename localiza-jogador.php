<?php
    require_once('repository/JogadorRepository.php');
    $nome = filter_input(INPUT_POST, 'nomeJogador', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: listagem-de-jogadores.php?nome={$nome}");
    exit;