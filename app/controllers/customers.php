<?php
include("app/database/db.php");

$status = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password1 = trim($_POST['password']);
    $password2 = trim($_POST['password2']);

    if($login === '' || $email === '' || $password1 === '' || $password2 === ''){
        $status = "Не все поля заполнены!";
    }elseif ($password1 !== $password2){
        $status = "Пароли в обеих полях должны соответствовать!";
    }else{
        $existenceEmail = selectOne('customer', ['email'=>$email]);
        $existenceLogin = selectOne('customer', ['login'=>$login]);
        if($existenceEmail['email'] === $email){
            $status = "Пользователь с такой почтой уже зарегистрирован!";
        }elseif ($existenceLogin['login'] === $login){
            $status = "Логин занят.";
        }else{
            $pass = password_hash($password1, PASSWORD_DEFAULT);
            $post = [
                'login'=>$login,
                'password'=>$pass,
                'email'=>$email
            ];
            $id = insert('customer', $post);
            $user = selectOne('customer', ['id_customer'=>$id]);

            $_SESSION['id_customer'] = $user['id_customer'];
            $_SESSION['login'] = $user['login'];

            header('location: ' . 'index.php');
        }
    }
}else{
    $email = '';
    $login = '';
}
