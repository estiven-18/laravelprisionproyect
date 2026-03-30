@php
    $birthDateValue = old('birth_date', $prisoner?->birth_date);
    $entryDateTimeValue = old('entry_datetime', !empty($prisoner?->entry_datetime) ? date('Y-m-d\\TH:i', strtotime($prisoner->entry_datetime)) : '');
    $entryMinValue = !empty($birthDateValue) ? $birthDateValue . 'T00:00' : null;
@endphp

<div>
    <x-input-label for="name" value="Name" />
    <x-text-input
        id="name"
        name="name"
        type="text"
        class="block mt-1 w-full"
        :value="old('name', $prisoner?->name)"
        autocomplete="name"
        required
    />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="birth_date" value="Birth Date" />
    <x-text-input
        id="birth_date"
        name="birth_date"
        type="date"
        class="block mt-1 w-full"
        :value="$birthDateValue"
        max="{{ now()->toDateString() }}"
        required
    />
    <p class="mt-1 text-sm text-gray-500">Birth date cannot be in the future.</p>
    <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="entry_datetime" value="Entry Date and Time" />
    <x-text-input
        id="entry_datetime"
        name="entry_datetime"
        type="datetime-local"
        class="block mt-1 w-full"
        :value="$entryDateTimeValue"
        min="{{ $entryMinValue }}"
        max="{{ now()->format('Y-m-d\\TH:i') }}"
        required
    />
    <p class="mt-1 text-sm text-gray-500">Entry date/time must be after birth date and cannot be in the future.</p>
    <x-input-error :messages="$errors->get('entry_datetime')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="crime" value="Crime" />
    <x-text-input
        id="crime"
        name="crime"
        type="text"
        class="block mt-1 w-full"
        :value="old('crime', $prisoner?->crime)"
        autocomplete="crime"
        required
    />
    <x-input-error :messages="$errors->get('crime')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="cell" value="Cell" />
    <x-text-input
        id="cell"
        name="cell"
        type="text"
        class="block mt-1 w-full"
        :value="old('cell', $prisoner?->cell)"
        autocomplete="cell"
        required
    />
    <x-input-error :messages="$errors->get('cell')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="state" value="State" />
    <select id="state" name="state" class="block mt-1 w-full" required>
        <option value="active" @selected(old('state', $prisoner?->state) === 'active')>Active</option>
        <option value="deleted" @selected(old('state', $prisoner?->state) === 'deleted')>Deleted</option>
    </select>
    <x-input-error :messages="$errors->get('state')" class="mt-2" />
</div>

<div class="flex items-center justify-end gap-3 mt-4">
    <a href="{{ $cancelRoute ?? route('prisoners.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">
        Cancel
    </a>

    <x-primary-button>
        {{ $submitLabel ?? 'Save Prisoner' }}
    </x-primary-button>
</div>