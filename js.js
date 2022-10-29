$(document).ready(function(){    

    $.get("listTopCriptos.json", function(data){
        
        $("#moedaInput").change(function(){

            for(let i = 0; i < data.length; i++){
                if(data[i]["name"] == $("#moedaInput").val()){
                    $.get("https://api.coingecko.com/api/v3/coins/" + data[i]["name"].toLowerCase() + "/", function(data_coin){
                    $("#valorInput").val(parseFloat((data_coin["market_data"]["current_price"]["brl"] * $("#qtdInput").val()).toFixed(2)));
                    });
                    break;
                }else{
                    $("#valorInput").val("");
                }
            }

        });
        
    });

});
