@extends('layouts.default')

@section('content')		
    <!--login form start-->
    @error('error')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <form class="login-form" action="{{ route('login') }}" method="post">
    @csrf
        <i class="fas fa-user-circle"></i>

        <!-- <input class="user-input" type="text" name="" placeholder="Username" required> -->
        <input id="email" placeholder="Login" type="text" class="user-input form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

        @error('login')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <!-- <input class="user-input" type="password" name="" placeholder="Password" required> -->
        <input id="password" placeholder="Password" type="password" class="user-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback " role="alert">
                <strong style="color:red;">{{ $message }}</strong>
            </span>
        @enderror
        
        <div class="options-01">
            <!-- <label class="remember-me"><input type="checkbox" name="">Remember me</label> -->
            <label class="remember-me form-check-label" for="remember">
            
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                {{ __('Se Souvenir de Moi') }}
            </label>
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Mot de passe oublié?</a>
            @endif
        </div>
        <input class="btn" type="submit" name="" value="Se Connecter">
        <div class="options-02">
            <p>Pas encore Inscrit? <a href="#">Créer un Compte</a></p>
        </div>
    </form>
    <!--login form end-->

    @include('auth.register')

<!-- <div class="container bg-primary">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


@endsection
