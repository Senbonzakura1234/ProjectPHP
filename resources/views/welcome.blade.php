@extends('layouts.frontend')
@section('banner')
	<section class="site-section pt-5 pb-5">
		<div>
			<div class="bd-example">
				<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-touch="true"
					 data-pause="hover">
					<ol class="carousel-indicators">
						@foreach($lsPopular as $carousel)
							<li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}"
								class="{{ $loop->first ? 'active' : '' }}">
							</li>
						@endforeach
					</ol>
					<div class="carousel-inner">
						@foreach($lsPopular as $carousel)
							<div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="6000">
								<div class="carousel-home-span" id="carousel-home-bg-1"
									 style="background-image: url('{{asset($carousel->cover)}}')">
								</div>
								{{--<img src="images/img_1.jpg" class="d-block " alt="...">--}}
								<div class="carousel-caption">
									@foreach($carousel->categories as $cate)
										@if($loop->first)
											<a href="{{asset('/post_by_category/'.$cate->id)}}" class="category mb-2">
												<i class="fas fa-rainbow"></i> {{$cate->name}}
											</a>
										@endif
									@endforeach
									<span class="ml-2 mb-2">
										<strong>Price:</strong>
										@if($carousel->discount > 0)
											<small>
												<span style="text-decoration: line-through;">
													{{$carousel->price}} $
												</span>
											</small>
											&nbsp;
											<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$carousel->discount}}%
												</span>
											</strong>
											{{$carousel->price * (1 - $carousel->discount/100)}} $
										@else
											{{$carousel->price}} $
										@endif
										&bullet;
                                    	<span class="fa fa-comments"></span>
                                        {{count($carousel->comment->where('status', 1))}}
                                    </span>
									<a class="carousel-post-link" href="{{asset('/view_post/'.$carousel->id)}}">
										@if(strlen($carousel->title) <= 50)
											<h5>{{$carousel->title}}</h5>
										@else
											<h5>{{substr($carousel->title, 0, 46)}} ...</h5>
										@endif
									</a>
									<p class="d-none d-md-block">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta
										eaque ipsa laudantium!
									</p>
								</div>
							</div>
						@endforeach
					</div>
					<a class="carousel-control-fix carousel-control-prev" href="#carouselExampleCaptions" role="button"
					   data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-fix carousel-control-next" href="#carouselExampleCaptions" role="button"
					   data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('content-title')
	<div class="row">
		<div class="col-lg-6">
			<h2 class="mb-4">Latest Games <i class="far fa-clock"></i></h2>
		</div>
	</div>
@endsection

