<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:desarrollo_web,aplicacion',
            'link' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ];

        // Solo validar imagen en creación o si se está actualizando
        if ($this->isMethod('POST') || $this->hasFile('image')) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5048';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'type.required' => 'El tipo es obligatorio.',
            'type.in' => 'El tipo debe ser "Desarrollo Web" o "Aplicación".',
            'link.url' => 'El enlace debe ser una URL válida.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, webp.',
            'image.max' => 'La imagen no puede ser mayor a 5MB.',
        ];
    }
} 