@extends('layouts.app')

@section('title', 'Thank You — Innovate Hub Foundation')

@section('content')
<main>
    <section class="bg-[#0b1f3a] pt-20 pb-[80px]">
        <div class="container-wide max-w-[640px] text-center">
            <div class="mx-auto mb-8 flex h-16 w-16 items-center justify-center rounded-full bg-[#0051d5]">
                <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <span class="inline-block bg-[#dbe1ff] text-[#00174b] px-3 py-1 text-[11px] font-bold rounded-sm mb-5 uppercase tracking-widest font-sans">
                Gift Received
            </span>

            <h1 class="font-serif text-[40px] font-bold leading-[1.1] tracking-[-1px] text-white sm:text-[50px]">
                Thank you for<br>
                <span class="text-[#b5c7ea]">your generosity.</span>
            </h1>

            <p class="mt-6 text-[17px] leading-[1.7] text-[#b5c7ea]">
                Your donation is making a real difference for students in Maryland.
                @if($donation && $donation->frequency === 'monthly')
                    Your monthly gift of <strong class="text-white">${{ number_format($donation->amount, 2) }}</strong> will be charged each month.
                @elseif($donation)
                    Your gift of <strong class="text-white">${{ number_format($donation->amount, 2) }}</strong> has been processed successfully.
                @endif
            </p>

            @if($donation && !$donation->is_anonymous && $donation->email)
                <p class="mt-3 text-[14px] text-[#b5c7ea]">
                    A receipt has been sent to <strong class="text-white">{{ $donation->email }}</strong>.
                </p>
            @endif

            <div class="mt-10 flex flex-wrap gap-4 justify-center">
                <a href="{{ route('home') }}" class="btn btn-accent btn-lg">Back to Home</a>
                <a href="{{ route('programs.index') }}" class="btn btn-outline-white btn-lg">See Our Programs</a>
            </div>
        </div>
    </section>
</main>
@endsection
