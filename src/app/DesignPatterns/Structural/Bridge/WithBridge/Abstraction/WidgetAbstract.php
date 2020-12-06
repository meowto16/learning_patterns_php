<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction;


use App\DesignPatterns\Structural\Bridge\WithBridge\Interfaces\WidgetRealizationInterface;

abstract class WidgetAbstract
{
    protected $realization;

    /**
     * @return WidgetRealizationInterface
     */
    public function getRealization()
    {
        return $this->realization;
    }

    public function setRealization(WidgetRealizationInterface $realization)
    {
        $this->realization = $realization;
    }

    protected function viewLogic($viewData)
    {
        $method = class_basename(static::class) . '::' . __FUNCTION__;
        \Debugbar::info($method, $viewData);
    }
}
