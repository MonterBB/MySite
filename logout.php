<?php
session_start();

unset($_SESSION['id_customer']);
unset($_SESSION['login']);

header('location: ' . 'index.php');
