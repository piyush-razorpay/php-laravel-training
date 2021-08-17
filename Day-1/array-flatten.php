<?php declare(strict_types=1);

$toFlatten = [2, 3, [4,5], [6,7], 8];

print_r(array_flatten($toFlatten));

function array_flatten($array) {
    $return = array();
    foreach ($array as $key => $value) {
        if (is_array($value)){
            $return = array_merge($return, array_flatten($value));
        } else {
            $return[] = $value;
        }
    }

    return $return;
}