<?php


namespace App\DesignPatterns\Creational\Multiton;


class SimpleMultiton implements MultitonInterface
{
    use MultitonTrait;

    /**
     * @var string;
     */
    private $test;

    /**
     * @param $value
     *
     * @return $this
     */
    public function setTest($value)
    {
        $this->test = $value;

        return $this;
    }
}
