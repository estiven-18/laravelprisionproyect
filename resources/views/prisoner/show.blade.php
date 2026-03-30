<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Prisoner Detail') }}
            </h2>

            <div class="flex items-center gap-2">
                <a
                    href="{{ route('prisoners.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300"
                >
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">ID</p>
                        <p class="text-base text-gray-900 dark:text-gray-100">{{ $prisoner->id }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                        <p class="text-base text-gray-900 dark:text-gray-100">{{ ucfirst($prisoner->state) }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Name</p>
                        <p class="text-base text-gray-900 dark:text-gray-100">{{ $prisoner->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Birth Date</p>
                        <p class="text-base text-gray-900 dark:text-gray-100">{{ $prisoner->birth_date }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Entry DateTime</p>
                        <p class="text-base text-gray-900 dark:text-gray-100">{{ $prisoner->entry_datetime }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Cell</p>
                        <p class="text-base text-gray-900 dark:text-gray-100">{{ $prisoner->cell }}</p>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Crime</p>
                        <p class="text-base text-gray-900 dark:text-gray-100">{{ $prisoner->crime }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
