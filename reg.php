<?php
include 'app/controllers/customers.php';
?>

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

    <?php include("app/include/header.php");?>

<div class="container reg_form">
    <form class="row reg_form justify-content-center" method="post" action="reg.php">
        <h2>Регистрация</h2>
        <div class="mb-3 col-12 col-md-4 error">
            <p><?=$status?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputLogin" class="form-label">Логин</label>
            <input name="login" type="login" value="<?=$login?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email" type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш email">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Придумайте пароль">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input name="password2" type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль">
        </div>
        <div class="w-100"></div>
        <div class="reg_aut mb-3 col-12 col-md-4">
            <button type="submit" class="btn btn-outline-secondary col-12" name="button-reg">Зарегистрироваться</button>
            <p>Уже есть аккаунт? <a href="auth.php">  Войдите</a></p>
        </div>
      </form>
</div>

<?php include("app/include/footer.php") ?>

</body>

</html>