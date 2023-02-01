<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.admin.user.show');
    }

    public function goToEdit()
    {
        return redirect()->route('user.edit', $this->user->id);
    }

    public function goBack()
    {
        return redirect()->route('user.index');
    }
}
