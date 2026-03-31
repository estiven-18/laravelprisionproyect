<div>
    <x-input-label for="name" value="Name" />
    <x-text-input
        id="name"
        name="name"
        type="text"
        class="block mt-1 w-full"
        :value="old('name', $visitor?->name)"
        autocomplete="name"
        required
    />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="id_number" value="ID Number" />
    <x-text-input
        id="id_number"
        name="id_number"
        type="text"
        class="block mt-1 w-full"
        :value="old('id_number', $visitor?->id_number)"
        autocomplete="id_number"
        required
    />
    <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="relationship_to_prisoner" value="Relationship to Prisoner" />
    <x-text-input
        id="relationship_to_prisoner"
        name="relationship_to_prisoner"
        type="text"
        class="block mt-1 w-full"
        :value="old('relationship_to_prisoner', $visitor?->relationship_to_prisoner)"
        autocomplete="relationship_to_prisoner"
        required
    />
    <x-input-error :messages="$errors->get('relationship_to_prisoner')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="state" value="State" />
    <select id="state" name="state" class="block mt-1 w-full" required>
        <option value="active" @selected(old('state', $visitor?->state) === 'active')>Active</option>
        <option value="deleted" @selected(old('state', $visitor?->state) === 'deleted')>Deleted</option>
    </select>
    <x-input-error :messages="$errors->get('state')" class="mt-2" />
</div>

<div class="flex items-center justify-end gap-3 mt-4">
    <a href="{{ $cancelRoute ?? route('visitors.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">
        Cancel
    </a>

    <x-primary-button>
        {{ $submitLabel ?? 'Save Visitor' }}
    </x-primary-button>
</div>
