<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GarageAssignment
 *
 * @ORM\Table(name="Garage_Assignment", indexes={@ORM\Index(name="fk_Garage_Assigment_Users1_idx", columns={"user_id"}), @ORM\Index(name="fk_Garage_Assigment_Surveyors1_idx", columns={"surveyor_id"}), @ORM\Index(name="fk_Garage_Assigment_Spare_parts1_idx", columns={"spare_parts_id"}), @ORM\Index(name="IDX_283F30967096A49F", columns={"claim_id"})})
 * @ORM\Entity
 */
class GarageAssignment
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

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
     * @var \SpareParts
     *
     * @ORM\ManyToOne(targetEntity="SpareParts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spare_parts_id", referencedColumnName="id")
     * })
     */
    private $spareParts;


}
