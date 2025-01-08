<?php

namespace App\Repositories;

use App\Models\Ticket;

class TicketRepository
{
    private $model;

    public function __construct(Ticket $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with(['assignedTo', 'createdBy'])->orderBy('due_date')->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data + [
            'created_by' => auth()->id(),
            'status' => 'open',
        ]);
    }

    public function update($data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}