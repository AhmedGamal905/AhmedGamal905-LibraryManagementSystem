<x-app-layout>
    <style>
        .book-item {
            background-color: #2D3748;
            color: white;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Borrowing History') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
        @foreach ($books as $book)
    <div class="bg-white p-4 text-black shadow sm:rounded-lg sm:p-8 dark:bg-gray-800 dark:text-white">
        <div class="flex items-start justify-between">
            <div class="flex flex-col gap-2">
                <span>{{ __('Name') }}:{{ $book->borrow_date }}</span>
                <span>{{ __('Written by') }}:{{ $book->due_date }}</span>
                <p class="mt-4 text-lg">{{ $book->id }}</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <form method="POST" action="{{ route('user.borrow.store', $book) }}">
                @csrf
                @method('put')
                <x-primary-button class="mt-4">{{ __('re') }}</x-primary-button>
            </form>
        </div>
    </div>
            @endforeach
            @if ($books->hasPages())
                {{ $books->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
