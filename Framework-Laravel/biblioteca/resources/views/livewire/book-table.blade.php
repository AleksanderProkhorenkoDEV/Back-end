<div class="table-container">
    <h1>Books table</h1>
    <table>
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Author</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->book_id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>
                        <button wire:click="edit({{ $book->book_id }})">Edit</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{ $book->book_id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <form wire:submit.prevent="update">
        @csrf

        <input type="hidden" wire:model="book_id">

        <input type="text" wire:model="title">
        @error('title')
            <p>The title formad isn´t valid</p>
        @enderror
        <input type="text" wire:model="category">
        @error('category')
            <p>The category format isn't valid</p>
        @enderror
        <input type="textArea" wire:model="description">
        @error('description')
            <p>The description format isn't valid</p>
        @enderror
        <select wire:model="author_id">
            @foreach ($authors as $author)
                <option value="{{$author->author_id}}">{{ $author->name }}</option>
            @endforeach
        </select>
        <button type="submit">update</button>
    </form>
    <a href="{{ route('book.create') }}">Add Book</a>
</div>
