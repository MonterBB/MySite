<?php

include "app/database/db.php";

$status = '';
$category = selectAll('category');


//Добавление в БД категории, на случай появления админки

/*if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){

    test($_POST);
    exit();
    $name = trim($_POST['name_category']);
    $description = trim($_POST['description']);

    if($name === '' || $description === ''){
        $status = "";
    }elseif (mb_strlen($name,'UTF8')<2){
        $status = "";
    }else{
        $existence = selectOne('category',['name_category'=>$name]);
        if($existence['name_category']===$name){
            $status="";
        }else{
            $category = [
                'name_category'=>$name,
                'description'=>$description
            ];
            $id = insert('users',$post);
            $category = selectOne('category', ['id'=>$id]);
        }
    }
}else{
    $name = '';
    $description = '';
}*/