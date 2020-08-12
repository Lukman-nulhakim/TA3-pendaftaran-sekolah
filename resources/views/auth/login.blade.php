@extends('layouts.app')
@section('js')
    <script>
        function lihat()
    {
        var password = document.getElementById('password'),
            button = document.getElementsByTagName('button')[0];
 
        if(button.textContent === 'Lihat Password'){
          password.setAttribute('type', 'text');
          button.textContent = 'Sembunyikan';
        }else{
          password.setAttribute('type', 'password');
          button.textContent = 'Lihat Password';
        }
        return false;
    }
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-6 col-sm-4">
            <div class="card mt-5 text-white">
                <div class="card-header bg bg-dark">{{ __('Login') }}</div>

                <div class="card-body bg bg-secondary text-white">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 col-10">
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

                            <div class="col-md-6 col-10">
                                <input id="password" type="password" class="form-password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 col-2">
                                <button type="button" onclick="lihat()" style="margin-left:-22px" class="btn btn-warning"><i fa-4x class="fas fa-eye"></i></button>
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
</div>
@endsection


