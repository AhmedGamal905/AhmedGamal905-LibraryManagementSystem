<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Book') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-2xl p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('admin.books.store') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                    placeholder="{{ __('Name') }}" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="writer" :value="__('Writer')" />
                <x-text-input id="writer" class="mt-1 block w-full" type="text" name="writer"
                    placeholder="{{ __('Writer') }}" :value="old('writer')" required autofocus />
                <x-input-error :messages="$errors->get('writer')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <textarea name="description" placeholder="{{ __('Description') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
