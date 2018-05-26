@extends('layouts.site')

@section('user')
<div class="navbar-form navbar-right " >
        <a class="link-login" href="/login">
                <span class="glyphicon glyphicon-user">
            </span> Login
        </a>
    </div> 
@endsection



@section('content')
<div class="container">

    <div class="row post">
        <article class="col-md-4 article-intro ">
            <a href="#">
                <img class="img-responsive img-rounded" src="imagens/corte1.jpg" alt="">
            </a>
            <h3>
                <a href="#">Corte Social</a>
            </h3>
            <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
        </article>
        <article class="col-md-4 article-intro">
            <a href="#">
                <img class="img-responsive img-rounded" src="imagens/corte2.jpg" alt="">
            </a>
            <h3>
                <a href="#">Corte Moicano</a>
            </h3>
            <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.</p>
        </article>

        <article class="col-md-4 article-intro">
            <a href="#">
                <img class="img-responsive img-rounded" src="imagens/corte3.jpg" alt="">
            </a>
            <h3>
                <a href="#">Corte Degrade</a>
            </h3>
            <p>Professionally cultivate one-to-one customer service with robust ideas. Completely synergize resource taxing relationships via premier niche markets. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
        </article>
    </div>
</div>
@endsection