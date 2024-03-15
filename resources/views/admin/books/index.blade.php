<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <a href="{{ route('admin.books.create') }}"
                class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300">
                {{ __('Create') }}
            </a>

            @forelse ($books as $book)
                <div class="bg-white p-4 text-black shadow sm:rounded-lg sm:p-8 dark:bg-gray-800 dark:text-white">
                    <div class="flex items-start justify-between">
                        <div class="flex flex-col gap-2">
                            <span>{{ __('Name') }}:{{ $book->name }}</span>
                            <span>{{ __('Written by') }}:{{ $book->writer }}</span>
                            <p class="mt-4 text-lg">{{ $book->description }}</p>
                            <span>{{ __('status') }}:{{ $book->status }}</span>
                            <small class="text-sm">
                            {{ __('Added at') }}: {{ $book->created_at->format('j M Y, g:i a') }}
                            </small>
                        </div>

                        <div class="flex items-center gap-4">
                            <form method="POST" action="{{ route('admin.books.destroy', $book) }}">
                                @csrf
                                @method('DELETE')
                                <x-danger-button>
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </form>

                            <a href="{{ route('admin.books.edit', $book) }}"
                                class="inline-flex w-full items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300">
                                {{ __('Edit') }}
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white p-4 text-black shadow sm:rounded-lg sm:p-8 dark:bg-gray-800 dark:text-white">
                    <div class="flex items-start justify-between">
                        <span>{{ __('No books found') }}</span>
                    </div>
                </div>
            @endforelse
            @if ($books->hasPages())
                {{ $books->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
