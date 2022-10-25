<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\EnergyPrice;

class EnergyPriceProvider implements ProviderInterface {
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): null|object|array
    {
        $data = json_decode(file_get_contents(__DIR__.'/../Resources/evolution-des-prix-domestiques-du-gaz-et-de-lelectricite.json'));

        foreach ($data as $price) {
            $fields = $price->fields;
            yield new EnergyPrice(id: $price->recordid, year: (int) $fields->annee, gazPrice: $fields->france_gaz_naturel, electricityPrice: $fields->france_electricite, semester: (int) str_replace('S', '', $fields->semestre));
        }
    }
}
