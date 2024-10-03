<!-- resources/views/tasks/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule List') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:schedules.tables.list-schedule />
        <livewire:schedules.forms.schedule-modal />
    </div>

</x-app-layout>
