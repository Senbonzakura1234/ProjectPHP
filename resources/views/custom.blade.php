@extends('layouts.frontend')
@section('content-title')
	<div class="row mb-4">
		<div class="col-md-6">
			<h2 class="mb-4"><i class="fas fa-cash-register"></i> User Info</h2>
		</div>
	</div>
@endsection
@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<div class="row about-content">
			<div class="col-md-12 text-center text-lg-left about-cover"
				 style="background: url('{{Auth::user()->cover != null ?
						asset(Auth::user()->cover) :
						'https://via.placeholder.com/1500x800/62b1f6/FFFFFF?text=%20'}}')">
				<div class="about-avatar d-block d-lg-inline-block">
					<img style="background: #fff" src="{{Auth::user()->avatar != null ?
						asset(Auth::user()->avatar) :
						'https://res.cloudinary.com/senbonzakura/image/upload/v1566237952/default_re2ods.png'}}"
						alt="Avatar" class="img-fluid">
					<div class="about-name d-block d-lg-inline-block">
						<h2 class="mb-0">
							@if(strlen(Auth::user()->name) > 15)
								{{substr(Auth::user()->name, 0, 15)}} ...
							@else
								{{Auth::user()->name}}
							@endif
						</h2>
						<a href="{{asset('/edit_profile')}}"
							class="edit-profile-btn btn-primary btn-sm btn d-inline-block">
							Edit profile
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-12 about-main">
				<div class="row mx-0">
					<div class="col-md-6 mb-2">
						<strong>Full Name:</strong>
						@if(Auth::user()->lastName != null && Auth::user()->firstName != null)
							{{Auth::user()->lastName}} {{Auth::user()->firstName}}
						@elseif(Auth::user()->lastName == null && Auth::user()->firstName != null)
							<small>- not set -</small> {{Auth::user()->firstName}}
						@elseif(Auth::user()->lastName != null && Auth::user()->firstName == null)
							{{Auth::user()->lastName}} <small>- not set -</small>
						@else
							<small>- not set -</small>
						@endif
					</div>
					<div class="col-md-6 mb-2">
						<strong>Email:</strong>
						{{Auth::user()->email != null?
							Auth::user()->email : "- not set -"
						}}
					</div>
					<div class="col-md-6 mb-2">
						<strong>Country:</strong>
						@if(Auth::user()->country_id != null)
							@if (file_exists(public_path('/images/country_flag/flags-medium/'
								.strtolower(Auth::user()->country->iso)).'.png'))

								<img src="{{asset('/images/country_flag/flags-medium/'
								.strtolower(Auth::user()->country->iso)).'.png'}}"
								alt="{{Auth::user()->country->iso}}" style="display: inline-block; max-height: 18px;
								position: relative; bottom: 3px; border-radius: 3px">

							@else
								<i class="fas fa-flag"></i>
							@endif
							{{Auth::user()->country->nicename}}
						@else
							<small>- not set -</small>
						@endif
					</div>
					<div class="col-md-6 mb-2">
						<strong>Phone:</strong>
						@if(Auth::user()->country_id != null && Auth::user()->phone != null)
							(+{{Auth::user()->country->phonecode}}) {{Auth::user()->phone}}
						@elseif(Auth::user()->country_id == null && Auth::user()->phone != null)
							<small class="text-muted">- not set -</small> {{Auth::user()->phone}}
						@elseif(Auth::user()->country_id != null && Auth::user()->phone == null)
							(+{{Auth::user()->country->phonecode}}) <small>- not set -</small>
						@else
							<small>- not set -</small>
						@endif
					</div>
				</div>
				<div class="row mx-0">
					<div class="col-md-12 mb-2">
						<strong>Description:</strong>
						@if(Auth::user()->desc != null)
							<br>
							{!!Auth::user()->desc!!}
						@else
							<small>- not set -</small>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-5 mt-5">
			<div class="col-md-12 mb-5">
				<h2><i class="fas fa-user-clock"></i> Your Library</h2>
			</div>
			<div class="col-md-12">
				<h5>Games</h5>
			</div>
			<div class="col-md-12">
				@if(count($lsGame) != 0)
					@foreach($lsGame as $post)
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
											<small>
												<i class="fab fa-windows
													@if($post->windows == 1) text-compartible @endif"></i>
												<i class="fab fa-xbox
													@if($post->xbox == 1) text-compartible @endif"></i>
												<i class="fab fa-playstation
													@if($post->playstation == 1) text-compartible @endif">
												</i>
											</small>
										</p>
									</div>
								</div>
	{{--							remove from library btn--}}
							</div>
						</div>
					@endforeach
				@else
					<p>You have no games in your library</p>
				@endif
			</div>
			<div class="col-md-12">
				<h5>DLCs</h5>
			</div>
			<div class="col-md-12">
				@if(count($lsDlc) != 0)
					@foreach($lsDlc as $dlc)
						<div class="card my-3" style="width: 100%">
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
											<small>
												<i class="fab fa-windows
													@if($dlc->windows == 1) text-compartible @endif"></i>
												<i class="fab fa-xbox
													@if($dlc->xbox == 1) text-compartible @endif"></i>
												<i class="fab fa-playstation
													@if($dlc->playstation == 1) text-compartible @endif">
												</i>
											</small>
												{{--							remove from library btn--}}
										</p>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				@else
					<p>You have no DLCs in your library</p>
				@endif
			</div>
		</div>
	</div>
@endsection


