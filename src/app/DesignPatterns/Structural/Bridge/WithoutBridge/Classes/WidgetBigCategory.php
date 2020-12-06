<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes;


use App\DesignPatterns\Structural\Bridge\Entities\Category;

class WidgetBigCategory extends WidgetAbstract
{
    public function run(Category $category)
    {
        $viewData = $this->getRealizationLogic($category);

        $this->viewLogic($viewData);
    }

    private function getRealizationLogic(Category $category)
    {
        $id = $category->id;
        $fullTitle = $category->id . '::::' . $category->title;
        $description = $category->description;

        return compact('id', 'fullTitle', 'description');
    }
}
