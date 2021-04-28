

<?php

$connection = mysqli_connect('localhost', 'test_db', 'C0haLYqhXkcvTNZU***)(', 'test_db');
mysqli_set_charset($connection,"utf8");
if ($connection == false)
{
    echo "Connect db ERROR";
    echo mysqli_connect_error();
    exit();
}
$result = mysqli_query($connection, "SELECT * FROM `articles_categories`");
if (mysqli_num_rows($result) == 0) {
    echo 'Категорій не знайдено';
} else {
    echo "<ul>";
    while ($cat = mysqli_fetch_assoc($result))
    {
        $articles_count = mysqli_query($connection, "SELECT COUNT(`id`) AS `tatal_count` FROM `articles` WHERE `categorie_id` =  ". $cat['id']);
        $articles_count_result = mysqli_fetch_assoc($articles_count);
        echo '<li>'. $cat['title'].' (' . $articles_count_result['tatal_count'] . ')</li>';
    }
    echo "</ul>";
}
mysqli_close($connection);

/*Date*/
$start_date = '2021-01-08 12:27:47';

$start_date_timestamp = strtotime($start_date);
$diff = time() - $start_date_timestamp;
$days_passed = floor((($diff / 60) / 60 ) / 24);
echo "Між створенням прикладу " . date('d.m.Y H:i:s', $start_date_timestamp) . ' і '. date('d.m.Y H:i:s'). " пройшло ". $days_passed . " днів!";



?>