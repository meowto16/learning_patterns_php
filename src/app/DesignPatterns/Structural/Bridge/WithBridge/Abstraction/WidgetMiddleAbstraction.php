<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction;


use App\DesignPatterns\Structural\Bridge\WithBridge\Interfaces\WidgetRealizationInterface;

class WidgetMiddleAbstraction extends WidgetAbstract
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
        $middleTitle = $this->getMiddleTitle();
        $description = $this->getRealization()->getDescription();

        return compact('id', 'middleTitle', 'description');
    }

    private function getMiddleTitle()
    {
        return $this->getRealization()->getId()
            . '->'
            . $this->getRealization()->getTitle();
    }
}
