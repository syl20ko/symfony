<?php

namespace App\Controller;

use App\Repository\DemandeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemandeController extends AbstractController
{
    /**
     * @Route("/demandes", name="demandes")
     */
    public function index(DemandeRepository $demandes)
    {
        return $this->render('demande/list.html.twig', [
            'demandes' => $demandes->findAll(),
        ]);
    }
}
