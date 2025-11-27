<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * * Saat ini, diasumsikan hanya pengguna terautentikasi yang dapat menyimpan atau memperbarui resume.
     */
    public function authorize(): bool
    {
        return auth()->check(); 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'job_title' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            // Perbaikan: Email dibuat WAJIB (sesuai indikasi frontend) dan validasi email diperkuat
            'email' => 'required|email:rfc,dns|max:255', 
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'city_state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'photo' => 'nullable|string',
            'summary' => 'nullable|string',
            
            // Perbaikan: Menambahkan validasi untuk konten array (Employment dan Education)
            'employment_history' => 'nullable|array',
            'employment_history.*.job_title' => 'required_with:employment_history|string|max:255',
            'employment_history.*.company' => 'required_with:employment_history|string|max:255',
            'employment_history.*.start_date' => 'required_with:employment_history|date_format:Y-m',
            'employment_history.*.end_date' => 'nullable|date_format:Y-m',
            'employment_history.*.description' => 'nullable|string',
            
            'education' => 'nullable|array',
            'education.*.degree' => 'required_with:education|string|max:255',
            'education.*.school' => 'required_with:education|string|max:255',
            'education.*.start_date' => 'required_with:education|date_format:Y-m',
            'education.*.end_date' => 'nullable|date_format:Y-m',

            // Skills dan Languages
            'skills' => 'nullable|array',
            'skills.*' => 'nullable|string|max:50', 
            'languages' => 'nullable|array',
            'languages.*.name' => 'required_with:languages|string|max:255',
            'languages.*.level' => 'nullable|string|max:255',

            'certifications' => 'nullable|array',
            'additional_sections' => 'nullable|array',
        ];
    }
}