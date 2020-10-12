<?php

namespace App\Entity;

use App\Repository\DocumentTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentTypeRepository::class)
 */
class DocumentType
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
     * @ORM\OneToMany(targetEntity=DocumentHasType::class, mappedBy="documentType", orphanRemoval=true)
     */
    private $documentHasTypes;

    public function __construct()
    {
        $this->documentHasTypes = new ArrayCollection();
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
            $documentHasType->setDocumentType($this);
        }

        return $this;
    }

    public function removeDocumentHasType(DocumentHasType $documentHasType): self
    {
        if ($this->documentHasTypes->contains($documentHasType)) {
            $this->documentHasTypes->removeElement($documentHasType);
            // set the owning side to null (unless already changed)
            if ($documentHasType->getDocumentType() === $this) {
                $documentHasType->setDocumentType(null);
            }
        }

        return $this;
    }
}
