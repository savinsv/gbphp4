<?php
include_once "lib/db/db.php";

$db = conectDB($connect_str,DB_USER,DB_PASSWORD);

$sql = "INSERT INTO goods('name','price','description') VALUES ";


$query = create_N_records_Sql($sql,100);
$countInTable = (int)$db->query("SELECT count(*) FROM `goods`")->fetchColumn();
var_dump($countInTable === 0);
echo "<br>Записей в таблице: ". $countInTable ."<br>";
echo $query ."<br>";
/* if ($countInTable === 0 ){
    echo "<br> Ноль записей";
    $countInTable = $db->exec($query);
    echo $db->errorCode();
    echo "Количество добавленныйх записей:". $countInTable;
}
 */