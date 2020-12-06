<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes;


use App\DesignPatterns\Structural\Bridge\Entities\Category;

class WidgetMiddleCategory extends WidgetAbstract
{
    public function run(Category $category)
    {
        $viewData = $this->getRealizationLogic($category);

        $this->viewLogic($viewData);
    }

    private function getRealizationLogic(Category $category)
    {
        $id = $category->id;
        $middleTitle = $category->id . '->' . $category->title;
        $description = $category->description;

        return compact('id', 'middleTitle', 'description');
    }
}
