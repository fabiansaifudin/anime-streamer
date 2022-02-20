
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body><img class="img" src="{{asset('assets/img/Home.png')}}">
    <section class="login-clean" style="padding: 75px 0;">
        <div class="illustration py-4">
            <h1>Login</h1>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="g-input fill">
                <input type="text" id="username" name="username" placeholder=" ">
                <label class="bg-white" for="username">{{ __('Username') }}</label>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mt-3 g-input fill">
                <input type="password" id="password" name="password" placeholder=" ">
                <label class="bg-white" for="password">{{ __('Password') }}</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row mb-2 float-right">
                @if (Route::has('password.request'))
                    <a class="nav-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <div class="g-button">
                <input type="submit" id="msk" value="Masuk">
            </div>
            <div class="link login-link text-center my-3">Not yet a member? <a href="{{ route('register') }}">{{ __('Signup now') }}</a></div>
        </form>
    </section>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
