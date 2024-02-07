<div class="table-container">
    <h1>Author Table</h1>
    <table>
        @if ($authors !== null)
            <thead>
                <th>#</th>
                <th>Surname</th>
                <th>Name</th>
                <th>Nationality</th>
                <th></th>
                <th></th>
            </thead>
        @endif
        <tbody>
            @forelse ($authors as $author)
                <tr>
                    <td>{{ $author->author_id }}</td>
                    <td>{{ $author->surnames }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->nationality }}</td>
                    <td>
                        <button wire:click="edit({{ $author->author_id }})">Edit</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{ $author->author_id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>No author register yet...</tr>
            @endforelse
        </tbody>
        <form wire:submit.prevent="update">
            @csrf
    
            <input type="hidden" wire:model="author_id">
    
            <input type="text" wire:model="surnames">
            @error('surnames')
                <p>The surnames formad isn´t valid</p>
            @enderror
            <input type="text" wire:model="name">
            @error('name')
                <p>The name format isn't valid</p>
            @enderror
            <input type="text" wire:model="nationality">
            @error('nationality')
                <p>The nationality format isn't valid</p>
            @enderror
    
            <button type="submit">update</button>
        </form>
    </table>

    <a href="{{ route('author.create') }}">Add Authors</a>
</div>
