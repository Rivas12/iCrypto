<?php

function save_to_bank(){

        include "database_connect.php";

        date_default_timezone_set('America/Sao_Paulo');

        $user_id = $_POST["user_id"];
        $coin_id = $_POST["coin_id"];
        $symbol = $_POST["symbol"];
        $name = $_POST["name"];
        $price_buy = $_POST["price"];
        $quantity = $_POST["quantity"];
        $date = date("Y-m-d h:i:s");


        $result = mysqli_query($conn, "INSERT INTO `purchased_coins` (`user_id`, `coin_id`, `name`, `symbol`, `price_buy`, `quantity`, `date`) VALUES ('$user_id', '$coin_id', '$name', '$symbol', '$price_buy', '$quantity', '$date');");
        
        if($result){
                return "nice!";
        }else{
                return "erro!";
        }
                
}
echo save_to_bank();
        
?>