

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>Flipmart premium HTML5 & CSS3 Template</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/bootstrap.min.css">
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/main.css">
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/blue.css">
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/rateit.css">
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/bootstrap-select.min.css">
    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/font-awesome.css">
    <script src="{{ asset('assets/font_end/')}}/js/jquery-1.11.1.min.js"></script>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!--  HEADER  -->
<header class="header-style-1">
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                        <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{url('/cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="{{url('/checkout')}}"><i class="icon fa fa-check"></i>Checkout</a></li>
                        <li><a href="#"><i class="icon fa fa-lock"></i>Login</a></li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/font_end/')}}/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <div class="search-area">
                        <form>
                            <div class="control-group">

                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#" ></a>
                            </div>
                        </form>
                    </div>
                    <!-- SEARCH AREA : END -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- SHOPPING CART DROPDOWN -->
                    <div class="dropdown dropdown-cart">
                        <a href="{{url('/cart')}}" class="dropdown-toggle lnk-cart main_parent_category" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>

                              <?php  $items = \Cart::getContent();
                                //Cart::clear();
                                $total=0;
                                $quantity=0;
                                foreach($items as $row) {

                                $total = \Cart::getTotal();
                          //      $quantity +=$row->quantity;
                                    $quantity= Cart::getContent()->count();

                                }

                                ?>
                                <div class="basket-item-count"><span class="count"><?=$quantity?></span></div>
                                <div class="total-price-basket">
                                    <span class="lbl">cart -</span>
                                    <span class="total-price">
                      <span class="sign">$</span><span class="value"><?=$total?></span>
                      </span>
                                </div>
                            </div>
                        </a>

                    </div>
                    <!-- SHOPPING CART DROPDOWN : END -->
                </div>
            </div>
        </div>
    </div>
    <!--  NAVBAR -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li hidden="" class="active dropdown yamm-fw">
                                    <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                </li>

                                <?php

                                $categories=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();


                                if($categories){



                                    foreach ($categories as $first){
                                $firstCategory_id = $first->category_id;
                                $secondCategories=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',$firstCategory_id)->orderBy('category_id','ASC')->get();

                                if(count($secondCategories)>0){



                                ?>
                                <li class="dropdown yamm mega-menu">
                                    <a href="{{url('/category')}}/{{$first->category_name}}" data-hover="dropdown" class="dropdown-toggle main_parent_category" data-toggle="dropdown">{{$first->category_title}}</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">

                                                    <?php foreach ($secondCategories as $second){

                                                    $secondCategory_id = $second->category_id;
                                                    $thirdCategories=DB::table('category')->select('category_title','category_name')->where('parent_id',$secondCategory_id)->orderBy('category_id','ASC')->get();

                                                    ?>
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title"><a href="{{url('/category')}}/{{$second->category_name}}">{{$second->category_title}}</a></h2>
                                                        <ul class="links">
                                                            <?php if(count($thirdCategories)>0) {
                                                            foreach ($thirdCategories as $third){

                                                            ?>
                                                            <li><a href="{{url('/category')}}/{{$third->category_name}}" >{{$third->category_title}}</a></li>
                                                      <?php } } ?>

                                                        </ul>
                                                    </div>

                                                    <?php } ?>





                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

<?php } else {   ?>

                                <li class="dropdown ">
                                    <a href="{{url('/category')}}/{{$first->category_name}}" >{{$first->category_title}}</a>
                                </li>

                                <?php

                                }
                                }
                                    }
                                    ?>
                                <li class="dropdown  navbar-right special-menu">
                                    <a href="#">Todays offer</a>
                                </li>


                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
