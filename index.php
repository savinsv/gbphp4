<?php
include_once "lib/db/db.php";

$db = conectDB($connect_str,DB_USER,DB_PASSWORD);

$sql = "INSERT INTO 'goods' ('name','price','description') VALUES ";


$query = create_N_records_Sql($sql,21);
$counInTable = $db->query("SELECT count(*) FROM `goods`")->fetchColumn();
if ($countInTable === 0 ){
    $rows = $db->exec($query);
}
