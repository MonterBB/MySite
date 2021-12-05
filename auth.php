<?php include 'app/database/db.php'?>

<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/2d3b33005d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>LoogleShop</title>
    </head>
    <body>

    <!-- HEADER -->

    <?php include("app/include/header.php");?>

<div class="container reg_form">
    <form class="row reg_form justify-content-center" method="post" action="auth.php">
        <h2>Авторизация</h2>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Почта</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш email">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
        </div>
        <div class="w-100"></div>
        <div class="reg_aut mb-3 col-12 col-md-4">
            <button type="button" class="btn btn-outline-secondary col-12">Авторизоваться</button>
            <p>Хотите создать аккаунт? <a href="reg.php">Регистрация</a></p>
        </div>
      </form>
</div>

<?php include("app/include/footer.php") ?>

</body>

</html>