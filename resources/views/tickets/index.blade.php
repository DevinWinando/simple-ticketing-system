@extends('layouts.app')

@section('content')
    <div class="my-task d-flex flex-nowrap">
        <div class="order-1 custom_scroll">
            <button type="button" class="btn bg-secondary text-light mb-3 w-100" data-bs-toggle="modal"
                data-bs-target="#new">New Tickets</button>
            <ul class="nav nav-tabs menu-list list-unstyled mb-0 border-0" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#task_all"
                        role="tab">
                        <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-secondary"
                                d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z" />
                            <path
                                d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                        </svg>
                        <span>All</span>
                        <span class="badge bg-light text-dark ms-2 ms-auto">{{ $tickets->count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_priority"
                        role="tab">
                        <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path class="fill-secondary"
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                        </svg>
                        <span>Open</span>
                        <span class="badge bg-dark ms-2 ms-auto">{{ $open->count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#task_today"
                        role="tab">
                        <svg viewBox="0 0 16 16" width="20px" class="me-3" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-secondary"
                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                        </svg>
                        <span>Closed</span>
                        <span class="badge bg-info text-dark ms-2 ms-auto">{{ $closed->count() }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="order-2 flex-grow-1 px-lg-3 px-0 custom_scroll">

            <div class="page-toolbar py-2">
                <div class="container-fluid">
                    <div class="row g-3 mb-3 align-items-center">
                        <div class="col">
                            <ol class="breadcrumb bg-transparent mb-0">
                                <li class="breadcrumb-item"><a class="text-secondary" href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Tickets</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="task_all" role="tabpanel">
                                <div class="d-flex justify-content-between mb-2">
                                    <h4 class="mt-1 mb-0">All Ticket</h4>
                                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle"
                                        type="button"><i class="fa fa-bars"></i></button>
                                </div>
                                <ul class="list-group list-group-flush list-group-custom">
                                    @foreach ($tickets as $ticket)
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions pe-2 end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm btn-edit"
                                                    data-bs-toggle="tooltip" data-id="{{ $ticket->id }}"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button"
                                                    class="btn btn-delete text-danger btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-id="{{ $ticket->id }}"
                                                    data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <div>
                                                            <span class="fs-6 me-2">{{ $ticket->title }}</span>
                                                            <span
                                                                class="border px-1 @if ($ticket->status == 'open') bg-dark @else bg-secondary @endif text-light rounded small">{{ ucfirst($ticket->status) }}</span>
                                                        </div>
                                                        <div class="mt-2">
                                                            <span
                                                                class="small text-muted text-uppercase me-2">Assigned
                                                                To: {{ $ticket->createdBy->name }}</span>
                                                            <span
                                                                class="border px-1 rounded small @if ($ticket->priority == 'high') bg-danger text-light @endif">{{ ucfirst($ticket->priority) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">
                                                            {{ $ticket->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                {{ $ticket->formatted_due_date }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="task_priority" role="tabpanel">
                                <div class="d-flex justify-content-between mb-2">
                                    <h4 class="mt-1 mb-0">Open Ticket</h4>
                                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle"
                                        type="button"><i class="fa fa-bars"></i></button>
                                </div>
                                <ul class="list-group list-group-flush list-group-custom">
                                    @foreach ($open as $ticket)
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions pe-2 end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm btn-edit"
                                                    data-bs-toggle="tooltip" data-id="{{ $ticket->id }}"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button"
                                                    class="btn btn-delete text-danger btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-id="{{ $ticket->id }}"
                                                    data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <div>
                                                            <span class="fs-6 me-2">{{ $ticket->title }}</span>
                                                            <span
                                                                class="border px-1 @if ($ticket->status == 'open') bg-dark @else bg-secondary @endif text-light rounded small">{{ ucfirst($ticket->status) }}</span>
                                                        </div>
                                                        <div class="mt-2">
                                                            <span
                                                                class="small text-muted text-uppercase me-2">Assigned
                                                                To: {{ $ticket->createdBy->name }}</span>
                                                            <span
                                                                class="border px-1 rounded small @if ($ticket->priority == 'high') bg-danger text-light @endif">{{ ucfirst($ticket->priority) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">
                                                            {{ $ticket->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                {{ $ticket->formatted_due_date }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="task_today" role="tabpanel">
                                <div class="d-flex justify-content-between mb-2">
                                    <h4 class="mt-1 mb-0">Closed Ticket</h4>
                                    <button class="btn btn-sm d-block d-lg-none btn-primary task-list-toggle"
                                        type="button"><i class="fa fa-bars"></i></button>
                                </div>
                                <ul class="list-group list-group-flush list-group-custom">
                                    @foreach ($closed as $ticket)
                                        <li class="row g-0 list-group-item d-flex align-items-start py-3">
                                            <div class="hover-actions pe-2 end-0 me-3 bg-light rounded">
                                                <button type="button" class="btn btn-link btn-sm btn-edit"
                                                    data-bs-toggle="tooltip" data-id="{{ $ticket->id }}"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button"
                                                    class="btn btn-delete text-danger btn-link btn-sm"
                                                    data-bs-toggle="tooltip" data-id="{{ $ticket->id }}"
                                                    data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                            <div class="col col-md-10 col-xxl-11">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5 col-xxl-4 mb-1 mb-md-0">
                                                        <div>
                                                            <span class="fs-6 me-2">{{ $ticket->title }}</span>
                                                            <span
                                                                class="border px-1 @if ($ticket->status == 'open') bg-dark @else bg-secondary @endif text-light rounded small">{{ ucfirst($ticket->status) }}</span>
                                                        </div>
                                                        <div class="mt-2">
                                                            <span
                                                                class="small text-muted text-uppercase me-2">Assigned
                                                                To: {{ $ticket->createdBy->name }}</span>
                                                            <span
                                                                class="border px-1 rounded small @if ($ticket->priority == 'high') bg-danger text-light @endif">{{ ucfirst($ticket->priority) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="i-msg mb-0 text-muted">
                                                            {{ $ticket->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-auto ms-auto d-flex flex-column justify-content-between small">
                                                {{ $ticket->formatted_due_date }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div> <!-- .row end -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="new" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <input name="title" required class="form-control" type="text"
                                    autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Detail</label>
                                <textarea name="description" class="form-control" type="text" required="" autocomplete="off"
                                    rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Due Date</label>
                                <div class="input-group">
                                    <input name="due_date" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Priority</label>
                                <select required name="priority" class="form-select">
                                    <option selected="" disabled>Select</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Assigned To</label>
                                <select required name="assigned_to" class="form-select">
                                    <option selected="" disabled>Select</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="form-edit">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const btnDelete = document.querySelectorAll('.btn-delete');
        const btnEdit = document.querySelectorAll('.btn-edit');

        btnDelete.forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this ticket?')) {
                    fetch(`/tickets/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Ticket deleted successfully');
                                location.reload();
                            }
                        });
                }
            });
        });

        btnEdit.forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `/tickets/${id}/edit`, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        const modalBody = document.querySelector('#edit .modal-body');
                        modalBody.innerHTML = xhr.responseText;

                        const formEdit = document.querySelector('#form-edit');
                        formEdit.action = `/tickets/${id}`;
                    }
                }
                xhr.send();

                $('#edit').modal('show');
            });
        });
    </script>

    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif
@endsection
