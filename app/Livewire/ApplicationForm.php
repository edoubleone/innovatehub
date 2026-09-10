<?php

namespace App\Livewire;

use App\Mail\ApplicationMail;
use App\Models\Application;
use App\Models\Cohort;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ApplicationForm extends Component
{
    public string $first_name   = '';
    public string $last_name    = '';
    public string $email        = '';
    public string $phone        = '';
    public string $program_slug = '';
    public string $experience   = '';
    public string $why          = '';

    public function mount(): void
    {
        $requested = request('program', '');

        if ($requested && $this->slugIsAvailable($requested)) {
            $this->program_slug = $requested;
        }
    }

    private function slugIsAvailable(string $slug): bool
    {
        return Cohort::where('status', 'upcoming')
            ->whereHas('programs', fn ($q) => $q->where('slug', $slug))
            ->exists();
    }

    public function submit(): void
    {
        $this->validate(
            [
                'first_name'   => ['required', 'string', 'max:80'],
                'last_name'    => ['required', 'string', 'max:80'],
                'email'        => ['required', 'email', 'max:160'],
                'phone'        => ['nullable', 'string', 'max:40'],
                'program_slug' => ['required', function ($attr, $value, $fail) {
                    if ($value !== 'unsure' && ! $this->slugIsAvailable($value)) {
                        $fail('Please choose a valid program.');
                    }
                }],
                'experience'   => ['nullable', 'in:none,some,a_lot'],
                'why'          => ['required', 'string', 'max:5000'],
            ],
            [
                'first_name.required'   => 'First name is required.',
                'last_name.required'    => 'Last name is required.',
                'email.required'        => 'Email is required.',
                'email.email'           => 'Enter a valid email address.',
                'program_slug.required' => 'Please choose a program.',
                'why.required'          => 'Please tell us why you want to join.',
            ]
        );

        $cohortId = null;
        if ($this->program_slug !== 'unsure') {
            $cohortId = Cohort::where('status', 'upcoming')
                ->whereHas('programs', fn ($q) => $q->where('slug', $this->program_slug))
                ->orderBy('sort_order')
                ->value('id');
        }

        $application = Application::create([
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'email'        => $this->email,
            'phone'        => $this->phone ?: null,
            'program_slug' => $this->program_slug,
            'cohort_id'    => $cohortId,
            'experience'   => $this->experience ?: null,
            'why'          => $this->why,
        ]);

        Mail::to('hello@exam.com')->send(new ApplicationMail($application));

        session()->flash('applicant_first_name', $application->first_name);

        $this->redirect(route('apply.thanks'), navigate: false);
    }

    public function render()
    {
        $grouped = [];

        Cohort::where('status', 'upcoming')
            ->with(['programs' => fn ($q) => $q->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->get()
            ->each(function (Cohort $cohort) use (&$grouped): void {
                foreach ($cohort->programs as $program) {
                    $grouped[$cohort->name][$program->slug] = $program->title;
                }
            });

        $grouped['Other']['unsure'] = "I'm not sure yet";

        return view('livewire.application-form', ['grouped' => $grouped]);
    }
}
