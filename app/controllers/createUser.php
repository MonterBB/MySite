<?php 
include "../../app/database/db.php";

$status = '';
$id_customer='';
$login='';
$email='';
$password='';
$admin='';

$users = selectAll('customer');

//Создание пользователя
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user-create'])){

$login = trim($_POST['login']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$admin = trim($_POST['admin']);



if($login === '' || $email === '' || $password === ''){
    $status = "Не все поля заполнены!";
}elseif (mb_strlen($login,'UTF8')<2){
    $status = "Название должно быть более 2ух символов!";
}else{
    $existence = selectOne('customer',['login'=>$email]);
    if($existence['login']===$login){
        $status="Этот логин занят!";
    }else{
        $customer = [
            'login'=>$login,
            'email'=>$email,
            'password'=>$password,
            'admin'=>$admin,
        ];

        $id = insert('customer',$customer);

        $cust = selectOne('customer', ['id_customer'=>$id]);

        header('location: ' . 'index.php' );
    }
}
}else{
$login = '';
$email = '';
}

//Редактирование
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_customer'])){
    
    $id_customer = $_GET['id_customer'];
    $customer = selectOne('customer', ['id_customer'=>$id_customer]);
    
    $id_customer = $customer['id_customer'];
    $login = $customer['login'];
    $email = $customer['email'];
    $password = $customer['password'];
    $admin = $customer['admin'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user-edit'])){

    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $admin = trim($_POST['admin']);
    $id_customer = trim($_POST['id_customer']);
    
    if($login === '' || $email === '' || $password === ''){
        $status = "Не все поля заполнены!";
    }elseif (mb_strlen($login,'UTF8')<2){
        $status = "Логин должен быть более 2-ух символов!";
    }else{
            $customerUPD = [
                'login'=>$login,
                'email'=>$email,
                'password'=>$password,
                'admin'=>$admin,
            ];
            
            $id = $_POST['id_customer'];
            $customer_id = update('customer', $id, $customerUPD);
    
            header('location: ' . 'index.php' );
        
    }
}

//Удаление
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    
    $id_customer = $_GET['del_id'];
    
    delete('customer', $id_customer);
    header('location: ' . 'index.php' );
}