<form action="{{ route('book.insert') }}" method="POST">
    @csrf

    <label for="">Title</label>
    <input type="text" required name="title">
    @error('title')
        <p>The title isnt valid</p>
    @enderror
    <label for="">Category</label>
    <input type="text" required name="category">
    @error('category')
        <p>The category isnt valid</p>
    @enderror
    <label for="">Author</label>
    <select name="author_id" >
        @foreach ($authors as $author)
            <option value="{{ $author->author_id }}" name="author_id">{{ $author->name }}</option>
        @endforeach
    </select>
    @error('author_id')
        <p>The author isnt valid</p>
    @enderror
    <label for="">Description</label>
    <input type="text" name="description">
    @error('description')
        <p>The description isnt valid</p>
    @enderror

    <input type="submit" value="Add">
</form>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
