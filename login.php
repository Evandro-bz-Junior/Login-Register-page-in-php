<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($name && $password) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->execute([$name]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name']; // Salva o nome do usuário
            header("Location: dashboard.php"); // Redireciona após login
            exit;
        } else {
            // Volta para o index com erro
            header("Location: index.php?login=error");
            exit;
        }
    } else {
        header("Location: index.php?login=error");
        exit;
    }
}
