<?php

namespace Callmeaf\Meta\Http\Resources\V1\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MetaCollection extends ResourceCollection
{
    public function __construct($resource,protected array|int $only = [])
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(fn($meta) => toArrayResource(data: [
                'id' => fn() => $meta->id,
                'metaable_id' => fn() => $meta->metaable_id,
                'metaable_type' => fn() => $meta->metaable_type,
                'data' => fn() => $meta->data,
                'created_at' => fn() => $meta->created_at,
                'created_at_text' => fn() => $meta->createdAtText,
                'updated_at' => fn() => $meta->updated_at,
                'updated_at_text' => fn() => $meta->updatedAtText,
            ],only: $this->only)),
        ];
    }
}
