<?php 

    session_start();

    // var_dump($_GET);
    $url = $_GET['p'] ?? null;

    require "./banco.php";

    echo $url;
    
    require "./controller/LoginController.php";
    require "./controller/CadastroController.php";
    require "./controller/RecuperarSenhaController.php";
    require "./controller/LogoutController.php";
    require "./controller/AluguelController.php";
    require "./controller/ContatoController.php";
    require "./controller/VeiculoController.php";

    include "./view/componentes/header.php";

    if($url == 'fazer-login'){
        LoginController::fazerLogin();
    }
    else if($url == 'cadastrar'){
        CadastroController::fazerCadastro();
    }
    else if($url == 'recuperar-senha'){
        RecuperarSenhaController::recuperarSenha();
    }

    // DEIXEI COMENTANDO PARA SO MUDAR OS DADOS DEPOIS COM O QUE TEMOS

    // else if($url == 'dashboard'){
    //     LoginController::dashboard();
    // } 
    // else if($url == 'addTarefa'){
    //     LoginController::addTarefa();
    // }
    // else {
    //     LoginController::index();
    // }
    else if($url == 'logout'){
        LogoutController::logout();
    }
    else {
        echo "Página não encontrada";
    }

?>
