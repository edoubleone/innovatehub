@extends('layouts.app')

@section('title', 'Apply — Innovate Hub')

@section('content')
<main>

    {{-- PAGE HERO --}}
    <section class="bg-[#f6f3f2] pt-[calc(72px+80px)] pb-20 text-center md:py-[80px] md:pt-[calc(72px+80px)]">
        <div class="container-wide">
            <p class="eyebrow mx-auto">Apply to Innovate Hub</p>
            <h1 class="mx-auto mt-4 max-w-[600px] font-serif text-[36px] font-bold leading-[1.1] tracking-[-0.8px] text-[#0b1f3a] sm:text-[42px]">
                Start your application.
            </h1>
            <p class="mx-auto mt-4 max-w-[480px] text-[16px] leading-[1.65] text-[#44474d]">
                Fifteen minutes to complete. No essays, no application fees. We read every single one.
            </p>
        </div>
    </section>

    {{-- FORM --}}
    <section class="bg-white py-[80px] pb-[120px]">
        <div class="container-wide max-w-[840px]">
                <livewire:application-form />

            <p class="text-[14px] text-[#44474d] text-center mt-8">
                Already applied?
                <a class="text-[#0051d5] underline-offset-4 hover:underline" href="{{ route('apply.status') }}">Check your application status</a>.
                &nbsp;·&nbsp;
                Have a question?
                <a class="text-[#0051d5] underline-offset-4 hover:underline" href="{{ route('contact') }}">Contact us</a>.
            </p>
        </div>
    </section>

</main>
@endsection
