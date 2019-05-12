<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users_list")
     */
    public function index(UserRepository $repo)
    {
        $users = $repo->findAll();
        return $this->render('user/list.html.twig', [
            'users' => $users
        ]);
    }
}
