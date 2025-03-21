<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Cron</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<!-- Responsive-->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<!-- fevicon -->
<link rel="icon" href="{{ asset('fevicon.png') }}" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style>
        /* Adjust z-index and stacking context for the navigation bar */
        .navbar {
            position: relative;
            z-index: 999; /* Increase z-index value as needed */
        }

        .container {
            position: relative;
        }

        .carousel {
            position: relative;
            z-index: 1;
        }
    </style>

</head>
<!-- body -->
<body>
<div class="header">
    <div class="container">
        <!-- header inner -->
        <div class="col-sm-12">
            <div class="menu-area">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/template/index') }}">Home</a>
                            </li>
                            @foreach($category as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/category/'.$category->id) }}">{{ $category->name }}</a>
                            </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/post') }}">Contact-Us</a>
                            </li>
                            <!-- place a search bar here instead of icon -->
                            <li class="last"><a href="#"><img src="{{ asset('images/search-icon.png') }}" alt="icon"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- end header end -->        
<!--banner start -->
<div class="container">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <!-- Slideshow starts -->
        <div class="carousel-inner">
            @foreach($slider as $key => $slide)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" style="background-image: url('{{ asset($slide->image_path) }}'); width: 100%; float: left; height: auto; padding-top: 20px;	padding-bottom: 226px; background-size: cover;">
                <div class="titlepage-h1">
                    <h1 class="bnner_title" style="color: #10b5fa">{{ $slide->title }}</h1>
                    <p class="long_text">{{ $slide->name }}</p>
                </div>
                <div class="btn_main">
                    <a href="{{ url('/slider') }}" class="btn btn-dark btn-lg">View</a>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>  
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                   <p class="copyright_text">© 2019 All Rights Reserved. <a href="https://html.design">Free Website Templates</a></p>
                </div>
            </div>
        </div>
    </div>
      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>