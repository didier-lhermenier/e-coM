<?php

namespace App\Entity;

use App\Repository\PromotionTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionTypeRepository::class)
 */
class PromotionType
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
     * @ORM\OneToMany(targetEntity=PromotionHasType::class, mappedBy="promotionType", orphanRemoval=true)
     */
    private $promotionHasTypes;

    public function __construct()
    {
        $this->promotionHasTypes = new ArrayCollection();
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
     * @return Collection|PromotionHasType[]
     */
    public function getPromotionHasTypes(): Collection
    {
        return $this->promotionHasTypes;
    }

    public function addPromotionHasType(PromotionHasType $promotionHasType): self
    {
        if (!$this->promotionHasTypes->contains($promotionHasType)) {
            $this->promotionHasTypes[] = $promotionHasType;
            $promotionHasType->setPromotionType($this);
        }

        return $this;
    }

    public function removePromotionHasType(PromotionHasType $promotionHasType): self
    {
        if ($this->promotionHasTypes->contains($promotionHasType)) {
            $this->promotionHasTypes->removeElement($promotionHasType);
            // set the owning side to null (unless already changed)
            if ($promotionHasType->getPromotionType() === $this) {
                $promotionHasType->setPromotionType(null);
            }
        }

        return $this;
    }
}
