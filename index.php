<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Página Login e Registro</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <section class="form-section">
        <div class="container">
            <!-- FORMULÁRIO DE LOGIN -->
            <div class="user singIn">
                <div class="imgBx">
                    <img src="./assets/images/forest.png" alt="login-image">
                </div>
                <div class="formBX">
                    <form action="login.php" method="POST">
                        <h2>Login</h2>
                        <?php if (isset($_GET['login']) && $_GET['login'] == 'error'): ?>
                            <p style="color:red;">Usuário ou senha incorretos.</p>
                        <?php endif; ?>
                        <input type="text" name="name" placeholder="Nome" required>
                        <input type="password" name="password" placeholder="Senha" required>
                        <button type="submit" class="btnLogin">Login</button>
                        <p class="signup">Não possui conta? <a href="#" onclick="toggleForm()">Registre-se</a></p>
                    </form>
                </div>
            </div>

            <!-- FORMULÁRIO DE REGISTRO -->
            <div class="user singUpBX">
                <div class="formBX">
                    <form action="register.php" method="POST">
                        <h2>Crie sua conta</h2>

                        <input type="text" name="name" placeholder="Nome" required>
                        <input type="email" name="email" placeholder="E-mail" required>
                        <input type="password" name="password" placeholder="Senha" required>
                        <?php if (isset($_SESSION['register_message'])): ?>
                            <p style="color: <?= $_SESSION['register_success'] ? 'green' : 'red' ?>;">
                                <?= $_SESSION['register_message']; ?>
                            </p>
                            <?php unset($_SESSION['register_message'], $_SESSION['register_success']); ?>
                        <?php endif; ?>
                        <button type="submit" class="btnLogin">Registre-se</button>
                        <p class="signup">Já possui conta? <a href="#" onclick="toggleForm()">Login</a></p>
                    </form>
                </div>
                <div class="imgBx">
                    <img src="./assets/images/winter.png" alt="register-image">
                </div>
            </div>
        </div>
    </section>
    <script src="./assets/scripts/script.js"></script>
</body>

</html>