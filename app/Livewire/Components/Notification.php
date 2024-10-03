<?php

// app/Http/Livewire/Notifications.php

namespace App\Livewire\Components;

use Livewire\Component;

class Notifications extends Component
{
    public $notifications = [];

    public function addNotification($message)
    {
        $this->notifications[] = $message;
    }

    public function removeNotification($index)
    {
        unset($this->notifications[$index]);
        $this->notifications = array_values($this->notifications);
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
