<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dimension;

    /**
     * @ORM\OneToMany(targetEntity=ArticleHasProperty::class, mappedBy="article", orphanRemoval=true)
     */
    private $articleHasProperties;

    /**
     * @ORM\ManyToMany(targetEntity=Galery::class, mappedBy="article")
     */
    private $galeries;

    /**
     * @ORM\OneToMany(targetEntity=StockMove::class, mappedBy="article", orphanRemoval=true)
     */
    private $stockMoves;

    /**
     * @ORM\OneToMany(targetEntity=OrderHasArticle::class, mappedBy="article", orphanRemoval=true)
     */
    private $orderHasArticles;

    public function __construct()
    {
        $this->articleHasProperties = new ArrayCollection();
        $this->galeries = new ArrayCollection();
        $this->stockMoves = new ArrayCollection();
        $this->orderHasArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getDimension(): ?string
    {
        return $this->dimension;
    }

    public function setDimension(?string $dimension): self
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * @return Collection|ArticleHasProperty[]
     */
    public function getArticleHasProperties(): Collection
    {
        return $this->articleHasProperties;
    }

    public function addArticleHasProperty(ArticleHasProperty $articleHasProperty): self
    {
        if (!$this->articleHasProperties->contains($articleHasProperty)) {
            $this->articleHasProperties[] = $articleHasProperty;
            $articleHasProperty->setArticle($this);
        }

        return $this;
    }

    public function removeArticleHasProperty(ArticleHasProperty $articleHasProperty): self
    {
        if ($this->articleHasProperties->contains($articleHasProperty)) {
            $this->articleHasProperties->removeElement($articleHasProperty);
            // set the owning side to null (unless already changed)
            if ($articleHasProperty->getArticle() === $this) {
                $articleHasProperty->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Galery[]
     */
    public function getGaleries(): Collection
    {
        return $this->galeries;
    }

    public function addGalery(Galery $galery): self
    {
        if (!$this->galeries->contains($galery)) {
            $this->galeries[] = $galery;
            $galery->addArticle($this);
        }

        return $this;
    }

    public function removeGalery(Galery $galery): self
    {
        if ($this->galeries->contains($galery)) {
            $this->galeries->removeElement($galery);
            $galery->removeArticle($this);
        }

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
            $stockMove->setArticle($this);
        }

        return $this;
    }

    public function removeStockMove(StockMove $stockMove): self
    {
        if ($this->stockMoves->contains($stockMove)) {
            $this->stockMoves->removeElement($stockMove);
            // set the owning side to null (unless already changed)
            if ($stockMove->getArticle() === $this) {
                $stockMove->setArticle(null);
            }
        }

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
            $orderHasArticle->setArticle($this);
        }

        return $this;
    }

    public function removeOrderHasArticle(OrderHasArticle $orderHasArticle): self
    {
        if ($this->orderHasArticles->contains($orderHasArticle)) {
            $this->orderHasArticles->removeElement($orderHasArticle);
            // set the owning side to null (unless already changed)
            if ($orderHasArticle->getArticle() === $this) {
                $orderHasArticle->setArticle(null);
            }
        }

        return $this;
    }
}
