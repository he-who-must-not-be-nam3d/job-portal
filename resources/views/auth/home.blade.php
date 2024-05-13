<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @vite('public/css/app.css')
</head>
<body>
    <div class="container">
        <div class="hero dark:bg-black">
            <div class="form-box bg-gradient-to-b from-slate-50 to-blue-300">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" onclick="login()" class="toggle-btn">Login</button>
                    <button type="button" onclick="register()" class="toggle-btn">Register</button>
                </div>
                @if ($errors->any())
                    <div class="text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="login" action="/login" method="POST" class="input-group">
                    @csrf
                    <input type="text"  class="input-field" name="loginemail" placeholder="Email">
                    <input type="password"  class="input-field" name="loginpassword" placeholder="Password">
                        <button type="submit" class="submit-btn">Login</button>
                </form>
                <form id="register" action="/register" method="POST" class="input-group">
                    @csrf
                    <input type="text" required class="input-field" name="name" placeholder="Full Name">
                    <input type="text" required class="input-field" name="email" placeholder="Email">
                    <input type="password" required class="input-field" name="password" placeholder="Password">
                    <input type="password" required class="input-field" name="password_confirmation" placeholder="Confirm Password">
                    <button type="submit" class="submit-btn">Register</button>
                </form>
            </div>
            
        </div>
    <script src="{{asset('js/home.js')}}"></script>
</body>
</html>