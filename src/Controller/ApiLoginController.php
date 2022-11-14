<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login')]
    public function index(): Response
    {
        $user = $this->getUser();
        if (null === $user) {
                        return $this->json([
                             'message' => 'vide',
                        ], Response::HTTP_UNAUTHORIZED);
                     }
        return $this->json([
            'user'  => $user->getUserIdentifier(),
                        //'token' => $token,
        ]);
    }
}