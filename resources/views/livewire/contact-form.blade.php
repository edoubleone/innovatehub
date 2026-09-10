<div>
    @if($sent)
    <div class="mb-8 rounded-[10px] bg-[#F0FDF4] p-6 text-center">
        <p class="text-[16px] font-medium text-[#166534]">Message sent!</p>
        <p class="mt-1 text-[14px] text-[#15803D]">Thanks, <strong>{{ $sentName }}</strong>! We'll be in touch within 2 business days.</p>
    </div>
    @endif

    <p class="text-[12px] font-medium uppercase tracking-[0.4px] text-[#6B7280] mb-8">Send us a message</p>

    <form wire:submit="send" novalidate>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
            <div class="field {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Full name<span class="text-blue ml-0.5">*</span></label>
                <input type="text" wire:model.blur="name" placeholder="Amara Okonkwo">
                @error('name') <span class="err">{{ $message }}</span> @enderror
            </div>
            <div class="field {{ $errors->has('email') ? 'has-error' : '' }}">
                <label>Email<span class="text-blue ml-0.5">*</span></label>
                <input type="email" wire:model.blur="email" placeholder="you@example.com">
                @error('email') <span class="err">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="field {{ $errors->has('topic') ? 'has-error' : '' }}">
            <label>Topic<span class="text-blue ml-0.5">*</span></label>
            <select wire:model="topic">
                <option value="">Select a topic…</option>
                <option value="admissions">Admissions</option>
                <option value="partnerships">Partnerships</option>
                <option value="general">General</option>
                <option value="other">Other</option>
            </select>
            @error('topic') <span class="err">{{ $message }}</span> @enderror
        </div>

        <div class="field {{ $errors->has('body') ? 'has-error' : '' }}">
            <label>Message<span class="text-blue ml-0.5">*</span></label>
            <textarea wire:model.blur="body" placeholder="How can we help?"></textarea>
            @error('body') <span class="err">{{ $message }}</span> @enderror
        </div>

        <div class="mt-6">
            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-60 cursor-not-allowed"
                    class="w-full rounded-[10px] bg-[#1D4ED8] px-4 py-3.5 text-[14px] font-medium text-white shadow-[0_1px_2px_rgba(29,78,216,0.15)] transition-all duration-200 hover:-translate-y-px hover:bg-[#1E40AF] hover:shadow-[0_4px_12px_rgba(29,78,216,0.25)] disabled:opacity-50">
                <span wire:loading.remove>Send Message</span>
                <span wire:loading>Sending…</span>
            </button>
        </div>

    </form>
</div>
