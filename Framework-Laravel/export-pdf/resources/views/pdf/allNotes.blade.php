<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of Notes</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h1>All notes</h1>
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No notes yet...</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </body>
</html>