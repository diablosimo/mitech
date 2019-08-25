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
            <div class="row">
                @include('partials.flash')
            </div>
            <form class="login100-form validate-form flex-sb flex-w" method="post" action="{{url('authentificate')}}">
                @csrf
                <span class="login100-form-title p-b-32">Login</span>
                <span class="txt1 p-b-11">E-mail</span>
                <div class="wrap-input100 validate-input m-b-36">
                    <input class="input100" type="email" name="email" required value="{{old('email')}}">
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="txt1 p-b-11">Mot de passe</span>
                <div class="wrap-input100 validate-input m-b-12">
                    <span class="btn-show-pass"><i class="fa fa-eye"></i></span>
                    <input class="input100" type="password" name="password" required>
                    <span class="focus-input100"></span>

                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="flex-sb-m w-full p-b-48">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>
                    <div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" class="txt3" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="container-login100-form-btn">
                    <input type="submit" value="Connexion" class="login100-form-btn">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/login/main.js')}}"></script>

</body>
</html>