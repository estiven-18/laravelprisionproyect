<x-guest-layout>
    <form method="POST" action="{{ route('visitors.store') }}" role="form" enctype="multipart/form-data">
        @csrf

        @include('visitors.form', [
            'submitLabel' => 'Create Visitor',
            'cancelRoute' => route('visitors.index'),
        ])
    </form>
</x-guest-layout>