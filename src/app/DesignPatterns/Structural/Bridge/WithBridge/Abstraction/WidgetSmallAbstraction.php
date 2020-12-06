<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction;


use App\DesignPatterns\Structural\Bridge\WithBridge\Interfaces\WidgetRealizationInterface;
use Illuminate\Support\Str;

class WidgetSmallAbstraction extends WidgetAbstract
{
    public function run(WidgetRealizationInterface $realization)
    {
        $this->setRealization($realization);

        $viewData = $this->getViewData();
        $this->viewLogic($viewData);
    }

    private function getViewData()
    {
        $id = $this->getRealization()->getId();
        $smallTitle = $this->getSmallTitle();

        return compact('id', 'smallTitle');
    }

    private function getSmallTitle()
    {
        return Str::limit($this->getRealization()->getTitle(), 5);
    }
}
