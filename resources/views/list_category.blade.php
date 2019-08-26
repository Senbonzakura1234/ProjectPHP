@extends('layouts.frontend')
@section('content-title')
	<div class="row mb-4">
		<div class="col-md-6">
			<h2 class="mb-4"><i class="fas fa-tags"></i> Categories list</h2>
		</div>
	</div>
@endsection
@section('content')
	<div class="col-md-12 col-lg-8 main-content">
		<div class="list-group row mx-0 list-group-flush">
			@foreach($lsAllCate as $cate)
				<a href="{{asset('/post_by_category/'.$cate->id)}}" class="list-group-item list-group-item-action">
					<i class="fas fa-tag"></i> {{$cate->name}}
					<span>({{count($cate->posts)}})</span>
				</a>
			@endforeach
		</div>
		<div class="row mt-5">
			<div class="col-md-12 text-center">
				{{$lsAllCate->links()}}
			</div>
		</div>
	</div>
@endsection
