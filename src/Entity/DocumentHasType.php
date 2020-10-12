<?php

namespace App\Entity;

use App\Repository\DocumentHasTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentHasTypeRepository::class)
 */
class DocumentHasType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ref;

    /**
     * @ORM\ManyToOne(targetEntity=DocumentType::class, inversedBy="documentHasTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $documentType;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="documentHasTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $document;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getDocumentType(): ?documentType
    {
        return $this->documentType;
    }

    public function setDocumentType(?documentType $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        $this->document = $document;

        return $this;
    }
}
