<?php

namespace App\Models;

use Framework\Core\Model;

class Category extends Model
{
    protected static ?array $fillable = ['name', 'slug'];

    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getComponents(): array
    {
        return $this->getAllRelated(Component::class, 'categoryId');
    }
}