<x-guest-layout>
    <form method="POST" action="{{ route('prisoners.update', $prisoner->id) }}" role="form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @include('prisoner.form', [
            'submitLabel' => 'Update Prisoner',
            'cancelRoute' => route('prisoners.index'),
        ])
    </form>
</x-guest-layout>
