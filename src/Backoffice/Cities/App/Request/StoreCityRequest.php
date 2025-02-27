<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\CityDTO;

class StoreCityRequest extends FormRequest
{
    public const NAME = 'name';

    public function rules(): array
    {
        return [
            self::NAME => 'required|string|unique:cities,name|max:255',
        ];
    }

    public function toDto(): CityDTO
    {
        return new CityDTO(
            name: $this->string(self::NAME)->toString(),
        );
    }
}
