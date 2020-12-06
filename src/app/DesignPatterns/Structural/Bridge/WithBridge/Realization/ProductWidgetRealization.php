<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Realization;


use App\DesignPatterns\Structural\Bridge\Entities\Product;
use App\DesignPatterns\Structural\Bridge\WithBridge\Interfaces\WidgetRealizationInterface;

class ProductWidgetRealization implements WidgetRealizationInterface
{
    private $entity;

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function getId()
    {
        return $this->entity->id;
    }

    public function getTitle()
    {
        return $this->entity->name;
    }

    public function getDescription()
    {
        return $this->entity->description;
    }
}
