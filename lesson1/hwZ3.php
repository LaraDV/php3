<?php
//математическую логику смотрела здесь: https://izamorfix.ru/matematika/arifmetika/vse_deliteli_chisla.html
$n = 600851475143;

function getDivide($n){
    $num = $n;
    $array = [];
    $d = 2;
    while($num!=1){
        $crumbs = $num%$d;
        if ($crumbs === 0) {
            array_push($array, $d);
            var_dump($array);
            $num = $num/$d;
        }else{
            $d++;
        }
    }
    print_r($array);
    echo "Cамый большой делитель заданного числа: ".max($array);
}

getDivide($n);