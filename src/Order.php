<?php declare(strict_types=1);

namespace App;

class Order
{
    private static $id = 0;
    public $orderId;
    public $timeSend;
    public $timeCook;
    public $coordinates = [0, 0];
    public $processed_at;
    public $lengthVector;
    public $timeDelivery;


    /**
     * @param int $timeSend
     * @param int $timeCook
     * @param array $coordinates
     * @return Order
     */
    public function make(int $timeSend, int $timeCook, array $coordinates): Order
    {
        $this->orderId = self::$id++;
        $this->timeSend = $timeSend;
        $this->timeCook = $timeCook;
        $this->coordinates[0] = $coordinates[0];
        $this->coordinates[1] = $coordinates[1];
        
        return $this;
    }
    
    /**
     * @param array $orderList
     * @return array
     */
    public function delivery(array $orderList): array
    {

        foreach ($orderList as $orders) {
            foreach ($orders as &$order) {
                $order->lengthVector = round(sqrt(pow(($order->coordinates[0]), 2) + pow(($order->coordinates[1]), 2)), 2);
                $order->timeDelivery = round($order->lengthVector/60);
            }
        }
        return $orderList;
    }
}
