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
        <form class="login-form" action="{{ route('register') }}" method="POST">
            <img src="{{ asset('gambar/holobox-logo.png') }}" alt="Holobox Logo">
            @csrf

            <div class="input-group">
                <label for="name">Name</label>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Enter your name" required>
                </div>
                @if ($errors->has('name'))
                    <div class="error-message">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter your email" required>
                </div>
                @if ($errors->has('email'))
                    <div class="error-message">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                @if ($errors->has('password'))
                    <div class="error-message">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <button type="submit" class="submit-button">Daftar</button>
        </form>

        <a href="/login">
            <button type="button" class="register-button" style="background-color: red">Back</button>
        </a>
    </div>
</body>

</html>
