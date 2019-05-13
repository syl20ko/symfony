<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CategoryRepository;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categorie/{id}", name="category_show")
     */
    public function index($id,CategoryRepository $repo)
    {
        $category = $repo->findOneById($id); 

        return $this->render('category/category.html.twig', [
            'category' => $category,
        ]);
    }
}
