<?php declare(strict_types=1);
namespace App;

class Cook
{
    /**
     * @param array $orders
     * @return array
     */
    public function processing(array $orders): array
    {
        foreach ($orders as $order) {
            $order->processed_at = $order->timeSend + $order->timeCook;
        }
        return $orders;
    }
}