<?php
$connection = mysqli_connect('localhost', 'test_db', 'C0haLYqhXkcvTNZU***)(', 'test_db');
mysqli_set_charset($connection,"utf8");
if ($connection == false)
{
    echo "Connect db ERROR";
    echo mysqli_connect_error();
    exit();
}