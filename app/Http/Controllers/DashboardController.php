<?php

namespace App\Http\Controllers;

use App\Repositories\TicketRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $ticketRepo;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    public function index()
    {
        $tickets = $this->ticketRepo->all();

        $allCount = $tickets->count();
        $openCount = $tickets->where('status', 'open')->count();
        $closedCount = $tickets->where('status', 'closed')->count();

        $priorityCount = [
            'high' => $tickets->where('priority', 'high')->count(),
            'medium' => $tickets->where('priority', 'medium')->count(),
            'low' => $tickets->where('priority', 'low')->count(),
        ];

        $dueCount = [
            'overdue' => $tickets->where('due_date', '<', now()->format('Y-m-d'))->whereNotNull('due_date')->count(),
            'today' => $tickets->where('due_date', now()->format('Y-m-d'))->count(),
            'tomorrow' => $tickets->where('due_date', now()->addDay()->format('Y-m-d'))->count(),
            'nextWeek' => $tickets->where('due_date', '>=', now()->addWeek()->format('Y-m-d'))->count(),
        ];

        return view('index', compact('allCount', 'openCount', 'closedCount', 'priorityCount', 'dueCount'));
    }
}
