@extends('layouts.site')

@section('user')
<?php if($user): ?>
    <?php echo $user->name ?>
</div> 
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
                        <p class="large">Localizado no coração de Campinas/SP</p>
                        <h1 class="header">Um novo estilo de barbearia, venha conhecer nosso espaço!</h1>
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
          <div class="col-md-3 col-md-offset-1 col-sm-6">
            <p class="large">Somos especializados em:</p>
            <h4>Barba & Cabelo</h4>
            <h4>Cervejas Artesanais</h4>
            <h4>Cuidados Pessoais</h4>
            <div class="break"></div>
          </div>
          <div class="col-md-7 col-sm-6">
            <p class="large">Uma barbearia a frente de seu tempo!</p>
            <p class="large">Um ambiente confortável, descontraído e exclusivamente masculino, com cuidados para todos os estilos de barba e cabelo, além de serviços como massagem, podologia, estética masculina e dia do noivo. </p>
            <p class="large">Uma barbearia premium, para cuidar do visual, tomar uma cerveja gelada, assistir aos seus esportes favoritos ou jogar uma partida de sinuca.</p>
            <p><a href="#" title="" id="secao1" class="arrow">Entre em contato Conosco</a></p>
          </div>
        </div>
      </section>
      <section>
        <div class="container clearfix">
          <div class="col-lg-12 white-text centered extra-padding-bottom">
            <h2 class="header">Serviços</h2>
          </div>
          <div class="col-md-6">
            <img src="images/work10.jpg" alt="">
          </div>
          <div class="col-md-6">
            <img src="images/work11.jpg" alt="">
          </div>
        </div>
      </section>
      <section class="white">
        <div class="container clearfix no-header">
          <div class="col-md-10 col-md-offset-1 centered">
            <div class="client"><a href="#" title=""><img alt="" src="images/logos/logo01.png" /></a></div>
            <div class="client"><a href="#" title=""><img alt="" src="images/logos/logo09.png" /></a></div>
            <div class="client"><a href="#" title=""><img alt="" src="images/logos/logo07.png" /></a></div>
            <div class="client"><a href="#" title=""><img alt="" src="images/logos/logo04.png" /></a></div>
            <div class="client"><a href="#" title=""><img alt="" src="images/logos/logo08.png" /></a></div>
            <div class="client"><a href="#" title=""><img alt="" src="images/logos/logo06.png" /></a></div>
            <div class="clear"></div>
            <div class="borderline"></div>
            <div class="break"></div>
          </div>
        </div>
        <div class="container clearfix">
          <div class="col-md-2 col-md-offset-1">
            <h2 class="header">Clientes</h2>
          </div>
          <div class="col-md-5 col-sm-6">
            <p class="large">"Excelente espaço, tanto físico na instalação e decoração da loja e equipamentos, quanto na atenção e cuidado do pessoal."</p>
          </div>
          <div class="col-md-3 col-sm-6">
            <p class="alignright"><a href="#" title="" class="arrow">Entre em contato Conosco</a></p>
          </div>
        </div>
      </section>
@endsection