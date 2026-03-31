<x-guest-layout>
    <form method="POST" action="{{ route('visitors.update', $visitor->id) }}" role="form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @include('visitors.form', [
            'submitLabel' => 'Update Visitor',
            'cancelRoute' => route('visitors.index'),
        ])
    </form>
</x-guest-layout>
