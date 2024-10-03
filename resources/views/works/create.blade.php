<!-- resources/views/works/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Work') }}
        </h2>
    </x-slot>
<div class="container mx-auto px-20">
    <form action="{{ route('works.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="name" name="name" required>
        </div>
        <div class="mb-4">
            <label for="office" class="block text-sm font-medium text-gray-700">Office:</label>
            <select class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="office" name="office" required>
                <option value="upper">Upper</option>
                <option value="lower">Lower</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender:</label>
            <select class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="both">Both</option>
            </select>
        </div>
        <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add Work</button>
    </form>
</div>

</x-app-layout>
