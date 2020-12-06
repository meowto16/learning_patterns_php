<?php


namespace App\DesignPatterns\Structural\Adapter\Interfaces;


/**
 * Interface MediaLibraryThirdPartyInterface
 * @package App\DesignPatterns\Structural\Adapter\Interfaces
 */
interface MediaLibraryThirdPartyInterface
{
    /**
     * @param $pathToFile
     *
     * @return mixed
     */
    public function addMedia($pathToFile): string;

    /**
     * @param $fileCode
     * @return string
     */
    public function getMedia($fileCode): string;
}
