<?php

namespace App\Entity;

use App\Repository\HistoriqueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueRepository::class)]
class Historique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: Annonce::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'annonceId', referencedColumnName: 'id')]
    /*#[ORM\JoinColumn(nullable: false)]*/
    private ?Annonce $annonceId = null;

    #[ORM\OneToOne(targetEntity: Client::class, inversedBy: 'historique', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'ClientId', referencedColumnName: 'id')]
   /* #[ORM\JoinColumn(nullable: false)]*/
    private ?client $clientId = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonceId(): ?Annonce
    {
        return $this->annonceId;
    }

    public function setAnnonceId(?Annonce $annonceId): self
    {
        $this->annonceId = $annonceId;

        return $this;
    }

    public function getClientId(): ?client
    {
        return $this->clientId;
    }

    public function setClientId(client $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
