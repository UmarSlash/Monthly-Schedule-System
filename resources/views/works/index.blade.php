<!-- resources/views/works/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Work List') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-10 py-4">
        <livewire:works.tables.list-work />
        <livewire:works.forms.work-form />
    </div>


</x-app-layout>
