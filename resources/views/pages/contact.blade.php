@extends('layouts.app')

@section('title', 'Contact Us — Innovate Hub Foundation')

@section('content')
<main>

    {{-- HERO --}}
    <section class="relative bg-[#0b1f3a] pt-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=1600&q=80&auto=format&fit=crop"
                 alt="" class="w-full h-full object-cover opacity-[0.14]">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f3a] via-[#0b1f3a]/85 to-[#0b1f3a]/30"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1f3a]/50 via-transparent to-transparent"></div>
        </div>
        <div class="relative container-wide py-[100px]">
            <div class="max-w-3xl">
                <span class="hero-badge mb-6 inline-flex">
                    Get In Touch
                </span>
                <h1 class="font-serif text-[44px] font-bold leading-[1.07] tracking-[-1.5px] text-white sm:text-[56px] lg:text-[60px]">
                    We're Here<br>
                    <span class="text-[#b5c7ea]">to Help.</span>
                </h1>
                <p class="mt-6 max-w-2xl text-[17px] leading-[1.7] text-[#b5c7ea] font-sans">
                    Whether you want to learn, volunteer, mentor, partner, or support our mission — reach out and we'll respond within 24 hours.
                </p>
                <div class="mt-8 flex flex-wrap gap-6">
                    <div class="flex items-center gap-2">
                        <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="text-[13px] text-[#b5c7ea] font-sans">Response within 24 hours</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="text-[13px] text-[#b5c7ea] font-sans">Open to learners, partners & donors</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="flex h-4 w-4 items-center justify-center rounded-full bg-[#0051d5]">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2 5l2 2 4-4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="text-[13px] text-[#b5c7ea] font-sans">Mon – Fri, 9am – 6pm ET</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FORM + SIDEBAR --}}
    <section class="bg-[#f6f3f2] py-[80px]">
        <div class="container-wide grid gap-12 lg:grid-cols-[3fr_2fr] lg:gap-16">

            {{-- Form --}}
            <div>
                <p class="eyebrow">Send a Message</p>
                <h2 class="mt-3 text-[30px] font-bold tracking-[-0.5px] text-[#0b1f3a] font-serif">How can we help?</h2>
                <p class="mt-2 text-[15px] text-[#44474d] mb-8">Fill out the form and our team will get back to you shortly.</p>

                <div class="bg-white border border-[#c4c6ce] rounded-xl p-8 md:p-10">
                    <livewire:contact-form />
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="flex flex-col gap-6">

                {{-- Contact details --}}
                <div class="bg-white border border-[#c4c6ce] rounded-xl p-7">
                    <p class="text-[13px] font-bold uppercase tracking-wider text-[#0b1f3a] mb-5 font-sans">Contact Details</p>
                    <div class="flex flex-col gap-5">
                        <div class="flex gap-4 items-start">
                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center bg-[#dbe1ff] border border-[#c4c6ce] rounded-lg">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-[13px] font-bold text-[#0b1f3a]">Email</p>
                                <a href="mailto:info@innovatehub.com" class="mt-0.5 text-[14px] text-[#44474d] hover:text-[#0051d5] transition-colors">info@innovatehub.com</a>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center bg-[#dbe1ff] border border-[#c4c6ce] rounded-lg">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-[13px] font-bold text-[#0b1f3a]">Location</p>
                                <p class="mt-0.5 text-[14px] text-[#44474d]">Dundalk, Maryland</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center bg-[#dbe1ff] border border-[#c4c6ce] rounded-lg">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>
                            </div>
                            <div>
                                <p class="text-[13px] font-bold text-[#0b1f3a]">Hours</p>
                                <p class="mt-0.5 text-[14px] text-[#44474d]">Monday – Friday, 9am – 6pm ET</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center bg-[#dbe1ff] border border-[#c4c6ce] rounded-lg">
                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-[13px] font-bold text-[#0b1f3a]">Programs</p>
                                <p class="mt-0.5 text-[14px] text-[#44474d]">Rolling enrollment across all initiatives</p>
                            </div>
                        </div>
                    </div>

                    {{-- Social --}}
                    <div class="mt-6 pt-5 border-t border-[#e8ecf5] flex gap-4">
                        <a href="#" aria-label="X / Twitter" class="flex h-9 w-9 items-center justify-center border border-[#c4c6ce] rounded-lg text-[#44474d] hover:border-[#0051d5] hover:text-[#0051d5] transition-colors">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                        </a>
                        <a href="#" aria-label="LinkedIn" class="flex h-9 w-9 items-center justify-center border border-[#c4c6ce] rounded-lg text-[#44474d] hover:border-[#0051d5] hover:text-[#0051d5] transition-colors">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                        </a>
                        <a href="#" aria-label="Instagram" class="flex h-9 w-9 items-center justify-center border border-[#c4c6ce] rounded-lg text-[#44474d] hover:border-[#0051d5] hover:text-[#0051d5] transition-colors">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                        </a>
                        <a href="#" aria-label="Facebook" class="flex h-9 w-9 items-center justify-center border border-[#c4c6ce] rounded-lg text-[#44474d] hover:border-[#0051d5] hover:text-[#0051d5] transition-colors">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Donate nudge --}}
                <div class="bg-[#0b1f3a] rounded-xl p-7">
                    <p class="text-[11px] font-bold uppercase tracking-[2px] text-[#dbe1ff] mb-3 font-sans">Support Our Mission</p>
                    <p class="text-[16px] font-bold text-white mb-2 font-serif">Make a difference today.</p>
                    <p class="text-[14px] text-[#b5c7ea] mb-6 font-sans">Your donation directly funds education, technology, workforce, and entrepreneurship programs for our community.</p>
                    <a href="{{ route('donate') }}" class="btn btn-accent btn-sm">Donate Now →</a>
                </div>

                {{-- Ways to get involved --}}
                <div>
                    <h3 class="font-serif text-[16px] font-bold text-[#0b1f3a] mb-4">Other ways to get involved</h3>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('apply') }}" class="flex items-center justify-between border border-[#c4c6ce] bg-white rounded-xl p-4 hover:border-[#0051d5] transition-colors group">
                            <div>
                                <p class="text-[14px] font-bold text-[#0b1f3a]">Apply to a Program</p>
                                <p class="text-[13px] text-[#44474d]">Free — no fees, no essays</p>
                            </div>
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="2" class="group-hover:translate-x-1 transition-transform flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('donate') }}" class="flex items-center justify-between border border-[#c4c6ce] bg-white rounded-xl p-4 hover:border-[#0051d5] transition-colors group">
                            <div>
                                <p class="text-[14px] font-bold text-[#0b1f3a]">Volunteer or Mentor</p>
                                <p class="text-[13px] text-[#44474d]">Share your skills with our community</p>
                            </div>
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="2" class="group-hover:translate-x-1 transition-transform flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('donate') }}" class="flex items-center justify-between border border-[#c4c6ce] bg-white rounded-xl p-4 hover:border-[#0051d5] transition-colors group">
                            <div>
                                <p class="text-[14px] font-bold text-[#0b1f3a]">Partner or Sponsor</p>
                                <p class="text-[13px] text-[#44474d]">Align your organization with our mission</p>
                            </div>
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#0051d5" stroke-width="2" class="group-hover:translate-x-1 transition-transform flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="bg-[#0b1f3a] py-[80px]">
        <div class="container-wide mx-auto max-w-[640px] text-center">
            <p class="text-[11px] font-bold uppercase tracking-[2px] text-[#dbe1ff] font-sans">Ready to Take Action?</p>
            <h2 class="mt-3 font-serif text-[36px] font-bold leading-[1.1] tracking-[-0.8px] text-white sm:text-[42px]">
                There's a place for you here.
            </h2>
            <p class="mx-auto mt-5 max-w-[520px] text-[16px] leading-[1.65] text-[#b5c7ea] font-sans">
                Whether you want to learn, mentor, donate, or partner — every form of involvement moves the mission forward.
            </p>
            <div class="mt-10 flex flex-wrap gap-4 justify-center">
                <a href="{{ route('programs.index') }}" class="btn btn-accent btn-lg">Explore Our Programs</a>
                <a href="{{ route('donate') }}" class="btn btn-outline-white btn-lg">Support Our Mission</a>
            </div>
        </div>
    </section>

</main>
@endsection
