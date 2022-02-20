
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Change Password</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body><img class="img" src="{{asset('assets/img/Home.png')}}">
    <section class="login-clean">
        <div class="illustration py-4">
            <h1>Change Password</h1>
        </div>
        <form method="POST" action="{{ route('password.update') }}" style="max-width: 425px">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="g-input fill mb-3" hidden>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" placeholder=" ">
                <label for="email" class="bg-white">{{ __('E-Mail Address') }}</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="g-input fill mb-3">
                <input id="password" type="password" name="password" placeholder=" ">
                <label for="password" class="bg-white">{{ __('Password') }}</label>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="g-input fill mb-3">
                <input id="password-confirm" type="password" name="password_confirmation" placeholder=" ">
                <label for="password-confirm" class="bg-white">{{ __('Confirm Password') }}</label>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </section>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
