<x-guest-layout>
    <form method="POST" action="{{ route('prisoners.store') }}" role="form" enctype="multipart/form-data">
        @csrf

        @include('prisoner.form', [
            'submitLabel' => 'Create Prisoner',
            'cancelRoute' => route('prisoners.index'),
        ])
    </form>
</x-guest-layout>
