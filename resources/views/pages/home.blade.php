@extends('layouts.app')

@section('title', 'Innovate Hub Foundation — Building Skills. Creating Opportunity. Strengthening Communities.')

@section('content')
<main>

    {{-- HERO — split layout: text left, visual card right --}}
    <section class="relative bg-[#0b1f3a] pt-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1600&q=80&auto=format&fit=crop"
                 alt=""
                 class="w-full h-full object-cover opacity-[0.12]">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f3a] via-[#0b1f3a]/90 to-[#0b1f3a]/50"></div>
        </div>
        <div class="relative container-wide pt-[140px] pb-[100px]">
            <div class=" my-10 grid lg:grid-cols-[1fr_420px] gap-12 lg:gap-16 items-center">

                {{-- Left: headline + CTAs --}}
                <div>
                    <span class="hero-badge mb-6 inline-flex">
                        Innovate Hub Foundation · Dundalk, Maryland
                    </span>
                    <h1 class="font-serif text-[46px] font-bold leading-[1.07] tracking-[-1.5px] text-white sm:text-[56px] lg:text-[64px]">
                        Building Skills.<br>Creating Opportunity.<br>
                        <span class="text-[#b5c7ea]">Strengthening<br>Communities.</span>
                    </h1>
                    <p class="mt-6 max-w-[520px] text-[16px] leading-[1.75] text-[#b5c7ea] font-sans">
                        Innovate Hub Foundation is a community-based nonprofit committed to creating pathways to opportunity through education, technology, workforce development, entrepreneurship, and strategic partnerships. We connect people with the skills, resources, relationships, and opportunities they need to learn, grow, work, build, and contribute.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('programs.index') }}" class="btn btn-accent btn-lg">Explore Our Initiatives</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-white btn-lg">Get Involved</a>
                    </div>
                    <div class="mt-8 flex flex-wrap gap-5">
                        <div class="flex items-center gap-2">
                            <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <span class="text-[13px] text-[#b5c7ea] font-sans">100% free — always</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <span class="text-[13px] text-[#b5c7ea] font-sans">Rooted in Maryland, open to all</span>
                        </div>
                    </div>
                </div>

                {{-- Right: cohort card (visible on all sizes) --}}
                <div class="flex flex-col gap-4">
                    <div class="bg-white/[0.07] backdrop-blur-sm border border-white/15 rounded-2xl overflow-hidden">
                        <div class="h-56 sm:h-64 lg:h-72 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=900&q=80&auto=format&fit=crop"
                                 alt="Students collaborating at Innovate Hub" class="w-full h-full object-cover scale-[1.02] hover:scale-100 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1f3a]/80 via-[#0b1f3a]/20 to-transparent"></div>
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center gap-1.5 bg-[#0051d5] text-white text-[10px] font-bold uppercase tracking-[0.1em] px-3 py-1.5 rounded-full font-sans">
                                    <span class="h-1.5 w-1.5 rounded-full bg-white/80 animate-pulse"></span>
                                    Community Initiatives
                                </span>
                            </div>
                        </div>
                        <div class="p-7 lg:p-8">
                            <p class="font-serif text-[24px] lg:text-[26px] font-bold text-white leading-snug tracking-[-0.3px]">Creating pathways to opportunity</p>
                            <p class="mt-3 text-[14px] text-[#b5c7ea] leading-[1.65]">Talent is everywhere. Access is not. We help close the gap between ambition and opportunity.</p>
                            <div class="mt-5 flex items-center justify-between">
                                <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-1.5 text-[12px] font-bold text-[#dbe1ff] uppercase tracking-wider hover:text-white transition-colors font-sans">
                                    Explore our initiatives
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                                <span class="text-[12px] text-[#b5c7ea]/50 font-sans">Free · Always</span>
                            </div>
                        </div>
                    </div>

                    {{-- Mini stats beneath card --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-white/[0.06] border border-white/10 rounded-xl p-5 text-center">
                            <p class="font-serif text-[36px] font-bold text-[#dbe1ff] leading-none tracking-[-1.5px]">$0</p>
                            <p class="mt-1.5 text-[11px] text-[#b5c7ea]/70 font-sans uppercase tracking-wide">Cost to participants</p>
                        </div>
                        <div class="bg-white/[0.06] border border-white/10 rounded-xl p-5 text-center">
                            <p class="font-serif text-[36px] font-bold text-[#dbe1ff] leading-none tracking-[-1.5px]">6</p>
                            <p class="mt-1.5 text-[11px] text-[#b5c7ea]/70 font-sans uppercase tracking-wide">Community initiatives</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- STATS — border strip --}}
    <section class="bg-white border-b border-[#e8ecf5]" data-reveal-section>
        <div class="container-wide">
            <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-y md:divide-y-0 divide-[#e8ecf5]">
                @foreach ([
                    ['number' => '6',     'label' => 'Community Initiatives'],
                    ['number' => '100%',  'label' => 'Free, Always'],
                    ['number' => '$0',    'label' => 'Cost to Participants'],
                    ['number' => '∞',     'label' => 'Pathways to Opportunity'],
                ] as $i => $stat)
                    <div class="stat-item reveal px-8 py-10 text-center" style="transition-delay: {{ $i * 80 }}ms">
                        <p class="font-serif text-[44px] font-bold tracking-[-2px] text-[#0051d5] leading-none">{{ $stat['number'] }}</p>
                        <p class="mt-2 text-[11px] font-bold text-[#75777e] uppercase tracking-[0.1em] font-sans">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROGRAMS — asymmetric bento: first card tall, two stacked right --}}
    <section class="bg-[#f6f3f2] py-[100px]">
        <div class="container-wide">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
                <div>
                    <p class="eyebrow">Our Community Initiatives</p>
                    <h2 class="mt-3 max-w-[440px] font-serif text-[36px] font-bold leading-[1.1] tracking-[-0.7px] text-[#0b1f3a]">
                        Our work goes<br>beyond training.
                    </h2>
                </div>
                <div class="flex flex-col items-start md:items-end gap-3">
                    <p class="max-w-[340px] text-[14px] leading-[1.65] text-[#44474d] md:text-right">
                        We develop community-based initiatives designed to address real educational, workforce, technological, and economic needs.
                    </p>
                    <a href="{{ route('programs.index') }}" class="btn btn-secondary btn-sm">View all initiatives →</a>
                </div>
            </div>

            {{-- 2×2 grid — all cards with images --}}
            <div class="grid gap-5 sm:grid-cols-2">
                @foreach ($programs->take(6) as $i => $program)
                    <a href="{{ route('programs.show', $program) }}"
                       class="program-card group border border-[#c4c6ce] bg-white rounded-2xl overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-1 hover:border-[#0051d5] hover:shadow-[0_10px_30px_rgba(0,81,213,0.10)]">
                        <div class="h-48 w-full overflow-hidden bg-cover bg-center flex-shrink-0 relative"
                             style="background-image: url('{{ $program->image }}');">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1f3a]/55 to-transparent"></div>
                        </div>
                        <div class="p-7 flex flex-col flex-1">
                            <h3 class="font-serif text-[20px] font-bold text-[#0b1f3a] leading-snug tracking-[-0.3px]">{{ $program->title }}</h3>
                            <p class="mt-2.5 text-[14px] leading-[1.7] text-[#44474d] flex-1">{{ $program->short }}</p>
                            <span class="mt-5 inline-flex items-center gap-1.5 text-[12px] font-bold text-[#0051d5] uppercase tracking-wide font-sans group-hover:gap-2.5 transition-all">
                                Learn more
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- HOW IT WORKS — editorial numbered list layout --}}
    <section class="bg-white py-[100px]" data-reveal-section>
        <div class="container-wide">

            {{-- Section header: 2-col split --}}
            <div class="grid lg:grid-cols-2 gap-10 mb-16 pb-16 border-b border-[#e8ecf5]">
                <div>
                    <p class="eyebrow">Our Impact Model</p>
                    <h2 class="mt-4 font-serif text-[36px] font-bold leading-[1.1] tracking-[-0.7px] text-[#0b1f3a]">
                        From <span class="text-[#0051d5]">access</span> to opportunity.
                    </h2>
                </div>
                <div class="flex items-center">
                    <p class="text-[16px] leading-[1.75] text-[#44474d]">
                        Our initiatives are designed to create a pathway — not simply a one-time experience. Here's how we walk with you every step.
                    </p>
                </div>
            </div>

            {{-- Steps: big number left, content right --}}
            <div class="flex flex-col divide-y divide-[#e8ecf5]">
                @foreach ([
                    ['n'=>'01','title'=>'Access',    'desc'=>'Connect people with information, technology, education, and resources.'],
                    ['n'=>'02','title'=>'Equip',     'desc'=>'Develop practical technical, professional, and entrepreneurial skills.'],
                    ['n'=>'03','title'=>'Connect',   'desc'=>'Create relationships with mentors, employers, educators, and community partners.'],
                    ['n'=>'04','title'=>'Apply',     'desc'=>'Put knowledge into practice through projects, work experiences, entrepreneurship, and community engagement.'],
                    ['n'=>'05','title'=>'Advance',   'desc'=>'Create pathways toward employment, education, entrepreneurship, and economic mobility.'],
                    ['n'=>'06','title'=>'Give Back', 'desc'=>'Empower successful participants to contribute to others and strengthen their communities.'],
                ] as $i => $step)
                    <div class="step-item reveal grid md:grid-cols-[120px_1fr] lg:grid-cols-[180px_1fr] gap-6 py-10 items-start" style="transition-delay: {{ $i * 80 }}ms">
                        <div class="flex items-center gap-5">
                            <span class="font-serif text-[64px] font-bold leading-none text-[#e8ecf5] tracking-[-3px] select-none lg:text-[80px]">{{ $step['n'] }}</span>
                        </div>
                        <div class="flex flex-col md:flex-row md:items-start gap-6">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#0051d5] text-[13px] font-bold text-white font-sans shadow-[0_2px_8px_rgba(0,81,213,0.30)] flex-shrink-0">{{ ltrim($step['n'], '0') }}</div>
                                    <h3 class="font-serif text-[20px] font-bold text-[#0b1f3a]">{{ $step['title'] }}</h3>
                                </div>
                                <p class="text-[15px] leading-[1.7] text-[#44474d] max-w-[480px]">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- WHY IT MATTERS — asymmetric: one large feature card + 5 smaller --}}
    <section class="bg-[#0b1f3a] py-[100px]" data-reveal-section>
        <div class="container-wide">
            <div class="grid lg:grid-cols-2 gap-10 mb-14 items-end">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#dbe1ff] mb-3 font-sans">Why We Exist</p>
                    <h2 class="font-serif text-[34px] font-bold leading-[1.12] tracking-[-0.7px] text-white">
                        Talent is everywhere. Access is not.
                    </h2>
                </div>
                <p class="text-[15px] leading-[1.75] text-[#b5c7ea]/80 font-sans lg:self-end">
                    Technology and education are transforming the economy, but access to opportunity remains unequal. Many individuals have the ambition to succeed but lack access to the following.
                </p>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'label' => 'Relevant Skills', 'body' => 'Many individuals lack access to the practical, in-demand skills needed to compete in today\'s economy.'],
                    ['icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Technology', 'body' => 'Devices, connectivity, and technology literacy remain out of reach for many in underserved communities.'],
                    ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Professional Networks', 'body' => 'Without connections to mentors and employers, talented people struggle to find their way in.'],
                    ['icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'label' => 'Mentorship', 'body' => 'Guidance from people who have walked the path before can be the difference between stalling and advancing.'],
                    ['icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Career Opportunities', 'body' => 'Even skilled individuals can be shut out of career pathways without the right access points.'],
                    ['icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'label' => 'Entrepreneurship Resources', 'body' => 'Building a business, accessing markets, and creating opportunity all depend on resources many don\'t have.'],
                ] as $i => $item)
                    <div class="reveal group border border-white/10 bg-white/5 p-7 rounded-xl hover:bg-white/[0.09] hover:border-white/20 transition-all duration-300" style="transition-delay: {{ $i * 60 }}ms">
                        <div class="flex h-10 w-10 items-center justify-center bg-[#0051d5]/25 rounded-lg border border-white/10 group-hover:bg-[#0051d5]/40 transition-colors">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#b5c7ea" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-[15px] font-bold text-white font-serif">{{ $item['label'] }}</h3>
                        <p class="mt-2 text-[13px] leading-[1.65] text-[#b5c7ea]/80 font-sans">{{ $item['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    @if($testimonials->isNotEmpty())
    <section class="bg-[#f6f3f2] py-[80px]" data-reveal-section>
        <div class="container-wide">
            <div class="flex items-end justify-between mb-10">
                <div>
                    <p class="eyebrow">Student Stories</p>
                    <h2 class="mt-3 font-serif text-[32px] font-bold leading-[1.15] tracking-[-0.5px] text-[#0b1f3a]">
                        Real people, real outcomes.
                    </h2>
                </div>
            </div>

            <div class="relative" id="testimonial-carousel">
                <div class="overflow-hidden" id="testimonial-track-outer">
                    <div class="flex transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]" id="testimonial-track">
                        @foreach ($testimonials as $i => $t)
                            <div class="testimonial-slide w-full flex-shrink-0 px-1 md:w-1/2 lg:w-1/3">
                                <div class="relative h-full border border-[#c4c6ce] bg-white rounded-xl p-8">
                                    <span class="absolute left-6 top-4 text-[48px] leading-none text-[#0051d5] opacity-10">&ldquo;</span>
                                    <p class="pt-8 text-[15px] italic leading-[1.65] text-[#44474d] font-serif">"{{ $t->quote }}"</p>
                                    <div class="mt-6 flex items-center gap-3">
                                        <div class="avatar avatar-blue">{{ $t->avatar_initial }}</div>
                                        <div>
                                            <p class="text-[14px] font-semibold text-[#0b1f3a]">{{ $t->name }}</p>
                                            <p class="text-[13px] text-[#44474d]">{{ $t->role }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button id="testimonial-prev" class="absolute left-0 top-1/2 z-10 -translate-x-4 -translate-y-1/2 flex h-10 w-10 items-center justify-center border border-[#c4c6ce] bg-white rounded-lg shadow-sm transition hover:border-[#0051d5] hover:text-[#0051d5] disabled:opacity-30" aria-label="Previous">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button id="testimonial-next" class="absolute right-0 top-1/2 z-10 translate-x-4 -translate-y-1/2 flex h-10 w-10 items-center justify-center border border-[#c4c6ce] bg-white rounded-lg shadow-sm transition hover:border-[#0051d5] hover:text-[#0051d5] disabled:opacity-30" aria-label="Next">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
                <div class="mt-8 flex justify-center gap-2" id="testimonial-dots"></div>
            </div>
        </div>
    </section>
    @endif

    {{-- WHY CHOOSE US — image LEFT, text right (reversed from before) --}}
    <section class="bg-white py-[100px] overflow-hidden" data-reveal-section>
        <div class="container-wide">
            <div class="grid items-center gap-16 lg:grid-cols-2 lg:gap-20">

                {{-- Image first (left on desktop) --}}
                <div class="why-item reveal order-last lg:order-first relative">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=900&q=80&auto=format&fit=crop"
                         alt="Mentor and student working together"
                         class="w-full object-cover rounded-2xl lg:aspect-[4/5] grayscale hover:grayscale-0 transition-all duration-700 shadow-[0_8px_40px_rgba(0,0,0,0.12)]">
                    {{-- Floating label --}}
                    <div class="absolute bottom-6 left-6 bg-white rounded-xl px-5 py-3 shadow-[0_4px_20px_rgba(0,0,0,0.12)] flex items-center gap-3">
                        <div class="h-2.5 w-2.5 rounded-full bg-[#0051d5] flex-shrink-0"></div>
                        <p class="text-[13px] font-bold text-[#0b1f3a]">100% free to all participants</p>
                    </div>
                </div>

                {{-- Text right --}}
                <div class="order-first lg:order-last">
                    <p class="eyebrow">Who We Serve</p>
                    <h2 class="mt-4 font-serif text-[36px] font-bold leading-[1.1] tracking-[-0.7px] text-[#0b1f3a]">
                        Opportunity takes<br>many forms.
                    </h2>

                    <div class="mt-8 flex flex-col gap-4">
                        @foreach ([
                            ['title' => 'Youth & students',        'body' => 'Helping young people explore technology, develop skills, and discover future possibilities.'],
                            ['title' => 'Adult learners & job seekers', 'body' => 'Providing opportunities to develop new skills and supporting individuals preparing for employment or new careers.'],
                            ['title' => 'Entrepreneurs',           'body' => 'Helping aspiring and emerging entrepreneurs build knowledge, capability, and connections.'],
                            ['title' => 'Community organizations & employers', 'body' => 'Working alongside organizations that serve local communities and connecting businesses with workforce talent.'],
                        ] as $i => $point)
                            <div class="why-item reveal flex gap-4 p-5 rounded-xl border border-[#e8ecf5] hover:border-[#c4c6ce] hover:shadow-[0_2px_8px_rgba(0,0,0,0.04)] transition-all duration-200" style="transition-delay: {{ $i * 80 }}ms">
                                <div class="mt-1 h-5 w-1.5 flex-shrink-0 rounded-full bg-[#0051d5]"></div>
                                <div>
                                    <h3 class="text-[15px] font-bold text-[#0b1f3a] font-serif">{{ $point['title'] }}</h3>
                                    <p class="mt-1 text-[13px] leading-[1.65] text-[#44474d]">{{ $point['body'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- GET INVOLVED — 2x2 spacious grid --}}
    <section class="bg-[#f6f3f2] py-[100px] border-y border-[#e5e2e1]" data-reveal-section>
        <div class="container-wide">
            <div class="grid lg:grid-cols-[1fr_2fr] gap-16 items-start">

                {{-- Left: sticky header --}}
                <div class="lg:sticky lg:top-28">
                    <p class="eyebrow">Get Involved</p>
                    <h2 class="mt-4 font-serif text-[34px] font-bold tracking-[-0.7px] text-[#0b1f3a] leading-[1.1]">There's a place for you here.</h2>
                    <p class="mt-4 text-[15px] text-[#44474d] leading-[1.7]">
                        Whether you want to learn, volunteer, mentor, partner, support, or create opportunities for others — every form of involvement moves the mission forward.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-6 btn btn-secondary inline-flex">Get in touch →</a>
                </div>

                {{-- Right: 2x2 grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach ([
                        ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Donate', 'body' => 'Invest in people, opportunity, and communities by funding our education, technology, and workforce initiatives.', 'route' => 'donate', 'cta' => 'Give Now'],
                        ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Volunteer', 'body' => 'Contribute your knowledge and experience as a mentor, instructor, career coach, or community ambassador.', 'route' => 'contact', 'cta' => 'Volunteer'],
                        ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Partner', 'body' => 'Bring your resources, expertise, and network to expand access, develop talent, and strengthen communities.', 'route' => 'contact', 'cta' => 'Partner With Us'],
                        ['icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Sponsor', 'body' => 'Sponsor a program, an initiative, or a participant and see direct impact on real lives.', 'route' => 'contact', 'cta' => 'Sponsor Now'],
                    ] as $i => $item)
                        <div class="reveal group border border-[#c4c6ce] bg-white rounded-xl p-7 flex flex-col hover:border-[#0051d5] hover:shadow-[0_6px_20px_rgba(0,81,213,0.08)] hover:-translate-y-0.5 transition-all duration-300" style="transition-delay: {{ $i * 80 }}ms">
                            <div class="flex h-11 w-11 items-center justify-center bg-[#dbe1ff] border border-[#c4c6ce] rounded-xl mb-5 group-hover:bg-[#0051d5] group-hover:border-[#0051d5] transition-all duration-300">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="1.5" class="group-hover:stroke-white transition-colors duration-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                                </svg>
                            </div>
                            <h3 class="font-serif text-[18px] font-bold text-[#0b1f3a]">{{ $item['label'] }}</h3>
                            <p class="mt-2 text-[14px] leading-[1.65] text-[#44474d] flex-1">{{ $item['body'] }}</p>
                            <a href="{{ route($item['route']) }}" class="mt-5 inline-flex items-center gap-1 text-[13px] font-bold text-[#0051d5] uppercase tracking-wide hover:underline underline-offset-4 font-sans">
                                {{ $item['cta'] }}
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="relative bg-[#0b1f3a] py-[100px] overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#0b1f3a] via-[#0b1f3a] to-[#0051d5]/20 pointer-events-none"></div>
        <div class="relative container-wide mx-auto max-w-[640px] text-center">
            <span class="hero-badge mb-6 inline-flex">Your Community. Your Future.</span>
            <h2 class="mt-2 font-serif text-[40px] font-bold leading-[1.08] tracking-[-1px] text-white sm:text-[48px]">
                Be Part of Expanding Opportunity.
            </h2>
            <p class="mx-auto mt-5 max-w-[480px] text-[16px] leading-[1.7] text-[#b5c7ea] font-sans">
                Together, we can build communities where opportunity is accessible, talent is developed, and people have the resources to thrive.
            </p>
            <div class="mt-10 flex flex-wrap gap-4 justify-center">
                <a href="{{ route('donate') }}" class="btn btn-accent btn-lg">Support Our Mission</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-white btn-lg">Partner With Us</a>
            </div>
            <p class="mt-6 text-[14px] text-[#b5c7ea]/70 font-sans">
                <a href="{{ route('contact') }}" class="transition-colors duration-200 hover:text-white">
                    Have questions? Contact our team →
                </a>
            </p>
        </div>
    </section>

</main>

@push('scripts')
<script>
(function () {
    var sections = document.querySelectorAll('[data-reveal-section]');
    sections.forEach(function (section) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.querySelectorAll('.reveal').forEach(function (el) {
                        el.classList.add('visible');
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.05, rootMargin: '0px 0px -40px 0px' });
        observer.observe(section);
    });
}());

(function () {
    var track    = document.getElementById('testimonial-track');
    var outer    = document.getElementById('testimonial-track-outer');
    var prevBtn  = document.getElementById('testimonial-prev');
    var nextBtn  = document.getElementById('testimonial-next');
    var dotsWrap = document.getElementById('testimonial-dots');
    if (!track) return;

    var slides = Array.from(track.querySelectorAll('.testimonial-slide'));
    var total = slides.length, current = 0, perView = 1, autoTimer = null;

    function getPerView() {
        if (window.innerWidth >= 1024) return Math.min(3, total);
        if (window.innerWidth >= 768)  return Math.min(2, total);
        return 1;
    }
    function buildDots() {
        dotsWrap.innerHTML = '';
        for (var i = 0; i < total - perView + 1; i++) {
            var dot = document.createElement('button');
            dot.className = 'h-2 rounded-full transition-all duration-300 ' + (i === 0 ? 'bg-[#0051d5] w-4' : 'bg-[#c4c6ce] w-2');
            dot.dataset.index = i;
            dot.addEventListener('click', function () { goTo(parseInt(this.dataset.index)); });
            dotsWrap.appendChild(dot);
        }
    }
    function updateDots() {
        Array.from(dotsWrap.children).forEach(function (dot, i) {
            dot.className = 'h-2 rounded-full transition-all duration-300 ' + (i === current ? 'bg-[#0051d5] w-4' : 'bg-[#c4c6ce] w-2');
        });
    }
    function goTo(index) {
        var maxIndex = total - perView;
        current = Math.max(0, Math.min(index, maxIndex));
        track.style.transform = 'translateX(-' + (current * (outer.offsetWidth / perView)) + 'px)';
        prevBtn.disabled = current === 0;
        nextBtn.disabled = current >= maxIndex;
        updateDots();
    }
    function setup() {
        perView = getPerView();
        slides.forEach(function (s) { s.style.width = (100 / perView) + '%'; });
        if (current > total - perView) current = Math.max(0, total - perView);
        buildDots(); goTo(current);
    }
    prevBtn.addEventListener('click', function () { goTo(current - 1); resetAuto(); });
    nextBtn.addEventListener('click', function () { goTo(current + 1); resetAuto(); });
    function resetAuto() {
        clearInterval(autoTimer);
        autoTimer = setInterval(function () { goTo(current + 1 > total - perView ? 0 : current + 1); }, 5000);
    }
    window.addEventListener('resize', setup);
    setup(); resetAuto();
}());
</script>
@endpush
@endsection
