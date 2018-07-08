<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
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
     * @ORM\Column(type="string", unique=true)
     */
    protected $code;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $name;


    /**
     * @ORM\OneToMany(targetEntity="ItemOrder", mappedBy="itemOrder", cascade={"persist"})
     * @var ArrayCollection|ItemOrder[]
     */
    protected $itemsOrder;

    /**
     * @ORM\Column(type="decimal", precision=2, options={"unsigned":true})
     */
    protected $price;

    public function __construct($id, $code, $name, $price)
    {
        $this->id        = $id;
        $this->code      = $code;
        $this->name      = $name;
        $this->price     = $price;

        $this->itemsOrder = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function addItemOrder(ItemOrder $itemsOrder)
    {
        if(!$this->itemsOrders->contains($itemsOrder)) {
            $itemsOrder->setItemOrder($this);
            $this->itemsOrders->add($itemsOrder);
        }
    }

    public function getItemOrder()
    {
        return $this->itemsOrders;
    }
}