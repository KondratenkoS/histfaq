<?php
echo "Симфони - скелетон на апаче.";

$db = new PDO('mysql:host=db;dbname=mariadb', 'root','root');

if ($db) {
    echo "<br>Есть подключение<br>";
}
