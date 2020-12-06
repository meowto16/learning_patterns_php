<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Structural\Adapter\Classes\MediaLibraryAdapter;
use App\DesignPatterns\Structural\Adapter\Classes\MediaLibrarySelfWritten;
use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryInterface;
use Illuminate\Http\Request;

class StructuralPatternsController extends Controller
{
    public function Adapter() {

        /** @var MediaLibraryInterface $mediaLibrary */
//        $mediaLibrary = app(MediaLibrarySelfWritten::class);
//        $mediaLibrary = app(MediaLibraryAdapter::class);
        
        $mediaLibrary = app(MediaLibraryInterface::class);

        $result[] = $mediaLibrary->upload('ImageFile');
        $result[] = $mediaLibrary->get('ImageFile');

        return view('welcome', ['pattern' => __FUNCTION__]);
    }
}
