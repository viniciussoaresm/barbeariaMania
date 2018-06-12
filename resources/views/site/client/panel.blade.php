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
            <div class="panel panel-default dashboardPanel">
                <div class="panel-heading dashboardPanel">Tikets para Cortes</div>
                <div class="panel-body"><?php echo $tickets ?></div>
            </div>

            <div class="panel panel-default dashboardPanel">
                <div class="panel-heading dashboardPanel">Cupons</div>
                <div class="panel-body"><?php echo $validCoupons->count() ?></div>
            </div>
              
            <?php 
            if($coupons): ?> 
                <h1 class="head-table"> Cortes </h1>
                <div class="table-coupons">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col"></th>
                                    <th class="text-center" scope="col">Data</th>
                                    <th class="text-center" scope="col">Utilizado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($coupons as $key => $item): 
                                ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?php echo $item->id ?></th>
                                            <td class="text-center" ><?php echo $item->registration_date  ?></td> 
                                            <th class="text-center" scope="col"><?php echo $item->status?"Sim":"Náo"  ?></th>              
                                        </tr>   
                                <?php
                                    endforeach; 
                                ?>
                            </tbody>
                    </table>
                </div>    
            <?php endif; ?>
        
            </div>
    </div>
@endsection