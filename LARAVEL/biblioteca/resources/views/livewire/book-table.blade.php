<div class="table-container">
    <div class="content">
        <div class="item1">
            <h1>Books Table</h1>
        </div>
        <div class="item4">
            <a href="{{ route('book.create') }}">Add Book</a>
        </div>
        <div class="item2">
            <table>
                @if ($books != null)
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Author</th>
                        <th></th>
                        <th></th>
                    </thead>
                @endif
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->book_id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->category }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>
                                <button wire:click="edit({{ $book->book_id }})" class="button-edit">Edit</button>
                            </td>
                            <td>
                                <button wire:click="destroy({{ $book->book_id }})" class="button-delete">Delete</button>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td>No books now..</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="item3">
            <form wire:submit.prevent="update">
                @csrf
                @if ($error != null)
                    <p class="alert alert-danger">{{ $error}}</p>
                @endif
                <input type="hidden" wire:model="book_id">

                @error('title')
                    <p>The title formad isn´t valid</p>
                @enderror
                <label for="">Title:</label>
                <input type="text" wire:model="title" required>
                @error('category')
                    <p>The category format isn't valid</p>
                @enderror
                <label for="">Category:</label>
                <input type="text" wire:model="category" required>

                @error('description')
                    <p>The description format isn't valid</p>
                @enderror
                <label for="">Description:</label>
                <input type="textArea" wire:model="description">

                @if ($authors != null)
                <label for="">Authors:</label>
                    <select wire:model="author_id">
                        @foreach ($authors as $author)
                            <option value="{{ $author->author_id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                @else
                    <p>You cannot add any books, we do not have a record of authors.</p>
                @endif
                <button type="submit" class="button-update">update</button>
            </form>
        </div>

    </div>
</div>
