<?php

return [
    'model' => \Callmeaf\Meta\Models\Meta::class,
    'model_resource' => \Callmeaf\Meta\Http\Resources\V1\Api\MetaResource::class,
    'model_resource_collection' => \Callmeaf\Meta\Http\Resources\V1\Api\MetaCollection::class,
    'service' => \Callmeaf\Meta\Services\V1\MetaService::class,
    'default_values' => [
        //
    ],
    'events' => [
        \Callmeaf\Meta\Events\MetaCreated::class => [
            // listeners
        ],
        \Callmeaf\Meta\Events\MetaUpdated::class => [
            // listeners
        ],
        \Callmeaf\Meta\Events\MetaDeleted::class => [
            // listeners
        ],
        \Callmeaf\Meta\Events\MetaShowedResource::class => [
            // listeners
        ],
    ],
    'validations' => [
        'meta' => \Callmeaf\Meta\Utilities\V1\Api\Meta\MetaFormRequestValidator::class,
    ],
    'resources' => [
        'meta' => \Callmeaf\Meta\Utilities\V1\Api\Meta\MetaResources::class,
    ],
    'controllers' => [
        'metas' => \Callmeaf\Meta\Http\Controllers\V1\Api\MetaController::class,
    ],
    'form_request_authorizers' => [
        'meta' => \Callmeaf\Meta\Utilities\V1\Api\Meta\MetaFormRequestAuthorizer::class,
    ],
    'middlewares' => [
        'meta' => \Callmeaf\Meta\Utilities\V1\Api\Meta\MetaControllerMiddleware::class,
    ],
    /**
     * When Metaable fired lifecycle eloquent events, merged new data coming with old data in metas table
     * For more information you can go to BaseService->updateMeta method
     */
    'merge_old_data_with_new_data' => true,
    'meta_data' => \Callmeaf\Meta\Utilities\V1\Api\Meta\MetaData::class,
];
