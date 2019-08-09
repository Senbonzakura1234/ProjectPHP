@extends('layouts.frontend')
@section('content-title')
	<div class="row mb-4">
		<div class="col-md-6">
			<h2 class="mb-4"><i class="fas fa-shopping-cart"></i> Gift Delivery</h2>
		</div>
	</div>
@endsection
@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<select class="selectpicker" multiple data-max-options="3"
			data-live-search="true" title="Choose friend to send gifts">
			@for($i = 0; $i < 200 ; $i++)
				<option>Mustard {{$i}}</option>
				<option>Ketchup {{$i}}</option>
				<option>Relish {{$i}}</option>
			@endfor
		</select>

	</div>
	<style type="text/css">
		.bootstrap-select .btn{
			border-radius: 5px;
			outline: none !important;
		}
		.bootstrap-select > select.mobile-device:focus + .dropdown-toggle, .bootstrap-select .dropdown-toggle:focus{
			outline: none !important;
		}
	</style>
@endsection


