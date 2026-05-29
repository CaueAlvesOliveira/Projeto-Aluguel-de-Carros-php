<?php 

    function validaCamposLogin($usuario, $senha){
        if(is_null($usuario) || is_null($senha)) return true;
        else return false;
    }

    function validaCamposCadastro($usuario, $cpf, $dataNascimento, $email, $telefone, $senha){
        if(is_null($usuario) || is_null($senha) || is_null($cpf) || is_null($dataNascimento) || is_null($email) || is_null($telefone)) return false;
        else return true;
    }

    function validaCamposRecuperarSenha($cpf, $dataNascimento, $novaSenha){
        if(is_null($cpf) || is_null($dataNascimento) || is_null($novaSenha)) return true;
        else return false;
    }

?>