<?php

namespace App\Http\Livewire\Developer;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.developer.dashboard')->layout('layouts.developer');
    }
}
