<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
