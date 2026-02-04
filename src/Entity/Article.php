<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title_article = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content_article = null;

    #[ORM\Column(length: 255)]
    private ?string $image_article = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $writeBy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleArticle(): ?string
    {
        return $this->title_article;
    }

    public function setTitleArticle(string $title_article): static
    {
        $this->title_article = $title_article;

        return $this;
    }

    public function getContentArticle(): ?string
    {
        return $this->content_article;
    }

    public function setContentArticle(string $content_article): static
    {
        $this->content_article = $content_article;

        return $this;
    }

    public function getImageArticle(): ?string
    {
        return $this->image_article;
    }

    public function setImageArticle(string $image_article): static
    {
        $this->image_article = $image_article;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeImmutable $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getWriteBy(): ?User
    {
        return $this->writeBy;
    }

    public function setWriteBy(?User $writeBy): static
    {
        $this->writeBy = $writeBy;

        return $this;
    }
}
