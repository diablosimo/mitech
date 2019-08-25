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
                                    <form class="login100-form validate-form flex-sb flex-w" method="post" action="{{ route('password.email') }}">
                                        @csrf
                                        <span class="login100-form-title p-b-32">Réinitialiser le mot de passe</span>
                                        <span class="txt1 p-b-11">E-mail</span>
                                        <div class="wrap-input100 validate-input m-b-36">
                                            <input class="input100" type="text" name="email">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="container-login100-form-btn">
                                            <input type="submit" value="réinitialiser" class="login100-form-btn">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script src="{{asset('js/jquery.js')}}"></script>
                        <script src="{{asset('js/login/main.js')}}"></script>

                        </body>
                        </html>
