<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffreController extends AbstractController
{
    /**
     * @Route("/offres", name="offres")
     */
    public function list(OffreRepository $offres)
    {
        return $this->render('offre/list.html.twig', [
            'offres' => $offres->findAll(),
        ]);
    }
}
