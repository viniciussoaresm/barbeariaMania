@extends('layouts.site')

@section('user')
<?php if(!$user): ?>
<div class="navbar-form navbar-right " >
        <a class="link-login" href="/login">
                <span class="glyphicon glyphicon-user">
            </span> Login 
        </a>
    </div> 
<?php endif; ?>   

<?php if($user): ?>
<div class="navbar-form navbar-right " >
    <div class="user-info">
    <?php echo $user->name ?>
    <a href="/logout" class="link-logout">
        Sair
    </a>
    </div>
</div> 
<?php endif; ?>

@endsection
@section('content')
    <div class="container">
            <div class="jumbotron promo">
                <h1>Faça já o seu cadastro.</h1>
                <p> Inscreva-se em nosso programa de fidelidade e desfrute das vantagens!</p>
                <p><a class="btn btn-primary btn-lg bnt-home" href="#" role="button">Acessar</a></p>
            </div>
    </div>
@endsection