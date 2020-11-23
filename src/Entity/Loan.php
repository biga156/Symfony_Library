<?php

namespace App\Entity;

use App\Repository\LoanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoanRepository::class)
 */
class Loan
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $udatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $searchable;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

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

    public function getUdatedAt(): ?\DateTimeInterface
    {
        return $this->udatedAt;
    }

    public function setUdatedAt(?\DateTimeInterface $udatedAt): self
    {
        $this->udatedAt = $udatedAt;

        return $this;
    }

    public function getSearchable(): ?bool
    {
        return $this->searchable;
    }

    public function setSearchable(bool $searchable): self
    {
        $this->searchable = $searchable;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
