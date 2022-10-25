<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource]
class EnergyPrice {
    public function __construct(public ?string $id, public ?int $year, public ?int $gazPrice, public $electricityPrice, public ?int $semester) {}
}
