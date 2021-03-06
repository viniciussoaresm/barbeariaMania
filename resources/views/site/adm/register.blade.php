@extends('layouts.site')

@section('css')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
@endsection

@section('user')

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
                          <h1 class="header"> Registrar Cupom</h1>
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
          <div class="container clearfix"
  <div class="content-form"> 
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
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
                            <button  type="submit" class="button">Registrar</button>
                        </div>
                </form>
            </div>  
            <div class="col-md-1">
            </div>
        </div>
    </div>
    
 </div>
</section>
@endsection


@section('js')
<script type="text/javascript" src="<?php echo asset('js/login.js')?>"></script>    
@endsection