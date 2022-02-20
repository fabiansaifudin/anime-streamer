
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body><img class="img" src="{{asset('assets/img/Home.png')}}">
    <section class="login-clean" style="padding: 5px 0;">
        <div class="illustration py-4">
            <h1>Register</h1>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="g-input fill">
                <input type="text" id="name" name="name" placeholder=" ">
                <label class="bg-white" for="name">{{ __('Full Name') }}</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mt-3 g-input fill">
                <input type="text" id="username" name="username" placeholder=" ">
                <label class="bg-white" for="username">{{ __('Username') }}</label>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mt-3 g-input fill">
                <input type="email" id="email" name="email" placeholder=" ">
                <label class="bg-white" for="email">{{ __('E-mail Address') }}</label>
                @error('email')
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
            <div class="my-3 g-input fill">
                <input type="password" id="password-confirm" name="password_confirmation" placeholder=" ">
                <label class="bg-white" for="password-confirm">{{ __('Confirm Password') }}</label>
            </div>
            <div class="g-button">
                <input type="submit" id="msk" value="Masuk">
            </div>
            <div class="link login-link text-center my-3">Do you have account? <a href="{{ route('login') }}">{{ __('Login') }}</a></div>
        </form>
    </section>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
