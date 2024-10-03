<div>
    <div class="main-header text-lg font-semibold text-center">
        Duty Schedule {{ date('F', mktime(0, 0, 0, $selectedMonth, 1)) }} {{ $currentYear }}
    </div>
    <div class="navibar flex justify-between items-center mb-4 py-8">
        <button wire:click="previousMonth"
            class="group relative overflow-hidden bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center px-5 py-2.5 rounded-lg text-white justify-end">
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
            <select wire:model="selectedMonth" id="monthSelect" class="border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:border-blue-500" wire:change="selectMonth">
                <option value="">Select</option>
                @foreach($monthOptions as $month => $monthName)
                    <option value="{{ $month }}">{{ $monthName }}</option>
                @endforeach
            </select>
        </div>

        <button wire:click="nextMonth" 
                class="group relative overflow-hidden bg-blue-600 focus:ring-4 focus:ring-blue-300 inline-flex items-center px-5 py-2.5 rounded-lg text-white justify-start">
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
</div>