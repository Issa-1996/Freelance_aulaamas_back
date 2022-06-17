<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ModelRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *  routePrefix="/aulaamas",
 *  collectionOperations={"POST","GET"},
 *  itemOperations={"PUT", "GET"},
 *  normalizationContext={"groups"={"Model:read"}},
 *  denormalizationContext={"groups"={"Model:write"}},
 * )
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 */
class Model
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"Model:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Model:read"})
     * @Groups({"Model:write"})
     * @Groups({"Commande:read"})
     * @Groups({"User:read"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Model:read"})
     * @Groups({"Model:write"})
     * @Groups({"Commande:read"})
     * @Groups({"User:read"})
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Model:read"})
     * @Groups({"Model:write"})
     * @Groups({"Commande:read"})
     * @Groups({"User:read"})
     */
    private $descriptionModel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Model:read"})
     * @Groups({"Model:write"})
     * @Groups({"Commande:read"})
     * @Groups({"User:read"})
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="model")
     */
    private $commandes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"Model:read"})
     * @Groups({"Model:write"})
     * @Groups({"Commande:read"})
     * @Groups({"User:read"})
     */
    private $cathegorie;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="model")
     */
    private $user;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function getDescriptionModel(): ?string
    {
        return $this->descriptionModel;
    }

    public function setDescriptionModel(?string $descriptionModel): self
    {
        $this->descriptionModel = $descriptionModel;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(?string $images): self
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setModel($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getModel() === $this) {
                $commande->setModel(null);
            }
        }

        return $this;
    }

    public function getCathegorie(): ?string
    {
        return $this->cathegorie;
    }

    public function setCathegorie(?string $cathegorie): self
    {
        $this->cathegorie = $cathegorie;

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
