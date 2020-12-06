<?php


namespace App\DesignPatterns\Structural\Adapter\Classes;


use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryThirdPartyInterface;

/**
 * Class MediaLibraryThirdParty
 * @package App\DesignPatterns\Structural\Adapter\Classes
 */
class MediaLibraryThirdParty implements MediaLibraryThirdPartyInterface
{
    public function addMedia($pathToFile): string
    {
        \Debugbar::info(__METHOD__);

        return '';
    }

    public function getMedia($fileCode): string
    {
        \Debugbar::info(__METHOD__);

        return '';
    }


}
