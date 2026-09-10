@extends('layouts.app')

@section('title', $program->title . ' — Innovate Hub Foundation')

@section('content')
<main>

    {{-- PAGE HERO --}}
    <section class="bg-[#f6f3f2] pt-[calc(72px+80px)] pb-20 md:pt-[calc(72px+80px)] md:pb-0 md:py-[100px]">
        <div class="container-wide">
            <p class="eyebrow">Program {{ $program->num }}</p>
            <h1 class="mt-5 font-serif text-[38px] font-bold leading-[1.07] tracking-[-1px] text-[#0b1f3a] sm:text-[50px] lg:text-[58px]">
                {{ $program->title }}.
            </h1>
            <p class="mt-4 max-w-[540px] text-[17px] leading-[1.7] text-[#44474d]">{{ $program->long }}</p>
        </div>
    </section>

    {{-- DETAIL --}}
    <section class="bg-white py-[80px] pb-[120px]">
        <div class="container-wide">
            <div class="overflow-hidden rounded-2xl border border-[#c4c6ce] shadow-[0_4px_24px_rgba(0,0,0,0.07)]">
                <div class="grid grid-cols-1 lg:grid-cols-[55%_45%]">

                    {{-- Body --}}
                    <div class="p-8 md:p-12 flex flex-col justify-between">
                        <div>
                            <div class="inline-flex items-center gap-2 h-7 px-3 rounded-full bg-[#dbe1ff] border border-[#b4c5ff] text-[12px] text-[#00174b] mb-6 font-sans font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background: {{ $program->color }};"></span>
                                <span>Program {{ $program->num }}</span>
                            </div>
                            <h2 class="font-serif text-[28px] font-bold tracking-[-0.3px] text-[#0b1f3a] mb-4">What you'll learn</h2>
                            <p class="text-[15px] leading-relaxed text-[#44474d] mb-6 max-w-[48ch]">{{ $program->short }}</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($program->skills as $skill)
                                    <span class="skill-chip">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <div class="flex gap-8 mb-8 mt-10">
                                <div>
                                    <div class="text-[11px] font-medium uppercase tracking-[0.06em] text-[#75777e] mb-1 font-sans">Duration</div>
                                    <div class="text-[15px] font-semibold text-[#0b1f3a]">{{ $program->duration }}</div>
                                </div>
                                <div>
                                    <div class="text-[11px] font-medium uppercase tracking-[0.06em] text-[#75777e] mb-1 font-sans">Format</div>
                                    <div class="text-[15px] font-semibold text-[#0b1f3a]">{{ $program->format }}</div>
                                </div>
                                <div>
                                    <div class="text-[11px] font-medium uppercase tracking-[0.06em] text-[#75777e] mb-1 font-sans">Tuition</div>
                                    <div class="text-[15px] font-semibold text-[#0b1f3a]">Free</div>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('apply') }}?program={{ $program->slug }}"
                                   class="inline-flex items-center rounded-lg bg-[#0051d5] px-6 py-3 text-[14px] font-semibold text-white transition-all hover:-translate-y-px hover:bg-[#316bf3]">
                                    Apply to this program
                                </a>
                                <a href="{{ route('programs.index') }}"
                                   class="inline-flex items-center rounded-lg border border-[#c4c6ce] px-6 py-3 text-[14px] font-medium text-[#0051d5] transition-all hover:border-[#0051d5]">
                                    All programs
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Visual --}}
                    <div class="relative bg-cover bg-center flex flex-col justify-between p-8 min-h-[300px] lg:min-h-[500px]"
                         style="background-image: url('{{ $program->image }}');">
                        <div class="absolute inset-0 bg-[#0b1f3a]/50 lg:rounded-r-xl"></div>
                        <div class="relative flex justify-between text-[12px] text-white/70 uppercase tracking-wider font-sans">
                            <span>{{ $program->num }} — {{ strtoupper($program->slug) }}</span>
                        </div>
                        <div class="relative text-[140px] leading-none text-white/15 select-none -mb-4">{{ $program->glyph }}</div>
                        <div class="relative flex justify-between text-[12px] text-white/70 font-sans">
                            <span>{{ $program->duration }}</span>
                            <span>{{ $program->format }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
@endsection
