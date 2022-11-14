<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Client;

use App\Entity\Entreprise;
use App\Entity\Transaction;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use App\Repository\SubUsersRepository;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: SubUsersRepository::class)]

#[InheritanceType('JOINED')]
#[DiscriminatorColumn(name: 'type', type: 'string')]
#[DiscriminatorMap(['subUsers' => SubUsers::class, 'client' => Client::class, 'entreprise' => Entreprise::class])]
abstract class SubUsers extends User
{

    #[ORM\Column]
    private ?float $solde = null;

    #[ORM\OneToMany(targetEntity: Transaction::class, mappedBy: 'subUsers')]
    private Collection $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * @return Collection<int, Transaction>
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions->add($transaction);
            $transaction->setSubUsers($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getSubUsers() === $this) {
                $transaction->setSubUsers(null);
            }
        }

        return $this;
    }
}
