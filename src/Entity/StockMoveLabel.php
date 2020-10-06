<?php

namespace App\Entity;

use App\Repository\StockMoveLabelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockMoveLabelRepository::class)
 */
class StockMoveLabel
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
     * @ORM\OneToMany(targetEntity=StockMove::class, mappedBy="label")
     */
    private $stockMove;

    public function __construct()
    {
        $this->stockMove = new ArrayCollection();
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
     * @return Collection|StockMove[]
     */
    public function getStockMove(): Collection
    {
        return $this->stockMove;
    }

    public function addStockMove(StockMove $stockMove): self
    {
        if (!$this->stockMove->contains($stockMove)) {
            $this->stockMove[] = $stockMove;
            $stockMove->setLabel($this);
        }

        return $this;
    }

    public function removeStockMove(StockMove $stockMove): self
    {
        if ($this->stockMove->contains($stockMove)) {
            $this->stockMove->removeElement($stockMove);
            // set the owning side to null (unless already changed)
            if ($stockMove->getLabel() === $this) {
                $stockMove->setLabel(null);
            }
        }

        return $this;
    }
}
