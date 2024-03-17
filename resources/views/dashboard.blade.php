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
            {{ __('Available To Borrow Books') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
        @forelse ($books as $book)
    <div class="bg-white p-4 text-black shadow sm:rounded-lg sm:p-8 dark:bg-gray-800 dark:text-white">
        <div class="flex items-start justify-between">
            <div class="flex flex-col gap-2">
                <span>{{ __('Name') }}:{{ $book->name }}</span>
                <span>{{ __('Written by') }}:{{ $book->writer }}</span>
                <p class="mt-4 text-lg">{{ $book->description }}</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <form method="POST" action="{{ route('user.borrow.store', $book) }}">
                @csrf
                @method('put')
                <x-primary-button class="mt-4">{{ __('Borrow') }}</x-primary-button>
            </form>
        </div>
    </div>
    @empty
                <div class="bg-white p-4 text-black shadow sm:rounded-lg sm:p-8 dark:bg-gray-800 dark:text-white">
                    <div class="flex items-start justify-between">
                        <span>{{ __('No available books') }}</span>
                    </div>
                </div>
            @endforelse
            @if ($books->hasPages())
                {{ $books->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
