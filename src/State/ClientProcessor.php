<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ClientProcessor implements ProcessorInterface
{
  
    public function __construct(private UserPasswordHasherInterface $hasher, private ObjectManager $manager, 
    //private ProcessorInterface $persistProcessor
    
    //ContextAwareDataPersisterInterface $decorated
    ){
       
    }
   

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
       
        $data->setPassword($this->hasher->hashPassword($data,$data->getPassword()));
        $data->setRoles(['ROLE_USER']);
        $this->manager->persist($data);
        $this->manager->flush();      
        
        return $data;
    }
}
