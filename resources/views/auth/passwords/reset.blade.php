
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MITech-login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('favicon.ico')}}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/login/util.css')}}">
    <link rel="stylesheet" href="{{ asset('css/login/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" method="post" action="{{ route('password.update') }}">
                @csrf
                <span class="login100-form-title p-b-32">Réinitialiser  votre mot de passe</span>
                <input type="hidden" name="token" value="{{ $token }}">
                <span class="txt1 p-b-11">E-mail</span>
                <div class="wrap-input100 validate-input m-b-36">
                    <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <span class="txt1 p-b-11">Mot de passe</span>
                <div class="wrap-input100 validate-input m-b-12">
                    <span class="btn-show-pass"><i class="fa fa-eye"></i></span>
                    <input class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <span class="txt1 p-b-11">Confirme le mot de passe</span>
                <div class="wrap-input100 validate-input m-b-12">
                    <span class="btn-show-pass"><i class="fa fa-eye"></i></span>
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                </div>


                <div class="container-login100-form-btn">
                    <input type="submit" value="Réinitialiser" class="login100-form-btn">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/login/main.js')}}"></script>

</body>
</html>
