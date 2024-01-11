<?php
<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sender' => 'required|array',
            'sender.name' => 'required|string',
            'sender.phone' => 'required|string|size:11',
            'sender.address' => 'required|string',
            'sender.postal_code' => 'required|integer|digits:10',
            'receiver' => 'required|array',
            'receiver.name' => 'required|string',
            'receiver.phone' => 'required|string|size:11',
            'receiver.address' => 'required|string',
            'receiver.postal_code' => 'required|integer|digits:10',
            'parcels' => 'required|array',
            'parcels.*' => 'required|array',
            'parcels.*.description' => 'required|string',
            'parcels.*.weight' => 'required|string',
        ];
    }
}
