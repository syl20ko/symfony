<?php

namespace App\Listener;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;

class LoginListener {
  private $em;

  public function __construct(EntityManagerInterface $em) {
    $this->em = $em;
  }

  public function onSecurityAuthenticationSuccess(AuthenticationEvent $event) {
    $user = $event->getAuthenticationToken()->getUser();

    if ($user instanceof User) {
      $user->setLastLogin(new \Datetime());

      $this->em->persist($user);
      $this->em->flush();
    }
  }
}