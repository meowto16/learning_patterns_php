<?php


namespace App\DesignPatterns\Creational\Builder;


use App\DesignPatterns\Creational\Builder\Classes\BlogPost;
use App\DesignPatterns\Creational\Builder\Interfaces\BlogPostBuilderInterface;

class BlogPostBuilder implements BlogPostBuilderInterface
{
    /**
     * @var BlogPost
     */
    private $blogPost;

    public function __construct()
    {
        $this->create();
    }

    /**
     * @inheritdoc
     */
    public function create(): BlogPostBuilderInterface
    {
        $this->blogPost = new BlogPost();

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setTitle(string $val): BlogPostBuilderInterface
    {
        $this->blogPost->title = $val;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setBody(string $val): BlogPostBuilderInterface
    {
        $this->blogPost->body = $val;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setCategories(array $val): BlogPostBuilderInterface
    {
        $this->blogPost->categories = $val;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setTags(array $val): BlogPostBuilderInterface
    {
        $this->blogPost->tags = $val;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getBlogPost(): BlogPost
    {
        $result = $this->blogPost;
        $this->create();

        return $result;
    }
}
