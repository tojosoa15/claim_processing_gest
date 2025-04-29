<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LabourDetails
 *
 * @ORM\Table(name="Labour_details", indexes={@ORM\Index(name="fk_Labour_details_Parts_details1_idx", columns={"Parts_details_id"})})
 * @ORM\Entity
 */
class LabourDetails
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
     * @ORM\Column(name="activity", type="string", length=250, nullable=true)
     */
    private $activity;

    /**
     * @var int|null
     *
     * @ORM\Column(name="num_of_hours", type="integer", nullable=true)
     */
    private $numOfHours;

    /**
     * @var float|null
     *
     * @ORM\Column(name="painting_cost", type="float", precision=53, scale=0, nullable=true)
     */
    private $paintingCost;

    /**
     * @var float|null
     *
     * @ORM\Column(name="painting_material", type="float", precision=53, scale=0, nullable=true)
     */
    private $paintingMaterial;

    /**
     * @var float|null
     *
     * @ORM\Column(name="painting_labour", type="float", precision=53, scale=0, nullable=true)
     */
    private $paintingLabour;

    /**
     * @var float|null
     *
     * @ORM\Column(name="sundries", type="float", precision=53, scale=0, nullable=true)
     */
    private $sundries;

    /**
     * @var float|null
     *
     * @ORM\Column(name="discount", type="float", precision=53, scale=0, nullable=true)
     */
    private $discount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="VAT", type="smallint", nullable=true)
     */
    private $vat = '0';

    /**
     * @var float|null
     *
     * @ORM\Column(name="total", type="float", precision=53, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var \PartsDetails
     *
     * @ORM\ManyToOne(targetEntity="PartsDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Parts_details_id", referencedColumnName="id")
     * })
     */
    private $partsDetails;


}
