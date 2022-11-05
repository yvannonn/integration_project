<?php

namespace App\Controller;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(ObjectManager $manager): Response
    {   
       
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
