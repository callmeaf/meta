<?php

namespace Callmeaf\Meta\Utilities\V1\Api\Meta;

use Callmeaf\Base\Utilities\V1\FormRequestAuthorizer;
use Callmeaf\Permission\Enums\PermissionName;

class MetaFormRequestAuthorizer extends FormRequestAuthorizer
{
    public function showResource(): bool
    {
        return true;
    }
}
