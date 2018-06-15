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
                          <p class="large">Painel</p>
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
            <div class="col-md-6 col-md-offset-3 col-sm-6 extra-padding-right">
              <form class="form-part" method="post" action="/login" name="loginform" id="loginform" autocomplete="off">
                    <input name="email" type="email" id="email" size="30" placeholder="Login" require>
                    <input name="password" type="password" id="password" size="30" placeholder="Senha" require>
                    <div class="input-wrapper clearfix"> <span id="message"></span>
                        <div class="clear"></div>
                            <input type="submit" class="button" value="Logar" id="submitLogin" name="Submit" />
                        </div>
              </form>
            </div>
          </div>
        </section>
@endsection
@section('js')
<script type="text/javascript" src="<?php echo asset('js/login.js')?>"></script>    
@endsection