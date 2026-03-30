<div>
    <x-input-label for="name" value="Name" />
    <x-text-input
        id="name"
        name="name"
        type="text"
        class="block mt-1 w-full"
        :value="old('name', $user?->name)"
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
        :value="old('id_number', $user?->id_number)"
        autocomplete="id_number"
        required
    />
    <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="email" value="Email" />
    <x-text-input
        id="email"
        name="email"
        type="email"
        class="block mt-1 w-full"
        :value="old('email', $user?->email)"
        autocomplete="email"
        required
    />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="password" value="Password" />
    <input
        id="password"
        name="password"
        type="password"
        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        autocomplete="new-password"
        placeholder="{{ !empty($user?->id) ? 'Leave blank to keep current password' : '' }}"
    />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="password_confirmation" value="Confirm Password" />
    <input
        id="password_confirmation"
        name="password_confirmation"
        type="password"
        class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        autocomplete="new-password"
    />
</div>

<div class="mt-4">
    <x-input-label for="rol_id" value="Role" />
    <select id="rol_id" name="rol_id" class="block mt-1 w-full" required>
        <option value="">Select role</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" @selected((string) old('rol_id', $user?->rol_id) === (string) $role->id)>
                {{ $role->name }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('rol_id')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="state" value="State" />
    <select id="state" name="state" class="block mt-1 w-full" required>
        <option value="active" @selected(old('state', $user?->state) === 'active')>Active</option>
        <option value="deleted" @selected(old('state', $user?->state) === 'deleted')>Deleted</option>
    </select>
    <x-input-error :messages="$errors->get('state')" class="mt-2" />
</div>

<div class="flex items-center justify-end gap-3 mt-4">
    <a href="{{ $cancelRoute ?? route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">
        Cancel
    </a>

    <x-primary-button>
        {{ $submitLabel ?? 'Save User' }}
    </x-primary-button>
</div>