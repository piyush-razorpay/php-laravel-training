<?php declare(strict_types=1);

$stringifiedJson = "{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}";
$obj = json_decode($stringifiedJson);

$playersArray = $obj->{"players"};

$names = array();
foreach($playersArray as $player) {
    $names[] = $player->name;
}
print_r($names);

$ages = array();
foreach($playersArray as $player) {
    $ages[] = $player->age;
}
print_r($ages);

$cities = array();
foreach($playersArray as $player) {
    $cities[] = $player->address->city;
}
print_r($cities);

print_r(array_unique($names));

$maxAge = max($ages);
$maxAgePlayers = array();
foreach($playersArray as $player) {
    if ($maxAge == $player->age) {
        $maxAgePlayers[] = $player->name;
    }
}
print_r($maxAgePlayers);

