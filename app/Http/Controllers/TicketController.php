<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tickets\Store;
use App\Http\Requests\Tickets\Update;
use App\Repositories\TicketRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private $repo;
    private $userRepo;

    public function __construct(TicketRepository $repo, UserRepository $userRepo)
    {
        $this->repo = $repo;
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $tickets = $this->repo->all();
        $open = $tickets->where('status', 'open');
        $closed = $tickets->where('status', 'closed');
        $users = $this->userRepo->all();

        return view('tickets.index', compact('tickets', 'open', 'closed', 'users'));
    }

    public function store(Store $request)
    {
        $this->repo->create($request->all());

        return redirect()->route('tickets.index');
    }

    public function edit($ticket)
    {
        $ticket = $this->repo->find($ticket);
        $users = $this->userRepo->all();

        return view('tickets.edit', compact('ticket', 'users'));
    }

    public function update(Update $request, $id)
    {
        $this->repo->update($request->all(), $id);

        return redirect()->route('tickets.index');
    }

    public function destroy($ticket)
    {
        $this->repo->delete($ticket);

        return [
            'status' => 'success',
            'message' => 'Ticket deleted successfully',
            'success' => true
        ];
    }
}
