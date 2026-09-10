<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Render the marketing home page with the first six programs and all
     * published testimonials. Both collections are ordered by the
     * `sort_order` column so editors control sequencing from the database.
     */
    public function index(): View
    {
        $programs = Program::query()
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $testimonials = Testimonial::query()
            ->where('published', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.home', [
            'programs'     => $programs,
            'testimonials' => $testimonials,
        ]);
    }
}
