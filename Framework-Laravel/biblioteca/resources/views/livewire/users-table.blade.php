<div class="table-container">
    <div class="content">
        <div class="item1">
            <h1>Users Table</h1>
        </div>
        <div class="item2">
            <table>
                @if ($users != null)
                    <thead>
                        <th>#</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th></th>
                    </thead>
                @endif
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <button wire:click="edit({{ $user->user_id }})" class="button-edit">Edit</button>
                                <button wire:click="destroy({{ $user->user_id }})" class="button-delete">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No Users register yet..
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="item3">
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

                <button type="submit" class="button-update">update</button>
            </form>
        </div>
        <div class="item4">
            <a href="{{ route('user.create') }}">Add User</a>
        </div>
    </div>
</div>
