@extends('layouts.site')

@section('css')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
@endsection

@section('user')

@endsection

@section('content')  
<?php if($coupons): ?> 
<h1 class="head-table"> Cupons </h1>

<div class="bnt-register-space">
<a href="/admin/register" class="btn btn-info bnt-register" role="button">Registrar</a>
</div>

<div class="table-coupons">
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" scope="col"></th>
                    <th class="text-center" scope="col">Data</th>
                    <th class="text-center" scope="col">Utilizado</th>
                    <th class="text-center" scope="col">Cliente</th>
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
                            <th class="text-center" scope="col"><?php echo $item->client->name  ?></th>             
                        </tr>   
                <?php
                    endforeach; 
                ?>
            </tbody>
    </table>
</div>    
<?php endif; ?>
@endsection


@section('js')
<script type="text/javascript" src="<?php echo asset('js/login.js')?>"></script>    
@endsection