<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="sell_order")
 */
class SellOrder
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="string", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $id;

    /**
     * @ORM\Column(type="date")
     *
     */
    protected $emission;

    /**
     * @ORM\ManyToOne(targetEntity="People", inversedBy="sellOrders")
     * @var People
     */
    protected $customer;

    /**
     * @ORM\OneToMany(targetEntity="ItemOrder", mappedBy="itemsOrder", cascade={"persist"})
     * @var ArrayCollection|ItemOrder[]
     */
    protected $itemOrder;

    /**
     * @ORM\Column(type="decimal", precision=2, options={"unsigned":true})
     */
    protected $total;

    public function __construct($id, $emission, $total)
    {
        $this->id        = $id;
        $this->emission  = $emission;
        $this->total     = $total;

        $this->customer  = new ArrayCollection;
        $this->itemOrder = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmission()
    {
        return $this->emission;
    }

    public function setEmission($emission)
    {
        $this->emission = $emission;
    }

    public function setCustomer(People $customer)
    {
        $this->customer = $customer;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setItemOrder(People $itemOrder)
    {
        $this->itemOrder = $itemOrder;
    }

    public function getItemOrder()
    {
        return $this->itemOrder;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
}