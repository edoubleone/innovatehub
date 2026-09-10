<footer class="bg-[#f6f3f2] border-t border-[#e5e2e1]">
    <div class="container-wide py-[72px]">
        <div class="mt-10 grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr]">

            {{-- Brand column --}}
            <div class="flex flex-col gap-5">
                <p class="font-serif font-bold text-[20px] text-[#0b1f3a] tracking-[-0.3px]">Innovate Hub Foundation</p>
                <p class="text-[14px] leading-[1.65] text-[#44474d] max-w-[300px]">
                    Building Skills. Creating Opportunity. Strengthening Communities. Expanding access to education, technology, workforce development, and entrepreneurship.
                </p>
                <div class="flex items-center gap-2 mt-1">
                    @foreach ([
                        ['label' => 'X / Twitter',  'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>'],
                        ['label' => 'LinkedIn',      'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/>'],
                        ['label' => 'Instagram',     'icon' => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>'],
                    ] as $s)
                        <a href="#" aria-label="{{ $s['label'] }}"
                           class="flex h-8 w-8 items-center justify-center rounded-lg border border-[#c4c6ce] text-[#44474d] hover:border-[#0051d5] hover:text-[#0051d5] hover:bg-white transition-all duration-200">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">{!! $s['icon'] !!}</svg>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Explore --}}
            <div class="flex flex-col gap-3">
                <h4 class="font-sans text-[11px] font-bold uppercase tracking-[0.1em] text-[#0b1f3a] mb-2">Explore</h4>
                <a href="{{ route('programs.index') }}" class="text-[14px] text-[#44474d] hover:text-[#0051d5] transition-colors">Programs</a>
                <a href="{{ route('about') }}" class="text-[14px] text-[#44474d] hover:text-[#0051d5] transition-colors">About Us</a>
                <a href="{{ route('contact') }}" class="text-[14px] text-[#44474d] hover:text-[#0051d5] transition-colors">Contact</a>
                <a href="{{ route('apply') }}" class="text-[14px] text-[#44474d] hover:text-[#0051d5] transition-colors">Apply Now</a>
                <a href="{{ route('donate') }}" class="text-[14px] text-[#0051d5] font-semibold hover:underline underline-offset-4 transition-colors mt-1">Donate →</a>
            </div>

            {{-- Contact --}}
            <div class="flex flex-col gap-3">
                <h4 class="font-sans text-[11px] font-bold uppercase tracking-[0.1em] text-[#0b1f3a] mb-2">Contact</h4>
                <p class="text-[14px] text-[#44474d]">Dundalk, Maryland</p>
                <a href="mailto:info@innovatehub.com" class="text-[14px] text-[#44474d] hover:text-[#0051d5] transition-colors">info@innovatehub.com</a>
                <p class="text-[14px] text-[#44474d]">Mon–Fri · 9am–6pm ET</p>
                <a href="{{ route('donate') }}"
                   class="mt-3 inline-flex items-center justify-center rounded-lg bg-[#0051d5] px-5 py-2.5 text-[13px] font-bold text-white hover:bg-[#316bf3] hover:shadow-[0_4px_14px_rgba(0,81,213,0.30)] transition-all">
                    Support Our Mission
                </a>
            </div>
        </div>

        {{-- Bottom row --}}
        <div class="mt-12 flex flex-col items-center justify-between gap-3 border-t border-[#e5e2e1] pt-6 text-[12px] text-[#75777e] sm:flex-row">
            <a href="https://www.edoubleone.com" class="hover:text-[#0051d5] transition-colors">© {{ date('Y') }} Edoubleone Inc. All rights reserved.</a>
            <p>Dundalk, Maryland · Nonprofit 501(c)(3)</p>
        </div>
    </div>
</footer>
