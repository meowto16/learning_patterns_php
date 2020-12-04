<?php

namespace App\DesignPatterns\Creational\Builder;

use App\DesignPatterns\Creational\Builder\Interfaces\BlogPostBuilderInterface;

class BlogPostManager
{
    /**
     * @var BlogPostBuilderInterface
     */
    private $builder;

    /**
     * @param BlogPostBuilderInterface $builder
     *
     * @return $this
     */
    public function setBuilder(BlogPostBuilderInterface $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @return Classes\BlogPost
     */
    public function createCleanPost()
    {
        $blogPost = $this->builder->getBlogPost();

        return $blogPost;
    }

    /**
     * @return Classes\BlogPost
     */
    public function createNewPostIt()
    {
        $blogPost = $this->builder
            ->setTitle('Новый пост про IT')
            ->setBody('Новый пост про IT....')
            ->setCategories([
                'категория_it',
            ])
            ->setTags([
                'tag_it',
                'tag_programming'
            ])
            ->getBlogPost();

        return $blogPost;
    }

    /**
     * @return Classes\BlogPost
     */
    public function createNewPostCats()
    {
        $blogPost = $this->builder
            ->setTitle('Новый пост про кошек')
            ->setCategories([
                'категория_кошки',
                'категория_питомцы'
            ])
            ->setTags([
                'tag_cats',
                'tag_pets'
            ])
            ->getBlogPost();

        return $blogPost;
    }
}
