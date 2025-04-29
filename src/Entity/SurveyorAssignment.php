<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SurveyorAssignment
 *
 * @ORM\Table(name="Surveyor_Assignment", indexes={@ORM\Index(name="fk_Surveyor_Assigment_Users1_idx", columns={"user_id"}), @ORM\Index(name="fk_Surveyor_Assigment_Garages1_idx", columns={"garage_id"}), @ORM\Index(name="fk_Surveyor_Assigment_Spare_parts1_idx", columns={"spare_parts_id"}), @ORM\Index(name="IDX_95DF48917096A49F", columns={"claim_id"})})
 * @ORM\Entity
 */
class SurveyorAssignment
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
     * @ORM\Column(name="assignment_date", type="datetime", nullable=true)
     */
    private $assignmentDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="assignment_notes", type="string", length=250, nullable=true)
     */
    private $assignmentNotes;

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
     * @var \Garages
     *
     * @ORM\ManyToOne(targetEntity="Garages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="garage_id", referencedColumnName="id")
     * })
     */
    private $garage;

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
