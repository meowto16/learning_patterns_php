<?php

namespace App\DesignPatterns\Structural\Bridge\WithoutBridge;

use App\DesignPatterns\Structural\Bridge\Entities\Category;
use App\DesignPatterns\Structural\Bridge\Entities\Product;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetBigCategory;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetBigProduct;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetMiddleCategory;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetMiddleProduct;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetSmallCategory;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetSmallProduct;

class WithoutBridgeDemo
{
    public function run()
    {
        $product = new Product();
        (new WidgetBigProduct())->run($product);
        (new WidgetMiddleProduct())->run($product);
        (new WidgetSmallProduct())->run($product);

        $category = new Category();
        (new WidgetBigCategory())->run($category);
        (new WidgetMiddleCategory())->run($category);
        (new WidgetSmallCategory())->run($category);
    }
}
