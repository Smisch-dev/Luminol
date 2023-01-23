<?php

namespace Luminol\Http\Requests\Admin\Settings;

use Luminol\Http\Requests\Admin\AdminFormRequest;

class AdvancedSettingsFormRequest extends AdminFormRequest
{
    /**
     * Return all the rules to apply to this request's data.
     */
    public function rules(): array
    {
        return [
            'recaptcha:enabled' => 'required|in:true,false',
            'recaptcha:secret_key' => 'required|string|max:191',
            'recaptcha:website_key' => 'required|string|max:191',
            'luminol:guzzle:timeout' => 'required|integer|between:1,60',
            'luminol:guzzle:connect_timeout' => 'required|integer|between:1,60',
            'luminol:client_features:allocations:enabled' => 'required|in:true,false',
            'luminol:client_features:allocations:range_start' => [
                'nullable',
                'required_if:luminol:client_features:allocations:enabled,true',
                'integer',
                'between:1024,65535',
            ],
            'luminol:client_features:allocations:range_end' => [
                'nullable',
                'required_if:luminol:client_features:allocations:enabled,true',
                'integer',
                'between:1024,65535',
                'gt:luminol:client_features:allocations:range_start',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'recaptcha:enabled' => 'reCAPTCHA Enabled',
            'recaptcha:secret_key' => 'reCAPTCHA Secret Key',
            'recaptcha:website_key' => 'reCAPTCHA Website Key',
            'luminol:guzzle:timeout' => 'HTTP Request Timeout',
            'luminol:guzzle:connect_timeout' => 'HTTP Connection Timeout',
            'luminol:client_features:allocations:enabled' => 'Auto Create Allocations Enabled',
            'luminol:client_features:allocations:range_start' => 'Starting Port',
            'luminol:client_features:allocations:range_end' => 'Ending Port',
        ];
    }
}
