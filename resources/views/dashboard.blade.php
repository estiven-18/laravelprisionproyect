<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Panel de Control
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Bienvenida --}}
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                    Bienvenido, {{ auth()->user()->name }}
                </h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Aquí tienes un resumen del sistema.
                </p>
            </div>

            {{-- Tarjetas de estadísticas --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="bg-green-500 text-white p-6 rounded-lg shadow">
                    <h4 class="text-sm">Visitas</h4>
                    <p class="text-2xl font-bold">{{ $visitas ?? 0 }}</p>
                </div>

                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow">
                    <h4 class="text-sm">Guardias</h4>
                    <p class="text-2xl font-bold">{{ $guardias ?? 0 }}</p>
                </div>

                <div class="bg-red-500 text-white p-6 rounded-lg shadow">
                    <h4 class="text-sm">Prisioneros</h4>
                    <p class="text-2xl font-bold">{{ $prisioneros ?? 0 }}</p>
                </div>

            </div>

             {{-- Gráficos --}}
             <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">
                    Estadísticas Mensuales
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <canvas id="visitasChart"></canvas>
                    </div>
                    <div>
                        <canvas id="guardiasChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>