<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as an admin!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control">
                            <label for="name">{{ __('Book') }}</label>
                            <input type="text" id="name" name="name" placeholder="Enter book's Name" required />
                        </div>
                        <div class="form-control">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="description" name="description" cols="30" rows="5" placeholder="Enter description" required></textarea>
                        </div>
                        <div class="form-control">
                            <label for="writer">{{ __('Writer') }}</label>
                            <input type="text" id="writer" name="writer" placeholder="Enter writer's name" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="submit-btn">
                                {{ __('Create New Book') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Book List') }}
                    </h2>
                    @foreach ($books as $book)
                        <div class="book-item">
                            <h3>{{ __('Book ID: ') . e($book['id']) }}</h3>
                            <h3>{{ __('Book name: ') . e($book['name']) }}</h3>
                            <p>{{ __('Book description: ') . e($book['description']) }}</p>
                            <p>{{ __('Written by: ') . e($book['writer']) }}</p>
                            <div class="button-container">
                                <form method="POST" action="{{ route('books.destroy', $book) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="book-button delete-button">
                                        {{ __('Delete Book') }}
                                    </button>
                                </form>
                                <a href="{{ route('books.edit', $book) }}" class="book-button edit-button">
                                    {{ __('Edit Book') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <style>
        .form-control {
            margin-bottom: 10px;
        }
        .form-control label {
            display: block;
            margin-bottom: 5px;
        }
        .form-control input, .form-control textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #111827;
            color: white; 
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.7s;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .book-item {
            background-color: #2D3748;
            color: white;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .book-button {
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.7s;
        }
        .edit-button {
            background-color: #4CAF50;
            color: white;
        }
        .edit-button:hover {
            background-color: #45a049;
        }
        .delete-button {
            background-color: #f44336;
            color: white;
        }
        .delete-button:hover {
            background-color: #da190b;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</x-app-layout>
