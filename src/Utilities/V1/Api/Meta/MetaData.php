<?php

namespace Callmeaf\Meta\Utilities\V1\Api\Meta;

use Callmeaf\Meta\Traits\MetaDataLifecycles;
use Callmeaf\Payment\Models\Payment;
use Callmeaf\User\Models\User;
use Callmeaf\Voucher\Models\VoucherProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MetaData
{
    use MetaDataLifecycles;

    public function __construct(
        protected Model $model,
        protected array $data = [],
    )
    {

    }

    public static function from(Model $model): self
    {
        return new MetaData($model);
    }

    public function make(): ?array
    {
        $refClass = new \ReflectionClass($this->model);
        $className = $refClass->getShortName();
        $funcName = Str::of($className)->camel()->toString();

        return $this->$funcName();
    }

    public function getData(): array
    {
        return $this->data;
    }

    private function allData(?array $metaData = null,array $only = [],array $except = []): array
    {
        $lifeCycles = array_intersect(self::LIFECYCLES,$only);
        $lifeCycles = array_diff($lifeCycles,$except);
        foreach ($lifeCycles as $lifeCycle) {
            $this->$lifeCycle(metaData: $metaData);
        }
        return $this->data;
    }

    /*
     * ================================== Eloquent Methods ==========================
     * use for return meta data of each eloquent
     */

    private function user(): ?array
    {
        /**
         * @var User $model
         */
        $model = $this->model;

        return $this->allData([
            'mobile' => $model->mobile,
            'full_name' => $model->full_name,
        ],only: [
            self::CREATED,
            self::UPDATED,
        ]);
    }

    private function payment(): ?array
    {
        /**
         * @var Payment $model
         */
        $model = $this->model;
        return $this->allData([
        ]);
    }

    private function voucherProduct(): ?array
    {
        /**
         * @var VoucherProduct $model
         */
        $model = $this->model;
        return $this->allData([
            'voucher_id' => $model->voucher_id,
            'product_id' => $model->product_id,
            'product_title' => $model->product->title,
            'voucher_code' => $model->voucher->code,
            'product_slug' => $model->product->slug,
        ],only: [
            self::CREATED,
        ]);
    }
}
