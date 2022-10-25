<?php

namespace App\State;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\EnergyPrice;

class EnergyPriceProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface {
    public function getCollection(string $resourceClass, string $operationName = null) {
        $data = json_decode(file_get_contents(__DIR__.'/../Resources/evolution-des-prix-domestiques-du-gaz-et-de-lelectricite.json'));

        foreach ($data as $price) {
            $fields = $price->fields;
            yield new EnergyPrice(id: $price->recordid, year: (int) $fields->annee, gazPrice: $fields->france_gaz_naturel, electricityPrice: $fields->france_electricite, semester: (int) str_replace('S', '', $fields->semestre));
        }
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool {return true;}
}
