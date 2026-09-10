<div>
    <form wire:submit="check" class="bg-surface border border-line rounded-[14px] p-6 sm:p-10" novalidate>
        <h2 class="font-serif font-normal text-[26px] tracking-[-0.015em] text-ink mb-2">Check your status</h2>
        <p class="text-[15px] text-muted mb-7">Enter the email address you used when you applied.</p>

        <div class="flex flex-col sm:flex-row gap-3">
            <div class="field flex-1 mb-0 {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" wire:model.blur="email" placeholder="you@example.com" class="w-full">
                @error('email') <span class="err">{{ $message }}</span> @enderror
            </div>
            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-60 cursor-not-allowed"
                    class="btn btn-primary shrink-0">
                <span wire:loading.remove>Look up</span>
                <span wire:loading>Checking…</span>
            </button>
        </div>
    </form>

    @if($searched)
        <div class="mt-8">
            @if($applications->isEmpty())
                <div class="bg-surface border border-line rounded-[14px] p-8 text-center">
                    <div class="w-10 h-10 rounded-full bg-bg border border-line grid place-items-center mx-auto mb-4">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="1.75"/>
                            <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <p class="text-[15px] text-ink font-medium mb-1">No application found</p>
                    <p class="text-[13px] text-muted max-w-[36ch] mx-auto">
                        We couldn't find an application for that email. Double-check the address or
                        <a href="{{ route('apply') }}" class="text-blue hover:underline">submit a new application</a>.
                    </p>
                </div>
            @else
                <p class="font-mono text-xs text-muted tracking-[0.06em] uppercase mb-4">
                    {{ $applications->count() }} application{{ $applications->count() !== 1 ? 's' : '' }} found
                </p>
                <div class="flex flex-col gap-4">
                    @foreach($applications as $app)
                        @php
                            $statusMap = [
                                'received'  => ['label' => 'Received',       'dot' => 'bg-blue',   'bg' => 'bg-blue/8 text-blue'],
                                'reviewing' => ['label' => 'Under review',   'dot' => 'bg-amber',  'bg' => 'bg-amber/10 text-amber-700'],
                                'interview' => ['label' => 'Interview stage','dot' => 'bg-purple-500', 'bg' => 'bg-purple-50 text-purple-700'],
                                'accepted'  => ['label' => 'Accepted',       'dot' => 'bg-green-500', 'bg' => 'bg-green-50 text-green-700'],
                                'declined'  => ['label' => 'Not accepted',   'dot' => 'bg-ink-soft', 'bg' => 'bg-surface text-muted border border-line'],
                            ];
                            $s = $statusMap[$app->status] ?? $statusMap['received'];
                            $programLabel = $app->program_slug === 'unsure'
                                ? "I'm not sure yet"
                                : ($app->program?->title ?? $app->program_slug);
                        @endphp
                        <div class="bg-surface border border-line rounded-[14px] p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-5">
                            <div>
                                <div class="font-mono text-[11px] text-muted tracking-[0.06em] uppercase mb-2">
                                    Applied {{ $app->created_at->format('M j, Y') }}
                                </div>
                                <p class="text-[17px] font-medium text-ink mb-0.5">{{ $programLabel }}</p>
                                <p class="text-[13px] text-muted">{{ $app->full_name }}</p>
                            </div>
                            <div class="shrink-0">
                                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[13px] font-medium {{ $s['bg'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $s['dot'] }} flex-shrink-0"></span>
                                    {{ $s['label'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</div>
