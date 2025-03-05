<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\DataTransferObjects;

class AirlineDTO
{
    public function __construct(
        public string $name,
        public string $description,
    ) {
    }
}
