<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($name && $email && $password) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['register_message'] = 'E-mail já cadastrado.';
            $_SESSION['register_success'] = false;
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $hash])) {
                $_SESSION['register_message'] = 'Registro feito com sucesso! Agora faça login.';
                $_SESSION['register_success'] = true;
            } else {
                $_SESSION['register_message'] = 'Erro ao registrar usuário.';
                $_SESSION['register_success'] = false;
            }
        }
    } else {
        $_SESSION['register_message'] = 'Preencha todos os campos.';
        $_SESSION['register_success'] = false;
    }

    header("Location: index.php#register"); // reload sem mudar de tela
    exit;
}
