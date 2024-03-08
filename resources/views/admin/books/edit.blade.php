<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="{{ route('books.update', ['book' => $book]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-control">
                            <label for="name" class="block mb-2">{{ __('Book') }}</label>
                            <input type="text" id="name" name="name" placeholder="Enter book's Name" value="{{ $book->name }}" required />
                        </div>
                        <div class="form-control">
                            <label for="description" class="block mb-2">{{ __('Description') }}</label>
                            <textarea id="description" name="description" cols="30" rows="5" placeholder="Enter description" required>{{ $book->description }}</textarea>
                        </div>
                        <div class="form-control">
                            <label for="writer" class="block mb-2">{{ __('Writer') }}</label>
                            <input type="text" id="writer" name="writer" placeholder="Enter writer's name" value="{{ $book->writer }}" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="submit-btn ml-3">
                                Update Book
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .form-control {
        margin-bottom: 10px;
    }

    .form-control label {
        display: block;
        margin-bottom: 5px;
    }

    .form-control input,
    .form-control textarea {
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
</style>
