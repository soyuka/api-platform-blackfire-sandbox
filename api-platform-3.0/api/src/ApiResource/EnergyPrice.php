<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use App\State\EnergyPriceProvider;

#[GetCollection(provider: EnergyPriceProvider::class, name: 'foo')]
class EnergyPrice {
    public function __construct(public ?string $id, public ?int $year, public ?int $gazPrice, public $electricityPrice, public ?int $semester) {}
}
