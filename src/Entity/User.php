<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"username":"exact"})
 * @ApiResource(
 *  routePrefix="/aulaamas",
 *  collectionOperations={"POST","GET"},
 *  itemOperations={"PUT", "GET"},
 *  normalizationContext={"groups"={"User:read"}},
 *  denormalizationContext={"groups"={"User:write"}},
 * )
 * @UniqueEntity("telephone")
 */   
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"User:read"})
     * @Groups({"Commande:read"})
     * @Groups({"Commande:write"})
     * @Groups({"Depense:read"})
     * @Groups({"Depense:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true, nullable=true)
     * @Groups({"User:write"})
     * @Groups({"Depense:read"})
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     * @Groups({"User:write"})
     * @Groups({"Depense:read"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"User:write"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     * @Groups({"Commande:read"})
     * @Groups({"Depense:read"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     * @Groups({"Commande:read"})
     * @Groups({"Depense:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     * @Groups({"Commande:read"})
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $mancheClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $epauleClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $couClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $longueurBrasClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $longueurPantalonClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $cuisseClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $hancheClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $tourDeBrasClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $tourDeTailleClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $mancheProtrineClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $ceintureClient;

    /**
     * @ORM\OneToMany(targetEntity=Depense::class, mappedBy="user")
     */
    private $depense;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="user")
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $commande;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $poignetMachetClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"User:read"})
     * @Groups({"User:write"})
     */
    private $BrasClient;

    /**
     * @ORM\OneToMany(targetEntity=Model::class, mappedBy="user")
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $basClient;

    public function __construct()
    {
        $this->depense = new ArrayCollection();
        $this->commande = new ArrayCollection();
        $this->model = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEpaule(): ?string
    {
        return $this->epaule;
    }

    public function setEpaule(?string $epaule): self
    {
        $this->epaule = $epaule;

        return $this;
    }

    public function getMancheClient(): ?string
    {
        return $this->mancheClient;
    }

    public function setMancheClient(?string $mancheClient): self
    {
        $this->mancheClient = $mancheClient;

        return $this;
    }

    public function getEpauleClient(): ?string
    {
        return $this->epauleClient;
    }

    public function setEpauleClient(?string $epauleClient): self
    {
        $this->epauleClient = $epauleClient;

        return $this;
    }

    public function getCouClient(): ?string
    {
        return $this->couClient;
    }

    public function setCouClient(?string $couClient): self
    {
        $this->couClient = $couClient;

        return $this;
    }

    public function getLongueurBrasClient(): ?string
    {
        return $this->longueurBrasClient;
    }

    public function setLongueurBrasClient(?string $longueurBrasClient): self
    {
        $this->longueurBrasClient = $longueurBrasClient;

        return $this;
    }

    public function getLongueurPantalonClient(): ?string
    {
        return $this->longueurPantalonClient;
    }

    public function setLongueurPantalonClient(?string $longueurPantalonClient): self
    {
        $this->longueurPantalonClient = $longueurPantalonClient;

        return $this;
    }

    public function getCuisseClient(): ?string
    {
        return $this->cuisseClient;
    }

    public function setCuisseClient(?string $cuisseClient): self
    {
        $this->cuisseClient = $cuisseClient;

        return $this;
    }

    public function getHancheClient(): ?string
    {
        return $this->hancheClient;
    }

    public function setHancheClient(?string $hancheClient): self
    {
        $this->hancheClient = $hancheClient;

        return $this;
    }

    public function getTourDeBrasClient(): ?string
    {
        return $this->tourDeBrasClient;
    }

    public function setTourDeBrasClient(?string $tourDeBrasClient): self
    {
        $this->tourDeBrasClient = $tourDeBrasClient;

        return $this;
    }

    public function getTourDeTailleClient(): ?string
    {
        return $this->tourDeTailleClient;
    }

    public function setTourDeTailleClient(?string $tourDeTailleClient): self
    {
        $this->tourDeTailleClient = $tourDeTailleClient;

        return $this;
    }

    public function getMancheProtrine(): ?string
    {
        return $this->mancheProtrine;
    }

    public function setMancheProtrine(?string $mancheProtrine): self
    {
        $this->mancheProtrine = $mancheProtrine;

        return $this;
    }

    public function getMancheProtrineClient(): ?string
    {
        return $this->mancheProtrineClient;
    }

    public function setMancheProtrineClient(?string $mancheProtrineClient): self
    {
        $this->mancheProtrineClient = $mancheProtrineClient;

        return $this;
    }

    public function getCeintureClient(): ?string
    {
        return $this->ceintureClient;
    }

    public function setCeintureClient(?string $ceintureClient): self
    {
        $this->ceintureClient = $ceintureClient;

        return $this;
    }

    /**
     * @return Collection<int, Depense>
     */
    public function getDepense(): Collection
    {
        return $this->depense;
    }

    public function addDepense(Depense $depense): self
    {
        if (!$this->depense->contains($depense)) {
            $this->depense[] = $depense;
            $depense->setUser($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): self
    {
        if ($this->depense->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getUser() === $this) {
                $depense->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commande[] = $commande;
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commande->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }

    public function getPoignetMachetClient(): ?string
    {
        return $this->poignetMachetClient;
    }

    public function setPoignetMachetClient(?string $poignetMachetClient): self
    {
        $this->poignetMachetClient = $poignetMachetClient;

        return $this;
    }

    public function getBrasClient(): ?string
    {
        return $this->BrasClient;
    }

    public function setBrasClient(string $BrasClient): self
    {
        $this->BrasClient = $BrasClient;

        return $this;
    }

    /**
     * @return Collection<int, Model>
     */
    public function getModel(): Collection
    {
        return $this->model;
    }

    public function addModel(Model $model): self
    {
        if (!$this->model->contains($model)) {
            $this->model[] = $model;
            $model->setUser($this);
        }

        return $this;
    }

    public function removeModel(Model $model): self
    {
        if ($this->model->removeElement($model)) {
            // set the owning side to null (unless already changed)
            if ($model->getUser() === $this) {
                $model->setUser(null);
            }
        }

        return $this;
    }

    public function getBasClient(): ?string
    {
        return $this->basClient;
    }

    public function setBasClient(?string $basClient): self
    {
        $this->basClient = $basClient;

        return $this;
    }
}
