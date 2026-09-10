<?php

namespace App\Observers;

use App\Mail\AcceptanceMail;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;

class ApplicationObserver
{
    public function updated(Application $application): void
    {
        if ($application->wasChanged('status') && $application->status === 'accepted') {
            $application->loadMissing(['program', 'cohort']);
            Mail::to($application->email)->send(new AcceptanceMail($application));
        }
    }
}
