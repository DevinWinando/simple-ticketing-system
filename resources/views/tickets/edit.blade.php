<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="{{ $ticket->title }}" type="text" required
            autocomplete="off">
    </div>
    <div class="col-12">
        <label class="form-label">Detail</label>
        <textarea name="description" class="form-control" type="text" required autocomplete="off"
            rows="5">{{ $ticket->description }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">Due Date</label>
        <div class="input-group">
            <input name="due_date" value="{{ \Carbon\Carbon::parse($ticket->due_date)->format('Y-m-d') }}"
                type="date" class="form-control">
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Priority</label>
        <select required name="priority" class="form-select">
            <option disabled>Select</option>
            <option @if ($ticket->priority == 'low') selected @endif value="low">Low</option>
            <option @if ($ticket->priority == 'medium') selected @endif value="medium">Medium</option>
            <option @if ($ticket->priority == 'high') selected @endif value="high">High</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Assigned To</label>
        <select required name="assigned_to" class="form-select">
            <option disabled>Select</option>
            @foreach ($users as $user)
                <option @if ($ticket->assigned_to == $user->id) selected @endif value="{{ $user->id }}">
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
