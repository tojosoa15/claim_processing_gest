<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SpareParts
 *
 * @ORM\Table(name="Spare_Parts", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Spare_parts_Users1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class SpareParts
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
     * @ORM\Column(name="shop", type="string", length=255, nullable=true)
     */
    private $shop;

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