@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<div class="row">
			@foreach($lsPost as $post)
				<div class="col-md-6">
					{{--					href=""--}}
					<div class="blog-entry element-animate">
						<img src="{{$post->cover}}" alt="Image placeholder" style="cursor: pointer"
							 onclick="window.location.href = '{{asset('/view_post/'.$post->id)}}';">
						<div class="blog-content-body">
							<div class="post-meta row mx-0">
								<div>
									<i class="fab fa-windows @if($post->windows == 1) text-compartible @endif"></i>
									<i class="fab fa-xbox @if($post->xbox == 1) text-compartible @endif"></i>
									<i class="fab fa-playstation
												@if($post->playstation == 1) text-compartible @endif">
									</i>
								</div>
								<div class="ml-auto">
									<span class="fa fa-comments"></span>
                                	{{count($post->comment->where('status', 1))}}
								</div>
								<div class="follow-btn text-secondary ml-2 px-2">
									Follow <i class="fas fa-rss"></i>
								</div>
							</div>
							<a href="{{asset('/view_post/'.$post->id)}}">
								@if(strlen($post->title) <= 30)
									<h2>{{$post->title}}</h2>
								@else
									<h2>{{substr($post->title, 0, 27)}} ...</h2>
								@endif
							</a>
							<p>
								<strong>Price:</strong>
								@if($post->discount > 0)
									<small>
												<span style="text-decoration: line-through;">
													{{$post->price}} $
												</span>
									</small>
									&nbsp;
									<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$post->discount}}%
												</span>
									</strong>
									{{$post->price * (1 - $post->discount/100)}} $
								@else
									{{$post->price}} $
								@endif
							</p>



							@if(Auth::check())
								@if(in_array($post->id, $gamedamua))
									<button class="btn btn-sm btn-info add-to-cart-btn position-modify">
										<i class="fas fa-check"></i>
										<span class="add-to-cart-btn-text">Da mua</span>
										<i class="fas fa-sync-alt fast-spin"></i>
									</button>
								@else
								<a href="{{asset('/add_to_cart/'.$post->id)}}" class="position-modify">
										<button class="btn btn-sm btn-primary add-to-cart-btn">
											<i class="fas fa-cart-plus"></i>
											<span class="add-to-cart-btn-text">Add to cart</span>
											<i class="fas fa-sync-alt fast-spin"></i>
										</button>
									</a>
								@endif
							@endif



						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row mt-2">
			<div class="col-md-12 text-center">
				<a style="font-size: 15px; border-radius: 40px"
				   href="{{asset('/post_list')}}" class="btn btn-primary d-inline-block mb-2">
					<i class="fas fa-th-list"></i> View more Games
				</a>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-lg-6">
				<h2 class="mb-4">Latest DLCs <i class="far fa-clock"></i></h2>
			</div>
		</div>


		<div class="row">
			@foreach($lsDlc as $dlc)
				<div class="col-md-6">

					<div class="blog-entry element-animate">
						<img src="{{$dlc->cover}}" alt="Image placeholder" style="cursor: pointer"
							 onclick="window.location.href = '{{asset('/view_dlc/'.$dlc->id)}}';">
						<div class="blog-content-body">
							<div class="post-meta row mx-0">
								<div>
									<i class="fab fa-windows @if($dlc->windows == 1) text-compartible @endif"></i>
									<i class="fab fa-xbox @if($dlc->xbox == 1) text-compartible @endif"></i>
									<i class="fab fa-playstation
												@if($dlc->playstation == 1) text-compartible @endif">
									</i>
								</div>
								<div class="ml-auto">
									<span class="fa fa-comments"></span>
									{{count($dlc->comment->where('status', 1))}}
								</div>
								<div class="follow-btn text-secondary ml-2 px-2">
									Follow <i class="fas fa-rss"></i>
								</div>
							</div>
							<a href="{{asset('/view_dlc/'.$dlc->id)}}">
								@if(strlen($dlc->title) <= 30)
									<h2>{{$dlc->title}}</h2>
								@else
									<h2>{{substr($dlc->title, 0, 27)}} ...</h2>
								@endif
							</a>
							<p>
								<strong>Price:</strong>
								@if($dlc->discount > 0)
									<small>
												<span style="text-decoration: line-through;">
													{{$dlc->price}} $
												</span>
									</small>
									&nbsp;
									<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$dlc->discount}}%
												</span>
									</strong>
									{{$dlc->price * (1 - $dlc->discount/100)}} $
								@else
									{{$dlc->price}} $
								@endif
							</p>



