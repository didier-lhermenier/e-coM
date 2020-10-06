<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=ArticleHasProperty::class, mappedBy="category")
     */
    private $articleHasProperties;

    public function __construct()
    {
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $articleHasProperty->setCategory($this);
        }

        return $this;
    }

    public function removeArticleHasProperty(ArticleHasProperty $articleHasProperty): self
    {
        if ($this->articleHasProperties->contains($articleHasProperty)) {
            $this->articleHasProperties->removeElement($articleHasProperty);
            // set the owning side to null (unless already changed)
            if ($articleHasProperty->getCategory() === $this) {
                $articleHasProperty->setCategory(null);
            }
        }

        return $this;
    }
}
