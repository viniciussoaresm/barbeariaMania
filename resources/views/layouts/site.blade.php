<html class="no-js" lang="en">
    <head>
    <meta charset="utf-8">
    <title>Mania Barber Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="weibergmedia">
    <meta name="Description" content="Mania - Barber Shop em Campinas/SPx">
    <link href="<?php echo asset('css/reset.css')?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo asset('css/bootstrap.min.css')?>"  rel="stylesheet" />
    <link href="<?php echo asset('css/font-awesome.min.css')?>"  rel="stylesheet" type="text/css" />
    <link href="<?php echo asset('css/contact.css')?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo asset('css/styles.css')?>"  rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo asset('css/jquery.fancybox.css')?>"  rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo asset('css/responsive.css')?>" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo asset('css/flexslider.css')?>" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo asset("css/util.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset("css/main.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset("fonts/font-awesome-4.7.0/css/font-awesome.min.css")?>" >
    <link href="https://fonts.googleapis.com/css?family=Amiri:400,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,600" rel="stylesheet" />
    <script src="js/modernizr.js" type="text/javascript"></script>
    </head>
    <body class="amiri">
    <div id="nav-wrapper"> 
        <div class="User-info">
                @yield('user')
            </div>  
      <!-- start main nav -->
      <nav id="main-nav">
        <ul class="clearfix">
          <li> <a href="/">Home</a></li>
          <li> <a href="/#secao1">Serviços</a></li>
          <li> <a href="/login">Login</a> </li>
          <li> <a href="contact.php" >Contato</a> </li>          
          <li> <a href="/logout" > Sair </a> </li>
        </ul>
      </nav>
      <!-- end main nav --> 
    </div>
    <div id="content-overlay"></div>
    <div id="wrap">
      <div id="menu-button">
        <div class="centralizer">
          <div class="cursor">
            <div id="nav-button"> <span class="nav-bar"></span> <span class="nav-bar"></span> <span class="nav-bar"></span></div>
          </div>
        </div>
    </div>
      <!-- start header -->
    <header id="header" class="clearfix">
        <h1 id="logo" style="font-size:0px;"><a href="index.html"><img src="<?php echo asset('images/logo.png')?>" width="180px"></a></h1>
     
    </header>
      <!-- end header --> 

      <div id="content">
        @yield('content')
    </div>

    <footer id="footer">
        <div class="container clearfix">
            <p class="alignleft">© 2018,  Mania Barber Shop.</p>
        </div>
    </footer>
    </div>
            <!-- end wrap --> 
    <script src="<?php echo asset('js/jquery-1.12.4.min.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/jquery-easing-1.3.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/jquery.touchSwipe.min.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/jquery.isotope2.min.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/jquery.ba-bbq.min.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/packery-mode.pkgd.min.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/jquery.isotope.load.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/main.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/jquery.form.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/input.fields.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/preloader.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/bootstrap.min.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/jquery.fancybox.pack.js')?>"  type="text/javascript"></script> 
    <script src="<?php echo asset('js/jquery.flexslider-min.js')?>"  type="text/javascript"></script> 
</body>
</html>