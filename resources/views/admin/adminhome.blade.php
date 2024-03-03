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
                    <form action="submit-form.php" method="POST">
                        <div class="form-control">
                            <label for="book">book</label>
                            <input type="text" id="name" name="name" placeholder="Enter book's Name" required />
                        </div>
                        <div class="form-control">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" cols="30" rows="5" placeholder="Enter description" required></textarea>
                        </div>
                        <div class="form-control">
                            <label for="writer">Writer</label>
                            <input type="text" id="writer" name="writer" placeholder="Enter writer's name" required />
                        </div>
                        <input type="submit" value="Submit" class="submit-btn" />
                    </form>
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
    </style>
</x-app-layout>
