<div class="container mx-auto px-20 py-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg schedule-container">
        <form id="taskDetailsForm" wire:submit.prevent="storeTaskDetails" action="{{ route('storeTaskDetail') }}" method="POST">
            @csrf
            <livewire:schedules.tables.schedule-edit-table />
        </form>
    </div>
    
    <div class="flex justify-between">
        <div>
            <button type="button" id="saveButton" class="btn btns-primary px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Save</button>
        </div>
    </div>
</div>