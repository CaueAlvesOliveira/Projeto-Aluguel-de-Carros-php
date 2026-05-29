<?php 

    function addUsuario($usuario, $cpf, $dataNascimento, $email, $telefone, $senha){
        global $pdo;
        $pdo->query("INSERT INTO usuarios (id, nome, cpf, data_nascimento, email, telefone, senha) VALUES (null, '$usuario', '$cpf', '$dataNascimento', '$email', '$telefone', '$senha');");
    }

    function recuperarSenha($cpf, $dataNascimento, $novaSenha){
        global $pdo;
        $resp = $pdo->query("SELECT * FROM usuarios WHERE cpf='$cpf' AND data_nascimento='$dataNascimento';");

        if($resp->rowCount() > 0){
            $hash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $pdo->query("UPDATE usuarios SET senha='$hash' WHERE cpf='$cpf';");
            return true;
        } else {
            echo "Usuário não encontrado";
        return false;
    }
    }

    function fazerLogin($usuario, $senha){

        global $pdo;
        $resp = $pdo->query("SELECT * FROM usuarios WHERE nome='$usuario';");

        if($resp->rowCount() > 0){
            $usu = $resp->fetch();
            if(password_verify($senha, $usu->senha)){
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['id'] = $usu->id;
                    return true;
                } else {
                    echo "ERRO - SENHA";
                    return false;
            }
        } else {
              echo "ERRO - USUÁRIO";
              return false;
        }
    }

?>