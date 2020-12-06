<?php


namespace App\DesignPatterns\Structural\Adapter\Interfaces;


/**
 * Interface MediaLibraryInterface
 * @package App\DesignPatterns\Structural\Adapter\Interfaces
 */
interface MediaLibraryInterface
{
    /**
     * @param $pathToFile
     * @return string
     */
    public function upload($pathToFile): string;

    /**
     * @param string $fileCode
     * @return string
     */
    public function get(string $fileCode): string;
}
