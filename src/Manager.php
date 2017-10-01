<?php declare(strict_types=1);

namespace App;

class Manager
{
    /**
     * @param $orders
     * @return array
     */
    public function processing(array $orders)
    {
        return array_chunk($orders, 3);
    }
}
