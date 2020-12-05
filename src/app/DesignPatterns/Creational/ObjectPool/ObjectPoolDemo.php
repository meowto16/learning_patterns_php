<?php

namespace App\DesignPatterns\Creational\ObjectPool;

use App\DesignPatterns\Creational\ObjectPool\Objects\Calculator;
use App\DesignPatterns\Creational\ObjectPool\Objects\CreditCard;
use App\DesignPatterns\Creational\ObjectPool\Objects\User;

class ObjectPoolDemo
{
    /**
     * @var ObjectPool
     */
    private $objectPool;

    /**
     * objectPoolDemo constructor.
     */
    public function __construct()
    {
        $this->objectPool = ObjectPool::getInstance();

        $user = new User();
        $creditCard = new CreditCard();
        $calculator = new Calculator();

        $this->objectPool
            ->addObject($user)
            ->addObject($creditCard)
            ->addObject($calculator);
    }

    public function run()
    {
        //

        $creditCard = $this->objectPool->getObject(CreditCard::class);
        $creditCard->cardId = '1111 2222 3333 4444';
        $creditCard->cardHolder = 'CARD HOLDER';
        $creditCard->cardPwd = '123';

        $user = $this->objectPool->getObject(User::class);
        $user->name = 'USER NAME';

        $user2 = $this->objectPool->getObject(User::class);

        $this->objectPool->release($creditCard);
        $this->objectPool->release($user);

        $creditCard2 = $this->objectPool->getObject(CreditCard::class);
        $creditCard2->cardId = '7777 8888 7777 8888';
        $creditCard2->cardHolder = 'CARD HOLDER X';
        $creditCard2->cardPwd = '555';
    }
}
