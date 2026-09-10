<div x-data="{
        showBanner: false,
        showPanel: false,
        preferences: {
            essential: true,
            analytics: false,
            preferences: false,
            marketing: false,
        },
        init() {
            const consent = this.getCookie('cookie_consent');
            if (!consent) {
                setTimeout(() => this.showBanner = true, 1500);
            }
        },
        acceptAll() {
            this.preferences.analytics = true;
            this.preferences.preferences = true;
            this.preferences.marketing = true;
            this.savePreferences();
        },
        declineAll() {
            this.preferences.analytics = false;
            this.preferences.preferences = false;
            this.preferences.marketing = false;
            this.savePreferences();
        },
        savePreferences() {
            this.setCookie('cookie_consent', JSON.stringify(this.preferences), 365);
            this.showBanner = false;
            this.showPanel = false;
        },
        openPanel() {
            this.showPanel = true;
        },
        closePanel() {
            this.showPanel = false;
            if (!this.getCookie('cookie_consent')) {
                this.showBanner = true;
            }
        },
        getCookie(name) {
            const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? decodeURIComponent(match[2]) : null;
        },
        setCookie(name, value, days) {
            const expires = new Date(Date.now() + days * 864e5).toUTCString();
            document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/; SameSite=Lax';
        }
    }"
    @keydown.escape.window="showPanel = false"
    x-cloak>

    {{-- ==================== BANNER ==================== --}}
    <div x-show="showBanner && !showPanel"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 translate-y-8"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-8"
         class="fixed bottom-0 left-0 right-0 z-50 p-4 md:p-6">
        <div class="max-w-5xl mx-auto overflow-hidden bg-white border shadow-2xl rounded-2xl border-blue/10">
            <div class="p-6 md:p-8">
                <div class="flex items-start gap-4 mb-5">
                    <div class="flex items-center justify-center rounded-full size-11 bg-blue/10 shrink-0">
                        <svg class="size-6 text-blue" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-1 4 4 0 0 1-1-5 10.06 10.06 0 0 0-4-4Z"/>
                            <circle cx="8" cy="11" r="1" fill="currentColor"/>
                            <circle cx="12" cy="15" r="1" fill="currentColor"/>
                            <circle cx="15" cy="10" r="1" fill="currentColor"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-ink font-display">We Value Your Privacy</h3>
                        <p class="mt-1 text-sm leading-relaxed text-muted">
                            We use cookies to improve your experience, analyze traffic, and personalize content. You can choose to accept all cookies, customize your preferences, or decline non-essential cookies. Learn more in our
                            <a href="{{ route('legal.privacy') }}" class="font-medium underline text-blue hover:text-blue-dark">Privacy Policy</a>.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end">
                    <button @click="openPanel(); showBanner = false"
                            class="px-5 py-2.5 text-sm font-medium transition-all duration-300 rounded-lg text-blue hover:bg-blue/7 order-3 sm:order-1">
                        Customize Settings
                    </button>
                    <button @click="declineAll()"
                            class="px-5 py-2.5 text-sm font-medium transition-all duration-300 border rounded-lg text-ink border-ink/20 hover:bg-line-soft order-2">
                        Decline All
                    </button>
                    <button @click="acceptAll()"
                            class="px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 rounded-lg bg-blue hover:bg-blue-dark order-1 sm:order-3">
                        Accept All
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== BACKDROP ==================== --}}
    <div x-show="showPanel"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="closePanel()"
         class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm">
    </div>

    {{-- ==================== PREFERENCES PANEL ==================== --}}
    <div x-show="showPanel"
         x-transition:enter="transition ease-out duration-400"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full"
         class="fixed top-0 right-0 z-50 flex flex-col w-full h-full bg-white shadow-2xl sm:max-w-md">

        {{-- Panel header --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-blue/10">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center rounded-full size-9 bg-blue/10">
                    <svg class="size-5 text-blue" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-ink font-display">Cookie Settings</h3>
            </div>
            <button @click="closePanel()" class="flex items-center justify-center transition-colors rounded-full size-8 text-muted hover:text-ink hover:bg-line-soft">
                <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Panel body --}}
        <div class="flex-1 px-6 py-6 space-y-5 overflow-y-auto">
            <p class="text-sm leading-relaxed text-muted">
                Choose which cookies you'd like to allow. Essential cookies are always active as they are necessary for the website to function. Learn more in our
                <a href="{{ route('legal.privacy') }}" class="font-medium underline text-blue hover:text-blue-dark">Privacy Policy</a>.
            </p>

            {{-- Essential --}}
            <div class="p-4 border rounded-xl border-blue/10 bg-blue/5">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-sm font-semibold text-ink">Essential Cookies</h4>
                    <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-blue/10 text-blue">Always Active</span>
                </div>
                <p class="text-xs leading-relaxed text-muted">
                    Required for core website functionality including security, session management, and accessibility. These cannot be disabled.
                </p>
            </div>

            {{-- Analytics --}}
            <div class="p-4 border rounded-xl border-blue/10">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-sm font-semibold text-ink">Analytics Cookies</h4>
                    <button @click="preferences.analytics = !preferences.analytics"
                            :class="preferences.analytics ? 'bg-blue' : 'bg-ink/20'"
                            class="relative inline-flex items-center h-6 transition-colors duration-300 rounded-full w-11 shrink-0"
                            role="switch"
                            :aria-checked="preferences.analytics.toString()">
                        <span :class="preferences.analytics ? 'translate-x-6' : 'translate-x-1'"
                              class="inline-block transition-transform duration-300 bg-white rounded-full size-4 shadow-sm"></span>
                    </button>
                </div>
                <p class="text-xs leading-relaxed text-muted">
                    Help us understand how visitors interact with our website by collecting anonymous usage data. This allows us to improve our content and services.
                </p>
            </div>

            {{-- Preferences --}}
            <div class="p-4 border rounded-xl border-blue/10">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-sm font-semibold text-ink">Preference Cookies</h4>
                    <button @click="preferences.preferences = !preferences.preferences"
                            :class="preferences.preferences ? 'bg-blue' : 'bg-ink/20'"
                            class="relative inline-flex items-center h-6 transition-colors duration-300 rounded-full w-11 shrink-0"
                            role="switch"
                            :aria-checked="preferences.preferences.toString()">
                        <span :class="preferences.preferences ? 'translate-x-6' : 'translate-x-1'"
                              class="inline-block transition-transform duration-300 bg-white rounded-full size-4 shadow-sm"></span>
                    </button>
                </div>
                <p class="text-xs leading-relaxed text-muted">
                    Remember your settings and choices to provide a more personalized browsing experience, such as language and display preferences.
                </p>
            </div>

            {{-- Marketing --}}
            <div class="p-4 border rounded-xl border-blue/10">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-sm font-semibold text-ink">Marketing Cookies</h4>
                    <button @click="preferences.marketing = !preferences.marketing"
                            :class="preferences.marketing ? 'bg-blue' : 'bg-ink/20'"
                            class="relative inline-flex items-center h-6 transition-colors duration-300 rounded-full w-11 shrink-0"
                            role="switch"
                            :aria-checked="preferences.marketing.toString()">
                        <span :class="preferences.marketing ? 'translate-x-6' : 'translate-x-1'"
                              class="inline-block transition-transform duration-300 bg-white rounded-full size-4 shadow-sm"></span>
                    </button>
                </div>
                <p class="text-xs leading-relaxed text-muted">
                    Used to deliver relevant advertisements and track the effectiveness of marketing campaigns across websites you visit.
                </p>
            </div>
        </div>

        {{-- Panel footer --}}
        <div class="px-6 py-5 border-t border-blue/10">
            <div class="flex gap-3">
                <button @click="declineAll()"
                        class="flex-1 px-4 py-2.5 text-sm font-medium transition-all duration-300 border rounded-lg text-ink border-ink/20 hover:bg-line-soft">
                    Decline All
                </button>
                <button @click="acceptAll()"
                        class="flex-1 px-4 py-2.5 text-sm font-medium text-white transition-all duration-300 rounded-lg bg-blue/70 hover:bg-blue">
                    Accept All
                </button>
                <button @click="savePreferences()"
                        class="flex-1 px-4 py-2.5 text-sm font-medium text-white transition-all duration-300 rounded-lg bg-blue hover:bg-blue-dark">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
