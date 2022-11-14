<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    #[Route('/inscription', name: 'auth_registration')]
    public function inscription(): Response
    {
      /*  return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);*/
    }
}
