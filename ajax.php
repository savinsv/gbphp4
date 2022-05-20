<?php
//echo $_SERVER['REQUEST_METHOD'];

var_dump($_POST);

$data = $_POST['postData'];


//var_dump($data);
//var_dump(json_decode($data));

$obj = json_decode($data);
var_dump($obj);
//echo $obj->good;


//$json = file_get_contents('php://input');
//$data = json_decode($json);
//echo ' Из php://input '.$data;
$answ = array('ans'=>'good','data'=>20);

echo json_encode($obj->answ);
//var_dump($answ);
//echo json_encode($answ,JSON_FORCE_OBJECT);