<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCrypto</title>

    <!-- jquery-3.6.1 -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <!-- notificações -->
    <link href="notifications/jquerytoast.css" rel="stylesheet">
    <script src="notifications/jquerytoast.js"></script>


    
    <script src="https://kit.fontawesome.com/dbfe581b9a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <script src="js.js"></script>
</head>
<body>
    <!-- notification -->
    <script>
        function ajax(){
            $.get( "json/ListTopCriptos.json", function(data_symbol) {
                for (let i = 0; i < data_symbol.length; i++) {
                    if(data_symbol[i]["name"] == $("#coinInput").val()){
                        $symbol_coin = data_symbol[i]["symbol"];
                        break
                    }
                }
            $.ajax({
                url: "ajax/ajax.php",
                type: "POST",
                dataType: 'text',
                data: {user_id: "1", coin_id: "1", symbol: $symbol_coin, name: $("#coinInput").val(), price: $("#valorInput").val(), quantity: $("#quantityInput").val()},
                beforeSend: function(response){
                    $.toast({
                        heading: 'ENVIANDO',
                        text: 'enviado para o banco de dados!',
                        showHideTransition: 'fade',
                        hideAfter: 2000,
                        position: 'top-right',
                        icon: 'warning'
                    });
                },
                success: function(response){
                    if(response == "true"){
                        $.toast({
                            heading: 'SALVO',
                            text: 'guardado no banco de dados...',
                            showHideTransition: 'slide',
                            hideAfter: 4000,
                            position: 'top-right',
                            icon: 'success'
                        });
                    }else{
                        $.toast({
                            heading: 'ERRO!',
                            text: 'Ocorreu um erro ao salvar no banco de dados! Tente novamente',
                            showHideTransition: 'slide',
                            hideAfter: 4000,
                            position: 'top-right',
                            icon: 'error'
                        });
                    }
                    },
                error: function(response){
                        $.toast({
                            heading: 'ERRO!',
                            text: 'Ocorreu um erro interno!',
                            showHideTransition: 'slide',
                            hideAfter: 4000,
                            position: 'top-right',
                            icon: 'error'
                        });
                },
            });
        });
        }
    </script>

    <?php include "database_connect.php" ?>

    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top justify-content-between">
            <div class="container">
                <a class="navbar-brand" href="#">Crypto Invest</a>
            
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>
                    <div>
                        <button type="button" class="btn btn-success mr-auto">Rendimentos</button>
                        <button type="button" class="btn btn-danger mr-auto">Sair</button>
                    </div>
            </div>
        </nav>
    </div>
    <!-- ================================================================= -->
    <div class="row g-2" style="margin: 100px 0 0 0 !important;">
        <div class="col-8 mx-auto">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ICON</th>
                        <th>MOEDA</th>
                        <th>SIMBOLO</th>
                        <th>QUANTIDADE</th>
                        <th>PREÇO DE COMPRA</th>
                        <th>PREÇO ATUAL</th>
                        <th>Flutuação</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $counter = 1;

                $query = mysqli_query($conn, "SELECT * FROM `purchased_coins`");

                while ($row = mysqli_fetch_assoc($query)) {
                    $data_coin = json_decode(file_get_contents('http://api.coingecko.com/api/v3/coins/' . strtolower($row['name'])), true);
                    $flutuacao = $row['price_buy'] - $data_coin['market_data']['current_price']['brl'];
                    $color_flutuacao = "";

                    if($flutuacao == 0){
                        $color_flutuacao = "yellow";
                    }elseif ($flutuacao > 0) {
                        $color_flutuacao = "green";
                    } else {
                        $color_flutuacao = "red";
                    }
                    

                    echo "
                <tr>
                    <th scope='row'>#$counter</th>
                    <td><img src='".$data_coin['image']['small']."' alt='' width='18' height='18'></td>
                    <td>$row[name]</td>
                    <td>$row[symbol]</td>
                    <td>$row[quantity]</td>
                    <td>R$ $row[price_buy]</td>
                    <td>R$ ".$data_coin['market_data']['current_price']['brl']."</td>
                    <td style='color: $color_flutuacao;'>R$ ".number_format($flutuacao, 4, ',', '')."</td>
                    <td>
                        <a href='' title='vender'><i class='fa-solid fa-money-bill'></i></a>
                        <a href='' title='editar'><i class='fa-solid fa-pen-to-square'></i></a>
                        <a href='' title='deleter'><i class='fa-solid fa-trash'></i></a>
                        <a href='' title='info'><i class='fa-solid fa-circle-info'></i></a>
                    </td>
                </tr>";
                $counter++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--footer-->
    <footer class="text-center bg-dark text-white fixed-bottom" style="margin: 0; padding: 10px; "><p style="margin: 0;">Copyright 2021 RivaldoSilveira®</p></footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- ========================== -->
    <button type="button" data-bs-toggle="modal" data-bs-target="#addCoin"><a href="#" id="add"><i class="fa-solid fa-cart-plus"></i></a></button>

    <!-- Modal -->
    <div class="modal fade" id="addCoin" tabindex="-1" aria-labelledby="ModalAddCoin" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="ModalAddCoin">Adicionar nova moeda</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
            <div class="input-group mb-3">
                <span class="input-group-text col-3" style="margin: 0 auto !important; float: none !important;">Moeda</span>
                <input list="coins" class="form-control" placeholder="" id="coinInput">
            </div>
            
            <datalist id="coins">
                <?php
                    $data = json_decode(file_get_contents("json/listTopCriptos.json"), true);

                    for ($x = 0; $x <= (count($data) - 1); $x++) {
                        echo "<option value=".$data[$x]['name'].">";
                    }
                ?>
            </datalist>

            <div class="input-group mb-3">
                <span class="input-group-text col-3">Quantidade</span>
                <input type="number" class="form-control" placeholder="" id="quantityInput" value="1">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text col-3" id="basic-addon1">Valor (R$)</span>
                <input type="number" class="form-control" placeholder="" id="valorInput">
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="ajax();" data-bs-dismiss="modal">Salvar moeda</button>
            </div>
        </div>
        </div>
    </div>
</body>
</html>