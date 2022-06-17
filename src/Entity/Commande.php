<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroCommande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeCommande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCommande;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $relicat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="commandes",cascade={"persist"})
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commande",cascade={"persist"})
     */
    private $user;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCommande(): ?string
    {
        return $this->numeroCommande;
    }

    public function setNumeroCommande(string $numeroCommande): self
    {
        $this->numeroCommande = $numeroCommande;

        return $this;
    }

    public function getTypeCommande(): ?string
    {
        return $this->typeCommande;
    }

    public function setTypeCommande(string $typeCommande): self
    {
        $this->typeCommande = $typeCommande;

        return $this;
    }

    public function getNomCommande(): ?string
    {
        return $this->nomCommande;
    }

    public function setNomCommande(string $nomCommande): self
    {
        $this->nomCommande = $nomCommande;

        return $this;
    }


    public function getAvance(): ?string
    {
        return $this->avance;
    }

    public function setAvance(?string $avance): self
    {
        $this->avance = $avance;

        return $this;
    }

    public function getRelicat(): ?string
    {
        return $this->relicat;
    }

    public function setRelicat(?string $relicat): self
    {
        $this->relicat = $relicat;

        return $this;
    }

    public function getDateCommande(): ?string
    {
        return $this->dateCommande;
    }

    public function setDateCommande(string $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
