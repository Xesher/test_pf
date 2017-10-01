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
