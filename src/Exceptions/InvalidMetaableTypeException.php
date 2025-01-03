<?php

namespace Callmeaf\Meta\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InvalidMetaableTypeException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message ?: __('callmeaf-meta::v1.errors.invalid_metaable_type',['type' => '']), $code ?: Response::HTTP_FORBIDDEN, $previous);
    }
}

