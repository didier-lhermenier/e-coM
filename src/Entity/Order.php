<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
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
    private $orderNumber;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=OrderHasArticle::class, mappedBy="theOrder", orphanRemoval=true)
     */
    private $orderHasArticles;

    /**
     * @ORM\ManyToOne(targetEntity=OrderStatus::class, inversedBy="theOrder")
     */
    private $orderStatus;

    public function __construct()
    {
        $this->orderHasArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|OrderHasArticle[]
     */
    public function getOrderHasArticles(): Collection
    {
        return $this->orderHasArticles;
    }

    public function addOrderHasArticle(OrderHasArticle $orderHasArticle): self
    {
        if (!$this->orderHasArticles->contains($orderHasArticle)) {
            $this->orderHasArticles[] = $orderHasArticle;
            $orderHasArticle->setTheOrder($this);
        }

        return $this;
    }

    public function removeOrderHasArticle(OrderHasArticle $orderHasArticle): self
    {
        if ($this->orderHasArticles->contains($orderHasArticle)) {
            $this->orderHasArticles->removeElement($orderHasArticle);
            // set the owning side to null (unless already changed)
            if ($orderHasArticle->getTheOrder() === $this) {
                $orderHasArticle->setTheOrder(null);
            }
        }

        return $this;
    }

    public function getOrderStatus(): ?OrderStatus
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(?OrderStatus $orderStatus): self
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }
}
