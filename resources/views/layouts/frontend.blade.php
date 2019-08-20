<!doctype html>
<html lang="en">
<head>
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Woobly</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#62b1f6">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700"
		  rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"
			integrity="sha256-91c9XEM8yFH2Mn9fn8yQaNRvJsEruL7Hctr6JiIY7Uw=" crossorigin="anonymous"></script>

	{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"--}}
	{{--          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
	<link rel="stylesheet" href="{{asset("/vendor/bootstrap-4.3.1/dist/css/bootstrap.css")}}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
			integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
			integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
			crossorigin="anonymous"></script>
	{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">--}}
	{{--    <script src="https://kit.fontawesome.com/f4bb5974c6.js"></script>--}}


	<link rel="stylesheet" href="{{asset("/vendor/bootstrap-select-1.13.9/dist/css/bootstrap-select.css")}}">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/js/bootstrap-select.min.js"></script>

	<script src="{{asset('/fonts/fontawesome/js/all.js')}}"></script>
	<link rel="icon" href="https://res.cloudinary.com/senbonzakura/image/upload/v1561568547/fav-icon_hoxtht.png"
		  type="image/png">

	{{--	Star rating--}}

	<!-- Theme Style -->
	<link rel="stylesheet" href="{{asset('/css/style.css')}}">

</head>
<body style="background-image: url({{asset('/images/photography.png')}})">
<!-- loader -->
<div class="loading text-center">
	<i class="fas fa-dharmachakra fa-spin"></i>
</div>

<header role="banner" id="header-banner">
	<div class="top-bar d-none d-lg-block">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 social">
					<a href="https://twitter.com/"><span class="fab fa-twitter"></span></a>
					<a href="https://www.facebook.com/"><span class="fab fa-facebook-square"></span></a>
					<a href="https://www.instagram.com/"><span class="fab fa-instagram"></span></a>
					<a href="https://www.youtube.com/"><span class="fab fa-youtube"></span></a>
				</div>
				<div class="col-lg-5 col-xl-7 search-top">
					<!-- <a href="#"><span class="fa fa-search"></span></a> -->
					<form action="{{asset('/')}}" name="search-top-form" method="get"
						  class="search-top-form">
						<span class="icon fa fa-search"
							  onClick="document.forms['search-top-form'].submit();"></span>
						<input type="text" id="s" placeholder="Type keyword to search...">
						<label style="display: none" for="s"></label>
					</form>
				</div>
				<div class="col-lg-4 col-xl-3 user-status">
					@if (Route::has('login'))
						@auth
							<a class="btn btn-outline-primary" href="{{ url('/admin') }}">
								@if(strlen(Auth::user()->name) <= 3)
									{{Auth::user()->name}} <span
										class="fas fa-user"></span>
								@else
									User <span class="fas fa-user"></span>
								@endif
							</a>
							<a class="btn btn-outline-info" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
								{{ __('Logout') }} <span
									class="fas fa-sign-out-alt"></span>
							</a>

							<form id="logout-form" action="{{ route('logout') }}"
								  method="POST" style="display: none;">
								@csrf
							</form>
						@else
							<a class="btn btn-outline-primary" href="{{ route('login') }}">
								Login <span class="fas fa-sign-in-alt"></span>
							</a>

							@if (Route::has('register'))
								<a class="btn btn-outline-info"
								   href="{{ route('register') }}">
									Register
								</a>
							@endif
						@endauth
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid logo-wrap">
		<div class="row pt-lg-5">
			<div class="col-12 pt-1 pb-1 text-center logo-header-wrap">
				<div class="menu-button d-lg-none">
					<span class="fas fa-bars"></span>
				</div>
				<h1 class="site-logo"><a href="{{asset('/')}}">Woobly</a></h1>
			</div>
			<div class="col-12 menu-header-lg d-none d-lg-inline">
				<div class="text-center">
					<div class="d-inline nav-link active">
						<a class="mx-auto" href="{{asset('/')}}">
							<i class="fas fa-home"></i> Home
						</a>
					</div>

					<div class="d-inline nav-link" id="dropDownMenu2-lg-trigger">
						<a class="mx-auto" href="#" id="dropDownMenu2-lg-link">
							<i class="fas fa-th-large"></i> Categories
						</a>
						<ul id="dropDownMenu2-lg" class="dropDownMenu-lg">
							@foreach($lsCategory as $cate)
								<li class="nav-item">
									<a class="nav-link"
									   href="{{asset('/post_by_category/'.$cate->id)}}">
										<i class="fas fa-rainbow"></i>{{$cate->name}}
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="d-inline nav-link" id="dropDownMenu1-lg-trigger">
						<a class="mx-auto" href="#" id="dropDownMenu1-lg-link">
							<i class="fas fa-tags"></i> Tag
						</a>
						<ul id="dropDownMenu1-lg" class="dropDownMenu-lg">
							@foreach($lsTag as $tag)
								<li class="nav-item">
									<a class="nav-link"
									   href="{{asset('/post_by_tag/'.$tag->id)}}">
										<i class="fas fa-tag"></i>{{$tag->name}}
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="d-inline nav-link">
						<a class="mx-auto" href="{{asset('/about')}}">
							<i class="fas fa-info-circle"></i> About Us
						</a>
					</div>
					<div class="d-inline nav-link">
						<a class="mx-auto" href="{{asset('/contact')}}">
							<i class="fas fa-comment-dots"></i> Contact Us
						</a>
					</div>
					@if(Auth::check())
						<div class="d-inline nav-link active" id="dropDownMenuCart-lg-trigger">
							<a class="mx-auto" href="#" id="dropDownMenuCart-lg-link">
								<i class="fas fa-shopping-cart"></i>
								<span class="badge badge-warning badge-pill" style="position: relative; top: -2px">
									{{count($lsPopular)}}
								</span>
							</a>
							<ul id="dropDownMenuCart-lg" class="dropDownCart-lg">
								<div class="pt-2 px-3 text-left cart-top">
									<h5 class="m-0">
										New added games &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										Price
									</h5>
									<span class="cart-remove-all-btn">
										<i class="fas text-danger fa-trash-restore-alt"></i>
									</span>
								</div>
								<li class="dropdown-divider"></li>
								@foreach($lsPopular as $popular)
									<li class="nav-item">
										<a class="nav-link" href="{{asset('/view_post/'.$popular->id)}}">
											<div class="cart-game-icon"
												 style="background: url('{{asset($popular->cover)}}');
												 background-size: cover">
											</div>
											{{strlen($popular->title) > 20 ?
												substr($popular->title, 0, 20)." ..." : $popular->title}}
											<div class="cart-item-price d-block">
												@if($popular->price > 0 && $popular->discount > 0
													&& $popular->discount < 100)
													<span class="text-primary">
														{{$popular->price * (1-$popular->discount/100)}} €
													</span>
													<span class="badge badge-success badge-pill">
														-{{ $popular->discount}}%
													</span>
												@elseif($popular->price == 0 || $popular->discount == 100)
													<span class="badge badge-success badge-pill">Free</span>
												@else
													<span>{{$popular->price}} €</span>
												@endif
											</div>
										</a>
										<div class="text-danger cart-remove-btn">
											<i class="fas fa-times-circle"></i>
										</div>
									</li>
								@endforeach
								<li class="dropdown-divider"></li>
								<div class="text-center px-2 pb-2">
									<a style="width: 40%" class="btn-info btn" href="{{asset('/cart')}}">
										Go to Cart
									</a>
									<a style="width: 40%" class="btn-success btn" href="{{asset('/checkout')}}">
										Checkout
									</a>
								</div>
							</ul>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>

</header>
<!-- END header -->
<div class="close-menu-sm d-lg-none">

</div>
<div class="close-menu-lg">

</div>
<a class="back-to-top"><i class="fas fa-arrow-alt-circle-up"></i></a>
<ul class="menu-header-sm d-lg-none" style="list-style: none">
	<li class="nav-item text-center logo-header-wrap-sm">
		<a class="nav-link" href="{{asset('/')}}">
			<img src="{{asset('/images/LogoMobile.png')}}" alt="Woobly" width="100" height="100">
		</a>
	</li>
	<li class="nav-item search-top-sm">
		<!-- <a href="#"><span class="fa fa-search"></span></a> -->
		<form action="{{asset('/')}}" name="search-top-form" method="get" class="search-top-form">
			<span class="icon fa fa-search" onClick="document.forms['search-top-form'].submit();"></span>
			<input type="text" id="s" placeholder="Type keyword to search...">
			<label style="display: none" for="s"></label>
		</form>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
		<a class="nav-link" href="{{asset('/')}}"><i class="fas fa-home"></i> Home</a>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
		<a class="nav-link" id="dropdownTrigger2-sm">
			<i class="fas fa-th-large"></i>Categories<i class="fas fa-caret-down"></i>
		</a>
		<ul id="dropDownMenu2-sm" class="dropDownMenu-sm">
			@foreach($lsCategory as $cate)
				<li class="nav-item">
					<a class="nav-link" href="{{asset('/post_by_category/'.$cate->id)}}">
						<i class="fas fa-rainbow"></i>{{$cate->name}}
					</a>
				</li>
			@endforeach
		</ul>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="dropdownTrigger1-sm">
			<i class="fas fa-tags"></i>Tag<i class="fas fa-caret-down"></i>
		</a>
		<ul id="dropDownMenu1-sm" class="dropDownMenu-sm">
			@foreach($lsTag as $tag)
				<li class="nav-item">
					<a class="nav-link" href="{{asset('/post_by_tag/'.$tag->id)}}">
						<i class="fas fa-tag"></i>{{$tag->name}}
					</a>
				</li>
			@endforeach
		</ul>
	</li>
	<div class="dropdown-divider"></div>
	<li class="nav-item">
		<a class="nav-link" href="{{asset('/about')}}">
			<i class="fas fa-info-circle"></i> About Us
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{asset('/contact')}}">
			<i class="fas fa-comment-dots"></i> Contact Us
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{asset('/cart')}}">
			<i class="fas fa-shopping-cart"></i> Go To Cart
			<span class="badge-pill badge-info badge">
				 {{count($lsPopular)}}
			</span>
		</a>
	</li>
	<div class="dropdown-divider"></div>
	@if (Route::has('login'))
		@auth
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/user') }}">
					<i class="fas fa-user"></i> {{Auth::user()->name}}
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
					<i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST"
					  style="display: none;">
					@csrf
				</form>
			</li>
		@else
			<li class="nav-item">
				<a class="nav-link" href="{{ route('login') }}">
					<i class="fas fa-sign-in-alt"></i> Login
				</a>
			</li>


			@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">
						<i class="fas fa-user-plus"></i> Register
					</a>
				</li>
			@endif
		@endauth
	@endif
</ul>
@yield('banner')
<!-- END section -->


<section class="site-section main-dish">
	<div class="container">
		@yield('content-title')
		<div class="row blog-entries">

		@yield('content')
		<!-- END main-content -->

			<div class="col-md-12 col-lg-4 sidebar">
				<div class="sidebar-box search-form-wrap">
					<form action="#" class="search-form">
						<div class="form-group">
							<span class="icon fa fa-search"></span>
							<input type="text" class="form-control" id="s"
								   placeholder="Type a keyword">
						</div>
					</form>
				</div>
				<!-- END sidebar-box -->
				@if(Auth::check())
					@if (\Request::route()->getName() != 'user_profile' &&
						\Request::route()->getName() != 'profile_edit')
						<div class="sidebar-box">
							<div class="bio text-center">
								<a href="{{asset('/user')}}" class="avatar-bio mx-auto">
									<img src="{{
									Auth::user()->avatar != null? asset(Auth::user()->avatar) :
									'https://res.cloudinary.com/senbonzakura/image/upload/v1566237952/default_re2ods.png'
									}}"
										 alt="Image Placeholder" class="img-fluid bg-white">
								</a>
								<div class="bio-body">
									<a href="{{asset('/about')}}"><h2>{{Auth::user()->name}}</h2>
									</a>
									<p>
										@if(Auth::user()->desc != null)
											<br>
											{!!Auth::user()->desc!!}
										@else
											<small>- not set -</small>
										@endif
									</p>
									<p>
										<a href="{{asset('/user')}}"
										   class="btn btn-primary btn-sm rounded">
											See your profile
										</a>
									</p>
									<p class="social">
										<a href="https://www.facebook.com/" class="p-2">
											<span class="fab fa-facebook-square"></span>
										</a>
										<a href="https://twitter.com/" class="p-2">
											<span class="fab fa-twitter"></span>
										</a>
										<a href="https://www.instagram.com/"
										   class="p-2">
											<span class="fab fa-instagram"></span>
										</a>
										<a href="https://www.youtube.com/" class="p-2">
											<span class="fab fa-youtube"></span>
										</a>
									</p>
								</div>
							</div>
						</div>
					@endif
				@endif
				<!-- END sidebar-box -->

				<div class="sidebar-box">
					<h3 class="heading"><i class="fas fa-rss-square"></i> Popular Games</h3>
					<div class="post-entry-sidebar">
						<ul>
							@foreach($lsPopular as $popular)
								<li>
									<a class="post-entry-link"
									   href="{{asset('/view_post/'.$popular->id)}}">
										<img src="{{asset($popular->cover)}}"
											 alt="Image placeholder">
										<div class="text mt-xl-auto mb-xl-auto w-100">
											<h4>{{$popular->title}}</h4>
											<div class="post-meta">
                                                <span>
                                                    {{date('M d Y', strtotime($popular->created_at))}}
                                                    &nbsp;
                                                    <span class="fa fa-comments"></span>
                                                    {{count($popular->comment->where('status', 1))}}
                                                </span>
											</div>
										</div>
									</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<!-- END sidebar-box -->
				<div class="sidebar-box">
					<h3 class="heading"><i class="fas fa-rss-square"></i> Don't know what to play?
					</h3>
					<form class="text-center" method="get" action="{{asset('/randomPost')}}">
						@csrf
						<button style="width: 100%" class="btn btn-primary" type="submit">
							<i class="fas fa-random"></i> Get A Game
						</button>
					</form>
				</div>
				<div class="sidebar-box">
					<h3 class="heading"><i class="fas fa-th-large"></i> Categories</h3>
					<ul class="categories">

						@foreach($lsCategory as $cate)
							<li>
								<a href="{{asset('/post_by_category/'.$cate->id)}}">
									<i class="fas fa-rainbow"></i> {{$cate->name}}
									<span>({{$cate->posts->count()}})</span>
								</a>
							</li>
						@endforeach
					</ul>
				</div>
				<!-- END sidebar-box -->

				<div class="sidebar-box">
					<h3 class="heading"><i class="fas fa-tags"></i> Tags</h3>
					<ul class="tags">
						@foreach($lsTag as $tag)
							<li>
								<a href="{{asset('/post_by_tag/'.$tag->id)}}">
									<i class="fas fa-tag"></i> {{$tag->name}} <span>({{$tag->posts->count()}})</span>
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			<!-- END sidebar -->
			<div class="col-md-12">
				@yield('comment')
			</div>
		</div>
	</div>
