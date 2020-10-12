<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=LineArticle::class, mappedBy="document", orphanRemoval=true)
     */
    private $lineArticles;

    /**
     * @ORM\ManyToOne(targetEntity=DocumentStatus::class, inversedBy="document")
     */
    private $documentStatus;

    /**
     * @ORM\OneToMany(targetEntity=DocumentHasType::class, mappedBy="document", orphanRemoval=true)
     */
    private $documentHasTypes;


    public function __construct()
    {
        $this->lineArticles = new ArrayCollection();
        $this->documentHasTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|LineArticle[]
     */
    public function getLineArticles(): Collection
    {
        return $this->lineArticles;
    }

    public function addLineArticle(LineArticle $lineArticle): self
    {
        if (!$this->lineArticles->contains($lineArticle)) {
            $this->lineArticles[] = $lineArticle;
            $lineArticle->setDocument($this);
        }

        return $this;
    }

    public function removeLineArticle(LineArticle $lineArticle): self
    {
        if ($this->lineArticles->contains($lineArticle)) {
            $this->lineArticles->removeElement($lineArticle);
            // set the owning side to null (unless already changed)
            if ($lineArticle->getDocument() === $this) {
                $lineArticle->setDocument(null);
            }
        }

        return $this;
    }

    public function getDocumentStatus(): ?DocumentStatus
    {
        return $this->documentStatus;
    }

    public function setDocumentStatus(?DocumentStatus $documentStatus): self
    {
        $this->documentStatus = $documentStatus;

        return $this;
    }

    /**
     * @return Collection|DocumentHasType[]
     */
    public function getDocumentHasTypes(): Collection
    {
        return $this->documentHasTypes;
    }

    public function addDocumentHasType(DocumentHasType $documentHasType): self
    {
        if (!$this->documentHasTypes->contains($documentHasType)) {
            $this->documentHasTypes[] = $documentHasType;
            $documentHasType->setDocument($this);
        }

        return $this;
    }

    public function removeDocumentHasType(DocumentHasType $documentHasType): self
    {
        if ($this->documentHasTypes->contains($documentHasType)) {
            $this->documentHasTypes->removeElement($documentHasType);
            // set the owning side to null (unless already changed)
            if ($documentHasType->getDocument() === $this) {
                $documentHasType->setDocument(null);
            }
        }

        return $this;
    }
}
