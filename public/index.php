<?php declare(strict_types=1);

// require composer auto loading
require __DIR__ . '/../vendor/autoload.php';
$orders = [];
/**
 * Create array orders
 */
foreach (range(0, rand(9, 99)) as $num) {
    $orders[$num] = (new \App\Order)->make(rand(0, 30), rand(10, 30), [rand(-1000, 1000), rand(-1000, 1000)]);
}
$orders = (new \App\Cook)->processing($orders);
$orders = (new \App\Manager)->processing($orders);
(new \App\Route)->delivery($orders);
$orderList=$orders;
foreach ($orderList as $ordered) {
    foreach ($ordered as $order) {
        echo "\n id заказа: №" . $order->orderId;
        echo "\n время поступления: " . $order->timeSend . "ед";
        echo "\n время готовки: " . $order->timeCook . "ед";
        echo "\n Координата Х: " . $order->coordinates[0];
        echo "\n Координата Y: " . $order->coordinates[1] . "\n\n\n";
    }
}
$orders = (new \App\Order)->delivery($orders);
$i=0;
$routeList=$orders;
foreach ($routeList as $routes) {
$i++;
//die(var_dump($routes[0]->timeDelivery));
    if($routes[0]) {
        echo "\nЭто " . $i . " цикл доставки ";
        echo "\nПервый заказ ";
        echo "\n id заказа: №" . $routes[0]->orderId;
        echo "\n Время доставки: " . $routes[0]->timeDelivery;
    }
    if($routes[1]) {
        echo "\nВторой заказ ";
        echo "\n id заказа: №" . $routes[1]->orderId;
        echo "\n Время доставки: " . $routes[1]->timeDelivery;
    }
    if($routes[2]){
        echo "\nТретий заказ ";
        echo "\n id заказа: №" . $routes[2]->orderId;
        echo "\n Время доставки: " . $routes[2]->timeDelivery;
    }


//    foreach ($routes as $route) {
//        echo "\n id заказа: №" . $route->orderId;
//        echo "\n время поступления: " . $route->timeSend . "ед";
//        echo "\n время готовки: " . $route->timeCook . "ед";
//        echo "\n Координата Х: " . $route->coordinates[0];
//        echo "\n Координата Y: " . $route->coordinates[1] . "\n\n\n";
//    }
}
