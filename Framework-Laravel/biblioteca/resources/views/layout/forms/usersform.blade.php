
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
