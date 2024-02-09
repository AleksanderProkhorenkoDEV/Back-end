<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
        <title>Users Insert Form</title>
    </head>

    <body>

        <form action="{{ route('user.insert') }}" method="POST">
            @csrf
            <label for="">Name</label>
            <input type="text" required name="name">
            <label for="">Email</label>
            <input type="email" required name="email">
            <label for="">Phone</label>
            <input type="text" required name="phone">
            <label for="">Password</label>
            <input type="password" name="password">

            <input type="submit" value="Add">
        </form>
    </body>

</html>
