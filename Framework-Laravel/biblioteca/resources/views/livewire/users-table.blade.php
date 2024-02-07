<div class="table-container">
    <h1>Tabla usuarios</h1>
    <table>
        @if ($users != null)
            <thead>
                <th>#</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th></th>
                <th></th>
            </thead>
        @endif
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <button wire:click="edit({{ $user->user_id }})">Edit</button>
                    </td>
                    <td>
                        <button wire:click="destroy({{ $user->user_id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form wire:submit.prevent="update">
        @csrf

        <input type="hidden" wire:model="input_id">

        <input type="text" wire:model="name">
        @error('name')
            <p>The name formad isn´t valid</p>
        @enderror
        <input type="text" wire:model="email">
        @error('email')
            <p>The email format isn't valid</p>
        @enderror
        <input type="text" wire:model="phone">
        @error('phone')
            <p>The phone format isn't valid</p>
        @enderror

        <button type="submit">update</button>
    </form>

    <a href="{{ route('user.create') }}">Add User</a>
</div>
