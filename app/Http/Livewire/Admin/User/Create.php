<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $user;
    public $name;
    public $roles;
    public $role;
    public $email;
    public $rules = [
        'name' => 'required|string|max:64',
    ];

    public function mount($user = null)
    {
        $this->user = User::find($user);        
        if (!empty($this->user)) {
            $this->name = $this->user->name;
            $this->email = $this->user->email;
        }
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }

    public function save()
    {
        if (!empty($this->user)) {
            $this->rules += [
                'email' => 'required|email|max:255|unique:users,email,'.$this->user->id
            ];
        } else {
            $this->rules += [
                'email' => 'required|email|max:255|unique:users,email'
            ];
        }

        $validated = $this->validate();

        if (!empty($this->user)) {
            $this->user->update($validated);
            session()->flash('flash.success', 'User updated successfully.');
            return redirect()->route('user.index');
        }
        
        User::create($validated);
        session()->flash('flash.success', 'User created successfully.');
        return redirect()->route('user.index');
    }

    public function goBack()
    {
        return redirect()->route('user.index');
    }
}
