<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/estilos/header.css">
    <link rel="stylesheet" href="view/estilos/contato.css">
    <title>AutomóvelJá | Contato</title>
</head>
<body>

<?php include_once __DIR__ . '/componentes/header.php'; ?>

<main class="contato-page">
    <section class="contato-card">
        <div class="contato-topo">
            <p class="contato-etiqueta">Fale Conosco</p>
            <h1>Contato</h1>
            <p class="contato-subtitulo">Envie-nos uma mensagem, responderemos o mais rápido possível.</p>
        </div>

        <?php if (!empty($mensagemErro)): ?>
            <div class="contato-alert contato-alert-erro"><?= htmlspecialchars($mensagemErro) ?></div>
        <?php endif; ?>

        <?php if (!empty($mensagemSucesso)): ?>
            <div class="contato-alert contato-alert-sucesso"><?= htmlspecialchars($mensagemSucesso) ?></div>
        <?php endif; ?>

        <form method="post" class="contato-form">
            <label class="contato-campo">
                <span>Nome</span>
                <input type="text" name="nome" placeholder="Seu nome completo" required value="<?= htmlspecialchars($nome ?? '') ?>">
            </label>

            <label class="contato-campo">
                <span>Email</span>
                <input type="email" name="email" placeholder="seu@email.com" required value="<?= htmlspecialchars($email ?? '') ?>">
            </label>

            <label class="contato-campo">
                <span>Assunto</span>
                <input type="text" name="assunto" placeholder="Assunto da mensagem" required value="<?= htmlspecialchars($assunto ?? '') ?>">
            </label>

            <label class="contato-campo">
                <span>Mensagem</span>
                <textarea name="mensagem" placeholder="Escreva sua mensagem aqui..." required><?= htmlspecialchars($mensagemUsuario ?? '') ?></textarea>
            </label>

            <button type="submit" class="contato-botao">Enviar Mensagem</button>
        </form>

    </section>
</main>

</body>
</html>
