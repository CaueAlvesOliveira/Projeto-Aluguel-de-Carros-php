<?php

    class CsrfUtilitario {
        public static function gerarCsrf() {
            if (empty($_SESSION["csrfToken"])) {
                $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
            }
            return $_SESSION["csrfToken"];
        }

        public static function validarCsrf() {
            $token = $_POST["csrfToken"] ?? null;

            if(is_null($token) || empty($token) || !hash_equals($_SESSION["csrfToken"], $token)) {
                http_response_code(403);
                die('Requisição inválida: token CSRF ausente ou incorreto.');
            }

            $_SESSION["csrfToken"] = bin2hex(random_bytes(32));
        }
    }

?>