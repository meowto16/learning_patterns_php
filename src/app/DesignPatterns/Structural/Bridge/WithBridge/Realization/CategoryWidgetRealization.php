<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Realization;


use App\DesignPatterns\Structural\Bridge\Entities\Category;
use App\DesignPatterns\Structural\Bridge\WithBridge\Interfaces\WidgetRealizationInterface;

class CategoryWidgetRealization implements WidgetRealizationInterface
{
    private $entity;

    public function __construct(Category $entity)
    {
        $this->entity = $entity;
    }

    public function getId()
    {
        return $this->entity->id;
    }

    public function getTitle()
    {
        return $this->entity->title;
    }

    public function getDescription()
    {
        return $this->entity->description;
    }
}
