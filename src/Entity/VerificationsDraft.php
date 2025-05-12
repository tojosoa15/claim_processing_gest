<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VerificationsDraft
 *
 * @ORM\Table(name="verifications_draft", indexes={@ORM\Index(name="IDX_AFAC83B51EBA1364", columns={"surveyor_id"}), @ORM\Index(name="IDX_AFAC83B587B1A554", columns={"claims_id"})})
 * @ORM\Entity
 */
class VerificationsDraft
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="current_step", type="string", length=10, nullable=true)
     */
    private $currentStep;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="surveyor_id", referencedColumnName="id")
     * })
     */
    private $surveyor;

    /**
     * @var \Claims
     *
     * @ORM\ManyToOne(targetEntity="Claims")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="claims_id", referencedColumnName="id")
     * })
     */
    private $claims;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentStep(): ?string
    {
        return $this->currentStep;
    }

    public function setCurrentStep(?string $currentStep): static
    {
        $this->currentStep = $currentStep;

        return $this;
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

    public function getSurveyor(): ?Users
    {
        return $this->surveyor;
    }

    public function setSurveyor(?Users $surveyor): static
    {
        $this->surveyor = $surveyor;

        return $this;
    }

    public function getClaims(): ?Claims
    {
        return $this->claims;
    }

    public function setClaims(?Claims $claims): static
    {
        $this->claims = $claims;

        return $this;
    }


}
