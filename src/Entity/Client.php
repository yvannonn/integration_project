<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
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
