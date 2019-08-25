@extends('layouts.app2')

@section('content')
	<div class="text-center mb-3 mt-2">
		<div class="col">
			<h2>Galleries Management</h2>
		</div>
	</div>
	<div class="row my-1">
		<div class="col-12">
			<h4>{{$dlc->title}}</h4>
		</div>
		<div class="col-12">
			<div class="row">
				@foreach($dlc->gallery as $gallery)
					<div class="col-12 col-md-6 col-lg-3 mb-2">
						<img src="{{asset($gallery->link)}}" alt="gallery" style="width: 100%; max-width: 100%">
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
