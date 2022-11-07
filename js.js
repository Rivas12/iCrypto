$(document).ready(function(){  

    $.get("listTopCriptos.json", function(data){
        
        $("#coinInput").change(function(){
            for(let i = 0; i < data.length; i++){
                if(data[i]["name"] == $("#coinInput").val()){
                    $.get("https://api.coingecko.com/api/v3/coins/" + data[i]["name"].toLowerCase() + "/", function(data_coin){
                        $("#valorInput").val((data_coin["market_data"]["current_price"]["brl"] * $("#quantityInput").val()));
                    });
                    break;
                }else{
                    $("#valorInput").val("");
                }
        
            }
        });
        $("#quantityInput").change(function(){
            for(let i = 0; i < data.length; i++){
                if(data[i]["name"] == $("#coinInput").val()){
                    $.get("https://api.coingecko.com/api/v3/coins/" + data[i]["name"].toLowerCase() + "/", function(data_coin){
                        $("#valorInput").val((data_coin["market_data"]["current_price"]["brl"] * $("#quantityInput").val()));
                    });
                    break;
                }else{
                    $("#valorInput").val("");
                }
        
            }
        });
        
    });

});
