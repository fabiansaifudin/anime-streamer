
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body><img class="img" src="{{asset('assets/img/Home.png')}}">
    <section class="login-clean">
        <div class="illustration py-4">
            <h1>Reset Password</h1>
        </div>
        <form method="POST" action="{{ route('password.email') }}" style="max-width: 425px">
            @csrf
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="g-input fill mb-3">
                <input type="text" id="email" name="email" placeholder=" ">
                <label for="email" class="bg-white">{{ __('E-Mail Address') }}</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="g-button">
                <input type="submit" id="msk" value="{{ __('Send Password Reset Link') }}">
            </div>
        </form>
    </section>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
