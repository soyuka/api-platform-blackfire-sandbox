<?php

namespace App;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class Test
{
    public function __construct(
        private readonly NormalizerInterface $normalizer
    ) {
    }
}
