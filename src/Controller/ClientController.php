<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]

    // verification of inheritance implementation 
    public function index(ObjectManager $manager,UserPasswordHasherInterface $hasher): Response  
     {        
        $client = new Client();
    
        $client->setName("yvan") //user's property
                ->setEmail("ssmyvan01@gmail.com")    // user's property       
                ->setPrenom("soro") // client's own property           
                ->setSolde(1000)
                ->setPassword($hasher->hashPassword($client,"21155444"));// subUser property 

         $manager->persist($client);
         $manager->flush();
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
