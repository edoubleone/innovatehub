@extends('layouts.app')

@section('title', 'Donate — Support Innovate Hub Foundation')

@section('content')
<main>

    {{-- HERO --}}
    <section class="relative bg-[#0b1f3a] pt-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?w=1600&q=80&auto=format&fit=crop"
                 alt="" class="w-full h-full object-cover opacity-[0.14]">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f3a] via-[#0b1f3a]/85 to-[#0b1f3a]/30"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1f3a]/50 via-transparent to-transparent"></div>
        </div>
        <div class="relative container-wide py-[100px]">
            <div class="max-w-3xl">
                <span class="hero-badge mb-6 inline-flex">
                    Support Our Mission
                </span>
                <h1 class="font-serif text-[44px] font-bold leading-[1.07] tracking-[-1.5px] text-white sm:text-[56px] lg:text-[62px]">
                    Invest in People.<br>
                    <span class="text-[#b5c7ea]">Invest in Opportunity.</span>
                </h1>
                <p class="mt-6 max-w-2xl text-[17px] leading-[1.7] text-[#b5c7ea] font-sans">
                    Your support helps Innovate Hub Foundation expand access to education, technology, workforce development, mentorship, and community initiatives. Every dollar goes directly toward our mission — no strings attached.
                </p>
                <div class="mt-8 flex flex-wrap gap-6">
                    <div class="flex items-center gap-2">
                        <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="text-[13px] text-[#b5c7ea] font-sans">Nonprofit organization — gifts may be tax deductible</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="text-[13px] text-[#b5c7ea] font-sans">100% of gifts fund programs</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="text-[13px] text-[#b5c7ea] font-sans">Transparent reporting</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- IMPACT EXAMPLES --}}
    <section class="bg-white border-b border-[#e8ecf5] py-14">
        <div class="container-wide">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-px bg-[#e8ecf5] overflow-hidden rounded-2xl shadow-[0_1px_4px_rgba(0,0,0,0.04)]">
                @foreach ([
                    ['number' => '$25',   'label' => 'A community workshop session'],
                    ['number' => '$100',  'label' => 'A full week of hands-on training'],
                    ['number' => '$500',  'label' => 'A scholarship toward a program'],
                    ['number' => '$2,500','label' => 'Sponsors a complete participant journey'],
                ] as $i => $item)
                    <div class="bg-white px-8 py-8 text-center">
                        <p class="font-serif text-[40px] font-bold tracking-[-1.5px] text-[#0051d5] leading-none">{{ $item['number'] }}</p>
                        <p class="mt-2 text-[12px] font-medium text-[#44474d] leading-[1.5] max-w-[130px] mx-auto">{{ $item['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- DONATION FORM + SIDEBAR --}}
    <section class="bg-[#f6f3f2] py-[80px]">
        <div class="container-wide grid gap-16 lg:grid-cols-[55%_45%] lg:gap-20">

            {{-- Donation Form --}}
            <div>
                <p class="eyebrow">Make a Gift</p>
                <h2 class="mt-3 font-serif text-[30px] font-bold tracking-[-0.5px] text-[#0b1f3a]">Choose your donation</h2>
                <p class="mt-2 text-[15px] text-[#44474d] mb-8">Every amount makes a real difference in a real person's life.</p>

                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-5 py-4 text-[14px] font-medium rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('donate.store') }}" id="donate-form"
                      class="bg-white border border-[#c4c6ce] rounded-xl p-8 md:p-10">
                    @csrf

                    {{-- Hidden amount field synced by JS --}}
                    <input type="hidden" name="amount" id="amount-field" value="100">

                    {{-- Preset amounts --}}
                    <div class="mb-6">
                        <p class="text-[13px] font-bold uppercase tracking-wider text-[#0b1f3a] mb-3 font-sans">Select an amount</p>
                        <div class="grid grid-cols-3 gap-3 sm:grid-cols-4" id="amount-grid">
                            @foreach ([25, 50, 100, 250, 500, 1000, 2500, 5000] as $amt)
                                <button type="button"
                                        class="amount-btn border border-[#c4c6ce] rounded-lg py-3 text-[15px] font-bold text-[#0b1f3a] hover:border-[#0051d5] hover:bg-[#dbe1ff] transition-colors"
                                        data-amount="{{ $amt }}">
                                    ${{ number_format($amt) }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Custom amount --}}
                    <div class="mb-7">
                        <label class="text-[13px] font-bold uppercase tracking-wider text-[#0b1f3a] block mb-2 font-sans">Or enter a custom amount</label>
                        <div class="flex items-center border border-[#c4c6ce] bg-white rounded-lg focus-within:border-[#0051d5] focus-within:shadow-[0_0_0_3px_rgba(0,81,213,0.1)] transition-all">
                            <span class="px-4 text-[18px] font-bold text-[#0051d5]">$</span>
                            <input type="number"
                                   id="custom-amount"
                                   placeholder="0.00"
                                   min="1"
                                   class="flex-1 h-12 pr-4 text-[18px] font-bold text-[#0b1f3a] placeholder-[#c4c6ce] outline-none bg-transparent border-none">
                        </div>
                    </div>

                    {{-- Frequency --}}
                    <div class="mb-7">
                        <p class="text-[13px] font-bold uppercase tracking-wider text-[#0b1f3a] mb-3 font-sans">Frequency</p>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center gap-3 border border-[#c4c6ce] rounded-lg p-4 cursor-pointer hover:border-[#0051d5] transition-colors has-[:checked]:border-[#0051d5] has-[:checked]:bg-[#dbe1ff]">
                                <input type="radio" name="frequency" value="once" class="accent-[#0051d5]" checked>
                                <div>
                                    <p class="text-[14px] font-bold text-[#0b1f3a]">One-time</p>
                                    <p class="text-[12px] text-[#44474d]">Single gift</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 border border-[#c4c6ce] rounded-lg p-4 cursor-pointer hover:border-[#0051d5] transition-colors has-[:checked]:border-[#0051d5] has-[:checked]:bg-[#dbe1ff]">
                                <input type="radio" name="frequency" value="monthly" class="accent-[#0051d5]">
                                <div>
                                    <p class="text-[14px] font-bold text-[#0b1f3a]">Monthly</p>
                                    <p class="text-[12px] text-[#44474d]">Recurring gift</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Donor info --}}
                    <div class="mb-7">
                        <p class="text-[13px] font-bold uppercase tracking-wider text-[#0b1f3a] mb-4 font-sans">Your information</p>

                        {{-- Anonymous checkbox --}}
                        <div class="mb-4">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" name="is_anonymous" id="anon-check" value="1"
                                       class="accent-[#0051d5] mt-0.5 flex-shrink-0"
                                       {{ old('is_anonymous') ? 'checked' : '' }}>
                                <span class="text-[13px] text-[#44474d]">Make this donation anonymous (your name and email will not be recorded)</span>
                            </label>
                        </div>

                        {{-- Name + email — hidden when anonymous --}}
                        <div id="donor-fields">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[13px] font-semibold text-[#0b1f3a] mb-1.5">
                                        First name <span class="anon-required">*</span>
                                    </label>
                                    <input type="text" name="first_name" placeholder="Jane"
                                           value="{{ old('first_name') }}"
                                           class="w-full h-12 border border-[#c4c6ce] rounded-lg px-4 text-[14px] text-[#1c1b1b] placeholder-[#c4c6ce] outline-none focus:border-[#0051d5] focus:shadow-[0_0_0_3px_rgba(0,81,213,0.1)] transition-all @error('first_name') border-red-400 @enderror">
                                    @error('first_name')
                                        <p class="mt-1 text-[12px] text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-[13px] font-semibold text-[#0b1f3a] mb-1.5">
                                        Last name <span class="anon-required">*</span>
                                    </label>
                                    <input type="text" name="last_name" placeholder="Smith"
                                           value="{{ old('last_name') }}"
                                           class="w-full h-12 border border-[#c4c6ce] rounded-lg px-4 text-[14px] text-[#1c1b1b] placeholder-[#c4c6ce] outline-none focus:border-[#0051d5] focus:shadow-[0_0_0_3px_rgba(0,81,213,0.1)] transition-all @error('last_name') border-red-400 @enderror">
                                    @error('last_name')
                                        <p class="mt-1 text-[12px] text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-[13px] font-semibold text-[#0b1f3a] mb-1.5">
                                    Email address <span class="anon-required">*</span>
                                </label>
                                <input type="email" name="email" placeholder="jane@example.com"
                                       value="{{ old('email') }}"
                                       class="w-full h-12 border border-[#c4c6ce] rounded-lg px-4 text-[14px] text-[#1c1b1b] placeholder-[#c4c6ce] outline-none focus:border-[#0051d5] focus:shadow-[0_0_0_3px_rgba(0,81,213,0.1)] transition-all @error('email') border-red-400 @enderror">
                                @error('email')
                                    <p class="mt-1 text-[12px] text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Message --}}
                    <div class="mb-8">
                        <label class="block text-[13px] font-semibold text-[#0b1f3a] mb-1.5">Leave a message (optional)</label>
                        <textarea name="message" rows="3" placeholder="Why I'm giving..."
                                  class="w-full border border-[#c4c6ce] rounded-lg px-4 py-3 text-[14px] text-[#1c1b1b] placeholder-[#c4c6ce] outline-none focus:border-[#0051d5] focus:shadow-[0_0_0_3px_rgba(0,81,213,0.1)] transition-all resize-y">{{ old('message') }}</textarea>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            id="donate-submit"
                            class="w-full btn btn-accent"
                            style="height: 56px; font-size: 16px; border-radius: 8px;">
                        Donate <span id="selected-amount">$100</span> Securely →
                    </button>

                    <p class="mt-4 text-center text-[12px] text-[#44474d] flex items-center justify-center gap-1.5">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Secured by Stripe · SSL encrypted
                    </p>
                </form>
            </div>

            {{-- Sidebar --}}
            <div class="flex flex-col gap-8">

                {{-- What your gift funds --}}
                <div>
                    <h3 class="font-serif text-[20px] font-bold text-[#0b1f3a] mb-6">What your gift funds</h3>
                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'title' => 'Learning opportunities', 'body' => 'Scholarships, technology resources, and community workshops for those who need them.'],
                            ['icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'title' => 'Youth & career programs', 'body' => 'Hands-on training and youth programs developed with community and industry partners.'],
                            ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Dedicated mentors', 'body' => 'Mentors who invest in every participant\'s success beyond the program.'],
                            ['icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'title' => 'Career & entrepreneurship pathways', 'body' => 'Job placement support, mentorship, and connections to hiring and business partners.'],
                        ] as $item)
                            <div class="flex gap-4 items-start">
                                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center bg-[#dbe1ff] border border-[#c4c6ce] rounded-lg">
                                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-[14px] font-bold text-[#0b1f3a]">{{ $item['title'] }}</h4>
                                    <p class="mt-0.5 text-[13px] leading-[1.5] text-[#44474d]">{{ $item['body'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Transparency --}}
                <div class="bg-white border border-[#c4c6ce] rounded-xl p-7">
                    <p class="text-[13px] font-bold uppercase tracking-wider text-[#0b1f3a] mb-3 font-sans">Our commitment</p>
                    <p class="text-[14px] leading-[1.65] text-[#44474d]">
                        Every dollar is accounted for and directed toward our mission. We are committed to full financial transparency — no overhead bloat, no misdirection.
                    </p>
                </div>

                {{-- Other ways to give --}}
                <div>
                    <h3 class="font-serif text-[16px] font-bold text-[#0b1f3a] mb-4">Other ways to support</h3>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('contact') }}" class="flex items-center justify-between border border-[#c4c6ce] rounded-xl p-4 hover:border-[#0051d5] transition-colors group bg-white">
                            <div>
                                <p class="text-[14px] font-bold text-[#0b1f3a]">Corporate Partnership</p>
                                <p class="text-[13px] text-[#44474d]">Sponsor a cohort or partner with us</p>
                            </div>
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="2" class="group-hover:translate-x-1 transition-transform flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('contact') }}" class="flex items-center justify-between border border-[#c4c6ce] rounded-xl p-4 hover:border-[#0051d5] transition-colors group bg-white">
                            <div>
                                <p class="text-[14px] font-bold text-[#0b1f3a]">Become a Mentor</p>
                                <p class="text-[13px] text-[#44474d]">Give your time and expertise</p>
                            </div>
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="2" class="group-hover:translate-x-1 transition-transform flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('contact') }}" class="flex items-center justify-between border border-[#c4c6ce] rounded-xl p-4 hover:border-[#0051d5] transition-colors group bg-white">
                            <div>
                                <p class="text-[14px] font-bold text-[#0b1f3a]">In-Kind Donation</p>
                                <p class="text-[13px] text-[#44474d]">Laptops, software, or other resources</p>
                            </div>
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="2" class="group-hover:translate-x-1 transition-transform flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- DONATION TIERS --}}
    <section class="bg-white py-[80px] border-t border-[#e8ecf5]" data-reveal-section>
        <div class="container-wide">
            <div class="text-center mb-12">
                <p class="eyebrow">Give With Purpose</p>
                <h2 class="mt-3 font-serif text-[30px] font-bold tracking-[-0.5px] text-[#0b1f3a]">Giving levels</h2>
                <p class="mt-2 text-[15px] text-[#44474d] max-w-[500px] mx-auto">
                    Every level of support directly enables free programming for someone who needs it.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-3 max-w-4xl mx-auto">
                @foreach ([
                    ['tier' => 'Trailblazer', 'range' => '$2,500+',      'accent' => '#0051d5', 'bg' => '#f0f4ff', 'desc' => 'Sponsors a complete participant journey — from enrollment through opportunity.'],
                    ['tier' => 'Champion',    'range' => '$500–$2,499',   'accent' => '#0b1f3a', 'bg' => '#f6f3f2', 'desc' => 'Provides a participant with technology resources and training materials.'],
                    ['tier' => 'Supporter',   'range' => '$25–$499',      'accent' => '#75777e', 'bg' => '#ffffff', 'desc' => 'Covers workshop costs and community support resources.'],
                ] as $i => $tier)
                    <div class="reveal rounded-xl p-8 text-center transition-all hover:shadow-[0_4px_20px_rgba(0,0,0,0.08)] hover:-translate-y-1"
                         style="transition-delay: {{ $i * 80 }}ms; border-top: 4px solid {{ $tier['accent'] }}; background: {{ $tier['bg'] }}; border-left: 1px solid #e8ecf5; border-right: 1px solid #e8ecf5; border-bottom: 1px solid #e8ecf5;">
                        <p class="text-[11px] font-bold uppercase tracking-widest mb-3 font-sans" style="color: {{ $tier['accent'] }}">{{ $tier['tier'] }}</p>
                        <p class="font-serif text-[28px] font-bold text-[#0b1f3a] mb-4 tracking-[-0.5px]">{{ $tier['range'] }}</p>
                        <p class="text-[14px] text-[#44474d] leading-[1.65]">{{ $tier['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="bg-[#0b1f3a] py-[80px]">
        <div class="container-wide mx-auto max-w-[640px] text-center">
            <p class="text-[11px] font-bold uppercase tracking-[2px] text-[#dbe1ff] font-sans">Make a Lasting Impact</p>
            <h2 class="mt-3 font-serif text-[36px] font-bold leading-[1.1] tracking-[-0.8px] text-white sm:text-[42px]">
                Make opportunity more accessible.
            </h2>
            <p class="mx-auto mt-5 max-w-[520px] text-[16px] leading-[1.65] text-[#b5c7ea] font-sans">
                Every dollar you give opens a door for someone who would otherwise be left behind. Help us build stronger communities.
            </p>
            <div class="mt-10 flex flex-wrap gap-4 justify-center">
                <a href="#donate-form" class="btn btn-accent btn-lg">Donate Now</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-white btn-lg">Partner with Us</a>
            </div>
            <p class="mt-5 text-[13px] text-[#b5c7ea] font-sans">
                Questions about donating?
                <a href="{{ route('contact') }}" class="hover:text-white transition-colors underline underline-offset-4">Contact our team →</a>
            </p>
        </div>
    </section>

</main>

@push('scripts')
<script>
(function () {
    var selectedAmount = 100;
    var customInput    = document.getElementById('custom-amount');
    var amountField    = document.getElementById('amount-field');
    var amountDisplay  = document.getElementById('selected-amount');
    var amountBtns     = document.querySelectorAll('.amount-btn');
    var anonCheck      = document.getElementById('anon-check');
    var donorFields    = document.getElementById('donor-fields');

    function formatAmt(amt) {
        return '$' + (amt >= 1000 ? (amt / 1000).toFixed(amt % 1000 === 0 ? 0 : 1) + 'k' : amt.toLocaleString());
    }

    function setAmount(val) {
        selectedAmount = val;
        if (amountField) amountField.value = val;
        if (amountDisplay) amountDisplay.textContent = formatAmt(val);
    }

    function clearActive() {
        amountBtns.forEach(function (b) {
            b.style.borderColor = '';
            b.style.backgroundColor = '';
        });
    }

    amountBtns.forEach(function (btn) {
        if (parseInt(btn.dataset.amount) === 100) {
            btn.style.borderColor = '#0051d5';
            btn.style.backgroundColor = '#dbe1ff';
        }
        btn.addEventListener('click', function () {
            clearActive();
            btn.style.borderColor = '#0051d5';
            btn.style.backgroundColor = '#dbe1ff';
            if (customInput) customInput.value = '';
            setAmount(parseInt(btn.dataset.amount));
        });
    });

    if (customInput) {
        customInput.addEventListener('input', function () {
            var val = parseFloat(this.value);
            if (!isNaN(val) && val > 0) {
                clearActive();
                setAmount(val);
            }
        });
    }

    function toggleDonorFields() {
        if (!donorFields || !anonCheck) return;
        var hidden = anonCheck.checked;
        donorFields.style.display = hidden ? 'none' : '';
        donorFields.querySelectorAll('input').forEach(function (el) {
            el.disabled = hidden;
        });
    }

    if (anonCheck) {
        anonCheck.addEventListener('change', toggleDonorFields);
        toggleDonorFields();
    }

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
        }, { threshold: 0.12 });
        observer.observe(section);
    });
}());
</script>
@endpush
@endsection
