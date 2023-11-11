<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('users.create')}} " class="p-4 bg-green-500 text-white hover:bg-green-100">Create User</a>
            <x-splade-table :for="$users" pagination-scroll="preserve" />
        </div>
    </div>
</x-app-layout>