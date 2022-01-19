<?php
include "../../app/database/db.php";

$status = '';
$id='';
$name='';
$description='';

$topics = selectAll('category');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){

$name = trim($_POST['name']);
$description = trim($_POST['description']);

if($name === '' || $description === ''){
    $status = "Не все поля заполнены!";
}elseif (mb_strlen($name,'UTF8')<2){
    $status = "Название должно быть более 2ух символов!";
}else{
    $existence = selectOne('category',['name_category'=>$name]);
    if($existence['name_category']===$name){
        $status="Такая категория уже есть!";
    }else{
        $category = [
            'name_category'=>$name,
            'description'=>$description
        ];

        $id = insert('category',$category);

        $category = selectOne('category', ['id_category'=>$id]);

        header('location: ' . 'index.php' );
    }
}
}else{
$name = '';
$description = '';
}

//Редактирование
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_category'])){
    
    $id = $_GET['id_category'];
    $topic = selectOne('category', ['id_category'=>$id]);
    
    $id = $topic['id_category'];
    $name = $topic['name_category'];
    $description = $topic['description'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    
    if($name === '' || $description === ''){
        $status = "Не все поля заполнены!";
    }elseif (mb_strlen($name,'UTF8')<2){
        $status = "Название должно быть более 2ух символов!";
    }else{
            $category = [
                'name_category'=>$name,
                'description'=>$description
            ];
    
            $id = $_POST['id_category'];
            $category_id = update('category', $id, $category);
    
            header('location: ' . 'index.php' );
        
    }
}

//Удаление
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    
    $id = $_GET['del_id'];
    
    delete('category', $id);
    header('location: ' . 'index.php' );
}