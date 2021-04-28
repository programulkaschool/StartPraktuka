<?php
include ('config.php');
$connection = mysqli_connect(
    $config['db']['host'],
    $config['db']['user'],
    $config['db']['password'],
    $config['db']['dbname']
);
mysqli_set_charset($connection,"utf8");
if ($connection == false)
{
    echo "Connect db ERROR";
    echo mysqli_connect_error();
    exit();
}