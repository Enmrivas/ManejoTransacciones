<?php
    require_once 'helpers/utilities.php';
    require_once 'transaccion.php';
    require_once 'services/IServiceBase.php';
    require_once 'services/TransactionService.php';

    $service = new TransactionService();

    $containsId = isset($_GET['id']);

    if($containsId){
        $idTransaccion = $_GET['id'];

        $service->Delete($idTransaccion);

    }

    header("Location: ../index.php");

    exit();

?>