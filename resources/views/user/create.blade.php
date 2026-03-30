<x-guest-layout>
    <form method="POST" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data">
        @csrf

        @include('user.form', [
            'submitLabel' => 'Create User',
            'cancelRoute' => route('users.index'),
        ])
    </form>
</x-guest-layout>
