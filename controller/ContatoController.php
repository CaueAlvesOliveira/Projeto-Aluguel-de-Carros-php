<?php

class ContatoController {

    public static function exibir($pdo) {
        $mensagemErro = "";
        $mensagemSucesso = "";

        $nome = "";
        $email = "";
        $assunto = "";
        $mensagemUsuario = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nome = trim($_POST["nome"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $assunto = trim($_POST["assunto"] ?? "");
            $mensagemUsuario = trim($_POST["mensagem"] ?? "");

            // Validação simples
            if (empty($nome) || empty($email) || empty($assunto) || empty($mensagemUsuario)) {
                $mensagemErro = "Por favor, preencha todos os campos.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mensagemErro = "Por favor, insira um email válido.";
            } else {
                // Configurações do email
                $destinatario = "destinatarioemail@gmail.com";

                // Conteúdo do email
                $conteudo = "Nome: $nome\n";
                $conteudo .= "Email: $email\n";
                $conteudo .= "Assunto: $assunto\n";
                $conteudo .= "Mensagem: $mensagemUsuario\n";

                // Cabeçalhos
                $headers = "From: $email\r\n";
                $headers .= "Reply-To: $email\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                // Enviar email
                $stmt = $pdo->prepare("INSERT INTO mensagens_contato (nome, email, assunto, mensagem) VALUES (?, ?, ?, ?)");
                if ($stmt->execute([$nome, $email, $assunto, $mensagemUsuario])) {
                    $mensagemSucesso = "Mensagem recebida! Nossa equipe entrará em contato em breve.";
                    
                    // Limpa os campos após o envio
                    $nome = "";
                    $email = "";
                    $assunto = "";
                    $mensagemUsuario = "";
                }
                else {
                    $mensagemErro = "Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.";
                }

            }
        }

        require_once "./view/contato.php";
    }

}
