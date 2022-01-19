<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="../../index.php">LoogleShop</a> </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li>
                            <a href="../../profile.php"><i class="fa fa-user"></i><?php echo $_SESSION['login']; ?></a>
                    </li>
                    <li class="pop-up">
                        <a href="<?php echo "../../logout.php"; ?>">Выход</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
