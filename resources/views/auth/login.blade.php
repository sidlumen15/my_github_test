<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | My Laravel App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="login-page">
    <div class="login-card">
        <h1>Welcome Back</h1>
        <p>Sign in to your account.</p>

        @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email','') }}"
                required
                autocomplete="email">

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password">

            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Remember me
            </label>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>