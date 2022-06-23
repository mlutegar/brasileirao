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

    function fnListJogadores() {
        $con = getConnection();
        $sql = "select * from jogador";
        $result = $con->query($sql);
        $lstJogadores = array();
        
        while($jogador = $result->fetch(PDO::FETCH_OBJ)){
            array_push($lstJogadores, $jogador);
        }
        return $lstJogadores;
    }

    function fnLocalizaJogadorPorId($id) {
        $con = getConnection();
        $sql = "select * from jogador where id = :pID";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnUpdateJogador($id, $nome, $equipe, $idade) {
        $con = getConnection();
        $sql = "update jogador set nome= :pNome, equipe = :pEquipe, idade = :pIdade where id = :pID";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pEquipe", $equipe);
        $stmt->bindParam(":pIdade", $idade);

        return $stmt->execute();
    }

    function fnDeleteJogador($id) {
        $con = getConnection();
        $sql = "delete from jogador where id = :pID";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        return $stmt->execute();
    }

    function fnLogin($email, $senha) {
        $con = getConnection();
        $sql = "select id, email, created_at as createdAt from login where email = :pEmail and senha = :pSenha";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindValue(":pSenha", md5($senha));

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }