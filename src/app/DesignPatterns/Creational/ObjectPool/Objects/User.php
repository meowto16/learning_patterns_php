<?php


namespace App\DesignPatterns\Creational\ObjectPool\Objects;


use App\DesignPatterns\Creational\ObjectPool\Interfaces\ObjectPullableInterface;

class User implements ObjectPullableInterface
{
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}
