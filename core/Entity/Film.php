<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\FilmRepository;

#[Table(name : "films")]
#[TargetRepository(repositoryName: FilmRepository::class)]
class Film extends AbstractEntity
{
    private int $id;
    private string $title;
    private string $synopsis;
    private string $image;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     */
    public function setSynopsis(string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

}