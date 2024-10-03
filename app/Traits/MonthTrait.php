<?php

namespace App\Traits;

use Livewire\Attributes\On;

trait MonthTrait 
{
    public function getYear()
    {
        return now()->year;
    }

    public function getMonth()
    {
        return now()->month;
    }
    
    #[On('getNextMonth')]
    public function getNextMonth()
    {
        return now()->addMonth()->month;
    }

    #[On('getPreviousMonth')]
    public function getPreviousMonth()
    {
        return now()->subMonth()->month;
    }
}