<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartsDetails
 *
 * @ORM\Table(name="Parts_details")
 * @ORM\Entity
 */
class PartsDetails
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
     * @ORM\Column(name="part_name", type="string", length=45, nullable=true)
     */
    private $partName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="availability", type="string", length=45, nullable=true, options={"default"="yes"})
     */
    private $availability = 'yes';

    /**
     * @var string|null
     *
     * @ORM\Column(name="quality", type="string", length=45, nullable=true, options={"default"="Genuine"})
     */
    private $quality = 'Genuine';

    /**
     * @var float|null
     *
     * @ORM\Column(name="cost", type="float", precision=53, scale=0, nullable=true)
     */
    private $cost;

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


}
