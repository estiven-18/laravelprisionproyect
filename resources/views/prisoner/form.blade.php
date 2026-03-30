<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $prisoner?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="birth_date" :value="__('Birth Date')"/>
        <x-text-input id="birth_date" name="birth_date" type="text" class="mt-1 block w-full" :value="old('birth_date', $prisoner?->birth_date)" autocomplete="birth_date" placeholder="Birth Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('birth_date')"/>
    </div>
    <div>
        <x-input-label for="entry_datetime" :value="__('Entry Datetime')"/>
        <x-text-input id="entry_datetime" name="entry_datetime" type="text" class="mt-1 block w-full" :value="old('entry_datetime', $prisoner?->entry_datetime)" autocomplete="entry_datetime" placeholder="Entry Datetime"/>
        <x-input-error class="mt-2" :messages="$errors->get('entry_datetime')"/>
    </div>
    <div>
        <x-input-label for="crime" :value="__('Crime')"/>
        <x-text-input id="crime" name="crime" type="text" class="mt-1 block w-full" :value="old('crime', $prisoner?->crime)" autocomplete="crime" placeholder="Crime"/>
        <x-input-error class="mt-2" :messages="$errors->get('crime')"/>
    </div>
    <div>
        <x-input-label for="cell" :value="__('Cell')"/>
        <x-text-input id="cell" name="cell" type="text" class="mt-1 block w-full" :value="old('cell', $prisoner?->cell)" autocomplete="cell" placeholder="Cell"/>
        <x-input-error class="mt-2" :messages="$errors->get('cell')"/>
    </div>
    <div>
        <x-input-label for="state" :value="__('State')"/>
        <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $prisoner?->state)" autocomplete="state" placeholder="State"/>
        <x-input-error class="mt-2" :messages="$errors->get('state')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>