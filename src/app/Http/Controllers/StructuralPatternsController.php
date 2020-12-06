<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Structural\Adapter\Classes\MediaLibraryAdapter;
use App\DesignPatterns\Structural\Adapter\Classes\MediaLibrarySelfWritten;
use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryInterface;
use App\DesignPatterns\Structural\Bridge\WithBridge\BridgeDemo;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\WithoutBridgeDemo;
use App\DesignPatterns\Structural\Facade\Classes\Order;
use App\DesignPatterns\Structural\Facade\OrderSaveFacade;
use App\DesignPatterns\Structural\Facade\Subsystem\OrderSaveDates;
use App\DesignPatterns\Structural\Facade\Subsystem\OrderSaveProducts;
use App\DesignPatterns\Structural\Facade\Subsystem\OrderSaveUsers;
use Illuminate\Http\Request;

class StructuralPatternsController extends Controller
{
    public function Adapter()
    {

        /** @var MediaLibraryInterface $mediaLibrary */
//        $mediaLibrary = app(MediaLibrarySelfWritten::class);
//        $mediaLibrary = app(MediaLibraryAdapter::class);

        $mediaLibrary = app(MediaLibraryInterface::class);

        $result[] = $mediaLibrary->upload('ImageFile');
        $result[] = $mediaLibrary->get('ImageFile');

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    /**
     * @param Request $request
     */
    public function saveOrder(Request $request)
    {
        // Не делай так
        $order = new Order();

        if ($request->has('client')) {
            $order->client = $request->get('client');
        }

        if ($request->has('recipient')) {
            $order->recipient = $request->get('recipient');
        }

        if ($request->has('delieveryDt')) {
            $order->delievery = $request->get('delieveryDt');
        }

        $order->save();
    }

    /**
     * @param Request $request
     */
    public function saveOrder2(Request $request)
    {
        // Так тоже не надо
        $order = new Order();

        (new OrderSaveProducts($order, $request))->run();

        (new OrderSaveDates($order, $request))->run();

        (new OrderSaveUsers($order, $request))->run();

        $order->save();
    }

    public function Facade()
    {
        $order = new Order();
        $data = request()->all();

        // Так уже более-менее
        (new OrderSaveFacade())->save($order, $data);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function Bridge()
    {
//        (new WithoutBridgeDemo())->run();
        (new BridgeDemo())->run();

        return view('welcome', ['pattern' => __FUNCTION__]);
    }
}
