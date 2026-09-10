@extends('layouts.app')

@section('title', 'Application received — Innovate Hub')

@section('content')
<main class="fade-in">
    <section class="bg-[#f6f3f2] pt-24 pb-[72px]">
        <div class="container-wide">
            <div class="max-w-[640px] mx-auto my-20 text-center">
                <div class="w-14 h-14 rounded-full bg-[#dbe1ff] text-[#0051d5] grid place-items-center mx-auto mb-5">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="font-serif font-bold text-[36px] leading-tight tracking-[-0.018em] text-[#0b1f3a] mb-3">Application received.</h3>
                <p class="text-[15px] leading-relaxed text-muted max-w-[42ch] mx-auto mb-6">
                    Thank you{{ $firstName ? ", {$firstName}" : '' }}. A member of our admissions team will be in touch within 2 business days with next steps.
                </p>
                <a class="btn btn-secondary" href="{{ route('home') }}">Back to home</a>
            </div>
        </div>
    </section>
</main>
@endsection
