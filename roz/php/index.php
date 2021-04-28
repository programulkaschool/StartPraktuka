<?php

echo "Start <br>";

$pereminna = 100;
echo $pereminna;

/*Типи даних*/
$integer_pr     = 5;
$float_pr       = 5.5;
$string_pr      = 'string';
$pereminna = array('Dana', 'Kira', 'Alla', 'Helen', 'Lana', 'John');
echo $pereminna[1];
/*Масив*/
var_dump($pereminna);
echo '<br>';
print_r ( $pereminna);
echo '<pre>';
print_r($pereminna);
echo '</pre>';

/*Асоціативні масиви*/
$pereminna_asociatuvnuj = array(
    'Dana'  => 'Mina',
    'Kira'  => 'Nensi',
    'Alla'  => 'Dolli',
    'Helen' => 'Roberts',
    'Lana'  => 'Simson',
    'John'  => 'Smith'
);
echo $pereminna_asociatuvnuj['Kira'];

echo '<pre>';
print_r($pereminna_asociatuvnuj);
echo '</pre>';
/*Багатовимірні масиви масиви*/
$pereminna_bahato_vumirn = array(
    'Dana'  => array(
        'arg'       => 25,
        'family'    => 'Mina',
    ),
    'Kira'  => 'Nensi',
    'Alla'  => 'Dolli',
    'Helen' => 'Roberts',
    'Lana'  => 'Simson',
    'John'  => 'Smith'
);
echo '<pre>';
print_r($pereminna_bahato_vumirn['Dana']['family']);
echo '</pre>';
/*БУлеві значення*/
$is_true = true;
$is_false = false;
/*Різниця між “txt $a” - як перемінна   ‘txt $a’ - як текст*/
$a = 'bubluk';
echo 'Як текст $a <br>';
echo "Як перемінна $a";
echo '<br>';
/*Конкатенація - об'єднання стрічки*/
$b = 'один';
$c = 'два';

echo $b.$c;
echo '<br>';

$string_txt = array('Test 1', 'Test 2', 'Test 3', 'Test 4', 'Test 5', 'Test 6');
echo $string_txt[0].' - '. $b . '<br>'.$string_txt[1].' - '. $c;


/* + - * / % - оператори*/
echo '<br>';
$d = 7;
$f = 3;

echo $d + $f;
echo '<br>';

echo $d - $f;
echo '<br>';

echo $d * $f;
echo '<br>';

echo $d / $f;
echo '<br>';

echo $d % $f;
echo '<br>';

/* Умови If <> == != >= <=  or - або, and - і */

$g = 7;
$k = 7;

if ($g > $k) {
    echo '$g > $k';
    echo '<br>';
} else {
    echo '$g < $k';
    echo '<br>';
}

if ($g > $k) {
    echo '$g > $k';
    echo '<br>';
} elseif ($g == $k) {
    echo '$g = $k';
    echo '<br>';
} else {
    echo '$g < $k';
    echo '<br>';
}


/* FOR */

/* пример 1 */

for ($i = 1; $i <= 10; $i++) {
    echo $i;
}

/* пример 2 */

for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i;
}


/**/

$people = array(
    array('name' => 'Kalle', 'salt' => 856412),
    array('name' => 'Pierre', 'salt' => 215863)
);

for($i = 0, $size = count($people); $i < $size; ++$i) {
    $people[$i]['salt'] = mt_rand(000000, 999999);
}
echo '<pre>';
    print_r($people);
echo '</pre>';


/*while*/

$i = 1;
while ($i <= 10) {
    echo $i++;  /* выводиться будет значение переменной
                   $i перед её увеличением
                   (post-increment) */
}

/* пример 2 */

$i = 1;
while ($i <= 10):
    echo $i;
    $i++;
endwhile;



/*foreach*/

/* Пример 1: только значение */

$a = array(1, 2, 3, 17);

foreach ($a as $v) {
    echo "Текущее значение переменной \$a: $v.\n";
}

/* Пример 2: значение (для иллюстрации массив выводится в виде значения с ключем) */

$a = array(1, 2, 3, 17);

$i = 0; /* только для пояснения */

foreach ($a as $v) {
    echo "\$a[$i] => $v.\n";
    $i++;
}

/* Пример 3: ключ и значение */

$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}

/* Пример 4: многомерные массивы */
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}

/* Пример 5: динамические массивы */

foreach (array(1, 2, 3, 4, 5) as $v) {
    echo "$v\n";
}


/*function*/
function foo($arg_1, $arg_2, /* ..., */ $arg_n)
{
    echo "Пример функции.\n";
   // return $retval;
}






















?>