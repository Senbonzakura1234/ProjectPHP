@extends('layouts.app2')

@section('content')
	<div class="text-center mb-4 mt-2">
		<div class="col">
			<h2>Billing Management</h2>
		</div>
	</div>
	<div class="row">
		@foreach($lsInvoice as $invoice)
			<div class="d-none">
				{{$subTotalCalcu = 0}}
				{{$totalCalcu = 0}}
				@foreach($invoice->product as $product)
					{{$subTotalCalcu = $subTotalCalcu + $product->subTotal}}
					{{$totalCalcu = $totalCalcu + $product->total}}
				@endforeach
			</div>

			<div class="col-12 col-lg-6">
				<div class="card bg-success text-white">
					<div class="row mx-0 card-body">
						<div class="col-12">
							<h5 class="card-title">
								<strong>User:</strong> {{$invoice->user->name}}
							</h5>
							<h5 class="card-title">
								<strong>Country:</strong>
								@if (file_exists(public_path('/images/country_flag/flags-medium/'
									.strtolower($invoice->country->iso)).'.png'))
									<img src="{{asset('/images/country_flag/flags-medium/'
									.strtolower($invoice->country->iso)).'.png'}}"
									 alt="{{$invoice->country->iso}}" style="display: inline-block; max-height: 18px;
								position: relative; bottom: 3px; border-radius: 3px">
								@else
									Undefine <i class="fas fa-flag"></i>
								@endif
							</h5>
						</div>
						<div class="col-12">
							<p class="card-text">
								<strong>Sub-total: {{$subTotalCalcu}}</strong>
							</p>
							<p class="card-text">
								<strong>Total: {{$totalCalcu}}</strong>
							</p>
						</div>
						<div class="col-12 text-right">
							<a class="btn btn-primary" href="{{route('billing.show', $invoice->id)}}">See detail</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>

	<div class="mt-4 mx-0 row">
		<div class="mx-auto">
{{--			{{$lsCate->links()}}--}}
		</div>
	</div>
@endsection

