<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEnd;

    /**
     * @ORM\OneToMany(targetEntity=ArticleHasProperty::class, mappedBy="promotion")
     */
    private $articleHasProperties;

    /**
     * @ORM\ManyToOne(targetEntity=PromotionEvent::class, inversedBy="promotions")
     */
    private $promotionEvent;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $value;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type;

    public function __construct()
    {
        $this->promotionHasTypes = new ArrayCollection();
        $this->articleHasProperties = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

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
            $articleHasProperty->setPromotion($this);
        }

        return $this;
    }

    public function removeArticleHasProperty(ArticleHasProperty $articleHasProperty): self
    {
        if ($this->articleHasProperties->contains($articleHasProperty)) {
            $this->articleHasProperties->removeElement($articleHasProperty);
            // set the owning side to null (unless already changed)
            if ($articleHasProperty->getPromotion() === $this) {
                $articleHasProperty->setPromotion(null);
            }
        }

        return $this;
    }

    public function getPromotionEvent(): ?PromotionEvent
    {
        return $this->promotionEvent;
    }

    public function setPromotionEvent(?PromotionEvent $promotionEvent): self
    {
        $this->promotionEvent = $promotionEvent;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
