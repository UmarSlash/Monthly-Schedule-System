<!-- resources/views/works/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Work') }}
        </h2>
    </x-slot>
<div class="container mx-auto px-20">
    <form action="{{ route('works.update', $work->id) }}" method="POST" class="mt-8">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                <input type="text" class="shadow-sm block w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="name" name="name" value="{{ $work->name }}" required>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="office" class="block mb-2 text-sm font-medium text-gray-900">Office:</label>
                <select class="shadow-sm block w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="office" name="office" required>
                    <option value="upper" {{ $work->office == 'upper' ? 'selected' : '' }}>Upper</option>
                    <option value="lower" {{ $work->office == 'lower' ? 'selected' : '' }}>Lower</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender:</label>
                <select class="shadow-sm block w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" id="gender" name="gender" required>
                    <option value="male" {{ $work->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $work->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="both" {{ $work->gender == 'both' ? 'selected' : '' }}>Both</option>
                </select>
            </div>
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">Update Work</button>
    </form>
</div>

</x-app-layout>
