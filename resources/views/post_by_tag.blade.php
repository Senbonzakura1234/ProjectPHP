@extends('layouts.frontend')
@section('content-title')
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="mb-4">
                <i class="fas fa-tags"></i>
                Tag: {{$tag->name}} ({{count($tag->posts)}})
            </h2>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-md-12 col-lg-8 main-content">
        <div class="row mb-5 mt-5">

			@foreach($lsPostTag as $post)
				<div class="col-12" style="padding: 15px">
					<div class="card" style=" width: 100%">
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
								@if(Auth::check())
									@if(in_array($post->id, $gamedamua))
										<button class="btn btn-sm btn-info add-to-cart-btn position-modify">
											<i class="fas fa-check"></i>
											<span class="add-to-cart-btn-text">Added to Library</span>
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
				</div>
			@endforeach
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                {{$lsPostTag->links()}}
            </div>
        </div>
    </div>
@endsection

