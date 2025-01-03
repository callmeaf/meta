<?php

namespace Callmeaf\Meta\Events;

use Callmeaf\Meta\Models\Meta;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MetaCreated
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Meta $meta)
    {

    }
}
