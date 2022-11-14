<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admin`')]
class Admin extends User
{

   

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\OneToMany(mappedBy: 'adminId', targetEntity: Transaction::class)]
    private Collection $Transactions;

    public function __construct()
    {
        $this->Transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Transaction>
     */
    public function getTransactions(): Collection
    {
        return $this->Transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->Transactions->contains($transaction)) {
            $this->Transactions->add($transaction);
            $transaction->setAdminId($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->Transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getAdminId() === $this) {
                $transaction->setAdminId(null);
            }
        }

        return $this;
    }
}
