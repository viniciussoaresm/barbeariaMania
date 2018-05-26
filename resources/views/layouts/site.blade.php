<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barbearia</title>

    @yield('css')
    <link rel="stylesheet" href="<?php echo asset('css/custom.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css">

</head>
<body class="Body-style">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                </button>
                <a class="navbar-brand" href="#">
                    <span class="glyphicon glyphicon-scissors"></span> 
                Barbearia
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Contato</a>
                    </li>
                </ul>   
                @yield('user')

            </div>
        </div>
    </nav>
    <div class="row img-banner">
        <div class="col-sm-2 col-md-5 col-md-offset-5">
                <img class="img-responsive img-rounded" src="imagens/banner.png " alt="">
        </div>
    </div>
    <div class="container cont-body"> 
	    @yield('content')
    </div>	
	<footer>
		<div class="footer-blurb">
			<div class="container">
				<div class="row">

				</div>
			</div>
        </div>
        
        <div class="small-print">
        	<div class="container">
        		{{-- <p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p> --}}
        		<p>Copyright &copy; Example.com 2015 </p>
        	</div>
        </div>
	</footer>

    @yield('js')

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo asset('js/jquery-1.11.3.min.js')?>"></script>    

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js')?>"></script>    
	
    <!-- IE10 viewport bug workaround -->
    <script type="text/javascript" src="<?php echo asset('js/ie10-viewport-bug-workaround.js')?>"></script>    
	
    <!-- Placeholder Images -->
    <script type="text/javascript" src="<?php echo asset('js/holder.min.js')?>"></script>    
	
</body>

</html>
