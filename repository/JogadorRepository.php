<?php
    require_once('Connection.php');
    
    function fnAddJogador($nome, $foto, $equipe, $idade) {
        $con = getConnection();
        $sql = "insert into jogador (nome, foto, equipe, idade) values (:pNome, :pFoto, :pEquipe, :pIdade)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pFoto", $foto);
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

    function fnLocalizaJogadorPorNome($nome) {
        $con = getConnection();
        $sql = "select * from jogador where nome like :pNome limit 20";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pNome", "%{$nome}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
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

    function fnUpdateJogador($id, $nome, $foto, $equipe, $idade) {
        $con = getConnection();
        $sql = "update jogador set nome= :pNome, foto = :pFoto, equipe = :pEquipe, idade = :pIdade where id = :pID";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pFoto", $foto); 
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