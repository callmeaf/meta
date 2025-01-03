<?php

namespace Callmeaf\Meta\Utilities\V1\Api\Meta;

use Callmeaf\Base\Utilities\V1\Resources;

class MetaResources extends Resources
{
    public function showResource(): self
    {
        $this->data = [
            'relations' => [
            ],
            'columns' => [
                'id',
                'metaable_id',
                'metaable_type',
                'data',
                'created_at',
                'updated_at',
            ],
            'attributes' => [
                'id',
                'metaable_id',
                'metaable_type',
                'data',
                'created_at_text',
                'updated_at_text',
            ],
        ];
        return $this;
    }

}
