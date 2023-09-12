<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/toastr/toastr.css') }}"> 



</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		{{-- <div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/phone.png')}}" alt=""></div>0186223223</div>

                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/mail.png')}}" alt=""></div><a href="mailto:alamgirah607737@gmail.com">alamgirah607737@gmail.com</a></div>

						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">English<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">English</a></li>
											<li><a href="#">Bangla</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Currency<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">US Dollar($)</a></li>
											<li><a href="#">Taka(৳)</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="{{asset('frontend/images/user.svg')}}" alt=""></div>
								<div><a href="#">Register</a></div>
								<div><a href="#">Sign in</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div> --}}
		<div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/phone.png')}}" alt=""></div>{{ $setting->phone_one }}</div>
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('frontend/images/mail.png')}}" alt=""></div><a href="mailto:{{ $setting->main_email }}">{{ $setting->main_email }}</a></div>
                        <div class="top_bar_content ml-auto">

                            @if(Auth::check())
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown" >
                                    <li>
                                        <a href="#">{{ Auth::user()->name }}<i class="fas fa-chevron-down"></i></a>
                                        <ul style="width:200px;">
                                            <li><a href="{{ route('home') }}">Profile</a></li>
											<li><a href="{{ route('home') }}">Setting</a></li>
											<li><a href="{{ route('home') }}">Order List</a></li>
                                            <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                            @endif

                            @guest
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>
                                        <a href="#">Login<i class="fas fa-chevron-down"></i></a>
                                        <ul style="width:300px; padding:10px;">
                                           <div>
                                            <strong>login your account</strong><br>
                                            <br>
                                               <form action="{{ route('login') }}" method="post">
                                                @csrf
                                                   <div class="form-group">
                                                       <label>Email Address</label>
                                                       <input type="email" class="form-control" name="email" autocomplete="off" required="">
                                                   </div>
                                                   <div class="form-group">
                                                       <label>Password</label>
                                                       <input type="password" class="form-control" name="password" required="">
                                                   </div>


                                                   {{-- <div class="form-group row">
                                                       <div class="offset-md-2">
                                                           <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                               <label class="form-check-label" for="remember">
                                                                   {{ __('Remember Me') }}
                                                               </label>
                                                           </div>
                                                       </div>
                                                   </div> --}}


                                                   <div class="form-group">
                                                       <button type="submit" class="btn btn-sm btn-info">login</button>
                                                   </div>
                                               </form>


                                               {{-- <div class="form-group">
                                                 <a href="{{ route('social.oauth', 'google') }}" class="btn btn-danger btn-sm btn-block text-white">Login WIth Google</a>
                                                </div> --}}


                                           </div>
                                        </ul>
                                    </li>

                                    <li>
                                    <a href="{{ route('register') }}">Register</a>
                                    </li>

                                </ul>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					@php
                      $setting=DB::table('settings')->first();
                    @endphp
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{url('/')}}"><img src="{{url($setting->logo)}}" alt=""></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Categories</a></li>
													<li><a class="clc" href="#">Computers</a></li>
													<li><a class="clc" href="#">Laptops</a></li>
													<li><a class="clc" href="#">Cameras</a></li>
													<li><a class="clc" href="#">Hardware</a></li>
													<li><a class="clc" href="#">Smartphones</a></li>
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('frontend/images/search.png')}}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
                    @php
                        $wishlist=DB::table('wishlists')->where('user_id',Auth::id())->count();
                    @endphp
                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><a href="{{route('wishlist')}}"><img src="{{ asset('/frontend') }}/images/heart.png" alt=""></a></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="{{route('wishlist')}}">Wishlist</a></div>
                                    <div class="wishlist_count">{{ $wishlist }}</div>
                                </div>
                            </div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<a href="{{route('cart')}}">
										<img src="{{asset('frontend/images/cart.png')}}" alt=""></a>
										<div class="cart_count"><span class="cart_qty" ></span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{route('cart')}}">Cart</a></div>
										<div class="cart_price">{{$setting->currency}} <span class="cart_total"></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@yield('navbar')

	</header>
	
	@yield('content')

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="{{url('/')}}">Emart</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+38 068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content">
Copyright &copy;<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://templatespoint.net/" target="_blank">TemplatesPoint</a>
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="{{asset('frontend/images/logos_1.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('frontend/images/logos_2.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('frontend/images/logos_3.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('frontend/images/logos_4.png')}}" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script src="{{asset('frontend/js/product_custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('backend/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script type="text/javascript" charset="utf-8">
    function cart() {
         $.ajax({
            type:'get',
            url:'{{ route('all.cart') }}', 
            dataType: 'json',
            success:function(data){
               $('.cart_qty').empty();
               $('.cart_total').empty();
               $('.cart_qty').append(data.cart_qty);
               $('.cart_total').append(data.cart_total);
            }
        });
    }
    $(document).ready(function(event) {
        cart();
    });
    
 </script>


<script>
	@if(Session::has('messege'))
	  var type="{{Session::get('alert-type','info')}}"
	  switch(type){
		  case 'info':
			   toastr.info("{{ Session::get('messege') }}");
			   break;
		  case 'success':
			  toastr.success("{{ Session::get('messege') }}");
			  break;
		  case 'warning':
			 toastr.warning("{{ Session::get('messege') }}");
			  break;
		  case 'error':
			  toastr.error("{{ Session::get('messege') }}");
			  break;
			}
	@endif
  </script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>

</html>