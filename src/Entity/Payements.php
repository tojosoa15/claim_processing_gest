<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payements
 *
 * @ORM\Table(name="Payements", indexes={@ORM\Index(name="fk_Payement_Users1_idx", columns={"Users_id"}), @ORM\Index(name="fk_Payement_Claims1_idx", columns={"Claims_id"})})
 * @ORM\Entity
 */
class Payements
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_submited", type="datetime", nullable=true)
     */
    private $dateSubmited;

    /**
     * @var int|null
     *
     * @ORM\Column(name="invoice_number", type="integer", nullable=true)
     */
    private $invoiceNumber;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="payment_date", type="datetime", nullable=true)
     */
    private $paymentDate;

    /**
     * @var float|null
     *
     * @ORM\Column(name="claim_amount", type="float", precision=53, scale=0, nullable=true)
     */
    private $claimAmount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true)
     */
    private $status;

    /**
     * @var \Users
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Users_id", referencedColumnName="id")
     * })
     */
    private $users;

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
