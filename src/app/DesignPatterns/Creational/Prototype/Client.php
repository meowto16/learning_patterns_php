<?php


namespace App\DesignPatterns\Creational\Prototype;


/**
 * Class Client
 * @package App\DesignPatterns\Creational\Prototype
 */
class Client
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    private $orders;

    /**
     * Client constructor.
     *
     * @param int $id
     * @param string $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @param Order $order
     */
    public function addOrder(Order $order)
    {
        $this->orders[$order->id] = $order;
    }
}
