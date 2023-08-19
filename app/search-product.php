<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="./static/css/base.css">
    <link rel="stylesheet" type="text/css" href="/static/css/form-styles.css">
    <link rel="stylesheet" type="text/css" href="/static/css/search-product.css">
    <title>PHP Website</title>
</head>
<body>
    
    <?php include "../partials/navbar.php" ?> 
    <div class="container">
        <form class="form">
            <h2>Busque pelos produtos</h2>
            <div class="input-container">
                <label for="name">Informe o id do produto:</label>
                <input type="text" name="id" required>
            </div>
            <button type="submit" class="button" >Buscar</button>
        </form>
    </div>
    <script src="/static/js/search_products.js"></script>
</body>
</html>