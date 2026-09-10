<div>
    <form wire:submit="submit" class="bg-surface border border-line rounded-[14px] p-6 sm:p-12" novalidate>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
            <div class="field {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label>First name<span class="text-blue ml-0.5">*</span></label>
                <input type="text" wire:model.blur="first_name" placeholder="Amara">
                @error('first_name') <span class="err">{{ $message }}</span> @enderror
            </div>
            <div class="field {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label>Last name<span class="text-blue ml-0.5">*</span></label>
                <input type="text" wire:model.blur="last_name" placeholder="Okonkwo">
                @error('last_name') <span class="err">{{ $message }}</span> @enderror
            </div>
            <div class="field {{ $errors->has('email') ? 'has-error' : '' }}">
                <label>Email<span class="text-blue ml-0.5">*</span></label>
                <input type="email" wire:model.blur="email" placeholder="you@example.com">
                @error('email') <span class="err">{{ $message }}</span> @enderror
            </div>
            <div class="field {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label>Phone <span class="text-muted text-xs font-normal">(optional)</span></label>
                <input type="tel" wire:model.blur="phone" placeholder="+1 (555) 000-0000">
                @error('phone') <span class="err">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="field {{ $errors->has('program_slug') ? 'has-error' : '' }}">
            <label>Program of interest<span class="text-blue ml-0.5">*</span></label>
            <select wire:model="program_slug">
                <option value="">Select a program…</option>
                @foreach($grouped as $cohortName => $programs)
                    <optgroup label="{{ $cohortName }}">
                        @foreach($programs as $slug => $title)
                            <option value="{{ $slug }}">{{ $title }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            @error('program_slug') <span class="err">{{ $message }}</span> @enderror
        </div>

        <div class="field {{ $errors->has('experience') ? 'has-error' : '' }}">
            <label>Prior tech experience <span class="text-muted text-xs font-normal">(optional)</span></label>
            <select wire:model="experience">
                <option value="">Select an option…</option>
                <option value="none">None — I'm completely new to this</option>
                <option value="some">Some — I've tinkered or taken intro courses</option>
                <option value="a_lot">A lot — I've worked in a related field</option>
            </select>
            @error('experience') <span class="err">{{ $message }}</span> @enderror
        </div>

        <div class="field {{ $errors->has('why') ? 'has-error' : '' }}">
            <label>Why do you want to join Innovate Hub?<span class="text-blue ml-0.5">*</span></label>
            <textarea wire:model.blur="why" rows="5"
                      placeholder="Tell us a little about where you are in life and what you're hoping to build. A few sentences is plenty."></textarea>
            @error('why') <span class="err">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mt-8 pt-6 border-t border-line">
            <p class="text-[13px] text-muted max-w-[32ch]">
                We read every application personally. No auto-rejections, no filters.
            </p>
            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-60 cursor-not-allowed"
                    class="btn btn-primary btn-lg w-full sm:w-auto">
                <span wire:loading.remove>Submit application</span>
                <span wire:loading>Submitting…</span>
            </button>
        </div>

    </form>
</div>
