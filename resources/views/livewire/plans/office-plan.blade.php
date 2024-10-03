<div class="max-w-7xl mx-auto px-4 sm:px-3 lg:px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- First Form -->
        <div class="bg-white p-6 rounded-lg shadow-md relative">
                <input type="file" wire:model="file1" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                @error('file1') <span class="text-red-500">{{ $message }}</span> @enderror

                @foreach ($plans as $plan)
                    @if ($plan->upperFile)
                        <div class="mt-4">
                            <h4 class="text-lg font-semibold">Upper Office Plan:</h4>
                            <embed src="{{ $plan->upperFile }}" type="application/pdf" class="w-full h-96 mt-2 border border-gray-300 rounded">
                        </div>
                    @endif
                @endforeach
        </div>

        <!-- Second Form -->
        <div class="bg-white p-6 rounded-lg shadow-md relative">
                <input type="file" wire:model="file2" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                @error('file2') <span class="text-red-500">{{ $message }}</span> @enderror

                @foreach ($plans as $plan)
                    @if ($plan->lowerFile)
                        <div class="mt-4">
                            <h4 class="text-lg font-semibold">Lower Office Plan:</h4>
                            <embed src="{{ $plan->lowerFile }}" type="application/pdf" class="w-full h-96 mt-2 border border-gray-300 rounded">
                        </div>
                    @endif
                @endforeach
        </div>
    </div>

    <!-- Centered Upload Button -->
    <div class="flex justify-end mt-6">
        <form wire:submit.prevent="store">
            <input type="file" wire:model="file1" class="hidden">
            <input type="file" wire:model="file2" class="hidden">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
        </form>
    </div>
</div>
