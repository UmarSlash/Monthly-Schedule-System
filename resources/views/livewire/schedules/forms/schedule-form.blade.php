<!-- resources/views/livewire/month-dropdown.blade.php -->
<div class="container mx-auto px-20 py-4">
    <div class="navibar flex justify-between items-center mb-4">
        <!-- Previous Month Button -->
        <button wire:click="previousMonth" 
            class="group relative overflow-hidden bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center px-5 py-2.5 rounded-lg text-white justify-center">
            <svg class="z-40 ml-2 mr-2 w-3 h-3 transition-all duration-300 group-hover:-translate-x-2 transform rotate-180" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="z-40">Previous Month</span>
            <div
                class="absolute inset-0 h-[200%] w-[200%] rotate-45 translate-x-[-70%] transition-all group-hover:scale-100 bg-white/30 group-hover:translate-x-[50%] z-20 duration-1000">
            </div>
        </button>

        <div class="month-dropdown flex items-center space-x-4">
            <label for="monthSelect" class="text-black">Select Month:</label>
            <select wire:model="selectedMonth" id="monthSelect" class="border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:border-blue-500" wire:change="storeMonth">
                <option value="">Select</option>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Next Month Button -->
        <button wire:click="nextMonth" 
            class="group relative overflow-hidden bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center px-5 py-2.5 rounded-lg text-white justify-center">
            <span class="z-40">Next Month</span>
            <svg class="z-40 ml-2 mr-2 w-3 h-3 transition-all duration-300 group-hover:translate-x-2" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <div
                class="absolute inset-0 h-[200%] w-[200%] rotate-45 translate-x-[-70%] transition-all group-hover:scale-100 bg-white/30 group-hover:translate-x-[50%] z-20 duration-1000">
            </div>
        </button>
        
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg schedule-container">
            <form id="taskDetailsForm" wire:submit.prevent="storeTaskDetails" action="{{ route('storeTaskDetail') }}" method="POST">
                @csrf
                <livewire:schedules.tables.schedule-table />
            </form>
    </div>
    <div class="flex justify-between">
        <div>
            <button type="button" id="randomizeButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="toggleLoading(this, true)">
                <span id="randomizeButtonText">Randomize Selections</span>
                <span id="randomizeButtonLoader" class="hidden ml-2">
                    <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#ffffff"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                    </svg>
                    Loading...
                </span>
            </button>

            <a href="{{ route('generate.pdf', ['month' => $month]) }}" class="btn btn-primary px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Download PDF</a>
        </div>
        <div>
            <button type="button" id="saveButton" class="btn btn-primary px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Save</button>
        </div>
    </div>
</div>
<script>
    function toggleLoading(button, isLoading) {
        var buttonText = document.getElementById('randomizeButtonText');
        var buttonLoader = document.getElementById('randomizeButtonLoader');
        if (isLoading) {
            buttonText.classList.add('hidden');
            buttonLoader.classList.remove('hidden');
            // Call your function here
            randomizeDropdownOptions();
            // Set a timeout to revert the button back to its original state after some time (for demonstration purposes)
            setTimeout(function() {
                buttonText.classList.remove('hidden');
                buttonLoader.classList.add('hidden');
            }, 2000); // 3000 milliseconds (3 seconds)
        }
    }
</script>