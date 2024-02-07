<form action="{{ route('author.insert') }}" method="POST">
    @csrf
    <label for="">Surname</label>
    <input type="text" name="surnames" required>
    @error('surnames')
        <p> Your surnames dont have the valid form </p>
    @enderror
    <label for="">Name</label>
    <input type="text" name="name" required>
    @error('name')
        <p> Your name dont have the valid form </p>
    @enderror
    <label for="">Nationality</label>
    <input type="text" name="nationality" required>
    @error('nationality')
        <p> Your nationality dont have the valid form </p>
    @enderror

    <input type="submit" value="Add">
</form>