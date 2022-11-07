<?php

function save_to_bank(){

        include "../database_connect.php";

        date_default_timezone_set('America/Sao_Paulo');

        $user_id = $_POST["user_id"];
        $coin_id = $_POST["coin_id"];
        $symbol = $_POST["symbol"];
        $name = $_POST["name"];
        $price_buy = json_decode(file_get_contents('http://api.coingecko.com/api/v3/coins/' . strtolower($_POST["name"])), true)['market_data']['current_price']['brl'];
        $quantity = $_POST["quantity"];
        $date = date("Y-m-d h:i:s");


        if(mysqli_query($conn, "INSERT INTO `purchased_coins` (`user_id`, `coin_id`, `name`, `symbol`, `price_buy`, `quantity`, `date`) VALUES ('$user_id', '$coin_id', '$name', '$symbol', '$price_buy', '$quantity', '$date');")){
                return "true";
        }else{
                return "false";
        }
                
}
echo save_to_bank();
?>