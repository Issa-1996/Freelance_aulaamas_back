<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ApiResource(
 *  routePrefix="/aulaamas",
 *  collectionOperations={"POST","GET"},
 *  itemOperations={"PUT", "GET"},
 *  normalizationContext={"groups"={"Commande:read"}},
 *  denormalizationContext={"groups"={"Commande:write"}},
 * )
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 * @UniqueEntity("numeroCommande")
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $numeroCommande;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $typeCommande;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $nomCommande;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $avance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $relicat;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="commandes",cascade={"persist"})
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commande",cascade={"persist"})
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $typeDeTissuClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $tailleTissuClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"User:read"})
     */
    private $couleurTissuClient;
    
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

    public function getTypeDeTissuClient(): ?string
    {
        return $this->typeDeTissuClient;
    }

    public function setTypeDeTissuClient(?string $typeDeTissuClient): self
    {
        $this->typeDeTissuClient = $typeDeTissuClient;

        return $this;
    }

    public function getTailleTissuClient(): ?string
    {
        return $this->tailleTissuClient;
    }

    public function setTailleTissuClient(?string $tailleTissuClient): self
    {
        $this->tailleTissuClient = $tailleTissuClient;

        return $this;
    }

    public function getCouleurTissuClient(): ?string
    {
        return $this->couleurTissuClient;
    }

    public function setCouleurTissuClient(?string $couleurTissuClient): self
    {
        $this->couleurTissuClient = $couleurTissuClient;

        return $this;
    }
}
