<?php declare(strict_types=1);

// require composer auto loading
require __DIR__ . '/../vendor/autoload.php';

/**
 * Create array orders
 */
$orders = [];

foreach (range(0, rand(9, 99)) as $num) {
    $orders[$num] = (new \App\Order)->make(rand(0, 30), rand(10, 30), [rand(-1000, 1000), rand(-1000, 1000)]);
}

$orders = (new \App\Cook)->processing($orders);
$orders = (new \App\Manager)->processing($orders);

$orderList = $orders;

foreach ($orderList as $ordered) {
    foreach ($ordered as $order) {
        (new \App\Logger)->single([
            'id' => $order->orderId,
            'время поступления' => $order->timeSend,
            'время готовки' => $order->timeCook,
            'Координата Х' => $order->coordinates[0],
            'Координата Y' => $order->coordinates[1],
        ]);
    }
}
$routeList = (new \App\Order)->delivery($orders);

foreach ($routeList as $key => $routes) {
    (new \App\Logger)->single([
        'Маршрут №' => $key,
    ]);
    foreach($routes as $order) {
        (new \App\Logger)->single([
            'id заказа' => $order->orderId,
            'время доставки заказа' => $order->timeSend,
        ]);
    }
}
