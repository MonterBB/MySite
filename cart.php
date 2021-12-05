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

<?php include("app/include/header.php");?>

<div class="container cart_form">
    <div class="row justify-content-center">
        <div class="cart col-8 col align-self-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><strong>Название товара</strong></th>
                    <th scope="col"><strong>Количество</strong></th>
                    <th scope="col"><strong>Цена</strong></th>
                    <th scope="col"><strong>Итого</strong></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Какой-то компьютер</th>
                    <td><input type="number" min="0" max="99" size="55" value="1" class="amount"/> шт.</td>
                    <td>133337₽</td>
                    <td>133337₽</td>
                </tr>
                <tr>
                    <th scope="row">Телефон</th>
                    <td><input type="number" min="0" max="99" size="55" value="1" class="amount"/> шт.</td>
                    <td>25000₽</td>
                    <td>25000₽</td>
                </tr>
                <tr>
                    <th scope="row">Наушники</th>
                    <td><input type="number" min="0" max="99" size="55" value="1" class="amount"/> шт.</td>
                    <td>9000₽</td>
                    <td>9000₽</td>
                </tr>
                <tr>
                    <th scope="row">Наушники</th>
                    <td><input type="number" min="0" max="99" size="55" value="1" class="amount"/> шт.</td>
                    <td>9000₽</td>
                    <td>9000₽</td>
                </tr>
                <tr>
                    <th scope="row">Наушники</th>
                    <td><input type="number" min="0" max="99" size="55" value="1" class="amount"/> шт.</td>
                    <td>9000₽</td>
                    <td>9000₽</td>
                </tr>
                <tr>
                    <th scope="row">Наушники</th>
                    <td><input type="number" min="0" max="99" size="55" value="1" class="amount"/> шт.</td>
                    <td>9000₽</td>
                    <td>9000₽</td>
                </tr>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-9 col align-self-end">
                    <button type="button" class="btn btn-secondary btn_offer">Оформить заказ</button>
                </div>
                <div class="col align-self-end final_price"><strong>Итого: 167337₽</strong></div>
            </div>

        </div>
    </div>
</div>

<?php include("app/include/footer.php") ?>

</body>

</html>