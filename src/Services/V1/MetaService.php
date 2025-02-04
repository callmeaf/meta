<?php

namespace Callmeaf\Meta\Services\V1;

use Callmeaf\Base\Services\V1\BaseService;
use Callmeaf\Meta\Services\V1\Contracts\MetaServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MetaService extends BaseService implements MetaServiceInterface
{
    public function __construct(?Builder $query = null, ?Model $model = null, ?Collection $collection = null, ?JsonResource $resource = null, ?ResourceCollection $resourceCollection = null, array $defaultData = [],?string $searcher = null)
    {
        parent::__construct($query, $model, $collection, $resource, $resourceCollection, $defaultData,$searcher);
        $this->query = app(config('callmeaf-meta.model'))->query();
        $this->resource = config('callmeaf-meta.model_resource');
        $this->resourceCollection = config('callmeaf-meta.model_resource_collection');
        $this->defaultData = config('callmeaf-meta.default_values');
        $this->searcher = config('callmeaf-meta.searcher');
    }
}
