<?php
    $style = "/css/style.css";
    include_once "db/db.php";
    
    $id = 0;
    $pack = 15; //Количество записей запрашиваемых из базы

    $db = conectDB($connect_str,DB_USER,DB_PASSWORD);

    $sql = "INSERT INTO goods (name,price,description) VALUES ";

