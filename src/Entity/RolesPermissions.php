<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolesPermissions
 *
 * @ORM\Table(name="Roles_permissions", indexes={@ORM\Index(name="IDX_E061D2B9C1B13392", columns={"Roles_id"}), @ORM\Index(name="IDX_E061D2B9515A375F", columns={"Permissions_id"})})
 * @ORM\Entity
 */
class RolesPermissions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \Roles
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Roles_id", referencedColumnName="id")
     * })
     */
    private $roles;

    /**
     * @var \Permissions
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Permissions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Permissions_id", referencedColumnName="id")
     * })
     */
    private $permissions;


}
