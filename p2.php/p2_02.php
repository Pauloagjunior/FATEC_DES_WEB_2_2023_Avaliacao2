<?php
require_once('DBConnect.php');

$objeto1 = new DBConnect(); 
# print_r($objeto1->conn);

if ($objeto1->inserir_autor('Paulo','49130357896','19999418051','publica')){
    print("E não é que deu certo ! ...");
};

unset($objeto1);

$objeto1 = new DBConnect(); 
?>