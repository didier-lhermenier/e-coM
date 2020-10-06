<?php

namespace App\Entity;

use App\Repository\OrderStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderStatusRepository::class)
 */
class OrderStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="orderStatus")
     */
    private $theOrder;

    public function __construct()
    {
        $this->theOrder = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getTheOrder(): Collection
    {
        return $this->theOrder;
    }

    public function addTheOrder(Order $theOrder): self
    {
        if (!$this->theOrder->contains($theOrder)) {
            $this->theOrder[] = $theOrder;
            $theOrder->setOrderStatus($this);
        }

        return $this;
    }

    public function removeTheOrder(Order $theOrder): self
    {
        if ($this->theOrder->contains($theOrder)) {
            $this->theOrder->removeElement($theOrder);
            // set the owning side to null (unless already changed)
            if ($theOrder->getOrderStatus() === $this) {
                $theOrder->setOrderStatus(null);
            }
        }

        return $this;
    }
}
