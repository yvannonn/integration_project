<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{

    // Transaction identifier
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;  
    // client_Id , is a foreign key
    
    #[ORM\Column(length: 255)]
    #[ORM\OneToOne(targetEntity: client::class)]
    #[ORM\JoinColumn(name: 'client', referencedColumnName: 'id')]    private ?int $client_id = null;

    #[ORM\Column]
    private ?float $montant = null;    

    //to choose transaction type : withdrawal or deposit
    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $compte_depot = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SubUsers $subUsers = null;

    #[ORM\ManyToOne(inversedBy: 'Transactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Admin $adminId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getSubUsers(): ?SubUsers
    {
        return $this->subUsers;
    }

    public function setSubUsers(?SubUsers $subUsers): self
    {
        $this->subUsers = $subUsers;

        return $this;
    }

    public function getAdminId(): ?Admin
    {
        return $this->adminId;
    }

    public function setAdminId(?Admin $adminId): self
    {
        $this->adminId = $adminId;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCompteDepot(): ?string
    {
        return $this->compte_depot;
    }

    public function setCompteDepot(string $compte_depot): self
    {
        $this->compte_depot = $compte_depot;

        return $this;
    }
}
