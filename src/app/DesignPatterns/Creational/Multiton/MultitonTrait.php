<?php


namespace App\DesignPatterns\Creational\Multiton;


trait MultitonTrait
{
    /**
     * @var array
     */
    protected static $instances = [];

    /**
     * @var string
     */
    private $name;

    /**
     * Запрещаем прямое создание
     *
     * SingletonTrain constructor.
     */
    private function __construct()
    {
        //
    }

    /**
     * Запрещаем клонирование
     */
    private function __clone()
    {
        //
    }

    /**
     * Запрещаем десериализацию
     */
    private function __wakeup()
    {
        //
    }

    /**
     * @param string $instanceName
     *
     * @return MultitonInterface
     */
    public static function getInstance(string $instanceName): MultitonInterface
    {
        if (isset(static::$instances[$instanceName])) {
            return static::$instances[$instanceName];
        }

        static::$instances[$instanceName] = new static();
        static::$instances[$instanceName]->setName($instanceName);

        return static::$instances[$instanceName];
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setName($value)
    {
        $this->name = $value;

        return $this;
    }
}
