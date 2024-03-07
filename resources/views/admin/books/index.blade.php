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
                        <x-input-label for="book" :value="__('Book')" />
                            <input type="text" id="name" name="name" placeholder="Enter book's Name" required />                        </div>
                        <div class="form-control">
                        <x-input-label for="description" :value="__('Description')" />
                         <textarea id="description" name="description" cols="30" rows="5" placeholder="Enter description" required></textarea>
                        </div>
                        <div class="form-control">
                        <x-input-label for="writer" :value="__('Writer')" />
                            <input type="text" id="writer" name="writer" placeholder="Enter writer's name" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        Create New Book
                    </x-primary-button>
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
                        <h3>{{ 'Book ID: ' . e($book['id']) }}</h3>
                        <h3>{{ 'Book name: ' . e($book['name']) }}</h3>
                        <p>{{ 'Book description: ' . e($book['description']) }}</p>
                        <p>Written by: {{ e($book['writer']) }}</p>
                        <button class="book-button" >Delete Book</button>
                        <button class="book-button" >Edit Book</button>
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
            background-color: #E2E8F0;
            color: #1A202C;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</x-app-layout>
