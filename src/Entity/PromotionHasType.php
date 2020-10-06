<?php

namespace App\Entity;

use App\Repository\PromotionHasTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionHasTypeRepository::class)
 */
class PromotionHasType
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
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=PromotionType::class, inversedBy="promotionHasTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $promotionType;

    /**
     * @ORM\ManyToOne(targetEntity=Promotion::class, inversedBy="promotionHasTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $promotion;

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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getPromotionType(): ?PromotionType
    {
        return $this->promotionType;
    }

    public function setPromotionType(?PromotionType $promotionType): self
    {
        $this->promotionType = $promotionType;

        return $this;
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }
}
