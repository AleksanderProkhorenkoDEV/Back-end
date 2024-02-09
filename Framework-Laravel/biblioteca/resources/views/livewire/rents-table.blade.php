<div class="table-container">
    <div class="content">
        <div class="item1">
            <h1>Rents table</h1>
        </div>
        <div class="item2">
            <table>
                @if ($rents != null)
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Loan Date</th>
                        <th>Deadline</th>
                        <th></th>
                    </thead>
                @endif
                <tbody>
                    @forelse ($rents as $rent)
                        <tr>
                            <td>{{ $rent->rent_id }}</td>
                            <td>{{ $rent->book->title }}</td>
                            <td>{{ $rent->user->name }}</td>
                            <td>{{ $rent->loan_date }}</td>
                            <td>{{ $rent->deadline }}</td>
                            <td>
                                <button wire:click="edit({{ $rent->rent_id }})" class="button-edit">Edit</button>
                                <button wire:click="destroy({{ $rent->rent_id }})" class="button-delete">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No rents yet...
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="item3">
            <form wire:submit.prevent="update">
                @csrf

                <label for="">DeadLine</label>
                <input type="date" wire:model="deadline" required/>
                <p>
                    {!! $errors->first('deadline') !!}
                </p>
                <button type="submit" class="button-update">update</button>
            </form>
        </div>
        <div class="item4">
            <a href="{{ route('rent.create') }}">Add Book</a>
        </div>
    </div>
</div>
