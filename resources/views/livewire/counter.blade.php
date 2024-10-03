<div class="max-w-7xl mx-auto px-4 sm:px-3 lg:px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- First Form -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form wire:submit.prevent="store" class="space-y-4">
                <input type="file" wire:model="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                @error('file') <span class="text-red-500">{{ $message }}</span> @enderror

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
            </form>
            @foreach ($plans as $plan)
                @if ($plan->upperFile)
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold">Uploaded PDF:</h4>
                        <embed src="{{ $plan->upperFile }}" type="application/pdf" class="w-full h-96 mt-2 border border-gray-300 rounded">
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Second Form -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form wire:submit.prevent="store" class="space-y-4">
                <input type="file" wire:model="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                @error('file') <span class="text-red-500">{{ $message }}</span> @enderror

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
            </form>
            @foreach ($plans as $plan)
                @if ($plan->upperFile)
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold">Uploaded PDF:</h4>
                        <embed src="{{ $plan->upperFile }}" type="application/pdf" class="w-full h-96 mt-2 border border-gray-300 rounded">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
