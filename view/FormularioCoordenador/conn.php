<?php

$pdo = new PDO("mysql:dbname=BANCORESERVA;host=localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

return $pdo;
?>