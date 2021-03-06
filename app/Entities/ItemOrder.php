<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="item_order")
 */
class ItemOrder
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
     * @ORM\Column(type="decimal", options={"unsigned":true})
     */
    protected $priceUnity;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="itemsOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     *
     * @var Product
     */
    protected $itemOrder;

    /**
     * @ORM\ManyToOne(targetEntity="SellOrder", inversedBy="itemOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sell_order_id", referencedColumnName="id")
     * })
     *
     * @var SellOrder
     */
    protected $itemsOrder;

    /**
     * @ORM\Column(type="decimal", precision=2, options={"unsigned":true})
     */
    protected $quantity;

    /**
     * @ORM\Column(type="decimal", precision=2, options={"unsigned":true})
     */
    protected $total;

    public function __construct($id, $quantity, $priceUnity, $total)
    {
        $this->id         = $id;
        $this->priceUnity = $priceUnity;
        $this->quantity   = $quantity;
        $this->total      = $total;

        $this->itemOrder   = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPriceUnity()
    {
        return $this->priceUnity;
    }

    public function setPriceUnity($priceUnity)
    {
        $this->priceUnity = $priceUnity;
    }

    public function setCustomer(People $customer)
    {
        $this->customer = $customer;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getItemOrder()
    {
        return $this->itemOrder;
    }

    public function setItemOrder(Product $itemOrder)
    {
        $this->itemOrder = $itemOrder;
    }
}