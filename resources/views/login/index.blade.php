<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            height: 100vh;
            width: 100vw;
            background-color: aqua;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .tag-login{
            margin-bottom: 30px;
        }
        .form-login{
            width: 60%;
            max-width: 350px;
            padding: 20px;
            background-color: white;
            border-radius: 10px
        }
        .login{
            display: flex;
            flex-direction: column;
            gap: 30px;  
        }
        .inputan{
            display: flex;
            flex-direction: column;
        }
        #username,
        #password{
            height: 35px;
        }
        button{
            border-style: none;
            height: 35px;
            background-color:rgb(106, 214, 214);
            color: white;
        }
    </style>
</head>
<body>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2 class="tag-login">RS KITA</h2>
    <div class="form-login">
        <form action="/login" class="login" method="post">
            @csrf
            <h3 style="text-align: center">SILAHKAN LOGIN</h3>
            <div class="inputan">
                <label for="username" class="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan username" required value="{{ old('username') }}">
            </div>
            <div class="inputan">
                <label for="password" class="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>