<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <title>Author Insert Form</title>
    </head>
    <body>
        <form action="{{ route('author.insert') }}" method="POST">
            @csrf
            @error('surnames')
                <p class="alert alert-danger"> Your surnames dont have the valid form </p>
            @enderror
            <label for="">Surname</label>
            <input type="text" name="surnames" required>

            @error('name')
                <p class="alert alert-danger"> Your name dont have the valid form </p>
            @enderror
            <label for="">Name</label>
            <input type="text" name="name" required>

            @error('nationality')
                <p class="alert alert-danger"> Your nationality dont have the valid form </p>
            @enderror
            <label for="">Nationality</label>
            <input type="text" name="nationality" required>

            <input type="submit" value="Add">
            <a href="{{route('authors')}}">Go back</a>
        </form>

    </body>
</html>
