@extends('layout.template')

@section('content')


<section class="page-wrapper woocommerce single">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-5">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="login-form">
                    <div class="form-header">
                        <h2 class="font-weight-bold mb-3">Login</h2>
    
                        <p class="woocommerce-register">
                            Don't have an account yet? <a href="{{ route('register') }}" class="text-decoration-underline">Sign Up for Free</a>
                        </p>
                    </div>
                    <form class="woocommerce-form woocommerce-form-login login" method="post" action="{{ route('login') }}" >
                    @csrf
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="username">Username or email address&nbsp;<span class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control @error('email') is-invalid @enderror" name="email" id="email"  value="{{ old('email') }}" required autocomplete="email" autofocus>

                            

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            


                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" autocomplete="current-password" required placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </p>
                       
                       <div class="d-flex align-items-center justify-content-between py-2">
                            <p class="form-row">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme" for="remember">
    {{ __('Remember Me') }}
</label>

                            </p>
    
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                       </div>
    
                       <p class="form-row">
                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="a414dce984"><input type="hidden" name="_wp_http_referer" value="/my-account/">
                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">{{ __('Login') }}</button>

                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
