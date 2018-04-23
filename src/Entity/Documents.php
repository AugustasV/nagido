<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentsRepository")
 */
class Documents
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $docName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $docDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $docExpires;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $docReminder;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $categoryId;

    public function getId()
    {
        return $this->id;
    }

    public function getDocName(): ?string
    {
        return $this->docName;
    }

    public function setDocName(string $docName): self
    {
        $this->docName = $docName;

        return $this;
    }

    public function getDocDate(): ?\DateTimeInterface
    {
        return $this->docDate;
    }

    public function setDocDate(?\DateTimeInterface $docDate): self
    {
        $this->docDate = $docDate;

        return $this;
    }

    public function getDocExpires(): ?\DateTimeInterface
    {
        return $this->docExpires;
    }

    public function setDocExpires(?\DateTimeInterface $docExpires): self
    {
        $this->docExpires = $docExpires;

        return $this;
    }

    public function getDocReminder(): ?\DateTimeInterface
    {
        return $this->docReminder;
    }

    public function setDocReminder(?\DateTimeInterface $docReminder): self
    {
        $this->docReminder = $docReminder;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }
}
