<?php

namespace App\Livewire;

use App\Models\Application;
use Illuminate\Support\Collection;
use Livewire\Component;

class ApplicationStatus extends Component
{
    public string $email = '';
    public bool $searched = false;
    public Collection $applications;

    public function boot(): void
    {
        $this->applications = collect();
    }

    public function check(): void
    {
        $this->validate(
            ['email' => ['required', 'email', 'max:160']],
            ['email.required' => 'Please enter your email address.',
             'email.email'    => 'Enter a valid email address.']
        );

        $this->applications = Application::with('program')
            ->where('email', $this->email)
            ->latest()
            ->get();

        $this->searched = true;
    }

    public function render()
    {
        return view('livewire.application-status');
    }
}
