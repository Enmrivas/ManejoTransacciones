<?php 
    require_once 'helpers/utilities.php';
    require_once 'transaccion.php';
    require_once 'services/IServiceBase.php';
    require_once 'services/TransactionService.php';

    
    $service = new TransactionService();
    


    if(isset($_POST['monto']) && isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['desc']) ){

        $newTransaction = new Transaccion();

        

        $newTransaction->initializeData(0, $_POST['monto'], $_POST['fecha'], $_POST['hora'], $_POST['desc']);

        $service->Add($newTransaction);


        header("Location: ../index.php");
        exit();

    }

?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Manejo de Transacciones</a>
        </nav>

<div class="container">
    <a href="../index.php" class="btn btn-secondary" style="margin-top: 1%">Volver</a>
</div>

<main role="main" style="background: grey; padding: 5%; margin-top: 3%;">

    <div class="container">

        <div class="card">
            <div class="card-body">
                <form action="registro.php" method="POST">
                    <div class="form-group">
                        <label for="apellido">Monto</label>
                        <input required type="number" class="form-control" id="monto" name="monto" placeholder="Monto">
                    </div>

                    <div class="form-group">
                        <label for="apellido">Descripcion</label>
                        <input required type="text" class="form-control" id="desc" name="desc" placeholder="Notas de la transaccion">
                    </div>
                    
                    <div class="form-group">
                        <label for="materiaFav">Fecha</label>
                        <input required type="date" class="form-control" id="fecha" name="fecha">
                    </div>

                    <div class="form-group">
                        <label for="apellido">Hora</label>
                        <input required type="time" class="form-control" id="hora" name="hora">
                    </div>
                    <button class="btn btn-primary" style="float: right; margin-top: 2%;" type="submit">Enviar</button>
                </form>
            </div>
        </div>
        
    </div>

</main>
</html>