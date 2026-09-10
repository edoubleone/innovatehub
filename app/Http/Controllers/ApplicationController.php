<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ApplicationController extends Controller
{
    public function create(): View
    {
        return view('pages.apply');
    }

    public function thanks(): View
    {
        return view('pages.apply-thanks', [
            'firstName' => session('applicant_first_name'),
        ]);
    }

    public function status(): View
    {
        return view('pages.apply-status');
    }
}
