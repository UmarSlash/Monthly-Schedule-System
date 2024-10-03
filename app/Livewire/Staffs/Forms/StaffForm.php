<?php

namespace App\Livewire\Staffs\Forms;

use App\Models\Staff;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Livewire\Staffs\Tables\ListStaff;
use Illuminate\Validation\Rule;

class StaffForm extends Component
{
    public ?Staff $staff = null;

    public ?string $name = null;
    public ?string $email = null;
    public ?string $gender = null;

    public bool $showModel = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => ['required', 'email', Rule::unique('staff', 'email')->ignore($this->staff->id)],
            'gender' => 'required|in:male,female',
        ];
    }

    public function getStaff($staff)
    {
        $this->staff = $staff;
        $this->name = $this->staff->name;
        $this->email = $this->staff->email;
        $this->gender = $this->staff->gender;
    }

    public function mount()
    {
        $this->staff ??= new Staff();
        $this->getStaff($this->staff);
    }

    #[On('show')]
    public function show(?int $id = null)
    {
        $this->staff = $id ? Staff::findOrFail($id) : new Staff();
        $this->getStaff($this->staff);
        $this->showModel = true;
    }

    public function cancel()
    {
        $this->showModel = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['name', 'email', 'gender']);
        $this->resetErrorBag();
        $this->staff = new Staff();
    }

    private function generateRandomColor()
    {
        $minBrightness = 128; // Minimum brightness value for each color component to ensure brightness

        $r = mt_rand($minBrightness, 255);
        $g = mt_rand($minBrightness, 255);
        $b = mt_rand($minBrightness, 255);

        $colors = '#' . str_pad(dechex($r), 2, '0', STR_PAD_LEFT) .
                        str_pad(dechex($g), 2, '0', STR_PAD_LEFT) .
                        str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
    
        return $colors;
    }

    public function save()
    {
        $this->validate();

        $colors = $this->generateRandomColor();
        $this->staff->fill([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'color' => $colors,
        ])->save();

        // Flash success message
        session()->flash('message', 'Staff successfully saved.');
        $this->showModel = true;
        $this->dispatch('refreshComponent')->to(ListStaff::class);
    }

    public function render()
    {
        return view('livewire.staffs.forms.staff-form');
    }
}

