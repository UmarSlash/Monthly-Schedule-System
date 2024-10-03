<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Office Plan') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-10 py-4">
        <livewire:plans.office-plan>
    </div>
</x-app-layout>