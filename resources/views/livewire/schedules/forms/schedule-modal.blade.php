<div>
    <div
        class="{{ !$showModal ? 'hidden' : 'block' }} fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add Schedule
                    </h3>
                    <button type="button" wire:click="closeModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="fixed inset-0 z-50 overflow-auto bg-smoke-light flex">
                    <div class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex rounded-lg">
                        <h2 class="text-xl mb-4">Select Month and Year</h2>
                        <form wire:submit.prevent="submit">
                            <div class="mb-4">
                                <label for="selectedYear" class="block text-sm font-medium text-gray-700">Year</label>
                                <select id="selectedYear" wire:model="selectedYear" wire:change="updateAvailableMonths"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach (range(now()->year - 5, now()->year + 5) as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('selectedYear')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="selectedMonth" class="block text-sm font-medium text-gray-700">Month</label>
                                <select id="selectedMonth" wire:model="selectedMonth"s
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="default">Select</option>
                                    @foreach ($availableMonths as $monthNumber => $monthName)
                                        <option value="{{ $monthNumber }}">{{ $monthName }}</option>
                                    @endforeach
                                </select>
                                @error('selectedMonth')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex justify-end">
                                <button type="button" wire:click="closeModal"
                                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Cancel</button>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
