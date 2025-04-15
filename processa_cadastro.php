<?php

require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');

if (empty($nome) || empty($email) || empty($senha)) {
    echo "Por favor, preencha todos os campos.";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "E-mail inválido.";
    exit();
}

$autenticador = new Autenticador();
$novoUsuario = new Usuario($nome, $email, $senha);

$usuarioExistente = $autenticador->login($email, $senha); 

if ($usuarioExistente) {
    echo "Este e-mail já está cadastrado.";
    exit();
}

$autenticador->registrar($novoUsuario);
echo "Cadastro realizado com sucesso! <a href='login.php'>Faça login</a>";

?>