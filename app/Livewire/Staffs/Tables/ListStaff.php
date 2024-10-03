<?php

namespace App\Livewire\Staffs\Tables;

use App\Livewire\Staffs\Forms\StaffForm;
use App\Models\Staff;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class ListStaff extends Component
{
    public ?string $search = null;
    public Collection $staffs;

    #[On('refreshComponent')]
    public function mount() {
        $this->staffs = $this->getStaff();
    }

    public function updatedSearch()
    {
        $this->staffs = $this->getStaff();
    }

    protected function getStaff()
    {
        return Staff::when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))->get();
    }

    public function add()
    {
        $this->dispatch('show')->to(StaffForm::class);
    }

    public function edit($id)
    {
        $this->dispatch('show', $id)->to(StaffForm::class);
    }
    
    public function cancel()
    {
        return redirect()->route('staffs.index');
    }

    public function render()
    {
        return view('livewire.staffs.tables.list-staff');
    }
}
