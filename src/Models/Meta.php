<?php

namespace Callmeaf\Meta\Models;

use Callmeaf\Base\Casts\CollectJson;
use Callmeaf\Base\Traits\HasDate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class Meta extends Model
{
    use HasDate;

    protected $fillable = [
        'metaable_id',
        'metaable_type',
        'data',
    ];

    protected $casts = [
        'data' => CollectJson::class,
    ];

    public function metaable(): MorphTo
    {
        return $this->morphTo();
    }
}
