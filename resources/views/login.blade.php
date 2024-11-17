<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="login-container">
        @if (session('success'))
            <div class="alert success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert error">
                <i class="fas fa-exclamation-circle"></i> {{ $errors->first('email') }}
            </div>
        @endif

        <form class="login-form" action="{{ route('authenticate') }}" method="POST">
            <img src="{{ asset('gambar/holobox-logo.png') }}" alt="Holobox Logo">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="email" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="action-links">
            <a href="/register" class="link">Create an account</a>
            <a href="/" class="link back">Back to Home</a>
        </div>
    </div>
</body>

</html>
