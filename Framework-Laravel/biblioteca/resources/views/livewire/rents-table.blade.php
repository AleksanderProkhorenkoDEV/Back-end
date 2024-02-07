<div class="table-container">
    <h1>Rents table</h1>
    <table>
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>User</th>
            <th>Loan Date</th>
            <th>Deadline</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @forelse ($rents as $rent)
                <tr>
                    <td>{{ $rent->rent_id }}</td>
                    <td>{{ $rent->book->title }}</td>
                    <td>{{ $rent->user->name }}</td>
                    <td>{{ $rent->loan_date }}</td>
                    <td>{{ $rent->deadline }}</td>
                    <td>
                        <button wire:click="edit({{ $rent->rent_id }})">Edit</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{ $rent->rent_id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    No rents yet...
                </tr>
            @endforelse
        </tbody>

    </table>

    <form wire:submit.prevent="update">
        @csrf

        <label for="">deadline</label>
        <input type="date" wire:model="deadline" />
        <p>
            {!! $errors->first('deadline') !!}
        </p>
        <button type="submit">update</button>
    </form>
    <a href="{{ route('rent.create') }}">Add Book</a>
</div>
