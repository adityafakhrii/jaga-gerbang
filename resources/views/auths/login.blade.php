@extends('auths.layouts.master')
@section('content')
	  <div id="login-page">
    <div class="container">
      <form class="form-login" action="/postlogin" method="POST">
        {{csrf_field()}}
        <h2 class="form-login-heading">
          <p class="logo-login">
            <img src="{{asset('asset/img/favicon.png')}}" style="width: 45px; margin-top: -3px;" alt="Jaga Gerbang.jpg">
            <b>JAGA <span>GERBANG</span></b>
          </p>
        </h2>
        <div class="login-wrap">
          <input name="username" type="text" class="form-control" placeholder="User ID" autofocus autocomplete="off" required>
          <br>
          <input name="password" type="password" class="form-control" placeholder="Password" required>
           <br>
          <button class="btn btn-theme05 btn-block" href="index.html" type="submit">
            <i class="fa fa-lock"></i> 
             Masuk
          </button>
          <hr>
          <div class="login-social-link centered">
                  @if(Session::has('fail'))
                    <span class="helper-text" style="color:red;">
                      <p><i class="fa fa-times"></i>  Login Gagal !
                        <span>Username atau Password salah...</span>
                      </p>
                    </span>
                  @endif
          </div>
          <div class="registration">
            Lupa password ?<br/>
            <p class="" href="#">
              Silahkan hubungi Admin / Sekretaris OSIS 
              </p>
              <a href="/">Kembali ke Home</a>
          </div>
        </div>
      </form>
    </div>
  </div>

@stop