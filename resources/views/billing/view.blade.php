@extends('layouts.app2')

@section('content')
	<div class="text-center mb-4 mt-2">
		<div class="col">
			<h2>Bill id {{$invoice->id}}</h2>
			<small>Create at: </small>
			<small>User: {{$invoice->user->name}}</small>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="table-responsive row m-0">
				<table class="table table-striped" style="min-width: 500px">
					<thead>
					<tr>
						<th scope="col">Game </th>
						<th scope="col"></th>
						<th scope="col" class="text-left">Price</th>
					</tr>
					</thead>
					<tbody>
						@foreach($invoice->product as $product)
							{{--						https://dummyimage.com/50x50/55595c/fff--}}
							<tr>
								<td class="align-middle">
									<img src="#" style="max-height: 50px" alt="icon"/>
								</td>
								<td class="align-middle">
{{--									{{substr($product['item']['title'], 0, 20)}}--}}
								</td>
								@if($product['item']['discount'] > 0)
									<td class="align-middle text-left">
{{--										{{$product['item']['price'] * (1 - $product['item']['discount']/100)}} €--}}
									</td>
								@else
									<td class="align-middle text-left">
{{--										{{$product['item']['price']}} €--}}
									</td>
								@endif
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection

