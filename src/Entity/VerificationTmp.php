<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VerificationTmp
 *
 * @ORM\Table(name="Verification_Tmp", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Verification_Tmp_Surveyors1_idx", columns={"surveyor_id"}), @ORM\Index(name="fk_Verification_Tmp_Survey_Type1_idx", columns={"survey_type_id"}), @ORM\Index(name="fk_Verification_Tmp_Communication_Methods1_idx", columns={"communication_methods_id"}), @ORM\Index(name="fk_Verification_Tmp_Vehicle_Condition1_idx", columns={"vehicle_condition_id"}), @ORM\Index(name="fk_Verification_Tmp_Claims1_idx", columns={"Claims_id"})})
 * @ORM\Entity
 */
class VerificationTmp
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
     * @var \Surveyors
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Surveyors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="surveyor_id", referencedColumnName="id")
     * })
     */
    private $surveyor;

    /**
     * @var \SurveyType
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="SurveyType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="survey_type_id", referencedColumnName="id")
     * })
     */
    private $surveyType;

    /**
     * @var \CommunicationMethods
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CommunicationMethods")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="communication_methods_id", referencedColumnName="id")
     * })
     */
    private $communicationMethods;

    /**
     * @var \VehicleCondition
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="VehicleCondition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vehicle_condition_id", referencedColumnName="id")
     * })
     */
    private $vehicleCondition;

    /**
     * @var \Claims
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Claims")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Claims_id", referencedColumnName="id")
     * })
     */
    private $claims;


}
