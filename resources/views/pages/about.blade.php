@extends('layouts.app')

@section('title', 'About — Innovate Hub Foundation')

@section('content')
<main>

    {{-- PAGE HERO --}}
    <section class="my-10 relative bg-[#0b1f3a] pt-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?w=1600&q=80&auto=format&fit=crop"
                 alt="" class="w-full h-full object-cover opacity-[0.14]">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f3a] via-[#0b1f3a]/85 to-[#0b1f3a]/30"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1f3a]/50 via-transparent to-transparent"></div>
        </div>
        <div class="relative container-wide py-[100px]">
            <div class="">
                <span class="hero-badge mb-6 inline-flex">
                    About Us
                </span>
                <h1 class="font-serif text-[44px] font-bold leading-[1.07] tracking-[-1.5px] text-white sm:text-[56px] lg:text-[62px]">
                    Building Stronger Communities Through Opportunity.
                </h1>
                <p class="mt-6 max-w-2xl text-[17px] leading-[1.7] text-[#b5c7ea] font-sans">
                    Innovate Hub Foundation is committed to developing practical solutions that expand access to education, technology, workforce opportunities, entrepreneurship, and community resources — based in Dundalk, Maryland and open to all.
                </p>
            </div>
        </div>
    </section>

    {{-- ABOUT BODY --}}
    <section class="bg-white py-[100px]">
        <div class="container-wide grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div>
                <p class="text-[15px] leading-[1.7] text-[#44474d] mb-4">
                    Innovate Hub Foundation is a community-based nonprofit organization committed to creating pathways to opportunity for individuals and communities through education, technology, workforce development, entrepreneurship, and strategic partnerships.
                </p>
                <p class="text-[15px] leading-[1.7] text-[#44474d]">
                    We believe meaningful change happens when people have access to the knowledge, resources, relationships, and opportunities necessary to reach their potential. Our work is built around collaboration, accessibility, innovation, accountability, and measurable community impact — one person, one partnership, and one community at a time.
                </p>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=900&q=80&auto=format&fit=crop"
                     alt="Team working together"
                     class="w-full object-cover rounded-xl lg:aspect-square grayscale hover:grayscale-0 transition-all duration-700">
            </div>
        </div>
    </section>

    {{-- MISSION & VISION: BENTO --}}
    <section class="py-[100px] bg-[#f6f3f2]">
        <div class="container-wide">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">

                {{-- Mission Card --}}
                <div class="lg:col-span-7 bg-white border border-[#c4c6ce] rounded-2xl p-12 flex flex-col justify-center shadow-[0_2px_12px_rgba(0,0,0,0.04)]">
                    <span class="material-symbols-outlined text-[#0051d5] text-4xl mb-5" style="font-variation-settings:'FILL' 0,'wght' 300,'GRAD' 0,'opsz' 24">rocket_launch</span>
                    <h2 class="font-serif text-[34px] font-bold text-[#0b1f3a] mb-5 tracking-[-0.6px]">Our Mission</h2>
                    <p class="text-[17px] leading-[1.75] text-[#44474d] mb-8">
                        We believe every community has talent, potential, and ideas. Our work is focused on helping individuals overcome barriers to education, technology, employment, and economic opportunity — through accessible learning, community programs, mentorship, workforce initiatives, entrepreneurship support, and strategic partnerships. Our goal is simple: expand opportunity and strengthen communities.
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="h-[2px] bg-[#0051d5] flex-1 rounded-full"></div>
                        <span class="text-[11px] font-bold text-[#003ea8] uppercase tracking-widest font-sans">Creating Pathways to Opportunity</span>
                    </div>
                </div>

                {{-- Image --}}
                <div class="lg:col-span-5 h-[400px] lg:h-auto overflow-hidden rounded-xl">
                    <img src="https://images.unsplash.com/photo-1544717297-fa95b6ee9643?w=900&q=80&auto=format&fit=crop"
                         alt="Mentor with students"
                         class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                </div>

                {{-- Vision Card --}}
                <div class="lg:col-span-5 bg-[#0b1f3a] rounded-2xl p-12 text-white flex flex-col justify-center shadow-[0_4px_20px_rgba(11,31,58,0.15)]">
                    <h2 class="font-serif text-[30px] font-bold mb-5 tracking-[-0.5px]">Our Vision</h2>
                    <p class="text-[16px] leading-[1.75] text-[#b5c7ea] font-sans">
                        A future where opportunity is within reach — where young people can discover their potential, adults can build new skills, job seekers can access career pathways, entrepreneurs can build sustainable businesses, and organizations can access the resources needed to create lasting community impact.
                    </p>
                </div>

                {{-- Focus Cards --}}
                <div class="lg:col-span-7 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border border-[#c4c6ce] rounded-xl p-8 hover:border-[#0051d5] hover:shadow-[0_4px_16px_rgba(0,81,213,0.08)] transition-all duration-200 bg-white group">
                        <span class="material-symbols-outlined text-[#003ea8] text-2xl mb-4 block group-hover:text-[#0051d5] transition-colors" style="font-variation-settings:'FILL' 0,'wght' 300,'GRAD' 0,'opsz' 24">account_balance</span>
                        <h3 class="font-serif text-[19px] font-bold text-[#0b1f3a] mb-2">Accountability</h3>
                        <p class="text-[14px] leading-[1.65] text-[#44474d]">We take responsibility for our commitments and results, and are building frameworks for transparency with our community partners.</p>
                    </div>
                    <div class="border border-[#c4c6ce] rounded-xl p-8 hover:border-[#0051d5] hover:shadow-[0_4px_16px_rgba(0,81,213,0.08)] transition-all duration-200 bg-white group">
                        <span class="material-symbols-outlined text-[#003ea8] text-2xl mb-4 block group-hover:text-[#0051d5] transition-colors" style="font-variation-settings:'FILL' 0,'wght' 300,'GRAD' 0,'opsz' 24">diversity_3</span>
                        <h3 class="font-serif text-[19px] font-bold text-[#0b1f3a] mb-2">Community Impact</h3>
                        <p class="text-[14px] leading-[1.65] text-[#44474d]">Directing our work toward the most pressing community needs to create measurable improvements in quality of life.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- WHAT WE DO --}}
    <section class="bg-white py-[80px]" data-reveal-section>
        <div class="container-wide">
            <p class="eyebrow">What We Do</p>
            <h2 class="mt-3 text-[32px] font-bold leading-[1.15] tracking-[-0.5px] text-[#0b1f3a] max-w-[520px]">
                Six ways we close the gap.
            </h2>
            <p class="mt-4 max-w-[520px] text-[15px] leading-[1.65] text-[#44474d]">
                The barriers to opportunity are multi-dimensional — so is our response to them.
            </p>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['n' => '01', 'title' => 'Digital Skills & Technology',       'body' => 'Expanding access to practical technology education — digital literacy, data analytics, data science, AI, machine learning, SQL, Python, Power BI, and Tableau.'],
                    ['n' => '02', 'title' => 'Workforce & Career Development',    'body' => 'Career readiness, professional development, resume development, interview preparation, career coaching, mentorship, and employer connections.'],
                    ['n' => '03', 'title' => 'Youth & STEM',                      'body' => 'Introducing students to STEM, artificial intelligence, technology, coding, innovation challenges, entrepreneurship, and leadership development.'],
                    ['n' => '04', 'title' => 'Education & Lifelong Learning',     'body' => 'Practical learning opportunities — technology training, digital literacy, community workshops, skills bootcamps, and career education — accessible beyond the classroom.'],
                    ['n' => '05', 'title' => 'Entrepreneurship & Economic Empowerment', 'body' => 'Entrepreneurship education, business technology, digital marketing, AI for business, business analytics, and mentorship for aspiring business owners.'],
                    ['n' => '06', 'title' => 'Community Partnerships',            'body' => 'We don\'t work in isolation. We build deep partnerships with schools, nonprofits, businesses, employers, universities, and government agencies to maximize reach.'],
                ] as $i => $item)
                    <div class="reveal border border-[#c4c6ce] rounded-xl p-8 bg-white hover:border-[#0051d5] transition-colors" style="transition-delay: {{ $i * 70 }}ms">
                        <p class="text-[11px] font-bold tracking-widest text-[#0051d5] uppercase font-sans">{{ $item['n'] }}</p>
                        <h3 class="mt-3 font-serif text-[18px] font-bold text-[#0b1f3a]">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-[14px] leading-[1.65] text-[#44474d]">{{ $item['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- WHY WE EXIST --}}
    <section class="bg-[#f6f3f2] py-[80px]">
        <div class="container-wide">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach ([
                    ['title' => 'Free. Always.',               'body' => 'Our programs are fully funded by donors and mission-aligned partners. We will never charge participants — not now, not as we grow.'],
                    ['title' => 'Community before credentials', 'body' => "We don't care about your GPA or your résumé. We care about your hunger to grow. If you're motivated and part of this community, you belong here."],
                    ['title' => 'Accountable to our community', 'body' => 'We measure our progress by what changes — people reached, skills developed, opportunities created — and we intend to share those results openly.'],
                ] as $card)
                    <div class="p-8 border border-[#c4c6ce] bg-white rounded-xl hover:border-[#0051d5] transition-colors">
                        <h3 class="font-serif text-[17px] font-bold text-[#0b1f3a] mb-3">{{ $card['title'] }}</h3>
                        <p class="text-[15px] leading-[1.65] text-[#44474d]">{{ $card['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- OUR VALUES --}}
    <section class="bg-white py-[80px]" data-reveal-section>
        <div class="container-wide">
            <div class="text-center">
                <p class="eyebrow mx-auto">Our Values</p>
                <h2 class="mt-3 text-[32px] font-bold leading-[1.15] tracking-[-0.5px] text-[#0b1f3a]">
                    What guides our work.
                </h2>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Community',      'body' => 'We listen to and work alongside the communities we serve.'],
                    ['title' => 'Access',         'body' => 'We work to reduce barriers to education, technology, and opportunity.'],
                    ['title' => 'Equity',         'body' => 'We believe everyone deserves a fair opportunity to develop their potential.'],
                    ['title' => 'Collaboration',  'body' => 'We believe lasting impact requires strong partnerships.'],
                    ['title' => 'Excellence',     'body' => 'We pursue high standards in everything we do.'],
                    ['title' => 'Accountability', 'body' => 'We take responsibility for our commitments and results.'],
                    ['title' => 'Innovation',     'body' => 'We embrace ideas and technologies that can improve lives and communities.'],
                ] as $i => $value)
                    <div class="reveal border border-[#c4c6ce] rounded-xl p-7 hover:border-[#0051d5] transition-colors" style="transition-delay: {{ $i * 60 }}ms">
                        <h3 class="font-serif text-[16px] font-bold text-[#0b1f3a] mb-2">{{ $value['title'] }}</h3>
                        <p class="text-[14px] leading-[1.6] text-[#44474d]">{{ $value['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TEAM — only shown when real team members exist --}}
    @if($team->isNotEmpty())
    <section class="bg-white py-[80px]" data-reveal-section>
        <div class="container-wide">
            <div class="text-center">
                <p class="eyebrow mx-auto">Our Team</p>
                <h2 class="mt-3 text-[32px] font-bold leading-[1.15] tracking-[-0.5px] text-[#0b1f3a]">
                    The people behind the mission.
                </h2>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($team as $i => $member)
                    <div class="team-card reveal overflow-hidden border border-[#c4c6ce] bg-white rounded-xl"
                         style="transition-delay: {{ $i * 80 }}ms">
                        <div class="aspect-square w-full bg-cover bg-center bg-[#dbe1ff]"
                             style="background-image: url('{{ $member->image }}');"></div>
                        <div class="p-5">
                            <p class="font-serif text-[15px] font-bold text-[#0b1f3a]">{{ $member->name }}</p>
                            <p class="mt-1 text-[13px] text-[#44474d]">{{ $member->role }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- FOUNDERS NOTE --}}
    <section class="bg-white py-[100px]">
        <div class="container-wide">
            <div class="max-w-[720px] mx-auto border border-[#c4c6ce] rounded-2xl p-10 md:p-14 bg-[#f6f3f2] relative overflow-hidden">
                <div class="absolute top-6 left-8 text-[120px] leading-none text-[#0051d5]/[0.07] font-serif select-none pointer-events-none">&ldquo;</div>
                <p class="eyebrow mb-6 relative">A note from our founders</p>
                <p class="font-serif text-[19px] leading-[1.75] text-[#44474d] italic mb-6 relative">
                    "We started Innovate Hub Foundation because we kept seeing the same thing: bright, ambitious people in our communities who had everything it takes — except access. Talent is everywhere, but access is not. This foundation is our answer. We're early, we're learning, and we are fully committed to building pathways that transform lives — one person, one partnership, and one community at a time."
                </p>
                <div class="flex items-center gap-3 relative">
                    <div class="w-6 h-[2px] bg-[#0051d5] rounded-full"></div>
                    <p class="text-[13px] font-semibold text-[#44474d]">The Innovate Hub Founding Team</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="bg-[#0b1f3a] py-[80px]">
        <div class="container-wide mx-auto max-w-[680px] text-center">
            <h2 class="font-serif text-[32px] font-bold leading-[1.1] tracking-[-0.8px] text-white">
                Be Part of Expanding Opportunity.
            </h2>
            <p class="mt-5 text-[16px] leading-[1.65] text-[#b5c7ea] mb-10 max-w-[52ch] mx-auto font-sans">
                Whether you want to learn, volunteer, mentor, partner, support, or create opportunities for others, there is a place for you at Innovate Hub.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('programs.index') }}" class="btn btn-accent btn-lg">Explore Our Programs</a>
                <a href="{{ route('donate') }}" class="btn btn-outline-white btn-lg">Support Our Mission</a>
            </div>
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
</script>
@endpush
@endsection
