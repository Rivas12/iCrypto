<?php

$data = json_decode(file_get_contents("listTopCriptos.json"), true);

for ($x = 0; $x <= (count($data) - 1); $x++) {
    echo $data[$x]['name']."<br>";
}
?>
