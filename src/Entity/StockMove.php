<?php

namespace App\Entity;

use App\Repository\StockMoveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockMoveRepository::class)
 */
class StockMove
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
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="stockMoves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity=Stock::class, inversedBy="stockMoves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity=StockMoveLabel::class, inversedBy="stockMove")
     * @ORM\JoinColumn(nullable=false)
     */
    private $label;

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

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getLabel(): ?StockMoveLabel
    {
        return $this->label;
    }

    public function setLabel(?StockMoveLabel $label): self
    {
        $this->label = $label;

        return $this;
    }
}
