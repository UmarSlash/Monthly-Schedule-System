<!-- resources/views/staffs/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff List') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:staffs.tables.list-staff />
        <livewire:staffs.forms.staff-form />
    </div>

</x-app-layout>
