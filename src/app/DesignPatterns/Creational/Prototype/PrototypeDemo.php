<?php


namespace App\DesignPatterns\Creational\Prototype;


use Carbon\Carbon;

class PrototypeDemo
{
    public function run()
    {
        $client = new Client(2, 'Клиент');

        $delieveryDt = Carbon::parse('31.12.2030 15:00:00');
        $order = new Order(11, $delieveryDt, $client);

        $client->addOrder($order);

        $clonedOrder = clone $order;
        $clonedOrder->delieveryDt->addDay();

        return compact('client', 'order', 'clonedOrder');
    }
}
