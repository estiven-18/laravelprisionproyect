<x-guest-layout>
    <form method="POST" action="/visitors">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="name" value="Nombre completo" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Identificación -->
        <div class="mt-4">
            <x-input-label for="id_number" value="Identificación" />
            <x-text-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" required />
            <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
        </div>

        <!-- Relación -->
        <div class="mt-4">
            <x-input-label for="relationship_to_prisoner" value="Relación con el prisionero" />
            <x-text-input id="relationship_to_prisoner" class="block mt-1 w-full" type="text" name="relationship_to_prisoner" required />
            <x-input-error :messages="$errors->get('relationship_to_prisoner')" class="mt-2" />
        </div>

        <!-- Botón -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Registrarte
            </x-primary-button>
        </div>

        <!-- Mensaje éxito -->
        @if(session('success'))
            <p class="text-green-600 mt-4">{{ session('success') }}</p>
        @endif

    </form>
</x-guest-layout>