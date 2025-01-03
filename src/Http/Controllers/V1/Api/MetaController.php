<?php

namespace Callmeaf\Meta\Http\Controllers\V1\Api;

use Callmeaf\Base\Http\Controllers\V1\Api\ApiController;
use Callmeaf\Meta\Events\MetaShowedResource;
use Callmeaf\Meta\Http\Requests\V1\Api\MetaShowResourceRequest;
use Callmeaf\Meta\Services\V1\MetaService;
use Callmeaf\Meta\Utilities\V1\Api\Meta\MetaResources;

class MetaController extends ApiController
{
    protected MetaService $metaService;
    protected MetaResources $metaResources;
    public function __construct()
    {
        $this->metaService = app(config('callmeaf-meta.service'));
        $this->metaResources = app(config('callmeaf-meta.resources.meta'));
    }

    public static function middleware(): array
    {
        return app(config('callmeaf-meta.middlewares.meta'))();
    }

    public function showResource(MetaShowResourceRequest $request)
    {
        try {
            $resources = $this->metaResources->showResource();
            $meta = $this->metaService->where([
                'metaable_id' => $request->get('metaable_id'),
                'metaable_type' => $request->get('metaable_type'),
            ])->first(columns: $resources->columns())->getModel(
                asResource: true,
                attributes: $resources->attributes(),
                relations: $resources->relations(),
                events: [
                    MetaShowedResource::class,
                ],
            );
            return apiResponse([
                'meta' => $meta,
            ],__('callmeaf-base::v1.successful_loaded'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }
}
