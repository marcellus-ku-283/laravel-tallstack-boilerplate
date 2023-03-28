<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Test extends Component
{
    use WithFileUploads;

    public $photo;
 
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
    }
 
    public function save()
    {
        // ...
    }

    
    public function render()
    {
        return view('livewire.test');
    }
}
