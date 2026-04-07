<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Bienvenida --}}
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                    Welcome, {{ auth()->user()->name }}
                </h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Here you have a summary of the system.
                </p>
            </div>

            {{-- Tarjetas de estadísticas --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-green-500 text-white p-6 rounded-lg shadow">
                    <h4 class="text-sm">Visits</h4>
                    <p class="text-2xl font-bold">{{ $visitas ?? 0 }}</p>
                </div>

                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
                    <h4 class="text-sm">Guards</h4>
                    <p class="text-2xl font-bold">{{ $guardias ?? 0 }}</p>
                </div>

                <div class="bg-red-500 text-white p-6 rounded-lg shadow">
                    <h4 class="text-sm">Prisoners</h4>
                    <p class="text-2xl font-bold">{{ $prisioneros ?? 0 }}</p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>