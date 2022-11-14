<?php

namespace App\Entity;

use ApiPlatform\Metadata\Post;
use App\State\ClientProcessor;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource]
#[Post(processor:ClientProcessor::class)]
class Client extends SubUsers
{


    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    private ?Historique $historique = null;


    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getHistorique(): ?Historique
    {
        return $this->historique;
    }

    public function setHistorique(Historique $historique): self
    {
        // set the owning side of the relation if necessary
        if ($historique->getClientId() !== $this) {
            $historique->setClientId($this);
        }

        $this->historique = $historique;

        return $this;
    }
}
