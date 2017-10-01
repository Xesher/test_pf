<?php declare(strict_types=1);

namespace App;

class Order
{
    private static $id = 0;
    public $orderId;
    public $timeSend;
    public $timeCook;
    public $coordinates = [0, 0];
    public $vector;
    public $processed_at;
    public $lengthVector;
    public $timeDelivery;


    /**
     * @param int $timeSend
     * @param int $timeCook
     * @param array $coordinates
     * @return $this
     */
    public function make(int $timeSend, int $timeCook, array $coordinates)
    {
        $this->orderId = self::$id++;
        $this->timeSend = $timeSend;
        $this->timeCook = $timeCook;
        $this->coordinates[0] = $coordinates[0];
        $this->coordinates[1] = $coordinates[1];
        return $this;
    }
}