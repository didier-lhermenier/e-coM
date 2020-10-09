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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=LineArticle::class, mappedBy="document", orphanRemoval=true)
     */
    private $lineArticles;

    /**
     * @ORM\ManyToOne(targetEntity=DocumentStatus::class, inversedBy="document")
     */
    private $documentStatus;

    /**
     * @ORM\OneToOne(targetEntity=Invoice::class, mappedBy="document", cascade={"persist", "remove"})
     */
    private $invoice;

    /**
     * @ORM\OneToOne(targetEntity=CreditNote::class, mappedBy="document", cascade={"persist", "remove"})
     */
    private $creditNote;

    /**
     * @ORM\OneToOne(targetEntity=Command::class, mappedBy="document", cascade={"persist", "remove"})
     */
    private $command;

    public function __construct()
    {
        $this->lineArticles = new ArrayCollection();
    }

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

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        // set the owning side of the relation if necessary
        if ($invoice->getDocument() !== $this) {
            $invoice->setDocument($this);
        }

        return $this;
    }

    public function getCreditNote(): ?CreditNote
    {
        return $this->creditNote;
    }

    public function setCreditNote(CreditNote $creditNote): self
    {
        $this->creditNote = $creditNote;

        // set the owning side of the relation if necessary
        if ($creditNote->getDocument() !== $this) {
            $creditNote->setDocument($this);
        }

        return $this;
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(Command $command): self
    {
        $this->command = $command;

        // set the owning side of the relation if necessary
        if ($command->getDocument() !== $this) {
            $command->setDocument($this);
        }

        return $this;
    }
}
