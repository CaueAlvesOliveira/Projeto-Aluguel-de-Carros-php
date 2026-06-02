<?php 

    function validaCamposLogin($usuario, $senha){
           return empty(trim((string) $usuario)) || empty(trim((string) $senha));
    }

    function validaCamposCadastro($usuario, $cpf, $dataNascimento, $email, $telefone, $senha){
            return empty(trim((string) $usuario))
                || empty(trim((string) $senha))
                || empty(trim((string) $cpf))
                || empty(trim((string) $dataNascimento))
                || empty(trim((string) $email))
                || empty(trim((string) $telefone));
    }

    function validaCamposRecuperarSenha($cpf, $dataNascimento, $novaSenha){
            return empty(trim((string) $cpf))
                || empty(trim((string) $dataNascimento))
                || empty(trim((string) $novaSenha));
    }

?>