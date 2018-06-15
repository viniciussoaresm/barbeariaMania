@extends('layouts.site')

@section('css')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">
@endsection

@section('user')

@endsection



@section('menu')   
    <li> <a href="/">Home</a></li>
    <li> <a href="contact.php" >Contato</a> </li>          
    <li> <a href="/logout" > Sair </a> </li>
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
                          <h1 class="header">Cupons</h1>
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
                <a href="/admin/register" class="button bnt-register" role="button">Registrar</a>        
            <?php 
            if($coupons): ?>     
                    <div class="wrap-table100">
                        <div class="table100">
                            <table>
                                <thead>                                   
                                    <tr class="table100-head">
                                        <th></th>
                                        <th>Data</th>
                                        <th>Utilizado</th>
                                        <th>Cliente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($coupons as $key => $item):     ?>
                                        <tr>
                                            <td class="column1" ><?php echo $item->id ?></td>
                                            <td class="column2" ><?php echo  \Carbon\Carbon::parse($item->registration_date)->format('d/m/Y')  ?></td> 
                                            <td class="column2" ><?php echo $item->status?"Sim":"Náo"  ?></td> 
                                            <td class="column2" ><?php echo $item->client->name  ?></td>             
                                        </tr>   
                                    <?php  endforeach;   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            <?php endif; ?>
        </section> 

@endsection


@section('js')
<script type="text/javascript" src="<?php echo asset('js/login.js')?>"></script>    
@endsection