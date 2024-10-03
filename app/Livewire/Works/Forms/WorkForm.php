<?php

namespace App\Livewire\Works\Forms;

use App\Models\Work;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Livewire\Works\Tables\ListWork;

class WorkForm extends Component
{
    public ?Work $work = null;

    public ?string $name = null;
    public ?string $office = null;
    public ?string $gender = null;

    public bool $showModel = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'office' => 'required|in:upper,lower',
            'gender' => 'required|in:male,female,both',
        ];
    }

    public function getWork($work)
    {
        $this->work = $work;
        $this->name = $this->work->name;
        $this->office = $this->work->office;
        $this->gender = $this->work->gender;
    }

    public function mount()
    {
        $this->work ??= new Work();
        $this->getWork($this->work);
    }


    #[On('show')]
    public function show(?int $id = null)
    {
        $this->work = $id ? Work::findOrFail($id) : new Work();
        $this->getWork($this->work);
        $this->showModel = true;
    }

    public function cancel()
    {
        $this->showModel = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['name', 'office', 'gender']);
        $this->resetErrorBag();
        $this->work = new Work();
    }

    public function save()
    {
        $this->validate();
        $this->work->fill([
            'name' => $this->name,
            'office' => $this->office,
            'gender' => $this->gender,
        ])->save();
        // Flash success message
        $this->showModel = true;
        session()->flash('message', 'Work successfully saved.');
        $this->dispatch('refreshComponent')->to(ListWork::class);
    }

    public function render()
    {
        return view('livewire.Works.forms.Work-form');
    }
}
