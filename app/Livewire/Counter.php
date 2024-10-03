<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Plan;

class Counter extends Component
{
    use WithFileUploads;

    public $file;
    public $filePath;

    public function render()
    {
        $plans = Plan::all(); // Fetch all plans or modify based on your requirement
        return view('livewire.counter', compact('plans'));
    }

    public function store()
    {
        $this->validate([
            'file' => 'required|mimes:pdf|max:10240', // Max 10MB
        ]);

        $filePath = $this->file->store('public/pdf');
        $this->filePath = asset('storage/' . str_replace("public/", "", $filePath));

        // Update the Plan entry with the new file path, or create it if it doesn't exist
        Plan::updateOrCreate(
            ['id' => 1], // Assuming there is always one record with id 1
            ['upperFile' => $this->filePath]
        );

        // Clear the file input after upload
        $this->file = null;
    }
}