{{--							@if(Auth::check())--}}
{{--								@if(in_array($post->id, $gamedamua))--}}
{{--									<button class="btn btn-sm btn-info add-to-cart-btn position-modify">--}}
{{--										<i class="fas fa-check"></i>--}}
{{--										<span class="add-to-cart-btn-text">Da mua</span>--}}
{{--										<i class="fas fa-sync-alt fast-spin"></i>--}}
{{--									</button>--}}
{{--								@else--}}
{{--									<a href="{{asset('/add_to_cart/'.$post->id)}}" class="position-modify">--}}
{{--										<button class="btn btn-sm btn-primary add-to-cart-btn">--}}
{{--											<i class="fas fa-cart-plus"></i>--}}
{{--											<span class="add-to-cart-btn-text">Add to cart</span>--}}
{{--											<i class="fas fa-sync-alt fast-spin"></i>--}}
{{--										</button>--}}
{{--									</a>--}}
{{--								@endif--}}
{{--							@endif--}}



						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row mt-2">
			<div class="col-md-12 text-center">
				<a style="font-size: 15px; border-radius: 40px"
				   href="{{asset('/dlc_list')}}" class="btn btn-primary d-inline-block mb-2">
					<i class="fas fa-th-list"></i> View more DLCs
				</a>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-lg-6">
				<h2 class="mb-4">Sales Off <i class="far fa-clock"></i></h2>
			</div>
		</div>
		<h4 class="mb-4">Games <i class="far fa-clock"></i></h4>
		<div class="row mb-2">
			@foreach($lsDiscountPost as $post)
				<div class="col-md-6">
					{{--					href=""--}}
					<div class="blog-entry element-animate">
						<img src="{{$post->cover}}" alt="Image placeholder" style="cursor: pointer"
							 onclick="window.location.href = '{{asset('/view_post/'.$post->id)}}';">
						<div class="blog-content-body">
							<div class="post-meta row mx-0">
								<div>
									<i class="fab fa-windows @if($post->windows == 1) text-compartible @endif"></i>
									<i class="fab fa-xbox @if($post->xbox == 1) text-compartible @endif"></i>
									<i class="fab fa-playstation
												@if($post->playstation == 1) text-compartible @endif">
									</i>
								</div>
								<div class="ml-auto">
									<span class="fa fa-comments"></span>
									{{count($post->comment->where('status', 1))}}
								</div>
								<div class="follow-btn text-secondary ml-2 px-2">
									Follow <i class="fas fa-rss"></i>
								</div>
							</div>
							<a href="{{asset('/view_post/'.$post->id)}}">
								@if(strlen($post->title) <= 30)
									<h2>{{$post->title}}</h2>
								@else
									<h2>{{substr($post->title, 0, 27)}} ...</h2>
								@endif
							</a>

							<p>
								<strong>Price:</strong>
								@if($post->discount > 0)
									<small>
												<span style="text-decoration: line-through;">
													{{$post->price}} $
												</span>
									</small>
									&nbsp;
									<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$post->discount}}%
												</span>
									</strong>
									{{$post->price * (1 - $post->discount/100)}} $
								@else
									{{$post->price}} $
								@endif
							</p>


							@if(Auth::check())
								@if(in_array($post->id, $gamedamua))
									<button class="btn btn-sm btn-info add-to-cart-btn position-modify">
										<i class="fas fa-check"></i>
										<span class="add-to-cart-btn-text">Da mua</span>
										<i class="fas fa-sync-alt fast-spin"></i>
									</button>
								@else
									<a href="{{asset('/add_to_cart/'.$post->id)}}" class="position-modify">
										<button class="btn btn-sm btn-primary add-to-cart-btn">
											<i class="fas fa-cart-plus"></i>
											<span class="add-to-cart-btn-text">Add to cart</span>
											<i class="fas fa-sync-alt fast-spin"></i>
										</button>
									</a>
								@endif
							@endif



						</div>
					</div>
				</div>
			@endforeach
		</div>
		<h4 class="mb-4">DLCs <i class="far fa-clock"></i></h4>
		<div class="row mb-2">
			@foreach($lsDiscountDlc as $dlc)
				<div class="col-md-6">

					<div class="blog-entry element-animate">
						<img src="{{$dlc->cover}}" alt="Image placeholder" style="cursor: pointer"
							 onclick="window.location.href = '{{asset('/view_dlc/'.$dlc->id)}}';">
						<div class="blog-content-body">
							<div class="post-meta row mx-0">
								<div>
									<i class="fab fa-windows @if($dlc->windows == 1) text-compartible @endif"></i>
									<i class="fab fa-xbox @if($dlc->xbox == 1) text-compartible @endif"></i>
									<i class="fab fa-playstation
												@if($dlc->playstation == 1) text-compartible @endif">
									</i>
								</div>
								<div class="ml-auto">
									<span class="fa fa-comments"></span>
									{{count($dlc->comment->where('status', 1))}}
								</div>
								<div class="follow-btn text-secondary ml-2 px-2">
									Follow <i class="fas fa-rss"></i>
								</div>
							</div>
							<a href="{{asset('/view_dlc/'.$dlc->id)}}">
								@if(strlen($dlc->title) <= 27)
									<h2>{{$dlc->title}}</h2>
								@else
									<h2>{{substr($dlc->title, 0, 24)}} ...</h2>
								@endif
							</a>
							<p>
								<strong>Price:</strong>
								@if($dlc->discount > 0)
									<small>
												<span style="text-decoration: line-through;">
													{{$dlc->price}} $
												</span>
									</small>
									&nbsp;
									<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$dlc->discount}}%
												</span>
									</strong>
									{{$dlc->price * (1 - $dlc->discount/100)}} $
								@else
									{{$dlc->price}} $
								@endif
							</p>



							{{--							@if(Auth::check())--}}
							{{--								@if(in_array($post->id, $gamedamua))--}}
							{{--									<button class="btn btn-sm btn-info add-to-cart-btn position-modify">--}}
							{{--										<i class="fas fa-check"></i>--}}
							{{--										<span class="add-to-cart-btn-text">Da mua</span>--}}
							{{--										<i class="fas fa-sync-alt fast-spin"></i>--}}
							{{--									</button>--}}
							{{--								@else--}}
							{{--									<a href="{{asset('/add_to_cart/'.$post->id)}}" class="position-modify">--}}
							{{--										<button class="btn btn-sm btn-primary add-to-cart-btn">--}}
							{{--											<i class="fas fa-cart-plus"></i>--}}
							{{--											<span class="add-to-cart-btn-text">Add to cart</span>--}}
							{{--											<i class="fas fa-sync-alt fast-spin"></i>--}}
							{{--										</button>--}}
							{{--									</a>--}}
							{{--								@endif--}}
							{{--							@endif--}}



						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
