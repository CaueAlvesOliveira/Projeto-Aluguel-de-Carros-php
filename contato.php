<?php
    $pageTitle = 'Contato';    
    include "componentes/head.php";

    $mensagem = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = trim($_POST["nome"]);
        $email = trim($_POST["email"]);
        $assunto = trim($_POST["assunto"]);
        $mensagemUsuario = trim($_POST["mensagem"]);

        // Validação simples
        if (empty($nome) || empty($email) || empty($assunto) || empty($mensagemUsuario)) {
            $mensagem = "Por favor, preencha todos os campos.";
        } else {
            // Configurações do email
            $destinatario = "destinatarioemail@gmail.com";

            // Conteúdo do email
            $conteudo = "
                Nome: $nome\n
                Email: $email\n
                Assunto: $assunto\n
                Mensagem: $mensagemUsuario
            ";

            // Cabeçalhos
            $headers = "From: $email\r\n";

            // Enviar email
            if (mail($destinatario, $assunto, $conteudo, $headers  )) {
                $mensagem = "Mensagem enviada com sucesso!";

                // Limpa os campos após o envio
                $nome = "";
                $email = "";
                $assunto = "";
                $mensagemUsuario = "";

            } else {
                $mensagem = "Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.";
            }
        }
    }
    
    include "componentes/header.php";
?>

