<x-guest-layout>
    <form method="POST" action="{{ route('visits.update', $visit) }}">
        @csrf
        @method('PATCH')

        <div>
            <x-input-label for="visitor_id" value="Visitor" />
            <select id="visitor_id" name="visitor_id" class="block mt-1 w-full" required>
                <option value="">Select Visitor</option>
                @foreach($visitors as $visitor)
                    <option value="{{ $visitor->id }}" @selected(old('visitor_id', $visit->visitor_id) == $visitor->id)>
                        {{ $visitor->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('visitor_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="prisoner_id" value="Prisoner" />
            <select id="prisoner_id" name="prisoner_id" class="block mt-1 w-full" required>
                <option value="">Select Prisoner</option>
                @foreach($prisoners as $prisoner)
                    <option value="{{ $prisoner->id }}" @selected(old('prisoner_id', $visit->prisoner_id) == $prisoner->id)>
                        {{ $prisoner->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('prisoner_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="date" value="Date" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', $visit->date)" required />
            <p class="mt-1 text-sm text-gray-500">Only visits are allowed on Sundays.</p>
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="start_time" value="Start Time" />
            <x-text-input id="start_time" class="block mt-1 w-full" type="time" name="start_time" :value="old('start_time', substr($visit->start_time, 0, 5))" min="14:00" max="17:00" required />
            <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="end_time" value="End Time" />
            <x-text-input id="end_time" class="block mt-1 w-full" type="time" name="end_time" :value="old('end_time', substr($visit->end_time, 0, 5))" min="14:00" max="17:00" required />
            <p class="mt-1 text-sm text-gray-500">Allowed range: 14:00 to 17:00.</p>
            <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end gap-3 mt-4">
            <a href="{{ route('visits.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300">
                Cancel
            </a>

            <x-primary-button>
                Update Visit
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
