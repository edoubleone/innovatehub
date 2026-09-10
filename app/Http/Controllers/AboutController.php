<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    /**
     * About page — renders mission/vision copy plus the team roster.
     * Impact stats are small and static enough to live in the view.
     */
    public function index(): View
    {
        return view('pages.about', [
            'team' => TeamMember::orderBy('sort_order')->get(),
        ]);
    }
}
