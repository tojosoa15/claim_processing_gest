<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BankAccounts
 *
 * @ORM\Table(name="Bank_Accounts", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class BankAccounts
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
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_name", type="string", length=255, nullable=false)
     */
    private $bankName;

    /**
     * @var string
     *
     * @ORM\Column(name="account_number", type="string", length=255, nullable=false)
     */
    private $accountNumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", inversedBy="bankAccount")
     * @ORM\JoinTable(name="user_has_account",
     *   joinColumns={
     *     @ORM\JoinColumn(name="bank_account_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   }
     * )
     */
    private $user = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
