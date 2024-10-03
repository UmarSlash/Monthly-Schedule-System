<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Schedule') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-20 py-4">
        {{-- <livewire:schedules.forms.schedule-button /> --}}
        <div class="main-header text-lg font-semibold text-center py-4">
            Duty Schedule {{ date('F', mktime(0, 0, 0, $task->month, 1)) }} {{ $task->year }}
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg schedule-container">
            <form id="taskDetailsForm" wire:submit.prevent="storeTaskDetails" action="{{ route('storeTaskDetail') }}" method="POST">
                @csrf
                <livewire:schedules.forms.create-schedule :task="$task" :mode="$mode" />
            </form>
        </div>
        <livewire:schedules.forms.schedule-navigation />
    </div>
</x-app-layout>