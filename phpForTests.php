<?php

    $data = json_decode(file_get_contents("http://api.coingecko.com/api/v3/coins"), true);

    for ($x = 0; $x <= (count($data) - 1); $x++) {
        echo $data[$x]['id'];
    }

?>
