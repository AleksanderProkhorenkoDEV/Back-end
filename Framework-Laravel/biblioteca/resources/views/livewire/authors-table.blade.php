<div class="table-container">
    <div class="content">
        <div class="item1">
            <h1>Author Table</h1>
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
                        <tr>No author register yet...</tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        <div class="item3">
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

                <button type="submit" class="button-update">update</button>
            </form>
        </div>
        <div class="item4">
            <a href="{{ route('author.create') }}">Add Authors</a>
        </div>
    </div>
</div>
