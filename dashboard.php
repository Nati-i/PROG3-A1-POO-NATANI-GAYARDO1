<?php

require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php';

Sessao::iniciar();

if (!Sessao::get('usuario')) {
    header('Location: login.php');
    exit();
}

$usuario = Sessao::get('usuario');

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo(a), <?php echo htmlspecialchars($usuario->getNome()); ?>!</h1>
    <p>Esta é a área restrita.</p>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>