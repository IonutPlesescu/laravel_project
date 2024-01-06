<form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <label for="username">Username</label>
    <input type="text" name="username" required>

    <label for="password">Password</label>
    <input type="password" name="parola" required>

    <button type="submit">Login</button>
</form>
