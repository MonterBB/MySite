<?php

session_start();
require 'connect.php';

//Вывод на экран текущего значения переменных
//Принимает переменную
function test($value){
     echo '<pre>';
     print_r($value);
     echo '</pre>';
}

//Проверка выполнения запроса к БД
//Принимает запрос к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
}


//Запрос на получение всех данных одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM `$table`";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE `$key` = $value";
            } else {
                $sql = $sql . " AND `$key` = $value";
            }
            $i++;
        }
    }


    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM `$table`";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value) {
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE `$key` = $value";
            } else {
                $sql = $sql . " AND `$key` = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

//Запись в таблицу БД
function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key=>$value){
        if($i ===0){
            $coll = $coll . "$key";
            $mask = $mask . "'$value'";
        }else{
            $coll = $coll . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}

function addToCartFirst($id_product, $id_customer){
    global $pdo;
    $coll = 'id_product';
    $coll1 = 'id_customer';

    $sql = "INSERT INTO `product_order` (`$coll`,`$coll1`, `amount`) VALUES ('$id_product',$id_customer, 1)";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}

function addToProductInOrderFirst($id_product, $id_order){
    global $pdo;
    $coll = 'id_product';
    $coll1 = 'id_order';

    $sql = "INSERT INTO `product_in_order` (`$coll`,`$coll1`) VALUES ('$id_product', '$id_order')";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}

function addToProductInOrder($id_product, $id_product_in_order, $id_order){
    global $pdo;
    $coll = 'id_product';
    $coll1 = 'id_product_in_order';
    $coll2 = 'id_order';

    $sql = "INSERT INTO `product_in_order` (`$coll`, `$coll1`, `$coll2`) VALUES ('$id_product', '$id_product_in_order', '$id_order')";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}

function addToCart($id_product, $id_customer, $id_order){
    global $pdo;
    $coll = 'id_product';
    $coll1 = 'id_customer';
    $coll2 = 'id_order';

    $sql = "INSERT INTO `product_order` (`$coll`,`$coll1`, `$coll2`, `amount`) VALUES ('$id_product','$id_customer', '$id_order', 1)";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}

function addOrder($id_cart, $id_customer, $id_product_in_order){
    global $pdo;
    $date = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO `order` (`id_order`, `id_customer`, `date`, `id_product_in_order`, `status`) VALUES ('$id_cart', '$id_customer', '$date', '$id_product_in_order', 'В обработке')";

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);
}

//Обновление строки в таблице
function update($table, $id, $params){
    global $pdo;

    $i = 0;
    $str = '';

    foreach ($params as $key=>$value){
        if($i ===0){
            $str = $str . $key ." =" . "'$value'";
        }else{
            $str = $str . ", " . $key ." = " . "'$value'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id_$table = $id";



    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

//Удаление строки в таблице
function delete($table, $id_customer){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id_customer = $id_customer";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Поиск по заголовкам и содержимому
function searchInTitleAndContent($text, $table1, $table2){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT 
    p.*, c.login 
    FROM $table1 AS p
    JOIN $table2 AS c
    ON p.id_product = c.id_customer
    WHERE p.name_product LIKE '%$text%' OR p.description LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}
