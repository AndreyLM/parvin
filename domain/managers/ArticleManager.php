<?php

namespace domain\managers;

use domain\entities\Article;
use domain\entities\Meta;
use domain\forms\ArticleForm;
use domain\forms\MetaForm;
use domain\repositories\ArticleRepository;

class ArticleManager
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(ArticleForm $articleForm, MetaForm $metaForm)
    {
        $article = Article::create(
            $articleForm->category_id,
            $articleForm->title,
            $articleForm->content_into,
            $articleForm->content,
            $articleForm->slug,
            new Meta($metaForm->title, $metaForm->description, $metaForm->keywords));

        $this->repository->save($article);
    }

    public function edit(ArticleForm $articleForm, MetaForm $metaForm)
    {
        /*
         * @var domain\entities\Article $article
         * $category_id, $title, $slug, $content_intro, $content, $publishing_at, Meta $meta
         */

        $article = $this->repository->get($articleForm->id);

        $article->edit($articleForm->category_id,
            $articleForm->title,
            $articleForm->slug,
            $articleForm->content_into,
            $articleForm->content,
            $articleForm->publishing_at,
            new Meta($metaForm->title, $metaForm->description, $metaForm->keywords));

        $this->repository->save($article);
    }
}