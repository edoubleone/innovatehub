<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.04)] transition-all duration-300" data-navbar>
    <nav class="container-wide flex items-center justify-between h-20">

        {{-- Wordmark --}}
        <a class="wordmark" href="{{ route('home') }}">Innovate Hub Foundation</a>

        {{-- Desktop nav --}}
        <div class="hidden md:flex items-center gap-8">
            @php
                $links = [
                    ['route' => 'home',           'label' => 'Home'],
                    ['route' => 'programs.index', 'label' => 'Programs'],
                    ['route' => 'about',          'label' => 'About'],
                    ['route' => 'contact',        'label' => 'Contact'],
                ];
            @endphp

            @foreach ($links as $link)
                @php $active = request()->routeIs($link['route']) || request()->routeIs($link['route'].'.*'); @endphp
                <a href="{{ route($link['route']) }}"
                   class="relative font-sans text-[13px] tracking-wider uppercase transition-colors duration-200 py-1 {{ $active ? 'text-[#0b1f3a] font-bold' : 'text-[#44474d] hover:text-[#0b1f3a] font-medium' }}">
                    {{ $link['label'] }}
                    @if($active)
                        <span class="absolute -bottom-0.5 left-0 right-0 h-0.5 bg-[#0051d5] rounded-full"></span>
                    @endif
                </a>
            @endforeach
        </div>

        {{-- CTAs + icons --}}
        <div class="hidden md:flex items-center gap-3">
            <a href="{{ route('donate') }}"
               class="bg-[#000615] text-white font-sans text-[13px] font-semibold tracking-wider uppercase px-6 py-3 rounded-lg min-h-[44px] inline-flex items-center hover:bg-[#0051d5] hover:shadow-[0_4px_14px_rgba(0,81,213,0.30)] transition-all duration-300">
                Donate
            </a>
            <a class="btn btn-secondary btn-sm" href="{{ route('apply') }}">Apply Now</a>
        </div>

        {{-- Mobile hamburger --}}
        <button class="md:hidden p-2 text-[#0b1f3a]" aria-label="Toggle menu" data-mobile-toggle>
            <svg data-icon-menu width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
            <svg data-icon-close width="24" height="24" fill="none" viewBox="0 0 24 24" class="hidden"><path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        </button>
    </nav>

    {{-- Mobile menu panel --}}
    <div class="md:hidden hidden border-b border-[#c4c6ce] bg-white/98 px-4 py-6 backdrop-blur-md" data-mobile-menu>
        @php
            $links = $links ?? [
                ['route' => 'home',           'label' => 'Home'],
                ['route' => 'programs.index', 'label' => 'Programs'],
                ['route' => 'about',          'label' => 'About'],
                ['route' => 'contact',        'label' => 'Contact'],
            ];
        @endphp
        <div class="flex flex-col gap-5">
            @foreach ($links as $link)
                @php $active = request()->routeIs($link['route']) || request()->routeIs($link['route'].'.*'); @endphp
                <a href="{{ route($link['route']) }}"
                   class="font-serif text-[17px] tracking-tight {{ $active ? 'text-[#0b1f3a] font-semibold' : 'text-[#44474d] font-medium' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <div class="flex flex-col gap-3 pt-3 border-t border-[#e8ecf5]">
                <a class="bg-[#000615] text-white font-sans text-[13px] font-semibold tracking-wider uppercase px-6 py-3 rounded min-h-[48px] inline-flex items-center justify-center hover:bg-[#0051d5] transition-colors" href="{{ route('donate') }}">Donate</a>
                <a class="btn btn-secondary w-full justify-center" href="{{ route('apply') }}">Apply Now</a>
            </div>
        </div>
    </div>
</header>

@push('scripts')
<script>
(function () {
    var nav = document.querySelector('[data-navbar]');
    if (!nav) return;

    function onScroll() {
        if (window.scrollY >= 20) {
            nav.classList.add('navbar-scrolled');
        } else {
            nav.classList.remove('navbar-scrolled');
        }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    var toggle  = document.querySelector('[data-mobile-toggle]');
    var menu    = document.querySelector('[data-mobile-menu]');
    var iconMenu  = document.querySelector('[data-icon-menu]');
    var iconClose = document.querySelector('[data-icon-close]');
    if (!toggle || !menu) return;
    var open = false;
    toggle.addEventListener('click', function () {
        open = !open;
        menu.classList.toggle('hidden', !open);
        iconMenu.classList.toggle('hidden', open);
        iconClose.classList.toggle('hidden', !open);
    });
}());
</script>
@endpush
