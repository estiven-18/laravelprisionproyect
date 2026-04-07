<div class="space-y-6">
    
    <div>
        <x-input-label for="start_datetime" :value="__('Start Datetime')"/>
        <x-text-input id="start_datetime" name="start_datetime" type="text" class="mt-1 block w-full" :value="old('start_datetime', $guardSession?->start_datetime)" autocomplete="start_datetime" placeholder="Start Datetime"/>
        <x-input-error class="mt-2" :messages="$errors->get('start_datetime')"/>
    </div>
    <div>
        <x-input-label for="user_id" :value="__('User Id')"/>
        <x-text-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" :value="old('user_id', $guardSession?->user_id)" autocomplete="user_id" placeholder="User Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('user_id')"/>
    </div>
    <div>
        <x-input-label for="state" :value="__('State')"/>
        <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $guardSession?->state)" autocomplete="state" placeholder="State"/>
        <x-input-error class="mt-2" :messages="$errors->get('state')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>