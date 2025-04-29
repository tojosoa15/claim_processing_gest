<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Claims
 *
 * @ORM\Table(name="Claims", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Claims
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="received_date", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $receivedDate = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="string", length=255, nullable=true)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="registration_number", type="string", length=45, nullable=true)
     */
    private $registrationNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ageing", type="integer", nullable=true)
     */
    private $ageing = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;


}
