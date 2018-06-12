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
                <h1 class="form-header"> Registrar Cupom </h1>
                <form class='form-new-user' action="/admin/register" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                        <div class="form-group">
                            <label for="client">Selecione o Cliente</label>
                                <select name="client_id" id="client_id" class="form-control">
                                <?php foreach ($clients as $key => $client) { ?>
                                    <option value="<?php echo $client->id ?>"><?php echo $client->name ?></option>                   
                                <?php    } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button  type="submit" class="btn btn-primary bnt-form">Registrar</button>
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