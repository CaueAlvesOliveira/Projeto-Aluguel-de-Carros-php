<?php
    $pageTitle = 'Contato';    
    $mensagem = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = trim($_POST["nome"]);
        $email = trim($_POST["email"]);
        $assunto = trim($_POST["assunto"]);
        $mensagemUsuario = trim($_POST["mensagem"]);

        // Validação simples
        if (empty($nome) || empty($email) || empty($assunto) || empty($mensagemUsuario)) {
            $mensagem = "Por favor, preencha todos os campos.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mensagem = "Por favor, insira um email válido.";
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
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("componentes/head.php"); ?>
    <title>Contato</title>
</head>

<body>
    <?php include ("componentes/header.php"); ?>
    <div class="Container">
        <h1>Contato</h1>

        <?php if (!empty($mensagem)) : ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($mensagem); ?></div>
        <?php endif; ?>

        <form method="POST">

        <label>Nome</label>
        <input type="text" name="nome" required value="<?= htmlspecialchars($nome ?? '') ?>">

        <label>Email</label>
        <input type="email" name="email" required value="<?= htmlspecialchars($email ?? '') ?>">

        <label>Assunto</label>
        <input type="text" name="assunto" required value="<?= htmlspecialchars($assunto ?? '') ?>">

        <label>Mensagem</label>
        <textarea name="mensagem" required><?= htmlspecialchars($mensagemUsuario ?? '') ?></textarea>

        <button type="submit">Enviar</button>

        </form>
    </div>

</body>

</html>

