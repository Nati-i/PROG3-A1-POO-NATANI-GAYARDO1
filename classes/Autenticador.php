<?php

class Autenticador {
    private array $usuarios = [];

    public function __construct() {
        $this->registrar(new Usuario("Natani Gayardo", "natiigabriella@email.com", "azul"));
        $this->registrar(new Usuario("Dorival Junior", "dorijunior@email.com", "tecnico"));
    }

    public function registrar(Usuario $usuario): void {
        $this->usuarios[$usuario->getEmail()] = $usuario;
    }

    public function login(string $email, string $senha): ?Usuario {
        if (isset($this->usuarios[$email]) && $this->usuarios[$email]->verificarSenha($senha)) {
            return $this->usuarios[$email];
        }
        return null;
    }
}
