<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDTO;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class StoreAirlineRequest extends FormRequest
{
    public const NAME = 'name';

    public const DESCRIPTION = 'description';

    public function rules(): array
    {
        return [
            self::NAME => ['required', 'string', Rule::unique((new Airline())->getTable()), 'max:255'],
            self::DESCRIPTION => ['string', 'max:255'],
        ];
    }

    public function toDto(): AirlineDTO
    {
        return new AirlineDTO(
            name: $this->string(self::NAME)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
        );
    }
}
