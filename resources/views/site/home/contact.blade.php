@extends('layouts.site')

@section('css')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
@endsection

@section('user')

@endsection

@section('menu')   
    <li> <a href="/">Home</a></li>
    <li> <a href="/login">Login</a> </li>
    <li> <a href="/contact" >Contato</a> </li>          
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
                              <h1 class="header">Efetue seu Cadastro</h1>
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
    <div class="content-form"> 
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <form class='form-new-user' action="/contact" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                        <div class="form-group">
                            <label for="name">Nome Completo</label>
                            <input type="text" required class="form-control text-area" id="name" name='name' aria-describedby="nameHelp" placeholder="Nome Completo">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required class="form-control text-area" id="email" name='email' aria-describedby="emailHelp" placeholder="Email@exemplo.com">
                        </div>
                        <div class="form-group">
                                <label for="name">Telefone</label>
                                <input type="text" class="form-control text-area" id="cellphone" name='cellphone' aria-describedby="celphoneHelp" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                                <label for="name">mensagem</label>
                                <textarea class='text-area' rows="4" cols="175">   </textarea>
                        </div>        
                        <div class="form-group">
                            <button  type="submit" class="button">Enviar</button>
                        </div>
                </form>
            </div>  
            <div class="col-md-1">
            </div>
        </div>
    </div>
        </section>
@endsection


@section('js')  
<script type="text/javascript" src="<?php echo asset('js/login.js')?>"></script>    
@endsection