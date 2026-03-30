<x-guest-layout>
    <form method="POST" action="{{ route('users.update', $user->id) }}" role="form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @include('user.form', [
            'submitLabel' => 'Update User',
            'cancelRoute' => route('users.index'),
        ])
    </form>
</x-guest-layout>
