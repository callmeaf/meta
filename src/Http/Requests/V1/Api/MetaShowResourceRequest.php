<?php

namespace Callmeaf\Meta\Http\Requests\V1\Api;

use Callmeaf\Meta\Enums\MetaableType;
use Callmeaf\Meta\Exceptions\InvalidMetaableTypeException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class MetaShowResourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return app(config('callmeaf-meta.form_request_authorizers.meta'))->showResource();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return validationManager(rules: [
            'metaable_id' => [Rule::exists(config('callmeaf-meta.model'),'metaable_id')],
            'metaable_type' => ['string','max:255'],
        ],filters: app(config("callmeaf-meta.validations.meta"))->showResource());
    }


    protected function prepareForValidation(): void
    {
        $metaableType = $this->get('metaable_type');
        $this->merge([
            'metaable_type' => match ($metaableType) {
                'user' => config('callmeaf-user.model'),
                default => throw new InvalidMetaableTypeException(__('callmeaf-meta::v1.errors.invalid_metaable_type',['type' => $metaableType])),
            }
        ]);
    }
}
