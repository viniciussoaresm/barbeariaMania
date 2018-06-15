@extends('layouts.site')

@section('css')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
@endsection

@section('user')

@endsection

@section('menu')   
    <li> <a href="/">Home</a></li>
    <li> <a href="/login">Login</a> </li>
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
                <form class='form-new-user' action="/client/create" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                        <div class="form-group">
                            <label for="name">Nome Completo</label>
                            <input type="text" required class="form-control" id="name" name='name' aria-describedby="nameHelp" placeholder="Nome Completo">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="Email@exemplo.com">
                        </div>
                        <div class="form-group">
                                <label for="name">CPF</label>
                                <input type="text" required class="form-control" id="document" name='document' aria-describedby="documentHelp" placeholder="CPF">
                        </div>
                        <div class="form-group">
                                <label for="name">Telefone</label>
                                <input type="text" class="form-control" id="cellphone" name='cellphone' aria-describedby="celphoneHelp" placeholder="Telefone">
                        </div>
                        <div class="form-group">
                                <label for="name">Cidade</label>
                                <input type="text" class="form-control" id="city" name='city' aria-describedby="cityHelp" placeholder="Cidade">
                        </div>
                        <div class="form-group">
                                <label for="name">Estado</label>
                                <input type="text" class="form-control" id="state" name='state' aria-describedby="stateHelp" placeholder="Estado">
                        </div>
                        <div class="form-group">
                                <label for="name">Endereço</label>
                                <input type="text" class="form-control" id="address" name='address' aria-describedby="addressHelp" placeholder="Endereço">
                        </div>
                        <div class="form-group">
                                <label for="name">CEP</label>
                                <input type="text" required class="form-control" id="zipcode" name='zipcode' aria-describedby="zipHelp" placeholder="CEP">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-2 col-form-label">Senha</label>
                            <input class="form-control" required type="password" value="hunter2" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Data de nascimento</label>
                            <input class="form-control" required type="date" value="1993-08-19" name="birthday" id="birthday">
                        </div>
                        <div class="form-group">
                            <button  type="submit" class="button">Cadastrar</button>
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