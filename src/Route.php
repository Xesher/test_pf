<?php declare(strict_types=1);

namespace App;

class Route
{
    /**
     * @param array $pointOne
     * @param array $pointTwo
     * @return float
     */
    function lengthVector(array $pointOne, array $pointTwo)
    {
        return round(sqrt(pow(($pointTwo[0] - $pointOne[0]), 2) + pow(($pointTwo[1] - $pointOne[1]), 2)), 2);
    }

    /**
     * @param $orders
     */
    public function delivery($orders)
    {
        $a = [0, '-'];
        $b = [9999, '-'];
        $c = [9999, '-'];
        $d = [9999, '-'];

        $startPoint = [0, 0];
//        dot A
        $ab = $this->lengthVector($startPoint, $orders[0][0]->coordinates);
        $ac = $this->lengthVector($startPoint, $orders[0][1]->coordinates);
//        dot B
        $bc = $this->lengthVector($orders[0][0]->coordinates, $orders[0][1]->coordinates);
        $bd = $this->lengthVector($orders[0][0]->coordinates, $orders[0][2]->coordinates);
//        dot C
        $cb = $this->lengthVector($orders[0][1]->coordinates, $orders[0][0]->coordinates);
        $cd = $this->lengthVector($orders[0][1]->coordinates, $orders[0][2]->coordinates);
//        dot D
        $db = $this->lengthVector($orders[0][2]->coordinates, $orders[0][0]->coordinates);
        $dc = $this->lengthVector($orders[0][2]->coordinates, $orders[0][1]->coordinates);
//        echo('A=' . $ab . '/' . $ac . '/B=' . $bc . '/' . $bd . '/C=' . $cb . '/' . $cd . '/D=' . $db . '/' . $dc . '/');

    }
}
