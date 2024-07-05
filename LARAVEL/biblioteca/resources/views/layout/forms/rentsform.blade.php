<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
        <title>Rents Insert Form</title>
    </head>
    <body>
        <form action="{{ route('rent.insert') }}" method="POST">
            @csrf

            <select name="book_id">
                @forelse ($books as $book)
                    <option value="{{ $book->book_id }}">{{ $book->title }}</option>
                @empty
                    <p>No books register...</p>
                @endforelse
            </select>
            <select name="user_id">
                @forelse ($users as $user)
                    <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                @empty
                    <p>No users register...</p>
                @endforelse
            </select>
            <input type="date" name="loan_date" value="{{ now()->format('Y-m-d') }}" readonly>
            <input type="date" name="deadline" required>
            <input type="submit" value="Add">
            <a href="{{route('rents')}}">Go back</a>
        </form>

    </body>
</html>
