<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
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
        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation">
        </div>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</body>
</html>
