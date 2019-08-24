@extends('layouts.frontend')
@section('content')
    <div class="col-md-12 col-lg-8 main-content">

        <div class="row about-content">
            <div class="col-md-12 text-center text-lg-left about-cover"
                style="background: url('{{asset('/images/img_6.jpg')}}')">
                <div class="about-avatar d-block d-lg-inline-block">
                    <img src="{{asset('/images/person_1.jpg')}}"
                         alt="Image Placeholder" class="img-fluid">
                    <div class="about-name d-block d-lg-inline-block">
                        <h2 class="mb-0">
                            About Woobly
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12 about-main">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum minima eveniet recusandae suscipit
                    eum laboriosam fugit amet deleniti iste et. Ad dolores, necessitatibus non saepe tenetur impedit
                    commodi quibusdam natus repellat, exercitationem accusantium perferendis officiis. Laboriosam
                    impedit quia minus pariatur!</p>
                <p>Dignissimos iste consectetur, nemo magnam nulla suscipit eius quibusdam, quo aperiam quia quae est
                    explicabo nostrum ab aliquid vitae obcaecati tenetur beatae animi fugiat officia id ipsam sint?
                    Obcaecati ea nisi fugit assumenda error totam molestiae saepe fugiat officiis quam?</p>
                <p>Culpa porro quod doloribus dolore sint. Distinctio facilis ullam voluptas nemo voluptatum saepe
                    repudiandae adipisci officiis, explicabo eaque itaque sed necessitatibus, fuga, ea eius et aliquam
                    dignissimos repellendus impedit pariatur voluptates. Dicta perferendis assumenda, nihil placeat,
                    illum quibusdam. Vel, incidunt?</p>
                <p>Dolorum blanditiis illum quo quaerat, possimus praesentium perferendis! Quod autem optio nobis,
                    placeat officiis dolorem praesentium odit. Vel, cum, a. Adipisci eligendi eaque laudantium dicta
                    tenetur quod, pariatur sunt sed natus officia fuga accusamus reprehenderit ratione, provident
                    possimus ut voluptatum.</p>
            </div>
        </div>
        <div class="row mb-5 mt-5">
            <div class="col-md-12 mb-5">
                <h2><i class="fas fa-user-clock"></i> Our Latest Games & DLCs</h2>
            </div>
			<div class="col-md-12">
				<h5>Games</h5>
			</div>
            <div class="col-md-12">
                @foreach($lsPost as $post)
					<div class="card my-3" style=" width: 100%">
						<div class="row no-gutters">
							<div class="col-12 col-md-3">
								<a href="{{asset('/view_post/'.$post->id)}}" class="d-block" style="padding: 0;
									background:
									url('{{asset($post->cover)}}')
									no-repeat center; background-size: cover !important; min-height: 150px;
									height: 100%; border-radius: 0.25rem 0 0 0.25rem; width: 100%">
								</a>
							</div>
							<div class="col-12 col-md-9" style="padding-bottom: 80px; position: relative">
								<div class="card-body pb-md-0">
									<h5 class="card-title">
										<a href="{{asset('/view_post/'.$post->id)}}">
											{{$post->title}}
										</a>
									</h5>
									<p class="card-text">
										Price:
										@if($post->discount > 0 && $post->discount < 100 && $post->price > 0)
											<small>
												<span style="text-decoration: line-through;">
													{{$post->price}} €
												</span>
											</small>
											&nbsp;
											<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$post->discount}}%
												</span>
											</strong>
											{{$post->price * (1 - $post->discount/100)}} €
										@elseif($post->price == 0 || $post->discount == 100)
											<strong>
												<span class="badge badge-success" style="font-size: 100%">FREE</span>
											</strong>
										@else
											<small>
												{{$post->price}} €
											</small>
											@endif
											&bull;
											<small>
												<i class="fab fa-windows @if($post->windows == 1) text-compartible @endif"></i>
												<i class="fab fa-xbox @if($post->xbox == 1) text-compartible @endif"></i>
												<i class="fab fa-playstation
												@if($post->playstation == 1) text-compartible @endif">
												</i>
											</small>
									</p>
								</div>
							</div>


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
                @endforeach
            </div>
			<div class="col-md-12">
				<h5>DLCs</h5>
			</div>
            <div class="col-md-12">
                @foreach($lsDlc as $dlc)
					<div class="card my-3" style=" width: 100%">
						<div class="row no-gutters">
							<div class="col-12 col-md-3">
								<a href="{{route('post.show', $dlc->id)}}" class="d-block" style="padding: 0;
									background:
									url('{{asset($dlc->cover)}}')
									no-repeat center; background-size: cover !important; min-height: 150px;
									height: 100%; border-radius: 0.25rem 0 0 0.25rem; width: 100%">
								</a>
							</div>
							<div class="col-12 col-md-9" style="padding-bottom: 80px; position: relative">
								<div class="card-body pb-md-0">
									<h5 class="card-title">
										<a href="{{route('post.show', $dlc->id)}}">
											{{$dlc->title}}
										</a>
									</h5>
									<p class="card-text">
										Price:
										@if($dlc->discount > 0 && $dlc->discount < 100 && $dlc->price > 0)
											<small>
												<span style="text-decoration: line-through;">
													{{$dlc->price}} €
												</span>
											</small>
											&nbsp;
											<strong>
												<span style="font-size: 100%" class="badge badge-success">
													-{{$dlc->discount}}%
												</span>
											</strong>
											{{$dlc->price * (1 - $dlc->discount/100)}} €
										@elseif($dlc->price == 0 || $dlc->discount == 100)
											<strong>
												<span class="badge badge-success" style="font-size: 100%">FREE</span>
											</strong>
										@else
											<small>
												{{$dlc->price}} €
											</small>
											@endif
											&bull;
											<small>
												<i class="fab fa-windows @if($dlc->windows == 1) text-compartible @endif"></i>
												<i class="fab fa-xbox @if($dlc->xbox == 1) text-compartible @endif"></i>
												<i class="fab fa-playstation
												@if($dlc->playstation == 1) text-compartible @endif">
												</i>
											</small>
									</p>
								</div>


								@if(Auth::check())								
									@if(in_array($dlc->id, $dlcdamua))
										<button class="btn btn-sm btn-info add-to-cart-btn position-modify">
											<i class="fas fa-check"></i>
											<span class="add-to-cart-btn-text">Da mua</span>
											<i class="fas fa-sync-alt fast-spin"></i>
										</button>
									@else
									<a href="{{asset('/add_dlc_to_cart/'.$dlc->id)}}" class="position-modify">
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
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <a style="font-size: 15px; border-radius: 40px"
                   href="{{asset('/post_list')}}" class="btn btn-primary d-inline-block mb-2">
                    <i class="fas fa-th-list"></i> View more Games
                </a>
				<a style="font-size: 15px; border-radius: 40px"
                   href="{{asset('/dlc_list')}}" class="btn btn-primary d-inline-block mb-2">
                    <i class="fas fa-th-list"></i> View more DLCs
                </a>
            </div>
        </div>
    </div>
@endsection

