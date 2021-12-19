<?php include 'app/controllers/category.php';
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_product']) && isset($_SESSION['id_customer'])){
    $id_item = $_GET['id_product'];
    $id_order = $_SESSION['id_customer'];
    addToCart($id_item, $id_order);
}
$products = selectAll('product');
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
    <link rel="stylesheet" href="css/product.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>LoogleShop</title>
  </head>
  <body>

  <?php include("app/include/header.php");?>

    <!-- Блок MAIN -->

    <div class="container">

      <div class="section_search">
        <h3>Поиск по сайту</h3>
        <form action="search.php" method="post">
          <input type="text" name="search-term" class="text-input" placeholder="Найти товары...">
        </form>
      </div>

      <div class="content row">

        <div class="sidebar col-md-3 col-12">
          
          <div class="section_category">
            <h3>Категории</h3>
            <ul>
                <?php foreach ($category as $key => $topic):?>
              <li><a href="<?="catalog.php?id_category=" . $topic['id_category'];?>"><?=$topic['name_category'];?></a></li>
                <?php endforeach;?>
            </ul>
          </div>

        </div>
        <div class="main-content col-md-9 col-12">
          <h3>Актуальные товары</h3>
            <?php foreach ($products as $key => $product):?>
          <div class="product row">
            
            <div class="img col-12 col-md-4">
              <img src="images/<?=$product['image'];?>" alt="" class="img-thumbnail">
            </div>
            <div class="post-text col-12 col-md-8">
            <form method="post">
              <h3>
                <a href="#"><?=$product['name_product'];?></a>
              </h3>
              <p class="preview-text">
                Технические характеристики: 
                Процессор: i3-9100; 
                Видеокарта: rx 570 4GB;
                Оперативная память 8GB; 
                Накопитель: ssd 512GB, hdd 1TB
              </p>
                <div class="row align-items-end info_product" >
                    <div class="col col-8">
                        <strong><?=$product['price']?> ₽</strong>
                    </div>
                    <div class="col">
                        <a href="index.php?id_product=<?=$product['id_product']?>"><i class="far fa-plus-square"></i>  Купить</a>
                    </div>
                </div> 
                </form>
            </div>
          </div>
            <?php endforeach;?>
        </div>
      </div>
    </div>
    
    <!-- Блок MAIN -->

    <?php include("app/include/footer.php") ?>
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