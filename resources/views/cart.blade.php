@extends('layouts.frontend')
@section('content-title')
	<div class="row mb-4">
		<div class="col-md-6">
			<h2 class="mb-4"><i class="fas fa-shopping-cart"></i> Your Cart</h2>
		</div>
	</div>
@endsection
@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<div class="table-responsive row m-0">
			<table class="table table-striped" style="min-width: 500px">
				<thead>
				<tr>
					<th scope="col">Game </th>
					<th scope="col"></th>
					<th scope="col" class="text-left">Price</th>
					<th> </th>
				</tr>
				</thead>
				<tbody>
					@for($i = 0; $i < 3; $i++)
{{--						https://dummyimage.com/50x50/55595c/fff--}}
						<tr>
							<td class="align-middle"><img src="https://via.placeholder.com/50/55595c/FFFFFF" alt="icon"/> </td>
							<td class="align-middle">Game Name Titi</td>
							<td class="align-middle text-left">70,00 €</td>
							<td class="align-middle text-center">
								<button class="btn btn-sm btn-danger" style="cursor: pointer">
									<i class="fas fa-trash-alt"></i>
								</button>
							</td>
						</tr>
					@endfor
				</tbody>
			</table>
		</div>
		<button class="btn btn-sm btn-danger my-2" style="cursor: pointer">
			Remove All Item <i class="fas fa-trash-restore-alt"></i>
		</button>
		<a href="#" class="btn btn-secondary my-2">
			Continue Shopping <i class="fas fa-shopping-cart"></i>
		</a>
		<div class="table-responsive row mx-0 mt-3">
			<table class="table table-sm table-borderless col-12 col-md-5 ml-auto">
				<tbody>
					<tr>
						<td>Sub-Total</td>
						<td class="align-middle text-right">255,90 €</td>
					</tr>
					<tr>
						<td >Tax</td>
						<td class="align-middle text-right">0 €</td>
					</tr>
					<tr>
						<td>Discount</td>
						<td class="align-middle text-right">0 €</td>
					</tr>
					<tr>
						<th scope="col"><strong>Total</strong></th>
						<th scope="col" class="align-middle text-right"><strong>255,90 €</strong></th>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="row mx-0 my-3">
			<div class="ml-auto">
				<div class="d-inline-flex mb-2">
					<a href="#" class="btn btn-success">
						Purchase for myself <i class="fas fa-cash-register"></i>
					</a>
				</div>
				<div class="d-inline-flex mb-2">
					<a href="{{asset("/gift")}}" class="btn btn-success">Purchase as a gift <i class="fas fa-gifts"></i></a>
				</div>
			</div>
		</div>
		<div class="row my-5 px-md-3">
			<h2><i class="fas fa-user-clock"></i> Relate content</h2>
		</div>
		<div class="row my-5">
			<div class="col-12"><h5>Games</h5></div>
			@foreach($lsPopular as $post)
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
							<div class="col-12 col-md-9">
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
		<div class="row my-5">
			<div class="col-12"><h5>DLCs</h5></div>
			@foreach($lsPopularDlc as $dlc)
				<div class="col-12" style="padding: 15px">
					<div class="card" style=" width: 100%">
						<div class="row no-gutters">
							<div class="col-12 col-md-3">
								<a href="{{route('post.show', $dlc->id)}}" class="d-block" style="padding: 0;
									background:
									url('{{asset($dlc->cover)}}')
									no-repeat center; background-size: cover !important; min-height: 150px;
									height: 100%; border-radius: 0.25rem 0 0 0.25rem; width: 100%">
								</a>
							</div>
							<div class="col-12 col-md-9">
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
		<div class="row my-5 px-md-3">
			<h2><i class="fas fa-user-clock"></i> Sale Off</h2>
		</div>
		<div class="row my-5">
			@foreach($lsDiscount as $post)
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
							<div class="col-12 col-md-9">
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

	</div>



	<style type="text/css">
		.table-responsive::-webkit-scrollbar{
			height: 3px;
		}
		.table-responsive::-webkit-scrollbar-thumb{
			background-color: rgba(106, 106, 106, 0.4);
		}
		.table-responsive::-webkit-scrollbar-button:single-button{
			display: none;
		}
	</style>
@endsection


