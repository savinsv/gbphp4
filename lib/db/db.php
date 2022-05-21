<?php
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','gbphp');
define('DB_USER','worker');
define('DB_PASSWORD','getData');

$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;

function conectDB(string $connectionStr, string $dbUser, string $dbPassword){
    try{
        $db = new PDO($connectionStr,$dbUser,$dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch(PDOException $exception){
        die("Ошибка: ".$exception->getMessage());
    }
}


function create_N_records_Sql(string $sql,int $countRec):string{
    for ($i = 0; $i < $countRec; $i++){
        $j = $i + 1;
        $sql.= "('Товар $j',10$i.00,'Ну прям очень хороший Товар № $j')";
        if ($i < $countRec -1){
            $sql .=",";
        }
    }
    return $sql;
}

function getNrecrds($dbConnect,int $id, int $pack){
    $sql_get ="SELECT * FROM goods WHERE id > $id AND id < ($id+1+$pack)";
    $rows = $dbConnect->query($sql_get);
    return $rows->fetchAll();  
}