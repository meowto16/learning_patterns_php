<?php


namespace App\DesignPatterns\Structural\Adapter\Classes;


use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryInterface;

class MediaLibraryAdapter implements MediaLibraryInterface
{
    /**
     * @var MediaLibraryThirdParty
     */
    private $adapterObj;

    public function __construct()
    {
        $this->adapterObj = new MediaLibraryThirdParty();
    }

    public function upload($pathToFile): string
    {
        return $this->adapterObj->addMedia($pathToFile);
    }

    public function get($fileCode): string
    {
        return $this->adapterObj->getMedia($fileCode);
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this->adapterObj, $name)) {
            // return $this->adapterObj->$name($arguments);
            return call_user_func_array([$this->adapterObj, $name], $arguments);
        } else {
            throw new \Exception("Метод {$name} не найден");
        }
    }
}
