<?php


namespace App\DesignPatterns\Creational\ObjectPool;


use App\DesignPatterns\Creational\ObjectPool\Interfaces\ObjectPullableInterface;
use App\DesignPatterns\Creational\Singleton\SingletonTrait;

class ObjectPool
{
    use SingletonTrait;

    /**
     * @var array
     */
    private $clones = [];

    /**
     * @var array
     */
    private $prototypes = [];

    /**
     * @param ObjectPullableInterface $obj
     *
     * @return $this
     */
    public function addObject(ObjectPullableInterface $obj)
    {
        $key = $this->getObjKey($obj);
        $this->prototypes[$key] = $obj;

        return $this;
    }

    /**
     * @param object|string $obj
     *
     * @return string
     */
    private function getObjKey($obj)
    {
        if (is_object($obj)) {
            $key = get_class($obj);
        } elseif (is_string($obj)) {
            $key = $obj;
        } else {
            throw new Exception('???');
        }

        return $key;
    }

    /**
     * @param string $className
     *
     * @return bool|null
     */
    public function getObject(string $className)
    {
        $key = $this->getObjKey($className);

        if (isset($this->clones[$key])) {
            return false;
        }

        if (empty($this->prototypes[$key])) {
            return null;
        }

        $this->clones[$key] = clone $this->prototypes[$key];

        return $this->clones[$key];
    }

    /**
     * @param ObjectPullableInterface $obj
     */
    public function release(ObjectPullableInterface &$obj)
    {
        $key = $this->getObjKey($obj);
        unset($this->clones[$key]);
        $obj = null;
    }
}
