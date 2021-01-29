<?php
    session_start();
    require_once('stripe-php-7.68.0/init.php');
    require_once("conexionBD.php");
    $baseDatos = BaseDatos::getInstance();
    $resultados = $baseDatos->consultar("select * from configuraciones;");
    $claveStripe = $baseDatos->obtener_fila($resultados, 0);
    \Stripe\Stripe::setApiKey($claveStripe[0]);

    header('Content-Type: application/json');
    
    $dominio = 'https://freelancerprueba2.000webhostapp.com/pcxpartes';

    $pago = $_POST['pago'];
    $tipoServicio = $_POST['tipo_servicio'];
    
    $checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
        'currency' => 'mxn',
        'unit_amount' => $pago,
        'product_data' => [
            'name' => $tipoServicio,
            'images' => ["https://i.ibb.co/TYmmkDf/pc-Xpartes-logo.png"],
        ],
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => $dominio . '/exitoso.php',
    'cancel_url' => $dominio . '/cancelado.html',
    ]);
    $id_pago = json_encode(['id' => $checkout_session->id]);
    $_SESSION['componentes'] = [
        'tipo_pc' => $_POST['tipo_pc'],
        'Procesador: ' => $_POST['procesador'],
        'Tarjeta madre: ' => $_POST['tarjeta_madre'],
        'RAM: ' => $_POST['ram'],
        'Tipo de almacenamiento: ' => $_POST['almacenamiento'],
        'Tarjeta grafica: ' => $_POST['gpu'],
        'Fuente de poder: ' => $_POST['fuente'],
        'Gabinete: ' => $_POST['gabinete'],
        'Componentes extra: ' => $_POST['extra']
    ];
    echo($id_pago);
?>