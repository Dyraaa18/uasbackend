<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
</body>
</html>
