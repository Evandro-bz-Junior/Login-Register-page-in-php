<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <section>
        <div class="login-container">
            <h1>Bem vindo, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>

            <a href="logout.php">Sair</a>
        </div>
    </section>
</body>

</html>