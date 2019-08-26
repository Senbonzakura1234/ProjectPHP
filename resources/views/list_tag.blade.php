@extends('layouts.frontend')
@section('content-title')
	<div class="row mb-4">
		<div class="col-md-6">
			<h2 class="mb-4"><i class="fas fa-th-large"></i> Publishers list</h2>
		</div>
	</div>
@endsection
@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<div class="list-group list-group-flush row mx-0">
			@foreach($lsAllTag as $tag)
				<a href="{{asset('/post_by_tag/'.$tag->id)}}" class="list-group-item list-group-item-action">
					<i class="fas fa-rainbow"></i> {{$tag->name}}
					<span>({{count($tag->posts)}})</span>
				</a>
			@endforeach
		</div>
		<div class="row mt-5">
			<div class="col-md-12 text-center">
				{{$lsAllTag->links()}}
			</div>
		</div>
	</div>
@endsection
