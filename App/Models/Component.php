<?php

namespace App\Models;

use Framework\Core\Model;

class Component extends Model
{
    protected static ?array $fillable = ['name', 'category', 'price', 'manufacturer', 'power_w', 'image'];

    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $category = null;
    protected ?string $price = null;
    protected ?string $manufacturer = null;
    protected ?int $power_w = null;
    protected ?string $image = null;

    public function getId(): ?int { return $this->id; }
    public function getName(): ?string { return $this->name; }
    public function getCategory(): ?string { return $this->category; }
    public function getPrice(): ?string { return $this->price; }
    public function getManufacturer(): ?string { return $this->manufacturer; }
    public function getPowerW(): ?int { return $this->power_w; }
    public function getImage(): ?string { return $this->image; }

    public function setName(string $name): void { $this->name = $name; }
    public function setCategory(string $category): void { $this->category = $category; }
    public function setPrice(string $price): void { $this->price = $price; }
    public function setManufacturer(string $manufacturer): void { $this->manufacturer = $manufacturer; }
    public function setPowerW(int $power_w): void { $this->power_w = $power_w; }
    public function setImage(?string $image): void { $this->image = $image; }
}