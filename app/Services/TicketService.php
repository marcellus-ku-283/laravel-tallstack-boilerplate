<?php

namespace App\Services;

use App\Models\Ticket;

class TicketService
{
    private $model;

    public function __construct(Ticket $model)
    {
        $this->model = $model;
    }

    public function collection($inputs = [])
    {
        if (auth()->user()->role == 'admin') {
            $tickets = $this->model;
        } else {
            $tickets = $this->model->whereUserId(auth()->id() ?? null);
        }
        

        if (!empty($inputs['search'])) {
            $tickets = $tickets->search($inputs['search']);
        }
        
        if (!empty($inputs['filters'])) {
            $tickets = $tickets->filter($inputs['filters']);
        }
        $tickets = $tickets->paginate(config('site.pagination.limit'));
        return $tickets;
    }

    public function resource($id, $inputs = [])
    {
        if (auth()->user()->role == 'admin') {
            $ticket = $this->model->findOrFail($id);
        } else {
            $ticket = $this->model->whereUserId(auth()->id() ?? null)->findOrFail($id);
        }
        return $ticket;
    }

    public function store($inputs = [])
    {
        $inputs['user_id'] = auth()->id();
        $ticket = $this->model->create($inputs);
        return $ticket->refresh();
    }
}
