<?php

namespace App\Livewire\Plans;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Plan;

class OfficePlan extends Component
{
    use WithFileUploads;

    public $file1;
    public $file2;
    public $upperFile;
    public $lowerFile;

    public function render()
    {
        $plans = Plan::all(); // Fetch all plans or modify based on your requirement
        return view('livewire.plans.office-plan', compact('plans'));
    }

    public function store()
    {
        $this->validate([
            'file1' => 'nullable|mimes:pdf|max:10240', // Make file1 nullable
            'file2' => 'nullable|mimes:pdf|max:10240', // Make file2 nullable
        ]);

        // Check if file1 or file2 is not null
        if ($this->file1 || $this->file2) {
            // Upload file1 and file2 if they are not null
            if ($this->file1) {
                $upperFilePath = $this->file1->store('public/pdf');
                $this->upperFile = asset('storage/' . str_replace("public/", "", $upperFilePath));
            }
            if ($this->file2) {
                $lowerFilePath = $this->file2->store('public/pdf');
                $this->lowerFile = asset('storage/' . str_replace("public/", "", $lowerFilePath));
            }

            // Find or create the Plan record and update the file paths
            $plan = Plan::find(1); // Assuming there is always one record with id 1
            if ($plan) {
                // If the plan exists, update the file paths only for non-null files
                $plan->update([
                    'upperFile' => $this->file1 ? $this->upperFile : $plan->upperFile,
                    'lowerFile' => $this->file2 ? $this->lowerFile : $plan->lowerFile,
                ]);
            } else {
                // If the plan doesn't exist, create a new record with non-null file paths
                Plan::create([
                    'id' => 1,
                    'upperFile' => $this->file1 ? $this->upperFile : null,
                    'lowerFile' => $this->file2 ? $this->lowerFile : null,
                ]);
            }

            // Clear the file input after upload
            $this->file1 = null;
            $this->file2 = null;
        }
    }

}
