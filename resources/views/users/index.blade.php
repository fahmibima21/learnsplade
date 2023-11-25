<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('users.create')}} " class="p-4 bg-green-500 rounded-md text-white hover:bg-green-100">Create User</a>
            <x-splade-table :for="$users" pagination-scroll="preserve">
            <x-splade-cell actions as='$user'>
                <x-splade-link href="{{route('users.edit' , $user)}}" class="p-2 bg-green-500 hover:bg-green-400 rounded-md text-white">Edit</x-splade-link>
                <x-splade-form  
                action="{{route('users.destroy', $user)}}"
                method="delete"
                confirm="Delete profile"
                confirm-text="Are you sure you want to delete your profile?"
                confirm-button="Yes, delete everything!"
                cancel-button="No, I want to stay!">
                    <x-splade-button class="p-2 bg-red-500 text-white rounded-md">Delete</x-splade-button>
                </x-splade-form>
            </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-app-layout>