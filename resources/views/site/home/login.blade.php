@extends('layouts.site')

@section('css')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
@endsection

@section('user')

@endsection



@section('content')  
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <form class="form-signin" action="/login" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name='email' id='email' type="email" class="form-control" placeholder="Email" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-2 col-form-label">Senha</label>
                            <input name='password' id='password' x type="password" class="form-control" placeholder="Password" required>
                        </div>    
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
                    </form>
                </div>   
                <a href="/newUser" class="buttonNewAccount">Cadastrar conta</a>
        </div>
    </div>
@endsection


@section('js')
<script type="text/javascript" src="<?php echo asset('js/login.js')?>"></script>    
@endsection