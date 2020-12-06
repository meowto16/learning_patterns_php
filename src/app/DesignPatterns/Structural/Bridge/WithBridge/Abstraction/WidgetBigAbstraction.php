<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction;


use App\DesignPatterns\Structural\Bridge\WithBridge\Interfaces\WidgetRealizationInterface;

class WidgetBigAbstraction extends WidgetAbstract
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
        $fullTitle = $this->getFullTitle();
        $description = $this->getRealization()->getDescription();

        return compact('id', 'fullTitle', 'description');
    }

    private function getFullTitle()
    {
        return $this->getRealization()->getId()
            . '::::'
            . $this->getRealization()->getTitle();
    }
}
