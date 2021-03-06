@extends('layouts.site')

@section('css')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
@endsection

@section('user')

@endsection

@section('menu')   
    <li> <a href="/">Home</a></li>
    <li> <a href="contact.php" >Contato</a> </li>          
@endsection

@section('content')  
<div class="full-width intro">
    <div class="full-height not-completely-full">
        <div class="fixed">
          <figure class="background-image3 parallax parallax-banner"></figure>
        </div>
        <div class="full-height-wrapper white-text">
          <div class="parent">
            <div class="bottom">
              <div class="container">
                <div class="animatedblock delay2 animatedUp">
                  <div class="col-lg-6 col-md-offset-1 col-md-7">
                    <div class="banner-textblock">
                      <p class="large">Painel Administrativo</p>
                      <h1 class="header">Digite suas credenciais<br>E faça Login</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="overlay"></div>
        </div>
      </div>
    </div>
    <section class="white">
      <div class="container clearfix">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <form class="form-signin" action="/admin/login" method="POST">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input name='login' id='login' type="text" class="form-control" placeholder="Login" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-2 col-form-label">Senha</label>
                            <input name='password' id='password' x type="password" class="form-control" placeholder="Password" required>
                        </div>    
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="button" type="submit">Acessar</button>
                    </form>
                </div>   
        </div>
    </div>
 </div>
</section>
@endsection


@section('js')
<script type="text/javascript" src="<?php echo asset('js/login.js')?>"></script>    
@endsection