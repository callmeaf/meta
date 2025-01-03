<?php

namespace Callmeaf\Meta\Utilities\V1\Api\Meta;

use Callmeaf\Base\Utilities\V1\FormRequestValidator;

class MetaFormRequestValidator extends FormRequestValidator
{
    public function showResource(): array
    {
        return [
            'metaable_id' => true,
            'metaable_type' => true,
        ];
    }

}
