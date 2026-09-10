@extends('layouts.app')

@section('title', 'Our Programs — Innovate Hub Foundation')

@section('content')
<main>

    {{-- PAGE HERO --}}
    <section class="bg-[#f6f3f2] px-4 py-[120px] pb-20 text-center pt-[calc(72px+80px)] md:px-6 md:py-[100px] md:pt-[calc(72px+80px)] lg:px-12">
        <div class="container-wide">
            <p class="eyebrow mx-auto">Our Community Initiatives</p>
            <h1 class="mx-auto mt-5 max-w-[560px] font-serif text-[38px] font-bold leading-[1.08] tracking-[-1px] text-[#0b1f3a] sm:text-[48px]">
                Practical skills for a changing world.
            </h1>
            <p class="mx-auto mt-5 max-w-[480px] text-[16px] leading-[1.7] text-[#44474d]">
                Our programs provide accessible opportunities to develop technical, professional, and entrepreneurial capabilities — for youth, adults, job seekers, entrepreneurs, and organizations alike.
            </p>
            <div class="mt-8 flex items-center justify-center gap-6 flex-wrap">
                <div class="flex items-center gap-2">
                    <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                        <svg width="9" height="9" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="text-[13px] text-[#44474d] font-sans">100% free, always</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                        <svg width="9" height="9" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="text-[13px] text-[#44474d] font-sans">Community-driven, partner-supported</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                        <svg width="9" height="9" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="text-[13px] text-[#44474d] font-sans">Open to all, no degree required</span>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAM GRID --}}
    <section class="bg-white py-[100px]" data-reveal-section>
        <div class="container-wide">
            <div class="grid gap-8 md:grid-cols-2">
                @foreach ($programs as $i => $program)
                    <div class="program-detail-card reveal group overflow-hidden rounded-2xl border border-[#c4c6ce] bg-white shadow-[0_1px_4px_rgba(0,0,0,0.05)] transition-all duration-500 hover:shadow-[0_8px_30px_rgba(0,81,213,0.10)] hover:border-[#0051d5] hover:-translate-y-1"
                         style="transition-delay: {{ $i * 80 }}ms; transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);">
                        <div class="aspect-video w-full overflow-hidden bg-cover bg-center transition-transform duration-700 group-hover:scale-[1.02]"
                             style="background-image: url('{{ $program->image }}');">
                        </div>
                        <div class="p-8 md:p-10">
                            <h3 class="font-serif text-[24px] font-bold tracking-[-0.3px] text-[#0b1f3a]">{{ $program->title }}</h3>
                            <p class="mt-3 text-[15px] leading-[1.7] text-[#44474d]">{{ $program->long }}</p>

                            <div class="mt-5 flex flex-wrap gap-2">
                                @foreach ($program->skills as $skill)
                                    <span class="skill-chip">{{ $skill }}</span>
                                @endforeach
                            </div>

                            <div class="mt-5 flex flex-wrap items-center gap-4">
                                <span class="inline-flex items-center gap-1.5 rounded-lg bg-[#f6f3f2] px-3 py-1.5 text-[12px] font-medium text-[#44474d] border border-[#c4c6ce]">
                                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>
                                    {{ $program->duration }}
                                </span>
                                <span class="text-[13px] text-[#44474d]">{{ $program->format }}</span>
                            </div>

                            <div class="mt-7 flex gap-3 pt-5 border-t border-[#f0edec]">
                                <a href="{{ route('apply') }}?program={{ $program->slug }}"
                                   class="inline-flex items-center rounded-lg bg-[#0051d5] px-5 py-2.5 text-[14px] font-semibold text-white transition-all hover:-translate-y-px hover:bg-[#316bf3] hover:shadow-[0_4px_12px_rgba(0,81,213,0.30)]">
                                    Apply Now
                                </a>
                                <a href="{{ route('programs.show', $program) }}"
                                   class="inline-flex items-center gap-1 text-[14px] text-[#0051d5] underline-offset-4 hover:underline self-center font-medium transition-colors">
                                    Full details
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-[#0b1f3a] py-20 text-center">
        <div class="container-wide">
            <h2 class="font-serif text-[32px] font-bold leading-tight tracking-[-0.5px] text-white sm:text-[40px]">
                Not sure which to choose?
            </h2>
            <p class="mt-4 text-[16px] text-white/60 mb-8 max-w-[52ch] mx-auto leading-relaxed font-sans">
                Our team can help you find the right initiative for you. Short conversation, no pressure.
            </p>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center rounded-lg bg-white px-8 py-3.5 text-[14px] font-semibold text-[#0b1f3a] transition-all hover:bg-[#f6f3f2]">
                Talk to our team
            </a>
        </div>
    </section>

</main>

@push('scripts')
<script>
(function () {
    document.querySelectorAll('[data-reveal-section] .reveal').forEach(function (el) {
        el.classList.add('visible');
    });
}());
</script>
@endpush
@endsection
