<?php

session_start();
ob_start();

$url = $_GET['url'];
$url = explode('/', $url);
$arquivo = 'pages/' . $url[0] . '.php';

if ($url[0] == 'calc_finan') {
    include_once($arquivo);
} else {?>

    <!doctype html>
    <html lang="pt-br">
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Icones-->
        <script src="https://kit.fontawesome.com/d49cb15799.js" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
              crossorigin="anonymous">


        <title> LucasTeste - JS</title>
    </head>
    <body>

    <header class="container-fluid py-3" style="color: #fff; background-color: #000; font-size: 16px; font-weight: bolder;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span class="text-center d-block">Financiamento</span>
                </div>
            </div>
        </div>
    </header>

    <?php if (file_exists($arquivo)) { ?>
        <section class="container espacamento">
            <section class="row" style="position: relative;">
                <?php include_once($arquivo); ?>
            </section>
        </section>
    <?php } else {
    header("Location: https://lucasteste.com.br/rhaellen/financiamento");
}?>


    <footer class="container-fluid py-3" style="position: fixed; left: 0; right: 0; bottom: 0; color: #fff; background-color: #000; font-size: 16px; font-weight: bolder;">
        <div class="row">
            <div class="col-12">
                <span class="text-center d-block"> &copy; Rhaellen <?php echo date('Y'); ?> - Todos os direitos reservados. </span>
            </div>
        </div>
    </footer>

    <!--Bootstrap Bundle with Popper-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>

    </body>
    </html>
<?php } ?>

