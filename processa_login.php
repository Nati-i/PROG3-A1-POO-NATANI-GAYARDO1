<?php

require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');

if (empty($email) || empty($senha)) {
    echo "Por favor, preencha tudo.";
    exit();
}

$autenticador = new Autenticador();
$usuario = $autenticador->login($email, $senha);

if ($usuario) {
    Sessao::iniciar();
    Sessao::set('usuario', $usuario);
    header('Location: dashboard.php');
    exit();
} else {
    echo "informações inválidas.";
}

?>