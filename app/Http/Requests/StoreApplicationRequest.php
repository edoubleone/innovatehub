<?php

namespace App\Http\Requests;

use App\Models\Program;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreApplicationRequest extends FormRequest
{
    /**
     * The admissions form is open to anyone — no authorization checks.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules match the React prototype's client-side validation,
     * plus database-backed checks (program must exist) and server-only
     * guarantees (email format, length caps matching the migration).
     */
    public function rules(): array
    {
        return [
            'first_name'  => ['required', 'string', 'max:80'],
            'last_name'   => ['required', 'string', 'max:80'],
            'email'       => ['required', 'string', 'email', 'max:160'],
            'phone'       => ['nullable', 'string', 'max:40'],

            // Either the slug of a real program, or the literal 'unsure'
            // (which mirrors the <option value="unsure"> in the React form).
            'program_slug' => [
                'required',
                'string',
                function ($attribute, $value, $fail): void {
                    if ($value === 'unsure') {
                        return;
                    }
                    if (! Program::where('slug', $value)->exists()) {
                        $fail('Please choose a program.');
                    }
                },
            ],

            'experience'  => ['nullable', Rule::in([
                'none',
                'some',
                'a_lot',
            ])],

            'why'         => ['required', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required'  => 'Last name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Enter a valid email.',
            'program_slug.required' => 'Please choose a program.',
            'why.required'        => "Tell us a little about why you're applying.",        ];
    }
}
