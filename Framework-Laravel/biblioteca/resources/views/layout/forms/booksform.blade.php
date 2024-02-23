<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <title>Book Insert Form</title>
    </head>

    <body>
        <form action="{{ route('book.insert') }}" method="POST">
            @csrf

            @error('title')
                <p class="alert alert-danger">The title isnt valid</p>
            @enderror
            <label for="">Title</label>
            <input type="text" required name="title">


            @error('category')
                <p class="alert alert-danger">The category isnt valid</p>
            @enderror
            <label for="">Category</label>
            <input type="text" required name="category">


            @error('author_id')
                <p class="alert alert-danger">The author isnt valid</p>
            @enderror
            <label for="">Author</label>
            <select name="author_id" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->author_id }}" name="author_id">{{ $author->name }}</option>
                @endforeach
            </select>

            @error('description')
                <p class="alert alert-danger">The description isn´t valid</p>
            @enderror
            <label for="">Description</label>
            <input type="text" name="description">

            <input type="submit" value="Add">
            <a href="{{route('books')}}">Go back</a>
        </form>
    </body>
</html>
