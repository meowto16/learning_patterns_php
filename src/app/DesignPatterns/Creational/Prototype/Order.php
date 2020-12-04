<?php

namespace App\DesignPatterns\Creational\Prototype;

use Carbon\Carbon;

/**
 * Class Order
 * @package App\DesignPatterns\Creational\Prototype
 */
class Order
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var Carbon
     */
    public $delieveryDt;

    /**
     * @var Client
     */
    private $client;

    /**
     * Order constructor
     *
     * @param string $id
     * @param Carbon $delieveryDt
     * @param Client $client
     */
    public function __construct($id, Carbon $delieveryDt, Client $client)
    {
        $this->id = (string)$id;
        $this->delieveryDt = $delieveryDt;
        $this->client = $client;
    }

    public function __clone()
    {
        $this->id = $this->id . '_copy';
        $this->delieveryDt = $this->delieveryDt->copy();

        $this->client->addOrder($this);
    }
}
