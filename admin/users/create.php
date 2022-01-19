<?php session_start(); 
include "../../app/controllers/createUser.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/2d3b33005d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../../css/admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>LoogleShop</title>
  </head>
  <body>

  <?php include("../../app/include/header-admin.php");?>

  <div class="container">
  <div class="row">
    <?php include("../../app/include/sidebar-admin.php");?>
      <div class="products col-10">
        <div class="button row">
          <a href="<?php echo "../../admin/users/create.php";?>" class="col-3 btn btn-success">Создать</a>
          <span class="col-1"></span>
          <a href="<?php echo "../../admin/users/index.php";?>" class="col-3 btn btn-warning">Редактировать</a>
        </div>
        <div class="row title-table">
          <h2>Создание пользователя</h2>
        </div>
        <div class="row add-product">
          <form action="create.php" method="post">
          <div class="col">
            <label for="exampleInputLogin" class="form-label">Логин</label>
            <input name="login" type="login" value="<?=$login?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш логин">
        </div>
        <div class="col">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email" type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш email">
        </div>
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Придумайте пароль">
        </div>
        <select name="admin" class="form-select" aria-label="Категории">
                  <option value="0">Пользователь</option>
                  <option value="1">Админ</option>
              </select>
              <div class="col">
                  <button name="user-create" class="btn btn-primary" type="submit">Создать</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include("../../app/include/footer.php") ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  </body>
</html>