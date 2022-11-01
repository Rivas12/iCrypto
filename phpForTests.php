<?php include "database_connect.php";


        date_default_timezone_set('America/Sao_Paulo');

        $user_id = intval(1);
        $coin_id = intval(5);
        $symbol = "doge";
        $name = "dogecoin";
        $price_buy = intval(515);
        $quantity = intval(30);
        $date = date("Y-m-d h:i:s");

        $result = mysqli_query($conn, "INSERT INTO `purchased_coins` (`user_id`, `coin_id`, `name`, `symbol`, `price_buy`, `quantity`, `date`) VALUES ('$user_id', '$coin_id', '$name', '$symbol', '$price_buy', '$quantity', '$date');");
?>
