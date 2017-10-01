<?php declare(strict_types=1);

namespace App;

class Logger
{
    public function single(array $args)
    {
        foreach ($args as $key => $value) {
            echo $key . ' ' . $value . "\n";
        }
    }
}
