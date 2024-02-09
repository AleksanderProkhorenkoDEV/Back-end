<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
        <title>Book Insert Form</title>
    </head>

    <body>
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
            <select name="author_id" required>
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </body>

</html>
