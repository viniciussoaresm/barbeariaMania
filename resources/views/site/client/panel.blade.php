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
    <?php echo $user->name ?>
<?php endif; ?>

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
                          <h1 class="header">Consulte seus Copons</h1>
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
               <div class="panel panel-default dashboardPanel">
                <div class="panel-heading dashboardPanel">Cortes Realizados</div>
                <div class="panel-body">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col"></th>
                                    <th class="text-center" scope="col">Data</th>
                                    <th class="text-center" scope="col">Barbeiro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($coupons as $key => $item): 
                                ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?php echo $item->id ?></th>
                                            <td class="text-center" ><?php echo $item->registration_date  ?></td> 
                                            <th class="text-center" scope="col"><?php echo $item->barber->name  ?></th>              
                                        </tr>   
                                <?php
                                    endforeach; 
                                ?>
                            </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        
            </div>
    </div>
        </section>  
@endsection