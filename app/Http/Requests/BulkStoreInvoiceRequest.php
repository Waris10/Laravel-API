<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            '*.customer_id' => 'required|exists:customers,id',
            '*.amount' => 'required|numeric|min:0',
            '*.status' => 'required|in:P,B,V,b,p,v',
            '*.billed_date' => 'required|date',
            '*.paid_date' => 'nullable|date',
        ];
    }
}
