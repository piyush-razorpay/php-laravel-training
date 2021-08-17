<?php declare(strict_types=1);

$snakes = array("abc_def", "ghi_jkl");

foreach($snakes as $snake) {
    $camel = snakeToCamel($snake);
    $camels[] = $camel;
}

var_dump($camels);

function snakeToCamel(string $snake) {
    $stringArray = explode("_", $snake);
    foreach($stringArray as $str) {
        $result .= ucfirst($str);
    }
    $lcresult = lcfirst($result);
    return $lcresult;
}