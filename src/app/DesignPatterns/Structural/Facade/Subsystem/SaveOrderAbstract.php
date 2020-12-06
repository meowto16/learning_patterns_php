<?php

namespace App\DesignPatterns\Structural\Facade\Subsystem;

use App\DesignPatterns\Structural\Facade\Classes\Order;

abstract class SaveOrderAbstract
{
    /**
     * @var Order
     */
    protected $order;

    /**
     * @var array
     */
    protected $data;

    public function __construct(Order $order, array $data)
    {
        $this->order = $order;

        $this->data = $data;
    }

    public function run()
    {
        \Debugbar::info(static::class);
    }
}
