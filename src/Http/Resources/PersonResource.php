<?php

namespace Testsproject\LaravelTasks\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'bio'        => $this->bio,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
