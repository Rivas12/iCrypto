<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracking Crypto</title>
    <script src="https://kit.fontawesome.com/dbfe581b9a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    input {
        background: transparent !important;
        border: 2px solid white !important;
        caret-color: blue !important;
        color: white !important;
    }
</style>
<body>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top justify-content-between">
            <div class="container">
                <a class="navbar-brand" href="index.htm">Crypto Invest</a>
            
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
    <div class="container" style="margin: 100px 0 0 0 !important;">

        <div class="row col-6">
            <form style="color: white !important;">

            <div class="mb-3">
                <label for="coins" class="form-label">Moeda</label>
                <input class="form-control" list="coins" id="coin" placeholder="Digite para procurar...">
                
                <datalist id="coins">
                    <?php
                        $data = json_decode(file_get_contents("http://api.coingecko.com/api/v3/coins"), true);

                        for ($x = 0; $x <= (count($data) - 1); $x++) {
                            echo "<option value=".$data[$x]['id'].">";
                        }
                    ?>
                </datalist>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Preço</label>
                <input type="number" class="form-control" id="price">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

        </div>

        
    </div>
    

    <!-- ================================================================= -->
    <!--footer-->
    <footer class="text-center bg-dark text-white fixed-bottom" style="margin: 0; padding: 10px; "><p style="margin: 0;">Copyright 2021 RivaldoSilveira®</p></footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>