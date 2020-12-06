<?php


namespace App\DesignPatterns\Structural\Adapter\Classes;


use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryInterface;

class MediaLibrarySelfWritten implements MediaLibraryInterface
{
    /**
     * @inheritdoc
     */
    public function upload($pathToFile): string
    {
        \Debugbar::info(__METHOD__);

        return md5(__METHOD__ . $pathToFile);
    }

    /**
     * @inheritdoc
     */
    public function get($fileCode): string
    {
        \Debugbar::info(__METHOD__);

        return '';
    }
}
