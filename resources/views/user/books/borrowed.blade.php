<x-app-layout>
    <style>
        .book-item {
            background-color: #2D3748;
            color: white;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .status-box {
            padding: 8px;
            border-radius: 5px;
            text-align: center;
        }
        .status-inprogress {
            background-color: #f6ad55;
        }
        .status-returned {
            background-color: #68d391;
        }
    </style>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Borrowing History') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            @foreach ($borrowedBooks as $borrowedBook)
                <div class="bg-white p-4 text-black shadow sm:rounded-lg sm:p-8 dark:bg-gray-800 dark:text-white">
                    <div class="flex items-start justify-between">
                        <div class="flex flex-col gap-2"> 
                                <div class="status-box {{ $borrowedBook->status == 'inprogress' ? 'status-inprogress' : 'status-returned' }}">
                                    {{ $borrowedBook->status == 'inprogress' ? __('In Progress') : __('Returned') }}
                                </div>
                            <span>{{ __('Borrowed since:') }} {{ $borrowedBook->created_at->format('Y-m-d') }}</span>
                            <span>{{ __('Borrowed Book due date:') }} {{ $borrowedBook->due_date }}</span>
                            <span>{{ __('Book name:') }} {{ $borrowedBook->book->name }}</span>
                            <span>{{ __('ID:') }} {{ $borrowedBook->id }}</span>
                        </div>
                        @if($borrowedBook->status == 'inprogress')
                            <div class="flex items-center gap-4">
                                <form method="POST" action="{{ route('user.borrow.update', $borrowedBook) }}">
                                    @csrf
                                    @method('put')
                                    <x-primary-button class="mt-4">{{ __('Return Book') }}</x-primary-button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            @if ($borrowedBooks->hasPages())
                {{ $borrowedBooks->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
