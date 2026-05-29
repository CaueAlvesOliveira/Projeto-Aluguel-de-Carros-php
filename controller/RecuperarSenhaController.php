<?php 

    class RecuperarSenhaController {

        public static function recuperarSenha() {
            include __DIR__ . '/../model/UsuarioModel.php';
            include __DIR__ . '/../funcoes.php';
        
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
                $cpf = $_POST['cpf'] ?? null;
                $dataNascimento = $_POST['dataNascimento'] ?? null;
                $novaSenha = $_POST['novaSenha'] ?? null;
                
                if(validaCamposRecuperarSenha($cpf, $dataNascimento, $novaSenha)){
                    echo "Preencha todos os campos";
                    } else {
                        if(recuperarSenha($cpf, $dataNascimento, $novaSenha)){
                           echo "Nova senha cadastrada";
                        } else {
                            echo "CPF ou data de nascimento incorretos.";
                        } 
                    }
                }
            include __DIR__ . '/../view/componentes/recuperarSenha.php';
        }
    }
?>