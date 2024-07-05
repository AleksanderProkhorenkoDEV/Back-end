<div class="table-container">
    <div class="content">
        <div class="item1">
            <h1>Author Table</h1>
        </div>
        <div class="item4">
            <a href="{{ route('author.create') }}">Add Authors</a>
        </div>
        <div class="item2">
            <table>
                @if ($authors !== null)
                    <thead>
                        <th>#</th>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>Nationality</th>
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
                            <td class="table-buttons">
                                <button wire:click="edit({{ $author->author_id }})" class="button-edit">Edit</button>
                                <button wire:click="destroy({{ $author->author_id }})" class="button-delete">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No author register yet...</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        <div class="item3">
            <form wire:submit.prevent="update">
                @csrf

                <input type="hidden" wire:model="author_id">
                @if ($error != null)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endif
                @error('surnames')
                    <p class="alert alert-danger">The surnames formad isn´t valid</p>
                @enderror
                <label for="">Surname</label>
                <input type="text" wire:model="surnames" required>
                @error('name')
                    <p class="alert alert-danger">The name format isn't valid</p>
                @enderror
                <label for="">Name</label>
                <input type="text" wire:model="name" required>

                @error('nationality')
                    <p class="alert alert-danger">The nationality format isn't valid</p>
                @enderror
                <label for="">Nationality</label>
                <input type="text" wire:model="nationality" required>

                <button type="submit" class="button-update">update</button>
            </form>
        </div>

    </div>
</div>
