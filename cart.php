<?php include 'app/controllers/cart.php';
$productsInCart = selectAll('product_order', ['id_customer'=>$_SESSION['id_customer']]);
foreach ($productsInCart as $key => $productInCart):
    $id = $productInCart['id_product'];
    $products = selectAll('product', ['id_product' => $id]);
endforeach;

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_order'])){
    $productOrder = selectAll('product_order', ['id_order'=>$_GET['id_order']]);

    $products_in_order = array();
    foreach ($productOrder as $key => $productsOrder):
        $products_in_order[] = $productsOrder['id_product'];
    endforeach;
    
    for ($i=0; $i < count($products_in_order); $i++){
        $productInOrder = selectAll('product_in_order', ['id_order'=>$_GET['id_order']]);
        if(empty($productInOrder)){
            addToProductInOrderFirst($products_in_order[$i], $_GET['id_order']);
            $id_product_in_order = selectOne('product_in_order', ['id_order'=>$_GET['id_order']]);
        }else{
            addToProductInOrder($products_in_order[$i], $id_product_in_order['id_product_in_order'], $_GET['id_order']);
        }
    }

    addOrder($_GET['id_order'],$_SESSION['id_customer'], $id_product_in_order['id_product_in_order']);

    deleteFromCart('product_order', $_SESSION['id_customer']);

    header('location: ' . 'profile.php?id_order='. $_GET['id_order']);
  }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome css/style.css -->
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
                    <th scope="col"><strong>???????????????? ????????????</strong></th>
                    <th scope="col"><strong>????????????????????</strong></th>
                    <th scope="col"><strong>????????</strong></th>
                    <th scope="col"><strong>??????????</strong></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($productsInCart as $key => $productInCart): 
                    $id = $productInCart['id_product'];
                    $products = selectAll('product', ['id_product' => $id]);
                    foreach ($products as $keys => $product):
                    ?>
                    <tr>
                        <th scope="row"><?=$product['name_product'];?></th>
                        <td><?=$productInCart['amount'];?> ????.</td>
                        <td><?=$product['price'];?>???</td>
                        <td><?=$LocalFinalPrice = $product['price']*$productInCart['amount'];?>???</td>
                    </tr>
                    <?php 
                    $finalProductPrice += $LocalFinalPrice;
                    endforeach; 
                endforeach;
            ?>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-9 col align-self-end order_button">
                <a class="order_button" href="cart.php?id_order=<?=$productInCart['id_order']?>"><i class="fas fa-shopping-cart"></i>  ???????????????? ??????????</a>
                </div>
                <div class="col align-self-end final_price"><strong>??????????: <?=$finalProductPrice?>???</strong></div>
            </div>
        </div>
    </div>
</div>

<?php include("app/include/footer.php") ?>

</body>

</html>