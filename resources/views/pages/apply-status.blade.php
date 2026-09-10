@extends('layouts.app')

@section('title', 'Check application status — Innovate Hub')

@section('content')
<main class="fade-in">

    {{-- PAGE HERO --}}
    <section class="pt-24 pb-[72px] border-b border-line">
        <div class="container-wide">
            <div class="font-sans text-xs text-blue tracking-[0.06em] uppercase mb-5 font-semibold">— Application status</div>
            <h1 class="font-serif font-bold text-[40px] sm:text-[52px] lg:text-[64px] leading-[1.05] tracking-[-0.028em] text-ink mb-10 max-w-[20ch]">
                Where does your <em class="italic font-normal">application</em> stand?
            </h1>
            <p class="text-[19px] leading-[1.55] text-muted max-w-[52ch]">
                Enter the email address you used when you applied and we'll show you the current status of your application.
            </p>
        </div>
    </section>

    {{-- LOOKUP --}}
    <section class="section">
        <div class="container-wide">
            <div class="max-w-[680px] mx-auto">
                <livewire:application-status />
            </div>
        </div>
    </section>

    {{-- NUDGE --}}
    <section class="pb-24 border-t border-line">
        <div class="container-wide max-w-[680px] mx-auto pt-10">
            <p class="text-sm text-muted">
                Haven't applied yet?
                <a class="text-blue hover:underline" href="{{ route('apply') }}">Submit an application</a>.
                &nbsp;·&nbsp;
                Questions? <a class="text-blue hover:underline" href="{{ route('contact') }}">Contact us</a>.
            </p>
        </div>
    </section>

</main>
@endsection
