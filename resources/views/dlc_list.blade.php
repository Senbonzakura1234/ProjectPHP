@extends('layouts.frontend')
@section('content-title')
	<div class="row mb-4">
		<div class="col-md-6">
			<h2 class="mb-4">
				<i class="fas fa-th-list"></i>
				All DLCs ({{count($lsDlcAll)}})
			</h2>
		</div>
	</div>
@endsection
@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<div class="row mb-5 mt-5">

			@foreach($lsDlcAll as $dlc)
				<div class="col-12" style="padding: 15px">
					<div class="card" style=" width: 100%">
						<div class="row no-gutters">
							<div class="col-12 col-md-3">
								<a href="{{asset('/view_dlc/'.$dlc->id)}}" class="d-block" style="padding: 0;
									background:
									url('{{asset($dlc->cover)}}')
									no-repeat center; background-size: cover !important; min-height: 150px;
									height: 100%; border-radius: 0.25rem 0 0 0.25rem; width: 100%">
								</a>
							</div>
							<div class="col-12 col-md-9">
								<div class="card-body pb-md-0">
									<h5 class="card-title">
										<a href="{{asset('/view_dlc/'.$dlc->id)}}">
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
								<div class="card-body text-center text-md-right">
									<a href="#" class="btn btn-sm btn-success">
										Add to cart <i class="fas fa-cart-plus"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="row mt-5">
			<div class="col-md-12 text-center">
				{{$lsDlcAll->links()}}
			</div>
		</div>
	</div>
@endsection

