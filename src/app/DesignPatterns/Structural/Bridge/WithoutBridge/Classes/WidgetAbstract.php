<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes;


abstract class WidgetAbstract
{
    protected function viewLogic($viewData)
    {
        $method = class_basename(static::class) . '::' . __FUNCTION__;
        \Debugbar::info($method, $viewData);
    }
}
