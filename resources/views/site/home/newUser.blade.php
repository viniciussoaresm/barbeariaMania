@extends('layouts.site')

@section('css')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
@endsection

@section('user')

@endsection



@section('content') 
    <div class="content-form"> 
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <h1 class="form-header"> Cadastro </h1>
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
                            <button  type="submit" class="btn btn-primary bnt-form">Cadastrar</button>
                        </div>
                </form>
            </div>  
            <div class="col-md-1">
            </div>
        </div>
    </div>
@endsection


@section('js')  
<script type="text/javascript" src="<?php echo asset('js/login.js')?>"></script>    
@endsection