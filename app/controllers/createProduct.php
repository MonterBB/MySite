<?php
include "../../app/database/db.php";

$status = '';
$id_product='';
$name='';
$description='';
$price='';
$image='';
$id_category='';

$products = selectAll('product');
$topics = selectAll('category');

//Создание записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product-create'])){

$name_product = trim($_POST['name_product']);
$description = trim($_POST['description']);
$price = trim($_POST['price']);
$image = trim($_POST['image']);
$id_category = trim($_POST['id_category']);


if($name_product === '' || $description === '' || $id_category === ''){
    $status = "Не все поля заполнены!";
}elseif (mb_strlen($name_product,'UTF8')<2){
    $status = "Название должно быть более 2ух символов!";
}else{
    $existence = selectOne('category',['name_category'=>$name]);
    if($existence['name_category']===$name){
        $status="Такая категория уже есть!";
    }else{
        $product = [
            'name_product'=>$name_product,
            'description'=>$description,
            'price'=>$price,
            'image'=>$image,
            'id_category'=>$id_category
        ];

        $id = insert('product',$product);

        $prod = selectOne('product', ['id_product'=>$id]);

        header('location: ' . 'index.php' );
    }
}
}else{
$name_product = '';
$description = '';
$price='';
$image='';
$id_category='';
}

//Редактирование
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_product'])){
    
    $id_product = $_GET['id_product'];
    $product = selectOne('product', ['id_product'=>$id_product]);
    
    $id_product = $product['id_product'];
    $name_product = $product['name_product'];
    $description = $product['description'];
    $price = $product['price'];
    $image = $product['image'];
    $id_category = $product['id_category'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product-edit'])){

    $name_product = trim($_POST['name_product']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $image = trim($_POST['image']);
    $id_category = trim($_POST['id_category']);
    
    if($name_product === '' || $description === '' || $id_category === ''){
        $status = "Не все поля заполнены!";
    }elseif (mb_strlen($name_product,'UTF8')<2){
        $status = "Название должно быть более 2ух символов!";
    }else{
            $productUPD = [
                'name_product'=>$name_product,
                'description'=>$description,
                'price'=>$price,
                'image'=>$image,
                'id_category'=>$id_category
            ];
            
            

            $id = $_POST['id_product'];
            $category_id = update('product', $id, $productUPD);
    
            header('location: ' . 'index.php' );
        
    }
}

//Удаление
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    
    $id_product = $_GET['del_id'];
    
    delete('product', $id_product);
    header('location: ' . 'index.php' );
}