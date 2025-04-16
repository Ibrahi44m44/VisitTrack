<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #1c1c1c;
            color: #fff;
        }

        .login-card {
            max-width: 400px;
            margin: 100px auto;
            background-color: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #000;
        }

        .form-control {
            background-color: #555;
            color: #fff;
            border: 1px solid #777;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .btn-custom {
            background-color: #28a745;
            border: none;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .login-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-title i {
            margin-right: 8px;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h3 class="login-title"><i class="fas fa-sign-in-alt"></i> Login</h3>


        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control  @error('email') is-invalid  @enderror" id="email"
                    name="email" placeholder="Example@gmail.com">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control  @error('name') is-invalid  @enderror" id="name"
                    name="name" placeholder="Example@gmail.com">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control  @error('password') is-invalid  @enderror" id="password"
                    name="password" placeholder="Password">
                @error('passowrd')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
