<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    private $user;
    public $userId;

    public function mount($customer)
    {
        $this->userId = $customer;
    }

    public function render()
    {
        $this->user = User::find($this->userId);
        return view('livewire.admin.customer.show', [
            'user' => $this->user
        ]);
    }

    public function goToEdit()
    {
        return redirect()->route('customer.edit', $this->userId);
    }

    public function goBack()
    {
        return redirect()->route('customer.index');
    }
}
