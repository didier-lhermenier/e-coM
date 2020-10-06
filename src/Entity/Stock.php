<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $quantity;

    /**
     * @ORM\OneToMany(targetEntity=StockMove::class, mappedBy="stock", orphanRemoval=true)
     */
    private $stockMoves;

    public function __construct()
    {
        $this->stockMoves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection|StockMove[]
     */
    public function getStockMoves(): Collection
    {
        return $this->stockMoves;
    }

    public function addStockMove(StockMove $stockMove): self
    {
        if (!$this->stockMoves->contains($stockMove)) {
            $this->stockMoves[] = $stockMove;
            $stockMove->setStock($this);
        }

        return $this;
    }

    public function removeStockMove(StockMove $stockMove): self
    {
        if ($this->stockMoves->contains($stockMove)) {
            $this->stockMoves->removeElement($stockMove);
            // set the owning side to null (unless already changed)
            if ($stockMove->getStock() === $this) {
                $stockMove->setStock(null);
            }
        }

        return $this;
    }
}
