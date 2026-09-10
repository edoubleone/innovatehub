<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class LegalController extends Controller
{
    /**
     * Privacy Policy — legal content is co-located in a partial so both
     * the privacy and terms pages share layout, TOC, and footer blocks.
     */
    public function privacy(): View
    {
        return view('pages.legal', [
            'kind'    => 'privacy',
            'page'    => config('legal.privacy'),
        ]);
    }

    public function terms(): View
    {
        return view('pages.legal', [
            'kind'    => 'terms',
            'page'    => config('legal.terms'),
        ]);
    }
}
