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
    <h1> Junte 8 Cupons e resgate um ticket de corte grátis </h1>  
    
    <button  id="generateTicket" user-id = "<?php echo $user->id ?>" class="button">Resgatar Ticket</button>


        <div class="wrap-table100 tableInfo">
                <div class="table100">
                    <table>
                        <thead>                                   
                            <tr class="table100-head">
                                <th  >Tikets para Cortes</th>
                                <th >Cupons</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="column1"><?php echo $ticketsPending ?></td>
                                <td class="column2"><?php echo $validCoupons->count() ?></td>
                            </tr>   
                        </tbody>
                    </table>
                </div>
            </div>  

            <?php 
            if($tickets->count() >= 1): ?>     
                    <div class="wrap-table100 tableInfo">
                        <div class="table100">
                            <table>
                                <thead>                                   
                                    <tr class="table100-head">
                                        <th >Codigo</th>
                                        <th >Gerado em</th>
                                        <th >Valido até</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tickets as $key => $item):     ?>
                                        <tr>
                                                <td class="column3"><?php echo $item->code  ?></td>  
                                                <td class="column2"><?php echo \Carbon\Carbon::parse($item->registration_date)->format('d/m/Y')  ?></td>  
                                                <td class="column2"><?php echo \Carbon\Carbon::parse($item->valid_date)->format('d/m/Y')  ?></td>     
                                        </tr>   
                                    <?php  endforeach;   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            <?php endif; ?>
              
            <?php 
            if($coupons): ?>     
                    <div class="wrap-table100">
                        <div class="table100">
                            <table>
                                <thead>                                   
                                    <tr class="table100-head">
                                        <th  style="margin-top:5%;" >Data</th>
                                        <th >Barbeiro</th>
                                        <th>Usado?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($coupons as $key => $item):     ?>
                                        <tr>
                                                <td class="column2"><?php echo \Carbon\Carbon::parse($item->registration_date)->format('d/m/Y') ?></td>
                                                <td class="column3"><?php echo $item->barber->name  ?></td>  
                                                <td class="column3"><?php echo $item->status?"Sim":"Não"  ?></td>          
        
                                        </tr>   
                                    <?php  endforeach;   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            <?php endif; ?>
        </section>  
@endsection