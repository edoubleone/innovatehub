<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Contracts\View\View;

class ProgramController extends Controller
{
    /**
     * Programs index — lists every program ordered by `sort_order`.
     */
    public function index(): View
    {
        return view('pages.programs.index', [
            'programs' => Program::orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Program detail — route-model binds on the `slug` column (see
     * {@see Program::getRouteKeyName()}). 404s automatically.
     */
    public function show(Program $program): View
    {
        return view('pages.programs.show', [
            'program' => $program,
        ]);
    }
}
