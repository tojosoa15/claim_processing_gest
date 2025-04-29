<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SparePartAssignment
 *
 * @ORM\Table(name="Spare_Part_Assignment", indexes={@ORM\Index(name="fk_Spare_part_Assigment_Garages1_idx", columns={"garage_id"}), @ORM\Index(name="fk_Spare_part_Assigment_Users1_idx", columns={"user_id"}), @ORM\Index(name="fk_Spare_part_Assigment_Surveyors1_idx", columns={"surveyor_id"}), @ORM\Index(name="IDX_EE0C4DE97096A49F", columns={"claim_id"})})
 * @ORM\Entity
 */
class SparePartAssignment
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date", type="string", length=45, nullable=true)
     */
    private $date;

    /**
     * @var \Claims
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Claims")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="claim_id", referencedColumnName="id")
     * })
     */
    private $claim;

    /**
     * @var \Users
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Surveyors
     *
     * @ORM\ManyToOne(targetEntity="Surveyors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="surveyor_id", referencedColumnName="id")
     * })
     */
    private $surveyor;

    /**
     * @var \Garages
     *
     * @ORM\ManyToOne(targetEntity="Garages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="garage_id", referencedColumnName="id")
     * })
     */
    private $garage;


}
