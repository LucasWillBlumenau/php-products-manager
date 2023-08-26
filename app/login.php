<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="static/css/base.css">
    <link rel="stylesheet" type="text/css" href="static/css/form-styles.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form class="form">
            <h2 class="form-title">Faça Login</h2>
            <div class="input-container">
                <label for="username">Nome de Usuário:</label>
                <input type="text" name="username" required> 
            </div>
            <div class="input-container">
                <label for="password">Senha:</label>
                <input type="password" name="password" required>
            </div>
            <button class="button">Entrar</button>
            <a href="signup.php" class="form-link">Não tem uma conta? Crie uma!</a>
        </form>
    </div>
    <script src="static/js/handle_login.js"></script>
</body>
</html>