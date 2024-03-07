<x-app-layout>
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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome back!") }}
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
                        <h3>{{ 'Book name: ' . e($book['name']) }}</h3>
                        <p>{{ 'Book description: ' . e($book['description']) }}</p>
                        <p>Written by: {{ e($book['writer']) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</x-app-layout>
