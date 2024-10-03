<?php

namespace App\Livewire\Works\Tables;

use App\Livewire\Works\Forms\WorkForm;
use App\Models\Work;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class ListWork extends Component
{
    public ?string $search = null;
    public Collection $works;

    #[On('refreshComponent')]
    public function mount() {
        $this->works = $this->getWork();
    }

    public function updatedSearch()
    {
        $this->works = $this->getWork();
    }

    protected function getWork()
    {
        return Work::all();
    }

    public function add()
    {
        $this->dispatch('show')->to(WorkForm::class);
    }

    public function edit($id)
    {
        $this->dispatch('show', $id)->to(WorkForm::class);
    }
    
    public function cancel()
    {
        return redirect()->route('works.index');
    }

    // #[On('refreshComponent')]
    public function render()
    {
        return view('livewire.works.tables.list-work');
    }
}