@section('miscellaneous')
	<div class="row">
		<div class="col-lg-6">
			<h2 class="mb-4">Free content <i class="far fa-clock"></i></h2>
		</div>
	</div>
	<div class="col-md-12 miscellaneous">
		<div class="row">
			@foreach($lsDlcFree as $dlc)
				<div class="col-md-6 col-lg-3">

					<div class="blog-entry element-animate">
						<img src="{{$dlc->cover}}" alt="Image placeholder" style="cursor: pointer"
							 onclick="window.location.href = '{{asset('/view_dlc/'.$dlc->id)}}';">
						<div class="blog-content-body">
							<div class="post-meta row mx-0">
								<div>
									<i class="fab fa-windows @if($dlc->windows == 1) text-compartible @endif"></i>
									<i class="fab fa-xbox @if($dlc->xbox == 1) text-compartible @endif"></i>
									<i class="fab fa-playstation
												@if($dlc->playstation == 1) text-compartible @endif">
									</i>
								</div>
								<div class="ml-auto">
									<span class="fa fa-comments"></span>
									{{count($dlc->comment->where('status', 1))}}
								</div>
								<div class="follow-btn text-secondary ml-2 px-2">
									Follow <i class="fas fa-rss"></i>
								</div>
							</div>
							<a href="{{asset('/view_dlc/'.$dlc->id)}}">
								@if(strlen($dlc->title) <= 30)
									<h2>{{$dlc->title}}</h2>
								@else
									<h2>{{substr($dlc->title, 0, 27)}} ...</h2>
								@endif
							</a>
							<p>
								<strong>Price:</strong>
								@if($dlc->discount > 0)
									<small>
												<span style="text-decoration: line-through;">
													{{$dlc->price}} $
												</span>
									</small>
									&nbsp;
									<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$dlc->discount}}%
												</span>
									</strong>
									{{$dlc->price * (1 - $dlc->discount/100)}} $
								@else
									{{$dlc->price}} $
								@endif
							</p>



							{{--							@if(Auth::check())--}}
							{{--								@if(in_array($post->id, $gamedamua))--}}
							{{--									<button class="btn btn-sm btn-info add-to-cart-btn position-modify">--}}
							{{--										<i class="fas fa-check"></i>--}}
							{{--										<span class="add-to-cart-btn-text">Da mua</span>--}}
							{{--										<i class="fas fa-sync-alt fast-spin"></i>--}}
							{{--									</button>--}}
							{{--								@else--}}
							{{--									<a href="{{asset('/add_to_cart/'.$post->id)}}" class="position-modify">--}}
							{{--										<button class="btn btn-sm btn-primary add-to-cart-btn">--}}
							{{--											<i class="fas fa-cart-plus"></i>--}}
							{{--											<span class="add-to-cart-btn-text">Add to cart</span>--}}
							{{--											<i class="fas fa-sync-alt fast-spin"></i>--}}
							{{--										</button>--}}
							{{--									</a>--}}
							{{--								@endif--}}
							{{--							@endif--}}



						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
