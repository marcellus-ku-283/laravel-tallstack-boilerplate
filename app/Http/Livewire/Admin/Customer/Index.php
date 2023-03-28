<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\User;
use App\Services\UserService;
use Livewire\Component;

class Index extends Component
{
    private $users;
    public $search;
    public $dialogModel = false;
    public $deleteId;
    public $sortField = 'id';
    public $sortDirection = 'desc';
    public $statusFilter; // Key by which you can run `where` query for filters.
    public $statusFilters = [ // Values to show on HTML for filters.
        'active',
        'inactive'
    ];

    
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

    public function getUsers($inputs = [])
    {
        $this->users = new UserService(new User);
        $inputs['sort']['by'] = $this->sortField;
        $inputs['sort']['order'] = $this->sortDirection;
        $this->users = $this->users->collection($inputs);
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

    public function updatedStatusFilter()
    {
        $this->getUsers([
            'filters' => [
                'status' => $this->statusFilter
            ]
        ]);
    }
}