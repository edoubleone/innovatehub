@extends('layouts.app')

@section('title', $page['title'] . ' — Innovate Hub')

@section('content')
<main class="fade-in">

    {{-- PAGE HERO --}}
    <section class="pt-24 pb-[72px] border-b border-line">
        <div class="container-wide">
            <div class="font-sans text-xs text-blue tracking-[0.06em] uppercase mb-5 font-semibold">{{ $page['eyebrow'] }}</div>
            <h1 class="font-serif font-bold text-[48px] sm:text-[64px] leading-[1.05] tracking-[-0.028em] text-ink mb-5 max-w-[20ch]">{{ $page['title'] }}</h1>
            <p class="text-[18px] leading-[1.55] text-muted max-w-[58ch] mb-8">{{ $page['sub'] }}</p>
            <div class="font-sans text-xs text-muted tracking-[0.04em] pt-5 border-t border-line inline-block pr-20">{{ $page['updated'] }}</div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="section">
        <div class="container-wide">
            <div class="grid grid-cols-[280px_1fr] gap-24 items-start">

                {{-- TOC --}}
                <aside class="sticky top-24">
                    <div class="font-sans text-[11px] text-muted tracking-[0.08em] uppercase mb-5 font-semibold">— Contents</div>
                    <ol class="list-none border-t border-line">
                        @foreach ($page['sections'] as $section)
                            <li class="border-b border-line">
                                <a href="#s-{{ $section['n'] }}"
                                   class="grid grid-cols-[36px_1fr] gap-3 py-3.5 text-sm text-ink-soft hover:text-blue transition-colors items-start">
                                    <span class="font-mono text-[11px] text-muted tracking-[0.04em] pt-0.5">{{ $section['n'] }}</span>
                                    <span>{{ $section['title'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ol>

                    <div class="mt-12">
                        <div class="font-sans text-[11px] text-muted tracking-[0.08em] uppercase mb-5 font-semibold">— Also see</div>
                        <div class="flex flex-col gap-3">
                            @if ($kind === 'privacy')
                                <a href="{{ route('legal.terms') }}" class="inline-flex items-center gap-2 text-sm text-ink font-medium hover:text-blue transition-colors">
                                    Terms of Service
                                    <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M1 7h12m0 0L8 2m5 5l-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </a>
                            @else
                                <a href="{{ route('legal.privacy') }}" class="inline-flex items-center gap-2 text-sm text-ink font-medium hover:text-blue transition-colors">
                                    Privacy Policy
                                    <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M1 7h12m0 0L8 2m5 5l-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </aside>

                {{-- Body --}}
                <div class="max-w-[680px]">
                    @foreach ($page['sections'] as $section)
                        <article id="s-{{ $section['n'] }}" class="py-12 border-t border-line first:border-0 first:pt-0">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="font-serif text-[20px] text-muted tracking-[-0.01em]">{{ $section['n'] }}</span>
                                <span class="font-sans text-[11px] text-muted tracking-[0.08em] uppercase font-semibold">{{ $section['label'] }}</span>
                            </div>
                            <h2 class="font-serif font-bold text-[32px] leading-[1.1] tracking-[-0.018em] text-ink mb-5">{{ $section['title'] }}</h2>
                            @foreach ($section['body'] as $paragraph)
                                <p class="text-[16px] leading-[1.7] text-ink-soft mb-4 last:mb-0">{{ $paragraph }}</p>
                            @endforeach
                        </article>
                    @endforeach

                    <div class="mt-12 p-8 bg-surface border border-line rounded-xl flex items-center justify-between gap-6">
                        <div>
                            <div class="font-sans text-[11px] text-muted tracking-[0.08em] uppercase mb-2 font-semibold">Questions?</div>
                            <div class="font-serif text-[24px] text-ink leading-snug">
                                <a class="hover:text-blue transition-colors" href="mailto:info@innovatehub.com">info@innovatehub.com</a>
                            </div>
                        </div>
                        <a class="btn btn-secondary flex-shrink-0" href="{{ route('apply') }}">Contact us</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
