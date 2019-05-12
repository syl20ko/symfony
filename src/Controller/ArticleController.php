<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/blog", name="list_article")
     */
    public function blog(ArticleRepository $repo)
    {   
        $articles = $repo->findAll();

        return $this->render('article/blog.html.twig', [
            'articles' => $articles,
        ]);
    }
    
    /**
     * @Route("/article/{slug}", name="show_article")
     */
    public function show($slug, ArticleRepository $repo)
    {
        $article = $repo->findOneBySlug($slug);

        return $this->render('article/show_article.html.twig' , [
            'article' => $article,
        ]);
    }
}
