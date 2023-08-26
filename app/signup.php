<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="static/css/base.css">
    <link rel="stylesheet" type="text/css" href="static/css/form-styles.css">
    <title>Crie sua conta</title>
</head>
<body>
    <div class="container"> 
        <form class="form">
            <h2 class="form-title">Crie sua conta</h2>
            <div class="input-container">
                <label for="username">Nome de Usuário:</label>
                <input type="text" name="username">
            </div>
            <div class="input-container">
                <label for="password">Senha:</label>
                <input type="password" name="password">
            </div>
            <div class="input-container">
                <label for="confirm-password">Confirmar senha:</label>
                <input type="password" name="confirm-password">
            </div>
            <button class="button">Criar Conta</button>
            <a href="login.php" class="form-link">Já tem uma conta? Faça login!</a>
        </form>
    </div>
</body>
</html>