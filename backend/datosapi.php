<?php 
    /*accede a la informacion de manera publica en este caso por la variable $datos
    podemos acceder por un array asociativo es decir por dolar o por euro*/
    //$datos = ['dolar' => 600, 'euro' =>800];
    /*obtiene el valor ingresado en la url ya sea euro o dolar configuracion de .htaccess*/
    //$peticion = $_GET['variable'];
    /*retorna lson en formato entendible en el navegador*/
    header('Content-Type: application/json');
    /*dando acceso al api */
    header("Access-Control-Allow-Origin: *");
    //euro y dolar son el nombre de las tbl
    if($_GET['moneda'] == 'euro' || $_GET['moneda'] == 'dolar'){
        include_once 'conexion.php';
        //trayendo los datos de la bd api de acuerdo a lo que ingreso mostrara la informacion de la tabla
        $sql = 'SELECT * FROM '.$_GET['moneda'];
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute();
        $datos = $sentencia->fetchAll();

    }
    else{
        echo 'solicitud no encontrada';
    }
    /*pintando el resultado en json, muestra la infomracion que sera consumida*/
    echo json_encode($datos);
?>