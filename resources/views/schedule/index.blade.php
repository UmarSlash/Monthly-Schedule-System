<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Schedule') }}
        </h2>
    </x-slot>
    <div class="main-header text-lg font-semibold text-center py-4">
        Duty Schedule {{ date('F', mktime(0, 0, 0, $month, 1)) }}
    </div>
        <livewire:schedules.forms.schedule-form />
</x-app-layout>
