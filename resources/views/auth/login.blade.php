<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
<link rel="stylesheet" href="{{ asset('css/login.css') }}" >
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" >
<div class="main">
    <div class="container">
        <center>
            <div class="middle">
                <div id="login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset class="clearfix">
                            <p ><span class="fa fa-user"></span><input name ="email" id="email" type="email"  class="@error('email') is-invalid @enderror" Placeholder="E-Mail" value="{{ old('email') }}" autocomplete="email" required autofocus></p> 
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <p><span class="fa fa-lock"></span><input name="password" type="password"  class="@error('password') is-invalid @enderror" Placeholder="Clave" required autocomplete="current-password"></p>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                            <div>
                                <span style="width:50%; text-align:right;  display: inline-block;"><button>Ingresar</button></span>
                            </div>
                        </fieldset>
                        <div class="clearfix"></div>
                    </form>
                    <div class="clearfix"></div>
                </div> <!-- end login -->
                <div class="logo">
                    <div class="clearfix"><img width="150px" heigth="150px" src="{{ asset('images/escudo.png') }}"</div>
                </div>
            </div>
        </center>
    </div>
</div>