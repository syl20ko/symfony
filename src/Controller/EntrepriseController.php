<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ArticleRepository;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/entreprise/{slug}", name="entreprise_show")
     */
    public function show($slug, EntrepriseRepository $repo, ArticleRepository $articlerepo)
    {
        $entreprise = $repo->findOneBySlug($slug);

        $article = $articlerepo->findByAuthor($entreprise);

        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise,
            'article' => $article
        ]);
    }
}
