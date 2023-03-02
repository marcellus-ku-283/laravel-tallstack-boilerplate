<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    private $users;
    public $search;
    public $dialogModel = false;
    public $deleteId;
    public $sortField = 'id';
    public $sortDirection = 'desc';
    
    public function render()
    {
        $this->getUsers();
        return view('livewire.admin.customer.index', [
            'users' => $this->users
        ]);
    }


    public function updatedSearch()
    {
        $this->getUsers();        
    }

    public function getUsers()
    {
        $this->users = new User;
        $this->users = $this->users->customerUsers();
        if (!empty($this->search)) {
            $this->users = $this->users->search($this->search);
        }
        $this->users = $this->users->orderBy($this->sortField, $this->sortDirection)->paginate(config('site.pagination.limit'));
    }

    public function sortBy($field)
    {
        $this->sortDirection = ($field == $this->sortField)
            ? ($this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc' ) : 'asc';
        $this->sortField = $field;
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->dialogModel = true;
    }

    public function closeConfirm()
    {
        $this->reset(['deleteId']);
        $this->dialogModel = false;
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        
        $this->closeConfirm();
    }

    public function updateBlockStatusForUser(User $user)
    {
        $user->block = !$user->block;
        $user->save();
    }
}
