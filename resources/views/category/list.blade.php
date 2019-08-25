@extends('layouts.app2')

@section('content')
        <div class="text-center mb-4 mt-2">
            <div class="col">
                <h2>Category Management</h2>
            </div>
        </div>
        <div class="row">
            @foreach($lsCate as $i => $cate)
                <div class="d-none needToRemove">
                    {{$commentCount = 0}}
                    @foreach($cate->posts as $countEach)
                        {{$commentCount = $commentCount + count($countEach->comment->where('status',1))}}
                    @endforeach
                </div>
                <div class="col-12 col-sm-6 col-lg-4" style="padding-top: 10px; padding-bottom: 10px; border: none">
                    <div class="card text-white">
                        <div class="card-header text-white
							@if(($i + 3)%3 === 0) bg-primary
							@elseif(($i + 3)%3 === 1) bg-success
							@elseif(($i + 3)%3 === 2) bg-dark
							@endif
							">
                            <a href="{{route('category.show', $cate->id)}}">
                                {{$i + $lsCate->perPage()*($lsCate->currentPage() - 1) + 1}}/ {{$cate->name}}
                            </a>
                        </div>
                        <div class="card-body
                        		text-white
								@if(($i + 3)%3 === 0) bg-primary
							@elseif(($i + 3)%3 === 1) bg-success
							@elseif(($i + 3)%3 === 2) bg-dark
							@endif
							">
                            <p class="card-text">Game Count: {{count($cate->posts)}}</p>
                            <p class="card-text">
                                Comment Count: {{$commentCount}}
                            </p>
                        </div>
                        <div class="card-footer row mx-0
								text-white
								@if(($i + 3)%3 === 0) bg-primary
							@elseif(($i + 3)%3 === 1) bg-success
							@elseif(($i + 3)%3 === 2) bg-dark
							@endif
							">
                            <div class="mx-auto ml-sm-auto mr-sm-0">
                                <a class="btn-warning btn" href="{{route('category.edit', $cate->id)}}">Update</a>
                                <form method="post" onsubmit="return confirm('Sure ?')"
                                      action="{{route('category.destroy', $cate->id)}}" style="display: inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <input class="btn-danger btn" type="submit" value="Delete"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @foreach(['success', 'danger'] as $msg)
            @if(session($msg))
                <div class="text-center table-alert alert alert-{{$msg}}">
                    {{session($msg)}}
                </div>
            @endif
        @endforeach
        <div class="mt-4 text-center">
            <div>
                <a class="btn btn-primary my-auto" href="{{route('category.create')}}">Create New</a>
            </div>
        </div>
		<div class="mt-4 mx-0 row">
			<div class="mx-auto">
				{{$lsCate->links()}}
			</div>
		</div>
@endsection

