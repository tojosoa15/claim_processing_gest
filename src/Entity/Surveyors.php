<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Surveyors
 *
 * @ORM\Table(name="Surveyors", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Surveyors_Users1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Surveyors
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
     * @ORM\Column(name="business_name", type="string", length=255, nullable=true)
     */
    private $businessName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="business_registration_number", type="string", length=255, nullable=true)
     */
    private $businessRegistrationNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="business_address", type="string", length=255, nullable=true)
     */
    private $businessAddress;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


}
