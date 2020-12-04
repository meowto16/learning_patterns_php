<?php


namespace App\DesignPatterns\Creational\Multiton;


class SimpleMultitonNext extends SimpleMultiton
{
    protected static $instances = [];

    /**
     * @var
     */
    public $test2;
}
