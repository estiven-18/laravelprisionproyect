<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="id_number" :value="__('Id Number')"/>
        <x-text-input id="id_number" name="id_number" type="text" class="mt-1 block w-full" :value="old('id_number', $user?->id_number)" autocomplete="id_number" placeholder="Id Number"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_number')"/>
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div>
        <x-input-label for="rol_id" :value="__('Rol Id')"/>
        <x-text-input id="rol_id" name="rol_id" type="text" class="mt-1 block w-full" :value="old('rol_id', $user?->rol_id)" autocomplete="rol_id" placeholder="Rol Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('rol_id')"/>
    </div>
    <div>
        <x-input-label for="state" :value="__('State')"/>
        <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $user?->state)" autocomplete="state" placeholder="State"/>
        <x-input-error class="mt-2" :messages="$errors->get('state')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>