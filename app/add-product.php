<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./static/css/base.css">
    <link rel="stylesheet" type="text/css" href="./static/css/form-styles.css">
    <title>Adicione Um Novo Produto</title>
</head>
<body>

    
    <?php include "../partials/navbar.php" ?> 
    <div class="container">
        <form class="form">
            <h2>Adicione seus produtos</h2>
            <div class="input-container">
                <label for="name">Nome:</label>
                <input type="text" name="name" required>
            </div>
            <div class="input-container">
                <label for="price">Preço:</label>
                <input type="text" name="price" required>
            </div>
            <button type="submit" class="button" >Inserir Produto</button>
        </form>
    </div>
    <script src="./static/js/insert_data.js"></script>
</body>
</html>