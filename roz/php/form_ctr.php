<?php

include ('include/db.php');

$name = $_POST['user'];
$password = $_POST['password'];

//var_dump($name);
//var_dump($password);

$acaunt = mysqli_query($connection, "SELECT * FROM `users` WHERE `name`= '$name' AND `password` = '$password'");
if (mysqli_num_rows($acaunt) == 0) {
  echo "Ви не зареєстровані!!!!!!!!!";
} else {
    echo "Привіт ".$name;
}