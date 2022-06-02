<?php
    require_once('Connection.php');
    
    function fnAddJogador($nome, $equipe, $idade) {
        $con = getConnection();
        $sql = "insert into jogador (nome, equipe, idade) values (:pNome, :pEquipe, :pIdade)";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pEquipe", $equipe);
        $stmt->bindParam(":pIdade", $idade);

        return $stmt->execute();
    }