</section>

<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 mb-3 col-lg-4 ">
				<h3>About Us <i class="fas fa-info-circle"></i></h3>
				<a href="{{asset('/about')}}" class="footer-banner footer-banner-img">
					<img src="{{asset('/images/img_1.jpg')}}" alt="Image placeholder">
				</a>
				<div class="footer-banner">
					Lorem ipsum dolor sit amet sa ksal sk sa, ...
					<span>
                        <a style="display: inline" href="{{asset('/about')}}">
                            Read More
                        </a>
                    </span>
				</div>

			</div>
			<div class="col-12 col-sm-6 mb-3 col-lg-4">
				<h3>Latest DLCs <i class="fas fa-clock"></i></h3>
				<div class="post-entry-sidebar">
					<ul>
						@foreach($lsLatest as $latest)
							<li>
								<a class="post-entry-link"
								   href="{{asset('/view_dlc/'.$latest->id)}}">
									<img src="{{asset($latest->cover)}}"
										 alt="Image placeholder" class="mr-2">
									<div class="text">
										<h4>{{$latest->title}}</h4>
										<div class="post-meta">
                                            <span class="mr-sm-2 d-none d-sm-inline">
                                                {{date('M d Y', strtotime($latest->created_at))}}
                                            </span>
											<span class="mr-sm-2 d-sm-none">
                                                {{date('m-d-Y', strtotime($latest->created_at))}}
                                            </span>
											&bullet;
											<span class="ml-sm-2"><span
													class="fa fa-comments"></span>
                                            {{count($latest->comment->where('status', 1))}}</span>
										</div>
									</div>
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-12 col-sm-12 mb-3 social-link col-lg-4">
				<div class="row">
					<div class="col-6 col-sm-3 col-lg-6 mt-sm-2 mt-lg-0 text-center">
						<h3>Links <i class="fas fa-link"></i></h3>
						<ul class="list-unstyled">
							@foreach($lsRandomCate as $randomCate)
								<li>
									<a href="{{asset('/post_by_category/'.$randomCate->id)}}">
										<i class="fas fa-rainbow"></i> {{$randomCate->name}}
									</a>
								</li>
							@endforeach
							@foreach($lsRandomTag as $randomTag)
								<li>
									<a href="{{asset('/post_by_tag/'.$randomTag->id)}}">
										<i class="fas fa-tag"></i> {{$randomTag->name}}
									</a>
								</li>
							@endforeach
							<li><a href="{{asset('/contact')}}"><i
										class="fa fa-comment-dots"></i> Contact
									Me</a></li>
						</ul>
					</div>
					<div class="col-6 d-sm-none d-lg-block col-sm-3 col-lg-6 mt-sm-2 mt-lg-0 text-center">
						<h3>Social <i class="fas fa-user-friends"></i></h3>
						<ul class="list-unstyled footer-social">
							<li><a href="https://twitter.com/"><span
										class="fab fa-twitter"></span>
									Twitter</a></li>
							<li><a href="https://www.facebook.com/"><span
										class="fab fa-facebook-square"></span>
									Facebook</a></li>
							<li><a href="https://www.instagram.com/"><span
										class="fab fa-instagram"></span>
									Instagram</a></li>
							<li><a href="https://www.youtube.com/"><span
										class="fab fa-youtube"></span>
									Youtube</a></li>
							<li><a href="https://www.snapchat.com/"><span
										class="fab fa-snapchat-square"></span>
									Snapshot</a></li>
						</ul>
					</div>
					<div class="col-12 col-sm-6 col-lg-12 text-center mt-4 mt-sm-5 mt-lg-4">
						<a class="footer-logo" href="{{asset('/')}}"><h1>Woobly</h1></a>
						<p class="small d-none d-sm-block d-lg-none mt-3">
							Copyright &copy; Phạm Anh Dũng @Senbonzakura97
							anhdunngpham090@gmail.com
						</p>
					</div>
					<div class="col-6 col-sm-3 d-none d-sm-block d-lg-none col-lg-6 mt-sm-2 mt-lg-0 text-center">
						<h3>Social <i class="fas fa-user-friends"></i></h3>
						<ul class="list-unstyled footer-social">
							<li><a href="https://twitter.com/"><span
										class="fab fa-twitter"></span>
									Twitter</a></li>
							<li><a href="https://www.facebook.com/"><span
										class="fab fa-facebook-square"></span>
									Facebook</a></li>
							<li><a href="https://www.instagram.com/"><span
										class="fab fa-instagram"></span>
									Instagram</a></li>
							<li><a href="https://www.youtube.com/"><span
										class="fab fa-youtube"></span>
									Youtube</a></li>
							<li><a href="https://www.snapchat.com/"><span
										class="fab fa-snapchat-square"></span>
									Snapshot</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12 d-sm-none d-lg-block text-center">
				<p class="small">
					Copyright &copy; Phạm Anh Dũng @Senbonzakura97 anhdunngpham090@gmail.com
				</p>
			</div>
		</div>
	</div>
</footer>
<!-- END footer -->

<div class="container">
	<div class="row">
		@yield('modal')
	</div>
</div>

<style type="text/css">
	@if(\Request::route()->getName() != 'homepage')
		@media (max-width: 992px){
			.logo-header-wrap {
				background: #62b1f6;
			}
		}
		@media (max-width: 992px){
			.menu-button {
				color: white !important;
			}
		}
		@media (max-width: 992px) {
			.site-logo a {
				color: white !important;
			}
		}
	@endif
</style>
<script src="{{asset('/js/main.js')}}"></script>
</body>
</html>
