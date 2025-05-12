<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Controller\GetClaimsByUserController;
use App\DTO\GetClaimsByUserInput;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
// #[ApiResource]
#[ApiResource(
    formats: ['jsonld', 'json'],
    // operations: [
    //     new Post(
    //         denormalizationContext: ['groups' => ['user:write']],
    //     )
    // ],
    normalizationContext: ['groups' => ['users:read']],
    denormalizationContext: ['groups' => ['users:write']]
)]
#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/claims/by_user',
            controller: GetClaimsByUserController::class,
            // input: GetClaimsByUserInput::class,
            // name: 'get_claims_by_user',
            // openapiContext: [
            //     'parameters' => [
            //         [
            //             'name' => 'email',
            //             'in' => 'query',
            //             'required' => true,
            //             'schema' => [
            //                 'type' => 'string',
            //                 'format' => 'email'
            //             ]
            //         ]
            //     ]
            // ]
        )
    ]
)]
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    #[Groups(['users:read'])]
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    #[Groups(['users:read'])]
    private ?\DateTime $createdAt = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    #[Groups(['users:read'])]
    private ?\DateTime $updatedAt = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Roles", inversedBy="users")
     * @ORM\JoinTable(name="user_roles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="roles_id", referencedColumnName="id")
     *   }
     * )
     */
    private $roles = array();

    // /**
    //  *@Groups({"users:read"})
    //  * @ORM\OneToOne(targetEntity="AccountInformations", mappedBy="users", cascade={"persist", "remove"})
    //  */
    // private ?AccountInformations $accountInformation = null;

    // /**
    //  * @ORM\OneToOne(targetEntity="AccountInformations", mappedBy="users")
    //  *@Groups({"users:read"})
    //  */
    // private ?AccountInformations $accountInformation;

    /**
     * @var AccountInformations|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\AccountInformations", mappedBy="users", cascade={"persist", "remove"})
     */
    #[Groups(['users:read'])]
    private ?AccountInformations $accountInformation = null;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime(); // Initialise avec la date courante
        $this->updatedAt = new \DateTime(); // Initialise avec la date courante
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Roles>
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Roles $role): static
    {
        if (!$this->roles->contains($role)) {
            $this->roles->add($role);
        }

        return $this;
    }

    public function removeRole(Roles $role): static
    {
        $this->roles->removeElement($role);

        return $this;
    }

    // public function getAccountInformations(): ?AccountInformations
    // {
    //     return $this->accountInformation;
    // }

    // public function setAccountInformations(?AccountInformations $accountInformation): self
    // {
    //     $this->accountInformation = $accountInformation;

    //     return $this;
    // }

    public function getAccountInformations(): ?AccountInformations
    {
        return $this->accountInformation;
    }

    public function setAccountInformations(?AccountInformations $accountInformation): self
    {
        // On évite les boucles infinies
        if ($this->accountInformation === $accountInformation) {
            return $this;
        }

        // On nettoie l'ancienne relation
        if ($this->accountInformation !== null) {
            $temp = $this->accountInformation;
            $this->accountInformation = null;
            $temp->setUsers(null);
        }

        // On définit la nouvelle relation
        $this->accountInformation = $accountInformation;

        // On définit la relation inverse
        if ($accountInformation !== null) {
            $accountInformation->setUsers($this);
        }

        return $this;
    }

}
