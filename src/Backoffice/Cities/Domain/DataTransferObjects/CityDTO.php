<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\DataTransferObjects;

class CityDTO
{
    public function __construct(
        public string $name,
    ) {
    }
}
