<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entities\SellOrder;

/**
 * @ORM\Entity
 * @ORM\Table(name="people")
 */
class People
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
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="date")
     */
    protected $birthday;

    /**
     * @ORM\OneToMany(targetEntity="SellOrder", mappedBy="customer", cascade={"persist"})
     * @var ArrayCollection|SellOrder[]
     */
    protected $sellOrders;

    public function __construct($id, $name, $birthday)
    {
        $this->id        = $id;
        $this->name      = $name;
        $this->birthday  = $birthday;

        $this->sellOrders = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function addSellOrder(SellOrder $sellOrder)
    {
        if(!$this->sellOrders->contains($sellOrder)) {
            $sellOrder->setCustomer($this);
            $this->sellOrders->add($sellOrder);
        }
    }

    public function getSellOrder()
    {
        return $this->sellOrders;
    }
}