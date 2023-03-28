<?php

namespace App\Http\Livewire\Developer;

use App\Helpers\Authenticator;
use Illuminate\Contracts\Validation\Validator;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;
    public $rules = [
        'username' => 'required|max:64',
        'password' => 'required|max:255'
    ];

    public function render()
    {
        return view('livewire.developer.login')->layout('layouts.guest');
    }

    public function save()
    {
        $validated = $this->validate();
    
        $authenticator = new Authenticator(config('littlegatekeeper.username'), config('littlegatekeeper.password'), config('littlegatekeeper.sessionKey'), session());
        
        if (!$authenticator->attempt($validated)) {
            session()->flash('flash.danger', __('auth.failed'));
            return redirect()->route('developer.login');
        }

        $this->notify('Logged-in successful.');
        return redirect()->to('/telescope');
    }
}
