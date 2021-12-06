<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="index.php">LoogleShop</a> </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="index.php">Главная</a> </li>
                    <li><a href="#">Каталог</a> </li>
                    <li><a href="info.php">О нас</a> </li>
                    <li>
                        <?php if (isset($_SESSION['id_customer'])): ?>
                            <a href="auth.php"><i class="fa fa-user"></i><?php echo $_SESSION['login']; ?></a>
                        <ul class="pop-upUL">
                            <li class="pop-up"><a href="<?php echo "logout.php"; ?>">Выход</a></li>
                        </ul>
                        <?php else: ?>
                            <a href="auth.php"><i class="fa fa-user"></i>Кабинет</a>
                        <?php endif; ?>
                    </li>
                    <li><a href="cart.php">Корзина</a> </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
