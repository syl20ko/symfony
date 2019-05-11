<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EntrepriseRepository $repo)
    {
        $entreprises= $repo->findAll();

        return $this->render('home/index.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }
}
