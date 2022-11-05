<?php

namespace App\Controller;

use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]

    // verification of inheritance implementation 
    public function index(ObjectManager $manager): Response  
     {        
        $client = new Client();
        $client->setName("yvan") //user's property
                ->setEmail("ssmyvan01@gmail.com")    // user's property       
                ->setPrenom("soro") // client's own property           
                ->setSolde(1000); // subUser property 

         $manager->persist($client);
         $manager->flush();
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
