<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes;


use App\DesignPatterns\Structural\Bridge\Entities\Category;
use Illuminate\Support\Str;

class WidgetSmallCategory extends WidgetAbstract
{
    public function run(Category $category)
    {
        $viewData = $this->getRealizationLogic($category);

        $this->viewLogic($viewData);
    }

    private function getRealizationLogic(Category $category)
    {
        $id = $category->id;
        $smallTitle = Str::limit($category->title, 7);
        $description = $category->description;

        return compact('id', 'smallTitle', 'description');
    }
}
