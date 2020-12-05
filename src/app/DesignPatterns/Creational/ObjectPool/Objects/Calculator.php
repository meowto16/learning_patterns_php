<?php


namespace App\DesignPatterns\Creational\ObjectPool\Objects;


use App\DesignPatterns\Creational\ObjectPool\Interfaces\ObjectPullableInterface;

class Calculator implements ObjectPullableInterface
{
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}
